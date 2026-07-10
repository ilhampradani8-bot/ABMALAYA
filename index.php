<?php 
// Force force browser to bypass cache for index.php to immediately reflect local 3D assets and carousel improvements
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$pageTitle = "Home";
$currentPage = "home";
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<?php 
$heroTitle = "<span style='color: #1191cc;'>Integrated Industrial Solutions</span> <span style='color: #093863;'>for a Smarter Future</span>";
$heroSubtitle = ""; /* Subtitle merged into Title for impact */
$heroDesc = "AB Malaya Sdn Bhd delivers reliable solutions across construction, marine services, logistics, corrosion management, and digital technology — empowering industries with operational excellence, technical precision, and sustainable growth.";
$showButtons = true;
$heroBtn1Text = "Explore Our Solutions";
$heroBtn1Link = "#service";
$heroBtn2Text = "Contact Our Team";
$heroBtn2Link = "/contact";
include 'includes/hero_visual.php';
?>

<!-- Stats / Highlights Section (Moved Partners to match Navigation Flow) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<style>
    .mobile-only-logo { display: none; }

    /* Mobile Styles for Partner & About */
    /* Mobile Styles for Partner & About */
    @media (max-width: 768px) {
        .mobile-only-logo { display: flex !important; }
        /* Partner Marquee on Mobile */
        .client-grid-static {
            display: flex !important;
            justify-content: flex-start !important;
            gap: 3rem !important;
            flex-wrap: nowrap !important;
            animation: marqueeMobile 5s linear infinite;
            width: max-content;
        }
        #clients { overflow: hidden; }
        
        @keyframes marqueeMobile {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* About Section Mobile Fix */
        #about { padding: 60px 0 !important; }
        #about > div > div {
            flex-direction: column !important;
            gap: 2rem !important;
        }
        #about div[style*="width: 50%"] {
            width: 100% !important;
            padding-right: 0 !important;
            text-align: left !important;
            align-items: flex-start !important;
        }
        #about div[style*="padding-left: 4rem"] {
            padding-left: 0 !important;
        }
        #about h2 { font-size: 2.2rem !important; }
        #about p, #about ul, #about li {
            font-size: 0.95rem !important;
            line-height: 1.6 !important;
        }
        #about .hero-link { margin-top: 2rem; }

        /* Service Section Mobile Fix */
        #service { padding: 40px 0 !important; }
        #service .section-title { 
            text-align: left !important; 
            padding: 0 6vw !important; 
            margin-bottom: 1.5rem !important; 
        }
        #service h2 { font-size: 2.2rem !important; }

        /* Location & CTA Mobile Fix */
        #location > div > div, 
        #cta > div > div {
            flex-direction: column !important;
            gap: 2rem !important;
        }
        #location div[style*="width: 50%"], 
        #cta div[style*="width: 55%"],
        #cta div[style*="width: 45%"] {
            width: 100% !important;
            padding-right: 0 !important;
            text-align: left !important;
        }
        #location h2, #cta h2, .cta-title { font-size: 2.2rem !important; }
        #location div[style*="align-items: flex-end"] {
            align-items: flex-start !important;
            text-align: left !important;
        }
        #location div[style*="margin-top: 5rem"] {
            margin-top: 0 !important;
        }
        #location div[style*="margin-bottom: 5rem"] {
            margin-bottom: 1.5rem !important;
        }
        #location .contact-item {
            margin-bottom: 1.8rem !important;
        }
        #location p, #location span {
            font-size: 0.95rem !important;
            line-height: 1.6 !important;
        }
        #location p[style*="font-size: 0.7rem"] {
            font-size: 0.7rem !important;
            margin-bottom: 0.25rem !important;
        }
        #cta div[style*="justify-content: flex-end"] {
            justify-content: flex-start !important;
        }
    }

    @media (max-width: 480px) {
        #about h2, #service h2, #location h2, #cta h2, .cta-title {
            font-size: 1.85rem !important;
            line-height: 1.2 !important;
            letter-spacing: -1px !important;
        }
    }

    /* Embla Carousel Slider CSS */
    .custom-slider-wrapper {
        width: 100vw;
        padding: 0;
        overflow: hidden;
        position: relative;
    }

    .embla {
        position: relative;
        width: 100%;
        margin: 0 auto;
    }

    .embla__viewport {
        overflow: hidden;
        width: 100%;
        padding: 40px 0; /* Clear space for raised cards and shadows */
    }

    .embla__container {
        display: flex;
        will-change: transform;
        touch-action: pan-y; /* Crucial for horizontal swipe gesture to work smoothly on mobile */
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .embla__slide {
        flex: 0 0 85%; /* Mobile: 1 centered card + partial side cards */
        min-width: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        transform-style: preserve-3d;
    }

    @media (min-width: 768px) {
        .embla__slide {
            flex: 0 0 48%; /* Tablet: 2 cards visible */
        }
    }

    @media (min-width: 992px) {
        .embla__slide {
            flex: 0 0 33.333%; /* Desktop: 3 cards visible */
        }
    }

    /* Visual Card container (scales inside slide container to prevent snap jitter) */
    .slide-card {
        width: 100%;
        max-width: 22rem;
        height: 30rem;
        background: #000;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transform: scale(0.9);
        opacity: 0.35;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), 
                    opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), 
                    box-shadow 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        transform-style: preserve-3d;
        will-change: transform, opacity;
        backface-visibility: hidden;
    }

    /* Selected state */
    .embla__slide.is-selected .slide-card {
        transform: scale(1.04);
        opacity: 1;
        box-shadow: 0 30px 60px rgba(17, 145, 204, 0.25);
    }

    /* Card inner elements styling */
    .media {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        -webkit-user-drag: none; /* Prevent browser from intercepting touch swipe as file drag */
        user-drag: none;
        pointer-events: none; /* Pass touch events directly to parent slider container */
    }

    .embla__slide.is-selected .slide-card:hover .media img {
        transform: scale(1.05);
    }

    /* Floating 3D Hologram Badge in Top-Left Corner (Borderless & Direct) */
    .badge-3d {
        position: absolute;
        top: 24px;
        left: 24px;
        width: 72px;
        height: 72px;
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .badge-3d img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.35));
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .slide-card:hover .badge-3d {
        transform: translateY(-4px) scale(1.08);
    }

    .slide-card:hover .badge-3d img {
        transform: scale(1.12) rotate(6deg);
    }

    .card-sections {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 3rem 2rem 2.2rem;
        background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 60%, transparent 100%);
        z-index: 2;
    }

    /* Asymmetric Row Layout (SVG button left, text right) */
    .card-footer-layout {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        width: 100%;
    }

    .card-footer-left {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-footer-right {
        text-align: right;
        flex-grow: 1;
        padding-left: 1.5rem;
    }

    .card-caption {
        color: #fff;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2px !important;
        letter-spacing: -0.5px;
        text-align: right;
    }

    .card-desc {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.82rem;
        font-family: 'Aeonik', sans-serif;
        line-height: 1.3;
        font-weight: 400;
        text-align: right;
    }

    /* Minimalist SVG Arrow Button */
    .card-arrow-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        background: rgba(17, 145, 204, 0.08);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(17, 145, 204, 0.25);
        border-radius: 50%;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        opacity: 0;
        transform: scale(0.8) translateX(-10px);
        will-change: transform, opacity;
    }

    .card-arrow-btn svg {
        stroke: #1191cc;
        stroke-width: 2.8;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: transform 0.3s ease, stroke 0.3s ease;
    }

    /* Only show and animate arrow button for selected slide */
    .embla__slide.is-selected .card-arrow-btn {
        opacity: 1;
        transform: scale(1) translateX(0);
    }

    .card-arrow-btn:hover {
        background: #1191cc;
        border-color: #1191cc;
    }

    .card-arrow-btn:hover svg {
        stroke: #fff;
        transform: translateX(2px) scale(1.05);
    }

    /* Controls */
    .slider-nav-bottom {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 1rem;
        z-index: 10;
        position: relative;
    }

    .left-arrow, .right-arrow {
        width: 52px;
        height: 52px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border: 1px solid rgba(0,0,0,0.08);
        border-radius: 50%;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        background: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .left-arrow:hover, .right-arrow:hover {
        background: #1191cc;
        border-color: #1191cc;
        color: #fff;
        transform: scale(1.05);
    }

    .left-arrow i, .right-arrow i {
        font-size: 1.1rem;
    }

    .left-arrow:hover i, .right-arrow:hover i {
        color: #fff;
    }

    /* Dots */
    .embla__dots {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .embla__dot {
        appearance: none;
        border: 0;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), 
                    background-color 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .embla__dot[aria-selected="true"] {
        background: #1191cc;
        transform: scale(1.5);
    }

    /* Mobile Responsive Card Sizing */
    @media (max-width: 768px) {
        .embla__slide {
            flex: 0 0 65%; /* 3 card preview: 1 full center + 2 peeking sides */
            padding: 0 10px; /* Reduced gap to bring card peeks closer */
        }
        .slide-card {
            max-width: 100%;
            height: 24rem; /* Slightly larger height on tablet/mobile to prevent vertical cutoff */
        }
        .card-caption {
            font-size: 1.2rem;
            margin-bottom: 0.4rem !important;
            text-align: right;
        }
        .card-desc {
            font-size: 0.8rem;
            line-height: 1.35;
            text-align: right;
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .card-sections {
            padding: 2rem 1rem 1.5rem;
        }
        .card-footer-right {
            padding-left: 0.8rem;
        }
        .card-arrow-btn {
            width: 32px;
            height: 32px;
        }
        .card-arrow-btn svg {
            width: 16px;
            height: 16px;
        }
        .embla__viewport {
            padding: 20px 0;
        }
    }

    @media (max-width: 480px) {
        .embla__slide {
            flex: 0 0 78%; /* Wider card on small screens to give text maximum horizontal width */
        }
        .slide-card {
            height: 24.5rem; /* Spacious enough to hold the text cleanly without any clip */
        }
        .card-caption {
            font-size: 1.1rem;
            margin-bottom: 0.3rem !important;
        }
        .card-desc {
            font-size: 0.74rem;
            line-height: 1.3;
        }
        .card-sections {
            padding: 1.8rem 0.8rem 1.2rem;
        }
        .card-footer-right {
            padding-left: 0.6rem;
        }
        .card-arrow-btn {
            width: 28px;
            height: 28px;
        }
        .card-arrow-btn svg {
            width: 14px;
            height: 14px;
        }
    }
</style>

<!-- About Brief -->
<section id="about" style="padding: 120px 0; background: #fff;">
    <div style="width: 100%; padding: 0 6vw;"> <!-- Matched Header Padding -->
        <div style="display: flex; justify-content: space-between; align-items: stretch;">
            <!-- Left Half: Exactly 50% -->
            <div style="width: 50%; text-align: left; padding-right: 4rem;">
                <h2 style="font-size: 3.2rem; margin-bottom: 2.5rem; color: #093863; font-family: 'Aeonik', sans-serif; font-weight: 700; line-height: 1.1; letter-spacing: -1.5px;">
                    Leading the Way in <br><span style="color: #1191cc;">Industrial Evolution</span>
                </h2>
                <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; font-family: 'Aeonik', sans-serif; margin-bottom: 1.5rem; width: 100%;">
                    With a strong commitment to quality, compliance, and innovation, we provide end-to-end solutions tailored to the evolving needs of modern industries across Malaysia and the regional market.
                </p>
                <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; font-family: 'Aeonik', sans-serif; width: 100%;">
                    Our mission is to bridge operational efficiency, sustainability, and technological advancement through practical and cost-effective industrial solutions.
                </p>
            </div>

            <!-- Right Half: Exactly 50% -->
            <div style="width: 50%; display: flex; flex-direction: column; align-items: flex-start; justify-content: flex-start; text-align: left; padding-left: 4rem;">
                <div style="margin-top: 1rem; margin-bottom: 2rem;">
                    <a href="/about" class="hero-link" style="color: #000; font-size: 0.85rem;">
                        Learn More About Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; font-family: 'Aeonik', sans-serif;">
                    AB Malaya Sdn Bhd is a multidisciplinary industrial solutions company specializing in:
                </p>
                <ul style="color: #475569; font-size: 1.1rem; line-height: 1.8; font-family: 'Aeonik', sans-serif; list-style-type: none; padding-left: 0; margin-top: 1.2rem; width: 100%;">
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Strategic Consultant Services</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Contractor & Engineering Services</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Marine Industrial Support</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Cross-Border Logistics</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Corrosion Management</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Digital & IT Solutions</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="service" style="background: #ffffff; padding: 40px 0 20px; overflow: hidden; border-top: 1px solid #f1f5f9;">
    <div class="container">
        <div class="section-title" style="text-align: left; margin-bottom: 3rem;">
            <h5 style="color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; margin-bottom: 0.5rem; font-family: 'Aeonik', sans-serif;">Solutions</h5>
            <h2 style="font-size: 3rem; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1.5px; line-height: 1.1;"><span style="color: #093863;">Integrated</span> <span style="color: #1191cc;">Expertise</span></h2>
        </div>
    </div>
        
    <div class="custom-slider-wrapper">
        <div class="embla" id="embla-services">
            <div class="embla__viewport">
                <div class="embla__container">
                    <!-- Slide 1: Strategic Consultant -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <!-- Direct 3D Render (No border box) -->
                            <div class="badge-3d">
                                <img src="assets/img/service3d/lanscape.webp" alt="Strategic Consultant Icon">
                            </div>
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=800&h=1000" alt="Strategic Consultant">
                            </div>
                            <div class="card-sections">
                                <div class="card-footer-layout">
                                    <!-- Left Side: Arrow Button -->
                                    <div class="card-footer-left">
                                        <a href="solutions#strategic-consultant" class="card-arrow-btn" aria-label="Know More">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                    <!-- Right Side: Title & Description -->
                                    <div class="card-footer-right">
                                        <div class="card-caption">Strategic Consultant</div>
                                        <div class="card-desc">Project Advisory — End-to-end strategic consultation from feasibility assessment to implementation strategy.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Contractor & Engineering Services -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <!-- Direct 3D Render (No border box) -->
                            <div class="badge-3d">
                                <img src="assets/img/service3d/civil.webp" alt="Contractor & Engineering Icon">
                            </div>
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&h=1000" alt="Contractor & Engineering">
                            </div>
                            <div class="card-sections">
                                <div class="card-footer-layout">
                                    <!-- Left Side: Arrow Button -->
                                    <div class="card-footer-left">
                                        <a href="solutions#contractor-engineering" class="card-arrow-btn" aria-label="Know More">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                    <!-- Right Side: Title & Description -->
                                    <div class="card-footer-right">
                                        <div class="card-caption">Contractor & Engineering</div>
                                        <div class="card-desc">Building Construction — Comprehensive construction covering commercial, industrial, and infrastructure projects.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Marine Services -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <!-- Direct 3D Render (No border box) -->
                            <div class="badge-3d">
                                <img src="assets/img/service3d/marine.webp" alt="Marine Icon">
                            </div>
                            <div class="media">
                                <img src="assets/img/kapal-tanker.jpg" alt="Marine Services">
                            </div>
                            <div class="card-sections">
                                <div class="card-footer-layout">
                                    <!-- Left Side: Arrow Button -->
                                    <div class="card-footer-left">
                                        <a href="solutions#marine" class="card-arrow-btn" aria-label="Know More">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                    <!-- Right Side: Title & Description -->
                                    <div class="card-footer-right">
                                        <div class="card-caption">Marine Division</div>
                                        <div class="card-desc">Marine Industrial Solutions — Reliable industrial supply and technical support services for marine & offshore operations.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Cross-Border Logistics -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <!-- Direct 3D Render (No border box) -->
                            <div class="badge-3d">
                                <img src="assets/img/service3d/logistics.webp" alt="Logistics Icon">
                            </div>
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800&h=1000" alt="Logistics Services">
                            </div>
                            <div class="card-sections">
                                <div class="card-footer-layout">
                                    <!-- Left Side: Arrow Button -->
                                    <div class="card-footer-left">
                                        <a href="solutions#cross" class="card-arrow-btn" aria-label="Know More">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                    <!-- Right Side: Title & Description -->
                                    <div class="card-footer-right">
                                        <div class="card-caption">Logistic Division</div>
                                        <div class="card-desc">Cross-Border Solutions — Reliable logistics coordination across Malaysia, Singapore, Thailand, and Indonesia.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4: Corrosion Management -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <!-- Direct 3D Render (No border box) -->
                            <div class="badge-3d">
                                <img src="assets/img/service3d/pohon3d.webp" alt="Corrosion Management Icon">
                            </div>
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=800&h=1000" alt="Corrosion Management">
                            </div>
                            <div class="card-sections">
                                <div class="card-footer-layout">
                                    <!-- Left Side: Arrow Button -->
                                    <div class="card-footer-left">
                                        <a href="solutions#env" class="card-arrow-btn" aria-label="Know More">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                    <!-- Right Side: Title & Description -->
                                    <div class="card-footer-right">
                                        <div class="card-caption">Corrosion Management</div>
                                        <div class="card-desc">Prevention & Protection — Specialized corrosion management solutions for marine, oil & gas, industrial, and infrastructure sectors.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: Digital & IT Solutions -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <!-- Direct 3D Render (No border box) -->
                            <div class="badge-3d">
                                <img src="assets/img/service3d/mekanikal.webp" alt="Digital & IT Icon">
                            </div>
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&h=1000" alt="Digital & IT Solutions">
                            </div>
                            <div class="card-sections">
                                <div class="card-footer-layout">
                                    <!-- Left Side: Empty (No button) -->
                                    <div class="card-footer-left"></div>
                                    <!-- Right Side: Title & Description -->
                                    <div class="card-footer-right">
                                        <div class="card-caption">Digital & IT Solutions</div>
                                        <div class="card-desc">Digital Transformation — Operational efficiency through modern digital technologies and smart system integration.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controls (Arrows & Dots) -->
            <div class="slider-nav-bottom">
                <button class="embla__btn embla__btn--prev left-arrow" aria-label="Previous slide">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div class="embla__dots"></div>
                <button class="embla__btn embla__btn--next right-arrow" aria-label="Next slide">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Client Logos Section (Partners) -->
<section id="clients" class="client-marquee-section">
    <div class="marquee-container">
        <!-- Interactive Marquee Tabs -->
        <div style="display: flex; justify-content: center; width: 100%; margin-bottom: 4.5rem;">
            <div class="marquee-tabs">
                <button class="marquee-tab-btn active" data-target="partners-track">Strategic Partners</button>
                <button class="marquee-tab-btn" data-target="accredited-track">Licensed & Registered</button>
            </div>
        </div>
        
        <div class="marquee-content">
            <!-- Strategic Partners Track -->
            <div class="marquee-track" id="partners-track">
                <!-- Original Set -->
                <div class="client-logo-item">
                    <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/partners/durachem-logo.webp" alt="Durachem">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/partners/belzona-logo.webp" alt="Belzona">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/partners/loctite-logo.webp" alt="Loctite">
                </div>
                <!-- Duplicate Set for Infinite Loop -->
                <div class="client-logo-item">
                    <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/partners/durachem-logo.webp" alt="Durachem">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/partners/belzona-logo.webp" alt="Belzona">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/partners/loctite-logo.webp" alt="Loctite">
                </div>
            </div>

            <!-- Accredited & Certified Track -->
            <div class="marquee-track" id="accredited-track" style="display: none;">
                <!-- Original Set -->
                <div class="client-logo-item">
                    <img src="assets/img/cidb.jpg" alt="CIDB" style="mix-blend-mode: multiply;">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/mof.webp" alt="MOF">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/ssm.webp" alt="SSM">
                </div>
                <!-- Duplicate Set 1 -->
                <div class="client-logo-item">
                    <img src="assets/img/cidb.jpg" alt="CIDB" style="mix-blend-mode: multiply;">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/mof.webp" alt="MOF">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/ssm.webp" alt="SSM">
                </div>
                <!-- Duplicate Set 2 -->
                <div class="client-logo-item">
                    <img src="assets/img/cidb.jpg" alt="CIDB" style="mix-blend-mode: multiply;">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/mof.webp" alt="MOF">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/ssm.webp" alt="SSM">
                </div>
                <!-- Duplicate Set 3 -->
                <div class="client-logo-item">
                    <img src="assets/img/cidb.jpg" alt="CIDB" style="mix-blend-mode: multiply;">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/mof.webp" alt="MOF">
                </div>
                <div class="client-logo-item">
                    <img src="assets/img/ssm.webp" alt="SSM">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inline script fallback to prevent caching issues -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.marquee-tab-btn');
    const tracks = document.querySelectorAll('.marquee-track');

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle active class on tabs
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const targetId = this.getAttribute('data-target');
            
            // Toggle visibility of tracks
            tracks.forEach(track => {
                if (track.id === targetId) {
                    track.style.display = 'flex';
                } else {
                    track.style.display = 'none';
                }
            });
        });
    });
});
</script>

<style>
    .client-marquee-section {
        background: #f8fafc;
        padding: 100px 0;
        border-bottom: 1px solid #f1f5f9;
        overflow: hidden;
    }
    .marquee-tabs {
        display: inline-flex;
        background: #f8fafc;
        padding: 6px;
        border-radius: 16px;
        box-shadow: inset 3px 3px 6px #cbd5e1, inset -3px -3px 6px #ffffff;
        position: relative;
        z-index: 10;
    }
    .marquee-tab-btn {
        background: transparent;
        border: none;
        outline: none;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #64748b;
        padding: 10px 22px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .marquee-tab-btn.active {
        color: #1191cc;
        background: #f8fafc;
        box-shadow: 3px 3px 6px #cbd5e1, -3px -3px 6px #ffffff;
    }
    .marquee-tab-btn:hover:not(.active) {
        color: #1191cc;
    }
    .marquee-content {
        width: 100%;
        mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85% , transparent);
    }
    .marquee-track {
        display: flex;
        align-items: center;
        width: max-content;
        gap: 8rem;
        transform-style: preserve-3d;
    }
    #partners-track {
        animation: marqueeScroll 6s linear infinite;
    }
    #accredited-track {
        animation: marqueeScroll 9s linear infinite;
    }
    .client-logo-item {
        flex-shrink: 0;
        cursor: default;
        padding: 20px;
        border-radius: 20px;
        background: transparent;
        transition: background 0.4s ease;
        transform-style: preserve-3d;
    }
    .client-logo-item:hover {
        background: #f1f5f9;
    }
    .client-logo-item img {
        height: 55px;
        width: auto;
        filter: none;
        opacity: 0.9;
        transition: 0.4s ease;
        display: block;
        object-fit: contain;
        transform: translateZ(20px); /* 3D Depth */
    }
    .client-logo-item:hover img {
        opacity: 1;
    }

    @keyframes marqueeScroll {
        from { transform: translateX(0); }
        to { transform: translateX(calc(-50% - 4rem)); }
    }

    @media (max-width: 768px) {
        .marquee-track { gap: 4rem; }
        #partners-track { animation-duration: 9s; }
        #accredited-track { animation-duration: 13.5s; }
        .client-logo-item img { height: 45px; }
        .client-marquee-section { padding: 40px 0; }
    }

    @media (max-width: 480px) {
        .marquee-tabs {
            border-radius: 8px;
            width: 90%;
            display: flex;
        }
        .marquee-tab-btn {
            font-size: 0.65rem;
            letter-spacing: 1px;
            padding: 8px 12px;
            flex: 1;
            text-align: center;
        }
    }
</style>

<!-- Map & Location Section (Offices) -->
<section id="location" style="background: #fff; padding: 40px 0 0 0;">
    <div style="width: 100%; padding: 0 6vw;">
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 5rem;">
            <!-- Left Side: Address & Map Info -->
            <div style="width: 50%; padding-right: 4rem;">
                <h5 style="color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; margin-bottom: 1.5rem; font-family: 'Aeonik', sans-serif;">Offices</h5>
                <h2 style="font-size: 3.2rem; margin-bottom: 3rem; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1.5px; line-height: 1.1;"><span style="color: #093863;">Our Offices &</span> <br><span style="color: #1191cc;">Headquarters</span></h2>
                
                <!-- Head Office (HQ) -->
                <div class="contact-item" style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
                    <div style="color: #1191cc; font-size: 1.5rem; padding-top: 5px;"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">Office Address (HQ)</p>
                        <p style="color: #000; font-size: 1.1rem; line-height: 1.6;">2-2-40, 2nd Floor Wisma Rampai, Jalan 34/26, <br>Taman Sri Rampai, 53300 Kuala Lumpur.</p>
                    </div>
                </div>

                <!-- Penang Office -->
                <div class="contact-item" style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
                    <div style="color: #1191cc; font-size: 1.5rem; padding-top: 5px;"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">Penang Office</p>
                        <p style="color: #000; font-size: 1.1rem; line-height: 1.6;">4761D, Jalan Pongsu Seribu, <br>13200 Kepala Batas, Penang.</p>
                    </div>
                </div>

                <!-- Perak Office -->
                <div class="contact-item" style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
                    <div style="color: #1191cc; font-size: 1.5rem; padding-top: 5px;"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">Perak Office</p>
                        <p style="color: #000; font-size: 1.1rem; line-height: 1.6;">Lot 5465B (A), Simpang Empat Pekan Simpang Empat, <br>34400 Semanggol, Perak.</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Direct Contact Details -->
            <div style="width: 50%; display: flex; flex-direction: column; align-items: flex-end; text-align: right;">
                <div style="margin-top: 5rem; width: 100%;">
                    <!-- WhatsApp -->
                    <div class="contact-item" style="margin-bottom: 2.5rem;">
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">WhatsApp Support</p>
                        <p style="color: #000; font-size: 1.1rem; font-weight: 500;">+6017-2240091 / +6011-71117282</p>
                    </div>
                    <!-- Email -->
                    <div class="contact-item" style="margin-bottom: 2.5rem;">
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">Email Inquiry</p>
                        <p style="color: #000; font-size: 1.1rem; font-weight: 500;">sales@abmalaya.com / info@abmalaya.com</p>
                    </div>
                    <div style="margin-top: 1rem;">
                        <a href="/contact" class="hero-link" style="color: #000;">
                            View All Contact Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Neo Brutalist Map Preview -->
    <div style="width: 100%; padding: 0 6vw 80px 6vw;">
        <div class="neo-map-card">
            <div class="map-frame">
                <iframe 
                    src="https://maps.google.com/maps?q=Wisma%20Rampai,%20Jalan%2034/26,%20Taman%20Sri%20Rampai,%2053300%20Kuala%20Lumpur&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="neo-map-footer">
                <div class="map-info-brutal">
                    <i class="fas fa-location-dot"></i>
                    <span>WISMA RAMPAI, KUALA LUMPUR</span>
                </div>
                <a href="https://share.google/mZ37nSVlVNA19gUI3" target="_blank" class="neo-btn-brutal-large">
                    OPEN IN GOOGLE MAPS <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Neo Brutalism Styles for Map */
    .neo-map-card {
        background: #fff;
        border: 4px solid #000;
        box-shadow: 12px 12px 0px #000;
        position: relative;
        transition: all 0.2s ease;
        overflow: hidden;
    }

    .neo-map-card:hover {
        transform: translate(-4px, -4px);
        box-shadow: 16px 16px 0px #000;
    }

    .map-frame {
        height: 500px;
        width: 100%;
        border-bottom: 4px solid #000;
    }

    .neo-map-footer {
        padding: 1.5rem 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8fafc;
    }

    .map-info-brutal {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #000;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.9rem;
    }

    .map-info-brutal i {
        color: #1191cc;
        font-size: 1.4rem;
    }

    .neo-btn-brutal-large {
        background: #1191cc;
        color: #fff;
        padding: 1rem 2.5rem;
        font-weight: 800;
        text-decoration: none;
        border: 3px solid #000;
        box-shadow: 6px 6px 0px #000;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        letter-spacing: 1px;
        font-size: 0.85rem;
        font-family: 'Aeonik', sans-serif;
    }

    .neo-btn-brutal-large:hover {
        transform: translate(-2px, -2px);
        box-shadow: 8px 8px 0px #000;
        background: #004bbd;
    }

    .neo-btn-brutal-large:active {
        transform: translate(2px, 2px);
        box-shadow: 2px 2px 0px #000;
    }

    @media (max-width: 992px) {
        .neo-map-footer {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
            padding: 2rem 1.5rem;
        }
        .map-frame {
            height: 350px;
        }
        .neo-map-card {
            box-shadow: 8px 8px 0px #000;
        }
        .neo-btn-brutal-large {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Final CTA Section with Wisma Rampai Background -->
<section id="cta" style="background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('assets/img/wisma-rampai-front.webp'); background-size: cover; background-position: center; background-attachment: fixed; color: #fff; padding: 120px 0;">
    <div style="width: 100%; padding: 0 6vw;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Left Side -->
            <div style="width: 55%; text-align: left;">
                <h5 style="color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; margin-bottom: 1.5rem; font-family: 'Aeonik', sans-serif;">Reach Us</h5>
                <h2 class="cta-title" style="font-size: 3.5rem; margin-bottom: 2rem; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1.5px; line-height: 1.1;">Ready to Start <br>Your Project?</h2>
                <p style="max-width: 500px; opacity: 0.9; font-size: 1.2rem; line-height: 1.7; font-family: 'Aeonik', sans-serif;">Our experts are ready to provide the best maritime and industrial solutions for your business.</p>
            </div>

            <!-- Right Side -->
            <div style="width: 45%; display: flex; justify-content: flex-end;">
                <a href="/contact" class="hero-link" style="color: #fff; font-size: 1.1rem; border-color: rgba(255,255,255,0.3);">
                    Contact Our Team Now <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Local Embla Carousel -->
<script src="assets/js/embla-carousel.umd.js"></script>
<!-- Home Page Logic -->
<script src="assets/js/index.js?v=5.5"></script>

<?php include 'includes/footer.php'; ?>
