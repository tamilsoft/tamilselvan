<?php
$projects = require __DIR__ . '/data/projects.php';

// Only projects explicitly marked featured appear in Selected Works, so a
// work-in-progress entry can sit in the data file without going public.
$featuredProjects = array_filter($projects, static fn(array $p): bool => !empty($p['featured']));

$testimonials = require __DIR__ . '/data/testimonials.php';
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
        <!--Fonts-->
        <link rel="stylesheet" href="assets/fonts/Inter/style.css">
        <!--Plugins-->
        <link rel="stylesheet" href="assets/css/vlt-plugins.min.css">
        <!--Style-->
        <link rel="stylesheet" href="assets/css/vlt-main.min.css">
        <!--Custom-->
        <link rel="stylesheet" href="assets/css/custom.css">

    </head>

    <body class=" animsition">
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
                            <!--Menu Burger--><a class="vlt-menu-burger js-offcanvas-menu-open" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
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
                <!--Menu Burger--><a class="vlt-menu-burger vlt-menu-burger--opened js-offcanvas-menu-close" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" /></svg></a>
            </div>
            <nav class="vlt-offcanvas-menu__navigation">
                <!--Navigation-->
                <ul class="sf-menu">
                    <li data-menuanchor="Home"><a href="#Home">Home</a></li>
                    <li data-menuanchor="About"><a href="#About">About</a></li>
                    <li data-menuanchor="Experience"><a href="#Experience">Experience</a></li>
                    <li data-menuanchor="Tools"><a href="#Tools">Expertise</a></li>
                    <li data-menuanchor="Work"><a href="#Work">Selected Works</a></li>
                    <li data-menuanchor="Portfolio"><a href="#Portfolio">Portfolio</a></li>
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
                                            <h5 class="vlt-display-1 has-white-color">Hi, This is TAMILSELVAN MADHU.</h5>
                                            <div class="vlt-gap-10"></div>
                                            <h1 class="vlt-large-heading has-white-color">SENIOR PRODUCT<br>DESIGNER</h1>
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
                                            <div class="vlt-slide-photo__particle vlt-fade-in-bottom--small has-border-radius has-box-shadow" style="top: -50px; right: -40px; width: 80px; transition-delay: 300ms;"><img src="images/icons/Artboard 1.jpg" alt=""></div>
                                            <div class="vlt-slide-photo__particle vlt-fade-in-bottom--small has-border-radius has-box-shadow" style="top: 40px; left: -30px; width: 80px; transition-delay: 600ms;"><img src="images/icons/Artboard 2.jpg" alt=""></div>
                                            <div class="vlt-slide-photo__particle vlt-fade-in-left--small has-border-radius has-box-shadow" style="left: 30px; bottom: -50px; width: 80px; transition-delay: 900ms;"><img src="images/icons/Artboard 3.jpg" alt=""></div>
                                            <div class="vlt-slide-photo__particle vlt-fade-in-bottom--small has-border-radius has-box-shadow" style=" right: -40px; bottom: -50px; width: 80px; transition-delay: 1200ms;"><img src="images/icons/Artboard 4.jpg" alt=""></div>
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
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:200ms; animation-duration:700ms;">
                                            <!--Progress Bar-->
                                            <div class="vlt-progress-bar" data-final-value="95" data-animation-speed="1000">
                                                <h5 class="vlt-progress-bar__title">Product Design &amp; Strategy (Product Thinking, UX Strategy, Discovery, Feature Prioritization)<span class="counter">0</span>
                                                </h5>
                                                <div class="vlt-progress-bar__bar"><span></span></div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-30"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:300ms; animation-duration:700ms;">
                                            <!--Progress Bar-->
                                            <div class="vlt-progress-bar" data-final-value="90" data-animation-speed="1000">
                                                <h5 class="vlt-progress-bar__title">User Experience (Research, Journey Mapping, IA, Usability Testing, WCAG)<span class="counter">0</span>
                                                </h5>
                                                <div class="vlt-progress-bar__bar"><span></span></div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-30"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:400ms; animation-duration:700ms;">
                                            <!--Progress Bar-->
                                            <div class="vlt-progress-bar" data-final-value="90" data-animation-speed="1000">
                                                <h5 class="vlt-progress-bar__title">Visual &amp; Interaction Design (Design Systems, Prototyping, Micro-Interactions)<span class="counter">0</span>
                                                </h5>
                                                <div class="vlt-progress-bar__bar"><span></span></div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-30"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:500ms; animation-duration:700ms;">
                                            <!--Progress Bar-->
                                            <div class="vlt-progress-bar" data-final-value="85" data-animation-speed="1000">
                                                <h5 class="vlt-progress-bar__title">AI &amp; Emerging Tech (AI-Assisted Design, Prompt Engineering, Conversational AI, MCP)<span class="counter">0</span>
                                                </h5>
                                                <div class="vlt-progress-bar__bar"><span></span></div>
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
                                                <h1 class="has-white-color">Experience</h1>
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
                                            <h6>Years <br>Experience <br>Working</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <h4>I use these tools to turn ideas into intuitive designs streamlining the journey from  <span class="has-first-color">Wireframes to Polished Prototypes</span> with efficiency and impact.</h4>
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
                                                        <p>Sketch &middot; Adobe XD &middot; Framer</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:300ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">AI-Assisted Design</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Claude &amp; ChatGPT</h5>
                                                        <p>Gemini &middot; Cursor &middot; Lovable &middot; Figma Make &middot; Google Stitch &middot; MCP</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:400ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Research &amp; Collaboration</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Miro</h5>
                                                        <p>Notion AI</p>
                                                    </div>
                                                </div>
                                                <div class="vlt-gap-40--sm"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:500ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Usability &amp; Analytics</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Maze &amp; Hotjar</h5>
                                                        <p>Lookback</p>
                                                    </div>
                                                    <div class="vlt-gap-40--sm"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:600ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">Adobe Creative Suite</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Photoshop</h5>
                                                        <p>Illustrator</p>
                                                    </div>
                                                    <div class="vlt-gap-40--sm"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!--Animated Block-->
                                                <div class="vlt-animated-block" style="animation-delay:700ms; animation-duration:700ms;">
                                                    <!--Services-->
                                                    <div class="vlt-services">
                                                        <h6 class="vlt-display-1 has-first-color">No-Code &amp; Handoff</h6>
                                                        <div class="vlt-gap-10"></div>
                                                        <h5 class="vlt-services__title">Webflow</h5>
                                                        <p>Zeplin &middot; HTML &middot; CSS &middot; JavaScript &middot; Bootstrap</p>
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
                </div>

                <!--Selected Works-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Work" data-brightness="light">
                    <div class="vlt-section__vertical-align">
                        <div class="vlt-section__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:0s; animation-duration:700ms;">
                                            <div class="d-block d-md-flex align-items-end justify-content-between">
                                                <div>
                                                    <span class="vlt-works__eyebrow">Selected Work</span>
                                                    <h1>Five problems, <span class="has-first-color">solved end&#8209;to&#8209;end.</span></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vlt-gap-40"></div>
                                        <!--Animated Block-->
                                        <div class="vlt-animated-block" style="animation-delay:100ms; animation-duration:700ms;">
                                            <!--Works Bento-->
                                            <div class="vlt-bento">
                                                <?php $workIndex = 0; foreach ($featuredProjects as $slug => $featured) : $workIndex++; $isLg = $workIndex === 1; ?>
                                                <a class="vlt-bento__tile<?php echo $isLg ? ' vlt-bento__tile--lg' : ''; ?>" href="work.php?p=<?php echo urlencode($slug); ?>">
                                                    <img class="vlt-bento__img" src="<?php echo htmlspecialchars($featured['card_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="">
                                                    <span class="vlt-bento__shade"></span>
                                                    <span class="vlt-bento__top">
                                                        <span class="vlt-bento__num"><?php echo str_pad((string) $workIndex, 2, '0', STR_PAD_LEFT); ?></span>
                                                        <?php if (!empty($featured['is_placeholder'])) : ?>
                                                            <span class="vlt-bento__flag">Sample</span>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="vlt-bento__body">
                                                        <span class="vlt-bento__cat"><?php echo htmlspecialchars($featured['category'], ENT_QUOTES, 'UTF-8'); ?> &middot; <?php echo htmlspecialchars($featured['year'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                        <span class="vlt-bento__title"><?php echo htmlspecialchars($isLg ? ($featured['headline'] ?? $featured['title']) : $featured['title'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                        <?php if ($isLg && !empty($featured['tags'])) : ?>
                                                        <span class="vlt-bento__tags"><?php echo htmlspecialchars(implode('  ·  ', $featured['tags']), ENT_QUOTES, 'UTF-8'); ?></span>
                                                        <?php endif; ?>
                                                        <span class="vlt-bento__cta"><?php echo htmlspecialchars($isLg ? ($featured['cta'] ?? 'View Case Study') : 'View', ENT_QUOTES, 'UTF-8'); ?> &#129146;</span>
                                                    </span>
                                                </a>
                                                <?php endforeach; ?>
                                                <!--More link tile-->
                                                <a class="vlt-bento__tile vlt-bento__tile--more" href="https://www.behance.net/tamilselvan5" target="_blank" rel="noopener">
                                                    <span class="vlt-bento__more-label">More<br>work</span>
                                                    <span class="vlt-bento__more-sub">Behance &#129146;</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Portfolio-->
                <!--Section-->
                <div class="vlt-section pp-scrollable" data-anchor="Portfolio" data-brightness="dark">
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
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/vs.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Design</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Visual Design</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/ds.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Design</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Design System</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/bd.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Branding</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Logo Design & Branding</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/cs.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Research</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">UX Case Study</a></h3>
                                                        </header>
                                                        <footer class="vlt-work-footer"><a class="vlt-work__link vlt-link-with-arrow" target="_blank" href="https://www.behance.net/tamilselvan5"><span class="vlt-link-with-arrow__text">View case</span><span class="vlt-link-with-arrow__icon">🡒</span></a></footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="vlt-work">
                                                    <div class="vlt-work-thumbnail"><img src="images/portfolio/gs.jpg" alt=""><a class="vlt-work-thumbnail__link" href="#"></a></div>
                                                    <div class="vlt-work-content">
                                                        <header class="vlt-work-header">
                                                            <div class="vlt-work-meta"><span>Design</span></div>
                                                            <h3 class="vlt-work-title"><a target="_blank" href="https://www.behance.net/tamilselvan5">Graphic Design</a></h3>
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
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Visual Design</a></h3><span class="vlt-project-showcase__item__category">Design</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Design System</a></h3><span class="vlt-project-showcase__item__category">Design</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Logo Design & Branding</a></h3><span class="vlt-project-showcase__item__category">Branding</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">UX Case study</a></h3><span class="vlt-project-showcase__item__category">Research</span>
                                    </li>
                                    <li class="vlt-project-showcase__item">
                                        <h3 class="vlt-project-showcase__item__title"><a href="https://www.behance.net/tamilselvan5" target="_blank">Graphic Design</a></h3><span class="vlt-project-showcase__item__category">Design</span>
                                    </li>

                                </ul>
                                <div class="vlt-project-showcase__images">
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/vs.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/ds.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/bd.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/cs.jpg" alt=""></div>
                                    <div class="vlt-project-showcase__image"><img src="images/portfolio/gs.jpg" alt=""></div>

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
                                                <h1 class="has-white-color">Testimonials</h1>
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
                                            <h1>Education</h1>
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
                                            <h1 class="has-white-color">Contact</h1>
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
                                                <div class="message danger">Sorry something went wrong!</div>
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
                    <li data-menuanchor="Experience"></li>
                    <li data-menuanchor="Tools"></li>
                    <li data-menuanchor="Work"></li>
                    <li data-menuanchor="Portfolio"></li>
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
        <script src="assets/vendors/jquery-3.5.1.min.js"></script>
        <script src="assets/scripts/vlt-plugins.min.js"></script>
        <script src="assets/scripts/vlt-helpers.js"></script>
        <script src="assets/scripts/vlt-controllers.min.js"></script>
        <script src="assets/scripts/content-protection.js"></script>
    </body>

</html>