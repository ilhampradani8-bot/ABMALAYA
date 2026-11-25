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
$heroTitle = "<span style='color: #1191cc;'>Integrated Construction, Engineering</span> <br><span style='color: #093863;'>& Industrial Solutions</span>";
$heroSubtitle = ""; /* Subtitle merged into Title for impact */
$heroDesc = "AB Malaya Sdn Bhd delivers integrated solutions across construction, engineering, marine, logistics, corrosion management and project development. We combine technical expertise, operational experience and strategic partnerships to provide reliable, practical and cost-effective solutions for commercial, industrial, infrastructure and marine projects.";
$showButtons = true;
$heroBtn1Text = "Explore Our Capabilities";
$heroBtn1Link = "#service";
$heroBtn2Text = "Discuss Your Project";
$heroBtn2Link = "/contact";
include 'includes/hero_visual.php';
?>

<!-- Credibility & Accreditations Showcase Section (Interactive Expanding Full-Width Cards) -->
<section id="credentials" class="credentials-showcase-section">
    
    <!-- Full-Width Top Bar: Judul Pojok Kiri, Deskripsi Pojok Kanan -->
    <div class="credentials-top-bar">
        <div class="credentials-title-left">
            <span class="credentials-badge">
                <i class="fas fa-shield-halved"></i> Statutory Credentials
            </span>
            <h2>CIDB Grade G7 & MOF Registered</h2>
        </div>
        <div class="credentials-desc-right">
            <p>
                Certified by Malaysia's premier regulatory bodies with multidisciplinary engineering capability for unlimited tender contract value.
            </p>
        </div>
    </div>

    <!-- Full-Width Expanding Flex Cards (Fast Local Backgrounds & Hover Auto-Expand) -->
    <div class="credentials-cards-wrapper">
        <div class="options" id="credential-options">
            
            <!-- 1. CIDB Grade G7 Registered Contractor -->
            <div class="option active" style="--optionBackground:url(assets/img/cred/card1.jpg); --defaultColor:#093863;" data-index="0">
                <div class="shadow"></div>
                <div class="label">
                    <div class="icon">
                        <img src="assets/img/g7-logo.png" alt="CIDB Grade G7" class="card-logo-img">
                    </div>
                    <div class="info">
                        <div class="main">CIDB Malaysia</div>
                        <div class="sub">Grade G7 Registered Contractor (No Limit Contract Value)</div>
                    </div>
                </div>
            </div>

            <!-- 2. Ministry of Finance (MOF) -->
            <div class="option" style="--optionBackground:url(assets/img/cred/card2.jpg); --defaultColor:#1191cc;" data-index="1">
                <div class="shadow"></div>
                <div class="label">
                    <div class="icon">
                        <img src="assets/img/mof.webp" alt="MOF Malaysia" class="card-logo-img">
                    </div>
                    <div class="info">
                        <div class="main">Ministry of Finance</div>
                        <div class="sub">MOF Registered Company (Federal & State Procurement)</div>
                    </div>
                </div>
            </div>

            <!-- 3. Execution Capability -->
            <div class="option" style="--optionBackground:url(assets/img/cred/card3.jpg); --defaultColor:#0284c7;" data-index="2">
                <div class="shadow"></div>
                <div class="label">
                    <div class="icon">
                        <img src="assets/img/logo-abmalaya.webp" alt="AB Malaya Team" class="card-logo-img">
                    </div>
                    <div class="info">
                        <div class="main">Execution Capability</div>
                        <div class="sub">Experienced Multidisciplinary Engineering & Project Team</div>
                    </div>
                </div>
            </div>

            <!-- 4. Multidisciplinary Integrated Engineering Solutions -->
            <div class="option" style="--optionBackground:url(assets/img/cred/card4.jpg); --defaultColor:#059669;" data-index="3">
                <div class="shadow"></div>
                <div class="label">
                    <div class="icon">
                        <img src="assets/img/ies-logo.png" alt="IES Integrated Engineering Solutions" class="card-logo-img" style="transform: scale(1.15);">
                    </div>
                    <div class="info">
                        <div class="main">Integrated Solutions (IES)</div>
                        <div class="sub">Civil, Marine, Logistics & Industrial Corrosion Works</div>
                    </div>
                </div>
            </div>

            <!-- 5. Quality, Safety & Regulatory Compliance -->
            <div class="option" style="--optionBackground:url(assets/img/cred/card5.jpg); --defaultColor:#4f46e5;" data-index="4">
                <div class="shadow"></div>
                <div class="label">
                    <div class="icon">
                        <img src="assets/img/ssm.webp" alt="SSM Compliance Standards" class="card-logo-img">
                    </div>
                    <div class="info">
                        <div class="main">Quality & Safety</div>
                        <div class="sub">Strict HSE Compliance & Verified Statutory Standards</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .credentials-showcase-section {
        background: #f8fafc;
        padding: 50px 0 60px;
        border-top: 1px solid rgba(0,0,0,0.06);
        border-bottom: 1px solid rgba(0,0,0,0.06);
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    /* Full-Width Top Bar: Judul Pojok Kiri, Deskripsi Pojok Kanan */
    .credentials-top-bar {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 30px;
        margin-bottom: 22px;
        padding: 0 4vw;
        width: 100%;
        box-sizing: border-box;
    }

    .credentials-title-left {
        max-width: 58%;
    }

    .credentials-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #1191cc;
        border: none;
        padding: 0;
        border-radius: 0;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .credentials-title-left h2 {
        font-size: 2.35rem;
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        letter-spacing: -0.8px;
        line-height: 1.15;
        color: #093863;
        margin: 0;
    }

    .credentials-desc-right {
        max-width: 38%;
        text-align: right;
    }

    .credentials-desc-right p {
        color: #64748b;
        font-size: 0.95rem;
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
        margin: 0;
    }

    /* Full-Width Cards Container */
    .credentials-cards-wrapper {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0 4vw;
        box-sizing: border-box;
    }

    .credentials-showcase-section .options {
        display: flex;
        flex-direction: row;
        align-items: stretch;
        overflow: hidden;
        min-width: 100%;
        width: 100%;
        height: 460px;
        box-sizing: border-box;
        border-radius: 28px;
        padding: 8px;
        background: rgba(9, 56, 99, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .credentials-showcase-section .option {
        position: relative;
        overflow: hidden;
        min-width: 80px;
        margin: 6px;
        background: var(--optionBackground, #E6E9ED);
        background-size: cover;
        background-position: center;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95);
        border-radius: 22px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        user-select: none;
    }

    .credentials-showcase-section .option.active {
        flex-grow: 12;
        transform: scale(1);
        max-width: none;
        margin: 6px;
        border-radius: 24px;
        box-shadow: 0 16px 35px rgba(9, 56, 99, 0.25);
        filter: grayscale(0%) brightness(1);
    }

    .credentials-showcase-section .option:not(.active) {
        flex-grow: 1;
        filter: grayscale(20%) brightness(0.8);
    }

    .credentials-showcase-section .option:not(.active):hover {
        filter: grayscale(0%) brightness(0.95);
    }

    .credentials-showcase-section .option .shadow {
        position: absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 160px;
        pointer-events: none;
        transition: 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95);
    }

    .credentials-showcase-section .option.active .shadow {
        box-shadow: inset 0 -140px 120px -30px rgba(9, 56, 99, 0.95), inset 0 -40px 40px rgba(0,0,0,0.6);
    }

    .credentials-showcase-section .option:not(.active) .shadow {
        bottom: -30px;
        box-shadow: inset 0 -110px 50px -50px rgba(0,0,0,0.7);
    }

    .credentials-showcase-section .option .label {
        display: flex;
        position: absolute;
        right: 0px;
        bottom: 22px;
        left: 20px;
        height: 52px;
        align-items: center;
        transition: 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95);
        z-index: 3;
    }

    .credentials-showcase-section .option.active .label {
        bottom: 24px;
        left: 24px;
    }

    .credentials-showcase-section .option:not(.active) .label {
        bottom: 18px;
        left: 14px;
    }

    .credentials-showcase-section .option .label .icon {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        min-width: 50px;
        max-width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ffffff;
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
        overflow: hidden;
        padding: 5px;
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .credentials-showcase-section .option:hover .label .icon {
        transform: scale(1.08);
    }

    .credentials-showcase-section .card-logo-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        border-radius: 50%;
    }

    .credentials-showcase-section .option .label .info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 16px;
        color: white;
        white-space: nowrap;
        overflow: hidden;
    }

    .credentials-showcase-section .option .label .info > div {
        position: relative;
        transition: 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95), opacity 0.4s ease-out;
    }

    .credentials-showcase-section .option.active .label .info > div {
        left: 0px;
        opacity: 1;
    }

    .credentials-showcase-section .option:not(.active) .label .info > div {
        left: 25px;
        opacity: 0;
        pointer-events: none;
    }

    .credentials-showcase-section .option .label .info .main {
        font-weight: 800;
        font-size: 1.35rem;
        font-family: 'Aeonik', sans-serif;
        color: #ffffff;
        text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        letter-spacing: -0.3px;
    }

    .credentials-showcase-section .option .label .info .sub {
        font-size: 0.88rem;
        color: #e2e8f0;
        font-family: 'Inter', sans-serif;
        margin-top: 3px;
        text-shadow: 0 1px 4px rgba(0,0,0,0.6);
        transition-delay: 0.08s;
    }


    /* Responsive Queries */
    @media screen and (max-width: 900px) {
        .credentials-top-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
        }
        .credentials-title-left {
            max-width: 100%;
        }
        .credentials-title-left h2 {
            font-size: 1.95rem;
        }
        .credentials-desc-right {
            max-width: 100%;
            text-align: left;
        }
    }

    /* Mobile (HP) Experience: Same Expanding Flex Accordion Mode as Desktop (Not Swipe) */
    @media screen and (max-width: 768px) {
        .credentials-showcase-section {
            padding: 36px 0 46px;
            overflow: hidden;
        }

        .credentials-top-bar {
            padding: 0 16px;
            margin-bottom: 14px;
        }

        .credentials-title-left h2 {
            font-size: 1.75rem;
            line-height: 1.2;
        }

        .credentials-desc-right p {
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .credentials-cards-wrapper {
            padding: 0 12px !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }

        /* Same Horizontal Expanding Flex Accordion Row on Mobile */
        .credentials-showcase-section .options {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            align-items: stretch !important;
            overflow: hidden !important;
            width: 100% !important;
            height: 390px !important;
            padding: 5px !important;
            gap: 0 !important;
            border-radius: 20px !important;
            background: rgba(9, 56, 99, 0.03) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            box-sizing: border-box !important;
        }

        /* Inactive Cards on Mobile (Slim Vertical Strips with Mini Logo) */
        .credentials-showcase-section .option:not(.active) {
            flex: 1 1 0% !important;
            min-width: 34px !important;
            max-width: 48px !important;
            width: auto !important;
            margin: 2px !important;
            border-radius: 14px !important;
            filter: grayscale(25%) brightness(0.88) !important;
            cursor: pointer;
            touch-action: manipulation;
            transition: flex 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95), filter 0.4s ease;
        }

        .credentials-showcase-section .option:not(.active) .shadow {
            bottom: 0 !important;
            height: 90px !important;
            box-shadow: inset 0 -60px 30px -20px rgba(0,0,0,0.65) !important;
        }

        .credentials-showcase-section .option:not(.active) .label {
            bottom: 12px !important;
            left: 50% !important;
            right: auto !important;
            transform: translateX(-50%) !important;
            width: 26px !important;
            height: 26px !important;
        }

        .credentials-showcase-section .option:not(.active) .label .icon {
            min-width: 26px !important;
            max-width: 26px !important;
            height: 26px !important;
            padding: 3px !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3) !important;
        }

        .credentials-showcase-section .option:not(.active) .label .info {
            display: none !important;
        }

        /* Active Card on Mobile (Expands smoothly to display full visual & text) */
        .credentials-showcase-section .option.active {
            flex: 8 1 0% !important;
            min-width: 175px !important;
            max-width: none !important;
            width: auto !important;
            margin: 2px !important;
            border-radius: 18px !important;
            filter: grayscale(0%) brightness(1) !important;
            box-shadow: 0 8px 24px rgba(9, 56, 99, 0.22) !important;
            transition: flex 0.5s cubic-bezier(0.05, 0.61, 0.41, 0.95), filter 0.4s ease;
        }

        .credentials-showcase-section .option.active .shadow {
            bottom: 0px !important;
            height: 160px !important;
            box-shadow: inset 0 -140px 90px -30px rgba(9, 56, 99, 0.96), inset 0 -35px 25px rgba(0,0,0,0.55) !important;
        }

        .credentials-showcase-section .option.active .label {
            bottom: 16px !important;
            left: 12px !important;
            right: 12px !important;
            transform: none !important;
            width: auto !important;
            height: auto !important;
            display: flex !important;
            align-items: center !important;
        }

        .credentials-showcase-section .option.active .label .icon {
            min-width: 38px !important;
            max-width: 38px !important;
            height: 38px !important;
            padding: 4px !important;
            flex-shrink: 0 !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25) !important;
        }

        .credentials-showcase-section .option.active .label .info {
            display: flex !important;
            flex-direction: column !important;
            margin-left: 10px !important;
            white-space: normal !important;
            flex: 1 !important;
            overflow: hidden !important;
        }

        .credentials-showcase-section .option.active .label .info > div {
            left: 0 !important;
            opacity: 1 !important;
            pointer-events: auto !important;
        }

        .credentials-showcase-section .option.active .label .info .main {
            font-size: 1.02rem !important;
            line-height: 1.22 !important;
            margin-bottom: 2px !important;
            font-weight: 700 !important;
            color: #ffffff !important;
            text-shadow: 0 1px 4px rgba(0,0,0,0.7) !important;
        }

        .credentials-showcase-section .option.active .label .info .sub {
            font-size: 0.74rem !important;
            line-height: 1.32 !important;
            opacity: 0.94 !important;
            margin-top: 2px !important;
            color: #e2e8f0 !important;
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const options = document.querySelectorAll('#credential-options .option');
    const container = document.getElementById('credential-options');
    if (!options.length || !container) return;

    let currentIndex = 0;
    let autoPlayInterval = null;
    let isHovered = false;

    // Unified activation: Exact same expanding card behavior on Desktop & Mobile
    function setActive(index) {
        options.forEach((opt, i) => {
            if (i === index) {
                opt.classList.add('active');
            } else {
                opt.classList.remove('active');
            }
        });
        currentIndex = index;
    }

    // Auto-open on mouse hover (Desktop) & tap / click (Mobile + Desktop)
    options.forEach((opt, idx) => {
        opt.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                setActive(idx);
                resetAutoPlay();
            }
        });
        opt.addEventListener('click', function() {
            setActive(idx);
            resetAutoPlay();
        });
        opt.addEventListener('touchstart', function() {
            setActive(idx);
            resetAutoPlay();
        }, { passive: true });
    });

    // Auto-walk / smoothly cycle through credentials every 3.8 seconds
    function startAutoPlay() {
        if (autoPlayInterval) clearInterval(autoPlayInterval);
        autoPlayInterval = setInterval(() => {
            if (!isHovered) {
                currentIndex = (currentIndex + 1) % options.length;
                setActive(currentIndex);
            }
        }, 3800);
    }

    function resetAutoPlay() {
        startAutoPlay();
    }

    container.addEventListener('mouseenter', () => { isHovered = true; });
    container.addEventListener('mouseleave', () => { isHovered = false; });
    container.addEventListener('touchstart', () => { isHovered = true; }, { passive: true });
    container.addEventListener('touchend', () => { 
        setTimeout(() => { isHovered = false; }, 2500); 
    }, { passive: true });

    startAutoPlay();
});
</script>

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

    /* Responsive styling for About Brief Section */
    .about-brief-section {
        padding: 120px 0;
        background: #fff;
    }
    .about-brief-container {
        width: 100%;
        padding: 0 6vw;
    }
    .about-flex-container {
        display: flex;
        justify-content: space-between;
        align-items: stretch;
    }
    .about-col-left {
        width: 50%;
        text-align: left;
        padding-right: 4rem;
    }
    .about-col-right {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        text-align: left;
        padding-left: 4rem;
    }
    .about-title-main {
        font-size: 3.2rem;
        margin-bottom: 2.5rem;
        color: #093863;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        line-height: 1.1;
        letter-spacing: -1.5px;
    }
    .about-desc-p {
        color: #475569;
        font-size: 1.1rem;
        line-height: 1.8;
        font-family: 'Aeonik', sans-serif;
        margin-bottom: 1.5rem;
        width: 100%;
    }
    @media (max-width: 900px) {
        .about-brief-section {
            padding: 60px 0 !important;
        }
        .about-brief-container {
            padding: 0 5vw !important;
        }
        .about-flex-container {
            flex-direction: column !important;
            gap: 2rem !important;
        }
        .about-col-left,
        .about-col-right {
            width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .about-title-main {
            font-size: 2.1rem !important;
            margin-bottom: 1.2rem !important;
            letter-spacing: -0.5px !important;
        }
        .about-desc-p {
            font-size: 0.95rem !important;
            line-height: 1.65 !important;
            margin-bottom: 1rem !important;
        }
    }
</style>

<!-- About Brief -->
<section id="about" class="about-brief-section">
    <div class="about-brief-container">
        <div class="about-flex-container">
            <!-- Left Column -->
            <div class="about-col-left">
                <h2 class="about-title-main">
                    Building Capability. <br><span style="color: #1191cc;">Delivering Solutions.</span>
                </h2>
                <p class="about-desc-p">
                    AB Malaya Sdn Bhd is a Malaysian multidisciplinary company providing integrated construction, engineering, marine, logistics and industrial solutions.
                </p>
                <p class="about-desc-p">
                    Our capabilities have developed from marine and industrial support into a broader project delivery platform serving commercial, industrial, infrastructure and marine sectors. Through our experienced team and strategic network of specialist partners, we provide practical solutions designed around our clients' requirements for quality, safety, cost and timely delivery.
                </p>
            </div>

            <!-- Right Column -->
            <div class="about-col-right">
                <div style="margin-top: 1rem; margin-bottom: 2rem;">
                    <a href="/about" class="hero-link" style="color: #000; font-size: 0.85rem;">
                        Discover AB Malaya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; font-family: 'Aeonik', sans-serif;">
                    AB Malaya Sdn Bhd is a multidisciplinary industrial solutions company specializing in:
                </p>
                <ul style="color: #475569; font-size: 1.1rem; line-height: 1.8; font-family: 'Aeonik', sans-serif; list-style-type: none; padding-left: 0; margin-top: 1.2rem; width: 100%;">
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Contractor & Engineering Services</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Marine Industrial Support</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Cross-Border Logistics</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Corrosion Management</li>
                    <li style="margin-bottom: 0.5rem;"><i class="fas fa-check-circle" style="color: #1191cc; margin-right: 10px;"></i> Project Development & Strategic Advisory</li>
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
<section id="location" class="location-section">
    <div class="location-container">
        <div class="location-header-row">
            <!-- Left Side: Address & Map Info -->
            <div class="location-info-col">
                <h5 class="location-badge">Offices</h5>
                <h2 class="location-heading"><span style="color: #093863;">Our Offices &</span> <br><span style="color: #1191cc;">Headquarters</span></h2>
                
                <!-- Head Office (HQ) -->
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p class="contact-label">Office Address (HQ)</p>
                        <p class="contact-val">2-2-40, 2nd Floor Wisma Rampai, Jalan 34/26, <br>Taman Sri Rampai, 53300 Kuala Lumpur.</p>
                    </div>
                </div>

                <!-- Penang Office -->
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p class="contact-label">Penang Office</p>
                        <p class="contact-val">4761D, Jalan Pongsu Seribu, <br>13200 Kepala Batas, Penang.</p>
                    </div>
                </div>

                <!-- Perak Office -->
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-location-dot"></i></div>
                    <div>
                        <p class="contact-label">Perak Office</p>
                        <p class="contact-val">Lot 5465B (A), Simpang Empat Pekan Simpang Empat, <br>34400 Semanggol, Perak.</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Direct Contact Details -->
            <div class="location-contact-col">
                <div class="location-contact-inner">
                    <!-- WhatsApp -->
                    <div class="contact-item-right">
                        <p class="contact-label">WhatsApp Support</p>
                        <p class="contact-val-bold">+6017-2240091 / +6011-71117282</p>
                    </div>
                    <!-- Email -->
                    <div class="contact-item-right">
                        <p class="contact-label">Email Inquiry</p>
                        <p class="contact-val-bold">sales@abmalaya.com / info@abmalaya.com</p>
                    </div>
                    <div class="location-btn-wrap">
                        <a href="/contact" class="hero-link" style="color: #000;">
                            View All Contact Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Neo Brutalist Map Preview -->
    <div class="location-map-wrap">
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
    /* Clean Responsive Layout for Location & Map */
    .location-section {
        background: #fff;
        padding: 50px 0 0 0;
    }
    .location-container {
        width: 100%;
        padding: 0 6vw;
        box-sizing: border-box;
    }
    .location-header-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 4.5rem;
    }
    .location-info-col {
        width: 50%;
        padding-right: 4rem;
        box-sizing: border-box;
    }
    .location-badge {
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.75rem;
        margin-bottom: 1.2rem;
        font-family: 'Aeonik', sans-serif;
    }
    .location-heading {
        font-size: 3.2rem;
        margin-bottom: 2.5rem;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        letter-spacing: -1.5px;
        line-height: 1.1;
    }
    .location-info-col .contact-item {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1.8rem;
    }
    .location-info-col .contact-icon {
        color: #1191cc;
        font-size: 1.4rem;
        padding-top: 4px;
        flex-shrink: 0;
    }
    .location-info-col .contact-label {
        font-size: 0.7rem;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 0.4rem;
    }
    .location-info-col .contact-val {
        color: #0f172a;
        font-size: 1.05rem;
        line-height: 1.6;
        margin: 0;
    }
    .location-contact-col {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        text-align: right;
        box-sizing: border-box;
    }
    .location-contact-inner {
        margin-top: 4.5rem;
        width: 100%;
    }
    .contact-item-right {
        margin-bottom: 2.2rem;
    }
    .contact-item-right .contact-label {
        font-size: 0.7rem;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 0.4rem;
    }
    .contact-item-right .contact-val-bold {
        color: #0f172a;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }
    .location-btn-wrap {
        margin-top: 1.2rem;
    }
    .location-map-wrap {
        width: 100%;
        padding: 0 6vw 70px 6vw;
        box-sizing: border-box;
    }

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
        height: 480px;
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

    /* Responsive for Location & Map on Tablets & Mobile */
    @media (max-width: 900px) {
        .location-section {
            padding: 35px 0 0 0;
        }
        .location-container {
            padding: 0 5vw;
        }
        .location-header-row {
            flex-direction: column !important;
            gap: 2rem !important;
            margin-bottom: 2.5rem !important;
        }
        .location-info-col {
            width: 100% !important;
            padding-right: 0 !important;
        }
        .location-heading {
            font-size: 2.1rem !important;
            line-height: 1.2 !important;
            margin-bottom: 1.8rem !important;
        }
        .location-info-col .contact-item {
            gap: 1rem !important;
            margin-bottom: 1.4rem !important;
        }
        .location-info-col .contact-val {
            font-size: 0.95rem !important;
        }
        .location-contact-col {
            width: 100% !important;
            align-items: flex-start !important;
            text-align: left !important;
        }
        .location-contact-inner {
            margin-top: 0.5rem !important;
            padding-top: 1.5rem !important;
            border-top: 1px solid #e2e8f0;
        }
        .contact-item-right {
            margin-bottom: 1.5rem !important;
        }
        .contact-item-right .contact-val-bold {
            font-size: 1rem !important;
        }
        .location-btn-wrap .hero-link {
            width: auto !important;
            display: inline-flex !important;
            font-size: 0.84rem !important;
            letter-spacing: 1px !important;
            padding: 8px 18px !important;
            border-radius: 50px !important;
            border: 1px solid #cbd5e1 !important;
            background: #f8fafc !important;
            text-align: left !important;
        }
        .location-map-wrap {
            padding: 0 5vw 45px 5vw !important;
        }
        .neo-map-footer {
            flex-direction: column;
            gap: 1.2rem;
            text-align: center;
            padding: 1.5rem 1.2rem;
        }
        .map-frame {
            height: 320px;
        }
        .neo-map-card {
            box-shadow: 6px 6px 0px #000;
        }
        .neo-btn-brutal-large {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Final CTA Section with Wisma Rampai Background -->
<section id="cta" class="cta-section">
    <div class="cta-container">
        <div class="cta-flex-wrap">
            <!-- Left Side -->
            <div class="cta-col-text">
                <h5 class="cta-badge">Have a Project in Mind?</h5>
                <h2 class="cta-title">Let's Build the Right <br><span style="color: #1191cc;">Solution Together.</span></h2>
                <p class="cta-desc">Whether you require construction, engineering, marine support, logistics, corrosion management or project development assistance, AB Malaya is ready to discuss your requirements.</p>
            </div>

            <!-- Right Side -->
            <div class="cta-col-action">
                <div class="cta-btn-group" style="display: flex; gap: 14px; flex-wrap: wrap;">
                    <a href="/contact" class="hero-link final-cta-btn">
                        Contact AB Malaya <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="/tender" class="hero-link final-cta-btn" style="background: #1191cc; border-color: #1191cc;">
                        Submit Tender / RFQ <i class="fas fa-file-signature"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Final CTA Section Styles */
    .cta-section {
        background: linear-gradient(rgba(0, 0, 0, 0.78), rgba(0, 0, 0, 0.78)), url('assets/img/wisma-rampai-front.webp');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #fff;
        padding: 100px 0;
    }
    .cta-container {
        width: 100%;
        padding: 0 6vw;
        box-sizing: border-box;
    }
    .cta-flex-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
    }
    .cta-col-text {
        width: 58%;
        text-align: left;
    }
    .cta-badge {
        color: rgba(255,255,255,0.65);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.75rem;
        margin-bottom: 1.2rem;
        font-family: 'Aeonik', sans-serif;
    }
    .cta-title {
        font-size: 3.3rem;
        margin-bottom: 1.5rem;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        letter-spacing: -1.5px;
        line-height: 1.1;
    }
    .cta-desc {
        max-width: 520px;
        opacity: 0.9;
        font-size: 1.15rem;
        line-height: 1.65;
        font-family: 'Aeonik', sans-serif;
        margin: 0;
    }
    .cta-col-action {
        width: 42%;
        display: flex;
        justify-content: flex-end;
    }
    #cta .final-cta-btn {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        border: 1px solid rgba(255, 255, 255, 0.4);
        padding: 12px 24px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    #cta .final-cta-btn:hover {
        background: #1191cc;
        border-color: #1191cc;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(17, 145, 204, 0.3);
    }

    /* Mobile Responsive for Final CTA (No Squishing / Overlapping / Oversized Button) */
    @media (max-width: 900px) {
        .cta-section {
            padding: 50px 0 55px !important;
            background-attachment: scroll !important; /* Smooth scroll on iOS/Android */
        }
        .cta-container {
            padding: 0 5vw !important;
        }
        .cta-flex-wrap {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 1.4rem !important;
        }
        .cta-col-text {
            width: 100% !important;
        }
        .cta-title {
            font-size: 2.1rem !important;
            line-height: 1.2 !important;
            margin-bottom: 0.9rem !important;
        }
        .cta-desc {
            font-size: 0.95rem !important;
            line-height: 1.55 !important;
        }
        .cta-col-action {
            width: auto !important;
            justify-content: flex-start !important;
        }
        #cta .final-cta-btn {
            width: auto !important;
            display: inline-flex !important;
            font-size: 0.80rem !important;
            letter-spacing: 0.8px !important;
            padding: 9px 18px !important;
            border-radius: 50px !important;
            text-align: left !important;
            box-sizing: border-box !important;
            gap: 8px !important;
        }
        #cta .final-cta-btn i {
            font-size: 0.75rem !important;
        }
        .cta-btn-group {
            width: 100% !important;
            flex-direction: column !important;
            gap: 10px !important;
        }
        .cta-btn-group .final-cta-btn {
            width: 100% !important;
            justify-content: center !important;
        }
    }
</style>

<!-- Local Embla Carousel -->
<script src="assets/js/embla-carousel.umd.js"></script>
<!-- Home Page Logic -->
<script src="assets/js/index.js?v=5.5"></script>

<?php include 'includes/footer.php'; ?>
