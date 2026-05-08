<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Awnindra Kumar Singh',
    'qualifications' => 'MBBS, MD, PGDCC',
    'specialty' => 'Cardiology',
    'experience' => '16+ Years',
    'regNo' => '',
    'image' => '../assets/Raj-hospital-doctor-image/Raj-hospital-doctor-image/-Dr. Awnindra-Kumar-Singh-Cardiologist.webp',
    'description' => "Dr. Awnindra Singh is an experienced Interventional Cardiologist at Raj Hospital, Ranchi, with over 16 years of expertise in complex cardiac procedures. He specializes in coronary angioplasty, cardiac catheterization, and advanced heart disease management.",
    'expertise' => [
        'Interventional Cardiology',
        'Angioplasty & Stenting',
        'Complex Cardiac Procedures'
    ],
    'education' => [
        [
            'degree' => 'DM (Cardiology)',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MD',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => '',
            'year' => ''
        ]
    ],
    'memberships' => [],
    'awards' => [],
    'contact' => [
        'phone' => '+919771488888'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>