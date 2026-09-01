<?php
// Navbar Component
// Use $base_url for all links and assets
// Ensure $base_url is defined in the parent page before including this file
$active_page = basename($_SERVER['PHP_SELF']);

// Configuration from React Version
$specialties = [
    [
        'category' => 'Centres of Excellence',
        'items' => [
            'Cardiology',
            'Critical Care ',
            'Emergency',
            'Gastroenterology',
            'Minimal Access Surgery',
            'Nephrology',
            'Neuro & Spine Surgery',
            'Neurology',
            'Oncology (Cancer Care)',
            'Orthopaedics & Joint Replacement',
            'Pulmonology',
            'Urology'
        ]
    ],
    [
        'category' => 'Allied Specialties',
        'items' => [
            'Aesthetic & Reconstructive Surgery',
            'Dental',
            'Dermatology',
            'ENT',
            'Eye Care',
            'Haematology',
            'Internal Medicine',
            'Nutrition & Dietetics',
            'Obstetrics & Gynaecology',
            'Oral & Maxillofacial Surgery',
            'Pediatrics & Neonatology',
            'Physiotherapy & Rehabilitation',
            'Psychiatry & Mental Health'
        ]
    ],
    [
        'category' => 'Advanced Diagnostics',
        'items' => [
            'Radiology',
            'Neurology',
            'FNAC, Biopsy, Blood & Laboratory Investigations'
        ]
    ]
];

// SVG Icon Mapping (specialty name -> icon filename)
$specialtyIcons = [
    'Cardiology' => 'cardiac-sciences.svg',
    'Critical Care ' => 'critical-care.svg',
    'Emergency' => 'emergency.svg',
    'Gastroenterology' => 'gastroenterology.svg',
    'Minimal Access Surgery' => 'minimal-access-surgery.svg',
    'Nephrology' => 'nephrology.svg',
    'Neuro & Spine Surgery' => 'neurosurgery.svg',
    'Neurology' => 'neurology.svg',
    'Oncology (Cancer Care)' => 'oncology.svg',
    'Orthopaedics & Joint Replacement' => 'orthopaedics.svg',
    'Pulmonology' => 'pulmonology.svg',
    'Urology' => 'urology.svg',
    'Aesthetic & Reconstructive Surgery' => 'plastic-surgery.svg',
    'Dental' => 'dental.svg',
    'Dermatology' => 'dermatology.svg',
    'ENT' => 'ent.svg',
    'Eye Care' => 'ophthalmology.svg',
    'Haematology' => 'haematology.svg',
    'Internal Medicine' => 'internal-medicine.svg',
    'Nutrition & Dietetics' => 'dietetics.svg',
    'Obstetrics & Gynaecology' => 'obstetrics-gynaecology.svg',
    'Oral & Maxillofacial Surgery' => 'dental.svg',
    'Pediatrics & Neonatology' => 'paediatrics.svg',
    'Physiotherapy & Rehabilitation' => 'physiotherapy.svg',
    'Psychiatry & Mental Health' => 'psychiatry.svg',
    'Radiology' => 'radiology.svg',
    'FNAC, Biopsy, Blood & Laboratory Investigations' => 'laboratory.svg'
];

function getSpecialtySlug($name, $category)
{
    $specialtyUrlMap = [
        'Cardiology' => ['Advanced Diagnostics' => 'cardiology-ad'],
        'FNAC, Biopsy, Blood & Laboratory Investigations' => ['Advanced Diagnostics' => 'laboratory-investigations'],
        'Oral & Maxillofacial Surgery' => ['Allied Specialties' => 'oral-maxillofacial-surgery-ad'],
        'Neurology' => ['Centres of Excellence' => 'neurology'],
        'Neuro & Spine Surgery' => ['Centres of Excellence' => 'neuro-spine-surgery'],
    ];

    if (isset($specialtyUrlMap[$name][$category])) {
        return $specialtyUrlMap[$name][$category];
    }

    $slug = strtolower($name);
    $slug = str_replace('&', 'and', $slug);
    $slug = preg_replace('/\s+/', '-', $slug);
    $slug = str_replace(['(', ')'], '', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    return trim($slug, '-');
}
?>
<!-- Header -->
<div
    class="bg-gradient-to-r from-orange-400 to-orange-500 text-white py-2 sm:py-1 fixed top-0 left-0 right-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-3 sm:px-4">
        <!-- Mobile Layout - Stacked -->
        <div class="flex flex-col space-y-2 sm:hidden">
            <div class="flex items-center justify-center space-x-4">
                <div class="flex items-center space-x-3">
                    <a href="https://www.facebook.com/RajHospitals" target="_blank" aria-label="Facebook"
                        class="hover:text-orange-200 transition-colors"><i data-feather="facebook"
                            class="w-4 h-4"></i></a>
                    <a href="https://www.instagram.com/raj.hospitals/" target="_blank" aria-label="Instagram"
                        class="hover:text-orange-200 transition-colors"><i data-feather="instagram"
                            class="w-4 h-4"></i></a>
                    <a href="https://youtube.com/@rajhospitals6364?si=TfGXzxHhg8zqU4O0" target="_blank" aria-label="YouTube"
                        class="hover:text-orange-200 transition-colors"><i data-feather="youtube"
                            class="w-4 h-4"></i></a>
                    <a href="https://wa.me/919771488888" target="_blank" aria-label="WhatsApp"
                        class="hover:text-orange-200 transition-colors">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                    </a>
                </div>
                <a href="https://maps.app.goo.gl/Q8Kd9MDJdxZzxM7C9"
                    class="flex items-center space-x-1 hover:text-orange-200 transition-colors">
                    <i data-feather="map-pin" class="w-4 h-4"></i>
                    <span class="text-xs font-medium">Location</span>
                </a>
            </div>
            <div class="flex items-center justify-center">
                <div class="flex items-center space-x-2">
                    <i data-feather="bell" class="w-4 h-4 text-red-300"></i>
                    <a href="tel:+919771488888" class="text-xs font-medium hover:underline">(24×7) Helpline: +91 97714
                        88888</a>
                </div>
            </div>
        </div>

        <!-- Desktop Layout -->
        <div class="hidden sm:flex justify-between items-center gap-4">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <a href="https://www.facebook.com/RajHospitals" target="_blank" aria-label="Facebook"
                        class="hover:text-orange-200 transition-colors"><i data-feather="facebook"
                            class="w-4 h-4"></i></a>
                    <a href="https://www.instagram.com/raj.hospitals/" target="_blank" aria-label="Instagram"
                        class="hover:text-orange-200 transition-colors"><i data-feather="instagram"
                            class="w-4 h-4"></i></a>
                    <a href="https://youtube.com/@rajhospitals6364?si=TfGXzxHhg8zqU4O0" target="_blank" aria-label="YouTube"
                        class="hover:text-orange-200 transition-colors"><i data-feather="youtube"
                            class="w-4 h-4"></i></a>
                    <a href="https://wa.me/919771488888" target="_blank" aria-label="WhatsApp"
                        class="hover:text-orange-200 transition-colors ml-1">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                    </a>
                </div>
                <a href="https://maps.app.goo.gl/Q8Kd9MDJdxZzxM7C9"
                    class="flex items-center space-x-1 hover:text-orange-200 transition-colors">
                    <i data-feather="map-pin" class="w-4 h-4"></i>
                    <span class="text-sm font-medium">Location</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <i data-feather="bell" class="w-4 h-4 text-red-300"></i>
                    <a href="tel:+919771488888" class="text-sm font-medium hover:underline">(24×7) Helpline: +91 97714
                        88888</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header id="main-header"
    class="fixed w-full z-40 bg-white top-[48px] sm:top-6 transition-all duration-300 border-b border-gray-100">
    <link rel="icon" type="image/png" href="../assets/favicon/raj-favicon-.png">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex relative items-center justify-between h-16 md:h-20 lg:h-24">
            <!-- Logo -->
            <a href="/index.php" class="flex items-center group">
                <div id="logo-container"
                    class="flex items-center space-x-2 sm:space-x-4 md:space-x-5 lg:space-x-6 transition-all duration-300">
                    <img id="main-logo" src="/assets/Header/main-logo_ranchi.webp"
                        alt="Main Logo"
                        class="object-contain transition-all duration-300 w-[80px] h-[80px] sm:w-[110px] sm:h-[110px] md:w-[130px] md:h-[130px] lg:w-[160px] lg:h-[160px]">
                    <div id="nabh-logos"
                        class="flex space-x-1 sm:space-x-3 md:space-x-2 lg:space-x-2 transition-all duration-300">
                        <img src="/assets/Header/NABL_logo-1.webp" alt="NABH Logo 1"
                            class="object-contain w-[30px] h-[30px]">
                        <img src="/assets/Header/NABL-Logo-2.webp" alt="NABH Logo 2"
                            class="object-contain w-[30px] h-[30px]">
                        <img src="/assets/Header/NABL-Logo-3.webp" alt="NABH Logo 3"
                            class="object-contain w-[30px] h-[30px]">
                    </div>
                </div>
            </a>

            <!-- Mobile Menu Button (visible on mobile only) -->
            <button id="mobile-menu-btn"
                class="flex md:hidden items-center justify-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors border border-gray-200 bg-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-6 h-6" id="menu-icon">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-6 h-6 hidden" id="close-icon">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <!-- Desktop Nav -->
            <div class="hidden md:flex lg:flex flex-col items-end space-y-1 lg:space-y-2">

                <!-- First Row (Collapsible) -->
                <nav id="nav-top-row"
                    class="flex items-center space-x-3 md:space-x-4 lg:space-x-6 overflow-hidden transition-all duration-300 h-auto opacity-100 origin-top">
                    <a href="/index.php"
                        class="<?php echo $active_page == 'index.php' ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">Home</a>
                    <a href="/testimonials.php"
                        class="<?php echo $active_page == 'testimonials.php' ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">Testimonials</a>
                    <a href="/careers.php"
                        class="<?php echo $active_page == 'careers.php' ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">Careers</a>
                    <a href="/news-media.php"
                        class="<?php echo $active_page == 'news-media.php' ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">News
                        & Media</a>
                    <a href="https://rajhospitals.com/blog/"
                        class="text-gray-700 hover:text-gray-900 transition-colors font-medium text-sm lg:text-base">Blogs</a>
                </nav>

                <!-- Second Row (Always Visible) -->
                <nav class="flex items-center space-x-3 md:space-x-4 lg:space-x-6">
                    <a href="/about.php"
                        class="<?php echo $active_page == 'about.php' ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">About
                        Raj</a>

                    <!-- Specialties Dropdown trigger -->
                    <div class=" group cursor-pointer" id="specialties-trigger">
                        <div
                            class="flex items-center space-x-1 <?php echo strpos($active_page, 'specialties') !== false ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">
                            <span>Specialities</span>
                            <i data-feather="chevron-down"
                                class="w-3 h-3 group-hover:rotate-180 transition-transform"></i>
                        </div>

                        <!-- Mega Menu -->
                        <div id="mega-menu" class="absolute top-full right-0 hidden z-50">
                            <div
                                class="w-[800px] bg-white rounded-2xl shadow-2xl border border-gray-100 p-6 fade-in-visible">
                                <div class="grid grid-cols-3 gap-6">
                                    <?php foreach ($specialties as $categoryData): ?>
                                        <div class="flex flex-col">
                                            <h4
                                                class="font-semibold text-orange-600 uppercase tracking-wide mb-3 border-b border-gray-200 pb-2 text-sm">
                                                <?php echo htmlspecialchars($categoryData['category']); ?>
                                            </h4>
                                            <div class="flex flex-col gap-1">
                                                <?php foreach ($categoryData['items'] as $item):
                                                    $icon = $specialtyIcons[$item] ?? 'circle';
                                                    $slug = getSpecialtySlug($item, $categoryData['category']);
                                                    $iconPath = $base_url . 'assets/icons/specialties/' . $icon . '?v=' . time();
                                                    ?>
                                                    <a href="/specialties/<?php echo $slug; ?>.php"
                                                        class="flex items-center gap-2 py-2 text-gray-700 hover:text-orange-600 transition-colors duration-200 text-sm">
                                                        <img src="<?php echo $iconPath; ?>" alt="" class="w-5 h-5 object-contain">
                                                        <?php echo htmlspecialchars($item); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="/find-a-doctor.php"
                        class="<?php echo $active_page == 'find-a-doctor.php' ? 'text-orange-500' : 'text-gray-700 hover:text-gray-900'; ?> transition-colors font-medium text-sm lg:text-base">Find
                        a Doctor</a>
                    <div class="flex items-center space-x-3 ml-2 lg:ml-4">
                        <a href="/contact.php"
                            class="<?php echo $active_page == 'contact.php' ? 'bg-orange-600 shadow-inner' : 'bg-orange-500 hover:bg-orange-600'; ?> text-white px-4 lg:px-7 py-2 lg:py-2.5 rounded-full transition-colors font-semibold text-sm lg:text-base shadow-md">Book
                            Appointment</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default, visible on mobile when toggled) -->
    <div id="mobile-menu"
        class="hidden md:hidden bg-white border-t border-gray-100 max-h-[80vh] overflow-y-auto absolute w-full left-0 shadow-lg">
        <div class="px-4 py-4 space-y-1">
            <a href="/index.php"
                class="block py-3 <?php echo $active_page == 'index.php' ? 'text-orange-500' : 'text-gray-700'; ?> font-medium border-b border-gray-100">Home</a>
            <a href="/about.php"
                class="block py-3 <?php echo $active_page == 'about.php' ? 'text-orange-500' : 'text-gray-700'; ?> font-medium border-b border-gray-100">About
                Raj</a>

            <!-- Mobile Specialties Accordion -->
            <div class="border-b border-gray-100">
                <button id="mobile-specialties-btn"
                    class="flex items-center justify-between w-full py-3 text-gray-700 font-medium">
                    <span>Specialties</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-5 h-5 transition-transform duration-200" id="specialties-chevron">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div id="mobile-specialties-dropdown" class="hidden pb-3">
                    <?php foreach ($specialties as $categoryData): ?>
                        <div class="border-b border-gray-100 pb-2">
                            <button type="button"
                                class="w-full flex items-center justify-between py-2 px-2 text-orange-600 hover:bg-orange-50 rounded transition-colors mobile-category-btn">
                                <span
                                    class="text-sm font-semibold uppercase"><?php echo htmlspecialchars($categoryData['category']); ?></span>
                                <i data-feather="chevron-down" class="w-3 h-3 transition-transform category-chevron"></i>
                            </button>
                            <div
                                class="pl-4 mt-1 space-y-1 max-h-48 overflow-y-auto hidden mobile-category-items scrollbar-thin">
                                <?php foreach ($categoryData['items'] as $item):
                                    $slug = getSpecialtySlug($item, $categoryData['category']);
                                    $icon = $specialtyIcons[$item] ?? 'circle';
                                    $iconPath = $base_url . 'assets/icons/specialties/' . $icon . '?v=' . time();
                                    ?>
                                    <a href="/specialties/<?php echo $slug; ?>.php"
                                        class="flex items-center gap-2 py-2 px-4 text-sm text-gray-600 hover:text-orange-500 hover:bg-orange-50 rounded transition-colors">
                                        <img src="<?php echo $iconPath; ?>" alt="" class="w-4 h-4 object-contain">
                                        <?php echo htmlspecialchars($item); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a href="/find-a-doctor.php"
                class="block py-3 <?php echo $active_page == 'find-a-doctor.php' ? 'text-orange-500' : 'text-gray-700'; ?> font-medium border-b border-gray-100">Find
                a Doctor</a>
            <a href="/testimonials.php"
                class="block py-3 <?php echo $active_page == 'testimonials.php' ? 'text-orange-500' : 'text-gray-700'; ?> font-medium border-b border-gray-100">Testimonials</a>
            <a href="/news-media.php"
                class="block py-3 <?php echo $active_page == 'news-media.php' ? 'text-orange-500' : 'text-gray-700'; ?> font-medium border-b border-gray-100">News
                & Media</a>
            <a href="/careers.php"
                class="block py-3 <?php echo $active_page == 'careers.php' ? 'text-orange-500' : 'text-gray-700'; ?> font-medium border-b border-gray-100">Careers</a>
            <a href="https://rajhospitals.com/blog/" class="block py-3 text-gray-700 font-medium border-b border-gray-100">Blogs</a>
            <a href="/contact.php"
                class="block w-full bg-orange-500 text-white py-3 rounded-lg font-medium text-center mt-4">Book
                Appointment</a>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                if (menuIcon) menuIcon.classList.toggle('hidden');
                if (closeIcon) closeIcon.classList.toggle('hidden');
            });
        }

        // Mobile Specialties Accordion
        const specialtiesBtn = document.getElementById('mobile-specialties-btn');
        const specialtiesDropdown = document.getElementById('mobile-specialties-dropdown');
        const specialtiesChevron = document.getElementById('specialties-chevron');

        if (specialtiesBtn && specialtiesDropdown) {
            specialtiesBtn.addEventListener('click', () => {
                specialtiesDropdown.classList.toggle('hidden');
                if (specialtiesChevron) {
                    specialtiesChevron.classList.toggle('rotate-180');
                }
            });
        }

        // Mobile Category Dropdowns
        const categoryBtns = document.querySelectorAll('.mobile-category-btn');

        categoryBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const items = btn.nextElementSibling;
                const chevron = btn.querySelector('.category-chevron');

                if (items) {
                    items.classList.toggle('hidden');
                }
                if (chevron) {
                    chevron.classList.toggle('rotate-180');
                }
            });
        });

        // Desktop Mega Menu with delay
        const trigger = document.getElementById('specialties-trigger');
        const megaMenu = document.getElementById('mega-menu');
        let hideTimeout = null;

        if (trigger && megaMenu) {
            trigger.addEventListener('mouseenter', () => {
                clearTimeout(hideTimeout);
                megaMenu.classList.remove('hidden');
            });
            trigger.addEventListener('mouseleave', () => {
                hideTimeout = setTimeout(() => {
                    megaMenu.classList.add('hidden');
                }, 200);
            });
        }
    });
</script>