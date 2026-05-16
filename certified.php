<?php 
$pageTitle = "Certified & Excellence";
$currentPage = "certified";
include 'includes/header.php'; 
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<?php 
$heroTitle = "<span style='color: #005ee9;'>Certified Quality</span> & Industrial Excellence.";
$heroDesc = "AB MALAYA operates with the highest levels of professional integrity and technical excellence. Our CIDB registration reflects our dedication to safety and quality in the Malaysian construction and maritime sectors.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<!-- Certification Grid (Neumorphic) -->
<section class="certification-showcase" style="padding: 100px 0; background: #e6e9ef;">
    <div class="container">
        <div class="section-header" style="text-align: center; margin-bottom: 80px;">
            <h2 style="font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2.5rem; color: #0f172a; margin-bottom: 1rem;">Official <span style="color: var(--primary);">Credentials</span></h2>
            <p style="color: #64748b; max-width: 600px; margin: 0 auto;">Our licenses from international and local authorities ensure the reliability of our services.</p>
        </div>

        <div class="cert-grid" style="display: flex; justify-content: center; gap: 40px;">
            <!-- CIDB -->
            <div class="cert-card-neu" style="max-width: 450px; width: 100%;">
                <div class="cert-img-wrap" style="height: auto; aspect-ratio: 1.4/1;">
                    <img src="assets/img/cidb.jpg" alt="CIDB G7 License" style="object-fit: contain; padding: 20px;">
                </div>
                <div class="cert-info">
                    <h3>CIDB G7 License</h3>
                    <p>Highest grade contractor registration for major industrial construction and maritime projects in Malaysia.</p>
                    <a href="assets/img/cidb.jpg" target="_blank" class="view-cert-btn">View Document <i class="fas fa-external-link-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why It Matters Section (Glassmorphism) -->
<section class="excellence-philosophy" style="padding: 120px 0; background: #fff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 3rem; color: #0f172a; margin-bottom: 2rem; letter-spacing: -1.5px;">Beyond Just <span style="color: var(--primary);">Compliance.</span></h2>
                <div class="philosophy-item" style="margin-bottom: 2rem;">
                    <h4 style="color: #0f172a; margin-bottom: 0.5rem; font-weight: 700;">Safety First Culture</h4>
                    <p style="color: #64748b; line-height: 1.7;">We don't just follow safety rules; we live them. Our Zero-Harm goal is integrated into every project workflow.</p>
                </div>
                <div class="philosophy-item" style="margin-bottom: 2rem;">
                    <h4 style="color: #0f172a; margin-bottom: 0.5rem; font-weight: 700;">Technical Precision</h4>
                    <p style="color: #64748b; line-height: 1.7;">Utilizing state-of-the-art tools and certified methodologies to deliver results that exceed expectations.</p>
                </div>
                <div class="philosophy-item">
                    <h4 style="color: #0f172a; margin-bottom: 0.5rem; font-weight: 700;">Environmental Integrity</h4>
                    <p style="color: #64748b; line-height: 1.7;">Committed to sustainable practices that minimize our footprint across all offshore and onshore operations.</p>
                </div>
            </div>
            <div style="flex: 1; min-width: 300px; position: relative;">
                <div class="glass-stats-card" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border-radius: 40px; padding: 4rem; border: 1px solid rgba(255, 255, 255, 0.5); box-shadow: 0 20px 40px rgba(0,0,0,0.05);">
                    <div style="margin-bottom: 3rem;">
                        <span style="font-size: 4rem; font-weight: 800; color: var(--primary); font-family: 'Aeonik', sans-serif;">100%</span>
                        <p style="font-weight: 700; color: #0f172a; margin-top: -10px;">Compliance Rate</p>
                    </div>
                    <div style="margin-bottom: 3rem;">
                        <span style="font-size: 4rem; font-weight: 800; color: #0f172a; font-family: 'Aeonik', sans-serif;">0</span>
                        <p style="font-weight: 700; color: #0f172a; margin-top: -10px;">Major Safety Incidents</p>
                    </div>
                    <div>
                        <span style="font-size: 4rem; font-weight: 800; color: #0f172a; font-family: 'Aeonik', sans-serif;">15+</span>
                        <p style="font-weight: 700; color: #0f172a; margin-top: -10px;">Industry Awards</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .cert-card-neu {
        background: #e6e9ef;
        padding: 30px;
        border-radius: 35px;
        box-shadow: 20px 20px 60px #c1c8cf, -20px -20px 60px #ffffff;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cert-card-neu:hover {
        transform: translateY(-10px);
        box-shadow: 30px 30px 80px #b8bcc2, -30px -30px 80px #ffffff;
    }

    .cert-img-wrap {
        width: 100%;
        height: auto;
        aspect-ratio: 1.4/1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: inset 6px 6px 12px #c1c8cf, inset -6px -6px 12px #ffffff;
        background: #f0f2f5;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cert-img-wrap img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        opacity: 0.9;
        transition: 0.4s ease;
    }

    .cert-card-neu:hover .cert-img-wrap img {
        opacity: 1;
        transform: scale(1.05);
    }

    .cert-info h3 {
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 1.4rem;
        color: #0f172a;
        margin-bottom: 0.5rem;
    }

    .cert-info p {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .view-cert-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--primary);
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        transition: 0.3s;
    }

    .view-cert-btn:hover {
        gap: 15px;
    }

    @media (max-width: 768px) {
        .excellence-philosophy { padding: 80px 0; }
        .excellence-philosophy > .container > div { flex-direction: column; }
        .glass-stats-card { padding: 2.5rem !important; border-radius: 30px !important; }
        .glass-stats-card span { font-size: 3rem !important; }
    }
</style>

<!-- Page Specific Logic -->
<script src="/assets/js/certified.js?v=1.1"></script>

<?php include 'includes/footer.php'; ?>
