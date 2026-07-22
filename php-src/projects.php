<?php
/**
 * All-projects index. Renders every entry in data/projects.php, so adding a
 * project to that file automatically appears here — no markup to maintain.
 *
 * Uses the case-study design system (case-study.css) rather than the fullpage
 * slider, because this is a normal scrolling page like the case studies.
 */

declare(strict_types=1);

$projects = require __DIR__ . '/data/projects.php';

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$total = count($projects);
$realCount = count(array_filter($projects, static fn(array $p): bool => empty($p['is_placeholder'])));
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title>All Projects — Tamilselvan Madhu</title>
        <meta name="description" content="Every case study and project by Tamilselvan Madhu — product design across Government, FinTech, Healthcare, Enterprise SaaS and Conversational AI.">
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
                    <p class="cs-hero__subtitle">Product design across Government, FinTech, Healthcare, Enterprise SaaS, Industrial SaaS, Conversational AI, Productivity and E&#8209;commerce.</p>
                </div>
            </section>

            <!--Grid-->
            <section class="cs-section" id="projects">
                <div class="cs-container">
                    <div class="cs-projects">
                        <?php $i = 0; foreach ($projects as $slug => $p) : $i++; ?>
                        <a class="cs-project" href="work.php?p=<?php echo urlencode($slug); ?>">
                            <div class="cs-project__media">
                                <!-- Loaded eagerly on purpose: lazy images proved unreliable in this
                                     project, and 8 modest images are a trivial payload for a work index. -->
                                <img src="<?php echo e($p['card_image']); ?>" alt="<?php echo e($p['title'] . ' — project preview'); ?>">
                                <span class="cs-project__num"><?php echo str_pad((string) $i, 2, '0', STR_PAD_LEFT); ?></span>
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
                                <span class="cs-project__cta"><?php echo e($p['cta'] ?? 'View Case Study'); ?> <span class="cs-project__cta-icon">&#129146;</span></span>
                            </div>
                        </a>
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
                <p>&copy; TAMILSOFT <?php echo date('Y'); ?> Copyright. All rights reserved.</p>
            </div>
        </footer>

        <script src="assets/scripts/content-protection.js"></script>

    </body>
</html>
