<?php 
$pageTitle = "Selected Experience & Track Record - AB Malaya";
$currentPage = "projects";
include 'includes/header.php'; 

$heroTitle = "<span style='color: #1191cc;'>Selected Experience</span> <br><span style='color: #093863;'>& Proven Track Record</span>";
$heroSubtitle = "PROJECT PORTFOLIO";
$heroDesc = "Demonstrated execution capabilities across construction, engineering, marine services, logistics, and corrosion control. Relevant project experience delivered by AB Malaya, our management team, and strategic technical partners.";
$showButtons = true;
$heroBtn1Text = "Discuss Your Project";
$heroBtn1Link = "/contact";
$heroBtn2Text = "Submit Tender / RFQ";
$heroBtn2Link = "/tender";
include 'includes/hero_visual.php';
?>

<style>
    .projects-page-section {
        padding: 70px 0 0 0;
        background: #f8fafc;
        font-family: 'Inter', sans-serif;
    }
    
    .projects-filter-bar {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 50px;
        padding: 0 4vw;
    }
    
    .filter-btn {
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.06);
        border-radius: 30px;
        padding: 10px 24px;
        font-family: 'Aeonik', sans-serif;
        font-size: 0.9rem;
        font-weight: 700;
        color: #475569;
        box-shadow: 3px 3px 8px #cbd5e1, -3px -3px 8px #ffffff;
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .filter-btn:hover,
    .filter-btn.active {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
        box-shadow: inset 2px 2px 6px rgba(0,0,0,0.3);
        transform: translateY(-1px);
    }
    
    /* Full-Width Alternating Zigzag Article Container */
    article.projects-article {
        margin: 0 auto;
        display: block;
        width: 100%;
        max-width: 100%;
        padding: 10px 4vw 60px;
        box-sizing: border-box;
    }

    section.project-card {
        background: #ffffff;
        border-radius: 24px 24px 24px 48px;
        padding: 48px 48px 48px 360px;
        margin: 65px auto 65px 0;
        width: calc(100% - 120px);
        max-width: 1420px;
        display: flex;
        flex-direction: row;
        align-self: flex-start;
        position: relative;
        box-shadow:
            5px 0 25px rgba(200, 210, 220, 0.35),
            -5px 0 25px rgba(200, 210, 220, 0.35),
            0 12px 35px rgba(9, 56, 99, 0.07);
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-sizing: border-box;
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;
    }
    
    section.project-card:hover {
        transform: translateY(-5px);
        box-shadow:
            6px 0 25px rgba(200, 210, 220, 0.45),
            -6px 0 25px rgba(200, 210, 220, 0.45),
            0 18px 45px rgba(9, 56, 99, 0.12);
    }

    section.project-card .text-content {
        display: flex;
        flex-direction: column;
        width: 100%;
        z-index: 2;
    }
    
    section.project-card .card-top-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }
    
    /* Clean plain text typography without card background/border */
    section.project-card .sector-tag {
        font-size: 0.82rem;
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 0.8px;
        color: #0284c7;
        background: transparent;
        padding: 0;
        border: none;
        border-radius: 0;
        font-family: 'Aeonik', sans-serif;
    }

    section.project-card .meta-divider {
        color: #94a3b8;
        font-size: 0.85rem;
        font-weight: 400;
        user-select: none;
    }

    section.project-card .status-pill {
        font-size: 0.82rem;
        font-weight: 700;
        padding: 0;
        background: transparent;
        border: none;
        border-radius: 0;
        font-family: 'Inter', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .status-completed {
        color: #059669;
        background: transparent;
        border: none;
    }
    .status-completed::before {
        content: '';
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #059669;
    }

    .status-ongoing {
        color: #2563eb;
        background: transparent;
        border: none;
    }
    .status-ongoing::before {
        content: '';
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #2563eb;
    }

    section.project-card .text-content h3 {
        margin: 0 0 10px 0;
        font-family: 'Aeonik', sans-serif;
        font-size: 1.55rem;
        font-weight: 800;
        color: #093863;
        line-height: 1.3;
        letter-spacing: -0.5px;
    }
    
    section.project-card .meta-details-strip {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 14px;
        font-size: 0.88rem;
        color: #64748b;
    }
    
    section.project-card .meta-details-strip span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    section.project-card .meta-details-strip strong {
        color: #0f172a;
    }

    section.project-card .text-content p {
        margin: 0 0 24px 0;
        color: #475569;
        font-size: 0.96rem;
        line-height: 1.7;
    }

    section.project-card .text-content a.btn-project {
        border: 2px solid #093863;
        color: #093863;
        align-self: flex-start;
        text-decoration: none;
        padding: 12px 28px;
        border-radius: 12px;
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: 300ms all ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    section.project-card .text-content a.btn-project:hover {
        background: #093863;
        color: #ffffff;
        box-shadow: 0 6px 18px rgba(9, 56, 99, 0.25);
        transform: translateY(-2px);
    }

    /* Floating Image Thumbnail */
    section.project-card .visual {
        width: 290px;
        height: calc(100% + 48px);
        position: absolute;
        top: -24px;
        left: 32px;
        overflow: hidden;
        border-radius: 24px;
        box-shadow:
            0 12px 30px rgba(0, 0, 0, 0.16),
            0 4px 12px rgba(0, 0, 0, 0.08);
        z-index: 3;
        background: #e2e8f0;
    }

    section.project-card .visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }
    
    section.project-card:hover .visual img {
        transform: scale(1.05);
    }

    /* Alternating Zigzag: ODD Cards Shifted to Right */
    section.project-card:nth-of-type(odd) {
        margin: 65px 0 65px auto;
        border-radius: 24px 24px 48px 24px;
        padding: 48px 360px 48px 50px;
    }
    
    section.project-card:nth-of-type(odd) .visual {
        right: 32px;
        left: auto;
    }

    section.project-card:nth-of-type(even) {
        margin: 65px auto 65px 0;
    }

    /* FULL-WIDTH INTEGRATED TRACK RECORD STRIP (NOT A CARD) */
    .track-record-notice-strip {
        width: 100%;
        background: #093863;
        color: #ffffff;
        padding: 45px 5vw;
        border-top: 3px solid #1191cc;
        box-sizing: border-box;
    }
    
    .notice-inner-content {
        display: flex;
        align-items: center;
        gap: 28px;
        max-width: 1500px;
        margin: 0 auto;
    }
    
    .notice-icon-box {
        width: 60px;
        height: 60px;
        min-width: 60px;
        border-radius: 16px;
        background: rgba(17, 145, 204, 0.15);
        border: 1px solid rgba(17, 145, 204, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1191cc;
        font-size: 1.8rem;
    }
    
    .notice-text-content h4 {
        font-family: 'Aeonik', sans-serif;
        font-size: 1.25rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0 0 8px 0;
        letter-spacing: -0.3px;
    }
    
    .notice-text-content p {
        color: #cbd5e1;
        font-size: 0.94rem;
        line-height: 1.7;
        margin: 0;
    }


    /* Responsive Queries */
    @media (max-width: 1200px) {
        section.project-card {
            width: 100%;
            max-width: 100%;
            margin: 40px 0 !important;
            padding: 40px 36px 40px 290px;
        }
        section.project-card .visual {
            width: 230px;
            left: 24px;
        }
        section.project-card:nth-of-type(odd) {
            padding: 40px 290px 40px 36px;
        }
        section.project-card:nth-of-type(odd) .visual {
            right: 24px;
            left: auto;
        }
    }

    /* Mobile: Native Horizontal Carousel Swipe Mode */
    @media (max-width: 768px) {
        .projects-page-section {
            padding-top: 24px;
            overflow-x: hidden;
        }

        .projects-filter-bar {
            justify-content: flex-start;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding: 4px 20px 14px;
            margin-bottom: 16px;
            gap: 10px;
            scrollbar-width: none;
        }
        .projects-filter-bar::-webkit-scrollbar {
            display: none;
        }
        .filter-btn {
            white-space: nowrap;
            flex-shrink: 0;
            padding: 8px 18px;
            font-size: 0.82rem;
        }

        /* Horizontal Carousel Slider */
        article.projects-article {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            overflow-y: visible !important;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            touch-action: pan-x pan-y;
            overscroll-behavior-x: contain;
            padding: 10px 20px 30px !important;
            gap: 18px !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            scrollbar-width: thin;
            scrollbar-color: #093863 #e2e8f0;
        }

        article.projects-article::-webkit-scrollbar {
            height: 5px;
        }
        article.projects-article::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 10px;
            margin: 0 20px;
        }
        article.projects-article::-webkit-scrollbar-thumb {
            background: #093863;
            border-radius: 10px;
        }

        /* Individual Card inside Horizontal Carousel */
        section.project-card,
        section.project-card:nth-of-type(odd) {
            flex: 0 0 84vw !important;
            width: 84vw !important;
            max-width: 350px !important;
            min-width: 275px !important;
            margin: 0 !important;
            padding: 18px !important;
            flex-direction: column !important;
            border-radius: 22px !important;
            scroll-snap-align: center;
            scroll-snap-stop: normal;
            box-shadow: 0 8px 24px rgba(9, 56, 99, 0.08) !important;
            border: 1px solid rgba(0, 0, 0, 0.06) !important;
            display: flex !important;
            justify-content: space-between;
        }

        /* Responsive Thumbnail inside card */
        section.project-card .visual,
        section.project-card:nth-of-type(odd) .visual {
            position: relative !important;
            width: 100% !important;
            height: 185px !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            margin: 0 0 16px 0 !important;
            border-radius: 14px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
            overflow: hidden !important;
        }

        section.project-card .visual img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        section.project-card .text-content {
            display: flex !important;
            flex-direction: column !important;
            flex-grow: 1 !important;
            width: 100% !important;
        }

        section.project-card .card-top-meta {
            margin-bottom: 8px;
            gap: 8px;
        }

        section.project-card .sector-tag {
            font-size: 0.74rem;
        }

        section.project-card .status-pill {
            font-size: 0.74rem;
        }

        section.project-card .text-content h3 {
            font-size: 1.15rem;
            line-height: 1.35;
            margin: 0 0 10px 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        section.project-card .meta-details-strip {
            gap: 6px;
            font-size: 0.8rem;
            margin-bottom: 12px;
            flex-direction: column;
        }

        section.project-card .text-content p {
            font-size: 0.87rem;
            line-height: 1.6;
            margin: 0 0 16px 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        section.project-card .text-content a.btn-project {
            margin-top: auto;
            width: 100%;
            justify-content: center;
            padding: 10px 18px;
            font-size: 0.8rem;
        }

        .notice-inner-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }
    }
</style>

<section class="projects-page-section">
    
    <!-- Filter Tabs -->
    <div class="projects-filter-bar">
        <button class="filter-btn active" onclick="filterProjects('all', this)">All Sectors</button>
        <button class="filter-btn" onclick="filterProjects('construction', this)">Construction & Civil</button>
        <button class="filter-btn" onclick="filterProjects('marine', this)">Marine Services</button>
        <button class="filter-btn" onclick="filterProjects('corrosion', this)">Corrosion Management</button>
        <button class="filter-btn" onclick="filterProjects('logistics', this)">Logistics</button>
    </div>

    <!-- Alternating Zigzag Article Section (Full-Width / Horizontal Carousel on Mobile) -->
    <article class="projects-article" id="projects-container">
        
        <!-- Project 1: Construction -->
        <section class="project-card" data-sector="construction">
            <div class="text-content">
                <div class="card-top-meta">
                    <span class="sector-tag">Construction & Civil</span>
                    <span class="meta-divider">•</span>
                    <span class="status-pill status-completed">Completed</span>
                </div>
                <h3>Commercial Facility Refurbishment & Civil Enhancement</h3>
                <div class="meta-details-strip">
                    <span><i class="fas fa-location-dot"></i> Penang, Malaysia</span>
                    <span><i class="fas fa-building"></i> <strong>Client:</strong> Commercial Operator</span>
                </div>
                <p>
                    Comprehensive structural restoration, interior fit-out modernization, waterproofing rehabilitation, and exterior architectural refurbishment executed under stringent occupational safety standards.
                </p>
                <a href="/contact" class="btn-project">Discuss Scope <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="visual">
                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&q=80&w=800" alt="Commercial Facility Refurbishment" loading="lazy" />
            </div>
        </section>

        <!-- Project 2: Marine Services -->
        <section class="project-card" data-sector="marine">
            <div class="text-content">
                <div class="card-top-meta">
                    <span class="sector-tag">Marine Services</span>
                    <span class="meta-divider">•</span>
                    <span class="status-pill status-completed">Completed</span>
                </div>
                <h3>Offshore Vessel Technical Supply & Maintenance Support</h3>
                <div class="meta-details-strip">
                    <span><i class="fas fa-location-dot"></i> Port Klang / Lumut, Malaysia</span>
                    <span><i class="fas fa-ship"></i> <strong>Client:</strong> Maritime Fleet Operator</span>
                </div>
                <p>
                    Full mechanical spares mobilization, vessel engineering assistance, high-grade boiler water chemical treatment distribution (Vecom), and emergency shipboard technical overhaul.
                </p>
                <a href="/contact" class="btn-project">Discuss Scope <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="visual">
                <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&q=80&w=800" alt="Offshore Vessel Support" loading="lazy" />
            </div>
        </section>

        <!-- Project 3: Corrosion Management (Updated Verified Working Image) -->
        <section class="project-card" data-sector="corrosion">
            <div class="text-content">
                <div class="card-top-meta">
                    <span class="sector-tag">Corrosion Management</span>
                    <span class="meta-divider">•</span>
                    <span class="status-pill status-completed">Completed</span>
                </div>
                <h3>Industrial Storage Tank Protective Coating & Surface Prep</h3>
                <div class="meta-details-strip">
                    <span><i class="fas fa-location-dot"></i> Johor, Malaysia</span>
                    <span><i class="fas fa-industry"></i> <strong>Client:</strong> Processing Facility</span>
                </div>
                <p>
                    Precision hydro-blasting surface preparation, multi-layer high-durability epoxy coating application, and ultrasonic thickness integrity testing to extend critical industrial storage asset lifecycle.
                </p>
                <a href="/contact" class="btn-project">Discuss Scope <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="visual">
                <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&q=80&w=800" alt="Corrosion Protection" loading="lazy" />
            </div>
        </section>

        <!-- Project 4: Logistics -->
        <section class="project-card" data-sector="logistics">
            <div class="text-content">
                <div class="card-top-meta">
                    <span class="sector-tag">Logistics Services</span>
                    <span class="meta-divider">•</span>
                    <span class="status-pill status-completed">Completed</span>
                </div>
                <h3>Cross-Border Heavy Equipment Freight & Coordination</h3>
                <div class="meta-details-strip">
                    <span><i class="fas fa-location-dot"></i> Malaysia – Singapore Corridor</span>
                    <span><i class="fas fa-truck-fast"></i> <strong>Client:</strong> Regional Manufacturer</span>
                </div>
                <p>
                    Turnkey freight logistics management, specialized low-loader transport coordination, cross-border customs documentation clearance, and time-critical delivery of oversized industrial assets.
                </p>
                <a href="/contact" class="btn-project">Discuss Scope <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="visual">
                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=800" alt="Cross-Border Logistics" loading="lazy" />
            </div>
        </section>

        <!-- Project 5: Construction & Engineering -->
        <section class="project-card" data-sector="construction">
            <div class="text-content">
                <div class="card-top-meta">
                    <span class="sector-tag">Engineering & Civil</span>
                    <span class="meta-divider">•</span>
                    <span class="status-pill status-completed">Completed</span>
                </div>
                <h3>Industrial Substation & Storm Drainage Civil Works</h3>
                <div class="meta-details-strip">
                    <span><i class="fas fa-location-dot"></i> Perak, Malaysia</span>
                    <span><i class="fas fa-cubes"></i> <strong>Client:</strong> Estate Development Authority</span>
                </div>
                <p>
                    Civil ground excavation, high-capacity storm drainage reinforcement, cable tray installation, and electrical distribution substation commissioning for master-planned industrial parks.
                </p>
                <a href="/contact" class="btn-project">Discuss Scope <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="visual">
                <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&q=80&w=800" alt="Industrial Civil Works" loading="lazy" />
            </div>
        </section>

        <!-- Project 6: Marine Technical Supply -->
        <section class="project-card" data-sector="marine">
            <div class="text-content">
                <div class="card-top-meta">
                    <span class="sector-tag">Marine & Offshore</span>
                    <span class="meta-divider">•</span>
                    <span class="status-pill status-ongoing">Ongoing</span>
                </div>
                <h3>Offshore Support Vessel Chemical Systems & Overhaul Supply</h3>
                <div class="meta-details-strip">
                    <span><i class="fas fa-location-dot"></i> Kemaman Port, Malaysia</span>
                    <span><i class="fas fa-anchor"></i> <strong>Client:</strong> Offshore Support Contractor</span>
                </div>
                <p>
                    Scheduled delivery of specialized degreasers, cooling water inhibitors, and mechanical pump seals to support continuous offshore supply operations in the East Coast concession areas.
                </p>
                <a href="/contact" class="btn-project">Discuss Scope <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="visual">
                <img src="https://images.unsplash.com/photo-1518241353330-0f7941c2d9b5?auto=format&fit=crop&q=80&w=800" alt="Offshore Support Supply" loading="lazy" />
            </div>
        </section>

    </article>

    <!-- FULL-WIDTH INTEGRATED TRACK RECORD NOTICE STRIP (NOT A CARD) -->
    <section class="track-record-notice-strip">
        <div class="notice-inner-content">
            <div class="notice-icon-box">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div class="notice-text-content">
                <h4>Track Record & Compliance Notice</h4>
                <p>
                    The assignments showcased above represent selected project experience delivered by <strong>AB Malaya Sdn Bhd</strong>, our executive management team, and strategic technical partners. To protect client commercial confidentiality, proprietary project names and contract values are generalized. Full project dossiers, audit certifications, and verified client references can be furnished upon formal tender qualification or mutual Non-Disclosure Agreement (NDA).
                </p>
            </div>
        </div>
    </section>

</section>

<script>
function filterProjects(sector, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    const cards = document.querySelectorAll('section.project-card');
    cards.forEach(card => {
        if (sector === 'all' || card.getAttribute('data-sector') === sector) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });

    const article = document.querySelector('article.projects-article');
    if (article) {
        article.scrollTo({ left: 0, behavior: 'smooth' });
    }
}
</script>

<?php include 'includes/footer.php'; ?>
