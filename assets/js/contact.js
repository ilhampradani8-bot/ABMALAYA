/**
 * AB MALAYA - Contact Page Logic
 * Handles GSAP entry animations for the restructured contact layout
 * (Offices → Contact Details → Map → Inquiry Form)
 */

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. ENTRY ANIMATIONS (GSAP) ---
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        gsap.from('.hero-content > *', {
            y: 50,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: 'power3.out'
        });

        // Office Address Cards - staggered entrance
        const addressCards = document.querySelectorAll('.address-card');
        if (addressCards.length) {
            ScrollTrigger.create({
                trigger: '#office-addresses',
                start: 'top 85%',
                once: true,
                onEnter: () => {
                    gsap.fromTo(addressCards, 
                        { y: 60, opacity: 0 },
                        { y: 0, opacity: 1, duration: 0.8, stagger: 0.15, ease: 'power4.out' }
                    );
                }
            });
        }

        // Contact Detail Cards - staggered entrance
        const detailCards = document.querySelectorAll('.detail-card');
        if (detailCards.length) {
            ScrollTrigger.create({
                trigger: '#contact-details',
                start: 'top 85%',
                once: true,
                onEnter: () => {
                    gsap.fromTo(detailCards,
                        { y: 60, opacity: 0 },
                        { y: 0, opacity: 1, duration: 0.8, stagger: 0.15, ease: 'power4.out' }
                    );
                }
            });
        }

        // Map Section
        const mapCard = document.querySelector('.neo-map-card');
        if (mapCard) {
            ScrollTrigger.create({
                trigger: '#map',
                start: 'top 85%',
                once: true,
                onEnter: () => {
                    gsap.fromTo(mapCard,
                        { y: 80, opacity: 0 },
                        { y: 0, opacity: 1, duration: 1, ease: 'power4.out' }
                    );
                }
            });
        }

        // Inquiry Form
        const formWrapper = document.querySelector('.inquiry-form-wrapper');
        if (formWrapper) {
            ScrollTrigger.create({
                trigger: '#contact-form',
                start: 'top 85%',
                once: true,
                onEnter: () => {
                    gsap.fromTo(formWrapper,
                        { y: 80, opacity: 0 },
                        { y: 0, opacity: 1, duration: 1, ease: 'power4.out' }
                    );
                }
            });
        }
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
            parent.style.borderColor = 'rgba(17, 145, 204, 0.5)';
            parent.style.boxShadow = 'inset 8px 8px 16px #b8bcc2, inset -8px -8px 16px #ffffff, 0 0 10px rgba(17, 145, 204, 0.1)';
        });
        input.addEventListener('blur', () => {
            parent.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            parent.style.boxShadow = 'inset 6px 6px 12px #b8bcc2, inset -6px -6px 12px #ffffff';
        });
    });
});
