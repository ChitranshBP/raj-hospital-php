<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Prakash Chandra',
    'qualifications' => 'MBBS, MS, MCH',
    'specialty' => 'Neuro & Spine Surgery',
    'experience' => '50+ Years',
    'regNo' => '',
    'image' => '../assets/Doc-Side/Dr. Prakash Chandra (Neuro Surgeon).webp',
    'description' => "Dr. Prakash Chandra is a highly experienced Neurosurgeon at Raj Hospital, Ranchi, with over 50 years of experience in brain and spine surgery. He specializes in cranial surgeries, spinal procedures, and advanced neurosurgical interventions for complex neurological conditions.",
    'expertise' => [
        'Neurosurgery',
        'Spine Surgery',
        'Complex Brain Surgeries',
        'Cranial Procedures',
        'Spinal Procedures'
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