<?php $base_url = '../'; ?>
<!DOCTYPE html>
<html lang="hi">


<head>
    <?php $inc_path = isset($base_url) ? $base_url . 'custom-code.php' : 'custom-code.php'; include_once $inc_path; ?>
    <link rel="icon" type="image/png" href="/assets/favicon/raj-favicon-.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Which Is More Dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Heart Attack</a> or Cardiac Arrest? Doctor-Explained | RAJ Hospital Ranchi</title>
    <meta name="description" content="Which is more dangerous: heart attack or cardiac arrest? Cardiologists at RAJ Hospital Ranchi explain the survival rates, time-criticality, and how to respond to each emergency.">
    <meta name="keywords" content="which is more dangerous heart attack or cardiac arrest, heart attack vs cardiac arrest survival, sudden cardiac arrest survival, CPR survival rate, RAJ Hospital Ranchi, best hospital in Ranchi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://rajhospitals.com/blog/which-is-more-dangerous-heart-attack-or-cardiac-arrest/">
    <link rel="stylesheet" href="/blog/assets/css/blog-components.css">

    <meta property="og:title" content="Which Is More Dangerous: Heart Attack or Cardiac Arrest? Doctor-Explained">
    <meta property="og:description" content="Cardiologist-reviewed comparison of heart attack vs cardiac arrest, with survival statistics and emergency response.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://rajhospitals.com/blog/which-is-more-dangerous-heart-attack-or-cardiac-arrest/">
    <meta property="og:image" content="https://rajhospitals.com/blog/assets/img/featured/which-is-more-dangerous-heart-attack-or-cardiac-arrest.png">
    <meta property="og:locale" content="hi_IN">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 500: '#c62828', 600: '#b71c1c' },
                        secondary: { 600: '#0191c7' },
                        accent: { 500: '#f97316' }
                    }
                }
            }
        }
    </script>

    <!-- Article Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "Which Is More Dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Heart Attack</a> or Cardiac Arrest? Doctor-Explained",
        "author": { "@type": "Organization", "name": "RAJ Hospital Ranchi" },
        "publisher": { "@type": "Organization", "name": "RAJ Hospital Ranchi", "logo": { "@type": "ImageObject", "url": "https://rajhospitals.com/assets/favicon/raj-favicon-.png" } },
        "datePublished": "2026-06-16",
        "dateModified": "2026-06-16",
        "mainEntityOfPage": "https://rajhospitals.com/blog/which-is-more-dangerous-heart-attack-or-cardiac-arrest/"
    }
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://rajhospitals.com/" },
            { "@type": "ListItem", "position": 2, "name": "Blog", "item": "https://rajhospitals.com/blog/" },
            { "@type": "ListItem", "position": 3, "name": "Which Is More Dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Heart Attack</a> or Cardiac Arrest?" }
        ]
    }
    </script>

    <!-- MedicalWebPage Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MedicalWebPage",
        "name": "Which Is More Dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Heart Attack</a> or Cardiac Arrest?",
        "description": "A cardiologist-reviewed comparison of acute myocardial infarction and sudden cardiac arrest, with survival statistics and emergency response protocols.",
        "url": "https://rajhospitals.com/blog/which-is-more-dangerous-heart-attack-or-cardiac-arrest/",
        "author": { "@type": "Organization", "name": "RAJ Hospital Ranchi" },
        "publisher": { "@type": "Organization", "name": "RAJ Hospital Ranchi" },
        "datePublished": "2026-06-16",
        "dateModified": "2026-06-16",
        "about": [
            { "@type": "MedicalCondition", "name": "Acute Myocardial Infarction" },
            { "@type": "MedicalCondition", "name": "Sudden Cardiac Arrest" }
        ],
        "medicalSpecialty": "Cardiology"
    }
    </script>

    <!-- FAQPage Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "Which is more dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">heart attack</a> or cardiac arrest?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Cardiac arrest is the more immediately fatal event. Without CPR and defibrillation within 3-5 minutes, brain death begins and survival drops by 7-10% per minute. A heart attack is also life-threatening but usually allows more time — modern primary angioplasty can save heart muscle and life if performed within 90-120 minutes."
                }
            },
            {
                "@type": "Question",
                "name": "What is the survival rate of out-of-hospital cardiac arrest in India?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Survival to hospital discharge after out-of-hospital cardiac arrest in India is currently 1-3%. In countries with widespread CPR training, AED availability, and EMS response under 8 minutes (like Scandinavia, parts of the US, Japan, Korea), survival reaches 10-25%. The biggest gap in India is bystander CPR — under 5% of arrests receive it."
                }
            },
            {
                "@type": "Question",
                "name": "What is the survival rate of a heart attack in India?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "In-hospital mortality for ST-elevation MI (STEMI) at a primary PCI-capable centre in India is 4-8% — comparable to global benchmarks. At centres without 24x7 cath lab access, mortality can reach 12-15%. The earlier the patient reaches a PCI-capable hospital, the better the outcome. RAJ Hospital Ranchi maintains a door-to-balloon time of under 60 minutes."
                }
            },
            {
                "@type": "Question",
                "name": "Can you survive a cardiac arrest if your heart is restarted?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes — if circulation is restored quickly. Survival with good neurological outcome is highest when bystander CPR begins within 1 minute and defibrillation occurs within 3-5 minutes. Beyond 8-10 minutes without CPR, severe brain injury is likely even if the heart is restarted. Therapeutic hypothermia (cooling) at a tertiary centre like RAJ Hospital further improves outcomes."
                }
            },
            {
                "@type": "Question",
                "name": "What is the best way to protect yourself from both?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Control the shared risk factors: stop smoking, keep LDL cholesterol low, manage blood pressure and <a href="/specialties/internal-medicine.php" class="text-red-600 hover:underline font-semibold">diabetes</a>, exercise 150 minutes a week, manage <a href="/specialties/psychiatry-and-mental-health.php" class="text-red-600 hover:underline font-semibold">stress</a>, learn CPR, and know your family history. RAJ Hospital's preventive cardiology clinic in Ranchi offers all of these under one roof."
                }
            }
        ]
    }
    </script>
</head>

<body class="bg-gray-50 font-sans">

    <?php include $base_url . 'components/navbar.php'; ?>

    <div class="max-w-4xl mx-auto px-4 py-4 text-sm mt-[120px]">
        <nav class="text-gray-500">
            <a href="/" class="hover:text-secondary-600">Home</a>
            <span class="mx-2">›</span>
            <a href="/blog/" class="hover:text-secondary-600">Blog</a>
            <span class="mx-2">›</span>
            <span class="text-gray-700">Which Is More Dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Heart Attack</a> or Cardiac Arrest?</span>
        </nav>
    </div>

    <main class="max-w-4xl mx-auto px-4 pb-12">
        <article class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="aspect-[16/9] md:aspect-[21/9] w-full overflow-hidden bg-gray-50 flex items-center justify-center">
                <img src="/blog/assets/img/featured/which-is-more-dangerous-heart-attack-or-cardiac-arrest.png" alt="Which Is More Dangerous: Heart Attack or Cardiac Arrest - Doctor Guide" class="w-full h-full object-contain">
            </div>

            <div class="p-6 md:p-10 border-b border-gray-100">
                <span class="inline-block bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full mb-4">Cardiology · Emergency Medicine</span>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Which Is More Dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Heart Attack</a> or Cardiac Arrest?</h1>
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                    <span class="flex items-center gap-1"><i data-feather="calendar" class="w-4 h-4"></i> June 16, 2026</span>
                    <span class="flex items-center gap-1"><i data-feather="clock" class="w-4 h-4"></i> 9 min read</span>
                    <span class="flex items-center gap-1"><i data-feather="user" class="w-4 h-4"></i> Reviewed by Cardiology & Emergency Medicine Team, RAJ Hospital</span>
                </div>
            </div>

            <div class="p-6 md:p-10">

                <p class="text-lg leading-relaxed text-gray-700 mb-6">
                    <strong>Which is more dangerous: <a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">heart attack</a> or cardiac arrest?</strong> It is one of the most-Googled cardiology questions in India, and one that the emergency and cardiology team at <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital, the best hospital in Ranchi</a>, fields every week. The short answer is: <em><a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">cardiac</a> arrest is the more immediately fatal event, but a heart attack is the more common cause of cardiac arrest, and both are time-critical emergencies.</em> This guide, written by a cardiologist for patients and families, compares the two on survival, time-to-treatment, and what you can do today to lower your risk.
                </p>

                <div class="raj-callout raj-callout-info">
                    <strong class="text-red-700">Quick Answer:</strong>
                    <span class="text-gray-700"> <strong><a href="/specialties/cardiology.php" class="text-red-600 hover:underline font-semibold">Cardiac</a> arrest is more immediately fatal</strong> — without CPR within minutes, survival is &lt;5% in India. A heart attack is also life-threatening but modern primary angioplasty at a centre like <a href="https://rajhospitals.com/contact.php" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital Ranchi</a> can save heart muscle and life if done within 90–120 minutes. The single most useful thing a family can do is <strong>learn hands-only CPR</strong> — it more than doubles the odds of a loved one surviving a cardiac arrest.</span>
                </div>

                <h2 class="raj-h2">The Two Emergencies — A Quick Recap</h2>
                <p class="text-gray-700 mb-4">
                    A <strong>heart attack</strong> (myocardial infarction) is a circulation problem: a blocked coronary artery starves part of the heart muscle of blood. The heart usually keeps beating. The patient is typically awake, in pain, sweating, and can call for help. A <strong>cardiac arrest</strong> (sudden cardiac arrest) is an electrical problem: the heart's rhythm malfunctions and it stops pumping. The patient collapses and loses consciousness within seconds. A heart attack can cause a cardiac arrest, but they are not the same event.
                </p>

                <h2 class="raj-h2">The Survival Numbers — How Dangerous Is Each?</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 text-left text-gray-700">
                            <tr>
                                <th class="p-3">Outcome Metric</th>
                                <th class="p-3 text-red-600">Heart Attack (MI)</th>
                                <th class="p-3 text-purple-700">Cardiac Arrest (SCA)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <tr><td class="p-3 font-semibold">Time to irreversible damage</td><td class="p-3">20–40 min (heart muscle)</td><td class="p-3">4–10 min (brain)</td></tr>
                            <tr><td class="p-3 font-semibold">In-hospital mortality (best centres)</td><td class="p-3">4–8%</td><td class="p-3">20–40% (in-hospital); 70–95% (out-of-hospital)</td></tr>
                            <tr><td class="p-3 font-semibold">Out-of-hospital survival (India)</td><td class="p-3">85–92% (if PCI in time)</td><td class="p-3">1–3%</td></tr>
                            <tr><td class="p-3 font-semibold">Survival in best systems (Scandinavia, Japan, Seattle)</td><td class="p-3">95%+</td><td class="p-3">10–25%</td></tr>
                            <tr><td class="p-3 font-semibold">Time to definitive treatment</td><td class="p-3">Door-to-balloon &lt;90 min</td><td class="p-3">Defibrillation &lt;3–5 min, ICU within 30 min</td></tr>
                            <tr><td class="p-3 font-semibold">Most common immediate cause of death</td><td class="p-3">Pump failure, arrhythmia, rupture</td><td class="p-3">Brain death from anoxia</td></tr>
                            <tr><td class="p-3 font-semibold">Single biggest survival lever</td><td class="p-3">Reaching a PCI-capable hospital</td><td class="p-3">Bystander CPR within 1 minute</td></tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-gray-700 mb-4 mt-4">
                    The <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">cardiologists at RAJ Hospital Ranchi</a> summarise it bluntly: a heart attack gives you hours, a cardiac arrest gives you minutes. That asymmetry is why bystander CPR is the single most powerful intervention in all of emergency medicine.
                </p>

                <h2 class="raj-h2">Time Is Muscle vs Time Is Brain</h2>
                <p class="text-gray-700 mb-4">
                    Cardiologists use the phrase <em>"time is muscle"</em>: in a heart attack, every minute of delay means more heart muscle cells die. After 60 minutes of blockage, roughly 50% of the at-risk muscle is lost; after 6 hours, almost all of it is dead. The mission of the <a href="https://rajhospitals.com/find-a-doctor.php" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital cardiac team</a> is to open the artery within 60–90 minutes of arrival.
                </p>
                <p class="text-gray-700 mb-4">
                    In cardiac arrest, the equivalent phrase is <em>"time is brain"</em>: brain cells start dying within 4 minutes of no blood flow. By 10 minutes, the chance of meaningful neurological recovery is essentially zero. Bystander CPR buys time by manually circulating oxygenated blood until a defibrillator and EMS arrive.
                </p>

                <h2 class="raj-h2">What Determines Survival in Each</h2>
                <div class="raj-grid">
                    <div class="raj-card">
                        <h3 class="raj-card-title"><i data-feather="heart" class="raj-icon raj-icon-md raj-icon-red"></i> Heart Attack Survival Depends On</h3>
                        <ul class="list-disc list-inside text-sm space-y-1 text-gray-700">
                            <li>Time from symptom onset to first medical contact</li>
                            <li>Whether the hospital has a 24×7 cath lab</li>
                            <li>Door-to-balloon time</li>
                            <li>Age, kidney function, and diabetes status</li>
                            <li>Whether the patient receives dual antiplatelet therapy early</li>
                        </ul>
                    </div>
                    <div class="raj-card">
                        <h3 class="raj-card-title"><i data-feather="zap" class="raj-icon raj-icon-md raj-icon-purple"></i> Cardiac Arrest Survival Depends On</h3>
                        <ul class="list-disc list-inside text-sm space-y-1 text-gray-700">
                            <li>Bystander CPR within 1 minute</li>
                            <li>Public access to AEDs (Automated External Defibrillators)</li>
                            <li>EMS response time &lt;8 minutes</li>
                            <li>Initial rhythm (shockable VF/VT vs non-shockable asystole)</li>
                            <li>Post-resuscitation care (therapeutic hypothermia, PCI)</li>
                        </ul>
                    </div>
                </div>

                <h2 class="raj-h2">The India-Specific Picture</h2>
                <p class="text-gray-700 mb-4">
                    India has the highest burden of cardiac disease in the world, with an estimated 4.5 million deaths annually from cardiovascular causes. Of these, about half are from heart attacks and the other half from sudden cardiac arrests, strokes, and heart failure. The challenge:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                    <li>Only about 1,500 hospitals in India have a 24×7 cath lab — and many are in metro cities. <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital</a> is one of the few primary-PCI capable centres in Ranchi and Jharkhand.</li>
                    <li>Less than 5% of out-of-hospital cardiac arrests in India receive bystander CPR — a gap that costs tens of thousands of lives every year.</li>
                    <li>Most public places do not have AEDs. RAJ Hospital has been advocating for a state-wide AED programme in schools, malls, railway stations, and airports.</li>
                </ul>

                <h2 class="raj-h2">How to Protect Yourself and Your Family</h2>
                <p class="text-gray-700 mb-4">
                    Both events share the same upstream risk factors. The <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">preventive cardiology team at RAJ Hospital, the best multispeciality hospital in Ranchi</a>, recommends a 6-point plan:
                </p>
                <ol class="list-decimal list-inside space-y-2 text-gray-700 mb-6">
                    <li><strong>Know your numbers</strong> — annual lipid panel, blood pressure, blood sugar, BMI. RAJ Hospital offers a comprehensive heart check-up package in one visit.</li>
                    <li><strong>Stop smoking and chewing tobacco</strong> — the single biggest modifiable risk factor for both MI and SCA.</li>
                    <li><strong>Exercise 150 minutes/week</strong> — moderate aerobic activity reduces cardiac events by 25–30%.</li>
                    <li><strong>Learn hands-only CPR</strong> — book a free 60-minute session at the <a href="https://rajhospitals.com/contact.php" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital community outreach programme</a>.</li>
                    <li><strong>Take prescribed medicines</strong> — statins, BP medicines, and diabetes drugs work only if taken consistently.</li>
                    <li><strong>Recognise the warning signs</strong> — chest pressure, cold sweat, sudden breathlessness, fainting, sudden collapse. <em>When in doubt, get an ECG.</em></li>
                </ol>

                <div class="raj-callout raj-callout-danger">
                    <strong class="text-red-700">Cardiac arrest in front of you? You have 10 seconds to act.</strong>
                    <span class="text-gray-700"> Tap shoulders, shout, call 108. If no breathing, start hands-only CPR at 100–120 compressions/min, 5–6 cm deep, allowing full chest recoil. Use an AED if available. The 24×7 cardiac ER at <a href="https://rajhospitals.com/contact.php" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital Ranchi</a> continues the chain of survival.</span>
                </div>

                <h2 class="raj-h2">Final Word from the Cardiology Team</h2>
                <p class="text-gray-700 mb-4">
                    At <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital Ranchi</a>, the cardiology and emergency medicine teams treat heart attacks and cardiac arrests side by side every day. The patterns are clear: a heart attack, if treated quickly, is largely survivable. A cardiac arrest, if untreated, is largely fatal. The single biggest difference the public can make is to <strong>learn CPR</strong> and to <strong>call early</strong>. Both are free, both save lives, and both are available to every reader of this article.
                </p>

                <!-- CTA -->
                <div class="raj-cta">
                    <h3 class="text-xl font-bold text-white mb-2">Want to learn CPR? It's free, and it saves lives.</h3>
                    <p class="text-white/90 mb-4">RAJ Hospital Ranchi runs free hands-only CPR workshops every quarter for families, schools, and corporates. Book a 60-minute session today — you may save a loved one's life.</p>
                    <a href="https://rajhospitals.com/contact.php" class="raj-cta-button">Book a CPR Workshop →</a>
                </div>

                <section class="mt-8 bg-white border border-gray-200 rounded-xl p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">RAJ Hospital — संबंधित स्वास्थ्य गाइड</h2>
                    <p class="text-gray-700 mb-4">Heart attack, cardiac arrest और heart health के बारे में और जानें:</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-700">
                        <li><a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital Ranchi — Best Multispeciality Hospital in Ranchi</a></li>
                        <li><a href="/blog/difference-between-heart-attack-and-cardiac-arrest.php" class="text-secondary-600 hover:underline font-semibold">Heart Attack vs Cardiac Arrest — Key Differences</a></li>
                        <li><a href="/blog/heart-attack-symptoms-in-hindi.php" class="text-secondary-600 hover:underline font-semibold">Heart Attack Symptoms in Hindi — 12 चेतावनी संकेत</a></li>
                        <li><a href="/blog/can-anxiety-cause-a-heart-attack.php" class="text-secondary-600 hover:underline font-semibold">Can Anxiety Cause a Heart Attack? — Doctor-Explained Guide</a></li>
                        <li><a href="/blog/is-heart-attack-genetic.php" class="text-secondary-600 hover:underline font-semibold">Is Heart Attack Genetic? — Family Risk & Prevention</a></li>
                        <li><a href="/blog/heart-attack-se-kaise-bachen.php" class="text-secondary-600 hover:underline font-semibold">Heart Attack Se Kaise Bachen — 15 Tips for a Healthy Heart</a></li>
                    </ul>
                </section>

                <section class="mt-8">
                    <h2 class="raj-h2">अक्सर पूछे जाने वाले सवाल (FAQ)</h2>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-gray-800 mb-2">Is heart attack fatal?</h3>
                            <p class="text-gray-700">A heart attack is fatal in roughly 8–10% of cases in India. With modern primary angioplasty, in-hospital mortality at a PCI-capable centre like <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline font-semibold">RAJ Hospital</a> drops to 4–8%. The sooner you reach a cath-lab-equipped hospital, the better the outcome.</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-gray-800 mb-2">What is the survival rate of cardiac arrest in India?</h3>
                            <p class="text-gray-700">Currently 1–3% for out-of-hospital cardiac arrest. The single biggest lever is bystander CPR — when started within 1 minute and defibrillation occurs within 3–5 minutes, survival rises to 20–30%. RAJ Hospital trains families and corporates in Ranchi in hands-only CPR.</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-gray-800 mb-2">Can you survive a cardiac arrest if your heart stops?</h3>
                            <p class="text-gray-700">Yes, but only with immediate bystander CPR and defibrillation. Even with optimal resuscitation, about 70–80% of out-of-hospital cardiac arrests in India are fatal. In-hospital cardiac arrest has a survival of 20–40% if treated in a tertiary centre like RAJ Hospital.</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-gray-800 mb-2">Which is more common: heart attack or cardiac arrest?</h3>
                            <p class="text-gray-700">Heart attack is far more common. India reports roughly 2.8 million heart attacks a year, while out-of-hospital cardiac arrest is estimated at 5–7 lakh a year. About 25–50% of cardiac arrests are caused by an acute heart attack.</p>
                        </div>
                    </div>
                </section>

                <div class="flex items-center gap-4 bg-gray-50 p-4 rounded-lg mt-8">
                    <div class="w-16 h-16 rounded-full bg-red-600 flex items-center justify-center text-white text-xl font-bold">RH</div>
                    <div>
                        <strong class="text-gray-800">Cardiology & Emergency Medicine Team, RAJ Hospital</strong>
                        <p class="text-sm text-gray-500">Last Updated: June 16, 2026 · Reviewed by Senior Consultant Cardiologist · <a href="https://rajhospitals.com/" class="text-secondary-600 hover:underline">rajhospitals.com</a></p>
                    </div>
                </div>
            </div>
        </article>
    </main>

    <?php include $base_url . 'components/footer.php'; ?>

    <script>
        feather.replace();
    </script>
</body>
</html>
