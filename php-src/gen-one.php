<?php
/**
 * Static-page generator — renders ONE page per invocation so work.php (which
 * declares functions) is never included twice in a process.
 *
 * Usage:  php gen-one.php __index__
 *         php gen-one.php <project-slug>
 *
 * index.php and work.php must be copied into the site root before running, so
 * their __DIR__-relative require of data/ resolves. This script removes nothing;
 * the caller cleans up the root copies.
 */

declare(strict_types=1);

$root = 'C:/xampp/htdocs/WEBSITE';
chdir($root);

$slugs = [
    'karnataka-eprocurement',
    'enterprise-design-system',
    'fintech-lending-platform',
    'healthcare-patient-portal',
    'conversational-ai-assistant',
    'industrial-monitoring-platform',
    'team-productivity-suite',
    'ecommerce-checkout',
];

function transform(string $h, array $slugs): string
{
    foreach ($slugs as $s) {
        $h = str_replace("work.php?p=$s", "work-$s", $h);
    }
    $h = str_replace('href="projects.php"', 'href="projects"', $h);
    $h = str_replace(['href="index.php#', 'href="index.php"'], ['href="./#', 'href="./"'], $h);
    $h = str_replace('TAMILSOFT ' . date('Y'), 'TAMILSOFT <span class="js-year">' . date('Y') . '</span>', $h);
    $h = str_replace('    </body>', '        <script>document.querySelectorAll(".js-year").forEach(function(el){el.textContent=(new Date).getFullYear();});</script>' . "\n    </body>", $h);
    return $h;
}

$what = $argv[1] ?? '';

if ($what === '__index__') {
    ob_start();
    include "$root/index.php";
    $h = ob_get_clean();
    file_put_contents("$root/index.html", transform($h, $slugs));
    echo "wrote index.html (" . strlen($h) . " bytes)\n";
} elseif ($what === '__projects__') {
    ob_start();
    include "$root/projects.php";
    $h = ob_get_clean();
    file_put_contents("$root/projects.html", transform($h, $slugs));
    echo "wrote projects.html (" . strlen($h) . " bytes)\n";
} elseif (in_array($what, $slugs, true)) {
    $_GET['p'] = $what;
    ob_start();
    include "$root/work.php";
    $h = ob_get_clean();
    file_put_contents("$root/work-$what.html", transform($h, $slugs));
    echo "wrote work-$what.html (" . strlen($h) . " bytes)\n";
} else {
    fwrite(STDERR, "unknown target: $what\n");
    exit(1);
}
