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
        <img src="assets/img/head/langit-laut-bg.png" class="bg-img" alt="Sea Sky">
    </div>
    
    <!-- Title behind ship -->
    <div class="intro-content-back">
        <div class="container">
            <h1><?php echo $heroTitle; ?> <br><span style="color: var(--accent);"><?php echo $heroSubtitle; ?></span></h1>
        </div>
    </div>

    <!-- Ship in middle -->
    <div class="ship-wrap">
        <img src="assets/img/head/kapal-thanker.png" class="tanker-img" alt="Marine Logistics">
    </div>

    <!-- Paragraph and Buttons in front -->
    <div class="intro-content-front">
        <div class="container">
            <p><?php echo $heroDesc; ?></p>
            <?php if(isset($showButtons) && $showButtons): ?>
            <div class="hero-btns">
                <a href="services.php" class="cta-btn">Our Services</a>
                <a href="contact.php" class="cta-btn" style="background: transparent; border: 2px solid #555; color: #333; margin-left: 1rem;">Get a Quote</a>
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
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .intro-bg-wrap, .ship-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }
    .intro-bg-wrap { z-index: 1; }
    .ship-wrap {
        z-index: 5;
        animation: shipFadeIn 2.5s ease forwards;
    }
    .bg-img, .tanker-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        image-rendering: -webkit-optimize-contrast;
        image-rendering: smooth;
        filter: brightness(1.1) contrast(1.2) saturate(1.1);
    }
    @keyframes shipFadeIn {
        from { opacity: 0; transform: scale(1.02); }
        to { opacity: 1; transform: scale(1); }
    }
    .intro-content-back {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -60%); /* Default for mobile */
        z-index: 2;
        text-align: center;
        width: 100%;
    }
    
    /* Desktop-only shift */
    @media (min-width: 993px) {
        .intro-content-back {
            transform: translate(-50%, -65%); /* Move up more on desktop */
        }
    }

    .intro-content-back h1 {
        font-family: 'Cinzel', serif;
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 4px;
        color: #0f172a; /* Dark Navy Blue */
        opacity: 1;
        text-shadow: 0 0 50px rgba(0,0,0,0.05);
    }
    .intro-content-front {
        position: absolute;
        bottom: 12%;
        left: 0;
        width: 100%;
        z-index: 10;
        text-align: center;
        color: #fff;
    }
    .intro-content-front p {
        font-size: 1.25rem;
        max-width: 900px;
        margin: 0 auto 2rem;
        font-weight: 700;
        line-height: 1.6;
        text-shadow: 0 5px 20px rgba(0,0,0,0.9);
    }
    .blue-text {
        color: #3b82f6;
    }
    .hero-btns {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
    }
    
    /* Maintain Desktop look on Mobile */
    @media (max-width: 992px) {
        .intro-visual { 
            height: 100vh; /* Keep same height */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .intro-bg-wrap, .ship-wrap {
            height: 100vh; /* Keep same ship visual */
        }
        .intro-content-back h1 { 
            font-size: 2.2rem; 
            letter-spacing: 2px; 
            margin: 0;
        }
        .intro-content-front { 
            bottom: 8%; /* Adjust slightly for mobile screen ratio */
        }
        .intro-content-front p { 
            font-size: 0.9rem; 
            padding: 0 20px; 
            margin-bottom: 1.5rem;
        }
        .hero-btns {
            flex-direction: row; /* Keep buttons horizontal if possible */
            gap: 10px;
            padding: 0 15px;
        }
        .hero-btns a { 
            font-size: 0.7rem; 
            padding: 0.8rem 0.5rem; 
            flex: 1; 
            margin: 0 !important; 
        }
    }
</style>
