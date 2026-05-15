/**
 * AB Malaya - Main JavaScript
 * Handling page interactions and animations
 */

document.addEventListener('DOMContentLoaded', () => {
    initServiceSlider();
});

/**
 * Service Slider Logic for index.php using SwiperJS
 */
function initServiceSlider() {
    const swiper = new Swiper(".service-swiper", {
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
    });
}
