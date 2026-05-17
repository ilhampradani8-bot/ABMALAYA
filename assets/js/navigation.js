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

function raf(time) { 
    lenis.raf(time); 
    requestAnimationFrame(raf); 
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

    // Desktop Trigger (Expanding Bar)
    $('#search-desktop-trigger').on('click', function(e) {
        if (!searchContainerDesktop.hasClass('active')) {
            searchContainerDesktop.addClass('active');
            searchInputInline.focus();
        } else {
            if (searchInputInline.val().trim() === "") {
                searchContainerDesktop.removeClass('active');
            } else {
                searchContainerDesktop.find('form').submit();
            }
        }
    });

    // Mobile Trigger (Pop-up with Glassmorphism)
    $('#search-mobile-trigger').on('click', function() {
        searchOverlay.addClass('active');
        setTimeout(() => searchInputMobile.focus(), 300);
    });

    // Mobile & Escape Handling
    $('#search-close').on('click', function() {
        searchOverlay.removeClass('active');
    });

    $(document).on('keydown', function(e) {
        if (e.key === "Escape") {
            searchOverlay.removeClass('active');
            searchContainerDesktop.removeClass('active');
        }
    });
});
