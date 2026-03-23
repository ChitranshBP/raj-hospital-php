<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Piyali Banerjee',
    'qualifications' => 'MBBS, DVDL (Dermatology, Venereology, Leprosy)',
    'specialty' => 'Dermatology',
    'experience' => '12+ Years',
    'regNo' => '',
    'image' => '../assets/Doc-Side/Dr Piyali Banerjee(Derma).webp',
    'description' => "Dr. Piyali Banerjee is an experienced Dermatologist at Raj Hospital, Ranchi, with over 12 years of expertise in skin disorders and dermatological treatments. She specializes in medical dermatology, cosmetic procedures, and management of chronic skin conditions.",
    'expertise' => [
        'Hair Disorder',
        'Acne',
        'Cosmetology'
    ],
    'education' => [
        [
            'degree' => 'DVDL (Dermatology, Venereology, Leprosy)',
            'institution' => 'RIMS, Ranchi',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'RIMS, Ranchi',
            'year' => ''
        ]
    ],
    'memberships' => [
        'Life Membership IADV (LM/J/7586)'
    ],
    'awards' => [
        ['title' => 'First Prize in Award Paper Presentation', 'organization' => 'Asia Aesthetica, Gangtok', 'year' => 'September 2019'],
        ['title' => 'Award Paper Presentation', 'organization' => 'International Dermacon, Hotel Ashoka, New Delhi', 'year' => '2013'],
        ['title' => 'E-Poster Scholarship', 'organization' => 'WCOCD, Bengaluru', 'year' => 'May 2017']
    ],
    'contact' => [
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>