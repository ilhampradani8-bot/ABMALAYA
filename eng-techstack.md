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
    *   **Centralized Styling**: Uses CSS custom variables (e.g., `--primary: #005EE9`) to control global colors, spacings, and typography from a single, unified source.

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
*   **Role**: Controls the responsive, touch-friendly *Solutions* carousel on the home page and the edge-to-edge *Projects* slider on the portfolio page.
*   **Benefits**:
    *   **Physics-Driven Snapping**: Delivers an organic, extremely responsive drag-and-swipe feel on touch screens.
    *   **Zero Jitter**: Uses optimized CSS matrix transforms, ensuring card snapping animations are completely smooth without any stutter.

### 🎡 Swiper.js
*   **Role**: Powers the interactive blog-style slider in the certifications section of the *Certified* page.
*   **Benefits**: Supports robust slide-by-slide transitions with intuitive mobile touch controls and precise horizontal snapping.

---

## 🛠 4. Specialized UI Components

### 📜 Makisu 3D Menu (jQuery Plugin)
*   **Role**: Provides an interactive 3D folding paper effect for the mobile navigation dropdown menu.
*   **Benefits**: Creates a high-impact, memorable visual effect for mobile visitors, reinforcing AB Malaya's identity as a modern, forward-thinking engineering firm.

### 💎 VanillaTilt.js (Neumorphic 3D Parallax)
*   **Role**: Generates interactive 3D depth-tilting effects that react to the user's mouse cursor on partner logos and cards.
*   **Benefits**: Adds a high-end sense of physical depth to neumorphic and glassmorphic layouts.

---

## 🔒 5. Custom Visual & Security Systems

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
*Official Tech Stack Documentation - AB Malaya Sdn Bhd Engineering Team*
