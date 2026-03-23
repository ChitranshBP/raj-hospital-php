<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Praveen Kumar',
    'qualifications' => 'MBBS, DCP (Pathology)',
    'specialty' => 'FNAC, Biopsy, Blood & Laboratory Investigations',
    'experience' => '8+ Years',
    'regNo' => '',
    'image' => '../assets/doctor-latest/praveen kumar.webp',
    'description' => "Dr. Praveen Kumar is an experienced Pathologist at Raj Hospital, Ranchi, with over 8 years of expertise in clinical pathology and laboratory diagnostics. He provides accurate diagnostic services including blood investigations, tissue analysis, and disease screening.",
    'expertise' => [
        'Clinical Hematology',
        'Cell Cytology',
        'Bone Marrow Cytology / Biopsy',
        'Histopathology'
    ],
    'education' => [
        [
            'degree' => 'MBBS, DCP (Pathology)',
            'institution' => 'RIMS, Ranchi, Jharkhand',
            'year' => ''
        ]
    ],
    'memberships' => [
        'ISO-15189-2022 Trained'
    ],
    'awards' => [],
    'contact' => [
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>