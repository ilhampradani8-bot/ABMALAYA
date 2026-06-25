<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo isset($pageTitle) ? $pageTitle . " | AB Malaya Sdn Bhd" : "AB Malaya Sdn Bhd - Marine & Industrial Solutions"; ?></title>
    <meta name="description" content="AB Malaya Sdn Bhd - Specialists in Marine Industrial Services, Cross-Border Logistics, and Environmental Solutions.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=5.0">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Critical Shield to Prevent FOUC, CLS, and Image Stacking -->
    <style>
        /* 1. Prevent Hero Image Parallax Stacking and FOUC */
        .hero-images-layer { opacity: 0; position: absolute; top: 0; right: 0; width: 55%; height: 100%; overflow: hidden; pointer-events: none; }
        .img-wrap { opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }

        /* 2. Prevent Embla Carousel Layout Shifting and Slide Stacking */
        .embla__viewport { overflow: hidden; width: 100%; }
        .embla__container { display: flex; flex-direction: row; flex-wrap: nowrap; }

        /* 3. Prevent Swiper Carousel Slide Stacking before CSS/JS Init */
        .swiper { overflow: hidden; position: relative; }
        .swiper-wrapper { display: flex; flex-direction: row; flex-wrap: nowrap; }
        .swiper-slide { flex-shrink: 0; }
    </style>

    <!-- Neumorphic Header Styles -->
    <style>
        :root {
            --neu-bg: #e6e9ef;
            --neu-shadow-dark: #b8bcc2;
            --neu-shadow-light: #ffffff;
            --neu-accent: #093863; /* AB Malaya Dark Blue */
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

        .logo img { height: 120px; width: auto; display: block; }
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
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
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
            transition: width 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1);
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

        /* High-End Glassmorphic Dropdown Navigation */
        .nav-item-wrapper {
            position: relative;
            display: inline-block;
        }

        .nav-item-wrapper > a {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        /* Direct SVG down arrow '>' (Hidden State) */
        .arrow-svg {
            width: 10px;
            height: 10px;
            stroke: currentColor;
            stroke-width: 3px;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            opacity: 0;
            width: 0;
            max-width: 0;
            transform: scale(0.5) rotate(-90deg); /* Hidden and rotated sideways */
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1),
                        max-width 0.6s cubic-bezier(0.16, 1, 0.3, 1),
                        width 0.6s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.6s cubic-bezier(0.16, 1, 0.3, 1),
                        margin-left 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            margin-left: 0;
            display: inline-block;
            vertical-align: middle;
        }

        /* Hover SVG arrow Active State (Rotates to point downwards instantly) */
        .nav-item-wrapper:hover > a .arrow-svg {
            opacity: 0.85;
            width: 10px;
            max-width: 10px;
            transform: scale(1) rotate(0deg); /* Rotates pointing straight down */
            margin-left: 6px;
        }

        /* Dynamic padding adjustments on hover to balance caret inclusion */
        .nav-item-wrapper:hover > a.nav-link-item {
            padding-right: 12px !important;
            padding-left: 12px !important;
        }
        
        .nav-item-wrapper:hover > a.cta-btn {
            padding-right: 1.4rem !important;
            padding-left: 1.4rem !important;
        }

        .nav-link-item {
            font-family: 'Aeonik', sans-serif;
            font-weight: 600;
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 8px 16px;
            border-radius: 30px;
            display: inline-block;
            border: 1px solid transparent;
        }

        /* Hover and active states for top-level menu buttons */
        .nav-link-item:hover, .nav-link-item.active {
            color: var(--neu-accent);
            background: #e6e9ef;
            box-shadow: 3px 3px 6px var(--neu-shadow-dark), -3px -3px 6px var(--neu-shadow-light);
            transform: translateY(-1px);
        }

        .nav-link-item.active {
            font-weight: 700;
        }

        /* Glassmorphic Dropdown Container (Classic Bubble Scale/Fade) */
        .dropdown-panel {
            position: absolute;
            top: 130%;
            left: 50%;
            transform: translateX(-50%) translateY(15px) scale(0.95);
            background: rgba(230, 233, 239, 0.85); /* Matches neumorphic backdrop color with blur */
            backdrop-filter: blur(25px) saturate(190%);
            -webkit-backdrop-filter: blur(25px) saturate(190%);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            padding: 8px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08), 
                        inset 1px 1px 1px rgba(255, 255, 255, 0.6);
            opacity: 0;
            visibility: hidden;
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            transition-delay: 0ms; /* Collapse instantly on mouseleave */
            z-index: 1005;
            min-width: 220px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        /* Smooth triangular arrow pointer for the dropdown */
        .dropdown-panel::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: transparent transparent rgba(230, 233, 239, 0.85) transparent;
            pointer-events: none;
        }

        /* Hover trigger logic with delay for choreographing chevron first! */
        .nav-item-wrapper:hover .dropdown-panel {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0) scale(1);
            transition-delay: 180ms; /* Delay dropdown to let caret SVG appear first! */
        }

        /* Right-aligned dropdown helper with delay */
        .dropdown-panel.dropdown-right {
            left: auto;
            right: 0;
            transform: translateY(15px) scale(0.95);
        }
        .dropdown-panel.dropdown-right::before {
            left: auto;
            right: 25px;
            transform: none;
        }
        .nav-item-wrapper:hover .dropdown-panel.dropdown-right {
            transform: translateY(0) scale(1);
            transition-delay: 180ms;
        }

        /* Individual Dropdown Item (Initial State - Shifted Left) */
        .dropdown-panel a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #475569 !important; /* Neutral Slate */
            text-decoration: none !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            text-transform: none !important;
            letter-spacing: normal !important;
            white-space: nowrap;
            border: 1px solid transparent !important;
            background: transparent !important;
            box-shadow: none !important;
            
            /* Left-to-right sequential entrance hidden state */
            opacity: 0;
            transform: translateX(-15px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), 
                        transform 0.7s cubic-bezier(0.16, 1, 0.3, 1), 
                        background 0.3s ease, 
                        color 0.3s ease, 
                        border-color 0.3s ease !important;
            transition-delay: 0ms !important; /* Collapse instantly with no delay on mouseleave */
        }

        /* Hover Reveal State - Slide back to natural position */
        .nav-item-wrapper:hover .dropdown-panel a {
            opacity: 1;
            transform: translateX(0);
        }

        /* Sequential delays for staggered entrance */
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(1) { transition-delay: 220ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(2) { transition-delay: 260ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(3) { transition-delay: 300ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(4) { transition-delay: 340ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(5) { transition-delay: 380ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(6) { transition-delay: 420ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(7) { transition-delay: 460ms !important; }
        .nav-item-wrapper:hover .dropdown-panel a:nth-child(8) { transition-delay: 500ms !important; }

        /* Hover action on dropdown items - shifting horizontally */
        .dropdown-panel a:hover {
            background: rgba(9, 56, 98, 0.08) !important;
            color: #093863 !important;
            transform: translateX(4px) !important; /* Shift horizontally on hover */
            border-color: rgba(9, 56, 98, 0.15) !important;
        }

        /* Intermediate desktop screen responsiveness */
        @media (min-width: 993px) and (max-width: 1200px) {
            .nav-links {
                gap: 2px !important;
                padding: 0.3rem 0.4rem !important;
            }
            .nav-link-item {
                padding: 6px 12px !important;
                font-size: 0.7rem !important;
            }
            .cta-btn {
                padding: 0.5rem 1.4rem !important;
                font-size: 0.75rem !important;
            }
            .dropdown-panel {
                min-width: 190px !important;
            }
            .dropdown-panel a {
                font-size: 0.75rem !important;
                padding: 8px 12px !important;
            }
        }

        /* Icons inside the dropdown list items */
        .dropdown-panel a i {
            color: rgba(9, 56, 98, 0.6) !important;
            font-size: 0.85rem !important;
            transition: all 0.3s ease !important;
            width: 16px;
            text-align: center;
        }

        .dropdown-panel a:hover i {
            color: #093863 !important;
            transform: scale(1.15) !important;
        }

        /* Neumorphic CTA Button (Raised) */
        .cta-btn {
            background: linear-gradient(135deg, #093863, #072d4f) !important;
            color: #fff !important;
            padding: 0.6rem 1.8rem;
            border-radius: 50px;
            font-weight: 700;
            box-shadow: 4px 4px 10px var(--neu-shadow-dark), -4px -4px 10px var(--neu-shadow-light);
            transition: all 0.3s ease;
            border: none;
            font-size: 0.8rem;
            display: inline-block;
            text-decoration: none;
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
            max-height: calc(100vh - 180px); 
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

        /* Apple Vibe Premium Voice Search Embedded Panel */
        .voice-embedded-panel {
            margin: 10px 20px 15px;
            box-sizing: border-box;
            display: none;
        }

        .voice-embedded-card {
            background: rgba(0, 0, 0, 0.03); /* Subtle premium Apple-style container background */
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 14px;
            padding: 24px 16px;
            text-align: center;
            position: relative;
            box-sizing: border-box;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.01);
        }

        .voice-mic-container {
            position: relative;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(92, 210, 105, 0.08); /* Ultra-soft translucent green disc matching Spotify theme */
            border: 1px solid rgba(92, 210, 105, 0.2);
            box-shadow: 0 0 15px rgba(92, 210, 105, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            z-index: 2;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .voice-mic-container i.mic-icon {
            font-size: 1.4rem;
            color: #5cd269; /* Soft brand accent green */
            z-index: 5;
            transition: transform 0.2s ease;
        }

        /* Delicate Glowing Soundwave Ripple Pulses */
        .voice-pulse-circle,
        .voice-pulse-circle-outer {
            position: absolute;
            top: -1px;
            left: -1px;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 1px solid rgba(92, 210, 105, 0.3);
            opacity: 0;
            z-index: 1;
            pointer-events: none;
        }

        .voice-embedded-panel.listening .voice-pulse-circle {
            animation: voiceRipplePulse 1.6s infinite cubic-bezier(0.1, 0, 0.2, 1);
        }

        .voice-embedded-panel.listening .voice-pulse-circle-outer {
            animation: voiceRipplePulse 1.6s infinite cubic-bezier(0.1, 0, 0.2, 1);
            animation-delay: 0.8s;
        }

        @keyframes voiceRipplePulse {
            0% {
                transform: scale(1);
                opacity: 0.8;
                border-color: rgba(92, 210, 105, 0.4);
            }
            100% {
                transform: scale(1.8);
                opacity: 0;
                border-color: rgba(92, 210, 105, 0);
            }
        }

        .voice-status-text {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 1.05rem;
            font-weight: 600;
            color: #0f172a; /* Slate 900 primary text */
            margin: 0 0 4px;
        }

        .voice-sub-text {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 0.78rem;
            font-weight: 400;
            color: #64748b; /* Slate 500 muted text */
            margin: 0 0 12px;
            letter-spacing: -0.01em;
        }

        .voice-transcript-preview {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            color: #334155; /* Slate 700 readable transcript text */
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: 8px;
            padding: 8px 12px;
            min-height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            word-break: break-word;
        }

        /* Mobile Makisu Menu - Hidden by Default on Desktop */
        .mobile-nav-wrapper {
            display: none;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(145deg, #f0f2f5, #e1e4e9);
            box-shadow: 4px 4px 8px var(--neu-shadow-dark), -4px -4px 8px var(--neu-shadow-light);
            z-index: 1100;
            position: relative;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 4px;
            transition: transform 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
            border: none;
        }
        .menu-toggle:active {
            transform: scale(0.95);
            box-shadow: inset 2px 2px 4px var(--neu-shadow-dark), inset -2px -2px 4px var(--neu-shadow-light);
        }
        .menu-toggle span {
            display: block;
            width: 16px;
            height: 2px;
            background-color: var(--text);
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-origin: center;
        }
        /* Burger Morph to X */
        .menu-toggle.active span:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }
        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
            transform: scale(0);
        }
        .menu-toggle.active span:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
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
            .menu-toggle { display: flex; }
            .nav-wrapper-desktop { gap: 0.8rem; }
            
            .search-wrapper-desktop { display: none; }
            .search-btn-mobile { display: flex; }
            
            .mobile-nav-wrapper {
                display: block;
                position: absolute;
                top: 75px;
                right: 20px;
                z-index: 1000;
                width: 230px;
                pointer-events: none;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s, visibility 0.3s;
            }
            .mobile-nav-wrapper.active {
                pointer-events: all;
                opacity: 1;
                visibility: visible;
            }

            .list { 
                margin: 0; 
                padding: 0; 
                width: 100%; 
                list-style: none; 
            }
            
            /* Premium Tactile Neumorphic mobile cards */
            .mks-card { 
                margin-bottom: 14px;
                background: #e6e9ef !important; 
                border: none !important;
                box-shadow: 4px 4px 8px var(--neu-shadow-dark), -4px -4px 8px var(--neu-shadow-light) !important;
                border-radius: 12px;
                overflow: hidden;
                opacity: 0;
                transform: translateY(-20px);
                transition: opacity 0.4s ease, transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.2s, background 0.2s;
            }
            
            .mks-card:hover {
                background: #ebedf2 !important;
            }

            .mks-card.expanded {
                box-shadow: inset 2.5px 2.5px 6px var(--neu-shadow-dark), inset -2.5px -2.5px 6px var(--neu-shadow-light) !important;
            }
            
            /* Staggered Entry One-by-One */
            .mobile-nav-wrapper.active .mks-card {
                opacity: 1;
                transform: translateY(0);
            }
            .mobile-nav-wrapper.active .mks-card:nth-child(1) { transition-delay: 50ms; }
            .mobile-nav-wrapper.active .mks-card:nth-child(2) { transition-delay: 100ms; }
            .mobile-nav-wrapper.active .mks-card:nth-child(3) { transition-delay: 150ms; }
            .mobile-nav-wrapper.active .mks-card:nth-child(4) { transition-delay: 200ms; }
            .mobile-nav-wrapper.active .mks-card:nth-child(5) { transition-delay: 250ms; }
            .mobile-nav-wrapper.active .mks-card:nth-child(6) { transition-delay: 300ms; }
 
            .mks-card a.mobile-sub-toggle,
            .mks-card > a:not(.mobile-sub-toggle) { 
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 18px;
                color: var(--text) !important; 
                text-decoration: none; 
                width: 100%; 
                height: 52px; 
                font-family: 'Aeonik', sans-serif;
                font-size: 0.85rem; 
                font-weight: 700;
                letter-spacing: 0.5px; 
                text-transform: uppercase;
                text-shadow: none !important;
                box-sizing: border-box;
            }
            
            /* Mobile Sub-menu accordion styling with soft Neumorphic inset separation */
            .mobile-sub-menu {
                max-height: 0;
                overflow: hidden;
                background: rgba(0, 0, 0, 0.02) !important;
                border-top: 0px solid transparent;
                transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-top 0.3s;
                display: flex;
                flex-direction: column;
                box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.03) !important;
            }
            .has-mobile-sub.expanded .mobile-sub-menu {
                max-height: 500px; /* Increased to support all 6 elements and text wrapping without clipping */
                border-top: 1px solid rgba(0, 0, 0, 0.05) !important;
            }
            
            .mobile-sub-menu a {
                display: flex !important;
                align-items: center;
                padding: 12px 18px !important; /* Flexible padding instead of fixed height for safe mobile wrapping */
                min-height: 42px !important;
                line-height: 1.4 !important; /* Normal line-height for clean wrap formatting without overlap */
                font-size: 0.72rem !important;
                font-weight: 600 !important;
                letter-spacing: 1.5px !important;
                color: var(--text-light) !important;
                text-decoration: none !important;
                border-bottom: 1px solid rgba(0, 0, 0, 0.03) !important;
                text-shadow: none !important;
                transition: background 0.2s, color 0.2s;
                text-align: left;
                text-transform: uppercase;
                box-sizing: border-box;
            }
            .mobile-sub-menu a:last-child {
                border-bottom: none !important;
            }
            .mobile-sub-menu a:hover {
                background: rgba(9, 56, 98, 0.05) !important;
                color: #093863 !important;
            }
            .has-mobile-sub.expanded .mobile-sub-toggle i {
                transform: rotate(180deg);
                color: #093863 !important;
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
            background: linear-gradient(90deg, #093863, #1191cc, #093863);
            background-size: 200% auto;
            z-index: 1000000;
            transition: width 0.4s cubic-bezier(0.1, 0.8, 0.2, 1), opacity 0.3s ease;
            box-shadow: 0 2px 10px rgba(9, 56, 98, 0.3);
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
                <img src="/assets/img/logo-abmalaya.webp?v=1.2" alt="AB Malaya Logo">
            </a>
 
            <!-- Desktop Navigation & Search (Right) -->
            <div class="nav-wrapper-desktop">
                <div class="nav-links">
                    <div class="nav-item-wrapper">
                        <a href="/" class="nav-link-item <?php echo $currentPage == 'home' ? 'active' : ''; ?>">Home</a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a href="/about" class="nav-link-item <?php echo $currentPage == 'about' ? 'active' : ''; ?>">About Us <svg class="arrow-svg" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg></a>
                        <div class="dropdown-panel">
                            <a href="/about#story-section"><i class="fas fa-book-open"></i> Our Story</a>
                            <a href="/about#vision-mission"><i class="fas fa-bullseye"></i> Vision & Mission</a>
                            <a href="/about#principles-section"><i class="fas fa-scale-balanced"></i> Our Principles</a>
                        </div>
                    </div>
                    <div class="nav-item-wrapper">
                        <a href="/services" class="nav-link-item <?php echo $currentPage == 'services' ? 'active' : ''; ?>">Solutions <svg class="arrow-svg" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg></a>
                        <div class="dropdown-panel">
                            <a href="/services#strategic-consultant"><i class="fas fa-chess-queen"></i> Strategic Consultant</a>
                            <a href="/services#contractor-engineering"><i class="fas fa-cubes"></i> Contractor & Engineering</a>
                            <a href="/services#marine-services"><i class="fas fa-ship"></i> Marine Services</a>
                            <a href="/services#logistics-services"><i class="fas fa-truck"></i> Logistics Services</a>
                            <a href="/services#corrosion-management"><i class="fas fa-shield-halved"></i> Corrosion Management</a>
                            <a href="/services#digital-it-solutions"><i class="fas fa-laptop-code"></i> Digital & IT Solutions</a>
                        </div>
                    </div>
                    <div class="nav-item-wrapper">
                        <a href="/why-us" class="nav-link-item <?php echo $currentPage == 'why-us' ? 'active' : ''; ?>">Why Us <svg class="arrow-svg" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg></a>
                        <div class="dropdown-panel">
                            <a href="/why-us#certified"><i class="fas fa-certificate"></i> Certified & Trusted</a>
                            <a href="/why-us#expertise"><i class="fas fa-briefcase"></i> Technical Expertise</a>
                            <a href="/why-us#solutions"><i class="fas fa-cubes"></i> End-to-End Solutions</a>
                            <a href="/why-us#regional"><i class="fas fa-globe"></i> Regional Operational Capability</a>
                            <a href="/why-us#sustainability"><i class="fas fa-leaf"></i> Sustainability Commitment</a>
                            <a href="/why-us#customer"><i class="fas fa-handshake"></i> Customer-Focused Approach</a>
                        </div>
                    </div>
                    <div class="nav-item-wrapper">
                        <a href="/projects" class="nav-link-item <?php echo $currentPage == 'projects' ? 'active' : ''; ?>">Projects</a>
                    </div>
                    <div class="nav-item-wrapper">
                        <a href="/contact" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact <svg class="arrow-svg" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg></a>
                        <div class="dropdown-panel dropdown-right">
                            <a href="/contact#contact-form"><i class="fas fa-envelope"></i> Get In Touch</a>
                            <a href="/contact#map"><i class="fas fa-map-marked-alt"></i> Location Map</a>
                        </div>
                    </div>
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
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <!-- Mobile Neobrutalism Menu -->
            <div class="mobile-nav-wrapper">
                <div class="list mks-menu">
                    
                    <!-- Item 1: Home (direct link, no submenu) -->
                    <div class="mks-card">
                        <a href="/">Home</a>
                    </div>
                    
                    <!-- Item 2: About Us (has submenu) -->
                    <div class="mks-card has-mobile-sub">
                        <a href="javascript:void(0)" class="mobile-sub-toggle">About Us <i class="fas fa-chevron-down" style="font-size: 0.75rem; transition: transform 0.3s;"></i></a>
                        <div class="mobile-sub-menu">
                            <a href="/about">About Us Page</a>
                            <a href="/about#story-section">Our Story</a>
                            <a href="/about#vision-mission">Vision & Mission</a>
                            <a href="/about#principles-section">Our Principles</a>
                        </div>
                    </div>
                    
                    <!-- Item 3: Solutions (has submenu - 6 items matching services page) -->
                    <div class="mks-card has-mobile-sub">
                        <a href="javascript:void(0)" class="mobile-sub-toggle">Solutions <i class="fas fa-chevron-down" style="font-size: 0.75rem; transition: transform 0.3s;"></i></a>
                        <div class="mobile-sub-menu">
                            <a href="/services">Solutions Page</a>
                            <a href="/services#strategic-consultant">Strategic Consultant</a>
                            <a href="/services#contractor-engineering">Contractor & Engineering</a>
                            <a href="/services#marine-services">Marine Services</a>
                            <a href="/services#logistics-services">Logistics Services</a>
                            <a href="/services#corrosion-management">Corrosion Management</a>
                            <a href="/services#digital-it-solutions">Digital & IT Solutions</a>
                        </div>
                    </div>
                    
                    <!-- Item 4: Why Us (has submenu) -->
                    <div class="mks-card has-mobile-sub">
                        <a href="javascript:void(0)" class="mobile-sub-toggle">Why Us <i class="fas fa-chevron-down" style="font-size: 0.75rem; transition: transform 0.3s;"></i></a>
                        <div class="mobile-sub-menu">
                            <a href="/why-us">Why Us Page</a>
                            <a href="/why-us#certified">Certified & Trusted</a>
                            <a href="/why-us#expertise">Technical Expertise</a>
                            <a href="/why-us#solutions">End-to-End Solutions</a>
                            <a href="/why-us#regional">Regional Operational Capability</a>
                            <a href="/why-us#sustainability">Sustainability Commitment</a>
                            <a href="/why-us#customer">Customer-Focused Approach</a>
                        </div>
                    </div>
                    
                    <!-- Item 5: Projects (direct link, no submenu) -->
                    <div class="mks-card">
                        <a href="/projects">Projects</a>
                    </div>
                    
                    <!-- Item 6: Contact (has submenu) -->
                    <div class="mks-card has-mobile-sub">
                        <a href="javascript:void(0)" class="mobile-sub-toggle">Contact <i class="fas fa-chevron-down" style="font-size: 0.75rem; transition: transform 0.3s;"></i></a>
                        <div class="mobile-sub-menu">
                            <a href="/contact">Contact Page</a>
                            <a href="/contact#contact-form">Get In Touch</a>
                            <a href="/contact#map">Location Map</a>
                        </div>
                    </div>
                </div>
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
                        <!-- Neobrutalism Voice Search Embedded Panel -->
                        <div class="voice-embedded-panel" id="voice-embedded-panel">
                            <div class="voice-embedded-card">
                                <div class="voice-mic-container">
                                    <div class="voice-pulse-circle"></div>
                                    <div class="voice-pulse-circle-outer"></div>
                                    <i class="fas fa-microphone mic-icon"></i>
                                </div>
                                <h3 class="voice-status-text" id="voice-status">Accessing Mic...</h3>
                                <p class="voice-sub-text" id="voice-sub-status">Please allow microphone access</p>
                                <div class="voice-transcript-preview" id="voice-transcript-preview">Waiting for your voice...</div>
                            </div>
                        </div>

                        <ul class="search-results" id="live-search-results" style="width: 100%; display: none;">
                            <!-- Dynamically populated by assets/js/navigation.js -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <script src="/assets/js/navigation.js?v=6.4"></script>

    <main>
