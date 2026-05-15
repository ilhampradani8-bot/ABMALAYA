/**
 * AB Malaya - Main JavaScript
 * Handling page interactions and animations
 */

document.addEventListener('DOMContentLoaded', () => {
    initServiceSlider();
    initLogoSlider();
});

/**
 * Service Slider Logic for index.php using SwiperJS
 */
function initServiceSlider() {
    const swiperOptions = {
        slidesPerView: "auto",
        centeredSlides: true,
        loop: true,
        speed: 1000,
        grabCursor: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next-custom",
            prevEl: ".swiper-button-prev-custom",
        },
    };

    const swiper = new Swiper(".service-swiper", swiperOptions);
}

/**
 * Logo Slider (Marquee style) for index.php
 */
function initLogoSlider() {
    const logoSwiper = new Swiper(".logo-swiper", {
        slidesPerView: "auto",
        loop: true,
        speed: 5000,
        allowTouchMove: true, // "bisa di scrol"
        grabCursor: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: true, // "bisa di stop"
        },
        freeMode: {
            enabled: true,
            momentum: false,
        },
    });
}
