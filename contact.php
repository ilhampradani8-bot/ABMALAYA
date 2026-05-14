<?php 
$pageTitle = "Contact Us";
$currentPage = "contact";
include 'includes/header.php'; 
?>

<section class="hero" style="height: 40vh; background: linear-gradient(rgba(9, 56, 99, 0.8), rgba(9, 56, 99, 0.8)), url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=2000'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="hero-content">
            <h1>Get In Touch</h1>
            <p>Let's discuss how we can support your next industrial project.</p>
        </div>
    </div>
</section>

<section style="padding: 100px 0; background: #fff;">
    <div class="container">
        <div style="display: flex; gap: 5rem; flex-wrap: wrap;">
            <!-- Left: Contact Form -->
            <div style="flex: 1.5; min-width: 300px;">
                <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Send a Message</h5>
                <h2 style="font-size: 2.5rem; color: var(--secondary); margin-bottom: 3rem; font-family: 'Nunito', sans-serif;">Tender & Business Inquiry</h2>
                
                <form action="#" class="responsive-contact-form" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div class="form-row" style="display: flex; gap: 1.5rem;">
                        <input type="text" placeholder="Full Name" required style="flex: 1; padding: 1.2rem; border-radius: 15px; border: 1px solid #e2e8f0; outline: none; background: #f8fafc; font-family: 'Inter', sans-serif;">
                        <input type="email" placeholder="Email Address" required style="flex: 1; padding: 1.2rem; border-radius: 15px; border: 1px solid #e2e8f0; outline: none; background: #f8fafc; font-family: 'Inter', sans-serif;">
                    </div>
                    <input type="text" placeholder="Company Name" style="padding: 1.2rem; border-radius: 15px; border: 1px solid #e2e8f0; outline: none; background: #f8fafc; font-family: 'Inter', sans-serif;">
                    <select style="padding: 1.2rem; border-radius: 15px; border: 1px solid #e2e8f0; outline: none; background: #f8fafc; font-family: 'Inter', sans-serif; color: #64748b;">
                        <option value="">Select Service of Interest</option>
                        <option value="marine">Maritime & Subsea Services</option>
                        <option value="it">Cross-Border Solutions</option>
                        <option value="environmental">Environmental Solutions</option>
                        <option value="consultancy">Technical Consultancy</option>
                    </select>
                    <textarea placeholder="Your Message / Inquiry Details" rows="6" style="padding: 1.2rem; border-radius: 15px; border: 1px solid #e2e8f0; outline: none; background: #f8fafc; font-family: 'Inter', sans-serif; resize: none;"></textarea>
                    
                    <button type="submit" class="cta-btn" style="border: none; cursor: pointer; width: fit-content; padding: 1.2rem 4rem; font-size: 1rem; border-radius: 50px;">Send Message</button>
                </form>
            </div>
            
            <!-- Right: Contact Details -->
            <div style="flex: 1; min-width: 300px;">
                <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Contact Info</h5>
                <h2 style="font-size: 2.5rem; color: var(--secondary); margin-bottom: 3rem; font-family: 'Nunito', sans-serif;">Office Details</h2>
                
                <div style="display: flex; flex-direction: column; gap: 2.5rem;">
                    <div style="display: flex; gap: 1.5rem; align-items: flex-start;">
                        <div style="color: var(--primary); font-size: 1.5rem; margin-top: 5px;"><i class="fas fa-map-location-dot"></i></div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary);">Kuala Lumpur HQ</h4>
                            <p style="color: var(--text-light); line-height: 1.6;">
                                2-2-40, Lantai 2 Wisma Rampai,<br>
                                Jalan 34/26, Taman Sri Rampai,<br>
                                53300 Kuala Lumpur, Malaysia
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1.5rem; align-items: flex-start;">
                        <div style="color: #22c55e; font-size: 1.5rem; margin-top: 5px;"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary);">WhatsApp Support</h4>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                <a href="https://wa.me/60172240091" style="text-decoration: none; color: inherit;">+60 17-224 0091</a><br>
                                <a href="https://wa.me/601113777282" style="text-decoration: none; color: inherit;">+60 11-1377 7282</a>
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1.5rem; align-items: flex-start;">
                        <div style="color: #ef4444; font-size: 1.5rem; margin-top: 5px;"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary);">Email Address</h4>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                <a href="mailto:sales@abmalaya.com" style="text-decoration: none; color: inherit;">sales@abmalaya.com</a><br>
                                <a href="mailto:info@abmalaya.com" style="text-decoration: none; color: inherit;">info@abmalaya.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Full-Width Map Section -->
<section style="width: 100%; height: 500px; border-top: 1px solid #e2e8f0;">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.69238304915!2d101.73356!3d3.19323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc382f94e2a39b%3A0xc3411e649e35c24e!2sWisma%20Rampai!5e0!3m2!1sen!2smy!4v1715715545000!5m2!1sen!2smy" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

<style>
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column !important;
            gap: 1.5rem !important;
        }
        .cta-btn {
            width: 100% !important;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>
