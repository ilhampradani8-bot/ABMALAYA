<?php 
$pageTitle = "Portfolio - AB Malaya";
$currentPage = "projects";
include 'includes/header.php'; 
?>

<!-- Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="assets/css/home.css">

<?php 
$heroTitle = "<span style='color: #005ee9;'>Proven Excellence</span> <br>In Every Major Sector.";
$heroSubtitle = "PORTFOLIO";
$heroDesc = "From large-scale industrial constructions to innovative mobility solutions, explore how AB Malaya delivers technical superiority across Malaysia.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<style>
    .projects-slider-section {
        padding: 120px 0 60px;
        background: #f1f5f9;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    @media screen and (max-width: 768px) {
        .projects-slider-section { padding: 40px 0 20px; display: block; }
    }

    .section-title-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 60px;
        text-align: left;
    }

    @media screen and (max-width: 768px) {
        .section-title-wrapper { 
            flex-direction: column; 
            align-items: flex-start; 
            gap: 1rem; 
            margin-bottom: 20px;
            padding: 0 20px;
        }
        .title-left h2 { font-size: 2.2rem; letter-spacing: -1px; }
    }

    .title-left h5 {
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
        font-family: 'Aeonik', sans-serif;
    }

    .title-left h2 {
        font-size: 3.5rem;
        color: #0d0925;
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        letter-spacing: -2px;
        line-height: 1.1;
        margin: 0;
    }

    /* Blog Slider Styling - REVERTED TO ORIGINAL PREMIUM LOOK */
    .blog-slider {
        width: 100%;
        position: relative;
        max-width: 950px; /* ORIGINAL WIDTH */
        margin: auto;
        background: #fff;
        box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.15);
        padding: 40px;
        border-radius: 30px;
        min-height: 400px;
        transition: all .3s;
    }

    @media screen and (max-width: 992px) {
        .blog-slider { max-width: 680px; height: auto; }
    }

    @media screen and (max-width: 768px) {
        .blog-slider { 
            min-height: 400px; 
            height: auto; 
            margin: 140px auto 30px; /* Ample margin-top for translateY overlap */
            padding: 25px 20px 45px; /* Extra bottom padding for dots */
            max-width: 95%;
            width: 95%;
            border-radius: 15px; 
            box-shadow: 0px 10px 40px rgba(34, 35, 58, 0.1);
            border: none;
        }
    }

    .blog-slider__item {
        display: flex;
        align-items: center;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__item { flex-direction: column; }
    }

    .blog-slider__item.swiper-slide-active .blog-slider__img img {
        opacity: 1;
        transition-delay: .3s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content > * {
        opacity: 1;
        transform: none;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(1) { transition-delay: 0.3s; }
    .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(2) { transition-delay: 0.4s; }
    .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(3) { transition-delay: 0.5s; }
    .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(4) { transition-delay: 0.6s; }

    .blog-slider__img {
        width: 320px; /* ORIGINAL SIZE */
        flex-shrink: 0;
        height: 320px;
        background: #fff;
        box-shadow: 4px 13px 30px 1px rgba(0, 94, 233, 0.15);
        border-radius: 25px;
        transform: translateX(-100px); /* ORIGINAL OVERLAP */
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .blog-slider__img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        opacity: 0;
        transition: all .3s;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__img { 
            width: 90%; 
            height: 200px; /* Slightly shorter for cleaner mobile aspect ratio */
            transform: translateY(-50%); 
            margin-left: 5%;
            margin-right: 5%;
        }
    }

    .blog-slider__content {
        padding-right: 25px;
        margin-left: -50px; /* ORIGINAL MARGIN */
    }

    @media screen and (max-width: 768px) {
        .blog-slider__content { 
            margin-top: -80px; /* Perfect top offset relative to 200px image */
            text-align: center; 
            padding: 0 10px 15px 10px; 
            margin-left: 0; 
        }
    }

    .blog-slider__content > * {
        opacity: 0;
        transform: translateY(25px);
        transition: all .4s;
    }

    .blog-slider__code {
        color: #7b7992;
        margin-bottom: 15px;
        display: block;
        font-weight: 500;
        font-size: 0.8rem;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .blog-slider__title {
        font-size: 28px;
        font-weight: 800;
        color: #0d0925;
        margin-bottom: 15px;
        font-family: 'Aeonik', sans-serif;
    }

    .blog-slider__text {
        color: #4e4a67;
        margin-bottom: 30px;
        line-height: 1.7em;
        font-size: 1rem;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__title { font-size: 1.3rem; margin-bottom: 10px; }
        .blog-slider__text { font-size: 0.85rem; margin-bottom: 20px; }
        .blog-slider__code { font-size: 0.7rem; margin-bottom: 8px; }
    }

    .blog-slider__button {
        display: inline-flex;
        background-image: linear-gradient(147deg, #005ee9 0%, #003a91 74%);
        padding: 15px 40px;
        border-radius: 50px;
        color: #fff;
        box-shadow: 0px 10px 30px rgba(0, 94, 233, 0.3);
        text-decoration: none;
        font-weight: 700;
        justify-content: center;
        text-align: center;
        letter-spacing: 1px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    .blog-slider__button:hover {
        transform: translateY(-3px);
        box-shadow: 0px 15px 40px rgba(0, 94, 233, 0.4);
    }

    @media screen and (max-width: 768px) {
        .blog-slider__button {
            padding: 12px 30px;
            font-size: 0.8rem;
            width: 100%;
            max-width: 240px;
            margin: 0 auto;
        }
    }

    .blog-slider__pagination {
        position: absolute;
        z-index: 21;
        right: 20px;
        width: 11px!important;
        text-align: center;
        left: auto!important;
        top: 50%;
        transform: translateY(-50%);
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination { 
            transform: translateX(-50%); 
            left: 50%!important; 
            top: auto!important;
            bottom: 15px!important; /* Anchored perfectly at the bottom container margin */
            width: 100%!important; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
        }
    }

    .blog-slider__pagination .swiper-pagination-bullet {
        width: 11px;
        height: 11px;
        display: block;
        border-radius: 10px;
        background: #005ee9;
        opacity: 0.2;
        transition: all .3s;
        margin: 8px 0;
    }

    .blog-slider__pagination .swiper-pagination-bullet-active {
        opacity: 1;
        background: #005ee9;
        height: 30px;
        box-shadow: 0px 0px 20px rgba(0, 94, 233, 0.3);
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination .swiper-pagination-bullet { margin: 0 5px; }
        .blog-slider__pagination .swiper-pagination-bullet-active { height: 11px; width: 30px; }
    }

    /* Navigation Arrows */
    .slider-nav-wrapper {
        display: flex;
        gap: 1rem;
    }

    .swiper-btn {
        width: 50px;
        height: 50px;
        border: 2px solid #005ee9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #005ee9;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #fff;
    }

    .swiper-btn:hover {
        background: #005ee9;
        color: #fff;
        transform: scale(1.05);
    }

    .swiper-btn i {
        font-size: 1.1rem;
    }

    /* Mobile Slide Hint */
    .mobile-slide-hint {
        display: none;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        color: #005ee9;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { opacity: 0.4; transform: translateX(0); }
        50% { opacity: 1; transform: translateX(5px); }
        100% { opacity: 0.4; transform: translateX(0); }
    }

    @media screen and (max-width: 768px) {
        .slider-nav-wrapper { display: none; }
        .mobile-slide-hint { display: block; align-self: flex-end; }
    }
</style>

<section class="projects-slider-section" id="portfolio">
    <div class="container-fluid" style="padding: 0; width: 100%; display: flex; flex-direction: column; align-items: center;">
        <!-- Judul & Tombol Sejajar -->
        <div class="section-title-wrapper" style="width: 100%; padding: 0 4vw; max-width: 950px; margin-bottom: 60px;">
            <div class="title-left">
                <h5>Technical Milestones</h5>
                <h2>Significant <span style="color: #005ee9;">Milestones</span> 2025</h2>
            </div>
            
            <div class="slider-nav-wrapper">
                <div class="swiper-btn swiper-button-prev-custom"><i class="fas fa-arrow-left"></i></div>
                <div class="swiper-btn swiper-button-next-custom"><i class="fas fa-arrow-right"></i></div>
            </div>

            <div class="mobile-slide-hint">
                Slide <i class="fas fa-chevron-right"></i>
            </div>
        </div>

        <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
                
                <!-- Project 1 -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/projects/masjid-renove-atap.png" alt="Mosque Renovation">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">LOCATION: PERAK, MALAYSIA | 2025</span>
                        <div class="blog-slider__title">Mosque Roof Renovation</div>
                        <div class="blog-slider__text">Comprehensive replacement of roofing systems and advanced concrete slab waterproofing for community facilities. A critical infrastructure project delivered with technical precision. <br><strong>Value: RM 360,000.00</strong></div>
                        <a href="/contact" class="blog-slider__button">INQUIRE PROJECT</a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/projects/bengkel-alatberat.png" alt="Heavy Machinery Workshop">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">LOCATION: PENANG, MALAYSIA | 2025</span>
                        <div class="blog-slider__title">Heavy Machinery Complex</div>
                        <div class="blog-slider__text">Design and construction of a massive industrial maintenance workshop in Batu Kawan. This project showcases our expertise in large-scale industrial infrastructure. <br><strong>Value: RM 570,000.00</strong></div>
                        <a href="/contact" class="blog-slider__button">INQUIRE PROJECT</a>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/projects/kemenpertanian.png" alt="Tram System">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">LOCATION: SELANGOR, MALAYSIA | 2025</span>
                        <div class="blog-slider__title">12-Passenger Tram System</div>
                        <div class="blog-slider__text">Development and construction of 25 sets of advanced passenger mobility systems for the Ministry of Agriculture. A hallmark of our technical innovation. <br><strong>Value: RM 625,000.00</strong></div>
                        <a href="/contact" class="blog-slider__button">INQUIRE PROJECT</a>
                    </div>
                </div>

            </div>
            <div class="blog-slider__pagination"></div>
        </div>
    </div>
</section>
 
<!-- Swiper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 
<script>
    // Initialize Swiper with custom navigation and slower transition
    var swiper = new Swiper('.blog-slider', {
        spaceBetween: 30,
        effect: 'fade',
        loop: true,
        speed: 1200,
        pagination: {
            el: '.blog-slider__pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-custom',
            prevEl: '.swiper-button-prev-custom',
        },
        autoplay: {
            delay: 8000,
            disableOnInteraction: false,
        }
    });
</script>
 
<?php include 'includes/footer.php'; ?>
