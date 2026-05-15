    </main>
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-info">
                    <div class="footer-logo" style="display: flex; align-items: center; gap: 10px; margin-bottom: 1.5rem;">
                        <img src="assets/img/logo-abmalaya.png" alt="AB Malaya Logo" style="height: 40px; width: auto; filter: brightness(0) invert(1);">
                        <span style="font-family: 'Cinzel', serif; font-size: 1.5rem; color: #fff; font-weight: 700; letter-spacing: 2px;">ABmalaya</span>
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
                    <div style="display: flex; gap: 1.5rem; font-size: 0.8rem;">
                        <a href="/privacy" style="opacity: 0.6;">Kebijakan Privasi</a>
                        <a href="/terms" style="opacity: 0.6;">Ketentuan Layanan</a>
                        <a href="/service-terms" style="opacity: 0.6;">Term & Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Unified Floating Support Capsule -->
    <div class="floating-capsule-wrap" style="position: fixed; bottom: 50px; right: 30px; z-index: 9999; display: flex; flex-direction: column; align-items: flex-end;">
        <!-- WA Options (Appears above the capsule) -->
        <div id="wa-options" style="display: none; flex-direction: column; gap: 10px; margin-bottom: 15px; transform: translateY(20px); opacity: 0; transition: all 0.3s ease;">
            <a href="https://wa.me/60172240091" target="_blank" style="background: #25d366; color: #fff; padding: 12px 20px; border-radius: 30px; text-decoration: none; font-size: 0.9rem; font-weight: 600; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3); display: flex; align-items: center; gap: 10px;">
                <i class="fab fa-whatsapp"></i> Sales Support
            </a>
            <a href="https://wa.me/601113777282" target="_blank" style="background: #25d366; color: #fff; padding: 12px 20px; border-radius: 30px; text-decoration: none; font-size: 0.9rem; font-weight: 600; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3); display: flex; align-items: center; gap: 10px;">
                <i class="fab fa-whatsapp"></i> Tech Inquiry
            </a>
        </div>

        <!-- The Capsule -->
        <div style="background: var(--secondary); display: flex; align-items: center; border-radius: 50px; padding: 5px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1);">
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" style="width: 50px; height: 50px; border-radius: 50%; background: transparent; border: none; color: #fff; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; justify-content: center; border-right: 1px solid rgba(255,255,255,0.1);">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button onclick="toggleWAMenu()" style="width: 50px; height: 50px; border-radius: 50%; background: transparent; border: none; color: #25d366; font-size: 1.5rem; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                <i class="fab fa-whatsapp"></i>
            </button>
        </div>
    </div>

    <!-- Right Side Elegant Scroll Indicator -->
    <div class="right-indicator-container">
        <div class="scroll-line-bg"></div>
        <div class="scroll-line-active" id="scrollLine"></div>
        <div class="scroll-label"><?php echo strtoupper($currentPage); ?></div>
    </div>

    <!-- Scripts -->
    <script>
        function toggleWAMenu() {
            const options = document.getElementById('wa-options');
            if (options.style.display === 'none' || options.style.display === '') {
                options.style.display = 'flex';
                setTimeout(() => {
                    options.style.transform = 'translateY(0)';
                    options.style.opacity = '1';
                }, 10);
            } else {
                options.style.transform = 'translateY(20px)';
                options.style.opacity = '0';
                setTimeout(() => {
                    options.style.display = 'none';
                }, 300);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
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
            window.onscroll = function() {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                if (scrollLine) {
                    scrollLine.style.height = scrolled + "%";
                }
            };

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
    </style>
</body>
</html>
