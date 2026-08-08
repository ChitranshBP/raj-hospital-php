<?php $base_url = '../'; ?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <?php include_once __DIR__ . '/../custom-code.php'; ?>
    <link rel="icon" type="image/png" href="/assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Blog | RAJ Hospital Ranchi - Health Tips & Medical Insights</title>
    <meta name="description" content="RAJ Hospital Ranchi की official blog - Health tips, disease information in Hindi, medical updates, और specialist advice। जानें अपनी health के बारे में।">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://rajhospitals.com/blog/">

    <!-- Open Graph -->
    <meta property="og:title" content="Health Blog | RAJ Hospital Ranchi">
    <meta property="og:description" content="Health tips, disease information in Hindi, और medical updates। RAJ Hospital के specialists से जानें अपनी health के बारे में।">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://rajhospitals.com/blog/">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#fc684b',
                            600: '#ea5234',
                        },
                        secondary: {
                            600: '#0191c7',
                        },
                        accent: {
                            500: '#f97316',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <!-- Blog Hero -->
    <div class="bg-gradient-to-r from-secondary-600 to-blue-600 text-white py-16 px-4 text-center mt-[120px]">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">RAJ Hospital Health Blog</h1>
        <p class="text-lg opacity-90 max-w-2xl mx-auto">Health tips, disease information in Hindi, और medical updates। RAJ Hospital के specialists से जानें अपनी health के बारे में।</p>
    </div>

    <!-- Blog Grid -->
    <main class="max-w-6xl mx-auto px-4 py-12">
        <?php
        // === Latest Posts Strip — Top 3 by datePublished (newest first) ===
        $blog_dir_latest = __DIR__;
        $latest_blogs_strip = [];
        if (is_dir($blog_dir_latest)) {
            $items_strip = scandir($blog_dir_latest);
            foreach ($items_strip as $item_st) {
                if (in_array($item_st, ['index.php', 'gallery.php'], true) || is_dir($blog_dir_latest . '/' . $item_st) || pathinfo($item_st, PATHINFO_EXTENSION) !== 'php') continue;
                $slug_st = pathinfo($item_st, PATHINFO_FILENAME);
                $file_st = $blog_dir_latest . '/' . $item_st;
                $contents_st = @file_get_contents($file_st, false, null, 0, 25000);
                if ($contents_st === false) continue;
                $date_ts_st = 0;
                if (preg_match('/"datePublished"\s*:\s*"([^"]+)"/i', $contents_st, $mst)) {
                    $date_ts_st = strtotime($mst[1]);
                }
                if (!$date_ts_st && preg_match('/data-feather="calendar"[^>]*>\s*([A-Z][a-z]+\s+\d{1,2},\s+\d{4})/i', $contents_st, $mst2)) {
                    $date_ts_st = strtotime($mst2[1]);
                }
                if (!$date_ts_st) $date_ts_st = filemtime($file_st);
                $title_st = ucwords(str_replace('-', ' ', $slug_st));
                if (preg_match('/<title>(.*?)<\/title>/is', $contents_st, $mts)) {
                    $t_st = trim(html_entity_decode(strip_tags($mts[1]), ENT_QUOTES, 'UTF-8'));
                    $t_st = preg_replace('/\s*[\|\-–—]\s*RAJ Hospital.*$/i', '', $t_st);
                    if ($t_st !== '') $title_st = $t_st;
                }
                $excerpt_st = 'Read this health guide from RAJ Hospital specialists.';
                if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\']([^"\']+)["\']/i', $contents_st, $mes)) {
                    $excerpt_st = trim(html_entity_decode($mes[1], ENT_QUOTES, 'UTF-8'));
                }
                if (function_exists('mb_strimwidth')) {
                    $excerpt_st = mb_strimwidth($excerpt_st, 0, 130, '…');
                } else {
                    $excerpt_st = substr($excerpt_st, 0, 130) . '…';
                }
                $image_st = '';
                foreach (['assets/img/featured/' . $slug_st . '.png', 'assets/img/featured/' . $slug_st . '.webp'] as $cand) {
                    if (is_file($blog_dir_latest . '/' . $cand)) { $image_st = $cand; break; }
                }
                if ($image_st === '' && preg_match('/<meta\s+property=["\']og:image["\']\s+content=["\']([^"\']+)["\']/i', $contents_st, $mis)) {
                    $image_st = trim($mis[1]);
                }
                $latest_blogs_strip[] = [
                    'slug' => $slug_st, 'title' => $title_st, 'excerpt' => $excerpt_st,
                    'image' => $image_st, 'date_ts' => $date_ts_st,
                    'date' => date('F j, Y', $date_ts_st),
                ];
            }
            usort($latest_blogs_strip, function($a_s, $b_s) { return $b_s['date_ts'] - $a_s['date_ts']; });
            $latest_blogs_strip = array_slice($latest_blogs_strip, 0, 3);
        }
        if (!empty($latest_blogs_strip)) { ?>
            <section class="mb-12">
                <div class="flex items-end justify-between mb-6">
                    <div>
                        <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">Newest</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Latest Posts</h2>
                        <p class="text-sm text-gray-500 mt-1">Date-wise newest first — fresh insights from our specialists.</p>
                    </div>
                    <span class="hidden md:inline-flex items-center gap-1 text-xs text-gray-400"><i data-feather="calendar" class="w-3 h-3"></i> Updated <?php echo date('F j, Y'); ?></span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($latest_blogs_strip as $i_st => $lbs) {
                        $is_first_st = ($i_st === 0); ?>
                        <a href="<?php echo htmlspecialchars($lbs['slug']); ?>.php"
                           class="group <?php echo $is_first_st ? 'md:col-span-3' : ''; ?> bg-white border <?php echo $is_first_st ? 'border-secondary-600 ring-2 ring-secondary-100' : 'border-gray-200'; ?> rounded-xl overflow-hidden shadow hover:shadow-xl transition flex <?php echo $is_first_st ? 'flex-col md:flex-row' : 'flex-col'; ?>">
                            <?php if ($lbs['image']) { ?>
                                <div class="<?php echo $is_first_st ? 'md:w-1/2' : ''; ?> aspect-[16/9] bg-gray-50 overflow-hidden flex-shrink-0">
                                    <img src="<?php echo htmlspecialchars($lbs['image']); ?>" alt="<?php echo htmlspecialchars($lbs['title']); ?>" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" onerror="this.onerror=null;this.src='/blog/assets/img/Copy-of-Raj-Hospitals.jpg';">
                                </div>
                            <?php } ?>
                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                    <span class="inline-flex items-center gap-1 bg-secondary-600 text-white px-2 py-0.5 rounded font-semibold">
                                        <i data-feather="clock" class="w-3 h-3"></i> NEW
                                    </span>
                                    <span class="inline-flex items-center gap-1">
                                        <i data-feather="calendar" class="w-3 h-3"></i>
                                        <?php echo htmlspecialchars($lbs['date']); ?>
                                    </span>
                                </div>
                                <h3 class="<?php echo $is_first_st ? 'text-xl md:text-2xl' : 'text-lg'; ?> font-bold text-gray-800 mb-2 group-hover:text-secondary-600 transition-colors leading-snug">
                                    <?php echo htmlspecialchars($lbs['title']); ?>
                                </h3>
                                <p class="text-sm text-gray-600 mb-4 line-clamp-3 flex-1"><?php echo htmlspecialchars($lbs['excerpt']); ?></p>
                                <span class="text-accent-500 text-sm font-semibold mt-auto inline-flex items-center gap-1 group-hover:underline">
                                    Read full article <i data-feather="arrow-right" class="w-4 h-4"></i>
                                </span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </section>
            <div class="flex items-center gap-4 mb-6">
                <h2 class="text-xl font-bold text-gray-800">All Posts</h2>
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-500">Sorted by date — newest first</span>
            </div>
        <?php } ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
            $blog_dir = __DIR__;
            $blogs = [];

            // Find all blog PHP files (exclude index.php itself)
            if (is_dir($blog_dir)) {
                $excluded_files = ['index.php', 'gallery.php'];
                $items = scandir($blog_dir);
                foreach ($items as $item) {
                    // Skip index.php, directories, and non-php files
                    if (in_array($item, $excluded_files) || is_dir($blog_dir . '/' . $item) || pathinfo($item, PATHINFO_EXTENSION) !== 'php') {
                        continue;
                    }
                    $slug = pathinfo($item, PATHINFO_FILENAME);
                    $blogs[] = $slug;
                }
            }

            $blog_data = [
                'hiv-symptoms-in-men-in-hindi' => [
                    'title' => 'पुरुषों में HIV के लक्षण | HIV Symptoms in Men in Hindi',
                    'excerpt' => 'पुरुषों में HIV के शुरुआती और प्रमुख लक्षण जानें। Complete Hindi guide में जानें कौन से warning signs हैं और कब test करना चाहिए।',
                    'category' => 'Infectious Diseases',
                    'date' => 'May 22, 2026',
                    'image' => 'assets/img/hiv-symptoms.png'
                ],
                '<a href="/specialties/psychiatry-and-mental-health.php" class="text-red-600 hover:underline font-semibold">anxiety</a>-symptoms-in-men-common-signs-of-stress-and-mental-health-issues' => [
                    'title' => 'Anxiety Symptoms in Men | Signs of Stress & Mental Health Issues',
                    'excerpt' => 'Learn about anxiety symptoms in men, stress symptoms, anxiety attack symptoms, and mental health issues. Complete guide on high anxiety symptoms.',
                    'category' => 'Mental Health',
                    'date' => 'May 22, 2026',
                    'image' => 'assets/img/featured/anxiety-symptoms-in-men-common-signs-of-stress-and-mental-health-issues.png'
                ],
                '<a href="/specialties/gastroenterology.php" class="text-red-600 hover:underline font-semibold">acidity</a>-symptoms-in-hindi' => [
                    'title' => 'Acidity ke Lakshan | Acidity Symptoms in Hindi',
                    'excerpt' => 'Acidity ke lakshan in Hindi जानें। पेट में जलन, गैस, और एसिडिटी के symptoms, causes, और treatment options।',
                    'category' => 'Gastroenterology',
                    'date' => 'May 22, 2026',
                    'image' => 'assets/img/featured/acidity-symptoms-in-hindi.png'
                ],
                'pulse-rate-50-hone-par-kya-karen' => [
                    'title' => 'पल्स रेट 50 होने पर क्या करें? | Low Pulse Rate Guide',
                    'excerpt' => 'Low pulse rate (bradycardia) के कारण, लक्षण और उपाय जानें। जानें कब डॉक्टर को दिखाना है और कब घरेलू उपाय काफी हैं।',
                    'category' => 'Heart Health',
                    'date' => 'April 9, 2026',
                    'image' => 'assets/img/The-Basics-of-Systolic-and-Diastolic-Blood-Pressure-visual-selection.png'
                ]
            ];

            function normalize_blog_image_text($text) {
                $text = strtolower($text);
                $text = preg_replace('/\.(jpg|jpeg|png|webp)$/i', '', $text);
                $text = preg_replace('/-\d+x\d+$/', '', $text);
                return preg_replace('/[^a-z0-9]+/', ' ', $text);
            }

            function find_relevant_blog_image($blog_dir, $slug, $title = '', $current_image = '') {
                $generated_feature = 'assets/img/featured/' . $slug . '.png';
                if (is_file($blog_dir . '/' . $generated_feature)) {
                    return $generated_feature;
                }

                $asset_dir = $blog_dir . '/assets/img';
                if ($current_image !== '' && $current_image !== 'assets/img/Copy-of-Raj-Hospitals.jpg' && strpos($current_image, 'assets/img/') === 0 && is_file($blog_dir . '/' . $current_image)) {
                    return $current_image;
                }

                if (!is_dir($asset_dir)) {
                    return 'assets/img/Copy-of-Raj-Hospitals.jpg';
                }

                static $image_files = null;
                if ($image_files === null) {
                    $image_files = [];
                    foreach (scandir($asset_dir) as $file) {
                        if (preg_match('/\.(jpe?g|png|webp)$/i', $file)) {
                            $image_files[] = $file;
                        }
                    }
                }

                $search_text = normalize_blog_image_text($slug . ' ' . $title);
                $tokens = array_values(array_filter(explode(' ', $search_text), function($token) {
                    return strlen($token) > 2 && !in_array($token, ['the', 'and', 'for', 'with', 'that', 'this', 'hai', 'hindi', 'kya', 'kaise', 'mein', 'ke', 'ka', 'ki', 'raj', 'hospital', 'hospitals', 'ranchi', 'complete', 'guide', 'treatment', 'causes']);
                }));

                $best_file = '';
                $best_score = 0;

                foreach ($image_files as $file) {
                    $image_text = normalize_blog_image_text($file);
                    $score = 0;

                    if (strpos($image_text, normalize_blog_image_text($slug)) !== false) {
                        $score += 80;
                    }

                    foreach ($tokens as $token) {
                        if (strpos($image_text, $token) !== false) {
                            $score += strlen($token) >= 5 ? 10 : 5;
                        }
                    }

                    if (preg_match('/-(150x150|80x80|300x300)\./i', $file)) {
                        $score -= 15;
                    } elseif (preg_match('/-\d+x\d+\./', $file)) {
                        $score -= 3;
                    } else {
                        $score += 5;
                    }

                    if ($score > $best_score) {
                        $best_score = $score;
                        $best_file = $file;
                    }
                }

                return $best_score > 0 ? 'assets/img/' . $best_file : 'assets/img/Copy-of-Raj-Hospitals.jpg';
            }

            function get_blog_post_meta($blog_dir, $slug) {
                static $cache = [];
                if (isset($cache[$slug])) return $cache[$slug];

                $file = $blog_dir . '/' . $slug . '.php';
                $date_ts = is_file($file) ? filemtime($file) : time();
                
                $meta = [
                    'title' => ucwords(str_replace('-', ' ', $slug)),
                    'excerpt' => 'Read more about this health topic.',
                    'category' => 'Health',
                    'image' => 'assets/img/Copy-of-Raj-Hospitals.jpg',
                    'date_ts' => $date_ts
                ];

                if (!is_file($file)) {
                    $meta['date'] = date('F j, Y', $meta['date_ts']);
                    $cache[$slug] = $meta;
                    return $meta;
                }

                $contents = file_get_contents($file, false, null, 0, 20000);
                if ($contents === false) {
                    $meta['date'] = date('F j, Y', $meta['date_ts']);
                    $cache[$slug] = $meta;
                    return $meta;
                }

                if (preg_match('/"datePublished"\s*:\s*"([^"]+)"/i', $contents, $mst)) {
                    $ts = strtotime($mst[1]);
                    if ($ts) $meta['date_ts'] = $ts;
                } elseif (preg_match('/data-feather="calendar"[^>]*>\s*([A-Z][a-z]+\s+\d{1,2},\s+\d{4})/i', $contents, $mst2)) {
                    $ts = strtotime($mst2[1]);
                    if ($ts) $meta['date_ts'] = $ts;
                }
                $meta['date'] = date('F j, Y', $meta['date_ts']);

                if (preg_match('/<title>(.*?)<\/title>/is', $contents, $matches)) {
                    $title = trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES, 'UTF-8'));
                    if ($title !== '') {
                        $meta['title'] = $title;
                    }
                }

                if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\']([^"\']+)["\']/i', $contents, $matches)) {
                    $description = trim(html_entity_decode($matches[1], ENT_QUOTES, 'UTF-8'));
                    if ($description !== '') {
                        $meta['excerpt'] = $description;
                    }
                }

                if (preg_match('/<meta\s+property=["\']og:image["\']\s+content=["\']([^"\']+)["\']/i', $contents, $matches)) {
                    $image = trim($matches[1]);
                    if ($image !== '') {
                        $meta['image'] = $image;
                    }
                }

                $meta['image'] = find_relevant_blog_image($blog_dir, $slug, $meta['title'], $meta['image']);

                return $meta;
            }

            // Sort blogs by date (newest first)
            usort($blogs, function($a, $b) use ($blog_dir, $blog_data) {
                if (isset($blog_data[$a]) && isset($blog_data[$a]['date'])) {
                    $time_a = strtotime($blog_data[$a]['date']);
                } else {
                    $meta_a = get_blog_post_meta($blog_dir, $a);
                    $time_a = $meta_a['date_ts'];
                }

                if (isset($blog_data[$b]) && isset($blog_data[$b]['date'])) {
                    $time_b = strtotime($blog_data[$b]['date']);
                } else {
                    $meta_b = get_blog_post_meta($blog_dir, $b);
                    $time_b = $meta_b['date_ts'];
                }

                return $time_b - $time_a; // Descending order (newest first)
            });

            $posts_per_page = 9;
            $total_posts = count($blogs);
            $total_pages = max(1, (int) ceil($total_posts / $posts_per_page));
            $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $current_page = max(1, min($current_page, $total_pages));
            $offset = ($current_page - 1) * $posts_per_page;
            $visible_blogs = array_slice($blogs, $offset, $posts_per_page);

            foreach ($visible_blogs as $slug) {
                $data = isset($blog_data[$slug]) ? $blog_data[$slug] : get_blog_post_meta($blog_dir, $slug);
                $data['image'] = find_relevant_blog_image($blog_dir, $slug, $data['title'], $data['image']);
            ?>
                <article class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="aspect-[16/9] w-full overflow-hidden bg-gray-50 flex items-center justify-center border-b border-gray-100">
                        <img src="/blog/<?php echo htmlspecialchars(ltrim($data['image'], '/')); ?>" alt="<?php echo htmlspecialchars($data['title']); ?>" class="w-full h-full object-contain hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <span class="inline-block bg-secondary-600 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3"><?php echo htmlspecialchars($data['category']); ?></span>
                        <h3 class="text-lg font-bold text-gray-800 mb-3 leading-snug">
                            <a href="<?php echo $slug; ?>.php" class="hover:text-secondary-600 transition-colors"><?php echo htmlspecialchars($data['title']); ?></a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3"><?php echo htmlspecialchars($data['excerpt']); ?></p>
                        <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                            <span><i data-feather="calendar" class="w-4 h-4 inline mr-1"></i><?php echo htmlspecialchars($data['date']); ?></span>
                            <a href="<?php echo $slug; ?>.php" class="text-accent-500 font-semibold hover:underline flex items-center gap-1">Read More <i data-feather="arrow-right" class="w-4 h-4"></i></a>
                        </div>
                    </div>
                </article>
            <?php } ?>

            <?php if (count($blogs) == 0) { ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-600 text-lg">New blog posts coming soon! Stay tuned for health tips and medical information.</p>
                </div>
            <?php } ?>
        </div>

        <?php if ($total_pages > 1) { ?>
            <nav class="mt-12 flex flex-wrap items-center justify-center gap-2" aria-label="Blog pagination">
                <?php if ($current_page > 1) { ?>
                    <a href="?page=<?php echo $current_page - 1; ?>" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:border-secondary-600 hover:text-secondary-600 transition-colors">
                        <i data-feather="arrow-left" class="w-4 h-4"></i>
                        Previous
                    </a>
                <?php } ?>

                <?php
                $start_page = max(1, $current_page - 2);
                $end_page = min($total_pages, $current_page + 2);

                if ($start_page > 1) {
                ?>
                    <a href="?page=1" class="inline-flex h-10 min-w-10 items-center justify-center rounded-lg border border-gray-300 bg-white px-3 text-sm font-semibold text-gray-700 hover:border-secondary-600 hover:text-secondary-600 transition-colors">1</a>
                    <?php if ($start_page > 2) { ?>
                        <span class="px-2 text-gray-400">...</span>
                    <?php } ?>
                <?php } ?>

                <?php for ($page = $start_page; $page <= $end_page; $page++) { ?>
                    <?php if ($page === $current_page) { ?>
                        <span class="inline-flex h-10 min-w-10 items-center justify-center rounded-lg bg-secondary-600 px-3 text-sm font-bold text-white" aria-current="page"><?php echo $page; ?></span>
                    <?php } else { ?>
                        <a href="?page=<?php echo $page; ?>" class="inline-flex h-10 min-w-10 items-center justify-center rounded-lg border border-gray-300 bg-white px-3 text-sm font-semibold text-gray-700 hover:border-secondary-600 hover:text-secondary-600 transition-colors"><?php echo $page; ?></a>
                    <?php } ?>
                <?php } ?>

                <?php if ($end_page < $total_pages) { ?>
                    <?php if ($end_page < $total_pages - 1) { ?>
                        <span class="px-2 text-gray-400">...</span>
                    <?php } ?>
                    <a href="?page=<?php echo $total_pages; ?>" class="inline-flex h-10 min-w-10 items-center justify-center rounded-lg border border-gray-300 bg-white px-3 text-sm font-semibold text-gray-700 hover:border-secondary-600 hover:text-secondary-600 transition-colors"><?php echo $total_pages; ?></a>
                <?php } ?>

                <?php if ($current_page < $total_pages) { ?>
                    <a href="?page=<?php echo $current_page + 1; ?>" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:border-secondary-600 hover:text-secondary-600 transition-colors">
                        Next
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                <?php } ?>
            </nav>
        <?php } ?>
    </main>

    <?php include __DIR__ . '/../components/footer.php'; ?>

    <script>
        feather.replace();
    </script>
</body>

</html>
