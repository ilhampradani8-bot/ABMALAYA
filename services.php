<?php 
$pageTitle = "Our Services";
$currentPage = "services";
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<style>
    /* Simple Service Cards - Matches index.php */
    .services-page-slider {
        padding: 60px 0;
    }

    .service-card-item {
        position: relative;
        width: 350px;
        height: 500px;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.4s ease;
    }

    .service-card-item:hover {
        transform: translateY(-10px);
    }

    .service-card-item .card-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: transform 0.8s ease;
    }

    .service-card-item:hover .card-image {
        transform: scale(1.1);
    }

    /* Details Section Styling */
    .details-section {
        padding: 60px 0 100px;
        background: #fff;
        min-height: 200px; /* Space for content to appear */
    }

    .service-detail-block {
        display: none; /* Hide by default */
        margin-bottom: 0;
        padding: 50px;
        border-radius: 40px;
        background: #f8fafc;
        border: 2px solid #edf2f7;
        animation: slideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    .service-detail-block.active {
        display: block;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .detail-header {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 40px;
    }

    .detail-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 15px 30px rgba(0, 94, 233, 0.2);
    }

    .detail-header h2 {
        font-family: 'Averta', sans-serif;
        font-weight: 800; /* Uses Averta Demo PE Extrabold Italic */
        color: var(--secondary);
        font-size: 2.8rem;
        margin: 0;
        letter-spacing: -1px;
    }

    .more-arrow-btn {
        width: 45px !important;
        height: 45px !important;
        background: var(--primary);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem !important;
        transition: 0.3s;
        border: none;
        flex-shrink: 0;
        z-index: 10;
        cursor: pointer;
    }

    .desc-row {
        display: flex;
        align-items: center;
        gap: 15px;
        justify-content: flex-end;
        overflow: visible !important;
    }

    .service-content-inner {
        overflow: visible !important;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .detail-item {
        background: #fff;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .detail-item h4 {
        color: var(--primary);
        margin-bottom: 10px;
        font-weight: 700;
    }

    .detail-item p {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.5;
    }

    @media (max-width: 768px) {
        .service-card-item { width: 100%; height: 400px; }
        .detail-header h2 { font-size: 1.8rem; }
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
                
                <!-- Slide 1: Industri Kelautan -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="showDetail('marine')">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800&h=1000&auto=format&fit=crop');">
                            <div class="service-overlay">
                                <div class="service-content-inner">
                                    <h3>Industri Kelautan</h3>
                                    <div class="desc-row">
                                        <div class="more-arrow-btn"><i class="fas fa-arrow-down"></i></div>
                                        <p>Layanan teknis & logistik kelautan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Layanan Lintas Batas -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="showDetail('logistics')">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2000');">
                            <div class="service-overlay">
                                <div class="service-content-inner">
                                    <h3>Layanan Lintas Batas</h3>
                                    <div class="desc-row">
                                        <div class="more-arrow-btn"><i class="fas fa-arrow-down"></i></div>
                                        <p>Logistik SGP - MY - TH.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Solusi Lingkungan -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="showDetail('env')">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=2000');">
                            <div class="service-overlay">
                                <div class="service-content-inner">
                                    <h3>Solusi Lingkungan</h3>
                                    <div class="desc-row">
                                        <div class="more-arrow-btn"><i class="fas fa-arrow-down"></i></div>
                                        <p>Proteksi aset & kelola limbah.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 4: Industri IT -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="showDetail('it')">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&h=1000&auto=format&fit=crop');">
                            <div class="service-overlay">
                                <div class="service-content-inner">
                                    <h3>Industri IT</h3>
                                    <div class="desc-row">
                                        <div class="more-arrow-btn"><i class="fas fa-arrow-down"></i></div>
                                        <p>Infrastruktur IT lokasi terpencil.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 5: Pengadaan Global -->
                <div class="swiper-slide">
                    <div class="service-card-item" onclick="showDetail('procurement')">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2000');">
                            <div class="service-overlay">
                                <div class="service-content-inner">
                                    <h3>Pengadaan Global</h3>
                                    <div class="desc-row">
                                        <div class="more-arrow-btn"><i class="fas fa-arrow-down"></i></div>
                                        <p>Sourcing global komponen teknik.</p>
                                    </div>
                                </div>
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

<!-- Detailed Information Section -->
<section class="details-section">
    <div class="container">
        
        <!-- 1. Industri Kelautan -->
        <div id="marine" class="service-detail-block">
            <div class="detail-header">
                <div class="detail-icon"><i class="fas fa-ship"></i></div>
                <h2>Industri Kelautan</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Perlengkapan Kapal</h4>
                    <p>Menyediakan perlengkapan habis pakai berkualitas tinggi untuk operasional kapal harian.</p>
                </div>
                <div class="detail-item">
                    <h4>Logistik & Awak Kapal</h4>
                    <p>Memastikan pergantian kru dan dukungan logistik yang lancar di berbagai pelabuhan.</p>
                </div>
                <div class="detail-item">
                    <h4>Teknik & Pemeliharaan</h4>
                    <p>Solusi rekayasa komprehensif dan perawatan rutin untuk memastikan kesiapan armada.</p>
                </div>
                <div class="detail-item">
                    <h4>Solusi Boiler Kapal</h4>
                    <p>Penyedia resmi bahan kimia Vecom Marine untuk perawatan boiler dan peningkatan kinerja.</p>
                </div>
            </div>
        </div>

        <!-- 2. Layanan Lintas Batas -->
        <div id="logistics" class="service-detail-block">
            <div class="detail-header">
                <div class="detail-icon"><i class="fas fa-truck-moving"></i></div>
                <h2>Layanan Lintas Batas</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Logistik & Transportasi</h4>
                    <p>Perencanaan logistik terpadu antara Singapura, Malaysia, dan Thailand.</p>
                </div>
                <div class="detail-item">
                    <h4>Penyimpanan Barang</h4>
                    <p>Penanganan dan penyimpanan barang lintas batas yang aman dan efisien.</p>
                </div>
                <div class="detail-item">
                    <h4>Dokumentasi & Bea Cukai</h4>
                    <p>Memastikan kepatuhan regulasi dan kelancaran proses kepabeanan antar negara.</p>
                </div>
                <div class="detail-item">
                    <h4>Operasional 24/7</h4>
                    <p>Tim khusus yang siap siaga mengelola operasi kapan saja dan di mana saja.</p>
                </div>
            </div>
        </div>

        <!-- 3. Solusi Lingkungan -->
        <div id="env" class="service-detail-block">
            <div class="detail-header">
                <div class="detail-icon"><i class="fas fa-leaf"></i></div>
                <h2>Solusi Lingkungan</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Pencegahan Korosi</h4>
                    <p>Melindungi aset berharga dengan teknik anti-korosi terdepan di industri.</p>
                </div>
                <div class="detail-item">
                    <h4>Perawatan & Perbaikan</h4>
                    <p>Layanan perbaikan khusus untuk memperpanjang umur peralatan industri.</p>
                </div>
                <div class="detail-item">
                    <h4>Pelatihan & Konsultasi</h4>
                    <p>Pelatihan ahli tentang praktik terbaik pencegahan korosi dan efisiensi aset.</p>
                </div>
                <div class="detail-item">
                    <h4>Pengelolaan Limbah</h4>
                    <p>Solusi air limbah dan tumpahan untuk menjaga kelestarian lingkungan operasional.</p>
                </div>
            </div>
        </div>

        <!-- 4. Industri IT -->
        <div id="it" class="service-detail-block">
            <div class="detail-header">
                <div class="detail-icon"><i class="fas fa-microchip"></i></div>
                <h2>Industri IT</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Infrastruktur IT</h4>
                    <p>Penyebaran infrastruktur IT yang kokoh untuk lokasi industri terpencil.</p>
                </div>
                <div class="detail-item">
                    <h4>Pemantauan Jarak Jauh</h4>
                    <p>Sistem monitoring real-time untuk memastikan operasional tetap berjalan optimal.</p>
                </div>
                <div class="detail-item">
                    <h4>Keamanan Siber ICS</h4>
                    <p>Perlindungan sistem kontrol industri dari ancaman siber modern.</p>
                </div>
            </div>
        </div>

        <!-- 5. Pengadaan Global -->
        <div id="procurement" class="service-detail-block">
            <div class="detail-header">
                <div class="detail-icon"><i class="fas fa-globe"></i></div>
                <h2>Pengadaan Global</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Sourcing Strategis</h4>
                    <p>Pencarian komponen teknik global dengan harga kompetitif dan kualitas terjamin.</p>
                </div>
                <div class="detail-item">
                    <h4>Jaminan Kualitas</h4>
                    <p>Proses QC ketat untuk memastikan setiap bagian memenuhi standar industri.</p>
                </div>
                <div class="detail-item">
                    <h4>Manajemen Inventaris</h4>
                    <p>Solusi pengelolaan stok untuk meminimalkan waktu tunggu operasional.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="assets/js/main.js"></script>
<script>
    function showDetail(id) {
        // Hide all blocks
        document.querySelectorAll('.service-detail-block').forEach(block => {
            block.classList.remove('active');
        });
        
        // Show the targeted block
        const target = document.getElementById(id);
        if (target) {
            target.classList.add('active');
            
            // Scroll to it
            setTimeout(() => {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 100);
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
