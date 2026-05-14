    </main>
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-info">
                    <div class="footer-logo">
                        <img src="assets/img/logo-abmalaya.png" alt="AB Malaya Logo" style="height: 40px; width: auto; filter: brightness(0) invert(1);">
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
                    <div style="display: flex; gap: 1.5rem; font-size: 0.8rem;">
                        <a href="/privacy" style="opacity: 0.6;">Kebijakan Privasi</a>
                        <a href="/terms" style="opacity: 0.6;">Ketentuan Layanan</a>
                        <a href="/service-terms" style="opacity: 0.6;">Term & Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Floating Components -->
    <div class="scroll-top" id="scrollTopBtn">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Right Side Elegant Scroll Indicator -->
    <div class="right-indicator-container">
        <div class="scroll-line-bg"></div>
        <div class="scroll-line-active" id="scrollLine"></div>
        <div class="scroll-label"><?php echo strtoupper($currentPage); ?></div>
    </div>

    <!-- Micro-animations Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer for fade-in animations
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

            // Scroll to Top & Line Indicator logic
            const scrollTopBtn = document.getElementById('scrollTopBtn');
            const scrollLine = document.getElementById('scrollLine');

            window.onscroll = function() {
                // Scroll Top Button visibility
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    scrollTopBtn.style.display = "flex";
                } else {
                    scrollTopBtn.style.display = "none";
                }

                // Scroll Line Progress
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                if (scrollLine) {
                    scrollLine.style.height = scrolled + "%";
                }
            };

            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Auto-hide mobile menu on link click
            const menuCheckbox = document.getElementById('mobile-menu-checkbox');
            const navLinks = document.querySelectorAll('.nav-links a');
            
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (menuCheckbox) menuCheckbox.checked = false;
                });
            });

            // Close menu when clicking the backdrop area
            const navLinksContainer = document.querySelector('.nav-links');
            if (navLinksContainer) {
                navLinksContainer.addEventListener('click', (e) => {
                    if (e.target === navLinksContainer) {
                        menuCheckbox.checked = false;
                    }
                });
            }
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
