<?php 
/**
 * Shared Hero Visual Section
 * Variables: 
 * $heroTitle - The big title (grey part)
 * $heroSubtitle - The accented title part
 * $heroDesc - The descriptive paragraph
 * $showButtons - Boolean to show CTA buttons
 */

// Dynamically scan assets/img/head/ directory to support both webp and png automatically
$imgFolder = 'assets/img/head/';
$images = [];
if (is_dir($imgFolder)) {
    $files = scandir($imgFolder);
    foreach ($files as $file) {
        $filePath = $imgFolder . $file;
        if (is_file($filePath)) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, ['webp', 'png', 'jpg', 'jpeg', 'gif', 'svg'])) {
                $images[] = $filePath;
            }
        }
    }
}

if (empty($images)) {
    $images = [
        'assets/img/head/greeen.webp',
        'assets/img/head/greeen1.webp',
        'assets/img/head/logistik.webp',
        'assets/img/head/logistik1.webp',
        'assets/img/head/logistik2.webp',
        'assets/img/head/logistik3.jpeg',
        'assets/img/head/marine.webp',
        'assets/img/head/marine1.webp',
        'assets/img/head/marine2.webp',
        'assets/img/head/marine3.webp',
        'assets/img/head/marine4.webp'
    ];
}
?>
<style>
    /* Critical load-time styles to hide unstyled/stacking images instantly */
    .hero-images-layer { opacity: 0; position: absolute; }
    .img-wrap { opacity: 0; position: absolute; }
</style>
<section class="intro-visual">
    <div class="intro-bg-wrap">
        <canvas id="hero-canvas"></canvas>
    </div>

    <!-- Machinery Layer (Full Height, Right, Dynamic Randomized Carousel representing all divisions) -->
    <div class="hero-images-layer">
        <div class="sequential-container" id="hero-machinery-container">
            <?php foreach ($images as $img): 
                $fileName = pathinfo($img, PATHINFO_FILENAME);
                // Convert file name to clean human readable alt text
                $altText = ucwords(str_replace(['-', '_'], ' ', $fileName));
            ?>
            <div class="img-wrap">
                <img src="<?php echo htmlspecialchars($img); ?>?v=<?php echo file_exists($img) ? filemtime($img) : time(); ?>" alt="<?php echo htmlspecialchars($altText); ?>">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="intro-content">
        <div class="container">
            <div class="hero-interactive-area" onclick="toggleHeroContent()">
                <div id="hero-title-node" class="hero-node active">
                    <?php if(isset($heroSubtitle) && $heroSubtitle !== ""): ?>
                        <span class="hero-badge"><?php echo $heroSubtitle; ?></span>
                    <?php endif; ?>
                    <h1><?php echo $heroTitle; ?></h1>
                    <div class="interaction-hint mobile-only"><i class="fas fa-hand-pointer"></i> Click for details</div>
                </div>
                <div id="hero-desc-node" class="hero-node">
                    <p class="desc-mobile"><?php echo $heroDesc; ?></p>
                    <div class="interaction-hint mobile-only"><i class="fas fa-undo"></i> Back to title</div>
                </div>
            </div>
            <?php if(isset($showButtons) && $showButtons): 
                $btn1Text = isset($heroBtn1Text) ? $heroBtn1Text : "Our Services";
                $btn2Text = isset($heroBtn2Text) ? $heroBtn2Text : "Get a Quote";
                $btn1Link = isset($heroBtn1Link) ? $heroBtn1Link : "/services";
                $btn2Link = isset($heroBtn2Link) ? $heroBtn2Link : "/contact";
            ?>
            <div class="hero-btns">
                <a href="<?php echo htmlspecialchars($btn1Link); ?>" class="hero-link"><?php echo htmlspecialchars($btn1Text); ?> <i class="fas fa-arrow-right"></i></a>
                <a href="<?php echo htmlspecialchars($btn2Link); ?>" class="hero-link secondary-link"><?php echo htmlspecialchars($btn2Text); ?> <i class="fas fa-arrow-right"></i></a>
            </div>
            <?php endif; ?>
            <?php if(isset($customHeroContent) && $customHeroContent !== ""): ?>
                <div class="hero-custom-content">
                    <?php echo $customHeroContent; ?>
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
        pointer-events: none; /* Let clicks/hovers pass to machinery below */
    }
    
    .hero-images-layer {
        position: absolute;
        top: 0;
        right: 0;
        width: 55%;
        height: 100%;
        z-index: 2;
        pointer-events: none;
        opacity: 0; /* Hidden by default to prevent load-time overlapping FOUC */
        transition: opacity 0.8s ease-in-out; /* Smooth fade-in when JS is active */
    }
    .sequential-container {
        position: relative;
        width: 100%;
        height: 100%;
        pointer-events: none;
        will-change: transform;
    }
    
    .img-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        display: flex;
        align-items: flex-end; 
        justify-content: flex-end; 
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        will-change: opacity;
    }
    .img-wrap.active {
        opacity: 1;
        pointer-events: auto;
    }
    .img-wrap img {
        height: 100%; 
        width: auto;
        max-width: 100%;
        object-fit: contain;
        object-position: right bottom; 
        filter: none;
        pointer-events: none;
        will-change: opacity;
    }

    .intro-content {
        position: relative;
        z-index: 20;
        color: #000;
        max-width: 45%;
        padding-top: 160px; /* Increased to avoid logo collision */
        animation: fadeInLeft 1.2s ease forwards;
    }
    .hero-badge {
        display: inline-block;
        padding: 6px 15px;
        background: #1191cc;
        color: #fff;
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        font-size: 0.7rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        box-shadow: 4px 4px 0px #000;
        border: 2px solid #000;
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
        background: #1191cc;
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
    /* --- INTERACTIVE HERO SYSTEM (GLOBAL/DESKTOP) --- */
    .hero-interactive-area {
        margin-bottom: 2.5rem;
    }
    .hero-node {
        display: block;
    }
    .interaction-hint {
        display: none !important; /* Always hide on Desktop */
    }
    .desc-mobile {
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2.5rem;
        opacity: 0.8;
        color: #475569;
        max-width: 90%;
    }

    /* --- MOBILE RESPONSIVE --- */
    @media (max-width: 768px) {
        .intro-visual { 
            display: block !important;
            height: 100vh !important;
            min-height: 600px !important;
            padding: 90px 0 0 !important; 
            background: #fff !important;
            position: relative !important;
            overflow: hidden !important;
        }
        .intro-visual::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to bottom, #ffffff 10%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 100%) !important;
            z-index: 5;
            pointer-events: none;
        }
        .hero-images-layer { 
            display: block !important; 
            position: absolute !important;
            width: 100% !important; 
            height: 80% !important; 
            top: auto !important; 
            bottom: 0 !important; 
            right: 0 !important; 
            z-index: 1 !important; 
            opacity: 1 !important; 
        }
        .img-wrap {
            justify-content: flex-end !important; 
            align-items: flex-end !important; 
            display: flex !important;
            width: 100% !important;
            height: 100% !important;
        }
        .img-wrap img {
            height: auto !important; 
            width: 115% !important; /* Force touch edges */
            max-width: none !important;
            object-fit: contain !important;
            object-position: bottom right !important;
            transform: translateX(5%); /* Slight adjustment */
            opacity: 0.9;
        }
        .intro-content { 
            width: 100% !important;
            max-width: 100% !important;
            z-index: 20 !important; 
            position: relative !important;
            padding: 0 20px !important;
        } 
        .intro-content .container {
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
        }
        .intro-content h1 { 
            font-size: 2rem !important; 
            line-height: 1.1 !important; 
            margin: 0 !important; 
            color: #000 !important;
            width: 100% !important;
        }

        /* Toggle System Activation (Mobile Only) */
        .hero-interactive-area {
            cursor: pointer;
            min-height: 130px;
            margin-bottom: 2rem;
        }
        .hero-node { display: none; }
        .hero-node.active { 
            display: block; 
            animation: fadeInHero 0.5s ease forwards;
        }
        .interaction-hint { 
            display: block !important; 
            font-size: 0.75rem;
            color: var(--accent);
            margin-top: 10px;
            opacity: 0.8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .desc-mobile {
            font-size: 0.95rem !important;
            line-height: 1.5 !important;
        }
        @keyframes fadeInHero {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-btns { 
            display: flex !important;
            flex-direction: row !important; 
            gap: 1rem !important; 
        }
    }
</style>

<script>
    function toggleHeroContent() {
        if (window.innerWidth <= 768) {
            const title = document.getElementById('hero-title-node');
            const desc = document.getElementById('hero-desc-node');
            title.classList.toggle('active');
            desc.classList.toggle('active');
        }
    }
</script>

<script>
(function() {
    const canvas = document.getElementById('hero-canvas');
    const ctx = canvas.getContext('2d');
    let dots = [];
    const spacing = 38; // Restored to original density
    let mouse = { x: -1000, y: -1000, radius: 220 };
    let lastScrollY = -1;

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
        const isMobile = window.innerWidth <= 768;
        const dotSize = isMobile ? 1.8 : 2.4; // Larger dots for better visibility
        const currentSpacing = isMobile ? 30 : spacing; 

        for (let x = 0; x < canvas.width; x += currentSpacing) {
            for (let y = 0; y < canvas.height; y += currentSpacing) {
                dots.push({
                    x: x, y: y,
                    targetX: x, targetY: y,
                    baseX: x, baseY: y,
                    size: dotSize, 
                    color: 'rgba(17, 145, 204, 0.3)'
                });
            }
        }
    }

    const sequentialContainer = document.querySelector('.sequential-container');
    const easing = 0.08;
    let animationFrameId = null;
    let isHeroVisible = true;

    function animate() {
        if (!isHeroVisible) return;

        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        const scrollY = window.scrollY;
        


        for (let i = 0; i < dots.length; i++) {
            let dot = dots[i];
            let dx = mouse.x - dot.baseX;
            let dy = (mouse.y + scrollY) - dot.baseY;
            let distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < mouse.radius) {
                let force = (mouse.radius - distance) / mouse.radius;
                let moveX = (dx / distance) * force * 35;
                let moveY = (dy / distance) * force * 35;
                dot.targetX = dot.baseX - moveX;
                dot.targetY = dot.baseY - moveY;
                dot.color = `rgba(17, 145, 204, ${0.3 + force * 0.45})`;
            } else {
                dot.targetX = dot.baseX;
                dot.targetY = dot.baseY;
                dot.color = 'rgba(17, 145, 204, 0.3)';
            }

            dot.x += (dot.targetX - dot.x) * easing;
            dot.y += (dot.targetY - dot.y) * easing;

            // PERFORMANCE FIX: Use fillRect instead of arc for large dot arrays
            ctx.fillStyle = dot.color;
            ctx.fillRect(dot.x - dot.size/2, dot.y - dot.size/2, dot.size, dot.size);
        }
        animationFrameId = requestAnimationFrame(animate);
    }

    // INTERSECTION OBSERVER TO PAUSE ANIMATION WHEN OUT OF VIEW
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                isHeroVisible = entry.isIntersecting;
                if (isHeroVisible) {
                    if (!animationFrameId) {
                        animationFrameId = requestAnimationFrame(animate);
                    }
                } else {
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                }
            });
        }, { threshold: 0 });
        observer.observe(document.querySelector('.intro-visual'));
    } else {
        animate();
    }
})();
</script>

<!-- Dynamic Random Shuffling & Non-Consecutive Rotation Slider Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("hero-machinery-container");
    if (!container) return;
    
    const rawWraps = Array.from(container.getElementsByClassName("img-wrap"));
    if (rawWraps.length === 0) return;
    
    // Category mapping helper based on image file names/prefixes
    function getCategory(item) {
        const img = item.querySelector("img");
        if (!img) return "";
        const src = img.getAttribute("src") || "";
        const filename = src.split('/').pop().split('.')[0].toLowerCase();
        
        // Dynamic prefix split by digits, dash or underscore (e.g. marine1 -> marine, greeen-eart -> greeen)
        const parts = filename.split(/[-_\d]/);
        const prefix = parts[0] || "";
        
        // Normalize common category aliases
        if (prefix === 'green' || prefix === 'greeen') return 'greeen';
        if (prefix === 'cargo' || prefix === 'c' || prefix === 'marine') return 'marine';
        if (prefix === 'logistic' || prefix === 'logistik') return 'logistik';
        if (prefix === 'construction' || prefix.includes('escavator') || prefix === 'bgcool' || prefix.includes('rust')) return 'construction';
        return prefix;
    }
    
    // Backtracking / Greedy shuffle algorithm to ensure NO consecutive categories show up
    function generateNonConsecutiveSequence(items) {
        // 1. Initial random shuffle first
        const shuffled = [...items];
        for (let i = shuffled.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            const temp = shuffled[i];
            shuffled[i] = shuffled[j];
            shuffled[j] = temp;
        }
        
        const result = [];
        const pool = [...shuffled];
        
        // Backtracking builder to satisfy strict adjacent & loop-wrap category constraints
        function build() {
            if (result.length === items.length) {
                // Prevent category loop wrap: last item category !== first item category
                if (getCategory(result[result.length - 1]) !== getCategory(result[0])) {
                    return true;
                }
                return false;
            }
            
            const lastCategory = result.length > 0 ? getCategory(result[result.length - 1]) : null;
            
            for (let i = 0; i < pool.length; i++) {
                const candidate = pool[i];
                const candidateCategory = getCategory(candidate);
                
                if (candidateCategory !== lastCategory) {
                    result.push(candidate);
                    pool.splice(i, 1);
                    
                    if (build()) return true;
                    
                    // Backtrack
                    pool.splice(i, 0, candidate);
                    result.pop();
                }
            }
            return false;
        }
        
        if (build()) return result;
        
        // Fallback greedy approach if backtracking constraints are mathematically impossible
        const fallbackResult = [];
        const remaining = [...shuffled];
        let prevCategory = null;
        
        while (remaining.length > 0) {
            let index = remaining.findIndex(item => getCategory(item) !== prevCategory);
            if (index === -1) index = 0; // Take first if forced
            
            const item = remaining[index];
            prevCategory = getCategory(item);
            fallbackResult.push(item);
            remaining.splice(index, 1);
        }
        return fallbackResult;
    }
    
    // Generate the optimized non-consecutive randomized sequence
    const wraps = generateNonConsecutiveSequence(rawWraps);
    
    // Clear container and append wraps back in optimized non-consecutive order
    container.innerHTML = "";
    wraps.forEach(wrap => container.appendChild(wrap));
    
    let currentIndex = 0;
    
    function showNextImage() {
        // 1. Fade out current active image completely
        wraps[currentIndex].classList.remove("active");
        
        // 2. Wait for the 600ms fade-out transition to fully finish
        setTimeout(() => {
            // 3. Move to next index
            currentIndex = (currentIndex + 1) % wraps.length;
            
            // 4. Fade in next randomized image
            wraps[currentIndex].classList.add("active");
        }, 600); // 600ms matches the CSS opacity transition duration exactly!
    }
    
    // Initially activate the first randomized image
    wraps[0].classList.add("active");
    
    // Fade in the machinery layer container once JS is ready
    const layer = container.closest(".hero-images-layer");
    if (layer) {
        requestAnimationFrame(() => {
            layer.style.opacity = "1";
        });
    }
    
    // Cycle every 5 seconds (5000ms)
    setInterval(showNextImage, 5000);
});
</script>


