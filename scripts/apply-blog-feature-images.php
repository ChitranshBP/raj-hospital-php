<?php

$root = dirname(__DIR__);
$blogDir = $root . '/blog';
$featuredDir = $blogDir . '/assets/img/featured';
$excluded = ['index.php', 'gallery.php'];
$updated = 0;

foreach (scandir($blogDir) as $file) {
    if (in_array($file, $excluded, true) || pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
        continue;
    }

    $slug = pathinfo($file, PATHINFO_FILENAME);
    $featurePath = $featuredDir . '/' . $slug . '.png';
    if (!is_file($featurePath)) {
        continue;
    }

    $path = $blogDir . '/' . $file;
    $contents = file_get_contents($path);
    $original = $contents;
    $relativeImage = 'assets/img/featured/' . $slug . '.png';
    $absoluteImage = 'https://rajhospitals.com/blog/' . $relativeImage;

    if (preg_match('/<meta\s+property=["\']og:image["\']\s+content=["\'][^"\']*["\']\s*>/i', $contents)) {
        $contents = preg_replace(
            '/<meta\s+property=["\']og:image["\']\s+content=["\'][^"\']*["\']\s*>/i',
            '<meta property="og:image" content="' . $absoluteImage . '">',
            $contents,
            1
        );
    } else {
        $contents = preg_replace(
            '/(<meta\s+property=["\']og:url["\']\s+content=["\'][^"\']*["\']\s*>)/i',
            "$1\n    <meta property=\"og:image\" content=\"{$absoluteImage}\">",
            $contents,
            1
        );
    }

    $contents = preg_replace(
        '/<img\s+src=["\'](?:<\?php\s+echo\s+\$base_url;\s*\?>)?assets\/(?:home-img\/blogs|img)\/[^"\']+["\'](\s+alt=)/i',
        '<img src="' . $relativeImage . '"$1',
        $contents,
        1
    );

    if ($contents !== $original) {
        file_put_contents($path, $contents);
        $updated++;
        echo "Updated {$path}\n";
    }
}

echo "Updated {$updated} blog files.\n";
