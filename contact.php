<?php 
$pageTitle = "Contact Us";
$currentPage = "contact";
include 'includes/header.php'; 
?>

<!-- GSAP & ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<?php 
$heroTitle = "Connect With <span style='color: #005ee9;'>AB MALAYA</span>";
$heroDesc = "Ready to discuss your next industrial project? Our technical experts are standing by to provide the solutions you need.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="contact-main" id="contact-form">
    <div class="container">
        <div class="contact-grid">
            <!-- Left: Contact Form -->
            <div class="contact-form-side">
                <div class="neu-card-raised form-wrapper">
                    <div class="form-header">
                        <span class="tag">INQUIRY</span>
                        <h2>Send a Message</h2>
                    </div>
                    
                    <form action="#" class="neu-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Full Name</label>
                                <div class="neu-input-inset">
                                    <i class="fas fa-user"></i>
                                    <input type="text" placeholder="John Doe" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="neu-input-inset">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" placeholder="john@example.com" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Company Name</label>
                            <div class="neu-input-inset">
                                <i class="fas fa-building"></i>
                                <input type="text" placeholder="Your Company Sdn Bhd">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Service of Interest</label>
                            <div class="neu-input-inset">
                                <i class="fas fa-cog"></i>
                                <select>
                                    <option value="">Select a Service</option>
                                    <option value="marine">Maritime & Subsea Services</option>
                                    <option value="it">Cross-Border Solutions</option>
                                    <option value="environmental">Environmental Solutions</option>
                                    <option value="consultancy">Technical Consultancy</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Your Message</label>
                            <div class="neu-input-inset textarea-wrap">
                                <i class="fas fa-comment-dots"></i>
                                <textarea placeholder="How can we help you?" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <button type="submit" class="neu-btn-primary">
                            <span>SEND MESSAGE</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Right: Contact Details -->
            <div class="contact-info-side">
                <div class="info-header">
                    <span class="tag">LOCATIONS</span>
                    <h2>Office Details</h2>
                </div>
                
                <div class="info-cards">
                    <!-- HQ Card -->
                    <div class="neu-card-raised info-card contact-item">
                        <div class="icon-box-3d">
                            <div class="pulse-layer"></div>
                            <i class="fas fa-map-location-dot"></i>
                        </div>
                        <div class="info-content">
                            <h4>Kuala Lumpur HQ</h4>
                            <p>2-2-40, Lantai 2 Wisma Rampai, Jalan 34/26, Taman Sri Rampai, 53300 Kuala Lumpur.</p>
                        </div>
                    </div>
                    
                    <!-- WhatsApp Card -->
                    <div class="neu-card-raised info-card contact-item">
                        <div class="icon-box-3d wa">
                            <div class="pulse-layer"></div>
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="info-content">
                            <h4>WhatsApp Support</h4>
                            <div class="links">
                                <a href="https://wa.me/60172240091">+60 17-224 0091</a>
                                <a href="https://wa.me/601113777282">+60 11-1377 7282</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Email Card -->
                    <div class="neu-card-raised info-card contact-item">
                        <div class="icon-box-3d mail">
                            <div class="pulse-layer"></div>
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email Inquiry</h4>
                            <div class="links">
                                <a href="mailto:sales@abmalaya.com">sales@abmalaya.com</a>
                                <a href="mailto:info@abmalaya.com">info@abmalaya.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Full-Width Map Section -->
<section class="map-section" id="map">
    <div class="container">
        <div class="neo-brutalist-container">
            <div class="neo-map-card">
                <div class="map-frame">
                    <iframe 
                        src="https://maps.google.com/maps?q=Wisma%20Rampai,%20Jalan%2034/26,%20Taman%20Sri%20Rampai,%2053300%20Kuala%20Lumpur&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="neo-map-footer">
                    <div class="map-info">
                        <i class="fas fa-location-dot"></i>
                        <span>AB MALAYA SDN BHD - HQ</span>
                    </div>
                    <a href="https://share.google/B9ZtyVyqrMpOXQmOd" target="_blank" class="neo-btn-brutal">
                        VIEW IN BROWSER <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Neo Brutalism Styles for Map */
    .neo-brutalist-container {
        padding: 0 0 2rem 0;
    }

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
        height: 500px;
        width: 100%;
        border-bottom: 4px solid #000;
    }

    .neo-map-footer {
        padding: 1.5rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8fafc;
    }

    .map-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #000;
    }

    .map-info i {
        color: var(--accent-blue);
        font-size: 1.2rem;
    }

    .neo-btn-brutal {
        background: #000;
        color: #fff;
        padding: 0.8rem 2rem;
        font-weight: 800;
        text-decoration: none;
        border: 2px solid #000;
        box-shadow: 4px 4px 0px var(--accent-blue);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }

    .neo-btn-brutal:hover {
        transform: translate(-2px, -2px);
        box-shadow: 6px 6px 0px var(--accent-blue);
        background: var(--accent-blue);
    }

    .neo-btn-brutal:active {
        transform: translate(2px, 2px);
        box-shadow: 0px 0px 0px var(--accent-blue);
    }

    @media (max-width: 768px) {
        .neo-map-footer {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
        }
        .map-frame {
            height: 350px;
        }
    }
</style>


<style>
    :root {
        --neu-bg: #e6e9ef;
        --neu-shadow-dark: #b8bcc2;
        --neu-shadow-light: #ffffff;
        --accent-blue: #005ee9;
    }

    .contact-main {
        background: var(--neu-bg);
        padding: 100px 0 0px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 4rem;
    }

    /* Clean Neumorphic Cards */
    .neu-card-raised {
        background: var(--neu-bg);
        border-radius: 40px;
        box-shadow: 20px 20px 60px var(--neu-shadow-dark), -20px -20px 60px var(--neu-shadow-light);
        padding: 3.5rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-wrapper {
        background: radial-gradient(circle at top right, rgba(0, 94, 233, 0.05) 0%, var(--neu-bg) 60%);
    }


    .tag {
        color: var(--accent-blue);
        font-weight: 800;
        letter-spacing: 2px;
        font-size: 0.8rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .form-header h2, .info-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 2.5rem;
    }

    .neu-form .form-row {
        display: flex;
        gap: 2rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        flex: 1;
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        color: #64748b;
        font-size: 0.85rem;
        margin-bottom: 0.8rem;
        margin-left: 10px;
    }

    .neu-input-inset {
        background: var(--neu-bg);
        box-shadow: inset 6px 6px 12px var(--neu-shadow-dark), inset -6px -6px 12px var(--neu-shadow-light);
        border-radius: 20px;
        display: flex;
        align-items: center;
        padding: 0 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: 0.3s;
    }

    .neu-input-inset i {
        color: #94a3b8;
        margin-right: 1rem;
    }

    .neu-input-inset input, .neu-input-inset select, .neu-input-inset textarea {
        background: transparent;
        border: none;
        width: 100%;
        padding: 1.2rem 0;
        font-family: 'Inter', sans-serif;
        color: #1e293b;
        outline: none;
    }

    .textarea-wrap {
        align-items: flex-start;
    }

    .textarea-wrap i {
        margin-top: 1.5rem;
    }

    .neu-btn-primary {
        background: linear-gradient(145deg, #005ee9, #004bbd);
        color: #fff;
        border: none;
        padding: 1.2rem 3rem;
        border-radius: 50px;
        font-weight: 800;
        letter-spacing: 1px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 10px 10px 20px var(--neu-shadow-dark), -5px -5px 15px var(--neu-shadow-light);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        margin-top: 1rem;
    }

    .neu-btn-primary:hover {
        transform: translateY(-5px);
        box-shadow: 15px 15px 30px var(--neu-shadow-dark);
    }

    .neu-btn-primary:active {
        transform: translateY(2px);
        box-shadow: inset 5px 5px 10px rgba(0,0,0,0.2);
    }

    /* Info Cards Spacing */
    .info-cards {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
    }

    .info-card {
        display: flex;
        gap: 1.5rem;
        padding: 1.5rem 2rem !important;
        align-items: center;
        transition: 0.4s;
    }

    .info-card:hover {
        transform: scale(1.02);
    }

    .icon-box-3d {
        width: 70px;
        height: 70px;
        background: var(--neu-bg);
        border-radius: 20px;
        box-shadow: 8px 8px 16px var(--neu-shadow-dark), -8px -8px 16px var(--neu-shadow-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--accent-blue);
        flex-shrink: 0;
        position: relative;
    }

    .icon-box-3d.wa { color: #25d366; }
    .icon-box-3d.mail { color: #ef4444; }

    .pulse-layer {
        position: absolute;
        width: 100%; height: 100%;
        border-radius: inherit;
        background: currentColor;
        opacity: 0.1;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.2; }
        100% { transform: scale(1.5); opacity: 0; }
    }

    .info-content h4 {
        font-size: 1.2rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .info-content p, .info-content .links a {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.6;
        display: block;
    }

    .info-content .links a:hover {
        color: var(--accent-blue);
    }


    /* Map Section */
    .map-section {
        background: var(--neu-bg);
        padding-bottom: 100px;
    }

    .map-container {
        height: 500px;
        overflow: hidden;
    }

    @media (max-width: 992px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }
    }

    @media (max-width: 768px) {
        .contact-main {
            padding: 60px 0 20px;
        }

        .container {
            padding: 0 6vw !important;
        }

        .contact-grid {
            gap: 2rem;
        }

        .neu-card-3d-pop, .neu-card-raised, .glass-info-card {
            border-radius: 30px !important; 
            padding: 2.5rem !important;
            box-shadow: 15px 15px 30px var(--neu-shadow-dark), -15px -15px 30px var(--neu-shadow-light) !important;
        }

        .neo-map-card {
            border-radius: 0 !important;
            box-shadow: 8px 8px 0px #000 !important;
        }

        .neu-card-3d-pop {
            box-shadow: 0 20px 40px var(--neu-shadow-dark) !important;
        }

        .neu-form .form-row {
            flex-direction: column;
            gap: 0rem;
        }

        .form-group {
            margin-bottom: 1.2rem !important;
        }

        .form-header h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .info-card {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }

        .icon-box-3d {
            margin: 0 auto;
        }

        .map-frame {
            height: 350px;
        }

        .neo-map-footer {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
        }
    }
</style>

<script src="assets/js/contact.js"></script>

<?php include 'includes/footer.php'; ?>
