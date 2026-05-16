<?php 
$pageTitle = "Certified & Excellence";
$currentPage = "certified";
include 'includes/header.php'; 
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<?php 
$heroTitle = "<span style='color: #005ee9;'>Certified Quality</span> & Industrial Excellence.";
$heroDesc = "AB MALAYA operates with the highest levels of professional integrity and technical excellence. Our CIDB and SSM registrations reflect our dedication to safety and quality in the Malaysian construction and maritime sectors.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<!-- Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- SVG Assets for Wreath Leaves -->
<svg style="display: none;">
    <symbol id="wreath-leaf" viewBox="0 0 65 125">
        <path d="M66.4 126l2.1-4C13.5 102 6.3 49 55 6.7-5.4 55 18.4 106 66.4 126zM59 17c-7-4-18 1-20 5 6 2 15-1 20-5zm-8 9c-6-4-15 1-19 6 6 1 13-2 19-6zM27 41c8 2 14-1 19-7-8-3-14 2-19 7zm14 2c-8-3-14 3-18 9 2 4 14-3 18-9zm-3 9c-9-1-15 7-17 11 2 4 13-4 17-11zM21 75c9-1 13-5 16-13-9 0-12 6-16 13zm19.4-4.1c-10 0-17 10.6-15 13.6 1 2 13-4.6 15-13.6zm.6 8.9c-7 1-11.8 7.2-12.8 12.2 3 1 12-4.3 12.8-12.2zm-7.3 19.9c6 0 11.4-6.9 11.4-13.9-7 2-11.4 10.2-11.4 13.9zM43 108c6 0 10.2-15 5.2-17-4 3-7.2 17-5.2 17zm8 10c9.8-9 8.1-20 3-20-5 10-5 10-3 20zm-23.1 2c2.9 9 19.8 5 21.9-4-7-3-14.5 5-21.9 4zm-8.6-3c5 0 18.7 1 21.7-9-4 0-20.7-1-21.7 9zm14.5-15c-11.7-7.9-19-2-23.2-2 5.2 10 17.2 3 23.2 2zm-7.2-9.5c-5-4-15.5-11.4-22.29-4.4 4.78 4 17.29 10.5 22.29 4.4zM2.6 74C7 79 20 87 22 83c-1-4-12-14-19.4-9zm1.9-15C7.3 67 16 74 19 71c0-4-4-14-14.5-12zm5-15C8.1 55 18 58 21 57c0-3-2-12-11.5-13zM16 32c0 6 3 16 8 16 0-5 1-15-8-16zm8-13c-2 7-1 18 4 19 2-6 4-16-4-19zM36 8c-4 7-3 13-1 19 2-4 6-12 1-19zm10-9.12C41 4.9 39 10 42 18c2-3 8-12.8 4-19.12zM49 12c7 0 15-2 17-10.1-8-.1-13 .9-17 10.1z" />
    </symbol>
</svg>

<!-- Certification Slider Section -->
<section class="certification-showcase" style="min-height: 100vh; display: flex; align-items: center; background: #e6e9ef; overflow: hidden; padding: 60px 0;">
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; width: 100%;">
        <div class="section-header" style="text-align: center; margin-bottom: 30px;">
            <h2 class="award-title" style="font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2.8rem; color: #0f172a; margin-bottom: 0.5rem; display: flex; align-items: center; justify-content: center; gap: 20px;">
                <svg class="award-leaf"><use xlink:href="#wreath-leaf"/></svg>
                <span>Official <span style="color: var(--primary);">Credentials</span></span>
                <svg class="award-leaf" style="transform: scaleX(-1);"><use xlink:href="#wreath-leaf" /></svg>
            </h2>
            <p style="color: #64748b; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Our licenses from national authorities ensure the reliability and professionalism of our services.</p>
        </div>

        <!-- Blog Slider Container -->
        <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
                <!-- CIDB Slide -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/cidb.jpg" alt="CIDB G7 License">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">LICENSE NO: CIDB/G7/2024</span>
                        <div class="blog-slider__title">CIDB G7 License</div>
                        <div class="blog-slider__text">The highest grade contractor registration in Malaysia, authorizing AB MALAYA to undertake civil engineering and building construction projects of unlimited value.</div>
                        <button class="blog-slider__button" onclick="openPreview('assets/img/certified/cidb-certificate.png', 'CIDB G7 License')">VIEW CERTIFICATE</button>
                    </div>
                </div>

                <!-- SSM Slide -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/ssm.png" alt="SSM Certificate" style="object-fit: contain; padding: 30px; background: #fff;">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">REGISTRATION: AB MALAYA SDN BHD</span>
                        <div class="blog-slider__title">SSM Registration</div>
                        <div class="blog-slider__text">Official incorporation certificate from the Companies Commission of Malaysia, verifying our legal status and operational compliance as a leading industry provider.</div>
                        <button class="blog-slider__button" onclick="openPreview('assets/img/certified/ssm-certificate.png', 'SSM Corporate Certificate')">VIEW CERTIFICATE</button>
                    </div>
                </div>
            </div>
            <div class="blog-slider__pagination"></div>
        </div>
    </div>
</section>

<!-- Why It Matters Section (Glassmorphism) -->
<section class="excellence-philosophy" style="padding: 100px 0; background: #fff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 3rem; color: #0f172a; margin-bottom: 2rem; letter-spacing: -1.5px;">Beyond Just <span style="color: var(--primary);">Compliance.</span></h2>
                <div class="philosophy-item" style="margin-bottom: 2rem;">
                    <h4 style="color: #0f172a; margin-bottom: 0.5rem; font-weight: 700;">Safety First Culture</h4>
                    <p style="color: #64748b; line-height: 1.7;">We don't just follow safety rules; we live them. Our Zero-Harm goal is integrated into every project workflow.</p>
                </div>
                <div class="philosophy-item" style="margin-bottom: 2rem;">
                    <h4 style="color: #0f172a; margin-bottom: 0.5rem; font-weight: 700;">Technical Precision</h4>
                    <p style="color: #64748b; line-height: 1.7;">Utilizing state-of-the-art tools and certified methodologies to deliver results that exceed expectations.</p>
                </div>
                <div class="philosophy-item">
                    <h4 style="color: #0f172a; margin-bottom: 0.5rem; font-weight: 700;">Environmental Integrity</h4>
                    <p style="color: #64748b; line-height: 1.7;">Committed to sustainable practices that minimize our footprint across all offshore and onshore operations.</p>
                </div>
            </div>
            <div style="flex: 1; min-width: 300px; position: relative;">
                <div class="glass-stats-card" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border-radius: 40px; padding: 4rem; border: 1px solid rgba(255, 255, 255, 0.5); box-shadow: 0 20px 40px rgba(0,0,0,0.05);">
                    <div style="margin-bottom: 3rem;">
                        <span style="font-size: 4rem; font-weight: 800; color: var(--primary); font-family: 'Aeonik', sans-serif;">100%</span>
                        <p style="font-weight: 700; color: #0f172a; margin-top: -10px;">Compliance Rate</p>
                    </div>
                    <div style="margin-bottom: 3rem;">
                        <span style="font-size: 4rem; font-weight: 800; color: #0f172a; font-family: 'Aeonik', sans-serif;">0</span>
                        <p style="font-weight: 700; color: #0f172a; margin-top: -10px;">Major Safety Incidents</p>
                    </div>
                    <div>
                        <span style="font-size: 4rem; font-weight: 800; color: #0f172a; font-family: 'Aeonik', sans-serif;">15+</span>
                        <p style="font-weight: 700; color: #0f172a; margin-top: -10px;">Industry Awards</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Preview Modal -->
<div id="certModal" class="cert-modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closePreview()">&times;</span>
        <div class="modal-header">
            <h3 id="modalTitle">Certificate Preview</h3>
            <button class="zoom-btn" onclick="toggleZoom()" title="Zoom In/Out">
                <i class="fas fa-search-plus" id="zoomIcon"></i>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            <div class="img-container">
                <img id="previewImg" src="" alt="Preview" oncontextmenu="return false;">
                <div class="img-overlay" oncontextmenu="return false;"></div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Award Leaves Styling */
    .award-leaf {
        width: 2.2em;
        height: 4em;
        fill: #d4af37;
        opacity: 0.9;
        margin-bottom: -0.5rem;
    }

    @media (max-width: 768px) {
        .award-title { font-size: 1.8rem !important; gap: 10px !important; }
        .award-leaf { width: 1.4em; height: 2.5em; }
    }

    /* Blog Slider Certification Styling */
    .blog-slider {
        width: 100%;
        position: relative;
        max-width: 900px;
        margin: auto;
        background: #fff;
        box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.15);
        padding: 40px;
        border-radius: 30px;
        height: 400px;
        transition: all .3s;
    }

    @media screen and (max-width: 992px) {
        .blog-slider { max-width: 680px; height: 400px; }
    }

    @media screen and (max-width: 768px) {
        .blog-slider { min-height: 500px; height: auto; margin: 80px auto; padding: 25px; }
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
        width: 320px;
        flex-shrink: 0;
        height: 320px;
        background: #f8fafc; /* Clean light background for contained images */
        box-shadow: 4px 13px 30px 1px rgba(0, 94, 233, 0.1);
        border-radius: 25px;
        transform: translateX(-100px);
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .blog-slider__img img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Don't cut the image */
        display: block;
        opacity: 1; /* Always clear */
        border-radius: 15px;
        transition: all .3s;
    }

    /* Gradient overlay removed to keep images clear as requested */
    .blog-slider__img:after {
        display: none;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__img { transform: translateY(-50%); width: 90%; margin-left: 5%; }
    }

    .blog-slider__content {
        padding-right: 25px;
        margin-left: -50px;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__content { margin-top: -80px; text-align: center; padding: 0 20px; margin-left: 0; }
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
        letter-spacing: 1px;
    }

    .blog-slider__title {
        font-size: 24px;
        font-weight: 800;
        color: #0d0925;
        margin-bottom: 15px;
        font-family: 'Aeonik', sans-serif;
    }

    .blog-slider__text {
        color: #4e4a67;
        margin-bottom: 25px;
        line-height: 1.6em;
        font-size: 0.95rem;
    }

    .blog-slider__button {
        display: inline-flex;
        background-image: linear-gradient(147deg, #005ee9 0%, #003a91 74%);
        padding: 15px 35px;
        border-radius: 50px;
        color: #fff;
        box-shadow: 0px 10px 30px rgba(0, 94, 233, 0.3);
        text-decoration: none;
        font-weight: 600;
        justify-content: center;
        text-align: center;
        letter-spacing: 1px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }

    .blog-slider__button:hover {
        transform: translateY(-3px);
        box-shadow: 0px 15px 40px rgba(0, 94, 233, 0.4);
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
        .blog-slider { min-height: 450px; height: auto; margin: 120px auto 40px; padding: 20px; }
        .blog-slider__img { transform: translateY(-50%); width: 90%; height: 220px; margin-left: 5%; transform: translateY(-40%); }
        .blog-slider__content { margin-top: -40px; text-align: center; padding: 0 10px; margin-left: 0; padding-bottom: 30px; }
        .blog-slider__title { font-size: 1.3rem; }
        .blog-slider__text { font-size: 0.85rem; margin-bottom: 20px; }
        .blog-slider__button { width: 100%; padding: 12px 20px; font-size: 0.8rem; }
        .blog-slider__pagination { transform: translateX(-50%); left: 50%!important; top: 160px; width: 100%!important; display: flex; justify-content: center; align-items: center; }
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

    @media screen and (max-width: 768px) {
        .blog-slider__pagination .swiper-pagination-bullet { margin: 0 5px; }
    }

    .blog-slider__pagination .swiper-pagination-bullet-active {
        opacity: 1;
        background: #005ee9;
        height: 30px;
        box-shadow: 0px 0px 20px rgba(0, 94, 233, 0.3);
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination .swiper-pagination-bullet-active { height: 11px; width: 30px; }
    }

    /* Modal Styling */
    .cert-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(15, 23, 42, 0.95);
        backdrop-filter: blur(15px);
        overflow: auto;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .cert-modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
    }

    .modal-content {
        background: #fff;
        padding: 15px; /* Thinner frame */
        border-radius: 20px;
        max-width: 95%;
        max-height: 95%;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        transform: scale(0.9);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
    }

    .cert-modal.show .modal-content {
        transform: scale(1);
    }

    .close-modal {
        position: absolute;
        right: 15px;
        top: 10px;
        color: #64748b;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        z-index: 10;
    }

    .close-modal:hover {
        color: var(--primary);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding-right: 40px;
        padding-left: 5px;
    }

    .modal-header h3 {
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 1.2rem;
        color: #0f172a;
        margin: 0;
    }

    .zoom-btn {
        background: #f1f5f9;
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f172a;
        transition: 0.3s;
    }

    .zoom-btn:hover {
        background: var(--primary);
        color: #fff;
    }

    .modal-body {
        overflow: auto;
        max-height: calc(95vh - 60px);
        display: block; /* Change to block for better scroll handling */
        text-align: center;
        padding: 10px;
    }

    .img-container {
        position: relative;
        display: inline-block;
        width: 100%;
        max-width: 800px; /* Default size */
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        user-select: none;
        -webkit-user-drag: none;
    }

    .img-container.zoomed {
        width: 180%; 
        max-width: none;
        cursor: zoom-out;
    }

    .img-container img {
        width: 100%;
        height: auto;
        max-height: 80vh;
        border-radius: 8px;
        display: block;
        pointer-events: none;
        transition: max-height 0.4s ease;
    }

    .img-container.zoomed img {
        max-height: none; /* Allow full height when zoomed */
    }

    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        z-index: 5;
        cursor: zoom-in;
    }

    .img-container.zoomed .img-overlay {
        cursor: zoom-out;
    }

    @media (max-width: 768px) {
        .modal-content { padding: 10px; width: 98%; }
        .modal-header h3 { font-size: 1rem; }
        .cert-card-neu { padding: 25px; border-radius: 30px; }
    }
</style>

<!-- Swiper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Initialize Swiper for Certification Slider
    var swiper = new Swiper('.blog-slider', {
        spaceBetween: 30,
        effect: 'fade',
        loop: true,
        mousewheel: {
            invert: false,
        },
        pagination: {
            el: '.blog-slider__pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        }
    });

    let isZoomed = false;

    function openPreview(imgSrc, title) {
        const modal = document.getElementById('certModal');
        const previewImg = document.getElementById('previewImg');
        const modalTitle = document.getElementById('modalTitle');
        const imgContainer = document.querySelector('.img-container');
        
        isZoomed = false;
        if(imgContainer) imgContainer.classList.remove('zoomed');
        const zoomIcon = document.getElementById('zoomIcon');
        if(zoomIcon) zoomIcon.className = 'fas fa-search-plus';
        
        previewImg.src = imgSrc;
        modalTitle.innerText = title;
        
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
        
        document.body.style.overflow = 'hidden'; 
    }

    function closePreview() {
        const modal = document.getElementById('certModal');
        modal.classList.remove('show');
        
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
        
        document.body.style.overflow = 'auto';
    }

    function toggleZoom() {
        const imgContainer = document.querySelector('.img-container');
        const zoomIcon = document.getElementById('zoomIcon');
        
        isZoomed = !isZoomed;
        if (isZoomed) {
            imgContainer.classList.add('zoomed');
            zoomIcon.className = 'fas fa-search-minus';
        } else {
            imgContainer.classList.remove('zoomed');
            zoomIcon.className = 'fas fa-search-plus';
        }
    }

    // Event listener for overlay
    document.addEventListener('DOMContentLoaded', () => {
        const overlay = document.querySelector('.img-overlay');
        if(overlay) {
            overlay.addEventListener('click', toggleZoom);
        }
    });

    // Close on outside click
    window.onclick = function(event) {
        const modal = document.getElementById('certModal');
        if (event.target == modal) {
            closePreview();
        }
    }

    // Disable keyboard shortcuts for saving/printing
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'p')) {
            e.preventDefault();
        }
    });
</script>

<!-- Page Specific Logic -->
<script src="/assets/js/certified.js?v=1.1"></script>

<?php include 'includes/footer.php'; ?>
