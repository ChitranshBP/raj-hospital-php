<!DOCTYPE html>
<html lang="en">

<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo isset($pageTitle) ? $pageTitle : "Raj Hospitals"; ?>
    </title>
    <meta name="description"
        content="<?php echo isset($pageDescription) ? $pageDescription : "Raj Hospitals - Best Multi Specialty Hospital in Ranchi"; ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Raj Hospital, Ranchi">
    <meta name="publisher" content="Raj Hospital, Ranchi">
    <?php if (isset($pageKeywords)): ?>
        <meta name="keywords" content="<?php echo htmlspecialchars($pageKeywords); ?>">
    <?php endif; ?>
    <?php if (isset($canonicalUrl)): ?>
        <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <?php endif; ?>
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Raj Hospitals'; ?>">
    <meta property="og:description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Raj Hospitals - Best Multi Specialty Hospital in Ranchi'; ?>">
    <meta property="og:type" content="<?php echo isset($ogType) ? $ogType : 'website'; ?>">
    <?php if (isset($ogImage)): ?>
        <meta property="og:image" content="<?php echo htmlspecialchars($ogImage); ?>">
    <?php endif; ?>
    <?php if (isset($canonicalUrl)): ?>
        <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <?php endif; ?>
    <meta property="og:site_name" content="Raj Hospitals, Ranchi">
    <!-- Usermaven Tracking -->
    <script type="text/javascript">
        (function () {
            window.usermaven = window.usermaven || (function () { (window.usermavenQ = window.usermavenQ || []).push(arguments); })
            var t = document.createElement('script'),
                s = document.getElementsByTagName('script')[0];
            t.defer = true;
            t.id = 'um-tracker';
            t.setAttribute('data-tracking-host', "https://events.usermaven.com")
            t.setAttribute('data-key', 'UMsCCA98cX');
            t.setAttribute('data-autocapture', 'true');
            t.setAttribute('data-form-tracking', 'all');
            t.src = 'https://t.usermaven.com/lib.js';
            s.parentNode.insertBefore(t, s);
        })();
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef5f3',
                            100: '#fde9e6',
                            200: '#fbd7d0',
                            300: '#f8b8a9',
                            400: '#f4917a',
                            500: '#fc684b',
                            600: '#ea5234',
                            700: '#c4401f',
                            800: '#a2381c',
                            900: '#86341d'
                        },
                        secondary: {
                            50: '#f0fbff',
                            100: '#e0f6fe',
                            200: '#b9edfe',
                            300: '#7cdcfd',
                            400: '#36c8fa',
                            500: '#0eb3e9',
                            600: '#0191c7',
                            700: '#0274a1',
                            800: '#066185',
                            900: '#0b516e'
                        },
                        accent: {
                            100: '#ffedd5',
                            500: '#f97316',
                            600: '#ea580c',
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        /* Custom scrollbar hiding */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Framer Motion mimic */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <!-- RAJ SEO WEBSITE SCHEMA START -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "RAJ Hospital Ranchi",
        "url": "https://rajhospitals.com/",
        "inLanguage": "hi-IN",
        "publisher": {
            "@type": "Organization",
            "name": "RAJ Hospital Ranchi",
            "url": "https://rajhospitals.com",
            "logo": {
                "@type": "ImageObject",
                "url": "https://rajhospitals.com/assets/favicon/raj-favicon-.png"
            }
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://rajhospitals.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    <!-- RAJ SEO WEBSITE SCHEMA END -->

    <!-- RAJ SEO ORGANIZATION SCHEMA START -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "RAJ Hospital Ranchi",
        "url": "https://rajhospitals.com",
        "logo": "https://rajhospitals.com/assets/favicon/raj-favicon-.png",
        "description": "RAJ Hospital Ranchi - Best multispecialty hospital in Ranchi providing quality healthcare services.",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-9876543210",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": ["Hindi", "English"]
        },
        "sameAs": [
            "https://www.facebook.com/rajhospitalsranchi",
            "https://www.instagram.com/rajhospitalsranchi",
            "https://www.youtube.com/@rajhospitalsranchi"
        ]
    }
    </script>
    <!-- RAJ SEO ORGANIZATION SCHEMA END -->

    <!-- RAJ SEO MEDICAL WEBPAGE SCHEMA START -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MedicalWebPage",
        "headline": "<?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'RAJ Hospital Ranchi'; ?>",
        "description": "<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'RAJ Hospital Ranchi - Best multispecialty hospital in Ranchi.'; ?>",
        "url": "<?php echo isset($canonicalUrl) ? htmlspecialchars($canonicalUrl) : 'https://rajhospitals.com/'; ?>",
        "image": "<?php echo isset($ogImage) ? htmlspecialchars($ogImage) : 'https://rajhospitals.com/blog/assets/img/Copy-of-Raj-Hospitals.jpg'; ?>",
        "author": {
            "@type": "Organization",
            "name": "RAJ Hospital Ranchi",
            "url": "https://rajhospitals.com"
        },
        "publisher": {
            "@type": "Organization",
            "name": "RAJ Hospital Ranchi",
            "url": "https://rajhospitals.com",
            "logo": {
                "@type": "ImageObject",
                "url": "https://rajhospitals.com/assets/favicon/raj-favicon-.png"
            }
        },
        "datePublished": "2026-05-22",
        "dateModified": "2026-05-22",
        "mainEntityOfPage": "<?php echo isset($canonicalUrl) ? htmlspecialchars($canonicalUrl) : 'https://rajhospitals.com/'; ?>",
        "inLanguage": "hi-IN",
        "medicalSpecialty": "General Practice"
    }
    </script>
    <!-- RAJ SEO MEDICAL WEBPAGE SCHEMA END -->

    <!-- RAJ SEO BREADCRUMB SCHEMA START -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://rajhospitals.com/"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Blog",
                "item": "https://rajhospitals.com/blog/"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "<?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Blog'; ?>"
            }
        ]
    }
    </script>
    <!-- RAJ SEO BREADCRUMB SCHEMA END -->
</head>

<body class="bg-gray-50">
    <?php include($base_url . 'components/navbar.php'); ?>