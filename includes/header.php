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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=1.1">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Neumorphic Header Styles -->
    <style>
        :root {
            --neu-bg: #e6e9ef;
            --neu-shadow-dark: #b8bcc2;
            --neu-shadow-light: #ffffff;
            --neu-accent: #005ee9; /* AB Malaya Blue */
        }

        header {
            position: fixed;
            top: 25px;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: transparent;
            display: flex;
            justify-content: center;
            transition: all 0.4s ease;
            padding: 0 3vw;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1600px;
            gap: 1.5rem;
        }

        .nav-wrapper-desktop {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .logo {
            flex-shrink: 0;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1001;
            display: flex;
            align-items: center;
        }

        .logo img { height: 60px; width: auto; display: block; }
        .logo-hidden { 
            opacity: 0 !important; 
            visibility: hidden !important; 
            transform: translateY(-120%) !important; 
        }

        /* Neumorphic Search Bar */
        .search-wrapper-desktop {
            display: flex;
            align-items: center;
            background: linear-gradient(145deg, #f0f2f5, #e1e4e9);
            padding: 4px;
            border-radius: 50px;
            box-shadow: 4px 4px 8px var(--neu-shadow-dark), -4px -4px 8px var(--neu-shadow-light);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            width: 42px;
            height: 42px;
            overflow: hidden;
        }

        .search-wrapper-desktop.active {
            width: 250px;
            padding-left: 15px;
            box-shadow: inset 4px 4px 8px var(--neu-shadow-dark), inset -4px -4px 8px var(--neu-shadow-light);
        }

        .search-input-inline {
            width: 0;
            background: transparent;
            border: none;
            font-family: 'Aeonik', sans-serif;
            font-size: 0.9rem;
            color: #1e293b;
            outline: none;
            transition: width 0.4s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .search-wrapper-desktop.active .search-input-inline {
            width: 170px;
            opacity: 1;
            margin-right: 10px;
        }

        .search-btn-inline {
            background: none;
            border: none;
            color: #475569;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            transition: color 0.3s ease;
        }

        /* Neumorphic Navigation Capsule (Inset) */
        .nav-links {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            background: #e6e9ef;
            padding: 0.4rem 0.6rem;
            border-radius: 50px;
            box-shadow: inset 4px 4px 8px var(--neu-shadow-dark), inset -4px -4px 8px var(--neu-shadow-light);
            transition: all 0.4s ease;
        }

        .nav-links a {
            font-family: 'Aeonik', sans-serif;
            font-weight: 600;
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 8px 16px;
            border-radius: 30px;
            display: inline-block;
            border: 1px solid transparent;
        }

        /* Nav Links Raised when Active or Hover */
        .nav-links a:hover, .nav-links a.active {
            color: var(--neu-accent);
            background: #e6e9ef;
            box-shadow: 3px 3px 6px var(--neu-shadow-dark), -3px -3px 6px var(--neu-shadow-light);
            transform: translateY(-1px);
        }

        .nav-links a.active {
            font-weight: 700;
        }

        /* Neumorphic CTA Button (Raised) */
        .cta-btn {
            background: linear-gradient(135deg, #005ee9, #004bbd) !important;
            color: #fff !important;
            padding: 0.6rem 1.8rem;
            border-radius: 50px;
            font-weight: 700;
            box-shadow: 4px 4px 10px var(--neu-shadow-dark), -4px -4px 10px var(--neu-shadow-light);
            transition: all 0.3s ease;
            border: none;
            font-size: 0.8rem;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 6px 6px 12px var(--neu-shadow-dark), -6px -6px 12px var(--neu-shadow-light);
        }

        .cta-btn:active {
            transform: translateY(1px);
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.3);
        }

        /* Codepen-Style Full-Screen Search Overlay (Premium White Glassmorphic Theme) */
        .search-overlay {
            position: fixed;
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%;
            /* Pure Transparent background to let the Unsplash backdrop photo shine at 100% clarity */
            background: transparent; 
            z-index: 2500;
            opacity: 0;
            visibility: hidden;
            /* Delayed exit for choreographed fade-out (only hides after everything else is gone) */
            transition: opacity 0.9s cubic-bezier(0.25, 1, 0.5, 1), 
                        visibility 0.9s cubic-bezier(0.25, 1, 0.5, 1);
            transition-delay: 0.6s;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            font-family: 'Roboto', sans-serif;
            color: #1e293b;
        }

        .search-overlay.active {
            visibility: visible;
            opacity: 1;
            /* Instant entrance transition-delay */
            transition-delay: 0s;
            transition: opacity 0.8s cubic-bezier(0.25, 1, 0.5, 1), 
                        visibility 0.8s cubic-bezier(0.25, 1, 0.5, 1);
        }

        /* Flex Header Row containing Search Title (Left) & Close Button (Right) */
        .active-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .active-item-title {
            color: #5cd269; /* Spotify active green color */
            font-weight: 500;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .active-item-title i {
            margin-right: 10px;
            color: #5cd269;
        }

        /* Codepen Close Button integrated into header row */
        .spotify-close-trigger {
            background: transparent;
            border: none;
            padding: 5px;
            font-size: 1.25rem;
            color: #64748b;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            outline: none;
        }

        .spotify-close-trigger i {
            color: #64748b;
        }

        .spotify-close-trigger:hover {
            color: #ef4444; /* Premium crimson red */
            transform: scale(1.2);
        }

        .spotify-close-trigger:hover i {
            color: #ef4444;
        }

        /* Speech Recognition pulsing animation */
        @keyframes voicePulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.25); opacity: 0.6; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Codepen Page emulation on mobile */
        .page-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 40px 16px;
            position: relative;
        }

        /* Codepen Canvas Background - Clean transparent canvas style with background image */
        .search-canvas {
            display: block;
            position: relative;
            background: transparent;
            z-index: 2;
            width: 100%;
            height: 100%;
            top: -20px; /* Codepen exact relative top shift */
        }

        .search-canvas::after { 
            content: "";
            background: url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1000&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0; /* Hidden initially for staggered sequential fade-in */
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
            border-radius: 16px;
            /* Default exit transition: slowly fades out over 0.7s */
            transition: opacity 0.7s cubic-bezier(0.25, 1, 0.5, 1);
            transition-delay: 0s;
        }

        /* Staggered active state for the colorful backdrop */
        .search-overlay.active .search-canvas::after {
            opacity: 0.9;
            /* Ultra-slow luxurious entrance delay: fades in over 1.3s */
            transition: opacity 1.3s cubic-bezier(0.25, 1, 0.5, 1);
            transition-delay: 0.5s;
        }

        ul { 
            margin: 0; 
            padding: 0;
        }
        
        ul li { 
            list-style: none; 
        }

        /* Codepen Side-Left Menu wrapper - Premium floating card style with beautiful solid white background */
        ul.side-left-menu {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            padding: 10px 0;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            
            /* Initial state for staggered slide down entrance */
            opacity: 0;
            transform: translateY(-40px);
            /* Default exit transition: slides up and fades out slowly starting at 250ms delay */
            transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), 
                        opacity 0.8s ease;
            transition-delay: 0.25s;
        }

        /* Staggered active state for the white menu card */
        .search-overlay.active ul.side-left-menu {
            opacity: 1;
            transform: translateY(0);
            /* Long butter-smooth transition with a gorgeous Apple-inspired soft spring elastic bounce over 1.2s */
            transition: transform 1.2s cubic-bezier(0.34, 1.45, 0.64, 1), 
                        opacity 0.8s cubic-bezier(0.25, 1, 0.5, 1);
            transition-delay: 0.2s; /* Appears first quickly but deliberately */
        }

        /* Voice Search Item containing Input Field with Green Accent & Left Indent */
        li.voice-search { 
            border-bottom: 1px solid #5cd269 !important; /* Codepen exact green border */
            margin-left: 20px;                            /* Codepen exact left indent */
            padding: 15px 20px 15px 0 !important;
            display: flex;
            flex-direction: column;
            align-items: flex-start !important;
            cursor: default !important;
            background: transparent !important;
        }

        /* Flex Row to position the Search button directly next to the Input field */
        .search-input-row {
            display: flex;
            gap: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .search-input-row input { 
            flex: 1;
            background: rgba(0, 0, 0, 0.05) !important; /* Codepen input light theme conversion */
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
            border-radius: 4px;
            padding: 8px 12px;
            color: #0f172a;
            outline: none;
            font-size: 0.9rem;
            font-weight: 300;
            transition: all 0.3s ease;
        }

        .search-input-row input:focus {
            background: #ffffff !important;
            border-color: #5cd269 !important;
            box-shadow: 0 0 0 3px rgba(92, 210, 105, 0.1);
        }

        /* Modern Tactile Search Submit Button next to the input */
        .search-submit-btn {
            background: #5cd269;
            color: #ffffff;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(92, 210, 105, 0.2);
            padding: 0;
            flex-shrink: 0;
        }

        .search-submit-btn:hover {
            background: #46b853;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(92, 210, 105, 0.3);
        }

        .search-submit-btn:active {
            transform: translateY(0);
        }

        li.voice-search a#show-voice-search {
            color: #64748b;
            font-size: 0.82rem;
            font-weight: 400;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        li.voice-search a#show-voice-search i {
            margin-right: 10px; /* Codepen exact margin */
            color: #5cd269;
            opacity: 1;
        }

        /* Direct Underneath Search Results Wrapper inside the left menu card */
        .search-results {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin: 10px 0;
            border-top: 1px dashed rgba(0, 0, 0, 0.05);
            padding: 10px 10px 10px 0;
            
            /* Calculated dynamic maximum height to fit the card bottom edge exactly, leaving zero wasted space */
            max-height: calc(100vh - 290px); 
            overflow-y: auto; 
            -webkit-overflow-scrolling: touch;
        }

        /* Modern thin scrollbar styling inside the card */
        .search-results::-webkit-scrollbar {
            width: 5px;
        }
        .search-results::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.02);
            border-radius: 10px;
        }
        .search-results::-webkit-scrollbar-thumb {
            background: rgba(92, 210, 105, 0.35); /* Spotify green transparent */
            border-radius: 10px;
        }
        .search-results::-webkit-scrollbar-thumb:hover {
            background: rgba(92, 210, 105, 0.6);
        }

        /* Individual Result Row - matches light Codepen style */
        .search-results-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            transition: all 0.2s ease;
        }

        .search-results-item:last-child {
            border-bottom: none;
        }

        .search-results-item:hover {
            background: rgba(92, 210, 105, 0.05); /* Soft transparent green glow on hover */
            transform: translateX(4px);
        }

        .search-results-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5cd269;
            font-size: 0.85rem;
            margin-right: 12px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .search-results-item:hover .search-results-icon {
            background: #5cd269;
            color: #ffffff;
        }

        .search-results-info {
            flex: 1;
            min-width: 0;
            text-align: left;
        }

        .search-results-heading {
            font-size: 0.9rem;
            font-weight: 500;
            color: #0f172a;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-results-desc {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 300;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-results-chevron {
            color: #cbd5e1;
            font-size: 0.75rem;
            margin-left: 10px;
            transition: transform 0.2s ease;
        }

        .search-results-item:hover .search-results-chevron {
            color: #5cd269;
            transform: translateX(2px);
        }

        .search-results-empty {
            text-align: center;
            padding: 30px 16px;
            color: #64748b;
            font-size: 0.85rem;
            background: rgba(0, 0, 0, 0.01);
            border: 1px dashed rgba(0, 0, 0, 0.08);
            border-radius: 12px;
        }

        .search-results-empty i {
            font-size: 1.8rem;
            color: #cbd5e1;
            margin-bottom: 10px;
            display: block;
        }

        /* Mobile Makisu Menu - Hidden by Default on Desktop */
        .mobile-nav-wrapper {
            display: none;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.8rem;
            color: var(--neu-accent);
            z-index: 1100;
        }

        .search-btn-mobile {
            display: none;
            background: linear-gradient(145deg, #f0f2f5, #e1e4e9);
            box-shadow: 4px 4px 8px var(--neu-shadow-dark), -4px -4px 8px var(--neu-shadow-light);
            width: 38px;
            height: 38px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            color: var(--neu-accent);
            font-size: 1rem;
            cursor: pointer;
            border: none;
        }

        /* Responsive Logic */
        @media (max-width: 992px) {
            header { top: 15px; padding: 0 20px; }
            .header-container { display: flex; justify-content: space-between; align-items: center; gap: 10px; }
            .logo img { height: 45px; }
            .nav-links { display: none; } 
            .menu-toggle { display: block; }
            .nav-wrapper-desktop { gap: 0.8rem; }
            
            .search-wrapper-desktop { display: none; }
            .search-btn-mobile { display: flex; }
            
            .mobile-nav-wrapper {
                display: block;
                position: absolute;
                top: 70px;
                right: 20px;
                perspective: 1200px;
                z-index: 1000;
                width: 200px;
                pointer-events: none; /* Only children interact when open */
                opacity: 0;
                visibility: hidden;
                transition: 0.3s;
            }
            .mobile-nav-wrapper.active {
                pointer-events: all;
                opacity: 1;
                visibility: visible;
            }

            .list { text-transform: uppercase; margin: 0; padding: 0; width: 100%; list-style: none; transform-style: preserve-3d; }
            .list dt, .list dd { margin: 0; color: #fff; font-family: 'Aeonik', sans-serif; text-align: center; transform-style: preserve-3d; }
            .list dt { display: none; } 
            .list dd { 
                font-size: 0.8rem; 
                font-weight: 700;
                letter-spacing: 1px; 
                height: 54px; 
                line-height: 54px; 
                background: linear-gradient(to bottom, #005ee9 0%, #004bbd 100%); 
                border-top: 1px solid rgba(255, 255, 255, 0.2);
                border-bottom: 1px solid rgba(0, 0, 0, 0.2);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                position: relative;
                transition: filter 0.3s ease;
                backface-visibility: hidden;
            }
            .list dd a { 
                display: block; 
                color: #fff; 
                text-decoration: none; 
                width: 100%; 
                height: 100%; 
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            }
            .list dd:hover {
                filter: brightness(1.1);
            }
        }

        /* Smooth Scroll Essential CSS */
        html.lenis, html.lenis body { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto !important; }
        .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
        .lenis.lenis-stopped { overflow: hidden; }
        .lenis.lenis-scrolling iframe { pointer-events: none; }

        /* Premium Top Edge Loading Bar */
        .top-loader-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0%;
            background: linear-gradient(90deg, #005ee9, #00dbde, #005ee9);
            background-size: 200% auto;
            z-index: 1000000;
            transition: width 0.4s cubic-bezier(0.1, 0.8, 0.2, 1), opacity 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 94, 233, 0.3);
            animation: loaderShimmer 2s linear infinite;
        }

        @keyframes loaderShimmer {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }
    </style>

    <!-- jQuery (Required for Makisu) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!-- Premium Top Loading Bar -->
    <div class="top-loader-bar" id="topLoaderBar"></div>
    <script>
        (function() {
            const bar = document.getElementById('topLoaderBar');
            if (!bar) return;
            bar.style.width = '25%';
            document.addEventListener('readystatechange', () => {
                if (document.readyState === 'interactive') {
                    bar.style.width = '70%';
                }
            });
            window.addEventListener('load', () => {
                bar.style.width = '100%';
                setTimeout(() => {
                    bar.style.opacity = '0';
                    setTimeout(() => {
                        bar.style.display = 'none';
                    }, 400);
                }, 300);
            });
        })();
    </script>

    <header>
        <div class="header-container">
            <!-- Logo (Left) -->
            <a href="/" class="logo">
                <img src="/assets/img/logo-abmalaya.png?v=1.2" alt="AB Malaya Logo">
            </a>
 
            <!-- Desktop Navigation & Search (Right) -->
            <div class="nav-wrapper-desktop">
                <div class="nav-links">
                    <a href="/" class="<?php echo $currentPage == 'home' ? 'active' : ''; ?>">Home</a>
                    <a href="/about" class="<?php echo $currentPage == 'about' ? 'active' : ''; ?>">About</a>
                    <a href="/services" class="<?php echo $currentPage == 'services' ? 'active' : ''; ?>">Services</a>
                    <a href="/certified" class="<?php echo $currentPage == 'certified' ? 'active' : ''; ?>">Certified</a>
                    <a href="/projects" class="<?php echo $currentPage == 'projects' ? 'active' : ''; ?>">Projects</a>
                    <a href="/contact" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact</a>
                </div>

                <!-- Desktop Inline Search -->
                <div class="search-wrapper-desktop" id="search-desktop-container">
                    <form action="search.php" method="GET" style="display: flex; align-items: center;">
                        <input type="text" name="q" class="search-input-inline" placeholder="Search..." id="search-inline-input">
                        <button type="button" class="search-btn-inline" id="search-desktop-trigger">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Mobile Search Trigger -->
                <div class="search-btn-mobile" id="search-mobile-trigger">
                    <i class="fas fa-search"></i>
                </div>

                <!-- Mobile Burger -->
                <div class="menu-toggle" id="burger-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <!-- Mobile Makisu Menu -->
            <div class="mobile-nav-wrapper">
                <dl class="list mks-menu">
                    <dt>MENU</dt>
                    <dd><a href="/">Home</a></dd>
                    <dd><a href="/about">About</a></dd>
                    <dd><a href="/services">Services</a></dd>
                    <dd><a href="/certified">Certified</a></dd>
                    <dd><a href="/projects">Projects</a></dd>
                    <dd><a href="/contact">Contact</a></dd>
                </dl>
            </div>
        </div>
    </header>

    <!-- Codepen Spotify Emulated Full-Screen Search Overlay -->
    <div class="search-overlay" id="search-overlay">
        <div class="page-container">
            <!-- Search Canvas (Left side emulated panel with background photo watermark) -->
            <div class="search-canvas">
                <ul class="side-left-menu">
                    <!-- Flex Header Row: "Search" title on the left, borderless "X" button on the right -->
                    <li class="active-item-header">
                        <span class="active-item-title"><i class="fas fa-search"></i> Search</span>
                        <div class="spotify-close-trigger" id="search-close">
                            <i class="fas fa-times"></i>
                        </div>
                    </li>
                    
                    <!-- Voice Search list item containing the main input field & submit button -->
                    <li class="voice-search">
                        <form action="search.php" method="GET" class="search-input-row" style="margin: 0 0 10px; width: 100%; display: flex; align-items: center; gap: 10px;">
                            <input class="radius" type="text" name="q" placeholder="Type a Service, Tag, Division..." autocomplete="off" id="search-input-mobile">
                            <button type="submit" class="search-submit-btn" id="search-submit-mobile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            </button>
                        </form>
                        <a id="show-voice-search" href="javascript:void(0)">
                            <i class="fas fa-microphone"></i> Voice Search
                        </a>
                    </li>

                    <!-- Real-Time Search Results rendered DIRECTLY underneath the input field -->
                    <li class="search-results-wrapper" style="padding: 0 !important; border: none !important; background: transparent !important;">
                        <ul class="search-results" id="live-search-results" style="width: 100%; display: none;">
                            <!-- Dynamically populated by assets/js/navigation.js -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <script src="/assets/js/navigation.js?v=4.6"></script>

    <main>
