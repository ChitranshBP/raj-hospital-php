<?php

$root = dirname(__DIR__);
$blogDir = $root . '/blog';
$excluded = ['index.php', 'gallery.php'];

$posts = collectPosts($blogDir, $excluded);
$updated = 0;

foreach ($posts as $slug => $post) {
    $path = $post['path'];
    $html = file_get_contents($path);

    if ($html === false) {
        continue;
    }

    $original = $html;
    $related = relatedPosts($slug, $posts, 7);
    $faqs = buildFaqs($post, $related);

    if (strpos($html, 'RAJ SEO ENHANCEMENT START') === false) {
        $html = insertBeforeArticleEnd($html, buildEnhancementHtml($post, $related, $faqs));
    }

    if (strpos($html, 'RAJ SEO FAQ SCHEMA START') === false) {
        $html = insertBeforeHeadEnd($html, buildFaqSchema($post, $faqs));
    }

    if ($html !== $original) {
        file_put_contents($path, $html);
        $updated++;
        echo "Updated {$path}\n";
    }
}

echo "Updated {$updated} blog files.\n";

function collectPosts($blogDir, $excluded)
{
    $posts = [];
    foreach (scandir($blogDir) as $file) {
        if (in_array($file, $excluded, true) || pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
            continue;
        }

        $slug = pathinfo($file, PATHINFO_FILENAME);
        $path = $blogDir . '/' . $file;
        $html = file_get_contents($path);
        $title = ucwords(str_replace('-', ' ', $slug));
        $description = '';

        if (preg_match('/<title>(.*?)<\/title>/is', $html, $matches)) {
            $title = trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES, 'UTF-8'));
        }

        if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\']([^"\']+)["\']/i', $html, $matches)) {
            $description = trim(html_entity_decode($matches[1], ENT_QUOTES, 'UTF-8'));
        }

        $posts[$slug] = [
            'slug' => $slug,
            'path' => $path,
            'url' => '/blog/' . $slug . '.php',
            'title' => cleanTitle($title, $slug),
            'description' => $description,
            'topic' => topicLabel($slug . ' ' . $title . ' ' . $description),
            'tokens' => tokens($slug . ' ' . $title . ' ' . $description),
        ];
    }

    return $posts;
}

function cleanTitle($title, $slug)
{
    $title = preg_replace('/\s+\|\s+RAJ Hospital.*$/i', '', $title);
    $title = preg_replace('/\s+-\s+Complete.*$/i', '', $title);
    $title = trim($title);
    return $title !== '' ? $title : ucwords(str_replace('-', ' ', $slug));
}

function tokens($text)
{
    $text = strtolower($text);
    $parts = preg_split('/[^a-z0-9]+/', $text);
    $stop = array_flip(['the', 'and', 'for', 'with', 'that', 'this', 'hai', 'hindi', 'kya', 'kaise', 'mein', 'aur', 'ke', 'ka', 'ki', 'raj', 'hospital', 'ranchi', 'complete', 'guide', 'symptoms', 'treatment', 'causes', 'health']);
    $tokens = [];
    foreach ($parts as $part) {
        if (strlen($part) > 2 && !isset($stop[$part])) {
            $tokens[$part] = true;
        }
    }
    return array_keys($tokens);
}

function topicLabel($text)
{
    $text = strtolower($text);
    $groups = [
        'heart and blood pressure care' => ['heart', 'cardiac', 'bp', 'blood pressure', 'pulse', 'stroke', 'attack'],
        'women, pregnancy, and child health' => ['pregnancy', 'pregnant', 'maternity', 'pcod', 'pcos', 'women', 'breast', 'cervical', 'newborn', 'baby'],
        'diabetes and metabolic health' => ['diabetes', 'sugar', 'diet', 'moringa'],
        'cancer awareness and early diagnosis' => ['cancer', 'tumor', 'oncology'],
        'pain, bones, joints, and neurological symptoms' => ['bone', 'joint', 'pain', 'orthopedic', 'cervical', 'back', 'headache', 'migraine', 'toothache', 'fits'],
        'infection and fever care' => ['hiv', 'aids', 'infection', 'chicken', 'chikungunya', 'coronavirus', 'fever'],
        'breathing and respiratory care' => ['asthma', 'saans', 'lungs', 'throat', 'breathing', 'allergies'],
        'digestive and general health' => ['gas', 'acidity', 'liver', 'kidney', 'food poisoning', 'dehydration', 'sgpt', 'sgot', 'haemoglobin'],
    ];

    foreach ($groups as $label => $keys) {
        foreach ($keys as $key) {
            if (strpos($text, $key) !== false) {
                return $label;
            }
        }
    }

    return 'preventive health and specialist consultation';
}

function relatedPosts($slug, $posts, $limit)
{
    $source = $posts[$slug];
    $scores = [];

    foreach ($posts as $candidateSlug => $candidate) {
        if ($candidateSlug === $slug) {
            continue;
        }

        $score = 0;
        if ($candidate['topic'] === $source['topic']) {
            $score += 15;
        }

        $overlap = array_intersect($source['tokens'], $candidate['tokens']);
        $score += count($overlap) * 4;

        foreach ($source['tokens'] as $token) {
            if (strpos($candidateSlug, $token) !== false) {
                $score += 2;
            }
        }

        $scores[$candidateSlug] = $score;
    }

    arsort($scores);
    $related = [];
    foreach (array_keys($scores) as $candidateSlug) {
        $related[] = $posts[$candidateSlug];
        if (count($related) >= $limit) {
            break;
        }
    }

    return $related;
}

function buildFaqs($post, $related)
{
    $topic = $post['topic'];
    $title = $post['title'];
    $relatedTitle = $related[0]['title'] ?? 'related health guides';

    return [
        [
            'q' => 'When should I consult a doctor for ' . $title . '?',
            'a' => 'You should consult a doctor if symptoms are severe, recurring, worsening, associated with fever, chest pain, breathing difficulty, weakness, fainting, unexplained weight loss, or if home care does not help within a reasonable time. Early evaluation helps identify the real cause and prevents complications.',
        ],
        [
            'q' => 'Can ' . $title . ' be connected with other health problems?',
            'a' => 'Yes. Many symptoms overlap with other conditions, so it is useful to review related topics such as ' . $relatedTitle . '. A doctor may advise examination, blood tests, imaging, ECG, or specialist consultation depending on the pattern and duration of symptoms.',
        ],
        [
            'q' => 'What information should I share with the doctor?',
            'a' => 'Share when symptoms started, how often they occur, what makes them better or worse, current medicines, allergies, past illness, family history, lifestyle habits, and any recent reports. This makes diagnosis faster and helps the medical team choose safer treatment.',
        ],
        [
            'q' => 'Is self-medication safe for this condition?',
            'a' => 'Self-medication can hide important warning signs or interact with existing medicines. Basic rest, hydration, and healthy diet may help in mild cases, but persistent or severe symptoms should be checked by a qualified clinician at RAJ Hospital or your nearest healthcare facility.',
        ],
        [
            'q' => 'How can I reduce future risk related to ' . $topic . '?',
            'a' => 'Maintain regular checkups, follow prescribed medicines, avoid tobacco and excess alcohol, eat balanced meals, sleep well, exercise according to your doctor’s advice, and do not ignore new symptoms. Prevention works best when small warning signs are reviewed early.',
        ],
    ];
}

function buildEnhancementHtml($post, $related, $faqs)
{
    $topic = htmlspecialchars($post['topic'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($post['description'], ENT_QUOTES, 'UTF-8');

    $links = '';
    foreach (array_slice($related, 0, 7) as $item) {
        $anchor = richAnchor($post, $item);
        $links .= "\n                        <li><a href=\"" . htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8') . "\" class=\"text-secondary-600 hover:underline font-semibold\">" . htmlspecialchars($anchor, ENT_QUOTES, 'UTF-8') . "</a></li>";
    }

    $faqHtml = '';
    foreach ($faqs as $faq) {
        $faqHtml .= "\n                    <div class=\"bg-gray-50 p-4 rounded-lg border border-gray-100\">\n                        <h3 class=\"font-bold text-gray-800 mb-2\">" . htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8') . "</h3>\n                        <p class=\"text-gray-700\">" . htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8') . "</p>\n                    </div>";
    }

    return <<<HTML

                <!-- RAJ SEO ENHANCEMENT START -->
                <section class="mt-10 bg-blue-50 border border-blue-100 rounded-xl p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Doctor-Guided Notes on {$title}</h2>
                    <p class="text-gray-700 mb-4">{$description}</p>
                    <p class="text-gray-700 mb-4">For patients and families in Ranchi, the most important step is to connect symptoms with the right medical context. {$title} may look simple in the beginning, but the actual cause can vary from lifestyle factors and infections to long-term medical conditions. A careful clinical history, physical examination, and relevant investigations help doctors decide whether the issue needs urgent care, medicine, lifestyle correction, observation, or specialist treatment.</p>
                    <p class="text-gray-700 mb-4">At RAJ Hospital, the approach to {$topic} focuses on early diagnosis, practical counselling, and timely referral when needed. Patients should avoid delaying consultation if symptoms are repeated, intense, unusual, or affecting daily routine. This is especially important for children, elderly patients, pregnant women, people with diabetes, people with high blood pressure, and anyone already taking regular medicines.</p>
                    <p class="text-gray-700 mb-4">A good way to prepare for consultation is to write down the timeline of symptoms, triggers, medicines already taken, previous reports, and any family history. This small step often improves the quality of diagnosis. If symptoms change suddenly or are associated with warning signs like chest discomfort, breathing difficulty, weakness on one side, confusion, severe dehydration, uncontrolled fever, fainting, or severe pain, emergency care should be preferred over waiting.</p>
                    <p class="text-gray-700 mb-4">This article is for awareness and education. It should not replace a doctor’s advice, because treatment depends on age, medical history, examination findings, and test results. If you are unsure about your symptoms, book an appointment with the appropriate specialist at RAJ Hospital for a personalised plan.</p>
                </section>

                <section class="mt-8 bg-white border border-gray-200 rounded-xl p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Related Health Guides from RAJ Hospital</h2>
                    <p class="text-gray-700 mb-4">You may also find these medically relevant guides useful for understanding connected symptoms, risk factors, prevention, and treatment options:</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-700">{$links}
                    </ul>
                </section>

                <section class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 border-b-2 border-secondary-600 pb-2 mb-4">Frequently Asked Questions</h2>
                    <div class="space-y-4">{$faqHtml}
                    </div>
                </section>
                <!-- RAJ SEO ENHANCEMENT END -->
HTML;
}

function richAnchor($source, $target)
{
    $targetTitle = preg_replace('/\s+/', ' ', $target['title']);
    return 'Read this related guide on ' . $targetTitle;
}

function buildFaqSchema($post, $faqs)
{
    $items = [];
    foreach ($faqs as $faq) {
        $items[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a'],
            ],
        ];
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items,
    ];

    $json = json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    return "\n    <!-- RAJ SEO FAQ SCHEMA START -->\n    <script type=\"application/ld+json\">\n{$json}\n    </script>\n    <!-- RAJ SEO FAQ SCHEMA END -->\n";
}

function insertBeforeHeadEnd($html, $insertion)
{
    if (stripos($html, '</head>') !== false) {
        return preg_replace('/<\/head>/i', $insertion . "\n</head>", $html, 1);
    }
    return $insertion . "\n" . $html;
}

function insertBeforeArticleEnd($html, $insertion)
{
    if (stripos($html, '<!-- Author Box -->') !== false) {
        return preg_replace('/\s*<!-- Author Box -->/i', $insertion . "\n\n                <!-- Author Box -->", $html, 1);
    }

    if (preg_match_all('/<\/article>/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
        $last = end($matches[0]);
        $pos = $last[1];
        return substr($html, 0, $pos) . $insertion . "\n" . substr($html, $pos);
    }

    if (stripos($html, '</main>') !== false) {
        return preg_replace('/<\/main>/i', $insertion . "\n</main>", $html, 1);
    }

    return $html . $insertion;
}
