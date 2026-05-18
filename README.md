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
*   `services.php`: Immersive solutions catalog showcasing the **3 Core Active Divisions** in a high-fidelity **Dual-State Swiper Showcase** with dynamic asset loading, visual perspective shifts, and responsive heights.
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

### 🎠 Physics-Driven Embla Carousel & Mobile Touch Optimizations
Replaces old laggy carousels with hardware-accelerated slide animations. Configured with a viewport peeking ratio on mobile devices to showcase a zoomed-in center card with the side cards peeking in by `17.5%` each. Further optimized for physical touch-devices by adding `touch-action: pan-y` on the scroll container to prevent scroll locks, and disabling browser-native drag/pointer actions (`-webkit-user-drag: none`, `pointer-events: none`) on inner images to ensure silky-smooth, lag-free horizontal swipes without browser hijacking.

### 🎲 Dynamic Non-Consecutive Machinery Slider & Advanced Category-Rolling Shuffler
Re-engineered the home page's hero machinery visual layer to serve whatever image assets are uploaded to `assets/img/head/` (supporting `.webp`, `.png`, `.jpg`, `.jpeg`, `.gif`, `.svg` dynamically). It organizes assets into normalized category clusters based on file prefixes (`greeen`, `marine`, `logistik`, `construction`). Shuffles and sequences slides on every page load using a robust **Backtracking Pathfinder Algorithm** ensuring **no two consecutive slides belong to the same category**, complete with loop-wrap protection (different first and last categories). If mathematical limits are exceeded (e.g. one category dominates >50% of files), it employs a **Greedy Dispersion fallback** to distribute them as far apart as possible, ensuring a perfectly diverse visual journey.

### ⚡ Zero-Overlap Sequential Fade Transitions (0.6s Snap)
Upgraded the slide transitions on the hero slider from basic cross-fades to a premium **Sequential Fade-Out/Fade-In** mechanism. Outgoing active images fade to a flat `opacity: 0` over `0.6s` via an elegant ease curve, and only *after* the previous image is 100% clean and gone, the next image is triggered to fade in. This eliminates layout "ghosting", blending artifacts, and split-second double overlaps.

### 🚫 Solid Static Rendering (Zero Parallax/Tilt)
To maximize readability and corporate solidness, the hero visual layer has been stripped of distracting mouse-based 3D tilt translations (`VanillaTilt` completely bypassed) and scroll-based parallax shifting. The image container renders statically and performs with maximum fluidness, dramatically saving GPU cycles and phone battery.

### 💎 Optimized Solution Cards & Smart Button Hiding (index.php)
Aligned the home page Embla Solutions slider to perfectly match the active corporate offerings on `/services`. Only active divisions on the service page (**Marine Division**, **Logistic Division**, **Environmental**) display their fully styled *Know More* action buttons. Other premium showcase categories (**Industrial IT**, **Bio-Solutions**, **Procurement**) remain as beautiful portfolio visual cards, but their buttons are cleanly hidden to prevent broken/dead links, with their captions seamlessly centered using automated `margin-bottom: 0` overrides.

### 🛡️ Proactive FOUC, CLS, & Image Stacking Prevention (services.php)
Re-engineered the services slider load sequence to completely prevent Flash of Unstyled Content (FOUC), Image Stacking, and Cumulative Layout Shift (CLS) on initial load. Implemented inline stylesheet defaults hiding inactive slides (`opacity: 0; visibility: hidden;`) and explicitly hardcoded the first active card's class (`swiper-slide-active`) and active background slide image in the raw HTML. This ensures the first active slide paints fully rendered and gorgeous immediately upon loading, entirely preventing vertical shifting, blank flashing, or messy overlapping image stacks before JavaScript initializes.

### 🛡️ Global Critical Layout Shield (Anti-FOUC & Anti-CLS in header.php)
Implemented a site-wide early-load CSS shield in `<head>` that instantly parses layout boundaries and opacity rules for all custom sliders and dynamic image carousels *before* a single byte of the HTML `<body>` is painted by the browser. Enforces zero-bleed opacity (`opacity: 0`) and immediate absolute positioning (`position: absolute`) for the hero sequential layer, and pre-establishes strict horizontal flex containment (`display: flex; flex-direction: row; flex-wrap: nowrap; overflow: hidden;`) for Embla and Swiper wrappers. This completely eliminates Flash of Unstyled Content (FOUC), layout shifts (CLS), and messy card/image stacking site-wide, providing a flawless premium paint sequence.

### ⚙️ Auto-Adapting Navigation Calculations & Safe Card Hiding (services.php)
Upgraded the services slider to display only the three main active corporate divisions (`Marine Division`, `Logistic Division`, and `Environmental`). The other five divisions are securely wrapped in PHP server-side conditional blocks (`if (false)`) to completely hide them from rendering while preserving 100% of their HTML/CSS markup untouched. Rewrote the Swiper navigation text indicators and menu click-event handlers in JavaScript to dynamically read titles from active DOM elements (`.service-link-item`). This dynamically computes indexes (e.g. `% totalSlides` instead of hardcoded `% 8`), enabling seamless loop-wraps and preventing indexing crashes when changing active slide counts.

### 🛡️ Document Anti-Theft Protection Modal
Secures valuable ISO and licensing credentials. The system disables right-click context menus, blocks printing/saving shortcut triggers (`Ctrl+S`, `Ctrl+P`, `Cmd+S`, `Cmd+P`), and injects a transparent claymorphic protective watermark layer over previewed assets.

### 🍪 Claymorphism Cookie Consent & Liquid Metal Support
Features an elegant claymorphic cookie acceptance card with custom inset shading, linked to a floating Support Capsule made of animated liquid-metal gradient backgrounds that transition smoothly without breaking page flows.

### ⛰️ Recessed Neumorphic 3D Parallax & Gyroscopic Sensor-Tilt
Modernized the Vision & Mission experience in `about.php` by carving a deep, multi-layered inset "valley" container (`box-shadow: inset 35px 35px 70px #9bb0c4`) under a sharp ambient-occlusion edge. The 3D cards float as raised outward neumorphic panels, tilting on mouse movement. On mobile, it utilizes throttled (`~33fps`) gyroscopic `deviceorientation` listeners to dynamically tilt the cards and background images (with a 20% bleed area to prevent edge clipping) based on physical phone movement, rendering smoothly without layout reflows.

### 💎 GPU-Accelerated Tactile Neumorphic Panels & Specific Transitions
Implemented high-performance tactile Neumorphic statistics panels in `certified.php` and `about.php`. Leverages native hardware acceleration (`will-change: transform, opacity`) and replaces general CSS `all` transitions with highly targeted property transitions (`transform, box-shadow`). This delegates drawing computations entirely to the GPU, guaranteeing a stutter-free, silky-smooth 60 FPS scrolling experience.

### 🏔️ Advanced 3D Parallax Optimization, CSS-Based FOUC Locking & Cinematic Scroll-Space (about.php)
Re-engineered the 3D Parallax Hero visual landscape in `about.php` to meet ultimate premium user experience and performance standards:
*   **Hardware-Accelerated CSS FOUC Prevention**: Locked the `.parallax-wrapper` container using a hardware-accelerated, pure CSS fade-in keyframe animation with a `0.15s` delay. This completely hides the raw, stacked, and unstyled SVG layer paint-state on slower connections, fading the entire composition in dynamically with zero dependence on JS load execution and zero blank screen risk.
*   **Staggered Content Opacity Overrides**: Injected absolute CSS opacity overrides (`opacity: 0`) for the `Our Story` staggered entry text elements. This permanently eliminates Cumulative Layout Shift (CLS) / layout jitter by preserving their DOM bounding boxes while keeping them hidden on load until GSAP ScrollTrigger activates them.
*   **Uniform City Stretching (`preserveAspectRatio="xMidYMid slice"`)**: Added explicit slice aspect-ratio locking to the middle-ground city skyline (`mountMg.png`). This uniformly scales the city to cover the entire container height (filling top and bottom) to avoid vertical gaps, while preserving its natural aspect ratio to prevent horizontal stretching or skewing distortion.
*   **Cinematic Scroll Distance Tuning (`250vh` Desktop Space)**: Expanded the default desktop scroll distance to `250vh` (while keeping mobile tight at `180vh` to avoid thumb fatigue). This creates a luxurious breathing room for the stationary hero scene, pushing the `Our Story` content far below so it enters the viewport slower and later.
*   **Elevated Cloud Parallax Alignment (+60px Shift)**: Shifted starting and ending vertical offsets of all three cloud layers (`cloud1`, `cloud2`, `cloud3`) upwards by exactly `60px` on both desktop and mobile. This elevates the clouds beautifully above the screen horizon for optimal composition, while keeping all relative 3D parallax speeds perfectly intact.
*   **Principles Section Accordion Cleanup**: Cleanly removed the 'Learn More' action buttons from all five cards (Integrity, Safety, Innovation, Collaboration, Quality) inside the principles industrial accordion, resulting in a tighter, cleaner catalog presentation.

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
