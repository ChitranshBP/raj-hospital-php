<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. T.G.N. Sinha',
    'qualifications' => 'MBBS, MS, FICS',
    'specialty' => 'ENT',
    'experience' => '45+ Years',
    'regNo' => '',
    'image' => '../assets/doctor-latest/tgn sinha.webp',
    'description' => "Dr. T.G.N. Sinha is a highly experienced ENT specialist at Raj Hospital, Ranchi, with over 45 years of distinguished practice in ear, nose, and throat care. He provides expert treatment for hearing disorders, sinusitis, and complex ENT conditions.",
    'expertise' => [],
    'education' => [
        [
            'degree' => 'MS, FICS',
            'institution' => 'PMCH, Patna',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'RMCH, Ranchi',
            'year' => ''
        ]
    ],
    'memberships' => [],
    'awards' => [],
    'contact' => [
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>