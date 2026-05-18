$(function() {
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
    gsap.config({ force3D: true }); // Global GPU Hardware Acceleration booster

    // --- RESPONSIVE HERO PARALLAX ---
    let mm = gsap.matchMedia();

    mm.add({
        isDesktop: "(min-width: 769px)",
        isMobile: "(max-width: 768px)"
    }, (context) => {
        let { isDesktop, isMobile } = context.conditions;

        // Tailored coordinates for mobile vs desktop to prevent cropping and gaps
        let skyStart = 0, skyEnd = -200;
        let cloud1Start = 160, cloud1End = -760; // Lifted up by 60px
        let cloud2Start = -80, cloud2End = -440; // Lifted up by 60px
        let cloud3Start = 20, cloud3End = -580;  // Lifted up by 60px
        let mountBgStart = -10, mountBgEnd = -100;
        let mountMgStart = -30, mountMgEnd = -250;
        let mountFgStart = 60, mountFgEnd = -500;

        // Dynamic scale variables to fit entire city skyline on mobile viewports
        let skyScale = 1, mountBgScale = 1, mountMgScale = 1, mountFgScale = 1;

        // Setup custom triggers for fade-out to give the mask reveal ample time to finish fully
        let fadeStart = 'top 80%', fadeEnd = 'top 20%';

        if (isMobile) {
            // Mobile optimized values (keep city fully visible & prevent sky top/bottom gaps)
            skyStart = 0; skyEnd = -150; // Native SVG handles bleed perfectly

            cloud1Start = 140; cloud1End = -680; // Lifted up by 60px
            cloud2Start = 40; cloud2End = -300;   // Lifted up by 60px
            cloud3Start = 160; cloud3End = -400;  // Lifted up by 60px

            mountBgStart = -140; mountBgEnd = -220; // Lifted upwards to sit proudly above clouds
            mountBgScale = 0.58; // Scaled down to show all city elements horizontally

            mountMgStart = -170; mountMgEnd = -290; // Lifted higher
            mountMgScale = 0.58;

            mountFgStart = -200; mountFgEnd = -380; // Lifted highest
            mountFgScale = 0.58;

            fadeStart = 'top 55%'; // Slower/later fade out on mobile to let mask animation play completely
            fadeEnd = 'top 15%';
        }

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.parallax-wrapper',
                start: 'top top',
                end: 'bottom top',
                scrub: 0.5,
                pin: false, // Disables GSAP pinning to let native CSS position: fixed keep the hero stationary
                pinSpacing: false
            }
        });

        // Distribute timings across a 10-second virtual timeline (matching 180vh scrollable height):
        // 0s - 4.0s: Cloud mask slides up, fully revealing the metallic text early (before Section 2 enters)
        // 0s - 5.0s: All 3D parallax shifts (sky, buildings, clouds) complete
        // 5.0s - 10.0s: Hero remains completely stationary, and Section 2 slides up to naturally overlap it!
        tl.fromTo('.sky', {y: skyStart}, {y: skyEnd, ease: 'none', duration: 5}, 0)
          .fromTo('.cloud1', {y: cloud1Start}, {y: cloud1End, ease: 'none', duration: 4}, 0)
          .fromTo('.cloud2', {y: cloud2Start}, {y: cloud2End, ease: 'none', duration: 5}, 0)
          .fromTo('.cloud3', {y: cloud3Start}, {y: cloud3End, ease: 'none', duration: 5}, 0)
          .fromTo('.mountBg', {y: mountBgStart, scale: mountBgScale, transformOrigin: '50% 100%'}, {y: mountBgEnd, scale: mountBgScale, transformOrigin: '50% 100%', ease: 'none', duration: 5}, 0)
          .fromTo('.mountMg', {y: mountMgStart, scale: mountMgScale, transformOrigin: '50% 100%'}, {y: mountMgEnd, scale: mountMgScale, transformOrigin: '50% 100%', ease: 'none', duration: 5}, 0)
          .fromTo('.mountFg', {y: mountFgStart, scale: mountFgScale, transformOrigin: '50% 100%'}, {y: mountFgEnd, scale: mountFgScale, transformOrigin: '50% 100%', ease: 'none', duration: 5}, 0);

        return () => {
            tl.kill();
        };
    });

    const arrowBtn = document.querySelector('#arrow-btn');
    if(arrowBtn) {
        arrowBtn.addEventListener('mouseenter', () => {
            gsap.to('.arrow', {y: 10, duration: 0.8, ease: 'back.inOut(3)', overwrite: 'auto'});
            gsap.to('.arrow-reveal', {y: 10, duration: 0.8, ease: 'back.inOut(3)', overwrite: 'auto'});
        });
        arrowBtn.addEventListener('mouseleave', () => {
            gsap.to('.arrow', {y: 0, duration: 0.5, ease: 'power3.out', overwrite: 'auto'});
            gsap.to('.arrow-reveal', {y: 0, duration: 0.5, ease: 'power3.out', overwrite: 'auto'});
        });
        arrowBtn.addEventListener('click', () => {
            gsap.to(window, {scrollTo: '#story-section', duration: 1.5, ease: 'power1.inOut'});
        });
    }

    // --- SECTION PARALLAX LOGIC (OPTIMIZED SMOOTH SCRUB) ---
    gsap.set('.neumorphic-card, .funky-tab', { opacity: 1, y: 0 });

    // Staggered smooth entrance animation for the Our Story elements (fade-in in turn)
    const storyElements = [
        '.story-detail-left .tagline',
        '.story-detail-left .story-title-main',
        '.story-detail-left .story-text-container',
        '.story-visual-right .journey-badge-minimal'
    ];

    gsap.set(storyElements, { opacity: 0, y: 40 });

    gsap.to(storyElements, {
        opacity: 1,
        y: 0,
        duration: 1.2,
        ease: "power4.out",
        stagger: 0.2, // Slide up and fade in turns!
        scrollTrigger: {
            trigger: '#story-section',
            start: 'top 75%',
            toggleActions: 'play none none reverse'
        }
    });

    gsap.to('.story-visual-right', {
        y: 30,
        scrollTrigger: {
            trigger: '#story-section',
            start: "top bottom",
            end: "bottom top",
            scrub: 1.2
        }
    });

    // Vision & Mission Scroll Parallax
    gsap.to('.vm-parallax-wrap', {
        y: (i) => i === 0 ? -30 : 30, // Vision goes up, Mission goes down slightly
        scrollTrigger: {
            trigger: '.vision-mission-section',
            start: "top bottom",
            end: "bottom top",
            scrub: 1.2
        }
    });

    gsap.to('.funky-app', {
        y: -20,
        scrollTrigger: {
            trigger: '.funky-values-section',
            start: "top bottom",
            end: "bottom top",
            scrub: 1.2
        }
    });

    // --- ADVANCED 3D PARALLAX CARDS (USER SPEC - OPTIMIZED WITH OVERWRITE) ---
    const parallaxWraps = document.querySelectorAll('.vm-parallax-wrap');
    
    parallaxWraps.forEach(wrap => {
        const card = wrap.querySelector('.vm-parallax-card');
        const bg = wrap.querySelector('.vm-parallax-bg');
        const imgUrl = wrap.getAttribute('data-image');
        
        // Set background image
        if(bg) bg.style.backgroundImage = `url(${imgUrl})`;
        
        wrap.addEventListener('mousemove', (e) => {
            const rect = wrap.getBoundingClientRect();
            const width = rect.width;
            const height = rect.height;
            
            const mouseX = e.clientX - rect.left - width/2;
            const mouseY = e.clientY - rect.top - height/2;
            
            const mousePX = mouseX / width;
            const mousePY = mouseY / height;
            
            // Card Tilt (30deg)
            const rX = mousePX * 30;
            const rY = mousePY * -30;
            
            // Background Shift (-40px)
            const tX = mousePX * -40;
            const tY = mousePY * -40;
            
            gsap.to(card, {
                rotateY: rX,
                rotateX: rY,
                duration: 0.6,
                ease: "power2.out",
                overwrite: "auto"
            });
            
            gsap.to(bg, {
                x: tX,
                y: tY,
                duration: 0.6,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
        
        wrap.addEventListener('mouseleave', () => {
            gsap.to(card, {
                rotateX: 0,
                rotateY: 0,
                duration: 1,
                ease: "power3.out",
                overwrite: "auto"
            });
            
            gsap.to(bg, {
                x: 0,
                y: 0,
                duration: 1,
                ease: "power3.out",
                overwrite: "auto"
            });
        });
    });

    // --- MOBILE GYRO TILT (THROTTLED TO PREVENT LAG/STUTTER) ---
    let lastOrientationUpdate = 0;
    if (window.DeviceOrientationEvent) {
        window.addEventListener('deviceorientation', (e) => {
            const now = Date.now();
            if (now - lastOrientationUpdate < 30) return; // Throttle to ~33fps for maximum CPU performance
            lastOrientationUpdate = now;

            // beta: front back (-180 to 180)
            // gamma: left right (-90 to 90)
            let beta = e.beta; 
            let gamma = e.gamma;

            // Limit and Normalize
            let tiltX = Math.max(-30, Math.min(30, beta - 45)) / 2; // Offset for natural holding angle
            let tiltY = Math.max(-30, Math.min(30, gamma)) / 2;

            // Dynamically rotate the SVG hint icon in real-time
            gsap.to('.tilt-phone-icon', {
                rotation: tiltY * 1.5,
                duration: 0.4,
                ease: "power2.out",
                overwrite: "auto"
            });

            parallaxWraps.forEach(wrap => {
                const card = wrap.querySelector('.vm-parallax-card');
                const bg = wrap.querySelector('.vm-parallax-bg');
                
                // Only apply if in view (simple check)
                const rect = wrap.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    gsap.to(card, {
                        rotateX: tiltX,
                        rotateY: tiltY,
                        duration: 0.6,
                        ease: "power2.out",
                        overwrite: "auto"
                    });
                    gsap.to(bg, {
                        x: tiltY * -2,
                        y: tiltX * -2,
                        duration: 0.6,
                        ease: "power2.out",
                        overwrite: "auto"
                    });
                }
            });
        }, true);
    }

    // Toggle Story Text Function
    window.toggleStoryText = function() {
        const content = document.getElementById('story-text');
        const btn = document.getElementById('story-toggle');
        const label = btn.querySelector('.btn-label');
        
        content.classList.toggle('expanded');
        
        if (content.classList.contains('expanded')) {
            label.textContent = "SHOW LESS";
            gsap.to(btn.querySelector('i'), {rotation: 45, duration: 0.3});
        } else {
            label.textContent = "READ MORE";
            gsap.to(btn.querySelector('i'), {rotation: 0, duration: 0.3});
            gsap.to(window, {scrollTo: {y: "#story-section", offsetY: 0}, duration: 0.8, ease: "power2.inOut"});
        }
        
        setTimeout(() => { ScrollTrigger.refresh(); }, 600);
    };
});
