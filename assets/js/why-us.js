/**
 * AB Malaya - Why Us Page Specific Logic
 * Handling scroll reveal animations and 3D VanillaTilt on Core Strengths Cards (.pillar-card-3d)
 */

document.addEventListener('DOMContentLoaded', () => {
    const pillarCards = document.querySelectorAll('.pillar-card-3d');
    
    // --- 1. 3D PERSPECTIVE MOUSE TILT (EXACTLY MATCHING INDEX.JS) ---
    if (typeof VanillaTilt !== 'undefined' && pillarCards.length > 0) {
        VanillaTilt.init(pillarCards, {
            max: 15,
            speed: 400,
            glare: true,
            "max-glare": 0.2,
            perspective: 1000,
            scale: 1.05
        });
    }

    // --- 2. SCROLL REVEAL ANIMATIONS FOR PILLAR CARDS ---
    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                observer.unobserve(entry.target);
            }
        });
    }, revealOptions);

    pillarCards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(40px)";
        card.style.transition = `opacity 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${index * 0.12}s, transform 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${index * 0.12}s`;
        revealObserver.observe(card);
    });
});
