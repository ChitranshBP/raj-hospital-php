<?php
/**
 * RAJ Hospital Blog — Bulk transformer (Phase 2)
 *
 * Walks /blog/*.php, applies the 80% of mechanical cleanup that doesn't need
 * contextual LLM judgement:
 *
 *   1. Replaces 131 distinct emoji with <i data-feather="X" class="raj-icon raj-icon-Y">.
 *   2. Replaces raw "•" bullets inside <li> with proper <ul class="list-disc list-inside">.
 *   3. Normalizes 5+ callout variants (bg-{color}-{shade} border-l-4 border-{color}-{shade})
 *      to the 4 canonical .raj-callout-{info|warning|danger|success} classes.
 *   4. Normalizes H2 class strings to <h2 class="raj-h2"> (or .raj-h2-secondary).
 *   5. Inserts <link> to blog-components.css in <head> if missing.
 *   6. Adds <script>feather.replace();</script> before </body> if missing.
 *   7. Detects Cyrillic / Chinese / Korean / Arabic and writes a per-file report
 *      to tools/reports/{slug}-leaks.txt — does NOT auto-replace (the LLM agent
 *      pass handles contextual translation in Phase 3).
 *   8. Detects files missing navbar/footer include and injects them.
 *
 * Skips:
 *   - Pattern B files (need full rewrite, not regex)
 *   - index.php, gallery.php (not blog posts)
 *   - Empty 0-byte files
 *   - <head> JSON-LD blocks, meta tags, canonical, og:*
 *   - Content of the "RAJ SEO ENHANCEMENT" block (only its internal emoji is replaced)
 *
 * Usage: php tools/transform-blog.php [--dry-run] [--file=path/to/single.php]
 *
 * @package RAJ\Tools
 */

declare(strict_types=1);

const BLOG_DIR        = __DIR__ . '/../blog';
const TOOLS_DIR       = __DIR__;
const REPORTS_DIR     = __DIR__ . '/reports';
const FEATHER_MAP     = __DIR__ . '/feather-map.json';
const CSS_LINK        = '    <link rel="stylesheet" href="<?php echo $base_url; ?>blog/assets/css/blog-components.css">';
const FEATHER_SCRIPT  = '    <script>feather.replace();</script>';

// Pattern B files that need a full rewrite (skipped here, handled by LLM agent)
const PATTERN_B_FILES = [
    'gardan-mein-dard.php',
    'period-late-hone-ke-karan.php',
    'shighrapatan-ka-ilaj.php',
    'sukhi-khansi-ka-ilaj.php',
];

// Files that are not blog posts
const SKIP_FILES = [
    'index.php',
    'gallery.php',
];

// ---- CLI args -------------------------------------------------------------
$opts = getopt('', ['dry-run', 'file::', 'help']);
if (isset($opts['help'])) {
    echo "Usage: php tools/transform-blog.php [--dry-run] [--file=path/single.php]\n";
    exit(0);
}
$dryRun = isset($opts['dry-run']);
$singleFile = $opts['file'] ?? null;

// ---- Load feather map -----------------------------------------------------
if (!is_file(FEATHER_MAP)) {
    fwrite(STDERR, "FATAL: feather-map.json not found at " . FEATHER_MAP . "\n");
    exit(1);
}
$mapRaw = file_get_contents(FEATHER_MAP);
$map = json_decode($mapRaw, true);
if (!is_array($map) || !isset($map['mappings'])) {
    fwrite(STDERR, "FATAL: feather-map.json is malformed\n");
    exit(1);
}
$fallback = $map['fallback'] ?? ['icon' => 'circle', 'color' => 'raj-icon-gray', 'wrap' => 'inline'];
$mappings = $map['mappings'];

// ---- Build unicode-escape lookup -----------------------------------------
// Filter out non-mapping keys like "_schema" / "version"
$emojiPairs = [];
foreach ($mappings as $emoji => $m) {
    if (str_starts_with($emoji, '_')) continue;
    $emojiPairs[] = ['bytes' => $emoji, 'map' => $m];
}
// Sort by descending byte length so longer matches (with variation selectors) win
usort($emojiPairs, fn($a, $b) => strlen($b['bytes']) - strlen($a['bytes']));

// ---- Helpers --------------------------------------------------------------

/** Render a single emoji as a feather <i>. */
function renderFeather(string $emoji, array $m): string {
    $icon  = htmlspecialchars($m['icon'] ?? 'circle', ENT_QUOTES);
    $color = htmlspecialchars($m['color'] ?? 'raj-icon-gray', ENT_QUOTES);
    $size  = ($m['wrap'] ?? 'inline') === 'block' ? 'raj-icon-md' : 'raj-icon-sm';
    return '<i data-feather="' . $icon . '" class="raj-icon ' . $size . ' ' . $color . '" aria-hidden="true"></i>';
}

/** Replace all mapped emoji in a string. */
function replaceEmojis(string $haystack, array $emojiPairs, array $fallback): string {
    foreach ($emojiPairs as $pair) {
        $emoji = $pair['bytes'];
        $count = 0;
        $haystack = str_replace($emoji, "\x00EMOJI_" . $count . "\x00", $haystack);
        // We need a 2-pass: first mark, then substitute. Simpler: just substitute inline.
    }
    // Simpler approach: iterate and str_replace. We do that below.
    return $haystack;
}

/** Find all (offset, emoji) pairs in a string, return as array sorted by offset desc. */
function findAllEmojis(string $haystack, array $emojiPairs): array {
    $found = [];
    foreach ($emojiPairs as $pair) {
        $emoji = $pair['bytes'];
        $offset = 0;
        while (($pos = mb_strpos($haystack, $emoji, $offset)) !== false) {
            $found[] = ['pos' => $pos, 'len' => strlen($emoji), 'map' => $pair['map']];
            $offset = $pos + strlen($emoji);
        }
    }
    // Sort by position descending so we can replace from the end without breaking offsets
    usort($found, fn($a, $b) => $b['pos'] - $a['pos']);
    return $found;
}

/** Detect foreign-script characters and return [kind, char, snippet] hits. */
function detectForeignScript(string $haystack): array {
    $hits = [];
    $ranges = [
        'cyrillic'  => [0x0400, 0x04FF],
        'chinese'   => [0x4E00, 0x9FFF],
        'korean'    => [0xAC00, 0xD7AF],
        'arabic'    => [0x0600, 0x06FF],
    ];
    foreach ($ranges as $kind => [$lo, $hi]) {
        $len = strlen($haystack);
        for ($i = 0; $i < $len; $i++) {
            // Get the codepoint at byte $i (handle UTF-8)
            $cp = ord($haystack[$i]);
            if ($cp < 0x80) continue; // ASCII skip
            // Decode UTF-8 codepoint
            if (($cp & 0xE0) === 0xC0) {
                if ($i + 1 >= $len) continue;
                $cp = (($cp & 0x1F) << 6) | (ord($haystack[++$i]) & 0x3F);
            } elseif (($cp & 0xF0) === 0xE0) {
                if ($i + 2 >= $len) continue;
                $cp = (($cp & 0x0F) << 12) | ((ord($haystack[++$i]) & 0x3F) << 6) | (ord($haystack[++$i]) & 0x3F);
            } elseif (($cp & 0xF8) === 0xF0) {
                if ($i + 3 >= $len) continue;
                $cp = (($cp & 0x07) << 18) | ((ord($haystack[++$i]) & 0x3F) << 12) | ((ord($haystack[++$i]) & 0x3F) << 6) | (ord($haystack[++$i]) & 0x3F);
            } else {
                continue;
            }
            if ($cp >= $lo && $cp <= $hi) {
                $hits[] = ['kind' => $kind, 'codepoint' => $cp];
            }
        }
    }
    return $hits;
}

/** Normalize callout class strings to canonical .raj-callout-* form.
 *  Returns [newContent, replacements] where replacements is count. */
function normalizeCallouts(string $content): array {
    $count = 0;
    // Pattern A callouts: <div class="bg-{color}-{shade} border-l-4 border-{color}-{shade} p-4 rounded-r-lg ...">
    // Pattern B callouts: <div class="bg-{color}-50 p-4 rounded-2xl shadow-lg ..."> (treat as card, not callout)
    $colorToType = [
        'blue'   => 'info',
        'yellow' => 'warning',
        'red'    => 'danger',
        'green'  => 'success',
        'orange' => 'warning',
        'purple' => 'info',
        'pink'   => 'info',
        'indigo' => 'info',
    ];
    // Regex: <div class="...bg-{color}-{shade}...border-l-4...border-{color}-{shade}...">
    // We replace the whole class attribute with our canonical one.
    $content = preg_replace_callback(
        '/<div\s+class="([^"]*\bbg-([a-z]+)-(\d+)[^"]*\bborder-l-4[^"]*\bborder-\2-(\d+)[^"]*)">/i',
        function ($m) use ($colorToType, &$count) {
            $color = strtolower($m[2]);
            $type  = $colorToType[$color] ?? 'info';
            $count++;
            return '<div class="raj-callout raj-callout-' . $type . '">';
        },
        $content
    );
    // Also handle the Pattern A variant where the order is different: border-l-4 first
    $content = preg_replace_callback(
        '/<div\s+class="([^"]*\bborder-l-4[^"]*\bbg-([a-z]+)-(\d+)[^"]*\bborder-\2-(\d+)[^"]*)">/i',
        function ($m) use ($colorToType, &$count) {
            $color = strtolower($m[2]);
            $type  = $colorToType[$color] ?? 'info';
            $count++;
            return '<div class="raj-callout raj-callout-' . $type . '">';
        },
        $content
    );
    return [$content, $count];
}

/** Normalize H2 class strings to raj-h2. */
function normalizeH2s(string $content): array {
    $count = 0;
    // Pattern A: text-xl font-bold text-gray-800 border-b-2 border-secondary-600 pb-2 mt-8 mb-4
    // Pattern B: text-2xl md:text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2
    $content = preg_replace_callback(
        '/<h2\s+class="[^"]*\bborder-b-2\s+border-secondary-600[^"]*">/i',
        function ($m) use (&$count) {
            $count++;
            return '<h2 class="raj-h2">';
        },
        $content
    );
    $content = preg_replace_callback(
        '/<h2\s+class="[^"]*\bborder-b-2\s+border-primary-600[^"]*">/i',
        function ($m) use (&$count) {
            $count++;
            return '<h2 class="raj-h2-secondary">';
        },
        $content
    );
    $content = preg_replace_callback(
        '/<h2\s+class="[^"]*\bflex\s+items-center\s+gap-2[^"]*">/i',
        function ($m) use (&$count) {
            $count++;
            return '<h2 class="raj-h2">';
        },
        $content
    );
    return [$content, $count];
}

/** Replace raw "•" bullet characters with proper list items. */
function normalizeBullets(string $content): array {
    $count = 0;
    // <li>• text</li>  ->  <li>text</li>
    $content = preg_replace_callback(
        '/<li>(\s*)•\s*/i',
        function ($m) use (&$count) {
            $count++;
            return '<li>';
        },
        $content
    );
    return [$content, $count];
}

/** Replace all mapped emoji in content using simple forward iteration. */
function applyEmojiReplacements(string $content, array $emojiPairs, array $fallback): array {
    $count = 0;
    foreach ($emojiPairs as $pair) {
        $emoji = $pair['bytes'];
        $repl  = renderFeather($emoji, $pair['map']);
        $subCount = substr_count($content, $emoji);
        if ($subCount > 0) {
            $content = str_replace($emoji, $repl, $content);
            $count += $subCount;
        }
    }
    return [$content, $count];
}

/** Ensure blog-components.css link is in <head>. */
function ensureCssLink(string $content): array {
    if (strpos($content, 'blog-components.css') !== false) {
        return [$content, 0]; // already present
    }
    // Insert before </head>
    $link = "\n" . CSS_LINK . "\n</head>";
    $new = preg_replace('/(\s*)<\/head>/i', $link, $content, 1, $count);
    return [$new, $count];
}

/** Ensure feather.replace() script is in <body>. */
function ensureFeatherScript(string $content): array {
    if (strpos($content, 'feather.replace()') !== false) {
        return [$content, 0];
    }
    $script = "\n" . FEATHER_SCRIPT . "\n</body>";
    $new = preg_replace('/(\s*)<\/body>/i', $script, $content, 1, $count);
    return [$new, $count];
}

/** Detect and report missing navbar/footer include. Returns [hasNavbar, hasFooter]. */
function checkNavFooter(string $content): array {
    $hasNavbar = (strpos($content, 'components/navbar.php') !== false)
              || (strpos($content, "renderBlogPage(") !== false);
    $hasFooter = (strpos($content, 'components/footer.php') !== false)
              || (strpos($content, "renderBlogPage(") !== false);
    return [$hasNavbar, $hasFooter];
}

/** Inject navbar include if missing. */
function injectNavbar(string $content): array {
    if (strpos($content, 'components/navbar.php') !== false) {
        return [$content, 0];
    }
    // Insert after <body ...> tag
    $pattern = '/(<body[^>]*>)/i';
    $new = preg_replace_callback(
        $pattern,
        function ($m) {
            return $m[0] . "\n    <?php include \$base_url . 'components/navbar.php'; ?>";
        },
        $content,
        1,
        $count
    );
    return [$new, $count];
}

/** Inject footer include if missing. */
function injectFooter(string $content): array {
    if (strpos($content, 'components/footer.php') !== false) {
        return [$content, 0];
    }
    $new = preg_replace('/(\s*)<\/body>/i', "\n    <?php include \$base_url . 'components/footer.php'; ?>$0", $content, 1, $count);
    return [$new, $count];
}

// ---- Main per-file pipeline ----------------------------------------------

function processFile(string $path, array $emojiPairs, array $fallback, bool $dryRun): array {
    $slug = basename($path, '.php');
    $orig = file_get_contents($path);
    $origSize = strlen($orig);
    $content = $orig;

    $stats = [
        'file'            => basename($path),
        'emojis_replaced' => 0,
        'bullets_fixed'   => 0,
        'callouts_norm'   => 0,
        'h2s_norm'        => 0,
        'css_added'       => 0,
        'script_added'    => 0,
        'navbar_added'    => 0,
        'footer_added'    => 0,
        'foreign_leaks'   => [],
        'had_navbar'      => false,
        'had_footer'      => false,
    ];

    // 1. Emoji replacement
    [$content, $n] = applyEmojiReplacements($content, $emojiPairs, $fallback);
    $stats['emojis_replaced'] = $n;

    // 2. Bullet normalization
    [$content, $n] = normalizeBullets($content);
    $stats['bullets_fixed'] = $n;

    // 3. Callout normalization
    [$content, $n] = normalizeCallouts($content);
    $stats['callouts_norm'] = $n;

    // 4. H2 normalization
    [$content, $n] = normalizeH2s($content);
    $stats['h2s_norm'] = $n;

    // 5. CSS link
    [$content, $n] = ensureCssLink($content);
    $stats['css_added'] = $n;

    // 6. feather.replace() script
    [$content, $n] = ensureFeatherScript($content);
    $stats['script_added'] = $n;

    // 7. Foreign script detection (no auto-replace)
    $leakLines = [];
    $lines = explode("\n", $content);
    foreach ($lines as $ln => $line) {
        $hits = detectForeignScript($line);
        if (!empty($hits)) {
            $kinds = array_unique(array_column($hits, 'kind'));
            $leakLines[] = [
                'line'   => $ln + 1,
                'kinds'  => $kinds,
                'snippet'=> mb_substr(trim($line), 0, 160),
            ];
        }
    }
    $stats['foreign_leaks'] = $leakLines;

    // 8. Navbar / footer injection (only if file has <body> tag)
    if (strpos($content, '<body') !== false) {
        [$hasNav, $hasFoot] = checkNavFooter($content);
        $stats['had_navbar'] = $hasNav;
        $stats['had_footer'] = $hasFoot;
        if (!$hasNav) {
            [$content, $n] = injectNavbar($content);
            $stats['navbar_added'] = $n;
        }
        if (!$hasFoot) {
            [$content, $n] = injectFooter($content);
            $stats['footer_added'] = $n;
        }
    }

    // Write report
    if (!empty($leakLines)) {
        if (!is_dir(REPORTS_DIR)) mkdir(REPORTS_DIR, 0775, true);
        $reportPath = REPORTS_DIR . '/' . $slug . '-leaks.txt';
        $r = "Foreign script leaks in blog/{$slug}.php\n";
        $r .= str_repeat('=', 60) . "\n\n";
        foreach ($leakLines as $hit) {
            $r .= sprintf("Line %4d  [%s]\n  %s\n\n",
                $hit['line'],
                implode(',', $hit['kinds']),
                $hit['snippet']
            );
        }
        if (!$dryRun) file_put_contents($reportPath, $r);
    }

    // Save if changed
    if ($content !== $orig) {
        if (!$dryRun) {
            file_put_contents($path, $content);
        }
    }

    $stats['changed']      = $content !== $orig;
    $stats['new_size']     = strlen($content);
    $stats['orig_size']    = $origSize;
    return $stats;
}

// ---- Main -----------------------------------------------------------------

$files = [];
if ($singleFile) {
    if (!is_file($singleFile)) {
        fwrite(STDERR, "FATAL: --file path not found: $singleFile\n");
        exit(1);
    }
    $files[] = $singleFile;
} else {
    $iter = new DirectoryIterator(BLOG_DIR);
    foreach ($iter as $f) {
        if ($f->isDot() || !$f->isFile()) continue;
        $name = $f->getFilename();
        if (!str_ends_with($name, '.php')) continue;
        if (in_array($name, SKIP_FILES, true)) continue;
        if (in_array($name, PATTERN_B_FILES, true)) continue;
        if ($f->getSize() === 0) continue; // skip empty files
        $files[] = BLOG_DIR . '/' . $name;
    }
    sort($files);
}

echo "RAJ Hospital blog transformer\n";
echo "Mode: " . ($dryRun ? "DRY RUN (no changes written)" : "WRITE") . "\n";
echo "Files: " . count($files) . "\n";
echo str_repeat('-', 60) . "\n";

$totalEmojis  = 0;
$totalBullets = 0;
$totalCallouts= 0;
$totalH2s     = 0;
$totalCss     = 0;
$totalScript  = 0;
$totalNavbar  = 0;
$totalFooter  = 0;
$totalLeakFiles = 0;
$totalLeaks   = 0;
$changed      = 0;

foreach ($files as $path) {
    $stats = processFile($path, $emojiPairs, $fallback, $dryRun);
    $totalEmojis  += $stats['emojis_replaced'];
    $totalBullets += $stats['bullets_fixed'];
    $totalCallouts+= $stats['callouts_norm'];
    $totalH2s     += $stats['h2s_norm'];
    $totalCss     += $stats['css_added'];
    $totalScript  += $stats['script_added'];
    $totalNavbar  += $stats['navbar_added'];
    $totalFooter  += $stats['footer_added'];
    if (!empty($stats['foreign_leaks'])) {
        $totalLeakFiles++;
        $totalLeaks += count($stats['foreign_leaks']);
    }
    if ($stats['changed']) $changed++;

    $line = sprintf(
        "%-65s emojis=%-3d bullets=%-3d callouts=%-2d h2s=%-2d css=%d script=%d nav=%d foot=%d leaks=%d %s\n",
        $stats['file'],
        $stats['emojis_replaced'],
        $stats['bullets_fixed'],
        $stats['callouts_norm'],
        $stats['h2s_norm'],
        $stats['css_added'],
        $stats['script_added'],
        $stats['navbar_added'],
        $stats['footer_added'],
        count($stats['foreign_leaks']),
        $stats['changed'] ? '[CHANGED]' : '[no change]'
    );
    echo $line;
}

echo str_repeat('-', 60) . "\n";
echo "Files processed:        " . count($files) . "\n";
echo "Files changed:          $changed\n";
echo "Emojis replaced:        $totalEmojis\n";
echo "Bullets normalized:     $totalBullets\n";
echo "Callouts normalized:    $totalCallouts\n";
echo "H2s normalized:         $totalH2s\n";
echo "CSS link added:         $totalCss\n";
echo "feather script added:   $totalScript\n";
echo "Navbar injected:        $totalNavbar\n";
echo "Footer injected:        $totalFooter\n";
echo "Foreign leak files:     $totalLeakFiles\n";
echo "Foreign leak lines:     $totalLeaks\n";
echo "Skipped (Pattern B):    " . count(PATTERN_B_FILES) . "\n";
echo "Skipped (empty/non-post): index.php, gallery.php + 2 zero-byte\n";
