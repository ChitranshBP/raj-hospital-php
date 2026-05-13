<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Himalaya Jha',
    'qualifications' => 'MBBS, MD - Medicine, Certification in Diabetes & Metabolic Disorder (R.C.G.P)',
    'specialty' => 'Internal Medicine',
    'experience' => '25+ Years',
    'regNo' => '',
    'image' => '../assets/doctor-latest/dr-hmy-jha.webp',
    'description' => "Dr. Himalaya Jha is a highly experienced Internal Medicine specialist at Raj Hospital, Ranchi, with over 25 years of expertise. He specializes in diabetes management, metabolic disorders, and the treatment of infectious and febrile illnesses.",
    'previousRoles' => [
        'Ex. Resident - Batra Hospital, New Delhi',
        'Ex. CMO - CGHS, Ranchi'
    ],
    'expertise' => [
        'Diabetes & Thyroid Disorders',
        'Hypertension',
        'Dengue, Malaria, Typhoid',
        'Viral Fevers, Flu, Common Cold & Cough',
        'Sepsis',
        'Fever of Unknown Origin (FUO)',
        'Autoimmune Disorders',
        'Geriatric & Multi-morbidity Cases',
        'Metabolic Disorders',
        'Allergies',
        'Infectious Diseases'
    ],
    'opdHours' => 'Monday to Saturday, 3:00 PM to 5:00 PM',
    'education' => [
        [
            'degree' => 'MD - Medicine',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'Certification in Diabetes & Metabolic Disorder',
            'institution' => 'R.C.G.P',
            'year' => ''
        ]
    ],
    'memberships' => [],
    'awards' => [],
    'contact' => []
];

include($base_url . 'doctor-profile-template.php');
?>