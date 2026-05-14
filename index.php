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
<section id="about">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 4rem; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Who We Are</h5>
                <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem; color: var(--secondary);">Leading the Way in <span style="color: var(--primary);">Industrial Evolution</span></h2>
                <p style="margin-bottom: 1.5rem; color: var(--text-light);">
                    AB Malaya Sdn Bhd is a dynamic company specializing in Marine Industrial Services, Cross-Border Logistics, and Environmental Solutions. With a commitment to quality, efficiency, and sustainability, we provide cutting-edge solutions for modern industry demands.
                </p>
                <a href="about.php" style="color: var(--primary); font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                    Learn More About Us <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div style="flex: 1; min-width: 300px; position: relative;">
                <div style="background: var(--primary); width: 100%; height: 400px; border-radius: 30px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.1);">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=2000" alt="Industrial Excellence" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="position: absolute; bottom: -30px; left: -30px; background: var(--glass); backdrop-filter: blur(10px); padding: 2rem; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.3);">
                    <h3 style="color: var(--secondary);">10+ Years</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Industrial Expertise</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Services -->
<section style="background: #eff6ff;">
    <div class="container">
        <div class="section-title">
            <h2>Integrated Solutions</h2>
            <p>We provide a comprehensive ecosystem of services for the maritime and industrial sectors.</p>
        </div>
        <div class="card-grid">
            <div class="card">
                <i class="fas fa-ship"></i>
                <h3>Maritime & Subsea</h3>
                <p>Ship rust coating, logistics delivery, crew management, and structural maintenance of offshore platforms.</p>
            </div>
            <div class="card">
                <i class="fas fa-microchip"></i>
                <h3>Industrial IT & Tech</h3>
                <p>Industrial IT components, remote area network infrastructure, Data Diode security, and Digital Twin visualization.</p>
            </div>
            <div class="card">
                <i class="fas fa-users-cog"></i>
                <h3>Technical Consultancy</h3>
                <p>Asset integrity management, METOCEAN current mapping, and HSE safety consultancy for marine operations.</p>
            </div>
            <div class="card">
                <i class="fas fa-leaf"></i>
                <h3>Green Energy</h3>
                <p>Energy transition services through industrial solar panel investments and low-carbon operation solutions.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section style="background: var(--secondary); color: var(--white); text-align: center; padding: 120px 0;">
    <div class="container">
        <h2 style="font-size: 3rem; margin-bottom: 2rem;">Ready to optimize your <br><span style="color: var(--accent);">industrial operations?</span></h2>
        <p style="max-width: 700px; margin: 0 auto 3rem; opacity: 0.8;">Contact our experts today for a consultation on maritime services, IT infrastructure, or green energy solutions.</p>
        <a href="contact.php" class="cta-btn" style="padding: 1.2rem 3rem; font-size: 1.1rem;">Reach Out Now</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
