# 🏛 AB MALAYA - Complete Codebase & Architecture Handbook

This document serves as the primary technical blueprint and knowledge base for the **AB Malaya** corporate website. It is designed to allow new AI sessions to instantly understand the system structure, routing, components, advanced features, and code patterns without scanning the entire repository.

---

## 🏛 1. Project Overview & Business Scope

*   **Company**: AB Malaya Sdn Bhd (Maritime, Oil & Gas, and Energy sectors contractor/service provider based in Malaysia).
*   **Aesthetics**: Merges **Industrial Authority** with a premium **Neuromorphic (Tactile), Glassmorphic, and Neo-Brutalist UI** design language.
*   **Corporate Color Palette**: Unifies all major section headings and hero titles under a sleek, high-contrast **Light/Electric Blue (`#1191cc`) and Corporate Dark Blue (`#093862`)** dual-color system to maintain strict brand cohesion.
*   **Architecture**: Built using **Native PHP 8.3** with a zero-framework modular layout. This ensures blazing-fast rendering and an instant Time to First Byte (TTFB ~0ms).

---

## 📂 2. Directory Structure & File Map

### Core Pages (Root)
*   `index.php`: High-impact landing page containing the Canvas particle hero, solutions slider, tabbed Neumorphic partners & credentials marquee, and expanded regional offices block (HQ + Penang & Perak) with HQ-focused Google Map.
*   `about.php`: Immersive company profile with a 3D parallax hero, timeline narrative drawer, and gyroscopic mission panels.
*   `solutions.php`: Full solutions catalog showcasing active divisions in a detailed vertical scroll layout with nested neumorphic tab cards and progress track indicators. Positioned at the top of the page is the premium, full-width Project Strategic Consultation division.
*   `why-us.php`: Corporate credibility showcase presenting certifications and compliance details, featuring an interactive Swiper slider for credentials (without download/view buttons for document security) and a premium, fully-responsive vertical accordion for the 5 Core Strengths.
*   `certified.php`: Certification gallery showcasing license modals and GPU-accelerated statistics.
*   `contact.php`: Restructured contact portal with a 4-section vertical flow: (1) **Our Offices** — a 3-column neumorphic grid showcasing HQ (Kuala Lumpur), Penang Office, and Perak Office with horizontal icon-left card layout; (2) **Contact Details** — a 2×2 grid for Phone, Email, Business Hours, and WhatsApp Support cards; (3) **HQ Office Map** — a neo-brutalist Google Maps embed; (4) **Inquiry Form** — a full-width neumorphic form. All section titles use corporate dark blue (`#093862`), text is left-aligned, and cards use a `linear-gradient` raised background for clear visibility. GSAP animations use `ScrollTrigger.create()` with `onEnter` + `gsap.fromTo()` pattern to prevent the opacity-flash bug caused by `gsap.from()` setting `opacity: 0` before the trigger fires.
*   `router.php`: Dynamic clean-URL routing engine that handles clean URLs and overrides PHP's static assets serving bug.

### Shared Templates (`includes/`)
*   `header.php`: SEO tags, CSS styles, critical layout shields, glassmorphic header navigation (using corporate dark blue accent `#093862`), and Spotify-style search overlay.
*   `footer.php`: Dark corporate footer, support capsule, claymorphic Cookie Consent Card, and a reorganized, full-width 3-column regional offices text layout (HQ + Penang & Perak) at the bottom, collapsing to a single-column stack on mobile.
*   `hero_visual.php`: Shared canvas particle engine and dynamic machinery carousel component.

### Assets & Styling (`assets/`)
*   `assets/css/style.css`: Main design system, typography variables, global transitions, and utility classes.
*   `assets/css/home.css` & `services_details.css`: Page-specific layout overrides.
*   `assets/js/navigation.js`: Global smooth scroll (Lenis), search overlay, voice search engine, and mobile 3D Makisu menu.
*   `assets/js/about.js` / `certified.js` / `contact.js` / `index.js` / `projects.js` / `service.js` / `why-us.js`: Page-specific Javascript payloads loaded sequentially.

---

## ⚡ 3. Technology Stack Specification

*   **Backend**: PHP 8.3 Native.
*   **Styling**: Vanilla CSS3 (Custom properties/variables, no external frameworks like Tailwind/Bootstrap for zero style overhead).
*   **Typography**: **Aeonik** (bold technical headings with tight tracking) and **Inter** (clean readable body copy).
*   **Smooth Scroll**: **Lenis Smooth Scroll** bound to window/wheel actions.
*   **Animation Engine**: **GSAP 3.12.2** + **ScrollTrigger** + **ScrollToPlugin** for hardware-accelerated scrolls, parallax, and anchoring.
*   **Lenis-GSAP Bridge**: Links Lenis smooth scroll updates directly to the global `gsap.ticker` to eliminate rendering lag and scroll jitter.
*   **Sliders & Carousels**:
    *   **Embla Carousel UMD**: Lightweight, physics-driven touch/drag carousel (used for home page services).
    *   **Swiper.js**: Slide-by-slide transitions with bullet paginations (used for certifications and detailed project slides).
*   **3D Mouse Interactions**: **VanillaTilt.js** for mouse-coordinate 3D tilt translations.

---

## 🛠 4. Key Features & Advanced Code Patterns

### 🛡️ Critical Layout Shield (Anti-FOUC & Anti-CLS)
To prevent Flash of Unstyled Content (FOUC), Image Stacking, and Cumulative Layout Shift (CLS) on slow connections before JS assets initialize, a site-wide early CSS shield is injected inside `<head>` (`header.php`):
```css
/* 1. Prevent Hero Image Parallax Stacking and FOUC */
.hero-images-layer { opacity: 0; position: absolute; top: 0; right: 0; width: 55%; height: 100%; overflow: hidden; pointer-events: none; }
.img-wrap { opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }

/* 2. Prevent Embla Carousel Layout Shifting and Slide Stacking */
.embla__viewport { overflow: hidden; width: 100%; }
.embla__container { display: flex; flex-direction: row; flex-wrap: nowrap; }

/* 3. Prevent Swiper Carousel Slide Stacking before CSS/JS Init */
.swiper { overflow: hidden; position: relative; }
.swiper-wrapper { display: flex; flex-direction: row; flex-wrap: nowrap; }
.swiper-slide { flex-shrink: 0; }
```

### 🎲 Dynamic Non-Consecutive Machinery Slider & Pathfinder Shuffler (`includes/hero_visual.php`)
Scans `assets/img/head/` dynamically. The slideshow sorts images by categories (prefixes: `greeen`, `marine`, `logistik`, `construction`) and sequences slides using a **Backtracking Pathfinder Algorithm** so that no two consecutive slides share the same category. If constraints are impossible, it falls back to a **Greedy Dispersion** shuffler.
*   **Zero-Overlap Sequential Transition**: Prevents image ghosting. Outgoing active slides are faded to `opacity: 0` over `0.6s`. Only *after* the fade-out completes, the next slide index is set and faded in.

### 🌌 Interactive GPU Canvas Particle Engine (`includes/hero_visual.php`)
Processes a background particle grid on a canvas.
*   **GPU Acceleration**: Uses `fillRect` instead of slow `arc` rendering, updating coordinates utilizing CPU/GPU transitions.
*   **Smart Power Management**: Automatically registers the hero section with an `IntersectionObserver`. It pauses `requestAnimationFrame` calculations when the user scrolls away to save device battery and CPU cycles.

### 🎤 Spotify-Style Search & Web Speech Voice Search (`assets/js/navigation.js`)
*   **Real-time Match Engine**: Combines a local JS client-side data array (`siteContent`) to filter pages and anchor links instantly on-type, showing matches under the input field.
*   **Voice Search Web Speech API**: Detects microphone voice streams. Pulsates a red microphone icon and auto-submits queries to the backend after a 1.2s processing buffer.
*   **Auto-Expanding Hover Search**: Header/footer input bars expand over `0.8s` using a custom cubic-bezier on `mouseenter` and collapse completely on `mouseleave`.

### ⛰️ Gyroscopic Parallax & 3D Tilt (`assets/js/about.js`)
*   **Desktop Mouse Tilt**: Captures `mousemove` to calculate coordinate offsets and tilt containers 30deg (via GSAP rotation Y/X) while shifting the background image 40px in the opposite direction.
*   **Mobile Gyroscopic Tilt**: Listens to throttled `deviceorientation` events (~33fps threshold via `Date.now()` updates). Uses normalized `beta` and `gamma` inputs to tilt cards smoothly on physical phone rotation.

### 🛡️ Document Protection / Anti-Theft System (`why-us.php`)
Prevents theft/downloads of ISO and legal certificates:
*   Disables right-click context menus (`oncontextmenu="return false;"`) on preview images and layout overlays.
*   Blocks standard save and print keyboard hotkey triggers:
    ```javascript
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'p')) {
            e.preventDefault();
        }
    });
    ```
*   Applies a transparent watermarked claymorphic overlay layer directly above the modal preview.

### 🎛️ Interactive Neumorphic Tabbed Marquee (`index.php`)
*   **Tabbed Navigation**: Converts the home page partner title into dual Neumorphic tab buttons. The container is styled as an inset Neumorphic card (`box-shadow: inset 3px 3px 6px #cbd5e1, inset -3px -3px 6px #ffffff`), and the active button is raised (`box-shadow: 3px 3px 6px #cbd5e1, -3px -3px 6px #ffffff`).
*   **Dynamic Tracks**: Toggles visibility between `#partners-track` (Vecom, Durachem, Belzona, Loctite) and `#accredited-track` (CIDB, MOF, SSM). The accredited track features a seamless 12-item loop layout.
*   **No-Cache Fallback**: Incorporates inline Javascript event listeners alongside version-bumped external JS (`index.js?v=5.5`) to eliminate browser cache bypass issues.

### 🏔️ Vertical Scroll & Neumorphic Tab-Card Architecture (`solutions.php`)
Replaced the legacy Swiper-based layout with a modern, high-fidelity vertical scroll section architecture integrated with the Lenis smooth scrolling engine.
*   **Mobile-Optimized Title & 3D Inline Layout**: Stacks section columns vertically on mobile screens. To maximize usable screen height, desktop image columns are hidden, and 3D graphics are displayed as compact (`75px`) inline graphics nested directly next to the section titles in a responsive flex layout.
*   **Neumorphic Inset Sub-Tabs**: Employs a dark-theme inset (concave) neumorphic button navigation (`.sub-tab-btn`) for division sub-topics. In the active state, buttons sink into the card surface (`box-shadow: inset 4px 4px 8px rgba(0, 0, 0, 0.7), inset -3px -3px 8px rgba(255, 255, 255, 0.03)`).
*   **Responsive 2-Column Wrapping Grid**: Translates horizontal-scrolling menus into clean 2-column button grids on mobile, using CSS rules to auto-span the last button if the count is odd. It allows full text-wrapping to prevent layout blowouts on narrow viewports.
*   **Lenis-Aware Read More Engine**: Detects long descriptions (over 250 characters) and automatically binds a 'Read More' toggle with CSS-controlled height states (`max-height: 185px` collapsed). On click, it triggers `lenis.resize()` to recalibrate scroll triggers and prevent layout jitter.
*   **Hybrid Layout Variation**: While the standard divisions (Contractor, Marine, Logistics, Corrosion, IT) utilize neumorphic inset sub-tabs to navigate sub-topics, the newly added *Project Strategic Consultation* division utilizes a full-width immersive narrative card layout because it acts as a unified consulting service without sub-divisions.

### 🗂️ "Hide & View" Accordion & Dynamic Hash-Syncing Architecture (`why-us.php`)
Replaced the legacy Swiper-based layout for the Core Strengths section with a custom, high-fidelity interactive vertical accordion structure.
*   **Neumorphic Trigger Headers**: The accordion trigger headers show numbers (`01-05`), mini badge images, titles, and a tactile neumorphic chevron button.
*   **Dynamic Reveal Content**: On trigger click, the card expands smoothly using CSS transitions (`max-height: 800px`, `opacity: 1`), and changes the background to the respective division's Unsplash imagery overlayed with a dark Slate-900 gradient (`rgba(15, 23, 42, 0.95)`) for legibility.
*   **GPU Float Animation**: Features animated floating 3D graphic layers wrapper using CSS keyframe-based transforms (`float3d`) for immersive parallax feedback.
*   **Dynamic Hash Linking & Auto-Expand**: The custom `handleWhyUsHash()` script parses incoming URL hashes (e.g. `#sustainability`, `#expertise`). It auto-expands the matching accordion item and performs a Lenis-aware smooth scroll down to the targeted card offset.
*   **Synchronized Navigation Anchors**: The 5 accordion strengths (`expertise`, `solutions`, `regional`, `sustainability`, `customer`) are fully synchronized with the site's header navigation dropdown menu links (`/why-us#expertise`, `/why-us#solutions`, etc.) to allow direct page routing and auto-expansion from other pages.

---

## ⚡ 5. Local Development Server Execution

To run this project locally without static asset blockages or `net::ERR_INVALID_HTTP_RESPONSE` errors on PHP CLI servers, use a multi-threaded execution command:

*   **Linux / macOS (Terminal)**:
    ```bash
    PHP_CLI_SERVER_WORKERS=4 php -S localhost:8000 router.php
    ```
*   **Windows (Command Prompt)**:
    ```cmd
    set PHP_CLI_SERVER_WORKERS=4 && php -S localhost:8000 router.php
    ```
*   **Windows (PowerShell)**:
    ```powershell
    $env:PHP_CLI_SERVER_WORKERS=4; php -S localhost:8000 router.php
    ```
