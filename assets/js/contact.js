/**
 * AB MALAYA - Contact Page Logic
 * Handles GSAP entry animations for the restructured contact layout
 * (Offices → Contact Details → Map → Inquiry Form)
 */

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. ENTRY ANIMATIONS (GSAP) ---
    if (typeof gsap !== 'undefined') {
        gsap.from('.hero-content > *', {
            y: 50,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: 'power3.out'
        });

        // Office Address Cards - staggered entrance
        gsap.from('.address-card', {
            y: 60,
            opacity: 0,
            duration: 1,
            stagger: 0.15,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: '#office-addresses',
                start: 'top 80%'
            }
        });

        // Contact Detail Cards - staggered entrance
        gsap.from('.detail-card', {
            y: 60,
            opacity: 0,
            duration: 1,
            stagger: 0.15,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: '#contact-details',
                start: 'top 80%'
            }
        });

        // Map Section
        gsap.from('.neo-map-card', {
            y: 80,
            opacity: 0,
            duration: 1.2,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: '#map',
                start: 'top 80%'
            }
        });

        // Inquiry Form
        gsap.from('.inquiry-form-wrapper', {
            y: 80,
            opacity: 0,
            duration: 1.2,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: '#contact-form',
                start: 'top 80%'
            }
        });
    }

    // --- 2. TILT INTERACTION ---
    if (typeof VanillaTilt !== 'undefined') {
        VanillaTilt.init(document.querySelectorAll('.info-card'), {
            max: 5,
            speed: 400,
            glare: true,
            "max-glare": 0.1,
            scale: 1.02,
            perspective: 1000
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
