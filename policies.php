<?php 
$pageTitle = "Company Policies";
$currentPage = "policies";
include 'includes/header.php'; 

// Hero Variables
$heroTitle = "COMPANY <br><span class='accent-color'>POLICIES</span>";
$heroSubtitle = "";
$heroDesc = "AB Malaya is committed to conducting its operations responsibly and maintaining high standards of quality, safety, environmental protection, and business integrity.";
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
                        <li><a href="#quality" style="color: #1191cc; text-decoration: none; font-weight: 600;">1. Quality Policy</a></li>
                        <li><a href="#hse" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">2. Health & Safety (HSE)</a></li>
                        <li><a href="#environmental" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">3. Environmental Policy</a></li>
                        <li><a href="#integrity" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">4. Business Integrity</a></li>
                        <li><a href="#sustainability" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">5. Sustainability</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right Side Policies Body -->
            <div class="policies-body" style="flex: 1; min-width: 300px; max-width: 800px; color: #475569; font-family: 'Inter', sans-serif; line-height: 1.8; font-size: 1.05rem;">
                <!-- 1. Quality Policy -->
                <div id="quality" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">1. Quality Policy</h2>
                    <p style="margin-bottom: 1.5rem;">
                        AB Malaya Sdn Bhd is committed to delivering products and engineering services that consistently meet client requirements, applicable industrial standards, and regulatory requirements while continuously improving our operational processes and performance.
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        Our quality management directives focus on:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Delivering precision-engineered solutions with stringent quality control across all project phases.</li>
                        <li>Ensuring all materials, procurement, and technical workflows comply with certified industry standards.</li>
                        <li>Regularly auditing quality performance benchmarks to ensure client satisfaction and project durability.</li>
                    </ul>
                </div>

                <!-- 2. Health & Safety Policy -->
                <div id="hse" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">2. Health & Safety (HSE) Policy</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We are committed to maintaining a safe, healthy, and secure working environment for our employees, clients, contractors, and stakeholders. Safety is integrated directly into our project planning, field operations, and execution.
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        Our core safety commitments include:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Absolute compliance with regional, statutory, and industrial occupational safety regulations.</li>
                        <li>Ongoing, systematic reviews and hazard audits of field-level risk registers and emergency response procedures.</li>
                        <li>Mandatory safety inductions, hazard awareness training, and PPE compliance for all deployed personnel.</li>
                    </ul>
                </div>

                <!-- 3. Environmental Policy -->
                <div id="environmental" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">3. Environmental Policy</h2>
                    <p style="margin-bottom: 1.5rem;">
                        AB Malaya is committed to minimising environmental impacts through responsible resource management, pollution prevention, proper waste management, and environmentally responsible engineering practices.
                    </p>
                    <p style="margin-bottom: 1.5rem;">
                        Our environmental actions are driven by:
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Rigorous enforcement of industrial and marine waste minimization, containment, and eco-friendly disposal guidelines.</li>
                        <li>Active integration of energy-efficient methodologies and resource conservation across project sites.</li>
                        <li>Full compliance with environmental statutory standards to safeguard local ecosystems and surrounding communities.</li>
                    </ul>
                </div>

                <!-- 4. Business Integrity -->
                <div id="integrity" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">4. Business Integrity</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We conduct our business with integrity, transparency, and accountability. We maintain professional, ethical relationships with clients, suppliers, contractors, and business partners.
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Zero tolerance for bribery, corruption, or unethical commercial conduct.</li>
                        <li>Fair, transparent procurement processes and honest representation of our operational capabilities.</li>
                        <li>Strict confidentiality and protection of client intellectual property and commercial data.</li>
                    </ul>
                </div>

                <!-- 5. Sustainability -->
                <div id="sustainability" style="margin-bottom: 2rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">5. Sustainability</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We aim to incorporate responsible and sustainable practices into our operations while supporting efficient resource utilisation and long-term value creation for our clients and the industry.
                    </p>
                    <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style: disc; display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>Promoting durable, long-life asset maintenance to reduce industrial material waste.</li>
                        <li>Encouraging sustainable supply chain partnerships that respect environmental benchmarks.</li>
                        <li>Continuously investing in workforce development, safety culture, and local capacity building.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
