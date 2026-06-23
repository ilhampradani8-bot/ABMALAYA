<?php 
$pageTitle = "Why Us - Certified & Trusted";
$currentPage = "why-us";
$currentSubPage = "why-us";
include 'includes/header.php'; 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<?php 
$heroTitle = "<span style='color: #1191cc;'>Why AB Malaya?</span><br><span style='color: #093863;'>Certified & Trusted.</span>";
$heroDesc = "AB MALAYA is a trusted partner delivering certified quality, industrial compliance, end-to-end solutions, and environmental sustainability across Malaysia and neighbouring countries.";
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

<!-- Section 1: Certified & Trusted (Interactive Slider) -->
<section class="certification-showcase" id="certified">
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; width: 100%;">
        <div class="section-header cert-sec-header">
            <h2 class="award-title">
                <svg class="award-leaf"><use xlink:href="#wreath-leaf"/></svg>
                <span>Certified & <span style="color: var(--primary);">Trusted</span></span>
                <svg class="award-leaf" style="transform: scaleX(-1);"><use xlink:href="#wreath-leaf" /></svg>
            </h2>
            <p class="cert-subtitle">Official registrations and licenses from national authorities ensuring industry-compliant operations.</p>
        </div>

        <!-- Blog Slider Container -->
        <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
                <!-- CIDB Slide -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/cidb.jpg" alt="CIDB G7 License" loading="lazy">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">LICENSED | REGISTERED</span>
                        <div class="blog-slider__title">CIDB Licensed</div>
                        <div class="blog-slider__text">The highest grade contractor registration in Malaysia, authorizing AB MALAYA to undertake civil engineering and building construction projects of unlimited value.</div>
                    </div>
                </div>

                <!-- MOF Slide -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/mof.webp" alt="MOF License" style="object-fit: contain; padding: 30px; background: #fff;" loading="lazy">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">LICENSED | REGISTERED</span>
                        <div class="blog-slider__title">MOF Registered</div>
                        <div class="blog-slider__text">Official procurement registered with the Ministry of Finance Malaysia, qualifying AB MALAYA for government tenders and corporate financial solutions.</div>
                    </div>
                </div>

                <!-- SSM Slide -->
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="assets/img/ssm.webp" alt="SSM Registration" style="object-fit: contain; padding: 30px; background: #fff;" loading="lazy">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">CREDENTIAL | REGISTERED</span>
                        <div class="blog-slider__title">SSM Registration</div>
                        <div class="blog-slider__text">Official incorporation certificate from the Companies Commission of Malaysia, verifying our legal status and operational compliance as a leading industry provider.</div>
                    </div>
                </div>
            </div>
            <!-- Up/Down Pagination & Navigation wrapper on the right -->
            <div class="blog-slider__right-controls">
                <div class="blog-slider__nav-btn blog-slider__prev-btn" title="Previous Slide">
                    <i class="fas fa-chevron-up"></i>
                </div>
                <div class="blog-slider__pagination"></div>
                <div class="blog-slider__nav-btn blog-slider__next-btn" title="Next Slide">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Core Pillars & Strategic Advantages -->
<section class="excellence-philosophy" id="advantages">
    <div class="container" style="width: 100%; max-width: 1200px; padding: 0 20px; position: relative;">
        <div class="section-header strengths-sec-header">
            <h5 class="strengths-subtitle">Core Strengths</h5>
            <h2 class="strengths-title">Strategic Advantages of Choosing <span style="color: var(--primary);">AB MALAYA</span></h2>
        </div>

        <div class="strengths-accordion">
            <!-- Strength 1: Technical Expertise -->
            <div class="strength-item" id="expertise">
                <div class="strength-trigger" onclick="toggleStrength('expertise')">
                    <div class="strength-trigger-left">
                        <span class="strength-num">01</span>
                        <div class="strength-icon-mini">
                            <img src="assets/img/service3d/civil.webp" alt="Technical Expertise">
                        </div>
                        <h3 class="strength-item-title">Technical Expertise</h3>
                    </div>
                    <div class="strength-trigger-right">
                        <button class="strength-view-btn">
                            <span class="btn-text">View Details</span>
                            <i class="fas fa-chevron-down toggle-icon"></i>
                        </button>
                    </div>
                </div>
                <div class="strength-reveal-content">
                    <div class="strength-inner-grid">
                        <div class="strength-text-col">
                            <span class="pillar-tag-3d">Compliance & Precision</span>
                            <p class="strength-description">Our team combines multidisciplinary industrial experience with practical field execution and technical precision.</p>
                        </div>
                        <div class="strength-image-col">
                            <div class="badge-3d-wrapper">
                                <img src="assets/img/service3d/civil.webp" alt="Technical Expertise 3D Icon" class="badge-3d-img">
                            </div>
                        </div>
                    </div>
                    <div class="strength-bg-cover" style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.8) 100%), url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1200&h=800');"></div>
                </div>
            </div>

            <!-- Strength 2: End-to-End Solutions -->
            <div class="strength-item" id="solutions">
                <div class="strength-trigger" onclick="toggleStrength('solutions')">
                    <div class="strength-trigger-left">
                        <span class="strength-num">02</span>
                        <div class="strength-icon-mini">
                            <img src="assets/img/service3d/cinstruction.webp" alt="End-to-End Solutions">
                        </div>
                        <h3 class="strength-item-title">End-to-End Solutions</h3>
                    </div>
                    <div class="strength-trigger-right">
                        <button class="strength-view-btn">
                            <span class="btn-text">View Details</span>
                            <i class="fas fa-chevron-down toggle-icon"></i>
                        </button>
                    </div>
                </div>
                <div class="strength-reveal-content">
                    <div class="strength-inner-grid">
                        <div class="strength-text-col">
                            <span class="pillar-tag-3d">Core Advantage: End-to-End</span>
                            <p class="strength-description">We provide integrated support from planning and consultation to execution, maintenance, and after-sales support.</p>
                        </div>
                        <div class="strength-image-col">
                            <div class="badge-3d-wrapper">
                                <img src="assets/img/service3d/cinstruction.webp" alt="End-to-End Solutions 3D Icon" class="badge-3d-img">
                            </div>
                        </div>
                    </div>
                    <div class="strength-bg-cover" style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.8) 100%), url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200&h=800');"></div>
                </div>
            </div>

            <!-- Strength 3: Regional Operational Capability -->
            <div class="strength-item" id="regional">
                <div class="strength-trigger" onclick="toggleStrength('regional')">
                    <div class="strength-trigger-left">
                        <span class="strength-num">03</span>
                        <div class="strength-icon-mini">
                            <img src="assets/img/service3d/logistics.webp" alt="Regional Operational Capability">
                        </div>
                        <h3 class="strength-item-title">Regional Operational Capability</h3>
                    </div>
                    <div class="strength-trigger-right">
                        <button class="strength-view-btn">
                            <span class="btn-text">View Details</span>
                            <i class="fas fa-chevron-down toggle-icon"></i>
                        </button>
                    </div>
                </div>
                <div class="strength-reveal-content">
                    <div class="strength-inner-grid">
                        <div class="strength-text-col">
                            <span class="pillar-tag-3d">Operational Reach</span>
                            <p class="strength-description">Our cross-border operational network enables seamless coordination across Malaysia and neighbouring countries.</p>
                        </div>
                        <div class="strength-image-col">
                            <div class="badge-3d-wrapper">
                                <img src="assets/img/service3d/logistics.webp" alt="Regional Operational Capability 3D Icon" class="badge-3d-img">
                            </div>
                        </div>
                    </div>
                    <div class="strength-bg-cover" style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.8) 100%), url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1200&h=800');"></div>
                </div>
            </div>

            <!-- Strength 4: Sustainability Commitment -->
            <div class="strength-item" id="sustainability">
                <div class="strength-trigger" onclick="toggleStrength('sustainability')">
                    <div class="strength-trigger-left">
                        <span class="strength-num">04</span>
                        <div class="strength-icon-mini">
                            <img src="assets/img/service3d/pohon3d.webp" alt="Sustainability Commitment">
                        </div>
                        <h3 class="strength-item-title">Sustainability Commitment</h3>
                    </div>
                    <div class="strength-trigger-right">
                        <button class="strength-view-btn">
                            <span class="btn-text">View Details</span>
                            <i class="fas fa-chevron-down toggle-icon"></i>
                        </button>
                    </div>
                </div>
                <div class="strength-reveal-content">
                    <div class="strength-inner-grid">
                        <div class="strength-text-col">
                            <span class="pillar-tag-3d">Sustainability: Eco-Friendly</span>
                            <p class="strength-description">We support environmentally responsible practices through sustainable operational methods and efficient resource management.</p>
                        </div>
                        <div class="strength-image-col">
                            <div class="badge-3d-wrapper">
                                <img src="assets/img/service3d/pohon3d.webp" alt="Sustainability Commitment 3D Icon" class="badge-3d-img">
                            </div>
                        </div>
                    </div>
                    <div class="strength-bg-cover" style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.8) 100%), url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=1200&h=800');"></div>
                </div>
            </div>

            <!-- Strength 5: Customer-Focused Approach -->
            <div class="strength-item" id="customer">
                <div class="strength-trigger" onclick="toggleStrength('customer')">
                    <div class="strength-trigger-left">
                        <span class="strength-num">05</span>
                        <div class="strength-icon-mini">
                            <img src="assets/img/service3d/renov.webp" alt="Customer-Focused Approach">
                        </div>
                        <h3 class="strength-item-title">Customer-Focused Approach</h3>
                    </div>
                    <div class="strength-trigger-right">
                        <button class="strength-view-btn">
                            <span class="btn-text">View Details</span>
                            <i class="fas fa-chevron-down toggle-icon"></i>
                        </button>
                    </div>
                </div>
                <div class="strength-reveal-content">
                    <div class="strength-inner-grid">
                        <div class="strength-text-col">
                            <span class="pillar-tag-3d">Core Advantage: After Sales</span>
                            <p class="strength-description">We prioritize long-term partnerships by delivering reliable service, responsive communication, and consistent operational support.</p>
                        </div>
                        <div class="strength-image-col">
                            <div class="badge-3d-wrapper">
                                <img src="assets/img/service3d/renov.webp" alt="Customer-Focused Approach 3D Icon" class="badge-3d-img">
                            </div>
                        </div>
                    </div>
                    <div class="strength-bg-cover" style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.8) 100%), url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200&h=800');"></div>
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
    /* Section paddings - tighter & elegant spacing */
    .certification-showcase {
        padding: 60px 0 !important;
        background: #e6e9ef;
    }

    .excellence-philosophy {
        padding: 60px 0 !important;
        background: #e6e9ef;
    }

    /* Award Leaves Styling */
    .award-leaf {
        width: 2.2em;
        height: 4em;
        fill: #d4af37;
        opacity: 0.9;
        margin-bottom: -0.5rem;
    }

    /* Header Styling Definitions (Replacing inline styles) */
    .cert-sec-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .award-title {
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        font-size: 3rem !important;
        color: #0f172a;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    .cert-subtitle {
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
        font-size: 1.1rem;
    }

    .strengths-sec-header {
        text-align: center;
        margin-bottom: 50px;
        padding: 0 20px;
    }

    .strengths-subtitle {
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-weight: 700;
        font-size: 0.9rem;
        font-family: 'Aeonik', sans-serif;
        margin-bottom: 1rem;
    }

    .strengths-title {
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        font-size: 3rem;
        color: #0f172a;
        letter-spacing: -1.5px;
        margin: 0 auto;
        max-width: 800px;
        line-height: 1.2;
    }

    @media (max-width: 768px) {
        .award-title { font-size: 1.8rem !important; gap: 10px !important; }
        .award-leaf { width: 1.4em; height: 2.5em; }
    }

    /* Blog Slider Certification Styling (Horizontal premium) */
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
        background: #f8fafc;
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
        object-fit: contain;
        display: block;
        opacity: 1;
        border-radius: 15px;
        transition: all .3s;
    }

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
        .blog-slider__content { margin-top: -80px; text-align: center; padding: 0 20px; margin-left: 0; padding-bottom: 30px; }
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
        background-image: linear-gradient(147deg, #1191cc 0%, #003a91 74%);
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

    /* Certification Slider Right Controls (Vertical Layout) */
    .blog-slider__right-controls {
        position: absolute;
        z-index: 22;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .blog-slider__pagination {
        position: relative;
        z-index: 21;
        width: 11px!important;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .blog-slider__nav-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 94, 233, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1191cc;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(0, 94, 233, 0.05);
        z-index: 23;
    }

    .blog-slider__nav-btn:hover {
        background: #1191cc;
        color: #fff;
        box-shadow: 0 8px 16px rgba(0, 94, 233, 0.25);
        transform: scale(1.15);
    }

    @media screen and (max-width: 768px) {
        .blog-slider { min-height: 450px; height: auto; margin: 120px auto 40px; padding: 20px; }
        .blog-slider__img { transform: translateY(-50%); width: 90%; height: 220px; margin-left: 5%; transform: translateY(-40%); }
        .blog-slider__content { margin-top: -40px; text-align: center; padding: 0 10px; margin-left: 0; padding-bottom: 30px; }
        .blog-slider__title { font-size: 1.3rem; }
        .blog-slider__text { font-size: 0.85rem; margin-bottom: 20px; }
        .blog-slider__button { width: 100%; padding: 12px 20px; font-size: 0.8rem; }
        
        .blog-slider__right-controls {
            flex-direction: row !important;
            right: auto !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            top: 160px !important;
            gap: 12px;
            width: auto !important;
            justify-content: center;
        }

        .blog-slider__pagination {
            flex-direction: row !important;
            transform: none !important;
            left: auto !important;
            top: auto !important;
            width: auto !important;
        }

        .blog-slider__nav-btn {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }

        /* On mobile, up/down becomes left/right! */
        .blog-slider__prev-btn i {
            transform: rotate(-90deg);
        }
        .blog-slider__next-btn i {
            transform: rotate(-90deg);
        }
    }

    .blog-slider__pagination .swiper-pagination-bullet {
        width: 11px;
        height: 11px;
        display: block;
        border-radius: 10px;
        background: #1191cc;
        opacity: 0.2;
        transition: all .3s;
        margin: 8px 0;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination .swiper-pagination-bullet { margin: 0 5px; }
    }

    .blog-slider__pagination .swiper-pagination-bullet-active {
        opacity: 1;
        background: #1191cc;
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
        padding: 15px;
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
        display: block;
        text-align: center;
        padding: 10px;
    }

    .img-container {
        position: relative;
        display: inline-block;
        width: 100%;
        max-width: 800px;
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
        max-height: none;
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

    /* Custom Accordion Styling */
    .strengths-accordion {
        display: flex;
        flex-direction: column;
        gap: 25px;
        width: 100%;
        margin-top: 40px;
    }

    .strength-item {
        background: #e6e9ef;
        border-radius: 20px;
        box-shadow: 6px 6px 12px var(--neu-shadow-dark), -6px -6px 12px var(--neu-shadow-light);
        border: 1px solid rgba(255, 255, 255, 0.5);
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    .strength-item:hover {
        box-shadow: 8px 8px 16px var(--neu-shadow-dark), -8px -8px 16px var(--neu-shadow-light);
        transform: translateY(-2px);
    }

    .strength-trigger {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 24px 32px;
        cursor: pointer;
        user-select: none;
        z-index: 10;
        position: relative;
        background: transparent;
        transition: background 0.3s ease;
    }

    .strength-trigger-left {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .strength-num {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--primary);
        opacity: 0.8;
    }

    .strength-icon-mini {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.4s ease;
    }

    .strength-icon-mini img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .strength-item-title {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.35rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
        transition: color 0.3s ease;
    }

    .strength-view-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #e6e9ef;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 3px 3px 6px var(--neu-shadow-dark), -3px -3px 6px var(--neu-shadow-light);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .strength-item:hover .strength-view-btn {
        color: var(--primary);
    }

    .strength-view-btn i {
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Reveal content area */
    .strength-reveal-content {
        max-height: 0;
        opacity: 0;
        visibility: hidden;
        overflow: hidden;
        position: relative;
        transition: max-height 0.6s cubic-bezier(0.16, 1, 0.3, 1), 
                    opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), 
                    visibility 0.6s;
        z-index: 5;
    }

    .strength-inner-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 40px;
        padding: 20px 40px 48px;
        position: relative;
        z-index: 6;
    }

    .strength-text-col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }

    .strength-description {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.15rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
        margin: 15px 0 0;
        font-weight: 400;
        text-align: left;
    }

    .strength-image-col {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .badge-3d-wrapper {
        width: 200px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.5));
        animation: float3d 6s ease-in-out infinite;
    }

    .badge-3d-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Float 3D Animation */
    @keyframes float3d {
        0% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(3deg); }
        100% { transform: translateY(0px) rotate(0deg); }
    }

    /* Background image of expanded item */
    .strength-bg-cover {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 4;
        opacity: 0;
        transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Expanded state styles */
    .strength-item.active {
        background: #0f172a;
        border-color: rgba(255, 255, 255, 0.1);
    }

    .strength-item.active .strength-item-title {
        color: #ffffff;
    }

    .strength-item.active .strength-num {
        color: #38bdf8;
    }

    .strength-item.active .strength-view-btn {
        background: #0f172a;
        color: #ffffff;
        box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.5), inset -2px -2px 5px rgba(255, 255, 255, 0.05);
    }

    .strength-item.active .strength-view-btn i {
        transform: rotate(180deg);
    }

    .strength-item.active .strength-reveal-content {
        max-height: 800px;
        opacity: 1;
        visibility: visible;
    }

    .strength-item.active .strength-bg-cover {
        opacity: 0.95;
    }

    .strength-item.active .strength-icon-mini {
        transform: rotate(10deg) scale(1.1);
    }

    /* Tag overlay within card */
    .pillar-tag-3d {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: var(--primary);
        padding: 4px 10px;
        border-radius: 30px;
        box-shadow: 0 4px 10px rgba(0, 94, 233, 0.3);
    }

    /* Responsive adjustments for mobile/tablet */
    @media (max-width: 768px) {
        .certification-showcase {
            padding: 40px 0 !important;
        }
        .excellence-philosophy {
            padding: 40px 0 !important;
        }
        .cert-sec-header {
            margin-bottom: 25px !important;
        }
        .strengths-sec-header {
            margin-bottom: 25px !important;
            padding: 0 15px;
        }
        
        /* Section typography mobile optimization */
        .award-title {
            font-size: 1.6rem !important;
            gap: 8px !important;
        }
        .cert-subtitle {
            font-size: 0.85rem !important;
        }
        .strengths-subtitle {
            font-size: 0.72rem !important;
            letter-spacing: 2px !important;
            margin-bottom: 0.3rem !important;
        }
        .strengths-title {
            font-size: 1.5rem !important;
            letter-spacing: -0.6px !important;
            line-height: 1.25 !important;
        }

        .blog-slider {
            margin: 20px auto !important;
            padding: 20px !important;
        }

        .strength-trigger {
            padding: 18px 20px;
        }
        
        .strength-num {
            font-size: 1.1rem;
        }
        
        .strength-icon-mini {
            width: 32px;
            height: 32px;
        }
        
        .strength-item-title {
            font-size: 1rem;
        }
        
        .strength-view-btn {
            padding: 8px 14px;
            font-size: 0.7rem;
        }
        
        .strength-inner-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 10px 20px 24px;
        }
        
        .strength-description {
            font-size: 0.95rem;
            text-align: center;
        }
        
        .strength-text-col {
            align-items: center;
        }
        
        .badge-3d-wrapper {
            width: 120px;
            height: 120px;
        }
    }
    @media (max-width: 768px) {
        .certification-showcase {
            padding: 40px 0 !important;
        }
        .excellence-philosophy {
            padding: 40px 0 !important;
        }
        .cert-sec-header {
            margin-bottom: 25px !important;
        }
        .strengths-sec-header {
            margin-bottom: 25px !important;
            padding: 0 15px;
        }
        
        /* Section typography mobile optimization */
        .award-title {
            font-size: 1.6rem !important;
            gap: 8px !important;
        }
        .cert-subtitle {
            font-size: 0.85rem !important;
        }
        .strengths-subtitle {
            font-size: 0.72rem !important;
            letter-spacing: 2px !important;
            margin-bottom: 0.3rem !important;
        }
        .strengths-title {
            font-size: 1.5rem !important;
            letter-spacing: -0.6px !important;
            line-height: 1.25 !important;
        }

        .blog-slider {
            margin: 20px auto !important;
            padding: 20px !important;
        }
        .strengths-swiper {
            padding: 20px 5px 40px !important;
        }
        .slide-card {
            height: 25rem !important; /* Slightly shorter cards on mobile */
            border-radius: 16px !important;
        }
        
        .card-sections {
            padding: 2.2rem 1.2rem 1.4rem !important;
        }

        /* Card typography mobile optimization */
        .card-caption {
            font-size: 1.15rem !important;
            margin-bottom: 4px !important;
            font-weight: 800 !important;
        }
        .card-desc {
            font-size: 0.75rem !important;
            line-height: 1.35 !important;
            margin-bottom: 8px !important;
            color: rgba(255, 255, 255, 0.75) !important;
        }
        .pillar-tag-3d {
            font-size: 0.58rem !important;
            padding: 2px 7px !important;
            font-weight: 700 !important;
        }

        .badge-3d {
            width: 46px !important;
            height: 46px !important;
            top: 14px !important;
            left: 14px !important;
        }
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
        pagination: {
            el: '.blog-slider__pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.blog-slider__next-btn',
            prevEl: '.blog-slider__prev-btn',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        }
    });

    // Toggle Accordion Strengths
    function toggleStrength(id) {
        const item = document.getElementById(id);
        const isActive = item.classList.contains('active');
        
        // Close other active strengths
        document.querySelectorAll('.strength-item').forEach(el => {
            el.classList.remove('active');
        });
        
        if (!isActive) {
            item.classList.add('active');
            // Smooth scroll to the expanded item
            setTimeout(() => {
                const yOffset = -120;
                const y = item.getBoundingClientRect().top + window.pageYOffset + yOffset;
                if (window.lenis) {
                    window.lenis.scrollTo(y, { duration: 1.2 });
                } else {
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            }, 300);
        }
        
        // Recalibrate Lenis scroll triggers
        setTimeout(() => {
            if (window.lenis) {
                window.lenis.resize();
            }
        }, 600);
    }

    // Handle URL Hash on Page Load or Hash Change without browser scroll jumping
    function handleWhyUsHash() {
        const hash = window.location.hash;
        if (hash) {
            let targetId = hash.substring(1);
            
            // Map legacy or custom hashes if any
            if (targetId === 'advantages' || targetId === 'core-advantages') {
                targetId = 'expertise'; // default to first one
            }
            
            const targetItem = document.getElementById(targetId);
            if (targetItem) {
                if (targetItem.classList.contains('strength-item')) {
                    document.querySelectorAll('.strength-item').forEach(el => {
                        el.classList.remove('active');
                    });
                    targetItem.classList.add('active');
                }
                
                setTimeout(() => {
                    const yOffset = -120;
                    const y = targetItem.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    if (window.lenis) {
                        window.lenis.scrollTo(y, { duration: 1.2 });
                    } else {
                        window.scrollTo({ top: y, behavior: 'smooth' });
                    }
                }, 200);
            }
        }
    }
    window.addEventListener('load', handleWhyUsHash);
    window.addEventListener('hashchange', handleWhyUsHash);

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
<script src="/assets/js/why-us.js?v=1.0"></script>

<?php include 'includes/footer.php'; ?>
