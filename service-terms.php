<?php 
$pageTitle = "Terms of Service";
$currentPage = "service-terms";
include 'includes/header.php'; 

// Hero Variables
$heroTitle = "TERMS OF <br><span class='accent-color'>SERVICE</span>";
$heroSubtitle = "";
$heroDesc = "Operational Terms, Professional Standards, and Service Agreements for AB Malaya Sdn Bhd.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<section class="legal-content-section" style="padding: 100px 0; background: #ffffff;">
    <div class="container">
        <div class="legal-grid" style="display: flex; gap: 4rem; flex-wrap: wrap;">
            <!-- Left Side Sidebar / Navigation -->
            <div class="legal-sidebar" style="width: 25%; min-width: 250px;">
                <div style="position: sticky; top: 120px; background: #f8fafc; border-radius: 20px; padding: 2rem; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                    <h5 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -0.5px;">Terms Navigation</h5>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem; font-family: 'Inter', sans-serif; font-size: 0.9rem;">
                        <li><a href="#scope" style="color: #1191cc; text-decoration: none; font-weight: 600;">1. Scope of Services</a></li>
                        <li><a href="#standards" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">2. Professional Standards</a></li>
                        <li><a href="#payment" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">3. Payment & Billing</a></li>
                        <li><a href="#confidentiality" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">4. Confidentiality</a></li>
                        <li><a href="#termination" style="color: #475569; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#1191cc'" onmouseout="this.style.color='#475569'">5. Termination</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right Side Legal Body -->
            <div class="legal-body" style="flex: 1; min-width: 300px; max-width: 800px; color: #475569; font-family: 'Inter', sans-serif; line-height: 1.8; font-size: 1.05rem;">
                <div id="scope" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">1. Scope of Services</h2>
                    <p style="margin-bottom: 1.5rem;">
                        AB MALAYA Sdn Bhd provides high-performance technical and operational services in the fields of marine engineering, subsea operations, border logistics, and cross-border environmental IT solutions in strict accordance with the specifications agreed upon in the respective service contracts or purchase orders (PO).
                    </p>
                    <p>
                        Any modifications, additions, or expansions to the scope of work must be submitted in writing and formally approved by both parties via a signed addendum before deployment or execution.
                    </p>
                </div>

                <div id="standards" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">2. Professional Standards</h2>
                    <p style="margin-bottom: 1.5rem;">
                        We are strictly committed to executing all services in alignment with the highest international professional benchmarks, engineering codes of ethics, and statutory industrial standards.
                    </p>
                    <p>
                        AB Malaya ensures that all operations are managed under rigorous Health, Safety, and Environment (HSE) protocols. All field operators, subsea divers, and engineering technical staff hold valid, industry-recognized certifications required for their respective operational sectors.
                    </p>
                </div>

                <div id="payment" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">3. Payment and Billing</h2>
                    <p style="margin-bottom: 1.5rem;">
                        All service fees, mobilization charges, and operational costs shall be invoiced and paid according to the payment schedules and terms detailed in the primary contract. 
                    </p>
                    <p>
                        Late payments may result in the immediate suspension of ongoing technical services, delay of cargo mobilization, or interest surcharges calculated in compliance with corporate financial regulations and regional commerce laws.
                    </p>
                </div>

                <div id="confidentiality" style="margin-bottom: 4rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">4. Proprietary Information & Confidentiality</h2>
                    <p style="margin-bottom: 1.5rem;">
                        Both parties agree to hold in strict confidence all business, technical, financial, or operational information exchanged during the course of the service engagement. 
                    </p>
                    <p>
                        Neither party shall disclose, reproduce, or distribute any proprietary blueprints, software configurations, trade secrets, or client data to any third-party entity without receiving prior express written authorization from the disclosing party.
                    </p>
                </div>

                <div id="termination" style="margin-bottom: 2rem; scroll-margin-top: 120px;">
                    <h2 style="color: #0f172a; font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 2rem; margin-bottom: 1.5rem; letter-spacing: -1px;">5. Cancellation and Termination</h2>
                    <p style="margin-bottom: 1.5rem;">
                        Either party may initiate service termination by providing a formal written notice within the notification window specified in the service agreement.
                    </p>
                    <p>
                        In the event of cancellation, the client remains fully responsible for settling all outstanding invoices and payments for the portion of the engineering or logistics services completed up to the official termination date.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
