# 🚀 Tech Stack Specifications - AB Malaya Website

This document outlines the complete technology stack used in the **AB Malaya Sdn Bhd** corporate website, highlighting the role of each component and its specific performance benefits.

---

## 🏛 1. Core Platform & Backend

### 🐘 Native PHP 8.3
*   **Role**: Serves as the foundation of server-side operations, managing dynamic page modularity (such as `header.php`, `footer.php`, visual templates) and the internal routing system.
*   **Benefits**:
    *   **Blazing-Fast Speed (TTFB ~0ms)**: Bypasses the overhead of heavy frameworks (like Laravel/CodeIgniter), eliminating unnecessary server-side processing. Pages render instantly upon request.
    *   **Clean & Maintainable Architecture**: Utilizes a highly structured, modular templates approach to ensure long-term ease of maintenance.

### 🌐 HTML5 (Semantic Markup)
*   **Role**: Provides a clean, semantic document structure using modern elements (`<section>`, `<article>`, `<header>`, `<nav>`, `<footer>`).
*   **Benefits**:
    *   **SEO Excellence**: Helps search engine crawlers accurately index the site's layout hierarchy.
    *   **Accessibility**: Enhances readability for assistive screen-reading technologies.

### 🎨 Vanilla CSS3 (Custom Properties & Utilities)
*   **Role**: Controls all layout presentations, responsive grid adjustments, corporate dark-theme colors, and micro-animations.
*   **Benefits**:
    *   **Zero Overhead**: Operates entirely without bulky CSS frameworks (like Bootstrap/Tailwind), minimizing static asset file sizes.
    *   **Centralized Styling**: Uses CSS custom variables (e.g., `--primary: #1191cc`) to control global colors, spacings, and typography from a single, unified source.

---

## 🎬 2. Animation & Interaction Engines

### 🌀 Lenis (Smooth Scroll)
*   **Role**: Implements a high-performance, inertia-driven smooth scrolling effect across all web browsers and devices.
*   **Benefits**: Eliminates default browser scroll stutters, delivering a premium, cinematic scroll-feel consistent with world-class corporate sites.

### ⚡ GSAP 3.12.2 (GreenSock Animation Platform)
*   **Role**: An ultra-high-performance JavaScript animation library used to build smooth, hardware-accelerated animations and page transition sequences on the *About* and *Contact* pages.
*   **Benefits**: Direct GPU rendering that maintains a solid 60fps+ frame rate, avoiding CPU layout thrashing.

### 📍 ScrollTrigger & ScrollToPlugin (GSAP Add-ons)
*   **Role**:
    *   **ScrollTrigger**: Coordinates GSAP animations directly with the viewport scroll position (delivering smooth dynamic parallax effects).
    *   **ScrollToPlugin**: Manages ultra-smooth anchoring transitions between different sections of the page.
*   **Benefits**: Enhances the visual storytelling experience as users scroll through company details.

### 🎭 Lenis-GSAP Bridge (Sync Connector)
*   **Role**: Binds Lenis scrolling updates directly to the global `gsap.ticker` rendering cycle.
*   **Benefits**: Prevents conflicts between the scrolling engine and the animation cycle (eliminates scrolling lag/jittering when both engines run simultaneously).

---

## 🎠 3. Advanced Carousel Systems

### 📐 Embla Carousel UMD
*   **Role**: Controls the responsive, touch-friendly *Solutions* carousel on the home page (*Beranda*).
*   **Benefits**:
    *   **Physics-Driven Snapping**: Delivers an organic, extremely responsive drag-and-swipe feel on touch screens.
    *   **Zero Jitter**: Uses optimized CSS matrix transforms, ensuring card snapping animations are completely smooth without any stutter.

### 🎡 Swiper.js
*   **Role**: Powers the interactive blog-style slider in the certifications section of the *Certified* page and the cinematic projects slider on the *Projects* page.
*   **Benefits**: Supports robust slide-by-slide transitions with intuitive mobile touch controls and precise horizontal snapping. On the projects page, it features custom-tailored desktop centering and a lightweight dynamic mobile hint ("SLIDE >") for clutter-free navigation.

---

## 🛠 4. Specialized UI Components

### 📜 Makisu 3D Menu (jQuery Plugin)
*   **Role**: Provides an interactive 3D folding paper effect for the mobile navigation dropdown menu.
*   **Benefits**: Creates a high-impact, memorable visual effect for mobile visitors, reinforcing AB Malaya's identity as a modern, forward-thinking engineering firm.

### 💎 VanillaTilt.js (Neumorphic 3D Parallax)
*   **Role**: Generates interactive 3D depth-tilting effects that react to the user's mouse cursor on partner logos and cards.
*   **Benefits**: Adds a high-end sense of physical depth to neumorphic and glassmorphic layouts.

---

## 🔍 5. Advanced Search & Navigation Systems

### 🎤 Spotify-Style Voice Search & Live Match Engine
*   **Role**: Powers a premium Spotify-emulated search overlay featuring client-side live content filtering (`Live Search`) and speech voice synthesis (`Voice Search`).
*   **Benefits**:
    *   **Voice Search Web Speech API**: Allows visitors to perform hands-free searches in Indonesian or English, accompanied by a pulsing red microphone recording animation before auto-submission.
    *   **Real-Time Data Match**: Seamlessly filters local content dictionaries (`siteContent`) as the user types, instantly rendering interactive card matches directly under the input field without reloading.

### 💎 Staggered Glassmorphic Dropdown Navigation
*   **Role**: Displays premium glassmorphic dropdown panels (`blur(25px) saturate(190%)`) under top-level desktop menu items.
*   **Benefits**: Features high-end interactive caret SVG icons (`arrow-svg`) that rotate straight down on hover and sub-links that glide in sequentially with staggered delays.

### 📂 Auto-Expanding Hover Search (Header & Footer)
*   **Role**: Implements a sleek, space-saving search input box in the header and footer.
*   **Benefits**: Automatically expands over 0.8s on hover (`mouseenter`) using an elegant `cubic-bezier(0.16, 1, 0.3, 1)` curve and collapses/resets completely when the mouse leaves (`mouseleave`).

---

## 🔒 6. Custom Visual & Security Systems

### 🌌 Interactive GPU Canvas Particle Engine
*   **Role**: Manages millions of interactive physics particles in the background of the home page hero section using HTML5 Canvas.
*   **Benefits**:
    *   **Smart Power Management (IntersectionObserver)**: Automatically pauses particle physics calculations when the user scrolls away from the hero header, saving mobile device CPU cycles and battery life.
    *   **GPU Acceleration**: Uses 3D transform updates (`translate3d`), moving the render computations from the CPU to the graphics card for perfect fluid performance.

### 🛡️ PDF/Image Anti-Theft Protective System
*   **Role**: Secures valuable corporate license and ISO document displays on the *Certified* page.
*   **Benefits**:
    *   Disables right-click actions on preview assets.
    *   Prevents standard keyboard print and save shortcuts (`Ctrl+S`, `Ctrl+P`, `Cmd+S`, `Cmd+P`).
    *   Applies a transparent neumorphic protective watermark overlay on top of protected documents to discourage unauthorized copying.

---

## ⚓ 7. Maritime Requisition & Vector Document Engine

### 🐍 PyMuPDF (Python Vector Engine)
*   **Role**: Compiles official HSEMS Attachment 10.1D PDF dossiers with high vector fidelity via `scripts/pdf_engine.py` and `download_rfq_pdf.php`.
*   **Benefits**: Produces authentic printable A4 marine requisitions with precise tabular borders, formal Times New Roman typography, automatic multi-page overflow with sequential numbering, vertical signature/stamp stacking, and unconstrained high-resolution line-item photos.

### 📬 Standalone Pure PHP Socket SMTP Engine (`tender_mailer.php`)
*   **Role**: A 100% self-contained email delivery engine operating without composer dependencies and zero risk to core ERP modules.
*   **Benefits**: Supports encrypted SSL (port 465) and TLS (port 587) socket handshakes with native `mail()` fallback, cPanel Exim `-f` envelope sender parameter, auto-BCC sender archiving, and local delivery logging.

### 🗄️ Certified IMPA Marine Stores Master Database (49,459+ Products)
*   **Role**: Houses the complete international maritime IMPA catalog in MySQL table `impa_catalog_master`, queried directly via `/api_tender.php?action=search_impa`.
*   **Benefits**: Provides sub-10ms autocomplete suggestions matching 6-digit IMPA codes, standard product names, categories, and units of measurement.

### 🖨️ Skeuomorphic 3D Industrial Thermal Printer (`QC-42M`)
*   **Role**: Powers the interactive 3D thermal POS receipt printer simulation docked adjacent to the live requisition document.
*   **Benefits**: Features pure CSS 3D casing, stainless-steel serrated cutter blade (SVG micro-teeth), tactile `FEED` button, power rocker switch, OLED telemetry screen with scanlines, and mechanical vibration synchronized with page scrolling.

---
*Official Tech Stack Documentation - AB Malaya Sdn Bhd Engineering Team*
