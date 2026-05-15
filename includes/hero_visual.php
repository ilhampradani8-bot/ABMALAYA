<?php 
/**
 * Shared Hero Visual Section
 * Variables: 
 * $heroTitle - The big title (grey part)
 * $heroSubtitle - The accented title part
 * $heroDesc - The descriptive paragraph
 * $showButtons - Boolean to show CTA buttons
 */
?>
<section class="intro-visual">
    <div class="intro-bg-wrap">
        <canvas id="hero-canvas"></canvas>
        <div class="hero-art-container" id="hero-art">
            <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg" class="hero-svg">
                <!-- Background Glow (Blurred inside SVG) -->
                <defs>
                    <filter id="softGlow" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="40" />
                    </filter>
                    <linearGradient id="beamGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#005ee9" stop-opacity="0.3" />
                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
                    </linearGradient>
                </defs>
                
                <!-- The Glow Beam -->
                <circle cx="300" cy="250" r="150" fill="url(#beamGrad)" filter="url(#softGlow)" />

                <!-- Industrial 'h' / Basket Shape (Sharp) -->
                <g class="sharp-art">
                    <path d="M100 150V380" stroke="#005ee9" stroke-width="4" stroke-linecap="round" />
                    <path d="M100 240C100 200 160 180 220 180C280 180 340 200 340 240V380" stroke="#005ee9" stroke-width="4" stroke-linecap="round" />
                    <path d="M100 380H340" stroke="#005ee9" stroke-width="2" stroke-opacity="0.3" stroke-dasharray="8 8" />
                </g>
                
                <!-- Detailed Gear (Sharp) -->
                <g class="sharp-art" transform="translate(380, 180) scale(0.8)">
                    <circle cx="50" cy="50" r="35" stroke="#005ee9" stroke-width="3" stroke-opacity="0.6" />
                    <circle cx="50" cy="50" r="10" stroke="#005ee9" stroke-width="2" stroke-opacity="0.6" />
                    <!-- Gear Teeth -->
                    <path d="M50 5V15M50 85V95M5 50H15M85 50H95M18 18L25 25M75 75L82 82M18 82L25 75M75 18L82 25" stroke="#005ee9" stroke-width="4" stroke-linecap="round" stroke-opacity="0.8" />
                </g>
            </svg>
        </div>
    </div>
    
    <div class="intro-content">
        <div class="container">
            <h1><?php echo $heroTitle; ?> <br><span style="color: #005ee9;"><?php echo $heroSubtitle; ?></span></h1>
            <p><?php echo $heroDesc; ?></p>
            <?php if(isset($showButtons) && $showButtons): ?>
            <div class="hero-btns">
                <a href="services.php" class="hero-link">Our Services <i class="fas fa-arrow-right"></i></a>
                <a href="contact.php" class="hero-link secondary-link">Get a Quote <i class="fas fa-arrow-right"></i></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .intro-visual {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        display: flex;
        align-items: center; /* Centered vertically but aligned left */
        justify-content: flex-start;
        text-align: left;
        background: #ffffff;
        padding-left: 6vw;
    }
    .intro-bg-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    #hero-canvas {
        width: 100%;
        height: 100%;
        display: block;
    }
    .hero-art-container {
        position: absolute;
        top: 15%;
        right: -5%;
        width: 60%;
        height: 70%;
        z-index: 2;
        pointer-events: none;
        display: flex;
        align-items: center;
        justify-content: center;
        filter: blur(40px); /* Creates the "beam of light" pancaran look */
        opacity: 0.6;
    }
    .hero-svg {
        width: 100%;
        height: 100%;
    }
    .intro-content {
        position: relative;
        z-index: 10;
        color: #000; /* Pure Black as requested */
        max-width: 50%; /* Exactly half screen on desktop */
        animation: fadeInLeft 1.2s ease forwards;
    }
    .intro-content h1 {
        font-family: 'Aeonik', sans-serif;
        font-size: 3.2rem; /* Adjusted for longer title */
        font-weight: 700;
        color: #000; /* Pure Black */
        letter-spacing: -1.5px;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }
    .intro-content p {
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2.5rem;
        opacity: 0.8;
        color: #475569;
        max-width: 90%;
    }
    .hero-btns {
        display: flex;
        justify-content: flex-start;
        gap: 3rem;
    }
    .hero-link {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: #0f172a;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
        padding-bottom: 8px;
        transition: 0.3s;
    }
    .hero-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 2px;
        background: #005ee9;
        transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hero-link i {
        font-size: 0.8rem;
        transition: 0.3s;
    }
    .hero-link:hover::after {
        width: 100%;
    }
    .hero-link:hover i {
        transform: translateX(5px);
    }
    .secondary-link {
        color: #64748b;
    }
    .secondary-link::after {
        background: #cbd5e1;
    }

    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 768px) {
        .intro-visual { 
            padding-left: 6vw; /* Exact same as Header Logo padding */
            padding-right: 20px;
            padding-top: 140px; /* Positioned right under the logo */
            padding-bottom: 60px; 
            justify-content: flex-start; 
            text-align: left; 
            align-items: flex-start;
            height: auto;
            min-height: 100vh;
        }
        .intro-content { 
            max-width: 100%; 
        }
        .intro-content h1 { font-size: 2.2rem; letter-spacing: -1px; }
        .intro-content p { font-size: 1rem; max-width: 100%; margin-bottom: 2rem; }
        .hero-btns { flex-direction: column; gap: 1.5rem; align-items: flex-start; }
    }
</style>

<script>
(function() {
    const canvas = document.getElementById('hero-canvas');
    const ctx = canvas.getContext('2d');
    let dots = [];
    const spacing = 35; /* Grid spacing */
    let mouse = { x: -1000, y: -1000, radius: 150 };

    window.addEventListener('mousemove', (e) => {
        mouse.x = e.x;
        mouse.y = e.y;
    });

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        init();
    }
    window.addEventListener('resize', resize);
    resize();

    function init() {
        dots = [];
        for (let x = 0; x < canvas.width; x += spacing) {
            for (let y = 0; y < canvas.height; y += spacing) {
                dots.push({
                    x: x,
                    y: y,
                    targetX: x,
                    targetY: y,
                    baseX: x,
                    baseY: y,
                    size: 1.2,
                    color: 'rgba(0, 94, 233, 0.2)'
                });
            }
        }
    }

    const art = document.getElementById('hero-art');
    const easing = 0.08; /* Smoothing factor - lower is smoother/slower */

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Parallax for Art
        const artMoveX = (mouse.x - window.innerWidth / 2) * -0.02;
        const artMoveY = (mouse.y - window.innerHeight / 2) * -0.02;
        art.style.transform = `translate(${artMoveX}px, ${artMoveY}px)`;

        for (let i = 0; i < dots.length; i++) {
            let dot = dots[i];
            let dx = mouse.x - dot.baseX;
            let dy = mouse.y - dot.baseY;
            let distance = Math.sqrt(dx * dx + dy * dy);
            
            // Calculate where the dot WANTs to be
            if (distance < mouse.radius) {
                let force = (mouse.radius - distance) / mouse.radius;
                let moveX = (dx / distance) * force * 25;
                let moveY = (dy / distance) * force * 25;
                dot.targetX = dot.baseX - moveX;
                dot.targetY = dot.baseY - moveY;
                dot.color = `rgba(0, 94, 233, ${0.2 + force * 0.4})`;
            } else {
                dot.targetX = dot.baseX;
                dot.targetY = dot.baseY;
                dot.color = 'rgba(0, 94, 233, 0.15)';
            }

            // Smoothly move the dot TOWARDS its target
            dot.x += (dot.targetX - dot.x) * easing;
            dot.y += (dot.targetY - dot.y) * easing;

            ctx.fillStyle = dot.color;
            ctx.beginPath();
            ctx.arc(dot.x, dot.y, dot.size, 0, Math.PI * 2);
            ctx.fill();
        }
        requestAnimationFrame(animate);
    }
    animate();
})();
</script>

