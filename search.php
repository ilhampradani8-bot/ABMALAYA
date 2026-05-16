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
        'title' => 'Careers & Recruitment',
        'desc' => 'Join our team and explore opportunities in the maritime and technical sectors.',
        'link' => '/careers',
        'tags' => 'jobs, career, recruitment, hire, join, vacancy'
    ],
    [
        'title' => 'Contact Us',
        'desc' => 'Get in touch with our experts in Kuala Lumpur for technical consultations.',
        'link' => '/contact',
        'tags' => 'contact, address, phone, email, support, help, location'
    ],
    [
        'title' => 'Kebijakan Privasi',
        'desc' => 'Privacy policy and data protection for AB MALAYA Sdn Bhd.',
        'link' => '/privacy',
        'tags' => 'privacy, data, legal, policy'
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

<section class="hero-search" style="height: 35vh; background: #f8fafc; display: flex; align-items: center; border-bottom: 1px solid #e2e8f0; padding-top: 80px;">
    <div class="container">
        <div class="hero-content">
            <h1 style="font-family: 'Aeonik', sans-serif; font-weight: 800; font-size: 3rem; color: #0f172a; margin-bottom: 0.5rem; letter-spacing: -1px;">Search Results</h1>
            <p style="font-family: 'Aeonik', sans-serif; color: #64748b; font-size: 1.1rem;"><?php echo count($results); ?> results found for <span style="color: #005ee9; font-weight: 700;">"<?php echo $query; ?>"</span></p>
        </div>
    </div>
</section>

<section style="padding: 100px 0; background: #ffffff; min-height: 50vh;">
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
                .search-result-card {
                    text-decoration: none; 
                    display: block; 
                    background: #fff; 
                    padding: 2rem; 
                    border-radius: 24px; 
                    border: 1px solid #f1f5f9; 
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                }
                .search-result-card:hover {
                    transform: translateX(10px);
                    border-color: #005ee9;
                    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
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
            </style>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
