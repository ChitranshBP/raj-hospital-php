<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Prateek Kumar',
    'qualifications' => 'MBBS, MD - Dermatology',
    'specialty' => 'Dermatologist, Trichologist & Cosmetologist',
    'experience' => '',
    'regNo' => '',
    'image' => '../assets/doctor-latest/kumar-pathik.webp',
    'description' => "Dr. Prateek Kumar is a consultant dermatologist, trichologist, and cosmetologist at Raj Hospitals, Ranchi. He specializes in advanced skin, hair, and aesthetic treatments using modern technologies and procedures.",
    'expertise' => [
        'Laser Scar Removal',
        'Laser Hair Removal',
        'Hydrafacial',
        'Laser Rejuvenation',
        'Skin Tightening',
        'Botox & Fillers',
        'Microneedling & Dermaroller',
        'Chemical Peels for Pigmentation & Spots',
        'PRP Therapy',
        'GFC Therapy',
        'Mesotherapy',
        'Hair Transplant',
        'Q-Switched ND:YAG Laser Treatment',
        'Vitiligo Treatment (NB-UVB & Phototherapy)',
        'Dermoscopy Skin Analysis',
        'Advanced Aesthetic Procedures',
        'Iontophoresis for Excessive Sweating'
    ],
    'education' => [
        [
            'degree' => 'MBBS',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MD - Dermatology',
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
