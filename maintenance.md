# Maintenance Guide - ABMALAYA Project

This guide provides instructions for future maintenance and updates, especially when working with simplified AI models.

## 🛠 Project Architecture
- **PHP Modularity**: Header and footer are located in `includes/`. Global styles are in `style.css`.
- **Home Page Assets**: Specific logic for the landing page is externalized to `assets/css/home.css` and `assets/js/main.js`.
- **Clean URLs**: Managed by `router.php`. Ensure any new `.php` files are added to the navigation links without the extension.

## 🔄 Common Maintenance Tasks

### 1. Updating Service Cards (Home Page)
Location: `index.php` (around line 75-150)
- **Adding a Slide**: Copy an existing `<div class="swiper-slide">` block.
- **Image Aspect Ratio**: Keep images at **4:5 (Portrait)**. If using Unsplash, use `&w=800&h=1000` for consistent loading.
- **Content**: Ensure the `<div class="desc-row">` structure is maintained for the horizontal arrow-text layout.

### 2. Updating Partner Logos
Location: `index.php` (Logo Track section) & `assets/img/partners/`
- **Filename Convention**: Use lowercase with hyphens (e.g., `company-logo.png`).
- **Logo Style**: Corporate colors are used by default. Grayscale was removed.
- **Adding Logos**: Add to the `logo-track` div. Remember to **duplicate** the list for the infinite scroll effect to work smoothly.

### 3. Modifying Slider Behavior
Location: `assets/js/main.js`
- **Speed**: Adjust `speed` (transition duration) and `delay` (autoplay wait time).
- **Center Focus**: `centeredSlides: true` is critical. Do not remove it as it ensures the center card is the sharp one.

## 💡 Session Continuation Tips (Low-Cost Models)
When starting a new session with a smaller/cheaper AI model:
1.  **Reference these files**: Tell the model to read `README.md`, `ui.md`, and `maintenance.md` first.
2.  **Specific Edits**: Provide the exact file paths.
3.  **Visual Guidelines**: Remind the model about the **4:5 ratio** and **Focus Slider** logic to prevent layout breakage.
4.  **No Inlining**: Strictly instruct the model NOT to add inline `<style>` or `<script>` tags, but to use `home.css` and `main.js`.

---
*Maintained for AB Malaya Sdn Bhd*
