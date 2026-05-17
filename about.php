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
            
            <text fill="#fff" x="50%" y="250" text-anchor="middle" class="parallax-text-main">ABOUT US</text>
            <text fill="#fff" x="50%" y="320" text-anchor="middle" class="parallax-text-sub-desc">ABMALAYA INOVATION</text>
            <polyline class="arrow" fill="#fff" points="599,400 599,439 590,429 590,432 600,442 610,432 610,429 601,439 601,400" />
            
            <g mask="url(#m)">
                <rect fill="#fff" width="100%" height="100%" />      
                <text x="50%" y="250" text-anchor="middle" fill="#0f172a" class="parallax-text-main">STRATING FROM</text>
                <text x="50%" y="320" text-anchor="middle" fill="#0f172a" class="parallax-text-sub-desc">Pioneering the industrial evolution with technical excellence and innovative solutions.</text>
            </g>
            
            <rect id="arrow-btn" width="100" height="100" opacity="0" x="550" y="420" style="cursor:pointer"/>
        </svg>
    </div>
</div>

<!-- Our Story Section - Clean White Redesign -->
<section class="our-story clean-white parallax-section" id="story-section">
    <div class="container">
        <div class="story-grid-minimal">
            <!-- Left Side: Detail Content -->
            <div class="story-detail-left">
                <span class="tagline">Our Roots</span>
                <h2 class="story-title-main">Pioneering Technical Excellence</h2>
                <div class="story-text-container">
                    <div class="story-description-content collapsed" id="story-text">
                        <p>The idea to form AB MALAYA Sdn Bhd began when a group of industrial experts from various fields assembled to discuss the current market pressures evolving towards a modern revolution. For years, many national and global entities from large corporations have sought the best ways to receive optimal services while optimizing their financial health.</p>
                        <div class="hidden-content" id="extra-story-content">
                            <p>AB Malaya Sdn Bhd focuses its main attention on providing first-class services to realize these agendas. Without neglecting the quality of its services, AB MALAYA is the best choice for businesses looking for high-quality services at affordable prices.</p>
                            <p>AB Malaya Sdn Bhd is a dynamic company specializing in Marine Industrial Services, Cross-Border Logistics, and Environmental Solutions.</p>
                        </div>
                    </div>
                    <button class="more-toggle-btn" id="story-toggle" onclick="toggleStoryText()">
                        <span class="btn-label">READ MORE</span>
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Right Side: Brand Visuals -->
            <div class="story-visual-right">
                <div class="brand-showcase">
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
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 100px 0;
        color: #0f172a;
    }

    .story-grid-minimal {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 6rem;
        align-items: center;
        width: 100%;
    }

    .story-title-main {
        font-size: 4rem;
        line-height: 1;
        margin-bottom: 2.5rem;
        font-weight: 800;
        letter-spacing: -2px;
    }

    .story-text-container {
        position: relative;
        max-width: 600px;
    }

    .story-description-content p {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #475569;
        margin-bottom: 1.5rem;
    }

    .hidden-content {
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .story-description-content.expanded .hidden-content {
        max-height: 1000px;
        opacity: 1;
        margin-top: 1rem;
    }

    .more-toggle-btn {
        background: none;
        border: none;
        padding: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
        color: var(--primary);
        font-weight: 700;
        letter-spacing: 2px;
        font-size: 0.85rem;
        cursor: pointer;
        margin-top: 1rem;
        transition: 0.3s;
    }

    .more-toggle-btn:hover {
        opacity: 0.7;
        gap: 1.5rem;
    }

    .more-toggle-btn i {
        font-size: 0.7rem;
        transition: 0.5s;
    }

    .story-description-content.expanded + .more-toggle-btn i {
        transform: rotate(45deg);
    }

    .showcase-logo-faded {
        width: 100%;
        max-width: 300px;
        opacity: 0.05;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        pointer-events: none;
    }

    .badge-number {
        font-size: 8rem;
        font-weight: 900;
        line-height: 1;
        color: #0f172a;
        letter-spacing: -5px;
    }

    .badge-subtitle {
        display: block;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.75rem;
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
            gap: 3rem;
            text-align: left;
        }
        .story-title-main {
            font-size: 2.2rem;
        }
        .story-visual-right {
            justify-content: center;
            text-align: center;
            width: 100%;
        }
        .badge-number {
            font-size: 4.5rem;
        }
        .badge-years {
            font-size: 1.2rem;
        }
        .brand-showcase {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: auto;
        }
    }
</style>

<!-- Vision & Mission - Neumorphic 3D Parallax -->
<section class="vision-mission-section neumorphic-theme parallax-section" id="vision-mission">
    <div class="container-fluid px-lg-5">
        <div class="vm-parallax-grid">
            <!-- Vision Card -->
            <div class="vm-parallax-wrap" data-image="https://images.unsplash.com/photo-1518241353330-0f7941c2d9b5?auto=format&fit=crop&q=80&w=1200">
                <div class="vm-parallax-card neumorphic-card">
                    <div class="vm-parallax-bg neumorphic-bg-overlay"></div>
                    <div class="vm-parallax-info neumorphic-info">
                        <span class="vm-num-top neumorphic-num">01</span>
                        <h3>Visi Kami</h3>
                        <p>Menjadi penyedia solusi kelautan, logistik, dan lingkungan yang inovatif dan terkemuka di kawasan ini, dengan fokus pada kualitas, keselamatan, dan keberlanjutan—sekaligus menjadi sumber daya paling andal.</p>
                    </div>
                </div>
            </div>

            <!-- Mission Card -->
            <div class="vm-parallax-wrap" data-image="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&q=80&w=1200">
                <div class="vm-parallax-card neumorphic-card">
                    <div class="vm-parallax-bg neumorphic-bg-overlay"></div>
                    <div class="vm-parallax-info neumorphic-info">
                        <span class="vm-num-top neumorphic-num">02</span>
                        <h3>Misi Kami</h3>
                        <div class="mission-compact-list">
                            <p>1. Layanan terbaik & solusi ahli.</p>
                            <p>2. Integritas & tanggung jawab lingkungan.</p>
                            <p>3. Kemitraan jangka panjang.</p>
                            <p>4. Kualitas, efektivitas, dan keamanan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Neumorphic Industrial Styles */
    .vision-mission-section.neumorphic-theme {
        background: #e0e9f0; /* Soft Light Blue */
        padding: 120px 0;
        overflow: hidden;
        box-shadow: 
            inset 35px 35px 70px #9bb0c4, 
            inset -35px -35px 70px #ffffff,
            inset 8px 8px 25px rgba(0, 40, 80, 0.08);
    }

    .vm-parallax-grid {
        display: flex;
        justify-content: center;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .vm-parallax-wrap {
        flex: 1;
        height: 520px;
        perspective: 1500px;
        transform-style: preserve-3d;
        cursor: pointer;
    }

    .vm-parallax-card.neumorphic-card {
        position: relative;
        width: 100%;
        height: 100%;
        background-color: #e0e9f0;
        border-radius: 40px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 
            20px 20px 60px #b8c4ce,
            -20px -20px 60px #ffffff;
        transition: 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        transform-style: preserve-3d;
    }

    .neumorphic-bg-overlay {
        position: absolute;
        top: -10%; left: -10%;
        width: 120%; height: 120%;
        background-size: cover;
        background-position: center;
        opacity: 0.3; /* Increased for better visibility */
        filter: grayscale(0.5) brightness(1.1); /* Industrial look but clearer */
        transition: 0.8s ease;
        pointer-events: none;
    }

    /* Add a wash to keep text readable */
    .neumorphic-bg-overlay::after {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(224, 233, 240, 0.9) 20%, rgba(224, 233, 240, 0.4) 100%);
        z-index: 1;
    }

    .neumorphic-info {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        z-index: 2;
    }

    .neumorphic-num {
        position: absolute;
        top: 30px;
        right: 40px;
        font-size: 6rem;
        font-weight: 900;
        color: rgba(0, 94, 233, 0.1);
        letter-spacing: -5px;
    }

    .neumorphic-info h3 {
        color: #2c3e50;
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 20px;
        letter-spacing: -2px;
    }

    .neumorphic-info p {
        color: #5d6d7e;
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 0;
        opacity: 0;
        transform: translateY(20px);
        transition: 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .mission-compact-list p {
        margin-bottom: 5px;
    }

    /* Hover States */
    .vm-parallax-wrap:hover .neumorphic-card {
        box-shadow: 
            10px 10px 30px #b8c4ce,
            -10px -10px 30px #ffffff;
        transform: scale(0.98) translateZ(10px);
    }

    .vm-parallax-wrap:hover .neumorphic-bg-overlay {
        opacity: 0.6;
        filter: grayscale(0) brightness(1);
    }

    .vm-parallax-wrap:hover .neumorphic-info p {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 992px) {
        .vm-parallax-grid { 
            display: block !important;
            padding: 0 15px; 
        }
        .vm-parallax-wrap { 
            height: auto !important; 
            min-height: 400px;
            width: 100% !important; 
            margin-bottom: 30px;
            perspective: 1000px !important; /* Re-enabled for tilt */
            transform-style: preserve-3d !important;
            opacity: 1 !important;
            display: block !important;
        }
        .neumorphic-card {
            transform-style: preserve-3d !important;
            opacity: 1 !important;
            display: flex !important;
            flex-direction: column;
            height: 400px !important;
            transition: transform 0.2s ease-out;
        }
        .neumorphic-info {
            position: absolute !important; /* Back to absolute for better 3D depth */
            top: 0; left: 0;
            height: 100% !important;
            padding: 30px !important;
            opacity: 1 !important;
            justify-content: flex-end !important;
            transform: translateZ(50px) !important; /* Lift text off card */
        }
        .neumorphic-info p { 
            opacity: 1 !important; 
            transform: none !important; 
            display: block !important;
        }
        .neumorphic-num { font-size: 3rem; top: 15px; right: 20px; opacity: 0.1 !important; transform: translateZ(20px); }
        .neumorphic-info h3 { font-size: 2rem; transform: translateZ(40px); }
        .neumorphic-bg-overlay { opacity: 0.4 !important; }
    }

    /* Section Parallax */
    .parallax-section {
        will-change: transform;
    }

    @media (max-width: 768px) {
        .vision-mission-section.neumorphic-theme {
            padding: 60px 0;
        }
        .vm-parallax-wrap {
            height: 350px;
        }
        .vm-parallax-info h3 {
            font-size: 1.8rem;
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
<!-- Core Values - Funky Industrial Accordion -->
<section class="funky-values-section parallax-section">
    <div class="container-fluid px-lg-5">
        <div class="funky-layout">
            <!-- Left Side: Titles -->
            <div class="funky-left">
                <div class="funky-left-inner">
                    <span class="tagline">The AB Way</span>
                    <h1 class="funky-title">Principles of <span class="text-primary-blue">Authority</span></h1>
                    <p class="funky-desc">The foundation of every decision and project we undertake to ensure excellence in every maritime solution.</p>
                </div>
            </div>

            <!-- Right Side: Accordion -->
            <div class="funky-right">
                <div class="funky-app">
                    <div class="funky-app-inner">
                        <!-- Tab 1: Integrity -->
                        <input type="radio" id="tab-1" name="value-buttons" checked>
                        <label for="tab-1">
                            <div class="funky-tab">
                                <h2><i class="fas fa-fingerprint"></i> INTEGRITY</h2>
                                <div class="tab-left">
                                    <i class="fas fa-shield-halved big-icon"></i>
                                    <div class="tab-icon-image"><i class="fas fa-shield-halved"></i></div>
                                </div>
                                <div class="tab-right">
                                    <h3>Honesty & Transparency</h3>
                                    <h4>ETHICAL PRACTICE</h4>
                                    <p>We believe in honest communication and ethical business practices in every interaction.</p>
                                    <button class="funky-btn">Learn More</button>
                                </div>
                            </div>
                        </label>

                        <!-- Tab 2: Safety -->
                        <input type="radio" id="tab-2" name="value-buttons">
                        <label for="tab-2">
                            <div class="funky-tab">
                                <h2><i class="fas fa-hard-hat"></i> SAFETY</h2>
                                <div class="tab-left">
                                    <i class="fas fa-helmet-safety big-icon"></i>
                                    <div class="tab-icon-image"><i class="fas fa-helmet-safety"></i></div>
                                </div>
                                <div class="tab-right">
                                    <h3>Safety First (HSE)</h3>
                                    <h4>PROTECTION FOCUS</h4>
                                    <p>Ensuring the health, safety, and environment protection of all stakeholders.</p>
                                    <button class="funky-btn">Learn More</button>
                                </div>
                            </div>
                        </label>

                        <!-- Tab 3: Innovation -->
                        <input type="radio" id="tab-3" name="value-buttons">
                        <label for="tab-3">
                            <div class="funky-tab">
                                <h2><i class="fas fa-microchip"></i> INNOVATION</h2>
                                <div class="tab-left">
                                    <i class="fas fa-lightbulb big-icon"></i>
                                    <div class="tab-icon-image"><i class="fas fa-lightbulb"></i></div>
                                </div>
                                <div class="tab-right">
                                    <h3>Technical Excellence</h3>
                                    <h4>MODERN SOLUTIONS</h4>
                                    <p>Continuously evolving technical solutions for modern industrial challenges.</p>
                                    <button class="funky-btn">Learn More</button>
                                </div>
                            </div>
                        </label>

                        <!-- Tab 4: Collaboration -->
                        <input type="radio" id="tab-4" name="value-buttons">
                        <label for="tab-4">
                            <div class="funky-tab">
                                <h2><i class="fas fa-users"></i> COLLABORATION</h2>
                                <div class="tab-left">
                                    <i class="fas fa-handshake big-icon"></i>
                                    <div class="tab-icon-image"><i class="fas fa-handshake"></i></div>
                                </div>
                                <div class="tab-right">
                                    <h3>Unified Teamwork</h3>
                                    <h4>GLOBAL PARTNERS</h4>
                                    <p>Working as a unified team to deliver superior results for global partners.</p>
                                    <button class="funky-btn">Learn More</button>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .funky-values-section {
        background: #f8fafc;
        padding: 100px 0;
        min-height: 80vh;
        overflow: hidden;
    }

    .funky-layout {
        display: flex;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .funky-left {
        width: 45%;
        padding-right: 50px;
    }

    .funky-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: #0f172a;
        margin-top: 15px;
        letter-spacing: -2px;
        line-height: 1.1;
    }

    .funky-desc {
        font-size: 1.2rem;
        color: #64748b;
        margin-top: 25px;
        line-height: 1.6;
    }

    .funky-right {
        width: 60%;
        position: relative;
    }

    .funky-app {
        width: 100%;
        max-width: 700px;
        margin-left: auto;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 40px 100px -20px rgba(0,0,0,0.15);
        background: #fff;
        /* Intro animation */
        animation: funky-intro .34s .4s cubic-bezier(1, 1.4, 0.41, 1.01) forwards;
        transform: translateY(-20px) scale(0) rotateX(10deg);
        opacity: 0;
    }

    .funky-app-inner input[type="radio"] {
        display: none;
    }

    .funky-tab {
        width: 100%;
        height: 90px;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        transition: all 0.65s cubic-bezier(1, 0, 0.41, 1.01);
        padding: 20px 40px;
    }

    .funky-tab h2 {
        position: absolute;
        right: 40px;
        top: 35px;
        font-size: 18px;
        font-weight: 800;
        color: #fff;
        margin: 0;
        z-index: 5;
        letter-spacing: 1px;
    }

    .funky-tab h2 i {
        margin-right: 12px;
        opacity: 0.5;
    }

    /* Accordion Logic Fixes */
    input[type="radio"]:checked + label .funky-tab {
        height: 260px; /* Ample room for content */
    }

    input[type="radio"]:checked + label .funky-tab h2 {
        top: 15px; /* Move header out of the way */
        opacity: 0.1; /* Minimalist background label effect */
    }

    input[type="radio"]:checked + label .funky-tab .tab-right {
        top: 75px;
        opacity: 1;
        transition: all .3s .2s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

    input[type="radio"]:not(:checked) + label .funky-tab .tab-right {
        top: 300px;
        opacity: 0;
        transition: all .3s .3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

    /* Colors */
    label:nth-of-type(1) .funky-tab { background: #005EE9; } /* AB Blue */
    label:nth-of-type(2) .funky-tab { background: #0f172a; } /* Dark Slate */
    label:nth-of-type(3) .funky-tab { background: #1e293b; } /* Medium Slate */
    label:nth-of-type(4) .funky-tab { background: #334155; } /* Light Slate */

    label:hover .funky-tab {
        filter: brightness(1.1);
    }

    .tab-right {
        position: absolute;
        width: 75%; /* Wider content area */
        right: 40px;
        text-align: right;
        color: #fff;
    }

    .tab-right h3 { font-size: 1.6rem; font-weight: 800; margin: 0; color: #fff; line-height: 1.1; }
    .tab-right h4 { font-size: 0.85rem; font-weight: 600; color: rgba(255,255,255,0.5); margin: 6px 0; text-transform: uppercase; letter-spacing: 2px; }
    .tab-right p { font-size: 1rem; line-height: 1.5; color: rgba(255,255,255,0.9); margin: 15px 0; max-width: 450px; margin-left: auto; }

    .funky-btn {
        background: transparent;
        border: 2px solid #fff;
        color: #fff;
        padding: 6px 20px;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
    }

    .funky-btn:hover { background: #fff; color: #005EE9; }

    .tab-left {
        position: absolute;
        left: 30px;
        top: 0;
        height: 100%;
        width: 30%;
    }

    .big-icon {
        position: absolute;
        top: 20px;
        left: 400px;
        font-size: 180px;
        opacity: 0.05;
        color: #fff;
        transition: all .3s .3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

    input[type="radio"]:checked + label .big-icon {
        left: 260px;
        opacity: 0.1;
    }

    .tab-icon-image {
        position: absolute;
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 30px;
        top: 200px;
    }

    input[type="radio"]:checked + label .tab-icon-image {
        animation: funky-move-in .55s .05s cubic-bezier(0.455, 0.03, 0.515, 0.955) forwards;
        transition: all .3s .36s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

    input[type="radio"]:not(:checked) + label .tab-icon-image {
        animation: funky-move-out .75s .0s cubic-bezier(0.455, 0.03, 0.515, 0.955) forwards;
        transition: all .3s .3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

    @keyframes funky-move-in {
        0% { top: -200px; }
        100% { top: 60px; }
    }

    @keyframes funky-move-out {
        0% { top: 60px; }
        100% { top: 200px; }
    }

    @keyframes funky-intro {
        0% { transform: translateY(-20px) scale(0) rotateX(10deg); opacity: 0; }
        100% { transform: translateY(0) scale(1) rotateX(0deg); opacity: 1; }
    }

    @media (max-width: 992px) {
        .funky-values-section { padding: 60px 0; }
        .funky-layout { flex-direction: column; text-align: left; padding: 0 25px; }
        .funky-left { width: 100%; padding-right: 0; margin-bottom: 40px; }
        .funky-title { font-size: 2.2rem; }
        .funky-right { width: 100%; }
        .funky-app { margin: 0; width: 100%; max-width: none; }
        
        .funky-tab { padding: 20px; }
        .funky-tab h2 { left: 20px; right: auto; text-align: left; top: 35px; font-size: 14px; }
        
        .tab-left { display: block; width: 60px; left: 10px; opacity: 0.3; }
        .big-icon { font-size: 120px; left: -20px; top: 10px; }
        .tab-icon-image { width: 50px; height: 50px; left: 15px; border-radius: 12px; font-size: 20px; }
        
        .tab-right { text-align: left; width: calc(100% - 80px); left: 80px; right: auto; padding: 0; }
        .tab-right h3 { font-size: 1.1rem; }
        .tab-right h4 { font-size: 0.75rem; }
        .tab-right p { font-size: 0.85rem; margin: 8px 0; max-width: 100%; }
        .funky-btn { padding: 4px 12px; font-size: 0.75rem; }

        input[type="radio"]:checked + label .funky-tab { height: 280px; }
        input[type="radio"]:checked + label .funky-tab h2 { top: 10px; }
        input[type="radio"]:checked + label .funky-tab .tab-right { top: 55px; }
        
        /* Ensure animations work on mobile */
        input[type="radio"]:checked + label .tab-icon-image {
            animation: funky-move-in .55s .05s cubic-bezier(0.455, 0.03, 0.515, 0.955) forwards;
        }
        input[type="radio"]:checked + label .big-icon {
            left: 200px;
            opacity: 0.08;
        }
    }
</style>

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
        background: #ffffff;
        overflow: hidden;
    }

    .scrollDist {
        width: 100%;
        height: 120vh; /* Reduced to snap faster to content */
    }

    .parallax-main {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 1;
        background: #ffffff;
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

<!-- About Page Logic -->
<script src="assets/js/about.js"></script>

<style>
    /* High-End GPU Hardware Acceleration & Performance Optimizations */
    .story-detail-left, 
    .story-visual-right, 
    .neumorphic-card, 
    .vm-parallax-bg,
    .vm-parallax-wrap,
    .funky-tab,
    .funky-app,
    .parallax-main,
    .vision-mission-section.neumorphic-theme {
        will-change: transform, opacity;
        transform: translate3d(0, 0, 0); /* Force GPU Composite Layer creation */
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        perspective: 1000px;
        -webkit-perspective: 1000px;
    }

    .parallax-section {
        position: relative;
        z-index: 10; /* Higher z-index to ensure visibility */
    }

    @media (max-width: 992px) {
        .parallax-section {
            overflow: visible !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
        .vm-parallax-wrap {
            perspective: 1000px !important;
            transform-style: preserve-3d !important;
        }
        .neumorphic-card {
            transform-style: preserve-3d !important;
            backface-visibility: visible !important;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>
