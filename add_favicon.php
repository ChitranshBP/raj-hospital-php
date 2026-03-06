<?php
$faviconHtml = '    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">';

function processFile($filepath) {
    global $faviconHtml;
    $content = file_get_contents($filepath);
    $original = $content;

    if (strpos($content, 'raj-favicon-.png') === false) {
        $lineToInsert = $faviconHtml;
        
        // Adjust relative path for files inside directories (e.g., doctors/ or specialties/)
        $depth = substr_count(str_replace('c:\\Users\\GCV\\Desktop\\raj-hospital-php\\', '', $filepath), '\\');
        if ($depth > 0) {
            $prefix = str_repeat('../', $depth);
            $lineToInsert = str_replace('assets/', $prefix . 'assets/', $lineToInsert);
        }

        $content = preg_replace('/(<head[^>]*>)/i', "$1\n" . $lineToInsert, $content, 1);
    }
    
    if ($content !== $original) {
        file_put_contents($filepath, $content);
        echo "Updated: $filepath\n";
    }
}

function scanDirRecursive($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..' || $file === '.git' || $file === 'assets') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            scanDirRecursive($path);
        } else {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if ($ext === 'php' || $ext === 'html') {
                processFile($path);
            }
        }
    }
}

scanDirRecursive('c:\Users\GCV\Desktop\raj-hospital-php');
echo "Done\n";
?>
