<?php 
$pageTitle = "About Us";
$currentPage = "about";
include 'includes/header.php'; 
?>

<section class="hero" style="height: 40vh; background: linear-gradient(rgba(9, 56, 99, 0.8), rgba(9, 56, 99, 0.8)), url('/assets/img/kapal-tanker.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="hero-content">
            <h1 style="font-family: 'Cinzel', serif;">About AB Malaya</h1>
            <p>Your strategic partner in the Maritime, Oil & Gas, and Energy sectors.</p>
        </div>
    </div>
</section>

<!-- Our Journey Section - Full Width Concept -->
<section style="padding: 100px 0; background: #fff;">
    <div class="container" style="max-width: 100%; padding: 0 5%;">
        <div style="display: flex; gap: 4rem; flex-wrap: wrap; align-items: center;">
            <div style="flex: 1; min-width: 300px;">
                <h5 style="color: var(--primary); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Our Journey</h5>
                <h2 style="font-size: 3rem; color: var(--secondary); margin-bottom: 2rem; font-family: 'Nunito', sans-serif;">Pioneering the <span style="color: var(--primary);">Industrial Evolution</span></h2>
                <p style="margin-bottom: 1.5rem; color: var(--text-light); font-size: 1.2rem; line-height: 1.8;">
                    The idea to form AB MALAYA Sdn Bhd began when a group of industrial experts from various fields assembled to discuss the current market pressures evolving towards a modern revolution.
                </p>
                <p style="margin-bottom: 1.5rem; color: var(--text-light); font-size: 1.2rem; line-height: 1.8;">
                    Located strategically in the heart of Kuala Lumpur, we have grown into a multi-disciplinary provider, serving major industry partners like Petronas and other regional leaders in Southeast Asia.
                </p>
            </div>
            <div style="flex: 1; min-width: 300px;">
                <div style="background: var(--background); padding: 4rem; border-radius: 40px; border: 1px solid #e2e8f0;">
                    <h3 style="color: var(--secondary); margin-bottom: 2rem; font-size: 1.8rem;">Core Values</h3>
                    <div style="display: grid; gap: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1.5rem; background: #fff; padding: 1.5rem; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.02);">
                            <div style="width: 40px; height: 40px; background: #eff6ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary);"><i class="fas fa-shield-alt"></i></div>
                            <span style="font-weight: 600; color: var(--secondary);">Integrity & Transparency</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1.5rem; background: #fff; padding: 1.5rem; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.02);">
                            <div style="width: 40px; height: 40px; background: #eff6ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary);"><i class="fas fa-hard-hat"></i></div>
                            <span style="font-weight: 600; color: var(--secondary);">Safety First (HSE)</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1.5rem; background: #fff; padding: 1.5rem; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.02);">
                            <div style="width: 40px; height: 40px; background: #eff6ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary);"><i class="fas fa-lightbulb"></i></div>
                            <span style="font-weight: 600; color: var(--secondary);">Innovative Excellence</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section - Glassmorphism & Full Width -->
<section style="background: linear-gradient(rgba(9, 56, 99, 0.9), rgba(9, 56, 99, 0.9)), url('https://images.unsplash.com/photo-1454165833767-027ffea9e778?q=80&w=2000'); background-size: cover; background-attachment: fixed; padding: 120px 0;">
    <div class="container" style="max-width: 100%; padding: 0 5%;">
        <div class="glass-card-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem;">
            
            <!-- Vision Card -->
            <div class="glass-card" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); padding: 4rem; border-radius: 40px; color: #fff;">
                <div style="width: 60px; height: 60px; background: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem; font-size: 1.5rem;">
                    <i class="fas fa-eye"></i>
                </div>
                <h2 style="font-family: 'Cinzel', serif; margin-bottom: 1.5rem; font-size: 2.5rem;">Our Vision</h2>
                <p style="font-size: 1.2rem; line-height: 1.8; opacity: 0.9;">
                    To be the leading innovative provider of marine, logistics, and environmental solutions in the region, focusing on quality, safety, and sustainability—while being the most reliable resource meeting every demand in the industry on a global scale.
                </p>
            </div>

            <!-- Mission Card -->
            <div class="glass-card" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); padding: 4rem; border-radius: 40px; color: #fff;">
                <div style="width: 60px; height: 60px; background: var(--accent); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem; font-size: 1.5rem;">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h2 style="font-family: 'Cinzel', serif; margin-bottom: 1.5rem; font-size: 2.5rem;">Our Mission</h2>
                <ul style="font-size: 1.1rem; line-height: 1.8; list-style: none; padding: 0;">
                    <li style="margin-bottom: 1rem; display: flex; gap: 1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-top: 5px;"></i> Deliver top-tier services through tailored and expert solutions.</li>
                    <li style="margin-bottom: 1rem; display: flex; gap: 1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-top: 5px;"></i> Operate with integrity and environmental responsibility.</li>
                    <li style="margin-bottom: 1rem; display: flex; gap: 1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-top: 5px;"></i> Build long-term partnerships with clients and stakeholders.</li>
                    <li style="margin-bottom: 1rem; display: flex; gap: 1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-top: 5px;"></i> Provide a diverse range of quality, effective, and safe goods/services.</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        h2 { font-size: 2rem !important; }
        .glass-card { padding: 2.5rem !important; border-radius: 30px !important; }
        .hero { height: 50vh !important; }
    }
</style>

<?php include 'includes/footer.php'; ?>
