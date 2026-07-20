These are the PHP source files the static HTML was generated from (Jul 2026).

- index.php / work.php  -> rendered to index.html and the five work-*.html pages.
- ../data/projects.php and ../data/testimonials.php are the content source they read.
- handler.php stays in the site root: the contact form posts to it and email
  sending needs server-side code - it cannot be HTML.

To regenerate after editing the data files: move index.php and work.php back to
the site root, reload the pages once through Apache, and re-run the conversion
(or just ask Claude to do it).
