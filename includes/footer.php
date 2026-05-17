    </main>
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-info">
                    <div class="footer-logo" style="margin-bottom: 2rem;">
                        <img src="assets/img/logo-abmalaya.png?v=1.2" alt="AB Malaya Logo" style="height: 55px; width: auto; filter: brightness(0) invert(1); display: block;">
                    </div>
                    <p style="opacity: 0.7; margin-bottom: 1.5rem;">
                        Trusted Partner in Marine Services, Cross-Border Solutions, and Environmental Excellence.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/certified">Certified</a></li>
                        <li><a href="/contact">Tender Inquiry</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="/services#marine">Marine & Subsea</a></li>
                        <li><a href="/services#it">Industrial IT</a></li>
                        <li><a href="/services#consultancy">Consultancy</a></li>
                        <li><a href="/services#energy">Green Energy</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p style="opacity: 0.7; font-size: 0.9rem;">
                        Wisma Rampai, Jalan 34/26,<br>
                        Taman Sri Rampai,<br>
                        53300 Kuala Lumpur.<br>
                        Email: info@abmalaya.com
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <p>&copy; <?php echo date("Y"); ?> AB MALAYA Sdn Bhd. All rights reserved.</p>
                    <p style="font-size: 0.8rem; opacity: 0.6;">Powered by <a href="https://mijdigital.my" target="_blank" style="color: inherit; text-decoration: underline;">Mijdigital</a></p>
                    <div style="display: flex; gap: 1.5rem; font-size: 0.8rem; flex-wrap: wrap;">
                        <a href="/policies" style="opacity: 0.6; color: inherit; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'">Company Policies</a>
                        <a href="/privacy" style="opacity: 0.6; color: inherit; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'">Privacy Policy</a>
                        <a href="/terms" style="opacity: 0.6; color: inherit; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'">Terms of Use</a>
                        <a href="/service-terms" style="opacity: 0.6; color: inherit; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Unified Floating Support Capsule -->
    <div class="floating-capsule-wrap" id="waCapsuleWrap">
        <!-- WA Options (Appears above the capsule) -->
        <div id="wa-options" style="display: none; flex-direction: column; gap: 10px; margin-bottom: 15px; transform: translateY(20px); opacity: 0; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
            <a href="https://wa.me/60172240091" target="_blank" class="liquid-metal-item">
                <i class="fab fa-whatsapp" style="color: #25d366; font-size: 1.2rem;"></i> Sales Support
            </a>
            <a href="https://wa.me/601113777282" target="_blank" class="liquid-metal-item">
                <i class="fab fa-whatsapp" style="color: #25d366; font-size: 1.2rem;"></i> Tech Inquiry
            </a>
        </div>

        <!-- The Capsule -->
        <div class="liquid-metal-capsule">
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" style="width: 50px; height: 50px; border-radius: 50%; background: transparent; border: none; color: #0f172a; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; justify-content: center; border-right: 1px solid rgba(0,0,0,0.05);">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button onclick="toggleWAMenu()" style="width: 50px; height: 50px; border-radius: 50%; background: transparent; border: none; color: #25d366; font-size: 1.5rem; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                <i class="fab fa-whatsapp"></i>
            </button>
        </div>
    </div>

    <!-- Premium Claymorphic Cookie Consent Card -->
    <div class="cookie-consent-card" id="cookieConsentCard">
        <div class="cookie-content">
            <div class="cookie-header">
                <i class="fas fa-cookie-bite cookie-icon"></i>
                <h3>Cookies & Privacy</h3>
            </div>
            <p>We use cookies to optimize your browsing experience on the AB Malaya platform.</p>
            <div class="cookie-actions">
                <a href="/privacy" class="cookie-btn-secondary">Privacy Policy</a>
                <button onclick="acceptCookies()" class="cookie-btn-primary">Accept All</button>
            </div>
        </div>
    </div>

    <!-- Right Side Elegant Scroll Indicator -->
    <div class="right-indicator-container">
        <div class="scroll-line-bg"></div>
        <div class="scroll-line-active" id="scrollLine"></div>
    </div>

    <!-- Scripts -->
    <script>
        function toggleWAMenu() {
            const options = document.getElementById('wa-options');
            const cookieCard = document.getElementById('cookieConsentCard');
            if (options.style.display === 'none' || options.style.display === '') {
                options.style.display = 'flex';
                setTimeout(() => {
                    options.style.transform = 'translateY(0)';
                    options.style.opacity = '1';
                    if (cookieCard && cookieCard.classList.contains('active')) {
                        cookieCard.style.transform = 'scale(1) translateY(-110px)';
                    }
                }, 10);
            } else {
                options.style.transform = 'translateY(20px)';
                options.style.opacity = '0';
                setTimeout(() => {
                    options.style.display = 'none';
                    if (cookieCard && cookieCard.classList.contains('active')) {
                        cookieCard.style.transform = 'scale(1) translateY(0)';
                    }
                }, 300);
            }
        }

        function acceptCookies() {
            const cookieCard = document.getElementById('cookieConsentCard');
            const waWrap = document.getElementById('waCapsuleWrap');
            if (cookieCard) {
                cookieCard.classList.remove('active');
                localStorage.setItem('cookie_accepted', 'true');
                if (waWrap) {
                    waWrap.classList.remove('cookie-active');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Cookie Consent Entry Delay
            const cookieCard = document.getElementById('cookieConsentCard');
            const waWrap = document.getElementById('waCapsuleWrap');
            if (cookieCard && !localStorage.getItem('cookie_accepted')) {
                setTimeout(() => {
                    cookieCard.classList.add('active');
                    if (waWrap) {
                        waWrap.classList.add('cookie-active');
                    }
                }, 1500); // 1.5 seconds premium delay
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.card, .section-title, .hero-content').forEach(el => {
                el.classList.add('fade-in-init');
                observer.observe(el);
            });

            const scrollLine = document.getElementById('scrollLine');
            
            // Highly optimized scroll indicator (integrated directly with Lenis or using passive listener)
            if (typeof lenis !== 'undefined') {
                lenis.on('scroll', (e) => {
                    const scrolled = (e.scroll / e.limit) * 100;
                    if (scrollLine) {
                        scrollLine.style.height = scrolled + "%";
                    }
                });
            } else {
                window.addEventListener('scroll', () => {
                    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                    const scrolled = (winScroll / height) * 100;
                    if (scrollLine) {
                        scrollLine.style.height = scrolled + "%";
                    }
                }, { passive: true });
            }

            const menuCheckbox = document.getElementById('mobile-menu-checkbox');
            const navLinks = document.querySelectorAll('.nav-links a');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (menuCheckbox) menuCheckbox.checked = false;
                });
            });
        });
    </script>
    <style>
        .fade-in-init {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .social-links a {
            font-size: 1.5rem;
            margin-right: 1rem;
            opacity: 0.7;
        }
        .social-links a:hover {
            opacity: 1;
            color: var(--accent);
        }

    <style>
        .fade-in-init {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .social-links a {
            font-size: 1.5rem;
            margin-right: 1rem;
            opacity: 0.7;
        }
        .social-links a:hover {
            opacity: 1;
            color: var(--accent);
        }

        /* Liquid Metal Capsule & Support Elements (Animated Metal Shimmer, Static Hover) */
        .liquid-metal-capsule {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.15)) padding-box,
                        linear-gradient(135deg, #71717a, #e4e4e7, #ffffff, #a1a1aa, #27272a, #ffffff, #a1a1aa, #e4e4e7) border-box;
            border: 1px solid transparent;
            border-radius: 50px;
            padding: 5px;
            display: flex;
            align-items: center;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12), 
                        inset 0 1px 2px rgba(255, 255, 255, 0.4);
            background-size: 300% 300%;
            animation: liquidMetalShimmer 6s linear infinite;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .liquid-metal-capsule:hover {
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18), 
                        inset 0 1px 3px rgba(255, 255, 255, 0.6);
            /* Static wrapper - no hover movement */
        }

        .liquid-metal-capsule button {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .liquid-metal-capsule button:hover {
            transform: scale(1.1); /* Subtle internal icon interaction */
        }

        .liquid-metal-item {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.25)) padding-box,
                        linear-gradient(135deg, #71717a, #e4e4e7, #ffffff, #a1a1aa, #27272a, #ffffff, #a1a1aa, #e4e4e7) border-box;
            border: 1px solid transparent;
            border-radius: 30px;
            color: #0f172a !important;
            padding: 12px 22px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08),
                        inset 0 1px 1px rgba(255, 255, 255, 0.5);
            background-size: 300% 300%;
            animation: liquidMetalShimmer 6s linear infinite;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .liquid-metal-item:hover {
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15),
                        inset 0 1px 2px rgba(255, 255, 255, 0.7);
            /* Static wrapper - no hover movement */
        }

        @keyframes liquidMetalShimmer {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Unified Floating Support Capsule Container Style */
        .floating-capsule-wrap {
            position: fixed;
            bottom: 50px;
            right: 30px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            transition: bottom 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* When Cookie Consent Card is Active on Mobile, floating capsule wrap is pushed up */
        @media (max-width: 768px) {
            .floating-capsule-wrap {
                bottom: 30px;
                right: 20px;
            }
            .floating-capsule-wrap.cookie-active {
                bottom: 210px !important;
            }
        }

        /* Premium Cookie Consent Card Style (Claymorphism) */
        .cookie-consent-card {
            position: fixed;
            bottom: 130px; /* Above the WA capsule in desktop mode */
            right: 30px;
            left: auto;
            width: 330px;
            background: #ffffff; /* soft light clay base */
            border-radius: 28px;
            padding: 1.6rem;
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transform: scale(0.9) translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275), visibility 0.5s;
            
            /* Claymorphism signature double inner & soft outer shadows */
            border: 2px solid #ffffff;
            box-shadow: 12px 12px 28px rgba(15, 23, 42, 0.06),
                        -4px -4px 12px rgba(255, 255, 255, 0.8),
                        inset 3px 3px 6px rgba(255, 255, 255, 0.9),
                        inset -6px -6px 12px rgba(148, 163, 184, 0.2);
        }

        .cookie-consent-card.active {
            opacity: 1;
            visibility: visible;
            transform: scale(1) translateY(0);
        }

        .cookie-content {
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
        }

        .cookie-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .cookie-icon {
            font-size: 1.8rem;
            color: #005ee9; /* Brand Blue */
            animation: cookiePulse 3s ease-in-out infinite;
        }

        .cookie-content h3 {
            font-family: 'Aeonik', 'Inter', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .cookie-content p {
            font-family: 'Inter', sans-serif;
            font-size: 0.82rem;
            line-height: 1.45;
            color: #475569;
            margin: 0;
        }

        .cookie-actions {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .cookie-btn-primary {
            flex: 1;
            background: #005ee9;
            color: #ffffff;
            border: 2px solid #005ee9;
            padding: 11px 20px;
            border-radius: 50px;
            font-family: 'Aeonik', sans-serif;
            font-size: 0.85rem;
            font-weight: 800;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            
            /* Blue Claymorphism Inset */
            box-shadow: 4px 4px 12px rgba(0, 94, 233, 0.22),
                        inset 2px 2px 4px rgba(255, 255, 255, 0.4),
                        inset -4px -4px 8px rgba(0, 0, 0, 0.2);
        }

        .cookie-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 6px 6px 18px rgba(0, 94, 233, 0.3),
                        inset 2px 2px 4px rgba(255, 255, 255, 0.5),
                        inset -4px -4px 8px rgba(0, 0, 0, 0.15);
        }

        .cookie-btn-primary:active {
            transform: translateY(0);
        }

        .cookie-btn-secondary {
            background: #f1f5f9;
            color: #475569;
            border: 2px solid #ffffff;
            padding: 11px 18px;
            border-radius: 50px;
            font-family: 'Aeonik', sans-serif;
            font-size: 0.85rem;
            font-weight: 800;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            
            /* Light Slate Claymorphism Inset */
            box-shadow: 2px 2px 6px rgba(148, 163, 184, 0.15),
                        inset 2px 2px 4px rgba(255, 255, 255, 0.9),
                        inset -3px -3px 6px rgba(148, 163, 184, 0.2);
        }

        .cookie-btn-secondary:hover {
            background: #e2e8f0;
            color: #0f172a;
            transform: translateY(-1px);
            box-shadow: 4px 4px 10px rgba(148, 163, 184, 0.25),
                        inset 2px 2px 4px rgba(255, 255, 255, 0.9),
                        inset -3px -3px 6px rgba(148, 163, 184, 0.15);
        }

        @keyframes cookiePulse {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(15deg); }
        }

        /* Mobile Responsive adjustment for Cookie Card */
        @media (max-width: 576px) {
            .cookie-consent-card {
                left: 20px;
                right: 20px;
                width: auto;
                bottom: 20px;
                padding: 1.3rem;
            }
        }

        /* Footer Mobile Refinement */
        @media (max-width: 768px) {
            footer {
                padding: 40px 0 30px;
            }
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem 1rem;
            }
            .footer-info {
                grid-column: span 2;
                margin-bottom: 1rem;
            }
            .footer-links:last-child {
                grid-column: span 2;
                margin-top: 1rem;
            }
            .footer-links h4 {
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            .footer-links ul li {
                font-size: 0.85rem;
            }
            .footer-bottom {
                text-align: left;
                padding-top: 30px;
            }
            .footer-bottom > div {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1.5rem;
            }
        }
    </style>
</body>
</html>
