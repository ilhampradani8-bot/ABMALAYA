$(function() {
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

    // --- HERO PARALLAX ---
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: '.parallax-wrapper',
            start: 'top top',
            end: 'bottom top',
            scrub: 1,
            pin: true,
            pinSpacing: false
        }
    });

    tl.fromTo('.sky', {y: 0}, {y: -200}, 0)
      .fromTo('.cloud1', {y: 100}, {y: -800}, 0)
      .fromTo('.cloud2', {y: -150}, {y: -500}, 0)
      .fromTo('.cloud3', {y: -50}, {y: -650}, 0)
      .fromTo('.mountBg', {y: -10}, {y: -100}, 0)
      .fromTo('.mountMg', {y: -30}, {y: -250}, 0)
      .fromTo('.mountFg', {y: -50}, {y: -600}, 0)
      .to('.parallax-main', {opacity: 0, pointerEvents: 'none', scrollTrigger: {
          trigger: '#story-section',
          start: 'top 80%',
          end: 'top 20%',
          scrub: true
      }}, 0);

    const arrowBtn = document.querySelector('#arrow-btn');
    if(arrowBtn) {
        arrowBtn.addEventListener('mouseenter', () => {
            gsap.to('.arrow', {y: 10, duration: 0.8, ease: 'back.inOut(3)', overwrite: 'auto'});
        });
        arrowBtn.addEventListener('mouseleave', () => {
            gsap.to('.arrow', {y: 0, duration: 0.5, ease: 'power3.out', overwrite: 'auto'});
        });
        arrowBtn.addEventListener('click', () => {
            gsap.to(window, {scrollTo: '#story-section', duration: 1.5, ease: 'power1.inOut'});
        });
    }

    // --- SECTION PARALLAX LOGIC (OPTIMIZED SMOOTH SCRUB) ---
    gsap.set('.neumorphic-card, .funky-tab, .story-detail-left', { opacity: 1, y: 0 });

    gsap.to('.story-visual-right', {
        y: 50,
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
