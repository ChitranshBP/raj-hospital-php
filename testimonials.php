<?php $base_url = './'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Feedback | Raj Hospitals</title>
    <meta name="description" content="Share feedback about your experience at Raj Hospitals, Ranchi, or raise a concern." />
    <meta name="robots" content="noindex, follow" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .fade-in { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
        .fade-in-visible { opacity: 1; transform: translateY(0); }
    </style>
        <meta name="author" content="Raj Hospital" />
    <meta name="publisher" content="Raj Hospital" />
    <link rel="canonical" href="https://rajhospitals.com/testimonials" />

    <!-- Open Graph -->
    <meta property="og:title" content="Patient Feedback | Raj Hospitals" />
    <meta property="og:description" content="Share feedback about your experience at Raj Hospitals, Ranchi, or raise a concern." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://rajhospitals.com/testimonials" />
    <meta property="og:image" content="https://rajhospitals.com/assets/home-img/Raj-hospital-image.webp" />
    <meta property="og:site_name" content="Raj Hospitals" />

    <!-- Hospital Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Hospital",
      "name": "Raj Hospital",
      "url": "https://rajhospitals.com/",
      "telephone": "+91-9771488888",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Mahatma Gandhi Main Road",
        "addressLocality": "Ranchi",
        "addressRegion": "Jharkhand",
        "postalCode": "834001",
        "addressCountry": "IN"
      }
    }
    </script>
</head>
<body class="bg-white">

    <?php include $base_url . 'components/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-[#fef5f3] to-[#f0fbff] mt-32 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center fade-in">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Patient <span class="text-[#ea5234]">Feedback</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                In line with the National Medical Commission's guidelines on ethical advertising, we do not publish patient testimonials or treatment stories on this website.
                </p>
            </div>
        </div>
    </section>

    <!-- Feedback Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-md p-8 fade-in">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Share your feedback</h2>
                <p class="text-gray-700 mb-6">We would like to hear about your experience at Raj Hospitals, including anything we could do better. Feedback is used to improve our services and is not published on this website.</p>
                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-center gap-3"><i data-feather="phone" class="w-5 h-5 text-[#ea5234]"></i><a href="tel:+919771488888" class="hover:text-[#ea5234]">+91 977 14 88888</a></li>
                    <li class="flex items-center gap-3"><i data-feather="mail" class="w-5 h-5 text-[#ea5234]"></i><a href="mailto:info@rajhospitals.com" class="hover:text-[#ea5234]">info@rajhospitals.com</a></li>
                    <li class="flex items-center gap-3"><i data-feather="message-square" class="w-5 h-5 text-[#ea5234]"></i><a href="/contact.php" class="hover:text-[#ea5234]">Contact form (choose &ldquo;Feedback&rdquo; as the subject)</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include $base_url . 'components/footer.php'; ?>

    <script>
        // Navbar scroll effect
        const header = document.getElementById('main-header');
        const logo = document.getElementById('main-logo');
        const logoContainer = document.getElementById('logo-container');
        const navTopRow = document.getElementById('nav-top-row');

        window.addEventListener('scroll', () => {
             if (window.scrollY > 50) {
                header.classList.add('py-1');
                 logo.classList.remove('w-[90px]', 'h-[90px]', 'sm:w-[125px]', 'sm:h-[125px]', 'md:w-[145px]', 'md:h-[145px]', 'lg:w-[180px]', 'lg:h-[180px]');
                logo.classList.add('w-12', 'h-12', 'md:w-16', 'md:h-16');
                 navTopRow.style.height = '0';
                navTopRow.style.opacity = '0';
                navTopRow.style.marginTop = '0';
            } else {
                 header.classList.remove('py-1');
                  logo.classList.add('w-[90px]', 'h-[90px]', 'sm:w-[125px]', 'sm:h-[125px]', 'md:w-[145px]', 'md:h-[145px]', 'lg:w-[180px]', 'lg:h-[180px]');
                logo.classList.remove('w-12', 'h-12', 'md:w-16', 'md:h-16');
                 navTopRow.style.height = 'auto'; 
                navTopRow.style.opacity = '1';
                navTopRow.style.marginTop = '';
            }
        });

        // Fade-in animation
        const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
