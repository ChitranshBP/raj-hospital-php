<?php
$base_url = './';

// Privacy notice details that only the hospital can supply. Fill these in before deploying:
// empty values render as a highlighted "[to be confirmed]" marker (see the compliance audit report).
$privacy_notice_date = '15 October 2026';
$privacy_contact = [
    'entity' => '',               // legal name of the hospital entity (company / firm / trust)
    'officer' => '',              // Grievance Officer name and designation (SPDI Rules 2011, Rule 5(9))
    'email' => '',                // email address for privacy requests and grievances
    'phone' => '',                // phone number for privacy requests
    'address' => 'Mahatma Gandhi Main Road, Ranchi, Jharkhand', // as on the contact page; confirm
    'enquiry_retention' => '',    // e.g. "12 months"
    'careers_retention' => '',    // e.g. "6 months"
    'analytics_retention' => '',  // match the Google Analytics data-retention setting, e.g. "14 months"
];

function raj_pc($value)
{
    return $value !== ''
        ? htmlspecialchars($value)
        : '<span class="bg-yellow-100 text-yellow-900 px-1 rounded">[to be confirmed]</span>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | Raj Hospitals</title>
    <meta name="description" content="Read the privacy policy of Raj Hospital Ranchi. Learn how we collect, use, and protect your personal and health information." />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Raj Hospital" />
    <meta name="publisher" content="Raj Hospital" />
    <link rel="canonical" href="https://rajhospitals.com/privacy-policy" />
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
                        }
                    }
                }
            }
        }
    </script>
        <meta name="author" content="Raj Hospital" />
    <meta name="publisher" content="Raj Hospital" />
    <link rel="canonical" href="https://rajhospitals.com/privacy-policy" />
</head>
<body class="bg-gray-50">

   <?php include $base_url . 'components/navbar.php'; ?>

    <!-- Main Content -->
    <main class="mt-20">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#0191C7] to-[#F9771B] text-white py-16">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center fade-in">
                    <div class="flex justify-center mb-6">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                            <i data-feather="lock" class="w-12 h-12 text-white"></i>
                        </div>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Privacy Policy</h1>
                    <p class="text-xl text-white/90 max-w-3xl mx-auto">
                        How we collect, use and protect personal information on this website
                    </p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-5xl mx-auto px-4 py-16">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 fade-in">
                
                <!-- Last Updated -->
                <div class="mb-8 pb-6 border-b border-gray-200">
                    <p class="text-sm text-gray-600">
                        <strong>Last Updated:</strong> <?php echo $privacy_notice_date; ?>
                    </p>
                </div>

                <!-- Introduction -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4 flex items-center gap-2">
                        <i data-feather="shield" class="w-6 h-6"></i>
                        Introduction
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        This Privacy Notice explains how Raj Hospitals ("we", "our" or "us") collects and uses personal information through this website, rajhospitals.com &mdash; for example when you send an appointment or enquiry request, apply for a job, or browse the site &mdash; and the choices and rights you have.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        It does not describe how medical records created during your treatment at the hospital are handled. For those, please ask at the hospital or contact our Grievance Officer (section 11).
                    </p>
                </section>

                <!-- Who we are -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">1. Who Is Responsible for Your Information</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed"><?php echo raj_pc($privacy_contact['entity']); ?> (&ldquo;Raj Hospitals&rdquo;), <?php echo raj_pc($privacy_contact['address']); ?>, decides why and how the personal information described here is used. Under Indian data protection law this makes us the &ldquo;Data Fiduciary&rdquo;.</p>
                    </div>
                </section>

                <!-- Information We Collect -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">2. What We Collect and Why</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">2.1 Information you give us in forms</h3>
                            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                                <li><strong class="text-gray-900">Appointment, call-back and enquiry forms:</strong> your name and phone number, and &mdash; depending on the form &mdash; your email address, the department or doctor you want to see, a preferred date and a message. We use these only to respond to your request and to arrange and confirm your appointment.</li>
                                <li><strong class="text-gray-900">Contact form:</strong> your name, email address, phone number, the subject you choose and your message, used to reply to you.</li>
                                <li><strong class="text-gray-900">Corporate/TPA enquiry form:</strong> your name, organisation, designation, email address, phone number, enquiry type and message, used to respond to business enquiries.</li>
                                <li><strong class="text-gray-900">Careers form:</strong> your name, email address, phone number, the position you are applying for, your experience, your CV and any cover letter, used to assess your application and contact you about it.</li>
                            </ul>
                            <p class="text-gray-700 leading-relaxed mt-3">Please share only what is needed for your request. Do not send detailed medical records, test reports or identity documents through website forms. Give a short description and bring documents to your appointment.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">2.2 Information collected when you use the website</h3>
                            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                                <li><strong class="text-gray-900">Security:</strong> on pages with forms, Google reCAPTCHA Enterprise checks device, browser and interaction signals to protect the forms from spam and abuse.</li>
                                <li><strong class="text-gray-900">Analytics &mdash; only if you agree:</strong> Google Analytics and Usermaven record the pages you visit, your device and browser type, approximate location derived from your IP address, and clicks on this site. We have switched off Usermaven's form tracking, so what you type into forms is not sent to analytics.</li>
                                <li><strong class="text-gray-900">Advertising on blog pages &mdash; only if you agree:</strong> Google AdSense may use cookies to choose and measure the ads shown on blog pages.</li>
                                <li><strong class="text-gray-900">Chat:</strong> if you start a WhatsApp chat through the chat button, the information you send is handled by the chat widget provider and WhatsApp.</li>
                                <li><strong class="text-gray-900">Embedded videos and maps:</strong> YouTube videos and Google Maps are loaded from Google, which may receive your IP address and device information when they load or when you play a video.</li>
                                <li><strong class="text-gray-900">Server logs:</strong> our hosting provider keeps technical logs (such as IP address, date and time, and the page requested) for security and troubleshooting.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Basis -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">3. Your Consent and Our Purposes</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">We use details you submit in a form only for the purpose of that form, and patient forms ask for your agreement before you send them. Analytics and advertising cookies are used only if you choose to allow them in the privacy-choices panel. Nothing optional is switched on by default, and refusing does not stop you from using the website or booking an appointment.</p>
                        <p class="leading-relaxed">We do not use the information you submit for marketing unless you have separately agreed to it.</p>
                    </div>
                </section>

                <!-- Information Sharing and Disclosure -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">4. Who We Share It With</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">We do not sell personal information. The following service providers process information for us:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong class="text-gray-900">Formester</strong> &mdash; receives and stores website form submissions for us.</li>
                            <li><strong class="text-gray-900">Google</strong> &mdash; reCAPTCHA (form security); Google Analytics and AdSense (only with your consent); YouTube and Google Maps (embedded content).</li>
                            <li><strong class="text-gray-900">Usermaven</strong> &mdash; website analytics (only with your consent).</li>
                            <li><strong class="text-gray-900">WhatsApp chat widget provider</strong> &mdash; only if you start a chat.</li>
                            <li><strong class="text-gray-900">Our website hosting provider</strong> &mdash; hosts this website and its logs.</li>
                        </ul>
                        <p class="leading-relaxed">Some of these providers may process information outside India. Within the hospital, enquiries are passed to the staff and doctors who need them to respond to your request. We may also disclose information where the law requires it.</p>
                    </div>
                </section>

                <!-- Cookies -->
                <section class="mb-10" id="cookies">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">5. Cookies and Your Choices</h2>
                    <div class="space-y-4 text-gray-700">
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong class="text-gray-900">Essential:</strong> your privacy choice is remembered in your browser's storage (<code>raj_privacy_consent</code>) so we do not ask on every page.</li>
                            <li><strong class="text-gray-900">Security:</strong> reCAPTCHA may set cookies such as <code>_GRECAPTCHA</code> on pages with forms.</li>
                            <li><strong class="text-gray-900">Analytics (optional):</strong> Google Analytics (<code>_ga</code>, <code>_ga_*</code>) and Usermaven (<code>__eventn_id*</code> and similar).</li>
                            <li><strong class="text-gray-900">Advertising (optional, blog pages):</strong> Google AdSense (for example <code>__gads</code>, <code>__gpi</code>).</li>
                        </ul>
                        <p class="leading-relaxed">You can change or withdraw your choice at any time from &ldquo;Cookie Settings&rdquo; at the bottom of every page. When you withdraw, we delete the optional cookies set on our domain and stop loading those services.</p>
                        <p><button type="button" onclick="if (window.RajConsent) { window.RajConsent.open(); }" class="inline-flex items-center gap-2 bg-[#0191C7] text-white px-4 py-2 rounded-lg font-semibold hover:bg-[#0274a1] transition-colors"><i data-feather="sliders" class="w-4 h-4"></i> Open cookie settings</button></p>
                    </div>
                </section>

                <!-- Data Retention -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">6. How Long We Keep It</h2>
                    <div class="space-y-4 text-gray-700">
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong class="text-gray-900">Appointment and enquiry requests:</strong> <?php echo raj_pc($privacy_contact['enquiry_retention']); ?> after your request has been dealt with, unless the information becomes part of your hospital record.</li>
                            <li><strong class="text-gray-900">Job applications:</strong> <?php echo raj_pc($privacy_contact['careers_retention']); ?> after the recruitment process ends, unless you agree to us keeping your application for future openings.</li>
                            <li><strong class="text-gray-900">Analytics data:</strong> <?php echo raj_pc($privacy_contact['analytics_retention']); ?>.</li>
                            <li><strong class="text-gray-900">Records the law requires us to keep</strong> (for example medical, billing and security records) are kept for the period the law requires.</li>
                        </ul>
                        <p class="leading-relaxed">When the period ends, we delete the information or make it anonymous, and we ask our service providers to do the same.</p>
                    </div>
                </section>

                <!-- Your Rights and Choices -->
                <section class="mb-10" id="your-rights">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">7. Your Rights</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">You can ask us to:</p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong class="text-gray-900">Access</strong> a summary of the personal information we hold about you, what we use it for, and who we have shared it with;</li>
                            <li><strong class="text-gray-900">Correct, complete or update</strong> information that is inaccurate or incomplete;</li>
                            <li><strong class="text-gray-900">Erase</strong> information we no longer need, unless the law requires us to keep it;</li>
                            <li><strong class="text-gray-900">Withdraw your consent</strong> at any time, as easily as you gave it (this does not affect what was done before you withdrew);</li>
                            <li><strong class="text-gray-900">Nominate</strong> another person to exercise these rights for you in the event of your death or incapacity;</li>
                            <li><strong class="text-gray-900">Raise a grievance</strong> about how we have handled your information.</li>
                        </ul>
                        <p class="leading-relaxed"><strong class="text-gray-900">How to make a request:</strong> write to our Grievance Officer (section 11) from the email address or phone number you used with us. Tell us your name, what you are asking for, and which form or service it relates to. We may ask you to confirm your identity before acting on the request. We will respond within one month.</p>
                        <p class="leading-relaxed">If you are not satisfied with our response, you may complain to the Data Protection Board of India once the relevant provisions of the Digital Personal Data Protection Act, 2023 are in force.</p>
                    </div>
                </section>

                <!-- Children's Privacy -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">8. Children</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">If the patient is under 18, a parent or legal guardian should fill in the form on the child's behalf. We use a child's information only to provide the health services requested.</p>
                    </div>
                </section>

                <!-- Data Security -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">9. Keeping Information Secure</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">This website is served over an encrypted (HTTPS) connection, and forms send your details over an encrypted connection to our form service provider. No method of sending or storing information online is completely secure. If a personal data breach affects you, we will inform you and the relevant authorities as required by law.</p>
                    </div>
                </section>

                <!-- Third Party Links -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">10. Links to Other Websites</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">Our website links to other websites, such as YouTube, Facebook, Instagram and Google Maps. Their privacy practices are their own; please read their privacy notices.</p>
                    </div>
                </section>

                <!-- Contact Info -->
                <section class="mb-10" id="grievance-officer">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">11. Grievance Officer and Contact</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">For questions about this notice, to exercise your rights, or to raise a grievance, contact:</p>
                        <ul class="list-none space-y-2">
                            <li><strong class="text-gray-900">Grievance Officer:</strong> <?php echo raj_pc($privacy_contact['officer']); ?></li>
                            <li><strong class="text-gray-900">Email:</strong> <?php echo raj_pc($privacy_contact['email']); ?></li>
                            <li><strong class="text-gray-900">Phone:</strong> <?php echo raj_pc($privacy_contact['phone']); ?></li>
                            <li><strong class="text-gray-900">Address:</strong> <?php echo raj_pc($privacy_contact['address']); ?></li>
                        </ul>
                    </div>
                </section>

                <!-- Changes -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">12. Changes to This Notice</h2>
                    <div class="space-y-4 text-gray-700">
                        <p class="leading-relaxed">We will post any changes on this page with a new date. If a change affects something you consented to, we will ask for your choice again.</p>
                    </div>
                </section>

                <!-- Compliance -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-[#0191C7] mb-4">13. Laws This Notice Refers To</h2>
                    <div class="space-y-4 text-gray-700">
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Information Technology Act, 2000 and the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011</li>
                            <li>Digital Personal Data Protection Act, 2023 and the Digital Personal Data Protection Rules, 2025, as their provisions come into force</li>
                        </ul>
                    </div>
                </section>

                <!-- Highlight Box -->
                <div class="mt-12 bg-gradient-to-r from-[#0191C7]/10 to-[#F9771B]/10 border-l-4 border-[#F9771B] rounded-lg p-6">
                    <div class="flex items-start gap-3">
                         <i data-feather="eye" class="w-6 h-6 text-[#F9771B] mt-1 flex-shrink-0"></i>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Questions about your information?</h3>
                            <p class="text-gray-700 leading-relaxed">
                                Contact our Grievance Officer using the details in section 11. You can change your cookie choices at any time from &ldquo;Cookie Settings&rdquo; at the bottom of every page.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include $base_url . 'components/footer.php'; ?>

    <script>
        // Use feather icons
        feather.replace();

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

        // Intersection Observer for Animations (Fade In)
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>
</body>
</html>
