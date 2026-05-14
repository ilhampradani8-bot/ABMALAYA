<?php 
$pageTitle = "Home";
$currentPage = "home";
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Marine Authority & <br><span style="color: var(--accent);">Industrial Excellence</span></h1>
            <p>Delivering tailored engineering and logistics solutions across industries and borders. Your strategic partner for Maritime, IT, and Energy solutions in Malaysia.</p>
            <div class="hero-btns">
                <a href="services.php" class="cta-btn">Our Services</a>
                <a href="contact.php" class="cta-btn" style="background: transparent; border: 2px solid var(--white); margin-left: 1rem;">Get a Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats / Highlights Section -->
<section style="background: var(--white); padding: 60px 0;">
    <div class="container">
        <div class="card-grid" style="grid-template-columns: repeat(4, 1fr); text-align: center;">
            <div class="stat-item">
                <h2 style="color: var(--primary); font-size: 2.5rem;">B2B</h2>
                <p style="color: var(--text-light);">Scale Focus</p>
            </div>
            <div class="stat-item">
                <h2 style="color: var(--primary); font-size: 2.5rem;">24/7</h2>
                <p style="color: var(--text-light);">Marine Support</p>
            </div>
            <div class="stat-item">
                <h2 style="color: var(--primary); font-size: 2.5rem;">100%</h2>
                <p style="color: var(--text-light);">HSE Compliant</p>
            </div>
            <div class="stat-item">
                <h2 style="color: var(--primary); font-size: 2.5rem;">KL</h2>
                <p style="color: var(--text-light);">Based Hub</p>
            </div>
        </div>
    </div>
</section>

<!-- About Brief -->
<section id="about" style="padding-bottom: 0;">
    <div class="container">
        <div style="margin-bottom: 3rem;">
            <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Who We Are</h5>
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem; color: var(--secondary); font-family: 'Nunito', sans-serif;">Leading the Way in <span style="color: var(--primary);">Industrial Evolution</span></h2>
            <p style="margin-bottom: 1.5rem; color: var(--text-light); max-width: 800px;">
                AB Malaya Sdn Bhd is a dynamic company specializing in Marine Industrial Services, Cross-Border Logistics, and Environmental Solutions. With a commitment to quality, efficiency, and sustainability, we provide cutting-edge solutions for modern industry demands.
            </p>
            <a href="about.php" style="color: var(--primary); font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                Learn More About Us <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Core Services -->
<!-- Core Services Slider -->
<section id="service" style="background: #f8fafc; padding: 100px 0; overflow: hidden;">
    <div class="container">
        <div class="section-title" style="text-align: center; margin-bottom: 4rem;">
            <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Solutions</h5>
            <h2 style="font-size: 2.5rem; color: var(--secondary);">Integrated Expertise</h2>
        </div>
        
        <div class="services-slider-wrapper" style="position: relative; height: 500px; width: 100%; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
            <!-- Slides -->
            <div class="service-slide active" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1516216628859-9bccecad13c7?q=80&w=2000');">
                <div class="service-floating-card">
                    <i class="fas fa-ship"></i>
                    <h3>Maritime & Subsea</h3>
                    <p>Expert maintenance, rust coating, and specialized logistics for the marine industry.</p>
                    <a href="/services#marine" class="learn-more-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="service-slide" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1558494949-ef010cbdcc51?q=80&w=2000');">
                <div class="service-floating-card">
                    <i class="fas fa-microchip"></i>
                    <h3>Industrial IT</h3>
                    <p>Robust network infrastructure and hardware supply for remote industrial sites.</p>
                    <a href="/services#cross" class="learn-more-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="service-slide" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=2000');">
                <div class="service-floating-card">
                    <i class="fas fa-leaf"></i>
                    <h3>Green Energy</h3>
                    <p>Transitioning to sustainable operations with industrial solar and low-carbon solutions.</p>
                    <a href="/services#env" class="learn-more-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Slider Controls -->
            <div class="slider-dots">
                <span class="dot active" onclick="goToSlide(0)"></span>
                <span class="dot" onclick="goToSlide(1)"></span>
                <span class="dot" onclick="goToSlide(2)"></span>
            </div>
        </div>
    </div>
</section>

<style>
    .services-slider-wrapper {
        position: relative;
    }
    .service-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        display: flex;
        align-items: center;
        padding-left: 10%;
    }
    .service-slide.active {
        opacity: 1;
        z-index: 1;
    }
    .service-floating-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        padding: 3rem;
        border-radius: 20px;
        max-width: 400px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.2);
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .service-slide.active .service-floating-card {
        transform: translateY(0);
        opacity: 1;
    }
    .service-floating-card i {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
        display: block;
    }
    .service-floating-card h3 {
        font-size: 1.8rem;
        color: var(--secondary);
        margin-bottom: 1rem;
        font-family: 'Outfit', sans-serif;
    }
    .service-floating-card p {
        color: var(--text-light);
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    .learn-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        color: var(--primary);
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .learn-more-btn:hover i {
        transform: translateX(5px);
    }
    .learn-more-btn i {
        transition: transform 0.3s ease;
    }

    .slider-dots {
        position: absolute;
        bottom: 30px;
        right: 50px;
        z-index: 2;
        display: flex;
        gap: 10px;
    }
    .dot {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        cursor: pointer;
        transition: 0.3s;
    }
    .dot.active {
        background: var(--white);
        width: 30px;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        /* Service Section Mobile Full-Width */
        #service .container {
            padding-left: 0 !important;
            padding-right: 0 !important;
            max-width: 100% !important;
        }
        .services-slider-wrapper {
            border-radius: 0 !important;
            height: 600px !important;
        }
        .service-slide {
            padding: 0 !important;
            align-items: flex-end !important;
            justify-content: center !important;
        }
        .service-floating-card {
            max-width: 92% !important;
            padding: 2.5rem 1.5rem !important;
            margin-bottom: 60px !important;
            text-align: center;
        }
        .slider-dots {
            bottom: 20px !important;
            right: 0 !important;
            left: 0 !important;
            justify-content: center !important;
        }
    }

    @media (max-width: 768px) {
        #service {
            padding: 60px 0 !important;
        }
        .services-slider-wrapper {
            height: 600px !important; /* Increased height to give more vertical space */
        }
        .service-slide {
            padding: 0 !important;
            align-items: flex-end !important; /* Move card to the bottom */
            justify-content: center !important;
        }
        .service-floating-card {
            max-width: 90% !important;
            padding: 2rem 1.5rem !important;
            margin-bottom: 60px !important; /* Lift it slightly from the very bottom */
            text-align: center;
            transform: translateY(20px);
        }
        .service-floating-card h3 {
            font-size: 1.5rem !important;
        }
        .service-floating-card p {
            font-size: 0.95rem !important;
            margin-bottom: 1.5rem !important;
        }
        .slider-dots {
            bottom: 20px !important;
            right: 0 !important;
            left: 0 !important;
            justify-content: center !important;
        }
    }
</style>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.service-slide');
    const dots = document.querySelectorAll('.dot');

    function goToSlide(n) {
        slides[currentSlide].classList.remove('active');
        dots[currentSlide].classList.remove('active');
        currentSlide = n;
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    function nextSlide() {
        let n = (currentSlide + 1) % slides.length;
        goToSlide(n);
    }

    // Auto Slide
    setInterval(nextSlide, 5000);
</script>

<!-- Trusted Clients Section -->
<!-- Trusted Clients Section -->
<section id="clients" style="background: #fff; padding: 80px 0; border-top: 1px solid #f1f5f9; overflow: hidden;">
    <div class="container">
        <h5 style="text-align: center; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.8rem; margin-bottom: 4rem;">Trusted by Industry Leaders</h5>
        
        <div class="logo-slider">
            <div class="logo-track">
                <!-- Logos (Repeated for infinite effect) -->
                <div class="client-logo">PETRONAS</div>
                <div class="client-logo">MISC BERHAD</div>
                <div class="client-logo">SHELL</div>
                <div class="client-logo">SAPURA ENERGY</div>
                <div class="client-logo">MMC CORP</div>
                <div class="client-logo">BOUSTEAD</div>
                <!-- Duplicate for seamless loop -->
                <div class="client-logo">PETRONAS</div>
                <div class="client-logo">MISC BERHAD</div>
                <div class="client-logo">SHELL</div>
                <div class="client-logo">SAPURA ENERGY</div>
                <div class="client-logo">MMC CORP</div>
                <div class="client-logo">BOUSTEAD</div>
            </div>
        </div>
    </div>
</section>

<style>
    .logo-slider {
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    .logo-track {
        display: flex;
        width: calc(250px * 12);
        animation: scroll 30s linear infinite;
        align-items: center;
        gap: 5rem;
    }
    .client-logo {
        width: 250px;
        font-family: 'Cinzel', serif;
        font-weight: 700;
        color: #475569;
        font-size: 1.2rem;
        text-align: center;
        opacity: 0.5;
        transition: 0.3s;
    }
    .client-logo:hover {
        opacity: 1;
        color: var(--primary);
    }
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-250px * 6 - 30rem)); }
    }

    /* 3D Floating Animations for Contact Icons */
    .icon-box-3d {
        position: relative;
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: #fff;
        border: 1px solid rgba(0,0,0,0.03);
    }
    .contact-item:hover .icon-box-3d {
        transform: translateY(-10px) rotateX(10deg) rotateY(10deg);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .pulse-layer {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        background: inherit;
        opacity: 0.3;
        animation: pulse 2s infinite;
        z-index: -1;
    }
    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.3; }
        100% { transform: scale(1.5); opacity: 0; }
    }
</style>


<!-- Map & Location Section -->
<section id="location" style="background: #fff; padding: 100px 0 0 0;">
    <div class="container">
        <div style="margin-bottom: 4rem;">
            <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Get In Touch</h5>
            <h2 style="font-size: 2.5rem; color: var(--secondary); margin-bottom: 2rem; font-family: 'Nunito', sans-serif;">Connect with AB Malaya</h2>
            
            <div style="display: flex; gap: 4rem; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 300px;">
                    <!-- Location Item -->
                    <div class="contact-item" style="display: flex; gap: 1.5rem; margin-bottom: 2rem; align-items: center;">
                        <div class="icon-box-3d" style="color: var(--primary); border-bottom: 3px solid #e0f2fe;">
                            <i class="fas fa-map-location-dot"></i>
                            <div class="pulse-layer" style="background: #e0f2fe;"></div>
                        </div>
                        <div>
                            <p style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">Our Office</p>
                            <p style="color: var(--secondary); font-weight: 500; line-height: 1.6; font-size: 1rem;">
                                2-2-40, Lantai 2 Wisma Rampai, Jalan 34/26, Taman Sri Rampai, 53300 KL
                            </p>
                        </div>
                    </div>
                </div>

                <div style="flex: 1; min-width: 300px;">
                    <!-- Email Item -->
                    <div class="contact-item" style="display: flex; gap: 1.5rem; align-items: center; margin-bottom: 2rem;">
                        <div class="icon-box-3d" style="color: #ef4444; border-bottom: 3px solid #fee2e2;">
                            <i class="fas fa-paper-plane"></i>
                            <div class="pulse-layer" style="background: #fee2e2;"></div>
                        </div>
                        <div>
                            <p style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">Email Inquiry</p>
                            <a href="mailto:info@abmalaya.com" style="color: var(--secondary); font-weight: 500; text-decoration: none; font-size: 1rem; display: block;">info@abmalaya.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/contact" class="cta-btn" style="padding: 0.8rem 2rem; font-size: 0.9rem; margin-top: 1rem; display: inline-block;">Learn More</a>
        </div>
    </div>
    
    <!-- Full-Width Map Preview -->
    <div style="width: 100%; height: 500px; position: relative; border-top: 1px solid #f1f5f9;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.69238304915!2d101.73356!3d3.19323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc382f94e2a39b%3A0xc3411e649e35c24e!2sWisma%20Rampai!5e0!3m2!1sen!2smy!4v1715715545000!5m2!1sen!2smy" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <a href="https://share.google/mZ37nSVlVNA19gUI3" target="_blank" style="position: absolute; bottom: 30px; right: 30px; background: var(--primary); color: #fff; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.9rem; box-shadow: 0 15px 30px rgba(0,0,0,0.3); display: flex; align-items: center; gap: 0.8rem; z-index: 10;">
            <i class="fas fa-directions"></i> Get Directions
        </a>
    </div>
</section>

<!-- Final CTA Section with Wisma Rampai Background -->
<section id="cta" style="background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), url('assets/img/wisma-rampai-front.png'); background-size: cover; background-position: center; background-attachment: fixed; color: var(--white); text-align: center; padding: 80px 0;">
    <div class="container">
        <h2 class="cta-title" style="font-size: 3rem; margin-bottom: 1.5rem; font-family: 'Nunito', sans-serif;">Ready to Start Your Project?</h2>
        <p style="max-width: 600px; margin: 0 auto 2.5rem; opacity: 0.9; font-size: 1.2rem; line-height: 1.6;">Our experts are ready to provide the best maritime and industrial solutions for your business.</p>
        <a href="/contact" class="cta-btn cta-main-btn" style="padding: 1.2rem 4rem; font-size: 1.1rem; background: var(--primary); display: inline-block; box-shadow: 0 15px 30px rgba(0, 94, 233, 0.4);">Contact Our Team Now</a>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        #cta {
            padding: 100px 0 !important;
            background-attachment: scroll !important;
        }
        .cta-title {
            font-size: 2rem !important;
        }
        .cta-main-btn {
            width: 90% !important;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>
