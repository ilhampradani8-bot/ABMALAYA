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
<section id="clients" style="background: #fff; padding: 50px 0; border-bottom: 1px solid #f1f5f9;">
    <div class="container">
        <h5 style="text-align: center; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.7rem; margin-bottom: 3rem;">Partner</h5>
        
        <div class="client-grid-static" style="display: flex; justify-content: space-between; align-items: center; gap: 2rem; flex-wrap: wrap;">
            <div class="client-logo-item" style="flex: 1; display: flex; justify-content: center; min-width: 150px;">
                <a href="https://vecom-marine.com/" target="_blank" rel="noopener">
                    <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom" style="height: 45px; width: auto; display: block; object-fit: contain;">
                </a>
            </div>
            <div class="client-logo-item" style="flex: 1; display: flex; justify-content: center; min-width: 150px;">
                <a href="https://www.durachem.com.my/" target="_blank" rel="noopener">
                    <img src="assets/img/partners/durachem-logo.png" alt="Durachem" style="height: 45px; width: auto; display: block; object-fit: contain;">
                </a>
            </div>
            <div class="client-logo-item" style="flex: 1; display: flex; justify-content: center; min-width: 150px;">
                <a href="https://www.belzona.com/" target="_blank" rel="noopener">
                    <img src="assets/img/partners/belzona-logo.png" alt="Belzona" style="height: 45px; width: auto; display: block; object-fit: contain;">
                </a>
            </div>
            <div class="client-logo-item" style="flex: 1; display: flex; justify-content: center; min-width: 150px;">
                <a href="https://www.henkel-adhesives.com/my/en/about/our-brands/loctite.html" target="_blank" rel="noopener">
                    <img src="assets/img/partners/loctite-logo.png" alt="Loctite" style="height: 45px; width: auto; display: block; object-fit: contain;">
                </a>
            </div>
            <!-- Duplicates for Mobile Marquee (Hidden on Desktop via CSS) -->
            <div class="client-logo-item mobile-only-logo" style="flex: 1; justify-content: center; min-width: 150px;">
                <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom" style="height: 45px; width: auto; display: block; object-fit: contain;">
            </div>
            <div class="client-logo-item mobile-only-logo" style="flex: 1; justify-content: center; min-width: 150px;">
                <img src="assets/img/partners/durachem-logo.png" alt="Durachem" style="height: 45px; width: auto; display: block; object-fit: contain;">
            </div>
            <div class="client-logo-item mobile-only-logo" style="flex: 1; justify-content: center; min-width: 150px;">
                <img src="assets/img/partners/belzona-logo.png" alt="Belzona" style="height: 45px; width: auto; display: block; object-fit: contain;">
            </div>
            <div class="client-logo-item mobile-only-logo" style="flex: 1; justify-content: center; min-width: 150px;">
                <img src="assets/img/partners/loctite-logo.png" alt="Loctite" style="height: 45px; width: auto; display: block; object-fit: contain;">
            </div>
        </div>
    </div>
</section>

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

    /* Custom 3D Slider CSS - Global */
    .custom-slider-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .slider-container {
        height: 40rem;
        width: 100vw;
        display: flex;
            flex-direction: column; /* Arrows below */
            justify-content: center;
            align-items: center;
            user-select: none;
            position: relative;
        }

        .slider-nav-bottom {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
            z-index: 10;
        }

        .left-arrow, .right-arrow {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
            background: #fff;
        }

        .left-arrow:hover, .right-arrow:hover {
            background: #005ee9;
            border-color: #005ee9;
        }

        .left-arrow:hover i, .right-arrow:hover i {
            color: #fff;
        }

        .left-arrow i, .right-arrow i {
            font-size: 1.2rem;
            color: #000;
        }

        .slider-content {
            height: 30rem;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: visible !important; /* Crucial for peeks */
            position: relative;
            perspective: 1000px;
        }

        .slider-content-background {
            display: none; /* Removed to show side cards clearly */
        }

        .slider-content .slide {
            position: absolute;
            left: 50%;
            height: 28rem;
            width: 20rem;
            background: #000;
            border-radius: 20px;
            z-index: 0;
            transform: translate(-50%, 0) rotateY(0deg) scale(0.8);
            transform-style: preserve-3d;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* Position Classes - Desktop */
        .slide.position-1 {
            left: 5% !important;
            z-index: 1 !important;
            transform: translate(-50%, 0) rotateY(-20deg) scale(0.6) !important;
            opacity: 0.1 !important;
            filter: blur(12px);
        }
        .slide.position-2 {
            left: 25% !important;
            z-index: 2 !important;
            transform: translate(-50%, 0) rotateY(-10deg) scale(0.8) !important;
            opacity: 0.6 !important;
            filter: blur(4px);
        }
        .slide.position-3 {
            left: 50% !important;
            z-index: 4 !important;
            transform: translate(-50%, 0) rotateY(0deg) scale(1) !important;
            opacity: 1 !important;
            filter: blur(0px);
            box-shadow: 0 30px 60px rgba(0,94,233,0.3) !important;
        }
        .slide.position-4 {
            left: 75% !important;
            z-index: 2 !important;
            transform: translate(-50%, 0) rotateY(10deg) scale(0.8) !important;
            opacity: 0.6 !important;
            filter: blur(4px);
        }
        .slide.position-5 {
            left: 95% !important;
            z-index: 1 !important;
            transform: translate(-50%, 0) rotateY(20deg) scale(0.6) !important;
            opacity: 0.1 !important;
            filter: blur(12px);
        }

        /* Mobile Fixes - 3 Card Preview */
        @media screen and (max-width: 768px) {
            .slider-container { height: auto; padding: 2rem 0; }
            .slider-content { height: 24rem; width: 100vw; overflow: visible !important; }
            .slide { width: 14rem; height: 20rem; }
            
            .slide.position-2 { 
                left: 5% !important; 
                opacity: 0.4 !important; 
                transform: translate(-50%, 0) scale(0.75) !important;
                filter: blur(2px);
                z-index: 1 !important;
            }
            .slide.position-4 { 
                left: 95% !important; 
                opacity: 0.4 !important; 
                transform: translate(-50%, 0) scale(0.75) !important;
                filter: blur(2px);
                z-index: 1 !important;
            }
            .slide.position-3 { 
                left: 50% !important; 
                transform: translate(-50%, 0) scale(1) !important;
                z-index: 10 !important;
                opacity: 1 !important;
                filter: blur(0);
            }
            .slide.position-1, .slide.position-5 { display: none; }
            
            .slider-nav-bottom { margin-top: 2rem; }
        }

        /* Card Elements */
        .media {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
        }
        .media img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.6s ease;
        }
        .slide.position-3:hover .media img { transform: scale(1.05); }

        .card-sections {
            position: absolute;
            bottom: 0; left: 0; width: 100%;
            padding: 2.5rem 1.5rem;
            background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
            z-index: 2;
        }

        .card-caption {
            color: #fff;
            font-family: 'Aeonik', sans-serif;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .card-button {
            display: inline-block;
            padding: 0.6rem 1.2rem;
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
            transform: translateY(10px);
        }

        .slide.position-3 .card-button {
            opacity: 1;
            transform: translateY(0);
        }

        .card-button:hover {
            background: #fff;
            color: #005ee9;
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

<!-- Core Services Slider -->
<section id="service" style="background: #ffffff; padding: 80px 0; overflow: hidden; border-top: 1px solid #f1f5f9;">
    <div class="container">
        <div class="section-title" style="text-align: center; margin-bottom: 2.5rem;">
            <h5 style="color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; margin-bottom: 1.5rem; font-family: 'Aeonik', sans-serif;">Solutions</h5>
            <h2 style="font-size: 3rem; color: #000; font-family: 'Aeonik', sans-serif; font-weight: 700; letter-spacing: -1px;">Integrated Expertise</h2>
        </div>
    </div>
        
    <div class="custom-slider-wrapper">
        <div class="slider-container">
            <div class="slider-content" id="slider-content">
                <!-- Slide 1: Maritime -->
                <div class="slide">
                    <div class="media">
                        <img src="https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800&h=1000" alt="Maritime">
                    </div>
                    <div class="card-sections">
                        <div class="lower-section">
                            <div class="card-caption">Maritime & Subsea</div>
                            <a href="services.php#marine" class="card-button">Know More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Industrial IT -->
                <div class="slide">
                    <div class="media">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&h=1000" alt="IT">
                    </div>
                    <div class="card-sections">
                        <div class="lower-section">
                            <div class="card-caption">Industrial IT</div>
                            <a href="services.php#cross" class="card-button">Know More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Green Energy -->
                <div class="slide">
                    <div class="media">
                        <img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=800&h=1000" alt="Energy">
                    </div>
                    <div class="card-sections">
                        <div class="lower-section">
                            <div class="card-caption">Green Energy</div>
                            <a href="services.php#env" class="card-button">Know More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 4: Border Logistics -->
                <div class="slide">
                    <div class="media">
                        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800&h=1000" alt="Logistics">
                    </div>
                    <div class="card-sections">
                        <div class="lower-section">
                            <div class="card-caption">Border Logistics</div>
                            <a href="services.php#logistics" class="card-button">Know More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 5: Bio-Solutions -->
                <div class="slide">
                    <div class="media">
                        <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?q=80&w=800&h=1000" alt="Bio">
                    </div>
                    <div class="card-sections">
                        <div class="lower-section">
                            <div class="card-caption">Bio-Solutions</div>
                            <a href="services.php#env" class="card-button">Know More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 6: Procurement -->
                <div class="slide">
                    <div class="media">
                        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&h=1000" alt="Procurement">
                    </div>
                    <div class="card-sections">
                        <div class="lower-section">
                            <div class="card-caption">Procurement</div>
                            <a href="services.php#procurement" class="card-button">Know More</a>
                        </div>
                    </div>
                </div>

                <div class="slider-content-background"></div>
            </div>
            
            <!-- New Arrow Container Below -->
            <div class="slider-nav-bottom">
                <div class="left-arrow"><i class="fas fa-arrow-left"></i></div>
                <div class="right-arrow"><i class="fas fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted Clients Section -->
<!-- Clients section moved to top -->

<!-- Map & Location Section -->
<section id="location" style="background: #fff; padding: 60px 0 0 0;">
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
    
    <!-- Full-Width Map Preview -->
    <div style="width: 100%; height: 500px; position: relative; border-top: 1px solid #f1f5f9;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.69238304915!2d101.73356!3d3.19323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc382f94e2a39b%3A0xc3411e649e35c24e!2sWisma%20Rampai!5e0!3m2!1sen!2smy!4v1715715545000!5m2!1sen!2smy" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <a href="https://share.google/mZ37nSVlVNA19gUI3" target="_blank" style="position: absolute; bottom: 40px; right: 6vw; background: #005ee9; color: #fff; padding: 1rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.9rem; box-shadow: 0 15px 35px rgba(0,94,233,0.3); display: flex; align-items: center; gap: 0.8rem; z-index: 10;">
            <i class="fas fa-directions"></i> Get Directions
        </a>
    </div>
</section>

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

<!-- Custom Slider Logic -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sliders = document.querySelectorAll(".slide");
    if (sliders.length === 0) return;

    let center = 0; // Start with first slide as active
    
    function updatePositions() {
        sliders.forEach((slide, index) => {
            slide.classList.remove("position-1", "position-2", "position-3", "position-4", "position-5", "position-none");
            
            // Calculate relative positions in a loop
            let diff = index - center;
            
            // Handle negative wrap-around
            if (diff < -2) diff += sliders.length;
            if (diff > 3) diff -= sliders.length;
            
            // Handle specific cases for loop logic (ensure it stays within -2 to 3 range)
            if (diff < -sliders.length / 2) diff += sliders.length;
            if (diff > sliders.length / 2) diff -= sliders.length;

            if (diff === -2) slide.classList.add("position-1");
            else if (diff === -1) slide.classList.add("position-2");
            else if (diff === 0) slide.classList.add("position-3");
            else if (diff === 1) slide.classList.add("position-4");
            else if (diff === 2) slide.classList.add("position-5");
            else slide.classList.add("position-none");
        });
    }

    function leftScroll() {
        center = (center - 1 + sliders.length) % sliders.length;
        updatePositions();
    }

    function rightScroll() {
        center = (center + 1) % sliders.length;
        updatePositions();
    }

    // Event Listeners
    document.querySelector(".left-arrow").addEventListener("click", leftScroll);
    document.querySelector(".right-arrow").addEventListener("click", rightScroll);

    // Initial positioning
    updatePositions();

    // Touch Support
    let touchstartX = 0;
    let touchendX = 0;
    const sliderContent = document.getElementById('slider-content');

    sliderContent.addEventListener('touchstart', e => {
        touchstartX = e.changedTouches[0].screenX;
    }, false);

    sliderContent.addEventListener('touchend', e => {
        touchendX = e.changedTouches[0].screenX;
        handleGesture();
    }, false);

    function handleGesture() {
        if (touchendX < touchstartX - 50) rightScroll();
        if (touchendX > touchstartX + 50) leftScroll();
    }
});
</script>

<?php include 'includes/footer.php'; ?>
