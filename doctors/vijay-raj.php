<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Vijay Raj',
    'qualifications' => 'MBBS, MS, MCH',
    'specialty' => 'Neurosciences',
    'experience' => '15+ Years',
    'regNo' => '',
    'image' => '../assets/Doc-Side/vijayraj.webp',
    'description' => "Dr. Vijay Raj is a skilled Neuro Surgeon at Raj Hospital, Ranchi, with over 15 years of experience in brain and spine surgery. He provides expert care for neurological conditions including brain tumors, spinal disorders, and complex neurosurgical procedures.",
    'expertise' => [
        'Brain Tumor Surgery',
        'Spinal Surgery',
        'Neurosurgical Procedures',
        'Stroke Surgery'
    ],
    'education' => [
        [
            'degree' => 'MCH (Neurosurgery)',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MS',
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