<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Ranajan Kumar Jha',
    'qualifications' => 'MBBS, MS, FESS',
    'specialty' => 'ENT',
    'experience' => '15+ Years',
    'regNo' => '',
    'image' => '../assets/new-doctors-side/ranajan kumar jha.webp',
    'description' => "Dr. Ranajan Jha is an experienced ENT specialist at Raj Hospital, Ranchi, with over 15 years of expertise in ear, nose, and throat care. He specializes in functional endoscopic sinus surgery (FESS), tonsillectomy, and advanced ENT procedures.",
    'expertise' => [
        'Functional Endoscopic Sinus Surgery (FESS)',
        'Management of Nasal and Sinus Disorders',
        'Ear, Nose, and Throat Care',
        'Skull Base and Endoscopic Surgeries'
    ],
    'education' => [
        [
            'degree' => 'Fellowship in Functional Endoscopic Sinus Surgery (FESS)',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MS (ENT)',
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
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>