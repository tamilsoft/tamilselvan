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
