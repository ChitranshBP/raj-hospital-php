<?php
$base_url = '../';
$doctor = [
    'name' => 'Dr. Mohib Ahmed',
    'qualifications' => 'MBBS (JNMCH, AMU), MD (JNMCH, AMU), IDCCM (TMH), EDM (Govind Academy, Singapore)',
    'specialty' => 'Critical Care',
    'experience' => '16+ Years',
    'regNo' => '',
    'image' => '../assets/Raj-hospital-doctor-image/Raj-hospital-doctor-image/Dr. Mohib-Ahmed.webp',
    'description' => "Dr. Mohib Ahmed is a skilled Critical Care specialist at Raj Hospital, Ranchi, with over 16 years of experience in intensive care and emergency medicine. He provides expert management of critically ill patients, sepsis, and multi-organ support in the ICU.",
    'expertise' => [
        'Critical Care',
        'Neuro Critical Care',
        'Research',
        'Airway Management',
        'Ultrasound in ICU (POCUS)'
    ],
    'education' => [
        [
            'degree' => 'EDM',
            'institution' => 'Govind Academy, Singapore',
            'year' => ''
        ],
        [
            'degree' => 'IDCCM',
            'institution' => 'TMH',
            'year' => ''
        ],
        [
            'degree' => 'MD',
            'institution' => 'JNMCH, AMU',
            'year' => ''
        ],
        [
            'degree' => 'MBBS',
            'institution' => 'JNMCH, AMU',
            'year' => ''
        ]
    ],
    'memberships' => [
        'Member of American College of Chest Physician (ACCP)',
        'Member of European Society of Intensive Care Medicine (ESICM)',
        'Member of Neuro Critical Care Society (NCS)',
        'Member of Indian Society Of Critical Care Medicine (ISCCM)',
        'Member of Research Society Of Anaesthesia And Clinical Pharmacology (RSACP)',
        'Member of Indian Medical Association (IMA)',
        'Founder Member of Ranchi Critical Care Society (RCCS, ISCCM)',
        'Treasurer - Ranchi Critical Care Society (RCCS, ISCCM)'
    ],
    'awards' => [],
    'contact' => [
        'phone' => '+919263630500'
    ]
];

include($base_url . 'doctor-profile-template.php');
?>