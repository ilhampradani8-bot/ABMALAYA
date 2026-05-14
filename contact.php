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

<section>
    <div class="container">
        <div style="display: flex; gap: 4rem; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <h2 style="color: var(--secondary); margin-bottom: 2rem;">Tender Inquiry</h2>
                <form action="#" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div style="display: flex; gap: 1rem;">
                        <input type="text" placeholder="Full Name" style="flex: 1; padding: 1rem; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                        <input type="email" placeholder="Email Address" style="flex: 1; padding: 1rem; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                    </div>
                    <input type="text" placeholder="Company Name" style="padding: 1rem; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                    <select style="padding: 1rem; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                        <option value="">Select Service of Interest</option>
                        <option value="marine">Maritime & Subsea</option>
                        <option value="it">Industrial IT</option>
                        <option value="consultancy">Consultancy</option>
                        <option value="energy">Green Energy</option>
                    </select>
                    <textarea placeholder="Your Message / Inquiry Details" rows="5" style="padding: 1rem; border-radius: 10px; border: 1px solid #ddd; outline: none; resize: none;"></textarea>
                    <button type="submit" class="cta-btn" style="border: none; cursor: pointer; width: fit-content; padding: 1rem 3rem;">Submit Inquiry</button>
                </form>
            </div>
            
            <div style="flex: 1; min-width: 300px;">
                <h2 style="color: var(--secondary); margin-bottom: 2rem;">Contact Details</h2>
                <div style="background: var(--white); padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05);">
                    <div style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
                        <i class="fas fa-map-marker-alt" style="color: var(--primary); font-size: 1.5rem;"></i>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Headquarters</h4>
                            <p style="color: var(--text-light);">2-2-40, Lantai 2 Wisma Rampai,<br>Jalan 34/26, Taman Sri Rampai,<br>53300 Kuala Lumpur.</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
                        <i class="fas fa-phone-alt" style="color: var(--primary); font-size: 1.5rem;"></i>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Phone / WhatsApp</h4>
                            <p style="color: var(--text-light);">+60 12-345 6789</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
                        <i class="fas fa-envelope" style="color: var(--primary); font-size: 1.5rem;"></i>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Email</h4>
                            <p style="color: var(--text-light);">info@abmalaya.com</p>
                        </div>
                    </div>
                    
                    <a href="https://wa.me/60123456789" class="cta-btn" style="background: #25D366; display: flex; align-items: center; justify-content: center; gap: 0.5rem; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);">
                        <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
