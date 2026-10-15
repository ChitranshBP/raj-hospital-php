# RAJ Hospitals website: content and privacy rules

This is a hospital website. Everything published here must follow the NMC Guidelines on Ethical
Advertising and Public Communication (6 Oct 2026), the IMC (Professional Conduct, Etiquette and
Ethics) Regulations 2002, the Drugs and Magic Remedies (Objectionable Advertisements) Act 1954, the
CCPA misleading-advertisement guidelines, the IT Act / SPDI Rules 2011 and the DPDP Act 2023 and
Rules 2025. Apply these rules to every new or edited page, especially AI-written blog posts.

Run `php tools/check-compliance.php` before every deploy. It must report 0 errors.
Never deploy to Hostinger without the site owner's approval.

## Blog posts (`blog/*.php`)

- Put the medical disclaimer immediately after the single `<h1>`:
  `<?php include $base_url . 'components/medical-disclaimer.php'; ?>`
  Do not change the disclaimer text. (`components/navbar.php` also inserts it if a post forgets.)
- No superlatives, comparisons or guarantees anywhere, including the title, meta and og tags,
  JSON-LD, headings, image alt text and text inside images. Examples: best, top, No.1, leading,
  most trusted, world-class, unmatched, state-of-the-art, guaranteed, 100%, permanent cure, miracle,
  painless (as a selling point), सबसे अच्छा, बेस्ट, सर्वश्रेष्ठ, बेहतरीन, गारंटी, पक्का इलाज,
  जड़ से खत्म, रामबाण, चमत्कारी, अचूक.
- No patient testimonials, success stories, case stories, ratings or reviews, real or invented.
- Never claim a doctor wrote or reviewed a post unless a named doctor actually approved it. If one
  did, show their name, recognised qualifications and State Medical Council / NMC registration
  number. Otherwise the byline is "RAJ Hospital Content Team", with no "Reviewed by" line.
- No medicine doses, brand names or self-medication advice. Do not recommend herbs or supplements
  as treatment, especially for scheduled conditions (diabetes, heart disease, blood pressure,
  cancer, epilepsy, paralysis, obesity, sexual problems, menstrual disorders, kidney stones and
  others). Say "consult a doctor" instead.
- Emergencies (chest pain, stroke signs, breathing difficulty, heavy bleeding, seizures, suicidal
  thoughts): tell readers to call 108 or 112 (Tele-MANAS 14416 for mental health) straight away.
  Never suggest home remedies first.
- No invented statistics, studies or hospital figures. Cite real sources with their year.
- No inducements: free consultations, discounts, offers, packages or "limited time" wording. A call
  to action may say "Book an appointment".
- Never put HTML tags inside `<title>`, meta content or JSON-LD strings. JSON-LD must be valid JSON.
- Phone number: only the hospital's published number, +91 97714 88888. Never use placeholders.
- Images: no AI-generated people shown as real doctors, patients or staff, and no claims in image
  text.
- Every new post needs review by a qualified specialist before it is published. Add it to the
  review register in the compliance audit report.

## Doctor profiles

- Show only recognised degrees, plus the State Medical Council / NMC registration number
  (`regNo` in the profile data). Use the same details on every page that mentions the doctor.
- No "expert", "renowned", "pioneer", success rates, patient counts, or awards without the
  awarding body and year.

## Forms, cookies and tracking

- Every patient-facing form (appointment, call-back, contact) needs the privacy consent checkbox.
  Copy it from an existing form (`name="privacy_consent"`, unticked, required).
- Do not add analytics, ad or pixel scripts directly to pages. Add them to the consent loader in
  `custom-code.php` so they load only after consent. List them in `privacy-policy.php` and bump
  `NOTICE_VERSION` so visitors are asked again.
- Never send form contents to analytics (keep Usermaven `data-form-tracking` set to `none`).
- Maintenance scripts must start with the command-line guard used in `scripts/*.php`.
