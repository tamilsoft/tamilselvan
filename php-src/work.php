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

/** An image with a real src, or a sized placeholder frame carrying its caption. */
function figure(array $image): string
{
    $ratio   = e($image['ratio'] ?? '16x9');
    $caption = e($image['caption'] ?? '');
    $src     = trim((string) ($image['src'] ?? ''));

    $inner = $src !== ''
        ? '<img src="' . e($src) . '" alt="' . $caption . '" loading="lazy">'
        : '<div class="cs-figure__placeholder"><span class="cs-figure__placeholder-mark"></span><span class="cs-figure__placeholder-label">' . $caption . '</span></div>';

    return '<figure class="cs-figure cs-figure--' . $ratio . '">'
         . '<div class="cs-figure__frame">' . $inner . '</div>'
         . ($caption !== '' ? '<figcaption class="cs-figure__caption">' . $caption . '</figcaption>' : '')
         . '</figure>';
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

/** Persona archetype cards — user TYPES, not invented individuals. */
function personas(array $people): string
{
    $out = '<div class="cs-personas">';
    foreach ($people as $p) {
        $out .= '<article class="cs-persona">'
              . '<div class="cs-persona__head">'
              . '<span class="cs-persona__avatar" aria-hidden="true"></span>'
              . '<div><h3 class="cs-persona__name">' . e($p['name']) . '</h3>'
              . (!empty($p['context']) ? '<p class="cs-persona__context">' . e($p['context']) . '</p>' : '')
              . '</div></div>';
        foreach ([['Goals', $p['goals'] ?? []], ['Frustrations', $p['frustrations'] ?? []]] as [$label, $items]) {
            if ($items) {
                $out .= '<div class="cs-persona__group"><h4 class="cs-persona__label">' . e($label) . '</h4><ul>';
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

/**
 * Style-guide showcase. The type specimen uses the site's real font; the tokens
 * are illustrative of what the design system encoded, labelled as such rather
 * than presented as an exact reproduction of the shipped palette.
 */
function styleguide(array $sg): string
{
    $out = '<div class="cs-styleguide">';

    if (!empty($sg['type'])) {
        $out .= '<div class="cs-sg-type"><span class="cs-sg-type__specimen">Aa</span><div class="cs-sg-type__rows">';
        foreach ($sg['type'] as $row) {
            $out .= '<div class="cs-sg-type__row"><span style="font-size:' . e($row['size']) . '">' . e($row['label']) . '</span><span class="cs-sg-type__meta">' . e($row['meta']) . '</span></div>';
        }
        $out .= '</div></div>';
    }

    if (!empty($sg['swatches'])) {
        $out .= '<div class="cs-sg-swatches">';
        foreach ($sg['swatches'] as $sw) {
            $out .= '<div class="cs-sg-swatch"><span class="cs-sg-swatch__chip" style="background:' . e($sw['hex']) . '"></span><span class="cs-sg-swatch__name">' . e($sw['name']) . '</span><span class="cs-sg-swatch__hex">' . e($sw['hex']) . '</span></div>';
        }
        $out .= '</div>';
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
                <a class="cs-navbar__back" href="index.php#Work">
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
                    <?php echo figure([
                        'src'     => $project['hero_image'] ?? '',
                        'caption' => $project['hero_caption'] ?? '',
                        'ratio'   => '21x9',
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
                    <?php if (!empty($project['stats'])) : ?>
                        <div class="cs-gap"></div>
                        <?php echo stats_grid($project['stats']); ?>
                    <?php endif; ?>
                </div>
            </section>
            <?php endif; ?>

            <!--Chapters-->
            <?php foreach ($project['sections'] as $section) : ?>
            <section class="cs-section" id="section-<?php echo e($section['number']); ?>">
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

                    <?php if (!empty($section['styleguide'])) : ?>
                        <?php echo styleguide($section['styleguide']); ?>
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
                        <div class="cs-gallery cs-gallery--<?php echo count($section['images']) > 1 ? 'split' : 'full'; ?>">
                            <?php foreach ($section['images'] as $image) : ?>
                                <?php echo figure($image); ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </section>
            <?php endforeach; ?>

            <!--Next-->
            <section class="cs-cta">
                <div class="cs-container">
                    <h2 class="cs-cta__title">Interested in the detail behind this?</h2>
                    <p class="cs-cta__text">I&rsquo;m happy to walk through the process, the trade-offs and the parts that didn&rsquo;t work first time.</p>
                    <div class="cs-cta__actions">
                        <a class="vlt-btn vlt-btn--primary" href="index.php#Contact"><span class="vlt-btn__text">Get in touch</span></a>
                        <a class="cs-cta__secondary" href="index.php#Work">View all work</a>
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
