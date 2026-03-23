<?php
// Ensure $doctor variable exists - this file should be included after setting $doctor
if (!isset($doctor)) {
    die("Doctor data not found.");
}
// Default $base_url if not set
if (!isset($base_url)) {
    $base_url = '../';
}

// === AUTO-GENERATE SEO META TAGS ===
$doctorName = $doctor['name'];
$specialty = $doctor['specialty'];
$experience = $doctor['experience'];
$qualifications = $doctor['qualifications'];

// Page Title: "Dr [Name] – [Specialization] in Ranchi"
if (!isset($pageTitle)) {
    $pageTitle = $doctorName . ' – ' . $specialty . ' in Ranchi';
}

// Meta Description: compelling, 140-160 chars with CTA
if (!isset($pageDescription)) {
    $pageDescription = $doctorName . ' (' . $qualifications . ') is a ' . $specialty . ' specialist at Raj Hospital, Ranchi with ' . $experience . ' experience. Book appointment now.';
    // Trim to 160 chars if needed
    if (strlen($pageDescription) > 160) {
        $pageDescription = $doctorName . ' - ' . $specialty . ' at Raj Hospital, Ranchi. ' . $experience . ' experience. Consult now!';
    }
}

// Keywords
if (!isset($pageKeywords)) {
    $pageKeywords = $doctorName . ', ' . $specialty . ' in Ranchi, Best ' . $specialty . ' in Ranchi, ' . $doctorName . ' ' . $specialty . ', ' . $doctorName . ' Raj Hospital Ranchi, ' . $specialty . ' doctor Ranchi';
}

// OG Type
$ogType = 'profile';

// Canonical URL
$slug = basename($_SERVER['SCRIPT_NAME'], '.php');
$canonicalUrl = 'https://www.rajhospitalranchi.com/doctors/' . $slug;

include($base_url . 'header.php');
?>

<!-- JSON-LD Structured Data for Doctor -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Physician",
    "name": "<?php echo htmlspecialchars($doctorName); ?>",
    "description": "<?php echo htmlspecialchars($doctor['description']); ?>",
    "medicalSpecialty": "<?php echo htmlspecialchars($specialty); ?>",
    "qualifications": "<?php echo htmlspecialchars($qualifications); ?>",
    <?php if (!empty($doctor['image'])): ?>
    "image": "https://www.rajhospitalranchi.com/<?php echo htmlspecialchars(ltrim(str_replace('../', '', $doctor['image']), '/')); ?>",
    <?php endif; ?>
    "worksFor": {
        "@type": "Hospital",
        "name": "Raj Hospital",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Bariatu Road",
            "addressLocality": "Ranchi",
            "addressRegion": "Jharkhand",
            "postalCode": "834009",
            "addressCountry": "IN"
        },
        "telephone": "+919263630500",
        "url": "https://www.rajhospitalranchi.com"
    },
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "Bariatu Road",
        "addressLocality": "Ranchi",
        "addressRegion": "Jharkhand",
        "postalCode": "834009",
        "addressCountry": "IN"
    },
    <?php if (!empty($doctor['contact']['phone'])): ?>
    "telephone": "<?php echo htmlspecialchars($doctor['contact']['phone']); ?>",
    <?php endif; ?>
    "url": "<?php echo htmlspecialchars($canonicalUrl); ?>",
    "memberOf": {
        "@type": "MedicalOrganization",
        "name": "Raj Hospital, Ranchi"
    }
}
</script>

<div id="profile-container">
    <section class="bg-gradient-to-br from-primary-50 to-secondary-50 mt-28 py-12 fade-in">
        <div class="max-w-7xl mx-auto px-4">
            <div class="md:flex md:items-start md:gap-12">
                <!-- Left: Image & Info -->
                <div class="md:flex-1 space-y-8">
                    <div
                        class="flex flex-col md:flex-row md:items-center md:gap-8 items-center text-center md:text-left">
                        <div
                            class="relative w-48 h-48 md:w-64 md:h-60 rounded-full overflow-hidden border-4 border-white shadow-xl flex-shrink-0">
                            <img src="<?php echo htmlspecialchars($doctor['image']); ?>"
                                alt="<?php echo htmlspecialchars($doctor['name'] . ' - ' . $doctor['specialty'] . ' at Raj Hospital Ranchi'); ?>"
                                class="w-full h-full object-cover object-top"
                                onerror="this.src='https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=400&q=80'">
                        </div>
                        <div class="flex-1 mt-6 md:mt-0">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                                <?php echo htmlspecialchars($doctor['name']); ?>
                            </h1>
                            <p class="text-xl text-primary-600 font-medium mb-2">
                                <?php echo htmlspecialchars($doctor['qualifications']); ?>
                            </p>
                            <p class="text-lg text-secondary-600 font-medium mb-4">
                                <?php echo htmlspecialchars($doctor['specialty']); ?>
                            </p>

                            <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-6 text-gray-700">
                                <span class="flex items-center"><i data-feather="user"
                                        class="w-5 h-5 mr-2 text-gray-500"></i>
                                    <?php echo htmlspecialchars($doctor['experience']); ?> Experience
                                </span>
                                <?php if (isset($doctor['regNo']) && $doctor['regNo']): ?>
                                    <span class="flex items-center"><i data-feather="hash"
                                            class="w-5 h-5 mr-2 text-gray-500"></i> Reg:
                                        <?php echo htmlspecialchars($doctor['regNo']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                                <button onclick="openBookingBase()"
                                    class="bg-primary-500 text-white px-6 py-3 rounded-lg hover:bg-primary-600 transition-colors font-semibold flex items-center justify-center space-x-2 shadow-md">
                                    <i data-feather="calendar" class="w-5 h-5"></i><span>Book Appointment</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    <?php if (!empty($doctor['description'])): ?>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-2">About
                                <?php echo htmlspecialchars($doctor['name']); ?>
                            </h2>
                            <p class="text-gray-700 leading-relaxed">
                                <?php echo htmlspecialchars($doctor['description']); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <!-- Expertise -->
                    <?php if (!empty($doctor['expertise'])): ?>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-2">Areas of
                                Expertise</h2>
                            <div class="grid md:grid-cols-2 gap-4">
                                <?php foreach ($doctor['expertise'] as $skill): ?>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                                        <span class="text-gray-700">
                                            <?php echo htmlspecialchars($skill); ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Education -->
                    <?php if (!empty($doctor['education'])): ?>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-2">Education &
                                Training</h2>
                            <div class="space-y-6">
                                <?php foreach ($doctor['education'] as $edu): ?>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            <?php echo htmlspecialchars($edu['degree']); ?>
                                        </h3>
                                        <?php if (!empty($edu['institution'])): ?>
                                            <p class="text-gray-600">
                                                <?php echo htmlspecialchars($edu['institution']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($edu['year'])): ?>
                                            <p class="text-sm text-gray-500">
                                                <?php echo htmlspecialchars($edu['year']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Memberships -->
                    <?php if (!empty($doctor['memberships'])): ?>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-2">Professional
                                Memberships</h2>
                            <ul class="space-y-3">
                                <?php foreach ($doctor['memberships'] as $membership): ?>
                                    <li class="flex items-start text-gray-700">
                                        <i data-feather="check-circle"
                                            class="w-5 h-5 text-primary-500 mt-0.5 mr-3 flex-shrink-0"></i>
                                        <span>
                                            <?php echo htmlspecialchars($membership); ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Awards -->
                    <?php if (!empty($doctor['awards'])): ?>
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-2">Awards &
                                Recognition</h2>
                            <ul class="space-y-4">
                                <?php foreach ($doctor['awards'] as $award): ?>
                                    <li class="flex items-start text-gray-700">
                                        <i data-feather="award" class="w-5 h-5 text-accent-500 mt-0.5 mr-3 flex-shrink-0"></i>
                                        <div>
                                            <span class="font-medium">
                                                <?php echo htmlspecialchars($award['title']); ?>
                                            </span>
                                            <?php if (!empty($award['organization']) || !empty($award['year'])): ?>
                                                <p class="text-sm text-gray-500 mt-0.5">
                                                    <?php
                                                    echo htmlspecialchars($award['organization']);
                                                    if (!empty($award['organization']) && !empty($award['year']))
                                                        echo ' • ';
                                                    echo htmlspecialchars($award['year']);
                                                    ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Right: Contact Form -->
                <div
                    class="w-full md:w-96 md:sticky md:top-32 self-start rounded-2xl shadow-md bg-white p-6 border border-gray-100 mt-12 md:mt-24">
                    <form accept-charset="UTF-8" action="https://app.formester.com/forms/kIewn1CO8/submissions" method="POST" class="space-y-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Quick Contact
                        </h3>
                        <input type="text" name="name" placeholder="Enter your name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        <input type="tel" name="phone" placeholder="Enter mobile number" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        <input type="email" name="email" placeholder="Enter email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        <textarea rows="3" name="message" placeholder="Type your query" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none"></textarea>
                        <button type="submit"
                            class="w-full bg-primary-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors shadow-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Booking Modal -->
<div id="booking-modal"
    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-[9999] p-2 fade-in">
    <div class="bg-white rounded-lg shadow-2xl max-w-lg w-full max-h-[85vh] overflow-y-auto">
        <div
            class="sticky top-0 bg-white border-b border-gray-200 px-4 py-2.5 flex justify-between items-center rounded-t-lg z-10">
            <h4 class="font-bold text-gray-900 text-base">Book Appointment</h4>
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-700 transition-colors">
                <i data-feather="x" class="w-5 h-5"></i>
            </button>
        </div>
        <div class="p-4">
            <div class="bg-gray-50 rounded-lg p-3 mb-4 border border-gray-200">
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div>
                        <p class="text-gray-600 mb-0.5">Doctor</p>
                        <p class="font-semibold text-gray-900" id="modal-doctor-name">
                            <?php echo htmlspecialchars($doctor['name']); ?>
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-0.5">Specialty</p>
                        <p class="font-semibold text-gray-900" id="modal-doctor-specialty">
                            <?php echo htmlspecialchars($doctor['specialty']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <form accept-charset="UTF-8" action="https://app.formester.com/forms/kIewn1CO8/submissions" method="POST" class="space-y-3">
                <input type="hidden" name="doctor_name" id="form-doctor-name"
                    value="<?php echo htmlspecialchars($doctor['name']); ?>">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Patient Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none"
                        name="name" placeholder="Enter your full name">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Phone Number <span
                            class="text-red-500">*</span></label>
                    <input type="tel" required pattern="[0-9]{10}"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none"
                        name="phone" placeholder="Enter 10-digit mobile number">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Preferred Date</label>
                    <input type="date"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                </div>
                <button type="submit"
                    class="w-full bg-primary-500 hover:bg-primary-600 text-white px-4 py-2.5 rounded-lg font-semibold hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2 text-sm">
                    <i data-feather="calendar" class="w-4 h-4"></i> Submit Request
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Trigger animations
        setTimeout(() => {
            document.querySelectorAll('.fade-in').forEach(el => el.classList.add('fade-in-visible'));
        }, 100);

        // Modal Logic
        const modal = document.getElementById('booking-modal');
        const closeBtn = document.getElementById('close-modal-btn');

        window.openBookingBase = () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        };

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });

        // Re-initialize feather icons if needed (navbar/footer might have already done it, but safe to redo for new content)
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

<?php include($base_url . 'footer.php'); ?>