<?php 
$pageTitle = "About Us";
$currentPage = "about";
include 'includes/header.php'; 
?>

<!-- GSAP & ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>

<div class="parallax-wrapper">
    <div class="scrollDist"></div>
    <div class="parallax-main">
        <svg viewBox="0 0 1200 800" xmlns="http://www.w3.org/2000/svg" class="parallax-svg" preserveAspectRatio="xMidYMid slice">
            <mask id="m">
                <g class="cloud1">
                    <rect fill="#fff" width="100%" height="801" y="799" />
                    <image xlink:href="https://assets.codepen.io/721952/cloud1Mask.jpg" width="1200" height="800"/>
                </g>
            </mask>
            
            <image class="sky" xlink:href="https://assets.codepen.io/721952/sky.jpg"  width="1200" height="590" />
            <image class="mountBg" xlink:href="https://assets.codepen.io/721952/mountBg.png" width="1200" height="800"/>    
            <image class="mountMg" xlink:href="https://assets.codepen.io/721952/mountMg.png" width="1200" height="800"/>    
            <image class="cloud2" xlink:href="https://assets.codepen.io/721952/cloud2.png" width="1200" height="800"/>    
            <image class="mountFg" xlink:href="https://assets.codepen.io/721952/mountFg.png" width="1200" height="800"/>
            <image class="cloud1" xlink:href="https://assets.codepen.io/721952/cloud1.png" width="1200" height="800"/>
            <image class="cloud3" xlink:href="https://assets.codepen.io/721952/cloud3.png" width="1200" height="800"/>
            
            <text fill="#fff" x="50%" y="300" text-anchor="middle" class="parallax-text-main">ABOUT US</text>
            <text fill="#fff" x="50%" y="380" text-anchor="middle" class="parallax-text-sub-desc">Pioneering the industrial evolution with technical excellence and innovative solutions.</text>
            <polyline class="arrow" fill="#fff" points="599,450 599,489 590,479 590,482 600,492 610,482 610,479 601,489 601,450" />
            
            <g mask="url(#m)">
                <rect fill="#fff" width="100%" height="100%" />      
                <text x="50%" y="300" text-anchor="middle" fill="#005EE9" class="parallax-text-main">ABOUT US</text>
                <text x="50%" y="380" text-anchor="middle" fill="#005EE9" class="parallax-text-sub-desc">Pioneering the industrial evolution with technical excellence and innovative solutions.</text>
            </g>
            
            <rect id="arrow-btn" width="100" height="100" opacity="0" x="550" y="420" style="cursor:pointer"/>
        </svg>
    </div>
</div>

<!-- Our Story Section - Clean White Redesign -->
<section class="our-story clean-white parallax-section" data-speed="0.05">
    <div class="container">
        <div class="story-grid-minimal">
            <!-- Left Side: Detail Content -->
            <div class="story-detail-left">
                <span class="tagline">About Us</span>
                <h2 class="story-title-main">Pioneering Technical <br><span class="text-primary-blue">Excellence</span></h2>
                <div class="story-description-content">
                    <p>The idea to form AB MALAYA Sdn Bhd began when a group of industrial experts from various fields assembled to discuss the current market pressures evolving towards a modern revolution. For years, many national and global entities from large corporations have sought the best ways to receive optimal services while optimizing their financial health.</p>
                    <p>AB Malaya Sdn Bhd focuses its main attention on providing first-class services to realize these agendas. Without neglecting the quality of its services, AB MALAYA is the best choice for businesses looking for high-quality services at affordable prices.</p>
                    <p>AB Malaya Sdn Bhd is a dynamic company specializing in Marine Industrial Services, Cross-Border Logistics, and Environmental Solutions.</p>
                </div>
            </div>

            <!-- Right Side: Brand Visuals -->
            <div class="story-visual-right">
                <div class="brand-showcase">
                    <img src="/assets/img/logo-abmalaya.png" alt="AB MALAYA Logo" class="showcase-logo">
                    <div class="journey-badge-minimal">
                        <span class="badge-subtitle">Our Journey Excellence</span>
                        <div class="badge-main-content">
                            <span class="badge-number">10</span>
                            <span class="badge-years">Years</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Clean White Story Section Styles */
    .our-story.clean-white {
        background: #ffffff;
        padding: 120px 0;
        color: #0f172a;
    }

    .story-grid-minimal {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8rem;
        align-items: center;
    }

    .story-detail-left {
        max-width: 100%;
    }

    .story-title-main {
        font-size: 3.5rem;
        line-height: 1.1;
        margin-bottom: 2.5rem;
        font-weight: 800;
    }

    .text-primary-blue {
        color: var(--primary);
    }

    .story-description-content p {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #475569;
        margin-bottom: 1.5rem;
    }

    .story-visual-right {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .brand-showcase {
        position: relative;
        text-align: center;
        width: 100%;
    }

    .showcase-logo {
        width: 80%;
        max-width: 400px;
        margin: 0 auto;
        opacity: 0.9;
    }

    .journey-badge-minimal {
        margin-top: 3rem;
        display: inline-block;
        text-align: center;
    }

    .badge-subtitle {
        display: block;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.85rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .badge-main-content {
        display: flex;
        align-items: baseline;
        justify-content: center;
        gap: 0.5rem;
    }

    .badge-number {
        font-size: 5rem;
        font-weight: 900;
        line-height: 1;
        color: var(--secondary);
    }

    .badge-years {
        font-size: 1.5rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #94a3b8;
    }

    @media (max-width: 992px) {
        .our-story.clean-white {
            padding: 60px 0;
        }
        .story-grid-minimal {
            grid-template-columns: 1fr;
            gap: 4rem;
            text-align: left;
        }
        .story-title-main {
            font-size: 2.5rem;
        }
        .showcase-logo {
            width: 60%;
            margin: 0;
        }
        .story-visual-right {
            justify-content: flex-start;
        }
    }
</style>

<!-- Vision & Mission - Refined Glassmorphism -->
<!-- Vision & Mission - Metalmorphism Aesthetic -->
<section class="vision-mission-section metal-theme parallax-section" data-speed="0.1">
    <div class="container">
        <div class="vision-mission-grid-tight">
            <!-- Vision Card -->
            <div class="vm-card-metal vision-metal">
                <div class="metal-surface"></div>
                <div class="metal-reflection"></div>
                <div class="vm-content-relative">
                    <div class="vm-icon-metal"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To be the leading innovative provider of marine, logistics, and environmental solutions in the region, focusing on quality, safety, and sustainability.</p>
                </div>
            </div>

            <!-- Mission Card -->
            <div class="vm-card-metal mission-metal">
                <div class="metal-surface surface-dark"></div>
                <div class="metal-reflection reflection-slow"></div>
                <div class="vm-content-relative">
                    <div class="vm-icon-metal icon-accent-chrome"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <ul class="mission-list-metal">
                        <li><i class="fas fa-shield-check"></i> Top-tier expert solutions.</li>
                        <li><i class="fas fa-shield-check"></i> Integrity & responsibility.</li>
                        <li><i class="fas fa-shield-check"></i> Long-term partnerships.</li>
                        <li><i class="fas fa-shield-check"></i> Safety & quality excellence.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Metalmorphism Styles */
    .vision-mission-section.metal-theme {
        background: #0a0c10;
        padding: 150px 0;
        position: relative;
    }

    .vision-mission-grid-tight {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .vm-card-metal {
        position: relative;
        padding: 4rem;
        color: white;
        min-height: 400px;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: transform 0.4s ease;
        z-index: 1;
    }

    .vm-card-metal:hover {
        transform: translateY(-10px);
    }

    .metal-surface {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, 
            #2c3e50 0%, 
            #000000 25%, 
            #2c3e50 50%, 
            #000000 75%, 
            #2c3e50 100%
        );
        background-size: 400% 400%;
        z-index: -2;
        opacity: 0.8;
    }

    .surface-dark {
        background: linear-gradient(135deg, 
            #1a1c20 0%, 
            #050505 50%, 
            #1a1c20 100%
        );
    }

    .metal-reflection {
        position: absolute;
        top: -100%;
        left: -100%;
        width: 300%;
        height: 300%;
        background: linear-gradient(45deg, 
            transparent 0%, 
            rgba(255, 255, 255, 0.05) 45%, 
            rgba(255, 255, 255, 0.2) 50%, 
            rgba(255, 255, 255, 0.05) 55%, 
            transparent 100%
        );
        transform: rotate(-45deg);
        z-index: -1;
        animation: metalShine 6s linear infinite;
    }

    .reflection-slow {
        animation-duration: 8s;
        animation-delay: -2s;
    }

    @keyframes metalShine {
        0% { transform: translateX(-30%) rotate(-45deg); }
        100% { transform: translateX(30%) rotate(-45deg); }
    }

    .vm-icon-metal {
        font-size: 3rem;
        margin-bottom: 2rem;
        background: linear-gradient(to bottom, #ffffff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 10px rgba(255,255,255,0.3));
    }

    .icon-accent-chrome {
        background: linear-gradient(to bottom, #005EE9, #1191CC);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .vm-card-metal h3 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        font-weight: 900;
        letter-spacing: -1px;
        color: #f8fafc;
    }

    .vm-card-metal p {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #94a3b8;
    }

    .mission-list-metal {
        list-style: none;
        padding: 0;
    }

    .mission-list-metal li {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.2rem;
        color: #94a3b8;
    }

    .mission-list-metal li i {
        color: var(--primary);
        margin-top: 5px;
    }

    /* Section Parallax */
    .parallax-section {
        will-change: transform;
    }

    @media (max-width: 768px) {
        .vision-mission-section.metal-theme {
            padding: 60px 0;
        }
        .vm-card-metal {
            padding: 3rem 2rem;
            min-height: auto;
        }
        .vm-card-metal h3 {
            font-size: 2rem;
        }
        .core-values {
            padding: 60px 0;
        }
        .section-header-centered {
            text-align: left;
            margin-bottom: 3rem;
        }
        .section-header-centered h2 {
            font-size: 2.2rem;
        }
        .values-grid {
            text-align: left;
        }
        .value-card {
            text-align: left;
            padding: 2rem;
        }
        .value-icon {
            margin: 0 0 1.5rem 0;
        }
    }
</style>

<!-- Core Values Section -->
<section class="core-values parallax-section" data-speed="0.08">
    <div class="container">
        <div class="section-header-centered">
            <span class="tagline">The AB Way</span>
            <h2>Our Core <span class="text-gradient">Values</span></h2>
            <p>The principles that guide every decision and project we undertake.</p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-shield-halved"></i></div>
                <h4>Integrity & Transparency</h4>
                <p>We believe in honest communication and ethical business practices in every interaction.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-hard-hat"></i></div>
                <h4>Safety First (HSE)</h4>
                <p>Ensuring the health, safety, and environment protection of our workforce and clients.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                <h4>Innovative Excellence</h4>
                <p>Continuously evolving our technical solutions to meet modern industrial challenges.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-users"></i></div>
                <h4>Collaborative Spirit</h4>
                <p>Working as a unified team to deliver superior results for our global partners.</p>
            </div>
        </div>
    </div>
</section>

<!-- High-End CTA Section -->

<style>
    /* About Page Specific Styles */
    :root {
        --primary-gradient: linear-gradient(135deg, #005EE9 0%, #1191CC 100%);
        --dark-overlay: rgba(15, 23, 42, 0.85);
    }

    /* Dramatic Parallax Hero */
    .parallax-wrapper {
        position: relative;
        width: 100%;
        background: #111b29;
        overflow: hidden;
    }

    .scrollDist {
        width: 100%;
        height: 200vh; /* Control how long the parallax lasts */
    }

    .parallax-main {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 1;
        background: #111b29;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .parallax-svg {
        width: 100%;
        height: 100%;
    }

    .parallax-text-main {
        font-family: 'Aeonik', sans-serif;
        font-weight: 900;
        font-size: 80px;
        letter-spacing: 5px;
    }

    .parallax-text-sub-desc {
        font-family: 'Aeonik', sans-serif;
        font-weight: 400;
        font-size: 14px;
        letter-spacing: 2px;
        text-transform: uppercase;
        opacity: 0.8;
    }

    /* Content Transition */
    .content-block {
        position: relative;
        z-index: 10;
        background: var(--background);
        margin-top: 0;
    }

    /* Story Section */
    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6rem;
        align-items: center;
    }

    .tagline {
        color: var(--primary);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        margin-bottom: 1rem;
    }

    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .lead-text {
        font-size: 1.25rem;
        color: var(--text-light);
        margin: 2rem 0;
        line-height: 1.8;
    }

    .story-features {
        display: grid;
        gap: 2rem;
    }

    .story-feature-item {
        display: flex;
        gap: 1.5rem;
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: #eff6ff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .feature-content h4 {
        margin-bottom: 0.5rem;
        color: var(--secondary);
    }

    .feature-content p {
        color: var(--text-light);
        font-size: 0.95rem;
    }

    /* Image Stack Visual */
    .image-stack {
        position: relative;
        padding-bottom: 40px;
    }

    .main-img {
        width: 100%;
        border-radius: 40px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
    }

    .experience-badge {
        position: absolute;
        bottom: 0;
        right: -30px;
        background: var(--primary);
        color: white;
        padding: 2rem;
        border-radius: 30px;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        box-shadow: 0 20px 40px rgba(0, 94, 233, 0.3);
    }

    .experience-badge .number {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1;
    }

    .experience-badge .label {
        font-size: 0.9rem;
        font-weight: 600;
        line-height: 1.4;
        text-transform: uppercase;
    }

    .floating-card {
        position: absolute;
        top: 40px;
        left: -40px;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 700;
        color: var(--secondary);
    }

    .glass-morphism {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    }

    /* Vision Mission */
    .vision-mission-section {
        background: linear-gradient(var(--dark-overlay), var(--dark-overlay)), url('https://images.unsplash.com/photo-1516939884455-1445c8652f83?q=80&w=2000') center/cover fixed;
        padding: 150px 0;
    }

    .vision-mission-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
    }

    .vm-card {
        padding: 4rem;
        color: white;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .vm-icon {
        width: 70px;
        height: 70px;
        background: var(--primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 2.5rem;
    }

    .icon-accent { background: var(--accent); }

    .vm-card h3 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .vm-card p, .vm-card li {
        font-size: 1.15rem;
        line-height: 1.8;
        opacity: 0.9;
    }

    .mission-list {
        list-style: none;
        padding: 0;
    }

    .mission-list li {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.2rem;
    }

    .mission-list li i {
        color: var(--accent);
        margin-top: 5px;
    }

    /* Core Values */
    .section-header-centered {
        text-align: center;
        margin-bottom: 5rem;
    }

    .section-header-centered h2 {
        font-size: 3rem;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1rem; /* Much tighter gap */
        max-width: 1100px;
        margin: 0 auto;
    }

    .value-card {
        background: white;
        padding: 2.5rem 2rem; /* More compact padding */
        border-radius: 24px;
        text-align: center;
        transition: all 0.4s ease;
        border: 1px solid #f1f5f9;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.08);
        border-color: var(--primary);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: #f8fafc;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        color: var(--primary);
        transition: 0.3s;
    }

    .value-card:hover .value-icon {
        background: var(--primary);
        color: white;
    }

    .value-card h4 {
        margin-bottom: 1rem;
        font-size: 1.25rem;
    }

    .value-card p {
        color: var(--text-light);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* CTA Section */
    .about-cta {
        padding-bottom: 100px;
    }

    .cta-glass-card {
        background: var(--primary);
        background: linear-gradient(135deg, #005EE9 0%, #003DA0 100%);
        border-radius: 40px;
        padding: 5rem;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        box-shadow: 0 30px 60px rgba(0, 94, 233, 0.2);
    }

    .cta-content {
        position: relative;
        z-index: 2;
        max-width: 600px;
        color: white;
    }

    .cta-content h2 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        color: white;
    }

    .cta-content .highlight {
        color: var(--accent);
    }

    .cta-content p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2.5rem;
    }

    .cta-actions {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .cta-primary, .cta-secondary {
        padding: 1.2rem 2.5rem;
        border-radius: 50px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .cta-primary {
        background: white;
        color: var(--primary);
    }

    .cta-primary:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .cta-secondary {
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .cta-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
        transform: translateY(-5px);
    }

    .cta-visual {
        position: absolute;
        right: 0;
        top: 0;
        width: 40%;
        height: 100%;
        background: url('/assets/img/kapal-tanker.jpg') center/cover;
        opacity: 0.2;
        mask-image: linear-gradient(to left, black, transparent);
        -webkit-mask-image: linear-gradient(to left, black, transparent);
    }

    .dots-pattern {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(rgba(255, 255, 255, 0.2) 2px, transparent 2px);
        background-size: 30px 30px;
    }

    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .story-grid { gap: 3rem; }
        .experience-badge { right: 0; position: relative; margin-top: 20px; display: inline-flex; }
        .floating-card { left: 0; top: 0; position: relative; margin-bottom: 20px; display: inline-flex; }
    }

    @media (max-width: 992px) {
        .story-grid, .vision-mission-grid { grid-template-columns: 1fr; }
        .vm-card { padding: 2.5rem; }
        .cta-glass-card { padding: 3rem; text-align: center; justify-content: center; }
        .cta-actions { justify-content: center; }
        .cta-visual { display: none; }
        .parallax-text-main { font-size: 40px; }
        .parallax-text-sub { font-size: 12px; letter-spacing: 8px; }
    }

    @media (max-width: 768px) {
        section { padding: 80px 0; }
        .vm-card h3 { font-size: 2rem; }
        .section-header-centered h2 { font-size: 2.2rem; }
    }
</style>

<!-- Add AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize Parallax
    $(function() {
        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.parallax-wrapper',
                start: 'top top',
                end: 'bottom top',
                scrub: 1,
                pin: true,
                pinSpacing: false
            }
        });

        tl.fromTo('.sky', {y: 0}, {y: -200}, 0)
          .fromTo('.cloud1', {y: 100}, {y: -800}, 0)
          .fromTo('.cloud2', {y: -150}, {y: -500}, 0)
          .fromTo('.cloud3', {y: -50}, {y: -650}, 0)
          .fromTo('.mountBg', {y: -10}, {y: -100}, 0)
          .fromTo('.mountMg', {y: -30}, {y: -250}, 0)
          .fromTo('.mountFg', {y: -50}, {y: -600}, 0)
          .to('.parallax-main', {opacity: 0, pointerEvents: 'none', scrollTrigger: {
              trigger: '.our-story',
              start: 'top 80%',
              end: 'top 20%',
              scrub: true
          }}, 0);

        const arrowBtn = document.querySelector('#arrow-btn');

        arrowBtn.addEventListener('mouseenter', () => {
            gsap.to('.arrow', {y: 10, duration: 0.8, ease: 'back.inOut(3)', overwrite: 'auto'});
        });

        arrowBtn.addEventListener('mouseleave', () => {
            gsap.to('.arrow', {y: 0, duration: 0.5, ease: 'power3.out', overwrite: 'auto'});
        });

        arrowBtn.addEventListener('click', () => {
            gsap.to(window, {scrollTo: '.our-story', duration: 1.5, ease: 'power1.inOut'});
        });

        // --- ROBUST PARALLAX LOGIC ---
        
        // Ensure everything is visible immediately
        gsap.set('.vm-card-metal, .value-card, .story-detail-left, .story-visual-right', { opacity: 1, y: 0 });

        // Simple but effective parallax shifts
        gsap.to('.story-visual-right', {
            y: 100,
            scrollTrigger: {
                trigger: '.our-story',
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });

        gsap.to('.vision-metal', {
            y: -50,
            scrollTrigger: {
                trigger: '.vision-mission-section',
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });

        gsap.to('.mission-metal', {
            y: 50,
            scrollTrigger: {
                trigger: '.vision-mission-section',
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });

        gsap.to('.values-grid', {
            y: -30,
            scrollTrigger: {
                trigger: '.core-values',
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });
    });
</script>

<style>
    /* Performance Optimizations */
    .story-detail-left, 
    .story-visual-right, 
    .vm-card-metal, 
    .values-grid,
    .value-card {
        will-change: transform, opacity;
        backface-visibility: hidden;
    }

    .parallax-section {
        position: relative;
        z-index: 2;
        overflow: hidden;
    }

    /* Refined Backgrounds */
    .our-story.clean-white { background: #ffffff; }
    .vision-mission-section.metal-theme { background: #0a0c10; }
    .core-values { background: #f8fafc; padding: 120px 0; }
</style>

<?php include 'includes/footer.php'; ?>
