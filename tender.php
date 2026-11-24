<?php 
/**
 * AB Malaya Sdn Bhd - Maritime Vessel Requisition & RFQ Portal
 * Standard HSEMS Attachment 10.1D Compliant System
 * 100% English UI | Sharp Classic Corporate Layout | Full-Width | Live Real-Time A4 Sync
 */

require_once __DIR__ . '/db_connect.php';

$pageTitle = "Maritime Vessel Requisition & RFQ Portal - AB Malaya";
$currentPage = "tender";
include 'includes/header.php'; 

$heroTitle = "<span style='color: #1191cc;'>Maritime Vessel</span> <br><span style='color: #093863;'>Requisition & RFQ Portal</span>";
$heroSubtitle = "HSEMS ATTACHMENT 10.1D & IMPA CATALOG INTEGRATION";
$heroDesc = "Standardized maritime vessel requisition system connected live to the AB Malaya dedicated frontend database and 49,459 certified IMPA marine stores. Real-time split-screen interactive paperwork generator.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<!-- Include html2pdf.js for direct client-side PDF compilation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<style>
    /* ==========================================================================
       CLASSIC MARITIME REQUISITION PORTAL STYLING (SHARP, FULL-WIDTH, NO BUBBLES)
       ========================================================================== */
    .tender-portal-section {
        padding: 30px 0 80px;
        background: #f8fafc;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: #0f172a;
    }

    .tender-portal-container {
        width: 100%;
        max-width: 1560px;
        margin: 0 auto;
        padding: 0 24px;
        box-sizing: border-box;
    }

    /* ── Initial Launcher Banner (Flat & Sharp) ─────────────────────────────── */
    .portal-hero-launcher {
        background: #093863;
        border: 1px solid #093863;
        border-top: 4px solid #1191cc;
        border-radius: 0;
        padding: 36px 40px;
        color: #ffffff;
        margin-bottom: 30px;
    }

    .launcher-badge-sharp {
        display: inline-block;
        background: #1191cc;
        color: #ffffff;
        padding: 4px 12px;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        margin-bottom: 12px;
        border-radius: 0;
    }

    .launcher-title-sharp {
        font-family: 'Aeonik', Georgia, serif;
        font-size: 2.2rem;
        font-weight: 800;
        line-height: 1.2;
        margin: 0 0 10px 0;
        letter-spacing: -0.4px;
    }

    .launcher-desc-sharp {
        color: #e2e8f0;
        font-size: 1rem;
        line-height: 1.6;
        max-width: 860px;
        margin: 0 0 24px 0;
    }

    .launcher-actions-sharp {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .btn-sharp-primary {
        background: #1191cc;
        color: #ffffff;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.95rem;
        font-weight: 800;
        padding: 14px 32px;
        border-radius: 0;
        border: 1.5px solid #1191cc;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: background 0.15s, border-color 0.15s;
    }

    .btn-sharp-primary:hover {
        background: #0284c7;
        border-color: #0284c7;
    }

    .launcher-statutory-strip {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
    }

    .stat-tag-sharp {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #e2e8f0;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 0;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    /* ── Split-Screen Workspace (Left: Paper View, Right: Form View) ────────── */
    #requisition-workspace {
        display: none;
        animation: fadeInWorkspace 0.3s ease-out forwards;
    }

    @keyframes fadeInWorkspace {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .split-requisition-layout {
        display: grid;
        grid-template-columns: 1fr 1.05fr;
        gap: 28px;
        align-items: start;
    }

    /* ── Left Column: Live A4 Paper Sheet ───────────────────────────────────── */
    .paper-viewport-column {
        position: sticky;
        top: 80px;
        max-height: calc(100vh - 100px);
        overflow-y: auto;
        padding-right: 4px;
    }

    .paper-viewport-column::-webkit-scrollbar {
        width: 6px;
    }
    .paper-viewport-column::-webkit-scrollbar-thumb {
        background: #cbd5e1;
    }

    .paper-top-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #ffffff;
        padding: 10px 16px;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        margin-bottom: 14px;
    }

    .paper-status-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.8rem;
        font-weight: 800;
        color: #093863;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .paper-status-tag .live-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #059669;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.2);
    }

    .paper-quick-actions {
        display: flex;
        gap: 6px;
    }

    .btn-sharp-action-sm {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        color: #0f172a;
        padding: 6px 14px;
        font-size: 0.78rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        transition: all 0.15s;
    }

    .btn-sharp-action-sm:hover {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
    }

    /* ── The Official A4 Requisition Document Sheet (Exact Maritime Format) ─── */
    .paper-doc-sheet {
        background: #ffffff;
        width: 100%;
        box-sizing: border-box;
        padding: 32px 34px 26px;
        border: 1.5px solid #000000;
        color: #000000;
        font-family: 'Arial', Helvetica, sans-serif;
        font-size: 0.82rem;
        line-height: 1.35;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    /* Header Table */
    .sheet-header-table {
        width: 100%;
        border-collapse: collapse;
        border: 1.5px solid #000000;
        margin-bottom: 8px;
    }

    .sheet-header-table td {
        border: 1.5px solid #000000;
        vertical-align: middle;
    }

    .cell-h-title {
        padding: 6px 10px;
        font-weight: bold;
        font-size: 1.02rem;
        letter-spacing: -0.2px;
    }

    .cell-h-attachment {
        width: 28%;
        padding: 4px 8px;
        font-size: 0.72rem;
        line-height: 1.35;
    }

    .cell-h-reqform {
        text-align: center;
        font-size: 1.25rem;
        font-weight: 800;
        letter-spacing: 0.5px;
    }

    .cell-h-logo {
        width: 24%;
        text-align: center;
        padding: 6px;
        background: #ffffff;
    }

    .cell-h-logo img {
        max-height: 44px;
        max-width: 125px;
        object-fit: contain;
    }

    /* Criticality Checkbox Line (Right Aligned) */
    .sheet-critical-strip {
        text-align: right;
        font-size: 0.8rem;
        margin-bottom: 6px;
        font-family: 'Arial', sans-serif;
    }

    .sheet-checkbox-char {
        font-family: monospace;
        font-size: 0.95rem;
        font-weight: bold;
    }

    /* Metadata Table */
    .sheet-meta-table {
        width: 100%;
        border-collapse: collapse;
        border: 1.5px solid #000000;
        margin-bottom: 8px;
    }

    .sheet-meta-table td {
        border: 1px solid #000000;
        padding: 5px 8px;
        font-size: 0.8rem;
    }

    .sheet-val {
        font-weight: bold;
        color: #000000;
    }

    /* Items Table */
    .sheet-items-table {
        width: 100%;
        border-collapse: collapse;
        border: 1.5px solid #000000;
        margin-bottom: 12px;
    }

    .sheet-items-table th {
        border: 1.5px solid #000000;
        padding: 6px;
        font-size: 0.8rem;
        font-weight: bold;
        background: #ffffff;
    }

    .sheet-items-table td {
        border: 1px solid #000000;
        padding: 7px 9px;
        vertical-align: top;
        font-size: 0.78rem;
        line-height: 1.4;
        page-break-inside: avoid;
    }

    .sheet-empty-placeholder {
        text-align: center;
        color: #94a3b8;
        font-style: italic;
        padding: 40px 10px !important;
        font-size: 0.82rem;
    }

    /* Sign-off Box */
    .sheet-sign-table {
        width: 100%;
        border-collapse: collapse;
        border: 1.5px solid #000000;
        margin-bottom: 8px;
    }

    .sheet-sign-table td {
        border: 1px solid #000000;
        padding: 6px 8px;
        font-size: 0.78rem;
        vertical-align: top;
    }

    .stamp-container-box {
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 4px;
    }

    .stamp-container-box img {
        max-height: 60px;
        max-width: 160px;
        object-fit: contain;
    }

    /* Note footer */
    .sheet-notes-footer {
        font-size: 0.7rem;
        line-height: 1.45;
        color: #000000;
        margin-bottom: 8px;
    }

    .sheet-page-footer {
        display: flex;
        justify-content: space-between;
        font-size: 0.72rem;
        border-top: 1px solid #000000;
        padding-top: 4px;
    }

    /* ── Right Column: Multi-Step Interactive Form (Sharp Classic Styling) ──── */
    .form-viewport-column {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        border-top: 3px solid #093863;
        border-radius: 0;
        padding: 28px 32px;
    }

    /* Form Step Navigation - Crisp & Flat */
    .form-steps-nav {
        display: flex;
        gap: 6px;
        margin-bottom: 24px;
        border-bottom: 1.5px solid #093863;
        padding-bottom: 14px;
    }

    .step-sharp-btn {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        background: #f8fafc;
        cursor: pointer;
        text-align: left;
        transition: all 0.15s;
    }

    .step-sharp-btn.active {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
    }

    .step-sharp-btn.done {
        background: #f0fdf4;
        color: #166534;
        border-color: #bbf7d0;
    }

    .step-sharp-number {
        font-size: 0.85rem;
        font-weight: 800;
        font-family: 'Aeonik', sans-serif;
    }

    .step-sharp-label {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    /* Form Panes */
    .step-content-pane {
        display: none;
    }

    .step-content-pane.active {
        display: block;
    }

    .pane-title-sharp {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.25rem;
        font-weight: 800;
        color: #093863;
        margin: 0 0 4px 0;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .pane-desc-sharp {
        color: #64748b;
        font-size: 0.88rem;
        margin: 0 0 20px 0;
    }

    .form-group-sharp {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin-bottom: 16px;
    }

    .form-label-sharp {
        font-size: 0.82rem;
        font-weight: 800;
        color: #0f172a;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .form-label-sharp .req {
        color: #dc2626;
    }

    .form-input-sharp,
    .form-select-sharp,
    .form-textarea-sharp {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        background: #ffffff;
        color: #0f172a;
        font-size: 0.88rem;
        font-family: inherit;
        outline: none;
        box-sizing: border-box;
    }

    .form-input-sharp:focus,
    .form-select-sharp:focus,
    .form-textarea-sharp:focus {
        border-color: #093863;
        background: #f8fafc;
    }

    .form-grid-sharp-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    /* Radio / Checkbox Chips - Sharp */
    .sharp-options-row {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .sharp-choice-btn {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        padding: 8px 14px;
        font-size: 0.8rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        user-select: none;
    }

    .sharp-choice-btn.selected {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
    }

    /* Search Box in Form */
    .impa-inline-search-box {
        position: relative;
        margin-bottom: 18px;
    }

    .impa-inline-search-input {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border: 1.5px solid #093863;
        border-radius: 0;
        background: #ffffff;
        font-size: 0.9rem;
        outline: none;
        box-sizing: border-box;
    }

    .impa-search-dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        border: 1.5px solid #093863;
        border-top: none;
        z-index: 1000;
        max-height: 240px;
        overflow-y: auto;
        display: none;
    }

    .impa-search-dropdown-item {
        padding: 9px 12px;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        font-size: 0.84rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .impa-search-dropdown-item:hover {
        background: #f0f9ff;
    }

    /* Item Builder Box - Sharp */
    .sharp-builder-box {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        padding: 18px;
        margin-bottom: 20px;
    }

    .btn-sharp-add-row {
        background: #093863;
        color: #ffffff;
        border: 1px solid #093863;
        border-radius: 0;
        padding: 9px 20px;
        font-size: 0.84rem;
        font-weight: 800;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .btn-sharp-add-row:hover {
        background: #1191cc;
        border-color: #1191cc;
    }

    /* Added Items List */
    .added-item-sharp-row {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 10px 12px;
        margin-bottom: 8px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
    }

    /* Navigation Controls - Sharp */
    .form-nav-controls-sharp {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 26px;
        padding-top: 18px;
        border-top: 1px solid #e2e8f0;
        gap: 12px;
    }

    .btn-sharp-nav {
        background: #093863;
        color: #ffffff;
        border: 1px solid #093863;
        border-radius: 0;
        padding: 11px 24px;
        font-size: 0.88rem;
        font-weight: 800;
        font-family: 'Aeonik', sans-serif;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-sharp-nav:hover {
        background: #1191cc;
        border-color: #1191cc;
    }

    .btn-sharp-nav-secondary {
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        padding: 11px 20px;
        font-size: 0.84rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .btn-sharp-nav-secondary:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    /* ── Precise Print Stylesheet for Authentic A4 Margins ─────────────────── */
    @media print {
        body * {
            visibility: hidden !important;
        }
        #paper-doc-sheet, #paper-doc-sheet * {
            visibility: visible !important;
        }
        #paper-doc-sheet {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 12mm 15mm !important;
            border: 1.5px solid #000000 !important;
            box-shadow: none !important;
            background: #ffffff !important;
        }
    }

    @media (max-width: 1100px) {
        .split-requisition-layout {
            grid-template-columns: 1fr;
        }
        .paper-viewport-column {
            position: static;
            max-height: none;
            order: 2;
            margin-top: 30px;
        }
    }
</style>

<section class="tender-portal-section">
    <div class="tender-portal-container">
        
        <!-- ── HERO CALLOUT LAUNCHER (Initial View with Button to reveal form) ─ -->
        <div class="portal-hero-launcher" id="portal-launcher">
            <span class="launcher-badge-sharp">
                <i class="fas fa-ship"></i> Enterprise Marine Procurement & Tender Desk
            </span>
            <h2 class="launcher-title-sharp">
                Maritime Vessel Requisition & RFQ Portal
            </h2>
            <p class="launcher-desc-sharp">
                Official HSEMS Attachment 10.1D compliant procurement desk. Connected directly to the 49,459 certified IMPA marine stores database and the AB Malaya enterprise ERP pipeline. Interactive live A4 paperwork generator.
            </p>

            <div class="launcher-actions-sharp">
                <button type="button" class="btn-sharp-primary" onclick="openRequisitionWorkspace()">
                    <i class="fas fa-file-signature"></i> Create Requisition / Issue Marine RFQ
                </button>
            </div>

            <div class="launcher-statutory-strip">
                <span class="stat-tag-sharp"><i class="fas fa-shield-check"></i> CIDB Grade G7 (No Limit Contract Value)</span>
                <span class="stat-tag-sharp"><i class="fas fa-building-columns"></i> MOF Registered Contractor</span>
                <span class="stat-tag-sharp"><i class="fas fa-database"></i> 49,459+ Certified IMPA Stores</span>
                <span class="stat-tag-sharp"><i class="fas fa-network-wired"></i> Direct ERP Database Sync</span>
                <span class="stat-tag-sharp"><i class="fas fa-certificate"></i> SOLAS / MED / Class Compliant</span>
            </div>
        </div>

        <!-- ── SPLIT-SCREEN WORKSPACE (Initially Hidden) ─────────────────────── -->
        <div id="requisition-workspace">
            
            <!-- Global Action Bar to close or toggle -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px; background: #ffffff; padding: 12px 18px; border: 1px solid #cbd5e1;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-family: 'Aeonik', sans-serif; font-size: 1.05rem; font-weight: 800; color: #093863; text-transform: uppercase; letter-spacing: 0.3px;">
                        <i class="fas fa-file-contract"></i> Maritime Requisition Workspace (Live Synchronized)
                    </span>
                </div>
                <button type="button" onclick="closeRequisitionWorkspace()" class="btn-sharp-action-sm">
                    <i class="fas fa-chevron-up"></i> Hide Workspace
                </button>
            </div>

            <!-- Split Grid -->
            <div class="split-requisition-layout">
                
                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- LEFT COLUMN: LIVE AUTHENTIC A4 PAPER VIEW (HSEMS 10.1D)     -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="paper-viewport-column">
                    
                    <!-- Paper Toolbar -->
                    <div class="paper-top-toolbar">
                        <div class="paper-status-tag">
                            <span class="live-dot"></span> Official Paper Preview (A4 Sheet)
                        </div>
                        <div class="paper-quick-actions">
                            <button type="button" class="btn-sharp-action-sm" onclick="printPaperDocument()">
                                <i class="fas fa-print"></i> Print
                            </button>
                            <button type="button" class="btn-sharp-action-sm" style="background: #093863; color: #ffffff;" onclick="downloadDirectPaperPdf()">
                                <i class="fas fa-download"></i> Download PDF
                            </button>
                        </div>
                    </div>

                    <!-- The Authentic Document Sheet (Matches PDF exactly) -->
                    <div id="paper-doc-sheet" class="paper-doc-sheet">
                        
                        <!-- Header Table -->
                        <table class="sheet-header-table">
                            <tr>
                                <td colspan="2" class="cell-h-title">
                                    Health, Safety and Environmental Management System
                                </td>
                                <td rowspan="2" class="cell-h-logo">
                                    <img id="paper-custom-logo-img" src="assets/img/logo-abmalaya.webp" alt="Client Logo">
                                    <div id="paper-custom-logo-text" style="font-size: 0.65rem; font-weight: bold; margin-top: 3px;">AB MALAYA MARINE</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="cell-h-attachment">
                                    Attachment 10.1D<br>
                                    HSEMS Rev No: 00<br>
                                    25th January 2018
                                </td>
                                <td class="cell-h-reqform">
                                    REQUISITION FORM
                                </td>
                            </tr>
                        </table>

                        <!-- Criticality Checkbox Line (Right Aligned) -->
                        <div class="sheet-critical-strip">
                            <span id="paper-check-critical" class="sheet-checkbox-char">[ ]</span> Critical Equipment 
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span id="paper-check-noncritical" class="sheet-checkbox-char">[ ]</span> Non-Critical Equipment
                        </div>

                        <!-- Metadata Table -->
                        <table class="sheet-meta-table">
                            <tr>
                                <td style="width: 14%;">Vessel</td>
                                <td style="width: 44%;"><span id="paper-vessel-name" class="sheet-val">&nbsp;</span></td>
                                <td style="width: 42%;">Requisition No: <span id="paper-req-no" class="sheet-val"></span></td>
                            </tr>
                            <tr>
                                <td>From</td>
                                <td colspan="2">
                                    <span id="paper-from-deck" class="sheet-checkbox-char">[ ]</span> Deck Department
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="paper-from-engine" class="sheet-checkbox-char">[ ]</span> Engine Department
                                </td>
                            </tr>
                            <tr>
                                <td>Issue to</td>
                                <td colspan="2">
                                    <span id="paper-issue-op" class="sheet-checkbox-char">[ ]</span> Operation Department
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="paper-issue-tech" class="sheet-checkbox-char">[ ]</span> Technical Department
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="paper-issue-man" class="sheet-checkbox-char">[ ]</span> Manning Department
                                </td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td colspan="2"><span id="paper-date" class="sheet-val">&nbsp;</span></td>
                            </tr>
                            <tr>
                                <td>Name of ordering item:</td>
                                <td colspan="2"><span id="paper-ordering-item" class="sheet-val">&nbsp;</span></td>
                            </tr>
                        </table>

                        <!-- Requisition Line Items Table -->
                        <table class="sheet-items-table">
                            <thead>
                                <tr>
                                    <th style="width: 10%; text-align: center;">NUMBER</th>
                                    <th style="width: 72%; text-align: left;">DESCRIPTION</th>
                                    <th style="width: 18%; text-align: center;">QUANTITY</th>
                                </tr>
                            </thead>
                            <tbody id="paper-items-tbody">
                                <!-- Empty state by default as requested -->
                                <tr>
                                    <td colspan="3" class="sheet-empty-placeholder">
                                        (Requisition Sheet Empty — Configure line items using the panel on the right)
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Sign-off & Stamp Box -->
                        <table class="sheet-sign-table">
                            <tr>
                                <td style="width: 45%;">
                                    Master name: <span id="paper-master-name" class="sheet-val">&nbsp;</span>
                                </td>
                                <td style="width: 35%; text-align: center;">
                                    Signature / Stamp:
                                    <div class="stamp-container-box" id="paper-stamp-box">
                                        <!-- Rendered dynamically -->
                                        <span style="font-size: 0.7rem; color: #94a3b8; font-style: italic;">[ Unsigned / No Stamp ]</span>
                                    </div>
                                </td>
                                <td style="width: 20%;">
                                    Date: <span id="paper-sign-date" class="sheet-val">&nbsp;</span>
                                </td>
                            </tr>
                        </table>

                        <!-- Notes Footnote -->
                        <div class="sheet-notes-footer">
                            Note: 1. Send to fleet@dutamarine.com and file copy onboard (or sales@abmalaya.com)<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. * Format for report no: Vessel Code/RF/Year/ Running no of that year, (example Duta Pacific/DK/2019/001).
                        </div>

                        <!-- Page and Section Footer -->
                        <div class="sheet-page-footer">
                            <span>Page 1 of 1</span>
                            <span>Section 10</span>
                        </div>

                    </div>
                </div>

                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- RIGHT COLUMN: MULTI-STEP REQUISITION FORM (SHARP & ENGLISH) -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="form-viewport-column">
                    
                    <!-- Progress Steps Navigation -->
                    <div class="form-steps-nav">
                        <button type="button" class="step-sharp-btn active" id="pill-step-1" onclick="goToFormStep(1)">
                            <span class="step-sharp-number">1.</span>
                            <span class="step-sharp-label">Vessel & Entity</span>
                        </button>
                        <button type="button" class="step-sharp-btn" id="pill-step-2" onclick="goToFormStep(2)">
                            <span class="step-sharp-number">2.</span>
                            <span class="step-sharp-label">IMPA Line Items</span>
                        </button>
                        <button type="button" class="step-sharp-btn" id="pill-step-3" onclick="goToFormStep(3)">
                            <span class="step-sharp-number">3.</span>
                            <span class="step-sharp-label">Sign-off & Send</span>
                        </button>
                    </div>

                    <!-- Status Notification Alert -->
                    <div id="form-alert-box" style="display: none; padding: 12px 16px; border-radius: 0; margin-bottom: 16px; font-size: 0.88rem;"></div>

                    <!-- ── STEP 1: VESSEL & REQUISITION IDENTITY ──────────────── -->
                    <div class="step-content-pane active" id="pane-step-1">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 8px; margin-bottom: 16px;">
                            <div>
                                <h3 class="pane-title-sharp">Step 1: Vessel Identification & Parameters</h3>
                                <p class="pane-desc-sharp">Complete vessel details and requisition headers. All inputs sync live to the document on the left.</p>
                            </div>
                            <button type="button" onclick="loadSamplePermataDulangData()" class="btn-sharp-action-sm" style="background: #f0fdf4; border-color: #86efac; color: #166534;">
                                <i class="fas fa-wand-magic-sparkles"></i> Load Demo Requisition (PD-DECK-2026-099)
                            </button>
                        </div>

                        <!-- Optional Custom Logo Upload -->
                        <div class="form-group-sharp" style="background: #f8fafc; padding: 12px; border: 1px solid #cbd5e1; margin-bottom: 16px;">
                            <label class="form-label-sharp"><i class="fas fa-image"></i> Custom Ship / Company Logo (Header)</label>
                            <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                                <input type="file" id="upload_custom_logo" accept="image/*" class="form-input-sharp" style="padding: 6px; width: auto; flex: 1;" onchange="handleCustomLogoUpload(this)">
                                <button type="button" onclick="resetCustomLogo()" class="btn-sharp-action-sm" style="color: #dc2626;">Reset Default</button>
                            </div>
                        </div>

                        <div class="form-grid-sharp-2">
                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Vessel Name <span class="req">*</span></label>
                                <input type="text" id="f_vessel_name" class="form-input-sharp" placeholder="e.g. PERMATA DULANG" oninput="syncPaperField('vessel_name', this.value)">
                            </div>

                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Requisition Number <span class="req">*</span></label>
                                <div style="display: flex; gap: 6px;">
                                    <input type="text" id="f_req_no" class="form-input-sharp" placeholder="e.g. PD-DECK-2026-099" oninput="syncPaperField('req_no', this.value)">
                                    <button type="button" onclick="generateSampleReqNo()" class="btn-sharp-action-sm" style="white-space: nowrap;">
                                        Auto No
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Equipment Criticality -->
                        <div class="form-group-sharp">
                            <label class="form-label-sharp">Equipment Classification</label>
                            <div class="sharp-options-row">
                                <label class="sharp-choice-btn" id="chip-crit" onclick="selectCriticality('critical')">
                                    <input type="radio" name="crit_status" value="critical" style="display: none;">
                                    <i class="fas fa-triangle-exclamation"></i> Critical Equipment (SOLAS/LSA)
                                </label>
                                <label class="sharp-choice-btn" id="chip-noncrit" onclick="selectCriticality('non-critical')">
                                    <input type="radio" name="crit_status" value="non-critical" style="display: none;">
                                    <i class="fas fa-box"></i> Non-Critical Equipment
                                </label>
                            </div>
                        </div>

                        <div class="form-grid-sharp-2">
                            <!-- Department (From) -->
                            <div class="form-group-sharp">
                                <label class="form-label-sharp">From Department</label>
                                <div class="sharp-options-row">
                                    <label class="sharp-choice-btn" id="chip-dept-deck" onclick="selectDepartment('deck')">
                                        <i class="fas fa-anchor"></i> Deck Department
                                    </label>
                                    <label class="sharp-choice-btn" id="chip-dept-engine" onclick="selectDepartment('engine')">
                                        <i class="fas fa-gears"></i> Engine Department
                                    </label>
                                </div>
                            </div>

                            <!-- Issue To -->
                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Issue To</label>
                                <div class="sharp-options-row">
                                    <label class="sharp-choice-btn" id="chip-iss-op" onclick="toggleIssueTo('op')">
                                        Operation
                                    </label>
                                    <label class="sharp-choice-btn" id="chip-iss-tech" onclick="toggleIssueTo('tech')">
                                        Technical
                                    </label>
                                    <label class="sharp-choice-btn" id="chip-iss-man" onclick="toggleIssueTo('man')">
                                        Manning
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-grid-sharp-2">
                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Requisition Date <span class="req">*</span></label>
                                <div style="display: flex; gap: 6px;">
                                    <input type="date" id="f_date" class="form-input-sharp" oninput="syncPaperField('date', this.value)">
                                    <button type="button" onclick="setTodayDate('f_date')" class="btn-sharp-action-sm">Today</button>
                                </div>
                            </div>

                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Name of Ordering Item <span class="req">*</span></label>
                                <input type="text" id="f_ordering_item" class="form-input-sharp" placeholder="e.g. LSA & FFA (Life Saving & Fire Fighting)" oninput="syncPaperField('ordering_item', this.value)">
                            </div>
                        </div>

                        <div class="form-nav-controls-sharp">
                            <div></div>
                            <button type="button" class="btn-sharp-nav" onclick="goToFormStep(2)">
                                Proceed to IMPA Line Items <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>


                    <!-- ── STEP 2: IMPA LINE ITEMS BUILDER ───────────────────── -->
                    <div class="step-content-pane" id="pane-step-2">
                        <div style="margin-bottom: 16px;">
                            <h3 class="pane-title-sharp">Step 2: Marine Stores Requisition (IMPA Catalog)</h3>
                            <p class="pane-desc-sharp">Live query from 49,459 certified items in the dedicated database. Configure technical specifications, attach sample photos, and append to the document.</p>
                        </div>

                        <!-- Live IMPA Search Bar -->
                        <div class="impa-inline-search-box">
                            <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #093863;"></i>
                            <input type="text" id="impa-live-search-input" class="impa-inline-search-input" placeholder="Type IMPA Code (e.g. 330209) or Item Title (e.g. bucket, lifejacket, rope)..." oninput="handleLiveImpaSearch(this.value)">
                            <div id="impa-live-dropdown" class="impa-search-dropdown-menu"></div>
                        </div>

                        <!-- Line Item Builder Box (Sharp) -->
                        <div class="sharp-builder-box">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; border-bottom: 1px solid #cbd5e1; padding-bottom: 6px;">
                                <span style="font-family: 'Aeonik', sans-serif; font-size: 0.9rem; font-weight: 800; color: #093863; text-transform: uppercase;">
                                    <i class="fas fa-pen-ruler"></i> Line Item Configuration #<span id="builder-item-no">1</span>
                                </span>
                            </div>

                            <div class="form-grid-sharp-2">
                                <div class="form-group-sharp">
                                    <label class="form-label-sharp">Item Description / Name <span class="req">*</span></label>
                                    <input type="text" id="item_input_name" class="form-input-sharp" placeholder="e.g. LIFEBOAT BUCKET / THERMAL PROTECTIVE AIDS">
                                </div>

                                <div class="form-group-sharp">
                                    <label class="form-label-sharp">IMPA Code <span class="req">*</span></label>
                                    <input type="text" id="item_input_impa" class="form-input-sharp" placeholder="e.g. 33 02 09">
                                </div>
                            </div>

                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Technical Specification & Approvals (Maker, Model, SOLAS, MED)</label>
                                <textarea id="item_input_spec" class="form-textarea-sharp" rows="2" placeholder="e.g. BRAND: LALIZAS | MODEL: SAFELITE IV | APPROVALS: SOLAS, MED, USCG | COMPLETE WITH MOUNTING CLIP"></textarea>
                            </div>

                            <div class="form-grid-sharp-2">
                                <div class="form-group-sharp">
                                    <label class="form-label-sharp">Purpose of Requisition / Remarks</label>
                                    <input type="text" id="item_input_purpose" class="form-input-sharp" placeholder="e.g. WORKING AT HAWSER GUTTER / TOTALLY ENCLOSED LIFEBOAT">
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                                    <div class="form-group-sharp">
                                        <label class="form-label-sharp">Quantity <span class="req">*</span></label>
                                        <input type="number" id="item_input_qty" class="form-input-sharp" min="1" step="any" value="1">
                                    </div>
                                    <div class="form-group-sharp">
                                        <label class="form-label-sharp">Unit</label>
                                        <select id="item_input_unit" class="form-select-sharp">
                                            <option value="PCS" selected>PCS</option>
                                            <option value="SET">SET</option>
                                            <option value="ROLLS">ROLLS</option>
                                            <option value="PKT">PKT</option>
                                            <option value="MTR">MTR</option>
                                            <option value="LTR">LTR</option>
                                            <option value="KG">KG</option>
                                            <option value="DRUM">DRUM</option>
                                            <option value="BOX">BOX</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo Attachment for this Item -->
                            <div class="form-group-sharp">
                                <label class="form-label-sharp"><i class="fas fa-camera"></i> Item Sample Photo / Nameplate Drawing (Optional - Appears in Document Table)</label>
                                <input type="file" id="item_input_photo" accept="image/*" class="form-input-sharp" style="padding: 6px;" onchange="previewItemPhoto(this)">
                                <div id="item_photo_preview_wrap" style="display: none; align-items: center; gap: 10px; margin-top: 6px;">
                                    <img id="item_photo_preview_img" src="" style="max-height: 50px; border: 1px solid #cbd5e1;">
                                    <button type="button" onclick="clearItemPhoto()" class="btn-sharp-action-sm" style="color: #dc2626;">Remove Photo</button>
                                </div>
                            </div>

                            <div style="text-align: right; margin-top: 10px;">
                                <button type="button" class="btn-sharp-add-row" onclick="addCurrentItemToRequisition()">
                                    <i class="fas fa-plus"></i> Add Item to Requisition
                                </button>
                            </div>
                        </div>

                        <!-- Current Configured Items List -->
                        <div style="border-top: 1px solid #cbd5e1; padding-top: 14px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                <span style="font-size: 0.84rem; font-weight: 800; color: #093863; text-transform: uppercase;">
                                    Configured Requisition Items (<span id="added-items-count">0</span>)
                                </span>
                                <button type="button" onclick="clearAllItems()" class="btn-sharp-action-sm" style="color: #dc2626;">
                                    Clear All Items
                                </button>
                            </div>
                            <div id="added-items-container">
                                <div style="text-align: center; color: #94a3b8; font-size: 0.84rem; padding: 18px; border: 1px dashed #cbd5e1;">
                                    No items added yet. Search the IMPA catalog above or manually fill the form to append line items.
                                </div>
                            </div>
                        </div>

                        <div class="form-nav-controls-sharp">
                            <button type="button" class="btn-sharp-nav-secondary" onclick="goToFormStep(1)">
                                <i class="fas fa-arrow-left"></i> Back to Vessel Info
                            </button>
                            <button type="button" class="btn-sharp-nav" onclick="goToFormStep(3)">
                                Proceed to Sign-off <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>


                    <!-- ── STEP 3: SIGN-OFF & EXPORT / TRANSMIT ───────────────── -->
                    <div class="step-content-pane" id="pane-step-3">
                        <div style="margin-bottom: 16px;">
                            <h3 class="pane-title-sharp">Step 3: Authorization, Signature & Document Export</h3>
                            <p class="pane-desc-sharp">Complete officer endorsement, attach digital signature or ship stamp seal, and export official PDF or transmit to ERP.</p>
                        </div>

                        <div class="form-grid-sharp-2">
                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Master / Chief Engineer Name <span class="req">*</span></label>
                                <input type="text" id="f_master_name" class="form-input-sharp" placeholder="e.g. Capt Faiz Bin Kamarolzaman" oninput="syncPaperField('master_name', this.value)">
                            </div>

                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Endorsement Date</label>
                                <div style="display: flex; gap: 6px;">
                                    <input type="date" id="f_sign_date" class="form-input-sharp" oninput="syncPaperField('sign_date', this.value)">
                                    <button type="button" onclick="setTodayDate('f_sign_date')" class="btn-sharp-action-sm">Today</button>
                                </div>
                            </div>
                        </div>

                        <!-- Signature / Stamp Upload Options -->
                        <div class="form-group-sharp" style="background: #f8fafc; padding: 14px; border: 1px solid #cbd5e1; margin-bottom: 18px;">
                            <label class="form-label-sharp"><i class="fas fa-stamp"></i> Ship Stamp Seal & Signature Options</label>
                            
                            <div class="sharp-options-row" style="margin-bottom: 10px;">
                                <label class="sharp-choice-btn" id="chip-sample-stamp" onclick="toggleSampleStamp()">
                                    <i class="fas fa-stamp"></i> Toggle Official Seal (MT PERMATA DULANG)
                                </label>
                            </div>

                            <div>
                                <span style="font-size: 0.78rem; font-weight: 700; color: #475569; display: block; margin-bottom: 4px;">OR UPLOAD CUSTOM STAMP / SIGNATURE IMAGE:</span>
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    <input type="file" id="upload_stamp_file" accept="image/*" class="form-input-sharp" style="padding: 6px;" onchange="handleStampFileUpload(this)">
                                    <button type="button" onclick="clearUploadedStamp()" class="btn-sharp-action-sm" style="color: #dc2626;">Clear Stamp</button>
                                </div>
                            </div>
                        </div>

                        <!-- Contact for Official Formal Quote Feedback -->
                        <div class="form-grid-sharp-2">
                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Contact Email (For Quotation Dispatch) <span class="req">*</span></label>
                                <input type="email" id="f_client_email" class="form-input-sharp" placeholder="e.g. fleet@dutamarine.com / superintendent@company.com">
                            </div>

                            <div class="form-group-sharp">
                                <label class="form-label-sharp">Telephone / Mobile Line</label>
                                <input type="tel" id="f_client_phone" class="form-input-sharp" placeholder="e.g. +60 12-345 6789">
                            </div>
                        </div>

                        <!-- Document Export Master Action Strip -->
                        <div style="background: #093863; padding: 20px; color: #ffffff; margin-top: 20px;">
                            <div style="font-family: 'Aeonik', sans-serif; font-size: 0.92rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px;">
                                Master Execution & Output Actions
                            </div>

                            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                <button type="button" class="btn-sharp-primary" style="background: #ffffff; color: #093863; border-color: #ffffff;" onclick="downloadDirectPaperPdf()">
                                    <i class="fas fa-download"></i> Download PDF Document
                                </button>

                                <button type="button" class="btn-sharp-primary" style="background: transparent; border-color: #ffffff; color: #ffffff;" onclick="printPaperDocument()">
                                    <i class="fas fa-print"></i> Print Sheet
                                </button>

                                <button type="button" id="btn-submit-erp" class="btn-sharp-primary" style="background: #059669; border-color: #059669;" onclick="submitRequisitionToErp()">
                                    <i class="fas fa-paper-plane"></i> <span id="btn-submit-erp-label">Transmit to AB Malaya ERP</span>
                                </button>
                            </div>
                        </div>

                        <div class="form-nav-controls-sharp">
                            <button type="button" class="btn-sharp-nav-secondary" onclick="goToFormStep(2)">
                                <i class="fas fa-arrow-left"></i> Back to Items
                            </button>
                            <button type="button" class="btn-sharp-nav-secondary" style="color: #dc2626;" onclick="resetEntireForm()">
                                <i class="fas fa-rotate-left"></i> Reset Blank Form
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<!-- ======================================================================= -->
<!-- JAVASCRIPT: REAL-TIME PAPER SYNC, IMAGE UPLOADS, & PRECISE PDF ENGINE   -->
<!-- ======================================================================= -->
<script>
// State Store for Requisition - Starts completely empty as requested
const requisitionState = {
    vessel_name: '',
    req_no: '',
    critical_status: '',
    from_dept: '',
    issue_to: { op: false, tech: false, man: false },
    date: '',
    ordering_item: '',
    master_name: '',
    sign_date: '',
    has_sample_stamp: false,
    custom_stamp_base64: null,
    custom_logo_base64: null,
    items: []
};

let currentItemPhotoBase64 = null;
let impaQueryDebounce = null;

// Open / Launch Requisition Workspace
function openRequisitionWorkspace() {
    const workspace = document.getElementById('requisition-workspace');
    workspace.style.display = 'block';
    workspace.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Close / Hide Requisition Workspace
function closeRequisitionWorkspace() {
    const workspace = document.getElementById('requisition-workspace');
    workspace.style.display = 'none';
    document.getElementById('portal-launcher').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Form Step Navigation Wizard
function goToFormStep(stepNum) {
    document.querySelectorAll('.step-content-pane').forEach((pane, idx) => {
        pane.classList.toggle('active', (idx + 1) === stepNum);
    });
    document.querySelectorAll('.step-sharp-btn').forEach((pill, idx) => {
        pill.classList.toggle('active', (idx + 1) === stepNum);
        if (idx + 1 < stepNum) {
            pill.classList.add('done');
        } else {
            pill.classList.remove('done');
        }
    });
}

// Format date into standard Maritime uppercase (e.g. 18 AUG 2026)
function formatDateToMarine(dateStr) {
    if (!dateStr) return '';
    const d = new Date(dateStr);
    if (isNaN(d.getTime())) return dateStr;
    const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
    return `${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
}

// Set Today's Date
function setTodayDate(inputId) {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById(inputId).value = today;
    if (inputId === 'f_date') syncPaperField('date', today);
    if (inputId === 'f_sign_date') syncPaperField('sign_date', today);
}

// Sync Form Fields Live to Paper Sheet
function syncPaperField(field, val) {
    if (field === 'vessel_name') {
        requisitionState.vessel_name = val;
        document.getElementById('paper-vessel-name').innerText = val ? val.toUpperCase() : '\u00A0';
    } else if (field === 'req_no') {
        requisitionState.req_no = val;
        document.getElementById('paper-req-no').innerText = val ? val.toUpperCase() : '';
    } else if (field === 'date') {
        const formatted = formatDateToMarine(val);
        requisitionState.date = formatted;
        document.getElementById('paper-date').innerText = formatted || '\u00A0';
    } else if (field === 'ordering_item') {
        requisitionState.ordering_item = val;
        document.getElementById('paper-ordering-item').innerText = val ? val.toUpperCase() : '\u00A0';
    } else if (field === 'master_name') {
        requisitionState.master_name = val;
        document.getElementById('paper-master-name').innerText = val || '\u00A0';
    } else if (field === 'sign_date') {
        const formatted = formatDateToMarine(val);
        requisitionState.sign_date = formatted;
        document.getElementById('paper-sign-date').innerText = formatted || '\u00A0';
    }
}

// Auto Generate Requisition No
function generateSampleReqNo() {
    const vessel = document.getElementById('f_vessel_name').value.trim() || 'VESSEL';
    const cleanVessel = vessel.replace(/[^a-zA-Z0-9]/g, '').substr(0, 3).toUpperCase() || 'PD';
    const dept = requisitionState.from_dept ? requisitionState.from_dept.toUpperCase() : 'DECK';
    const year = new Date().getFullYear();
    const randNum = String(Math.floor(10 + Math.random() * 90)).padStart(3, '0');
    const autoNo = `${cleanVessel}-${dept}-${year}-${randNum}`;

    document.getElementById('f_req_no').value = autoNo;
    syncPaperField('req_no', autoNo);
}

// Handle Custom Logo Upload
function handleCustomLogoUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            requisitionState.custom_logo_base64 = e.target.result;
            document.getElementById('paper-custom-logo-img').src = e.target.result;
            document.getElementById('paper-custom-logo-text').innerText = 'AUTHORIZED VESSEL';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function resetCustomLogo() {
    requisitionState.custom_logo_base64 = null;
    document.getElementById('upload_custom_logo').value = '';
    document.getElementById('paper-custom-logo-img').src = 'assets/img/logo-abmalaya.webp';
    document.getElementById('paper-custom-logo-text').innerText = 'AB MALAYA MARINE';
}

// Toggle Equipment Criticality Status
function selectCriticality(status) {
    requisitionState.critical_status = status;
    document.getElementById('chip-crit').classList.toggle('selected', status === 'critical');
    document.getElementById('chip-noncrit').classList.toggle('selected', status === 'non-critical');

    document.getElementById('paper-check-critical').innerText = (status === 'critical') ? '[X]' : '[ ]';
    document.getElementById('paper-check-noncritical').innerText = (status === 'non-critical') ? '[X]' : '[ ]';
}

// Toggle Department (From)
function selectDepartment(dept) {
    requisitionState.from_dept = dept;
    document.getElementById('chip-dept-deck').classList.toggle('selected', dept === 'deck');
    document.getElementById('chip-dept-engine').classList.toggle('selected', dept === 'engine');

    document.getElementById('paper-from-deck').innerText = (dept === 'deck') ? '[X]' : '[ ]';
    document.getElementById('paper-from-engine').innerText = (dept === 'engine') ? '[X]' : '[ ]';
}

// Toggle Issue To
function toggleIssueTo(type) {
    requisitionState.issue_to[type] = !requisitionState.issue_to[type];
    
    document.getElementById('chip-iss-op').classList.toggle('selected', requisitionState.issue_to.op);
    document.getElementById('chip-iss-tech').classList.toggle('selected', requisitionState.issue_to.tech);
    document.getElementById('chip-iss-man').classList.toggle('selected', requisitionState.issue_to.man);

    document.getElementById('paper-issue-op').innerText = requisitionState.issue_to.op ? '[X]' : '[ ]';
    document.getElementById('paper-issue-tech').innerText = requisitionState.issue_to.tech ? '[X]' : '[ ]';
    document.getElementById('paper-issue-man').innerText = requisitionState.issue_to.man ? '[X]' : '[ ]';
}

// ── IMPA LIVE CATALOG SEARCH VIA DEDICATED MARIADB DATABASE ──────────────────
function handleLiveImpaSearch(q) {
    clearTimeout(impaQueryDebounce);
    const dropdown = document.getElementById('impa-live-dropdown');
    q = q.trim();

    if (q.length < 2) {
        dropdown.style.display = 'none';
        dropdown.innerHTML = '';
        return;
    }

    impaQueryDebounce = setTimeout(() => {
        fetch('/api_tender.php?action=search_impa&q=' + encodeURIComponent(q))
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success' && res.data && res.data.length > 0) {
                    let html = '';
                    res.data.slice(0, 10).forEach(item => {
                        html += `
                            <div class="impa-search-dropdown-item" onclick="selectImpaCatalogEntry('${item.impa_code}', '${escapeJs(item.product_name)}', '${escapeJs(item.specification || '')}', '${item.unit}')">
                                <div>
                                    <strong style="color: #093863;">${item.impa_code}</strong> — ${escapeHtml(item.product_name)}
                                    <div style="font-size: 0.72rem; color: #64748b;">${escapeHtml(item.category_name || '')}</div>
                                </div>
                                <span style="font-size: 0.75rem; font-weight: 700; background: #e0f2fe; color: #0369a1; padding: 2px 6px;">
                                    ${item.unit}
                                </span>
                            </div>
                        `;
                    });
                    dropdown.innerHTML = html;
                    dropdown.style.display = 'block';
                } else {
                    dropdown.style.display = 'none';
                }
            })
            .catch(() => {
                dropdown.style.display = 'none';
            });
    }, 200);
}

// Select an IMPA item from dropdown
function selectImpaCatalogEntry(code, name, spec, unit) {
    document.getElementById('item_input_name').value = name;
    document.getElementById('item_input_impa').value = code;
    if (spec) document.getElementById('item_input_spec').value = spec;

    if (unit) {
        const unitSelect = document.getElementById('item_input_unit');
        for (let i = 0; i < unitSelect.options.length; i++) {
            if (unitSelect.options[i].value.toUpperCase() === unit.toUpperCase()) {
                unitSelect.selectedIndex = i;
                break;
            }
        }
    }

    const dropdown = document.getElementById('impa-live-dropdown');
    dropdown.style.display = 'none';
    dropdown.innerHTML = '';
}

// Preview Item Photo Upload
function previewItemPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            currentItemPhotoBase64 = e.target.result;
            document.getElementById('item_photo_preview_img').src = currentItemPhotoBase64;
            document.getElementById('item_photo_preview_wrap').style.display = 'flex';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearItemPhoto() {
    currentItemPhotoBase64 = null;
    document.getElementById('item_input_photo').value = '';
    document.getElementById('item_photo_preview_wrap').style.display = 'none';
}

// Add Item into Requisition State & Render Paper Table
function addCurrentItemToRequisition() {
    const name = document.getElementById('item_input_name').value.trim();
    const impa = document.getElementById('item_input_impa').value.trim();
    const spec = document.getElementById('item_input_spec').value.trim();
    const purpose = document.getElementById('item_input_purpose').value.trim();
    const qty = parseFloat(document.getElementById('item_input_qty').value) || 1;
    const unit = document.getElementById('item_input_unit').value;

    if (!name) {
        alert('Please enter Item Description / Name.');
        return;
    }

    requisitionState.items.push({
        name: name,
        impa_code: impa || '-',
        specs: spec,
        purpose: purpose,
        qty: qty,
        unit: unit,
        photo_url: currentItemPhotoBase64
    });

    // Reset input fields
    document.getElementById('item_input_name').value = '';
    document.getElementById('item_input_impa').value = '';
    document.getElementById('item_input_spec').value = '';
    document.getElementById('item_input_purpose').value = '';
    document.getElementById('item_input_qty').value = 1;
    clearItemPhoto();
    document.getElementById('builder-item-no').innerText = requisitionState.items.length + 1;

    renderPaperItemsTable();
    renderFormItemsList();
}

// Remove item
function removeItemRecord(idx) {
    requisitionState.items.splice(idx, 1);
    document.getElementById('builder-item-no').innerText = requisitionState.items.length + 1;
    renderPaperItemsTable();
    renderFormItemsList();
}

function clearAllItems() {
    if (confirm('Clear all line items from this requisition?')) {
        requisitionState.items = [];
        document.getElementById('builder-item-no').innerText = 1;
        renderPaperItemsTable();
        renderFormItemsList();
    }
}

// Render Table Rows on Paper Sheet (Left Column)
function renderPaperItemsTable() {
    const tbody = document.getElementById('paper-items-tbody');

    if (requisitionState.items.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="3" class="sheet-empty-placeholder">
                    (Requisition Sheet Empty — Configure line items using the panel on the right)
                </td>
            </tr>
        `;
        return;
    }

    let html = '';
    requisitionState.items.forEach((it, idx) => {
        html += `
            <tr>
                <td style="text-align: center; font-weight: bold;">${idx + 1}</td>
                <td>
                    <div style="font-weight: bold; text-transform: uppercase;">${escapeHtml(it.name)}</div>
                    <div style="margin-top: 2px;">IMPA CODE: <strong>${escapeHtml(it.impa_code)}</strong></div>
                    ${it.specs ? `<div style="white-space: pre-wrap; margin-top: 4px; font-size: 0.74rem;">${escapeHtml(it.specs)}</div>` : ''}
                    ${it.purpose ? `<div style="margin-top: 4px; font-size: 0.74rem; font-weight: 600;">PURPOSE : ${escapeHtml(it.purpose)}</div>` : ''}
                    ${it.photo_url ? `<div style="margin-top: 6px;"><img src="${it.photo_url}" style="max-height: 60px; border: 1px solid #94a3b8;"></div>` : ''}
                </td>
                <td style="text-align: center; font-weight: bold; white-space: nowrap;">
                    ${it.qty} ${it.unit}
                </td>
            </tr>
        `;
    });
    tbody.innerHTML = html;
}

// Render Items List inside Form (Right Column)
function renderFormItemsList() {
    const container = document.getElementById('added-items-container');
    const counter = document.getElementById('added-items-count');
    counter.innerText = requisitionState.items.length;

    if (requisitionState.items.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; color: #94a3b8; font-size: 0.84rem; padding: 18px; border: 1px dashed #cbd5e1;">
                No items added yet. Search the IMPA catalog above or manually fill the form to append line items.
            </div>
        `;
        return;
    }

    let html = '';
    requisitionState.items.forEach((it, idx) => {
        html += `
            <div class="added-item-sharp-row">
                <div>
                    <strong style="color: #093863;">#${idx + 1} — ${escapeHtml(it.name)}</strong>
                    <div style="font-size: 0.76rem; color: #64748b; margin-top: 2px;">
                        IMPA: <strong>${escapeHtml(it.impa_code)}</strong> | Quantity: <strong>${it.qty} ${it.unit}</strong>
                    </div>
                    ${it.purpose ? `<div style="font-size: 0.74rem; color: #0369a1; margin-top: 2px;">Purpose: ${escapeHtml(it.purpose)}</div>` : ''}
                </div>
                <button type="button" class="btn-sharp-action-sm" style="color: #dc2626; padding: 4px 8px;" onclick="removeItemRecord(${idx})" title="Remove item">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
    });
    container.innerHTML = html;
}

// Handle Custom Stamp / Signature Upload
function handleStampFileUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            requisitionState.custom_stamp_base64 = e.target.result;
            requisitionState.has_sample_stamp = false;
            document.getElementById('chip-sample-stamp').classList.remove('selected');
            document.getElementById('paper-stamp-box').innerHTML = `<img src="${e.target.result}" style="max-height: 55px; max-width: 150px; object-fit: contain;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearUploadedStamp() {
    requisitionState.custom_stamp_base64 = null;
    document.getElementById('upload_stamp_file').value = '';
    document.getElementById('paper-stamp-box').innerHTML = '<span style="font-size: 0.7rem; color: #94a3b8; font-style: italic;">[ Unsigned / No Stamp ]</span>';
}

// Toggle Official Sample Stamp
function toggleSampleStamp() {
    requisitionState.has_sample_stamp = !requisitionState.has_sample_stamp;
    requisitionState.custom_stamp_base64 = null;
    document.getElementById('upload_stamp_file').value = '';
    
    const chip = document.getElementById('chip-sample-stamp');
    chip.classList.toggle('selected', requisitionState.has_sample_stamp);

    const stampBox = document.getElementById('paper-stamp-box');
    if (requisitionState.has_sample_stamp) {
        const vName = requisitionState.vessel_name || 'MT PERMATA DULANG';
        stampBox.innerHTML = `
            <div style="border: 2px solid #0284c7; padding: 4px 10px; color: #0284c7; font-family: monospace; text-align: center; font-size: 0.7rem; line-height: 1.25; transform: rotate(-2deg);">
                <strong>MASTER ${vName.toUpperCase()}</strong><br>
                PORT KELANG &nbsp; IMO 9307140<br>
                BHP 12,000KW &nbsp; GRT 56,172<br>
                <span style="font-size: 0.62rem; color: #0369a1;">[ OFFICIAL SHIP SEAL ]</span>
            </div>
        `;
    } else {
        stampBox.innerHTML = '<span style="font-size: 0.7rem; color: #94a3b8; font-style: italic;">[ Unsigned / No Stamp ]</span>';
    }
}

// Print Document
function printPaperDocument() {
    window.print();
}

// Download PDF Document using html2pdf with clean A4 margins
function downloadDirectPaperPdf() {
    const element = document.getElementById('paper-doc-sheet');
    const vName = requisitionState.vessel_name.replace(/[^a-zA-Z0-9]/g, '_') || 'Vessel';
    const rNo = requisitionState.req_no.replace(/[^a-zA-Z0-9]/g, '_') || 'Requisition';

    const opt = {
        margin:       [10, 12, 10, 12], // mm (top, right, bottom, left)
        filename:     `Requisition_${rNo}_${vName}.pdf`,
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2, useCORS: true, letterRendering: true, logging: false },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak:    { mode: ['avoid-all', 'css', 'legacy'] }
    };

    if (window.html2pdf) {
        html2pdf().set(opt).from(element).save();
    } else {
        window.print();
    }
}

// Load Full Sample Data matching PD-DECK-2026-099 LSA & FFA.pdf exactly
function loadSamplePermataDulangData() {
    document.getElementById('f_vessel_name').value = 'PERMATA DULANG';
    syncPaperField('vessel_name', 'PERMATA DULANG');

    document.getElementById('f_req_no').value = 'PD-DECK-2026-099';
    syncPaperField('req_no', 'PD-DECK-2026-099');

    selectCriticality('critical');
    selectDepartment('deck');

    requisitionState.issue_to = { op: true, tech: false, man: false };
    document.getElementById('chip-iss-op').classList.add('selected');
    document.getElementById('chip-iss-tech').classList.remove('selected');
    document.getElementById('chip-iss-man').classList.remove('selected');
    document.getElementById('paper-issue-op').innerText = '[X]';
    document.getElementById('paper-issue-tech').innerText = '[ ]';
    document.getElementById('paper-issue-man').innerText = '[ ]';

    document.getElementById('f_date').value = '2026-08-18';
    syncPaperField('date', '2026-08-18');

    document.getElementById('f_ordering_item').value = 'LSA & FFA';
    syncPaperField('ordering_item', 'LSA & FFA');

    document.getElementById('f_master_name').value = 'Capt Faiz Bin Kamarolzaman';
    syncPaperField('master_name', 'Capt Faiz Bin Kamarolzaman');

    document.getElementById('f_sign_date').value = '2026-08-18';
    syncPaperField('sign_date', '2026-08-18');

    document.getElementById('f_client_email').value = 'fleet@dutamarine.com';

    if (!requisitionState.has_sample_stamp) {
        toggleSampleStamp();
    }

    // Populate the 13 official items from PDF
    requisitionState.items = [
        { name: 'LIFEBOAT BUCKET', impa_code: '33 02 09', specs: '', purpose: '', qty: 2, unit: 'PCS' },
        { name: 'TORCH ELECTRIC WATERPROOF FOR LIFEBOAT', impa_code: '33 02 61', specs: '', purpose: '', qty: 2, unit: 'PCS' },
        { name: 'HATCHET FOR LIFEBOAT', impa_code: '33 02 03', specs: '', purpose: '', qty: 2, unit: 'PCS' },
        { name: 'THERMAL PROTECTIVE AIDS', impa_code: '33 01 77', specs: 'APPROVED BODY: U.K. DOT\nMATERIAL: POLYETHYLENE\nTHERMAL CONDUCTIVITY: NOT MORE THAN 7800 W/(M².K)', purpose: '', qty: 2, unit: 'PCS' },
        { name: 'LIFEJACKET LED FLASHING LIGHT', impa_code: '33 01 43', specs: 'BRAND: LALIZAS | MODEL: SAFELITE IV | PRODUCT CODE: 72353\nAUTOMATIC WATER ACTIVATION WITH MANUAL ON/OFF FUNCTION\nHIGH-INTENSITY FLASHING LED, MINIMUM 0.75 CANDELA\nOPERATING DURATION: MORE THAN 8 HOURS\nLITHIUM BATTERY WITH FIVE-YEAR SERVICE LIFE\nAPPROVALS: SOLAS, MED, USCG-MER, ATEX AND IECEX\nCOMPLETE WITH MOUNTING CLIP FOR ATTACHMENT TO LIFEJACKET\nSUPPLIER TO PROVIDE VALID TYPE-APPROVAL CERTIFICATES', purpose: '', qty: 30, unit: 'PCS' },
        { name: 'WHISTLE FOR LIFE JACKET', impa_code: '33 02 52', specs: '', purpose: '', qty: 30, unit: 'PCS' },
        { name: 'SEA ANCHOR FOR LIFEBOATS 6M-9M, FITTED WITH A TRIPPING LINE', impa_code: '33 02 16', specs: '', purpose: '', qty: 1, unit: 'PC' },
        { name: 'ANTI SLIP TAPES TYPE B (GENERAL PURPOSE)', impa_code: '33 11 82', specs: '', purpose: '', qty: 5, unit: 'ROLLS' },
        { name: 'DUST MASK DISPOSABLE', impa_code: '33 11 78', specs: 'STANDARD – EN149 FFP3', purpose: '', qty: 60, unit: 'PCS' },
        { name: 'SAFETY BELTS & HOOK', impa_code: '33 11 01', specs: '', purpose: 'WORKING AT HAWSER GUTTER', qty: 4, unit: 'PCS' },
        { name: 'LIFEBOAT REPAIR KITS', impa_code: '33 02 87', specs: '', purpose: '', qty: 2, unit: 'SET' },
        { name: 'EMERGENCY ANTI-SEASICKNESS TABLETS 6 PCS/PKT', impa_code: '33 02 47', specs: 'DIMENHYDRINATE TABS 50MG\nREMARKS : SOLAS AND IMO LIFEBOAT EQUIPMENT RULES REQUIRE ANTI-SEASICKNESS MEDICINE FOR AT LEAST 6 DOSES PER PERSON IN A LIFEBOAT', purpose: '', qty: 120, unit: 'PKT' },
        { name: 'LIFEBOAT POSITION LIGHT', impa_code: '33 01 45', specs: 'Complete Position-Indicating Strobe Light Assembly\nMaker: YUQIN | Model: BSW9812 | Electrical Rating: 12 V DC / 13 W\nApplication: Totally Enclosed Lifeboat, Type NM75F\nSupply: Complete sealed unit with internal lamp, lens, mounting base, sealing gasket, cable lead and plug connector\nRequirement: Direct plug-and-play replacement\nApproval: SOLAS/LSA and CCS-approved type with valid certificate\nRemarks: OEM or exact maker-approved replacement only', purpose: '', qty: 4, unit: 'PCS' }
    ];

    renderPaperItemsTable();
    renderFormItemsList();
    document.getElementById('builder-item-no').innerText = requisitionState.items.length + 1;
}

// Submit Requisition to ERP
function submitRequisitionToErp() {
    const alertBox = document.getElementById('form-alert-box');
    const submitBtn = document.getElementById('btn-submit-erp');
    const btnLabel = document.getElementById('btn-submit-erp-label');
    const clientEmail = document.getElementById('f_client_email').value.trim();
    const clientPhone = document.getElementById('f_client_phone').value.trim();

    if (!requisitionState.vessel_name) {
        alert('Please complete the Vessel Name in Step 1 first.');
        goToFormStep(1);
        return;
    }

    if (requisitionState.items.length === 0) {
        alert('Requisition requires at least 1 line item.');
        goToFormStep(2);
        return;
    }

    const payload = {
        vessel_name: requisitionState.vessel_name,
        requisition_no: requisitionState.req_no,
        critical_type: requisitionState.critical_status,
        department: requisitionState.from_dept === 'deck' ? 'Deck Department' : 'Engine Department',
        issue_to: Object.keys(requisitionState.issue_to).filter(k => requisitionState.issue_to[k]),
        ordering_item: requisitionState.ordering_item,
        date: requisitionState.date,
        master_name: requisitionState.master_name,
        company: requisitionState.vessel_name,
        email: clientEmail || 'fleet@dutamarine.com',
        phone: clientPhone || '-',
        items: requisitionState.items.map(it => ({
            impa_code: it.impa_code,
            product_name: it.name,
            specification: it.specs,
            purpose: it.purpose,
            quantity: it.qty,
            unit: it.unit
        }))
    };

    submitBtn.disabled = true;
    btnLabel.innerText = 'Transmitting to ERP...';
    alertBox.style.display = 'none';

    fetch('/api_tender.php?action=submit_rfq', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(res => {
        submitBtn.disabled = false;
        btnLabel.innerText = 'Transmit to AB Malaya ERP';

        if (res.status === 'success') {
            alertBox.style.display = 'block';
            alertBox.style.background = '#ecfdf5';
            alertBox.style.color = '#065f46';
            alertBox.style.border = '1px solid #a7f3d0';
            alertBox.innerHTML = `
                <div style="display: flex; gap: 10px; align-items: flex-start;">
                    <i class="fas fa-check-circle" style="font-size: 1.3rem; color: #059669; margin-top: 2px;"></i>
                    <div>
                        <strong>Requisition Successfully Transmitted! Reference: ${res.rfq_id}</strong>
                        <p style="margin: 3px 0 0 0; font-size: 0.84rem;">
                            Your maritime requisition has been registered in the AB Malaya ERP procurement pipeline. You may now download the official PDF copy.
                        </p>
                    </div>
                </div>
            `;
            alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } else {
            alertBox.style.display = 'block';
            alertBox.style.background = '#fef2f2';
            alertBox.style.color = '#991b1b';
            alertBox.style.border = '1px solid #fecaca';
            alertBox.innerHTML = 'Transmission Failed: ' + (res.message || 'Database error occurred.');
        }
    })
    .catch(() => {
        submitBtn.disabled = false;
        btnLabel.innerText = 'Transmit to AB Malaya ERP';
        alertBox.style.display = 'block';
        alertBox.style.background = '#fef2f2';
        alertBox.style.color = '#991b1b';
        alertBox.style.border = '1px solid #fecaca';
        alertBox.innerHTML = 'Network exception occurred during transmission to ERP server.';
    });
}

// Reset Entire Form
function resetEntireForm() {
    if (confirm('Are you sure you want to reset the form back to an empty blank document?')) {
        requisitionState.vessel_name = '';
        requisitionState.req_no = '';
        requisitionState.ordering_item = '';
        requisitionState.master_name = '';
        requisitionState.has_sample_stamp = false;
        requisitionState.custom_stamp_base64 = null;
        requisitionState.items = [];

        document.getElementById('f_vessel_name').value = '';
        document.getElementById('f_req_no').value = '';
        document.getElementById('f_ordering_item').value = '';
        document.getElementById('f_master_name').value = '';
        document.getElementById('chip-sample-stamp').classList.remove('selected');

        document.getElementById('paper-vessel-name').innerText = '\u00A0';
        document.getElementById('paper-req-no').innerText = '';
        document.getElementById('paper-ordering-item').innerText = '\u00A0';
        document.getElementById('paper-master-name').innerText = '\u00A0';
        document.getElementById('paper-stamp-box').innerHTML = '<span style="font-size: 0.7rem; color: #94a3b8; font-style: italic;">[ Unsigned / No Stamp ]</span>';

        resetCustomLogo();
        renderPaperItemsTable();
        renderFormItemsList();
        goToFormStep(1);
    }
}

// Close Dropdown when clicking outside
window.addEventListener('click', function(e) {
    if (!e.target.closest('.impa-inline-search-box')) {
        const dd = document.getElementById('impa-live-dropdown');
        if (dd) dd.style.display = 'none';
    }
});

// Auto-open Requisition when redirected with URL query params from view_impa.php
window.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const impaParam = urlParams.get('impa');
    const nameParam = urlParams.get('name');
    const unitParam = urlParams.get('unit');
    if (impaParam || nameParam) {
        openRequisitionWorkspace();
        goToFormStep(2);
        if (impaParam) document.getElementById('item_input_impa').value = impaParam;
        if (nameParam) document.getElementById('item_input_name').value = nameParam;
        if (unitParam) {
            const unitSelect = document.getElementById('item_input_unit');
            for (let i = 0; i < unitSelect.options.length; i++) {
                if (unitSelect.options[i].value.toUpperCase() === unitParam.toUpperCase()) {
                    unitSelect.selectedIndex = i;
                    break;
                }
            }
        }
    }
});

// Utility HTML Escapes
function escapeHtml(str) {
    if (!str) return '';
    return str.toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function escapeJs(str) {
    if (!str) return '';
    return str.toString().replace(/'/g, "\\'").replace(/"/g, '\\"');
}
</script>

<?php include 'includes/footer.php'; ?>
