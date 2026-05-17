<?php 
$pageTitle = "Terms of Use";
$currentPage = "terms";
include 'includes/header.php'; 

// Hero Variables
$heroTitle = "TERMS OF <br><span class='accent-color'>USE</span>";
$heroSubtitle = "";
$heroDesc = "Terms and Conditions governing the use of the AB Malaya Sdn Bhd corporate platform.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="terms-content-section" style="padding: 100px 0; background: #ffffff;">
    <div class="container">
        <div class="terms-grid" style="display: flex; gap: 4rem; flex-wrap: wrap;">
            <!-- Left Side Sidebar / Navigation -->
            <div class="terms-sidebar" style="width: 25%; min-width: 250px;">
                <div style="position: sticky; top: 120px; background: #f8fafc; border-radius: 20px; padding: 2rem; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                    <h5 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -0.5px;">Navigation</h5>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem; font-family: 'Inter', sans-serif; font-size: 0.9rem;">
                        <li><a href="#acceptance" style="color: #005ee9; text-decoration: none; font-weight: 600;">1. Acceptance of Terms</a></li>
                        <li><a href="#license" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#005ee9'" onmouseout="this.style.color='#475569'">2. Use License</a></li>
                        <li><a href="#limitations" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#005ee9'" onmouseout="this.style.color='#475569'">3. Limitations</a></li>
                        <li><a href="#accuracy" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#005ee9'" onmouseout="this.style.color='#475569'">4. Accuracy of Materials</a></li>
                        <li><a href="#governing-law" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#005ee9'" onmouseout="this.style.color='#475569'">5. Governing Law</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right Side Terms Body -->
            <div class="terms-body" style="flex: 1; min-width: 300px; max-width: 800px; color: #475569; font-family: 'Inter', sans-serif; line-height: 1.8; font-size: 1.05rem;">
                <div id="acceptance" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">1. Acceptance of Terms</h2>
                    <p style="margin-bottom: 1.5rem;">
                        By accessing, browsing, and interacting with this corporate website, you acknowledge that you have read, understood, and agree to be bound by these Terms of Use, as well as all applicable state and federal laws and maritime commerce regulations.
                    </p>
                    <p>
                        If you do not agree to be bound by these corporate terms, you must immediately cease accessing or using this web platform.
                    </p>
                </div>

                <div id="license" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">2. Use License</h2>
                    <p style="margin-bottom: 1.5rem;">
                        Permission is granted to temporarily view a single copy of the informational materials (text, certifications, port project data, or imagery) on the AB MALAYA Sdn Bhd web platform strictly for personal, non-commercial, and transient viewing purposes.
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        This is the grant of a limited use license, not a transfer of physical or intellectual property ownership. Under this license, you are strictly prohibited from:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Modifying, copying, or duplicating the proprietary visual and textual assets.</li>
                        <li>Using the materials for any commercial purpose or public distribution.</li>
                        <li>Attempting to decompile, reverse-engineer, or extract core source files.</li>
                        <li>Removing any copyright, digital signature watermark, or proprietary notations from protected materials.</li>
                    </ul>
                </div>

                <div id="limitations" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">3. Limitations of Liability</h2>
                    <p style="margin-bottom: 1.5rem;">
                        In no event shall AB MALAYA Sdn Bhd, its directors, or its strategic engineering partners be held liable for any damages (including, without limitation, direct damages for loss of industrial data, business interruption, or financial profit loss) arising out of the use or inability to use the informational assets on our website.
                    </p>
                    <p>
                        This limitation remains active even if an authorized corporate representative of AB Malaya has been notified orally or in writing of the potential of such commercial damages.
                    </p>
                </div>

                <div id="accuracy" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">4. Accuracy of Materials</h2>
                    <p style="margin-bottom: 1.5rem;">
                        The engineering specifications, technical details, and project documentations displayed on this platform could contain technical, typographical, or photographic errors. 
                    </p>
                    <p>
                        AB Malaya does not guarantee that any of the materials on its website are 100% accurate, complete, or up-to-date. We reserve the right to perform systematic updates, corrections, and modifications to any of the published materials at any time without prior notification.
                    </p>
                </div>

                <div id="governing-law" style="margin-bottom: 2rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">5. Governing Law</h2>
                    <p style="margin-bottom: 1.5rem;">
                        These terms, conditions, and operational policies shall be governed by, construed, and interpreted in absolute alignment with the laws and statutes of **Malaysia**.
                    </p>
                    <p>
                        By using this site, you hereby submit to the exclusive jurisdiction and venue of the regional courts of Malaysia to settle any legal matters or disputes that may arise.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
