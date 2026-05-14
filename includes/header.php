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
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            z-index: 1000;
            background: var(--glass);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0 5%;
            position: relative;
        }

        .logo img {
            height: 50px;
            width: auto;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--secondary);
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: var(--transition);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        .cta-btn {
            background: var(--primary);
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 10px 20px rgba(0, 94, 233, 0.2);
            transition: var(--transition);
        }

        .cta-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(0, 94, 233, 0.3);
            color: var(--white);
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
            .menu-toggle {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: -120%;
                left: 0;
                width: 100%;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                justify-content: center;
                padding: 2rem;
                gap: 2rem;
                transition: 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0);
                z-index: 1050;
                opacity: 0;
                visibility: hidden;
            }

            #mobile-menu-checkbox:checked ~ .nav-links {
                top: 0;
                opacity: 1;
                visibility: visible;
            }

            #mobile-menu-checkbox:checked ~ .menu-toggle .bars-icon {
                display: none;
            }

            #mobile-menu-checkbox:checked ~ .menu-toggle .close-icon {
                display: inline-block;
            }

            .nav-links a {
                font-size: 1.5rem;
            }
            
            .cta-btn {
                width: 100%;
                text-align: center;
                margin-top: 1rem;
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
</head>
<body>
    <header>
        <div class="header-container">
            <a href="/" class="logo">
                <img src="/assets/img/logo-abmalaya.png" alt="AB Malaya Logo" style="height: 50px; width: auto; display: block;">
            </a>
            
            <input type="checkbox" id="mobile-menu-checkbox">
            <label for="mobile-menu-checkbox" class="menu-toggle">
                <i class="fas fa-bars bars-icon"></i>
                <i class="fas fa-times close-icon"></i>
            </label>
            
            <div class="nav-links">
                <label for="mobile-menu-checkbox" class="mobile-close-label" style="display: none; cursor: pointer; font-size: 1.5rem; margin-bottom: 2rem; color: var(--text-light);">
                    <i class="fas fa-times"></i> Close Menu
                </label>
                <a href="/" class="<?php echo $currentPage == 'home' ? 'active' : ''; ?>">Home</a>
                <a href="/about" class="<?php echo $currentPage == 'about' ? 'active' : ''; ?>">About Us</a>
                <a href="/services" class="<?php echo $currentPage == 'services' ? 'active' : ''; ?>">Services</a>
                <a href="/training" class="<?php echo $currentPage == 'training' ? 'active' : ''; ?>">Training</a>
                <a href="/policies" class="<?php echo $currentPage == 'policies' ? 'active' : ''; ?>">Policies</a>
                <a href="/careers" class="<?php echo $currentPage == 'careers' ? 'active' : ''; ?>">Careers</a>
                <a href="/contact" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact Us</a>
            </div>
        </div>
    </header>
    <main>
