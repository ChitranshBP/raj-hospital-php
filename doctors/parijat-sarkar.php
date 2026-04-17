<?php
$base_url = '../';
$doctor = [
    'name' => 'Mr. Parijat Sarkar',
    'qualifications' => 'B.Sc, M.Sc (Clinical Dietetics), Sports Nutrition Specialist (ISSA), B.ED',
    'specialty' => 'Dietetics & Nutrition',
    'experience' => '6+ Years',
    'regNo' => '', // Optional
    'image' => '../assets/new-doctors-side/parijat sarkar.webp',
    'description' => "Mr. Parijat Sarkar is a qualified Dietitian and Nutritionist at Raj Hospital, Ranchi, with over 6 years of experience in clinical nutrition. He specializes in sports nutrition, therapeutic diet planning, and nutritional management for chronic diseases.",
    'expertise' => [
        'Preventive Healthcare Nutrition (from DM, HTN etc)',
        'MNT of Lifestyle Disorder (Diabetics, Hypertension, PCOD, PCOS etc)',
        'Body Recomposition (Fat loss, Muscle Gain)' ,
        'Clinical Dietetics & Nutrition',
        'Sports Dietetics',
        'Metabolic Disorder Management',
       
        
    ],
    'education' => [
        [
            'degree' => 'B. Sc. , M. Sc. (Dietetics & Nutrition)',
            'institution' => 'NSHM Knowledge Campus, Durgapur',
            'year' => ''
        ],
        [
            'degree' => 'ISSA (Sports Nutrition Specialist)',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'B.Ed',
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