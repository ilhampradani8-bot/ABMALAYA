<?php 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$pageTitle = "Our Services";
$currentPage = "services";
?>
<!-- Core Dependencies (Loaded before header to support navigation scripts) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<?php include 'includes/header.php'; ?>


<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Libre+Franklin:wght@300;400;600&family=Roboto+Mono:wght@400;500&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

<!-- Swiper Library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


<style>
/* 
 * AB MALAYA - Dual-State Premium Service Slider 
 * Mode 1: Standard 3D Pop-out
 * Mode 2: Detailed Immersive View
 */

/* CRITICAL SCROLL RESTORATION */
html, body {
    overflow-y: scroll !important;
    height: auto !important;
    position: static !important;
}

/* Force Hero to not take entire viewport to allow scroll detection */
.intro-visual {
    height: 90vh !important;
    min-height: 600px;
}

/* Let mouse wheel pass through hero layers */
.intro-visual, .hero-images-layer, .intro-bg-wrap {
    pointer-events: none !important;
}

.intro-content, .hero-btns, .hero-interactive-area {
    pointer-events: auto !important;
}

/* Dynamic Background Service Section */
.services-content-grid {
    padding: 40px 0;
    background-color: #0f172a;
    position: relative;
    z-index: 10;
    min-height: 100vh;
    display: flex;
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
    overflow: hidden;
    transform: translate3d(0, 0, 0);
    will-change: transform;
}

.service-bg-transition-wrap {
    position: absolute;
    inset: 0;
    z-index: 0;
    overflow: hidden;
    pointer-events: none;
    transform: translate3d(0, 0, 0);
    will-change: transform;
}

.service-bg-slide {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 0.8s ease-in-out;
    will-change: opacity;
}

/* Active background slide */
.service-bg-slide.active {
    opacity: 1;
    z-index: 2;
}

/* Old background slide going up */
.service-bg-slide.exit-up {
    opacity: 0;
    transform: translate3d(0, -100%, 0) scale(1.2);
    z-index: 1;
}

/* Old background slide going down (on back) */
.service-bg-slide.exit-down {
    opacity: 0;
    transform: translate3d(0, 100%, 0) scale(1.2);
    z-index: 1;
}

/* New background slide coming down from top */
.service-bg-slide.enter-down {
    opacity: 0;
    transform: translate3d(0, -100%, 0) scale(1.2); /* Starts above */
    z-index: 3;
}

/* New background slide coming up from bottom (on back) */
.service-bg-slide.enter-up {
    opacity: 0;
    transform: translate3d(0, 100%, 0) scale(1.2); /* Starts below */
    z-index: 3;
}

.services-content-grid::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 1) 0%, rgba(15, 23, 42, 0.7) 30%, rgba(15, 23, 42, 0.4) 100%);
    z-index: 1;
    pointer-events: none;
}

/* High-performance static blur layer - transitioning opacity and visibility instead of backdrop-filter repaints */
.services-blur-overlay {
    position: absolute;
    inset: 0;
    background: rgba(11, 15, 26, 0.45); /* Sleek, very subtle dark dim overlay, no blur, no white! */
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s;
    z-index: 2;
    pointer-events: none;
    will-change: opacity, visibility;
}

.services-content-grid.detail-active .services-blur-overlay {
    opacity: 1;
    visibility: visible;
}

.services-content-grid .container {
    position: relative;
    z-index: 5;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center; /* Ensure internal elements are centered */
}

/* Top Left Header Layout */
.service-header-row {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centered */
    margin-bottom: 20px; 
    padding-top: 20px; 
    text-align: center;
}

.section-title-left h2 {
    font-size: 2.8rem;
    color: #fff;
    text-align: center;
    font-family: 'Aeonik', sans-serif;
    font-weight: 700;
    letter-spacing: -1.5px;
    line-height: 1;
    margin-bottom: 0.5rem;
}

/* Service Menu Navigation */
.service-nav-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Centered */
    gap: 0.75rem 2rem;
    margin-top: 5px;
    max-width: 900px;
}

.service-link-item {
    background: none;
    border: none;
    color: rgba(255,255,255,0.4);
    font-family: 'Aeonik', sans-serif;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 0.8rem;
    cursor: pointer;
    padding: 0;
    transition: 0.3s;
    text-transform: uppercase;
    position: relative;
}

.service-link-item::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: #3b82f6;
    transition: 0.3s;
}

.service-link-item:hover, .service-link-item.active {
    color: #fff;
}

.service-link-item.active::after {
    width: 100%;
}

/* Flash Transition Overlay */
.bg-flash {
    position: absolute;
    inset: 0;
    background: #fff;
    z-index: 200;
    pointer-events: none;
    opacity: 0;
    visibility: hidden;
}
.bg-flash.active { 
    animation: shutter-flash 0.8s cubic-bezier(0.7, 0, 0.3, 1) forwards; 
    visibility: visible;
}
@keyframes shutter-flash {
    0% { opacity: 0; }
    40% { opacity: 1; }
    60% { opacity: 1; }
    100% { opacity: 0; }
}

/* Custom Cinematic Navigation Arrows & Destination Labels */
.swiper-nav-wrapper {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    z-index: 100 !important;
    transition: all 0.3s ease;
}

.swiper-nav-wrapper.prev-wrapper {
    display: none !important;
}

.swiper-nav-wrapper.next-wrapper {
    right: -100px;
}

.swiper-nav-wrapper button {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    position: relative;
    overflow: hidden;
}

.swiper-nav-wrapper button::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #005ee9, #004bbd);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: -1;
}

.swiper-nav-wrapper button:hover {
    border-color: #005ee9;
    transform: scale(1.1);
    box-shadow: 0 15px 40px rgba(0, 94, 233, 0.4);
}

.swiper-nav-wrapper button:hover::before {
    opacity: 1;
}

.swiper-nav-wrapper span {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: rgba(255, 255, 255, 0.55);
    transition: all 0.3s ease;
    pointer-events: none;
    max-width: 120px;
    text-align: center;
    font-family: 'Aeonik', sans-serif;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
}

.swiper-nav-wrapper:hover span {
    color: #005ee9;
    transform: translateY(2px);
}

@media (max-width: 1200px) {
    .swiper-nav-wrapper {
        display: none !important; /* Hide on smaller screens to keep layout super neat */
    }
}

/* Hide custom navigation arrows when detailed mode is active */
.services-content-grid.detail-active .swiper-nav-wrapper {
    opacity: 0 !important;
    visibility: hidden !important;
    pointer-events: none !important;
}

/* Slider Focus Effect - Projects.php-style Overlapping Design */
.service-swiper { 
    width: 100%; 
    max-width: 950px;
    margin: 40px auto 0; 
    background: transparent !important; /* Made transparent to eliminate the thick frame border */
    box-shadow: none !important;
    padding: 0 !important; /* Removed thick border padding */
    height: 300px !important; /* Thinner cinematic fixed height */
    border: none !important;
    overflow: visible !important;
    position: relative;
    z-index: 10;
}

#service-section-wrap .service-swiper .swiper-slide {
    width: 100% !important; 
    height: 100% !important; 
    display: flex;
    align-items: center;
    transition: opacity 0.5s ease, visibility 0.5s ease;
    opacity: 0; 
    visibility: hidden; /* Prevent inactive slides from intercepting pointer/clicks */
    background: transparent !important;
    pointer-events: none;
    overflow: visible !important;
}

#service-section-wrap .service-swiper .swiper-slide-active {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

/* Static Card Definition */
.static-service-card {
    width: 100%;
    height: 100% !important;
    position: relative;
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    display: flex;
    align-items: center;
    overflow: visible !important;
}

.static-service-card.is-detailed {
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

/* Mode 1: Front State */
.card-front {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    overflow: visible !important; 
    z-index: 5;
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    border-radius: 24px;
    box-shadow: 0px 20px 80px rgba(0, 0, 0, 0.6) !important; /* Move shadow directly to card */
    border: 1px solid rgba(255, 255, 255, 0.22) !important; /* Premium thin visible white border */
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.6s ease;
    will-change: transform, opacity;
}

/* State when user clicks Read More - Staggered Exit Animations */
.static-service-card.is-leaving .card-front-overlay {
    opacity: 0;
    transition: opacity 0.5s ease;
}

/* Staggered Exit Timing - Optimized for GPU */
.static-service-card.is-leaving .floating-3d {
    transform: translate3d(0, -120px, 0) scale(0.75); /* Softly straight up and slightly smaller */
    opacity: 0;
    transition: transform 1.2s cubic-bezier(0.25, 1, 0.2, 1), opacity 1.2s cubic-bezier(0.25, 1, 0.2, 1);
    will-change: transform, opacity;
}

.static-service-card.is-leaving .card-front-info h3 {
    transform: translate3d(100px, 0, 0);
    opacity: 0;
    transition: transform 0.7s cubic-bezier(0.7, 0, 0.3, 1) 0.1s, opacity 0.7s ease 0.1s;
    will-change: transform, opacity;
}

.static-service-card.is-leaving .card-front-info p {
    transform: translate3d(0, -80px, 0);
    opacity: 0;
    transition: transform 0.7s cubic-bezier(0.7, 0, 0.3, 1) 0.2s, opacity 0.7s ease 0.2s;
    will-change: transform, opacity;
}

.static-service-card.is-leaving .read-more-link {
    transform: translate3d(0, -50px, 0);
    opacity: 0;
    transition: transform 0.6s cubic-bezier(0.7, 0, 0.3, 1) 0.3s, opacity 0.6s ease 0.3s;
    will-change: transform, opacity;
}

.card-front-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(15, 23, 42, 0.3) 0%, rgba(15, 23, 42, 0.85) 100%) !important;
    z-index: 1;
    pointer-events: none;
    transition: opacity 0.6s ease;
    border-radius: 24px;
    overflow: hidden !important;
}

.card-front-content {
    position: relative;
    z-index: 10;
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    overflow: visible !important;
}

.card-front-visual {
    width: 320px !important;
    height: 320px !important;
    flex-shrink: 0;
    border-radius: 25px;
    transform: translateX(-30px); /* Beautiful overlap offset shifted to the right */
    overflow: visible !important; /* Allow 3D visual to pop out */
    position: relative;
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

.floating-3d {
    position: absolute;
    left: -20%;
    top: -20%;
    height: 140%; 
    width: auto;
    object-fit: contain;
    z-index: 20;
    pointer-events: none;
    transition: transform 1.2s cubic-bezier(0.25, 1, 0.2, 1), opacity 1.2s ease;
}

.swiper-slide:not(.swiper-slide-active) .floating-3d {
    transform: scale(0.9) rotate(-10deg) translate3d(-60px, 0, 0);
    opacity: 0;
}

.swiper-slide-active .floating-3d {
    transform: scale(1.05) rotate(-3deg) translate3d(0, 0, 0);
    opacity: 1;
}

.card-front-info {
    flex: 1;
    padding: 0 20px 0 0;
    margin-left: -30px;
    text-align: left;
    position: relative;
    z-index: 25;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card-front-info h3 {
    font-size: 1.8rem;
    color: #fff;
    font-family: 'Aeonik', sans-serif;
    font-weight: 800;
    margin-bottom: 0.8rem;
    letter-spacing: -1px;
    transition: transform 1s cubic-bezier(0.25, 1, 0.2, 1) 0.1s, opacity 1s ease 0.1s;
    will-change: transform, opacity;
}

.card-front-info p {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.7);
    line-height: 1.5;
    margin-bottom: 1.2rem;
    transition: transform 1s cubic-bezier(0.25, 1, 0.2, 1) 0.2s, opacity 1s ease 0.2s;
    will-change: transform, opacity;
}

.read-more-link {
    position: relative;
    z-index: 30 !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #3b82f6;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-decoration: none;
    transition: transform 1s cubic-bezier(0.25, 1, 0.2, 1) 0.3s, opacity 1s ease 0.3s, gap 0.3s ease, color 0.3s ease;
    pointer-events: auto !important;
    will-change: transform, opacity;
}

.swiper-slide:not(.swiper-slide-active) .card-front-info h3 {
    transform: translate3d(40px, 0, 0);
    opacity: 0;
}

.swiper-slide:not(.swiper-slide-active) .card-front-info p {
    transform: translate3d(40px, 0, 0);
    opacity: 0;
}

.swiper-slide:not(.swiper-slide-active) .read-more-link {
    transform: translate3d(40px, 0, 0);
    opacity: 0;
}

.swiper-slide-active .card-front-info h3,
.swiper-slide-active .card-front-info p,
.swiper-slide-active .read-more-link {
    transform: translate3d(0, 0, 0);
    opacity: 1;
}

.read-more-link i {
    font-size: 0.7rem;
    transition: transform 0.3s ease;
}

.read-more-link:hover i {
    transform: translateX(5px);
}

/* Mode 2: Detail State (Overlapping Visual & Content Alignment) */
.card-detail {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%) !important; /* Premium light white gradient background */
    border-radius: 24px;
    box-shadow: 0px 20px 80px rgba(0, 0, 0, 0.25) !important; /* Soft dark shadow for light panel contrast */
    border: 1px solid rgba(0, 0, 0, 0.08) !important; /* Light border */
    opacity: 0;
    transition: opacity 0.6s ease;
    z-index: 15;
    display: flex;
    align-items: center;
    will-change: opacity;
    pointer-events: none;
    overflow: visible !important;
}

.card-detail-overlay {
    display: none !important;
}

.card-detail-visual {
    display: none !important;
}

.card-detail-content {
    flex: 1;
    padding: 40px !important; /* Beautiful generous padding inside the full-width card */
    margin-left: 0 !important; /* Remove negative margin overlap since left visual is gone */
    text-align: left;
    position: relative;
    z-index: 20;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card-detail-content h3 {
    font-size: 1.8rem;
    font-weight: 800;
    margin-bottom: 0.8rem;
    color: #0f172a !important;
    font-family: 'Aeonik', sans-serif;
    letter-spacing: -1px;
    position: relative;
}

.card-detail-content h3::after {
    content: '';
    display: block;
    width: 50px;
    height: 4px;
    background: #005ee9; /* Premium blue underline */
    margin-top: 0.8rem;
    border-radius: 2px;
}

/* System Logic Classes */
.static-service-card.is-leaving .card-front {
    opacity: 0 !important;
    transition: opacity 0.2s ease-out !important;
}

.static-service-card.is-leaving-detail .card-detail {
    opacity: 0 !important;
    transition: opacity 0.2s ease-out !important;
}

.static-service-card.is-detailed .card-front {
    display: none !important;
}

.static-service-card.is-detailed .card-detail {
    opacity: 1;
    pointer-events: auto;
}

/* Force 3D visual to be completely hidden in Mode 2 (Detail Mode) without flashing */
.static-service-card.is-detailed .floating-3d {
    opacity: 0 !important;
    visibility: hidden !important;
    transform: translate3d(0, -120px, 0) scale(0.75) !important;
    transition: none !important;
}

/* Cinematic Flash Systems */
.card-front-overlay::after,
.card-detail-overlay::after {
    content: '';
    position: absolute;
    inset: 0;
    transform: translate3d(-110%, 0, 0);
    pointer-events: none;
    opacity: 0;
    visibility: hidden;
    transition: none;
    will-change: transform;
}

/* White Flash - To Detail (Stays inside card-front-overlay) */
.card-front-overlay::after {
    z-index: 10;
}

/* Black Flash - From Detail (Stays inside card-detail-overlay) */
.card-detail-overlay::after {
    z-index: 10;
}

/* White Flash Trigger */
.static-service-card.trigger-flash .card-front-overlay::after {
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.9), transparent);
    visibility: visible;
    opacity: 1;
    animation: flash-sweep 1s cubic-bezier(0.65, 0, 0.35, 1) forwards;
}

/* Black Flash Trigger */
.static-service-card.trigger-black-flash .card-detail-overlay::after {
    background: linear-gradient(90deg, transparent, rgba(0,0,0,0.95), transparent);
    visibility: visible;
    opacity: 1;
    animation: flash-sweep 1.2s cubic-bezier(0.65, 0, 0.35, 1) forwards;
}

@keyframes flash-sweep {
    0% { transform: translate3d(-110%, 0, 0); }
    100% { transform: translate3d(110%, 0, 0); }
}

/* Entrance Animation for Mode 1 - Stays on top of black flash */
.static-service-card.entering-front .card-front {
    animation: slideUpFront 1.4s cubic-bezier(0.25, 1, 0.2, 1) forwards;
    z-index: 2000 !important;
}

@keyframes slideUpFront {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

/* 3D Visual slides left-to-right, starting dim and blurred */
.static-service-card.entering-front .floating-3d {
    animation: slideIn3d 1.5s cubic-bezier(0.25, 1, 0.2, 1) forwards;
}

@keyframes slideIn3d {
    0% {
        transform: translate3d(-100px, 0, 0) scale(0.9) rotate(-10deg);
        opacity: 0;
    }
    100% {
        transform: translate3d(0, 0, 0) scale(1.05) rotate(-3deg);
        opacity: 1;
    }
}

/* Staggered text entrances for maximum premium feel */
.static-service-card.entering-front .card-front-info h3 {
    animation: fadeInText 1.2s cubic-bezier(0.25, 1, 0.2, 1) 0.2s forwards;
    opacity: 0;
}

.static-service-card.entering-front .card-front-info p {
    animation: fadeInText 1.2s cubic-bezier(0.25, 1, 0.2, 1) 0.3s forwards;
    opacity: 0;
}

.static-service-card.entering-front .read-more-link {
    animation: fadeInText 1.2s cubic-bezier(0.25, 1, 0.2, 1) 0.4s forwards;
    opacity: 0;
}

@keyframes fadeInText {
    0% {
        transform: translate3d(0, 20px, 0);
        opacity: 0;
    }
    100% {
        transform: translate3d(0, 0, 0);
        opacity: 1;
    }
}

.detail-list-content {
    list-style: none;
    padding: 0;
    margin: 0.8rem 0;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    width: 100%;
}

.detail-list-content li {
    font-size: 0.95rem;
    color: #334155; /* Premium slate gray for light background */
    line-height: 1.6;
    padding-left: 2rem;
    position: relative;
    transform: translateY(15px);
    opacity: 0;
}

.detail-list-content li::before {
    content: '→';
    position: absolute;
    left: 0;
    color: #005ee9; /* AB Malaya Blue */
    font-weight: bold;
    font-size: 1.1rem;
}

.detail-list-content li strong {
    color: #0f172a; /* Slate 900 very dark black labels */
    font-weight: 700;
}

.is-detailed .detail-list-content li {
    animation: slideUpContent 0.3s ease forwards;
}

.is-detailed .detail-list-content li:nth-child(1) { animation-delay: 0.05s; }
.is-detailed .detail-list-content li:nth-child(2) { animation-delay: 0.1s; }
.is-detailed .detail-list-content li:nth-child(3) { animation-delay: 0.15s; }
.is-detailed .detail-list-content li:nth-child(4) { animation-delay: 0.2s; }

@keyframes slideUpContent {
    0% { transform: translateY(20px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

.detail-back-btn {
    align-self: flex-start;
    background: rgba(15, 23, 42, 0.05); /* Soft dark gray tint for light theme */
    border: 1px solid rgba(15, 23, 42, 0.12); /* Subtle dark border */
    color: #0f172a; /* Slate 900 very dark/black text */
    padding: 0.8rem 1.8rem;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 700;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s cubic-bezier(0.25, 1, 0.2, 1);
    margin: 0;
}

.detail-back-btn:hover {
    background: #0f172a; /* Black background on hover */
    color: #fff; /* White text on hover */
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(15, 23, 42, 0.15);
}

@media (max-width: 768px) {
    .service-swiper {
        margin: 110px auto 20px !important;
        padding: 25px !important;
        max-width: 95% !important;
        width: 95% !important;
        border-radius: 15px !important;
        min-height: auto !important;
    }
    #service-section-wrap .service-swiper .swiper-slide {
        flex-direction: column !important;
        height: auto !important;
        width: 100% !important;
    }
    .card-front, .card-detail {
        flex-direction: column !important;
        position: relative !important;
        height: auto !important;
        width: 100% !important;
        align-items: center !important;
    }
    .card-front-content {
        flex-direction: column !important;
        height: auto !important;
        width: 100% !important;
        align-items: center !important;
    }
    .card-front-visual, .card-detail-visual {
        width: 85% !important;
        height: 220px !important;
        transform: translateY(-50%) !important;
        margin: 0 auto !important;
    }
    .card-front-info, .card-detail-content {
        margin-top: -80px !important;
        margin-left: 0 !important;
        padding: 0 15px 25px !important;
        text-align: center !important;
        width: 100% !important;
        align-items: center !important;
    }
    .floating-3d {
        position: absolute !important;
        left: 50% !important;
        top: 50% !important;
        transform: translate(-50%, -50%) scale(1) !important;
        height: 120% !important;
        width: auto !important;
    }
    .detail-list-content {
        grid-template-columns: 1fr !important;
        gap: 1rem !important;
        text-align: left !important;
    }
    .card-detail-content h3 {
        font-size: 1.8rem !important;
        text-align: center !important;
    }
    .card-detail-content h3::after {
        margin: 0.8rem auto 0 !important;
    }
}
</style>

<?php 
$heroTitle = "Bespoke & <br><span style='color: #005ee9;'>Premium Solutions</span>";
$heroSubtitle = ""; 
$heroDesc = "Explore our comprehensive industrial and maritime service portfolio. <br>Excellence delivered across every division.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<script>
    // Absolute Scroll Restoration Fix - No Lenis
    (function() {
        const resetScroll = () => {
            if (typeof lenis !== 'undefined') { lenis.destroy(); }
            if (window.lenis) { window.lenis.destroy(); }
            document.documentElement.style.setProperty('overflow', 'auto', 'important');
            document.body.style.setProperty('overflow', 'auto', 'important');
        };
        window.addEventListener('load', resetScroll);
        setTimeout(resetScroll, 500);
        setTimeout(resetScroll, 1500);
    })();
</script>

<section class="services-content-grid" id="service-section-wrap">
    <!-- Directional GPU-accelerated background layers -->
    <div class="service-bg-transition-wrap">
        <div class="service-bg-slide active" id="service-bg-1"></div>
        <div class="service-bg-slide" id="service-bg-2"></div>
    </div>
    
    <div class="services-blur-overlay"></div>
    <div class="bg-flash" id="bg-shutter"></div>
    
    <div class="container">
        
        <!-- Redesigned Left Header -->
        <div class="service-header-row">
            <div class="section-title-left">
                <h2>Our Service</h2>
            </div>
            <div class="service-nav-list" id="service-menu">
                <button class="service-link-item active" data-index="0">Marine</button>
                <button class="service-link-item" data-index="1">Logistics</button>
                <button class="service-link-item" data-index="2">Environmental</button>
                <button class="service-link-item" data-index="3">Construction</button>
                <button class="service-link-item" data-index="4">Civil</button>
                <button class="service-link-item" data-index="5">Renovations</button>
                <button class="service-link-item" data-index="6">Mechanical</button>
                <button class="service-link-item" data-index="7">Landscape</button>
            </div>
        </div>

        <div class="service-swiper swiper">
            <!-- Custom Premium Cinematic Navigation Arrows & Next Destination Labels -->
            <div class="swiper-nav-wrapper prev-wrapper">
                <button class="swiper-custom-prev" aria-label="Previous Slide"><i class="fas fa-chevron-left"></i></button>
                <span class="swiper-custom-prev-text">Landscape</span>
            </div>
            <div class="swiper-nav-wrapper next-wrapper">
                <button class="swiper-custom-next" aria-label="Next Slide"><i class="fas fa-chevron-right"></i></button>
                <span class="swiper-custom-next-text">Logistics</span>
            </div>

            <div class="swiper-wrapper">
                
                <!-- Card 1: Marine -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1590579491624-f98f36d4c763?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1590579491624-f98f36d4c763?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/marine.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Marine Technical</h3>
                                    <p>Professional maritime engineering & technical supply solutions.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1544465544-1b71aee9dfa3?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Marine Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Ship Consumables:</strong> Technical and operational stores.</li>
                                    <li><strong>Crew Logistics:</strong> Seamless personnel transit & clearing.</li>
                                    <li><strong>Engineering:</strong> Repairs for hull, deck, and engine systems.</li>
                                    <li><strong>Boiler Services:</strong> Advanced water treatment & descaling.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Logistics -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/logistics.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Logistics</h3>
                                    <p>Efficient cross-border supply chain and fleet management.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Logistics Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Cross-Border:</strong> SGP-MY-TH land transport brokerage.</li>
                                    <li><strong>Secure Handling:</strong> High-value asset protection & tracking.</li>
                                    <li><strong>Compliance:</strong> End-to-end regulatory documentation.</li>
                                    <li><strong>Fleet Support:</strong> 24/7 dedicated industrial deliveries.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Environmental -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/pohon3d.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Environmental</h3>
                                    <p>Specialist corrosion control and industrial waste management.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Environmental Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Corrosion Control:</strong> Techniques & specialist coatings.</li>
                                    <li><strong>Waste Management:</strong> Industrial wastewater containment.</li>
                                    <li><strong>Spill Response:</strong> Rapid deployment for containment.</li>
                                    <li><strong>Consultancy:</strong> Expert prevention & compliance training.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Construction -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/cinstruction.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Construction</h3>
                                    <p>High-capacity industrial and commercial facility development.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1581094288338-2314dddb7ecc?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Construction Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Industrial:</strong> Turnkey factories & energy plants.</li>
                                    <li><strong>Civil Works:</strong> Earthworks & road infrastructure.</li>
                                    <li><strong>Steel Works:</strong> Custom fabrication and erection.</li>
                                    <li><strong>Management:</strong> ISO-certified quality & safety control.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Civil Engineering -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1590069261209-f8e9b8642343?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1590069261209-f8e9b8642343?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/civil.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Civil Engineering</h3>
                                    <p>Precision infrastructure and technical land assessments.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1508450859948-4e04f9ad5657?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Civil Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Infrastructure:</strong> Road, bridge, & harbor projects.</li>
                                    <li><strong>Earthworks:</strong> Site preparation & grading precision.</li>
                                    <li><strong>Water Systems:</strong> Industrial drainage design & setup.</li>
                                    <li><strong>Surveys:</strong> Advanced land & hydrographic surveying.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Renovations -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/renov.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Renovations</h3>
                                    <p>Structural integrity restoration and premium refurbishment.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Renovation Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Structural Repair:</strong> Restoration to modern standards.</li>
                                    <li><strong>Refurbishment:</strong> Corporate and commercial upgrades.</li>
                                    <li><strong>Assessments:</strong> Structural health checks & reinforcement.</li>
                                    <li><strong>Finishing:</strong> High-performance material application.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 7: Mechanical -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1537462715879-360eeb61a0ad?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1537462715879-360eeb61a0ad?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/mekanikal.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Mechanical</h3>
                                    <p>Industrial steel fabrication and energy plant maintenance.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Mechanical Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Steel Works:</strong> Custom industrial fabrication.</li>
                                    <li><strong>Maintenance:</strong> Routine and emergency repairs.</li>
                                    <li><strong>Equipment:</strong> Specialist turbine & gear repairs.</li>
                                    <li><strong>Piping:</strong> High-pressure system design & setup.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 8: Landscape -->
                <div class="swiper-slide" data-bg="https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&q=80&w=1200">
                    <div class="static-service-card">
                        <div class="card-front" style="background-image: url('https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-front-overlay"></div>
                            <div class="card-front-content">
                                <div class="card-front-visual">
                                    <img src="assets/img/service3d/lanscape.png" class="floating-3d" alt="3D Visual">
                                </div>
                                <div class="card-front-info">
                                    <h3>Landscape</h3>
                                    <p>Sustainable eco-landscaping and corporate outdoor facilities.</p>
                                    <a href="#" class="read-more-link">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail" style="background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&q=80&w=800')">
                            <div class="card-detail-overlay"></div>
                            <div class="card-detail-content">
                                <h3>Landscape Details</h3>
                                <ul class="detail-list-content">
                                    <li><strong>Hardscape:</strong> Patios & structural outdoor areas.</li>
                                    <li><strong>Softscape:</strong> Ecological management & preservation.</li>
                                    <li><strong>Amenities:</strong> Corporate green space development.</li>
                                    <li><strong>Sustainability:</strong> Water-efficient irrigation systems.</li>
                                </ul>
                                <button class="detail-back-btn"><i class="fas fa-arrow-left"></i> BACK</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Swiper JS Library -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
/**
 * AB MALAYA - Service Slider Logic
 * Handles Swiper initialization, background syncing, and Dual-State transitions.
 */

document.addEventListener('DOMContentLoaded', function() {
    const sectionWrap = document.getElementById('service-section-wrap');
    const shutter = document.getElementById('bg-shutter');
    const menuItems = document.querySelectorAll('.service-link-item');
    
    if (!sectionWrap) return;

    // DEFENSIVE CLEANUP: Destroy any prior Swiper instances & clean up clone nodes
    const existingSwiperEl = document.querySelector('.service-swiper');
    if (existingSwiperEl && existingSwiperEl.swiper) {
        try {
            existingSwiperEl.swiper.destroy(true, true);
        } catch(err) {
            console.warn("Prior Swiper destroy failed:", err);
        }
    }
    document.querySelectorAll('.swiper-slide-duplicate').forEach(el => el.remove());

    // DOM Restructuring for high-end Projects.php-style overlapping layout
    document.querySelectorAll('.swiper-slide').forEach(slide => {
        const cardFront = slide.querySelector('.card-front');
        const visualFront = slide.querySelector('.card-front-visual');
        if (cardFront && visualFront) {
            // Keep background on cardFront for full-card background experience
            visualFront.style.backgroundImage = 'none';
        }
        
        const cardDetail = slide.querySelector('.card-detail');
        if (cardDetail) {
            const detailBg = cardDetail.style.backgroundImage;
            if (detailBg && detailBg !== 'none') {
                const cleanUrl = detailBg.replace(/^url\(['"]?/, '').replace(/['"]?\)$/, '');
                slide.setAttribute('data-detail-bg', cleanUrl);
                cardDetail.style.backgroundImage = 'none'; // Lock card background to solid CSS gradient
            }
            
            if (!cardDetail.querySelector('.card-detail-visual')) {
                const visualDetail = document.createElement('div');
                visualDetail.className = 'card-detail-visual';
                visualDetail.style.backgroundImage = 'none';
                
                const overlay = document.createElement('div');
                overlay.className = 'card-detail-overlay';
                visualDetail.appendChild(overlay);
                
                const content = cardDetail.querySelector('.card-detail-content');
                cardDetail.insertBefore(visualDetail, content);
                
                // Remove the static duplicate overlay in HTML
                const oldOverlay = cardDetail.querySelector(':scope > .card-detail-overlay');
                if (oldOverlay) oldOverlay.remove();
            }
        }
    });

    // High-performance background transition with directional slide
    let currentBgIndex = 1;
    const transitionBG = (newBgUrl, direction = 'down') => {
        if (!newBgUrl) return;
        
        const nextBgIndex = currentBgIndex === 1 ? 2 : 1;
        const currentBgEl = document.getElementById(`service-bg-${currentBgIndex}`);
        const nextBgEl = document.getElementById(`service-bg-${nextBgIndex}`);
        
        if (!currentBgEl || !nextBgEl) return;
        
        // Normalize newBgUrl to background-image CSS format
        const bgStyleValue = newBgUrl.startsWith('url') ? newBgUrl : `url('${newBgUrl}')`;
        
        // Set background image
        nextBgEl.style.backgroundImage = bgStyleValue;
        
        // Clean up classes
        nextBgEl.className = 'service-bg-slide';
        currentBgEl.className = 'service-bg-slide active';
        
        // Force reflow
        void nextBgEl.offsetWidth;
        
        if (direction === 'down') {
            nextBgEl.classList.add('enter-down');
            void nextBgEl.offsetWidth; // Force reflow
            
            nextBgEl.classList.remove('enter-down');
            nextBgEl.classList.add('active');
            
            currentBgEl.classList.remove('active');
            currentBgEl.classList.add('exit-up');
        } else if (direction === 'back') {
            nextBgEl.classList.add('enter-up');
            void nextBgEl.offsetWidth; // Force reflow
            
            nextBgEl.classList.remove('enter-up');
            nextBgEl.classList.add('active');
            
            currentBgEl.classList.remove('active');
            currentBgEl.classList.add('exit-down');
        }
        
        currentBgIndex = nextBgIndex;
    };

    const updateBG = (swiper) => {
        if (!swiper || !swiper.slides || swiper.slides.length === 0) return;
        const activeSlide = swiper.slides[swiper.activeIndex];
        if (!activeSlide) return;
        
        const bgUrl = activeSlide.getAttribute('data-bg');
        const realIndex = swiper.realIndex;

        // Update Menu Active State
        menuItems.forEach((btn, idx) => {
            btn.classList.toggle('active', idx === realIndex);
        });

        // Update custom navigation destination labels
        const serviceTitles = ["Marine", "Logistics", "Environmental", "Construction", "Civil", "Renovations", "Mechanical", "Landscape"];
        const prevIndex = (realIndex - 1 + 8) % 8;
        const nextIndex = (realIndex + 1) % 8;

        const prevTextEl = document.querySelector('.swiper-custom-prev-text');
        const nextTextEl = document.querySelector('.swiper-custom-next-text');
        if (prevTextEl) prevTextEl.textContent = serviceTitles[prevIndex];
        if (nextTextEl) nextTextEl.textContent = serviceTitles[nextIndex];

        // Sync BG change
        setTimeout(() => {
            if(bgUrl) transitionBG(bgUrl, 'down');
        }, 350);
    };

    // Initialize Swiper with crossfade transition for supreme smoothness
    const serviceSwiper = new Swiper('.service-swiper', {
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        loop: false,
        speed: 1000,
        allowTouchMove: true,
        on: {
            init: function () {
                console.log('Swiper Ready');
                const activeSlide = this.slides[this.activeIndex];
                if (activeSlide) {
                    const bgUrl = activeSlide.getAttribute('data-bg');
                    const initialBg = document.getElementById('service-bg-1');
                    if (initialBg && bgUrl) {
                        initialBg.style.backgroundImage = `url('${bgUrl}')`;
                        initialBg.classList.add('active');
                    }
                }
                setTimeout(() => updateBG(this), 100);
            },
            slideChangeTransitionStart: function () {
                updateBG(this);
                
                // Automatically reset all cards to Mode 1 (front view) when sliding
                document.querySelectorAll('.static-service-card').forEach(card => {
                    card.classList.remove('is-detailed', 'is-leaving', 'is-leaving-detail', 'entering-front');
                });
                if (sectionWrap) {
                    sectionWrap.classList.remove('detail-active');
                }
            }
        }
    });

    // Custom Navigation Click Handlers
    const prevNavBtn = document.querySelector('.swiper-custom-prev');
    const nextNavBtn = document.querySelector('.swiper-custom-next');
    if (prevNavBtn) {
        prevNavBtn.addEventListener('click', () => {
            serviceSwiper.slidePrev();
        });
    }
    if (nextNavBtn) {
        nextNavBtn.addEventListener('click', () => {
            serviceSwiper.slideNext();
        });
    }

    // Global Click Delegation
    document.addEventListener('click', function(e) {
        const readMore = e.target.closest('.read-more-link');
        const backBtn = e.target.closest('.detail-back-btn');

        if (readMore) {
            e.preventDefault();
            const card = readMore.closest('.static-service-card');
            const swiperSlide = readMore.closest('.swiper-slide');

            if (!card || !swiperSlide) return;

            // SAFETY: Only allow clicks on the active Swiper slide to avoid ghost clone conflicts!
            if (!swiperSlide.classList.contains('swiper-slide-active')) {
                return;
            }

            // Fast dim crossfade transition (200ms text swap)
            card.classList.add('is-leaving');
            
            setTimeout(() => {
                card.classList.add('is-detailed');
                card.classList.remove('is-leaving');
                
                // Sync Section BG using Mode 2's specific background image!
                const detailBg = swiperSlide.getAttribute('data-detail-bg');
                const frontBg = swiperSlide.getAttribute('data-bg');
                const targetBg = detailBg || frontBg;
                
                if (sectionWrap && targetBg) {
                    transitionBG(targetBg, 'down');
                    sectionWrap.classList.add('detail-active');
                }
            }, 200);
        }

        if (backBtn) {
            e.preventDefault();
            const card = backBtn.closest('.static-service-card');
            const swiperSlide = backBtn.closest('.swiper-slide');
            
            if (!card || !swiperSlide) return;

            // SAFETY: Only allow clicks on the active Swiper slide!
            if (!swiperSlide.classList.contains('swiper-slide-active')) {
                return;
            }

            const originalBg = swiperSlide.getAttribute('data-bg');

            // Fast back transition
            card.classList.add('is-leaving-detail');
            
            setTimeout(() => {
                card.classList.remove('is-detailed');
                card.classList.remove('is-leaving-detail');
                card.classList.add('entering-front');
                
                // Restore Section Theme
                if (sectionWrap) {
                    sectionWrap.classList.remove('detail-active');
                    if (originalBg) {
                        transitionBG(originalBg, 'back');
                    }
                }
            }, 200);
            
            setTimeout(() => {
                card.classList.remove('entering-front');
            }, 500);
        }
    });
 

    // Menu Click Handler
    menuItems.forEach(btn => {
        btn.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            if (!isNaN(index) && index >= 0 && index < 8) {
                serviceSwiper.slideTo(index);
            }
        });
    });

    // Final layout sync
    setTimeout(() => {
        if (serviceSwiper.update) serviceSwiper.update();
    }, 500);

    // Re-sync on window resize
    window.addEventListener('resize', () => {
        if (serviceSwiper.update) serviceSwiper.update();
    });
});
</script>


<?php include 'includes/footer.php'; ?>
