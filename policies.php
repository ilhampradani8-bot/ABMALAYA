<?php 
$pageTitle = "Company Policies";
$currentPage = "policies";
include 'includes/header.php'; 

// Hero Variables
$heroTitle = "COMPANY <br><span class='accent-color'>POLICIES</span>";
$heroSubtitle = "";
$heroDesc = "AB Malaya is fully committed to the highest standards of safety, environmental stewardship, and quality assurance.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="policies-content-section" style="padding: 100px 0; background: #ffffff;">
    <div class="container">
        <div class="policies-grid" style="display: flex; gap: 4rem; flex-wrap: wrap;">
            <!-- Left Side Sidebar / Navigation -->
            <div class="policies-sidebar" style="width: 25%; min-width: 250px;">
                <div style="position: sticky; top: 120px; background: #f8fafc; border-radius: 20px; padding: 2rem; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                    <h5 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -0.5px;">Policy Sections</h5>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem; font-family: 'Inter', sans-serif; font-size: 0.9rem;">
                        <li><a href="#hse" style="color: #005ee9; text-decoration: none; font-weight: 600;">1. HSE Policy</a></li>
                        <li><a href="#environmental" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#005ee9'" onmouseout="this.style.color='#475569'">2. Environmental Policy</a></li>
                        <li><a href="#quality" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#005ee9'" onmouseout="this.style.color='#475569'">3. Quality Assurance</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right Side Policies Body -->
            <div class="policies-body" style="flex: 1; min-width: 300px; max-width: 800px; color: #475569; font-family: 'Inter', sans-serif; line-height: 1.8; font-size: 1.05rem;">
                <div id="hse" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">1. Health, Safety, and Environment (HSE) Policy</h2>
                    <p style="margin-bottom: 1.5rem;">
                        Health, Safety, and Environment are the foundational pillars of our operations. We maintain a strict "zero-harm" objective, ensuring that all our field operatives, technicians, and partners operate under maximum protection controls.
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        Our core safety directives include:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Absolute compliance with all regional, state, and international maritime and industrial safety laws.</li>
                        <li>Ongoing, systematic reviews and audits of field-level risk registers and emergency response procedures.</li>
                        <li>Mandatory safety inductions, hazard awareness training, and PPE audits for all deployed personnel.</li>
                    </ul>
                </div>

                <div id="environmental" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">2. Environmental Policy</h2>
                    <p style="margin-bottom: 1.5rem;">
                        At AB Malaya, environmental sustainability is an operational priority. We actively integrate eco-conscious methodologies across our marine engineering, subsea interventions, and regional logistics sectors to protect native ecosystems.
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        Our environmental protection actions are driven by:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Rigorous enforcement of marine waste minimization, containment, and eco-friendly disposal guidelines.</li>
                        <li>Active integration of green tech, energy-efficient operations, and carbon-reduction initiatives.</li>
                        <li>Strict compliance with marine anti-pollution standards to safeguard sea-lanes and regional aquatic life.</li>
                    </ul>
                </div>

                <div id="quality" style="margin-bottom: 2rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">3. Quality Assurance</h2>
                    <p style="margin-bottom: 1.5rem;">
                        Our primary goal is to exceed our partners' expectations by delivering reliable, certified, and compliant industrial solutions. 
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        Every stage of our subsea interventions, logistics pipelines, and engineering procurements undergoes systematic QA assessments to align with world-class quality benchmarks and B2B commercial expectations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
