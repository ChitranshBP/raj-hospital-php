<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Anamika Kumari',
    'qualifications' => 'MBBS, MS, DNB',
    'specialty' => 'Oncology (Cancer Care)',
    'experience' => '11+ Years',
    'regNo' => '',
    'image' => '../assets/Doc-Side/Dr Anamika Onco photo.webp',
    'description' => "Dr. Anamika Kumari is a dedicated Radiation Oncologist at Raj Hospital, Ranchi, with over 11 years of experience in cancer treatment and radiotherapy. She specializes in precision radiation therapy for various cancers, offering comprehensive oncological care.",
    'expertise' => [
        'Head & Neck Oncology',
        'Breast Oncology',
        'Radiotherapy',
        'Cancer Management'
    ],
    'education' => [
        [
            'degree' => 'DNB (Radiotherapy)',
            'institution' => 'Mahavir Cancer Sansthan, Patna',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'Patna Medical College, Patna',
            'year' => ''
        ]
    ],
    'memberships' => [
        'Association of Radiation Oncologist of India'
    ],
    'awards' => [],
    'contact' => [
        'phone' => '0651-2446111'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>