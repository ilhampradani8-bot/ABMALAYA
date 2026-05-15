<?php 
$pageTitle = "Our Services";
$currentPage = "services";
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<style>
    /* Services Page Expanding Card Logic */
    .services-page-slider {
        padding: 60px 0;
    }
    
    .service-card-item {
        position: relative;
        width: 350px;
        height: 500px;
        cursor: pointer;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        overflow: hidden;
        border-radius: 24px;
        background: #000;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .service-card-item.expanded {
        width: 800px;
        z-index: 1000;
        cursor: default;
        aspect-ratio: auto; /* Fix for home.css aspect-ratio */
    }

    .card-front {
        flex: 0 0 350px;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .card-info-pane {
        flex: 1;
        background: var(--white);
        padding: 4rem 3rem;
        display: flex;
        flex-direction: column;
        opacity: 0;
        transform: translateX(40px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1) 0.2s;
        visibility: hidden;
        color: var(--secondary);
    }

    .service-card-item.expanded .card-info-pane {
        opacity: 1;
        transform: translateX(0);
        visibility: visible;
    }

    /* Keep card image for front */
    .card-front .card-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        transition: transform 0.8s ease;
    }

    .service-card-item:hover .card-image {
        transform: scale(1.05);
    }

    .card-info-pane h3 {
        font-family: 'Cinzel', serif;
        color: var(--primary);
        font-size: 2rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid var(--accent);
        padding-bottom: 1rem;
    }

    .card-info-pane ul {
        list-style: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .card-info-pane li {
        margin-bottom: 1.2rem;
        font-weight: 700;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 15px;
        color: #475569;
    }

    .card-info-pane li::before {
        content: '\f00c';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: var(--primary);
        font-size: 0.9rem;
    }

    .close-card {
        margin-top: auto;
        font-size: 0.9rem;
        text-transform: uppercase;
        color: #fff;
        background: var(--primary);
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 800;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        width: fit-content;
        box-shadow: 0 4px 15px rgba(0, 94, 233, 0.3);
    }

    .close-card:hover {
        background: var(--secondary);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .expanded-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent dark without blur */
        z-index: 9000; /* Very high */
        opacity: 0;
        visibility: hidden;
        transition: all 0.5s ease;
        backdrop-filter: none !important; /* Force remove any blur */
        -webkit-backdrop-filter: none !important;
    }

    .expanded-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 992px) {
        .service-card-item.expanded {
            width: 90vw;
            flex-direction: column;
            height: auto;
            max-height: 90vh;
            overflow-y: auto;
        }
        .card-front {
            flex: 0 0 300px;
        }
    }

    @media (max-width: 768px) {
        .service-card-item { width: 100%; height: 450px; }
        .card-info-pane { padding: 2rem; }
    }

    /* Fix Swiper Stacking Context */
    .service-swiper.has-expanded {
        z-index: 9001 !important;
    }

    .swiper-slide.slide-expanded {
        z-index: 9002 !important;
        overflow: visible !important;
        filter: none !important;
        opacity: 1 !important;
    }
    
    .service-card-item.expanded {
        position: relative;
        z-index: 9003;
        filter: none !important;
        transform: translateX(-225px); /* Center when expanding from 350 to 800 */
    }

    @media (max-width: 992px) {
        .service-card-item.expanded {
            width: 90vw;
            flex-direction: column;
            height: auto;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateX(0) !important; /* No translation on mobile */
            margin: 0 auto;
        }
        .card-front {
            flex: 0 0 300px;
            width: 100%;
        }
    }

    .desc-row-left {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 10px;
        justify-content: flex-end; /* Keep text right-aligned but button on its left */
    }

    .desc-row-left .more-arrow-btn {
        order: -1; /* Move button to left of text */
    }

    .desc-row-left p {
        margin: 0;
        font-size: 1rem;
        opacity: 0.9;
    }
</style>

<?php 
$heroTitle = "Bespoke &";
$heroSubtitle = "Premium Solutions";
$heroDesc = "Explore our comprehensive industrial and maritime service portfolio. <br>Excellence delivered across every division.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

        <div class="swiper service-swiper services-page-slider">
            <div class="swiper-wrapper">
                
                <!-- Industri Kelautan -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="expandCard(this)">
                        <div class="card-front">
                            <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800&h=1000&auto=format&fit=crop');">
                                <div class="service-overlay">
                                    <div class="service-content-inner">
                                        <h3>Industri Kelautan</h3>
                                        <div class="desc-row-left">
                                            <div class="more-arrow-btn"><i class="fas fa-plus"></i></div>
                                            <p>Layanan teknis & logistik kelautan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info-pane">
                            <h3>Industri Kelautan</h3>
                            <ul>
                                <li>Perlengkapan Habis Pakai Kapal</li>
                                <li>Logistik dan Transisi Awak Kapal</li>
                                <li>Teknik & Pemeliharaan Kapal</li>
                                <li>Solusi Boiler Kapal (Vecom)</li>
                            </ul>
                            <div class="close-card" onclick="closeAllCards(event)">
                                <i class="fas fa-times"></i> Close Info
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layanan Lintas Batas -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="expandCard(this)">
                        <div class="card-front">
                            <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2000');">
                                <div class="service-overlay">
                                    <div class="service-content-inner">
                                        <h3>Layanan Lintas Batas</h3>
                                        <div class="desc-row-left">
                                            <div class="more-arrow-btn"><i class="fas fa-plus"></i></div>
                                            <p>Logistik SGP - MY - TH.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info-pane">
                            <h3>Layanan Lintas Batas</h3>
                            <ul>
                                <li>Perencanaan Logistik & Transportasi</li>
                                <li>Penanganan & Penyimpanan Barang</li>
                                <li>Dokumentasi & Kepatuhan Bea Cukai</li>
                                <li>Operasional 24/7 & Armada Khusus</li>
                            </ul>
                            <div class="close-card" onclick="closeAllCards(event)">
                                <i class="fas fa-times"></i> Close Info
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solusi Lingkungan -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="expandCard(this)">
                        <div class="card-front">
                            <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=2000');">
                                <div class="service-overlay">
                                    <div class="service-content-inner">
                                        <h3>Solusi Lingkungan</h3>
                                        <div class="desc-row-left">
                                            <div class="more-arrow-btn"><i class="fas fa-plus"></i></div>
                                            <p>Proteksi aset & kelola limbah.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-info-pane">
                            <h3>Solusi Lingkungan</h3>
                            <ul>
                                <li>Pencegahan & Pengendalian Korosi</li>
                                <li>Perawatan & Perbaikan Peralatan</li>
                                <li>Pelatihan & Konsultasi Ahli</li>
                                <li>Pengelolaan Air Limbah & Tumpahan</li>
                            </ul>
                            <div class="close-card" onclick="closeAllCards(event)">
                                <i class="fas fa-times"></i> Close Info
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Swiper Nav -->
            <div class="swiper-nav-wrapper">
                <div class="swiper-button-prev-custom"><i class="fas fa-chevron-left"></i></div>
                <div class="swiper-button-next-custom"><i class="fas fa-chevron-right"></i></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<div class="expanded-overlay" id="services-overlay" onclick="closeAllCards(event)"></div>

<script src="assets/js/main.js"></script>
<script>
    function expandCard(card) {
        if (card.classList.contains('expanded')) return;
        
        // Close others first
        closeAllCards();
        
        card.classList.add('expanded');
        const slide = card.closest('.swiper-slide');
        if (slide) slide.classList.add('slide-expanded');
        
        const swiperContainer = document.querySelector('.service-swiper');
        if (swiperContainer) swiperContainer.classList.add('has-expanded');
        
        document.getElementById('services-overlay').classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Stop swiper autoplay if exists
        const swiperEl = document.querySelector('.service-swiper');
        if (swiperEl && swiperEl.swiper) {
            swiperEl.swiper.autoplay.stop();
        }
    }

    function closeAllCards(e) {
        if (e) e.stopPropagation();
        
        const cards = document.querySelectorAll('.service-card-item');
        cards.forEach(c => c.classList.remove('expanded'));
        
        const slides = document.querySelectorAll('.swiper-slide');
        slides.forEach(s => s.classList.remove('slide-expanded'));
        
        const swiperContainer = document.querySelector('.service-swiper');
        if (swiperContainer) swiperContainer.classList.remove('has-expanded');
        
        document.getElementById('services-overlay').classList.remove('active');
        document.body.style.overflow = 'auto';
        
        // Restart swiper autoplay
        const swiperEl = document.querySelector('.service-swiper');
        if (swiperEl && swiperEl.swiper) {
            swiperEl.swiper.autoplay.start();
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
