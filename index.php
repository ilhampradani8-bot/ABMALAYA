<?php 
$pageTitle = "Home";
$currentPage = "home";
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<?php 
$heroTitle = "<span style='color: #005ee9;'>We Deliver Tailored Solutions</span> To Meet The Diverse Needs Of Our Clients.";
$heroSubtitle = ""; /* Subtitle merged into Title for impact */
$heroDesc = "AB Malaya Sdn Bhd delivers reliable engineering and logistics services across industries and borders in Kuala Lumpur. <br>Discover seamless management today.";
$showButtons = true;
include 'includes/hero_visual.php';
?>

<!-- Stats / Highlights Section -->
<!-- Client Logos Section -->
<section id="clients" class="client-marquee-section">
    <div class="marquee-container">
        <h5 class="marquee-title">Our Strategic Partners</h5>
        
        <div class="marquee-content">
            <div class="marquee-track">
                <!-- Original Set -->
                <div class="client-logo-item">
                    <a href="https://vecom-marine.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom">
                    </a>
                </div>
                <div class="client-logo-item">
                    <a href="https://www.durachem.com.my/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/durachem-logo.png" alt="Durachem">
                    </a>
                </div>
                <div class="client-logo-item">
                    <a href="https://www.belzona.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/belzona-logo.png" alt="Belzona">
                    </a>
                </div>
                <div class="client-logo-item">
                    <a href="https://www.henkel-adhesives.com/my/en/about/our-brands/loctite.html" target="_blank" rel="noopener">
                        <img src="assets/img/partners/loctite-logo.png" alt="Loctite">
                    </a>
                </div>
                <!-- Duplicate Set for Infinite Loop -->
                <div class="client-logo-item">
                    <a href="https://vecom-marine.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom">
                    </a>
                </div>
                <div class="client-logo-item">
                    <a href="https://www.durachem.com.my/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/durachem-logo.png" alt="Durachem">
                    </a>
                </div>
                <div class="client-logo-item">
                    <a href="https://www.belzona.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/belzona-logo.png" alt="Belzona">
                    </a>
                </div>
                <div class="client-logo-item">
                    <a href="https://www.henkel-adhesives.com/my/en/about/our-brands/loctite.html" target="_blank" rel="noopener">
                        <img src="assets/img/partners/loctite-logo.png" alt="Loctite">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .client-marquee-section {
        background: #fff;
        padding: 100px 0;
        border-bottom: 1px solid #f1f5f9;
        overflow: hidden;
    }
    .marquee-title {
        text-align: center;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.7rem;
        margin-bottom: 4.5rem;
        font-family: 'Aeonik', sans-serif;
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
        animation: marqueeScroll 40s linear infinite;
        transform-style: preserve-3d;
    }
    .client-logo-item {
        flex-shrink: 0;
        cursor: pointer;
        padding: 20px;
        border-radius: 20px;
        background: transparent;
        transition: background 0.4s ease;
        transform-style: preserve-3d;
    }
    .client-logo-item:hover {
        background: #f8fafc;
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
        .marquee-track { gap: 4rem; animation-duration: 25s; }
        .client-logo-item img { height: 45px; }
        .marquee-title { margin-bottom: 2rem; }
        .client-marquee-section { padding: 40px 0; }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<style>
    .mobile-only-logo { display: none; }

    /* Mobile Styles for Partner & About */
    @media (max-width: 768px) {
        .mobile-only-logo { display: flex !important; }
        /* Partner Marquee on Mobile */
        .client-grid-static {
            display: flex !important;
            justify-content: flex-start !important;
            gap: 3rem !important;
            flex-wrap: nowrap !important;
            animation: marqueeMobile 15s linear infinite;
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
        #about h2 { font-size: 2.2rem !important; }
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
            gap: 3rem !important;
        }
        #location div[style*="width: 50%"], 
        #cta div[style*="width: 55%"],
        #cta div[style*="width: 45%"] {
            width: 100% !important;
            padding-right: 0 !important;
            text-align: left !important;
        }
        #location h2, #cta h2 { font-size: 2.2rem !important; }
        #location div[style*="align-items: flex-end"] {
            align-items: flex-start !important;
            text-align: left !important;
        }
        #cta div[style*="justify-content: flex-end"] {
            justify-content: flex-start !important;
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
        box-shadow: 0 30px 60px rgba(0, 94, 233, 0.25);
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
    }

    .embla__slide.is-selected .slide-card:hover .media img {
        transform: scale(1.05);
    }

    .card-sections {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 3rem 2rem;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 60%, transparent 100%);
        z-index: 2;
    }

    .card-caption {
        color: #fff;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1.2rem;
        letter-spacing: -0.5px;
    }

    .card-button {
        display: inline-block;
        padding: 0.7rem 1.4rem;
        background: #005ee9;
        color: #fff;
        text-decoration: none;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(15px);
        will-change: transform, opacity;
    }

    .embla__slide.is-selected .card-button {
        opacity: 1;
        transform: translateY(0);
    }

    .card-button:hover {
        background: #fff;
        color: #005ee9;
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
        background: #005ee9;
        border-color: #005ee9;
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
        background: #005ee9;
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
            height: 23rem; /* Compact height for a perfect zoomed-in preview */
        }
        .card-caption {
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
        }
        .card-sections {
            padding: 2rem 1.25rem;
        }
        .embla__viewport {
            padding: 20px 0;
        }
    }
</style>

<!-- About Brief -->
<section id="about" style="padding: 120px 0; background: #fff;">
    <div style="width: 100%; padding: 0 6vw;"> <!-- Matched Header Padding -->
        <div style="display: flex; justify-content: space-between; align-items: stretch;">
            <!-- Left Half: Exactly 50% -->
            <div style="width: 50%; text-align: left; padding-right: 4rem;">
                <h2 style="font-size: 3.2rem; margin-bottom: 2.5rem; color: #000; font-family: 'Aeonik', sans-serif; font-weight: 700; line-height: 1.1; letter-spacing: -1.5px;">
                    Leading the Way in <br><span style="color: #005ee9;">Industrial Evolution</span>
                </h2>
                <p style="color: #475569; font-size: 1.15rem; line-height: 1.8; font-family: 'Aeonik', sans-serif; width: 100%;">
                    Founded by industry experts to address modern market revolutions, AB Malaya Sdn Bhd delivers first-class services that optimize both operational excellence and financial efficiency. We are the premier choice for businesses seeking high-quality maritime, logistics, and environmental solutions at an exceptional value.
                </p>
            </div>

            <!-- Right Half: Exactly 50% -->
            <div style="width: 50%; display: flex; flex-direction: column; align-items: flex-end; justify-content: space-between; text-align: right;">
                <h5 style="color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; font-family: 'Aeonik', sans-serif; margin-top: 1rem;">Who We Are</h5>
                <div style="margin-top: auto; margin-bottom: 1rem;">
                    <a href="about.php" class="hero-link" style="color: #000; font-size: 0.85rem;">
                        Learn More About Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="service" style="background: #ffffff; padding: 40px 0 20px; overflow: hidden; border-top: 1px solid #f1f5f9;">
    <div class="container">
        <div class="section-title" style="text-align: left; margin-bottom: 3rem;">
            <h5 style="color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; margin-bottom: 0.5rem; font-family: 'Aeonik', sans-serif;">Solutions</h5>
            <h2 style="font-size: 3rem; color: #000; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1.5px; line-height: 1.1;">Integrated Expertise</h2>
        </div>
    </div>
        
    <div class="custom-slider-wrapper">
        <div class="embla" id="embla-services">
            <div class="embla__viewport">
                <div class="embla__container">
                    <!-- Slide 1: Maritime -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800&h=1000" alt="Maritime">
                            </div>
                            <div class="card-sections">
                                <div class="card-caption">Maritime & Subsea</div>
                                <a href="services.php#marine" class="card-button">Know More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Industrial IT -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&h=1000" alt="IT">
                            </div>
                            <div class="card-sections">
                                <div class="card-caption">Industrial IT</div>
                                <a href="services.php#cross" class="card-button">Know More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Green Energy -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=800&h=1000" alt="Energy">
                            </div>
                            <div class="card-sections">
                                <div class="card-caption">Green Energy</div>
                                <a href="services.php#env" class="card-button">Know More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4: Border Logistics -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800&h=1000" alt="Logistics">
                            </div>
                            <div class="card-sections">
                                <div class="card-caption">Border Logistics</div>
                                <a href="services.php#logistics" class="card-button">Know More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: Bio-Solutions -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?q=80&w=800&h=1000" alt="Bio">
                            </div>
                            <div class="card-sections">
                                <div class="card-caption">Bio-Solutions</div>
                                <a href="services.php#env" class="card-button">Know More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 6: Procurement -->
                    <div class="embla__slide">
                        <div class="slide-card">
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&h=1000" alt="Procurement">
                            </div>
                            <div class="card-sections">
                                <div class="card-caption">Procurement</div>
                                <a href="services.php#procurement" class="card-button">Know More</a>
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

<!-- Map & Location Section -->
<section id="location" style="background: #fff; padding: 40px 0 0 0;">
    <div style="width: 100%; padding: 0 6vw;">
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 5rem;">
            <!-- Left Side: Address & Map Info -->
            <div style="width: 50%; padding-right: 4rem;">
                <h5 style="color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; margin-bottom: 1.5rem; font-family: 'Aeonik', sans-serif;">Connect</h5>
                <h2 style="font-size: 3.2rem; color: #000; margin-bottom: 3rem; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1.5px; line-height: 1.1;">Connect with <br>AB Malaya</h2>
                
                <div class="contact-item" style="display: flex; gap: 1.5rem; margin-bottom: 3rem;">
                    <div style="color: #005ee9; font-size: 1.5rem; padding-top: 5px;"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">Office Address</p>
                        <p style="color: #000; font-size: 1.1rem; line-height: 1.6;">2-2-40, Lantai 2 Wisma Rampai, Jalan 34/26, <br>Taman Sri Rampai, 53300 Kuala Lumpur.</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Direct Contact Details -->
            <div style="width: 50%; display: flex; flex-direction: column; align-items: flex-end; text-align: right;">
                <div style="margin-top: 5rem; width: 100%;">
                    <!-- WhatsApp -->
                    <div class="contact-item" style="margin-bottom: 2.5rem;">
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">WhatsApp Support</p>
                        <p style="color: #000; font-size: 1.1rem; font-weight: 500;">+6017-2240091 / +6011-13777282</p>
                    </div>
                    <!-- Email -->
                    <div class="contact-item" style="margin-bottom: 2.5rem;">
                        <p style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 0.5rem;">Email Inquiry</p>
                        <p style="color: #000; font-size: 1.1rem; font-weight: 500;">sales@abmalaya.com / info@abmalaya.com</p>
                    </div>
                    <div style="margin-top: 1rem;">
                        <a href="contact.php" class="hero-link" style="color: #000;">
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.69238304915!2d101.73356!3d3.19323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc382f94e2a39b%3A0xc3411e649e35c24e!2sWisma%20Rampai!5e0!3m2!1sen!2smy!4v1715715545000!5m2!1sen!2smy" 
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
        color: #005ee9;
        font-size: 1.4rem;
    }

    .neo-btn-brutal-large {
        background: #005ee9;
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
<section id="cta" style="background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('assets/img/wisma-rampai-front.png'); background-size: cover; background-position: center; background-attachment: fixed; color: #fff; padding: 120px 0;">
    <div style="width: 100%; padding: 0 6vw;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Left Side -->
            <div style="width: 55%; text-align: left;">
                <h2 class="cta-title" style="font-size: 3.5rem; margin-bottom: 2rem; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1.5px; line-height: 1.1;">Ready to Start <br>Your Project?</h2>
                <p style="max-width: 500px; opacity: 0.9; font-size: 1.2rem; line-height: 1.7; font-family: 'Aeonik', sans-serif;">Our experts are ready to provide the best maritime and industrial solutions for your business.</p>
            </div>

            <!-- Right Side -->
            <div style="width: 45%; display: flex; justify-content: flex-end;">
                <a href="contact.php" class="hero-link" style="color: #fff; font-size: 1.1rem; border-color: rgba(255,255,255,0.3);">
                    Contact Our Team Now <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Embla Carousel CDN -->
<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
<!-- Home Page Logic -->
<script src="assets/js/index.js"></script>

<?php include 'includes/footer.php'; ?>
