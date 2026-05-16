/**
 * index.js
 * JavaScript for AB Malaya Home Page
 */

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. PARTNER LOGO TILT ---
    if (typeof VanillaTilt !== 'undefined') {
        VanillaTilt.init(document.querySelectorAll(".client-logo-item"), {
            max: 15,
            speed: 400,
            glare: true,
            "max-glare": 0.2,
            perspective: 1000,
            scale: 1.05
        });
    }

    // --- 2. CUSTOM 3D SERVICE SLIDER ---
    const sliders = document.querySelectorAll(".slide");
    const leftArrow = document.querySelector(".left-arrow");
    const rightArrow = document.querySelector(".right-arrow");
    const sliderContent = document.getElementById('slider-content');

    if (sliders.length > 0) {
        let center = 0; // Start with first slide as active
        
        function updatePositions() {
            sliders.forEach((slide, index) => {
                slide.classList.remove("position-1", "position-2", "position-3", "position-4", "position-5", "position-none");
                
                // Calculate relative positions in a loop
                let diff = index - center;
                
                // Handle wrap-around
                if (diff < -sliders.length / 2) diff += sliders.length;
                if (diff > sliders.length / 2) diff -= sliders.length;

                if (diff === -2) slide.classList.add("position-1");
                else if (diff === -1) slide.classList.add("position-2");
                else if (diff === 0) slide.classList.add("position-3");
                else if (diff === 1) slide.classList.add("position-4");
                else if (diff === 2) slide.classList.add("position-5");
                else slide.classList.add("position-none");
            });
        }

        function leftScroll() {
            center = (center - 1 + sliders.length) % sliders.length;
            updatePositions();
        }

        function rightScroll() {
            center = (center + 1) % sliders.length;
            updatePositions();
        }

        // Autoplay Logic
        let autoPlayInterval = setInterval(rightScroll, 5000);

        function resetAutoplay() {
            clearInterval(autoPlayInterval);
            autoPlayInterval = setInterval(rightScroll, 5000);
        }

        // Event Listeners for Arrows
        if (leftArrow) {
            leftArrow.addEventListener("click", () => {
                leftScroll();
                resetAutoplay();
            });
        }
        if (rightArrow) {
            rightArrow.addEventListener("click", () => {
                rightScroll();
                resetAutoplay();
            });
        }

        // Touch Support
        if (sliderContent) {
            let touchstartX = 0;
            let touchendX = 0;

            sliderContent.addEventListener('touchstart', e => {
                touchstartX = e.changedTouches[0].screenX;
            }, { passive: true });

            sliderContent.addEventListener('touchend', e => {
                touchendX = e.changedTouches[0].screenX;
                handleGesture();
                resetAutoplay();
            }, { passive: true });

            function handleGesture() {
                if (touchendX < touchstartX - 50) rightScroll();
                if (touchendX > touchstartX + 50) leftScroll();
            }
        }

        // Initial positioning
        updatePositions();
    }
});
