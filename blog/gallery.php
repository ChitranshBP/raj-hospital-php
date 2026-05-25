<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        body { font-family: sans-serif; }
        .gallery { display: flex; flex-wrap: wrap; gap: 20px; }
        .item { border: 1px solid #ccc; padding: 10px; width: 300px; text-align: center; }
        .item img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>Featured Images</h1>
    <div class="gallery">
        <?php
        $files = glob('assets/img/Copy-of-Raj-Hospitals*.jpg');
        foreach ($files as $file) {
            if (strpos($file, '-150x150') === false && strpos($file, '-300x205') === false) {
                echo '<div class="item">';
                echo '<img src="' . htmlspecialchars($file) . '" alt="">';
                echo '<p>' . htmlspecialchars(basename($file)) . '</p>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
