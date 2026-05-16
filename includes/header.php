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

        /* Mobile White Glassmorphism Overlay */
        .search-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(25px) saturate(180%);
            -webkit-backdrop-filter: blur(25px) saturate(180%);
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
        }

        .search-overlay.active { display: flex; opacity: 1; }
        .search-box-glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            padding: 2.5rem;
            border-radius: 30px;
            box-shadow: 0 15px 35px 0 rgba(0, 0, 0, 0.1);
            width: 90%; max-width: 500px; text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transform: scale(0.9); transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .search-overlay.active .search-box-glass { transform: scale(1); }
        .search-box-glass input {
            width: 100%; background: #fff; border: none;
            padding: 1.2rem; border-radius: 15px; font-size: 1.2rem; color: #1e293b;
            outline: none; margin-bottom: 1.5rem; text-align: center; font-family: 'Aeonik', sans-serif;
            box-shadow: inset 4px 4px 8px #d1d5db, inset -4px -4px 8px #ffffff;
        }
        .search-close { position: absolute; top: 30px; right: 30px; font-size: 2.5rem; cursor: pointer; color: #1e293b; }

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
    </style>

    <!-- jQuery (Required for Makisu) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
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
                    <a href="/certified.php" class="<?php echo $currentPage == 'certified' ? 'active' : ''; ?>">Certified</a>
                    <a href="/projects.php" class="<?php echo $currentPage == 'projects' ? 'active' : ''; ?>">Projects</a>
                    <a href="/contact.php" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact</a>
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
                    <dd><a href="/certified.php">Certified</a></dd>
                    <dd><a href="/projects.php">Projects</a></dd>
                    <dd><a href="/contact.php">Contact</a></dd>
                </dl>
            </div>
        </div>
    </header>

    <!-- Search Overlay (Mobile Only Glassmorphism) -->
    <div class="search-overlay" id="search-overlay">
        <div class="search-close" id="search-close"><i class="fas fa-times"></i></div>
        <div class="search-box-glass">
            <h2 style="font-family: 'Aeonik', sans-serif; margin-bottom: 2rem; color: #000; font-weight: 700;">Search AB Malaya</h2>
            <form action="search.php" method="GET">
                <input type="text" name="q" placeholder="Type here..." autocomplete="off" id="search-input-mobile">
                <button type="submit" class="cta-btn" style="width: 100%; border: none; cursor: pointer; display: block;">Search Now</button>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <script src="/assets/js/navigation.js?v=1.1"></script>

    <main>
