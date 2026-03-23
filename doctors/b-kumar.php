<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. B Kumar',
    'qualifications' => 'MBBS, MS (General Surgery)',
    'specialty' => 'Minimal Access Surgery',
    'experience' => '12 Years',
    'regNo' => '',
    'image' => '../assets/doc-dummy/male-dummy-raj.webp',
    'description' => "Dr. B Kumar is a skilled Minimal Access Surgeon at Raj Hospital, Ranchi, with 12 years of experience in laparoscopic and laser surgical procedures. He specializes in diagnostic and therapeutic endoscopy, laser proctology, and advanced minimally invasive surgeries.",
    'expertise' => [
        'Laparoscopy Surgery',
        'Laser Surgery for Proctology',
        'Diagnostic and Therapeutic Endoscopy'
    ],
    'education' => [
        [
            'degree' => 'MS (General Surgery)',
            'institution' => 'RIMS, Ranchi',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'JLNMCH, Bhagalpur',
            'year' => ''
        ]
    ],
    'memberships' => [
        'F.MAS',
        'F.IAGE',
        'Member of ASI',
        'Member of Diabetic Foot',
        'Treasurer in ASI Jharkhand Chapter'
    ],
    'awards' => [],
    'contact' => [
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>