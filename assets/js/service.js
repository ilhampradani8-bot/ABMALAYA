/**
 * AB MALAYA - Services Page Logic
 * Handles 3D Perspective Slider and Detail Section Sync
 */

document.addEventListener('DOMContentLoaded', () => {
    const sliders = document.querySelectorAll(".slide");
    if (sliders.length === 0) return;

    // Center starting point (middle of the slides array)
    let center = Math.floor(sliders.length / 2);
    
    /**
     * Updates slide positions based on the current 'center' index
     */
    function updatePositions() {
        sliders.forEach((slide, index) => {
            // Clear existing position classes
            slide.classList.remove("position-1", "position-2", "position-3", "position-4", "position-5", "position-none");
            
            // Calculate relative offset from center with looping logic
            let diff = index - center;
            
            // Wrap around logic for seamless looping
            if (diff < -2) diff += sliders.length;
            if (diff > 3) diff -= sliders.length;
            if (diff < -sliders.length / 2) diff += sliders.length;
            if (diff > sliders.length / 2) diff -= sliders.length;

            // Assign position classes based on diff
            if (diff === -2) slide.classList.add("position-1");
            else if (diff === -1) slide.classList.add("position-2");
            else if (diff === 0) slide.classList.add("position-3");
            else if (diff === 1) slide.classList.add("position-4");
            else if (diff === 2) slide.classList.add("position-5");
            else slide.classList.add("position-none");

            // Sync detail section with active (center) card
            if (diff === 0) {
                const activeId = slide.getAttribute('data-id');
                showDetail(activeId, false);
            }
        });
    }

    // Navigation functions
    function nextSlide() { 
        center = (center + 1) % sliders.length; 
        updatePositions(); 
    }
    
    function prevSlide() { 
        center = (center - 1 + sliders.length) % sliders.length; 
        updatePositions(); 
    }

    // Attach navigation events
    const nextBtn = document.getElementById('slide-next');
    const prevBtn = document.getElementById('slide-prev');
    
    if (nextBtn) nextBtn.onclick = nextSlide;
    if (prevBtn) prevBtn.onclick = prevSlide;

    // Click handler for cards
    sliders.forEach((slide, i) => {
        slide.onclick = () => {
            if (slide.classList.contains('position-3')) {
                // If active card is clicked, scroll to detail section
                const element = document.getElementById(slide.getAttribute('data-id'));
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            } else {
                // If side card is clicked, move it to center
                center = i;
                updatePositions();
            }
        };
    });

    // Initialize
    updatePositions();
    
    // Autoplay (every 5 seconds)
    setInterval(nextSlide, 5000);
});

/**
 * Shows the corresponding detail block and hides others
 * @param {string} id - The ID of the detail block to show
 * @param {boolean} shouldScroll - Whether to scroll to the block
 */
function showDetail(id, shouldScroll) {
    const detailBlocks = document.querySelectorAll('.service-detail-block');
    detailBlocks.forEach(block => {
        block.style.display = 'none';
    });

    const target = document.getElementById(id);
    if (target) {
        target.style.display = 'block';
        if (shouldScroll) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
}
