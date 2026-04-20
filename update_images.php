<?php
$map = [
    'ahmad-hussain' => 'assets/doctor-latest/ahmad hussain.webp',
    'ashish-basant' => 'assets/new-doctors-side/ashish basant.webp',
    'deepak-verma' => 'assets/doctor-latest/deepak verma.webp',
    'parijat-sarkar' => 'assets/doctor-latest/prajit-sarkar.webp',
    'pradeep-prasad' => 'assets/new-doctors-side/pradeep prasad.webp',
    'praveen-kumar' => 'assets/doctor-latest/praveen kumar.webp',
    'ranajan-jha' => 'assets/new-doctors-side/ranajan kumar jha.webp',
    'saurabh-kumar' => 'assets/new-doctors-side/Dr. Saurabh Kumar.webp',
    'sunil-kumar' => 'assets/doctor-latest/sunil kumar.webp',
    'tgn-sinha' => 'assets/doctor-latest/tgn sinha.webp',
    'ved-prakash' => 'assets/doctor-latest/ved prakash.webp',
    'vivek-raj' => 'assets/new-doctors-side/vivek raj.webp',
];

$names = [
    'ahmad-hussain' => 'Dr. Ahmad Hussain',
    'ashish-basant' => 'Dr. Ashish Basant',
    'deepak-verma' => 'Dr. Deepak Verma',
    'parijat-sarkar' => 'Mr. Parijat Sarkar',
    'pradeep-prasad' => 'Dr. Pradeep Prasad',
    'praveen-kumar' => 'Dr. Praveen Kumar',
    'ranajan-jha' => 'Dr. Ranajan Kumar Jha',
    'saurabh-kumar' => 'Dr. Saurabh Kumar',
    'sunil-kumar' => 'Dr. Sunil Kumar',
    'tgn-sinha' => 'Dr. T.G.N. Sinha',
    'ved-prakash' => 'Dr. Ved Prakash Verma',
    'vivek-raj' => 'Dr. Vivek Raj',
];

function processFile($filepath) {
    global $map, $names;
    $content = file_get_contents($filepath);
    $original = $content;
    
    // JS Object replacements in index.php, find-a-doctor.php, doctor-profile.php, etc.
    foreach ($map as $id => $image) {
        $imgPath = $image;
        if (strpos($filepath, 'doctors\\') !== false || strpos($filepath, 'specialties\\') !== false) {
            $imgPath = '../' . $image;
        }

        // JS Arrays: image: '...'
        $content = preg_replace('/(\{.*?id:\s*[\'"]' . $id . '[\'"].*?image:\s*[\'"])[^\'"]+([\'"].*?\})/s', '$1' . $imgPath . '$2', $content);
        
        // PHP static files: 'image' => '...'
        if (strpos($filepath, 'doctors\\') !== false && strpos($filepath, "$id.php") !== false) {
             $content = preg_replace("/('image'\s*=>\s*['\"])[^'\"]+(['\"])/i", "\$1$imgPath\$2", $content);
        }
        
        // HTML static files for specialties images near name
        $name = $names[$id];
        $escName = preg_quote($name, '/');
        // Match img src before the name (typically found in specialty pages)
        $content = preg_replace_callback('/<img[^>]+src=["\']([^"\']+)["\'][^>]+alt=["\']'.$escName.'["\']/i', function($matches) use ($imgPath) {
            return str_replace($matches[1], $imgPath, $matches[0]);
        }, $content);
        
        // HTML Profile pages top img tag
        if (strpos($filepath, "doctors\\$id.html") !== false || strpos($filepath, "doctors/$id.html") !== false) {
             $content = preg_replace_callback('/<img[^>]+src=["\']([^"\']+)["\'][^>]+alt=["\']'.$escName.'["\']/i', function($matches) use ($imgPath) {
                return str_replace($matches[1], $imgPath, $matches[0]);
            }, $content);
        }
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
