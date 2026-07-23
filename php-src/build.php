<?php
/**
 * build.php — data, page templates and the static-site generator in one file.
 *
 * Replaces data/projects.php, data/testimonials.php and the three page
 * templates. handler.php stays separate: it is the live endpoint the contact
 * form posts to and must remain reachable at its own URL.
 *
 * Regenerate the whole site:
 *     php php-src/build.php
 *
 * It writes index.html, projects.html and one work-<slug>.html per project
 * into the site root, applying the same link rewrites the pages need to work
 * as static files. No web server involved.
 *
 * ---------------------------------------------------------------------------
 * REAL vs PLACEHOLDER
 * ---------------------------------------------------------------------------
 * 'karnataka-eprocurement' is the only entry built from your actual resume.
 * The others are DUMMY CONTENT carrying 'is_placeholder' => true, which renders
 * a visible "Sample case study" notice. Delete that one line per project once
 * the real content is written — the notice disappears with it.
 *
 * Images: set 'src' to a file under images/. An entry with an empty 'src'
 * renders nothing at all. Options: 'zoom' => true opens the full file;
 * 'flat' => true drops the shadow.
 */

declare(strict_types=1);

/* ==========================================================================
   Content
   ========================================================================== */

function projects_data(): array
{
    static $data = null;
    return $data ??= [

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
            'year'     => '2021 — 2023',
            'featured' => true,
            'tags'     => ['Government', 'Design System', 'WCAG', 'Web & Mobile'],
            'cta'      => 'View Case Study',

            'card_summary' => 'An end-to-end UX redesign of the platform the Government of Karnataka runs its public tendering on, delivered with a team of 8+ designers.',
            'card_image'   => 'images/portfolio/karnataka-eprocurement.jpg',
            'headline_stat' => '2,000+ screens',

            // 3x2 matches the artwork exactly, so the cover shows uncropped.
            'hero_image'   => 'images/portfolio/e-proc/banner.jpg',
            'hero_ratio'   => '3x2',
            'hero_caption' => 'e-Procurement 2.0 — the design system programme for the Government of Karnataka',

            'meta' => [
                'Role'     => 'Lead Application Designer',
                'Client'   => 'Government of Karnataka',
                'Employer' => 'DXC Technology',
                'Team'     => '8+ designers',
                'Duration' => 'Sep 2021 — Jul 2023',
                'Platform' => 'Web & mobile',
                'Tools'    => 'Figma, Adobe XD, Zeplin',
            ],

            /* ----------------------------------------------------------------
               Overview grid — the four-quadrant brief that opens a case study.
               Each answers one question a reader has in the first 30 seconds.
               ---------------------------------------------------------------- */
            'brief' => [
                ['label' => 'Business goal',    'text' => 'Move state procurement onto a platform that is transparent and auditable by design, and that meets the government’s statutory accessibility obligation as a property of the build rather than a remediation pass.'],
                ['label' => 'User goal',        'text' => 'Let an officer publish a compliant tender without rework, and let a supplier — often bidding a handful of times a year — submit a complete bid before the deadline without guessing at what is required.'],
                ['label' => 'My responsibility','text' => 'Led the end-to-end UX for the redesign as Lead Application Designer: research and audit, information architecture, flows, the design system, and design QA through delivery, directing a team of 8+ designers.'],
                ['label' => 'Deliverables',     'text' => 'A WCAG-compliant component library, 2,000+ redesigned screens across 9+ modules, restructured IA and navigation, responsive web and mobile patterns, and handoff documentation the engineering team built against.'],
            ],

            'stats' => [
                ['value' => '2,000+', 'label' => 'Screens redesigned'],
                ['value' => '9+',     'label' => 'Modules delivered'],
                ['value' => '50%',    'label' => 'Faster page loads'],
                ['value' => '30%',    'label' => 'Design productivity'],
            ],

            'overview' => 'The Karnataka eProcurement System is the single channel through which state departments publish tenders and suppliers bid for public contracts. It carries real public money, and its users are not enthusiasts — they are procurement officers working to statutory deadlines and suppliers who may log in only a handful of times a year, often from older devices and unreliable connections.

    Between September 2021 and July 2023 at DXC Technology, I led the end-to-end UX redesign and delivery of the platform: more than 2,000 screens across 9+ modules, rebuilt on a scalable, WCAG-compliant design system, with a team of 8+ designers.',

            'sections' => [
                [
                    'number' => '01',
                    'title'  => 'Project brief',
                    'lead'   => 'What the state asked for, and the boundaries the work had to stay inside.',
                    'body'   => 'A public procurement platform is not a product with a roadmap its designers control. The requirements arrive from statute and from the departments that operate it, and the measures of success are set before the first screen is drawn. Stating those up front is what makes the rest of the decisions in this case study legible.',
                    'brief_table' => [
                        [
                            'label' => 'Client requirements',
                            'items' => [
                                'Modernise the platform the state publishes all public tenders through.',
                                'Meet WCAG accessibility as a delivery requirement, not a later remediation.',
                                'Unify 9+ modules that had each been commissioned and built separately.',
                                'Hold every step mandated by procurement regulation intact.',
                            ],
                        ],
                        [
                            'label' => 'Business goals',
                            'items' => [
                                'Procurement that is transparent and auditable by construction.',
                                'A platform maintainable as one product rather than nine.',
                                'Design throughput that could sustain 2,000+ screens.',
                            ],
                        ],
                        [
                            'label' => 'Primary users',
                            'items' => [
                                'Procurement officers publishing and evaluating tenders daily, to statutory deadlines.',
                                'Suppliers bidding occasionally, often on older devices and slow connections.',
                            ],
                        ],
                        [
                            'label' => 'Success criteria',
                            'items' => [
                                'WCAG compliance built into components rather than retrofitted.',
                                'One consistent behaviour for the same action across every module.',
                                'Measurably faster page loads on real-world connections.',
                                'Higher design throughput across a team of 8+.',
                            ],
                        ],
                        [
                            'label' => 'Constraints',
                            'items' => [
                                'The statutory sequence was fixed — no step could be removed or reordered.',
                                'Terminology was set by regulation, not chosen for clarity.',
                                'Legacy patterns across nine modules had to be reconciled, not discarded.',
                                'Older hardware and low bandwidth across the state set the performance floor.',
                            ],
                        ],
                    ],
                ],
                [
                    'number' => '02',
                    'title'  => 'Problem statement',
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
                ],
                [
                    'number' => '03',
                    'title'  => 'The design challenge',
                    'lead'   => 'With the problem stated, the question the rest of the project had to answer.',
                    'challenge' => [
                        'question' => 'How do you make a legally rigid, 2,000-screen government platform feel navigable to someone who uses it twice a year — without removing a single step the law requires?',
                        'text'     => 'Every simplification a designer would normally reach for was unavailable. The steps could not be reduced, the sequence could not be reordered, and the terminology was fixed by regulation. What remained was everything around the process: how clearly each stage announced itself, how consistently the same action behaved across 9+ modules, how well the system held up on an old device over a slow connection, and whether accessibility was built in or bolted on.',
                        'questions' => [
                            'How does a platform explain its own stage to someone with no chance to learn it?',
                            'How does one action behave identically across nine separately-built modules?',
                            'How does a mandatory step read as purposeful rather than as an obstacle?',
                            'How does accessibility become a property of the system rather than a checklist?',
                        ],
                        'metrics'  => [
                            ['value' => 'WCAG', 'label' => 'Compliance built into components by default, not retrofitted'],
                            ['value' => '50%',  'label' => 'Reduction in page load time on the connections the state actually uses'],
                            ['value' => '30%',  'label' => 'Gain in design throughput across a team of 8+'],
                            ['value' => '1',    'label' => 'Consistent behaviour for the same action across every module'],
                        ],
                    ],
                ],
                [
                    'number' => '04',
                    'title'  => 'Research & discovery',
                    'lead'   => 'The platform is a two-sided marketplace, and almost everything difficult about it follows from that.',
                    'body'   => 'A department publishes a requirement as a quotation or a tender. Bidders respond against it, the department evaluates, and a contract is awarded. Both sides use the same system, but they want opposite things from it: the department wants control, comparability and a defensible audit trail, while the bidder wants to understand what is being asked and prove they can supply it.

    Research covered both sides — the departments that run procurement across the state, and the bidders who supply them — and produced the three personas that follow. What it changed was the framing: this was not one product with two user types bolted on, but a marketplace whose two halves had to be designed against each other.',
                    'brief_table' => [
                        [
                            'label' => 'What is procured',
                            'items' => [
                                'Goods — equipment such as furniture, fittings and hardware.',
                                'Works — construction, and the materials that go into it.',
                                'Services — manpower supplied against a defined requirement.',
                            ],
                        ],
                        [
                            'label' => 'The two sides',
                            'items' => [
                                'Department — raises the requirement, publishes it, evaluates the responses and awards.',
                                'Bidder — finds relevant tenders, proves eligibility, submits, and waits on the outcome.',
                            ],
                        ],
                        [
                            'label' => 'Departments served',
                            'items' => [
                                'Krishna Bhagya Jala Nigam Limited',
                                'Karnataka Residential Educational Institutions Society',
                                'Karnataka Road Development Corporation Limited',
                                'Bangalore Electricity Supply Company Limited',
                                'Centre for e-Governance',
                                'Sarva Shiksha Abhiyan',
                                'and other state departments and agencies across Karnataka.',
                            ],
                        ],
                    ],
                    // flat: no shadow. No zoom either — the board is legible at the
                    // width it renders, so a "view full size" affordance would be
                    // offering something the reader does not need.
                    'images' => [
                        ['src' => 'images/portfolio/e-proc/research-critique.jpg', 'caption' => 'Design critique board — component consistency, accessibility, forms, tables, error prevention and feedback', 'ratio' => '3x2', 'flat' => true],
                    ],
                ],
                [
                    'number' => '05',
                    'title'  => 'Who we designed for',
                    'lead'   => 'Two sides of one marketplace — the departments that publish, and the bidders who supply.',
                    'body'   => 'Three personas came out of the research: two on the bidder side, where the needs differ sharply between a proprietor supplying goods and a consultant supplying manpower, and one on the department side. The bidder personas pull toward clarity and assistance; the department persona pulls toward control, evaluation and risk. Every goal and frustration below is taken from the research deliverable rather than written for this page.',
                    'personas' => [
                        [
                            'name'       => 'Goods Supplier',
                            'role'       => 'Bidder',
                            'context'    => 'Supplies goods in bulk and wants a bigger share of government work.',
                            'age'        => '34',
                            'occupation' => 'Sole proprietor',
                            'location'   => 'Bengaluru',
                            'goals' => [
                                'A platform where she can supply bulk items such as furniture.',
                                'To expand her presence on government projects.',
                                'To be able to demonstrate the quality of her materials.',
                            ],
                            'frustrations' => [
                                'No notification on the status of a bid she has submitted.',
                                'Needs speech assistance to work through the platform.',
                                'Icons that do not communicate what they do.',
                            ],
                        ],
                        [
                            'name'       => 'Service Contractor',
                            'role'       => 'Bidder',
                            'context'    => 'Supplies manpower against service tenders and manages the people behind them.',
                            'age'        => '28',
                            'occupation' => 'Consultant',
                            'location'   => 'Bengaluru',
                            'goals' => [
                                'To supply labour matched to what a given tender requires.',
                                'To keep track of the employees and labourers assigned to a job.',
                                'To manage the finances tied to each bid.',
                            ],
                            'frustrations' => [
                                'No dashboard giving a view of individual tasks.',
                                'The submission and signing step is not clearly labelled.',
                                'The landing page does not offer obvious sign-up and sign-in routes.',
                            ],
                        ],
                        [
                            'name'       => 'Department Officer',
                            'role'       => 'Department',
                            'context'    => 'Publishes tenders and evaluates the bids that come back against them.',
                            'age'        => '32',
                            'occupation' => 'Engineer',
                            'location'   => 'Bengaluru',
                            'goals' => [
                                'To reduce cost and waste across procurement.',
                                'To understand and reduce, eliminate or avoid risk carried by bidders.',
                                'To build a better working relationship with bidders.',
                            ],
                            'frustrations' => [
                                'No way to view a bidder profile during the evaluation stage.',
                                'No route to negotiate with a bidder against the prevailing market rate.',
                                'Deposits are not returned automatically when a bidder withdraws.',
                            ],
                        ],
                    ],
                    /* ------------------------------------------------------------
                       Problem → solution, paired per user. Every problem below is
                       one of that persona's stated frustrations; every solution is
                       something the redesign actually shipped (see sections 07-09).
                       Keeping the pairing explicit is what shows the research was
                       used rather than merely conducted.
                       ------------------------------------------------------------ */
                    'needs' => [
                        [
                            'user' => 'Goods Supplier — Bidder',
                            'pairs' => [
                                [
                                    'problem'  => 'No notification on the status of a bid already submitted.',
                                    'solution' => 'Status notifications against each submitted bid, so progress arrives rather than having to be chased.',
                                ],
                                [
                                    'problem'  => 'Needs speech assistance to work through the platform.',
                                    'solution' => 'A WCAG-compliant component library — semantic markup, labelled controls and keyboard paths — so assistive technology can read the interface.',
                                ],
                                [
                                    'problem'  => 'Icons that do not communicate what they do.',
                                    'solution' => 'A documented icon set, paired with text labels rather than standing alone.',
                                ],
                            ],
                        ],
                        [
                            'user' => 'Service Contractor — Bidder',
                            'pairs' => [
                                [
                                    'problem'  => 'No dashboard giving a view of individual tasks.',
                                    'solution' => 'A dashboard bringing bids, assigned work and their current state into one view.',
                                ],
                                [
                                    'problem'  => 'The submission and signing step is not clearly labelled.',
                                    'solution' => 'An explicit submission flow with unambiguous labelling and a confirmation that the bid is in.',
                                ],
                                [
                                    'problem'  => 'The landing page offers no obvious sign-up or sign-in route.',
                                    'solution' => 'Sign-up and sign-in presented as distinct primary actions on entry.',
                                ],
                            ],
                        ],
                        [
                            'user' => 'Department Officer — Department',
                            'pairs' => [
                                [
                                    'problem'  => 'No way to view a bidder profile during the evaluation stage.',
                                    'solution' => 'Bidder profiles reachable from inside evaluation, so a bid can be judged against who submitted it.',
                                ],
                                [
                                    'problem'  => 'No route to negotiate against the prevailing market rate.',
                                    'solution' => 'A negotiation step within the awarding flow, recorded so it stays auditable.',
                                ],
                                [
                                    'problem'  => 'Deposits are not returned automatically when a bidder withdraws.',
                                    'solution' => 'Deposit return tied to the tender state rather than to someone remembering to action it.',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'number' => '06',
                    'title'  => 'Empathy map',
                    'lead'   => 'Sitting with the supplier’s experience of a single bid, in their own terms.',
                    'body'   => 'The officer adapts to whatever the platform does — they are in it daily. The supplier does not get that chance, so the empathy work concentrated on them. Everything below is drawn from the legacy audit and the stakeholder sessions; the wording is a synthesis of what came out of those, not verbatim transcript quotes.',
                    'empathy' => [
                        'subject' => 'Supplier / Bidder — preparing and submitting a single tender bid',
                        'says' => [
                            '“I only do this a few times a year.”',
                            '“Tell me plainly what documents qualify.”',
                            '“Did my submission actually go through?”',
                        ],
                        'thinks' => [
                            'This is worth real money — I cannot afford a mistake.',
                            'I am not sure I have understood the eligibility rules.',
                            'There must be a step I am forgetting.',
                        ],
                        'does' => [
                            'Re-reads the tender document repeatedly to confirm requirements.',
                            'Assembles certificates and financials outside the system, then uploads.',
                            'Checks back for a status change with no idea when to expect one.',
                        ],
                        'feels' => [
                            'Time pressure against a hard statutory deadline.',
                            'Uncertainty about whether the submission is complete.',
                            'Little confidence that a silent failure would be noticed.',
                        ],
                        'pains' => [
                            'Requirements written for the department rather than the bidder.',
                            'Uploads that fail quietly on a slow connection.',
                            'No running view of what is done and what remains.',
                            'No stated reason or next step when a bid is rejected.',
                        ],
                        'gains' => [
                            'A plain restatement of what qualifying actually requires.',
                            'Explicit upload states and an unambiguous submission receipt.',
                            'A persistent checklist of completed versus outstanding items.',
                            'Stage tracking that says what happens next, and when.',
                        ],
                    ],
                ],
                [
                    'number' => '07',
                    'title'  => 'The supplier journey',
                    'lead'   => 'The supplier is the harder of the two users — infrequent, under deadline, and with the most to lose.',
                    'body'   => 'Mapping the bid end to end showed the friction was not evenly spread. The early stages are where a supplier decides whether the tender is worth pursuing at all, and the late stages are where a submission can fail silently. The middle — assembling documents — is simply laborious, and no design removes that. Concentrating effort at the two ends is what the map argued for.

    The stages and pain points below come from the legacy audit and the persona work; the emotional read is my interpretation of them rather than measured sentiment.',
                    'journey' => [
                        [
                            'stage'   => 'Find',
                            'action'  => 'Searches published tenders for work worth bidding on.',
                            'thought' => '“Is this one even relevant to me?”',
                            'pain'    => 'Listings that are hard to filter down to a relevant category.',
                            'mood'    => 'neutral',
                            'chance'  => 'Filters and summaries that make relevance obvious at a glance.',
                        ],
                        [
                            'stage'   => 'Understand',
                            'action'  => 'Reads the tender to work out what qualifying actually requires.',
                            'thought' => '“What exactly do I have to produce, and can I?”',
                            'pain'    => 'Requirements written for the department, not the bidder.',
                            'mood'    => 'low',
                            'chance'  => 'A plain restatement of requirements and eligibility up front.',
                        ],
                        [
                            'stage'   => 'Prepare',
                            'action'  => 'Assembles certificates, financials and technical documents.',
                            'thought' => '“Have I got everything, in the right format?”',
                            'pain'    => 'No running view of what is still outstanding.',
                            'mood'    => 'low',
                            'chance'  => 'A persistent checklist showing completed versus remaining.',
                        ],
                        [
                            'stage'   => 'Submit',
                            'action'  => 'Uploads the bid package and confirms submission.',
                            'thought' => '“Did that actually go through?”',
                            'pain'    => 'Uploads failing silently on mobile and slow connections.',
                            'mood'    => 'critical',
                            'chance'  => 'Explicit upload states and an unambiguous submission receipt.',
                        ],
                        [
                            'stage'   => 'Await',
                            'action'  => 'Waits on evaluation and the award decision.',
                            'thought' => '“Where is this now, and when do I hear?”',
                            'pain'    => 'No visibility of stage or expected timeline.',
                            'mood'    => 'neutral',
                            'chance'  => 'Clear stage tracking with the reason and next step on failure.',
                        ],
                    ],
                ],
                [
                    'number' => '08',
                    'title'  => 'Information architecture',
                    'lead'   => 'One entry point, two entirely different systems behind it.',
                    'body'   => 'Sign-in is the hinge the whole architecture turns on. A supplier who authenticates lands in a system organised around responding — bids, queries, documents, bills. A department user lands in one organised around originating: catalogue, estimate, tender, contract, in that order, repeated across each of the four procurement categories.

    That repetition is the most important property of the structure. Goods, Works, Service and Auction each run the same four-stage spine, which is what made a single component library viable across 2,000+ screens — the same tender-creation pattern serves all four rather than four variants of it. Accounts sits underneath both sides, because EMD and fees are the one concern that spans every category and both roles.',
                    // 4x3 is the closest preset to the source's 1.41 — it trims a
                    // sliver from each side, well clear of the screen content.
                    'images' => [
                        ['src' => 'images/portfolio/e-proc/ia-workspace.jpg', 'caption' => 'Mapping the architecture — the tender creation flows laid out per category', 'ratio' => '4x3', 'zoom' => true],
                    ],
                    'ia' => [
                        'entry' => 'Login / Signup',
                        'sides' => [
                            [
                                'role'    => 'User (Supplier)',
                                'summary' => 'Organised around responding to what a department has published.',
                                'feature' => [
                                    'title' => 'Supplier management',
                                    'items' => ['Supplier registration', 'Department level blacklisting', 'Supplier performance management', 'View supplier details'],
                                ],
                                'modules' => [
                                    ['title' => 'Tender management',  'items' => ['Goods tender', 'Works tender', 'Service tender']],
                                    ['title' => 'Auction management', 'items' => ['Prequalification auction', 'Direct auction']],
                                    ['title' => 'Goods tender',       'items' => ['Bid submission', 'Queries', 'Documents']],
                                    ['title' => 'Works tender',       'items' => ['Bid submission', 'Queries', 'Documents']],
                                    ['title' => 'Service tender',     'items' => ['Bid submission', 'Queries', 'Documents']],
                                    ['title' => 'Direct auction',     'items' => ['Bid submission', 'Queries', 'Documents']],
                                    ['title' => 'PQ auction',         'items' => ['Bid evaluation', 'Queries', 'Documents']],
                                    ['title' => 'Goods contract',     'items' => ['Generate bill', 'Approval', 'Price adjustment']],
                                    ['title' => 'Works contract',     'items' => ['Generate bill', 'Approval', 'Price adjustment']],
                                    ['title' => 'Service contract',   'items' => ['Generate bill', 'Approval', 'Price adjustment']],
                                    ['title' => 'Auction contract',   'items' => ['Generate bill', 'Approval', 'Price adjustment']],
                                    ['title' => 'Accounts',           'items' => ['EMD process', 'EMD refund']],
                                ],
                            ],
                            [
                                'role'    => 'Department (Admin)',
                                'summary' => 'Organised around originating — the same four-stage spine per category.',
                                'columns' => [
                                    [
                                        'label' => 'Goods',
                                        'tone'  => 'goods',
                                        'nodes' => [
                                            ['title' => 'Goods catalogue', 'items' => ['Catalogue', 'Category', 'Brand', 'Specification', 'Upload items']],
                                            ['title' => 'Indent',          'items' => ['Creation', 'Search indent', 'Approval', 'Copy indent', 'Edit indent']],
                                            ['title' => 'Goods tender',    'items' => ['Creation', 'Send for approval', 'Publish', 'Evaluation', 'Approval', 'Awarding']],
                                            ['title' => 'Goods contract',  'items' => ['Contract creation', 'Milestone creation', 'Activity completion', 'Generate bill', 'Approval', 'Price adjustment']],
                                        ],
                                    ],
                                    [
                                        'label' => 'Works',
                                        'tone'  => 'works',
                                        'nodes' => [
                                            ['title' => 'Works SR / Non-SR', 'items' => ['Create SR items', 'Create non-SR items', 'Upload information']],
                                            ['title' => 'Works estimate',    'items' => ['Creation', 'Edit estimate', 'Revision', 'LOD information', 'Approval']],
                                            ['title' => 'Works tender',      'items' => ['Creation', 'Send for approval', 'Publish', 'Evaluation', 'Approval', 'Awarding']],
                                            ['title' => 'Works contract',    'items' => ['Contract creation', 'Milestone creation', 'Activity completion', 'Generate bill', 'Approval', 'Price adjustment']],
                                        ],
                                    ],
                                    [
                                        'label' => 'Service',
                                        'tone'  => 'service',
                                        'nodes' => [
                                            ['title' => 'Service catalogue', 'items' => ['Catalogue', 'Category', 'Items', 'Specialization', 'Upload services']],
                                            ['title' => 'Service estimate',  'items' => ['Creation', 'Search estimate', 'Approval', 'Copy estimate', 'Edit estimate']],
                                            ['title' => 'Service tender',    'items' => ['Creation', 'Send for approval', 'Publish', 'Evaluation', 'Approval', 'Awarding']],
                                            ['title' => 'Service contract',  'items' => ['Contract creation', 'Milestone creation', 'Activity completion', 'Generate bill', 'Approval', 'Price adjustment']],
                                        ],
                                    ],
                                    [
                                        'label' => 'Auction',
                                        'tone'  => 'auction',
                                        'nodes' => [
                                            ['title' => 'Auction catalogue', 'items' => ['Catalogue', 'Category', 'Items', 'Specification', 'Upload items']],
                                            ['title' => 'Auction tender',    'items' => ['Creation', 'Send for approval', 'Publish', 'Evaluation', 'Approval', 'Awarding']],
                                            ['title' => 'Auction contract',  'items' => ['Contract creation', 'Milestone creation', 'Activity completion', 'Generate bill', 'Approval', 'Price adjustment']],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'shared' => [
                            'title' => 'Accounts',
                            'note'  => 'Shared by both sides and every category.',
                            'items' => ['EMD process', 'EMD refund', 'Processing fee'],
                        ],
                    ],
                ],
                [
                    'number' => '09',
                    'title'  => 'User flows',
                    'lead'   => 'The regulated sequence stays intact — the redesign removes the friction that had grown up around it.',
                    'body'   => 'Both journeys start at the same sign-in and end at the same place — Accounts, where money actually moves — and share almost nothing in between. The supplier is reacting to what has been published; the department is originating it. Mapping them separately, rather than as one flow with conditional branches, is what made the difference between the two legible enough to design against.

    What the two have in common is the shape of the middle: whichever category a user is working in, the sequence of stages is the same. That is the property the component library was built on.',
                    /* ------------------------------------------------------------
                       The two end-to-end journeys. Both start at the same sign-in
                       and end at Accounts, and diverge completely in between —
                       which is the argument the architecture rests on.
                       ------------------------------------------------------------ */
                    'userflows' => [
                        [
                            'actor'   => 'Supplier',
                            'summary' => 'Responds to what has been published: find the opportunity, bid, and settle.',
                            'steps' => [
                                ['type' => 'terminator', 'kind' => 'start', 'title' => 'Start'],
                                ['title' => 'Login / signup'],
                                ['title' => 'Supplier management'],
                                [
                                    'type'  => 'decision',
                                    'title' => 'Tender or auction?',
                                    'answers' => [
                                        ['answer' => 'Yes', 'goes' => 'Tender management — bid against a published tender'],
                                        ['answer' => 'No',  'goes' => 'Auction management — prequalification or direct auction'],
                                    ],
                                ],
                                [
                                    'type'  => 'parallel',
                                    'title' => 'Route taken, by category',
                                    'tracks' => [
                                        ['label' => 'Goods',   'tone' => 'goods',   'steps' => ['Goods tender', 'Goods contract']],
                                        ['label' => 'Works',   'tone' => 'works',   'steps' => ['Works tender', 'Works contract']],
                                        ['label' => 'Service', 'tone' => 'service', 'steps' => ['Service tender', 'Service contract']],
                                        ['label' => 'Auction', 'tone' => 'auction', 'steps' => ['Prequalification / direct auction', 'Auction contract']],
                                    ],
                                ],
                                ['title' => 'Accounts management'],
                                ['type' => 'terminator', 'kind' => 'end', 'title' => 'End'],
                            ],
                        ],
                        [
                            'actor'   => 'Department',
                            'summary' => 'Originates the requirement: catalogue it, estimate it, tender it, contract it.',
                            'steps' => [
                                ['type' => 'terminator', 'kind' => 'start', 'title' => 'Start'],
                                ['title' => 'Login / signup'],
                                ['title' => 'User management'],
                                [
                                    'type'  => 'decision',
                                    'title' => 'Raise a requirement?',
                                    'answers' => [
                                        ['answer' => 'Yes', 'goes' => 'Into the catalogue for the relevant category'],
                                        ['answer' => 'No',  'goes' => 'Exit — nothing to publish this session'],
                                    ],
                                ],
                                [
                                    'type'  => 'parallel',
                                    'title' => 'The same four stages, per category',
                                    'tracks' => [
                                        ['label' => 'Goods',   'tone' => 'goods',   'steps' => ['Goods catalogue', 'Indent management', 'Goods tender', 'Goods contract']],
                                        ['label' => 'Works',   'tone' => 'works',   'steps' => ['Works SR / Non-SR', 'Works estimate', 'Works tender', 'Works contract']],
                                        ['label' => 'Service', 'tone' => 'service', 'steps' => ['Service catalogue', 'Service estimate', 'Service tender', 'Service contract']],
                                        ['label' => 'Auction', 'tone' => 'auction', 'steps' => ['Auction catalogue', 'Auction management', 'Auction tender', 'Auction contract']],
                                    ],
                                ],
                                ['title' => 'Accounts management'],
                                ['type' => 'terminator', 'kind' => 'end', 'title' => 'End'],
                            ],
                        ],
                    ],
                ],
                [
                    'number' => '10',
                    'title'  => 'Design system & style guide',
                    'lead'   => 'At this scale, consistency could not be maintained by review — it had to be built in.',
                    'body'   => 'We created a WCAG-compliant component library that encoded the accessible behaviour once: colour contrast, focus states, keyboard navigation, target sizes and form error handling were correct by default rather than by remembering. That library is what made 2,000+ screens tractable for a team of 8+ designers, and it is where the 30% productivity gain came from.

    The twelve pages below are the delivered style guide itself — type scale, colour roles, iconography, grid, and every component state the platform was built from.',
                    'list_title' => 'What the system encoded',
                    'list' => [
                        'Accessible components meeting WCAG by default — contrast, focus, keyboard paths, target sizes.',
                        'A shared vocabulary for tender states, so status meant one thing platform-wide.',
                        'Dense data patterns — tables, filters, forms — designed once for procurement-scale content.',
                        'Responsive rules that held from desktop review down to mobile.',
                        'Documentation and handoff specs the engineering team built directly against.',
                    ],
                    /* ------------------------------------------------------------
                       The delivered style guide, twelve pages. Thumbnails are
                       generated at 760px into DS/thumbs/; each tile links to the
                       full-resolution page in DS/.
                       ------------------------------------------------------------ */
                    'collage' => [
                        'dir'   => 'images/portfolio/e-proc/DS',
                        'pages' => [
                            ['page' => '01', 'file' => '01-colors.jpg',             'title' => 'Colours — grayscale, corporate and informing roles'],
                            ['page' => '02', 'file' => '02-typography.jpg',         'title' => 'Typography — Nunito Sans, six roles with sizes and line heights'],
                            ['page' => '03', 'file' => '03-iconography.jpg',        'title' => 'Iconography — the full procurement icon set'],
                            ['page' => '04', 'file' => '04-grid-spacing.jpg',       'title' => 'Grid & spacing — 12 columns at 1366 and 1280, 4–48px scale'],
                            ['page' => '05', 'file' => '05-stepper-pagination.jpg', 'title' => 'Stepper & pagination — default, completed and error states'],
                            ['page' => '06', 'file' => '06-buttons-toggles.jpg',    'title' => 'Buttons & toggles — primary through tertiary, checkbox, radio, switch'],
                            ['page' => '07', 'file' => '07-textbox-states.jpg',     'title' => 'Text inputs — every state, datepicker, dropdowns, transfer list'],
                            ['page' => '08', 'file' => '08-file-upload.jpg',        'title' => 'File upload — idle, uploading, success and failure'],
                            ['page' => '09', 'file' => '09-modals-tabs-cards.jpg',  'title' => 'Modals, tabs & cards — confirmations, OTP, nested cards'],
                            ['page' => '10', 'file' => '10-table.jpg',              'title' => 'Tables — kebab menus, checkboxes, inline fields, subtables'],
                            ['page' => '11', 'file' => '11-other-components.jpg',   'title' => 'Toasts, tooltips, progress and elevation'],
                            ['page' => '12', 'file' => '12-authentication.jpg',     'title' => 'Authentication — login, OTP verification, second factor'],
                        ],
                    ],
                ],
                [
                    'number' => '11',
                    'title'  => 'The solution',
                    'lead'   => 'The redesigned platform holds the regulated process intact while making every stage legible.',
                    'body'   => 'Officers publish and track tenders in a flow that mirrors the statutory process and shows plainly where they are in it. Suppliers — arriving rarely and under time pressure — get an interface that explains the current stage and what is required next, rather than assuming familiarity. Modernising the UX framework also cut page load times by half, which on the connections much of the state actually uses is the difference between submitting a bid before the deadline and not.

    The public portal leads with the one thing every visitor arrives to do: find a tender. Search sits above the fold with department filtering and the categories people actually search for, the platform states its own scale immediately, and live opportunities are listed and filterable without signing in — a supplier can judge whether the platform is worth registering for before being asked to.',
                    'images' => [
                        ['src' => 'images/portfolio/e-proc/web-portal.jpg', 'caption' => 'The public portal — tender search, live opportunities and platform scale, all before sign-in', 'ratio' => '4x3', 'zoom' => true],
                    ],
                ],
                [
                    'number' => '12',
                    'title'  => 'Mobile experience',
                    'lead'   => 'For many suppliers, mobile is not a convenience — it is the only device they have.',
                    'body'   => 'The same accessible components carried down to mobile, so a supplier tracking a tender or uploading a document on a phone got the same clarity as an officer on a desktop. Upload states, in particular, were made explicit so a failure on a slow connection could never pass unnoticed.

    The screens below run from first launch through to reading an applicant record: sign-in, the projects dashboard, supplier search with its date picker and advanced filters, and the supplier and applicant detail views.',
                    /* ------------------------------------------------------------
                       Two shots, deliberately: the in-hand photograph establishes
                       that this shipped on a real device, and the screen set shows
                       the flow it belongs to. Neither does the other's job.
                       ------------------------------------------------------------ */
                    'images' => [
                        ['src' => 'images/portfolio/e-proc/mobile/app-in-hand.jpg', 'caption' => 'The portal on a supplier’s own phone — first launch', 'ratio' => '4x3'],
                        // Ten phones across: the per-screen labels fall below 5px on a
                        // handset, so this one opens full size on tap.
                        ['src' => 'images/portfolio/e-proc/mobile/screens.jpg',     'caption' => 'Ten screens — splash and sign-in through supplier search, detail and applicant records', 'ratio' => '3x2', 'zoom' => true],
                    ],
                ],
                [
                    'number' => '13',
                    'title'  => 'Impact',
                    'lead'   => 'The redesign shipped across 9+ modules and more than 2,000 screens.',
                    'body'   => 'Page load times dropped by 50% and task completion rates improved. Design productivity across the team rose by roughly 30%, and the WCAG-compliant system meant the platform met its statutory accessibility obligation as a property of how it was built rather than a remediation pass at the end. The work was recognised internally with the CAMPS Award (May 2022 and May 2023) and a Collaboration Award (March 2023).',
                    'stats_repeat' => true,
                    'impact' => [
                        [
                            'label' => 'For the business',
                            'items' => [
                                'Statutory accessibility met by construction, removing the cost of a remediation programme.',
                                'A component library that made 9+ modules maintainable as one product rather than nine.',
                                '30% more design throughput from the same team of 8+.',
                                'Recognised internally with the CAMPS Award (2022, 2023) and a Collaboration Award (2023).',
                            ],
                        ],
                        [
                            'label' => 'For the people using it',
                            'items' => [
                                'Pages loading twice as fast on the connections much of the state actually has.',
                                'One consistent behaviour for the same action, wherever it appears in the platform.',
                                'Tender status that states plainly which stage a bid is at and what comes next.',
                                'Usable on an older phone — for many suppliers the only device available.',
                            ],
                        ],
                    ],
                ],
                [
                    'number' => '14',
                    'title'  => 'Key learnings',
                    'lead'   => 'On a regulated platform, the constraint is the design material — not an obstacle to route around.',
                    'body'   => 'The work only started moving once we accepted the statutory sequence as fixed and spent our effort on everything around it: the language, the structure, the feedback, the accessibility. The second lesson was about leverage. With 2,000+ screens, no amount of individual craft would have held the product together — building the design system first is what let a team of eight move at the speed the delivery needed while keeping the result coherent.',
                    'learnings' => [
                        ['title' => 'Constraint is material, not obstacle', 'text' => 'Effort spent trying to shorten a statutory flow is effort wasted. Accepting the sequence as fixed freed us to fix everything around it.'],
                        ['title' => 'Systems beat screens at scale',       'text' => 'At 2,000+ screens, individual craft cannot hold a product together. The library had to come first for the rest to be tractable.'],
                        ['title' => 'Design for the rare user',            'text' => 'The daily officer adapts to anything. The supplier bidding twice a year does not — and they are the one with money at stake.'],
                        ['title' => 'Accessibility is cheaper early',       'text' => 'Encoded once into components, WCAG cost far less than it would have as an audit-and-fix pass across nine modules.'],
                    ],
                ],
            ],

            /* ----------------------------------------------------------------
               Closing panel. Links are the site's own contact route plus the
               profiles already used elsewhere on the site.
               ---------------------------------------------------------------- */
            'closing' => [
                'title' => 'Thank you for reading.',
                'text'  => 'This project ran for nearly two years and touched most of what I care about in this craft — scale, constraint, accessibility and a team. I am glad to talk through any part of it in more detail.',
            ],
        ],

        /* ====================================================================
           DUMMY — layout demo only. Replace the content, then delete
           'is_placeholder' to remove the on-page "Sample case study" notice.
           ==================================================================== */
        /* ====================================================================
           REAL — DreamStreet AI.

           The product facts below (company, positioning, feature set, the
           regulatory posture) are verified from dreamstreet.ai, the Play Store
           listing and launch coverage. What is NOT verified is your side of it:
           role title, dates, team size and which parts you personally owned.
           Those are marked TO CONFIRM — replace them before publishing.
           ==================================================================== */
        'dreamstreet-ai' => [

            'title'    => 'DreamStreet AI',
            'headline' => 'An AI-guided investing app built for first-time investors',
            'subtitle' => 'Stock broking for people who have never traded — where the hard part is not the charts, it is the confidence to place a first order.',
            'category' => 'FinTech · B2C',
            'year'     => '2025 — 2026',          // TO CONFIRM
            'featured' => true,
            // Case study still being written. The card shows a locked state
            // and no page is generated, so the unfinished copy stays private.
            'locked'   => true,
            'tags'     => ['FinTech', 'AI', 'Design System', 'Mobile App'],
            'cta'      => 'View Case Study',

            'card_summary' => 'The investing app Dream Sports — Dream11’s parent — launched to move first-time investors into the stock market, with an AI assistant doing the explaining.',
            'card_image'   => 'images/portfolio/dream-street.jpg',
            'headline_stat' => 'iOS · Android · Web',

            'hero_image'   => 'images/portfolio/dream-street/hero.jpg',
            'hero_ratio'   => '3x2',
            'hero_caption' => 'DreamStreet AI — an AI-powered investing platform for stocks, ETFs, mutual funds and F&O',

            'meta' => [
                'Role'     => 'Senior Product Designer',   // TO CONFIRM
                'Client'   => 'DreamStreet (Dream Sports)',
                'Platform' => 'iOS, Android & web',
                'Scope'    => 'UX, UI, design system, mobile app',
                'Duration' => '2025 — 2026',               // TO CONFIRM
            ],

            'brief' => [
                ['label' => 'What it is',       'text' => 'A digital stock broking and depository platform for stocks, ETFs, mutual funds and F&O, launched by Dream Sports — the parent company behind Dream11 — as its move into investing after the August 2025 real-money gaming ban reshaped the group’s business.'],
                ['label' => 'Who it is for',    'text' => 'First-time retail investors above all: people who have watched the market from the outside and have never placed an order. The product also has to stay useful to active traders running F&O, which pulls the interface in two directions at once.'],
                ['label' => 'The constraint',   'text' => 'It is execution-only. The platform is SEBI-regulated and offers no investment advice and no guaranteed returns, so every piece of guidance in the interface has to inform a decision without ever appearing to make one — a line that sits in the copy, the hierarchy and the disclosures.'],
                ['label' => 'My contribution',  'text' => 'TO CONFIRM — what you owned across UX, UI, the design system and the mobile app, and who you worked with.'],
            ],

            'overview' => 'DreamStreet is Dream Sports’ entry into stock broking — the company behind Dream11 moving from fantasy sport into investing. It offers stocks, ETFs, mutual funds and F&O through a fully digital account opening flow, and puts an AI assistant called Veda at the centre of the experience to explain concepts and surface insight rather than issue instructions.

The audience is the difficulty. A first-time investor is not short of data; they are short of confidence, and every element that would reassure them — a recommendation, a projection, a promise — is precisely what a SEBI-regulated execution-only broker is not permitted to give. Designing into that gap is the whole problem.',

            'sections' => [
                [
                    'number' => '01',
                    'title'  => 'The problem',
                    'lead'   => 'The barrier to a first trade is rarely information. It is nerve.',
                    'body'   => 'Someone opening a broking app for the first time meets an interface built by and for people who already understand it — order types, margins, expiry, lot sizes. The vocabulary assumes the confidence it is supposed to build. Meanwhile the platform legally cannot say the one thing that would settle the question: whether this is a good idea.

TO CONFIRM — replace this with what your own research found. What did first-time users actually say, and where did they stop?',
                ],
                [
                    'number' => '02',
                    'title'  => 'Designing guidance without advice',
                    'lead'   => 'Veda, the in-app AI assistant, has to teach without ever recommending.',
                    'body'   => 'An AI companion inside a regulated broking product is a genuinely hard design brief. It has to explain what a stop-loss is, what an expiry means, what a chart is showing — and stop short of the sentence the user actually wants, which is what they should do. The line between explanation and advice is a design decision as much as a legal one: it lives in phrasing, in what is emphasised, in whether an answer ends with a suggestion or a definition.

TO CONFIRM — how you handled that boundary in the interface, and what you changed after testing it.',
                ],
                [
                    'number' => '03',
                    'title'  => 'One system, two users',
                    'lead'   => 'The same app serves a first-timer buying one ETF and a trader running an options book.',
                    'body'   => 'Simplifying for the newcomer risks stripping out the density an F&O trader needs; building for the trader buries the beginner. Both live in the same product, and the design system is what has to hold the two together — shared components that can present a two-field order ticket and a full options chain without becoming two different apps.

TO CONFIRM — how the system resolved that, and what you built to support it.',
                ],
                [
                    'number' => '04',
                    'title'  => 'Outcome',
                    'lead'   => 'The platform shipped across iOS, Android and web.',
                    'body'   => 'TO CONFIRM — your measured outcomes. Adoption, activation, completion of the account-opening flow, ratings, anything you can stand behind. If you have no numbers you can share publicly, say what changed qualitatively and leave it there — an honest qualitative outcome reads better than a metric you cannot source.',
                ],
            ],

            'closing' => [
                'title' => 'Thank you for reading.',
                'text'  => 'DreamStreet asked a question I had not met before: how do you build confidence in a product that is forbidden from reassuring anyone? I am glad to talk through how we approached it.',
            ],
        ],

        /* ====================================================================
           REAL — AstroLokal.

           Product facts below are verified from astrolokal.com, the App Store
           listing and Play Store download data. Your side of it — role, dates,
           team, what you personally owned — is marked TO CONFIRM.

           Two things to settle before publishing, both flagged in chat:
             1. The banner calls this an "AI-Powered Astrology Platform", but
                neither the site nor the store listings mention AI — the site
                says "100% private and human-led sessions". Copy here follows
                the shipped product, not the banner.
             2. The iOS listing sits at 1.9 stars from 128 ratings. Worth
                deciding how prominently you want this featured.
           ==================================================================== */
        'astrolokal' => [

            'title'    => 'AstroLokal',
            'headline' => 'Astrology consultations in four languages, past a million downloads',
            'subtitle' => 'A pay-per-minute consultation platform where the design problem is trust — choosing a stranger to talk to about something personal, while the meter runs.',
            'category' => 'Consumer · B2C',
            'year'     => '2023 — 2024',
            'featured' => true,
            // Case study still being written. The card shows a locked state
            // and no page is generated, so the unfinished copy stays private.
            'locked'   => true,
            'tags'     => ['Consumer App', 'Vernacular', 'Design System', 'Mobile App'],
            'cta'      => 'View Case Study',

            'card_summary' => 'A vernacular astrology consultation app from Lokal, connecting users to 1,500+ verified astrologers by chat and call across four languages.',
            'card_image'   => 'images/portfolio/astro-local.jpg',
            'headline_stat' => '1.1M+ downloads',

            'hero_image'   => 'images/portfolio/astro-local/hero.jpg',
            'hero_ratio'   => '3x2',
            'hero_caption' => 'AstroLokal — horoscope, kundli, matchmaking and remedies, personalised per user',

            'meta' => [
                'Role'     => 'Senior Product Designer',   // TO CONFIRM
                'Client'   => 'AstroLokal (Lokal)',
                'Platform' => 'iOS & Android',
                'Scope'    => 'UX, UI, design system, mobile app',
                'Duration' => '2023 — 2024',
            ],

            'brief' => [
                ['label' => 'What it is',      'text' => 'A consultation platform connecting users to verified astrologers by chat, audio and video call, covering kundli, matchmaking, numerology, vastu and remedies. Built by Lokal, the hyperlocal app already serving vernacular audiences across India.'],
                ['label' => 'Who it is for',   'text' => 'Users outside the English-speaking metros. Language is not a setting here — it is the product. Consultations run in four languages, and for most of this audience an app that only speaks English is not a harder product, it is an unusable one.'],
                ['label' => 'The constraint',  'text' => 'Pay-per-minute. From the moment a call connects the user is spending money, which changes every design decision before it: how much they can learn about a consultant, how confidently they can choose, and how quickly they can get to the point once connected.'],
                ['label' => 'My contribution', 'text' => 'TO CONFIRM — what you owned across UX, UI, the design system and the mobile app, and who you worked with.'],
            ],

            'overview' => 'AstroLokal connects people to astrologers for paid one-to-one guidance on marriage, career, family and money. It runs on a pay-per-minute model with sessions starting at ₹20, supports four languages, and states 1,500+ verified astrologers and over 1.2 million completed sessions. On Android it has passed 1.1 million downloads.

The category is crowded and its reputation is mixed, which puts the design burden squarely on trust. Before a user spends anything they have to decide whether a particular consultant is worth talking to — from a list of strangers, in their own language, with a meter about to start. That decision, not the horoscope, is the product’s real first screen.',

            'sections' => [
                [
                    'number' => '01',
                    'title'  => 'The problem',
                    'lead'   => 'A user has to pick a stranger, in their own language, before spending a rupee.',
                    'body'   => 'Astrology apps are judged in the first two minutes. A user arrives with something genuinely troubling them — a marriage, a job, a family decision — and is asked to choose from a list of consultants they know nothing about, then start paying by the minute. Get that choice wrong and they do not complain; they leave and do not come back.

TO CONFIRM — replace with what your own research found about how users actually chose a consultant, and where they hesitated.',
                ],
                [
                    'number' => '02',
                    'title'  => 'Designing for four languages',
                    'lead'   => 'Vernacular is the product, not a preference toggle.',
                    'body'   => 'Designing across four Indian languages is not translation work. Script height, word length and reading direction all shift the layout, and a component sized around English will break the moment it holds Tamil or Hindi. The design system has to absorb that variation rather than assume it away.

TO CONFIRM — which languages shipped, and what the system had to solve to hold them.',
                ],
                [
                    'number' => '03',
                    'title'  => 'The meter is running',
                    'lead'   => 'Pay-per-minute makes every second of interface friction cost the user money.',
                    'body'   => 'Once a consultation connects, the usual patience a user extends to an interface disappears — a slow screen or an unclear control is now billable. That pushes the design toward getting everything decided before the call starts: who the consultant is, what the rate is, what will be discussed, how to end it.

TO CONFIRM — how the flow handled that, and what changed after you tested it.',
                ],
                [
                    'number' => '04',
                    'title'  => 'Outcome',
                    'lead'   => 'Past 1.1 million downloads on Android, with roughly 200,000 in a recent month.',
                    'body'   => 'TO CONFIRM — your own measured outcomes. Consultation completion, repeat rate, first-session conversion, anything you can stand behind. Download counts are the platform’s achievement rather than the design’s, so a metric that tracks the experience itself will carry far more weight with a hiring panel.',
                ],
            ],

            'closing' => [
                'title' => 'Thank you for reading.',
                'text'  => 'AstroLokal was a lesson in designing for trust in a category that has to earn it every session, in languages I had to design for rather than around. I am glad to talk through any part of it.',
            ],
        ],

        /* ====================================================================
           REAL — Safebox.

           Product facts verified from the App Store listing (Beyondco
           Technologies, 4.9 from 54 ratings, v0.5.8). Your side — role, dates,
           team, what you owned — is marked TO CONFIRM.

           Note: the banner reads "Digital Safety Deposit Box … for Life's
           Important Documents", but the shipped app is titled "Safebox:
           Protect Your Wealth" and leads with net-worth tracking across funds,
           stocks, FDs, property and EPF. The copy here follows the product.
           ==================================================================== */
        'safebox' => [

            'title'    => 'Safebox',
            'headline' => 'A private vault for everything a family would need to find',
            'subtitle' => 'Net worth, insurance and documents in one encrypted place — designed for the moment someone else has to open it.',
            'category' => 'FinTech · B2C',
            'year'     => '2025 — 2026',          // TO CONFIRM
            'featured' => true,
            // Case study still being written. The card shows a locked state
            // and no page is generated, so the unfinished copy stays private.
            'locked'   => true,
            'tags'     => ['FinTech', 'Privacy', 'Design System', 'Mobile App'],
            'cta'      => 'View Case Study',

            'card_summary' => 'An encrypted personal vault tracking net worth, insurance and life documents, with granular family access — built by Beyondco Technologies.',
            'card_image'   => 'images/portfolio/safebox.jpg',
            'headline_stat' => '4.9 on the App Store',

            'hero_image'   => 'images/portfolio/safebox/hero.jpg',
            'hero_ratio'   => '3x2',
            'hero_caption' => 'Safebox — a digital safety deposit box for documents, assets and insurance',

            'meta' => [
                'Role'     => 'Senior Product Designer',   // TO CONFIRM
                'Client'   => 'Safebox (Beyondco Technologies)',
                'Platform' => 'iOS, Android & macOS',
                'Scope'    => 'UX, UI, design system, mobile app',
                'Duration' => '2025 — 2026',               // TO CONFIRM
            ],

            'brief' => [
                ['label' => 'What it is',      'text' => 'An encrypted vault that holds a household’s financial life in one place: mutual funds, stocks, fixed deposits, bank accounts, gold, property, EPF and NPS, alongside insurance policies with renewal reminders and identity, medical and legal documents.'],
                ['label' => 'Who it is for',   'text' => 'People organised enough to want everything in one place, and families who would otherwise have to reconstruct it. Granular sharing means a spouse can see the policies without seeing the passwords — which is the feature the product quietly turns on.'],
                ['label' => 'The constraint',  'text' => 'The app asks for more trust than almost any other category: bank connections through RBI-approved aggregators, identity documents, net worth. AES-256 encryption, a biometric lock, India-based hosting and a no-ads, no-data-selling stance are the answer — but only if the interface makes them believable.'],
                ['label' => 'My contribution', 'text' => 'TO CONFIRM — what you owned across UX, UI, the design system and the mobile app, and who you worked with.'],
            ],

            'overview' => 'Safebox is a private vault for a household’s financial life. It syncs bank accounts through RBI-approved account aggregators, tracks stocks and ETFs in real time, stores insurance policies and chases their renewals, keeps identity and legal documents, and rolls the lot into a net-worth view. Family members can be given access, scoped so that what a spouse or child sees is a deliberate decision rather than all-or-nothing.

The design problem is the ask. Before it is useful the app requires a user to hand over the most sensitive material they own — and the reassurance available is technical: AES-256, biometric lock, hosting inside India, no ads, no data sold. Turning those into something a non-technical user actually believes is the work.',

            'sections' => [
                [
                    'number' => '01',
                    'title'  => 'The problem',
                    'lead'   => 'Every feature is useful only after the user has already trusted it completely.',
                    'body'   => 'A vault app is worthless half-filled. Its value arrives only when everything is inside — which means the product has to earn total trust before delivering any benefit at all. That is the reverse of how most apps work, and it puts enormous weight on the first session.

TO CONFIRM — replace with what your own research found. Where did people stop, and what did they refuse to add?',
                ],
                [
                    'number' => '02',
                    'title'  => 'Sharing without exposing',
                    'lead'   => 'A spouse should find the insurance policy without finding everything else.',
                    'body'   => 'Granular family access is the feature that makes a vault worth keeping, and it is also where the interface can do the most damage. A sharing control that is even slightly ambiguous will either leak something private or scare the user into sharing nothing — and in a product whose purpose is that someone else can find things later, sharing nothing is a failure state.

TO CONFIRM — how the permission model was designed and presented.',
                ],
                [
                    'number' => '03',
                    'title'  => 'Outcome',
                    'lead'   => 'Shipped on iOS, Android and macOS, rated 4.9 on the App Store.',
                    'body'   => 'TO CONFIRM — your measured outcomes. Vault completion rate, accounts connected per user, family invites accepted, retention. The rating is a strong signal but rests on 54 reviews and a pre-1.0 build, so a number describing the experience will carry more weight.',
                ],
            ],

            'closing' => [
                'title' => 'Thank you for reading.',
                'text'  => 'Safebox is the most trust-dependent product I have worked on — every screen is asking for something people are right to be careful with. I am glad to talk through how we approached it.',
            ],
        ],

        /* ====================================================================
           REAL — hiRobin.

           Product facts verified from the App Store listing (TaskGenie Pvt Ltd,
           4.3 from 22 ratings, v2.0.4). Your side is marked TO CONFIRM.

           Worth knowing: reviewers report call latency that makes the assistant
           audibly a bot. That is a genuine design constraint and, handled
           openly, a stronger story than pretending it did not exist.
           ==================================================================== */
        'hirobin' => [

            'title'    => 'hiRobin',
            'headline' => 'An AI that answers your phone — and makes calls for you',
            'subtitle' => 'Screening what comes in and handling what goes out, in a product where the interface is mostly a voice you never see.',
            'category' => 'AI · Consumer',
            'year'     => '2025',
            'featured' => true,
            // Case study still being written. The card shows a locked state
            // and no page is generated, so the unfinished copy stays private.
            'locked'   => true,
            'tags'     => ['Conversational AI', 'Voice', 'Design System', 'Mobile App'],
            'cta'      => 'View Case Study',

            'card_summary' => 'An AI call assistant that screens incoming calls and places outgoing ones — chasing refunds, booking tables, dealing with delivery riders.',
            'card_image'   => 'images/portfolio/hirobin.jpg',
            'headline_stat' => 'Voice-first UX',

            'hero_image'   => 'images/portfolio/hirobin/hero.jpg',
            'hero_ratio'   => '3x2',
            'hero_caption' => 'hiRobin — an AI call assistant that screens incoming calls and makes outgoing ones',

            'meta' => [
                'Role'     => 'Senior Product Designer',   // TO CONFIRM
                'Client'   => 'hiRobin (TaskGenie)',
                'Platform' => 'iOS & Android',
                'Scope'    => 'UX, UI, design system, mobile app',
                'Duration' => '2025',
            ],

            'brief' => [
                ['label' => 'What it is',      'text' => 'A personal AI phone assistant doing two jobs: screening incoming calls — delivery riders, security gates, spam — and placing outgoing ones on the user’s behalf, from chasing a refund to booking a table.'],
                ['label' => 'Who it is for',   'text' => 'People whose phone interrupts them more than it helps: anyone fielding delivery calls mid-meeting, or postponing an admin call they do not want to make.'],
                ['label' => 'The constraint',  'text' => 'Most of the experience happens where there is no screen. The assistant is talking to someone else, and the user is not in the room — so the design work is mostly about what they see before it starts and what they are shown afterwards.'],
                ['label' => 'My contribution', 'text' => 'TO CONFIRM — what you owned across UX, UI, the design system and the mobile app, and who you worked with.'],
            ],

            'overview' => 'hiRobin answers the phone so its user does not have to, and makes calls they would rather avoid. It screens incoming callers and can be sent out to negotiate, book and follow up, described by its makers as an assistant that "speaks, negotiates, and makes phone calls on your behalf".

The design challenge is unusual: the product’s core moment has no interface. Something is being said in the user’s name to a real person, and they are not there to hear it. Everything the designer controls sits either side of that gap — the setup that decides what the assistant may say, and the record afterwards that says what happened.',

            'sections' => [
                [
                    'number' => '01',
                    'title'  => 'The problem',
                    'lead'   => 'Handing over your voice is a bigger ask than handing over a task.',
                    'body'   => 'Delegating a call is not like delegating a to-do. Something is being said as you, to someone who may know you, and you are not there to correct it. Before a user will allow that, they need to know precisely what the assistant will and will not say — and afterwards they need to be able to check.

TO CONFIRM — replace with what your research found about where users hesitated.',
                ],
                [
                    'number' => '02',
                    'title'  => 'Designing for an interface you cannot see',
                    'lead'   => 'The call is the product, and the call has no screen.',
                    'body'   => 'Everything visible sits either side of the conversation: the setup that scopes what the assistant may do, and the transcript that reports what it did. That makes the after-state unusually important — it is the only evidence the user has, and it has to be skimmable enough to check in seconds rather than replayed in full.

TO CONFIRM — how the setup and review flows were designed.',
                ],
                [
                    'number' => '03',
                    'title'  => 'Designing around latency',
                    'lead'   => 'The pause before the assistant replies is what gives it away.',
                    'body'   => 'Reviewers note that response delay makes the assistant recognisable as a bot, which turns a technical limit into a design problem: whether to disguise the pause, fill it, or simply disclose that the caller is talking to an assistant. Each answer implies a different product.

TO CONFIRM — how this was handled, and what you would do differently. An honest account of a constraint you designed around reads far better than a case study that pretends there was none.',
                ],
                [
                    'number' => '04',
                    'title'  => 'Outcome',
                    'lead'   => 'Shipped on iOS and Android, rated 4.3 on the App Store.',
                    'body'   => 'TO CONFIRM — your measured outcomes. Calls handled, screening accuracy, tasks completed end to end, retention. On 22 ratings the store score is directional rather than conclusive, so anything from your own analytics will be stronger.',
                ],
            ],

            'closing' => [
                'title' => 'Thank you for reading.',
                'text'  => 'hiRobin was the first product I have designed where the most important moment happens with no screen in it at all. I am glad to talk through what that changed.',
            ],
        ],
    ];
}

function testimonials_data(): array
{
    static $data = null;
    return $data ??= [

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
}

/* ==========================================================================
   Rendering helpers
   ========================================================================== */

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Renders body copy where blank lines separate paragraphs. */
function paragraphs(string $text): string
{
    $out = '';
    foreach (preg_split('/\n\s*\n/', trim($text)) as $para) {
        $out .= '<p>' . nl2br(e(trim($para))) . '</p>';
    }
    return $out;
}

/**
 * A section visual.
 *
 * An entry with no 'src' renders nothing at all. A case study that shows empty
 * frames reads as unfinished, so a planned-but-unshot visual simply leaves no
 * trace on the page until its file exists.
 */
function figure(array $image): string
{
    $src = trim((string) ($image['src'] ?? ''));
    if ($src === '') {
        return '';
    }

    $ratio   = e($image['ratio'] ?? '16x9');
    $caption = e($image['caption'] ?? '');

    // The hero sits above the fold and is the largest contentful paint on the
    // page — deferring it delays the very thing the visitor is waiting for.
    // Everything further down stays lazy.
    $eager = !empty($image['eager']);
    $inner = '<img src="' . e($src) . '" alt="' . $caption . '"'
           . ($eager ? ' fetchpriority="high"' : ' loading="lazy"') . '>';

    // Dense artwork — a grid of ten screens, a full sitemap — becomes unreadable
    // once scaled into the column, so it can opt into opening at full size.
    // The frame becomes a link rather than a plain div; everything else is same.
    if (!empty($image['zoom'])) {
        $frame = '<a class="cs-figure__frame cs-figure__frame--zoom" href="' . e($src) . '"'
               . ' target="_blank" rel="noopener" aria-label="' . $caption . ' — open full size">'
               . $inner
               . '<span class="cs-figure__zoom" aria-hidden="true">View full size &#8599;</span>'
               . '</a>';
    } else {
        $frame = '<div class="cs-figure__frame">' . $inner . '</div>';
    }

    // 'flat' drops the drop shadow. A photograph of a screen already reads as an
    // object on the page; the shadow is for flat artwork that needs lifting off
    // the background, and doubling up makes the frame look pasted on.
    $mod = !empty($image['flat']) ? ' cs-figure--flat' : '';

    return '<figure class="cs-figure cs-figure--' . $ratio . $mod . '">'
         . $frame
         . ($caption !== '' ? '<figcaption class="cs-figure__caption">' . $caption . '</figcaption>' : '')
         . '</figure>';
}

/**
 * A section's visuals. Most carry one, which keeps a steady text-image rhythm
 * down the page; a section declaring more gets all of them stacked, for the
 * cases where one shot genuinely cannot do the work of two.
 */
function section_images(array $section): string
{
    $out = '';
    foreach ($section['images'] ?? [] as $image) {
        $out .= figure($image);
    }
    return $out;
}

/** Four-quadrant brief: business goal, user goal, responsibility, deliverables. */
function brief_grid(array $brief): string
{
    $out = '<div class="cs-brief">';
    foreach ($brief as $item) {
        $out .= '<div class="cs-brief__cell">'
              . '<h3 class="cs-brief__label">' . e($item['label']) . '</h3>'
              . '<p class="cs-brief__text">' . e($item['text']) . '</p>'
              . '</div>';
    }
    return $out . '</div>';
}

/** The design challenge stated as a question, with the measures of success. */
function challenge_block(array $c): string
{
    // Same .cs-lead component every other section opens with, so this section
    // is structurally identical to the rest rather than a one-off layout.
    $out = '<div class="cs-challenge">'
         . '<p class="cs-lead">' . e($c['question']) . '</p>';

    if (!empty($c['text'])) {
        $out .= '<div class="cs-challenge__text cs-prose">' . paragraphs($c['text']) . '</div>';
    }

    if (!empty($c['questions'])) {
        $out .= '<h3 class="cs-challenge__label">The UX questions that followed</h3><ol class="cs-questions">';
        foreach ($c['questions'] as $q) {
            $out .= '<li>' . e($q) . '</li>';
        }
        $out .= '</ol>';
    }

    if (!empty($c['metrics'])) {
        $out .= '<h3 class="cs-challenge__label">How we would know it worked</h3><div class="cs-metrics">';
        foreach ($c['metrics'] as $m) {
            $out .= '<div class="cs-metric">'
                  . '<div class="cs-metric__value">' . e($m['value']) . '</div>'
                  . '<div class="cs-metric__label">' . e($m['label']) . '</div>'
                  . '</div>';
        }
        $out .= '</div>';
    }

    return $out . '</div>';
}

/**
 * Journey map.
 *
 * Opens with the emotional curve, because that is the finding a journey map
 * exists to deliver: where the experience dips, and how far. The line is drawn
 * from the same mood values the cards below carry, so the chart cannot drift
 * out of sync with the detail — both read the one source.
 *
 * The polyline is SVG with a non-scaling stroke so it stretches to any width
 * without thickening; the dots are positioned in CSS over it, because a circle
 * inside a non-uniformly scaled viewBox would render as an ellipse.
 */
function journey_map(array $stages): string
{
    // y is a percentage down the plot: lower value = better experience.
    $levels = [
        'neutral'  => ['y' => 26, 'label' => 'Steady'],
        'low'      => ['y' => 58, 'label' => 'Strained'],
        'critical' => ['y' => 88, 'label' => 'Highest risk'],
    ];

    $count = count($stages);
    if ($count === 0) {
        return '';
    }

    // Build the polyline in a 1000-wide viewBox, one column per stage.
    $points = [];
    foreach (array_values($stages) as $i => $s) {
        $mood = $s['mood'] ?? 'neutral';
        $y    = ($levels[$mood] ?? $levels['neutral'])['y'];
        $x    = round((($i + 0.5) / $count) * 1000, 1);
        $points[] = $x . ',' . $y;
    }

    $out = '<div class="cs-journey">';

    /* --- Emotional curve ------------------------------------------------- */

    $out .= '<figure class="cs-jchart">'
          . '<figcaption class="cs-jchart__caption">How the experience feels, stage by stage</figcaption>'
          . '<div class="cs-jchart__plot">'
          . '<div class="cs-jchart__bands" aria-hidden="true">'
          . '<span class="cs-jchart__band"><em>Steady</em></span>'
          . '<span class="cs-jchart__band"><em>Strained</em></span>'
          . '<span class="cs-jchart__band"><em>Highest risk</em></span>'
          . '</div>'
          . '<svg class="cs-jchart__svg" viewBox="0 0 1000 100" preserveAspectRatio="none" aria-hidden="true" focusable="false">'
          . '<polyline points="' . implode(' ', $points) . '" fill="none" stroke="url(#jgrad)" stroke-width="2.5"'
          . ' vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" />'
          . '<defs><linearGradient id="jgrad" x1="0" y1="0" x2="1" y2="0">'
          . '<stop offset="0%" stop-color="#1a7f4b"/><stop offset="50%" stop-color="#d8a33c"/>'
          . '<stop offset="100%" stop-color="#c0362c"/></linearGradient></defs>'
          . '</svg>';

    foreach (array_values($stages) as $i => $s) {
        $mood = $s['mood'] ?? 'neutral';
        $lvl  = $levels[$mood] ?? $levels['neutral'];
        $left = round((($i + 0.5) / $count) * 100, 3);

        $out .= '<span class="cs-jchart__dot cs-jchart__dot--' . e($mood) . '"'
              . ' style="left:' . $left . '%; top:' . $lvl['y'] . '%;">'
              . '<span class="cs-jchart__tip">' . e($s['stage']) . ' &middot; ' . e($lvl['label']) . '</span>'
              . '</span>';
    }

    $out .= '</div></figure>';

    /* --- Stage cards ------------------------------------------------------ */

    $out .= '<div class="cs-journey__track">';

    foreach (array_values($stages) as $i => $s) {
        $mood = $s['mood'] ?? 'neutral';
        $lvl  = $levels[$mood] ?? $levels['neutral'];

        $out .= '<article class="cs-journey__stage cs-journey__stage--' . e($mood) . '">'
              . '<div class="cs-journey__head">'
              . '<span class="cs-journey__step">' . str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) . '</span>'
              . '<h3 class="cs-journey__title">' . e($s['stage']) . '</h3>'
              . '</div>'
              . '<span class="cs-journey__mood"><span class="cs-journey__mood-dot" aria-hidden="true"></span>' . e($lvl['label']) . '</span>'
              . '<p class="cs-journey__action">' . e($s['action']) . '</p>'
              . '<blockquote class="cs-journey__thought">' . e($s['thought']) . '</blockquote>'
              // Pain red, opportunity green — the same language the problem →
              // solution block below this section uses, so a reader learns the
              // colour code once and it holds for the rest of the case study.
              . '<div class="cs-journey__row cs-journey__row--pain">'
              . '<span class="cs-journey__label">Pain point</span><p>' . e($s['pain']) . '</p></div>'
              . '<div class="cs-journey__row cs-journey__row--gain">'
              . '<span class="cs-journey__label">Opportunity</span><p>' . e($s['chance']) . '</p></div>'
              . '</article>';
    }

    return $out . '</div></div>';
}
/**
 * Design-system collage.
 *
 * Masonry columns rather than a uniform grid: the source pages range from 1.83
 * to 0.38 in aspect, and forcing those into equal tiles would crop the tall
 * specification sheets to nothing. Each tile shows the top of its page — where
 * the title and first content sit — and links to the full export.
 */
function ds_collage(array $pages, string $dir): string
{
    $out = '<div class="cs-ds">';

    foreach ($pages as $p) {
        $file  = e($p['file']);
        $title = e($p['title']);

        $out .= '<a class="cs-ds__tile" href="' . $dir . '/' . $file . '" target="_blank" rel="noopener"'
              . ' aria-label="' . $title . ' — open full page">'
              . '<span class="cs-ds__num">' . e($p['page']) . '</span>'
              . '<img src="' . $dir . '/thumbs/' . $file . '" alt="' . $title . '" loading="lazy">'
              . '<span class="cs-ds__meta">'
              . '<span class="cs-ds__title">' . $title . '</span>'
              . '<span class="cs-ds__open" aria-hidden="true">View full &#8599;</span>'
              . '</span>'
              . '</a>';
    }

    return $out . '</div>';
}

/**
 * Information architecture.
 *
 * Rendered from the structure rather than embedded as an export: a 30-module
 * sitemap shrunk to fit a phone screen is unreadable, whereas this reflows into
 * a stack. Sign-in is drawn as the hinge because that is what it is — the two
 * sides below it are organised on opposite principles.
 */
function ia_map(array $ia): string
{
    $node = static function (array $n): string {
        $out = '<div class="cs-ia__node"><h4 class="cs-ia__node-title">' . e($n['title']) . '</h4>';
        if (!empty($n['items'])) {
            $out .= '<ul>';
            foreach ($n['items'] as $i) {
                $out .= '<li>' . e($i) . '</li>';
            }
            $out .= '</ul>';
        }
        return $out . '</div>';
    };

    $out = '<div class="cs-ia">';

    if (!empty($ia['entry'])) {
        $out .= '<div class="cs-ia__entry"><span>' . e($ia['entry']) . '</span></div>';
    }

    foreach ($ia['sides'] as $side) {
        $out .= '<section class="cs-ia__side">'
              . '<header class="cs-ia__role">'
              . '<h3>' . e($side['role']) . '</h3>'
              . (!empty($side['summary']) ? '<p>' . e($side['summary']) . '</p>' : '')
              . '</header>';

        if (!empty($side['feature'])) {
            $out .= '<div class="cs-ia__feature">' . $node($side['feature']) . '</div>';
        }

        if (!empty($side['modules'])) {
            $out .= '<div class="cs-ia__modules">';
            foreach ($side['modules'] as $m) {
                $out .= $node($m);
            }
            $out .= '</div>';
        }

        if (!empty($side['columns'])) {
            $out .= '<div class="cs-ia__columns">';
            foreach ($side['columns'] as $col) {
                $out .= '<div class="cs-ia__column cs-ia__column--' . e($col['tone']) . '">'
                      . '<div class="cs-ia__column-label">' . e($col['label']) . '</div>';
                foreach ($col['nodes'] as $n) {
                    $out .= $node($n);
                }
                $out .= '</div>';
            }
            $out .= '</div>';
        }

        $out .= '</section>';
    }

    if (!empty($ia['shared'])) {
        $out .= '<div class="cs-ia__shared">'
              . '<div class="cs-ia__node">'
              . '<h4 class="cs-ia__node-title">' . e($ia['shared']['title']) . '</h4>'
              . (!empty($ia['shared']['note']) ? '<p class="cs-ia__shared-note">' . e($ia['shared']['note']) . '</p>' : '')
              . '<ul>';
        foreach ($ia['shared']['items'] as $i) {
            $out .= '<li>' . e($i) . '</li>';
        }
        $out .= '</ul></div></div>';
    }

    return $out . '</div>';
}

/**
 * End-to-end user flow.
 *
 * Drawn as a single spine: nodes stacked vertically, each joined to the one
 * above by a generated connector, so inserting or removing a step can never
 * leave a stranded arrow. Where the flow branches, the connector splits into a
 * real fork rather than repeating a straight arrow per column.
 *
 * The branch geometry needs to know how many ways it divides, so the count is
 * passed to CSS as --uf-n and the horizontal rule is inset by half a column at
 * each end — landing it exactly on the first and last child centres.
 */
function user_flow(array $flow): string
{
    $out = '<section class="cs-uf">'
         . '<header class="cs-uf__head">'
         . '<span class="cs-uf__actor">' . e($flow['actor']) . '</span>'
         . (!empty($flow['summary']) ? '<p>' . e($flow['summary']) . '</p>' : '')
         . '</header>'
         . '<div class="cs-uf__body">';

    foreach ($flow['steps'] as $step) {
        switch ($step['type'] ?? 'step') {

            case 'terminator':
                $kind = e($step['kind'] ?? 'start');
                $out .= '<div class="cs-uf__node cs-uf__terminator cs-uf__terminator--' . $kind . '">'
                      . e($step['title']) . '</div>';
                break;

            case 'decision':
                $n = max(1, count($step['answers']));
                $out .= '<div class="cs-uf__decision">'
                      // Inner span is counter-rotated; without an element to
                      // target, the label inherits the 45deg and reads at an
                      // angle.
                      . '<span class="cs-uf__diamond"><span>' . e($step['title']) . '</span></span>'
                      . '<div class="cs-uf__fork" style="--uf-n:' . $n . '">';
                foreach ($step['answers'] as $a) {
                    $key = preg_replace('/[^a-z]/', '', strtolower($a['answer']));
                    $out .= '<div class="cs-uf__answer cs-uf__answer--' . $key . '">'
                          . '<span class="cs-uf__badge">' . e($a['answer']) . '</span>'
                          . '<span class="cs-uf__answer-text">' . e($a['goes']) . '</span>'
                          . '</div>';
                }
                $out .= '</div></div>';
                break;

            case 'parallel':
                $n = max(1, count($step['tracks']));
                $out .= '<div class="cs-uf__parallel">';
                if (!empty($step['title'])) {
                    $out .= '<span class="cs-uf__parallel-label">' . e($step['title']) . '</span>';
                }
                $out .= '<div class="cs-uf__fork cs-uf__fork--tracks" style="--uf-n:' . $n . '">';
                foreach ($step['tracks'] as $track) {
                    $out .= '<div class="cs-uf__track cs-uf__track--' . e($track['tone']) . '">'
                          . '<span class="cs-uf__track-label">' . e($track['label']) . '</span>'
                          . '<div class="cs-uf__track-steps">';
                    foreach ($track['steps'] as $ts) {
                        $out .= '<span class="cs-uf__track-step">' . e($ts) . '</span>';
                    }
                    $out .= '</div></div>';
                }
                $out .= '</div></div>';
                break;

            default:
                $out .= '<div class="cs-uf__node cs-uf__step">' . e($step['title']) . '</div>';
        }
    }

    return $out . '</div></section>';
}
/**
 * Project brief — a definition list of what was asked for and what bounded it.
 * Rows rather than cards: these are reference facts a reader scans, not points
 * being argued, and a scannable left column beats four equal-weight tiles.
 */
function brief_table(array $rows): string
{
    $out = '<dl class="cs-briefrows">';
    foreach ($rows as $row) {
        $out .= '<div class="cs-briefrows__row">'
              . '<dt class="cs-briefrows__label">' . e($row['label']) . '</dt>'
              . '<dd class="cs-briefrows__value">';

        if (!empty($row['items'])) {
            $out .= '<ul>';
            foreach ($row['items'] as $item) {
                $out .= '<li>' . e($item) . '</li>';
            }
            $out .= '</ul>';
        } else {
            $out .= '<p>' . e($row['text'] ?? '') . '</p>';
        }

        $out .= '</dd></div>';
    }
    return $out . '</dl>';
}

/**
 * Empathy map — the four classic quadrants plus pains and gains.
 *
 * Quadrants are a 2x2 on wide screens so the opposing pairs (says/does,
 * thinks/feels) sit next to each other the way the method intends; pains and
 * gains run beneath as a contrasting pair.
 */
function empathy_map(array $map): string
{
    $quadrants = [
        'says'   => 'Says',
        'thinks' => 'Thinks',
        'does'   => 'Does',
        'feels'  => 'Feels',
    ];

    $out = '<div class="cs-empathy">';

    if (!empty($map['subject'])) {
        $out .= '<p class="cs-empathy__subject">' . e($map['subject']) . '</p>';
    }

    $out .= '<div class="cs-empathy__grid">';
    foreach ($quadrants as $key => $label) {
        if (empty($map[$key])) {
            continue;
        }
        $out .= '<div class="cs-empathy__cell cs-empathy__cell--' . $key . '">'
              . '<h4 class="cs-empathy__label">' . e($label) . '</h4><ul>';
        foreach ($map[$key] as $item) {
            $out .= '<li>' . e($item) . '</li>';
        }
        $out .= '</ul></div>';
    }
    $out .= '</div>';

    $out .= '<div class="cs-empathy__split">';
    foreach ([['pains', 'Pains'], ['gains', 'Gains']] as [$key, $label]) {
        if (empty($map[$key])) {
            continue;
        }
        $out .= '<div class="cs-empathy__band cs-empathy__band--' . $key . '">'
              . '<h4 class="cs-empathy__label">' . e($label) . '</h4><ul>';
        foreach ($map[$key] as $item) {
            $out .= '<li>' . e($item) . '</li>';
        }
        $out .= '</ul></div>';
    }
    $out .= '</div>';

    return $out . '</div>';
}

/**
 * Problem → solution, paired per user.
 *
 * Each row reads across: a frustration on the left, the thing that answered it
 * on the right. Colour carries the direction — red for the unsolved state,
 * green for the shipped one — so the row is legible before a word of it is
 * read. Two separate lists would leave the reader matching items up by
 * position, which is exactly the work this section exists to do for them.
 */
function needs_grid(array $groups): string
{
    $out = '<div class="cs-needs">';

    foreach ($groups as $g) {
        // Label arrives as "Name — Role, detail". Split so the role can sit as
        // a badge rather than running on as part of the heading.
        $parts = array_map('trim', explode('—', $g['user'], 2));
        $name  = $parts[0];
        $role  = $parts[1] ?? '';

        $out .= '<section class="cs-needs__group">'
              . '<header class="cs-needs__user">'
              . '<span class="cs-needs__avatar" aria-hidden="true">' . e(mb_substr($name, 0, 1)) . '</span>'
              . '<h3 class="cs-needs__name">' . e($name) . '</h3>'
              . ($role !== '' ? '<span class="cs-needs__role">' . e($role) . '</span>' : '')
              . '</header>'
              . '<div class="cs-needs__head" aria-hidden="true">'
              . '<span class="cs-needs__head-label cs-needs__head-label--problem">What was wrong</span>'
              . '<span class="cs-needs__head-label cs-needs__head-label--solution">What we shipped</span>'
              . '</div>';

        foreach ($g['pairs'] as $i => $pair) {
            $n = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);

            $out .= '<div class="cs-needs__pair">'
                  . '<div class="cs-needs__cell cs-needs__cell--problem">'
                  . '<span class="cs-needs__tag"><span class="cs-needs__icon" aria-hidden="true">&#215;</span>What was wrong</span>'
                  . '<p>' . e($pair['problem']) . '</p>'
                  . '</div>'
                  . '<span class="cs-needs__link" aria-hidden="true"><span class="cs-needs__step">' . $n . '</span></span>'
                  . '<div class="cs-needs__cell cs-needs__cell--solution">'
                  . '<span class="cs-needs__tag"><span class="cs-needs__icon" aria-hidden="true">&#10003;</span>What we shipped</span>'
                  . '<p>' . e($pair['solution']) . '</p>'
                  . '</div>'
                  . '</div>';
        }

        $out .= '</section>';
    }

    return $out . '</div>';
}
/** Impact split by who it landed for — the business, and the people using it. */
function impact_grid(array $groups): string
{
    $out = '<div class="cs-impact">';
    foreach ($groups as $g) {
        $out .= '<div class="cs-impact__col"><h3 class="cs-impact__label">' . e($g['label']) . '</h3><ul>';
        foreach ($g['items'] as $item) {
            $out .= '<li>' . e($item) . '</li>';
        }
        $out .= '</ul></div>';
    }
    return $out . '</div>';
}

/** Closing lessons as titled cards rather than another run of prose. */
function learnings_grid(array $items): string
{
    $out = '<div class="cs-learnings">';
    foreach ($items as $l) {
        $out .= '<div class="cs-learning">'
              . '<h3 class="cs-learning__title">' . e($l['title']) . '</h3>'
              . '<p class="cs-learning__text">' . e($l['text']) . '</p>'
              . '</div>';
    }
    return $out . '</div>';
}

function stats_grid(array $stats): string
{
    $out = '<div class="cs-stats">';
    foreach ($stats as $stat) {
        $out .= '<div class="cs-stat">'
              . '<div class="cs-stat__value">' . e($stat['value']) . '</div>'
              . '<div class="cs-stat__label">' . e($stat['label']) . '</div>'
              . '</div>';
    }
    return $out . '</div>';
}

/**
 * Persona cards.
 *
 * Carries the demographic strip (age / occupation / location) from the research
 * deliverable, plus a 'role' tag so it is clear which side of the marketplace a
 * persona sits on — the platform serves two, and the goals only make sense once
 * you know which one you are reading.
 */
function personas(array $people): string
{
    $out = '<div class="cs-personas">';

    foreach ($people as $p) {
        $out .= '<article class="cs-persona">';

        if (!empty($p['role'])) {
            $out .= '<span class="cs-persona__role">' . e($p['role']) . '</span>';
        }

        $out .= '<div class="cs-persona__head">'
              . '<span class="cs-persona__avatar" aria-hidden="true">' . e(mb_substr($p['name'], 0, 1)) . '</span>'
              . '<div><h3 class="cs-persona__name">' . e($p['name']) . '</h3>'
              . (!empty($p['context']) ? '<p class="cs-persona__context">' . e($p['context']) . '</p>' : '')
              . '</div></div>';

        $facts = array_filter([
            'Age'        => $p['age'] ?? '',
            'Occupation' => $p['occupation'] ?? '',
            'Location'   => $p['location'] ?? '',
        ], static fn($v) => $v !== '');

        if ($facts) {
            $out .= '<dl class="cs-persona__facts">';
            foreach ($facts as $label => $value) {
                $out .= '<div><dt>' . e($label) . '</dt><dd>' . e($value) . '</dd></div>';
            }
            $out .= '</dl>';
        }

        foreach ([['Goals', $p['goals'] ?? []], ['Frustrations', $p['frustrations'] ?? []]] as [$label, $items]) {
            if ($items) {
                $out .= '<div class="cs-persona__group cs-persona__group--' . strtolower($label) . '">'
                      . '<h4 class="cs-persona__label">' . e($label) . '</h4><ul>';
                foreach ($items as $i) {
                    $out .= '<li>' . e($i) . '</li>';
                }
                $out .= '</ul></div>';
            }
        }

        $out .= '</article>';
    }

    return $out . '</div>';
}

/* ==========================================================================
   Page templates
   ========================================================================== */

function render_work(string $slug): string
{
    $projects = projects_data();
    $project  = $projects[$slug] ?? null;
    $pageTitle = $project
        ? $project['title'] . ' — Case Study | Tamilselvan Madhu'
        : 'Project not found | Tamilselvan Madhu';

    ob_start();
    ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo e($pageTitle); ?></title>
        <meta name="description" content="<?php echo e($project['subtitle'] ?? 'Case study'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="stylesheet" href="assets/css/framework/bootstrap.min.css">
        <!--Case bundle: fonts, theme, custom and case-study styles in load order-->
        <link rel="stylesheet" href="assets/css/app.css">
    </head>

    <body class="cs-body">

        <!--Reading progress-->
        <div class="cs-progress" aria-hidden="true"><span></span></div>


        <!--Navbar-->
        <header class="cs-navbar">
            <div class="cs-navbar__inner">
                <a class="cs-navbar__logo" href="index.php"><img src="images/white.png" alt="Tamilsoft"></a>
                <a class="cs-navbar__back" href="projects.php">
                    <span class="cs-navbar__back-icon">&#129144;</span>
                    <span>All work</span>
                </a>
            </div>
        </header>

        <?php if ($project !== null && !empty($project['sections'])) : ?>
        <!--Chapter rail-->
        <?php /* Horizontal and sticky rather than a fixed left rail: the rail
                 needed ~1790px of viewport to clear the container, which meant
                 no navigation at all on a normal laptop — on a page this long,
                 the one place it is most needed. */ ?>
        <nav class="cs-rail" aria-label="Chapters">
            <div class="cs-rail__inner">
                <?php foreach ($project['sections'] as $railSection) : ?>
                <a href="#section-<?php echo e($railSection['number']); ?>">
                    <span class="cs-rail__num"><?php echo e($railSection['number']); ?></span>
                    <span class="cs-rail__title"><?php echo e($railSection['title']); ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </nav>
        <?php endif; ?>

<?php if ($project === null) : ?>

        <main class="cs-main">
            <div class="cs-container cs-notfound">
                <h1>Project not found</h1>
                <p>That case study doesn&rsquo;t exist &mdash; it may have moved or not be published yet.</p>
                <a class="vlt-btn vlt-btn--primary" href="index.php"><span class="vlt-btn__text">Back to portfolio</span></a>
            </div>
        </main>

<?php else : ?>

        <main class="cs-main">

            <!--Title-->
            <section class="cs-hero">
                <div class="cs-hero__pattern" aria-hidden="true"></div>
                <div class="cs-container">
                    <?php if (!empty($project['is_placeholder'])) : ?>
                        <div class="cs-draft">
                            <strong>Sample case study</strong>
                            <span>Placeholder content for layout &mdash; not real project work.</span>
                        </div>
                    <?php endif; ?>
                    <div class="cs-hero__meta">
                        <span class="cs-hero__category"><?php echo e($project['category']); ?></span>
                        <span class="cs-hero__year"><?php echo e($project['year']); ?></span>
                    </div>
                    <h1 class="cs-hero__title"><?php echo e($project['title']); ?></h1>
                    <p class="cs-hero__subtitle"><?php echo e($project['subtitle']); ?></p>
                </div>
            </section>

            <!--Hero image-->
            <?php if (!empty($project['hero_image']) || !empty($project['hero_caption'])) : ?>
            <section class="cs-hero-media">
                <div class="cs-container cs-container--wide">
                    <?php // Ratio is per-project: a designed cover card wants its own
                          // proportions, and forcing one into a 21x9 band crops the
                          // title and logo straight off it. Defaults to the wide band. ?>
                    <?php echo figure([
                        'src'     => $project['hero_image'] ?? '',
                        'caption' => $project['hero_caption'] ?? '',
                        'ratio'   => $project['hero_ratio'] ?? '21x9',
                        'eager'   => true,
                    ]); ?>
                </div>
            </section>
            <?php endif; ?>

            <!--Facts-->
            <section class="cs-facts">
                <div class="cs-container">
                    <div class="cs-facts__grid">
                        <?php foreach ($project['meta'] as $label => $value) : ?>
                        <div class="cs-fact">
                            <div class="cs-fact__label"><?php echo e($label); ?></div>
                            <div class="cs-fact__value"><?php echo e($value); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!--Overview-->
            <?php if (!empty($project['overview'])) : ?>
            <section class="cs-section cs-section--overview">
                <div class="cs-container">
                    <div class="cs-overview">
                        <h2 class="cs-overview__label">Overview</h2>
                        <div class="cs-overview__body cs-prose"><?php echo paragraphs($project['overview']); ?></div>
                    </div>

                    <?php if (!empty($project['brief'])) : ?>
                        <div class="cs-gap"></div>
                        <?php echo brief_grid($project['brief']); ?>
                    <?php endif; ?>

                    <?php if (!empty($project['stats'])) : ?>
                        <div class="cs-gap"></div>
                        <?php echo stats_grid($project['stats']); ?>
                    <?php endif; ?>
                </div>
            </section>
            <?php endif; ?>


            <!--Chapters-->
            <?php foreach ($project['sections'] as $section) : ?>
            <section class="cs-section<?php echo !empty($section['challenge']) ? ' cs-section--challenge' : ''; ?>" id="section-<?php echo e($section['number']); ?>">
                <span class="cs-section__watermark" aria-hidden="true"><?php echo e($section['number']); ?></span>
                <div class="cs-container">

                    <div class="cs-section__head">
                        <span class="cs-section__number"><?php echo e($section['number']); ?></span>
                        <h2 class="cs-section__title"><?php echo e($section['title']); ?></h2>
                    </div>

                    <?php if (!empty($section['lead'])) : ?>
                        <p class="cs-lead"><?php echo e($section['lead']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($section['body'])) : ?>
                        <div class="cs-section__body cs-prose"><?php echo paragraphs($section['body']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($section['personas'])) : ?>
                        <?php echo personas($section['personas']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['brief_table'])) : ?>
                        <?php echo brief_table($section['brief_table']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['challenge'])) : ?>
                        <?php echo challenge_block($section['challenge']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['needs'])) : ?>
                        <?php echo needs_grid($section['needs']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['empathy'])) : ?>
                        <?php echo empathy_map($section['empathy']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['ia'])) : ?>
                        <?php echo ia_map($section['ia']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['userflows'])) : ?>
                        <div class="cs-uf-set">
                            <?php foreach ($section['userflows'] as $uf) : ?>
                                <?php echo user_flow($uf); ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($section['flow'])) : ?>
                        <?php echo flow_diagram($section['flow']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['journey'])) : ?>
                        <?php echo journey_map($section['journey']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['collage'])) : ?>
                        <?php echo ds_collage($section['collage']['pages'], $section['collage']['dir']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['impact'])) : ?>
                        <?php echo impact_grid($section['impact']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['learnings'])) : ?>
                        <?php echo learnings_grid($section['learnings']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['list'])) : ?>
                        <div class="cs-callout">
                            <?php if (!empty($section['list_title'])) : ?>
                                <h3 class="cs-callout__title"><?php echo e($section['list_title']); ?></h3>
                            <?php endif; ?>
                            <ul class="cs-callout__list">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li><?php echo e($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($section['stats_repeat']) && !empty($project['stats'])) : ?>
                        <?php echo stats_grid($project['stats']); ?>
                    <?php endif; ?>

                    <?php if (!empty($section['images'])) : ?>
                        <div class="cs-gallery cs-gallery--full"><?php echo section_images($section); ?></div>
                    <?php endif; ?>

                </div>
            </section>
            <?php endforeach; ?>

            <!--Closing-->
            <section class="cs-cta">
                <div class="cs-cta__glow" aria-hidden="true"></div>
                <div class="cs-container">
                    <h2 class="cs-cta__title"><?php echo e($project['closing']['title'] ?? 'Interested in the detail behind this?'); ?></h2>
                    <p class="cs-cta__text"><?php echo e($project['closing']['text'] ?? 'I’m happy to walk through the process, the trade-offs and the parts that didn’t work first time.'); ?></p>
                    <div class="cs-cta__actions">
                        <a class="vlt-btn vlt-btn--primary" href="index.php#Contact"><span class="vlt-btn__text">Get in touch</span></a>
                        <a class="cs-cta__secondary" href="projects.php">View all work</a>
                    </div>
                    <div class="cs-cta__links">
                        <a href="mailto:info.tamilsoft@gmail.com">info.tamilsoft@gmail.com</a>
                        <span aria-hidden="true">/</span>
                        <a href="tel:+919786688777">+91 97866 88777</a>
                        <span aria-hidden="true">/</span>
                        <a href="https://www.behance.net/tamilselvan5" target="_blank" rel="noopener">Behance</a>
                        <span aria-hidden="true">/</span>
                        <a href="https://www.linkedin.com/in/tamil-selvan-8116ba178/" target="_blank" rel="noopener">LinkedIn</a>
                    </div>
                </div>
            </section>

        </main>

<?php endif; ?>

        <footer class="cs-footer">
            <div class="cs-container">
                <div class="cs-footer__main">
                    <div class="cs-footer__brand">
                        <img class="cs-footer__logo" src="images/white.png" alt="Tamilsoft">
                        <p class="cs-footer__tagline">Senior Product Designer — scalable B2B, B2C and B2G products across FinTech, Government and AI.</p>
                    </div>
                    <?php /* Column labels are spans, not headings: the theme colours every
                             h1-h6 dark, and adding four more headings would clutter the
                             document outline for no gain. The nav landmarks carry the
                             accessible names instead. */ ?>
                    <div class="cs-footer__nav">
                        <nav class="cs-footer__col" aria-label="Explore">
                            <span class="cs-footer__label">Explore</span>
                            <a href="index.php">Home</a>
                            <a href="projects.php">All projects</a>
                            <a href="images/resume/TAMILSELVAN(RESUME-2026).pdf" target="_blank" rel="noopener">Résumé</a>
                        </nav>
                        <nav class="cs-footer__col" aria-label="Connect">
                            <span class="cs-footer__label">Connect</span>
                            <a href="mailto:info.tamilsoft@gmail.com">Email</a>
                            <a href="https://www.behance.net/tamilselvan5" target="_blank" rel="noopener">Behance</a>
                            <a href="https://www.linkedin.com/in/tamil-selvan-8116ba178/" target="_blank" rel="noopener">LinkedIn</a>
                        </nav>
                    </div>
                </div>
                <div class="cs-footer__bar">
                    <p class="cs-footer__copy">&copy; TAMILSOFT <?php echo date('Y'); ?>. All rights reserved.</p>
                    <?php /* '#top' needs no matching element: the HTML spec sends it
                             to the top of the document. */ ?>
                    <a class="cs-footer__totop" href="#top">Back to top <span aria-hidden="true">&#8593;</span></a>
                </div>
            </div>
        </footer>

        <script>
        /* Reading progress bar + active chapter in the rail. */
        (function () {
            'use strict';

            var bar = document.querySelector('.cs-progress span');
            var strip = document.querySelector('.cs-rail__inner');
            var links = [].slice.call(document.querySelectorAll('.cs-rail a'));
            var sections = [].slice.call(document.querySelectorAll('.cs-section[id]'));
            var lastActive = null;

            var onScroll = function () {
                var doc = document.documentElement;

                if (bar) {
                    var max = doc.scrollHeight - doc.clientHeight;
                    bar.style.width = (max > 0 ? (doc.scrollTop / max) * 100 : 0) + '%';
                }

                if (links.length && sections.length) {
                    // Active chapter = the last one whose top has passed 40% of
                    // the viewport. Scroll-driven rather than IntersectionObserver,
                    // so it shares the one listener with the progress bar.
                    var line = doc.clientHeight * 0.4;
                    var current = null;
                    for (var i = 0; i < sections.length; i++) {
                        if (sections[i].getBoundingClientRect().top <= line) {
                            current = sections[i].id;
                        }
                    }
                    var active = null;
                    links.forEach(function (a) {
                        var on = current !== null && a.getAttribute('href') === '#' + current;
                        a.classList.toggle('is-active', on);
                        if (on) { active = a; }
                    });

                    // The strip scrolls sideways, so the active chapter can sit
                    // off-screen inside it. Nudge it back into view — but only
                    // when it actually changes, or every scroll frame would
                    // fight the user's own sideways scrolling.
                    if (active && active !== lastActive && strip) {
                        lastActive = active;
                        var stripBox = strip.getBoundingClientRect();
                        var linkBox = active.getBoundingClientRect();
                        if (linkBox.left < stripBox.left || linkBox.right > stripBox.right) {
                            strip.scrollLeft += linkBox.left - stripBox.left
                                              - (stripBox.width - linkBox.width) / 2;
                        }
                    }
                }
            };

            window.addEventListener('scroll', onScroll, { passive: true });
            document.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        }());
        </script>
        <!--Content protection. Inlined rather than fetched: at 3.6 KB the
            request costs more than the bytes, and it is the only script the
            case-study pages need at all.-->
        <script>
            /**
             * Content protection — deters casual copying of the portfolio work.
             *
             * Scope, honestly stated: this raises the effort bar for a casual visitor. It is
             * not a security control and cannot be one. view-source:, curl, the DevTools menu
             * item, Save Page, print-to-PDF and disabling JS all bypass every line below, and
             * any image on the page has already been downloaded to the visitor's machine.
             *
             * Configure via the two lists at the top rather than editing the handlers.
             */
            (function () {
                'use strict';
            
                /**
                 * Text inside these stays selectable.
                 *
                 * Your own contact details are here on purpose: a client who cannot copy your
                 * email address just leaves. Blocking selection here would cost you leads to
                 * protect nothing — the address is in the page source regardless.
                 * Empty this string if you want the page locked with no exceptions.
                 */
                var SELECTABLE = '.vlt-navbar-contacts, .vlt-offcanvas-menu__copyright, a[href^="mailto:"], a[href^="tel:"], [data-selectable]';
            
                /** Right-click stays available on form fields, or paste/spellcheck break. */
                var CONTEXT_ALLOWED = 'input, textarea, select, [contenteditable="true"]';
            
                function isAllowed(target, selector) {
                    return selector !== '' && target instanceof Element && target.closest(selector) !== null;
                }
            
                /* --- Right click ----------------------------------------------------- */
            
                document.addEventListener('contextmenu', function (e) {
                    if (isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
                    e.preventDefault();
                });
            
                /* --- Text selection -------------------------------------------------- */
            
                document.addEventListener('selectstart', function (e) {
                    if (isAllowed(e.target, SELECTABLE) || isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
                    e.preventDefault();
                });
            
                ['copy', 'cut'].forEach(function (type) {
                    document.addEventListener(type, function (e) {
                        if (isAllowed(e.target, SELECTABLE) || isAllowed(e.target, CONTEXT_ALLOWED)) {
                            return;
                        }
                        e.preventDefault();
                    });
                });
            
                /* --- Image dragging -------------------------------------------------- */
            
                document.addEventListener('dragstart', function (e) {
                    if (e.target instanceof Element && e.target.matches('img')) {
                        e.preventDefault();
                    }
                });
            
                /* --- Keyboard shortcuts ---------------------------------------------- */
            
                document.addEventListener('keydown', function (e) {
                    if (isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
            
                    var key = (e.key || '').toLowerCase();
                    var ctrl = e.ctrlKey || e.metaKey;
            
                    // F12 — the browser owns this one; preventDefault often will not stop it.
                    if (key === 'f12') {
                        e.preventDefault();
                        return;
                    }
            
                    if (ctrl && e.shiftKey && (key === 'i' || key === 'j' || key === 'c')) {
                        e.preventDefault();
                        return;
                    }
            
                    // u = view source, s = save page, a = select all, p = print, c = copy
                    if (ctrl && (key === 'u' || key === 's' || key === 'a' || key === 'p' || key === 'c')) {
                        e.preventDefault();
                    }
                });
            
                /* --- Flag for CSS ---------------------------------------------------- */
            
                // Set from JS, not hardcoded in the HTML, so that with JS disabled the page
                // stays selectable rather than being unusable and still unprotected.
                document.documentElement.classList.add('is-protected');
            
            }());
        </script>

    </body>
</html>
<?php
    return ob_get_clean();
}

function render_projects(): string
{
    $projects  = projects_data();
    $total     = count($projects);
    $realCount = count(array_filter($projects, static fn(array $p): bool => empty($p['is_placeholder'])));

    ob_start();
    ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title>All Projects — Tamilselvan Madhu</title>
        <meta name="description" content="Every case study and project by Tamilselvan Madhu — product design across Government, FinTech, Healthcare and Enterprise SaaS.">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="stylesheet" href="assets/css/framework/bootstrap.min.css">
        <!--Case bundle: fonts, theme, custom and case-study styles in load order-->
        <link rel="stylesheet" href="assets/css/app.css">
    </head>

    <body class="cs-body">

        <a class="vlt-skip-link" href="#projects">Skip to projects</a>

        <!--Navbar-->
        <header class="cs-navbar">
            <div class="cs-navbar__inner">
                <a class="cs-navbar__logo" href="index.php"><img src="images/white.png" alt="Tamilsoft"></a>
                <a class="cs-navbar__back" href="index.php">
                    <span class="cs-navbar__back-icon">&#129144;</span>
                    <span>Home</span>
                </a>
            </div>
        </header>

        <main class="cs-main">

            <!--Hero-->
            <section class="cs-hero">
                <div class="cs-hero__pattern" aria-hidden="true"></div>
                <div class="cs-container">
                    <div class="cs-hero__meta">
                        <span class="cs-hero__category">Work</span>
                        <span class="cs-hero__year"><?php echo $total; ?> projects</span>
                    </div>
                    <h1 class="cs-hero__title">All Projects</h1>
                    <p class="cs-hero__subtitle">Product design across Government, FinTech, Healthcare and Enterprise SaaS.</p>
                </div>
            </section>

            <!--Grid-->
            <section class="cs-section" id="projects">
                <div class="cs-container">
                    <div class="cs-projects">
                        <?php $i = 0; foreach ($projects as $slug => $p) : $i++; ?>
                        <?php $isLocked = !empty($p['locked']); ?>
                        <<?php echo $isLocked ? 'div class="cs-project cs-project--locked"' : 'a class="cs-project" href="work.php?p=' . urlencode($slug) . '"'; ?>>
                            <div class="cs-project__media">
                                <!-- Loaded eagerly on purpose: lazy images proved unreliable in this
                                     project, and a handful of modest images is a trivial payload for a work index. -->
                                <img src="<?php echo e($p['card_image']); ?>" alt="<?php echo e($p['title'] . ' — project preview'); ?>">
                                <span class="cs-project__num"><?php echo str_pad((string) $i, 2, '0', STR_PAD_LEFT); ?></span><?php if ($isLocked) : ?><span class="cs-project__lock" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg></span><?php endif; ?>
                                <span class="cs-project__tag"><?php echo e($p['year']); ?></span>
                            </div>
                            <div class="cs-project__info">
                                <?php if (!empty($p['is_placeholder'])) : ?>
                                    <span class="cs-project__flag">Sample</span>
                                <?php endif; ?>
                                <span class="cs-project__cat"><?php echo e($p['category']); ?><?php if (!empty($p['headline_stat'])) : ?> &middot; <?php echo e($p['headline_stat']); ?><?php endif; ?></span>
                                <h2 class="cs-project__title"><?php echo e($p['headline'] ?? $p['title']); ?></h2>
                                <?php if (!empty($p['card_summary'])) : ?>
                                    <p class="cs-project__text"><?php echo e($p['card_summary']); ?></p>
                                <?php endif; ?>
                                <?php if ($isLocked) : ?><span class="cs-project__cta cs-project__cta--locked" aria-disabled="true">Coming soon</span><?php else : ?><span class="cs-project__cta"><?php echo e($p['cta'] ?? 'View Case Study'); ?> <span class="cs-project__cta-icon">&#129146;</span></span><?php endif; ?>
                            </div>
                        </<?php echo $isLocked ? 'div' : 'a'; ?>>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($realCount < $total) : ?>
                    <p class="cs-projects__note">
                        <strong>Note:</strong> projects marked &ldquo;Sample&rdquo; are placeholder case studies used to build out this page &mdash; they are not real client work.
                    </p>
                    <?php endif; ?>
                </div>
            </section>

            <!--CTA-->
            <section class="cs-cta">
                <div class="cs-container">
                    <h2 class="cs-cta__title">Want to talk through any of these?</h2>
                    <p class="cs-cta__text">I&rsquo;m happy to walk through the process, the trade-offs and the parts that didn&rsquo;t work first time.</p>
                    <div class="cs-cta__actions">
                        <a class="vlt-btn vlt-btn--primary" href="index.php#Contact"><span class="vlt-btn__text">Get in touch</span></a>
                        <a class="cs-cta__secondary" href="https://www.behance.net/tamilselvan5" target="_blank" rel="noopener">More on Behance</a>
                    </div>
                </div>
            </section>

        </main>

        <footer class="cs-footer">
            <div class="cs-container">
                <div class="cs-footer__main">
                    <div class="cs-footer__brand">
                        <img class="cs-footer__logo" src="images/white.png" alt="Tamilsoft">
                        <p class="cs-footer__tagline">Senior Product Designer — scalable B2B, B2C and B2G products across FinTech, Government and AI.</p>
                    </div>
                    <?php /* Column labels are spans, not headings: the theme colours every
                             h1-h6 dark, and adding four more headings would clutter the
                             document outline for no gain. The nav landmarks carry the
                             accessible names instead. */ ?>
                    <div class="cs-footer__nav">
                        <nav class="cs-footer__col" aria-label="Explore">
                            <span class="cs-footer__label">Explore</span>
                            <a href="index.php">Home</a>
                            <a href="projects.php">All projects</a>
                            <a href="images/resume/TAMILSELVAN(RESUME-2026).pdf" target="_blank" rel="noopener">Résumé</a>
                        </nav>
                        <nav class="cs-footer__col" aria-label="Connect">
                            <span class="cs-footer__label">Connect</span>
                            <a href="mailto:info.tamilsoft@gmail.com">Email</a>
                            <a href="https://www.behance.net/tamilselvan5" target="_blank" rel="noopener">Behance</a>
                            <a href="https://www.linkedin.com/in/tamil-selvan-8116ba178/" target="_blank" rel="noopener">LinkedIn</a>
                        </nav>
                    </div>
                </div>
                <div class="cs-footer__bar">
                    <p class="cs-footer__copy">&copy; TAMILSOFT <?php echo date('Y'); ?>. All rights reserved.</p>
                    <?php /* '#top' needs no matching element: the HTML spec sends it
                             to the top of the document. */ ?>
                    <a class="cs-footer__totop" href="#top">Back to top <span aria-hidden="true">&#8593;</span></a>
                </div>
            </div>
        </footer>

        <!--Content protection. Inlined rather than fetched: at 3.6 KB the
            request costs more than the bytes, and it is the only script the
            case-study pages need at all.-->
        <script>
            /**
             * Content protection — deters casual copying of the portfolio work.
             *
             * Scope, honestly stated: this raises the effort bar for a casual visitor. It is
             * not a security control and cannot be one. view-source:, curl, the DevTools menu
             * item, Save Page, print-to-PDF and disabling JS all bypass every line below, and
             * any image on the page has already been downloaded to the visitor's machine.
             *
             * Configure via the two lists at the top rather than editing the handlers.
             */
            (function () {
                'use strict';
            
                /**
                 * Text inside these stays selectable.
                 *
                 * Your own contact details are here on purpose: a client who cannot copy your
                 * email address just leaves. Blocking selection here would cost you leads to
                 * protect nothing — the address is in the page source regardless.
                 * Empty this string if you want the page locked with no exceptions.
                 */
                var SELECTABLE = '.vlt-navbar-contacts, .vlt-offcanvas-menu__copyright, a[href^="mailto:"], a[href^="tel:"], [data-selectable]';
            
                /** Right-click stays available on form fields, or paste/spellcheck break. */
                var CONTEXT_ALLOWED = 'input, textarea, select, [contenteditable="true"]';
            
                function isAllowed(target, selector) {
                    return selector !== '' && target instanceof Element && target.closest(selector) !== null;
                }
            
                /* --- Right click ----------------------------------------------------- */
            
                document.addEventListener('contextmenu', function (e) {
                    if (isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
                    e.preventDefault();
                });
            
                /* --- Text selection -------------------------------------------------- */
            
                document.addEventListener('selectstart', function (e) {
                    if (isAllowed(e.target, SELECTABLE) || isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
                    e.preventDefault();
                });
            
                ['copy', 'cut'].forEach(function (type) {
                    document.addEventListener(type, function (e) {
                        if (isAllowed(e.target, SELECTABLE) || isAllowed(e.target, CONTEXT_ALLOWED)) {
                            return;
                        }
                        e.preventDefault();
                    });
                });
            
                /* --- Image dragging -------------------------------------------------- */
            
                document.addEventListener('dragstart', function (e) {
                    if (e.target instanceof Element && e.target.matches('img')) {
                        e.preventDefault();
                    }
                });
            
                /* --- Keyboard shortcuts ---------------------------------------------- */
            
                document.addEventListener('keydown', function (e) {
                    if (isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
            
                    var key = (e.key || '').toLowerCase();
                    var ctrl = e.ctrlKey || e.metaKey;
            
                    // F12 — the browser owns this one; preventDefault often will not stop it.
                    if (key === 'f12') {
                        e.preventDefault();
                        return;
                    }
            
                    if (ctrl && e.shiftKey && (key === 'i' || key === 'j' || key === 'c')) {
                        e.preventDefault();
                        return;
                    }
            
                    // u = view source, s = save page, a = select all, p = print, c = copy
                    if (ctrl && (key === 'u' || key === 's' || key === 'a' || key === 'p' || key === 'c')) {
                        e.preventDefault();
                    }
                });
            
                /* --- Flag for CSS ---------------------------------------------------- */
            
                // Set from JS, not hardcoded in the HTML, so that with JS disabled the page
                // stays selectable rather than being unusable and still unprotected.
                document.documentElement.classList.add('is-protected');
            
            }());
        </script>

    </body>
</html>
<?php
    return ob_get_clean();
}

function render_index(): string
{
    $projects = projects_data();
    // Only projects explicitly marked featured appear in Selected Works, so a
    // work-in-progress entry can sit in the data file without going public.
    $featuredProjects = array_filter($projects, static fn(array $p): bool => !empty($p['featured']));
    $testimonials = testimonials_data();

    ob_start();
    ?>
<!DOCTYPE html>
<html class="no-js vlt-is--custom-cursor" lang="en">
    <head>
        <meta charset="utf-8">
        <title>TAMILSELVAN MADHU — Senior Product Designer (UI/UX)</title>
        <meta name="description" content="Senior Product Designer with 5+ years designing scalable B2B, B2C and B2G products across FinTech, Healthcare, Enterprise SaaS, Government and Conversational AI.">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Favicon-->
        <link rel="icon" type="image/png" href="images/favicon.png">
        <!--Framework-->
        <link rel="stylesheet" href="assets/css/framework/bootstrap.min.css">
        <!--Site bundle: fonts, plugins, theme and custom styles in load order-->
        <link rel="stylesheet" href="assets/css/app.css">

    </head>

    <body class=" animsition">
        <!--Accessibility: skip straight to content for keyboard/screen-reader users-->
        <a class="vlt-skip-link" href="#Home">Skip to content</a>
        <!--Header-->
        <header class="vlt-header">
            <div class="vlt-navbar vlt-navbar--main vlt-navbar--fixed">
                <div class="vlt-navbar-background"></div>
                <div class="vlt-navbar-inner">
                    <div class="vlt-navbar-inner--left">
                        <!--Logo--><a class="vlt-navbar-logo" href="index.php"><img class="black" src="images/black.png" alt="Mikael"><img class="white" src="images/white.png" alt="Tamilsoft"></a>
                        <!--Contacts-->
                        <nav class="vlt-navbar-contacts d-none d-md-block">
                            <ul>
                                <li><a href="tel:+919786688777">+91 97866 88777</a></li>
                                <li class="sep">/</li>
                                <li><a href="mailto:info.tamilsoft@gmail.com">info.tamilsoft@gmail.com</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="vlt-navbar-inner--right">
                        <div class="d-flex align-items-center">
                            <!--Menu Burger--><a class="vlt-menu-burger js-offcanvas-menu-open" href="#" role="button" aria-label="Open menu"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12" />
                                <line x1="3" y1="6" x2="21" y2="6" />
                                <line x1="3" y1="18" x2="21" y2="18" /></svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Offcanvas Menu-->
        <div class="vlt-offcanvas-menu">
            <div class="vlt-offcanvas-menu__header">
                <!--Locales-->
                <nav class="vlt-offcanvas-menu__locales"><a class="active" href="#"></a></nav>
                <!--Menu Burger--><a class="vlt-menu-burger vlt-menu-burger--opened js-offcanvas-menu-close" href="#" role="button" aria-label="Close menu"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" /></svg></a>
            </div>
            <nav class="vlt-offcanvas-menu__navigation">
                <!--Navigation-->
                <ul class="sf-menu">
                    <li data-menuanchor="Home"><a href="#Home">Home</a></li>
                    <li data-menuanchor="About"><a href="#About">About</a></li>
                    <li data-menuanchor="Work"><a href="#Work">Selected Works</a></li>
                    <li data-menuanchor="Experience"><a href="#Experience">Experience</a></li>
                    <li data-menuanchor="Tools"><a href="#Tools">Expertise</a></li>
                    <li data-menuanchor="Capabilities"><a href="#Capabilities">Capabilities</a></li>
                    <li data-menuanchor="Awards"><a href="#Awards">Awards</a></li>
                    <li data-menuanchor="Testimonials"><a href="#Testimonials">Testimonials</a></li>
                    <li data-menuanchor="Education"><a href="#Education">Education</a></li>
                    <li data-menuanchor="Contact"><a href="#Contact">Contact</a></li>
                </ul>
            </nav>
            <div class="vlt-offcanvas-menu__footer">
                <!--Socials-->
                <div class="vlt-offcanvas-menu__socials"><a href="https://www.behance.net/tamilselvan5" target="_blank">Bē.</a><a href="https://www.linkedin.com/in/tamil-selvan-8116ba178/" target="_blank">Ln.</a></div>
                <!--Copyright-->
                <div class="vlt-offcanvas-menu__copyright">
                    <p>&copy; TAMILSOFT <?php echo date("Y"); ?> Copyright.<br>All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--Site Overlay-->
        <div class="vlt-site-overlay"></div>
        <!--Fixed Socials-->
        <div class="vlt-fixed-socials"><a href="https://www.behance.net/tamilselvan5" target="_blank">Bē.</a><a href="https://www.linkedin.com/in/tamil-selvan-8116ba178/" target="_blank">Ln.</a></div>
        <!--Main-->
        <main class="vlt-main">
            <!--Fullpage Slider-->
            <div class="vlt-fullpage-slider" data-loop-top="" data-loop-bottom="" data-speed="800">
                <!--Home-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Home" data-brightness="dark" style="background-image: url(assets/img/root/red-background.jpg);">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Particles-->
                            <div class="vlt-section__particles">
                                <div class="vlt-particle vlt-fade-in-left vlt-custom--1451" style="background-image: url(assets/img/root/plus-dark-pattern.png); transition-duration: 1s;"></div>
                                <div class="vlt-particle d-none d-xl-block vlt-fade-in-right vlt-custom--1512" style="background-image: url(assets/img/root/elipse-home-slide.png); transition-duration: 1.5s; transition-delay: 300ms;"></div>
                                <div class="vlt-particle vlt-custom--4124" style="background-image: url(images/1.png);"></div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <h5 class="vlt-display-1 vlt-hero-intro has-white-color">Hi, I&rsquo;m Tamilselvan Madhu,</h5>
                                            <div class="vlt-gap-10"></div>
                                            <h1 class="vlt-large-heading has-white-color">Designing Products<br>That Feel Effortless</h1>
                                            <div class="vlt-gap-10"></div>
                                            <h2 class="vlt-hero-subtitle has-white-color">As a Senior Product Designer</h2>
                                            <div class="vlt-gap-40"></div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <!--Counter Up Small-->
                                                    <div class="vlt-counter-up-small" data-ending-number="5" data-animation-speed="1000" data-delimiter=""><span class="counter">0</span>
                                                        <h6 class="vlt-display-1">Years of<br>Experience</h6>
                                                    </div>
                                                    <div class="vlt-gap-20--sm"></div>
                                                </div>
                                                <!--                                                <div class="col-auto">
                                                                                                    Counter Up Small
                                                                                                    <div class="vlt-counter-up-small" data-ending-number="18" data-animation-speed="1000" data-delimiter=""><span class="counter">0</span>
                                                                                                        <h6 class="vlt-display-1">Let's<br>Talk</h6>
                                                                                                    </div>
                                                                                                </div>-->
                                            </div>
                                            <div class="vlt-gap-40"></div><a class="vlt-link has-white-color" href="images/resume/TAMILSELVAN(RESUME-2026).pdf" target="_blank">View Resume</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="About" data-brightness="light">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Particles-->
                            <div class="vlt-section__particles">
                                <div class="vlt-particle vlt-custom--1259 vlt-fade-in-right" style="background-image: url(assets/img/root/plus-light-pattern.png); animation-delay: 750ms;"></div>
                                <div class="vlt-particle vlt-custom--2355 vlt-fade-in-left" style="background-image: url(assets/img/root/elipse-light.png); animation-delay: 500ms;"></div>
                            </div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 offset-lg-1">
                                        <div class="vlt-slide-photo">
                                            <div class="vlt-slide-photo__inside"><img src="images/222.jpg" alt=""></div>
                                            <div class="vlt-slide-photo__particle vlt-slide-photo__particle--tool vlt-fade-in-bottom--small has-border-radius has-box-shadow" style="top: -44px; left: 34px; transition-delay: 300ms;"><img src="images/icons/figma.jpg" alt="Figma"></div>
                                                    <div class="vlt-slide-photo__particle vlt-slide-photo__particle--tool vlt-fade-in-bottom--small has-border-radius has-box-shadow" style="top: 24px; right: -40px; transition-delay: 450ms;"><img src="images/icons/miro.svg" alt="Miro"></div>
                                                    <div class="vlt-slide-photo__particle vlt-slide-photo__particle--tool vlt-fade-in-left--small has-border-radius has-box-shadow" style="top: 44%; left: -42px; transition-delay: 600ms;"><img src="images/icons/claude.webp" alt="Claude"></div>
                                                    <div class="vlt-slide-photo__particle vlt-slide-photo__particle--tool vlt-fade-in-bottom--small has-border-radius has-box-shadow" style="bottom: -44px; left: 52px; transition-delay: 750ms;"><img src="images/icons/chatgpt.png" alt="ChatGPT"></div>
                                                    <div class="vlt-slide-photo__particle vlt-slide-photo__particle--tool vlt-fade-in-left--small has-border-radius has-box-shadow" style="bottom: 34px; right: -42px; transition-delay: 900ms;"><img src="images/icons/notion.png" alt="Notion AI"></div>
                                            <div class="vlt-slide-photo__particle vlt-fade-in-left--small negative-z-index" style="right: -40px; bottom: -30px; width: 290px; transition-delay: 1.2s;"><img src="assets/img/root/plus-light-pattern.png" alt=""></div>
                                        </div>
                                        <div class="vlt-gap-100--md"></div>
                                    </div>
                                    <div class="col-lg-5 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <h4>Designing scalable products across <span class="has-first-color">B2B, B2C & B2G</span> for 5+ years.</h4>
                                            <div class="vlt-gap-20"></div>
                                            <p>Senior Product Designer with 5+ years leading 0&ndash;1 product design and scaling B2B, B2C and B2G products &mdash; across FinTech, Healthcare, Enterprise SaaS, Industrial SaaS, Government, Conversational AI and Productivity.</p>
                                            <p>I work end&#8209;to&#8209;end: discovery, research, information architecture, interaction design, prototyping and design systems. Mostly that means making complicated things feel obvious, and building accessibility in from the start rather than bolting it on at the end.</p>
                                        </div>
                                        <div class="vlt-gap-50"></div>
                                        <?php
                                        /* Skill bars. The title carries the discipline and the animated
                                           counter; the tools sit under the bar as a caption rather than
                                           inside the heading, which previously ran to two wrapped lines
                                           and pushed the counter away from its own bar. */
                                        $skills = [
                                            ['Product Strategy &amp; Product Thinking', 95, 'Product Thinking, Product Discovery, UX Strategy, Design Thinking, Feature Prioritization, Stakeholder Management, Data-Driven Decision Making'],
                                            ['UX Research &amp; Experience Design',     95, 'User Research, Journey Mapping, Information Architecture, User Flows, Wireframing, Usability Testing, Heuristic Evaluation, WCAG Accessibility'],
                                            ['UI, Interaction &amp; Design Systems',    95, 'Design Systems, Component Libraries, Interaction Design, Responsive Design, Prototyping, Micro-interactions, Design Documentation'],
                                            ['AI-Powered Product Design',              90, 'AI-Assisted Design, Prompt Engineering, Conversational AI, MCP, AI Research, Figma Make, Cursor, Claude, Gemini'],
                                        ];
                                        $delay = 200;
                                        foreach ($skills as $i => [$label, $value, $tools]) :
                                            if ($i > 0) : ?>
                                        <div class="vlt-gap-30"></div>
                                        <?php endif; ?>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:<?php echo $delay; ?>ms; animation-duration:700ms;">
                                            <!--Progress Bar-->
                                            <div class="vlt-progress-bar" data-final-value="<?php echo $value; ?>" data-animation-speed="1000">
                                                <h5 class="vlt-progress-bar__title"><?php echo $label; ?><span class="counter">0</span>
                                                </h5>
                                                <div class="vlt-progress-bar__bar"><span></span></div>
                                                <p class="vlt-skill-tools"><?php echo htmlspecialchars($tools, ENT_QUOTES, 'UTF-8'); ?></p>
                                            </div>
                                        </div>
                                        <?php $delay += 100; endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Selected Works-->
                <!--Section-->
                <div class="vlt-section pp-scrollable vlt-wp-section" data-anchor="Work" data-brightness="light">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--This template's pagePiling only honours pp-scrollable on the section
                                itself, so the section is the scroller. Sticky works because the
                                table-cell centering wrappers are flattened for this section.-->
                            <div class="vlt-wp-scroller">
                            <div class="container">
                              <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                <div class="vlt-wp">
                                    <!--Pinned aside-->
                                    <aside class="vlt-wp__aside">
                                        <span class="vlt-works__eyebrow">Selected Work</span>
                                        <h2 class="h1">Solving meaningful<br><span class="has-first-color">product challenges.</span></h2>
                                        <p class="vlt-wp__intro">An inside look at the thinking, collaboration, and execution behind products used by thousands of users.</p>
                                        <?php /* Same .vlt-btn component the Download Resume button uses, so the
                                                 two primary calls to action on the site are visually identical.
                                                 Behance takes the outlined variant: same size, less weight. */ ?>
                                        <div class="vlt-wp__aside-actions">
                                            <!--Button--><a class="vlt-btn vlt-btn--primary" href="projects.php"><span class="vlt-btn__text">Explore Case Studies</span><span class="vlt-btn__icon vlt-btn__icon--right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg></span></a>
                                            <!--Button--><a class="vlt-btn vlt-btn--outline" href="https://www.behance.net/tamilselvan5" target="_blank" rel="noopener" aria-label="View more work on Behance (opens in a new tab)"><span class="vlt-btn__text">Behance</span><span class="vlt-btn__icon vlt-btn__icon--right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                                    <polyline points="7 7 17 7 17 17"></polyline>
                                                    </svg></span></a>
                                        </div>
                                    </aside>
                                    <!--Scrolling list-->
                                    <div class="vlt-wp__list">
                                        <?php $workIndex = 0; foreach ($featuredProjects as $slug => $featured) : $workIndex++; ?>
                                        <?php $isLocked = !empty($featured['locked']); ?>
                                        <?php /* A locked card is a <div>, not an <a>: there is nothing to open
                                                 yet, and a link that goes nowhere is worse than no link. */ ?>
                                        <<?php echo $isLocked ? 'div class="vlt-wp__card vlt-wp__card--locked"' : 'a class="vlt-wp__card" href="work.php?p=' . urlencode($slug) . '"'; ?>>
                                            <!--Image box: number top-left, tag top-right, image fills it-->
                                            <div class="vlt-wp__media">
                                                <img src="<?php echo htmlspecialchars($featured['card_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($featured['title'] . ' — project preview', ENT_QUOTES, 'UTF-8'); ?>">
                                                <span class="vlt-wp__num"><?php echo str_pad((string) $workIndex, 2, '0', STR_PAD_LEFT); ?></span>
                                                <span class="vlt-wp__tag"><?php echo htmlspecialchars($featured['year'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                <?php if ($isLocked) : ?><span class="vlt-wp__lock" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg></span><?php else : ?><span class="vlt-wp__media-arrow" aria-hidden="true">&#129146;</span><?php endif; ?>
                                            </div>
                                            <div class="vlt-wp__info">
                                                <?php if (!empty($featured['is_placeholder'])) : ?>
                                                    <span class="vlt-wp__flag">Sample</span>
                                                <?php endif; ?>
                                                <span class="vlt-wp__cat"><?php echo htmlspecialchars($featured['category'], ENT_QUOTES, 'UTF-8'); ?><?php if (!empty($featured['headline_stat'])) : ?> &middot; <?php echo htmlspecialchars($featured['headline_stat'], ENT_QUOTES, 'UTF-8'); ?><?php endif; ?></span>
                                                <h3 class="vlt-wp__title"><?php echo htmlspecialchars($featured['headline'] ?? $featured['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                                <span class="vlt-wp__rule"></span>
                                                <?php if ($isLocked) : ?><span class="vlt-wp__btn vlt-wp__btn--locked" aria-disabled="true">Coming soon</span><?php else : ?><span class="vlt-wp__btn"><?php echo htmlspecialchars($featured['cta'] ?? 'View Case Study', ENT_QUOTES, 'UTF-8'); ?> <span class="vlt-wp__btn-icon">&#129146;</span></span><?php endif; ?>
                                            </div>
                                        </<?php echo $isLocked ? 'div' : 'a'; ?>>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                </div>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Experience-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Experience" data-brightness="dark">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Ken Burn Effect-->
                            <div class="vlt-section__ken-burn-background"><img src="images/bg-1.jpg" alt="" ></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <div class="d-block d-md-flex align-items-center justify-content-between">
                                                <h2 class="h1 has-white-color">Experience</h2>
                                                <div class="vlt-gap-30--sm"></div>
                                                <div class="vlt-timeline-slider-controls"><span class="prev">🡐</span><span class="pagination"></span><span class="next">🡒</span></div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-50"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <!--Timeline Slider-->
                                            <div class="vlt-timeline-slider">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        <!--Timeline Slider Item-->
                                                        <div class="vlt-timeline-item">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-3"><span class="vlt-timeline-item__year">SENIOR PRODUCT DESIGNER <br>AUG 2023 - JUL 2026 <br></span>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3">
                                                                    <h5 class="vlt-timeline-item__title">Visionquest Solutions Private Limited<br>
                                                                        Bangalore, India</h5>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 offset-md-1">

                                                                    <p class="vlt-timeline-item__text">
                                                                        Led end-to-end product design for 5+ SaaS and AI-powered web and mobile applications &mdash; driving discovery, user research, information architecture, wireframing, prototyping, and scalable design system development across FinTech, Healthcare, E-commerce, Enterprise SaaS, Conversational AI, and Productivity domains. <br> <br> Built and maintained reusable design systems and component libraries, reducing UI inconsistencies by 40% and accelerating feature delivery across multiple products. </p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Timeline Slider Item-->
                                                        <div class="vlt-timeline-item">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-3"><span class="vlt-timeline-item__year">PROFESSIONAL 1 APPLICATION DESIGNER <br>APR 2022 - JUL 2023 <br></span>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3">
                                                                    <h5 class="vlt-timeline-item__title">DXC Technology India Pvt Ltd.<br>
                                                                        Bangalore, India</h5>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 offset-md-1">

                                                                    <p class="vlt-timeline-item__text">
                                                                        Led the end-to-end UX redesign and delivery of the Government of Karnataka's eProcurement System &mdash; redesigning 9+ modules and 2,000+ screens while building a scalable, WCAG-compliant design system. <br> <br> Managed a team of 8+ designers, improving design productivity by 30%, and modernized the UX framework, reducing page load times by 50% and improving task completion rates. </p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Timeline Slider Item-->
                                                        <div class="vlt-timeline-item">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-3"><span class="vlt-timeline-item__year">UI/UX DESIGNER <br>SEP 2021 - MAR 2022 <br></span>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3">
                                                                    <h5 class="vlt-timeline-item__title">Inventech Info Solutions Pvt Ltd<br>
                                                                        Bangalore, India</h5>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 offset-md-1">

                                                                    <p class="vlt-timeline-item__text">(Client: DXC Technology)</p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Timeline Slider Item-->
                                                        <div class="vlt-timeline-item">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-3"><span class="vlt-timeline-item__year">UI/UX & GRAPHIC DESIGNER<br>DEC 2020 - AUG 2021 <br></span>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3">
                                                                    <h5 class="vlt-timeline-item__title">Sisesoft IT Solutions,<br>
                                                                        Hosur, India</h5>
                                                                </div>
                                                                <div class="col-sm-12 col-md-5 offset-md-1">

                                                                    <p class="vlt-timeline-item__text">Designed intuitive web and mobile experiences through user research, wireframing, prototyping, and visual design. Collaborated with cross-functional teams to deliver responsive digital products while producing branding, marketing collateral, and visual assets for diverse client projects.</p>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-50"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:200ms; animation-duration:700ms;">
                                            <!--Button--><a class="vlt-btn vlt-btn--primary" href="images/resume/TAMILSELVAN(RESUME-2026).pdf" target="_blank"><span class="vlt-btn__text">Download Resume</span><span class="vlt-btn__icon vlt-btn__icon--right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <polyline points="19 12 12 19 5 12"></polyline>
                                                    </svg></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Services-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Tools" data-brightness="light">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Particles-->
                            <div class="vlt-section__particles">
                                <div class="vlt-particle vlt-custom--1259 vlt-fade-in-right" style="background-image: url(assets/img/root/plus-light-pattern.png); animation-delay: 750ms;"></div>
                                <div class="vlt-particle vlt-custom--2355 vlt-fade-in-left" style="background-image: url(assets/img/root/elipse-light.png); animation-delay: 500ms;"></div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-2 offset-lg-1 d-none d-lg-block">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <!--Counter Up-->
                                            <div class="vlt-counter-up" data-ending-number="5" data-animation-speed="1000" data-delimiter=""><span class="counter">0</span><sup>+</sup>
                                            </div>
                                            <div class="vlt-gap-40"></div>
                                            <h6>Years <br>Designing <br>Digital Products</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <h4>From strategy and discovery to high-fidelity design and developer handoff, I use a modern product design toolkit enhanced by AI to build <span class="has-first-color">scalable, accessible, and user-centered</span> digital products.</h4>
                                        </div>
                                        <div class="vlt-gap-70"></div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:200ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Design &amp; Prototyping</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Figma (Certified)</h5>
                                                        <p>Sketch &middot; Adobe XD</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:300ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">AI-Powered Workflow</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Claude &amp; ChatGPT</h5>
                                                        <p>Gemini &middot; Cursor &middot; Lovable &middot; Google Stitch &middot; Figma Make &middot; MCP</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:400ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Collaboration &amp; Research</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Miro</h5>
                                                        <p>Notion AI &middot; FigJam</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:500ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Adobe Creative Suite</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Adobe Photoshop</h5>
                                                        <p>Adobe Illustrator</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:600ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Usability Testing &amp; Analytics</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Lookback</h5>
                                                        <p>Maze &middot; Hotjar</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:700ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">No-Code &amp; Handoff</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Webflow</h5>
                                                        <p>Zeplin &middot; Framer</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:700ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Front-end Development</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">HTML &middot; CSS &middot; JavaScript</h5>
                                                        <p>Bootstrap</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Capabilities-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Capabilities" data-brightness="dark">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Ken Burn Effect-->
                            <div class="vlt-section__ken-burn-background"><img src="images/attachment-03.jpg" alt=""></div>
                            <div class="vlt-project-showcase-slider d-block d-lg-none">
                                <div class="container">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/capabilities/1.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Strategy</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Product Design &amp; Strategy</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/capabilities/2.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Research</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">User Experience &amp; Research</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/capabilities/3.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Design</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Visual &amp; Interaction Design</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/capabilities/4.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>AI</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">AI &amp; Emerging Technologies</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/capabilities/5.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Systems</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Design Systems</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vlt-project-showcase d-none d-lg-flex">
                                <ul class="vlt-project-showcase__items">
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Product Design &amp; Strategy</a></h3><span class="vlt-project-showcase__item__category">Strategy</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">User Experience &amp; Research</a></h3><span class="vlt-project-showcase__item__category">Research</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Visual &amp; Interaction Design</a></h3><span class="vlt-project-showcase__item__category">Design</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">AI &amp; Emerging Technologies</a></h3><span class="vlt-project-showcase__item__category">AI</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Design Systems</a></h3><span class="vlt-project-showcase__item__category">Systems</span>
                                    </li>

                                </ul>
                                <div class="vlt-project-showcase__images">
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/capabilities/1.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/capabilities/2.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/capabilities/3.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/capabilities/4.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/capabilities/5.jpg" alt=""></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Awards-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Awards" data-brightness="light">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Particles-->
                            <div class="vlt-section__particles">
                                <div class="vlt-particle vlt-custom--2355 vlt-fade-in-left" style="background-image: url(assets/img/root/elipse-light.png); animation-delay: 500ms;"></div>
                            </div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <h4>Professional Awards and Honors <span class="has-first-color">I've Reached.</span></h4>
                                            <div class="vlt-gap-20"></div>
                                            <!--<p>Fowl be so, under sea land, tree fruitful. Man don't<br>given <strong>unto second may</strong> of dominion beginning.</p>-->
                                        </div>
                                        <div class="vlt-gap-50"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <!--Award Item-->
                                            <div class="vlt-award-item">
                                                <div class="vlt-award-item__logo"><a href="#"><img src="images/dxc.png" alt="Honorable mension"></a>
                                                </div>
                                                <div class="vlt-award-item__content">
                                                    <h6>CAMPS AWARD</h6>
                                                    <p>MAY 2023</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-30"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:200ms; animation-duration:700ms;">
                                            <!--Award Item-->
                                            <div class="vlt-award-item">
                                                <div class="vlt-award-item__logo"><a href="#"><img src="images/dxc.png" alt="Site of the day"></a>
                                                </div>
                                                <div class="vlt-award-item__content">
                                                    <h6>COLLABORATION AWARD</h6>
                                                    <p>MARCH 2023</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-30"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:300ms; animation-duration:700ms;">
                                            <!--Award Item-->
                                            <div class="vlt-award-item">
                                                <div class="vlt-award-item__logo"><a href="#"><img src="images/dxc.png" alt="Innovative ideas"></a>
                                                </div>
                                                <div class="vlt-award-item__content">
                                                    <h6>CAMPS AWARD</h6>
                                                    <p>MAY 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-100--md"></div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:400ms; animation-duration:700ms;">
                                            <div class="vlt-slide-photo">
                                                <div class="vlt-slide-photo__inside"><img src="images/44.JPG" alt="">

                                                </div>

                                                <div class="vlt-slide-photo__particle vlt-fade-in-left--small negative-z-index" style="right: -40px; top: -40px; width: 290px; transition-delay: 1.2s;"><img src="assets/img/root/plus-light-pattern.png" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Testimonials-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Testimonials" data-brightness="dark">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Ken Burn Effect-->
                            <div class="vlt-section__ken-burn-background"><img src="images/bg-1.jpg" alt=""></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <div class="d-block d-md-flex align-items-center justify-content-between">
                                                <h2 class="h1 has-white-color">Testimonials</h2>
                                                <div class="vlt-gap-30--sm"></div>
                                                <div class="vlt-testimonial-slider-controls"><span class="prev">🡐</span><span class="pagination"></span><span class="next">🡒</span></div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-50"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <!--Testimonial Slider-->
                                            <div class="vlt-testimonial-slider">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
<?php foreach ($testimonials as $t) : ?>
                                                            <!--Testimonial Item-->
                                                            <div class="vlt-testimonial-item" style="background: #eb000d url(assets/img/root/cartographer.png) repeat;">
                                                                <div class="vlt-testimonial-item__content">
                                                                    <?php if (!empty($t['is_placeholder'])) : ?>
                                                                        <span class="vlt-testimonial-item__flag">Sample</span>
    <?php endif; ?>
                                                                    <p><?php echo htmlspecialchars($t['quote'], ENT_QUOTES, 'UTF-8'); ?></p>
                                                                    <div class="vlt-testimonial-item__meta">
                                                                        <h6><?php echo htmlspecialchars($t['name'], ENT_QUOTES, 'UTF-8'); ?></h6><span><?php echo htmlspecialchars($t['role'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
<?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Education-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Education" data-brightness="light">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Particles-->
                            <div class="vlt-section__particles">
                                <div class="vlt-particle vlt-custom--1259 vlt-fade-in-right" style="background-image: url(assets/img/root/plus-light-pattern.png); animation-delay: 750ms;"></div>
                                <div class="vlt-particle vlt-custom--2355 vlt-fade-in-left" style="background-image: url(assets/img/root/elipse-light.png); animation-delay: 500ms;"></div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <h2 class="h1">Education</h2>
                                            <div class="vlt-gap-20"></div>
                                            <h4>Formal training in computing, sharpened by <span class="has-first-color">specialist UX craft.</span></h4>
                                        </div>
                                        <div class="vlt-gap-50"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:200ms; animation-duration:700ms;">
                                                    <div class="vlt-timeline-item">
                                                        <span class="vlt-timeline-item__year">JUL 2016 - APR 2018</span>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-timeline-item__title">Master of Computer Applications (MCA)</h5>
                                                        <div class="vlt-gap-10"></div>
                                                        <p class="vlt-timeline-item__text">Sacred Heart College<br>Tirupattur, India</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40--sm"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:400ms; animation-duration:700ms;">
                                                    <div class="vlt-timeline-item">
                                                        <span class="vlt-timeline-item__year">AUG 2023 - DEC 2023</span>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-timeline-item__title">Advanced UX/UI Design Bootcamp</h5>
                                                        <div class="vlt-gap-10"></div>
                                                        <p class="vlt-timeline-item__text">Design Boat UX/UI School<br>Bangalore, India</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40--sm"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Contact-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Contact" data-brightness="dark">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <!--Ken Burn Effect-->
                            <div class="vlt-section__ken-burn-background"><img src="images/attachment-05.jpg" alt=""></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <h2 class="h1 has-white-color">Contact</h2>
                                            <div class="vlt-gap-20"></div>
                                            <p class="has-gray-color">I will be more than happy to answer any of your questions or talk to you.</p>
                                            <div class="vlt-gap-50"></div>
                                            <div class="has-white-color">
                                                <h6 class="vlt-display-1 has-gray-color">Email:</h6>
                                                <div class="vlt-gap-5"></div><a href="mailto:info.tamilsoft@gmail.com">info.tamilsoft@gmail.com</a>
                                            </div>
                                            <div class="vlt-gap-30"></div>
                                            <div class="has-white-color">
                                                <h6 class="vlt-display-1 has-gray-color">Phone:</h6>
                                                <div class="vlt-gap-5"></div><a href="tel:+919786688777">+91 97866 88777</a>
                                            </div>
                                            <div class="vlt-gap-30"></div>
                                            <div class="has-white-color">
                                                <h6 class="vlt-display-1 has-gray-color">Location:</h6>
                                                <div class="vlt-gap-5"></div>Krishnagiri, Tamilnadu, India
                                            </div>
                                            <div class="vlt-gap-40"></div>
<!--                                            <a class="vlt-btn vlt-btn--secondary" href="#"><span class="vlt-btn__text">Get direction</span><span class="vlt-btn__icon vlt-btn__icon--right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                                    <circle cx="12" cy="10" r="3" /></svg></span></a>-->
                                        </div>
                                        <div class="vlt-gap-70--sm"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <h5 class="has-white-color">I am always looking for great collaborators. Let’s message me and make <span class="has-first-color">something together!</span></h5>
                                            <div class="vlt-gap-40"></div>
                                            <form class="vlt-contact-form" novalidate="novalidate">
                                                <div class="vlt-form-row two-col">
                                                    <div class="vlt-form-group">
                                                        <label class="has-white-color" for="name">Your name (required)</label>
                                                        <input type="text" id="name" name="name" required="required" placeholder="Your Name">
                                                    </div>
                                                    <div class="vlt-form-group">
                                                        <label class="has-white-color" for="email">Your email (required)</label>
                                                        <input type="email" id="email" name="email" required="required" placeholder="Your Email">
                                                    </div>
                                                </div>
                                                <!--<div class="vlt-form-row two-col">-->
                                                <!--    <div class="vlt-form-group">-->
                                                <!--        <label class="has-white-color" for="category">Mobile (optional)</label>-->
                                                <!--        <input type="text" id="category" name="category" placeholder="Category">-->
                                                <!--    </div>-->
                                                <!--    <div class="vlt-form-group">-->
                                                <!--        <label class="has-white-color" for="budget">Choose a Budget</label>-->
                                                <!--        <select id="budget" name="budget">-->
                                                <!--            <option value="500-1000">$500 - $1000</option>-->
                                                <!--            <option value="1000-10000">$1000 - $10 000</option>-->
                                                <!--            <option value="10000+">$10 000 +</option>-->
                                                <!--        </select>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="vlt-form-group">
                                                    <label class="has-white-color" for="message">Your Message</label>
                                                    <textarea name="message" id="message" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <div class="message success">Your message is successfully sent...</div>
                                                <div class="message danger">Sorry, that didn&rsquo;t send &mdash; please email me directly at <a href="mailto:info.tamilsoft@gmail.com">info.tamilsoft@gmail.com</a></div>
                                                <!--Button-->
                                                <button class="vlt-btn vlt-btn--primary"><span class="vlt-btn__text">Contact Me</span><span class="vlt-btn__icon vlt-btn__icon--right"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Progress Bar-->
                <ul class="vlt-fullpage-slider-progress-bar">
                    <li data-menuanchor="Home"></li>
                    <li data-menuanchor="About"></li>
                    <li data-menuanchor="Work"></li>
                    <li data-menuanchor="Experience"></li>
                    <li data-menuanchor="Tools"></li>
                    <li data-menuanchor="Capabilities"></li>
                    <li data-menuanchor="Awards"></li>
                    <li data-menuanchor="Testimonials"></li>
                    <li data-menuanchor="Education"></li>
                    <li data-menuanchor="Contact"></li>
                </ul>
                <!--Numbers-->
                <div class="vlt-fullpage-slider-numbers"></div>
            </div>
            <!--Footer-->
            <footer class="vlt-footer vlt-footer--fixed">
                <!--Copyright-->
                <div class="vlt-footer-copyright">
                    <p>&copy; TAMILSOFT <?php echo date("Y"); ?> Copyright.<br>All rights reserved.</p>
                </div>
            </footer>
        </main>
        <!--Libs-->
        <!--Site bundle: jQuery, theme plugins, helpers and controllers in load order-->
        <script src="assets/scripts/app.js"></script>
        <!--Content protection. Inlined rather than fetched: at 3.6 KB the
            request costs more than the bytes, and it is the only script the
            case-study pages need at all.-->
        <script>
            /**
             * Content protection — deters casual copying of the portfolio work.
             *
             * Scope, honestly stated: this raises the effort bar for a casual visitor. It is
             * not a security control and cannot be one. view-source:, curl, the DevTools menu
             * item, Save Page, print-to-PDF and disabling JS all bypass every line below, and
             * any image on the page has already been downloaded to the visitor's machine.
             *
             * Configure via the two lists at the top rather than editing the handlers.
             */
            (function () {
                'use strict';
            
                /**
                 * Text inside these stays selectable.
                 *
                 * Your own contact details are here on purpose: a client who cannot copy your
                 * email address just leaves. Blocking selection here would cost you leads to
                 * protect nothing — the address is in the page source regardless.
                 * Empty this string if you want the page locked with no exceptions.
                 */
                var SELECTABLE = '.vlt-navbar-contacts, .vlt-offcanvas-menu__copyright, a[href^="mailto:"], a[href^="tel:"], [data-selectable]';
            
                /** Right-click stays available on form fields, or paste/spellcheck break. */
                var CONTEXT_ALLOWED = 'input, textarea, select, [contenteditable="true"]';
            
                function isAllowed(target, selector) {
                    return selector !== '' && target instanceof Element && target.closest(selector) !== null;
                }
            
                /* --- Right click ----------------------------------------------------- */
            
                document.addEventListener('contextmenu', function (e) {
                    if (isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
                    e.preventDefault();
                });
            
                /* --- Text selection -------------------------------------------------- */
            
                document.addEventListener('selectstart', function (e) {
                    if (isAllowed(e.target, SELECTABLE) || isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
                    e.preventDefault();
                });
            
                ['copy', 'cut'].forEach(function (type) {
                    document.addEventListener(type, function (e) {
                        if (isAllowed(e.target, SELECTABLE) || isAllowed(e.target, CONTEXT_ALLOWED)) {
                            return;
                        }
                        e.preventDefault();
                    });
                });
            
                /* --- Image dragging -------------------------------------------------- */
            
                document.addEventListener('dragstart', function (e) {
                    if (e.target instanceof Element && e.target.matches('img')) {
                        e.preventDefault();
                    }
                });
            
                /* --- Keyboard shortcuts ---------------------------------------------- */
            
                document.addEventListener('keydown', function (e) {
                    if (isAllowed(e.target, CONTEXT_ALLOWED)) {
                        return;
                    }
            
                    var key = (e.key || '').toLowerCase();
                    var ctrl = e.ctrlKey || e.metaKey;
            
                    // F12 — the browser owns this one; preventDefault often will not stop it.
                    if (key === 'f12') {
                        e.preventDefault();
                        return;
                    }
            
                    if (ctrl && e.shiftKey && (key === 'i' || key === 'j' || key === 'c')) {
                        e.preventDefault();
                        return;
                    }
            
                    // u = view source, s = save page, a = select all, p = print, c = copy
                    if (ctrl && (key === 'u' || key === 's' || key === 'a' || key === 'p' || key === 'c')) {
                        e.preventDefault();
                    }
                });
            
                /* --- Flag for CSS ---------------------------------------------------- */
            
                // Set from JS, not hardcoded in the HTML, so that with JS disabled the page
                // stays selectable rather than being unusable and still unprotected.
                document.documentElement.classList.add('is-protected');
            
            }());
        </script>
    </body>

</html><?php
    return ob_get_clean();
}

/* ==========================================================================
   Static-site generator
   ========================================================================== */

/**
 * The templates link to each other as PHP so they can be previewed through a
 * server; the published files are static. Rewrite those links on the way out.
 */
function static_links(string $html): string
{
    return strtr($html, [
        'href="index.php#'   => 'href="./#',
        'href="index.php"'   => 'href="./"',
        'href="projects.php"' => 'href="projects"',
    ]);
}

/** work.php?p=slug becomes work-slug — one rewrite per project. */
function static_work_links(string $html, array $slugs): string
{
    foreach ($slugs as $slug) {
        $html = str_replace('href="work.php?p=' . rawurlencode($slug) . '"', 'href="work-' . $slug . '"', $html);
    }
    return $html;
}

if (PHP_SAPI === 'cli') {
    $root  = dirname(__DIR__);
    $slugs = array_keys(projects_data());
    $wrote = [];

    $pages = ['index.html' => render_index(), 'projects.html' => render_projects()];
    // Locked projects get no page: the case study is unfinished, and an
    // unlinked file is still a file someone can find.
    foreach (projects_data() as $slug => $project) {
        if (!empty($project['locked'])) { continue; }
        $pages['work-' . $slug . '.html'] = render_work($slug);
    }

    foreach ($pages as $file => $html) {
        $html = static_work_links(static_links($html), $slugs);
        file_put_contents($root . '/' . $file, $html);
        $wrote[] = sprintf('  %-44s %6.1f KB', $file, strlen($html) / 1024);
    }

    echo "Regenerated " . count($wrote) . " pages:\n" . implode("\n", $wrote) . "\n";
}