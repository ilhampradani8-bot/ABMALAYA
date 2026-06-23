<?php 
$pageTitle = "Privacy Policy";
$currentPage = "privacy";
include 'includes/header.php'; 

// Hero Variables
$heroTitle = "PRIVACY <br><span class='accent-color'>POLICY</span>";
$heroSubtitle = "";
$heroDesc = "AB Malaya is fully committed to protecting your personal data and ensuring transparent digital operations.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="privacy-content-section" style="padding: 100px 0; background: #ffffff;">
    <div class="container">
        <div class="privacy-grid" style="display: flex; gap: 4rem; flex-wrap: wrap;">
            <!-- Left Side Sidebar / Navigation -->
            <div class="privacy-sidebar" style="width: 25%; min-width: 250px;">
                <div style="position: sticky; top: 120px; background: #f8fafc; border-radius: 20px; padding: 2rem; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                    <h5 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -0.5px;">Privacy Sections</h5>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem; font-family: 'Inter', sans-serif; font-size: 0.9rem;">
                        <li><a href="#introduction" style="color: #1191cc; text-decoration: none; font-weight: 600;">1. Introduction</a></li>
                        <li><a href="#collection" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">2. Information We Collect</a></li>
                        <li><a href="#usage" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">3. How We Use Data</a></li>
                        <li><a href="#security" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">4. Data Security</a></li>
                        <li><a href="#rights" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">5. Your Rights</a></li>
                        <li><a href="#changes" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">6. Policy Updates</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right Side Privacy Body -->
            <div class="privacy-body" style="flex: 1; min-width: 300px; max-width: 800px; color: #475569; font-family: 'Inter', sans-serif; line-height: 1.8; font-size: 1.05rem;">
                <div id="introduction" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">1. Introduction</h2>
                    <p style="margin-bottom: 1.5rem;">
                        AB MALAYA Sdn Bhd respects your privacy and is dedicated to safeguarding your personal data. This Privacy Policy details how we collect, process, and protect your information when you visit our website or interact with our services.
                    </p>
                </div>

                <div id="collection" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">2. Information We Collect</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We collect personally identifiable information (such as your name, corporate email address, and phone number) only when voluntarily provided via our contact or inquiry forms. 
                    </p>
                    <p>
                        Additionally, we automatically collect non-identifiable technical data, such as IP addresses, browser specifications, and usage history via secure cookies to optimize site performance.
                    </p>
                </div>

                <div id="usage" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">3. How We Use Data</h2>
                    <p style="margin-bottom: 1.5rem;">
                        Your data is processed strictly for the following purposes:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>To provide, manage, and optimize our core engineering and logistics services.</li>
                        <li>To respond to B2B inquiries, quotes, and client support requests.</li>
                        <li>To maintain secure operations and prevent unauthorized access to our platform.</li>
                        <li>To analyze traffic patterns and elevate our platform's overall browsing experience.</li>
                    </ul>
                </div>

                <div id="security" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">4. Data Security</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We employ rigorous administrative, organizational, and technological security controls to guard your personal data against unauthorized extraction, alteration, or disclosure.
                    </p>
                    <p>
                        However, please be advised that no method of transmission over the internet or computerized storage system is completely immune to risks. We continually review and strengthen our data defense frameworks to mitigate potential hazards.
                    </p>
                </div>

                <div id="rights" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">5. Your Rights</h2>
                    <p style="margin-bottom: 1.5rem;">
                        You hold complete rights to access the personal records we hold regarding your profile, request corrections to incomplete datasets, or request complete erasure of your information from our systems.
                    </p>
                    <p>
                        To submit a data access or deletion request, please contact our data compliance coordinator at **info@abmalaya.com**.
                    </p>
                </div>

                <div id="changes" style="margin-bottom: 2rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">6. Policy Updates</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We reserve the right to modify this Privacy Policy as our services and global data protocols evolve. All updates will be published instantly on this page with an updated modification date.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
