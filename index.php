<?php 
$pageTitle = "Home";
$currentPage = "home";
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<?php 
$heroTitle = "Marine Authority &";
$heroSubtitle = "Industrial Excellence";
$heroDesc = "Delivering tailored engineering and logistics solutions across industries and borders. <br><span class='blue-text'>Your strategic partner for Maritime, IT, and Energy solutions in Malaysia.</span>";
$showButtons = true;
include 'includes/hero_visual.php';
?>

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
        
        <div class="swiper service-swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1590579491624-f98f36d4c763?q=80&w=800&h=1000&auto=format&fit=crop');">
                        <div class="service-overlay">
                            <div class="service-content-inner">
                                <h3>Maritime & Subsea</h3>
                                <div class="desc-row">
                                    <a href="services.php#marine" class="more-arrow-btn"><i class="fas fa-arrow-right"></i></a>
                                    <p>Expert maintenance and specialized logistics.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800&h=1000&auto=format&fit=crop');">
                        <div class="service-overlay">
                            <div class="service-content-inner">
                                <h3>Industrial IT</h3>
                                <div class="desc-row">
                                    <a href="services.php#cross" class="more-arrow-btn"><i class="fas fa-arrow-right"></i></a>
                                    <p>Robust infrastructure for remote sites.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=2000');">
                        <div class="service-overlay">
                            <div class="service-content-inner">
                                <h3>Green Energy</h3>
                                <div class="desc-row">
                                    <a href="services.php#env" class="more-arrow-btn"><i class="fas fa-arrow-right"></i></a>
                                    <p>Industrial solar and low-carbon solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2000');">
                        <div class="service-overlay">
                            <div class="service-content-inner">
                                <h3>Border Logistics</h3>
                                <div class="desc-row">
                                    <a href="services.php#logistics" class="more-arrow-btn"><i class="fas fa-arrow-right"></i></a>
                                    <p>Seamless transport across borders.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 5 -->
                <div class="swiper-slide">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?q=80&w=2000');">
                        <div class="service-overlay">
                            <div class="service-content-inner">
                                <h3>Bio-Solutions</h3>
                                <div class="desc-row">
                                    <a href="services.php#env" class="more-arrow-btn"><i class="fas fa-arrow-right"></i></a>
                                    <p>Eco-friendly cleaning and consultancy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 6 -->
                <div class="swiper-slide">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2000');">
                        <div class="service-overlay">
                            <div class="service-content-inner">
                                <h3>Procurement</h3>
                                <div class="desc-row">
                                    <a href="services.php#procurement" class="more-arrow-btn"><i class="fas fa-arrow-right"></i></a>
                                    <p>Global sourcing for engineering parts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Swiper Navigation Buttons -->
            <div class="swiper-nav-wrapper">
                <div class="swiper-button-prev-custom"><i class="fas fa-chevron-left"></i></div>
                <div class="swiper-button-next-custom"><i class="fas fa-chevron-right"></i></div>
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Trusted Clients Section -->
<section id="clients" style="background: #fff; padding: 80px 0; border-top: 1px solid #f1f5f9; overflow: hidden;">
    <div class="container">
        <h5 style="text-align: center; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px; font-size: 0.8rem; margin-bottom: 4rem;">Trusted by Industry Leaders</h5>
        
        <div class="swiper logo-swiper">
            <div class="swiper-wrapper">
                <!-- Logos from Partners Folder -->
                <div class="swiper-slide client-logo-slide">
                    <a href="https://vecom-marine.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom">
                    </a>
                </div>
                <div class="swiper-slide client-logo-slide">
                    <a href="https://www.durachem.com.my/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/durachem-logo.png" alt="Durachem">
                    </a>
                </div>
                <div class="swiper-slide client-logo-slide">
                    <a href="https://www.belzona.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/belzona-logo.png" alt="Belzona">
                    </a>
                </div>
                <div class="swiper-slide client-logo-slide">
                    <a href="https://www.henkel-adhesives.com/my/en/about/our-brands/loctite.html" target="_blank" rel="noopener">
                        <img src="assets/img/partners/loctite-logo.png" alt="Loctite">
                    </a>
                </div>
                
                <!-- Repeat for loop stability in marquee mode -->
                <div class="swiper-slide client-logo-slide">
                    <a href="https://vecom-marine.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/vecom-logo.jpg" alt="Vecom">
                    </a>
                </div>
                <div class="swiper-slide client-logo-slide">
                    <a href="https://www.durachem.com.my/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/durachem-logo.png" alt="Durachem">
                    </a>
                </div>
                <div class="swiper-slide client-logo-slide">
                    <a href="https://www.belzona.com/" target="_blank" rel="noopener">
                        <img src="assets/img/partners/belzona-logo.png" alt="Belzona">
                    </a>
                </div>
                <div class="swiper-slide client-logo-slide">
                    <a href="https://www.henkel-adhesives.com/my/en/about/our-brands/loctite.html" target="_blank" rel="noopener">
                        <img src="assets/img/partners/loctite-logo.png" alt="Loctite">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<?php include 'includes/footer.php'; ?>
