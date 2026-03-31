<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Ravi Shekhar Singh',
    'qualifications' => 'MBBS, DCH',
    'specialty' => 'Pediatrics & Neonatology',
    'experience' => '10+ Years',
    'regNo' => '',
    'image' => '../assets/doc-dummy/male-dummy-raj.webp',
    'description' => "Dr. Ravi Shekhar Singh is an experienced Pediatrician at Raj Hospital, Ranchi, with over 10 years of expertise in newborn and child healthcare. He specializes in neonatal care, childhood immunization, and management of pediatric illnesses.",
    'expertise' => [
        'Pediatric Medicine',
        'Pediatric Critical Care',
        'Neonatal Care',
        'Child Healthcare'
    ],
    'education' => [
        [
            'degree' => 'DCH',
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