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
    </div>

    <!-- Machinery Layer (Full Height, Right, Sequential) -->
    <div class="hero-images-layer">
        <div class="sequential-container">
            <div class="img-wrap s-1">
                <img src="assets/img/head/remove-bg-escavator.png" alt="Engineering Operations">
            </div>
            <div class="img-wrap s-2">
                <img src="assets/img/head/bgcool.png" alt="Industrial Maintenance">
            </div>
            <div class="img-wrap s-3">
                <img src="assets/img/head/bgcoolnew.png" alt="Technical Services">
            </div>
            <div class="img-wrap s-4">
                <img src="assets/img/head/remove-bg-rust-bawah-kanan.png" alt="Engineering Component">
            </div>
        </div>
    </div>
    
    <div class="intro-content">
        <div class="container">
            <h1><?php echo $heroTitle; ?></h1>
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
        align-items: center;
        justify-content: flex-start;
        text-align: left;
        background: #ffffff; /* Pure White Background */
        padding-left: 6vw;
    }
    .intro-bg-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10; /* Dots always on top */
        pointer-events: none;
    }
    #hero-canvas {
        width: 100%;
        height: 100%;
        display: block;
        pointer-events: auto;
    }
    
    .hero-images-layer {
        position: absolute;
        top: 0;
        right: 0;
        width: 55%; /* Half screen + overflow for impact */
        height: 100%;
        z-index: 2; /* Behind dots */
        pointer-events: none;
    }
    .sequential-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .img-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        display: flex;
        align-items: flex-end; /* Mentok bawah */
        justify-content: flex-end; /* Mentok kanan */
        transition: opacity 2.5s ease-in-out;
    }
    .img-wrap img {
        height: 100%; /* Full height atas bawah */
        width: auto;
        max-width: 100%;
        object-fit: contain;
        object-position: right bottom; /* Ensures alignment even if aspect ratio differs */
        filter: none;
        pointer-events: none;
    }

    /* Sequential Animation - 20s cycle (5s each) */
    .s-1 { animation: seqFade 20s infinite 0s; }
    .s-2 { animation: seqFade 20s infinite 5s; }
    .s-3 { animation: seqFade 20s infinite 10s; }
    .s-4 { animation: seqFade 20s infinite 15s; }

    @keyframes seqFade {
        0%, 5% { opacity: 0; }
        10%, 25% { opacity: 1; }
        30%, 100% { opacity: 0; }
    }

    .intro-content {
        position: relative;
        z-index: 20;
        color: #000;
        max-width: 45%;
        animation: fadeInLeft 1.2s ease forwards;
    }
    .intro-content h1 {
        font-family: 'Aeonik', sans-serif;
        font-size: 3.2rem;
        font-weight: 700;
        color: #000;
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
    .hero-link i { font-size: 0.8rem; transition: 0.3s; }
    .hero-link:hover::after { width: 100%; }
    .hero-link:hover i { transform: translateX(5px); }
    .secondary-link { color: #64748b; }
    .secondary-link::after { background: #cbd5e1; }

    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 768px) {
        .intro-visual { 
            padding-left: 6vw;
            padding-right: 20px;
            padding-top: 140px;
            padding-bottom: 60px; 
            justify-content: flex-start; 
            text-align: left; 
            align-items: flex-start;
            height: auto;
            min-height: 100vh;
        }
        .hero-images-layer { display: none; }
        .intro-content { max-width: 100%; }
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
    const spacing = 38; 
    let mouse = { x: -1000, y: -1000, radius: 200 };

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
                    x: x, y: y,
                    targetX: x, targetY: y,
                    baseX: x, baseY: y,
                    size: 2.2, 
                    color: 'rgba(0, 94, 233, 0.25)'
                });
            }
        }
    }

    const easing = 0.08;

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        for (let i = 0; i < dots.length; i++) {
            let dot = dots[i];
            let dx = mouse.x - dot.baseX;
            let dy = mouse.y - dot.baseY;
            let distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < mouse.radius) {
                let force = (mouse.radius - distance) / mouse.radius;
                let moveX = (dx / distance) * force * 35;
                let moveY = (dy / distance) * force * 35;
                dot.targetX = dot.baseX - moveX;
                dot.targetY = dot.baseY - moveY;
                dot.color = `rgba(0, 94, 233, ${0.3 + force * 0.4})`;
            } else {
                dot.targetX = dot.baseX;
                dot.targetY = dot.baseY;
                dot.color = 'rgba(0, 94, 233, 0.22)';
            }

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

