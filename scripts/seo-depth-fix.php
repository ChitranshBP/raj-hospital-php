<?php

$targets = [
    'blog/can-allergies-cause-headaches.php',
    'blog/how-raj-hospitals-hepls-stroke-treatment-in-ranchi.php',
    'blog/immunity-kaise-badhaye.php',
    'blog/joint-pain-treatment-ranchi.php',
    'blog/physical-therapy-for-headaches-benefits-techniques-treatment.php',
];

$block = <<<'HTML'

                <!-- RAJ SEO DEPTH START -->
                <section class="mt-8 bg-orange-50 border border-orange-100 rounded-xl p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Practical Next Steps for Patients</h2>
                    <p class="text-gray-700 mb-4">If symptoms are mild, start by noting their frequency, duration, triggers, and any medicine already taken. This simple symptom diary helps the doctor understand whether the pattern is occasional, seasonal, injury-related, infection-related, lifestyle-related, or linked with an underlying medical condition. Patients should also carry old prescriptions, blood reports, imaging reports, and discharge summaries if available.</p>
                    <p class="text-gray-700 mb-4">Do not wait for symptoms to become severe before taking advice. Early consultation is especially important when symptoms affect sleep, work, walking, breathing, appetite, concentration, or daily activity. At RAJ Hospital, the care team can guide patients on whether they need emergency care, outpatient consultation, physiotherapy, diagnostic testing, medicine review, or follow-up with a specialist department.</p>
                    <p class="text-gray-700">For long-term prevention, focus on regular checkups, balanced diet, hydration, safe exercise, correct posture, adequate sleep, stress control, and avoiding tobacco. These steps support recovery and reduce the chances of repeated episodes, but they should be personalised according to age, pregnancy status, chronic illness, and current medications.</p>
                </section>
                <!-- RAJ SEO DEPTH END -->
HTML;

foreach ($targets as $relativePath) {
    $path = dirname(__DIR__) . '/' . $relativePath;
    if (!is_file($path)) {
        continue;
    }

    $html = file_get_contents($path);
    if (strpos($html, 'RAJ SEO DEPTH START') !== false) {
        continue;
    }

    if (strpos($html, '<!-- RAJ SEO ENHANCEMENT END -->') !== false) {
        $html = str_replace('<!-- RAJ SEO ENHANCEMENT END -->', '<!-- RAJ SEO ENHANCEMENT END -->' . $block, $html);
    } elseif (preg_match_all('/<\/article>/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
        $last = end($matches[0]);
        $pos = $last[1];
        $html = substr($html, 0, $pos) . $block . "\n" . substr($html, $pos);
    }

    file_put_contents($path, $html);
    echo "Updated {$path}\n";
}
