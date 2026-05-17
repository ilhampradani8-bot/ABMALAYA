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

    // --- 2. EMBLA SERVICE CAROUSEL ---
    const emblaNode = document.querySelector("#embla-services");
    if (emblaNode && typeof EmblaCarousel !== "undefined") {
        const viewportNode = emblaNode.querySelector(".embla__viewport");
        const prevBtn = emblaNode.querySelector(".embla__btn--prev");
        const nextBtn = emblaNode.querySelector(".embla__btn--next");
        const dotsWrap = emblaNode.querySelector(".embla__dots");

        const embla = EmblaCarousel(viewportNode, {
            loop: true,
            align: "center",
            skipSnaps: false,
            containScroll: "trimSnaps",
            dragFree: false
        });

        // Set 'is-selected' class to the active card
        function setSelectedSlideClass() {
            const slides = emblaNode.querySelectorAll(".embla__slide");
            slides.forEach(slide => slide.classList.remove("is-selected"));
            
            const idx = embla.selectedScrollSnap();
            const slideNodes = embla.slideNodes();
            if (slideNodes && slideNodes[idx]) {
                slideNodes[idx].classList.add("is-selected");
            }
        }

        // Build dots navigation dynamically
        function buildDots() {
            if (!dotsWrap) return;
            dotsWrap.innerHTML = "";

            const count = embla.scrollSnapList().length;
            for (let i = 0; i < count; i++) {
                const dot = document.createElement("button");
                dot.type = "button";
                dot.className = "embla__dot";
                dot.setAttribute("role", "tab");
                dot.setAttribute("aria-label", "Go to slide " + (i + 1));
                dot.setAttribute("aria-selected", "false");
                dot.addEventListener("click", () => {
                    embla.scrollTo(i);
                    resetAutoplay();
                });
                dotsWrap.appendChild(dot);
            }
        }

        // Set active state for dots
        function setDotState() {
            if (!dotsWrap) return;
            const dots = dotsWrap.querySelectorAll(".embla__dot");
            const idx = embla.selectedScrollSnap();

            dots.forEach((dot, i) => {
                dot.setAttribute("aria-selected", i === idx ? "true" : "false");
            });
        }

        // Navigation button event listeners
        if (prevBtn) {
            prevBtn.addEventListener("click", () => {
                embla.scrollPrev();
                resetAutoplay();
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener("click", () => {
                embla.scrollNext();
                resetAutoplay();
            });
        }

        // Autoplay Logic
        let autoplayId = null;
        const autoplayDelay = 5000;

        function startAutoplay() {
            stopAutoplay();
            autoplayId = setInterval(() => {
                if (embla) embla.scrollNext();
            }, autoplayDelay);
        }

        function stopAutoplay() {
            if (autoplayId) {
                clearInterval(autoplayId);
                autoplayId = null;
            }
        }

        function resetAutoplay() {
            startAutoplay();
        }

        function onSelect() {
            setSelectedSlideClass();
            setDotState();
        }

        // Initialize Carousel Event Listeners
        embla.on("select", onSelect);
        embla.on("pointerDown", stopAutoplay);
        embla.on("pointerUp", startAutoplay);

        embla.on("reInit", () => {
            buildDots();
            onSelect();
        });

        // First paint / init
        buildDots();
        onSelect();
        startAutoplay();

        // Delay reinit to guarantee correct slide measurement on first load
        window.setTimeout(() => {
            embla.reInit();
        }, 50);

        // Smart Resize handler with debounce
        window.addEventListener("resize", (() => {
            let timer = null;
            return () => {
                window.clearTimeout(timer);
                timer = window.setTimeout(() => {
                    embla.reInit();
                }, 100);
            };
        })());
    }
});
