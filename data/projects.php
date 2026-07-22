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
            'Duration' => 'Apr 2022 — Jul 2023',
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

Between April 2022 and July 2023 at DXC Technology, I led the end-to-end UX redesign and delivery of the platform: more than 2,000 screens across 9+ modules, rebuilt on a scalable, WCAG-compliant design system, with a team of 8+ designers.',

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
                'images' => [
                    ['src' => '', 'caption' => 'Audit of the legacy modules', 'ratio' => '16x9'],
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
                'images' => [
                    ['src' => '', 'caption' => 'User research — the department–bidder cycle and what each side procures', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '05',
                'title'  => 'Who we designed for',
                'lead'   => 'Two sides of one marketplace — the departments that publish, and the bidders who supply.',
                'body'   => 'Three personas came out of the research: two on the bidder side, where the needs differ sharply between a proprietor supplying goods and a consultant supplying manpower, and one on the department side. The bidder personas pull toward clarity and assistance; the department persona pulls toward control, evaluation and risk. Every goal and frustration below is taken from the research deliverable rather than written for this page.',
                'personas' => [
                    [
                        'name'       => 'Preetha',
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
                        'name'       => 'Praveen',
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
                        'name'       => 'Jaya Sree',
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
                        'user' => 'Preetha — Bidder, goods',
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
                        'user' => 'Praveen — Bidder, services',
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
                        'user' => 'Jaya Sree — Department',
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
                'images' => [
                    ['src' => '', 'caption' => 'Persona cards — two bidder profiles and one department profile', 'ratio' => '16x9'],
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
                'images' => [
                    ['src' => '', 'caption' => 'Empathy map — supplier, single bid cycle', 'ratio' => '16x9'],
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
                'images' => [
                    ['src' => '', 'caption' => 'Journey map — supplier bid submission, end to end', 'ratio' => '16x9'],
                ],
            ],
            [
                'number' => '08',
                'title'  => 'Information architecture',
                'lead'   => 'One entry point, two entirely different systems behind it.',
                'body'   => 'Sign-in is the hinge the whole architecture turns on. A supplier who authenticates lands in a system organised around responding — bids, queries, documents, bills. A department user lands in one organised around originating: catalogue, estimate, tender, contract, in that order, repeated across each of the four procurement categories.

That repetition is the most important property of the structure. Goods, Works, Service and Auction each run the same four-stage spine, which is what made a single component library viable across 2,000+ screens — the same tender-creation pattern serves all four rather than four variants of it. Accounts sits underneath both sides, because EMD and fees are the one concern that spans every category and both roles.',
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
                'images' => [
                    ['src' => '', 'caption' => 'Flow set — bid submission and evaluation paths', 'ratio' => '16x9'],
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
                'images' => [
                    ['src' => '', 'caption' => 'The redesigned platform in use across web and mobile', 'ratio' => '16x9'],
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
                'images' => [
                    ['src' => '', 'caption' => 'The team behind the delivery', 'ratio' => '16x9'],
                ],
            ],
        ],

        /* ----------------------------------------------------------------
           Closing panel. Links are the site's own contact route plus the
           profiles already used elsewhere on the site.
           ---------------------------------------------------------------- */
        'closing' => [
            'title' => 'Thank you for reading.',
            'text'  => 'This project ran for fifteen months and touched most of what I care about in this craft — scale, constraint, accessibility and a team. I am glad to talk through any part of it in more detail.',
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
