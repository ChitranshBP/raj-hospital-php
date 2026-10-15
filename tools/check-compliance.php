<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; } // maintenance script: command line only
/**
 * RAJ Hospital — content and privacy compliance check (run before every deploy).
 *
 * Checks blog posts and site pages for the rules in CLAUDE.md: medical disclaimer below the H1,
 * promotional superlatives/guarantees, unverified "reviewed by" claims, patient testimonials,
 * placeholder phone numbers, HTML inside <title>, invalid JSON-LD, patient forms without the
 * privacy consent checkbox, and unfilled privacy-notice details.
 *
 * Usage: php tools/check-compliance.php [--root=DIR] [file.php ...]
 *   With no files, checks every page. Exit code 1 if any ERROR is found.
 */

$root = dirname(__DIR__);
$files = [];
foreach (array_slice($argv, 1) as $arg) {
    if (strpos($arg, '--root=') === 0) {
        $root = rtrim(substr($arg, 7), '/\\');
    } else {
        $files[] = $arg;
    }
}
if (!$files) {
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));
    foreach ($it as $f) {
        $rel = str_replace('\\', '/', substr($f->getPathname(), strlen($root) + 1));
        if (substr($rel, -4) === '.php' && !preg_match('#^(tools|scripts|components)/#', $rel)
            && !in_array($rel, ['config.php', 'header.php', 'footer.php', 'custom-code.php', 'build.php',
                'update_images.php', 'add_favicon.php', 'doctor-profile-template.php'], true)) {
            $files[] = $rel;
        }
    }
    sort($files);
}

$banned = [
    '/\bbest\b/i', '/\bguarantee[ds]?\b/i', '/\b100\s?%/', '/\bno\.?\s?1\b|\bnumber\s+one\b/i',
    '/\btop[- ](rated|hospital|doctors?|specialists?|neurologists?|cardiologists?|surgeons?)\b/i',
    '/\bleading\s+(hospital|cent(er|re)|specialists?|doctors?|healthcare|multi)/i', '/\bworld[- ]class\b/i',
    '/\b(unmatched|unparalleled|unrivall?ed)\b/i', '/\bmost\s+trusted\b/i', '/\bpermanent(ly)?\s+cure/i',
    '/\bmiracle\s+(cure|treatment)/i', '/\bstate[- ]of[- ]the[- ]art\b/i',
    '/सबसे\s+(अच्छा|अच्छी|अच्छे|बेहतर|बेहतरीन)/u', '/बेस्ट|सर्वश्रेष्ठ|सर्वोत्तम|गारंटी|रामबाण|चमत्कारी|अचूक/u',
    '/पक्का\s+इलाज|जड़\s*से\s+(खत्म|ठीक)|हमेशा\s+के\s+लिए\s+ठीक/u',
];
// Non-promotional uses that are fine: negations, a factual question, a named award (verify it separately).
$allowed = ['/\bnot\s+a\s+miracle/i', '/miracle\s+cure\s+नहीं/u', '/\bcannot\s+guarantee/i', '/guarantees?\s+anything/i',
    '/Can\s+[a-z ]+\s+be\s+permanently\s+cured\?/i', '/Best\s+Pollution\s+Control\s+Practice\s+Award/'];
$reviewClaims = '/\b(Medically\s+reviewed|Reviewed\s+by\s+(Senior|Dr\.?|the|our|a)\b|Doctor[- ](reviewed|explained)|Cardiologist[- ]reviewed|written\s+by\s+(a\s+)?(cardiologist|doctor|specialist))|Dr\.\s+RAJ\s+Hospital\s+Medical\s+Team/i';
$testimonial = '/Patient\s+(Success\s+)?Stor(y|ies)|Real\s+Patient\s+Story|Video\s+Testimonials|"@type"\s*:\s*"(Review|AggregateRating)"|aggregateRating/i';
$placeholderPhone = '/9876543210|XXXXXXXXXX|98765\s?43210/';

$errors = $warnings = 0;
$report = function ($level, $file, $msg) use (&$errors, &$warnings) {
    $level === 'ERROR' ? $errors++ : $warnings++;
    echo str_pad($level, 8) . "$file: $msg\n";
};

foreach ($files as $rel) {
    $path = $root . '/' . $rel;
    if (!is_file($path)) {
        $report('ERROR', $rel, 'file not found');
        continue;
    }
    $html = file_get_contents($path);
    $isPost = preg_match('#^blog/(?!index\.php$)[^/]+\.php$#', $rel);

    if ($isPost) {
        $h1 = preg_match_all('/<h1\b/i', $html);
        if ($h1 !== 1) {
            $report('ERROR', $rel, "expected exactly one <h1>, found $h1");
        }
        if (strpos($html, 'medical-disclaimer.php') === false) {
            $report('WARNING', $rel, 'does not include components/medical-disclaimer.php after the H1 (navbar safety net will insert it)');
        } elseif (!preg_match('#</h1>\s*<\?php include[^?]*medical-disclaimer\.php#i', $html)) {
            $report('ERROR', $rel, 'medical disclaimer include is not immediately after the H1');
        }
    }

    // Text that readers or search engines see: strip comments, CSS/JS, and URL attribute values.
    $text = preg_replace('/<!--.*?-->/s', ' ', $html);
    $text = preg_replace('#<style\b.*?</style>#is', ' ', $text);
    $text = preg_replace('#<script(?![^>]*ld\+json)\b.*?</script>#is', ' ', $text);
    $text = preg_replace('/\b(href|src|srcset|data-src|action)\s*=\s*(["\']).*?\2/is', ' ', $text);
    $text = preg_replace('/\bcontent\s*=\s*(["\'])https?:.*?\1/is', ' ', $text);
    $text = preg_replace('#https?://[^\s"\'<>]+#', ' ', $text);
    $text = preg_replace('/\b(leading-(relaxed|tight|snug|normal|loose|none|\d))\b/', ' ', $text);
    foreach ($allowed as $a) {
        $text = preg_replace($a, ' ', $text);
    }
    foreach ($banned as $re) {
        if (preg_match_all($re, $text, $m)) {
            $report('ERROR', $rel, 'promotional term "' . $m[0][0] . '" x' . count($m[0]));
        }
    }
    if (preg_match_all($reviewClaims, $text, $m)) {
        $report('ERROR', $rel, 'unverified review/authorship claim "' . $m[0][0] . '"');
    }
    if (preg_match_all($testimonial, $html, $m)) {
        $report('ERROR', $rel, 'testimonial / rating content "' . $m[0][0] . '"');
    }
    if (preg_match($placeholderPhone, $html)) {
        $report('ERROR', $rel, 'placeholder phone number');
    }
    if (preg_match('#<title[^>]*>[^<]*<a\b#i', $html)) {
        $report('ERROR', $rel, 'HTML tag inside <title>');
    }
    if (preg_match_all('#<script[^>]*application/ld\+json[^>]*>(.*?)</script>#is', $html, $blocks)) {
        foreach ($blocks[1] as $i => $block) {
            if (strpos($block, '<?php') === false && json_decode($block) === null) {
                $report('ERROR', $rel, "JSON-LD block #$i is not valid JSON (" . json_last_error_msg() . ')');
            }
        }
    }
    if (preg_match_all('#<form\b.*?</form>#is', $html, $forms)) {
        foreach ($forms[0] as $form) {
            if (strpos($form, 'formester.com/forms/kIewn1CO8') !== false && strpos($form, 'name="privacy_consent"') === false) {
                $report('ERROR', $rel, 'patient form without the privacy consent checkbox');
            }
        }
    }
    if ($rel === 'privacy-policy.php' && preg_match_all("/'(entity|officer|email|phone|enquiry_retention|careers_retention|analytics_retention)'\s*=>\s*''/", $html, $m)) {
        $report('ERROR', $rel, 'privacy notice details still to be filled in: ' . implode(', ', $m[1]));
    }
}

echo "\n" . count($files) . " files checked: $errors error(s), $warnings warning(s)\n";
exit($errors ? 1 : 0);
