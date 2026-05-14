<?php 
$pageTitle = "Company Policies";
$currentPage = "policies";
include 'includes/header.php'; 
?>

<section class="hero" style="height: 40vh; background: linear-gradient(rgba(9, 56, 99, 0.8), rgba(9, 56, 99, 0.8)), url('https://images.unsplash.com/photo-1454165833767-027ffea9e78b?q=80&w=2000'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="hero-content">
            <h1>Our Policies</h1>
            <p>Committed to the highest standards of safety, ethics, and environmental stewardship.</p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="margin-bottom: 4rem;">
                <h2 style="color: var(--secondary); margin-bottom: 1.5rem;">HSE Policy</h2>
                <p style="color: var(--text-light); margin-bottom: 1rem;">
                    Health, Safety, and Environment are at the core of everything we do. We strive for zero incidents and ensure all personnel are trained to identify and mitigate risks.
                </p>
                <ul style="color: var(--text-light); padding-left: 1.5rem; list-style: disc;">
                    <li>Compliance with all local and international safety regulations.</li>
                    <li>Continuous monitoring and improvement of safety protocols.</li>
                    <li>Mandatory safety inductions for all field staff.</li>
                </ul>
            </div>
            
            <div style="margin-bottom: 4rem;">
                <h2 style="color: var(--secondary); margin-bottom: 1.5rem;">Environmental Policy</h2>
                <p style="color: var(--text-light); margin-bottom: 1rem;">
                    We are dedicated to protecting the marine environment and minimizing our carbon footprint.
                </p>
                <ul style="color: var(--text-light); padding-left: 1.5rem; list-style: disc;">
                    <li>Sustainable waste management and disposal.</li>
                    <li>Investment in green energy solutions.</li>
                    <li>Prevention of marine pollution during operations.</li>
                </ul>
            </div>

            <div>
                <h2 style="color: var(--secondary); margin-bottom: 1.5rem;">Quality Assurance</h2>
                <p style="color: var(--text-light);">
                    Our services undergo rigorous quality checks to ensure they meet the specific needs of our B2B clients and industry standards.
                </p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
