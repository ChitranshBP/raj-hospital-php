<?php $base_url = './'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Testimonials | Raj Hospitals</title>
    <meta name="description" content="Read real patient testimonials and reviews about Raj Hospital Ranchi. See why patients trust us for advanced multispeciality healthcare in Jharkhand." />
    <meta name="robots" content="index, follow" />
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
    <meta property="og:title" content="Patient Testimonials | Raj Hospitals" />
    <meta property="og:description" content="Read real patient testimonials and reviews about Raj Hospital Ranchi. See why patients trust us for advanced multispeciality healthcare in Jharkhand." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://rajhospitals.com/testimonials" />
    <meta property="og:image" content="https://rajhospitals.com/assets/home-img/Raj-hospital-image.webp" />
    <meta property="og:site_name" content="Raj Hospitals" />

    <!-- Hospital + AggregateRating Schema -->
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
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.6",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "380"
      },
      "review": [
        {
          "@type": "Review",
          "author": { "@type": "Person", "name": "Prem Kumar Singh" },
          "reviewBody": "Emergency brain care that saved my life. The doctors were exceptional and I felt cared for every step of the way.",
          "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" }
        },
        {
          "@type": "Review",
          "author": { "@type": "Person", "name": "Mrs. Neelam Rajwar" },
          "reviewBody": "Knee replacement surgery was successful. We walk away with smiles and gratitude. Excellent care by the orthopaedics team.",
          "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" }
        },
        {
          "@type": "Review",
          "author": { "@type": "Person", "name": "Mrs. Shejhari Devi" },
          "reviewBody": "After months of severe knee pain, I found relief under the expert care of Dr. Deepak Verma. Knee replacement changed my life.",
          "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" }
        },
        {
          "@type": "Review",
          "author": { "@type": "Person", "name": "Anil Prasad Sahu" },
          "reviewBody": "Came with advanced stomach cancer. The treatment and care at Raj Hospital gave me hope and recovery.",
          "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" }
        }
      ]
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
                Patient <span class="text-[#ea5234]">Testimonials</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Real stories from real patients who have experienced our compassionate care and medical excellence
                </p>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section class="py-8 bg-white border-b border-gray-100 sticky top-[100px] z-30 transition-all duration-300" id="tabs-section">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col gap-6">
                <!-- Tab Navigation -->
                <div class="flex justify-center gap-4">
                    <button onclick="switchTab('written')" id="tab-written" class="px-8 py-3 rounded-lg font-semibold transition-all duration-200 bg-[#fc684b] text-white shadow-lg">
                        Written Testimonials
                    </button>
                    <button onclick="switchTab('video')" id="tab-video" class="px-8 py-3 rounded-lg font-semibold transition-all duration-200 flex items-center gap-2 bg-gray-100 text-gray-700 hover:bg-gray-200">
                        <i data-feather="play" class="w-4 h-4"></i>
                        Video Testimonials
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">
            
            <!-- Written Testimonials -->
            <div id="content-written" class="block fade-in">
                <!-- Review Pixel -->
                <script type="text/javascript">
                !function(){var e,t=document;e=function(){if(window.EMRPixel)return console.info("EMR: Pixel already loaded");var e=t.createElement("script");e.defer=!0,e.src="https://cdn2.revw.me/js/pixel.js?t="+864e5*Math.ceil(new Date/864e5);var n=t.getElementsByTagName("script")[0];n.charset="utf-8",n.parentNode.insertBefore(e,n),e.onload=function(){EMRPixel.init("reviewmagnet.in",87)}},"interactive"===t.readyState||"complete"===t.readyState?e():t.addEventListener("DOMContentLoaded",e)}();
                </script>
                <emr-simple-grid widget-id="c6b582dc-ab67-4532-a480-0bd4416bacce"></emr-simple-grid>
                <!-- Review Pixel End -->
            </div>

            <!-- Video Testimonials -->
            <div id="content-video" class="hidden fade-in">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="video-testimonials-grid">
                     <!-- Javascript will populate this -->
                </div>
            </div>
        </div>
    </section>

    <!-- Video Modal -->
    <div id="video-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4 hidden" onclick="closeModal()">
        <div class="relative w-full max-w-4xl bg-black rounded-lg overflow-hidden" onclick="event.stopPropagation()">
            <button onclick="closeModal()" class="absolute top-4 right-4 z-10 text-white bg-black bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 transition-all">
                <i data-feather="x" class="w-6 h-6"></i>
            </button>
            <div class="relative pt-[56.25%]">
                <iframe id="modal-iframe" class="absolute top-0 left-0 w-full h-full" src="" title="Video Testimonial" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include $base_url . 'components/footer.php'; ?>

    <script>

        // Video Testimonials Data
        const videoTestimonials = [
            {
                videoId: "Gi1WhJ1dR6g",
                patient: "Emergency Brain Care That Saved Prem Kumar Singh | Raj Hospitals",
                desc: "I felt cared for every step of the way.",
                thumbnail: "https://img.youtube.com/vi/Gi1WhJ1dR6g/maxresdefault.jpg",
            },
            {
                videoId: "HARE579wkdY",
                patient: "Knee replacement surgery | Raj Hospitals",
                desc: "Mr. Rajwar brought his wife, Mrs. Neelam Rajwar, to Raj Hospitals for a knee replacement surgery — and today, they walk away with smiles and gratitude.",
                thumbnail: "https://img.youtube.com/vi/HARE579wkdY/maxresdefault.jpg",
            },
            {
                videoId: "mHiO2RYdgds",
                patient: "Cancer treatment | Patient Testimonial ",
                desc: "The doctors and staff were exceptional.",
                thumbnail: "https://img.youtube.com/vi/mHiO2RYdgds/maxresdefault.jpg",
            },
            {
                videoId: "vg59yGKWz_s",
                patient: "Neurosurgery Success Story at Raj Hospitals",
                desc: "Under the expert care of Dr. Ahmad Hussain (Neurosurgeon) and Dr. Neelam Kumari, our patient has made an incredible recovery.",
                thumbnail: "https://img.youtube.com/vi/vg59yGKWz_s/maxresdefault.jpg",
            },
            {
                videoId: "-QcubD0G-A4",
                patient: "Appendix Treatment | Patient Testimonial | Raj Hospitals",
                desc: "Exceptional care and treatment experience.",
                thumbnail: "https://img.youtube.com/vi/-QcubD0G-A4/maxresdefault.jpg",
            },
            {
                videoId: "7aQnhMDBKRM",
                patient: "Breathing Treatment | Patient Testimonial | Raj Hospitals",
                desc: "Watch this real patient testimonial sharing their experience with breathing treatment at Raj Hospitals under the expert care of Dr. Sainik Dutta.",
                thumbnail: "https://img.youtube.com/vi/7aQnhMDBKRM/maxresdefault.jpg",
            },
            {
                videoId: "yThRjkoljvc",
                patient: "Jaundice Treatment | Patient Testimonial | Raj Hospitals",
                desc: "Watch this real patient testimonial where Ms. Divya Kumari shares her experience of jaundice treatment at Raj Hospitals under the expert care of Dr. Ravish Ranjan.",
                thumbnail: "https://img.youtube.com/vi/yThRjkoljvc/maxresdefault.jpg",
            },
            {
                videoId: "aQBEpvueG5U",
                patient: "Jaundice Treatment | Patient Testimonial | Raj Hospitals",
                desc: "Watch this real patient testimonial where Mrs. Anita Kumari shares her experience of jaundice treatment at Raj Hospitals under the expert care of Dr. Ravish Ranjan.",
                thumbnail: "https://img.youtube.com/vi/aQBEpvueG5U/maxresdefault.jpg",
            },
            {
                videoId: "nrBUSAEFOnc",
                patient: "Little Finger Fracture Treatment | Patient Testimonial | Raj Hospitals",
                desc: "After slipping in his washroom, Mr. Aniket suffered a fracture in the little finger of his right hand. He was immediately brought to the Emergency Department at Raj Hospitals, where an X-ray confirmed the fracture. The surgery was successfully performed by Dr. Mozammil Pheroz using K-wire fixation.",
                thumbnail: "https://img.youtube.com/vi/nrBUSAEFOnc/maxresdefault.jpg",
            },
            {
                videoId: "8BIt5vJVgYI",
                patient: "How Knee Replacement Changed Her Life | Testimonial of Shejhari Devi",
                desc: "After months of severe knee pain that affected even her daily routine, Mrs. Shejhari Devi finally found relief under the expert care of Dr. Deepak Verma.",
                thumbnail: "https://img.youtube.com/vi/8BIt5vJVgYI/maxresdefault.jpg",
            },
            {
                videoId: "DOSuZZjZiZ8",
                patient: "Stomach cancer treatment | Patient Testimonial",
                desc: "Meet Mr. Anil Prasad Sahu, who came to us with advanced stomach cancer and a heart full of questions.",
                thumbnail: "https://img.youtube.com/vi/DOSuZZjZiZ8/maxresdefault.jpg",
            }
        ];

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

        function renderVideoTestimonials() {
            const container = document.getElementById('video-testimonials-grid');
            if (!container || !videoTestimonials || videoTestimonials.length === 0) return;

            container.innerHTML = videoTestimonials.map((v, index) => `
                <div class="bg-white border border-[#fde9e6] rounded-xl shadow-md flex flex-col overflow-hidden hover:shadow-lg transition-shadow fade-in" style="animation-delay: ${index * 0.1}s">
                    <button onclick="openModal('${v.videoId}')" class="relative group w-full text-left cursor-pointer">
                        <img src="${v.thumbnail}" alt="Testimonial by ${v.patient}" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center group-hover:bg-opacity-50 transition-all">
                            <div class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-feather="play" class="w-8 h-8 text-[#ea5234] ml-1"></i>
                            </div>
                        </div>
                    </button>
                    <div class="p-4 flex-grow flex flex-col">
                        <h3 class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2">${v.patient}</h3>
                        <p class="text-xs text-gray-600 line-clamp-2">${v.desc}</p>
                    </div>
                </div>
            `).join('');
            feather.replace();
        }

        window.switchTab = function(tabId) {
            const contentWritten = document.getElementById('content-written');
            const contentVideo = document.getElementById('content-video');
            const tabWritten = document.getElementById('tab-written');
            const tabVideo = document.getElementById('tab-video');

            if (tabId === 'written') {
                contentWritten.classList.remove('hidden');
                contentWritten.classList.add('block');
                contentVideo.classList.remove('block');
                contentVideo.classList.add('hidden');

                tabWritten.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                tabWritten.classList.add('bg-[#fc684b]', 'text-white', 'shadow-lg');
                
                tabVideo.classList.remove('bg-[#fc684b]', 'text-white', 'shadow-lg');
                tabVideo.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            } else {
                contentWritten.classList.remove('block');
                contentWritten.classList.add('hidden');
                contentVideo.classList.remove('hidden');
                contentVideo.classList.add('block');

                tabVideo.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                tabVideo.classList.add('bg-[#fc684b]', 'text-white', 'shadow-lg');

                tabWritten.classList.remove('bg-[#fc684b]', 'text-white', 'shadow-lg');
                tabWritten.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            }
        }

        window.openModal = function(videoId) {
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('modal-iframe');
            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            modal.classList.remove('hidden');
        }

        window.closeModal = function() {
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('modal-iframe');
            iframe.src = ''; 
            modal.classList.add('hidden');
        }

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
             // Initialize Feathers
            feather.replace();

            // Render Testimonials
            renderVideoTestimonials();

            // Initialize Animations
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
