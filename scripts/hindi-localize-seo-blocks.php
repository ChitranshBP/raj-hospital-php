<?php

$root = dirname(__DIR__);
$blogDir = $root . '/blog';
$excluded = ['index.php', 'gallery.php'];
$posts = collectPosts($blogDir, $excluded);
$updated = 0;

foreach ($posts as $slug => $post) {
    if (!$post['is_hindi']) {
        continue;
    }

    $html = file_get_contents($post['path']);
    $original = $html;
    $related = relatedPosts($slug, $posts, 7);
    $faqs = hindiFaqs($post, $related);

    $html = preg_replace(
        '/\s*<!-- RAJ SEO FAQ SCHEMA START -->.*?<!-- RAJ SEO FAQ SCHEMA END -->\s*/s',
        "\n" . hindiFaqSchema($faqs) . "\n",
        $html,
        1
    );

    $html = preg_replace(
        '/\s*<!-- RAJ SEO ENHANCEMENT START -->.*?<!-- RAJ SEO ENHANCEMENT END -->\s*/s',
        "\n" . hindiEnhancementHtml($post, $related, $faqs) . "\n",
        $html,
        1
    );

    if ($html !== $original) {
        file_put_contents($post['path'], $html);
        $updated++;
        echo "Hindi localized {$post['path']}\n";
    }
}

echo "Hindi localized {$updated} blog files.\n";

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

        $isHindi = preg_match('/<html\s+lang=["\']hi["\']/i', $html)
            || preg_match('/hindi|हिंदी|हिन्दी/i', $slug . ' ' . $title . ' ' . $description)
            || preg_match('/[\x{0900}-\x{097F}]/u', $title . ' ' . $description);

        $posts[$slug] = [
            'slug' => $slug,
            'path' => $path,
            'url' => '/blog/' . $slug . '.php',
            'title' => cleanTitle($title, $slug),
            'description' => $description,
            'topic' => hindiTopicLabel($slug . ' ' . $title . ' ' . $description),
            'tokens' => tokens($slug . ' ' . $title . ' ' . $description),
            'is_hindi' => (bool) $isHindi,
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

function hindiTopicLabel($text)
{
    $text = strtolower($text);
    $groups = [
        'हृदय और ब्लड प्रेशर की देखभाल' => ['heart', 'cardiac', 'bp', 'blood pressure', 'pulse', 'stroke', 'attack'],
        'महिला, गर्भावस्था और शिशु स्वास्थ्य' => ['pregnancy', 'pregnant', 'maternity', 'pcod', 'pcos', 'women', 'breast', 'cervical', 'newborn', 'baby'],
        'डायबिटीज और मेटाबॉलिक स्वास्थ्य' => ['diabetes', 'sugar', 'diet', 'moringa'],
        'कैंसर जागरूकता और समय पर जांच' => ['cancer', 'tumor', 'oncology'],
        'दर्द, हड्डी, जोड़ और न्यूरोलॉजी से जुड़े लक्षण' => ['bone', 'joint', 'pain', 'orthopedic', 'cervical', 'back', 'headache', 'migraine', 'toothache', 'fits'],
        'इन्फेक्शन और बुखार से जुड़ी देखभाल' => ['hiv', 'aids', 'infection', 'chicken', 'chikungunya', 'coronavirus', 'fever'],
        'सांस और फेफड़ों से जुड़ी देखभाल' => ['asthma', 'saans', 'lungs', 'throat', 'breathing', 'allergies'],
        'पाचन और सामान्य स्वास्थ्य' => ['gas', 'acidity', 'liver', 'kidney', 'food poisoning', 'dehydration', 'sgpt', 'sgot', 'haemoglobin'],
    ];

    foreach ($groups as $label => $keys) {
        foreach ($keys as $key) {
            if (strpos($text, $key) !== false) {
                return $label;
            }
        }
    }

    return 'रोकथाम, सही जांच और विशेषज्ञ सलाह';
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

        $score += count(array_intersect($source['tokens'], $candidate['tokens'])) * 4;
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

function hindiFaqs($post, $related)
{
    $title = $post['title'];
    $topic = $post['topic'];
    $relatedTitle = $related[0]['title'] ?? 'संबंधित स्वास्थ्य गाइड';

    return [
        [
            'q' => $title . ' में डॉक्टर को कब दिखाना चाहिए?',
            'a' => 'अगर लक्षण तेज हैं, बार-बार हो रहे हैं, धीरे-धीरे बढ़ रहे हैं, बुखार, सीने में दर्द, सांस लेने में परेशानी, बेहोशी, कमजोरी, अचानक वजन कम होना या घरेलू उपाय से आराम न मिलना जैसी स्थिति हो, तो डॉक्टर से जांच करानी चाहिए। समय पर जांच से असली कारण समझने और जटिलताओं से बचने में मदद मिलती है।',
        ],
        [
            'q' => 'क्या ' . $title . ' दूसरी स्वास्थ्य समस्याओं से जुड़ा हो सकता है?',
            'a' => 'हां, कई लक्षण अलग-अलग बीमारियों में मिलते-जुलते हो सकते हैं। इसलिए ' . $relatedTitle . ' जैसे संबंधित विषयों को समझना उपयोगी है। जरूरत के अनुसार डॉक्टर जांच, ब्लड टेस्ट, इमेजिंग, ईसीजी या विशेषज्ञ परामर्श की सलाह दे सकते हैं।',
        ],
        [
            'q' => 'डॉक्टर को कौन-कौन सी जानकारी बतानी चाहिए?',
            'a' => 'लक्षण कब शुरू हुए, कितनी बार होते हैं, किससे बढ़ते या कम होते हैं, अभी कौन सी दवाएं चल रही हैं, एलर्जी, पुरानी बीमारी, परिवार का इतिहास, जीवनशैली और पुराने टेस्ट रिपोर्ट डॉक्टर को जरूर बताएं। इससे निदान तेज और उपचार ज्यादा सुरक्षित होता है।',
        ],
        [
            'q' => 'क्या इस समस्या में खुद से दवा लेना सुरक्षित है?',
            'a' => 'खुद से दवा लेने से जरूरी warning signs छिप सकते हैं या दवाओं का interaction हो सकता है। हल्की समस्या में आराम, पानी और संतुलित भोजन मदद कर सकते हैं, लेकिन लगातार या गंभीर लक्षणों में RAJ Hospital या नजदीकी योग्य डॉक्टर से सलाह लेना बेहतर है।',
        ],
        [
            'q' => $topic . ' से जुड़ा जोखिम कम कैसे करें?',
            'a' => 'नियमित जांच, डॉक्टर की बताई दवाएं, तंबाकू और ज्यादा शराब से दूरी, संतुलित भोजन, अच्छी नींद, डॉक्टर की सलाह के अनुसार exercise और नए लक्षणों को नज़रअंदाज़ न करना जरूरी है। रोकथाम सबसे अच्छी तब होती है जब छोटे warning signs पर भी समय पर सलाह ली जाए।',
        ],
    ];
}

function hindiEnhancementHtml($post, $related, $faqs)
{
    $topic = htmlspecialchars($post['topic'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($post['description'], ENT_QUOTES, 'UTF-8');

    $links = '';
    foreach (array_slice($related, 0, 7) as $item) {
        $links .= "\n                        <li><a href=\"" . htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8') . "\" class=\"text-secondary-600 hover:underline font-semibold\">इस संबंधित गाइड को पढ़ें: " . htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') . "</a></li>";
    }

    $faqHtml = '';
    foreach ($faqs as $faq) {
        $faqHtml .= "\n                    <div class=\"bg-gray-50 p-4 rounded-lg border border-gray-100\">\n                        <h3 class=\"font-bold text-gray-800 mb-2\">" . htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8') . "</h3>\n                        <p class=\"text-gray-700\">" . htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8') . "</p>\n                    </div>";
    }

    return <<<HTML
                <!-- RAJ SEO ENHANCEMENT START -->
                <section class="mt-10 bg-blue-50 border border-blue-100 rounded-xl p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">{$title} पर डॉक्टर की सलाह</h2>
                    <p class="text-gray-700 mb-4">{$description}</p>
                    <p class="text-gray-700 mb-4">रांची और आसपास के मरीजों के लिए सबसे जरूरी बात यह है कि लक्षणों को सही medical context में समझा जाए। {$title} शुरुआत में सामान्य लग सकता है, लेकिन इसका कारण lifestyle, infection, hormone imbalance, पुरानी बीमारी, medicine side effect या किसी गंभीर condition से जुड़ा हो सकता है। सही history, physical examination और जरूरत के अनुसार जांच से डॉक्टर यह तय कर पाते हैं कि emergency care, दवा, lifestyle correction, observation या specialist consultation में से क्या जरूरी है।</p>
                    <p class="text-gray-700 mb-4">RAJ Hospital में {$topic} से जुड़े मामलों में early diagnosis, practical counselling और timely referral पर ध्यान दिया जाता है। अगर लक्षण बार-बार आते हैं, तेज हैं, रोजमर्रा के काम को प्रभावित कर रहे हैं या अचानक pattern बदल रहा है, तो consultation delay नहीं करना चाहिए। बच्चों, बुजुर्गों, गर्भवती महिलाओं, diabetes, high BP या regular medicines लेने वाले मरीजों में यह और भी महत्वपूर्ण है।</p>
                    <p class="text-gray-700 mb-4">Doctor visit से पहले symptoms की timeline, triggers, ली गई medicines, पुराने reports और family history लिख लेना उपयोगी रहता है। इससे diagnosis बेहतर होता है और unnecessary delay कम होता है। अगर chest discomfort, सांस फूलना, एक तरफ कमजोरी, confusion, severe dehydration, uncontrolled fever, fainting या severe pain जैसे warning signs हों, तो appointment का इंतज़ार करने के बजाय emergency care लें।</p>
                    <p class="text-gray-700 mb-4">यह लेख awareness और education के लिए है। इसे doctor की personal advice का विकल्प न मानें, क्योंकि treatment age, medical history, examination और test reports पर निर्भर करता है। अपने symptoms को लेकर संदेह हो तो RAJ Hospital में संबंधित specialist से मिलकर personalized treatment plan लें।</p>
                </section>

                <section class="mt-8 bg-white border border-gray-200 rounded-xl p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">RAJ Hospital के संबंधित स्वास्थ्य गाइड</h2>
                    <p class="text-gray-700 mb-4">जुड़े हुए symptoms, risk factors, prevention और treatment options समझने के लिए ये गाइड भी पढ़ें:</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-700">{$links}
                    </ul>
                </section>

                <section class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 border-b-2 border-secondary-600 pb-2 mb-4">अक्सर पूछे जाने वाले सवाल</h2>
                    <div class="space-y-4">{$faqHtml}
                    </div>
                </section>
                <!-- RAJ SEO ENHANCEMENT END -->
HTML;
}

function hindiFaqSchema($faqs)
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
    return "    <!-- RAJ SEO FAQ SCHEMA START -->\n    <script type=\"application/ld+json\">\n{$json}\n    </script>\n    <!-- RAJ SEO FAQ SCHEMA END -->";
}
