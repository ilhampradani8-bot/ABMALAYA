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
$heroSubtitle = "GET IN TOUCH";
$heroTitle = "<span style='color: #093863;'>Connect With</span> <span style='color: #1191cc;'>AB MALAYA</span>";
$heroDesc = "Whether you require industrial support, technical consultation, logistics coordination, or engineering solutions, our team is ready to assist you.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="contact-main" id="office-addresses">
    <div class="container">
        <div class="section-header">
            <span class="tag">LOCATIONS</span>
            <h2>Our Offices</h2>
        </div>
        <div class="address-grid">
            <!-- HQ Office -->
            <div class="neu-card-raised info-card address-card contact-item">
                <div class="icon-box-3d address">
                    <div class="pulse-layer"></div>
                    <i class="fas fa-building"></i>
                </div>
                <div class="info-content">
                    <h4>HQ Office</h4>
                    <p>2-2-40, 2nd Floor Wisma Rampai, Jalan 34/26, Taman Sri Rampai, 53300 Kuala Lumpur.</p>
                </div>
            </div>
            <!-- Penang Office -->
            <div class="neu-card-raised info-card address-card contact-item">
                <div class="icon-box-3d address">
                    <div class="pulse-layer"></div>
                    <i class="fas fa-map-location-dot"></i>
                </div>
                <div class="info-content">
                    <h4>Penang Office</h4>
                    <p>4761D, Jalan Pongsu Seribu, 13200 Kepala Batas, Penang.</p>
                </div>
            </div>
            <!-- Perak Office -->
            <div class="neu-card-raised info-card address-card contact-item">
                <div class="icon-box-3d address">
                    <div class="pulse-layer"></div>
                    <i class="fas fa-map-location-dot"></i>
                </div>
                <div class="info-content">
                    <h4>Perak Office</h4>
                    <p>Lot 5465B (A), Simpang Empat Pekan Simpang Empat, 34400 Semanggol, Perak.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Details Section -->
<section class="contact-main" id="contact-details" style="padding-top: 0;">
    <div class="container">
        <div class="section-header">
            <span class="tag">GET IN TOUCH</span>
            <h2>Contact Details</h2>
        </div>
        <div class="details-grid">
            <!-- Phone Number -->
            <div class="neu-card-raised info-card detail-card contact-item">
                <div class="icon-box-3d phone">
                    <div class="pulse-layer"></div>
                    <i class="fas fa-phone-volume"></i>
                </div>
                <div class="info-content">
                    <h4>Phone Number</h4>
                    <div class="links">
                        <a href="tel:+60172240091"><i class="fas fa-phone"></i> +60 17-224 0091</a>
                        <a href="tel:+60117117282"><i class="fas fa-phone"></i> +60 11-711 7282</a>
                    </div>
                </div>
            </div>

            <!-- Email Address -->
            <div class="neu-card-raised info-card detail-card contact-item">
                <div class="icon-box-3d mail">
                    <div class="pulse-layer"></div>
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="info-content">
                    <h4>Email Address</h4>
                    <div class="links">
                        <a href="mailto:sales@abmalaya.com"><i class="fas fa-envelope"></i> sales@abmalaya.com</a>
                        <a href="mailto:info@abmalaya.com"><i class="fas fa-envelope"></i> info@abmalaya.com</a>
                    </div>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="neu-card-raised info-card detail-card contact-item">
                <div class="icon-box-3d hours">
                    <div class="pulse-layer"></div>
                    <i class="far fa-clock"></i>
                </div>
                <div class="info-content">
                    <h4>Business Hours</h4>
                    <span class="hours-text">Mon - Fri: 9:00 AM - 6:00 PM</span>
                </div>
            </div>

            <!-- WhatsApp Button -->
            <div class="neu-card-raised info-card detail-card contact-item">
                <div class="icon-box-3d wa">
                    <div class="pulse-layer"></div>
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div class="info-content">
                    <h4>WhatsApp Support</h4>
                    <p class="compact-txt">Connect instantly with our project coordinators.</p>
                    <div class="wa-btn-container">
                        <a href="https://wa.me/60172240091" target="_blank" class="neu-wa-btn">
                            <i class="fab fa-whatsapp"></i> CHAT ON WHATSAPP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Full-Width Map Section -->
<section class="map-section" id="map">
    <div class="container">
        <div class="section-header">
            <span class="tag">LOCATION MAP</span>
            <h2>HQ Office Map</h2>
        </div>
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

<!-- Inquiry Form Section -->
<section class="inquiry-section" id="contact-form">
    <div class="container">
        <div class="inquiry-form-wrapper">
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
                    
                    <div class="form-row">
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
                    </div>
                    
                    <div class="form-group">
                        <label>Your Message</label>
                        <div class="neu-input-inset textarea-wrap">
                            <i class="fas fa-comment-dots"></i>
                            <textarea placeholder="How can we help you?" rows="5"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-submit-container">
                        <button type="submit" class="neu-btn-primary">
                            <span>SEND MESSAGE</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --neu-bg: #e6e9ef;
        --neu-shadow-dark: #b8bcc2;
        --neu-shadow-light: #ffffff;
        --accent-blue: #093863;
        --accent-blue-bright: #1191cc;
    }

    .contact-main {
        background: var(--neu-bg);
        padding: 100px 0 60px;
    }

    .section-header {
        margin-bottom: 3rem;
        text-align: left;
    }

    .tag {
        color: var(--accent-blue-bright);
        font-weight: 800;
        letter-spacing: 2px;
        font-size: 0.8rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .section-header h2, .form-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--accent-blue);
    }

    /* 3-Column Address Grid */
    .address-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
    }

    /* 2-Column Details Grid (2 rows) */
    .details-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    /* Clean Neumorphic Cards */
    .neu-card-raised {
        background: linear-gradient(145deg, #eef1f6, #e2e5ea);
        border-radius: 30px;
        box-shadow: 20px 20px 40px #b0b4ba, -20px -20px 40px #ffffff;
        padding: 2.5rem 2rem;
        border: 1px solid rgba(255, 255, 255, 0.5);
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
        position: relative;
    }

    /* Horizontal card layout: icon left, text left, buttons right */
    .info-card {
        display: flex;
        flex-direction: row;
        align-items: center;
        text-align: left;
        gap: 1.5rem;
    }

    .neu-card-raised:hover {
        transform: translateY(-5px);
        box-shadow: 20px 20px 40px var(--neu-shadow-dark), -20px -20px 40px var(--neu-shadow-light);
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
        color: var(--accent-blue-bright);
        flex-shrink: 0;
        position: relative;
    }

    .icon-box-3d.address { color: #f59e0b; }
    .icon-box-3d.phone { color: #0ea5e9; }
    .icon-box-3d.wa { color: #25d366; }
    .icon-box-3d.mail { color: #ef4444; }
    .icon-box-3d.hours { color: #8b5cf6; }

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

    .info-content {
        flex: 1;
        min-width: 0;
    }

    .info-content h4 {
        font-size: 1.2rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.8rem;
    }

    .info-content p {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }

    .info-content .links {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .info-content .links a {
        color: #64748b;
        font-size: 0.95rem;
        text-decoration: none;
        transition: color 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .info-content .links a:hover {
        color: var(--accent-blue-bright);
    }

    .hours-text {
        font-weight: 600;
        color: #475569;
        background: #e2e8f0;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        border: 1px solid rgba(0,0,0,0.05);
        display: inline-block;
    }

    .compact-txt {
        color: #64748b;
        font-size: 0.85rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .wa-btn-container {
        display: flex;
    }

    .neu-wa-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #25d366;
        color: #fff !important;
        padding: 0.6rem 1.5rem;
        border-radius: 30px;
        font-weight: 800;
        font-size: 0.8rem !important;
        letter-spacing: 0.5px;
        border: none;
        box-shadow: 4px 4px 10px rgba(37, 211, 102, 0.3), inset -2px -2px 5px rgba(0,0,0,0.1), inset 2px 2px 5px rgba(255,255,255,0.2);
        transition: all 0.3s ease;
        text-decoration: none;
        cursor: pointer;
    }

    .neu-wa-btn:hover {
        background: #20ba5a;
        transform: translateY(-2px);
        box-shadow: 6px 6px 15px rgba(37, 211, 102, 0.4);
    }

    .neu-wa-btn:active {
        transform: translateY(1px);
        box-shadow: inset 2px 2px 5px rgba(0,0,0,0.2);
    }

    /* Map Section Styling */
    .map-section {
        background: var(--neu-bg);
        padding: 20px 0 80px;
    }

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
        color: var(--accent-blue-bright);
        font-size: 1.2rem;
    }

    .neo-btn-brutal {
        background: #000;
        color: #fff;
        padding: 0.8rem 2rem;
        font-weight: 800;
        text-decoration: none;
        border: 2px solid #000;
        box-shadow: 4px 4px 0px var(--accent-blue-bright);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }

    .neo-btn-brutal:hover {
        transform: translate(-2px, -2px);
        box-shadow: 6px 6px 0px var(--accent-blue-bright);
        background: var(--accent-blue-bright);
    }

    .neo-btn-brutal:active {
        transform: translate(2px, 2px);
        box-shadow: 0px 0px 0px var(--accent-blue-bright);
    }

    /* Inquiry Form Section Styling */
    .inquiry-section {
        background: var(--neu-bg);
        padding: 20px 0 100px;
    }

    .inquiry-form-wrapper {
        width: 100%;
    }

    .form-wrapper {
        background: radial-gradient(circle at top right, rgba(9, 56, 98, 0.05) 0%, var(--neu-bg) 60%);
        padding: 4rem;
        align-items: stretch;
        text-align: left;
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

    .form-submit-container {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .neu-btn-primary {
        background: linear-gradient(145deg, var(--accent-blue), #004bbd);
        color: #fff;
        border: none;
        padding: 1.2rem 4rem;
        border-radius: 50px;
        font-weight: 800;
        letter-spacing: 1px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 10px 10px 20px var(--neu-shadow-dark), -5px -5px 15px var(--neu-shadow-light);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .neu-btn-primary:hover {
        transform: translateY(-5px);
        box-shadow: 15px 15px 30px var(--neu-shadow-dark);
    }

    .neu-btn-primary:active {
        transform: translateY(2px);
        box-shadow: inset 5px 5px 10px rgba(0,0,0,0.2);
    }

    /* Responsiveness */


    @media (max-width: 992px) {
        .address-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .form-wrapper {
            padding: 3rem 2rem;
        }
    }

    @media (max-width: 768px) {
        .contact-main {
            padding: 60px 0 40px;
        }
        .details-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        .neu-card-raised {
            padding: 2rem;
            border-radius: 24px;
        }
        .info-card {
            flex-direction: column;
            text-align: center;
        }
        .wa-btn-container {
            justify-content: center;
        }
        .info-content .links a {
            justify-content: center;
        }
        .neu-form .form-row {
            flex-direction: column;
            gap: 0;
        }
        .form-wrapper {
            border-radius: 24px;
        }
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

<script src="assets/js/contact.js"></script>

<?php include 'includes/footer.php'; ?>
