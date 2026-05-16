/**
 * AB MALAYA - Contact Page Logic
 * Handles GSAP entry animations and 3D interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    const isMobile = window.innerWidth <= 768;

    // --- 1. ENTRY ANIMATIONS (GSAP) ---
    if (typeof gsap !== 'undefined') {
        // Hero Content
        gsap.from('.hero-content > *', {
            y: 50,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: 'power3.out'
        });

        // Contact Grid Entry
        gsap.from('.contact-form-side', {
            x: -100,
            opacity: 0,
            duration: 1.2,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: '.contact-main',
                start: 'top 80%'
            }
        });

        gsap.from('.contact-info-side > *', {
            x: 100,
            opacity: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: '.contact-main',
                start: 'top 80%'
            }
        });
    }

    // --- 2. 3D CARD INTERACTION ---
    // Only enabled on mobile as per user request
    if (isMobile && typeof VanillaTilt !== 'undefined') {
        const popCards = document.querySelectorAll('.neu-card-3d-pop, .glass-info-card');
        const raisedCards = document.querySelectorAll('.neu-card-raised');
        
        // Enhanced 3D for Form and Glass Card
        VanillaTilt.init(popCards, {
            max: 15,
            speed: 300,
            easing: "cubic-bezier(.03,.98,.52,.99)",
            scale: 1.05,
            glare: true,
            "max-glare": 0.2,
            perspective: 1000,
            gyroscope: true,
            gyroscopeMinAngleX: -45,
            gyroscopeMaxAngleX: 45,
            gyroscopeMinAngleY: -45,
            gyroscopeMaxAngleY: 45
        });

        // Subtle Tilt for Info Cards
        VanillaTilt.init(raisedCards, {
            max: 5,
            speed: 400,
            perspective: 1000,
            scale: 1.02,
            gyroscope: true
        });
    }

    // --- 3. FORM INTERACTION ---
    const inputs = document.querySelectorAll('.neu-input-inset input, .neu-input-inset select, .neu-input-inset textarea');
    inputs.forEach(input => {
        const parent = input.closest('.neu-input-inset');
        input.addEventListener('focus', () => {
            parent.style.borderColor = 'rgba(0, 94, 233, 0.5)';
            parent.style.boxShadow = 'inset 8px 8px 16px #b8bcc2, inset -8px -8px 16px #ffffff, 0 0 10px rgba(0, 94, 233, 0.1)';
        });
        input.addEventListener('blur', () => {
            parent.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            parent.style.boxShadow = 'inset 6px 6px 12px #b8bcc2, inset -6px -6px 12px #ffffff';
        });
    });
});
