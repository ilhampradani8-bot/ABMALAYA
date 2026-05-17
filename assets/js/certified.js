/**
 * AB Malaya - Certified Page Specific Logic
 * Handling reveal animations and interactive elements
 */

document.addEventListener('DOMContentLoaded', () => {
    // Reveal Animations using Intersection Observer (matching the global pattern but enhanced)
    // Reveal Animations using Intersection Observer
    const certCards = document.querySelectorAll('.cert-card-neu');
    const statsItems = document.querySelectorAll('.stats-card-neu > div');
    
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

    certCards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(40px)";
        card.style.transition = `opacity 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${index * 0.15}s, transform 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${index * 0.15}s`;
        revealObserver.observe(card);
    });

    statsItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateX(20px)";
        item.style.transition = `opacity 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${0.5 + index * 0.2}s, transform 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${0.5 + index * 0.2}s`;
        revealObserver.observe(item);
    });

});
