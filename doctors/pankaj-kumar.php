<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Pankaj Kumar',
    'qualifications' => 'MBBS, MS (General Surgery), MCh (Plastic Surgery)',
    'specialty' => 'Aesthetic & Reconstructive Surgery',
    'experience' => '12+ Years',
    'regNo' => '',
    'image' => '../assets/doctor-latest/pankaj-kumar-raj.webp',
    'description' => "Dr. Pankaj Kumar is a renowned Plastic, Cosmetic, and Reconstructive Surgeon based in Ranchi with over 10 years of experience. He is associated with Raj Hospital and Srijan Plastic Cosmetic and Micro Surgery Clinic, known for attention to accurate diagnosis and empathetic patient care.",
    'expertise' => [
        'Nose Reshaping',
        'Lower Body Lift',
        'Scar Revision Surgery',
        'Ear Reconstruction',
        'Acne/Pimple Scar Treatment',
        'Non-Surgical Eye Lift'
    ],
    'education' => [
        [
            'degree' => 'MCh (Plastic Surgery)',
            'institution' => 'Patna Medical College',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'Tilka Manjhi Bhagalpur University',
            'year' => ''
        ]
    ],
    'memberships' => [],
    'awards' => [
        [
            'title' => 'Global Healthcare Excellence Award',
            'organization' => '',
            'year' => ''
        ]
    ],
    'contact' => [
        'phone' => '+919771488888'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>
