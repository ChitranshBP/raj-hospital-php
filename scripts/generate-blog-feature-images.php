<?php

$root = dirname(__DIR__);
$blogDir = $root . '/blog';
$outputDir = $blogDir . '/assets/img/featured';

if (!extension_loaded('gd')) {
    fwrite(STDERR, "GD extension is required.\n");
    exit(1);
}

if (!is_dir($outputDir) && !mkdir($outputDir, 0775, true)) {
    fwrite(STDERR, "Could not create output directory: {$outputDir}\n");
    exit(1);
}

$excluded = ['index.php', 'gallery.php'];
$posts = [];

foreach (scandir($blogDir) as $file) {
    if (in_array($file, $excluded, true) || pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
        continue;
    }

    $slug = pathinfo($file, PATHINFO_FILENAME);
    $path = $blogDir . '/' . $file;
    $contents = file_get_contents($path);
    $title = ucwords(str_replace('-', ' ', $slug));
    $description = '';

    if (preg_match('/<title>(.*?)<\/title>/is', $contents, $matches)) {
        $title = trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES, 'UTF-8'));
    }

    if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\']([^"\']+)["\']/i', $contents, $matches)) {
        $description = trim(html_entity_decode($matches[1], ENT_QUOTES, 'UTF-8'));
    }

    $posts[] = [
        'slug' => $slug,
        'title' => $title,
        'description' => $description,
    ];
}

sort($posts);

foreach ($posts as $post) {
    $image = imagecreatetruecolor(1200, 675);
    imageantialias($image, true);

    $theme = themeForPost($post['slug'] . ' ' . $post['title'] . ' ' . $post['description']);
    paintBackground($image, $theme);
    paintPattern($image, $theme);
    paintMedicalMark($image, $theme, $post['slug']);
    paintText($image, $theme, $post);

    $output = $outputDir . '/' . $post['slug'] . '.png';
    imagepng($image, $output, 7);
    echo "Generated {$output}\n";
}

function themeForPost($text)
{
    $text = strtolower($text);
    $themes = [
        'heart' => [
            'keys' => ['heart', 'cardiac', 'bp', 'blood pressure', 'pulse', 'stroke', 'attack', 'paralysis'],
            'label' => 'Heart Care',
            'bg1' => [245, 69, 94],
            'bg2' => [19, 129, 163],
            'accent' => [255, 210, 72],
        ],
        'women' => [
            'keys' => ['pregnancy', 'pregnant', 'maternity', 'pcod', 'pcos', 'women', 'breast', 'cervical', 'newborn', 'baby'],
            'label' => 'Women & Child Care',
            'bg1' => [224, 74, 132],
            'bg2' => [42, 142, 183],
            'accent' => [255, 224, 238],
        ],
        'diabetes' => [
            'keys' => ['diabetes', 'sugar', 'diet', 'moringa'],
            'label' => 'Diabetes Care',
            'bg1' => [27, 153, 139],
            'bg2' => [235, 119, 52],
            'accent' => [248, 222, 126],
        ],
        'cancer' => [
            'keys' => ['cancer', 'tumor', 'oncology'],
            'label' => 'Cancer Care',
            'bg1' => [121, 83, 176],
            'bg2' => [26, 145, 199],
            'accent' => [246, 201, 94],
        ],
        'bone' => [
            'keys' => ['bone', 'joint', 'pain', 'orthopedic', 'cervical', 'back', 'headache', 'migraine', 'toothache'],
            'label' => 'Pain & Mobility',
            'bg1' => [42, 111, 151],
            'bg2' => [252, 104, 75],
            'accent' => [219, 238, 245],
        ],
        'infection' => [
            'keys' => ['hiv', 'aids', 'infection', 'chicken', 'chikungunya', 'coronavirus', 'fever', 'blood infection'],
            'label' => 'Infection Care',
            'bg1' => [1, 145, 199],
            'bg2' => [78, 178, 134],
            'accent' => [255, 235, 171],
        ],
        'respiratory' => [
            'keys' => ['asthma', 'saans', 'lungs', 'throat', 'breathing', 'allergies'],
            'label' => 'Respiratory Care',
            'bg1' => [42, 157, 143],
            'bg2' => [37, 99, 235],
            'accent' => [209, 250, 229],
        ],
        'digestive' => [
            'keys' => ['gas', 'acidity', 'liver', 'kidney', 'food poisoning', 'dehydration', 'sgpt', 'sgot', 'haemoglobin'],
            'label' => 'Digestive & General Health',
            'bg1' => [235, 119, 52],
            'bg2' => [1, 145, 199],
            'accent' => [255, 239, 199],
        ],
    ];

    foreach ($themes as $theme) {
        foreach ($theme['keys'] as $key) {
            if (strpos($text, $key) !== false) {
                return $theme;
            }
        }
    }

    return [
        'label' => 'Health Guide',
        'bg1' => [1, 145, 199],
        'bg2' => [252, 104, 75],
        'accent' => [232, 247, 252],
    ];
}

function paintBackground($image, $theme)
{
    [$r1, $g1, $b1] = $theme['bg1'];
    [$r2, $g2, $b2] = $theme['bg2'];

    for ($y = 0; $y < 675; $y++) {
        $ratio = $y / 674;
        $r = (int) ($r1 + ($r2 - $r1) * $ratio);
        $g = (int) ($g1 + ($g2 - $g1) * $ratio);
        $b = (int) ($b1 + ($b2 - $b1) * $ratio);
        imageline($image, 0, $y, 1200, $y, imagecolorallocate($image, $r, $g, $b));
    }

    imagefilledrectangle($image, 0, 0, 1200, 675, imagecolorallocatealpha($image, 0, 0, 0, 110));
}

function paintPattern($image, $theme)
{
    $whiteSoft = imagecolorallocatealpha($image, 255, 255, 255, 105);
    $whiteSofter = imagecolorallocatealpha($image, 255, 255, 255, 118);
    $accent = imagecolorallocatealpha($image, $theme['accent'][0], $theme['accent'][1], $theme['accent'][2], 42);

    for ($i = 0; $i < 12; $i++) {
        $x = 780 + ($i % 4) * 115;
        $y = 80 + intdiv($i, 4) * 130;
        imagearc($image, $x, $y, 92, 92, 0, 360, $whiteSofter);
        imageline($image, $x - 26, $y, $x + 26, $y, $whiteSofter);
        imageline($image, $x, $y - 26, $x, $y + 26, $whiteSofter);
    }

    imagefilledellipse($image, 1010, 545, 360, 360, $accent);
    imagefilledellipse($image, 960, 155, 220, 220, $whiteSofter);
    imagearc($image, 1030, 345, 430, 430, 195, 335, $whiteSoft);
    imagearc($image, 1030, 345, 500, 500, 200, 330, $whiteSofter);
}

function paintMedicalMark($image, $theme, $slug)
{
    $white = imagecolorallocate($image, 255, 255, 255);
    $navy = imagecolorallocatealpha($image, 5, 45, 68, 55);
    $accent = imagecolorallocate($image, $theme['accent'][0], $theme['accent'][1], $theme['accent'][2]);

    imagefilledellipse($image, 900, 340, 230, 230, $navy);
    imagefilledellipse($image, 900, 340, 196, 196, imagecolorallocatealpha($image, 255, 255, 255, 104));

    if (strpos($slug, 'heart') !== false || strpos($slug, 'bp') !== false || strpos($slug, 'stroke') !== false || strpos($slug, 'pulse') !== false) {
        imagefilledellipse($image, 865, 320, 78, 78, $white);
        imagefilledellipse($image, 935, 320, 78, 78, $white);
        imagefilledpolygon($image, [825, 335, 975, 335, 900, 430], $white);
        imageline($image, 805, 365, 855, 365, $accent);
        imageline($image, 855, 365, 878, 325, $accent);
        imageline($image, 878, 325, 910, 405, $accent);
        imageline($image, 910, 405, 936, 365, $accent);
        imageline($image, 936, 365, 995, 365, $accent);
        return;
    }

    if (strpos($slug, 'preg') !== false || strpos($slug, 'pcod') !== false || strpos($slug, 'pcos') !== false || strpos($slug, 'baby') !== false || strpos($slug, 'newborn') !== false) {
        imagefilledellipse($image, 900, 305, 92, 92, $white);
        imagearc($image, 900, 395, 140, 150, 200, 340, $white);
        imagearc($image, 900, 394, 112, 120, 205, 335, $accent);
        imagefilledellipse($image, 900, 390, 44, 44, $white);
        return;
    }

    if (strpos($slug, 'diabetes') !== false || strpos($slug, 'sugar') !== false) {
        imagefilledellipse($image, 900, 350, 118, 158, $white);
        imagefilledellipse($image, 900, 330, 76, 106, $accent);
        imageline($image, 850, 410, 950, 410, $white);
        return;
    }

    if (strpos($slug, 'cancer') !== false || strpos($slug, 'tumor') !== false) {
        imagearc($image, 900, 340, 120, 160, 30, 330, $white);
        imagearc($image, 900, 340, 88, 128, 40, 320, $white);
        imagefilledellipse($image, 900, 285, 44, 44, $accent);
        imagefilledellipse($image, 900, 395, 44, 44, $accent);
        return;
    }

    imagefilledrectangle($image, 868, 260, 932, 420, $white);
    imagefilledrectangle($image, 820, 308, 980, 372, $white);
    imagefilledellipse($image, 900, 340, 54, 54, $accent);
}

function paintText($image, $theme, $post)
{
    $white = imagecolorallocate($image, 255, 255, 255);
    $muted = imagecolorallocatealpha($image, 255, 255, 255, 34);
    $dark = imagecolorallocatealpha($image, 4, 31, 47, 30);
    $accent = imagecolorallocate($image, $theme['accent'][0], $theme['accent'][1], $theme['accent'][2]);

    imagefilledrectangle($image, 84, 88, 328, 134, $dark);
    imagestring($image, 5, 108, 104, 'RAJ Hospital', $white);

    imagefilledrectangle($image, 84, 165, 94, 402, $accent);
    imagestring($image, 5, 112, 174, strtoupper($theme['label']), $accent);

    $title = asciiTitle($post['title'], $post['slug']);
    $lines = wrapText($title, 34, 3);
    $y = 235;
    foreach ($lines as $line) {
        imagestring($image, 5, 112, $y, $line, $white);
        $y += 28;
    }

    $summary = asciiSummary($post['description']);
    if ($summary !== '') {
        $summaryLines = wrapText($summary, 50, 2);
        $y += 18;
        foreach ($summaryLines as $line) {
            imagestring($image, 4, 112, $y, $line, $muted);
            $y += 22;
        }
    }

    imagestring($image, 4, 112, 565, 'Health tips and medical insights', $white);
}

function asciiTitle($title, $slug)
{
    $plain = preg_replace('/\s*\|\s*RAJ Hospital.*$/i', '', $title);
    $plain = preg_replace('/[^\x20-\x7E]+/', ' ', $plain);
    $plain = trim(preg_replace('/\s+/', ' ', $plain));

    if ($plain === '' || strlen($plain) < 8) {
        $plain = ucwords(str_replace('-', ' ', $slug));
    }

    return $plain;
}

function asciiSummary($description)
{
    $plain = preg_replace('/[^\x20-\x7E]+/', ' ', $description);
    $plain = trim(preg_replace('/\s+/', ' ', $plain));
    return $plain;
}

function wrapText($text, $width, $maxLines)
{
    $wrapped = explode("\n", wordwrap($text, $width, "\n", true));
    $lines = array_slice($wrapped, 0, $maxLines);

    if (count($wrapped) > $maxLines) {
        $last = $lines[$maxLines - 1];
        $lines[$maxLines - 1] = rtrim(substr($last, 0, max(0, $width - 3))) . '...';
    }

    return $lines;
}
