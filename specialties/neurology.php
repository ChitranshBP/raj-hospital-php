<?php $base_url = '../'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="../assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Neurologist in Ranchi | Top Neurology Hospital | Raj Hospital</title>
    <meta name="description" content="Looking for the best neurologist in Ranchi? Raj Hospital is the best neuro hospital offering advanced brain and neurological care. Consult our expert neurologist today." />
    <meta name="keywords" content="best neurologist in Ranchi, neurologist in Ranchi, top neurologist in Ranchi, Raj Hospital Ranchi, neurology hospital Ranchi" />
    <meta name="robots" content="index, follow" />

    <meta name="geo.region" content="IN-JH" />
    <meta name="geo.placename" content="Ranchi" />
    <meta name="geo.position" content="23.3441;85.3096" />
    <meta name="ICBM" content="23.3441, 85.3096" />

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Hospital",
      "name": "Raj Hospital",
      "url": "https://rajhospitals.com/",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.6",
        "reviewCount": "380"
      }
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalSpecialty",
      "name": "Neurology",
      "medicalSpecialty": "Neurology",
      "availableAtOrFrom": {
        "@type": "Hospital",
        "name": "Raj Hospital"
      }
    }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#fff7ed', 100: '#ffedd5', 500: '#f97316', 600: '#ea580c' },
                        secondary: { 50: '#f0f9ff', 100: '#e0f2fe', 500: '#0ea5e9', 600: '#0284c7' }
                    }
                }
            }
        }
    </script>
    <style>
        .fade-in { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
        .fade-in-visible { opacity: 1; transform: translateY(0); }
    </style>
    <link rel="canonical" href="https://rajhospitals.com/specialties/neurology" />
</head>

<body class="bg-white">

    <?php include $base_url . 'components/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative h-[50vh] mt-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="../assets/specialties/Neuroscience/Neurological-Diagnostics.webp" alt="Neurology"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40"></div>
        </div>
        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-4 w-full">
                <div class="max-w-3xl text-white fade-in">
                    <h1 class="text-4xl lg:text-5xl font-bold mb-4">Neurology</h1>
                    <p class="text-xl text-gray-200">Best Neurologist in Ranchi at Raj Hospital. Expert diagnosis and treatment for stroke, epilepsy, headache disorders, and all neurological conditions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="fade-in">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Overview - Best Neurology Hospital in Ranchi</h2>
                        <p class="text-lg text-gray-700 leading-relaxed mb-6">The Department of Neurology at Raj Hospitals provides comprehensive care for brain and nervous system disorders. As the <strong>best neurology hospital in Ranchi</strong>, our expert neurologists utilize advanced diagnostic technologies to diagnose and treat a wide range of neurological conditions including stroke, epilepsy, movement disorders, neuro infections, and more.</p>

                        <div class="bg-primary-50 p-6 rounded-xl border border-primary-100 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                                <i data-feather="info" class="w-5 h-5 text-primary-600 mr-2"></i>
                                Why Choose Our Neurology Department
                            </h3>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i data-feather="check" class="w-5 h-5 text-primary-600 mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Board-certified neurologists with advanced training</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="check" class="w-5 h-5 text-primary-600 mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">State-of-the-art diagnostic and electrophysiology facilities</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="check" class="w-5 h-5 text-primary-600 mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Comprehensive care from diagnosis to treatment</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="check" class="w-5 h-5 text-primary-600 mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">24/7 emergency neurology services</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="fade-in mb-12">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Key Facilities</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                                    <span class="text-gray-700">Advanced neuroimaging (MRI, CT, PET)</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                                    <span class="text-gray-700">Dedicated stroke and epilepsy units</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                                    <span class="text-gray-700">State-of-the-art electrophysiology labs</span>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                                    <span class="text-gray-700">Multidisciplinary neuro-rehabilitation programs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar - Meet Our Specialists -->
                <div class="space-y-8 fade-in">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Meet Our Neurologist</h3>
                        <p class="text-gray-600 font-medium">Top neurologist in Ranchi for all neurological conditions</p>
                    </div>
                    <div class="flex flex-col gap-8 overflow-y-auto" style="max-height: 1000px; max-width: 340px; margin: 0 auto;">

                        <!-- Doctor 1 -->
                        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 w-full group"
                            style="min-height: 500px;">
                            <div class="relative overflow-hidden h-48 sm:h-56 shrink-0">
                                <img src="../assets/doctor-latest/ahmad hussain.webp" alt="Dr. Ahmad Hussain"
                                    class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-1">Dr. Ahmad Hussain</h3>
                                <p class="text-primary-600 font-medium mb-2">MBBS, MD, DrNB (Neurology)</p>
                                <p class="text-secondary-600 text-sm mb-3">Neurology</p>
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <i data-feather="award" class="w-4 h-4 mr-2"></i>
                                    <span>5+ Years Experience</span>
                                </div>
                                <a href="../contact.php"
                                    class="w-full bg-primary-500 text-white py-3 rounded-lg hover:bg-primary-600 transition-colors font-medium flex items-center justify-center space-x-2 mb-2">
                                    <i data-feather="calendar" class="w-4 h-4"></i>
                                    <span>Book Appointment</span>
                                </a>
                                <a href="../doctors/ahmad-hussain.php"
                                    class="w-full bg-white text-primary-600 py-2 rounded-lg border border-primary-600 hover:bg-primary-50 transition-colors font-medium flex items-center justify-center space-x-2">
                                    <i data-feather="user" class="w-4 h-4"></i>
                                    <span>View Profile</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Conditions We Treat Section -->
    <section class="py-8 bg-gradient-to-r from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Conditions We Treat</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Common neurological conditions we diagnose and treat</p>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100 fade-in">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-4">
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Stroke & TIA</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Epilepsy & Seizures</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Parkinson's Disease</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Multiple Sclerosis</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Migraine & Headaches</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Alzheimer's & Dementia</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Motor Neuron Disease</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Myasthenia Gravis</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Neuropathies</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Movement Disorders</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Autoimmune Brain Disorders</span>
                    </div>
                    <div class="flex items-center space-x-3 py-2">
                        <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-base">Brain Infections</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Treatments We Offer Section -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Treatments We Offer</h2>
                <p class="text-xl text-gray-600">Advanced treatments for neurological conditions</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden fade-in">
                    <div class="h-48 overflow-hidden">
                        <img src="../assets/specialties/Neurology/Brai- Stroke-Unit & Seizures.webp" alt="Stroke Treatment"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Stroke Management</h3>
                        <p class="text-gray-600 mb-4">Comprehensive stroke care including thrombolysis, stroke unit care, and rehabilitation for optimal recovery.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden fade-in">
                    <div class="h-48 overflow-hidden">
                        <img src="../assets/specialties/Neurology/Epilepsy.webp" alt="Epilepsy Treatment"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Epilepsy Management</h3>
                        <p class="text-gray-600 mb-4">Medical management and seizure control with antiepileptic drugs and lifestyle modifications.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden fade-in">
                    <div class="h-48 overflow-hidden">
                        <img src="../assets/specialties/Neurology/Movement-Disorders.webp" alt="Movement Disorders Treatment"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Movement Disorders</h3>
                        <p class="text-gray-600 mb-4">Specialized care for Parkinson's disease, tremors, and other movement abnormalities.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden fade-in">
                    <div class="h-48 overflow-hidden">
                        <img src="../assets/specialties/Neurology/Brain & Spine-Tumor-Surgery.webp" alt="Headache Treatment"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Headache & Migraine</h3>
                        <p class="text-gray-600 mb-4">Comprehensive diagnosis and treatment for migraine, tension headaches, and chronic headache disorders.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden fade-in">
                    <div class="h-48 overflow-hidden">
                        <img src="../assets/specialties/Neurology/Movement-Disorders.webp" alt="Neuroimmunology"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Neuroimmunology</h3>
                        <p class="text-gray-600 mb-4">Treatment for multiple sclerosis, autoimmune encephalitis, and demyelinating disorders.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden fade-in">
                    <div class="h-48 overflow-hidden">
                        <img src="../assets/specialties/Neurology/Spinal-Cor- Injury.webp" alt="Neurorehabilitation"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Neurorehabilitation</h3>
                        <p class="text-gray-600 mb-4">Comprehensive rehabilitation programs for stroke recovery, neuropathies, and neurological conditions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Patient Success Stories Section -->
    <section class="py-8 bg-gradient-to-br from-primary-50 to-secondary-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Patient Success Stories</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Real stories of healing and recovery from our Neurology department
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Story 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md fade-in">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                            <i data-feather="activity" class="w-5 h-5 text-primary-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Stroke Recovery Success</h3>
                    </div>
                    <p class="text-gray-500 mb-4">Patient: Mr. Vikash Kumar</p>
                    <p class="text-gray-700 mb-6">Mr. Vikash was admitted with acute stroke symptoms. Our neurology team responded immediately with thrombolysis therapy. With dedicated rehabilitation and follow-up care, he regained significant motor function and returned to his daily activities.</p>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                        <div class="flex items-center space-x-2">
                            <i data-feather="check" class="w-5 h-5 text-green-600"></i>
                            <span class="font-medium text-green-800">Outcome: Near complete recovery with independent mobility</span>
                        </div>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md fade-in">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                            <i data-feather="activity" class="w-5 h-5 text-primary-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Migraine Management Success</h3>
                    </div>
                    <p class="text-gray-500 mb-4">Patient: Ms. Neha Kumari</p>
                    <p class="text-gray-700 mb-6">Ms. Neha had been suffering from chronic migraines for years affecting her work and daily life. Our neurologist properly diagnosed her condition and started a comprehensive treatment plan including medication and lifestyle modifications.</p>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                        <div class="flex items-center space-x-2">
                            <i data-feather="check" class="w-5 h-5 text-green-600"></i>
                            <span class="font-medium text-green-800">Outcome: Significant reduction in headache frequency and intensity</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs and Contact Form Section -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">Common questions about neurology conditions and treatments</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <div class="space-y-4">
                        <div class="faq-item bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow cursor-pointer"
                            onclick="toggleFaq(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Who is the best neurologist in Ranchi?</h3>
                                <i data-feather="plus" class="text-2xl text-primary-500 flex-shrink-0 ml-4 faq-icon"></i>
                            </div>
                            <div class="faq-content text-gray-700 transition-all duration-300 overflow-hidden max-h-0">
                                <p>Raj Hospital has highly experienced neurologists providing exceptional care for all neurological conditions including stroke, epilepsy, and movement disorders.</p>
                            </div>
                        </div>

                        <div class="faq-item bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow cursor-pointer"
                            onclick="toggleFaq(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">How is stroke managed at Raj Hospitals?</h3>
                                <i data-feather="plus" class="text-2xl text-primary-500 flex-shrink-0 ml-4 faq-icon"></i>
                            </div>
                            <div class="faq-content text-gray-700 transition-all duration-300 overflow-hidden max-h-0">
                                <p>We provide rapid assessment, acute treatment, and multidisciplinary rehabilitation in our dedicated stroke unit with advanced technologies.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:sticky lg:top-24 h-fit">
                    <div class="bg-gradient-to-br from-primary-50 to-secondary-50 rounded-xl p-6 shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Have More Questions?</h3>
                        <p class="text-gray-600 mb-6">Get in touch with our Neurology specialists</p>

                        <form accept-charset="UTF-8" action="https://app.formester.com/forms/kIewn1CO8/submissions" method="POST" class="space-y-4">
                            <input type="text" name="name" required placeholder="Full Name" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg">
                            <input type="email" name="email" required placeholder="Email Address" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg">
                            <input type="tel" name="phone" required pattern="[0-9]{10}" placeholder="10-digit mobile number" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg">
                            <textarea name="message" required rows="4" placeholder="Your Question" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg"></textarea>
                            <input type="hidden" name="specialty" value="Neurology">
                            <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold">Submit Inquiry</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include $base_url . 'components/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            feather.replace();
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });

        function toggleFaq(element) {
            const content = element.querySelector('.faq-content');
            const icon = element.querySelector('.faq-icon');
            const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';
            document.querySelectorAll('.faq-item').forEach(item => {
                item.querySelector('.faq-content').style.maxHeight = '0px';
                item.querySelector('.faq-icon').setAttribute('data-feather', 'plus');
            });
            if (!isOpen) {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.setAttribute('data-feather', 'minus');
            }
            feather.replace();
        }
    </script>
</body>
</html>