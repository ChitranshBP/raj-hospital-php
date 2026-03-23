<?php
$base_url = '../';
$doctor = [
    'name' => 'Mr. Parijat Sarkar',
    'qualifications' => 'M.Sc (Sports Nutrition), B.Sc (Dietetics)',
    'specialty' => 'Dietetics & Nutrition',
    'experience' => '6+ Years',
    'regNo' => '', // Optional
    'image' => '../assets/new-doctors-side/parijat sarkar.webp',
    'description' => "Dr. Parijat Sarkar is a qualified Dietitian and Nutritionist at Raj Hospital, Ranchi, with over 6 years of experience in clinical nutrition. She specializes in sports nutrition, therapeutic diet planning, and nutritional management for chronic diseases.",
    'expertise' => [
        'Clinical Dietetics & Nutrition',
        'Sports Dietetics',
        'Preventive Healthcare Nutrition',
        'Metabolic Disorder Management',
        'MNT of Lifestyle Disorder',
        'Body Recomposition'
    ],
    'education' => [
        [
            'degree' => 'M.Sc (Sports Nutrition Specialist)',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'B.Sc (Dietetics & Nutrition)',
            'institution' => 'NSHM Knowledge Campus, Durgapur',
            'year' => ''
        ],
        [
            'degree' => 'ISSA (Life Science)',
            'institution' => '',
            'year' => ''
        ]
    ],
    'memberships' => [],
    'awards' => [],
    'contact' => [
        'phone' => '0651-2446111'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>