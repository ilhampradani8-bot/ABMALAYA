<?php 
$pageTitle = "Our Services";
$currentPage = "services";
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<style>
    /* 3D Slider Styles from Index.php */
    .services-card-slider {
        background: #fff;
        padding: 40px 0 60px; /* Added breathing room */
        overflow: hidden;
    }

    .intro-visual {
        height: 70vh !important; /* Shorter hero for services */
        min-height: 500px;
    }

    .slider-container {
        height: 40rem;
        width: 100vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        user-select: none;
        position: relative;
    }

    .slider-content {
        height: 30rem;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: visible !important;
        position: relative;
        perspective: 1000px;
    }

    .slider-content .slide {
        position: absolute;
        left: 50%;
        height: 28rem;
        width: 20rem;
        background: #000;
        border-radius: 20px;
        z-index: 0;
        transform: translate(-50%, 0) rotateY(0deg) scale(0.8);
        transform-style: preserve-3d;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    /* Position Classes - Desktop */
    .slide.position-1 { left: 5% !important; z-index: 1 !important; transform: translate(-50%, 0) rotateY(-20deg) scale(0.6) !important; opacity: 0.1 !important; filter: blur(12px); }
    .slide.position-2 { left: 25% !important; z-index: 2 !important; transform: translate(-50%, 0) rotateY(-10deg) scale(0.8) !important; opacity: 0.6 !important; filter: blur(4px); }
    .slide.position-3 { left: 50% !important; z-index: 4 !important; transform: translate(-50%, 0) rotateY(0deg) scale(1) !important; opacity: 1 !important; filter: blur(0px); box-shadow: 0 30px 60px rgba(0,94,233,0.3) !important; cursor: pointer; }
    .slide.position-4 { left: 75% !important; z-index: 2 !important; transform: translate(-50%, 0) rotateY(10deg) scale(0.8) !important; opacity: 0.6 !important; filter: blur(4px); }
    .slide.position-5 { left: 95% !important; z-index: 1 !important; transform: translate(-50%, 0) rotateY(20deg) scale(0.6) !important; opacity: 0.1 !important; filter: blur(12px); }

    /* Media Elements */
    .media { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
    .media img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; opacity: 1 !important; }
    .slide.position-3:hover .media img { transform: scale(1.05); }

    .card-sections {
        position: absolute;
        bottom: 0; left: 0; width: 100%;
        padding: 2.5rem 1.5rem;
        background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
        z-index: 2;
    }

    .card-caption {
        color: #fff;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 1.4rem;
        margin-bottom: 1rem;
        letter-spacing: -0.5px;
    }

    .card-button {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        background: #005ee9;
        color: #fff;
        text-decoration: none;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(10px);
    }

    .slide.position-3 .card-button { opacity: 1; transform: translateY(0); }
    .card-button:hover { background: #fff; color: #005ee9; }

    /* Nav Buttons */
    .slider-nav-bottom { display: flex; gap: 2rem; margin-top: 3rem; z-index: 10; }
    .nav-arrow-btn {
        width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;
        cursor: pointer; border: 1px solid rgba(0,0,0,0.1); border-radius: 50%;
        transition: 0.3s; background: #fff;
    }
    .nav-arrow-btn:hover { background: #005ee9 !important; border-color: #005ee9 !important; color: #fff !important; }

    @media (max-width: 768px) {
        .slider-container { height: auto; padding: 2rem 0; }
        .slider-content { height: 24rem; width: 100vw; overflow: visible !important; }
        .slide { width: 14rem; height: 20rem; }
        
        .slide.position-2 { left: 5% !important; opacity: 0.4 !important; transform: translate(-50%, 0) scale(0.75) !important; filter: blur(2px); z-index: 1 !important; }
        .slide.position-4 { left: 95% !important; opacity: 0.4 !important; transform: translate(-50%, 0) scale(0.75) !important; filter: blur(2px); z-index: 1 !important; }
        .slide.position-3 { left: 50% !important; transform: translate(-50%, 0) scale(1) !important; z-index: 10 !important; opacity: 1 !important; filter: blur(0); }
        .slide.position-1, .slide.position-5 { display: none; }
    }

    /* Details Section Styling */
    .details-section {
        padding: 60px 0 100px;
        background: #fff;
    }

    .service-detail-block {
        display: none; 
        position: relative;
        background: #fff;
        border-radius: 30px;
        padding: 60px 40px 40px;
        margin-bottom: 80px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        animation: slideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .detail-icon {
        position: absolute;
        top: -40px; 
        left: 40px;
        width: 80px;
        height: 80px;
        background: var(--primary);
        color: #fff;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 15px 30px rgba(0, 94, 233, 0.3);
        z-index: 5;
    }

    .detail-header h2 {
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: var(--secondary);
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .detail-item {
        background: #f8fafc;
        padding: 30px;
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        transition: 0.3s;
    }

    .detail-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    @media (max-width: 768px) {
        .services-card-slider {
            padding: 40px 0;
        }
        .details-section {
            padding: 40px 0;
        }
        .service-detail-block { 
            border-radius: 0 !important; 
            margin-bottom: 40px; 
            padding: 40px 0 20px !important; 
            border: none !important; 
        }
        .detail-icon { left: 20px; width: 60px; height: 60px; font-size: 1.5rem; top: -30px; }
        .detail-header { padding: 0 20px !important; text-align: left; }
        .detail-header h2 { font-size: 2rem !important; }
        .details-section .container { padding: 0 !important; max-width: 100% !important; }
        .detail-grid { padding: 0 !important; gap: 10px !important; width: 100% !important; grid-template-columns: 1fr !important; }
        .detail-item { width: 100% !important; border-radius: 0 !important; margin: 0 !important; padding: 25px 20px !important; box-sizing: border-box !important; text-align: left; }
    }
</style>

<?php 
$heroTitle = "Bespoke &";
$heroSubtitle = "Premium Solutions";
$heroDesc = "Explore our comprehensive industrial and maritime service portfolio. <br>Excellence delivered across every division.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="services-card-slider">
    <div class="slider-container">
        <div class="slider-content" id="slider-content">
            <!-- Slide 1: Marine -->
            <div class="slide" data-id="marine">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Marine Industry</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 2: Logistics -->
            <div class="slide" data-id="logistics">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Cross-Border Services</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 3: Environment -->
            <div class="slide" data-id="env">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Environmental Solutions</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 4: Marine (Repeat) -->
            <div class="slide" data-id="marine">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Marine Industry</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 5: Logistics (Repeat) -->
            <div class="slide" data-id="logistics">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Cross-Border Services</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 6: Environment (Repeat) -->
            <div class="slide" data-id="env">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Environmental Solutions</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 7: Marine (Repeat) -->
            <div class="slide" data-id="marine">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Marine Industry</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
            <!-- Slide 8: Logistics (Repeat) -->
            <div class="slide" data-id="logistics">
                <div class="media">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800" alt="">
                </div>
                <div class="card-sections">
                    <div class="card-caption">Cross-Border Services</div>
                    <div class="card-button">Know More</div>
                </div>
            </div>
        </div>

        <div class="slider-nav-bottom">
            <div class="nav-arrow-btn left-arrow" id="slide-prev"><i class="fas fa-arrow-left"></i></div>
            <div class="nav-arrow-btn right-arrow" id="slide-next"><i class="fas fa-arrow-right"></i></div>
        </div>
    </div>
</section>

<!-- Detailed Information Section -->
<section class="details-section">
    <div class="container">
        
        <!-- 1. Marine Industry -->
        <div id="marine" class="service-detail-block">
            <div class="detail-icon"><i class="fas fa-ship"></i></div>
            <div class="detail-header">
                <h2>Marine Industry</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Vessel Consumables</h4>
                    <p>Supplying high-quality equipment for optimal daily vessel operations.</p>
                </div>
                <div class="detail-item">
                    <h4>Logistics & Crewing</h4>
                    <p>Ensuring smooth crew changes and logistical support for maritime operations.</p>
                </div>
                <div class="detail-item">
                    <h4>Engineering & Maintenance</h4>
                    <p>Comprehensive engineering solutions for the marine industry to maintain asset performance.</p>
                </div>
                <div class="detail-item">
                    <h4>Marine Boiler Solutions</h4>
                    <p>Vecom Marine chemicals for boiler treatment and enhancement of vessel operational performance.</p>
                </div>
            </div>
        </div>

        <!-- 2. Cross-Border Services -->
        <div id="logistics" class="service-detail-block">
            <div class="detail-icon"><i class="fas fa-truck-moving"></i></div>
            <div class="detail-header">
                <h2>Cross-Border Services</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Logistics & Transportation</h4>
                    <p>Seamless logistics planning between Singapore, Malaysia, and Thailand.</p>
                </div>
                <div class="detail-item">
                    <h4>Handling & Storage</h4>
                    <p>Secure, efficient, and well-organized handling of cross-border goods.</p>
                </div>
                <div class="detail-item">
                    <h4>Documentation & Compliance</h4>
                    <p>Ensuring smooth regulatory compliance for complex cross-border trade.</p>
                </div>
                <div class="detail-item">
                    <h4>24/7 Operations</h4>
                    <p>Dedicated standby teams and diverse transport fleets to manage operations at any time.</p>
                </div>
            </div>
        </div>

        <!-- 3. Environmental Solutions -->
        <div id="env" class="service-detail-block">
            <div class="detail-icon"><i class="fas fa-leaf"></i></div>
            <div class="detail-header">
                <h2>Environmental Solutions</h2>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <h4>Corrosion Prevention</h4>
                    <p>Protecting assets with leading anti-corrosion techniques for long-term durability.</p>
                </div>
                <div class="detail-item">
                    <h4>Treatment & Repair</h4>
                    <p>Specialized repair services to extend the life of your industrial equipment.</p>
                </div>
                <div class="detail-item">
                    <h4>Training & Consultation</h4>
                    <p>Expert training on corrosion prevention best practices for technical personnel.</p>
                </div>
                <div class="detail-item">
                    <h4>Waste Management</h4>
                    <p>Wastewater and spill solutions for safely disposing of industrial waste.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sliders = document.querySelectorAll(".slide");
        if (sliders.length === 0) return;

        let center = Math.floor(sliders.length / 2);
        
        function updatePositions() {
            sliders.forEach((slide, index) => {
                slide.classList.remove("position-1", "position-2", "position-3", "position-4", "position-5", "position-none");
                
                let diff = index - center;
                if (diff < -2) diff += sliders.length;
                if (diff > 3) diff -= sliders.length;
                if (diff < -sliders.length / 2) diff += sliders.length;
                if (diff > sliders.length / 2) diff -= sliders.length;

                if (diff === -2) slide.classList.add("position-1");
                else if (diff === -1) slide.classList.add("position-2");
                else if (diff === 0) slide.classList.add("position-3");
                else if (diff === 1) slide.classList.add("position-4");
                else if (diff === 2) slide.classList.add("position-5");
                else slide.classList.add("position-none");

                // Sync with details section
                if (diff === 0) {
                    const activeId = slide.getAttribute('data-id');
                    showDetail(activeId, false);
                }
            });
        }

        function nextSlide() { center = (center + 1) % sliders.length; updatePositions(); }
        function prevSlide() { center = (center - 1 + sliders.length) % sliders.length; updatePositions(); }

        document.getElementById('slide-next').onclick = nextSlide;
        document.getElementById('slide-prev').onclick = prevSlide;

        sliders.forEach((slide, i) => {
            slide.onclick = () => {
                if (slide.classList.contains('position-3')) {
                    const element = document.getElementById(slide.getAttribute('data-id'));
                    if (element) element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    center = i;
                    updatePositions();
                }
            };
        });

        updatePositions();
        setInterval(nextSlide, 5000); // Autoplay
    });

    function showDetail(id, shouldScroll) {
        document.querySelectorAll('.service-detail-block').forEach(block => {
            block.style.display = 'none';
        });
        const target = document.getElementById(id);
        if (target) {
            target.style.display = 'block';
            if (shouldScroll) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    }
</script>
<?php include 'includes/footer.php'; ?>
