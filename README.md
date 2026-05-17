# AB MALAYA - Modern Industrial & Neuromorphic UI Redesign

A high-end, premium corporate website for **AB Malaya Sdn Bhd**, a leading contractor and technical service provider in the Maritime, Oil & Gas, and Energy sectors in Malaysia.

## 🚀 Overview
This project represents a sophisticated evolution of the AB MALAYA digital identity. It merges **Industrial Authority** with a cutting-edge **Neuromorphic & Neo-Brutalist UI** design language. The website features tactile interfaces, 3D perspective interactions, and a focus on visual performance that places it at the forefront of modern corporate web standards.

## 🛠 Tech Stack
- **Core**: PHP 8.x
- **UI Design**: 
    - **Neuromorphic Architecture**: "Raised" and "Inset" tactile elements for an extruded-plastic feel.
    - **Neo-Brutalism Industrial**: Bold black borders, solid hard shadows, and high-contrast layouts.
    - **White Glassmorphism**: High-blur (`backdrop-filter`) floating support components.
- **Typography**: **Aeonik & Inter** (Clean, technical fonts for maximum clarity).
- **Styling**: Vanilla CSS3 (Modular design system in `home.css`).
- **Interactive**: Modular Vanilla JavaScript (Zero-dependency architecture).
- **Animation**: GSAP (GreenSock) for high-performance parallax and scroll-triggered visuals.

## 📂 Project Structure
- `index.php`: High-impact landing page featuring a cinematic 3D focus slider and **Neo-Brutalist Map**.
- `services.php`: Advanced service catalog featuring a **Dual-State Premium Slider** with immersive background swapping and "pop-out" 3D visuals.
- `projects.php`: Portfolio showcase using a high-contrast **Neo-Brutalist Grid** with 3D tilt effects.
- `about.php`: Immersive company profile featuring **Neumorphic 3D Parallax** and **Funky Industrial Accordions**.
- `certified.php`: High-end certification showcase featuring a **Premium Blog Slider** and **Secure Modal Document Preview**.
- `includes/`: Modular PHP components (Header, Footer, Hero Visuals).
- `assets/`:
    - `css/home.css`: Unified Design System and component tokens.
    - `js/index.js`: Logic for Home Page (Tilt, Sliders).
    - `js/service.js`: Logic for Services Page (Dual-State Swiper Sync).
    - `js/projects.js`: Logic for Projects Page (Portfolio Tilt & Reveal).
    - `js/about.js`: Logic for About Page (Parallax, Accordions, GSAP).
    - `js/certified.js`: Logic for Certification Page (Scroll Reveal animations).

## ✨ Key Features (Latest Updates in `services.php`)

### 🌌 Dual-State Cinematic Service Slider
A masterclass interaction system transitioning seamlessly between:
- **Mode 1 (Front Card)**: A premium dark card wrapped in a thin, elegant, semi-transparent white border (`rgba(255,255,255,0.22)`) displaying the service's signature 3D visual.
- **Mode 2 (Detail Card)**: A high-contrast premium solid white/light-slate gradient panel (`#ffffff` to `#f1f5f9`) featuring ultra-legible Slate-900 black typography and clean dark button accents.

### 📱 Viewport-Relative Mathematical Mobile Overhaul (Latest Update!)
We implemented a strict mobile viewport lock system that eliminates dynamic page scrolling and ensures an incredibly premium, zero cut-off fullscreen mobile app experience:
- **Dynamic Height-Morphing Animation (`50vh` to `56vh`)**: The swiper card is set to a highly tactile portrait ratio (`50vh`). When entering Mode 2 (Detail), the card **smoothly morphs and stretches to `56vh`** via a custom ease transition (`transition: height 0.4s cubic-bezier(0.25, 1, 0.2, 1)`) to comfortably contain all text details, and dynamically shrinks back when clicking "BACK".
- **Absolute Vertical Centering (`justify-content: center`)**: The detailed card content is aligned strictly to the vertical center of the expanded container to guarantee that the detailed title and list features stay symmetrically placed and 100% inside the card boundaries.
- **Pristine Collision-Free Gap Overhaul**: Adjusted top Swiper margins dynamically to `11vh` and translated visual assets mathematically to `translateY(-8%)`, maintaining a wide, clean **`120px` to `150px` visual breathing distance** from category buttons and completely eliminating vertical asset overlaps.
- **Premium 2-Row Wrapped Capsule Menu**: Replaced horizontal scrolls with a dynamic wrapped pill design featuring customized capsule touch targets (`5px 12px` padding) and compact gaps (`0.4rem 0.5rem`), fitting all categories on two beautifully organized rows across all mobile displays.
- **High-Contrast Typography Overhaul**: Regular detail list text is set to slate-gray (`#334155`) and bold headers/titles to industrial black (`#0f172a`), solving light-on-light readability issues and making the back card exceptionally easy to read on mobile.
- **High-Availability Unsplash CDN replacements**: Swapped background and detail URLs for Card 4 (*Construction*) and Card 5 (*Civil*) with high-availability, CORS-immune Unsplash CDN images, guaranteeing instant asset load.

### 🎨 Dedicated 3D Assets for Every Service
Each of the 8 services is linked to its own bespoke 3D visual asset (`assets/img/service3d/`):
- *Marine Technical* 🛳️ -> `marine.png`
- *Logistics* 🚛 -> `logistics.png`
- *Environmental* 🍃 -> `pohon3d.png`
- *Construction* 🏗️ -> `cinstruction.png`
- *Civil Engineering* 🧱 -> `civil.png`
- *Renovations* 🔨 -> `renov.png`
- *Mechanical* ⚙️ -> `mekanikal.png`
- *Landscape* 🌳 -> `lanscape.png`

### 🔄 Dynamic Background-Image Swapping
Mode 2 transitions the fullscreen section background to a **different, detailed service image** from Unsplash, and instantly restores it back to Mode 1's original front image on returning.

### 🏹 Asymmetrical Navigation
Simplified navigation presenting only **one right-hand next arrow** detailing the exact name of the next service destination, creating a clean, modern aesthetic.

### 📝 Other Page Features
- **Muhammad Erdem-Inspired Certification Slider**: A custom blog slider on `certified.php` using **Swiper.js** for high-end credential browsing.
- **Secure Document Preview**: Advanced Modal system with **Click-to-Zoom** functionality, anti-right-click protection, and keyboard save/print disabling.
- **Neuromorphic Vision/Mission**: Tactile cards with internal parallax imagery and reactive hover states.
- **Funky Industrial Accordion**: A non-traditional vertical navigation system for Core Values.

## 🖥 Local Development
To run this project locally, use a PHP-enabled server or the built-in PHP server:
```bash
# Using PHP built-in server
php -S localhost:8000
```
Access the site at `http://localhost:8000`.

---
*Built with precision for AB MALAYA by Antigravity*
