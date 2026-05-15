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
    
    <!-- jQuery (Required for Makisu) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Header Styles -->
    <style>
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
            padding: 0 6vw;
        }

        .header-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            width: 100%;
            max-width: 1600px;
        }

        .logo {
            justify-self: start;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1001;
        }

        .logo img { height: 60px; width: auto; display: block; }
        .logo-hidden { opacity: 0; pointer-events: none; transform: scale(0.8) translateX(-20px); }

        /* Desktop Capsule Navigation */
        .nav-links {
            justify-self: end;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 0.6rem 2.5rem;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .nav-links a {
            font-family: 'Aeonik', sans-serif;
            font-weight: 400;
            font-size: 0.85rem;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            transition: 0.3s;
            padding: 5px 10px;
        }

        .nav-links a:hover, .nav-links a.active { color: #005ee9; }

        .cta-btn {
            background: #005ee9;
            color: #fff !important;
            padding: 0.6rem 1.8rem;
            border-radius: 50px;
            font-weight: 700;
            transition: 0.3s;
        }

        .cta-btn:hover { background: #003da0; transform: translateY(-2px); }

        /* Mobile Makisu Menu - Hidden by Default on Desktop */
        .mobile-nav-wrapper {
            display: none;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.8rem;
            color: #005ee9;
            z-index: 1100;
        }

        /* Responsive Logic */
        @media (max-width: 992px) {
            header { top: 15px; padding: 0 20px; }
            .header-container { display: flex; justify-content: space-between; align-items: center; }
            .logo img { height: 45px; }
            .nav-links { display: none; } /* Hide Desktop Nav */
            .menu-toggle { display: block; }
            
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
            .list dt, .list dd { margin: 0; background: #005ee9; color: #fff; font-family: 'Aeonik', sans-serif; text-align: center; }
            .list dt { display: none; } /* We use burger to toggle instead of dt */
            .list dd { font-size: 0.8rem; letter-spacing: 1px; border-top: 1px solid rgba(255, 255, 255, 0.1); height: 50px; line-height: 50px; background: #005ee9; }
            .list dd a { display: block; color: #fff; text-decoration: none; width: 100%; height: 100%; }
        }

        /* Smooth Scroll Essential CSS */
        html.lenis, html.lenis body { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto !important; }
        .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
        .lenis.lenis-stopped { overflow: hidden; }
        .lenis.lenis-scrolling iframe { pointer-events: none; }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <!-- Logo (Left) -->
            <a href="/" class="logo">
                <img src="/assets/img/logo-abmalaya.png?v=1.2" alt="AB Malaya Logo">
            </a>

            <!-- Desktop Navigation (Right) -->
            <div class="nav-links">
                <a href="/" class="<?php echo $currentPage == 'home' ? 'active' : ''; ?>">Home</a>
                <a href="/about" class="<?php echo $currentPage == 'about' ? 'active' : ''; ?>">About</a>
                <a href="/services" class="<?php echo $currentPage == 'services' ? 'active' : ''; ?>">Services</a>
                <a href="/careers" class="<?php echo $currentPage == 'careers' ? 'active' : ''; ?>">Careers</a>
                <a href="/contact" class="cta-btn <?php echo $currentPage == 'contact' ? 'active' : ''; ?>">Contact</a>
            </div>

            <!-- Mobile Burger -->
            <div class="menu-toggle" id="burger-btn">
                <i class="fas fa-bars"></i>
            </div>

            <!-- Mobile Makisu Menu -->
            <div class="mobile-nav-wrapper">
                <dl class="list mks-menu">
                    <dt>MENU</dt>
                    <dd><a href="/">Home</a></dd>
                    <dd><a href="/about">About</a></dd>
                    <dd><a href="/services">Services</a></dd>
                    <dd><a href="/careers">Careers</a></dd>
                    <dd><a href="/contact">Contact</a></dd>
                </dl>
            </div>
        </div>
    </header>

    <script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <script>
        /**
         * Makisu jQuery Plugin (Integrated & Fixed)
         */
        (function($) {
            var el = document.createElement('div'),
                re = /^(Moz|(w|W)ebkit|O|ms)(?=[A-Z])/,
                vendor = (function() { for (var p in el.style) if(re.test(p)) return p.match(re)[0]; })() || '',
                canRun = vendor + 'Perspective' in el.style,
                prefix = '-' + vendor.toLowerCase() + '-';

            var api = {
                toggle: function() {
                    var $this = $(this);
                    $this.makisu($this.hasClass('open') ? 'close' : 'open');
                },
                open: function(speed, overlap, easing) {
                    var $this = $(this), $root = $this.find('.root'), $kids = $this.find('.node').not($root);
                    speed = speed || $this.data('speed') || 0.8;
                    overlap = overlap || $this.data('overlap') || 0.6;
                    easing = easing || $this.data('easing') || 'ease-in-out';
                    
                    var time = speed * (1 - overlap); // Fixed Scope

                    $kids.each(function(index, el) {
                        var anim = 'unfold' + (!index ? '-first' : ''),
                            last = index === $kids.length - 1,
                            wait = index * time,
                            $item = $(el),
                            $over = $item.find('.over');

                        $item.css(prefix + 'transform', 'rotateX(180deg)');
                        $item.css(prefix + 'animation', anim + ' ' + speed + 's ' + easing + ' ' + wait + 's 1 normal forwards');
                        if (!last) wait = (index + 1) * time;
                        $over.css(prefix + 'animation', 'unfold-over ' + (speed * 0.45) + 's ' + easing + ' ' + wait + 's 1 normal forwards');
                    });
                    $root.css(prefix + 'animation', 'swing-out ' + ($kids.length * time * 1.4) + 's ease-in-out 0s 1 normal forwards');
                    $this.addClass('open');
                },
                close: function(speed, overlap, easing) {
                    var $this = $(this), $root = $this.find('.root'), $kids = $this.find('.node').not($root);
                    speed = (speed || $this.data('speed') || 0.8) * 0.66;
                    overlap = overlap || $this.data('overlap') || 0.6;
                    easing = easing || $this.data('easing') || 'ease-in-out';

                    var time = speed * (1 - overlap); // Fixed Scope

                    $kids.each(function(index, el) {
                        var anim = 'fold' + (!index ? '-first' : ''),
                            last = index === 0,
                            wait = ($kids.length - index - 1) * time,
                            $item = $(el),
                            $over = $item.find('.over');

                        $item.css(prefix + 'transform', 'rotateX(0deg)');
                        $item.css(prefix + 'animation', anim + ' ' + speed + 's ' + easing + ' ' + wait + 's 1 normal forwards');
                        if (!last) wait = (($kids.length - index - 2) * time) + (speed * 0.35);
                        $over.css(prefix + 'animation', 'fold-over ' + (speed * 0.45) + 's ' + easing + ' ' + wait + 's 1 normal forwards');
                    });
                    $root.css(prefix + 'animation', 'swing-in ' + ($kids.length * time * 1.0) + 's ease-in-out 0s 1 normal forwards');
                    $this.removeClass('open');
                }
            };

            var utils = {
                prefix: function(style) { for (var key in style) { style[prefix + key] = style[key]; } return style; },
                inject: function(rule) { try { var style = document.createElement('style'); style.innerHTML = rule; document.getElementsByTagName('head')[0].appendChild(style); } catch (e) {} }
            };

            $.fn.makisu = function(options) {
                if (!canRun) return;
                if (!$.fn.makisu.initialized) {
                    $.fn.makisu.initialized = true;
                    utils.inject('@' + prefix + 'keyframes unfold { 0% {' + prefix + 'transform: rotateX(180deg); } 50% {' + prefix + 'transform: rotateX(-30deg); } 100% {' + prefix + 'transform: rotateX(0deg); } }');
                    utils.inject('@' + prefix + 'keyframes unfold-first { 0% {' + prefix + 'transform: rotateX(-90deg); } 50% {' + prefix + 'transform: rotateX(60deg); } 100% {' + prefix + 'transform: rotateX(0deg); } }');
                    utils.inject('@' + prefix + 'keyframes fold { 0% {' + prefix + 'transform: rotateX(0deg); } 100% {' + prefix + 'transform: rotateX(180deg); } }');
                    utils.inject('@' + prefix + 'keyframes fold-first { 0% {' + prefix + 'transform: rotateX(0deg); } 100% {' + prefix + 'transform: rotateX(-180deg); } }');
                    utils.inject('@' + prefix + 'keyframes swing-out { 0% {' + prefix + 'transform: rotateX(0deg); } 30% {' + prefix + 'transform: rotateX(-30deg); } 60% {' + prefix + 'transform: rotateX(15deg); } 100% {' + prefix + 'transform: rotateX(0deg); } }');
                    utils.inject('@' + prefix + 'keyframes swing-in { 0% {' + prefix + 'transform: rotateX(0deg); } 50% {' + prefix + 'transform: rotateX(-10deg); } 90% {' + prefix + 'transform: rotateX(15deg); } 100% {' + prefix + 'transform: rotateX(0deg); } }');
                    utils.inject('@' + prefix + 'keyframes unfold-over { 0% { opacity: 1.0; } 100% { opacity: 0.0; } }');
                    utils.inject('@' + prefix + 'keyframes fold-over { 0% { opacity: 0.0; } 100% { opacity: 1.0; } }');
                    utils.inject('.node { position: relative; display: block; }');
                    utils.inject('.face { pointer-events: none; position: absolute; display: block; height: 100%; width: 100%; left: 0; top: 0; }');
                }
                var args = Array.prototype.slice.call(arguments, 1);
                return this.each(function() {
                    if (api[options]) return api[options].apply(this, args);
                    var $t = $(this);
                    if (!$t.data('initialized')) {
                        $t.data('initialized', true);
                        var $kids = $t.children('dd'), $root = $('<span class="node root"/>'), $base = $root;
                        $kids.each(function(i, el) {
                            var $item = $(el), $back = $('<span class="face back"/>'), $over = $('<span class="face over"/>');
                            $item.css({'position': 'relative', 'transform-style': 'preserve-3d', 'transform': 'translateZ(-0.1px)'});
                            $back.css({'background': $item.css('background'), 'transform': 'translateZ(-0.1px)'});
                            $over.css({'background': 'rgba(0,0,0,0.15)', 'opacity': 0.0, 'transform': 'translateZ(0.1px)'});
                            var $node = $('<span class="node"/>').append($item);
                            $node.css({'transform-origin': '50% 0%', 'transform-style': 'preserve-3d', 'animation': 'fold' + (!i ? '-first' : '') + ' 1ms linear 0s 1 normal forwards'});
                            $item.append($over).append($back);
                            $base.append($node); $base = $node;
                        });
                        $root.css({'transform-origin': '50% 0%', 'transform-style': 'preserve-3d'});
                        $t.css(prefix + 'transform', 'perspective(1200px)').append($root);
                    }
                });
            };
        })(jQuery);

        // Initialize
        $(function() {
            var $menu = $('.mks-menu');
            var $wrapper = $('.mobile-nav-wrapper');
            $menu.makisu({ selector: 'dd', overlap: 0.6, speed: 0.8 });

            $('#burger-btn').on('click', function() {
                $wrapper.toggleClass('active');
                $menu.makisu('toggle');
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 50 && $menu.hasClass('open')) {
                    $menu.makisu('close');
                    $wrapper.removeClass('active');
                }
                const logo = document.querySelector('.logo');
                if (window.scrollY > 10) { logo.classList.add('logo-hidden'); } 
                else { logo.classList.remove('logo-hidden'); }
            });
        });

        const lenis = new Lenis({
            duration: 1.5,
            lerp: 0.08,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            direction: 'vertical',
            gestureDirection: 'vertical',
            smooth: true,
            smoothWheel: true,
            mouseMultiplier: 1,
            smoothTouch: false,
            touchMultiplier: 2,
            infinite: false,
        })
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);
    </script>
    <main>
