<?php
// config.php - Root configuration and shared template functions

if (!function_exists('renderBlogPage')) {
    function renderBlogPage($slug, $page_title, $page_description, $content) {
        $base_url = '../';
        $pageTitle = $page_title;
        $pageDescription = $page_description;
        
        // Try to access the global $keyword variable if it was defined in the parent script
        global $keyword;
        if (isset($keyword)) {
            $pageKeywords = $keyword;
        }
        
        $canonicalUrl = "https://rajhospitals.com/blog/" . $slug . "/";
        
        // Determine featured image
        $featured_png = "assets/img/featured/" . $slug . ".png";
        if (file_exists(__DIR__ . "/blog/" . $featured_png)) {
            $ogImage = "https://rajhospitals.com/blog/" . $featured_png;
        } else {
            $ogImage = "https://rajhospitals.com/blog/assets/img/Copy-of-Raj-Hospitals.jpg";
        }
        
        $ogType = "article";
        
        // Include site templates
        include_once __DIR__ . '/header.php';
        echo $content;
        include_once __DIR__ . '/footer.php';
    }
}
