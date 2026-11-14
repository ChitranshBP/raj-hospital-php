<?php
$base_url = '../';
$pageDescription = 'Dr. Ankita, MBBS, MS (General Surgery), MCh (Pediatric Surgery), is a Senior Consultant Pediatric Surgeon at Raj Hospital, Ranchi. Book an appointment.';
$doctor = [
    'name' => 'Dr. Ankita',
    'qualifications' => 'MBBS, MS (General Surgery), MCh (Pediatric Surgery)',
    'specialty' => 'Pediatric Surgery',
    'experience' => '',
    'regNo' => 'JMC 11488',
    'image' => '../assets/new-doctors-side/ankita.webp',
    'description' => "Dr. Ankita is a Senior Consultant Pediatric Surgeon at Raj Hospital, Ranchi, with an MBBS, an MS in General Surgery and an MCh in Pediatric Surgery. Dr. Ankita treats surgical conditions in newborns, infants and children, including hernia and hydrocele, undescended testis, hypospadias, anorectal malformations and other congenital anomalies, intestinal obstruction, urinary tract blockages such as PUJ obstruction and posterior urethral valves, pediatric tumors and childhood injuries.",
    'expertise' => [
        'Inguinal Hernia',
        'Hydrocele',
        'Undescended Testis',
        'Hypospadias',
        'Phimosis / Circumcision',
        'Appendicitis',
        'Constipation / Hirschsprung Disease',
        'Anorectal Malformation (ARM)',
        'Pelviureteric Junction (PUJ) Obstruction',
        'Posterior Urethral Valve (PUV)',
        'Intestinal Obstruction',
        'Intussusception',
        'Neonatal Surgical Conditions',
        'Pediatric Tumors',
        'Gallstones (Cholelithiasis)',
        'Lymphatic / Vascular Malformations',
        'Pediatric Thoracic Surgery',
        'Pediatric Trauma',
        'Congenital Anomalies',
        'Endoscopy'
    ],
    'education' => [
        [
            'degree' => 'MCh (Pediatric Surgery)',
            'institution' => '',
            'year' => ''
        ],
        [
            'degree' => 'MS (General Surgery)',
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
