<?php
// Medical Disclaimer Component
// Shown on every blog post immediately below the H1 and before the article content.
// Inline styles keep the box red and high-contrast even if Tailwind fails to load
// (white on #b91c1c is about 6.5:1, WCAG AA). The data-raj-medical-disclaimer
// attribute is the marker the blog safety net in navbar.php looks for.
if (!function_exists('raj_medical_disclaimer_html')) {
    function raj_medical_disclaimer_html()
    {
        return '<div data-raj-medical-disclaimer role="note" aria-label="Medical Disclaimer" '
            . 'style="background:#b91c1c;color:#ffffff;border-radius:0.5rem;padding:0.875rem 1rem;margin:0.75rem 0 1rem;font-size:0.9375rem;line-height:1.6;text-align:left;">'
            . '<strong style="color:#ffffff;">Medical Disclaimer:</strong> '
            . 'This article is AI-assisted and intended for general informational purposes only. '
            . 'It does not replace professional medical advice, diagnosis, or treatment. '
            . 'Please consult a qualified healthcare specialist for advice specific to your condition.'
            . '</div>';
    }
}

if (empty($raj_disclaimer_define_only)) {
    echo raj_medical_disclaimer_html();
}
