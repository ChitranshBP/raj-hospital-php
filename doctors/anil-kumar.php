<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Anil Kumar',
    'qualifications' => 'MBBS, MD (Psychiatry)',
    'specialty' => 'Psychiatry & Mental Health',
    'experience' => '40+ Years',
    'regNo' => '', // Optional
    'image' => '../assets/Doc-Side/Dr Anil Kumar (Psychiatry).webp',
    'description' => "Dr. Anil Kumar is a highly experienced Psychiatrist at Raj Hospital, Ranchi, with over 40 years of expertise in mental health care. He provides comprehensive treatment for depression, anxiety, psychosis, and other psychiatric disorders with a compassionate, patient-centered approach.",
    'expertise' => [
        'Electrophysiology (EMG & EEG)',
        'Neuro-Psychiatric Care',
        'Clinical Neurology',
        'Cognitive Behavioral Therapy',
        'Mental Health Management'
    ],
    'education' => [
        [
            'degree' => 'MD (Psychiatry)',
            'institution' => 'Patna Medical College',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'Meerut Medical College',
            'year' => ''
        ]
    ],
    'memberships' => [
        'Fellow Indian Psychiatric Society',
        'Association Member Neurology Society of India'
    ],
    'awards' => [],
    'contact' => [
        'phone' => '0651-2446111'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>