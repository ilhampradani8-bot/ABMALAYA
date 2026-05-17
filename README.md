# 🚀 AB MALAYA - Modern Industrial & Neuromorphic UI Redesign

A high-end, premium corporate website for **AB Malaya Sdn Bhd**, a leading contractor and technical service provider in the Maritime, Oil & Gas, and Energy sectors in Malaysia.

---

## 🏛 1. Overview
This project represents a sophisticated evolution of the AB MALAYA digital identity. It merges **Industrial Authority** with a cutting-edge **Neuromorphic, Glassmorphic & Neo-Brutalist UI** design language. The website features tactile interfaces, 3D perspective interactions, and a focus on visual performance that places it at the forefront of modern corporate web standards.

---

## 🛠 2. Tech Stack & Architecture

For a detailed breakdown of the roles, performance benefits, and features of each technology, refer to [techstack.md](file:///root/ABMALAYA/techstack.md) (Bahasa Indonesia) or [eng-techstack.md](file:///root/ABMALAYA/eng-techstack.md) (English).

*   **Core Platform**: PHP 8.3 Native (Modular template inheritance, zero framework overhead, instant TTFB).
*   **UI Paradigm**:
    *   *Neuromorphic Accentuation*: Extruded-plastic tactile buttons and container borders.
    *   *Neo-Brutalisim*: Solid hard shadows, thick borders, and high-contrast structural grids.
    *   *Glassmorphism & Claymorphism*: Premium high-blur components and clay-shaded elements.
*   **Typography**: **Aeonik** (Bold headings) & **Inter** (Clean body copy).
*   **Animations**: **GSAP 3.12.2** + **ScrollTrigger** (GPU hardware-accelerated parallax) synced with **Lenis Smooth Scroll** via a single-render-loop bridge.
*   **Carousels**: **Embla Carousel UMD** (Physics-driven, hardware-accelerated slider for beranda) and **Swiper.js** (Certified & Projects pages).

---

## 📂 3. Project Structure

*   `index.php`: High-impact landing page featuring the GPU-accelerated **Particle Canvas**, sequential machinery parallax, **Embla Solutions Slider**, and a **Neo-Brutalist Google Map Widget**.
*   `services.php`: Advanced service catalog featuring a **Dual-State Swiper Carousel** with visual perspective shifts and responsive dynamic heights.
*   `projects.php`: High-end, immersive project showcase driven by **Swiper.js**, featuring perfectly centered desktop layouts and dynamic mobile-optimized 95%-width slider cards with responsive inquiry triggers.
*   `about.php`: Immersive company profile featuring a 3D Neumorphic Parallax Vision & Mission section and custom **Funky Industrial CSS Accordions**.
*   `certified.php`: High-end certification showcase featuring an interactive Swiper.js-based slider, a custom GPU-accelerated Neumorphic statistics panel, and **Secure Modal Document Preview**.
*   `contact.php`: Tactile, responsive industrial contact portal combining beautiful **soft-shadow Neumorphic inquiry forms** with a robust, hard-edged **Neo-Brutalist Google Map panel** and specialized external deep links.
*   `router.php`: Dynamic clean-URL routing engine that eliminates `.php` extensions and serves all static assets (images, fonts, scripts, styles) natively to completely bypass PHP built-in server bugs.
*   `maintenance.md`: Technical guide for future updates, content changes, and server configurations.
*   `includes/`:
    *   `header.php`: Floating glassmorphic header, top loading bar, SVG navigation indicators, and mobile 3D Makisu folder menu.
    *   `footer.php`: Re-engineered dark footer featuring comprehensive services listing, WA liquid-metal capsule, and claymorphic **Cookie Consent Card**.
*   `assets/`:
    *   `css/style.css`: Core design system, font faces, global variables, and layout overrides.
    *   `js/navigation.js`: Global menu, Lenis initialization, search animations, and Lenis-GSAP Bridge.
    *   `js/index.js` / `about.js` / `certified.js` / `projects.js` / `contact.js`: Highly targeted, modular scripts loaded sequentially per page.

---

## ✨ 4. Key Premium Features

### 🎤 Spotify-Style Search Overlay with Voice Search & Live Match Engine
Upgraded the mobile search to a breathtaking, Codepen-Spotify-emulated interactive card system with a dynamic, slowly fading Unsplash backdrop watermark. Integrates a local client-side search dictionary (`siteContent`) that matches keywords real-time as you type, rendering styled results instantly below the input. Includes **Web Speech API Voice Search** supporting Indonesian/English, displaying voice feedback with a pulsing red microphone before auto-submitting the query after a 1.2s buffer.

### 📂 Auto-Expanding Hover Search (Header & Footer)
Both the header and footer now host a dynamic, expanding glassmorphic search bar. Simply hovering (`mouseenter`) expands the input beautifully over 0.8s via a premium `cubic-bezier(0.16, 1, 0.3, 1)` curve and shifts focus to it. Moving the cursor away (`mouseleave`) smoothly collapses it back into a compact, circular capsule, auto-clearing the text and hiding any open previews.

### 💎 Staggered Glassmorphic Dropdown Navigation
Re-engineered the header menu links into premium dropdown panels with high-blur glass backgrounds (`blur(25px) saturate(190%)`). Top-level links feature customized inline caret SVG indicators (`arrow-svg`) that rotate from a horizontal hidden state to pointing straight down on hover. Sub-links animate sequentially with staggered transition delays (`nth-child(1)`) to `(5)`) using an Apple-inspired slide-down elastic reveal curve.

### 🎨 Tactile SVG Footer Redesign
Transformed the footer quick links and service categories into button-style lists featuring inline Lucide SVG outline icons. The icons dynamically scale, glow, and shift the link label to the right by `6px` on hover with a smooth transition. The business contact info has been modernized with transparent locator and mail envelopes for a clean, unified corporate look.

### 📞 Clean Neumorphic & Neo-Brutalist Contact Architecture
Integrates a balanced dual-aesthetic layout for a premium tactile feel. The inquiry panel employs soft-shadowed raised card containers (`.neu-card-raised`) with interactive inset fields, while the office location details feature smooth, mouse-driven 3D parallax tilt effects (`VanillaTilt`). The locations layout terminates in a solid, hard-shadowed Neo-Brutalist map container featuring sharp borders, an integrated Google Map iframe, and a dedicated "View in Browser" external link.

### 🌀 Lenis-GSAP Single-Render-Loop Bridge
Binds Lenis smooth scrolling directly to the global `gsap.ticker` to eliminate rendering lag, dual animation cycles, and layout jittering on parallax scroll-events (used in *About* and *Contact* pages).

### 🌌 GPU-Accelerated Particle Canvas with IntersectionObserver
Manages interactive backdrop physics particles in the hero banner. Utilizes `translate3d` to transfer drawing calculations to the graphics card, and automatically pauses the animation frame rate via `IntersectionObserver` when the user scrolls away to save device battery and CPU power.

### 🎠 Physics-Driven Embla Carousel with Mobile Peeking
Replaces old laggy carousels with hardware-accelerated slide animations. Configured with a viewport peeking ratio on mobile devices to showcase a zoomed-in center card with the side cards peeking in by `17.5%` each.

### 🛡️ Document Anti-Theft Protection Modal
Secures valuable ISO and licensing credentials. The system disables right-click context menus, blocks printing/saving shortcut triggers (`Ctrl+S`, `Ctrl+P`, `Cmd+S`, `Cmd+P`), and injects a transparent claymorphic protective watermark layer over previewed assets.

### 🍪 Claymorphism Cookie Consent & Liquid Metal Support
Features an elegant claymorphic cookie acceptance card with custom inset shading, linked to a floating Support Capsule made of animated liquid-metal gradient backgrounds that transition smoothly without breaking page flows.

### ⛰️ Recessed Neumorphic 3D Parallax & Gyroscopic Sensor-Tilt
Modernized the Vision & Mission experience in `about.php` by carving a deep, multi-layered inset "valley" container (`box-shadow: inset 35px 35px 70px #9bb0c4`) under a sharp ambient-occlusion edge. The 3D cards float as raised outward neumorphic panels, tilting on mouse movement. On mobile, it utilizes throttled (`~33fps`) gyroscopic `deviceorientation` listeners to dynamically tilt the cards and background images (with a 20% bleed area to prevent edge clipping) based on physical phone movement, rendering smoothly without layout reflows.

### 💎 GPU-Accelerated Tactile Neumorphic Panels & Specific Transitions
Implemented high-performance tactile Neumorphic statistics panels in `certified.php` and `about.php`. Leverages native hardware acceleration (`will-change: transform, opacity`) and replaces general CSS `all` transitions with highly targeted property transitions (`transform, box-shadow`). This delegates drawing computations entirely to the GPU, guaranteeing a stutter-free, silky-smooth 60 FPS scrolling experience.

### 🔗 Clean-URL Architecture & Unified Route Integration
Re-engineered the website navigation system to utilize fully SEO-friendly, clean URLs without `.php` extensions. Endpoints like `/about`, `/services`, `/certified`, `/projects`, and `/contact` are processed natively, generating professional address bars similar to modern application routers.

### 🎬 High-End Cinematic Swiper.js Projects Showcase (projects.php)
Employs a custom-tailored **Swiper.js** architecture optimized separately for desktop and mobile displays:
*   **Desktop Mode**: Features a perfectly centered **950px** wide card layout with high-end, responsive overlapping images (`translateX(-100px)`) and smooth text fade-in transitions.
*   **HP / Mobile Mode**: Automatically scales down to a dense, near-fullwidth (**95% width**) card layout with clean **15px** border-radius and soft shadow. Standard arrow buttons are hidden to prevent UI clutter, replaced by an elegant, pulsing **"SLIDE >"** mobile visual hint to guide the swipe behavior seamlessly.
*   **Tightened Bottom Clearances**: Bottom padding is optimized to **20px/40px** on mobile/desktop, allowing the slider to flow compactly into the footer without large awkward white space.

---

## 🖥 5. Local Development & Performance Optimization

To run this project locally without concurrent assets blocking or `net::ERR_INVALID_HTTP_RESPONSE` errors on static files:

1.  **Automated Static Asset Proxying**:
    The included `router.php` automatically intercepts all requests for static assets (images, fonts, scripts, and stylesheets), serving them directly with appropriate `Content-Type`, `Content-Length`, and caching headers. This completely bypasses the well-known static file serving bug (`net::ERR_INVALID_HTTP_RESPONSE`) found in PHP's built-in web server.

2.  **Start Multi-Threaded PHP server**:
    *   **Linux / macOS**:
        ```bash
        PHP_CLI_SERVER_WORKERS=4 php -S localhost:8000 router.php
        ```
    *   **Windows (CMD)**:
        ```cmd
        set PHP_CLI_SERVER_WORKERS=4 && php -S localhost:8000 router.php
        ```
    *   **Windows (PowerShell)**:
        ```powershell
        $env:PHP_CLI_SERVER_WORKERS=4; php -S localhost:8000 router.php
        ```

3.  **Access Local Site**:
    Open [http://localhost:8000](http://localhost:8000) in your web browser.

---
*Built with ultimate precision and modern engineering for AB MALAYA*
