/**
 * AB MALAYA - Service Slider Logic
 * Handles Swiper initialization, background syncing, and Dual-State transitions.
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Service JS Loaded');
    const sectionWrap = document.getElementById('service-section-wrap');
    const shutter = document.getElementById('bg-shutter');
    const menuItems = document.querySelectorAll('.service-link-item');
    
    if (!sectionWrap) {
        console.error('Service section wrap not found');
        return;
    }

    const updateBG = (swiper) => {
        if (!swiper || !swiper.slides || swiper.slides.length === 0) return;
        const activeSlide = swiper.slides[swiper.activeIndex];
        if (!activeSlide) return;
        
        const bgUrl = activeSlide.getAttribute('data-bg');
        const realIndex = swiper.realIndex;
        
        // Trigger Flash
        if (shutter) {
            shutter.classList.remove('active');
            void shutter.offsetWidth; // Force reflow
            shutter.classList.add('active');
        }

        // Update Menu Active State
        menuItems.forEach((btn, idx) => {
            btn.classList.toggle('active', idx === realIndex);
        });

        // Sync BG change
        setTimeout(() => {
            if(bgUrl) sectionWrap.style.backgroundImage = `url('${bgUrl}')`;
        }, 350);
    };

    // Initialize Swiper
    const serviceSwiper = new Swiper('.service-swiper', {
        slidesPerView: 1,
        loop: true,
        speed: 800,
        on: {
            init: function () {
                console.log('Swiper Initialized');
                setTimeout(() => updateBG(this), 100);
            },
            slideChangeTransitionStart: function () {
                updateBG(this);
            }
        }
    });

    // Global Click Delegation for Reliability
    document.addEventListener('click', function(e) {
        const readMore = e.target.closest('.read-more-link');
        const backBtn = e.target.closest('.detail-back-btn');

        if (readMore) {
            console.log('Read More Clicked');
            e.preventDefault();
            e.stopPropagation();
            const card = readMore.closest('.static-service-card');
            const swiperSlide = readMore.closest('.swiper-slide');
            const currentBg = swiperSlide.getAttribute('data-bg');

            if (!card) return;

            card.classList.add('trigger-flash');
            
            setTimeout(() => {
                card.classList.add('is-detailed');
                if (sectionWrap && currentBg) {
                    sectionWrap.style.backgroundImage = `url('${currentBg}')`;
                }
            }, 400);

            setTimeout(() => {
                card.classList.remove('trigger-flash');
            }, 800);
        }

        if (backBtn) {
            console.log('Back Button Clicked');
            e.preventDefault();
            e.stopPropagation();
            const card = backBtn.closest('.static-service-card');
            if (!card) return;

            card.classList.add('trigger-flash');
            setTimeout(() => {
                card.classList.remove('is-detailed');
            }, 400);
            
            setTimeout(() => {
                card.classList.remove('trigger-flash');
            }, 800);
        }
    }, true); // Use capture phase to bypass Swiper event blocking

    // Menu Click Handler
    menuItems.forEach(btn => {
        btn.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            if (!isNaN(index) && index >= 0 && index < 8) {
                serviceSwiper.slideToLoop(index);
            }
        });
    });

    // Final layout sync
    setTimeout(() => {
        if (serviceSwiper.update) serviceSwiper.update();
    }, 500);

    // Re-sync on window resize
    window.addEventListener('resize', () => {
        if (serviceSwiper.update) serviceSwiper.update();
    });
});
