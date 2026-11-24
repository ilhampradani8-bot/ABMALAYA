<?php 
$pageTitle = "Tender & RFQ Inquiries - AB Malaya";
$currentPage = "tender";
include 'includes/header.php'; 

$heroTitle = "<span style='color: #1191cc;'>Tender & Project</span> <br><span style='color: #093863;'>Enquiries Portal</span>";
$heroSubtitle = "COLLABORATE & BID";
$heroDesc = "AB Malaya welcomes opportunities to collaborate with project owners, developers, contractors, consultants, and procurement bodies seeking reliable construction, engineering, marine, logistics, and industrial solutions.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<style>
    .tender-section {
        padding: 80px 0 110px;
        background: #f8fafc;
        font-family: 'Inter', sans-serif;
    }

    /* 2-Column Split Layout (Kanan - Kiri) */
    .tender-split-layout {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 55px;
        align-items: flex-start;
        max-width: 1360px;
        margin: 0 auto;
    }

    /* Sisi Kiri: Tulisan & Informasi Resmi */
    .tender-info-column {
        display: flex;
        flex-direction: column;
        padding-top: 10px;
    }

    .tender-badge-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(17, 145, 204, 0.1);
        color: #1191cc;
        border: 1px solid rgba(17, 145, 204, 0.25);
        padding: 6px 16px;
        border-radius: 30px;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        width: fit-content;
        margin-bottom: 20px;
    }

    .tender-info-column h2 {
        font-family: 'Aeonik', sans-serif;
        font-size: 2.5rem;
        font-weight: 800;
        color: #093863;
        line-height: 1.25;
        letter-spacing: -0.8px;
        margin-bottom: 18px;
    }

    .tender-lead-desc {
        color: #475569;
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 35px;
    }

    /* Perk / Credibility Cards */
    .tender-perks-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 35px;
    }

    .tender-perk-card {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        background: #ffffff;
        padding: 22px;
        border-radius: 18px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 4px 15px rgba(9, 56, 99, 0.04);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .tender-perk-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(9, 56, 99, 0.08);
    }

    .perk-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, #093863, #1191cc);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        box-shadow: 0 4px 12px rgba(17, 145, 204, 0.3);
    }

    .tender-perk-card h4 {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.1rem;
        font-weight: 800;
        color: #093863;
        margin: 0 0 6px 0;
    }

    .tender-perk-card p {
        color: #64748b;
        font-size: 0.9rem;
        line-height: 1.55;
        margin: 0;
    }

    /* Direct Contact Banner on Left */
    .tender-quick-contact {
        background: linear-gradient(145deg, #093863, #06233f);
        color: #ffffff;
        border-radius: 20px;
        padding: 26px 28px;
        box-shadow: 0 10px 30px rgba(9, 56, 99, 0.2);
    }

    .tender-quick-contact h5 {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.1rem;
        font-weight: 800;
        margin: 0 0 14px 0;
        color: #ffffff;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-strip-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .contact-strip-item span {
        display: block;
        font-size: 0.75rem;
        text-transform: uppercase;
        color: #93c5fd;
        letter-spacing: 0.5px;
        margin-bottom: 3px;
    }

    .contact-strip-item strong {
        font-size: 0.92rem;
        color: #ffffff;
        word-break: break-all;
    }

    /* Sisi Kanan: Form Card */
    .tender-form-card {
        background: #ffffff;
        border-radius: 26px;
        padding: 44px;
        box-shadow: 
            0 20px 50px rgba(9, 56, 99, 0.08),
            0 2px 10px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .form-card-header {
        margin-bottom: 30px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 20px;
    }

    .form-card-header h3 {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.7rem;
        font-weight: 800;
        color: #093863;
        margin: 0 0 8px 0;
        letter-spacing: -0.4px;
    }

    .form-card-header p {
        color: #64748b;
        font-size: 0.94rem;
        margin: 0;
        line-height: 1.5;
    }

    .tender-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    .form-group-full {
        grid-column: span 2;
    }

    .tender-label {
        display: block;
        font-family: 'Aeonik', sans-serif;
        font-weight: 700;
        font-size: 0.88rem;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .tender-label .required {
        color: #e11d48;
    }

    .tender-input, 
    .tender-select, 
    .tender-textarea {
        width: 100%;
        padding: 13px 16px;
        border-radius: 12px;
        border: 1px solid #cbd5e1;
        background: #f8fafc;
        color: #0f172a;
        font-family: 'Inter', sans-serif;
        font-size: 0.94rem;
        box-shadow: inset 1px 1px 3px rgba(0,0,0,0.03);
        transition: all 0.25s ease;
        outline: none;
        box-sizing: border-box;
    }

    .tender-input:focus, 
    .tender-select:focus, 
    .tender-textarea:focus {
        border-color: #1191cc;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(17, 145, 204, 0.15);
    }

    .file-upload-box {
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 26px 20px;
        text-align: center;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .file-upload-box:hover {
        border-color: #1191cc;
        background: #f0f9ff;
    }

    .file-upload-box i {
        font-size: 2rem;
        color: #1191cc;
        margin-bottom: 10px;
    }

    .file-upload-box p {
        margin: 0;
        font-size: 0.9rem;
        color: #64748b;
    }

    .tender-submit-btn {
        width: 100%;
        background: #093863;
        color: #ffffff;
        border: none;
        padding: 16px 30px;
        border-radius: 30px;
        font-family: 'Aeonik', sans-serif;
        font-size: 1.05rem;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(9, 56, 99, 0.25);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .tender-submit-btn:hover {
        background: #1191cc;
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(17, 145, 204, 0.35);
    }

    .tender-submit-btn:disabled {
        opacity: 0.65;
        cursor: not-allowed;
        transform: none;
    }

    .tender-guarantee-note {
        margin-top: 20px;
        text-align: center;
        font-size: 0.8rem;
        color: #94a3b8;
        line-height: 1.5;
    }

    /* Response Notification Banner */
    .form-status-alert {
        display: none;
        padding: 16px 20px;
        border-radius: 14px;
        margin-bottom: 24px;
        font-size: 0.92rem;
        line-height: 1.5;
    }
    .form-status-alert.success {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }
    .form-status-alert.error {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    /* Responsive Queries */
    @media (max-width: 1024px) {
        .tender-split-layout {
            grid-template-columns: 1fr;
            gap: 45px;
        }
        .tender-info-column {
            padding-top: 0;
        }
        .tender-info-column h2 {
            font-size: 2.1rem;
        }
        .tender-form-card {
            padding: 32px 24px;
        }
    }

    @media (max-width: 640px) {
        .tender-section {
            padding: 50px 0 80px;
        }
        .tender-info-column h2 {
            font-size: 1.75rem;
        }
        .tender-form-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        .form-group-full {
            grid-column: span 1;
        }
        .contact-strip-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        .tender-form-card {
            padding: 24px 18px;
            border-radius: 20px;
        }
        .form-card-header h3 {
            font-size: 1.35rem;
        }
    }
</style>

<section class="tender-section">
    <div class="container" style="max-width: 1360px; padding: 0 20px;">
        <div class="tender-split-layout">
            
            <!-- SISI KIRI: TULISAN, INFORMASI, & KREDIBILITAS -->
            <div class="tender-info-column">
                <span class="tender-badge-tag"><i class="fas fa-file-contract"></i> TENDER & RFQ PORTAL</span>
                <h2>Partner With AB Malaya on Strategic Ventures</h2>
                <p class="tender-lead-desc">
                    AB Malaya welcomes formal tender invitations, RFQ submissions, and joint venture collaborations from project owners, engineering consultants, developers, and government bodies seeking dependable execution capability across Malaysia and regional corridors.
                </p>

                <!-- Value Proposition Cards -->
                <div class="tender-perks-list">
                    <div class="tender-perk-card">
                        <div class="perk-icon"><i class="fas fa-certificate"></i></div>
                        <div>
                            <h4>CIDB Grade G7 & MOF Registered</h4>
                            <p>Officially accredited for building, civil infrastructure, and engineering works with unlimited contract value, qualified for federal, state, and GLC procurement.</p>
                        </div>
                    </div>

                    <div class="tender-perk-card">
                        <div class="perk-icon"><i class="fas fa-bolt-lightning"></i></div>
                        <div>
                            <h4>24–48h Rapid Bid Turnaround</h4>
                            <p>Experienced technical estimators and project directors swiftly evaluate your BOQ specifications, drawings, and submission deadlines.</p>
                        </div>
                    </div>

                    <div class="tender-perk-card">
                        <div class="perk-icon"><i class="fas fa-shield-halved"></i></div>
                        <div>
                            <h4>Strict NDA & Data Confidentiality</h4>
                            <p>All drawings, bill of quantities (BOQ), and proprietary commercial parameters are protected under strict non-disclosure ethics.</p>
                        </div>
                    </div>

                    <div class="tender-perk-card">
                        <div class="perk-icon"><i class="fas fa-headset"></i></div>
                        <div>
                            <h4>Dedicated Tender Coordinator</h4>
                            <p>Every submission is assigned to a direct commercial lead to ensure transparent technical clarification and timely quotation submission.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Direct Contact Strip -->
                <div class="tender-quick-contact">
                    <h5><i class="fas fa-building"></i> Direct Procurement Desk</h5>
                    <div class="contact-strip-grid">
                        <div class="contact-strip-item">
                            <span>Phone Lines</span>
                            <strong>+60 17-224 0091<br>+60 11-7111 7282</strong>
                        </div>
                        <div class="contact-strip-item">
                            <span>Tender Desk Email</span>
                            <strong>sales@abmalaya.com<br>info@abmalaya.com</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SISI KANAN: FORMULIR PENGAJUAN TENDER -->
            <div class="tender-form-card">
                <div class="form-card-header">
                    <h3>Submit Project Specifications</h3>
                    <p>Please furnish the project parameters below. Our estimation team will review your dossier and establish contact promptly.</p>
                </div>

                <!-- Status Alert Box -->
                <div id="form-alert" class="form-status-alert"></div>

                <form id="tender-rfq-form" onsubmit="handleTenderSubmit(event)">
                    <div class="tender-form-grid">
                        
                        <!-- Company Name -->
                        <div>
                            <label class="tender-label">Company / Organization <span class="required">*</span></label>
                            <input type="text" name="company" class="tender-input" placeholder="e.g. PetroAsia Corp Sdn Bhd" required>
                        </div>
                        
                        <!-- Contact Person -->
                        <div>
                            <label class="tender-label">Contact Person Name <span class="required">*</span></label>
                            <input type="text" name="contact_person" class="tender-input" placeholder="e.g. Ts. Ahmad Fikri" required>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="tender-label">Official Work Email <span class="required">*</span></label>
                            <input type="email" name="email" class="tender-input" placeholder="e.g. ahmad@petroasia.com" required>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label class="tender-label">Contact Phone / WhatsApp <span class="required">*</span></label>
                            <input type="tel" name="phone" class="tender-input" placeholder="e.g. +60 12-345 6789" required>
                        </div>
                        
                        <!-- Project Title -->
                        <div>
                            <label class="tender-label">Project / Tender Title <span class="required">*</span></label>
                            <input type="text" name="project_title" class="tender-input" placeholder="e.g. Civil Infrastructure Expansion Phase 2" required>
                        </div>
                        
                        <!-- Location -->
                        <div>
                            <label class="tender-label">Project Location / Site <span class="required">*</span></label>
                            <input type="text" name="location" class="tender-input" placeholder="e.g. Port Klang / Kemaman / Johor" required>
                        </div>
                        
                        <!-- Capability Division -->
                        <div>
                            <label class="tender-label">Primary Service Required <span class="required">*</span></label>
                            <select name="service" class="tender-select" required>
                                <option value="" disabled selected>-- Select Capability Division --</option>
                                <option value="contractor-engineering">Contractor & Engineering Works</option>
                                <option value="building-civil">Building & Civil Infrastructure</option>
                                <option value="marine-services">Marine Services & Vessel Support</option>
                                <option value="corrosion-management">Corrosion Management & Protective Coating</option>
                                <option value="logistics-freight">Cross-Border Logistics & Freight</option>
                                <option value="project-development">Project Development & Strategic Advisory</option>
                                <option value="technology-digital">Digital & Industrial IT Solutions</option>
                            </select>
                        </div>
                        
                        <!-- Tender Closing Date -->
                        <div>
                            <label class="tender-label">Tender Closing Date</label>
                            <input type="date" name="closing_date" class="tender-input">
                        </div>
                        
                        <!-- Scope Description -->
                        <div class="form-group-full">
                            <label class="tender-label">Project Description & Scope of Work <span class="required">*</span></label>
                            <textarea name="description" rows="5" class="tender-textarea" placeholder="Detail the expected deliverables, site conditions, estimated bill of quantities (BOQ), or technical tender specifications..." required></textarea>
                        </div>
                        
                        <!-- File Upload Box -->
                        <div class="form-group-full">
                            <label class="tender-label">Upload Tender Documents / BOQ / Drawings (Optional)</label>
                            <div class="file-upload-box" onclick="document.getElementById('file-input').click()">
                                <i class="fas fa-cloud-arrow-up"></i>
                                <p><strong>Click to browse files</strong> or drag and drop tender dossiers</p>
                                <span style="font-size: 0.78rem; color: #94a3b8;">Supports PDF, ZIP, DWG, XLSX, DOCX (Max 25MB)</span>
                                <input type="file" id="file-input" name="tender_doc" style="display: none;" onchange="updateFileName(this)">
                                <div id="file-chosen-name" style="margin-top: 10px; font-weight: 700; color: #1191cc; font-size: 0.85rem;"></div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="form-group-full" style="margin-top: 10px;">
                            <button type="submit" id="submit-btn" class="tender-submit-btn">
                                <i class="fas fa-paper-plane"></i> <span id="btn-text">Submit Tender Enquiry</span>
                            </button>
                        </div>
                        
                    </div>
                </form>
                
                <p class="tender-guarantee-note">
                    <i class="fas fa-lock" style="margin-right: 5px; color: #059669;"></i> All submitted data, proprietary drawings, and tender documents are protected under corporate Non-Disclosure Agreement (NDA) ethics.
                </p>
            </div>

        </div>
    </div>
</section>

<script>
function updateFileName(input) {
    const display = document.getElementById('file-chosen-name');
    if (input.files && input.files.length > 0) {
        display.innerHTML = '<i class="fas fa-check-circle" style="color: #059669;"></i> Attached file: ' + input.files[0].name;
    } else {
        display.innerText = '';
    }
}

function handleTenderSubmit(e) {
    e.preventDefault();
    const form = document.getElementById('tender-rfq-form');
    const alertBox = document.getElementById('form-alert');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    // Set UI loading state
    submitBtn.disabled = true;
    btnText.innerText = 'Transmitting Tender Dossier...';
    alertBox.style.display = 'none';

    // Simulate / Process transmission
    setTimeout(() => {
        submitBtn.disabled = false;
        btnText.innerText = 'Submit Tender Enquiry';
        
        alertBox.className = 'form-status-alert success';
        alertBox.innerHTML = '<i class="fas fa-circle-check" style="font-size: 1.3rem;"></i> <div><strong>Tender Enquiry Successfully Submitted!</strong><br>Our project evaluation desk has received your specifications. A bid coordinator will be in touch with your team within 1-2 business days.</div>';
        alertBox.style.display = 'flex';
        
        form.reset();
        document.getElementById('file-chosen-name').innerText = '';
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }, 1200);
}
</script>

<?php include 'includes/footer.php'; ?>
