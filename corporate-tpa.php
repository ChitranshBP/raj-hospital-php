<?php $base_url = './'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corporate & TPA Services | Raj Hospitals</title>
    <meta name="description" content="Raj Hospital Ranchi offers corporate health checkups and TPA tie-ups with major insurance companies. Cashless treatment available for employees and families." />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Raj Hospital" />
    <meta name="publisher" content="Raj Hospital" />
    <link rel="canonical" href="https://rajhospitals.com/corporate-tpa" />

    <!-- Open Graph -->
    <meta property="og:title" content="Corporate & TPA Services | Raj Hospitals" />
    <meta property="og:description" content="Corporate health checkups and TPA tie-ups with major insurance companies. Cashless treatment at Raj Hospital Ranchi." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://rajhospitals.com/corporate-tpa" />
    <meta property="og:image" content="https://rajhospitals.com/assets/home-img/Raj-hospital-image.webp" />
    <meta property="og:site_name" content="Raj Hospitals" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .fade-in { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
        .fade-in-visible { opacity: 1; transform: translateY(0); }
    </style>
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
                            50: '#fff0e6',
                            100: '#ffd6b3',
                            500: '#ff6b35',
                            600: '#e55a2e',
                            700: '#cc4926',
                        }
                    }
                }
            }
        }
    </script>
        <meta name="author" content="Raj Hospital" />
    <meta name="publisher" content="Raj Hospital" />
    <link rel="canonical" href="https://rajhospitals.com/corporate-tpa" />
</head>
<body class="bg-white">

    <?php include $base_url . 'components/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-[#fef5f3] to-[#f0fbff] mt-32 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center fade-in">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Corporate & <span class="text-[#ea5234]">TPA Services</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Partnering with leading corporations and TPAs to provide world-class healthcare services. Get in touch for tie-ups and insurance-related queries.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <!-- Card 1: Phone -->
                <a href="tel:+919771488888" class="text-center bg-gray-50 p-8 rounded-2xl hover:shadow-lg transition-all duration-300 hover:bg-gray-100 cursor-pointer fade-in">
                    <div class="w-16 h-16 bg-[#fff0e6] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="phone" class="w-8 h-8 text-[#e55a2e]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Corporate Helpline</h3>
                    <p class="text-lg font-medium text-[#ea5234] mb-2">+91 977 14 88888</p>
                    <p class="text-gray-600 text-sm">Call us for corporate tie-ups and TPA assistance</p>
                </a>

                <!-- Card 2: Email -->
                <a href="mailto:marketing@rajhospitals.com" class="text-center bg-gray-50 p-8 rounded-2xl hover:shadow-lg transition-all duration-300 hover:bg-gray-100 cursor-pointer fade-in" style="animation-delay: 0.1s">
                    <div class="w-16 h-16 bg-[#e0f6fe] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-feather="mail" class="w-8 h-8 text-[#0191c7]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Email for Enquiries</h3>
                    <p class="text-lg font-medium text-[#ea5234] mb-2">marketing@rajhospitals.com</p>
                    <p class="text-gray-600 text-sm">Send us your proposals or queries and we'll respond promptly</p>
                </a>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Query Form -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 fade-in">
                    <div class="flex items-center space-x-3 mb-6">
                        <i data-feather="file-text" class="w-6 h-6 text-[#ea5234]"></i>
                        <h2 class="text-2xl font-bold text-gray-900">Submit a Query</h2>
                    </div>
                    <form accept-charset='UTF-8' action='https://app.formester.com/forms/GihcVh5Yw/submissions' method='POST' class="space-y-6">
                        <input type="hidden" name="form_type" value="Corporate/TPA Enquiry">
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" name="full_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none" placeholder="Enter your full name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Organization *</label>
                                <input type="text" name="organization" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none" placeholder="Enter organization name">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Designation</label>
                                <input type="text" name="designation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none" placeholder="Enter your designation">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none" placeholder="Enter your email">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none" placeholder="Enter your phone number">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Type of Enquiry *</label>
                                <select name="enquiry_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none bg-white">
                                    <option value="">Select enquiry type</option>
                                    <option value="Corporate Tie-up">Corporate Tie-up</option>
                                    <option value="TPA Association">TPA Association</option>
                                    <option value="Insurance Query">Insurance Query</option>
                                    <option value="Health Check-up Camp">Health Check-up Camp</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message/Query Details *</label>
                            <textarea name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ea5234] focus:border-transparent outline-none" placeholder="Enter your query details here..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#ea5234] text-white py-4 rounded-lg hover:bg-[#d64528] transition-colors font-semibold text-lg flex items-center justify-center space-x-2">
                            <i data-feather="send" class="w-5 h-5"></i>
                            <span>Submit Resolution</span>
                        </button>
                    </form>
                </div>

                <!-- Info and TPAs -->
                <div class="space-y-8 fade-in" style="animation-delay: 0.2s">
                    <!-- Why Partner With Us -->
                    <div class="bg-[#fef5f3] border border-[#fbd7d0] rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 ">Why Partner With Us?</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-[#ea5234] rounded-full flex items-center justify-center shrink-0 mt-1">
                                    <i data-feather="check" class="w-4 h-4 text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Tailored Health Packages</h4>
                                    <p class="text-gray-600 text-sm">Customized preventive health check-up plans for employees.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-[#ea5234] rounded-full flex items-center justify-center shrink-0 mt-1">
                                    <i data-feather="check" class="w-4 h-4 text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Cashless Treatment</h4>
                                    <p class="text-gray-600 text-sm">Hassle-free cashless hospitalization for insured employees.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-[#ea5234] rounded-full flex items-center justify-center shrink-0 mt-1">
                                    <i data-feather="check" class="w-4 h-4 text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Dedicated Help Desk</h4>
                                    <p class="text-gray-600 text-sm">Priority assistance for corporate and TPA patients.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlight Box -->
                     <div class="bg-[#f0fbff] border border-[#b9edfe] rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center space-x-2">
                           <i data-feather="shield" class="w-6 h-6 text-[#0191c7]"></i>
                           <span>Network TPAs & Insurers</span>
                        </h3>
                        <p class="text-gray-600 mb-4">
                           We are empanelled with major TPAs and Insurance companies, ensuring smooth transitions for our patients.
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">Star Health</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">HDFC ERGO</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">NIVA Bupa</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">ICICI Lombard</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">MD India</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">Medi Assist</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">Heritage Health</span></div>
                            <div class="flex items-center space-x-2"><div class="w-2 h-2 bg-[#0191c7] rounded-full"></div><span class="text-gray-700">United Health Care</span></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-6 italic">
                            * Please contact our TPA desk for the latest list of empanelled partners.
                        </p>
                     </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include $base_url . 'components/footer.php'; ?>

    <script>
        // Navbar scroll effect
        const header = document.getElementById('main-header');
        const logo = document.getElementById('main-logo');
        const navTopRow = document.getElementById('nav-top-row');

        window.addEventListener('scroll', () => {
             if (window.scrollY > 50) {
                header.classList.add('py-1');
                 logo.classList.remove('w-[80px]', 'h-[90px]', 'sm:w-[110px]', 'sm:h-[110px]', 'md:w-[130px]', 'md:h-[130px]', 'lg:w-[160px]', 'lg:h-[160px]');
                logo.classList.add('w-16', 'h-16', 'md:w-20', 'md:h-20');
                 navTopRow.style.height = '0';
                navTopRow.style.opacity = '0';
            } else {
                 header.classList.remove('py-1');
                  logo.classList.add('w-[80px]', 'h-[90px]', 'sm:w-[110px]', 'sm:h-[110px]', 'md:w-[130px]', 'md:h-[130px]', 'lg:w-[160px]', 'lg:h-[160px]');
                logo.classList.remove('w-16', 'h-16', 'md:w-20', 'md:h-20');
                 navTopRow.style.height = 'auto'; 
                navTopRow.style.opacity = '1';
            }
        });


        // Intersection Observer for Animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-visible');
                }
            });
        }, { threshold: 0.1 });

        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
