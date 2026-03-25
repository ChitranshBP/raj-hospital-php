<?php $base_url = './'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Raj Hospital Ranchi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .check-animation {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: dash 1.5s ease-in-out forwards;
        }

        @keyframes dash {
            to {
                stroke-dashoffset: 0;
            }
        }
    </style>
        <meta name="author" content="Raj Hospital" />
    <meta name="publisher" content="Raj Hospital" />
    <link rel="canonical" href="https://rajhospitals.com/thankyou" />
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

    <?php include $base_url . 'components/navbar.php'; ?>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center pt-32 pb-20 px-4">
        <div class="max-w-2xl w-full text-center fade-in" id="thank-you-content">
            <!-- Success Icon -->
            <div class="mb-8 flex justify-center">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path class="check-animation" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Message -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Thank You!</h1>
            <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                Your message has been successfully received. Our medical coordination team will review your inquiry and get back to you within 24 hours.
            </p>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="index.php" class="w-full sm:w-auto bg-[#ea5234] text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-[#d64528] transition-all transform hover:scale-105 shadow-md flex items-center justify-center space-x-2">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span>Back to Home</span>
                </a>
                <a href="find-a-doctor.php" class="w-full sm:w-auto bg-white text-gray-700 border-2 border-gray-200 px-8 py-4 rounded-lg font-bold text-lg hover:border-[#ea5234] hover:text-[#ea5234] transition-all transform hover:scale-105 shadow-sm flex items-center justify-center space-x-2">
                    <i data-feather="user" class="w-5 h-5"></i>
                    <span>Find a Doctor</span>
                </a>
            </div>

            <!-- Additional Help -->
            <div class="mt-16 pt-8 border-t border-gray-200">
                <p class="text-sm text-gray-500 mb-4">Need immediate assistance?</p>
                <div class="flex items-center justify-center space-x-6">
                    <a href="tel:+919771488888" class="flex items-center text-[#ea5234] font-semibold hover:underline">
                        <i data-feather="phone" class="w-4 h-4 mr-2"></i>
                        +91-9771488888
                    </a>
                    <a href="mailto:info@rajhospitals.com" class="flex items-center text-[#ea5234] font-semibold hover:underline">
                        <i data-feather="mail" class="w-4 h-4 mr-2"></i>
                        info@rajhospitals.com
                    </a>
                </div>
            </div>
        </div>
    </main>

    <?php include $base_url . 'components/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Feather Icons
            feather.replace();

            // Reveal content
            setTimeout(() => {
                const content = document.getElementById('thank-you-content');
                content.classList.add('fade-in-visible');
            }, 100);
        });

        // Header Scroll Effect (for consistency with other pages)
        const header = document.getElementById('main-header');
        const logo = document.getElementById('main-logo');
        const navTopRow = document.getElementById('nav-top-row');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                if (header) header.classList.add('py-1');
                if (logo) {
                    logo.classList.remove('w-[90px]', 'h-[90px]', 'sm:w-[125px]', 'sm:h-[125px]', 'md:w-[145px]', 'md:h-[145px]', 'lg:w-[180px]', 'lg:h-[180px]');
                    logo.classList.add('w-12', 'h-12', 'md:w-16', 'md:h-16');
                }
                if (navTopRow) {
                    navTopRow.style.height = '0';
                    navTopRow.style.opacity = '0';
                    navTopRow.style.marginTop = '0';
                }
            } else {
                if (header) header.classList.remove('py-1');
                if (logo) {
                    logo.classList.add('w-[90px]', 'h-[90px]', 'sm:w-[125px]', 'sm:h-[125px]', 'md:w-[145px]', 'md:h-[145px]', 'lg:w-[180px]', 'lg:h-[180px]');
                    logo.classList.remove('w-12', 'h-12', 'md:w-16', 'md:h-16');
                }
                if (navTopRow) {
                    navTopRow.style.height = 'auto';
                    navTopRow.style.opacity = '1';
                    navTopRow.style.marginTop = '';
                }
            }
        });
    </script>
</body>

</html>
