/**
 * projects.js
 * JavaScript for AB Malaya Projects Page
 * Updated for Premium V2 Cards
 */

document.addEventListener('DOMContentLoaded', () => {
    // Initialize Vanilla Tilt for Project Cards
    const projectCards = document.querySelectorAll(".project-card-v2, .project-card-brutal");
    
    if (typeof VanillaTilt !== 'undefined' && projectCards.length > 0) {
        VanillaTilt.init(projectCards, {
            max: 5,
            speed: 400,
            perspective: 2000,
            scale: 1.01,
            glare: true,
            "max-glare": 0.15,
            gyroscope: true
        });
    }

    // Scroll reveal for project cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    projectCards.forEach(card => {
        // Apply initial styles via JS or CSS
        card.style.opacity = "0";
        card.style.transform = "translateY(50px)";
        card.style.transition = "opacity 0.8s ease, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1)";
        observer.observe(card);
    });

    // Handle class addition for visibility
    const style = document.createElement('style');
    style.innerHTML = `
        .project-card-v2.is-visible, .project-card-brutal.is-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
});
