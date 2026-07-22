<?php
declare(strict_types=1);

$projects = require __DIR__ . '/data/projects.php';

$slug = (string) ($_GET['p'] ?? '');

// Unknown slug is a real 404 rather than an empty page, so search engines don't
// index placeholder URLs and visitors get an honest dead end.
if (!isset($projects[$slug])) {
    http_response_code(404);
    $project = null;
} else {
    $project = $projects[$slug];
}

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
 * One visual per section — a real export, or a reserved frame holding its place.
 *
 * The empty state is deliberately designed rather than left as a grey void: it
 * states the shot it is waiting for, so the page reads as a case study with its
 * art direction planned rather than one with broken images. Filling in 'src' in
 * the data file swaps the frame for the real thing with no other change.
 */
function figure(array $image): string
{
    $ratio   = e($image['ratio'] ?? '16x9');
    $caption = e($image['caption'] ?? '');
    $src     = trim((string) ($image['src'] ?? ''));

    if ($src !== '') {
        // The hero sits above the fold and is the largest contentful paint on the
        // page — deferring it delays the very thing the visitor is waiting for.
        // Everything further down stays lazy.
        $eager = !empty($image['eager']);
        $inner = '<img src="' . e($src) . '" alt="' . $caption . '"'
               . ($eager ? ' fetchpriority="high"' : ' loading="lazy"') . '>';
    } else {
        $inner = '<div class="cs-figure__reserved">'
               . '<span class="cs-figure__reserved-frame" aria-hidden="true"></span>'
               . '<span class="cs-figure__reserved-label">' . $caption . '</span>'
               . '<span class="cs-figure__reserved-note">Visual to follow</span>'
               . '</div>';
    }

    // Dense artwork — a grid of ten screens, a full sitemap — becomes unreadable
    // once scaled into the column, so it can opt into opening at full size.
    // The frame becomes a link rather than a plain div; everything else is same.
    if ($src !== '' && !empty($image['zoom'])) {
        $frame = '<a class="cs-figure__frame cs-figure__frame--zoom" href="' . e($src) . '"'
               . ' target="_blank" rel="noopener" aria-label="' . $caption . ' — open full size">'
               . $inner
               . '<span class="cs-figure__zoom" aria-hidden="true">View full size &#8599;</span>'
               . '</a>';
    } else {
        $frame = '<div class="cs-figure__frame">' . $inner . '</div>';
    }

    return '<figure class="cs-figure cs-figure--' . $ratio . ($src === '' ? ' cs-figure--reserved' : '') . '">'
         . $frame
         . ($caption !== '' && $src !== '' ? '<figcaption class="cs-figure__caption">' . $caption . '</figcaption>' : '')
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
 * Journey map. Each stage is a column on wide screens and a stacked card on
 * mobile, so the row labels are repeated per stage rather than living in a
 * left-hand column that would be lost when the table collapses.
 */
function journey_map(array $stages): string
{
    $moods = ['low' => 'Low', 'neutral' => 'Steady', 'critical' => 'Highest risk'];

    $out = '<div class="cs-journey">';
    foreach ($stages as $i => $s) {
        $mood = $s['mood'] ?? 'neutral';
        $out .= '<div class="cs-journey__stage cs-journey__stage--' . e($mood) . '">'
              . '<div class="cs-journey__head">'
              . '<span class="cs-journey__step">' . str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) . '</span>'
              . '<h3 class="cs-journey__title">' . e($s['stage']) . '</h3>'
              . '</div>'
              . '<p class="cs-journey__action">' . e($s['action']) . '</p>'
              . '<p class="cs-journey__thought">' . e($s['thought']) . '</p>'
              . '<div class="cs-journey__row"><span class="cs-journey__label">Pain point</span><p>' . e($s['pain']) . '</p></div>'
              . '<div class="cs-journey__row"><span class="cs-journey__label">Opportunity</span><p>' . e($s['chance']) . '</p></div>'
              . '<div class="cs-journey__mood"><span class="cs-journey__mood-dot" aria-hidden="true"></span>' . e($moods[$mood] ?? 'Steady') . '</div>'
              . '</div>';
    }
    return $out . '</div>';
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
 * The source diagrams route a lot of reconvergence arrows around each other. A
 * faithful pixel copy of that routing would be fragile in CSS and no clearer, so
 * this renders the logic instead: a spine of steps, decisions that name both
 * outcomes, and the parallel category routes drawn as columns.
 */
function user_flow(array $flow): string
{
    $out = '<div class="cs-uf">'
         . '<div class="cs-uf__head"><span class="cs-uf__actor">' . e($flow['actor']) . '</span>'
         . (!empty($flow['summary']) ? '<p>' . e($flow['summary']) . '</p>' : '')
         . '</div><div class="cs-uf__body">';

    foreach ($flow['steps'] as $step) {
        switch ($step['type'] ?? 'step') {

            case 'terminator':
                $out .= '<div class="cs-uf__terminator cs-uf__terminator--' . e($step['kind'] ?? 'start') . '">'
                      . e($step['title']) . '</div>';
                break;

            case 'decision':
                $out .= '<div class="cs-uf__decision">'
                      // Inner span exists to be counter-rotated: without an
                      // element to target, the label inherits the 45deg and
                      // reads diagonally.
                      . '<span class="cs-uf__diamond"><span>' . e($step['title']) . '</span></span>'
                      . '<div class="cs-uf__answers">';
                foreach ($step['answers'] as $a) {
                    $out .= '<div class="cs-uf__answer cs-uf__answer--' . strtolower($a['answer']) . '">'
                          . '<span class="cs-uf__badge">' . e($a['answer']) . '</span>'
                          . '<span class="cs-uf__answer-text">' . e($a['goes']) . '</span>'
                          . '</div>';
                }
                $out .= '</div></div>';
                break;

            case 'parallel':
                $out .= '<div class="cs-uf__parallel">';
                if (!empty($step['title'])) {
                    $out .= '<span class="cs-uf__parallel-label">' . e($step['title']) . '</span>';
                }
                $out .= '<div class="cs-uf__tracks">';
                foreach ($step['tracks'] as $track) {
                    $out .= '<div class="cs-uf__track cs-uf__track--' . e($track['tone']) . '">'
                          . '<span class="cs-uf__track-label">' . e($track['label']) . '</span>';
                    foreach ($track['steps'] as $s) {
                        $out .= '<span class="cs-uf__track-step">' . e($s) . '</span>';
                    }
                    $out .= '</div>';
                }
                $out .= '</div></div>';
                break;

            default:
                $out .= '<div class="cs-uf__step">' . e($step['title']) . '</div>';
        }
    }

    return $out . '</div></div>';
}

/**
 * Flow diagram.
 *
 * Rebuilt in markup rather than shipped as a flat image so it stays legible on a
 * phone, is selectable and searchable, and can be corrected without re-exporting.
 * Branches are columns on wide screens and stack on narrow ones; the connectors
 * are drawn in CSS, so nothing here depends on a fixed canvas size.
 */
function flow_diagram(array $flow): string
{
    $out = '<div class="cs-flow">';

    if (!empty($flow['start'])) {
        $out .= '<div class="cs-flow__start">' . e($flow['start']) . '</div>';
    }

    $out .= '<div class="cs-flow__branches">';

    foreach ($flow['branches'] as $branch) {
        $out .= '<div class="cs-flow__branch">';

        if (!empty($branch['label'])) {
            $out .= '<div class="cs-flow__label">' . e($branch['label']) . '</div>';
        }

        foreach ($branch['steps'] as $step) {
            $type = $step['type'] ?? 'step';

            if ($type === 'decision') {
                $out .= '<div class="cs-flow__decision">'
                      . '<span class="cs-flow__decision-title"><span>' . e($step['title']) . '</span></span>'
                      . '<div class="cs-flow__options">';
                foreach ($step['options'] as $opt) {
                    $out .= '<span class="cs-flow__option">' . e($opt) . '</span>';
                }
                $out .= '</div></div>';
                continue;
            }

            if ($type === 'end') {
                $out .= '<div class="cs-flow__end">' . e($step['title']) . '</div>';
                continue;
            }

            $out .= '<div class="cs-flow__node">'
                  . '<div class="cs-flow__node-head">'
                  . (!empty($step['num']) ? '<span class="cs-flow__num">' . e($step['num']) . '</span>' : '')
                  . '<span class="cs-flow__node-title">' . e($step['title']) . '</span>'
                  . '</div>';

            if (!empty($step['items'])) {
                $out .= '<ul class="cs-flow__items">';
                foreach ($step['items'] as $item) {
                    $out .= '<li>' . e($item) . '</li>';
                }
                $out .= '</ul>';
            }

            $out .= '</div>';
        }

        $out .= '</div>';
    }

    return $out . '</div></div>';
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
 * Rendered as a two-column row per pair rather than two separate lists, so the
 * eye reads across from a frustration to the thing that answered it. Two lists
 * would leave the reader matching them up by position, which is exactly the
 * work this section exists to do for them.
 */
function needs_grid(array $groups): string
{
    $out = '<div class="cs-needs">';

    foreach ($groups as $g) {
        $out .= '<section class="cs-needs__group">'
              . '<h3 class="cs-needs__user">' . e($g['user']) . '</h3>'
              . '<div class="cs-needs__head" aria-hidden="true">'
              . '<span class="cs-needs__head-label cs-needs__head-label--problem">Problem</span>'
              . '<span class="cs-needs__head-label cs-needs__head-label--solution">What we shipped</span>'
              . '</div>';

        foreach ($g['pairs'] as $pair) {
            $out .= '<div class="cs-needs__pair">'
                  . '<div class="cs-needs__cell cs-needs__cell--problem">'
                  . '<span class="cs-needs__tag">Problem</span>'
                  . '<p>' . e($pair['problem']) . '</p>'
                  . '</div>'
                  . '<span class="cs-needs__arrow" aria-hidden="true">&#129146;</span>'
                  . '<div class="cs-needs__cell cs-needs__cell--solution">'
                  . '<span class="cs-needs__tag">What we shipped</span>'
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


$pageTitle = $project
    ? $project['title'] . ' — Case Study | Tamilselvan Madhu'
    : 'Project not found | Tamilselvan Madhu';
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
        <link rel="stylesheet" href="assets/fonts/Manrope/style.css">
        <link rel="stylesheet" href="assets/fonts/Gilroy/style.css">
        <link rel="stylesheet" href="assets/fonts/Inter/style.css">
        <link rel="stylesheet" href="assets/css/vlt-main.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="assets/css/case-study.css">
    </head>

    <body class="cs-body">

        <!--Reading progress-->
        <div class="cs-progress" aria-hidden="true"><span></span></div>

        <?php if ($project !== null && !empty($project['sections'])) : ?>
        <!--Chapter rail-->
        <nav class="cs-rail" aria-label="Chapters">
            <?php foreach ($project['sections'] as $railSection) : ?>
            <a href="#section-<?php echo e($railSection['number']); ?>" title="<?php echo e($railSection['title']); ?>"><?php echo e($railSection['number']); ?></a>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>

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
                <p>&copy; TAMILSOFT <?php echo date('Y'); ?> Copyright. All rights reserved.</p>
            </div>
        </footer>

        <script>
        /* Reading progress bar + active chapter in the rail. */
        (function () {
            'use strict';

            var bar = document.querySelector('.cs-progress span');
            var links = [].slice.call(document.querySelectorAll('.cs-rail a'));
            var sections = [].slice.call(document.querySelectorAll('.cs-section[id]'));

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
                    links.forEach(function (a) {
                        a.classList.toggle('is-active', current !== null && a.getAttribute('href') === '#' + current);
                    });
                }
            };

            window.addEventListener('scroll', onScroll, { passive: true });
            document.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        }());
        </script>
        <script src="assets/scripts/content-protection.js"></script>

    </body>
</html>
