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

    /* ── Side-by-Side (Kiri - Kanan) Requisition Desk Layout ────────────────── */
    .split-requisition-layout {
        display: grid;
        grid-template-columns: minmax(460px, 1fr) minmax(560px, 1.25fr);
        gap: 32px;
        align-items: start;
        width: 100%;
    }

    /* ── LEFT COLUMN: Multi-Step Requisition Form (Open & Natural Flow, No Scroll Isolation) ── */
    .form-viewport-column {
        width: 100%;
        background: #ffffff;
        border: 1px solid #cbd5e1;
        padding: 24px;
        box-sizing: border-box;
        position: relative;
        overflow: visible; /* Natural page scrolling without inner scroll isolation */
        box-shadow: none;
    }

    /* ── RIGHT COLUMN: Official Paper View & 3D Thermal Printer ─────────────── */
    .paper-viewport-column {
        width: 100%;
        position: relative;
        background: transparent;
        border: none;
        box-shadow: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    .paper-sheet-scroll {
        width: 100%;
        background: transparent;
        padding: 0 0 10px 0;
        border: none;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: visible; /* Natural page scrolling */
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
        width: 100%;
        box-sizing: border-box;
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

    /* ── The Official Requisition Document Sheet (Exact Maritime Format) ────── */
    .paper-doc-sheet {
        background: #ffffff;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        margin: 0 0 30px 0;
        padding: 38px 44px;
        border: 1.5px solid #000000;
        color: #000000;
        font-family: 'Times New Roman', Times, 'Nimbus Roman No9 L', serif;
        font-size: 11.5px;
        line-height: 1.35;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        position: relative;
        z-index: 10;
    }

    /* ═══════════════════════════════════════════════════════════════════════
       ULTRA-REALISTIC 3D INDUSTRIAL THERMAL REQUISITION PRINTER (QC-42M)
       ═══════════════════════════════════════════════════════════════════════ */
    .printer-dock {
        position: sticky;
        bottom: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 100;
        pointer-events: auto;
        margin-top: -24px; /* Paper visually flows into the recessed mouth */
    }

    .printer,
    .printer-3d-machine {
        pointer-events: auto;
        width: 100%;
        background: #111827;
        border-radius: 16px 16px 6px 6px;
        border: 1px solid #475569;
        border-bottom: 2px solid #020617;
        box-shadow: 
            0 -18px 40px rgba(0, 0, 0, 0.7),
            0 -2px 6px rgba(255, 255, 255, 0.15),
            inset 0 1px 1px rgba(255, 255, 255, 0.25);
        position: relative;
        transition: transform 0.06s ease-out;
        box-sizing: border-box;
        overflow: hidden;
    }

    @keyframes printer-shake {
        0% { transform: translateY(0); }
        25% { transform: translateY(-1px) translateX(0.6px); }
        50% { transform: translateY(0.7px) translateX(-0.6px); }
        75% { transform: translateY(-0.6px); }
        100% { transform: translateY(0); }
    }

    .printer.is-printing,
    .printer-3d-machine.is-printing {
        animation: printer-shake 0.08s infinite ease-in-out;
    }

    /* ── 3D Upper Hood & Paper Feed Throat ── */
    .printer-hood-3d {
        background: linear-gradient(180deg, #374151 0%, #1f2937 25%, #111827 75%, #0b0f17 100%);
        border-radius: 15px 15px 0 0;
        padding: 10px 16px 8px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-bottom: 2px solid #030712;
        box-shadow: 
            inset 0 2px 2px rgba(255, 255, 255, 0.2),
            inset 0 -4px 8px rgba(0, 0, 0, 0.6);
        position: relative;
    }

    /* Side Screws & Corner Fasteners */
    .printer-screw-bolt {
        width: 11px;
        height: 11px;
        border-radius: 50%;
        background: linear-gradient(135deg, #cbd5e1 0%, #64748b 50%, #334155 100%);
        border: 1px solid #1e293b;
        box-shadow: 0 1px 2px rgba(0,0,0,0.8), inset 0 1px 1px rgba(255,255,255,0.6);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .printer-screw-bolt i {
        display: block;
        width: 7px;
        height: 1.5px;
        background: #0f172a;
        transform: rotate(35deg);
    }

    /* Left Side: Rocker Power Switch */
    .printer-side-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .power-rocker-switch {
        display: flex;
        align-items: center;
        gap: 5px;
        background: #0b0f17;
        padding: 3px 6px;
        border-radius: 4px;
        border: 1px solid #334155;
        box-shadow: inset 0 2px 4px #000;
    }

    .power-rocker-switch .rocker-label {
        font-family: 'Space Mono', monospace;
        font-size: 8.5px;
        font-weight: 700;
        color: #64748b;
        letter-spacing: 0.5px;
    }

    .power-rocker-switch .rocker-toggle {
        width: 22px;
        height: 14px;
        background: linear-gradient(180deg, #ef4444 0%, #991b1b 100%);
        border-radius: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 8.5px;
        font-weight: 900;
        color: #ffffff;
        box-shadow: 0 1px 2px rgba(0,0,0,0.8), inset 0 1px 1px rgba(255,255,255,0.4);
    }

    /* Center: 3D Paper Mouth Cavity & Serrated Stainless Cutter Blade */
    .printer-mouth-assembly {
        flex: 1;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .printer-slot-recess,
    .printer-slot {
        display: block;
        width: 100%;
        height: 18px;
        background: #020617;
        border-radius: 3px;
        box-shadow: 
            inset 0 6px 12px #000000,
            inset 0 2px 4px #000000,
            0 1px 0 rgba(255, 255, 255, 0.15);
        position: relative;
        overflow: hidden;
    }

    /* Stainless-steel serrated teeth tear blade */
    .stainless-cutter-blade {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(180deg, #f8fafc 0%, #cbd5e1 35%, #64748b 70%, #334155 100%);
        box-shadow: 0 1px 3px rgba(0,0,0,0.9), inset 0 1px 0 #ffffff;
        z-index: 2;
    }

    .serrated-teeth-svg {
        display: block;
        width: 100%;
        height: 5px;
        position: absolute;
        bottom: -5px;
        left: 0;
        pointer-events: none;
    }

    .printer-slot-recess::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 8px;
        background: linear-gradient(180deg, rgba(0,0,0,0.8) 0%, transparent 100%);
        pointer-events: none;
    }

    /* Right Side: Tactile FEED Button & Latch */
    .printer-action-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-feed-3d {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: radial-gradient(circle at 35% 35%, #475569 0%, #1e293b 60%, #0f172a 100%);
        border: 2px solid #334155;
        box-shadow: 
            0 4px 8px rgba(0,0,0,0.7),
            inset 0 1px 2px rgba(255,255,255,0.35),
            inset 0 -2px 4px rgba(0,0,0,0.9);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        padding: 0;
        color: #f1f5f9;
        transition: all 0.08s ease;
    }

    .btn-feed-3d:hover {
        border-color: #38bdf8;
        box-shadow: 0 4px 10px rgba(56, 189, 248, 0.4), inset 0 1px 2px rgba(255,255,255,0.5);
    }

    .btn-feed-3d:active {
        transform: scale(0.92);
        box-shadow: 0 1px 3px rgba(0,0,0,0.9), inset 0 2px 4px rgba(0,0,0,0.95);
    }

    .btn-feed-3d .feed-icon {
        font-size: 8px;
        line-height: 1;
        color: #38bdf8;
    }

    .btn-feed-3d .feed-text {
        font-family: 'Space Mono', monospace;
        font-size: 7.5px;
        font-weight: 800;
        letter-spacing: 0.5px;
        line-height: 1;
        margin-top: 1px;
    }

    .cover-open-latch {
        background: #1e293b;
        border: 1px solid #475569;
        border-radius: 3px;
        padding: 4px 6px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.6), inset 0 1px 1px rgba(255,255,255,0.15);
        cursor: default;
    }

    .cover-open-latch span {
        font-family: 'Space Mono', monospace;
        font-size: 7.5px;
        font-weight: 800;
        color: #94a3b8;
        letter-spacing: 0.5px;
        line-height: 1;
    }

    .cover-open-latch .latch-ridges {
        display: flex;
        gap: 2px;
    }

    .cover-open-latch .latch-ridges i {
        display: block;
        width: 3px;
        height: 6px;
        background: #0f172a;
        border-radius: 1px;
    }

    /* ── 3D Front Face Control Console ── */
    .printer-face,
    .printer-face-3d {
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 55%, #020617 100%);
        padding: 10px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        box-sizing: border-box;
        border-bottom: 1px solid #030712;
    }

    /* OLED / Dot-Matrix Telemetry Glass Console */
    .printer-display-bezel {
        background: #020617;
        border: 2px solid #1e3a5f;
        border-radius: 5px;
        padding: 3px;
        box-shadow: 
            inset 0 3px 8px rgba(0,0,0,0.9),
            0 1px 0 rgba(255,255,255,0.12);
        max-width: 250px;
        flex-shrink: 0;
    }

    .display-screen-glass {
        background: #011424;
        border-radius: 3px;
        padding: 5px 9px;
        position: relative;
        overflow: hidden;
    }

    .display-screen-glass::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: repeating-linear-gradient(0deg, rgba(0,0,0,0.3) 0px, rgba(0,0,0,0.3) 1px, transparent 1px, transparent 2px);
        pointer-events: none;
        z-index: 1;
    }

    .display-telemetry {
        position: relative;
        z-index: 2;
    }

    .telemetry-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 6px;
        margin-bottom: 2px;
    }

    .telemetry-badge {
        font-family: 'Space Mono', monospace;
        font-size: 8px;
        font-weight: 800;
        color: #10b981;
        letter-spacing: 0.5px;
    }

    .telemetry-sub {
        font-family: 'Space Mono', monospace;
        font-size: 8px;
        color: #64748b;
        letter-spacing: 0.5px;
    }

    .telemetry-main,
    #printer-status {
        font-family: 'Space Mono', monospace;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 0.8px;
        color: #38bdf8;
        text-shadow: 0 0 8px rgba(56, 189, 248, 0.7);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Center: Louvers & Metallic Brand Plate */
    .printer-center-console {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        flex: 1;
    }

    .model-badge-plate {
        background: linear-gradient(135deg, #334155 0%, #1e293b 50%, #475569 100%);
        border: 1px solid #64748b;
        border-radius: 3px;
        padding: 2px 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.6), inset 0 1px 0 rgba(255,255,255,0.25);
    }

    .model-badge-plate .brand-text {
        font-family: 'Aeonik', sans-serif;
        font-size: 9.5px;
        font-weight: 800;
        color: #f1f5f9;
        letter-spacing: 1px;
    }

    .model-badge-plate .model-number {
        font-family: 'Space Mono', monospace;
        font-size: 9px;
        font-weight: 700;
        color: #38bdf8;
        letter-spacing: 0.5px;
    }

    .printer-louvers-3d,
    .printer-vents {
        display: flex;
        gap: 4px;
        align-items: center;
    }

    .printer-louvers-3d i,
    .printer-vents i {
        display: block;
        width: 3px;
        height: 14px;
        background: #020617;
        border-radius: 1.5px;
        box-shadow: inset 0 1px 2px #000, 1px 0 0 rgba(255, 255, 255, 0.08);
    }

    .printer-caption-spec {
        font-family: 'Space Mono', monospace;
        font-size: 7.5px;
        color: #64748b;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Right: Triple 3D Lens LED Cluster */
    .printer-led-cluster {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #0b0f17;
        padding: 5px 9px;
        border-radius: 4px;
        border: 1px solid #1e293b;
        box-shadow: inset 0 2px 4px #000;
        flex-shrink: 0;
    }

    .led-unit {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;
    }

    .led-lens,
    .status-light {
        width: 8.5px;
        height: 8.5px;
        border-radius: 50%;
        display: inline-block;
        border: 1px solid rgba(0,0,0,0.8);
        position: relative;
    }

    .led-lens::after {
        content: '';
        position: absolute;
        top: 1px;
        left: 2px;
        width: 3px;
        height: 3px;
        border-radius: 50%;
        background: rgba(255,255,255,0.7);
    }

    .led-lens.led-power,
    .status-light {
        background: #10b981;
        box-shadow: 0 0 8px #10b981, inset 0 1px 2px rgba(255,255,255,0.4);
    }

    .led-lens.led-print {
        background: #334155;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.8);
    }

    .printer.is-printing .led-lens.led-print,
    .printer-3d-machine.is-printing .led-lens.led-print {
        animation: pulse-light 0.12s infinite alternate;
    }

    .led-lens.led-paper.ready {
        background: #10b981;
        box-shadow: 0 0 6px #10b981;
    }

    @keyframes pulse-light {
        0% { background: #38bdf8; box-shadow: 0 0 10px #38bdf8; }
        100% { background: #0284c7; box-shadow: 0 0 2px #0284c7; }
    }

    .led-tag {
        font-family: 'Space Mono', monospace;
        font-size: 7.5px;
        font-weight: 700;
        color: #64748b;
        letter-spacing: 0.5px;
    }

    /* ── Heavy Industrial Base Trim & Warning Stripe ── */
    .printer-base-trim {
        background: #090d16;
        width: 100%;
        box-sizing: border-box;
    }

    .warning-stripe-accent {
        height: 3px;
        width: 100%;
        background: repeating-linear-gradient(45deg, #eab308, #eab308 8px, #18181b 8px, #18181b 16px);
        opacity: 0.85;
    }

    .base-counter-strip {
        padding: 6px 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #020617;
        border-top: 1px solid #1e293b;
    }

    .base-counter-strip .print-count {
        font-family: 'Space Mono', monospace;
        font-size: 10.5px;
        font-weight: 700;
        color: #94a3b8;
        letter-spacing: 0.8px;
    }

    .base-counter-strip .print-count strong,
    .base-counter-strip .print-count #printed-count {
        color: #38bdf8;
        font-size: 12px;
    }

    .printer-sub-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-printer-rewind {
        background: #1e293b;
        color: #f8fafc;
        border: 1px solid #475569;
        padding: 4px 10px;
        border-radius: 3px;
        font-family: 'Aeonik', sans-serif;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.4px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.15s;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-printer-rewind:hover {
        background: #093863;
        color: #ffffff;
        border-color: #38bdf8;
    }

    .btn-printer-demo {
        background: rgba(255,255,255,0.06);
        color: #94a3b8;
        border: 1px solid #334155;
        font-size: 10px;
        padding: 4px 8px;
        border-radius: 3px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.15s;
    }

    .btn-printer-demo:hover {
        color: #f8fafc;
        border-color: #64748b;
    }

    @media print {
        .printer-dock,
        .printer-base-trim,
        .printer-hood-3d,
        .printer-face-3d {
            display: none !important;
        }
    }

    /* Signature Pad Styling */
    .sig-mode-tab-btn {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        padding: 4px 10px;
        font-size: 0.74rem;
        font-weight: 700;
        cursor: pointer;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        transition: all 0.15s;
    }
    .sig-mode-tab-btn.active {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
    }
    .sig-canvas-container {
        position: relative;
        background: #ffffff;
        border: 1.5px dashed #093863;
        width: 100%;
        max-width: 360px;
        box-sizing: border-box;
    }
    .sig-canvas-container canvas {
        display: block;
        width: 100%;
        height: 110px;
        touch-action: none;
        cursor: crosshair;
    }
    .sig-baseline-guide {
        position: absolute;
        bottom: 22px;
        left: 15px;
        right: 15px;
        border-bottom: 1px dotted #94a3b8;
        pointer-events: none;
        font-size: 0.68rem;
        color: #94a3b8;
    }

    /* Header Table */
    .sheet-header-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
        margin-bottom: 8px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-header-table td {
        border: 1px solid #000000;
        vertical-align: middle;
    }

    .cell-h-title {
        padding: 6px 10px;
        font-weight: bold;
        font-size: 13px;
        letter-spacing: -0.2px;
        font-family: 'Times New Roman', Times, serif;
    }

    .cell-h-attachment {
        width: 28%;
        padding: 4px 8px;
        font-size: 9.5px;
        line-height: 1.3;
        font-family: 'Times New Roman', Times, serif;
    }

    .cell-h-reqform {
        text-align: center;
        font-size: 16.5px;
        font-weight: bold;
        letter-spacing: 0.5px;
        font-family: 'Times New Roman', Times, serif;
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
        font-size: 11px;
        margin-bottom: 6px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-checkbox-char {
        font-family: monospace;
        font-size: 11px;
        font-weight: bold;
    }

    /* Metadata Table */
    .sheet-meta-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
        margin-bottom: 8px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-meta-table td {
        border: 1px solid #000000;
        padding: 4px 6px;
        font-size: 10.5px;
    }

    .sheet-val {
        font-weight: bold;
        color: #000000;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Items Table */
    .sheet-items-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
        margin-bottom: 8px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-items-table th {
        border: 1px solid #000000;
        padding: 5px 6px;
        font-size: 10.5px;
        font-weight: bold;
        background: #ffffff;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-items-table td {
        border: 1px solid #000000;
        padding: 5px 6px;
        vertical-align: top;
        font-size: 10.5px;
        line-height: 1.35;
        page-break-inside: avoid;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-empty-placeholder {
        text-align: center;
        color: #94a3b8;
        font-style: italic;
        padding: 36px 10px !important;
        font-size: 10.5px;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Sign-off Box */
    .sheet-sign-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
        margin-bottom: 8px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-sign-table td {
        border: 1px solid #000000;
        padding: 6px 8px;
        font-size: 11px;
        height: 96px;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    .stamp-container-box {
        min-height: 72px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 2px;
        gap: 4px;
    }

    .stamp-container-box img {
        max-width: 130px;
        object-fit: contain;
    }

    /* Note footer */
    .sheet-notes-footer {
        font-size: 9.5px;
        line-height: 1.4;
        color: #000000;
        margin-bottom: 6px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sheet-page-footer {
        display: flex;
        justify-content: space-between;
        font-size: 9.5px;
        border-top: 1px solid #000000;
        padding-top: 3px;
        font-family: 'Times New Roman', Times, serif;
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

    /* ═══════════════════════════════════════════════════════════════════════
       MOBILE RESPONSIVE SYSTEM FOR SMARTPHONES (MAX-WIDTH: 1100px & 768px)
       ═══════════════════════════════════════════════════════════════════════ */
    .photos-grid-sharp,
    .endorsement-grid-sharp {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-bottom: 14px;
    }

    @media (max-width: 1100px) {
        .split-requisition-layout {
            grid-template-columns: minmax(0, 1fr) !important;
            gap: 20px !important;
            width: 100% !important;
            max-width: 100% !important;
        }
        .paper-viewport-column {
            position: static !important;
            max-height: none !important;
            order: 2 !important;
            margin-top: 20px !important;
            width: 100% !important;
            max-width: 100% !important;
        }
        .form-viewport-column {
            width: 100% !important;
            max-width: 100% !important;
        }
    }

    @media (max-width: 768px) {
        /* Global Mobile Overflow Guard */
        html, body {
            max-width: 100vw !important;
            overflow-x: hidden !important;
        }

        /* Container & Padding - Fits Phone Viewport Exactly */
        .tender-portal-container {
            padding: 0 10px !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
        }
        .tender-portal-section {
            padding: 16px 0 40px 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
        }

        /* Hero Launcher */
        .portal-hero-launcher {
            padding: 20px 14px !important;
            margin-bottom: 14px !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
        }
        .launcher-badge-sharp {
            font-size: 0.7rem !important;
            padding: 4px 8px !important;
            margin-bottom: 10px !important;
        }
        .launcher-title-sharp {
            font-size: 1.45rem !important;
            line-height: 1.2 !important;
            margin-bottom: 10px !important;
            letter-spacing: -0.3px !important;
            word-break: break-word !important;
        }
        .launcher-desc-sharp {
            font-size: 0.84rem !important;
            line-height: 1.5 !important;
            margin-bottom: 16px !important;
        }
        .launcher-actions-sharp {
            width: 100% !important;
        }
        .launcher-actions-sharp .btn-sharp-primary {
            width: 100% !important;
            justify-content: center !important;
            padding: 12px 14px !important;
            font-size: 0.8rem !important;
            box-sizing: border-box !important;
        }
        .launcher-statutory-strip {
            gap: 4px !important;
            margin-top: 14px !important;
            width: 100% !important;
            flex-wrap: wrap !important;
        }
        .stat-tag-sharp {
            font-size: 0.65rem !important;
            padding: 4px 6px !important;
            white-space: normal !important;
            word-break: break-word !important;
            line-height: 1.25 !important;
        }

        /* Requisition Workspace Shell */
        #requisition-workspace {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
        }

        /* Top Action Bar in Workspace */
        .workspace-top-bar {
            flex-direction: column !important;
            align-items: stretch !important;
            gap: 10px !important;
            padding: 10px 12px !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
        }
        .workspace-top-bar .top-bar-title {
            font-size: 0.8rem !important;
            word-break: break-word !important;
            line-height: 1.3 !important;
        }
        .workspace-top-actions {
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 6px !important;
        }
        .workspace-top-actions button {
            width: 100% !important;
            justify-content: center !important;
            font-size: 0.72rem !important;
            padding: 8px 10px !important;
            box-sizing: border-box !important;
        }

        /* Grid Layout */
        .split-requisition-layout {
            grid-template-columns: minmax(0, 1fr) !important;
            width: 100% !important;
            max-width: 100% !important;
            gap: 16px !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
        }

        /* ── FORM VIEWPORT: 100% FIT MOBILE SCREEN (NO LEAK / OVERFLOW) ─── */
        .form-viewport-column {
            width: 100% !important;
            max-width: 100% !important;
            padding: 14px 10px !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
            border-left: 1px solid #cbd5e1 !important;
            border-right: 1px solid #cbd5e1 !important;
        }
        .step-content-pane {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
        }
        .pane-title-sharp {
            font-size: 1.05rem !important;
            word-break: break-word !important;
            line-height: 1.25 !important;
        }
        .pane-desc-sharp {
            font-size: 0.78rem !important;
            margin-bottom: 12px !important;
            line-height: 1.4 !important;
        }

        /* Horizontal Scrollable Step Pills */
        .form-steps-nav {
            overflow-x: auto !important;
            flex-wrap: nowrap !important;
            -webkit-overflow-scrolling: touch !important;
            padding-bottom: 6px !important;
            gap: 4px !important;
            margin-bottom: 14px !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
        }
        .step-sharp-btn {
            flex: 0 0 auto !important;
            white-space: nowrap !important;
            padding: 6px 10px !important;
        }
        .step-sharp-number {
            font-size: 0.74rem !important;
        }
        .step-sharp-label {
            font-size: 0.7rem !important;
        }

        /* Multi-column Grids become 1 column on mobile */
        .form-grid-sharp-2,
        .endorsement-grid-sharp,
        .photos-grid-sharp {
            grid-template-columns: 1fr !important;
            gap: 10px !important;
            margin-bottom: 10px !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }

        .form-group-sharp {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            margin-bottom: 10px !important;
        }
        .form-label-sharp {
            font-size: 0.72rem !important;
            margin-bottom: 3px !important;
        }
        .form-input-sharp,
        .form-select-sharp,
        .form-textarea-sharp {
            padding: 8px 10px !important;
            font-size: 0.82rem !important;
            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;
            box-sizing: border-box !important;
        }

        /* Option Chips Stack Cleanly */
        .sharp-options-row {
            display: flex !important;
            flex-direction: column !important;
            gap: 5px !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .sharp-choice-btn {
            width: 100% !important;
            box-sizing: border-box !important;
            font-size: 0.74rem !important;
            padding: 7px 10px !important;
            white-space: normal !important;
            word-break: break-word !important;
        }

        /* File Upload Inputs on Mobile */
        input[type="file"].form-input-sharp {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            font-size: 0.74rem !important;
        }

        /* Step 2: IMPA Builder */
        .sharp-builder-box {
            padding: 10px 8px !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .impa-inline-search-box {
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .impa-inline-search-input {
            width: 100% !important;
            box-sizing: border-box !important;
            font-size: 0.82rem !important;
        }

        /* Step 3: Signature pad */
        .sig-canvas-container {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow: hidden !important;
        }
        .sig-canvas-container canvas {
            width: 100% !important;
            max-width: 100% !important;
            height: 90px !important;
            box-sizing: border-box !important;
        }
        .sig-baseline-guide {
            font-size: 8px !important;
            overflow: hidden !important;
            white-space: nowrap !important;
            text-overflow: clip !important;
            width: 100% !important;
        }

        /* Document Output Action Strip in Step 3 */
        .form-viewport-column div[style*="background: #093863"] {
            padding: 14px 10px !important;
            box-sizing: border-box !important;
            width: 100% !important;
        }
        .form-viewport-column div[style*="background: #093863"] .btn-sharp-primary {
            width: 100% !important;
            justify-content: center !important;
            box-sizing: border-box !important;
            font-size: 0.78rem !important;
            padding: 10px 12px !important;
        }

        /* Bottom Step Nav Controls */
        .form-nav-controls-sharp {
            flex-direction: column !important;
            gap: 8px !important;
            margin-top: 14px !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .form-nav-controls-sharp button {
            width: 100% !important;
            justify-content: center !important;
            padding: 10px 12px !important;
            box-sizing: border-box !important;
            font-size: 0.78rem !important;
        }

        /* ── PAPER VIEWPORT: 100% FIT MOBILE SCREEN (EXACT A4 PROPORTIONS) ── */
        .paper-viewport-column {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        .paper-top-toolbar {
            padding: 8px 10px !important;
            flex-wrap: wrap !important;
            gap: 6px !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .paper-status-tag {
            font-size: 0.72rem !important;
        }
        .paper-quick-actions {
            width: 100% !important;
            display: flex !important;
            justify-content: space-between !important;
            gap: 6px !important;
        }
        .paper-quick-actions button {
            flex: 1 !important;
            justify-content: center !important;
            font-size: 0.7rem !important;
            padding: 6px 8px !important;
        }

        .paper-sheet-scroll {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow-x: hidden !important;
            padding: 0 0 10px 0 !important;
        }

        /* The Paper Sheet Fits Mobile Screen 100% Without Side-Leak */
        .paper-doc-sheet {
            min-width: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            padding: 10px 8px !important;
            margin: 0 0 14px 0 !important;
            font-size: 7.5px !important;
            line-height: 1.25 !important;
            overflow-x: hidden !important;
            border: 1px solid #000000 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
        }

        /* All Tables Inside Paper Fit 100% Width */
        .sheet-header-table,
        .sheet-meta-table,
        .sheet-items-table,
        .sheet-sign-table {
            width: 100% !important;
            max-width: 100% !important;
            table-layout: fixed !important;
            word-wrap: break-word !important;
            word-break: break-word !important;
            box-sizing: border-box !important;
            margin-bottom: 5px !important;
            border-width: 1px !important;
        }

        /* Header Table on Mobile */
        .cell-h-title {
            font-size: 7.5px !important;
            padding: 3px 4px !important;
            line-height: 1.2 !important;
            letter-spacing: -0.2px !important;
        }
        .cell-h-attachment {
            width: 32% !important;
            font-size: 6px !important;
            line-height: 1.15 !important;
            padding: 2px 3px !important;
        }
        .cell-h-reqform {
            font-size: 9px !important;
            padding: 2px 3px !important;
            letter-spacing: 0 !important;
        }
        .cell-h-logo {
            width: 24% !important;
            padding: 2px !important;
        }
        .cell-h-logo img {
            max-height: 24px !important;
            max-width: 58px !important;
        }

        /* Criticality Strip */
        .sheet-critical-strip {
            font-size: 7px !important;
            margin-bottom: 3px !important;
            line-height: 1.2 !important;
        }
        .sheet-checkbox-char {
            font-size: 7.5px !important;
        }

        /* Meta Table on Mobile */
        .sheet-meta-table td {
            font-size: 7px !important;
            padding: 2px 3px !important;
            line-height: 1.2 !important;
        }
        .sheet-val {
            font-size: 7px !important;
        }

        /* Line Items Table on Mobile */
        .sheet-items-table th {
            font-size: 7px !important;
            padding: 3px 2px !important;
            line-height: 1.2 !important;
        }
        .sheet-items-table td {
            font-size: 7px !important;
            padding: 3px 2px !important;
            line-height: 1.25 !important;
        }
        .sheet-items-table .item-photos-row img {
            max-height: 42px !important;
            max-width: 100% !important;
            object-fit: contain !important;
        }

        /* Sign-off Table on Mobile */
        .sheet-sign-table td {
            font-size: 7px !important;
            padding: 3px 4px !important;
            height: auto !important;
            min-height: 45px !important;
            line-height: 1.2 !important;
        }
        .stamp-container-box {
            min-height: 40px !important;
        }
        .sheet-sign-table img {
            max-height: 38px !important;
            max-width: 100% !important;
            object-fit: contain !important;
        }

        /* Hide swipe guide since paper now fits cleanly */
        .mobile-swipe-guide {
            display: none !important;
        }

        /* 3D Thermal Printer Dock on Mobile */
        .printer-dock {
            position: static !important;
            margin-top: 10px !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
        }
        .printer,
        .printer-3d-machine {
            border-radius: 12px !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            overflow: hidden !important;
        }
        .printer-hood-3d {
            padding: 8px 10px !important;
            gap: 6px !important;
            box-sizing: border-box !important;
        }
        .printer-screw-bolt {
            width: 7px !important;
            height: 7px !important;
        }
        .power-rocker-switch {
            padding: 2px 4px !important;
        }
        .power-rocker-switch .rocker-label {
            font-size: 7px !important;
        }
        .printer-mouth-assembly {
            min-width: 0 !important;
        }
        .printer-face-3d {
            padding: 8px 10px !important;
            flex-direction: column !important;
            gap: 8px !important;
            box-sizing: border-box !important;
        }
        .printer-display-bezel {
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .printer-center-console {
            display: none !important;
        }
        .printer-base-trim {
            padding: 8px 10px !important;
            flex-direction: column !important;
            gap: 8px !important;
            box-sizing: border-box !important;
        }
        .printer-sub-actions {
            width: 100% !important;
            justify-content: space-between !important;
            box-sizing: border-box !important;
        }
        #printer-main-cta {
            width: 100% !important;
            justify-content: center !important;
            padding: 10px 14px !important;
            font-size: 0.8rem !important;
            box-sizing: border-box !important;
        }
    }

    @media (min-width: 769px) {
        .mobile-swipe-guide {
            display: none !important;
        }
        .mobile-only-btn {
            display: none !important;
        }
    }
</style>

<section class="tender-portal-section">
    <div class="tender-portal-container">
        
        <!-- ── HERO CALLOUT LAUNCHER (Initial View with Button to reveal form) ─ -->
        <div class="portal-hero-launcher" id="portal-launcher">
            <span class="launcher-badge-sharp">
                <i class="fas fa-briefcase"></i> Tender & Project Enquiries
            </span>
            <h2 class="launcher-title-sharp">
                Partner With AB Malaya
            </h2>
            <p class="launcher-desc-sharp">
                AB Malaya welcomes opportunities to collaborate with project owners, developers, contractors, consultants and organisations seeking reliable construction, engineering, marine, logistics and industrial solutions.
            </p>

            <div class="launcher-actions-sharp">
                <button type="button" class="btn-sharp-primary" onclick="openRequisitionWorkspace()">
                    <i class="fas fa-file-signature"></i> Submit Your Requirement / Create Requisition
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
            <div class="workspace-top-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px; background: #ffffff; padding: 12px 18px; border: 1px solid #cbd5e1;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="top-bar-title" style="font-family: 'Aeonik', sans-serif; font-size: 1.05rem; font-weight: 800; color: #093863; text-transform: uppercase; letter-spacing: 0.3px;">
                        <i class="fas fa-file-contract"></i> Maritime Requisition Workspace (Live Synchronized)
                    </span>
                </div>
                <div class="workspace-top-actions" style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
                    <button type="button" onclick="document.getElementById('paper-doc-sheet').scrollIntoView({behavior: 'smooth'})" class="btn-sharp-action-sm">
                        <i class="fas fa-file-invoice"></i> Scroll to Live Paper ↓
                    </button>
                    <button type="button" onclick="closeRequisitionWorkspace()" class="btn-sharp-action-sm">
                        <i class="fas fa-chevron-up"></i> Hide Workspace
                    </button>
                </div>
            </div>

            <!-- Split Grid -->
            <div class="split-requisition-layout">
                
                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- LEFT COLUMN: LIVE AUTHENTIC A4 PAPER VIEW (HSEMS 10.1D)     -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- 1. FULL-WIDTH MULTI-STEP REQUISITION FORM -->
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
                                <p class="pane-desc-sharp">Complete vessel details and requisition headers. All inputs sync live to the document on the right.</p>
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

                            <!-- Photo Attachments for this Item (Supports up to 2 Full-Width High-Res Photos) -->
                            <div class="form-group-sharp">
                                <label class="form-label-sharp"><i class="fas fa-camera"></i> Item Photos (Max 2 Photos — Rendered Full-Width in Table without Distortion)</label>
                                <div class="photos-grid-sharp">
                                    <!-- Photo 1 -->
                                    <div style="background: #f8fafc; border: 1px solid #cbd5e1; padding: 10px;">
                                        <span style="font-size: 0.72rem; font-weight: 700; color: #093863; display: block; margin-bottom: 4px;">Photo 1 (Primary / Overview):</span>
                                        <input type="file" id="item_input_photo_1" accept="image/*" class="form-input-sharp" style="padding: 5px;" onchange="previewItemPhoto(this, 1)">
                                        <div id="item_photo_1_preview_wrap" style="display: none; align-items: center; gap: 8px; margin-top: 6px;">
                                            <img id="item_photo_1_preview_img" src="" style="max-height: 55px; max-width: 90px; object-fit: contain; border: 1px solid #94a3b8;">
                                            <button type="button" onclick="clearItemPhoto(1)" class="btn-sharp-action-sm" style="color: #dc2626; padding: 2px 6px; font-size: 0.7rem;">Remove</button>
                                        </div>
                                    </div>
                                    <!-- Photo 2 -->
                                    <div style="background: #f8fafc; border: 1px solid #cbd5e1; padding: 10px;">
                                        <span style="font-size: 0.72rem; font-weight: 700; color: #093863; display: block; margin-bottom: 4px;">Photo 2 (Detail / Nameplate):</span>
                                        <input type="file" id="item_input_photo_2" accept="image/*" class="form-input-sharp" style="padding: 5px;" onchange="previewItemPhoto(this, 2)">
                                        <div id="item_photo_2_preview_wrap" style="display: none; align-items: center; gap: 8px; margin-top: 6px;">
                                            <img id="item_photo_2_preview_img" src="" style="max-height: 55px; max-width: 90px; object-fit: contain; border: 1px solid #94a3b8;">
                                            <button type="button" onclick="clearItemPhoto(2)" class="btn-sharp-action-sm" style="color: #dc2626; padding: 2px 6px; font-size: 0.7rem;">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <span style="font-size: 0.7rem; color: #64748b; margin-top: 4px; display: block;">If 1 photo uploaded: displays full-width. If 2 photos uploaded: splits full-width into 2 equal halves. Proportions always preserved.</span>
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
                            <p class="pane-desc-sharp">Complete officer endorsement with manual draw signature or file upload, attach ship's seal, configure routing and reply destination, and download official PDF or transmit to ERP.</p>
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

                        <!-- ── DUAL ENDORSEMENT: OFFICER SIGNATURE & SHIP STAMP SEAL (CO-EXIST) ── -->
                        <div class="endorsement-grid-sharp">
                            
                            <!-- Box 1: Officer Signature (Draw or Upload) -->
                            <div class="form-group-sharp" style="background: #f8fafc; padding: 14px; border: 1px solid #cbd5e1;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                    <label class="form-label-sharp" style="margin-bottom: 0;"><i class="fas fa-signature"></i> Officer Signature</label>
                                    <div style="display: flex; gap: 4px;">
                                        <button type="button" id="tab-btn-draw" class="sig-mode-tab-btn active" onclick="switchSignatureMode('draw')">Draw Pad</button>
                                        <button type="button" id="tab-btn-upload" class="sig-mode-tab-btn" onclick="switchSignatureMode('upload')">Upload</button>
                                    </div>
                                </div>

                                <!-- Mode A: Draw Canvas -->
                                <div id="sig-pane-draw">
                                    <div class="sig-canvas-container">
                                        <canvas id="signature-pad-canvas" width="340" height="110"></canvas>
                                        <div class="sig-baseline-guide">X ________________________________________</div>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 6px;">
                                        <span style="font-size: 0.7rem; color: #64748b;"><i class="fas fa-pen-nib"></i> Sign with mouse or touch</span>
                                        <div style="display: flex; gap: 6px;">
                                            <button type="button" onclick="clearSignaturePad()" class="btn-sharp-action-sm" style="color: #dc2626;"><i class="fas fa-eraser"></i> Clear</button>
                                            <button type="button" onclick="applySignaturePad()" class="btn-sharp-action-sm" style="background: #093863; color: #ffffff;"><i class="fas fa-check"></i> Apply</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mode B: Upload Image -->
                                <div id="sig-pane-upload" style="display: none;">
                                    <span style="font-size: 0.74rem; color: #64748b; display: block; margin-bottom: 6px;">Upload transparent signature image (PNG/JPG):</span>
                                    <div style="display: flex; gap: 6px; align-items: center;">
                                        <input type="file" id="upload_sig_file" accept="image/*" class="form-input-sharp" style="padding: 5px;" onchange="handleSignatureFileUpload(this)">
                                        <button type="button" onclick="clearUploadedSignature()" class="btn-sharp-action-sm" style="color: #dc2626;">Clear</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Box 2: Vessel Official Stamp / Seal -->
                            <div class="form-group-sharp" style="background: #f8fafc; padding: 14px; border: 1px solid #cbd5e1;">
                                <label class="form-label-sharp"><i class="fas fa-stamp"></i> Ship Official Seal / Stamp</label>
                                
                                <div>
                                    <span style="font-size: 0.74rem; color: #475569; font-weight: 700; display: block; margin-bottom: 6px; text-transform: uppercase;">
                                        <i class="fas fa-upload"></i> Upload Official Vessel Stamp / Seal (PNG / JPG):
                                    </span>
                                    <div style="display: flex; gap: 6px; align-items: center;">
                                        <input type="file" id="upload_stamp_file" accept="image/*" class="form-input-sharp" style="padding: 5px;" onchange="handleStampFileUpload(this)">
                                        <button type="button" onclick="clearUploadedStamp()" class="btn-sharp-action-sm" style="color: #dc2626;">Clear</button>
                                    </div>
                                    <span style="font-size: 0.71rem; color: #64748b; margin-top: 4px; display: block;">Upload authentic vessel stamp image. Leave empty if vessel stamp is not available.</span>
                                </div>
                            </div>
                        </div>

                        <!-- ── EMAIL ROUTING & QUOTATION DISPATCH CONFIGURATION ── -->
                        <div style="background: #ffffff; border: 1px solid #cbd5e1; padding: 16px; margin-bottom: 18px;">
                            <div style="font-family: 'Aeonik', sans-serif; font-size: 0.88rem; font-weight: 800; color: #093863; text-transform: uppercase; margin-bottom: 10px;">
                                <i class="fas fa-envelope-open-text"></i> Email Routing & Quotation Dispatch Configuration
                            </div>

                            <div class="form-grid-sharp-2">
                                <div class="form-group-sharp">
                                    <label class="form-label-sharp">Requisition Routing Email (Send-To / Filing) <span class="req">*</span></label>
                                    <input type="email" id="f_routing_email" class="form-input-sharp" placeholder="e.g. fleet@abmalaya.com or superintendent@vessel.com" oninput="syncPaperField('routing_email', this.value)">
                                    <span style="font-size: 0.71rem; color: #64748b; margin-top: 3px; display: block;">Updates "Note 1: Send to [email] and file copy onboard" dynamically on the document.</span>
                                </div>

                                <div class="form-group-sharp">
                                    <label class="form-label-sharp">Client Reply-To Email (For Official Quotation Reply) <span class="req">*</span></label>
                                    <input type="email" id="f_client_email" class="form-input-sharp" placeholder="e.g. superintendent@vessel.com or captain@vessel.com">
                                    <span style="font-size: 0.71rem; color: #0369a1; margin-top: 3px; display: block;"><strong>Mandatory:</strong> Direct destination for formal quotation feedback & tenders.</span>
                                </div>
                            </div>

                            <div class="form-group-sharp" style="margin-top: 10px; margin-bottom: 0;">
                                <label class="form-label-sharp">Telephone / Mobile Line</label>
                                <input type="tel" id="f_client_phone" class="form-input-sharp" placeholder="e.g. +60 12-345 6789">
                            </div>

                            <div style="font-size: 0.74rem; color: #475569; background: #f0fdf4; border: 1px solid #bbf7d0; padding: 8px 12px; margin-top: 12px; line-height: 1.4;">
                                <i class="fas fa-shield-halved" style="color: #16a34a; margin-right: 5px;"></i>
                                <strong>Enterprise SMTP/IMAP Delivery Protocol:</strong> Dossiers are sent via verified AB Malaya mail servers to prevent SPF/DMARC rejection. Your Reply-To address is set so that commercial responses route directly to your fleet office.
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

                <!-- 2. FULL-WIDTH AUTHENTIC A4 PAPER VIEW (HSEMS 10.1D) -->
<div class="paper-viewport-column">
                    
                    <!-- Paper Toolbar -->
                    <div class="paper-top-toolbar">
                        <div class="paper-status-tag">
                            <span class="live-dot"></span> Official Paper Preview (A4 Sheet)
                        </div>
                        <div class="paper-quick-actions" style="display: flex; gap: 6px; align-items: center;">
                            <button type="button" class="btn-sharp-action-sm mobile-only-btn" onclick="document.querySelector('.form-viewport-column').scrollIntoView({behavior: 'smooth'})">
                                <i class="fas fa-arrow-up"></i> Edit Form
                            </button>
                            <button type="button" class="btn-sharp-action-sm" style="background: #093863; color: #ffffff;" onclick="downloadDirectPaperPdf()">
                                <i class="fas fa-download"></i> Download PDF
                            </button>
                        </div>
                    </div>

                    <!-- The Authentic Document Sheet (Matches PDF exactly) -->
                    <div id="paper-sheet-scroll" class="paper-sheet-scroll">
                        <div class="mobile-swipe-guide">
                            <i class="fas fa-arrows-left-right"></i> Touch & geser lembar A4 ke samping untuk melihat seluruh kolom
                        </div>
                        <div id="paper-doc-sheet" class="paper-doc-sheet">
                            
                            <!-- Header Table -->
                            <table class="sheet-header-table">
                                <tr>
                                    <td colspan="2" class="cell-h-title">
                                        Health, Safety and Environmental Management System
                                    </td>
                                    <td rowspan="2" class="cell-h-logo">
                                        <img id="paper-custom-logo-img" src="assets/img/logo-abmalaya.webp" alt="Ship Logo">
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
                                    <td style="width: 14%; white-space: nowrap;">Vessel</td>
                                    <td style="width: 44%;"><span id="paper-vessel-name" class="sheet-val">&nbsp;</span></td>
                                    <td style="width: 42%; white-space: nowrap;">Requisition No: <span id="paper-req-no" class="sheet-val"></span></td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">From</td>
                                    <td colspan="2">
                                        <div style="display: flex; gap: 24px; align-items: center; flex-wrap: wrap;">
                                            <span style="white-space: nowrap;"><span id="paper-from-deck" class="sheet-checkbox-char">[ ]</span> Deck Department</span>
                                            <span style="white-space: nowrap;"><span id="paper-from-engine" class="sheet-checkbox-char">[ ]</span> Engine Department</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Issue to</td>
                                    <td colspan="2">
                                        <div style="display: flex; gap: 18px; align-items: center; flex-wrap: wrap;">
                                            <span style="white-space: nowrap;"><span id="paper-issue-op" class="sheet-checkbox-char">[ ]</span> Operation Department</span>
                                            <span style="white-space: nowrap;"><span id="paper-issue-tech" class="sheet-checkbox-char">[ ]</span> Technical Department</span>
                                            <span style="white-space: nowrap;"><span id="paper-issue-man" class="sheet-checkbox-char">[ ]</span> Manning Department</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Date</td>
                                    <td colspan="2"><span id="paper-date" class="sheet-val">&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap; width: 22%;">Name of ordering item:</td>
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
                                            (Requisition Sheet Empty — Configure line items using the form on the left)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Sign-off & Stamp Box (Matches Exact Format from PD-DECK-2026-099) -->
                            <table class="sheet-sign-table">
                                <tr>
                                    <td style="width: 40%; vertical-align: middle;">
                                        <div style="font-size: 11px;"><b>Master name:</b> <span id="paper-master-name" class="sheet-val">&nbsp;</span></div>
                                    </td>
                                    <td style="width: 39%; vertical-align: top;">
                                        <div style="font-weight: bold; font-size: 11px; margin-bottom: 2px;">Signature / Stamp:</div>
                                        <div class="stamp-container-box" id="paper-stamp-box">
                                            <span style="font-size: 9.5px; color: #94a3b8; font-style: italic;">[ Unsigned / No Stamp ]</span>
                                        </div>
                                    </td>
                                    <td style="width: 21%; vertical-align: middle;">
                                        <div style="font-size: 11px;"><b>Date:</b> <span id="paper-sign-date" class="sheet-val">&nbsp;</span></div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Notes Footnote (Dynamic based on user input, empty by default) -->
                            <div class="sheet-notes-footer">
                                Note: 1. Send to <span id="paper-note-routing" style="font-weight: bold; text-decoration: underline;">________________________</span> and file copy onboard<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. * Format for report no: Vessel Code/RF/Year/ Running no of that year, (example Vessel Code/DK/2026/001).
                            </div>

                            <!-- Page and Section Footer -->
                            <div class="sheet-page-footer">
                                <span>Page 1 of 1</span>
                                <span>Section 10</span>
                            </div>

                        </div>
                    </div><!-- /#paper-sheet-scroll -->

                    <!-- ═══ ULTRA-REALISTIC 3D INDUSTRIAL THERMAL REQUISITION PRINTER (QC-42M) ═══ -->
                    <div id="printer-dock" class="printer-dock">
                        <div class="printer printer-3d-machine" role="img" aria-label="3D Thermal Maritime Requisition Printer">
                            
                            <!-- 3D Printer Upper Hood & Serrated Stainless Cutter Throat -->
                            <div class="printer-hood-3d">
                                <!-- Left: Corner Allen Bolt & Power Rocker Switch -->
                                <div class="printer-side-controls">
                                    <div class="printer-screw-bolt" title="Mounting Bolt"><i></i></div>
                                    <div class="power-rocker-switch" title="Main Power AC 220V">
                                        <span class="rocker-label">PWR</span>
                                        <div class="rocker-toggle"><span>I</span></div>
                                    </div>
                                </div>

                                <!-- Center: Recessed Mouth Slot & Stainless Steel Serrated Cutter Blade -->
                                <div class="printer-mouth-assembly">
                                    <div class="printer-slot-recess printer-slot" title="Thermal Print Head & Feed Throat">
                                        <!-- Stainless Steel Serrated Cutter Blade -->
                                        <div class="stainless-cutter-blade">
                                            <svg class="serrated-teeth-svg" viewBox="0 0 1000 10" preserveAspectRatio="none">
                                                <defs>
                                                    <pattern id="teethPattern" width="10" height="10" patternUnits="userSpaceOnUse">
                                                        <polygon points="0,0 5,8 10,0" fill="#94a3b8" stroke="#334155" stroke-width="0.8"/>
                                                    </pattern>
                                                </defs>
                                                <rect width="100%" height="10" fill="url(#teethPattern)"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right: 3D Concave FEED Button & Cover Release Latch -->
                                <div class="printer-action-controls">
                                    <button type="button" class="btn-feed-3d" id="btn-manual-feed" title="FEED: Press to advance paper">
                                        <span class="feed-icon">▲</span>
                                        <span class="feed-text">FEED</span>
                                    </button>
                                    <div class="cover-open-latch" title="Lid Release Latch">
                                        <span>PUSH</span>
                                        <div class="latch-ridges"><i></i><i></i><i></i></div>
                                    </div>
                                    <div class="printer-screw-bolt" title="Mounting Bolt"><i></i></div>
                                </div>
                            </div>

                            <!-- 3D Front Face Control Console -->
                            <div class="printer-face-3d printer-face">
                                <!-- Left: Recessed OLED Telemetry Screen -->
                                <div class="printer-display-bezel">
                                    <div class="display-screen-glass">
                                        <div class="telemetry-row">
                                            <span class="telemetry-badge">● ONLINE</span>
                                            <span class="telemetry-sub">260mm/s • 203DPI</span>
                                        </div>
                                        <div id="printer-status" class="telemetry-main">READY TO PRINT</div>
                                    </div>
                                </div>

                                <!-- Center: Model Plate & Molded Cooling Louvers -->
                                <div class="printer-center-console">
                                    <div class="model-badge-plate">
                                        <span class="brand-text">AB MALAYA</span>
                                        <span class="model-number">QC-42M</span>
                                    </div>
                                    <div class="printer-louvers-3d printer-vents" aria-hidden="true">
                                        <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <span class="printer-caption-spec">DIRECT THERMAL REQUISITION ENGINE</span>
                                </div>

                                <!-- Right: Triple Status 3D Lens LEDs -->
                                <div class="printer-led-cluster">
                                    <div class="led-unit" title="Power Ready">
                                        <span class="led-lens led-power status-light"></span>
                                        <span class="led-tag">PWR</span>
                                    </div>
                                    <div class="led-unit" title="Print Data Activity">
                                        <span class="led-lens led-print" id="led-print-indicator"></span>
                                        <span class="led-tag">DATA</span>
                                    </div>
                                    <div class="led-unit" title="Paper Present">
                                        <span class="led-lens led-paper ready"></span>
                                        <span class="led-tag">PAPER</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Base Trim & Safety Hazard Accent with Counter -->
                            <div class="printer-base-trim">
                                <div class="warning-stripe-accent"></div>
                                <div class="base-counter-strip">
                                    <span class="print-count">
                                        PRINTED: <strong id="printed-count">00</strong> / <span id="total-print-count">00</span> ITEMS
                                    </span>
                                    <div class="printer-sub-actions">
                                        <button type="button" class="btn-printer-rewind" id="print-again" onclick="rewindPrinterPaper()" title="Scroll paper back to top">
                                            <i class="fas fa-undo"></i> REWIND ↗
                                        </button>
                                        <a href="receipt_printer.php" target="_blank" class="btn-printer-demo" title="Open standalone Café Receipt demo">
                                            <i class="fas fa-receipt"></i> DEMO
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- /#printer-dock -->

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
    routing_email: '',
    signature_base64: null,
    custom_stamp_base64: null,
    custom_logo_base64: null,
    items: []
};

let currentItemPhoto1Base64 = null;
let currentItemPhoto2Base64 = null;
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
    } else if (field === 'routing_email') {
        requisitionState.routing_email = val.trim();
        const noteEl = document.getElementById('paper-note-routing');
        if (noteEl) noteEl.innerText = val.trim() ? val.trim() : '________________________';
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

// Handle Custom Logo Upload (Clean display, no text below logo)
function handleCustomLogoUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            requisitionState.custom_logo_base64 = e.target.result;
            document.getElementById('paper-custom-logo-img').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function resetCustomLogo() {
    requisitionState.custom_logo_base64 = null;
    document.getElementById('upload_custom_logo').value = '';
    document.getElementById('paper-custom-logo-img').src = 'assets/img/logo-abmalaya.webp';
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

// Preview Item Photo Upload (Supports Slot 1 & Slot 2)
function previewItemPhoto(input, slot = 1) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            if (slot === 1) {
                currentItemPhoto1Base64 = e.target.result;
                const img = document.getElementById('item_photo_1_preview_img');
                if (img) img.src = currentItemPhoto1Base64;
                const wrap = document.getElementById('item_photo_1_preview_wrap');
                if (wrap) wrap.style.display = 'flex';
            } else {
                currentItemPhoto2Base64 = e.target.result;
                const img = document.getElementById('item_photo_2_preview_img');
                if (img) img.src = currentItemPhoto2Base64;
                const wrap = document.getElementById('item_photo_2_preview_wrap');
                if (wrap) wrap.style.display = 'flex';
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearItemPhoto(slot = null) {
    if (!slot || slot === 1) {
        currentItemPhoto1Base64 = null;
        const input = document.getElementById('item_input_photo_1');
        if (input) input.value = '';
        const wrap = document.getElementById('item_photo_1_preview_wrap');
        if (wrap) wrap.style.display = 'none';
    }
    if (!slot || slot === 2) {
        currentItemPhoto2Base64 = null;
        const input = document.getElementById('item_input_photo_2');
        if (input) input.value = '';
        const wrap = document.getElementById('item_photo_2_preview_wrap');
        if (wrap) wrap.style.display = 'none';
    }
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
        photo_url: currentItemPhoto1Base64,
        photo_url_2: currentItemPhoto2Base64
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

// Render Table Rows on Paper Sheet (Left Column - Authentic A4 with Full-Width Proportional Photos)
function renderPaperItemsTable() {
    const tbody = document.getElementById('paper-items-tbody');

    if (requisitionState.items.length === 0) {
        let blankRows = '';
        for (let i = 1; i <= 5; i++) {
            blankRows += `
                <tr>
                    <td style="text-align: center; font-weight: bold; color: #000000; height: 34px;">${i}</td>
                    <td style="color: #94a3b8; font-style: italic; vertical-align: middle;"></td>
                    <td style="text-align: center;"></td>
                </tr>
            `;
        }
        tbody.innerHTML = blankRows;
        if (typeof updatePrinterFeed === 'function') updatePrinterFeed();
        return;
    }

    let html = '';
    requisitionState.items.forEach((it, idx) => {
        const p1 = it.photo_url || it.photo_1;
        const p2 = it.photo_url_2 || it.photo_2;

        let photoBlockHtml = '';
        if (p1 && p2) {
            // 2 photos: divide full-width into 2 equal halves, large and proportional (tidak penyot)
            photoBlockHtml = `
                <div style="margin-top: 8px; width: 100%; display: grid; grid-template-columns: 1fr 1fr; gap: 8px; box-sizing: border-box;">
                    <div style="border: 1px solid #000000; background: #ffffff; padding: 2px; text-align: center;">
                        <img src="${p1}" style="width: 100%; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                    </div>
                    <div style="border: 1px solid #000000; background: #ffffff; padding: 2px; text-align: center;">
                        <img src="${p2}" style="width: 100%; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                    </div>
                </div>
            `;
        } else if (p1 || p2) {
            // 1 photo: fills full-width in photo 1 position, large, proportional (tidak penyot)
            const singleP = p1 || p2;
            photoBlockHtml = `
                <div style="margin-top: 8px; width: 100%; border: 1px solid #000000; background: #ffffff; padding: 2px; text-align: center; box-sizing: border-box;">
                    <img src="${singleP}" style="width: 100%; max-height: 240px; object-fit: contain; display: block; margin: 0 auto;">
                </div>
            `;
        }

        html += `
            <tr>
                <td style="text-align: center; font-weight: bold;">${idx + 1}</td>
                <td>
                    <div style="font-weight: bold; text-transform: uppercase;">${escapeHtml(it.name)}</div>
                    <div style="margin-top: 2px;">IMPA CODE: <strong>${escapeHtml(it.impa_code)}</strong></div>
                    ${it.specs ? `<div style="white-space: pre-wrap; margin-top: 4px; font-size: 0.74rem;">${escapeHtml(it.specs)}</div>` : ''}
                    ${it.purpose ? `<div style="margin-top: 4px; font-size: 0.74rem; font-weight: 600;">PURPOSE : ${escapeHtml(it.purpose)}</div>` : ''}
                    ${photoBlockHtml}
                </td>
                <td style="text-align: center; font-weight: bold; white-space: nowrap;">
                    ${it.qty} ${it.unit}
                </td>
            </tr>
        `;
    });
    tbody.innerHTML = html;
    if (typeof updatePrinterFeed === 'function') updatePrinterFeed();
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

// ── SIGNATURE & STAMP DUAL CONTROLLER (CO-EXIST / SALING SIMPAN) ─────────────
let sigCanvas = null;
let sigCtx = null;
let isSigDrawing = false;
let sigHasStrokes = false;

function initSignaturePad() {
    sigCanvas = document.getElementById('signature-pad-canvas');
    if (!sigCanvas) return;
    sigCtx = sigCanvas.getContext('2d');
    sigCtx.lineWidth = 2.2;
    sigCtx.lineCap = 'round';
    sigCtx.lineJoin = 'round';
    sigCtx.strokeStyle = '#093863';

    function getCoords(e) {
        const rect = sigCanvas.getBoundingClientRect();
        const clientX = e.touches ? e.touches[0].clientX : e.clientX;
        const clientY = e.touches ? e.touches[0].clientY : e.clientY;
        const scaleX = sigCanvas.width / rect.width;
        const scaleY = sigCanvas.height / rect.height;
        return {
            x: (clientX - rect.left) * scaleX,
            y: (clientY - rect.top) * scaleY
        };
    }

    function startDraw(e) {
        isSigDrawing = true;
        sigHasStrokes = true;
        const pos = getCoords(e);
        sigCtx.beginPath();
        sigCtx.moveTo(pos.x, pos.y);
        e.preventDefault();
    }

    function moveDraw(e) {
        if (!isSigDrawing) return;
        const pos = getCoords(e);
        sigCtx.lineTo(pos.x, pos.y);
        sigCtx.stroke();
        e.preventDefault();
    }

    function endDraw(e) {
        if (isSigDrawing) {
            isSigDrawing = false;
            applySignaturePad();
        }
    }

    sigCanvas.addEventListener('mousedown', startDraw);
    sigCanvas.addEventListener('mousemove', moveDraw);
    window.addEventListener('mouseup', endDraw);

    sigCanvas.addEventListener('touchstart', startDraw, { passive: false });
    sigCanvas.addEventListener('touchmove', moveDraw, { passive: false });
    sigCanvas.addEventListener('touchend', endDraw, { passive: false });
}

function switchSignatureMode(mode) {
    const paneDraw = document.getElementById('sig-pane-draw');
    const paneUpload = document.getElementById('sig-pane-upload');
    const tabDraw = document.getElementById('tab-btn-draw');
    const tabUpload = document.getElementById('tab-btn-upload');

    if (mode === 'draw') {
        paneDraw.style.display = 'block';
        paneUpload.style.display = 'none';
        tabDraw.classList.add('active');
        tabUpload.classList.remove('active');
    } else {
        paneDraw.style.display = 'none';
        paneUpload.style.display = 'block';
        tabDraw.classList.remove('active');
        tabUpload.classList.add('active');
    }
}

function clearSignaturePad() {
    if (sigCanvas && sigCtx) {
        sigCtx.clearRect(0, 0, sigCanvas.width, sigCanvas.height);
    }
    sigHasStrokes = false;
    requisitionState.signature_base64 = null;
    renderPaperSignatureAndStamp();
}

function applySignaturePad() {
    if (!sigHasStrokes || !sigCanvas) return;
    requisitionState.signature_base64 = sigCanvas.toDataURL('image/png');
    renderPaperSignatureAndStamp();
}

function handleSignatureFileUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            requisitionState.signature_base64 = e.target.result;
            if (sigCanvas && sigCtx) {
                sigCtx.clearRect(0, 0, sigCanvas.width, sigCanvas.height);
                sigHasStrokes = false;
            }
            renderPaperSignatureAndStamp();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearUploadedSignature() {
    requisitionState.signature_base64 = null;
    const f = document.getElementById('upload_sig_file');
    if (f) f.value = '';
    if (sigCanvas && sigCtx) {
        sigCtx.clearRect(0, 0, sigCanvas.width, sigCanvas.height);
        sigHasStrokes = false;
    }
    renderPaperSignatureAndStamp();
}

// Handle Custom Stamp Upload
function handleStampFileUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            requisitionState.custom_stamp_base64 = e.target.result;
            renderPaperSignatureAndStamp();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearUploadedStamp() {
    requisitionState.custom_stamp_base64 = null;
    const f = document.getElementById('upload_stamp_file');
    if (f) f.value = '';
    renderPaperSignatureAndStamp();
}

// Render Both Signature & Custom Stamp (Co-existing / Saling Simpan)
function renderPaperSignatureAndStamp() {
    const stampBox = document.getElementById('paper-stamp-box');
    if (!stampBox) return;

    const hasSig = !!requisitionState.signature_base64;
    const hasCustomStamp = !!requisitionState.custom_stamp_base64;

    if (!hasSig && !hasCustomStamp) {
        stampBox.innerHTML = '<span style="font-size: 9.5px; color: #94a3b8; font-style: italic;">[ Unsigned / No Stamp ]</span>';
        return;
    }

    let stampHtml = '';
    if (hasCustomStamp) {
        stampHtml = `<img src="${requisitionState.custom_stamp_base64}" style="max-height: 48px; max-width: 125px; object-fit: contain;">`;
    }

    let sigHtml = '';
    if (hasSig) {
        sigHtml = `<img src="${requisitionState.signature_base64}" style="max-height: 36px; max-width: 120px; object-fit: contain;">`;
    }

    if (hasSig && hasCustomStamp) {
        // Explicit user rule: "stampnya harusnya di bawah ttd" (stamp is BELOW signature)
        stampBox.innerHTML = `
            <div style="display: flex; flex-direction: column; gap: 4px; align-items: center; justify-content: center;">
                <div>${sigHtml}</div>
                <div>${stampHtml}</div>
            </div>
        `;
    } else if (hasSig) {
        stampBox.innerHTML = sigHtml;
    } else {
        stampBox.innerHTML = stampHtml;
    }
}

// Print Document
function printPaperDocument() {
    window.print();
}

// Download Vector PDF Document via Server-Side ReportLab Engine
async function downloadDirectPaperPdf() {
    // Proactive confidentiality check: ensure no dutamarine traces in requisition state
    if (requisitionState.routing_email && requisitionState.routing_email.toLowerCase().includes('dutamarine')) {
        requisitionState.routing_email = '';
        const fR = document.getElementById('f_routing_email');
        if (fR) fR.value = '';
        syncPaperField('routing_email', '');
    }
    if (requisitionState.client_email && requisitionState.client_email.toLowerCase().includes('dutamarine')) {
        requisitionState.client_email = '';
        const fC = document.getElementById('f_client_email');
        if (fC) fC.value = '';
    }

    const downloadBtns = document.querySelectorAll('[onclick="downloadDirectPaperPdf()"]');
    downloadBtns.forEach(btn => {
        btn.disabled = true;
        btn.dataset.origHtml = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
    });

    const vName = requisitionState.vessel_name ? requisitionState.vessel_name.replace(/[^a-zA-Z0-9_\-]/g, '_') : 'VESSEL';
    const rNo = requisitionState.req_no ? requisitionState.req_no.replace(/[^a-zA-Z0-9_\-]/g, '_') : 'FORM';
    const fileName = `Requisition_${rNo}_${vName}.pdf`;

    try {
        const response = await fetch('/download_rfq_pdf.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(requisitionState)
        });

        if (!response.ok) {
            throw new Error(`Server returned status ${response.status}`);
        }

        const blob = await response.blob();
        const blobUrl = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = blobUrl;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        setTimeout(() => window.URL.revokeObjectURL(blobUrl), 2000);
    } catch (err) {
        console.error('Vector PDF generation error, falling back:', err);
        if (window.html2pdf) {
            const element = document.getElementById('paper-doc-sheet');
            html2pdf().set({
                margin: [10, 12, 10, 12],
                filename: fileName,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, useCORS: true },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            }).from(element).save();
        } else {
            window.print();
        }
    } finally {
        downloadBtns.forEach(btn => {
            btn.disabled = false;
            btn.innerHTML = btn.dataset.origHtml || '<i class="fas fa-download"></i> Download PDF';
        });
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

    document.getElementById('f_routing_email').value = '';
    syncPaperField('routing_email', '');

    document.getElementById('f_client_email').value = '';
    document.getElementById('f_client_phone').value = '';

    renderPaperSignatureAndStamp();

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
    const routingEmail = document.getElementById('f_routing_email').value.trim();

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

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!routingEmail) {
        alert('Mandatory Field Required: Please specify the recipient email address (Send To / Routing Email) in Step 3 before transmitting.');
        goToFormStep(3);
        document.getElementById('f_routing_email').focus();
        return;
    }

    if (!emailRegex.test(routingEmail)) {
        alert('Invalid Email Format: Please enter a valid recipient email address in Send To.');
        goToFormStep(3);
        document.getElementById('f_routing_email').focus();
        return;
    }

    if (!clientEmail) {
        alert('Mandatory Field Required: Please provide your Client Reply-To Email so official quotation tenders and correspondence can be routed back directly.');
        goToFormStep(3);
        document.getElementById('f_client_email').focus();
        return;
    }

    if (!emailRegex.test(clientEmail)) {
        alert('Invalid Email Format: Please enter a valid email address in Client Reply-To Email.');
        goToFormStep(3);
        document.getElementById('f_client_email').focus();
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
        routing_email: routingEmail,
        email: clientEmail,
        phone: clientPhone || '-',
        signature_base64: requisitionState.signature_base64,
        custom_stamp_base64: requisitionState.custom_stamp_base64,
        items: requisitionState.items.map(it => ({
            impa_code: it.impa_code,
            product_name: it.name,
            specification: it.specs,
            purpose: it.purpose,
            quantity: it.qty,
            unit: it.unit,
            photo_url: it.photo_url || null,
            photo_url_2: it.photo_url_2 || null
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
            const mailNotice = res.mail_status ? `
                <div style="margin-top: 8px; padding: 6px 10px; background: rgba(5,150,105,0.08); border-left: 3px solid #059669; font-size: 0.78rem;">
                    <i class="fas fa-paper-plane" style="color: #059669;"></i> <strong>Delivery Protocol:</strong> ${escapeHtml(res.mail_status.message || 'Dispatched')}
                    <div style="color: #475569; margin-top: 2px;">
                        Target Recipient: <b>${escapeHtml(res.mail_status.to || routingEmail)}</b> | Reply-To: <b>${escapeHtml(res.mail_status.reply_to || clientEmail)}</b>
                    </div>
                </div>
            ` : '';

            alertBox.innerHTML = `
                <div style="display: flex; gap: 10px; align-items: flex-start;">
                    <i class="fas fa-check-circle" style="font-size: 1.3rem; color: #059669; margin-top: 2px;"></i>
                    <div>
                        <strong>Requisition Successfully Transmitted! Reference: ${escapeHtml(res.rfq_id)}</strong>
                        <p style="margin: 3px 0 0 0; font-size: 0.84rem;">
                            Your maritime requisition has been registered in the procurement pipeline.
                        </p>
                        ${mailNotice}
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
        requisitionState.critical_status = '';
        requisitionState.from_dept = '';
        requisitionState.issue_to = { op: false, tech: false, man: false };
        requisitionState.date = '';
        requisitionState.ordering_item = '';
        requisitionState.master_name = '';
        requisitionState.sign_date = '';
        requisitionState.routing_email = '';
        requisitionState.signature_base64 = null;
        requisitionState.custom_stamp_base64 = null;
        requisitionState.items = [];

        document.getElementById('f_vessel_name').value = '';
        document.getElementById('f_req_no').value = '';
        document.getElementById('f_ordering_item').value = '';
        document.getElementById('f_master_name').value = '';
        document.getElementById('f_routing_email').value = '';
        document.getElementById('f_client_email').value = '';
        document.getElementById('f_client_phone').value = '';
        
        clearSignaturePad();
        clearUploadedSignature();
        clearUploadedStamp();

        document.getElementById('chip-crit').classList.remove('selected');
        document.getElementById('chip-noncrit').classList.remove('selected');
        document.getElementById('chip-dept-deck').classList.remove('selected');
        document.getElementById('chip-dept-engine').classList.remove('selected');
        document.getElementById('chip-iss-op').classList.remove('selected');
        document.getElementById('chip-iss-tech').classList.remove('selected');
        document.getElementById('chip-iss-man').classList.remove('selected');

        document.getElementById('paper-check-critical').innerText = '[ ]';
        document.getElementById('paper-check-noncritical').innerText = '[ ]';
        document.getElementById('paper-from-deck').innerText = '[ ]';
        document.getElementById('paper-from-engine').innerText = '[ ]';
        document.getElementById('paper-issue-op').innerText = '[ ]';
        document.getElementById('paper-issue-tech').innerText = '[ ]';
        document.getElementById('paper-issue-man').innerText = '[ ]';

        document.getElementById('paper-vessel-name').innerText = '\u00A0';
        document.getElementById('paper-req-no').innerText = '';
        document.getElementById('paper-date').innerText = '\u00A0';
        document.getElementById('paper-ordering_item') ? document.getElementById('paper-ordering_item').innerText = '\u00A0' : null;
        document.getElementById('paper-ordering-item').innerText = '\u00A0';
        document.getElementById('paper-master-name').innerText = '\u00A0';
        document.getElementById('paper-sign-date').innerText = '\u00A0';
        document.getElementById('paper-note-routing').innerText = '________________________';
        
        renderPaperSignatureAndStamp();
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

// ═══════════════════════════════════════════════════════════════════════════
// RETRO-INDUSTRIAL PRINTER FEED & VIBRATION ENGINE (QC-42 / ABM THERMAL)
// ═══════════════════════════════════════════════════════════════════════════
let printerFramePending = false;
let printerIdleTimer = null;

function updatePrinterFeed() {
    const printer = document.querySelector('.printer');
    const slot = document.querySelector('.printer-slot');
    const paperSheet = document.getElementById('paper-doc-sheet');
    const countEl = document.getElementById('printed-count');
    const totalCountEl = document.getElementById('total-print-count');
    const statusEl = document.getElementById('printer-status');
    const balance = document.querySelector('.sheet-sign-table');

    if (!printer || !slot || !paperSheet) return;

    const slotRect = slot.getBoundingClientRect();
    const slotTop = slotRect.top;

    // Get table line items
    const rows = [...document.querySelectorAll('#paper-items-tbody tr')];
    const totalLines = rows.length;
    if (totalCountEl) totalCountEl.textContent = String(totalLines).padStart(2, '0');

    // How many rows have bottom <= slotTop (emerged out of the slot)
    const printed = rows.filter(row => row.getBoundingClientRect().bottom <= slotTop).length;
    if (countEl) countEl.textContent = String(printed).padStart(2, '0');

    const feedProgress = totalLines > 0 ? (printed / totalLines) : 0;
    document.documentElement.style.setProperty('--feed', feedProgress);

    const isFinished = balance && balance.getBoundingClientRect().bottom <= slotTop;

    if (isFinished) {
        if (statusEl) statusEl.textContent = 'HSEMS 10.1D COMPLETE';
        printer.classList.remove('is-printing');
    } else if (printer.classList.contains('is-printing')) {
        if (statusEl) statusEl.textContent = `PRINTING REQUISITION [LINE ${Math.min(printed + 1, Math.max(totalLines, 1))}]`;
    } else {
        const sheetRect = paperSheet.getBoundingClientRect();
        if (statusEl) {
            statusEl.textContent = sheetRect.top < slotTop ? 'READY TO PRINT' : 'WAITING FOR REQUISITION';
        }
    }
}

function onPrinterScroll() {
    const printer = document.querySelector('.printer');
    if (printer) printer.classList.add('is-printing');
    if (!printerFramePending) {
        printerFramePending = true;
        requestAnimationFrame(() => {
            updatePrinterFeed();
            printerFramePending = false;
        });
    }
    clearTimeout(printerIdleTimer);
    printerIdleTimer = setTimeout(() => {
        if (printer) printer.classList.remove('is-printing');
        updatePrinterFeed();
    }, 180);
}

function rewindPrinterPaper() {
    const paper = document.getElementById('paper-doc-sheet');
    if (paper) {
        paper.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

function initPrinterFeedEngine() {
    const dock = document.getElementById('printer-dock');

    // Global window page scroll drives feed and animations
    window.addEventListener('scroll', onPrinterScroll, { passive: true });
    window.addEventListener('resize', updatePrinterFeed);

    if (dock) {
        // When mouse is hovering anywhere over the frozen printer dock, mouse wheel scrolls the page!
        dock.addEventListener('wheel', (e) => {
            window.scrollBy({ top: e.deltaY, behavior: 'auto' });
            onPrinterScroll();
            e.preventDefault();
        }, { passive: false });
    }

    const btnAgain = document.getElementById('print-again');
    if (btnAgain) {
        btnAgain.addEventListener('click', rewindPrinterPaper);
    }

    const btnFeed = document.getElementById('btn-manual-feed');
    if (btnFeed) {
        btnFeed.addEventListener('click', () => {
            window.scrollBy({ top: 160, behavior: 'smooth' });
            onPrinterScroll();
        });
    }

    updatePrinterFeed();
}

// Auto-open Requisition when redirected with URL query params from view_impa.php
window.addEventListener('DOMContentLoaded', function() {
    renderPaperItemsTable();
    initSignaturePad();
    initPrinterFeedEngine();

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
