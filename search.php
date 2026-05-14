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

<section class="hero" style="height: 30vh; background: var(--secondary);">
    <div class="container">
        <div class="hero-content">
            <h1 style="font-family: 'Cinzel', serif;">Search Results</h1>
            <p><?php echo count($results); ?> results found for "<?php echo $query; ?>"</p>
        </div>
    </div>
</section>

<section style="padding: 80px 0; background: #fcfcfc; min-height: 50vh;">
    <div class="container">
        <?php if (empty($results)): ?>
            <div style="text-align: center; padding: 4rem;">
                <i class="fas fa-search" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 2rem;"></i>
                <h2 style="color: var(--secondary);">No results found</h2>
                <p style="color: var(--text-light);">Try searching for something else like "marine", "logistics", or "contact".</p>
            </div>
        <?php else: ?>
            <div style="display: grid; gap: 2rem; max-width: 900px; margin: 0 auto;">
                <?php foreach ($results as $res): ?>
                    <a href="<?php echo $res['link']; ?>" style="text-decoration: none; display: block; background: #fff; padding: 2.5rem; border-radius: 20px; border: 1px solid #e2e8f0; transition: 0.3s; box-shadow: 0 5px 15px rgba(0,0,0,0.02);">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="color: var(--primary); margin-bottom: 0.5rem; font-family: 'Nunito', sans-serif;"><?php echo $res['title']; ?></h3>
                                <p style="color: var(--text-light); line-height: 1.6;"><?php echo $res['desc']; ?></p>
                            </div>
                            <i class="fas fa-chevron-right" style="color: var(--primary); opacity: 0.5;"></i>
                        </div>
                    </a>
                    <style>
                        a:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 15px 30px rgba(0,0,0,0.05) !important;
                            border-color: var(--primary) !important;
                        }
                    </style>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
