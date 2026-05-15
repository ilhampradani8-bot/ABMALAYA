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
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Header-Specific Styles (Laptop & Mobile) -->
    <style>
        header {
            position: fixed;
            top: 10px; /* Even thinner distance */
            left: 0;
            width: 100%;
            z-index: 1000;
            background: transparent;
            display: flex;
            justify-content: center;
            transition: all 0.4s ease;
        }

        .header-card {
            width: 98%; /* Closer to edges */
            max-width: 1600px;
            background: rgba(255, 255, 255, 0.4); /* More transparent for glass effect */
            backdrop-filter: blur(35px); /* Stronger premium blur */
            border: 1px solid rgba(255, 255, 255, 0.6); /* Clearer glassy border */
            padding: 0.3rem 1.5rem; /* Even thinner */
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Sharp Corners */
            border-radius: 0;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        /* The "Double Card" inner border effect */
        .header-card::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            right: 3px;
            bottom: 3px;
            border: 1px solid rgba(0, 0, 0, 0.03);
            pointer-events: none;
            z-index: -1;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 15px;
        }

        .logo img {
            height: 35px;
            width: auto;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary);
        }

        .cta-btn {
            background: #000; /* Sharp black for contrast */
            color: var(--white);
            padding: 0.6rem 2rem;
            border-radius: 0; 
            font-weight: 800;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: var(--transition);
            border: 1px solid #000;
        }

        .cta-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--white);
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

        .menu-toggle .close-icon {
            display: none;
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

            .menu-toggle {
                display: block;
                grid-column: 1;
                justify-self: start;
            }

            .search-wrap-pc {
                display: none !important;
            }

            .search-toggle-mobile {
                display: block !important;
                grid-column: 3;
                justify-self: end;
                font-size: 1.5rem;
                color: var(--secondary);
                cursor: pointer;
            }

            .nav-links {
                position: absolute; /* Relative to header-card */
                top: calc(100% + 5px);
                left: 0;
                width: 100%;
                height: auto;
                background: rgba(255, 255, 255, 0.6);
                backdrop-filter: blur(40px);
                border: 1px solid rgba(255, 255, 255, 0.5);
                flex-direction: column;
                padding: 2.5rem 2rem;
                gap: 1.5rem;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 1050;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-20px);
                border-radius: 0;
            }

            #mobile-menu-checkbox:checked ~ .nav-links {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            #mobile-menu-checkbox:checked ~ .menu-toggle .bars-icon {
                display: none;
            }

            #mobile-menu-checkbox:checked ~ .menu-toggle .close-icon {
                display: inline-block;
            }

            .nav-links a {
                font-size: 1.1rem;
                width: 100%;
                text-align: center;
                padding: 0.5rem 0;
                border-bottom: 1px solid rgba(0,0,0,0.03);
            }
            
            .cta-btn {
                width: 100%;
                text-align: center;
                margin-top: 2rem;
                display: block;
                background: var(--primary); /* Re-enable primary for mobile */
                border: none;
                padding: 1rem;
            }
        }

        /* Right Side Elegant Indicator */
        .right-indicator-container {
            position: fixed;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            z-index: 999;
        }

        .scroll-line-bg {
            width: 2px;
            height: 150px;
            background: rgba(0,0,0,0.1);
            position: relative;
        }

        .scroll-line-active {
            width: 2px;
            height: 0%;
            background: var(--primary);
            position: absolute;
            top: 0;
            transition: height 0.1s ease;
        }

        .scroll-label {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--text-light);
            text-transform: uppercase;
            margin-top: 10px;
        }

        @media (max-width: 992px) {
            .right-indicator-container {
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
        <div class="header-card">
            <div class="header-container">
                <input type="checkbox" id="mobile-menu-checkbox">
                
                <!-- Burger (Mobile Left) -->
                <label for="mobile-menu-checkbox" class="menu-toggle">
                    <i class="fas fa-bars bars-icon"></i>
                    <i class="fas fa-times close-icon"></i>
                </label>

                <!-- Logo (Center Mobile / Left PC) -->
                <a href="/" class="logo">
                    <img src="/assets/img/logo-abmalaya.png" alt="AB Malaya Logo">
                </a>
            
            <!-- Nav Links (PC Center) -->
            <div class="nav-links">
                <label for="mobile-menu-checkbox" class="mobile-close-label" style="display: none; cursor: pointer; font-size: 1.5rem; margin-bottom: 2rem; color: var(--text-light);">
                    <i class="fas fa-times"></i> Close Menu
                </label>
                <a href="/" class="<?php echo $currentPage == 'home' ? 'active' : ''; ?>">Home</a>
                <a href="/about" class="<?php echo $currentPage == 'about' ? 'active' : ''; ?>">About</a>
                <a href="/services" class="<?php echo $currentPage == 'services' ? 'active' : ''; ?>">Services</a>
                <a href="/careers" class="<?php echo $currentPage == 'careers' ? 'active' : ''; ?>">Careers</a>
                <a href="/contact" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact</a>
            </div>

            <!-- Search (Mobile Right / PC Far Right) -->
            <div class="search-toggle-mobile" style="display: none;">
                <button type="button" onclick="toggleMobileSearch()" style="background: none; border: none; color: var(--secondary); font-size: 1.4rem; cursor: pointer;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            
            <!-- Mobile Search Overlay -->
            <div id="mobile-search-overlay" style="position: fixed; top: -100%; left: 0; width: 100%; height: 100vh; background: rgba(255,255,255,0.98); backdrop-filter: blur(15px); z-index: 2000; display: flex; align-items: center; justify-content: center; transition: 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0); opacity: 0; visibility: hidden;">
                <button onclick="toggleMobileSearch()" style="position: absolute; top: 30px; right: 30px; background: none; border: none; font-size: 2rem; color: var(--secondary); cursor: pointer;">
                    <i class="fas fa-times"></i>
                </button>
                <div style="width: 80%;">
                    <form action="/search" method="GET">
                        <input type="text" name="q" placeholder="What are you looking for?" required style="width: 100%; padding: 1.5rem 0; font-size: 1.5rem; border: none; border-bottom: 2px solid var(--primary); background: transparent; outline: none; font-family: 'Nunito', sans-serif;">
                        <p style="margin-top: 1rem; color: #94a3b8; font-size: 0.9rem;">Press Enter to search</p>
                    </form>
                </div>
            </div>

            <div class="search-wrap-pc" style="display: flex; align-items: center; border-left: 1px solid rgba(0,0,0,0.1); padding-left: 1.5rem; margin-left: 1rem;">
                <form action="/search" method="GET" style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="text" name="q" placeholder="Search..." style="border: none; background: transparent; outline: none; width: 0; transition: 0.3s; padding: 5px 0; font-size: 0.9rem; border-bottom: 1px solid transparent;" id="pc-search-input">
                    <button type="button" onclick="togglePCSearch()" style="background: none; border: none; color: var(--secondary); font-size: 1.1rem; cursor: pointer;">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <script>
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
            </script>
            </div>
        </div>
    </header>
    <main>
