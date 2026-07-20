<?php
/**
 * Case study content. Adding a project means adding an entry here — work.php and the
 * Selected Works section on index.php both render straight from this array.
 *
 * Any field left empty is skipped rather than rendered as a gap, so a half-written
 * project never shows a broken layout to a visitor.
 *
 * ---------------------------------------------------------------------------
 * REAL vs PLACEHOLDER
 * ---------------------------------------------------------------------------
 * 'karnataka-eprocurement' is the only entry built from your actual resume. Its
 * numbers are yours; the narrative framing is my draft — read it and correct it.
 *
 * The other four are DUMMY CONTENT, written so you can see the layout with five
 * projects in it. They carry 'is_placeholder' => true, which renders a visible
 * "Sample case study" notice on the page. Delete that one line per project once
 * you have written the real content — the notice disappears with it.
 *
 * Leaving the flag on is the safe state: it means dummy work can never quietly
 * read as real experience to someone hiring you.
 * ---------------------------------------------------------------------------
 *
 * Images: set 'src' to a file under images/. Leave 'src' empty ('') and the layout
 * renders a sized placeholder frame using the 'caption' — drop exports in later.
 */

declare(strict_types=1);

return [

    /* ====================================================================
       REAL — from your 2026 resume. Verify the prose before publishing.
       ==================================================================== */
    'karnataka-eprocurement' => [

        'title'    => 'Karnataka eProcurement System',
        // Outcome-led headline for the Selected Works card — states the result,
        // not the product name. This is what a hiring panel scans first.
        'headline' => 'Public tendering, rebuilt across 2,000+ screens',
        'subtitle' => 'Rebuilding how a state government buys — 2,000+ screens and 9 modules on one accessible design system.',
        'category' => 'Government · B2G',
        'year'     => '2022 — 2023',
        'featured' => true,
        'tags'     => ['Government', 'Design System', 'WCAG', 'Web & Mobile'],
        'cta'      => 'View Case Study',

        'card_summary' => 'An end-to-end UX redesign of the platform the Government of Karnataka runs its public tendering on, delivered with a team of 8+ designers.',
        'card_image'   => 'images/portfolio/cs.jpg',
        'headline_stat' => '2,000+ screens',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — eProcurement dashboard',

        'meta' => [
            'Role'     => 'Lead Application Designer',
            'Client'   => 'Government of Karnataka',
            'Employer' => 'DXC Technology',
            'Team'     => '8+ designers',
            'Duration' => 'Apr 2022 — Jul 2023',
            'Platform' => 'Web & mobile',
        ],

        'stats' => [
            ['value' => '2,000+', 'label' => 'Screens redesigned'],
            ['value' => '9+',     'label' => 'Modules delivered'],
            ['value' => '50%',    'label' => 'Faster page loads'],
            ['value' => '30%',    'label' => 'Design productivity'],
        ],

        'overview' => 'The Karnataka eProcurement System is the single channel through which state departments publish tenders and suppliers bid for public contracts. It carries real public money, and its users are not enthusiasts — they are procurement officers working to statutory deadlines and suppliers who may log in only a handful of times a year, often from older devices and unreliable connections.

Between April 2022 and July 2023 at DXC Technology, I led the end-to-end UX redesign and delivery of the platform: more than 2,000 screens across 9+ modules, rebuilt on a scalable, WCAG-compliant design system, with a team of 8+ designers.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'lead'   => 'A government procurement platform cannot simply be made simpler — every step exists for a legal reason, and the design has to work within that.',
                'body'   => 'The flow could not be shortened for its own sake: a step skipped is a tender that can be legally challenged. Accessibility was not a quality bar to aspire to but a statutory obligation. And the system had grown module by module over years, each addition carrying its own patterns, until the same action looked and behaved differently depending on where in the platform you met it.',
                'list_title' => 'What made it hard',
                'list' => [
                    'Legal exactness — every flow had to hold up to procurement regulation and audit.',
                    'Statutory accessibility — WCAG compliance was a delivery requirement, not a stretch goal.',
                    'Infrequent, high-stakes use — suppliers bid rarely, under deadline, with money at stake.',
                    'Scale — 9+ modules and 2,000+ screens had to feel like one product.',
                    'Real-world conditions — older hardware and low bandwidth across the state.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Audit of the legacy modules', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'Research & discovery',
                'lead'   => 'Before redrawing anything, we mapped what already existed — every module, every screen, and the paths people actually took through them.',
                'body'   => 'Auditing the legacy system module by module surfaced where the same task had been solved several different ways, and where users dropped out of flows that were mandatory rather than optional. We worked directly with departmental stakeholders and the engineering team to separate the steps fixed by regulation from the ones that were simply inherited habit. That distinction became the spine of the redesign: we could not remove the first, but the second was ours to fix.',
                // TODO: replace with your actual methods, participant counts and findings.
                'images' => [
                    ['src' => '', 'caption' => 'Stakeholder interviews — synthesis', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Journey map — supplier bid submission', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Affinity mapping from research', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'Who we designed for',
                'lead'   => 'Two very different users share the same platform — and pull it in opposite directions.',
                'body'   => 'One lives in the system every working day and needs speed and control. The other visits a few times a year, under deadline, and needs the system to explain itself. Designing for both — without slowing the expert or losing the newcomer — was the central tension of the project. These are role archetypes drawn from the two jobs the platform serves, not individuals.',
                'personas' => [
                    [
                        'name'    => 'Procurement Officer',
                        'context' => 'Publishes and manages tenders to statutory deadlines, every day.',
                        'goals' => [
                            'Publish a compliant tender without errors or rework.',
                            'See exactly where each tender sits in the process.',
                            'Evaluate incoming bids quickly and fairly.',
                        ],
                        'frustrations' => [
                            'The same action behaving differently across modules.',
                            'No clear sense of the current stage or what is next.',
                            'Slow screens when working against a deadline.',
                        ],
                    ],
                    [
                        'name'    => 'Supplier / Bidder',
                        'context' => 'Bids occasionally, often on older devices and slow connections.',
                        'goals' => [
                            'Understand precisely what a tender requires.',
                            'Submit a complete bid before the deadline.',
                            'Get a clear reason and next step if a bid fails.',
                        ],
                        'frustrations' => [
                            'Flows that assume familiarity there is no chance to build.',
                            'Document uploads failing silently on mobile.',
                            'Uncertainty about how many steps remain.',
                        ],
                    ],
                ],
            ],
            [
                'number' => '04',
                'title'  => 'Information architecture',
                'lead'   => 'With 9+ modules, the structure mattered more than any single screen.',
                'body'   => 'We restructured the platform around the two jobs it actually serves — publishing a tender and bidding on one — rather than around the internal departments that had each commissioned their own module. Navigation, terminology and status language were unified, so a tender at a given stage read the same way everywhere in the system.',
                'images' => [
                    ['src' => '', 'caption' => 'Sitemap — 9 modules restructured around two core jobs', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '05',
                'title'  => 'User flows',
                'lead'   => 'The regulated sequence stays intact — the redesign removes the friction that had grown up around it.',
                'body'   => 'We mapped the two primary journeys end to end and made the mandatory steps legible rather than hidden. Officers move through publishing a tender in a flow that mirrors the statutory process and states plainly where they are in it. Suppliers get a path that explains the stage they are at and what is required next.',
                'images' => [
                    ['src' => '', 'caption' => 'User flow — tender publishing', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'User flow — supplier bid submission', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Logic map — tender states', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Logic map — evaluation & award', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '06',
                'title'  => 'Design system & style guide',
                'lead'   => 'At this scale, consistency could not be maintained by review — it had to be built in.',
                'body'   => 'We created a WCAG-compliant component library that encoded the accessible behaviour once: colour contrast, focus states, keyboard navigation, target sizes and form error handling were correct by default rather than by remembering. That library is what made 2,000+ screens tractable for a team of 8+ designers, and it is where the 30% productivity gain came from.

The tokens below illustrate the structure the system encoded — type, colour roles and status — rather than reproducing the exact shipped values.',
                'styleguide' => [
                    'type' => [
                        ['label' => 'Display / Bold',    'size' => '2rem',    'meta' => 'Inter Bold · 40'],
                        ['label' => 'Heading / SemiBold', 'size' => '1.4rem',  'meta' => 'Inter SemiBold · 24'],
                        ['label' => 'Body / Regular',    'size' => '1rem',    'meta' => 'Inter Regular · 16'],
                        ['label' => 'Caption / Medium',  'size' => '.85rem',  'meta' => 'Inter Medium · 13'],
                    ],
                    'swatches' => [
                        ['name' => 'Ink',     'hex' => '#101014'],
                        ['name' => 'Surface', 'hex' => '#FFFFFF'],
                        ['name' => 'Border',  'hex' => '#E6E6EC'],
                        ['name' => 'Primary', 'hex' => '#1F5FBF'],
                        ['name' => 'Success', 'hex' => '#1A7F4B'],
                        ['name' => 'Error',   'hex' => '#C0362C'],
                    ],
                ],
                'list_title' => 'What the system encoded',
                'list' => [
                    'Accessible components meeting WCAG by default — contrast, focus, keyboard paths, target sizes.',
                    'A shared vocabulary for tender states, so status meant one thing platform-wide.',
                    'Dense data patterns — tables, filters, forms — designed once for procurement-scale content.',
                    'Responsive rules that held from desktop review down to mobile.',
                    'Documentation and handoff specs the engineering team built directly against.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Component library — core set', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Accessible form & error states', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Buttons, inputs & status chips', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '07',
                'title'  => 'The solution',
                'lead'   => 'The redesigned platform holds the regulated process intact while making every stage legible.',
                'body'   => 'Officers publish and track tenders in a flow that mirrors the statutory process and shows plainly where they are in it. Suppliers — arriving rarely and under time pressure — get an interface that explains the current stage and what is required next, rather than assuming familiarity. Modernising the UX framework also cut page load times by half, which on the connections much of the state actually uses is the difference between submitting a bid before the deadline and not.',
                'images' => [
                    ['src' => '', 'caption' => 'Officer dashboard', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Tender publishing — key screen', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Bid evaluation view', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Tender detail & status', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '08',
                'title'  => 'Mobile experience',
                'lead'   => 'For many suppliers, mobile is not a convenience — it is the only device they have.',
                'body'   => 'The same accessible components carried down to mobile, so a supplier tracking a tender or uploading a document on a phone got the same clarity as an officer on a desktop. Upload states, in particular, were made explicit so a failure on a slow connection could never pass unnoticed.',
                'images' => [
                    ['src' => '', 'caption' => 'Mobile — tender tracking', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Mobile — document upload states', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Mobile — bid submission', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '09',
                'title'  => 'Outcome',
                'lead'   => 'The redesign shipped across 9+ modules and more than 2,000 screens.',
                'body'   => 'Page load times dropped by 50% and task completion rates improved. Design productivity across the team rose by roughly 30%, and the WCAG-compliant system meant the platform met its statutory accessibility obligation as a property of how it was built rather than a remediation pass at the end. The work was recognised internally with the CAMPS Award (May 2022 and May 2023) and a Collaboration Award (March 2023).',
                'stats_repeat' => true,
            ],
            [
                'number' => '10',
                'title'  => 'Reflection',
                'lead'   => 'On a regulated platform, the constraint is the design material — not an obstacle to route around.',
                'body'   => 'The work only started moving once we accepted the statutory sequence as fixed and spent our effort on everything around it: the language, the structure, the feedback, the accessibility. The second lesson was about leverage. With 2,000+ screens, no amount of individual craft would have held the product together — building the design system first is what let a team of eight move at the speed the delivery needed while keeping the result coherent.',
            ],
        ],
    ],

    /* ====================================================================
       DUMMY — layout demo only. Replace the content, then delete
       'is_placeholder' to remove the on-page "Sample case study" notice.
       ==================================================================== */
    'enterprise-design-system' => [

        'title'    => 'Enterprise Design System',
        'headline' => 'One library, five products, 40% less UI drift',
        'subtitle' => 'One component library across five products — cutting UI inconsistency by 40% and shortening the path from design to ship.',
        'category' => 'Design System · Enterprise',
        'year'     => '2023 — 2025',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['Design System', 'Enterprise SaaS', 'Governance'],
        'cta'      => 'View Case Study',

        'card_summary' => 'The shared library behind five SaaS and AI products at Visionquest, built to keep a growing surface area coherent.',
        'card_image'   => 'images/portfolio/ds.jpg',
        'headline_stat' => '40% less UI drift',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — component library overview',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Scope'    => '5+ products',
            'Duration' => '2023 — 2025',
            'Platform' => 'Web & mobile',
        ],

        'stats' => [
            ['value' => '40%',  'label' => 'Less UI inconsistency'],
            ['value' => '5+',   'label' => 'Products served'],
            ['value' => '120+', 'label' => 'Components shipped'],
            ['value' => '2×',   'label' => 'Faster handoff'],
        ],

        'overview' => 'Placeholder copy. Five products had been designed independently, and the same button, table and empty state existed in several slightly different forms across them. This project consolidated those into one governed library.

Replace this section with the real context: what prompted the work, who it served, and what you owned.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. Describe the state of things before the system existed — where the duplication was, what it cost the team, and why solving it per-product had stopped working.',
                'list_title' => 'What was breaking',
                'list' => [
                    'The same pattern solved differently in each product.',
                    'Designers rebuilding components that already existed elsewhere.',
                    'Engineering interpreting the same spec inconsistently.',
                    'Accessibility handled per-screen rather than once, centrally.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Audit — duplicated patterns across products', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'Research & audit',
                'body'   => 'Placeholder copy. Describe how you inventoried the existing UI, what you counted, and what the audit revealed.',
                'images' => [
                    ['src' => '', 'caption' => 'Component inventory', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Consolidation map', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'Foundations',
                'body'   => 'Placeholder copy. Cover the tokens — type scale, colour, spacing, elevation — and the reasoning behind them.',
                'images' => [
                    ['src' => '', 'caption' => 'Design tokens', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '04',
                'title'  => 'Governance & adoption',
                'body'   => 'Placeholder copy. This is the part most design system case studies skip and most hiring panels care about: how you got teams to actually use it, and how changes were proposed, reviewed and versioned.',
                'images' => [
                    ['src' => '', 'caption' => 'Contribution workflow', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '05',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result and how you know it.',
                'stats_repeat' => true,
            ],
        ],
    ],

    'fintech-lending-platform' => [

        'title'    => 'FinTech Lending Platform',
        'headline' => 'A loan application people actually finish',
        'subtitle' => 'Turning a paperwork-heavy loan application into a flow applicants can finish in one sitting.',
        'category' => 'FinTech · B2C',
        'year'     => '2024',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['FinTech', 'Onboarding', 'Web & Mobile'],
        'cta'      => 'View Case Study',

        'card_summary' => 'A consumer lending journey redesigned around the moments where applicants abandon — identity, documents and waiting.',
        'card_image'   => 'images/portfolio/vs.jpg',
        'headline_stat' => 'End-to-end journey',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — loan application flow',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Team'     => 'Cross-functional squad',
            'Duration' => '2024',
            'Platform' => 'Web & mobile',
        ],

        'stats' => [
            ['value' => '—', 'label' => 'Completion rate'],
            ['value' => '—', 'label' => 'Drop-off reduced'],
            ['value' => '—', 'label' => 'Time to apply'],
            ['value' => '—', 'label' => 'Support contacts'],
        ],

        'overview' => 'Placeholder copy. A lending flow has to collect a great deal of sensitive information while keeping an anxious applicant moving. Replace this with the real product context and your role in it.

Fill the stat values above with your actual measured outcomes — they are dashes deliberately, so no invented number can be mistaken for a real one.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. Where were applicants dropping out, and why? State the business problem and the user problem separately — they are rarely the same.',
                'list_title' => 'Where it broke down',
                'list' => [
                    'Identity verification asked for too much, too early.',
                    'Document upload failed silently on mobile connections.',
                    'No indication of how long the whole process would take.',
                    'Rejections arrived without an explanation or a next step.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Funnel analysis — where applicants drop', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'Research',
                'body'   => 'Placeholder copy. Your methods, who you spoke to, and what surprised you.',
                'images' => [
                    ['src' => '', 'caption' => 'Applicant journey map', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Research synthesis', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'The solution',
                'body'   => 'Placeholder copy. What you designed and the trade-offs you made — especially anything you had to fight for, or lose.',
                'images' => [
                    ['src' => '', 'caption' => 'Application flow', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Mobile — document capture', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Status & decision states', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '04',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result.',
                'stats_repeat' => true,
            ],
        ],
    ],

    'healthcare-patient-portal' => [

        'title'    => 'Healthcare Patient Portal',
        'headline' => 'A patient portal for the worst day of your week',
        'subtitle' => 'An accessible portal for patients who are anxious, unwell, and not here to explore your navigation.',
        'category' => 'Healthcare · B2C',
        'year'     => '2024',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['Healthcare', 'Accessibility', 'Web & Mobile'],
        'cta'      => 'View Case Study',

        'card_summary' => 'Appointments, records and results, designed for people using it on the worst day of their week.',
        'card_image'   => 'images/portfolio/bd.jpg',
        'headline_stat' => 'WCAG compliant',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — patient dashboard',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Team'     => 'Cross-functional squad',
            'Duration' => '2024',
            'Platform' => 'Web & mobile',
        ],

        'stats' => [
            ['value' => '—', 'label' => 'Task completion'],
            ['value' => '—', 'label' => 'Accessibility score'],
            ['value' => '—', 'label' => 'Support calls'],
            ['value' => '—', 'label' => 'Appointment self-serve'],
        ],

        'overview' => 'Placeholder copy. Healthcare interfaces carry an unusual emotional load — the same screen may be read by someone booking a routine check and someone reading a diagnosis. Replace with the real product context.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. Who the patients were, what they needed, and where the existing portal failed them.',
                'list_title' => 'Design constraints',
                'list' => [
                    'A wide range of ages, abilities and digital confidence.',
                    'Medical language that has to stay accurate but become readable.',
                    'Accessibility as a baseline requirement, not a phase.',
                    'Content that can carry serious news, handled with care.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Accessibility audit', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'Research',
                'body'   => 'Placeholder copy. How you researched with a vulnerable user group, and what that required of the method.',
                'images' => [
                    ['src' => '', 'caption' => 'Patient journey map', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Usability testing sessions', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'The solution',
                'body'   => 'Placeholder copy. The design, and specifically how accessibility shaped it rather than decorated it.',
                'images' => [
                    ['src' => '', 'caption' => 'Patient dashboard', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Appointment booking', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Results & records', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '04',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result.',
                'stats_repeat' => true,
            ],
        ],
    ],

    'conversational-ai-assistant' => [

        'title'    => 'Conversational AI Assistant',
        'headline' => 'Designing a product that answers back',
        'subtitle' => 'Designing for a product that answers back — and sometimes gets it wrong.',
        'category' => 'Conversational AI · SaaS',
        'year'     => '2025',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['Conversational AI', 'Zero to One', 'Web'],
        'cta'      => 'View Case Study',

        'card_summary' => 'An assistant interface built around the hard parts: trust, correction, and showing the model\'s limits honestly.',
        'card_image'   => 'images/portfolio/gs.jpg',
        'headline_stat' => 'AI experience design',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — assistant interface',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Team'     => 'Cross-functional squad',
            'Duration' => '2025',
            'Platform' => 'Web',
        ],

        'stats' => [
            ['value' => '—', 'label' => 'Task success'],
            ['value' => '—', 'label' => 'Trust rating'],
            ['value' => '—', 'label' => 'Correction rate'],
            ['value' => '—', 'label' => 'Retention'],
        ],

        'overview' => 'Placeholder copy. Conversational products break most of the assumptions a screen-based design system is built on: the output is non-deterministic, the interface is largely language, and the product will confidently be wrong sometimes. Replace with the real context.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. What users were trying to do, and why a conversational surface was the right answer — or the one you were handed.',
                'list_title' => 'What makes AI UX different',
                'list' => [
                    'Non-deterministic output — the same input may not give the same answer.',
                    'Trust has to be earned and, once lost, is rarely rebuilt.',
                    'Users need a cheap way to correct the model, not just retry.',
                    'Capability has to be communicated without overpromising.',
                    'Failure states are frequent enough to be a primary design surface.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Conversation flow model', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'Research',
                'body'   => 'Placeholder copy. How you studied real conversations, and what the transcripts told you that interviews did not.',
                'images' => [
                    ['src' => '', 'caption' => 'Conversation analysis', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Prompt & response patterns', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'The solution',
                'body'   => 'Placeholder copy. The interface, and specifically how you handled uncertainty, sourcing and correction.',
                'images' => [
                    ['src' => '', 'caption' => 'Assistant interface', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Uncertainty & sourcing states', 'ratio' => '4x3'],
                    ['src' => '', 'caption' => 'Correction & feedback loop', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '04',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result.',
                'stats_repeat' => true,
            ],
        ],
    ],


    'industrial-monitoring-platform' => [

        'title'    => 'Industrial Monitoring Platform',
        'headline' => 'Dense operator dashboards that stay readable',
        'subtitle' => 'Keeping the information density operators depend on, without turning the screen into noise.',
        'category' => 'Industrial SaaS · B2B',
        'year'     => '2024',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['Industrial SaaS', 'Data-Dense UI', 'Web'],
        'cta'      => 'View Case Study',

        'card_summary' => 'A control-room interface for plant operators, designed to keep high information density legible under pressure.',
        'card_image'   => 'images/attachment-03.jpg',
        'headline_stat' => 'Control-room UX',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — operator dashboard',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Team'     => 'Cross-functional squad',
            'Duration' => '2024',
            'Platform' => 'Web',
        ],

        'stats' => [
            ['value' => '—', 'label' => 'Alerts triaged faster'],
            ['value' => '—', 'label' => 'Screens designed'],
            ['value' => '—', 'label' => 'Operator error rate'],
            ['value' => '—', 'label' => 'Adoption'],
        ],

        'overview' => 'Placeholder copy. Industrial monitoring interfaces carry more live data per screen than almost any consumer product, and operators cannot afford to hunt for the one number that matters. Replace this with the real product context and your role in it.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. What operators needed to see at a glance, and where the existing screens made them work for it.',
                'list_title' => 'Design constraints',
                'list' => [
                    'High data density that cannot simply be simplified away.',
                    'Critical alerts that must never be missed or buried.',
                    'Long shifts — the interface has to stay legible for hours.',
                    'Glanceable status over deep interaction.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Screen audit', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'The solution',
                'body'   => 'Placeholder copy. How you kept the density operators wanted while making the important signal legible.',
                'images' => [
                    ['src' => '', 'caption' => 'Operator dashboard', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Alert & status system', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result.',
                'stats_repeat' => true,
            ],
        ],
    ],

    'team-productivity-suite' => [

        'title'    => 'Team Productivity Suite',
        'headline' => 'Cutting the busywork out of a busy team',
        'subtitle' => 'A workspace that gets out of the way, so the work is the thing on screen — not the tool.',
        'category' => 'Productivity · SaaS',
        'year'     => '2025',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['Productivity', 'Workflow', 'Web & Mobile'],
        'cta'      => 'View Case Study',

        'card_summary' => 'A collaboration workspace redesigned around the handful of actions teams actually repeat all day.',
        'card_image'   => 'images/attachment-05.jpg',
        'headline_stat' => 'Workflow design',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — workspace overview',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Team'     => 'Cross-functional squad',
            'Duration' => '2025',
            'Platform' => 'Web & mobile',
        ],

        'stats' => [
            ['value' => '—', 'label' => 'Time on task'],
            ['value' => '—', 'label' => 'Feature adoption'],
            ['value' => '—', 'label' => 'Daily active use'],
            ['value' => '—', 'label' => 'Retention'],
        ],

        'overview' => 'Placeholder copy. Productivity tools live or die on the small daily interactions, not the feature list. Replace this with the real product context and your role in it.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. Which repeated actions were slower than they should be, and why teams were working around the tool instead of with it.',
                'list_title' => 'Where the friction was',
                'list' => [
                    'The most-repeated actions took the most clicks.',
                    'Features people never used crowded the ones they did.',
                    'Context switching between views broke concentration.',
                    'Onboarding buried the core loop under everything else.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Task frequency analysis', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'The solution',
                'body'   => 'Placeholder copy. How you reorganised the workspace around the core loop.',
                'images' => [
                    ['src' => '', 'caption' => 'Workspace overview', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Core action flow', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result.',
                'stats_repeat' => true,
            ],
        ],
    ],

    'ecommerce-checkout' => [

        'title'    => 'E-commerce Checkout',
        'headline' => 'A checkout that stops losing the sale',
        'subtitle' => 'Removing the friction between a full cart and a finished order.',
        'category' => 'E-commerce · B2C',
        'year'     => '2023',
        'featured' => true,
        'is_placeholder' => true,
        'tags'     => ['E-commerce', 'Checkout', 'Web & Mobile'],
        'cta'      => 'View Case Study',

        'card_summary' => 'A checkout flow rebuilt around the exact points where shoppers abandon a full cart.',
        'card_image'   => 'images/bg-1.jpg',
        'headline_stat' => 'Conversion design',

        'hero_image'   => '',
        'hero_caption' => 'Hero shot — checkout flow',

        'meta' => [
            'Role'     => 'Senior Product Designer',
            'Company'  => 'Visionquest Solutions',
            'Team'     => 'Cross-functional squad',
            'Duration' => '2023',
            'Platform' => 'Web & mobile',
        ],

        'stats' => [
            ['value' => '—', 'label' => 'Cart abandonment'],
            ['value' => '—', 'label' => 'Checkout completion'],
            ['value' => '—', 'label' => 'Steps to buy'],
            ['value' => '—', 'label' => 'Mobile conversion'],
        ],

        'overview' => 'Placeholder copy. Most carts that fill never convert, and the reasons are rarely the ones teams assume. Replace this with the real product context and your role in it.',

        'sections' => [
            [
                'number' => '01',
                'title'  => 'The problem',
                'body'   => 'Placeholder copy. Where shoppers abandoned, and what the data said versus what the team believed.',
                'list_title' => 'Where carts were lost',
                'list' => [
                    'Unexpected costs revealed too late in the flow.',
                    'A forced account step before a first purchase.',
                    'Too many fields for what should be a fast action.',
                    'No visible sense of how many steps remained.',
                ],
                'images' => [
                    ['src' => '', 'caption' => 'Checkout funnel analysis', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '02',
                'title'  => 'The solution',
                'body'   => 'Placeholder copy. What you changed and the trade-offs you made to shorten the path to purchase.',
                'images' => [
                    ['src' => '', 'caption' => 'Checkout flow', 'ratio' => '16x9'],
                    ['src' => '', 'caption' => 'Mobile — payment step', 'ratio' => '4x3'],
                ],
            ],
            [
                'number' => '03',
                'title'  => 'Outcome',
                'body'   => 'Placeholder copy. Replace with the measured result.',
                'stats_repeat' => true,
            ],
        ],
    ],

];
