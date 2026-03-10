import re

file_path = "c:/Users/GCV/Desktop/raj-hospital-php/index.php"
with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

tabs_html = """
                    <!-- Cardiology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-orange-500 text-white shadow-lg border-transparent" data-target="cardiology">
                        <i data-feather="heart" class="w-5 h-5"></i>
                        <span>Cardiology</span>
                    </button>
                    <!-- Critical Care -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="critical-care">
                        <i data-feather="activity" class="w-5 h-5"></i>
                        <span>Critical Care</span>
                    </button>
                    <!-- Emergency -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="emergency">
                        <i data-feather="alert-circle" class="w-5 h-5"></i>
                        <span>Emergency</span>
                    </button>
                    <!-- Gastroenterology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="gastroenterology">
                        <i data-feather="trending-up" class="w-5 h-5"></i>
                        <span>Gastroenterology</span>
                    </button>
                    <!-- Neurology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="neurology">
                        <i data-feather="aperture" class="w-5 h-5"></i>
                        <span>Neurology</span>
                    </button>
                    <!-- Oncology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="oncology-cancer-care">
                        <i data-feather="shield" class="w-5 h-5"></i>
                        <span>Oncology</span>
                    </button>
                    <!-- Orthopedics -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="orthopaedics-and-joint-replacement">
                        <i data-feather="users" class="w-5 h-5"></i>
                        <span>Orthopedics</span>
                    </button>
                    <!-- Pulmonology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="pulmonology">
                        <i data-feather="wind" class="w-5 h-5"></i>
                        <span>Pulmonology</span>
                    </button>
                    <!-- Minimal Access Surgery -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="minimal-access-surgery">
                        <i data-feather="scissors" class="w-5 h-5"></i>
                        <span>Minimal Access Surgery</span>
                    </button>
                    <!-- Nephrology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="nephrology">
                        <i data-feather="droplet" class="w-5 h-5"></i>
                        <span>Nephrology</span>
                    </button>
                    <!-- Urology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="urology">
                        <i data-feather="zap" class="w-5 h-5"></i>
                        <span>Urology</span>
                    </button>
                    <!-- Gynecology -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="obstetrics-and-gynaecology">
                        <i data-feather="user" class="w-5 h-5"></i>
                        <span>Gynecology</span>
                    </button>
                    <!-- Pediatrics -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="pediatrics-and-neonatology">
                        <i data-feather="smile" class="w-5 h-5"></i>
                        <span>Pediatrics</span>
                    </button>
                    <!-- Oral & Maxillofacial -->
                    <button class="specialty-tab flex items-center space-x-2 whitespace-nowrap px-5 py-2 rounded-full font-medium text-sm border transition bg-white text-gray-600 border-gray-300 hover:border-orange-500 hover:text-orange-500" data-target="oral-and-maxillofacial">
                        <i data-feather="smile" class="w-5 h-5"></i>
                        <span>Oral & Maxillofacial</span>
                    </button>"""

panels_html = """
                <!-- Cardiology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8" id="cardiology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Cardiology</h3>
                        <p class="text-gray-700 mb-6">Specialized cardiac care including advanced diagnostics,
                            interventional procedures, and heart failure management.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Daycare Angiography</li>
                            <li>Angioplasty</li>
                            <li>IVUS, Coiling, RFA</li>
                            <li>Leadless Pacemaker</li>
                            <li>Heart Attack (MI)</li>
                            <li>Heart Failure Management</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/cardiology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/Cardiology.webp" alt="Cardiology" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Critical Care Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="critical-care">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Critical Care</h3>
                        <p class="text-gray-700 mb-6">Advanced ICU services for medical, surgical, cardiac, and neuro-critical patients.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Dedicated medical, surgical, neuro & cardiac ICUs</li>
                            <li>Ventilators, dialysis units, and monitoring beds</li>
                            <li>Infection-controlled isolation rooms</li>
                            <li>Central oxygen and vacuum lines</li>
                            <li>Round-the-clock intensivist availability</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/critical-care.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/specialties/Critical Care & Emergency/Critical-Care & Emergency.webp" alt="Critical Care" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Emergency Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="emergency">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Emergency & Trauma Care</h3>
                        <p class="text-gray-700 mb-6">24x7 emergency and acute trauma services with life support and
                            evacuation facilities.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Advance Life Support Ambulance</li>
                            <li>Rooftop Helipad for Emergency Evacuation</li>
                            <li>24x7 Emergency Care Consultants</li>
                            <li>Emergency Trauma & Acute Care Services</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/emergency.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/specialties/Critical Care & Emergency/Trauma.webp" alt="Emergency"
                            class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Gastroenterology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="gastroenterology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Gastroenterology</h3>
                        <p class="text-gray-700 mb-6">Advanced digestive and liver care through endoscopy and minimally
                            invasive treatments.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Endoscopy & Colonoscopy</li>
                            <li>ERCP, EUS, Hepatitis</li>
                            <li>Pancreatitis, Reflux, Peptic Ulcer</li>
                            <li>Abdominal Pain, Fatty Liver</li>
                            <li>Bile Duct Obstruction & GI Stenting</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/gastroenterology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/specialties/Gastroenterology & Endoscopy/Treatments we offer/Inflammatory-Bowel-Disease.webp"
                            alt="Gastroenterology" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Neurology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="neurology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Neurology</h3>
                        <p class="text-gray-700 mb-6">Comprehensive brain and spine care for injuries, strokes, and
                            neurological disorders.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Head Injuries</li>
                            <li>Brain Stroke Unit & Seizures</li>
                            <li>Endoscopic Spine Surgery</li>
                            <li>Stereotactic Tumor Surgery</li>
                            <li>Trauma, Tumor & TB Surgeries</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/neurology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/raj-home-specialty/neurology.webp" alt="Neurology"
                            class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Oncology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="oncology-cancer-care">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Oncology (Cancer Care)</h3>
                        <p class="text-gray-700 mb-6">Comprehensive cancer care through chemotherapy and specialized
                            surgical oncology.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Clinical Oncology (Chemotherapy)</li>
                            <li>Surgical Oncology - Head & Neck, Breast, Lungs, Abdominal etc.</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/oncology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/Oncology.webp" alt="Oncology" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Orthopaedics & Joint Replacement Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden"
                    id="orthopaedics-and-joint-replacement">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Orthopaedics & Joint Replacement</h3>
                        <p class="text-gray-700 mb-6">Comprehensive bone and joint care including replacements and
                            sports injury management.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Joint Replacements - Knee, Hip, Shoulder, Elbow & Ankle</li>
                            <li>Arthroscopy, Sports Injury</li>
                            <li>Bone Deformity Surgeries</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/orthopaedics.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/raj-home-specialty/Orthopaedics & Joint Replacement.webp"
                            alt="Orthopaedics" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Pulmonology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="pulmonology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Pulmonology & Respiratory Medicine</h3>
                        <p class="text-gray-700 mb-6">High-quality pulmonology care in Ranchi by expert pulmonologists with comprehensive lung and respiratory treatment.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Asthma & COPD</li>
                            <li>Chronic Bronchitis</li>
                            <li>Sleep Disorders</li>
                            <li>Lungs & Chest Ailments</li>
                            <li>Pulmonary Rehabilitation</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/pulmonology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/specialties/Pulmonology/Pulmonology.webp" alt="Pulmonology" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Minimal Access Surgery Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="minimal-access-surgery">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Minimal Access Surgery</h3>
                        <p class="text-gray-700 mb-6">Laparoscopic and laser surgeries for faster recovery and minimal
                            invasiveness.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Laparoscopic & Laser Surgery - Gall Bladder</li>
                            <li>Hernia, Appendix, General Surgery</li>
                            <li>Thoracoscopic (Lung) Surgeries</li>
                            <li>Bariatric (Weight loss) & GI Surgeries</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/minimal-access-surgery.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/specialties/Minimal Access Surgery/Laparoscopy-Surgery.webp"
                            alt="Minimal Access Surgery" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Nephrology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="nephrology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Nephrology</h3>
                        <p class="text-gray-700 mb-6">Advanced kidney care with dialysis and continuous renal
                            replacement therapy.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Hypertensive & Diabetic Kidney Disease</li>
                            <li>Hemodialysis, Peritoneal Dialysis</li>
                            <li>Acute Kidney Injury, CKD</li>
                            <li>CRRT (Continuous Renal Replacement Therapy)</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/nephrology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/raj-home-specialty/Nephrology.webp" alt="Nephrology"
                            class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Urology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="urology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Urology</h3>
                        <p class="text-gray-700 mb-6">Advanced urological care including prostate, kidney, and
                            infertility treatments.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Prostate Surgeries - TURP</li>
                            <li>Kidney Stone Surgeries</li>
                            <li>Female Urology Surgeries</li>
                            <li>Infertility Treatment</li>
                            <li>Lithotripsy</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/urology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/Urology.webp" alt="Urology" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Obstetrics & Gynecology Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden"
                    id="obstetrics-and-gynaecology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Obstetrics & Gynecology</h3>
                        <p class="text-gray-700 mb-6">Specialized care for women's health, pregnancy, and gynecological
                            conditions.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Comprehensive Obstetrics & Gynecology Services</li>
                            <li>High-Risk Pregnancy Management</li>
                            <li>Gynecological Surgeries</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/obstetrics-and-gynaecology.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/raj-home-specialty/Obstetrics & Gynecology.webp"
                            alt="Obstetrics & Gynecology" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Pediatrics Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden"
                    id="pediatrics-and-neonatology">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Pediatrics & Neonatology</h3>
                        <p class="text-gray-700 mb-6">Comprehensive healthcare for infants, children, and adolescents.
                        </p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Child and Newborn Care</li>
                            <li>Pediatric Medicine & Immunization</li>
                            <li>Growth and Development Monitoring</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/pediatrics.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/home-img/Pediatrics.webp" alt="Pediatrics" class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Oral & Maxillofacial Content -->
                <div class="specialty-panel grid grid-cols-1 lg:grid-cols-5 gap-8 hidden" id="oral-and-maxillofacial">
                    <div class="lg:col-span-3 flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Oral & Maxillofacial Surgery</h3>
                        <p class="text-gray-700 mb-6">Advanced surgical care for jaw, face, and oral conditions with modern techniques and expert precision.</p>
                        <h4 class="text-lg font-semibold mb-3">Key Services & Treatments</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 list-disc list-inside mb-6">
                            <li>Wisdom Tooth Extraction</li>
                            <li>Dental Implants & Bone Grafting</li>
                            <li>Orthognathic (Corrective Jaw) Surgery</li>
                            <li>Facial & Jaw Trauma Surgery</li>
                            <li>TMJ Disorder Management</li>
                        </ul>
                        <div class="mt-auto pt-6 space-x-4">
                            <a href="contact.php"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Book
                                Consultation</a>
                            <a href="specialties/oral-maxillofacial-surgery-ad.php"
                                class="bg-[#0191C7] hover:bg-[#007ba8] text-white px-6 py-2 rounded-lg font-semibold shadow transition inline-block">Learn
                                More</a>
                        </div>
                    </div>
                    <div class="lg:col-span-2 rounded-xl overflow-hidden shadow-lg h-64 lg:h-auto">
                        <img src="assets/specialties/oral/oral1.webp" alt="Oral & Maxillofacial Surgery" class="object-cover w-full h-full">
                    </div>
                </div>"""

import re

# replace tabs
content = re.sub(
    r'<div id="specialty-tabs"[^>]*>.*?</div>\s*</div>',
    f'<div id="specialty-tabs" class="overflow-x-auto scrollbar-hide flex space-x-4 px-12 pb-4" style="scroll-behavior: smooth;">\n{tabs_html}\n                </div>\n            </div>',
    content,
    flags=re.DOTALL
)

# replace panels
content = re.sub(
    r'<div id="specialty-content"[^>]*>.*?</section>',
    f'<div id="specialty-content" class="bg-white rounded-xl shadow p-8 min-h-[400px]">\n{panels_html}\n            </div>\n    </section>',
    content,
    flags=re.DOTALL
)

with open(file_path, "w", encoding="utf-8") as f:
    f.write(content)
