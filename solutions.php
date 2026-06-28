<?php 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$pageTitle = "Our Solutions";
$currentPage = "solutions";
?>


<?php include 'includes/header.php'; ?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Libre+Franklin:wght@300;400;600&family=Roboto+Mono:wght@400;500&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

<style>
/* AB MALAYA - Custom Solutions Theme */
:root {
    --brand-blue: #093863;
    --brand-blue-glow: rgba(9, 56, 98, 0.4);
    --brand-light-blue: #1191cc;
    --dark-bg: #0b0f19;
    --dark-card: rgba(19, 27, 46, 0.85);
    --text-white: #ffffff;
    --text-muted: rgba(255, 255, 255, 0.7);
    --border-color: rgba(255, 255, 255, 0.1);
    --card-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
}

body {
    background-color: var(--dark-bg);
    color: var(--text-white);
}

/* Custom Alignment Overrides for Hero Visual sitemap */
.intro-content .hero-page-map {
    display: grid;
    grid-template-columns: repeat(3, auto);
    column-gap: 50px;
    row-gap: 20px;
    justify-content: flex-start;
    margin-left: 0;
    padding-left: 0;
    margin-top: 35px;
    max-width: 1000px;
}

.intro-content .map-item {
    padding-left: 0;
    padding-right: 12px;
}

.intro-content .map-item::after {
    left: 0;
    right: 12px;
}

/* Interactive Page Map Navigation */
.hero-page-map {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 30px auto 0;
    padding: 0 20px;
    z-index: 5;
    position: relative;
}

.map-item {
    background: transparent;
    border: none;
    padding: 8px 16px;
    border-radius: 0;
    cursor: pointer;
    text-align: left;
    backdrop-filter: none;
    -webkit-backdrop-filter: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: none;
    position: relative;
}

.map-item::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 16px;
    right: 16px;
    height: 1px;
    background: rgba(15, 23, 42, 0.1);
    transition: all 0.3s ease;
}

.map-item:hover::after {
    background: var(--brand-blue);
    box-shadow: none;
}

.map-item:hover {
    transform: translateY(-2px);
    background: transparent;
    box-shadow: none;
}

.map-num {
    font-family: 'Roboto Mono', monospace;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--brand-blue);
}

.map-title {
    font-family: 'Aeonik', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    color: #1a202c;
    letter-spacing: -0.2px;
    transition: color 0.3s ease;
}

.map-item:hover .map-title {
    color: var(--brand-blue);
    text-shadow: none;
}

/* Section Background Parallax Layout */
.solutions-list-container {
    position: relative;
    width: 100%;
}

/* Base Section Styling */
.solution-section {
    position: relative;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow: hidden;
    box-sizing: border-box;
}

/* Dark overlay to maintain content readability */
.solution-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(11, 15, 25, 0.82) 0%, rgba(11, 15, 25, 0.88) 100%);
    z-index: 1;
    pointer-events: none;
}

.solution-grid {
    position: relative;
    z-index: 2; /* Sits above overlay */
    display: grid;
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    box-sizing: border-box;
    align-items: center;
}

/* Desktop: fits screen exactly, fixed background parallax */
@media (min-width: 1025px) {
    .solution-section {
        min-height: 100vh;
        height: auto;
        padding: 80px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-attachment: fixed; /* Parallax curtain overlay */
    }
    .solution-grid {
        grid-template-columns: 1.1fr 0.9fr;
        height: auto;
        padding: 40px 4%;
        gap: 60px;
    }
}

/* Tablet & Mobile: flows naturally, scroll background */
@media (max-width: 1024px) {
    .solution-section {
        min-height: auto !important;
        height: auto !important;
        display: block !important;
        overflow: visible !important;
        background-attachment: scroll; /* Fallback for touch scrolls */
    }
    .solution-grid {
        grid-template-columns: 1fr;
        padding: 50px 20px 30px;
        gap: 25px;
    }
}

/* Left Content Column */
.solution-content-col {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.solution-badge {
    font-family: 'Roboto Mono', monospace;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--brand-light-blue);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
    display: inline-block;
}

.solution-title {
    font-family: 'Aeonik', sans-serif;
    font-size: 2.8rem;
    font-weight: 800;
    letter-spacing: -1px;
    line-height: 1.1;
    color: #fff;
    margin-bottom: 25px;
}

.solution-desc {
    font-family: 'Libre Franklin', sans-serif;
    font-size: 1.05rem;
    line-height: 1.65;
    color: var(--text-muted);
    margin-bottom: 35px;
}

/* Inner Tabbed Interface for Sub-Services */
.sub-tab-wrapper {
    display: flex;
    flex-direction: column;
    gap: 25px;
    width: 100%;
}

.sub-tab-nav {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 12px;
    scrollbar-width: none;
}

.sub-tab-nav::-webkit-scrollbar {
    display: none;
}

.sub-tab-btn {
    background: rgba(19, 27, 46, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.02);
    padding: 10px 20px;
    border-radius: 30px;
    color: rgba(255, 255, 255, 0.65);
    font-family: 'Aeonik', sans-serif;
    font-size: 0.88rem;
    font-weight: 700;
    cursor: pointer;
    white-space: nowrap;
    box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3), -3px -3px 6px rgba(255, 255, 255, 0.02);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.sub-tab-btn:hover {
    color: #fff;
    background: rgba(19, 27, 46, 0.8);
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4), -1px -1px 3px rgba(255, 255, 255, 0.02);
}

.sub-tab-btn.active {
    background: #09101c !important; /* Sunken background color */
    border-color: rgba(255, 255, 255, 0.01) !important;
    color: var(--brand-light-blue) !important;
    box-shadow: inset 4px 4px 8px rgba(0, 0, 0, 0.7), inset -3px -3px 8px rgba(255, 255, 255, 0.03) !important;
}

.sub-tab-contents {
    position: relative;
    width: 100%;
}

.sub-tab-pane {
    display: none;
    background: var(--dark-card);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 35px;
    box-shadow: var(--card-shadow);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}

.sub-tab-pane.active {
    display: block;
    animation: tabFadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes tabFadeIn {
    0% {
        opacity: 0;
        transform: translateY(12px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.pane-title {
    font-family: 'Aeonik', sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 15px;
    border-left: 4px solid var(--brand-blue);
    padding-left: 15px;
}

.pane-desc {
    font-family: 'Libre Franklin', sans-serif;
    font-size: 0.98rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.8);
}

/* Bullet list inside tab panes */
.bullet-list {
    margin-top: 15px;
    padding-left: 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 10px;
    list-style-type: none;
}

.bullet-list li {
    font-family: 'Libre Franklin', sans-serif;
    font-size: 0.92rem;
    color: rgba(255, 255, 255, 0.85);
    position: relative;
    padding-left: 18px;
}

.bullet-list li::before {
    content: '→';
    color: var(--brand-light-blue);
    position: absolute;
    left: 0;
    font-size: 1.1rem;
    line-height: 1.3;
    top: -1px;
    font-weight: 900;
    text-shadow: 0 0 8px rgba(17, 145, 204, 0.4);
}

/* Right 3D Image Column */
.solution-image-col {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 100%;
}

.graphic-3d-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 480px;
    height: 480px;
    opacity: 0;
    transform: translateX(120px);
    transition: opacity 0.8s cubic-bezier(0.25, 1, 0.5, 1), transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
}

.solution-section.in-view .graphic-3d-wrapper {
    opacity: 1;
    transform: translateX(0);
}

.floating-3d-graphic {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: drop-shadow(0 25px 50px var(--brand-blue-glow));
    pointer-events: none;
}

/* Floating Vertical Progress & Dots Indicator (Right side) */
.solutions-progress-indicator {
    position: fixed;
    right: 40px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 999;
    pointer-events: none; /* Allow mouse events to pass through the wrapper */
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

.solutions-progress-indicator.visible {
    opacity: 1;
    visibility: visible;
}

.progress-line-track {
    width: 2px;
    height: 220px;
    background: rgba(255, 255, 255, 0.1);
    position: relative;
    border-radius: 10px;
}

.progress-line-fill {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0%;
    background: var(--brand-blue);
    border-radius: 10px;
    transition: height 0.1s ease-out;
}

.indicator-dots {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    height: 100%;
    width: 12px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.indicator-dot-item {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #202b42;
    border: 2px solid rgba(255, 255, 255, 0.2);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    pointer-events: auto; /* React to clicks */
}

.indicator-dot-item.active {
    background: var(--brand-blue);
    border-color: var(--brand-blue);
    transform: scale(1.4);
    box-shadow: 0 0 10px var(--brand-blue);
}

.indicator-dot-item:hover {
    border-color: #fff;
    transform: scale(1.2);
}

.dot-label {
    position: absolute;
    right: 25px;
    top: 50%;
    transform: translateY(-50%) translateX(25px);
    background: transparent;
    border: none;
    padding: 0;
    border-radius: 0;
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.8rem;
    font-family: 'Aeonik', sans-serif;
    font-weight: 700;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s cubic-bezier(0.25, 1, 0.5, 1), transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    pointer-events: none;
    box-shadow: none;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.indicator-dot-item.active .dot-label,
.indicator-dot-item:hover .dot-label {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) translateX(0);
    color: #fff;
    text-shadow: 0 0 10px var(--brand-blue-glow);
}

/* Responsive Adjustments */
@media (max-width: 1199px) {
    .solution-title {
        font-size: 2.3rem;
    }
}

/* Height-based desktop adjustments for smaller laptop screens */
@media (max-height: 850px) and (min-width: 1025px) {
    .solution-grid {
        padding: 30px 4% !important;
        gap: 40px !important;
    }
    .solution-title {
        font-size: 2.2rem !important;
        margin-bottom: 15px !important;
    }
    .solution-desc {
        margin-bottom: 20px !important;
        font-size: 0.95rem !important;
    }
    .sub-tab-wrapper {
        gap: 15px !important;
    }
    .sub-tab-pane {
        padding: 20px 25px !important;
    }
    .pane-title {
        font-size: 1.2rem !important;
        margin-bottom: 10px !important;
    }
    .pane-desc {
        font-size: 0.9rem !important;
    }
    .bullet-list {
        margin-top: 10px !important;
        gap: 8px !important;
    }
    .graphic-3d-wrapper {
        max-width: 380px !important;
        height: 380px !important;
    }
}

@media (max-width: 1024px) {
    .intro-content .hero-page-map {
        margin-top: 25px;
        grid-template-columns: repeat(2, 1fr);
        display: grid;
        gap: 15px;
        max-width: 100%;
    }
    .intro-content .map-item {
        padding: 8px 12px;
        justify-content: flex-start;
    }
    .intro-content .map-item::after {
        left: 0;
        right: 0;
    }
    .solution-image-col {
        height: auto;
        padding: 20px 0;
    }
    .graphic-3d-wrapper {
        height: 300px;
    }
    .solutions-progress-indicator {
        display: none;
    }
}

@media (max-width: 575px) {
    .intro-content .hero-page-map {
        grid-template-columns: 1fr;
        gap: 10px;
    }
}

/* Mobile Title & 3D Inline Container */
.solution-title-container {
    display: block;
    width: 100%;
}

.mobile-3d-wrapper {
    display: none;
}

/* Hide Read More button by default on desktop/tablet */
.read-more-btn {
    display: none;
}

/* Mobile-specific UI scaling and text collapsing */
@media (max-width: 767px) {
    .solution-section {
        min-height: auto !important;
        height: auto !important;
        overflow: visible !important; /* Prevent any clipping of section contents */
    }

    .solution-title-container {
        display: flex !important;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .solution-title-container .solution-title {
        flex: 1;
        margin-bottom: 0 !important;
        text-align: left;
        font-size: 1.8rem !important; /* Fit text size perfectly to screen */
    }
    
    .mobile-3d-wrapper {
        display: block !important;
        flex-shrink: 0;
        width: 75px;
        height: 75px;
        position: relative;
    }
    
    .mobile-3d-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 8px 16px var(--brand-blue-glow));
    }
    
    /* Hide desktop image column on mobile */
    .solution-image-col {
        display: none !important;
    }

    .solution-grid {
        padding: 35px 16px 20px !important; /* Completely eliminate excess top spacing */
        gap: 15px !important;
    }
    
    .solution-desc.collapsible-desc {
        max-height: 185px; /* Allow text to be fuller first */
        overflow: hidden;
        position: relative;
        transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }
    
    .solution-desc.collapsible-desc::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40px;
        background: linear-gradient(to bottom, transparent, #0b0f19);
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
    
    .solution-desc.collapsible-desc.expanded {
        max-height: 1200px;
    }
    
    .solution-desc.collapsible-desc.expanded::after {
        opacity: 0;
    }
    
    .read-more-btn {
        background: transparent;
        border: none;
        color: var(--brand-light-blue);
        font-family: 'Aeonik', sans-serif;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex !important; /* Force displays on mobile */
        align-items: center;
        gap: 6px;
        margin-top: 5px;
        margin-bottom: 15px;
        padding: 5px 0;
        transition: color 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        pointer-events: auto;
    }
    
    .read-more-btn:hover {
        color: #fff;
    }
    
    /* Clean, non-overflowing Sub-Tab layout for mobile */
    .sub-tab-wrapper {
        width: 100% !important;
        box-sizing: border-box !important;
        gap: 15px !important;
    }

    .sub-tab-nav {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important; /* 2-column grid instead of horizontal scroll */
        gap: 8px !important;
        overflow-x: visible !important;
        padding-bottom: 0 !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }

    .sub-tab-btn {
        padding: 8px 10px !important;
        font-size: 0.78rem !important;
        line-height: 1.25 !important;
        text-align: center !important;
        white-space: normal !important; /* Allow text wrapping to prevent screen clipping */
        word-break: break-word !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        min-height: 38px !important;
        border-radius: 8px !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }

    /* Auto-span the last button if the button count is odd (symmetrical alignment) */
    .sub-tab-btn:last-child:nth-child(odd) {
        grid-column: span 2 !important;
    }
    
    .sub-tab-contents {
        width: 100% !important;
        box-sizing: border-box !important;
    }

    .sub-tab-pane {
        width: 100% !important;
        box-sizing: border-box !important;
        padding: 15px !important;
        border-radius: 12px !important;
    }
    
    .pane-title {
        font-size: 1.15rem !important;
        padding-left: 10px !important;
        margin-bottom: 10px !important;
    }
    
    .pane-desc {
        font-size: 0.9rem !important;
    }
    
    .bullet-list {
        grid-template-columns: 1fr !important; /* Force single column on mobile */
        gap: 8px !important;
    }
    
    .bullet-list li {
        font-size: 0.88rem !important;
    }
}
</style>

<?php
$heroTitle = "<span style='color: #093863;'>Our Solutions</span>";
$heroSubtitle = "SPECIALIZED DIVISIONS";
$heroDesc = "Interactive guide to AB Malaya's specialized divisions. Select a capability below to jump to detail planning, mechanical, logistics, or corrosion prevention solutions.";
$showButtons = false;

// Prepare the custom sitemap content for injecting inside the hero container
ob_start();
?>
<div class="hero-page-map">
    <div class="map-item" onclick="scrollToSection('#strategic-consultant')">
        <div class="map-num">01</div>
        <div class="map-title">Strategic Consultant</div>
    </div>
    <div class="map-item" onclick="scrollToSection('#contractor-engineering')">
        <div class="map-num">02</div>
        <div class="map-title">Contractor & Engineering</div>
    </div>
    <div class="map-item" onclick="scrollToSection('#marine-services')">
        <div class="map-num">03</div>
        <div class="map-title">Marine Services</div>
    </div>
    <div class="map-item" onclick="scrollToSection('#logistics-services')">
        <div class="map-num">04</div>
        <div class="map-title">Logistics Services</div>
    </div>
    <div class="map-item" onclick="scrollToSection('#corrosion-management')">
        <div class="map-num">05</div>
        <div class="map-title">Corrosion Management</div>
    </div>
    <div class="map-item" onclick="scrollToSection('#digital-it-solutions')">
        <div class="map-num">06</div>
        <div class="map-title">Digital & IT</div>
    </div>
</div>
<?php
$customHeroContent = ob_get_clean();
include 'includes/hero_visual.php';
?>

<div class="solutions-page-container">

    <div class="solutions-list-container">
        
        <!-- SECTION 1: Project Strategic Consultant -->
        <section class="solution-section" id="strategic-consultant" style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1200');">
            <div class="solution-grid">
                <div class="solution-content-col">
                    <span class="solution-badge">01 / Strategic Advisor</span>
                    <div class="solution-title-container">
                        <h2 class="solution-title">Project Strategic Consultant</h2>
                        <div class="mobile-3d-wrapper">
                            <img src="assets/img/service3d/lanscape.webp" class="floating-3d-graphic" alt="Project Strategic Consultation">
                        </div>
                    </div>
                    <div class="solution-desc">
                        We provide strategic consultation services to support businesses, investors, project owners, and entrepreneurs in transforming ideas into viable and sustainable ventures. Our expertise spans project planning, business expansion, regulatory compliance, funding facilitation, and long-term growth strategies.
                    </div>
                    
                    <div class="sub-tab-wrapper">
                        <div class="sub-tab-contents">
                            <div class="sub-tab-pane active" data-pane="strategic-overview">
                                <h3 class="pane-title">Key Areas of Expertise</h3>
                                <ul class="bullet-list" style="grid-template-columns: 1fr;">
                                    <li>Project feasibility evaluation and strategic planning</li>
                                    <li>Business growth and expansion strategies</li>
                                    <li>Government grants and financing facilitation</li>
                                    <li>Regulatory approvals, permits, and licensing support</li>
                                    <li>Stakeholder engagement and coordination</li>
                                    <li>Risk assessment and project viability analysis</li>
                                    <li>Business restructuring and recovery planning</li>
                                    <li>Implementation roadmaps and project execution strategies</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Whether you are launching a new venture, expanding an existing business, overcoming operational challenges, or rebuilding after setbacks, we provide practical guidance and strategic solutions that support sustainable growth and successful project delivery.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-image-col">
                    <div class="graphic-3d-wrapper">
                        <img src="assets/img/service3d/lanscape.webp" class="floating-3d-graphic" alt="Project Strategic Consultation">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: Contractor & Engineering Services -->
        <section class="solution-section" id="contractor-engineering" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&q=80&w=1200');">
            <div class="solution-grid">
                <div class="solution-content-col">
                    <span class="solution-badge">02 / Construction & Engineering</span>
                    <div class="solution-title-container">
                        <h2 class="solution-title">Contractor & Engineering Services</h2>
                        <div class="mobile-3d-wrapper">
                            <img src="assets/img/service3d/civil.webp" class="floating-3d-graphic" alt="Contractor & Engineering">
                        </div>
                    </div>
                    <div class="solution-desc">
                        We deliver integrated contractor and engineering solutions across a wide range of industries, supporting clients from project planning and technical evaluation through to execution, commissioning, and long-term operational support. Our expertise encompasses commercial and industrial construction, civil infrastructure works, mechanical and electrical engineering systems, asset enhancement, and specialized engineering solutions tailored to project-specific requirements.
                        <br><br>
                        With a strong emphasis on quality, safety, regulatory compliance, and operational efficiency, we work closely with clients, consultants, developers, and stakeholders to ensure every project is executed to the highest professional standards. By combining technical expertise, industry knowledge, and practical project delivery experience, we provide reliable engineering solutions that enhance performance, optimize resources, and support sustainable project outcomes.
                    </div>
                    
                    <!-- Inner Tabbed System to save space -->
                    <div class="sub-tab-wrapper">
                        <div class="sub-tab-nav">
                            <button class="sub-tab-btn active" data-tab="building">Building</button>
                            <button class="sub-tab-btn" data-tab="civil">Civil</button>
                            <button class="sub-tab-btn" data-tab="mechanical">Mechanical</button>
                            <button class="sub-tab-btn" data-tab="electrical">Electrical</button>
                            <button class="sub-tab-btn" data-tab="marine-eng">Marine Eng</button>
                        </div>
                        
                        <div class="sub-tab-contents">
                            <!-- Pane 1 -->
                            <div class="sub-tab-pane active" data-pane="building">
                                <h3 class="pane-title">Building Construction</h3>
                                <p class="pane-desc">We provide comprehensive building construction solutions for commercial, industrial, institutional, and infrastructure developments, delivering projects from site preparation through to completion and handover.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Scope of Services:</p>
                                <ul class="bullet-list">
                                    <li>Structural construction works</li>
                                    <li>Architectural and finishing works</li>
                                    <li>Refurbishment and renovation projects</li>
                                    <li>Interior fit-out solutions</li>
                                    <li>Facility upgrading and enhancement works</li>
                                    <li>Building maintenance programs</li>
                                    <li>Project coordination and construction management</li>
                                    <li>Quality, safety, and compliance management</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">We are committed to delivering durable, functional, and cost-effective built environments that support long-term operational performance and asset value.</p>
                            </div>
                            
                            <!-- Pane 2 -->
                            <div class="sub-tab-pane" data-pane="civil">
                                <h3 class="pane-title">Civil Engineering</h3>
                                <p class="pane-desc">Our civil engineering capabilities cover a broad spectrum of infrastructure development works, supporting both public and private sector projects. We deliver reliable civil engineering solutions that form the foundation of successful developments, from site preparation through to infrastructure completion.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Scope of Services:</p>
                                <ul class="bullet-list">
                                    <li>Earthworks and site preparation</li>
                                    <li>Site clearing and ground development</li>
                                    <li>Road and pavement construction</li>
                                    <li>Drainage and stormwater management systems</li>
                                    <li>Infrastructure development works</li>
                                    <li>Utility and site support works</li>
                                    <li>Project coordination and execution</li>
                                    <li>Quality, safety, and regulatory compliance</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Backed by experienced engineering personnel and project teams, we are committed to delivering durable, cost-effective, and technically sound civil engineering solutions that support long-term asset performance and project success.</p>
                            </div>

                            <!-- Pane 3 -->
                            <div class="sub-tab-pane" data-pane="mechanical">
                                <h3 class="pane-title">Mechanical Engineering</h3>
                                <p class="pane-desc">We specialise in comprehensive mechanical engineering solutions for commercial, industrial, and specialised facilities. Our services are designed to ensure operational reliability, system efficiency, and long-term performance throughout the entire asset lifecycle.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Scope of Services:</p>
                                <ul class="bullet-list">
                                    <li>HVAC Systems</li>
                                    <li>Fire Protection Systems</li>
                                    <li>Industrial Piping Works</li>
                                    <li>Mechanical Fabrication</li>
                                    <li>Testing & Commissioning</li>
                                    <li>Preventive Maintenance Programs</li>
                                    <li>Shutdown and Turnaround Support</li>
                                    <li>Mechanical Technical Personnel Deployment</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Supported by competent and highly experienced technical personnel, we deliver mechanical engineering solutions that meet industry standards, project specifications, and operational requirements while maintaining the highest levels of safety and quality.</p>
                            </div>

                            <!-- Pane 4 -->
                            <div class="sub-tab-pane" data-pane="electrical">
                                <h3 class="pane-title">Electrical Engineering</h3>
                                <p class="pane-desc">Our electrical engineering services provide end-to-end solutions for industrial, commercial, and infrastructure facilities. We combine technical expertise with practical execution to ensure safe, efficient, and reliable electrical system performance.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Scope of Services:</p>
                                <ul class="bullet-list">
                                    <li>Industrial Electrical Installation</li>
                                    <li>Power Distribution Systems</li>
                                    <li>Lighting Systems</li>
                                    <li>Preventive Electrical Maintenance</li>
                                    <li>Troubleshooting and Fault Rectification</li>
                                    <li>Electrical System Upgrades</li>
                                    <li>Testing & Commissioning</li>
                                    <li>Electrical Technical Personnel Deployment</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">With experienced technical personnel and a commitment to engineering excellence, we support clients in maintaining reliable electrical systems, reducing operational risks, and improving overall efficiency.</p>
                            </div>

                            <!-- Pane 5 -->
                            <div class="sub-tab-pane" data-pane="marine-eng">
                                <h3 class="pane-title">Marine Engineering</h3>
                                <p class="pane-desc">We provide specialised marine and offshore engineering support services for vessels, marine facilities, and offshore assets. Our focus is on maintaining operational readiness, system reliability, and compliance with industry standards in demanding marine environments.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Scope of Services:</p>
                                <ul class="bullet-list">
                                    <li>Mechanical System Repair & Maintenance</li>
                                    <li>Electrical System Repair & Maintenance</li>
                                    <li>Structural Repair Works</li>
                                    <li>Vessel Servicing Support</li>
                                    <li>Offshore Asset Maintenance</li>
                                    <li>Inspection & Technical Support Services</li>
                                    <li>Shutdown and Maintenance Activities</li>
                                    <li>Marine Technical Personnel Deployment</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Supported by a highly competent and experienced technical workforce, we deliver reliable marine engineering solutions that help clients maintain safe, efficient, and uninterrupted operations throughout the service life of their assets.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-image-col">
                    <div class="graphic-3d-wrapper">
                        <img src="assets/img/service3d/civil.webp" class="floating-3d-graphic" alt="Contractor & Engineering">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: Marine Services -->
        <section class="solution-section" id="marine-services" style="background-image: url('assets/img/kapal-tanker.jpg');">
            <div class="solution-grid">
                <div class="solution-content-col">
                    <span class="solution-badge">03 / Marine Operations</span>
                    <div class="solution-title-container">
                        <h2 class="solution-title">Marine Services</h2>
                        <div class="mobile-3d-wrapper">
                            <img src="assets/img/service3d/marine.webp" class="floating-3d-graphic" alt="Marine Services">
                        </div>
                    </div>
                    <div class="solution-desc">
                        AB Malaya provides comprehensive marine support services for vessel operators, ship owners, offshore contractors, and marine industry stakeholders. Our services are designed to support day-to-day vessel operations, maintenance activities, offshore projects, and operational requirements through reliable supply chain management, technical support, and marine logistics solutions.
                        <br><br>
                        With a strong understanding of marine operational demands, safety requirements, and industry standards, we are committed to delivering responsive, dependable, and cost-effective solutions that help clients maintain operational continuity, optimize asset performance, and minimize downtime.
                    </div>
                    
                    <!-- Inner Tabbed System -->
                    <div class="sub-tab-wrapper">
                        <div class="sub-tab-nav">
                            <button class="sub-tab-btn active" data-tab="marine-solutions">Consumable Supply</button>
                            <button class="sub-tab-btn" data-tab="consumables">Crew Logistics</button>
                            <button class="sub-tab-btn" data-tab="crew">Marine Chemicals</button>
                        </div>
                        
                        <div class="sub-tab-contents">
                            <!-- Pane 1 -->
                            <div class="sub-tab-pane active" data-pane="marine-solutions">
                                <h3 class="pane-title">Consumable Supply</h3>
                                <p class="pane-desc">We provide reliable sourcing and supply solutions for a wide range of marine consumables required to support vessel operations, maintenance activities, and offshore projects. Our supply services are focused on ensuring product quality, timely delivery, and compliance with operational requirements to minimize disruption and maintain operational readiness.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Products & Supply Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Machinery and spare parts</li>
                                    <li>Industrial tools and equipment</li>
                                    <li>Lifting and rigging equipment</li>
                                    <li>Personal protective equipment (PPE) and safety products</li>
                                    <li>General vessel consumables</li>
                                    <li>Maintenance and operational supplies</li>
                                    <li>Technical consumables for marine and offshore applications</li>
                                    <li>Project-based procurement support</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Through our established supplier network and procurement capabilities, we assist clients in obtaining dependable products that meet industry standards and operational expectations.</p>
                            </div>
                            
                            <!-- Pane 2 -->
                            <div class="sub-tab-pane" data-pane="consumables">
                                <h3 class="pane-title">Crew Logistics & Transportation</h3>
                                <p class="pane-desc">We provide comprehensive crew logistics and transportation support to facilitate the efficient movement of personnel between vessels, offshore installations, ports, airports, and operational facilities. Our services are designed to ensure smooth crew transitions while maintaining operational schedules and minimizing logistical challenges.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Crew sign-on and sign-off coordination</li>
                                    <li>Port and airport transportation services</li>
                                    <li>Vessel transfer arrangements</li>
                                    <li>Logistics planning and coordination</li>
                                    <li>Emergency crew mobilization support</li>
                                    <li>Crew movement scheduling and management</li>
                                    <li>Offshore personnel transportation support</li>
                                    <li>Operational and project logistics assistance</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">With a strong focus on reliability, responsiveness, and operational efficiency, we help clients manage crew movements safely and effectively in accordance with project and operational requirements.</p>
                            </div>

                            <!-- Pane 3 -->
                            <div class="sub-tab-pane" data-pane="crew">
                                <h3 class="pane-title">Marine Chemicals & Maintenance</h3>
                                <p class="pane-desc">We supply industrial-grade marine chemical solutions and maintenance products designed to support equipment reliability, system performance, and operational efficiency across marine and offshore environments. Our solutions are sourced from trusted manufacturers and selected to meet the demanding requirements of vessel operations and maintenance programs.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Products & Solutions:</p>
                                <ul class="bullet-list">
                                    <li>Boiler water treatment chemicals</li>
                                    <li>Cooling water treatment solutions</li>
                                    <li>Maintenance chemicals</li>
                                    <li>Industrial cleaning solutions</li>
                                    <li>Water testing kits and equipment</li>
                                    <li>Corrosion prevention solutions</li>
                                    <li>Equipment protection chemicals</li>
                                    <li>Operational maintenance consumables</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">In addition to product supply, we assist clients in selecting appropriate chemical solutions that support preventive maintenance strategies, equipment protection, regulatory compliance, and long-term asset performance.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-image-col">
                    <div class="graphic-3d-wrapper">
                        <img src="assets/img/service3d/marine.webp" class="floating-3d-graphic" alt="Marine Services">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: Logistics Services -->
        <section class="solution-section" id="logistics-services" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=1200');">
            <div class="solution-grid">
                <div class="solution-content-col">
                    <span class="solution-badge">04 / Supply Chain</span>
                    <div class="solution-title-container">
                        <h2 class="solution-title">Logistics Services</h2>
                        <div class="mobile-3d-wrapper">
                            <img src="assets/img/service3d/logistics.webp" class="floating-3d-graphic" alt="Logistics Services">
                        </div>
                    </div>
                    <div class="solution-desc">
                        AB Malaya provides integrated logistics solutions designed to support the efficient movement of goods, equipment, materials, and personnel across Malaysia, Singapore, Thailand, and Indonesia. Through effective planning, regional coordination, and responsive execution, we help clients streamline supply chain operations and maintain continuity across multiple locations and project environments.
                        <br><br>
                        With a strong understanding of regional logistics requirements, customs regulations, transportation networks, and operational challenges, we deliver reliable and cost-effective logistics solutions tailored to the unique needs of each client.
                    </div>
                    
                    <!-- Inner Tabbed System -->
                    <div class="sub-tab-wrapper">
                        <div class="sub-tab-nav">
                            <button class="sub-tab-btn active" data-tab="logistics-overview">Cross-Border Transport</button>
                            <button class="sub-tab-btn" data-tab="transport">Handling & Storage</button>
                            <button class="sub-tab-btn" data-tab="handling">Documentation & Compliance</button>
                            <button class="sub-tab-btn" data-tab="compliance">24/7 Support</button>
                        </div>
                        
                        <div class="sub-tab-contents">
                            <!-- Pane 1 -->
                            <div class="sub-tab-pane active" data-pane="logistics-overview">
                                <h3 class="pane-title">Cross-Border Transportation</h3>
                                <p class="pane-desc">We provide comprehensive cross-border transportation solutions to facilitate the seamless movement of goods, equipment, and project materials throughout the region. Our logistics team coordinates every stage of the transportation process to ensure timely delivery, efficient routing, and compliance with cross-border requirements.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Regional transportation planning and coordination</li>
                                    <li>Cross-border cargo movement</li>
                                    <li>Project cargo transportation</li>
                                    <li>Equipment and material mobilization</li>
                                    <li>Route optimization and scheduling</li>
                                    <li>Customs clearance coordination</li>
                                    <li>Multi-country logistics support</li>
                                    <li>Time-sensitive delivery management</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">By leveraging established transportation networks and regional logistics expertise, we help clients achieve efficient cargo movement while minimizing transit delays and operational risks.</p>
                            </div>
                            
                            <!-- Pane 2 -->
                            <div class="sub-tab-pane" data-pane="transport">
                                <h3 class="pane-title">Goods Handling & Storage</h3>
                                <p class="pane-desc">We provide professional goods handling and storage solutions designed to support operational efficiency, inventory control, and supply chain continuity. Our services ensure that cargo, equipment, and materials are managed safely and systematically throughout the logistics process.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Cargo handling and coordination</li>
                                    <li>Temporary storage solutions</li>
                                    <li>Inventory coordination and monitoring</li>
                                    <li>Safe loading and unloading operations</li>
                                    <li>Equipment and material staging</li>
                                    <li>Warehouse support services</li>
                                    <li>Project logistics storage arrangements</li>
                                    <li>Cargo movement planning</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Through structured handling procedures and effective storage management, we help clients maintain operational readiness while safeguarding valuable assets and project materials.</p>
                            </div>

                            <!-- Pane 3 -->
                            <div class="sub-tab-pane" data-pane="handling">
                                <h3 class="pane-title">Documentation & Compliance</h3>
                                <p class="pane-desc">Efficient logistics operations require accurate documentation and strict compliance with regulatory requirements. Our team provides administrative and coordination support to ensure that shipments, equipment movements, and cross-border transactions are managed in accordance with applicable regulations and industry requirements.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Customs documentation coordination</li>
                                    <li>Regulatory compliance support</li>
                                    <li>Permit application and coordination</li>
                                    <li>Import and export documentation</li>
                                    <li>Shipment documentation management</li>
                                    <li>Cross-border regulatory coordination</li>
                                    <li>Cargo clearance support</li>
                                    <li>Logistics compliance administration</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">By ensuring documentation accuracy and regulatory compliance, we help clients reduce administrative burdens, minimize delays, and facilitate smoother logistics operations across multiple jurisdictions.</p>
                            </div>

                            <!-- Pane 4 -->
                            <div class="sub-tab-pane" data-pane="compliance">
                                <h3 class="pane-title">24/7 Operational Support</h3>
                                <p class="pane-desc">Recognizing that logistics operations often extend beyond standard business hours, we provide responsive operational support to address urgent requirements, unexpected disruptions, and time-critical movements. Our logistics personnel and transportation network remain ready to support clients whenever operational needs arise.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>24/7 logistics coordination support</li>
                                    <li>Emergency transportation arrangements</li>
                                    <li>Urgent cargo mobilization</li>
                                    <li>Standby transportation services</li>
                                    <li>Rapid response logistics solutions</li>
                                    <li>Project-critical delivery support</li>
                                    <li>Operational contingency coordination</li>
                                    <li>Regional logistics assistance</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">With a commitment to responsiveness, reliability, and operational continuity, we help clients maintain smooth operations and minimize disruptions regardless of location or timing requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-image-col">
                    <div class="graphic-3d-wrapper">
                        <img src="assets/img/service3d/logistics.webp" class="floating-3d-graphic" alt="Logistics Services">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 5: Corrosion Management -->
        <section class="solution-section" id="corrosion-management" style="background-image: url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&q=80&w=1200');">
            <div class="solution-grid">
                <div class="solution-content-col">
                    <span class="solution-badge">05 / Asset Integrity</span>
                    <div class="solution-title-container">
                        <h2 class="solution-title">Corrosion Management</h2>
                        <div class="mobile-3d-wrapper">
                            <img src="assets/img/service3d/renov.webp" class="floating-3d-graphic" alt="Corrosion Management">
                        </div>
                    </div>
                    <div class="solution-desc">
                        AB Malaya provides specialized corrosion management solutions designed to protect, preserve, and extend the service life of critical assets across the marine, oil & gas, industrial, and infrastructure sectors. Our approach combines technical expertise, proven protection systems, and industry best practices to minimize asset deterioration, reduce maintenance costs, and improve long-term operational reliability.
                        <br><br>
                        Understanding that corrosion poses significant operational, safety, and financial risks, we work closely with asset owners, facility operators, contractors, and project stakeholders to develop effective protection strategies tailored to specific environmental and operational conditions. Through integrated inspection, coating, maintenance, and advisory services, we help clients safeguard valuable assets while supporting regulatory compliance and operational sustainability.
                    </div>
                    
                    <!-- Inner Tabbed System -->
                    <div class="sub-tab-wrapper">
                        <div class="sub-tab-nav">
                            <button class="sub-tab-btn active" data-tab="coating">Painting & Coating</button>
                            <button class="sub-tab-btn" data-tab="surface">Surface Prep & Protection</button>
                            <button class="sub-tab-btn" data-tab="consultation">Technical Consultation</button>
                        </div>
                        
                        <div class="sub-tab-contents">
                            <!-- Pane 1 -->
                            <div class="sub-tab-pane active" data-pane="coating">
                                <h3 class="pane-title">Industrial Painting & Coating</h3>
                                <p class="pane-desc">We provide professional industrial painting and protective coating solutions designed to safeguard assets against corrosion, environmental exposure, and operational wear. Our coating systems are selected based on project requirements, operating environments, and industry specifications to ensure long-term protection and performance.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Marine coating systems</li>
                                    <li>Oil & gas protective coatings</li>
                                    <li>Industrial infrastructure coatings</li>
                                    <li>Aviation industry coating applications</li>
                                    <li>Certified industrial coating systems</li>
                                    <li>General protective coating solutions</li>
                                    <li>New-build and maintenance coating works</li>
                                    <li>Surface protection and asset preservation programs</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">Our solutions are designed to enhance asset durability, reduce maintenance requirements, and provide long-term protection against harsh operating conditions, ensuring optimal performance throughout the asset lifecycle.</p>
                            </div>
                            
                            <!-- Pane 2 -->
                            <div class="sub-tab-pane" data-pane="surface">
                                <h3 class="pane-title">Surface Preparation & Corrosion Protection</h3>
                                <p class="pane-desc">Effective corrosion control begins with proper surface preparation and systematic maintenance practices. We provide specialized services to ensure coating systems achieve maximum performance, adhesion, and service life under demanding operating environments.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Sandblasting and abrasive blasting works</li>
                                    <li>Surface preparation and treatment</li>
                                    <li>Coating inspection services</li>
                                    <li>Corrosion assessment support</li>
                                    <li>Maintenance and repair works</li>
                                    <li>Preventive corrosion management programs</li>
                                    <li>Protective coating maintenance</li>
                                    <li>Asset preservation solutions</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">By implementing structured corrosion prevention and maintenance strategies, we help clients improve asset reliability, reduce unplanned maintenance costs, and maximise long-term operational efficiency.</p>
                            </div>

                            <!-- Pane 3 -->
                            <div class="sub-tab-pane" data-pane="consultation">
                                <h3 class="pane-title">Technical Consultation</h3>
                                <p class="pane-desc">Our technical consultation services provide clients with professional guidance on corrosion management, coating technologies, asset protection strategies, and long-term maintenance planning. We support organizations in developing practical solutions that align with operational requirements, industry standards, and asset integrity objectives.</p>
                                <p class="pane-desc" style="margin-top: 10px; font-weight: 700; color: #1191cc;">Service Capabilities:</p>
                                <ul class="bullet-list">
                                    <li>Industrial technical consultation</li>
                                    <li>Corrosion management advisory services</li>
                                    <li>Asset integrity and protection strategies</li>
                                    <li>Industry-academia collaboration initiatives</li>
                                    <li>Professional technical training programs</li>
                                    <li>Technical knowledge transfer sessions</li>
                                    <li>Coating system evaluation and recommendations</li>
                                    <li>Maintenance strategy development</li>
                                </ul>
                                <p class="pane-desc" style="margin-top: 15px;">We actively collaborate with leading Malaysian research institutions, industry specialists, and technical partners to support innovation, knowledge development, and the adoption of advanced corrosion management practices. Through continuous learning and technical engagement, we help clients make informed decisions that enhance asset protection, operational performance, and long-term sustainability.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-image-col">
                    <div class="graphic-3d-wrapper">
                        <img src="assets/img/service3d/renov.webp" class="floating-3d-graphic" alt="Corrosion Management">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 6: Digital & IT Solutions -->
        <section class="solution-section" id="digital-it-solutions" style="background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=1200');">
            <div class="solution-grid">
                <div class="solution-content-col">
                    <span class="solution-badge">06 / Digital Enablement</span>
                    <div class="solution-title-container">
                        <h2 class="solution-title">Digital & IT Solutions</h2>
                        <div class="mobile-3d-wrapper">
                            <img src="assets/img/service3d/mekanikal.webp" class="floating-3d-graphic" alt="Digital & IT Solutions">
                        </div>
                    </div>
                    <div class="solution-desc">
                        AB Malaya helps businesses improve operational efficiency through modern digital technologies and smart system integration.
                    </div>
                    
                    <!-- Inner Tabbed System -->
                    <div class="sub-tab-wrapper">
                        <div class="sub-tab-nav">
                            <button class="sub-tab-btn active" data-tab="digital-overview">Overview</button>
                            <button class="sub-tab-btn" data-tab="digital-solutions">Digital Solutions</button>
                            <button class="sub-tab-btn" data-tab="it-infrastructure">IT Infra</button>
                            <button class="sub-tab-btn" data-tab="tech-integration">Technology</button>
                        </div>
                        
                        <div class="sub-tab-contents">
                            <!-- Pane 1 -->
                            <div class="sub-tab-pane active" data-pane="digital-overview">
                                <h3 class="pane-title">Transformation Solutions</h3>
                                <p class="pane-desc">AB Malaya helps businesses improve operational efficiency through modern digital technologies and smart system integration.</p>
                            </div>
                            
                            <!-- Pane 2 -->
                            <div class="sub-tab-pane" data-pane="digital-solutions">
                                <h3 class="pane-title">Digital Business Solutions</h3>
                                <p class="pane-desc">We provide:</p>
                                <ul class="bullet-list">
                                    <li>Corporate website development</li>
                                    <li>Digital business solutions</li>
                                    <li>System integration</li>
                                    <li>Business process digitization</li>
                                    <li>Cloud-based operational support</li>
                                </ul>
                            </div>

                            <!-- Pane 3 -->
                            <div class="sub-tab-pane" data-pane="it-infrastructure">
                                <h3 class="pane-title">IT Infrastructure</h3>
                                <p class="pane-desc">Our IT services include:</p>
                                <ul class="bullet-list">
                                    <li>Network setup & support</li>
                                    <li>Hardware & software solutions</li>
                                    <li>Technical maintenance</li>
                                    <li>Cybersecurity support</li>
                                    <li>IT consultation</li>
                                </ul>
                            </div>

                            <!-- Pane 4 -->
                            <div class="sub-tab-pane" data-pane="tech-integration">
                                <h3 class="pane-title">Technology Integration</h3>
                                <p class="pane-desc">We assist businesses in adopting technology-driven operational systems to improve productivity, monitoring, communication, and decision-making.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-image-col">
                    <div class="graphic-3d-wrapper">
                        <img src="assets/img/service3d/mekanikal.webp" class="floating-3d-graphic" alt="Digital & IT Solutions">
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Floating Navigation Progress bar & Dots for Desktop -->
    <div class="solutions-progress-indicator">
        <div class="progress-line-track">
            <div class="progress-line-fill"></div>
            <div class="indicator-dots">
                <div class="indicator-dot-item active" data-target="#strategic-consultant">
                    <span class="dot-label">01. Strategic Consultant</span>
                </div>
                <div class="indicator-dot-item" data-target="#contractor-engineering">
                    <span class="dot-label">02. Contractor & Engineering</span>
                </div>
                <div class="indicator-dot-item" data-target="#marine-services">
                    <span class="dot-label">03. Marine Services</span>
                </div>
                <div class="indicator-dot-item" data-target="#logistics-services">
                    <span class="dot-label">04. Logistics Services</span>
                </div>
                <div class="indicator-dot-item" data-target="#corrosion-management">
                    <span class="dot-label">05. Corrosion Management</span>
                </div>
                <div class="indicator-dot-item" data-target="#digital-it-solutions">
                    <span class="dot-label">06. Digital & IT Solutions</span>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
// Scroll function for map
function scrollToSection(id) {
    const targetSection = document.querySelector(id);
    if (targetSection) {
        if (typeof lenis !== 'undefined') {
            lenis.scrollTo(targetSection, { offset: -80 });
        } else if (window.lenis) {
            window.lenis.scrollTo(targetSection, { offset: -80 });
        } else {
            const offset = 80;
            const bodyRect = document.body.getBoundingClientRect().top;
            const elementRect = targetSection.getBoundingClientRect().top;
            const elementPosition = elementRect - bodyRect;
            const offsetPosition = elementPosition - offset;
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {

    // Read More / Show Less feature for long text descriptions (always generated, visible on mobile via CSS)
    const solutionDescs = document.querySelectorAll('.solution-desc');
    solutionDescs.forEach(desc => {
        if (desc.textContent.trim().length > 250) {
            desc.classList.add('collapsible-desc');
            
            const btn = document.createElement('button');
            btn.className = 'read-more-btn';
            btn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
            
            desc.parentNode.insertBefore(btn, desc.nextSibling);
            
            btn.addEventListener('click', () => {
                const isExpanded = desc.classList.contains('expanded');
                if (isExpanded) {
                    desc.classList.remove('expanded');
                    btn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
                    const section = desc.closest('.solution-section');
                    if (section) {
                        if (typeof lenis !== 'undefined') {
                            lenis.scrollTo(section, { offset: -80 });
                        } else {
                            section.scrollIntoView({ behavior: 'smooth' });
                        }
                    }
                } else {
                    desc.classList.add('expanded');
                    btn.innerHTML = 'Read Less <i class="fas fa-chevron-up"></i>';
                }
                if (typeof lenis !== 'undefined') {
                    lenis.resize();
                } else if (window.lenis) {
                    window.lenis.resize();
                }
            });
        }
    });

    const sections = document.querySelectorAll('.solution-section');
    const dots = document.querySelectorAll('.indicator-dot-item');
    const fill = document.querySelector('.progress-line-fill');

    // Inner Tab switching logic
    document.querySelectorAll('.sub-tab-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const wrapper = this.closest('.sub-tab-wrapper');
            const tabId = this.getAttribute('data-tab');
            
            // Deactivate other tabs
            wrapper.querySelectorAll('.sub-tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Show corresponding content pane
            wrapper.querySelectorAll('.sub-tab-pane').forEach(p => p.classList.remove('active'));
            const targetPane = wrapper.querySelector(`.sub-tab-pane[data-pane="${tabId}"]`);
            if (targetPane) {
                targetPane.classList.add('active');
            }
        });
    });
    
    // Intersection Observer to update active navigation dots
    const observerOptions = {
        root: null,
        rootMargin: '-30% 0px -40% 0px',
        threshold: 0
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                dots.forEach(dot => {
                    const target = dot.getAttribute('data-target');
                    if (target === `#${id}`) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
                
                // Slide in 3D graphic from right to left
                entry.target.classList.add('in-view');
            } else {
                // Slide out 3D graphic from left to right
                entry.target.classList.remove('in-view');
            }
        });
    }, observerOptions);
    
    sections.forEach(section => {
        observer.observe(section);
    });

    // Update progress fill line heights and show/hide indicator wrapper dynamically
    const indicator = document.querySelector('.solutions-progress-indicator');
    const checkIndicatorVisibility = () => {
        if (indicator) {
            if (window.scrollY > window.innerHeight * 0.6) {
                indicator.classList.add('visible');
            } else {
                indicator.classList.remove('visible');
            }
        }
    };
    
    // Initial check
    checkIndicatorVisibility();
    
    window.addEventListener('scroll', () => {
        const container = document.querySelector('.solutions-list-container');
        if (container) {
            const rect = container.getBoundingClientRect();
            const totalHeight = rect.height - window.innerHeight;
            const scrolled = Math.max(0, Math.min(100, (-rect.top / totalHeight) * 100));
            if (fill) {
                fill.style.height = `${scrolled}%`;
            }
        }
        checkIndicatorVisibility();
    }, { passive: true });
    
    // Click events on floating indicator dots
    dots.forEach(dot => {
        dot.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-target');
            scrollToSection(targetId);
        });
    });

    // Support external hash fragments navigation on initial paint
    function handleServiceHash() {
        const hash = window.location.hash;
        if (hash) {
            let targetId = '';
            if (hash === '#strategic' || hash === '#strategic-consultant') {
                targetId = '#strategic-consultant';
            } else if (hash === '#core' || hash === '#contractor' || hash === '#engineering') {
                targetId = '#contractor-engineering';
            } else if (hash === '#marine') {
                targetId = '#marine-services';
            } else if (hash === '#logistics' || hash === '#cross') {
                targetId = '#logistics-services';
            } else if (hash === '#corrosion') {
                targetId = '#corrosion-management';
            } else if (hash === '#digital' || hash === '#it') {
                targetId = '#digital-it-solutions';
            }
            
            if (targetId) {
                setTimeout(() => {
                    scrollToSection(targetId);
                }, 500);
            }
        }
    }
    
    window.addEventListener('hashchange', handleServiceHash);
    setTimeout(handleServiceHash, 300);
});
</script>

<?php include 'includes/footer.php'; ?>
