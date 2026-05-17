<?php 
$pageTitle = "Search Results";
$currentPage = "search";
include 'includes/header.php'; 

$query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';

// Data source: Website Sections
$siteContent = [
    [
        'title' => 'Maritime & Subsea Services',
        'desc' => 'Comprehensive engineering solutions for the marine industry, ship consumables, and logistics.',
        'link' => '/services#marine',
        'tags' => 'marine, subsea, ship, rust, coating, boiler, vecom, crew'
    ],
    [
        'title' => 'Cross-Border Solutions',
        'desc' => 'Seamless logistics between Singapore, Malaysia, and Thailand with professional handling.',
        'link' => '/services#cross',
        'tags' => 'logistics, transport, cross-border, singapore, thailand, cargo, storage'
    ],
    [
        'title' => 'Environmental Solutions',
        'desc' => 'Corrosion prevention, waste management, and industrial spill containment.',
        'link' => '/services#env',
        'tags' => 'environment, green, energy, corrosion, waste, spill, wastewater'
    ],
    [
        'title' => 'About AB Malaya',
        'desc' => 'Our journey, vision, and mission in the maritime and industrial sectors.',
        'link' => '/about',
        'tags' => 'about, vision, mission, journey, history, team'
    ],
    [
        'title' => 'Certified & Excellence',
        'desc' => 'Our commitment to global standards, ISO certifications, and industrial excellence.',
        'link' => '/certified',
        'tags' => 'certified, certification, iso, quality, safety, petronas, license'
    ],
    [
        'title' => 'Contact Us',
        'desc' => 'Get in touch with our experts in Kuala Lumpur for technical consultations.',
        'link' => '/contact',
        'tags' => 'contact, address, phone, email, support, help, location'
    ],
    [
        'title' => 'Projects & Portfolio',
        'desc' => 'Explore our successful track record of marine engineering, cross-border transport, and industrial projects.',
        'link' => '/projects',
        'tags' => 'projects, portfolio, track record, work, engineering, logistics, shipping, clients'
    ],
    [
        'title' => 'Kebijakan Privasi',
        'desc' => 'Privacy policy and data protection for AB MALAYA Sdn Bhd.',
        'link' => '/privacy',
        'tags' => 'privacy, data, legal, policy'
    ],
    [
        'title' => 'Terms & Conditions',
        'desc' => 'Read the legal terms of service and usage regulations of the AB Malaya platform.',
        'link' => '/terms',
        'tags' => 'terms, conditions, legal, contract, service, agreement'
    ]
];

$results = [];
if (!empty($query)) {
    foreach ($siteContent as $item) {
        if (stripos($item['title'], $query) !== false || 
            stripos($item['desc'], $query) !== false || 
            stripos($item['tags'], $query) !== false) {
            $results[] = $item;
        }
    }
}
?>

<?php 
$heroTitle = "<span style='color: #005ee9;'>Search Results</span>";
$heroSubtitle = "Discovery";
$heroDesc = count($results) . " results found for <span style='color: #005ee9; font-weight: 700;'>\"" . htmlspecialchars($query) . "\"</span>";
$showButtons = false;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
<?php
include 'includes/hero_visual.php';
?>

<section class="search-results-section" style="padding: 40px 0 100px; background: #ffffff; min-height: 50vh;">
    <div class="container">
        <?php if (empty($results)): ?>
            <div style="text-align: center; padding: 4rem;">
                <div style="width: 100px; height: 100px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
                    <i class="fas fa-search" style="font-size: 2.5rem; color: #94a3b8;"></i>
                </div>
                <h2 style="font-family: 'Aeonik', sans-serif; color: #0f172a; font-weight: 700; font-size: 2rem;">No matches found</h2>
                <p style="font-family: 'Aeonik', sans-serif; color: #64748b; font-size: 1.1rem; margin-top: 1rem;">Try searching for something else like <br> <span style="color: #005ee9;">"marine"</span>, <span style="color: #005ee9;">"logistics"</span>, or <span style="color: #005ee9;">"contact"</span>.</p>
            </div>
        <?php else: ?>
            <div style="display: grid; gap: 1.5rem; max-width: 800px; margin: 0 auto;">
                <?php foreach ($results as $res): ?>
                    <a href="<?php echo $res['link']; ?>" class="search-result-card">
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <div style="flex: 1;">
                                <h3 style="color: #0f172a; margin-bottom: 0.5rem; font-family: 'Aeonik', sans-serif; font-weight: 700; font-size: 1.4rem;"><?php echo $res['title']; ?></h3>
                                <p style="color: #64748b; line-height: 1.6; font-family: 'Aeonik', sans-serif; font-size: 0.95rem;"><?php echo $res['desc']; ?></p>
                            </div>
                            <div class="arrow-circle">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <style>
                /* Close the distance between hero and search results */
                .intro-visual {
                    height: 60vh !important;
                    min-height: 450px !important;
                }
                .hero-images-layer {
                    height: 60vh !important;
                }
                .intro-content {
                    padding-top: 100px !important;
                }

                .search-result-card {
                    text-decoration: none; 
                    display: block; 
                    background: transparent; 
                    padding: 1.5rem 0; 
                    border: none;
                    border-bottom: 1px solid rgba(15, 23, 42, 0.08); 
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    box-shadow: none;
                }
                .search-result-card:last-of-type {
                    border-bottom: none;
                }
                .search-result-card h3 {
                    transition: color 0.3s ease;
                }
                .search-result-card:hover {
                    transform: translateX(8px);
                }
                .search-result-card:hover h3 {
                    color: #005ee9 !important;
                }
                .arrow-circle {
                    width: 45px;
                    height: 45px;
                    background: #f1f5f9;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #005ee9;
                    transition: all 0.3s ease;
                    margin-left: 2rem;
                    flex-shrink: 0;
                }
                .search-result-card:hover .arrow-circle {
                    background: #005ee9;
                    color: #fff;
                }

                /* Compact mobile styling matching the pop-up search results list */
                @media (max-width: 768px) {
                    .intro-visual {
                        height: 50vh !important;
                        min-height: 380px !important;
                        padding-top: 70px !important;
                    }
                    .hero-interactive-area {
                        min-height: 90px !important;
                        margin-bottom: 1rem !important;
                    }
                    .search-results-section {
                        padding: 10px 0 50px !important;
                    }
                    .search-result-card {
                        padding: 10px 0 !important;
                        border-bottom: 1px solid rgba(0, 0, 0, 0.06) !important;
                    }
                    .search-result-card h3 {
                        font-size: 0.95rem !important;
                        margin-bottom: 2px !important;
                        font-weight: 600 !important;
                    }
                    .search-result-card p {
                        font-size: 0.78rem !important;
                        line-height: 1.4 !important;
                    }
                    .arrow-circle {
                        width: 30px !important;
                        height: 30px !important;
                        margin-left: 0.5rem !important;
                    }
                    .arrow-circle i {
                        font-size: 0.75rem !important;
                    }
                }
            </style>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
