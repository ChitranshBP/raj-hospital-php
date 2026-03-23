<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Jitendra Prasad',
    'qualifications' => 'MBBS, MD (Microbiology)',
    'specialty' => 'FNAC, Biopsy, Blood & Laboratory Investigations',
    'experience' => '9+ Years',
    'regNo' => '',
    'image' => '../assets/doctor-latest/dr-jitendra-lab.webp',
    'description' => "Dr. Jitendra Prasad is an experienced Pathologist and Microbiologist at Raj Hospital, Ranchi, with over 9 years of expertise in laboratory diagnostics. He specializes in microbiology, clinical pathology, and infection control management.",
    'expertise' => [],
    'education' => [
        [
            'degree' => 'MBBS, MD (Microbiology)',
            'institution' => 'HIMDI Institute of Medical Sciences, Lucknow',
            'year' => ''
        ],
        [
            'degree' => 'MBBS, MD (Microbiology)',
            'institution' => 'M.L.N Medical College, Allahabad',
            'year' => ''
        ]
    ],
    'memberships' => [
        'Professor, Prasad Institute of Medical Sciences, Lucknow'
    ],
    'awards' => [],
    'contact' => [
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>