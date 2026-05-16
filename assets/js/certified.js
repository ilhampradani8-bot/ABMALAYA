/**
 * AB Malaya - Certified Page Specific Logic
 * Handling reveal animations and interactive elements
 */

document.addEventListener('DOMContentLoaded', () => {
    // Reveal Animations using Intersection Observer (matching the global pattern but enhanced)
    const certCards = document.querySelectorAll('.cert-card-neu');
    const statsItems = document.querySelectorAll('.glass-stats-card > div');
    
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
        card.style.transition = `all 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${index * 0.15}s`;
        revealObserver.observe(card);
    });

    statsItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateX(20px)";
        item.style.transition = `all 0.8s cubic-bezier(0.2, 1, 0.3, 1) ${0.5 + index * 0.2}s`;
        revealObserver.observe(item);
    });

    // Special Hover Effect for Stats Card
    const statsCard = document.querySelector('.glass-stats-card');
    if (statsCard) {
        statsCard.addEventListener('mousemove', (e) => {
            const rect = statsCard.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            statsCard.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
        });
        
        statsCard.addEventListener('mouseleave', () => {
            statsCard.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)`;
        });
    }
});
