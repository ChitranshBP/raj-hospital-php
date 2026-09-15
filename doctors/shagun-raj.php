<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Shagun Raj',
    'qualifications' => 'MD Dermatology',
    'specialty' => 'Consultant - Dermatologist',
    'experience' => '',
    'regNo' => '',
    'image' => '../assets/doctor-latest/Dr-Shagun.webp',
    'description' => "Dr. Shagun Raj is a Consultant Dermatologist at Raj Hospital, Ranchi. Holding an MD in Dermatology, she specializes in advanced skin rejuvenation, anti-aging treatments, acne and scar care, hair fall and scalp management, psoriasis, vitiligo, chemical peels, and comprehensive management of skin, hair, and nail disorders.",
    'expertise' => [
        'Skin Rejuvenation & Anti-Aging Treatments',
        'Acne (Pimples) & Acne Scar Treatment',
        'Melasma, Pigmentation & Skin Brightening',
        'Hair Fall, Dandruff & Alopecia Management',
        'Psoriasis & Vitiligo Treatment',
        'Eczema, Dermatitis & Allergic Skin Diseases',
        'Fungal Infections, Bacterial & Viral Skin Diseases',
        'Skin, Hair & Nail Disorders',
        'Nail Disorders & Ingrown Toenail Management',
        'Urticaria (Hives) & Chronic Itching',
        'Sexually Transmitted Infections (STIs)',
        'Chemical Peels'
    ],
    'education' => [
        [
            'degree' => 'MD Dermatology',
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
