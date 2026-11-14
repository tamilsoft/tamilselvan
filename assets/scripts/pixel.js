/**
 * pixel.js — Albus, the site's design bot, plus interaction effects.
 *
 * The bot was first called Pixel; file names, the px- CSS prefix and
 * window.PIXEL_CONFIG keep that name. Only what visitors see says Albus.
 *
 * An add-on layer over the existing theme. It reads the page (the pagepiling
 * sections, the hero heading, the work cards) and decorates it; it never
 * changes the theme's own markup or styles. Delete this file and pixel.css to
 * remove all of it.
 *
 * Albus is scripted: every answer below is written from this site's own
 * content. There is no AI service and nothing leaves the browser.
 */
(function () {
    'use strict';

    var EMAIL = 'info.tamilsoft@gmail.com';
    var RESUME = 'images/resume/TAMILSELVAN(RESUME-2026).pdf';
    var LINKEDIN = 'https://www.linkedin.com/in/tamilselvan-madhu-8116ba178/';
    var CASE_URL = 'work-karnataka-eprocurement.html';

    /*
     * Per-page settings. The homepage needs none: everything below defaults to
     * it. Other pages (case studies) set window.PIXEL_CONFIG before this file
     * loads — build.php writes it from the project data:
     *   page      'case'
     *   greet     first-visit greeting
     *   offset    px to clear sticky headers when scrolling to a section
     *   hero / heroWord / heroHost   heading to animate, word to frame, cursor area
     *   tilt / countUp / frames      selectors for those effects
     *   tour      [[target, line], ...]
     *   intents   [{id, chip, keys, answer, target}, ...] — tried before the generic ones
     * Sections narrate themselves through a data-px-say attribute.
     */
    var CFG = window.PIXEL_CONFIG || {};
    var PAGE = CFG.page || 'home';

    /* ------------------------------------------------------------------ */
    /* Content                                                             */
    /* ------------------------------------------------------------------ */

    // What Albus says when each slide comes into view.
    var NARRATION = {
        Home: 'Hi! This is Tamilselvan — Senior Product Designer. Scroll, or ask me anything.',
        About: 'Rules first, rectangles second. That\'s the whole philosophy.',
        Work: 'Five case files: what was asked, and what was really solved. Hover one — I have opinions.',
        Experience: 'Four teams, one question: how do we make this simpler?',
        Tools: 'Figma-certified, and fluent in the AI tools too.',
        Capabilities: 'Strategy, research, design, AI and systems — five ways he can help.',
        Awards: 'Two CAMPS awards and a Collaboration award. Not bad at all.',
        Education: 'Trained in computing, retrained in craft: an MCA, then a UX/UI bootcamp.',
        Contact: 'Last stop! Ask for a walkthrough — or ask me and I\'ll copy the email.'
    };

    // Reactions when the pointer lands on a work card (matched on the card text).
    var CARD_REACTIONS = [
        [/tendering/i, '2,000+ screens, 9+ modules, one design system. This is the big one.'],
        [/invest/i, 'Trackk — AI insight for first-time investors. Case study coming soon.'],
        [/astrolog/i, '1.1M+ downloads, in four languages!'],
        [/vault/i, 'Safebox — rated 4.9★ on the App Store.'],
        [/phone/i, 'An AI that makes phone calls for you. I\'m a little jealous.']
    ];

    var TOUR = CFG.tour || [
        ['Home', 'Welcome to the tour! Tamilselvan turns complex systems into effortless products.'],
        ['About', 'He starts with the rules — the law, the permissions, the language — not the rectangles.'],
        ['Work', 'Five case files: government, fintech, consumer and AI. What was asked vs. what was solved.'],
        ['Experience', 'Visionquest, DXC Technology, Inventech and Sisesoft.'],
        ['Tools', 'Figma for craft, Claude and Cursor for speed.'],
        ['Capabilities', 'Five capability areas, from strategy to systems.'],
        ['Contact', 'That\'s the tour! Want me to copy the email?']
    ];

    var PROJECTS = [
        { t: 'Karnataka eProcurement', s: '2,000+ screens · Government', href: CASE_URL },
        { t: 'Trackk', s: 'AI investing app · FinTech' },
        { t: 'AstroLokal', s: '1.1M+ downloads · Consumer' },
        { t: 'Safebox', s: '4.9★ App Store · FinTech' },
        { t: 'hiRobin', s: 'AI call assistant · Voice' }
    ];

    // Intents: keywords that trigger them, and what Albus does.
    var INTENTS = [
        { id: 'tour', chip: 'Take the tour', brand: true, keys: ['tour', 'show me around', 'walk'], run: function () { startTour(); return 'Starting the tour! Scroll or press Esc anytime to stop.'; } },
        { id: 'work', home: true, chip: 'Show me the work', keys: ['work', 'project', 'portfolio', 'case'], run: function () { go('Work'); return { html: 'Here are the five projects — tap one:', cards: true }; } },
        { id: 'best', home: true, chip: 'Best project?', keys: ['best', 'best project', 'favourite project', 'favorite project', 'biggest', 'eprocurement', 'karnataka', 'government', 'proud'], run: function () { return 'The Karnataka eProcurement System: 2,000+ screens, 9+ modules, one WCAG-compliant design system, and a team of 8+ designers. Pages load 50% faster. <a href="' + CASE_URL + '">Read the case study →</a>'; } },
        { id: 'what', chip: 'What does he design?', keys: ['what do', 'what does', 'who is', 'about him', 'tell me about him', 'role', 'domain', 'industr', 'specialis', 'specializ'], run: function () { return 'Products that feel effortless — B2B, B2C and B2G, across FinTech, Healthcare, Enterprise SaaS, Government and Conversational AI. Research and IA through to design systems.'; } },
        { id: 'ai', chip: 'How does he use AI?', keys: ['ai', 'ai skill', 'artificial', 'claude', 'chatgpt', 'gemini', 'cursor', 'prompt', 'mcp'], run: function () { return 'Every day — Claude, ChatGPT, Gemini, Cursor, Figma Make and MCP for research, prototyping and code. And as a design material: Trackk and hiRobin are both AI products.'; } },
        { id: 'exp', home: true, chip: 'Experience', keys: ['experience', 'company', 'companies', 'job', 'career', 'dxc', 'visionquest', 'years'], run: function () { go('Experience'); return '5+ years: Visionquest (Senior Product Designer), DXC Technology, Inventech and Sisesoft. I\'ve moved the page there for you.'; } },
        { id: 'tools', home: true, chip: 'Tools', keys: ['tool', 'figma', 'software', 'stack', 'miro'], run: function () { go('Tools'); return 'Figma (certified), Claude, ChatGPT, Cursor, Miro, Notion, Maze, Hotjar, Webflow, Framer, Adobe CC — and enough HTML, CSS and JS to build prototypes.'; } },
        { id: 'ds', home: true, chip: 'Design systems?', keys: ['system', 'component', 'token', 'library', 'wcag', 'access'], run: function () { return 'A speciality. He built the WCAG-compliant system behind 2,000+ eProcurement screens, and component libraries at Visionquest that cut UI inconsistencies by 40%.'; } },
        { id: 'edu', home: true, chip: 'Education', keys: ['education', 'degree', 'study', 'college', 'mca', 'bootcamp'], run: function () { go('Education'); return 'Master of Computer Applications from Sacred Heart College, Tirupattur, plus an Advanced UX/UI Design Bootcamp at Design Boat, Bangalore.'; } },
        { id: 'email', chip: 'Copy email', brand: true, keys: ['email', 'mail', 'contact', 'reach', 'hire', 'available', 'talk'], run: function () { copy(EMAIL); return 'Copied <b>' + EMAIL + '</b> to your clipboard. He replies fastest by email — or try <a href="' + LINKEDIN + '" target="_blank" rel="noopener">LinkedIn</a>.'; } },
        { id: 'resume', chip: 'Résumé', keys: ['resume', 'résumé', 'cv', 'pdf'], run: function () { return 'Here you go: <a href="' + RESUME + '" target="_blank" rel="noopener">Download the 2026 résumé →</a>'; } },
        { id: 'pixel', chip: 'Who are you?', keys: ['who are you', 'who is albus', 'what is albus', 'albus', 'pixel', 'bot', 'robot', 'you'], run: function () { mood('happy', 1600); return 'I\'m Albus — a little scripted bot. I only know what\'s on this page, but I know it well. Try one of the buttons below, or “copy email”.'; } },
        { id: 'hi', keys: ['hi', 'hello', 'hey', 'vanakkam', 'namaste'], run: function () { wave(); return 'Hello! 👋 Ask me about his work, experience, tools — or say “tour”.'; } },
        { id: 'thanks', keys: ['thank', 'thanks', 'cool', 'nice', 'great', 'awesome'], run: function () { mood('happy', 1800); return 'Anytime! 😊'; } }
    ];

    // Off the homepage, drop intents that steer the homepage slider, and put
    // the page's own intents first (they win ties in match()).
    if (PAGE !== 'home') {
        var generic = INTENTS.filter(function (it) { return !it.home; });
        INTENTS = generic.filter(function (it) { return it.id === 'tour'; })
            .concat((CFG.intents || []).map(function (c) {
                return {
                    id: c.id, chip: c.chip, keys: c.keys || [],
                    run: function () { if (c.target) go(c.target); return c.answer; }
                };
            }))
            .concat(generic.filter(function (it) { return it.id !== 'tour'; }));
    }

    /* ------------------------------------------------------------------ */
    /* Helpers                                                             */
    /* ------------------------------------------------------------------ */

    var doc = document, root = doc.documentElement;
    function $(s, r) { return (r || doc).querySelector(s); }
    function $$(s, r) { return Array.prototype.slice.call((r || doc).querySelectorAll(s)); }
    function el(tag, cls, html) { var e = doc.createElement(tag); if (cls) e.className = cls; if (html != null) e.innerHTML = html; return e; }
    function store(k, v) { try { if (v === undefined) return localStorage.getItem(k); localStorage.setItem(k, v); } catch (e) { return null; } }
    function session(k, v) { try { if (v === undefined) return sessionStorage.getItem(k); sessionStorage.setItem(k, v); } catch (e) { return null; } }
    var finePointer = matchMedia('(hover: hover) and (pointer: fine)').matches;

    var still = store('px-still') ? store('px-still') === '1' : matchMedia('(prefers-reduced-motion: reduce)').matches;
    root.classList.toggle('px-still', still);

    /* ---------- Sound: tiny synthesised blips, off by default ---------- */
    var sound = store('px-sound') === '1', ac = null;
    function blip(f, d) {
        if (!sound) return;
        try {
            ac = ac || new (window.AudioContext || window.webkitAudioContext)();
            var o = ac.createOscillator(), g = ac.createGain(), t = ac.currentTime, dur = d || 0.1;
            o.type = 'sine'; o.frequency.setValueAtTime(f || 660, t);
            o.frequency.exponentialRampToValueAtTime((f || 660) * 1.25, t + dur);
            g.gain.setValueAtTime(0.0001, t);
            g.gain.exponentialRampToValueAtTime(0.05, t + 0.01);
            g.gain.exponentialRampToValueAtTime(0.0001, t + dur);
            o.connect(g); g.connect(ac.destination); o.start(t); o.stop(t + dur + 0.02);
        } catch (e) { /* audio is optional */ }
    }

    /* ------------------------------------------------------------------ */
    /* The bot                                                             */
    /* ------------------------------------------------------------------ */

    /*
     * Albus in pixel art: a 12×12 grid drawn with crisp edges, so every unit is
     * one hard pixel at any size (48px on the page = 4px per pixel).
     *   rows 0–1 antenna · 2–9 head (visor 3–7) · 10–11 legs
     * Moods swap whole pixel groups (px-alt--*) rather than morphing shapes,
     * and walking alternates two leg frames (px-la / px-lb).
     */
    function botSVG() {
        return '<svg class="px-bot" viewBox="0 0 12 12" shape-rendering="crispEdges" aria-hidden="true" focusable="false">' +
            '<g class="px-ant"><rect class="px-bulb" x="5" y="0" width="2" height="1" fill="#ffd84d"/><rect x="5" y="1" width="2" height="1" fill="#5a171b"/></g>' +
            '<rect x="0" y="5" width="1" height="3" fill="#9a262d"/>' +
            '<rect class="px-ear-r" x="11" y="5" width="1" height="3" fill="#9a262d"/>' +
            '<g class="px-arm"><rect x="11" y="3" width="1" height="4" fill="#9a262d"/><rect x="11" y="2" width="1" height="1" fill="#ffd84d"/></g>' +
            '<rect x="1" y="2" width="10" height="8" fill="#c3323a"/>' +
            '<rect x="2" y="2" width="7" height="1" fill="#d9555c"/>' +
            '<rect x="1" y="9" width="10" height="1" fill="#9a262d"/>' +
            '<rect x="2" y="3" width="8" height="5" fill="#1a1a1a"/>' +
            '<rect class="px-eye" x="3" y="4" width="2" height="2" fill="#fff"/>' +
            '<rect class="px-eye" x="7" y="4" width="2" height="2" fill="#fff"/>' +
            '<g class="px-eyes"><rect class="px-pupil" x="4" y="5" width="1" height="1" fill="#1a1a1a"/><rect class="px-pupil" x="8" y="5" width="1" height="1" fill="#1a1a1a"/></g>' +
            '<rect class="px-mouth" x="5" y="6" width="2" height="1" fill="#fff"/>' +
            '<g class="px-alt px-alt--happy" fill="#fff"><rect x="2" y="5" width="1" height="1"/><rect x="3" y="4" width="1" height="1"/><rect x="4" y="5" width="1" height="1"/><rect x="7" y="5" width="1" height="1"/><rect x="8" y="4" width="1" height="1"/><rect x="9" y="5" width="1" height="1"/></g>' +
            '<g class="px-alt px-alt--sleep" fill="#fff"><rect x="3" y="5" width="2" height="1"/><rect x="7" y="5" width="2" height="1"/></g>' +
            '<rect class="px-alt px-alt--o" x="5" y="6" width="2" height="2" fill="#fff"/>' +
            '<rect x="2" y="8" width="1" height="1" fill="#e98a8f"/><rect x="9" y="8" width="1" height="1" fill="#e98a8f"/>' +
            '<g class="px-la" fill="#5a171b"><rect x="3" y="10" width="1" height="2"/><rect x="8" y="10" width="1" height="2"/><rect x="2" y="11" width="1" height="1"/><rect x="9" y="11" width="1" height="1"/></g>' +
            '<g class="px-lb" fill="#5a171b"><rect x="4" y="10" width="1" height="2"/><rect x="7" y="10" width="1" height="2"/><rect x="5" y="11" width="1" height="1"/><rect x="6" y="11" width="1" height="1"/></g>' +
            '<text class="px-zzz" x="9.6" y="1.4" font-size="2.6" font-family="monospace" font-weight="700" fill="#ffd84d">z</text>' +
            '<text class="px-zzz" x="10.8" y="0" font-size="2" font-family="monospace" font-weight="700" fill="#ffd84d">z</text>' +
            '</svg>';
    }

    var moodT, bots;
    function mood(m, ms) {
        bots = bots || $$('.px-bot');
        clearTimeout(moodT);
        bots.forEach(function (b) { b.classList.remove('is-happy', 'is-wow', 'is-sleep'); if (m) b.classList.add('is-' + m); });
        if (ms) moodT = setTimeout(function () { mood(null); }, ms);
    }
    function pulse(cls, ms) {
        bots = bots || $$('.px-bot');
        bots.forEach(function (b) { b.classList.remove(cls); void b.getBoundingClientRect(); b.classList.add(cls); });
        setTimeout(function () { bots.forEach(function (b) { b.classList.remove(cls); }); }, ms);
    }
    function wave() { pulse('is-wave', 1600); blip(720); }
    function hop() { pulse('is-hop', 600); }
    var talkT;
    function talk(text) {
        bots = bots || $$('.px-bot');
        clearTimeout(talkT);
        bots.forEach(function (b) { b.classList.add('is-talk'); });
        talkT = setTimeout(function () { bots.forEach(function (b) { b.classList.remove('is-talk'); }); }, Math.min(2600, 40 * String(text).length));
    }

    /* ---------- Build the dock, chat, grid and toast --------------------- */

    // The dock now only carries Albus's speech bubble; the walker moves it
    // every frame so the bubble rides above his head.
    var dock = el('div', 'px-dock');
    dock.innerHTML =
        '<div class="px-bubble" role="status" aria-live="polite"><button class="px-bubble__x" aria-label="Dismiss">×</button><span class="px-bubble__k">Albus</span><span class="px-bubble__t"></span><div class="px-bubble__act"></div>' +
        '<svg class="px-ring" viewBox="0 0 100 4" preserveAspectRatio="none" aria-hidden="true"><rect class="px-ring__arc" x="0" y="0" width="100" height="4" fill="#c3323a"/></svg></div>';
    doc.body.appendChild(dock);

    // Albus himself: a button, so he is reachable by keyboard and opens the chat.
    var walker = el('button', 'px-walker');
    walker.type = 'button';
    walker.setAttribute('aria-label', 'Albus, the site\'s design bot — open the chat');
    walker.setAttribute('aria-haspopup', 'dialog');
    walker.innerHTML = botSVG();
    doc.body.appendChild(walker);

    var chat = el('div', 'px-chat');
    chat.setAttribute('role', 'dialog');
    chat.setAttribute('aria-label', 'Chat with Albus');
    chat.innerHTML =
        '<div class="px-chat__head">' + botSVG() +
        '<div class="px-chat__who"><b>Albus</b><small><i></i>design bot · knows this page</small></div>' +
        '<div class="px-chat__tools">' +
        '<button class="px-icon" data-act="sound" aria-pressed="false" title="Sound">♪</button>' +
        '<button class="px-icon" data-act="motion" aria-pressed="false" title="Reduce motion">◐</button>' +
        '<button class="px-icon" data-act="close" aria-label="Close chat">×</button></div></div>' +
        '<div class="px-chat__log" aria-live="polite"></div>' +
        '<div class="px-chat__chips"></div>' +
        '<form class="px-chat__form" autocomplete="off"><input type="text" placeholder="Ask about work, tools, AI…" aria-label="Ask Albus a question" maxlength="120"><button type="submit" aria-label="Send">➤</button></form>';
    doc.body.appendChild(chat);

    var grid = el('div', 'px-grid', '<div class="px-grid__cols">' + new Array(13).join('<i></i>') + '</div><span class="px-grid__label">12 columns · 30px gutter · press G to hide</span>');
    grid.setAttribute('aria-hidden', 'true');
    doc.body.appendChild(grid);

    var toastEl = el('div', 'px-toast');
    toastEl.setAttribute('role', 'status');
    doc.body.appendChild(toastEl);
    function toast(t) { toastEl.textContent = t; toastEl.classList.add('is-in'); clearTimeout(toast.t); toast.t = setTimeout(function () { toastEl.classList.remove('is-in'); }, 2200); }

    bots = $$('.px-bot');

    // Keep the theme's fullpage slider from hijacking scroll/keys inside our UI.
    [dock, chat, walker].forEach(function (box) {
        ['wheel', 'mousewheel', 'DOMMouseScroll', 'touchstart', 'touchmove', 'keydown', 'keyup'].forEach(function (ev) {
            box.addEventListener(ev, function (e) { e.stopPropagation(); }, { passive: true });
        });
    });

    /* ---------- Eyes follow the pointer ---------------------------------- */
    var eyeRaf = 0, pX = innerWidth / 2, pY = innerHeight / 2;
    // Pixel eyes: each pupil sits in the lower-inner corner of a 2×2 eye and
    // can shift one whole pixel left or up — four positions, no sub-pixels.
    // A walker facing left is mirrored, so "left" flips for him.
    function aimEyes() {
        eyeRaf = 0;
        bots.forEach(function (b) {
            var r = b.getBoundingClientRect();
            if (!r.width) return;
            var dx = pX - (r.left + r.width / 2), dy = pY - (r.top + r.height * 0.45);
            if (b.closest('.px-walker') && walk.dir < 0) dx = -dx;
            var ux = dx < -r.width * 0.3 ? -1 : 0, uy = dy < -r.height * 0.3 ? -1 : 0;
            $('.px-eyes', b).style.transform = 'translate(' + ux + 'px,' + uy + 'px)';
        });
    }
    addEventListener('pointermove', function (e) { pX = e.clientX; pY = e.clientY; if (!eyeRaf) eyeRaf = requestAnimationFrame(aimEyes); }, { passive: true });

    /* ---------- Speech bubble -------------------------------------------- */
    var bubble = $('.px-bubble', dock), bubbleT = $('.px-bubble__t', dock), bubbleK = $('.px-bubble__k', dock), bubbleAct = $('.px-bubble__act', dock), hideT, quietUntil = 0;
    function say(text, opt) {
        opt = opt || {};
        if (chat.classList.contains('is-open') && !opt.force) return;
        if (Date.now() < quietUntil && !opt.force) return;
        bubbleT.innerHTML = text;
        bubbleK.textContent = opt.k || 'Albus';
        bubbleAct.innerHTML = '';
        (opt.actions || []).forEach(function (a) {
            var b = el('button', a.ghost ? 'px-ghost' : '', a.label);
            b.addEventListener('click', function () { hideBubble(); a.run(); });
            bubbleAct.appendChild(b);
        });
        bubble.classList.add('is-in');
        talk(text);
        // Stop walking long enough to read.
        if (typeof walk !== 'undefined') walk.pause(Math.min(3200, 900 + 22 * String(text).length));
        blip(560, 0.08);
        clearTimeout(hideT);
        hideT = setTimeout(hideBubble, opt.ttl || (opt.actions ? 12000 : 6500));
    }
    function hideBubble() { bubble.classList.remove('is-in'); }
    $('.px-bubble__x', dock).addEventListener('click', function () { hideBubble(); quietUntil = Date.now() + 20000; });

    /* ------------------------------------------------------------------ */
    /* Slides: which one is showing, and moving between them               */
    /* ------------------------------------------------------------------ */

    // Homepage slides narrate from NARRATION; any other element narrates from
    // its own data-px-say attribute.
    var sections = $$('.vlt-section[data-anchor], [data-px-say]');
    var current = null;
    function keyOf(s) { return s.getAttribute('data-anchor') || s.id; }
    function lineFor(key) {
        for (var i = 0; i < sections.length; i++) {
            if (keyOf(sections[i]) === key) return sections[i].getAttribute('data-px-say') || NARRATION[key];
        }
        return NARRATION[key];
    }
    // A target is a homepage slide name ("Work") or a selector ("#section-06").
    function go(target) {
        if (!target) return;
        if (/^[#.\[]/.test(target)) {
            var t = $(target);
            if (!t) return;
            // A section folded inside a <details> must open first, or there is nothing to see.
            var d = t.closest && t.closest('details');
            if (d) d.open = true;
            var y = t.getBoundingClientRect().top + (window.pageYOffset || root.scrollTop) - (CFG.offset || 0);
            window.scrollTo({ top: Math.max(0, y), behavior: still ? 'auto' : 'smooth' });
            return;
        }
        var jq = window.jQuery;
        if (jq && jq.fn && jq.fn.pagepiling && jq.fn.pagepiling.moveTo && $('.pp-section')) {
            jq.fn.pagepiling.moveTo(target);
        } else {
            var s = $('[data-anchor="' + target + '"]');
            if (s) s.scrollIntoView({ behavior: still ? 'auto' : 'smooth' });
        }
    }
    function onSection(anchor) {
        if (!anchor || anchor === current) return;
        current = anchor;
        if (touring || sleeping) return;
        var line = lineFor(anchor);
        if (line) say(line);
    }
    function activeAnchor() {
        var a = $('.vlt-section.active[data-anchor]');
        return a ? a.getAttribute('data-anchor') : null;
    }
    if (window.MutationObserver) {
        var mo = new MutationObserver(function () { var a = activeAnchor(); if (a) onSection(a); });
        sections.forEach(function (s) { mo.observe(s, { attributes: true, attributeFilter: ['class'] }); });
    }
    // Fallback for a page without the slider: watch what scrolls into view.
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (es) {
            es.forEach(function (e) { if (e.isIntersecting && !$('.pp-section')) onSection(keyOf(e.target)); });
        }, { rootMargin: '-45% 0px -45% 0px' });
        sections.forEach(function (s) { io.observe(s); });
    }

    /* ---------- Guided tour --------------------------------------------- */
    var touring = false, tourTimers = [], ringArc = $('.px-ring__arc', dock);
    function startTour() {
        stopTour(true);
        touring = true; dock.classList.add('is-touring'); closeChat(); wave();
        TOUR.forEach(function (stop, i) {
            tourTimers.push(setTimeout(function () {
                go(stop[0]);
                // Once the page has scrolled there, Albus hops onto that section.
                setTimeout(function () { perchIn(stop[0]); }, 900);
                setTimeout(function () {
                    say(stop[1], {
                        force: true, k: 'Tour · ' + (i + 1) + ' of ' + TOUR.length, ttl: 5600,
                        actions: i === TOUR.length - 1 ? [{ label: 'Copy email', run: function () { copy(EMAIL); } }, { label: 'Done', ghost: true, run: function () {} }] : null
                    });
                }, 1500);
                ringArc.setAttribute('width', String(100 * (i + 1) / TOUR.length));
                blip(520 + i * 50);
                if (i === TOUR.length - 1) tourTimers.push(setTimeout(function () { stopTour(true); mood('happy', 2000); }, 6500));
            }, i * 6800));
        });
    }
    function stopTour(quiet) {
        if (!touring) return;
        touring = false; dock.classList.remove('is-touring');
        tourTimers.forEach(clearTimeout); tourTimers = [];
        ringArc.setAttribute('width', '0');
        if (!quiet) say('Tour stopped. Explore freely — I\'m right here.', { force: true });
    }
    // The visitor taking the wheel ends the tour.
    ['wheel', 'touchstart'].forEach(function (ev) { addEventListener(ev, function () { if (touring) stopTour(); }, { passive: true }); });

    /* ------------------------------------------------------------------ */
    /* Chat                                                                */
    /* ------------------------------------------------------------------ */

    var log = $('.px-chat__log', chat), chips = $('.px-chat__chips', chat), form = $('.px-chat__form', chat), input = $('input', form), greeted = false;

    function addMsg(html, who) {
        var m = el('div', 'px-msg px-msg--' + who, html);
        log.appendChild(m);
        log.scrollTop = log.scrollHeight;
        return m;
    }
    function botReply(result) {
        var m = addMsg('<span class="px-typing"><i></i><i></i><i></i></span>', 'bot');
        setTimeout(function () {
            var html = typeof result === 'string' ? result : result.html;
            m.innerHTML = html;
            if (result && result.cards) {
                var box = el('div', 'px-cards');
                PROJECTS.forEach(function (p) {
                    var b = el('button', '', '<b>' + p.t + '</b><span>' + p.s + (p.href ? ' · case study →' : ' · coming soon') + '</span>');
                    b.addEventListener('click', function () { if (p.href) location.href = p.href; else { go('Work'); toast(p.t + ': case study coming soon'); } });
                    box.appendChild(b);
                });
                m.appendChild(box);
            }
            log.scrollTop = log.scrollHeight;
            talk(m.textContent);
            blip(820, 0.07);
        }, still ? 60 : 650);
    }
    // Each intent scores the total length of its keys found in the question.
    // Keys match at the start of a word ("tool" finds "tools"); keys of three
    // letters or fewer must be whole words, so "hi" never fires on "his".
    var keyRe = {};
    function hasKey(s, k) {
        if (!keyRe[k]) {
            var esc = k.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            keyRe[k] = new RegExp('(^|\\s)' + esc + (k.length <= 3 ? '(\\s|$)' : ''));
        }
        return keyRe[k].test(s);
    }
    function match(q) {
        var s = q.toLowerCase().replace(/[^\w\s'éè]/g, ' ').replace(/\s+/g, ' ').trim();
        var best = null, top = 0;
        INTENTS.forEach(function (it) {
            var score = 0;
            it.keys.forEach(function (k) { if (hasKey(s, k)) score += k.length; });
            if (score > top) { best = it; top = score; }
        });
        return best;
    }
    function ask(text, intent) {
        addMsg(text.replace(/</g, '&lt;'), 'me');
        blip(600, 0.06);
        var it = intent || match(text);
        if (!it) {
            mood('wow', 1200);
            botReply('Hmm, that\'s outside what I know — I only know this page. Try one of the buttons below, or ask him directly: <a href="mailto:' + EMAIL + '">' + EMAIL + '</a>');
            return;
        }
        botReply(it.run());
    }
    INTENTS.forEach(function (it) {
        if (!it.chip) return;
        var b = el('button', 'px-chip' + (it.brand ? ' px-chip--brand' : ''), it.chip);
        b.type = 'button';
        b.addEventListener('click', function () { ask(it.chip, it); });
        chips.appendChild(b);
    });
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        var v = input.value.trim();
        if (!v) return;
        input.value = '';
        ask(v);
    });

    var lastFocus = null;
    function openChat() {
        stopTour(true); hideBubble();
        lastFocus = doc.activeElement;
        chat.classList.add('is-open'); dock.style.visibility = 'hidden';
        if (!greeted) {
            greeted = true;
            addMsg(CFG.chatHello || 'Hi! I\'m Albus 👋 Tamilselvan\'s design bot. Ask me anything about his work — or tap a button.', 'bot');
        }
        wave();
        setTimeout(function () { if (finePointer) input.focus(); else $('.px-chip', chips).focus(); }, 250);
    }
    function closeChat() {
        if (!chat.classList.contains('is-open')) return;
        chat.classList.remove('is-open'); dock.style.visibility = '';
        if (lastFocus && lastFocus.focus) lastFocus.focus();
    }
    walker.addEventListener('click', function () { walk.pause(1200); hop(); openChat(); });

    // Header controls
    var soundBtn = $('[data-act="sound"]', chat), motionBtn = $('[data-act="motion"]', chat);
    function syncTools() {
        soundBtn.setAttribute('aria-pressed', String(sound));
        soundBtn.title = sound ? 'Sound on' : 'Sound off';
        motionBtn.setAttribute('aria-pressed', String(still));
        motionBtn.title = still ? 'Motion reduced' : 'Reduce motion';
    }
    syncTools();
    soundBtn.addEventListener('click', function () { sound = !sound; store('px-sound', sound ? '1' : '0'); syncTools(); blip(880); toast(sound ? 'Sound on' : 'Sound off'); });
    motionBtn.addEventListener('click', function () { still = !still; store('px-still', still ? '1' : '0'); root.classList.toggle('px-still', still); syncTools(); toast(still ? 'Motion reduced' : 'Motion on'); });
    $('[data-act="close"]', chat).addEventListener('click', closeChat);

    /* ---------- Clipboard ----------------------------------------------- */
    // Modern clipboard first, the old textarea trick second; if both are
    // blocked, show the address so it can be copied by hand. Never navigates.
    function copy(text) {
        function done() { toast('Email copied — talk soon!'); mood('happy', 1800); blip(990); }
        function legacy() {
            var t = el('textarea'); t.value = text; t.setAttribute('readonly', '');
            t.style.position = 'fixed'; t.style.opacity = '0'; t.style.pointerEvents = 'none';
            doc.body.appendChild(t); t.select();
            var ok = false;
            try { ok = doc.execCommand('copy'); } catch (e) { ok = false; }
            doc.body.removeChild(t);
            if (ok) done(); else toast('Email: ' + text);
        }
        if (navigator.clipboard && window.isSecureContext) navigator.clipboard.writeText(text).then(done, legacy);
        else legacy();
    }

    /* ------------------------------------------------------------------ */
    /* Interaction effects                                                 */
    /* ------------------------------------------------------------------ */

    /* ---------- Hero heading: letters + a Figma selection frame --------- */
    var h1 = $(CFG.hero || '.vlt-section[data-anchor="Home"] h1');
    var heroWord = new RegExp(CFG.heroWord || 'effortless', 'i');
    if (h1) {
        var label = h1.innerHTML.replace(/<br\s*\/?>/gi, ' ').replace(/<[^>]+>/g, '').replace(/\s+/g, ' ').trim();
        var frag = doc.createDocumentFragment();
        var sel = null;
        Array.prototype.slice.call(h1.childNodes).forEach(function (node) {
            if (node.nodeType !== 3) { frag.appendChild(node.cloneNode(true)); return; }
            node.textContent.split(/(\s+)/).forEach(function (word) {
                if (!word) return;
                if (/^\s+$/.test(word)) { frag.appendChild(doc.createTextNode(' ')); return; }
                var isSel = !sel && heroWord.test(word);
                var w = el('span', isSel ? 'px-sel' : '');
                w.style.display = 'inline-block';
                w.innerHTML = word.split('').map(function (c) { return '<span class="px-letter">' + c + '</span>'; }).join('');
                if (isSel) {
                    sel = w;
                    w.insertAdjacentHTML('beforeend', '<span class="px-sel__box"><i></i><i></i><i></i><i></i></span><span class="px-sel__tag">Text · Heading/XL</span><span class="px-sel__dim">0 × 0</span>');
                }
                frag.appendChild(w);
            });
        });
        h1.innerHTML = '';
        h1.appendChild(frag);
        h1.setAttribute('aria-label', label);
        $$('span', h1).forEach(function (s) { s.setAttribute('aria-hidden', 'true'); });
        if (sel) {
            var dim = $('.px-sel__dim', sel);
            var measure = function () { var r = sel.getBoundingClientRect(); dim.textContent = Math.round(r.width) + ' × ' + Math.round(r.height); };
            setTimeout(function () { sel.classList.add('is-on'); measure(); }, 1400);
            addEventListener('resize', measure);
        }

        /* Multiplayer-style cursor drifting over the hero */
        var host = h1.closest(CFG.heroHost || '.vlt-section__content');
        if (host && finePointer) {
            if (getComputedStyle(host).position === 'static') host.style.position = 'relative';
            var cur = el('div', 'px-cursor', '<svg width="18" height="20" viewBox="0 0 18 20"><path d="M1 1l15 8-7 2-3 7z" fill="#7a3cf0" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"/></svg><span>Tamil</span>');
            cur.setAttribute('aria-hidden', 'true');
            host.appendChild(cur);
            var targets = [sel || h1, h1, $('.vlt-link', host), $('.vlt-counter-up-small', host), $('.vlt-hero-subtitle', host), $('.cs-hero__subtitle', host), $('.cs-hero__meta', host)].filter(Boolean), ti = 0;
            var moveCur = function () {
                if (still || doc.hidden) return;
                if (PAGE === 'home' ? (current && current !== 'Home') : host.getBoundingClientRect().bottom < 0) return;
                var hr = host.getBoundingClientRect(), r = targets[ti++ % targets.length].getBoundingClientRect();
                cur.style.transform = 'translate(' + (r.left - hr.left + r.width * (0.4 + Math.random() * 0.4)) + 'px,' + (r.top - hr.top + r.height * 0.75) + 'px)';
            };
            setTimeout(moveCur, 1200);
            setInterval(moveCur, 2600);
        }
    }

    /* ---------- Work cards: tilt, glare, and Albus's reaction ------------ */
    $$('.vlt-wp__card' + (CFG.tilt ? ', ' + CFG.tilt : '')).forEach(function (card) {
        var text = card.textContent;
        card.classList.add('px-tilt');
        if (getComputedStyle(card).position === 'static') card.style.position = 'relative';
        var glare = el('span', 'px-glare');
        card.appendChild(glare);
        card.addEventListener('pointermove', function (e) {
            if (still || e.pointerType !== 'mouse') return;
            var r = card.getBoundingClientRect(), x = (e.clientX - r.left) / r.width, y = (e.clientY - r.top) / r.height;
            card.classList.add('is-tilting');
            card.style.transform = 'perspective(900px) rotateY(' + ((x - 0.5) * 8).toFixed(2) + 'deg) rotateX(' + ((0.5 - y) * 8).toFixed(2) + 'deg) translateY(-4px)';
            glare.style.background = 'radial-gradient(circle at ' + (x * 100) + '% ' + (y * 100) + '%, rgba(255,255,255,.55), transparent 55%)';
        });
        card.addEventListener('pointerleave', function () { card.classList.remove('is-tilting'); card.style.transform = ''; });
        var reacted = 0;
        card.addEventListener('pointerenter', function () {
            if (touring || Date.now() - reacted < 8000) return;
            for (var i = 0; i < CARD_REACTIONS.length; i++) {
                if (CARD_REACTIONS[i][0].test(text)) { reacted = Date.now(); mood('wow', 1400); say(CARD_REACTIONS[i][1], { ttl: 4500 }); break; }
            }
        });
    });

    /* ---------- Magnetic buttons ---------------------------------------- */
    if (finePointer) {
        $$('.vlt-btn, .vlt-link, .px-pill').forEach(function (b) {
            b.addEventListener('pointermove', function (e) {
                if (still) return;
                var r = b.getBoundingClientRect();
                b.style.translate = ((e.clientX - r.left - r.width / 2) * 0.2).toFixed(1) + 'px ' + ((e.clientY - r.top - r.height / 2) * 0.3).toFixed(1) + 'px';
            });
            b.addEventListener('pointerleave', function () { b.style.translate = ''; });
            b.style.transition = (b.style.transition ? b.style.transition + ', ' : '') + 'translate .35s cubic-bezier(.34,1.56,.64,1)';
        });
    }

    /* ---------- Click sparks -------------------------------------------- */
    var SPARK = ['#c3323a', '#ffd84d', '#ffffff', '#2e7bf6'];
    addEventListener('pointerdown', function (e) {
        if (still || !Element.prototype.animate || e.button !== 0) return;
        if (e.target.closest && e.target.closest('.px-chat, input, textarea')) return;
        for (var i = 0; i < 8; i++) {
            var s = el('span', 'px-spark'), a = (Math.PI * 2 * i) / 8 + Math.random() * 0.5, d = 18 + Math.random() * 22;
            s.style.left = (e.clientX - 3) + 'px'; s.style.top = (e.clientY - 3) + 'px';
            s.style.background = SPARK[i % SPARK.length];
            doc.body.appendChild(s);
            s.animate([{ transform: 'translate(0,0) scale(1) rotate(0)', opacity: 1 }, { transform: 'translate(' + Math.cos(a) * d + 'px,' + Math.sin(a) * d + 'px) scale(.2) rotate(180deg)', opacity: 0 }], { duration: 520 + Math.random() * 200, easing: 'cubic-bezier(.05,.7,.1,1)' }).onfinish = (function (n) { return function () { n.remove(); }; })(s);
        }
    }, { passive: true });

    /* ---------- Keyboard: G for grid, Esc to close ---------------------- */
    addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { closeChat(); stopTour(); return; }
        if (e.target.closest && e.target.closest('input, textarea, [contenteditable="true"]')) return;
        if ((e.key === 'g' || e.key === 'G') && !e.ctrlKey && !e.metaKey && !e.altKey) {
            var on = grid.classList.toggle('is-on');
            blip(on ? 520 : 390);
            say(on ? 'That\'s the 12-column grid holding everything up. Press G again to hide it.' : 'Grid hidden. Still there, still working.', { force: true, ttl: 3500 });
        }
        if (touring && /Arrow|Page|Home|End| /.test(e.key)) stopTour();
    });

    /* ---------- Idle: Albus dozes off, wakes on activity ----------------- */
    var sleeping = false, idleT;
    function resetIdle() {
        clearTimeout(idleT);
        if (sleeping) {
            sleeping = false; mood(null); hop();
            if (!chat.classList.contains('is-open')) say('Oh! I\'m up. Where were we?', { ttl: 3000 });
        }
        idleT = setTimeout(function () {
            if (touring || chat.classList.contains('is-open') || doc.hidden) return resetIdle();
            sleeping = true; hideBubble(); mood('sleep');
        }, 40000);
    }
    ['pointermove', 'keydown', 'wheel', 'touchstart'].forEach(function (ev) { addEventListener(ev, resetIdle, { passive: true }); });
    resetIdle();

    /* ---------- Page buttons that talk to Albus (Contact card) ----------- */
    // Any element with data-px="copy-email" or data-px="open-chat" works.
    doc.addEventListener('click', function (e) {
        var t = e.target.closest && e.target.closest('[data-px]');
        if (!t) return;
        if (t.getAttribute('data-px') === 'open-chat') { openChat(); return; }
        if (t.getAttribute('data-px') === 'copy-email') {
            copy(t.getAttribute('data-email') || EMAIL);
            var lbl = $('span', t);
            t.classList.add('is-done');
            if (lbl) { lbl.textContent = 'Copied ✓'; }
            clearTimeout(t._pxT);
            t._pxT = setTimeout(function () { t.classList.remove('is-done'); if (lbl) lbl.textContent = 'Copy email'; }, 2200);
        }
    });

    /* ---------- Count-up numbers ----------------------------------------- */
    // "2,000+" counts up from 0 and keeps its comma and "+". Text with no number
    // in it ("WCAG") is left alone.
    if (CFG.countUp && 'IntersectionObserver' in window) {
        var cio = new IntersectionObserver(function (es) {
            es.forEach(function (e) {
                if (!e.isIntersecting) return;
                cio.unobserve(e.target);
                var node = e.target, txt = node.textContent, m = txt.match(/^(\D*)([\d,]+(?:\.\d+)?)(.*)$/);
                if (!m || still) return;
                var to = parseFloat(m[2].replace(/,/g, '')), comma = m[2].indexOf(',') !== -1, dec = (m[2].split('.')[1] || '').length, t0 = performance.now();
                (function step(t) {
                    var k = Math.min(1, (t - t0) / 1300), v = to * (1 - Math.pow(1 - k, 3));
                    var s = dec ? v.toFixed(dec) : String(Math.round(v));
                    if (comma) s = Number(s).toLocaleString('en-US', { minimumFractionDigits: dec, maximumFractionDigits: dec });
                    node.textContent = m[1] + s + m[3];
                    if (k < 1) requestAnimationFrame(step); else node.textContent = txt;
                })(t0);
            });
        }, { threshold: 0.6 });
        $$(CFG.countUp).forEach(function (n) { cio.observe(n); });
    }

    /* ---------- Figma-style frame on images ------------------------------- */
    // On hover: a selection frame with the image's real pixel size and a short
    // name taken from its caption.
    if (CFG.frames && finePointer) {
        $$(CFG.frames).forEach(function (f) {
            var img = $('img', f);
            if (!img) return;
            if (getComputedStyle(f).position === 'static') f.style.position = 'relative';
            var fr = el('span', 'px-frame', '<span class="px-sel__box"><i></i><i></i><i></i><i></i></span><span class="px-frame__tag"></span><span class="px-frame__dim"></span>');
            fr.setAttribute('aria-hidden', 'true');
            f.appendChild(fr);
            f.addEventListener('pointerenter', function () {
                var name = (img.getAttribute('alt') || 'Image').split(/\s[—–-]\s/)[0].slice(0, 42);
                $('.px-frame__tag', fr).textContent = 'Image · ' + name;
                $('.px-frame__dim', fr).textContent = (img.naturalWidth || Math.round(img.width)) + ' × ' + (img.naturalHeight || Math.round(img.height));
                fr.classList.add('is-on');
            });
            f.addEventListener('pointerleave', function () { fr.classList.remove('is-on'); });
        });
    }

    /* ------------------------------------------------------------------ */
    /* Albus walks the page                                                */
    /* ------------------------------------------------------------------ */
    /*
     * A "platform" is the visible top edge of something on the page — the
     * first line of a heading, the top of a card, button or image. Albus walks
     * along one; at its end he turns round or jumps to another; if it scrolls
     * or slides away under him he jumps somewhere else or drops to the floor
     * (the bottom of the window). On phones he keeps to the floor.
     * Positions are re-read from the page every frame, so he rides along
     * with scrolling instead of floating in place.
     */
    var SIZE = innerWidth < 576 ? 40 : 48, SPEED = 42, TOP_CLEAR = 110;
    var PLATFORMS = CFG.platforms || [
        'h1', 'h2', 'h4', 'h5', '.vlt-btn', '.vlt-wp__card', '.vlt-counter-up-small', '.vlt-award-item',
        '.vlt-slide-photo', '.px-contact', '.vlt-services', '.vlt-timeline-item__title', '.vlt-progress-bar__title'
    ].map(function (s) { return '.vlt-section.active ' + s; }).join(', ');

    var walk = {
        x: innerWidth - 90, y: innerHeight - 2, dir: -1, mode: 'walk', until: 0,
        plat: null, jump: null, step: 0, stepT: 0, landT: 0,
        pause: function (ms) { if (!this.jump) { this.mode = 'idle'; this.until = performance.now() + ms; } }
    };
    function floorOnly() { return innerWidth < 576 || (!finePointer && innerWidth < 992); }
    function floorRect() { return { left: 14, right: innerWidth - 14, top: innerHeight - 2 }; }

    // Where a platform's walkable top edge is right now, or null if it is not
    // usable (too narrow, off screen, under the header, or hidden behind
    // another slide — the last check is costly, so only done when choosing).
    function platRect(p, hitTest) {
        if (!p) return floorRect();
        var node = p.el, r;
        if (!node.isConnected) return null;
        // Homepage slides stack: a slide that is no longer active can still sit
        // in place underneath the new one, so treat it as gone.
        var slide = node.closest('.vlt-section');
        if (slide && $('.pp-section') && !slide.classList.contains('active')) return null;
        if (/^(H[1-6]|P)$/.test(node.tagName)) {
            var rg = doc.createRange(); rg.selectNodeContents(node);
            var rs = rg.getClientRects();
            if (!rs.length) return null;
            var top = rs[0].top, l = Infinity, rr = -Infinity;
            for (var i = 0; i < rs.length; i++) {
                if (rs[i].width > 0 && Math.abs(rs[i].top - top) < 8) { l = Math.min(l, rs[i].left); rr = Math.max(rr, rs[i].right); }
            }
            // A line box starts above the letters; drop to roughly cap height.
            r = { left: l, right: rr, top: top + (parseFloat(getComputedStyle(node).fontSize) || 16) * 0.16 };
        } else {
            var b = node.getBoundingClientRect();
            if (!b.width || !b.height) return null;
            r = { left: b.left, right: b.right, top: b.top };
        }
        r.left = Math.max(r.left, 10); r.right = Math.min(r.right, innerWidth - 10);
        if (r.right - r.left < 70 || r.top < TOP_CLEAR || r.top > innerHeight - 40) return null;
        if (hitTest) {
            var hit = doc.elementFromPoint((r.left + r.right) / 2, r.top + 3);
            if (!hit || !(node.contains(hit) || hit.contains(node))) return null;
        }
        return r;
    }
    function candidates() {
        if (floorOnly()) return [];
        return $$(PLATFORMS).map(function (n) {
            var r = platRect({ el: n }, true);
            return r ? { el: n, r: r } : null;
        }).filter(Boolean);
    }

    function jumpTo(c, now) {
        var r = c ? c.r : floorRect();
        var span = r.right - r.left - 32;
        var ex = Math.min(Math.max(walk.x + walk.dir * (60 + Math.random() * 160), r.left + 16), r.right - 16);
        if (span < 0) ex = (r.left + r.right) / 2;
        var dx = ex - walk.x, rise = Math.max(0, walk.y - r.top);
        walk.dir = dx < 0 ? -1 : 1;
        walk.jump = {
            sx: walk.x, sy: walk.y, ex: ex, to: c ? { el: c.el } : null, t0: now,
            dur: Math.min(1100, Math.max(460, 380 + Math.abs(dx) * 0.8 + rise * 0.6)),
            h: 26 + Math.min(150, Math.abs(dx) * 0.22) + rise * 0.35
        };
        walk.mode = 'air';
        blip(420 + Math.random() * 120, 0.07);
    }
    // Pick somewhere to go: prefer platforms in front, within reach.
    function hopSomewhere(now, preferDir) {
        var here = walk.plat && walk.plat.el;
        var list = candidates().filter(function (c) {
            if (c.el === here) return false;
            var cx = Math.min(Math.max(walk.x, c.r.left), c.r.right);
            return Math.abs(cx - walk.x) < 520 && Math.abs(c.r.top - walk.y) < innerHeight * 0.7;
        });
        if (preferDir) {
            var ahead = list.filter(function (c) { return preferDir > 0 ? c.r.right > walk.x + 40 : c.r.left < walk.x - 40; });
            if (ahead.length) list = ahead;
        }
        if (list.length) { jumpTo(list[Math.floor(Math.random() * list.length)], now); return true; }
        if (walk.plat) { jumpTo(null, now); return true; }   // nothing nearby: down to the floor
        return false;
    }
    // Tour helper: hop onto something inside a section (slide name or selector).
    function perchIn(target) {
        var box = /^[#.\[]/.test(target) ? $(target) : $('[data-anchor="' + target + '"]');
        if (!box || still) return;
        var list = candidates().filter(function (c) { return box.contains(c.el); });
        list.sort(function (a, b) { return a.r.top - b.r.top; });
        if (list.length) jumpTo(list[0], performance.now());
    }

    function busy() { return sleeping || still || chat.classList.contains('is-open'); }
    function decide(now) {
        if (busy()) { walk.mode = 'idle'; walk.until = now + 900; return; }
        var roll = Math.random();
        if (roll < 0.5) {
            if (Math.random() < 0.3) walk.dir = -walk.dir;
            walk.mode = 'walk'; walk.until = now + 2200 + Math.random() * 3500;
        } else if (roll < 0.85 && hopSomewhere(now)) {
            /* jumping */
        } else {
            walk.mode = 'idle'; walk.until = now + 900 + Math.random() * 1600;
        }
    }
    function atEdge(now) {
        if (busy()) { walk.mode = 'idle'; walk.until = now + 900; return; }
        if (Math.random() < 0.5 && hopSomewhere(now, walk.dir)) return;
        walk.dir = -walk.dir;
        walk.mode = Math.random() < 0.35 ? 'idle' : 'walk';
        walk.until = now + (walk.mode === 'idle' ? 900 + Math.random() * 1500 : 2000 + Math.random() * 3000);
    }

    function tick(now, dt) {
        if (walk.jump) {
            var J = walk.jump, k = Math.max(0, Math.min(1, (now - J.t0) / J.dur));
            var end = J.to ? platRect(J.to) : floorRect();
            if (!end) { J.to = null; end = floorRect(); }
            var ex = Math.min(Math.max(J.ex, end.left + 12), end.right - 12);
            walk.x = J.sx + (ex - J.sx) * k;
            walk.y = J.sy + (end.top - J.sy) * k - J.h * 4 * k * (1 - k);
            if (k >= 1) {
                walk.jump = null; walk.plat = J.to; walk.y = end.top; walk.x = ex;
                walk.mode = 'idle'; walk.until = now + 350 + Math.random() * 900; walk.landT = now;
            }
            return;
        }
        var r = platRect(walk.plat);
        if (!r) { if (!hopSomewhere(now)) { walk.plat = null; } return; }
        walk.y = r.top;
        if (walk.x < r.left + 12) walk.x = r.left + 12;
        if (walk.x > r.right - 12) walk.x = r.right - 12;
        if (walk.mode === 'walk' && !busy()) {
            walk.x += walk.dir * SPEED * dt;
            walk.stepT += dt;
            if (walk.stepT > 0.15) { walk.stepT = 0; walk.step ^= 1; }
            if ((walk.dir > 0 && walk.x >= r.right - 14) || (walk.dir < 0 && walk.x <= r.left + 14)) atEdge(now);
            else if (now > walk.until) decide(now);
        } else if (now > walk.until) {
            decide(now);
        }
    }

    var lastT = performance.now();
    function render(now) {
        var air = !!walk.jump, moving = walk.mode === 'walk' && !air && !busy();
        walker.style.transform = 'translate(' + (walk.x - SIZE / 2).toFixed(1) + 'px,' + (walk.y - SIZE).toFixed(1) + 'px)' + (walk.dir < 0 ? ' scaleX(-1)' : '');
        walker.classList.toggle('is-step', moving && walk.step === 1);
        walker.classList.toggle('is-air', air);
        walker.classList.toggle('is-idle', !air && !moving);
        walker.classList.toggle('is-land', now - walk.landT < 220);
        // The speech bubble rides above his head, kept inside the window.
        if (bubble.classList.contains('is-in')) {
            var bw = bubble.offsetWidth, bh = bubble.offsetHeight;
            var bx = Math.min(Math.max(walk.x + 18 - bw, 10), innerWidth - bw - 10);
            var by = walk.y - SIZE - 12 - bh;
            if (by < 70) by = Math.min(walk.y + 12, innerHeight - bh - 10);
            dock.style.transform = 'translate(' + bx.toFixed(1) + 'px,' + by.toFixed(1) + 'px)';
        }
    }
    function frame(now) {
        var dt = Math.min(0.05, (now - lastT) / 1000);
        lastT = now;
        if (!doc.hidden) {
            if (still) { walk.jump = null; walk.plat = null; walk.mode = 'idle'; walk.x = innerWidth - 70; walk.y = innerHeight - 2; walk.dir = -1; }
            else tick(now, dt);
            render(now);
        }
        requestAnimationFrame(frame);
    }
    requestAnimationFrame(frame);

    /* ------------------------------------------------------------------ */
    /* Loading screen                                                      */
    /* ------------------------------------------------------------------ */
    /*
     * Shown once per visit. A tiny script in <head> (written by build.php)
     * adds html.px-preload before the page paints, which hides the page so it
     * never flashes; this builds the screen and removes the class at the end.
     * Albus sleeps → wakes and waves → walks on the spot → grins, hops, and
     * the screen lifts away with the walking Albus standing where he was.
     * Progress follows a minimum time but holds at 90% until the page has
     * really loaded (capped, so a slow image never traps anyone).
     */
    var loaderQueue = [], loading = root.classList.contains('px-preload'), hadLoader = loading;
    function whenLoaded(fn) { if (loading) loaderQueue.push(fn); else fn(); }
    if (loading) runLoader();

    function runLoader() {
        var BLOCKS = 20, MIN = 2600, MAX = 6000, BOT = 72;
        var STAGES = [[0, 'Waking Albus'], [0.28, 'Stretching legs'], [0.62, 'Reading the page'], [1, 'Ready!']];
        var box = el('div', 'px-loader');
        box.setAttribute('role', 'status');
        box.setAttribute('aria-label', 'Loading the page');
        var bars = '';
        for (var i = 0; i < BLOCKS; i++) bars += '<i style="--d:' + (i * 0.025).toFixed(3) + 's"></i>';
        box.innerHTML = '<div class="px-loader__in">' +
            '<div class="px-loader__track">' +
            '<div class="px-loader__bot">' + botSVG() + '</div>' +
            '<div class="px-loader__bar" aria-hidden="true">' + bars + '</div></div>' +
            '<p class="px-loader__txt"><span class="px-loader__stage">Waking Albus</span><b class="px-loader__pct">0%</b></p>' +
            '<p class="px-loader__hint">click or press any key to skip</p></div>';
        doc.body.appendChild(box);
        void box.offsetWidth;
        box.classList.add('is-in');                     // staggered entrance (CSS)

        var bot = $('.px-bot', box), botBox = $('.px-loader__bot', box), track = $('.px-loader__track', box);
        var blocks = $$('.px-loader__bar i', box), stageEl = $('.px-loader__stage', box), pctEl = $('.px-loader__pct', box);
        bots.push(bot);                                 // his eyes follow the pointer too
        bot.classList.add('is-sleep');

        var t0 = performance.now(), last = t0, loaded = doc.readyState === 'complete';
        var shown = 0, lit = 0, stage = 0, finished = false, awake = false, bx = 0;
        addEventListener('load', function () { loaded = true; });

        function setStage(s) {
            stageEl.classList.remove('is-swap'); void stageEl.offsetWidth;
            stageEl.textContent = STAGES[s][1]; stageEl.classList.add('is-swap');
            if (s === 1) {
                bot.classList.remove('is-sleep'); bot.classList.add('is-wave'); blip(520);
                setTimeout(function () { bot.classList.remove('is-wave'); awake = true; }, 650);
            }
        }
        // ~60fps on timers (not animation frames), so the loader also finishes in
        // a background tab. The shown value eases toward the real one, so the bar
        // glides instead of stepping.
        function step() {
            if (finished) return;
            var now = performance.now(), dt = Math.min(0.05, (now - last) / 1000); last = now;
            var t = now - t0, target = Math.min(1, t / MIN);
            if (!loaded && t < MAX) target = Math.min(target, 0.9);
            shown += (target - shown) * Math.min(1, dt * 7);
            if (target >= 1 && shown > 0.995) shown = 1;

            var n = Math.floor(shown * BLOCKS + 0.0001);
            while (lit < n) { blocks[lit].classList.add('on'); lit++; }
            if (lit < BLOCKS) { blocks.forEach(function (b, i) { b.classList.toggle('head', i === lit); }); }
            pctEl.textContent = Math.round(shown * 100) + '%';
            while (stage < STAGES.length - 1 && shown >= STAGES[stage + 1][0] - 0.0001) { stage++; setStage(stage); }

            // Albus sleeps at the start of the bar, then runs along it chasing the fill.
            var w = track.offsetWidth, goal = awake ? shown * (w - BOT * 0.5) : 0;
            var moving = Math.abs(goal - bx) > 1.5;
            if (moving) bx += Math.sign(goal - bx) * Math.min(Math.abs(goal - bx), dt * w * 1.1);
            botBox.style.transform = 'translateX(' + bx.toFixed(1) + 'px)';
            bot.classList.toggle('is-walking', awake && moving);

            if (shown >= 1 && !moving) { finish(false); return; }
            setTimeout(step, 16);
        }
        function finish(skipped) {
            if (finished) return;
            finished = true;
            bot.classList.remove('is-sleep', 'is-wave', 'is-walking'); bot.classList.add('is-happy');
            pctEl.textContent = '100%';
            stageEl.textContent = STAGES[STAGES.length - 1][1];
            blocks.forEach(function (b) { b.classList.add('on'); b.classList.remove('head'); });
            box.classList.add('is-done');               // bar flashes
            blip(880);
            setTimeout(function () {
                botBox.classList.add('is-leap');        // he jumps up and out of frame
                blip(660, 0.15);
                setTimeout(function () {
                    box.classList.add('is-out');        // loader fades away…
                    root.classList.add('px-reveal');    // …while the page fades in
                    root.classList.remove('px-preload');
                    session('px-loaded', '1');
                    // …and the walking Albus drops in from the top and lands.
                    var now = performance.now();
                    walk.plat = null; walk.dir = 1; walk.x = innerWidth / 2; walk.y = -SIZE;
                    // h = distance/4 turns the jump arc into y = start + distance·k², a fall that speeds up.
                    walk.jump = { sx: innerWidth / 2, sy: -SIZE, ex: innerWidth / 2, to: null, t0: now + 200, dur: 650, h: (innerHeight + SIZE) / 4 };
                    walk.mode = 'air';
                    setTimeout(function () {
                        if (box.parentNode) box.parentNode.removeChild(box);
                        bots.splice(bots.indexOf(bot), 1);
                        root.classList.remove('px-reveal');
                        loading = false;
                        loaderQueue.forEach(function (fn) { fn(); });
                        loaderQueue = [];
                    }, 800);
                }, 280);
            }, skipped ? 120 : 420);
        }
        box.addEventListener('click', function () { finish(true); });
        addEventListener('keydown', function skip() { removeEventListener('keydown', skip); finish(true); });
        step();
    }
    /* ---------- Hello ---------------------------------------------------- */
    whenLoaded(function () { setTimeout(hello, hadLoader ? 600 : 1800); });
    function hello() {
        current = activeAnchor() || (PAGE === 'home' ? 'Home' : null);
        wave();
        if (session('px-met-' + PAGE)) {
            if (current && lineFor(current)) say(lineFor(current));
        } else {
            session('px-met-' + PAGE, '1');
            say(CFG.greet || 'Hi! I\'m Albus 👋 Tamilselvan\'s design bot. Want the 45-second tour?', {
                k: 'Albus · design bot',
                actions: [{ label: 'Take the tour', run: startTour }, { label: 'Ask me something', ghost: true, run: openChat }]
            });
        }
    }
})();
