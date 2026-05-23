<?php

$root = dirname(__DIR__);
$blogDir = $root . '/blog';

$forceHindi = [
    'danger-level-of-sgpt-and-sgot',
    'diabetes-symptoms-men',
    'difference-between-gas-pain-and-heart-attack-symptoms',
    'difference-between-migraine-and-headache-key-differences-explained',
    'revolutionary-50-cent-dna-sensor',
];

$localizedScript = $root . '/scripts/hindi-localize-seo-blocks.php';

foreach ($forceHindi as $slug) {
    $path = $blogDir . '/' . $slug . '.php';
    if (!is_file($path)) {
        continue;
    }

    $html = file_get_contents($path);
    $html = preg_replace('/<html\s+lang=["\']en["\']/i', '<html lang="hi"', $html, 1);
    file_put_contents($path, $html);
}

passthru('php ' . escapeshellarg($localizedScript));

$headingReplacements = [
    'Frequently Asked Questions About Heart Attack Symptoms' => 'दिल के दौरे के लक्षणों से जुड़े अक्सर पूछे जाने वाले सवाल',
    'Frequently Asked Questions (FAQs)' => 'अक्सर पूछे जाने वाले सवाल',
    'FAQs - Frequently Asked Questions' => 'अक्सर पूछे जाने वाले सवाल',
    'Frequently Asked Questions' => 'अक्सर पूछे जाने वाले सवाल',
];

foreach (glob($blogDir . '/*.php') as $path) {
    if (in_array(basename($path), ['index.php', 'gallery.php'], true)) {
        continue;
    }

    $html = file_get_contents($path);
    $isHindi = preg_match('/<html\s+lang=["\']hi["\']/i', $html)
        || preg_match('/hindi|हिंदी|हिन्दी/i', basename($path) . $html)
        || preg_match('/[\x{0900}-\x{097F}]/u', $html);

    if (!$isHindi) {
        continue;
    }

    $updated = str_replace(array_keys($headingReplacements), array_values($headingReplacements), $html);
    if ($updated !== $html) {
        file_put_contents($path, $updated);
        echo "Cleaned headings {$path}\n";
    }
}
