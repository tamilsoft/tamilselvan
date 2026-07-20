<?php
/**
 * Testimonials, rendered by the Testimonials section on index.php.
 *
 * ---------------------------------------------------------------------------
 * REAL vs SAMPLE
 * ---------------------------------------------------------------------------
 * The first three entries are the testimonials that were already on your site.
 * They carry real names, so they are left untouched and unflagged.
 *
 * The rest are SAMPLES covering the domains your resume lists. Each has:
 *   - 'is_placeholder' => true  -> renders a visible "Sample" chip
 *   - no invented person's name -> attribution reads "Client name", not a fiction
 *
 * To make one real: replace 'quote', put the actual person's name in 'name',
 * their actual title in 'role', then delete the 'is_placeholder' line.
 * ---------------------------------------------------------------------------
 */

declare(strict_types=1);

return [

    /* --- Real — already on your site ------------------------------------- */

    [
        'quote' => 'Working with Tamil was a game-changer for our project. His keen eye for detail and user-focused design approach helped us transform our vision into an intuitive product that our customers love.',
        'name'  => 'Prasanth',
        'role'  => 'DXC Technology',
    ],
    [
        'quote' => 'Ability to seamlessly collaborate with developers and product managers is exceptional. His designs not only looked great but also addressed the core needs of our users, resulting in a much smoother development process.',
        'name'  => 'Harish',
        'role'  => 'Front End Developer',
    ],
    [
        'quote' => 'Tamilselvan has a natural talent for turning complex problems into simple, elegant solutions. His designs have been instrumental in elevating our platform’s usability and overall aesthetic.',
        'name'  => 'Alan',
        'role'  => 'Pune',
    ],

    /* --- Samples — replace with real quotes, then drop the flag ----------- */

    [
        'quote' => 'He treated our procurement regulations as a design constraint rather than an obstacle, which is rare. The result maps exactly to the statutory process while being something our officers can actually move through without training.',
        'name'  => 'Client name',
        'role'  => 'Programme Lead · Government',
        'is_placeholder' => true,
    ],
    [
        'quote' => 'Our application flow had been optimised for compliance and nobody had asked what it felt like to be the applicant. He rebuilt it around the moments where people were giving up, and made the case with evidence rather than opinion.',
        'name'  => 'Client name',
        'role'  => 'Product Owner · FinTech',
        'is_placeholder' => true,
    ],
    [
        'quote' => 'He understood immediately that our users are often anxious and unwell, and that accessibility was not a checklist at the end. The portal is calmer and clearer than anything we had before.',
        'name'  => 'Client name',
        'role'  => 'Digital Lead · Healthcare',
        'is_placeholder' => true,
    ],
    [
        'quote' => 'The design system he built is the reason five products still feel like one. It cut the duplicated work our designers were doing and gave engineering a spec they could build against without interpretation.',
        'name'  => 'Client name',
        'role'  => 'Head of Product · Enterprise SaaS',
        'is_placeholder' => true,
    ],
    [
        'quote' => 'Industrial software is dense by nature and most designers try to simplify it into uselessness. He kept the density where operators needed it and removed it everywhere else.',
        'name'  => 'Client name',
        'role'  => 'Operations Director · Industrial SaaS',
        'is_placeholder' => true,
    ],
    [
        'quote' => 'Designing for a model that is sometimes confidently wrong breaks most UX assumptions. He designed for the failure states first, and that is why users trust the assistant enough to keep using it.',
        'name'  => 'Client name',
        'role'  => 'Engineering Manager · Conversational AI',
        'is_placeholder' => true,
    ],
    [
        'quote' => 'He questioned the brief before accepting it, which slowed us down for a week and saved us a quarter. The checkout work paid for itself in the first month.',
        'name'  => 'Client name',
        'role'  => 'Founder · E-commerce',
        'is_placeholder' => true,
    ],

];
