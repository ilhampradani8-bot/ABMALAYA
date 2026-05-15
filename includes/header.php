<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . " | AB Malaya Sdn Bhd" : "AB Malaya Sdn Bhd - Marine & Industrial Solutions"; ?></title>
    <meta name="description" content="AB Malaya Sdn Bhd - Specialists in Marine Industrial Services, Cross-Border Logistics, and Environmental Solutions.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=1.1">
    
    <!-- Header-Specific Styles (Laptop & Mobile) -->
    <style>
        header {
            position: fixed;
            top: 25px; /* More breathing room */
            left: 0;
            width: 100%;
            z-index: 1000;
            background: transparent;
            display: flex;
            justify-content: center;
            transition: all 0.4s ease;
            padding: 0 6vw; /* Aligned with Hero Content */
        }

        .header-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* 50/50 Split concept */
            align-items: center;
            width: 100%;
            max-width: 1600px;
        }

        .logo {
            justify-self: start;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 1;
            transform: scale(1);
        }

        .logo img {
            height: 60px;
            width: auto;
            display: block;
        }

        /* Class to hide logo on scroll */
        .logo-hidden {
            opacity: 0;
            pointer-events: none;
            transform: scale(0.8) translateX(-20px);
        }

        /* Modern Capsule Card for Right Side */
        .nav-links {
            justify-self: end;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 0.6rem 2.5rem; /* Slightly wider */
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .nav-links a {
            font-family: 'Aeonik', sans-serif;
            font-weight: 400; /* Thinner font as requested */
            font-size: 0.85rem;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            transition: 0.3s;
            padding: 5px 10px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary);
        }

        .cta-btn {
            background: var(--primary);
            color: var(--white);
            padding: 0.6rem 1.8rem;
            border-radius: 50px; 
            font-weight: 800;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: var(--transition);
        }

        .cta-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 94, 233, 0.2);
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.8rem;
            color: var(--secondary);
            position: relative;
            z-index: 1100;
        }

        #mobile-menu-checkbox {
            display: none;
        }

        /* Laptop / Desktop View */
        @media (min-width: 993px) {
            .mobile-close-label {
                display: none !important;
            }
        }
        /* Mobile View */
        @media (max-width: 992px) {
            .header-container {
                display: grid;
                grid-template-columns: 50px 1fr 50px;
                align-items: center;
                text-align: center;
            }

            .logo {
                grid-column: 2;
                margin: 0 auto;
            }

            .logo img {
                height: 38px; /* Larger mobile logo */
            }

            .menu-toggle {
                display: block;
                grid-column: 1;
                justify-self: start;
            }

        /* Mobile View */
        @media (max-width: 992px) {
            header {
                padding: 0 20px;
                top: 10px;
            }

            .header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo img {
                height: 60px; /* Scaled down for mobile */
            }

            .nav-links {
                position: absolute;
                top: calc(100% + 15px);
                left: 20px;
                right: 20px;
                width: auto;
                height: auto;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(40px);
                flex-direction: column;
                padding: 2.5rem 2rem;
                gap: 1.2rem;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 1050;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-20px);
                border-radius: 30px;
                box-shadow: 0 20px 50px rgba(0,0,0,0.1);
                border: 1px solid rgba(0,0,0,0.05);
            }

            #mobile-menu-checkbox:checked ~ .nav-links {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .nav-links a {
                font-size: 1.1rem;
                width: 100%;
                text-align: center;
                padding: 0.8rem 0;
                border-bottom: 1px solid rgba(0,0,0,0.03);
            }
            
            .cta-btn {
                width: 100%;
                text-align: center;
                margin-top: 1rem;
            }

            .menu-toggle {
                display: block;
            }

            .search-wrap-pc {
                display: none !important;
            }
        }
    </style>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body>
    <header>
        <div class="header-container">
            <input type="checkbox" id="mobile-menu-checkbox">
            
            <!-- Logo (Left) -->
            <a href="/" class="logo">
                <img src="/assets/img/logo-abmalaya.png?v=1.2" alt="AB Malaya Logo">
            </a>

            <!-- Capsule Navigation (Right) -->
            <div class="nav-links">
                <label for="mobile-menu-checkbox" class="mobile-close-label" style="display: none; cursor: pointer; font-size: 1.5rem; margin-bottom: 2rem; color: var(--text-light);">
                    <i class="fas fa-times"></i> Close Menu
                </label>
                <a href="/" class="<?php echo $currentPage == 'home' ? 'active' : ''; ?>">Home</a>
                <a href="/about" class="<?php echo $currentPage == 'about' ? 'active' : ''; ?>">About</a>
                <a href="/services" class="<?php echo $currentPage == 'services' ? 'active' : ''; ?>">Services</a>
                <a href="/careers" class="<?php echo $currentPage == 'careers' ? 'active' : ''; ?>">Careers</a>
                <a href="/contact" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact</a>

                <!-- Integrated Search -->
                <div class="search-wrap-pc" style="display: flex; align-items: center; border-left: 1px solid rgba(0,0,0,0.1); padding-left: 1.5rem; margin-left: 0.5rem;">
                    <form action="/search" method="GET" style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="text" name="q" placeholder="Search..." style="border: none; background: transparent; outline: none; width: 0; transition: 0.3s; padding: 5px 0; font-size: 0.9rem; border-bottom: 1px solid transparent;" id="pc-search-input">
                        <button type="button" onclick="togglePCSearch()" style="background: none; border: none; color: var(--secondary); font-size: 1.1rem; cursor: pointer;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Burger (Mobile Right) -->
            <label for="mobile-menu-checkbox" class="menu-toggle">
                <i class="fas fa-bars bars-icon"></i>
            </label>

    <script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <style>
        /* Smooth Scroll Essential CSS */
        html.lenis, html.lenis body {
            height: auto;
        }
        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }
        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }
        .lenis.lenis-stopped {
            overflow: hidden;
        }
        .lenis.lenis-scrolling iframe {
            pointer-events: none;
        }
    </style>
    <script>
        // Scroll Interaction for Header
        window.addEventListener('scroll', () => {
            const logo = document.querySelector('.logo');
            if (window.scrollY > 10) { /* Hide faster on mobile/start */
                logo.classList.add('logo-hidden');
            } else {
                logo.classList.remove('logo-hidden');
            }
        });

        function togglePCSearch() {
            const input = document.getElementById('pc-search-input');
            if (input.style.width === '0px' || input.style.width === '') {
                input.style.width = '150px';
                input.style.borderBottomColor = 'var(--primary)';
                input.focus();
            } else if (input.value.trim() !== '') {
                input.parentElement.submit();
            } else {
                input.style.width = '0';
                input.style.borderBottomColor = 'transparent';
            }
        }

        function toggleMobileSearch() {
            const overlay = document.getElementById('mobile-search-overlay');
            if (overlay.style.top === '-100%' || overlay.style.top === '') {
                overlay.style.top = '0';
                overlay.style.opacity = '1';
                overlay.style.visibility = 'visible';
                overlay.querySelector('input').focus();
            } else {
                overlay.style.top = '-100%';
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
            }
        }

        // Initialize Lenis Smooth Scroll
        const lenis = new Lenis({
            duration: 1.4, /* Slightly slower for that luxurious feel */
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            direction: 'vertical',
            gestureDirection: 'vertical',
            smooth: true,
            mouseMultiplier: 1,
            smoothTouch: false,
            touchMultiplier: 2,
            infinite: false,
        })

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }

        requestAnimationFrame(raf)
    </script>
    </div>
</div>
</header>
    <main>
