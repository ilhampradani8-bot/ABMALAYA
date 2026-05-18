/**
 * AB Malaya - Navigation & Global Logic
 * Extracted from header.php for modularity
 */

// Initialize Lenis FIRST
const lenis = new Lenis({
    duration: 1.2,
    lerp: 0.1,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true
});

// Sync Lenis with GSAP ScrollTrigger if GSAP is available to avoid dual animation loops (causes stutters/lag)
let gsapTickerActive = false;
function raf(time) {
    if (!gsapTickerActive && typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsapTickerActive = true;
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);
        return;
    }
    
    if (!gsapTickerActive) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
}
requestAnimationFrame(raf);

/**
 * Makisu jQuery Plugin (Precision CodePen Version)
 */
(function($) {
    var initialized = false;
    var el = document.createElement('div');
    var re = /^(Moz|(w|W)ebkit|O|ms)(?=[A-Z])/;
    var vendor = (function() { for (var p in el.style) if(re.test(p)) return p.match(re)[0]; })() || '';
    var canRun = vendor + 'Perspective' in el.style;
    var prefix = '-' + vendor.toLowerCase() + '-';

    var api = {
        toggle: function() {
            var $this = $(this);
            $this.makisu($this.hasClass('open') ? 'close' : 'open');
        },
        open: function(speed, overlap, easing) {
            var $this = $(this), $root = $this.find('.root'), $kids = $this.find('.node').not($root);
            speed = typeof speed === 'undefined' ? $this.data('speed') : speed;
            easing = typeof easing === 'undefined' ? $this.data('easing') : easing;
            overlap = typeof overlap === 'undefined' ? $this.data('overlap') : overlap;

            $kids.each(function(index, el) {
                var anim = 'unfold' + (!index ? '-first' : ''),
                    last = index === $kids.length - 1,
                    time = speed * (1 - overlap),
                    wait = index * time,
                    $item = $(el),
                    $over = $item.find('.over');

                $item.css(utils.prefix({
                    'transform': 'rotateX(180deg)',
                    'animation': anim + ' ' + speed + 's ' + easing + ' ' + wait + 's 1 normal forwards'
                }));
                if (!last) wait = (index + 1) * time;
                $over.css(utils.prefix({
                    'animation': 'unfold-over ' + (speed * 0.45) + 's ' + easing + ' ' + wait + 's 1 normal forwards'
                }));
            });
            $root.css(utils.prefix({
                'animation': 'swing-out ' + ($kids.length * speed * (1 - overlap) * 1.4) + 's ease-in-out 0s 1 normal forwards'
            }));
            $this.addClass('open');
        },
        close: function(speed, overlap, easing) {
            var $this = $(this), $root = $this.find('.root'), $kids = $this.find('.node').not($root);
            speed = (typeof speed === 'undefined' ? $this.data('speed') : speed) * 0.66;
            easing = typeof easing === 'undefined' ? $this.data('easing') : easing;
            overlap = typeof overlap === 'undefined' ? $this.data('overlap') : overlap;

            $kids.each(function(index, el) {
                var anim = 'fold' + (!index ? '-first' : ''),
                    last = index === 0,
                    time = speed * (1 - overlap),
                    wait = ($kids.length - index - 1) * time,
                    $item = $(el),
                    $over = $item.find('.over');

                $item.css(utils.prefix({
                    'transform': 'rotateX(0deg)',
                    'animation': anim + ' ' + speed + 's ' + easing + ' ' + wait + 's 1 normal forwards'
                }));
                if (!last) wait = (($kids.length - index - 2) * time) + (speed * 0.35);
                $over.css(utils.prefix({
                    'animation': 'fold-over ' + (speed * 0.45) + 's ' + easing + ' ' + wait + 's 1 normal forwards'
                }));
            });
            $root.css(utils.prefix({
                'animation': 'swing-in ' + ($kids.length * speed * (1 - overlap) * 1.0) + 's ease-in-out 0s 1 normal forwards'
            }));
            $this.removeClass('open');
        }
    };

    var utils = {
        prefix: function(style) { for (var key in style) { style[prefix + key] = style[key]; } return style; },
        inject: function(rule) { try { var style = document.createElement('style'); style.innerHTML = rule; document.getElementsByTagName('head')[0].appendChild(style); } catch (e) {} }
    };

    var markup = {
        node: '<span class="node"/>',
        back: '<span class="face back"/>',
        over: '<span class="face over"/>'
    };

    $.fn.makisu = function(options) {
        if (!canRun) return;
        if (!initialized) {
            initialized = true;
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
            var $t = $(this).data($.extend({}, $.fn.makisu.defaults, options));
            if (!$t.data('initialized')) {
                $t.data('initialized', true);
                var $kids = $t.children($t.data('selector')), $root = $(markup.node).addClass('root'), $base = $root;
                $kids.each(function(index, el) {
                    var $item = $(el), $back = $(markup.back), $over = $(markup.over);
                    $item.css('position', 'relative');
                    $item.css(utils.prefix({'transform-style': 'preserve-3d', 'transform': 'translateZ(-0.1px)'}));
                    $back.css({'background': $item.css('background'), 'transform': 'translateZ(-0.1px)'});
                    $over.css(utils.prefix({'transform': 'translateZ(0.1px)'})).css({'background': $t.data('shading'), 'opacity': 0.0});
                    var $node = $(markup.node).append($item);
                    $node.css(utils.prefix({'transform-origin': '50% 0%', 'transform-style': 'preserve-3d', 'animation': ('fold' + (!index ? '-first' : '')) + ' 1ms linear 0s 1 normal forwards'}));
                    $item.append($over).append($back);
                    $base.append($node); $base = $node;
                });
                $root.css(utils.prefix({'transform-origin': '50% 0%', 'transform-style': 'preserve-3d'}));
                $t.css(utils.prefix({'transform': 'perspective(' + $t.data('perspective') + 'px)'})).append($root);
            }
        });
    };

    $.fn.makisu.defaults = {
        perspective: 1200,
        shading: 'rgba(0,0,0,0.12)',
        selector: null,
        overlap: 0.6,
        speed: 0.8,
        easing: 'ease-in-out'
    };
})(jQuery);

// Initialize Navigation Logic
$(function() {
    var $menu = $('.mks-menu');
    var $wrapper = $('.mobile-nav-wrapper');
    $menu.makisu({ selector: 'dd', overlap: 0.6, speed: 0.8 });

    function closeMobileMenu() {
        if ($menu.hasClass('open')) {
            $menu.makisu('close');
            setTimeout(() => {
                if (!$menu.hasClass('open')) {
                    $wrapper.removeClass('active');
                }
            }, 800);
        }
    }

    $('#burger-btn').on('click', function(e) {
        e.stopPropagation();
        if ($menu.hasClass('open')) {
            closeMobileMenu();
        } else {
            $wrapper.addClass('active');
            $menu.makisu('open');
        }
    });

    // Close on click outside
    $(document).on('click', function(e) {
        if ($menu.hasClass('open') && !$(e.target).closest('.mobile-nav-wrapper, #burger-btn').length) {
            closeMobileMenu();
        }
    });

    const logo = document.querySelector('.logo');
    
    // Unified Scroll Handler for Logo Autohide and Menu Auto-close
    function handleScrollAction() {
        const scrollY = window.scrollY;
        
        // Logo Autohide Logic
        if (scrollY > 40 && !$menu.hasClass('open')) {
            if (logo) logo.classList.add('logo-hidden');
        } else {
            if (logo) logo.classList.remove('logo-hidden');
        }
        
        // Auto-close menu on significant scroll
        if (scrollY > 150 && $menu.hasClass('open')) {
            closeMobileMenu();
        }
    }

    // Register on Lenis (for pages with smooth scrolling active)
    lenis.on('scroll', () => {
        handleScrollAction();
    });

    // Native window scroll fallback (for pages where Lenis is disabled/destroyed like services.php)
    window.addEventListener('scroll', () => {
        handleScrollAction();
    }, { passive: true });

    // --- SEARCH LOGIC ---
    const searchOverlay = $('#search-overlay');
    const searchInputMobile = $('#search-input-mobile');
    const searchContainerDesktop = $('#search-desktop-container');
    const searchInputInline = $('#search-inline-input');
    const liveSearchResults = $('#live-search-results');

    // Data Source identical to search.php for client-side instant matches
    const siteContent = [
        {
            title: 'Marine Division',
            desc: 'Comprehensive engineering solutions for the marine industry, ship consumables, and logistics.',
            link: '/services#marine',
            icon: 'fa-ship',
            tags: 'marine, subsea, ship, rust, coating, boiler, vecom, crew'
        },
        {
            title: 'Logistic Division',
            desc: 'Seamless logistics between Singapore, Malaysia, and Thailand with professional handling.',
            link: '/services#cross',
            icon: 'fa-shipping-fast',
            tags: 'logistics, transport, cross-border, singapore, thailand, cargo, storage'
        },
        {
            title: 'Environmental Solutions',
            desc: 'Corrosion prevention, waste management, and industrial spill containment.',
            link: '/services#env',
            icon: 'fa-leaf',
            tags: 'environment, green, energy, corrosion, waste, spill, wastewater'
        },
        {
            title: 'About AB Malaya',
            desc: 'Our journey, vision, and mission in the maritime and industrial sectors.',
            link: '/about',
            icon: 'fa-info-circle',
            tags: 'about, vision, mission, journey, history, team'
        },
        {
            title: 'Certified & Excellence',
            desc: 'Our commitment to global standards, ISO certifications, and industrial excellence.',
            link: '/certified',
            icon: 'fa-certificate',
            tags: 'certified, certification, iso, quality, safety, petronas, license'
        },
        {
            title: 'Contact Us',
            desc: 'Get in touch with our experts in Kuala Lumpur for technical consultations.',
            link: '/contact',
            icon: 'fa-paper-plane',
            tags: 'contact, address, phone, email, support, help, location'
        },
        {
            title: 'Projects & Portfolio',
            desc: 'Explore our successful track record of marine engineering, cross-border transport, and industrial projects.',
            link: '/projects',
            icon: 'fa-folder-open',
            tags: 'projects, portfolio, track record, work, engineering, logistics, shipping, clients'
        },
        {
            title: 'Kebijakan Privasi',
            desc: 'Privacy policy and data protection for AB MALAYA Sdn Bhd.',
            link: '/privacy',
            icon: 'fa-shield-alt',
            tags: 'privacy, data, legal, policy'
        },
        {
            title: 'Terms & Conditions',
            desc: 'Read the legal terms of service and usage regulations of the AB Malaya platform.',
            link: '/terms',
            icon: 'fa-file-contract',
            tags: 'terms, conditions, legal, contract, service, agreement'
        }
    ];

    // Desktop Trigger (Expanding Bar - Click Manual Toggle)
    $('#search-desktop-trigger').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (!searchContainerDesktop.hasClass('active')) {
            searchContainerDesktop.addClass('active');
            searchInputInline.focus();
        } else {
            if (searchInputInline.val().trim() === "") {
                searchContainerDesktop.removeClass('active');
                searchInputInline.blur();
                liveSearchResults.hide();
            } else {
                searchContainerDesktop.find('form').submit();
            }
        }
    });

    // Close header search on clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#search-desktop-container').length) {
            if (searchContainerDesktop.hasClass('active')) {
                searchContainerDesktop.removeClass('active');
                searchInputInline.val('');
                searchInputInline.blur();
                liveSearchResults.hide();
            }
        }
    });

    // Helper function to render result rows directly below input field
    function renderSearchResults(query) {
        liveSearchResults.empty();
        const trimmed = query.trim().toLowerCase();

        // If nothing is typed, hide results so they don't block the suggestions below the input!
        if (trimmed === "") {
            liveSearchResults.hide();
            return;
        }

        // Filter contents
        const matches = siteContent.filter(item => {
            return item.title.toLowerCase().includes(trimmed) || 
                   item.desc.toLowerCase().includes(trimmed) || 
                   item.tags.toLowerCase().includes(trimmed);
        });

        if (matches.length === 0) {
            liveSearchResults.append(`
                <div class="search-results-empty">
                    <i class="fas fa-search"></i>
                    No matches found for "${query}"<br>
                    <span style="font-size: 0.8rem; color: #7f7f7f; margin-top: 4px; display: block;">Try searching for "marine", "logistics", or "contact"</span>
                </div>
            `);
            liveSearchResults.show();
            return;
        }

        matches.forEach(item => {
            liveSearchResults.append(`
                <a href="${item.link}" class="search-results-item">
                    <div class="search-results-icon"><i class="fas ${item.icon}"></i></div>
                    <div class="search-results-info">
                        <div class="search-results-heading">${item.title}</div>
                        <div class="search-results-desc">${item.desc}</div>
                    </div>
                    <div class="search-results-chevron"><i class="fas fa-chevron-right"></i></div>
                </a>
            `);
        });
        
        liveSearchResults.show();
    }

    // Mobile Trigger (Codepen full-screen slide-down)
    $('#search-mobile-trigger').on('click', function() {
        searchOverlay.addClass('active');
        renderSearchResults(""); // Hide initially on empty
        setTimeout(() => searchInputMobile.focus(), 300);
    });

    // Real-time search key listener
    searchInputMobile.on('input propertychange', function() {
        renderSearchResults($(this).val());
    });

    // Tactile Search Button click listener
    $('#search-submit-mobile').on('click', function() {
        renderSearchResults(searchInputMobile.val());
    });

    // Voice Search Web Speech API Integration
    const showVoiceSearchBtn = $('#show-voice-search');
    
    showVoiceSearchBtn.on('click', function(e) {
        e.preventDefault();
        
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
            alert("Voice Search is not supported in this browser. Please try Google Chrome or Safari!");
            return;
        }

        const recognition = new SpeechRecognition();
        recognition.lang = 'id-ID'; // Optimize for Indonesian/English spoken search
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        // Visual feedback when listening
        const originalHTML = showVoiceSearchBtn.html();
        
        recognition.onstart = function() {
            showVoiceSearchBtn.html('<i class="fas fa-microphone" style="color: #ef4444; animation: voicePulse 1s infinite;"></i> Listening... speak now');
            showVoiceSearchBtn.css('pointer-events', 'none');
        };

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onerror = function(event) {
            console.error("Speech recognition error:", event.error);
            showVoiceSearchBtn.html(originalHTML);
            showVoiceSearchBtn.css('pointer-events', 'auto');
        };

        recognition.onend = function() {
            showVoiceSearchBtn.html(originalHTML);
            showVoiceSearchBtn.css('pointer-events', 'auto');
        };

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            searchInputMobile.val(transcript);
            searchInputMobile.trigger('input'); // Trigger live-search preview
            
            // Redirect after 1.2s so they can see the transcribed speech before page load
            setTimeout(() => {
                searchInputMobile.closest('form').submit(); // Submit to search.php
            }, 1200);
        };

        recognition.start();
    });

    // Close Mobile Search Handler
    $('#search-close').on('click', function() {
        searchOverlay.removeClass('active');
    });

    // Close mobile search when clicking outside the menu container
    searchOverlay.on('click', function(e) {
        if ($(e.target).is(searchOverlay)) {
            searchOverlay.removeClass('active');
        }
    });

    // Direct suggestion navigation on clicking the side-left menu items
    $(document).on('click', '.side-menu-sugg', function() {
        const link = $(this).attr('data-link');
        if (link) {
            window.location.href = link;
            searchOverlay.removeClass('active');
        }
    });

    $(document).on('keydown', function(e) {
        if (e.key === "Escape") {
            searchOverlay.removeClass('active');
            searchContainerDesktop.removeClass('active');
        }
    });
});
