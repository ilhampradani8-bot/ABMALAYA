<?php 
/**
 * AB Malaya Sdn Bhd - IMPA Marine Stores Guide Master Catalog
 * Classic Maritime Full-Width Catalog View (view_impa.php)
 * 100% English UI | Sharp Corporate Maritime Styling | Dedicated Database
 */

require_once __DIR__ . '/db_connect.php';

$pageTitle = "IMPA Marine Stores Guide Master Catalog - AB Malaya";
$currentPage = "impa";
include 'includes/header.php';

$db = getFrontendDb();

// Query Filters
$q       = trim($_GET['q'] ?? '');
$cat_sel = trim($_GET['cat'] ?? '');
$page    = max(1, (int)($_GET['page'] ?? 1));
$limit   = 50;
$offset  = ($page - 1) * $limit;

$where_clauses = [];
$params = [];
$types  = '';

if (!empty($q)) {
    $clean_digits = preg_replace('/[^0-9]/', '', $q);
    // If query is pure digits (e.g. 3302 or 330209)
    if (strlen($clean_digits) >= 2 && strlen($clean_digits) == strlen(trim($q))) {
        $where_clauses[] = "impa_code LIKE ?";
        $params[] = $clean_digits . '%';
        $types .= 's';
    } else {
        $where_clauses[] = "(impa_code LIKE ? OR product_name LIKE ? OR category_name LIKE ? OR specification LIKE ?)";
        $like_text = "%" . $q . "%";
        $params[] = $like_text; $params[] = $like_text; $params[] = $like_text; $params[] = $like_text;
        $types .= 'ssss';
    }
}

if (!empty($cat_sel)) {
    $where_clauses[] = "(category_code = ? OR category_name LIKE ?)";
    $params[] = $cat_sel;
    $params[] = '%' . $cat_sel . '%';
    $types .= 'ss';
}

$where_sql = $where_clauses ? "WHERE " . implode(" AND ", $where_clauses) : "";

// Count Total Filtered Items
$total_items = 0;
if ($db && !$db->connect_error) {
    $count_sql = "SELECT COUNT(*) FROM impa_catalog_master $where_sql";
    if ($params) {
        $stmt_cnt = $db->prepare($count_sql);
        if ($stmt_cnt) {
            $stmt_cnt->bind_param($types, ...$params);
            $stmt_cnt->execute();
            $stmt_cnt->bind_result($total_items);
            $stmt_cnt->fetch();
            $stmt_cnt->close();
        }
    } else {
        $res = $db->query($count_sql);
        if ($res) {
            $row = $res->fetch_row();
            $total_items = (int)$row[0];
        }
    }
}

$total_pages = ceil($total_items / $limit);

// Fetch Items
$items = [];
if ($db && !$db->connect_error) {
    $fetch_sql = "SELECT impa_code, category_code, category_name, product_name, specification, unit 
                  FROM impa_catalog_master 
                  $where_sql 
                  ORDER BY impa_code ASC 
                  LIMIT ?, ?";
    $params_fetch = $params;
    $params_fetch[] = $offset;
    $params_fetch[] = $limit;
    $types_fetch = $types . 'ii';

    $stmt_fetch = $db->prepare($fetch_sql);
    if ($stmt_fetch) {
        $stmt_fetch->bind_param($types_fetch, ...$params_fetch);
        $stmt_fetch->execute();
        $res = $stmt_fetch->get_result();
        while ($r = $res->fetch_assoc()) {
            $items[] = $r;
        }
        $stmt_fetch->close();
    }
}

// Fetch Category List for Dropdown
$categories = [];
if ($db && !$db->connect_error) {
    $cat_res = $db->query("SELECT category_code, category_name, COUNT(*) as cnt 
                           FROM impa_catalog_master 
                           GROUP BY category_code, category_name 
                           ORDER BY category_code ASC");
    if ($cat_res) {
        while ($crow = $cat_res->fetch_assoc()) {
            $categories[] = $crow;
        }
    }
}
?>

<style>
    /* ==========================================================================
       CLASSIC FULL-WIDTH MARITIME CATALOG (SHARP, FLAT, NO BUBBLY CARDS)
       ========================================================================== */
    .impa-classic-section {
        background: #f8fafc;
        padding: 30px 0 80px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: #0f172a;
    }

    .impa-container-full {
        width: 100%;
        max-width: 1540px;
        margin: 0 auto;
        padding: 0 24px;
        box-sizing: border-box;
    }

    /* Classic Header - Flat and Crisp */
    .impa-header-classic {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        border-top: 3px solid #093863;
        padding: 24px 28px;
        margin-bottom: 20px;
        border-radius: 2px;
    }

    .impa-breadcrumbs-classic {
        font-size: 0.78rem;
        color: #64748b;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .impa-breadcrumbs-classic a {
        color: #093863;
        text-decoration: none;
        font-weight: 700;
    }

    .impa-title-main {
        font-family: 'Aeonik', Georgia, serif;
        font-size: 2.1rem;
        font-weight: 800;
        color: #093863;
        margin: 0 0 6px 0;
        letter-spacing: -0.4px;
    }

    .impa-desc-main {
        color: #475569;
        font-size: 0.95rem;
        margin: 0;
        line-height: 1.5;
    }

    /* Search & Filter Controls - Sharp Industrial Layout */
    .impa-controls-bar {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        padding: 18px 22px;
        margin-bottom: 20px;
        border-radius: 2px;
    }

    .search-input-group {
        display: flex;
        width: 100%;
        margin-bottom: 14px;
    }

    .search-text-field {
        flex: 1;
        padding: 12px 16px;
        border: 1.5px solid #093863;
        border-right: none;
        border-radius: 0;
        font-size: 0.95rem;
        font-family: inherit;
        outline: none;
        background: #ffffff;
        color: #0f172a;
    }

    .search-text-field:focus {
        background: #f8fafc;
    }

    .btn-sharp-search {
        background: #093863;
        color: #ffffff;
        border: 1.5px solid #093863;
        border-radius: 0;
        padding: 0 28px;
        font-size: 0.92rem;
        font-weight: 800;
        font-family: 'Aeonik', sans-serif;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: background 0.15s;
    }

    .btn-sharp-search:hover {
        background: #1191cc;
        border-color: #1191cc;
    }

    /* Secondary Filter Row */
    .filter-options-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px;
        padding-top: 12px;
        border-top: 1px solid #e2e8f0;
    }

    .filter-left-tools {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .filter-label-text {
        font-size: 0.82rem;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .filter-category-select {
        padding: 8px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        background: #ffffff;
        color: #0f172a;
        font-size: 0.86rem;
        font-weight: 600;
        outline: none;
        min-width: 280px;
    }

    .btn-sharp-reset {
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        padding: 8px 14px;
        font-size: 0.82rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-sharp-reset:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    .filter-right-stats {
        font-size: 0.84rem;
        color: #64748b;
    }

    .filter-right-stats strong {
        color: #093863;
    }

    /* Classic Data Table - High Contrast & Sharp */
    .impa-table-wrapper {
        background: #ffffff;
        border: 1.5px solid #093863;
        overflow-x: auto;
        border-radius: 0;
    }

    .impa-sharp-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 950px;
        font-size: 0.88rem;
    }

    .impa-sharp-table thead th {
        background: #093863;
        color: #ffffff;
        border: 1px solid #093863;
        padding: 12px 14px;
        text-align: left;
        font-family: 'Aeonik', sans-serif;
        font-weight: 800;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .impa-sharp-table tbody tr {
        border-bottom: 1px solid #e2e8f0;
    }

    .impa-sharp-table tbody tr:nth-child(even) {
        background: #f8fafc;
    }

    .impa-sharp-table tbody tr:hover {
        background: #f0f9ff;
    }

    .impa-sharp-table td {
        padding: 11px 14px;
        border: 1px solid #e2e8f0;
        vertical-align: top;
    }

    .td-code-classic {
        font-family: 'Consolas', 'Courier New', monospace;
        font-weight: 800;
        color: #093863;
        font-size: 0.94rem;
        white-space: nowrap;
    }

    .td-category-classic {
        font-size: 0.76rem;
        font-weight: 700;
        color: #0369a1;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .td-item-title {
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 3px;
        font-size: 0.9rem;
    }

    .td-item-spec {
        font-size: 0.78rem;
        color: #475569;
        line-height: 1.45;
        white-space: pre-wrap;
    }

    .td-unit-classic {
        font-weight: 800;
        font-size: 0.84rem;
        color: #334155;
        text-align: center;
    }

    .btn-sharp-action {
        background: #093863;
        color: #ffffff;
        border: 1px solid #093863;
        border-radius: 0;
        padding: 6px 14px;
        font-size: 0.8rem;
        font-weight: 800;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        transition: background 0.15s;
    }

    .btn-sharp-action:hover {
        background: #1191cc;
        border-color: #1191cc;
        color: #ffffff;
    }

    /* Classic Sharp Pagination */
    .impa-pagination-sharp {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 18px;
        background: #ffffff;
        border-top: 1.5px solid #093863;
        flex-wrap: wrap;
        gap: 12px;
    }

    .pagination-counter-text {
        font-size: 0.84rem;
        color: #475569;
    }

    .pagination-sharp-list {
        display: flex;
        gap: 4px;
    }

    .btn-sharp-page {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        border-radius: 0;
        color: #0f172a;
        padding: 6px 12px;
        font-size: 0.84rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.15s;
    }

    .btn-sharp-page:hover {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
    }

    .btn-sharp-page.active {
        background: #093863;
        color: #ffffff;
        border-color: #093863;
    }

    .btn-sharp-page.disabled {
        opacity: 0.35;
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .search-input-group {
            flex-direction: column;
        }
        .search-text-field {
            border-right: 1.5px solid #093863;
            margin-bottom: 8px;
        }
        .btn-sharp-search {
            padding: 12px;
            justify-content: center;
        }
        .filter-category-select {
            min-width: 100%;
        }
    }
</style>

<section class="impa-classic-section">
    <div class="impa-container-full">
        
        <!-- Classic Header -->
        <div class="impa-header-classic">
            <div class="impa-breadcrumbs-classic">
                <a href="/">Home</a> &gt; <a href="/tender">Procurement</a> &gt; IMPA Marine Catalog Master
            </div>
            <h1 class="impa-title-main">IMPA Marine Stores Guide Master Catalog</h1>
            <p class="impa-desc-main">
                Official 7th Edition international standard maritime stores database containing 49,459 certified requisition items. Connected directly to the AB Malaya ERP procurement pipeline.
            </p>
        </div>

        <!-- Classic Search and Filter Controls -->
        <div class="impa-controls-bar">
            <form method="GET" action="/view_impa.php" id="impa-search-form">
                
                <!-- Main Search Input Bar with Attached Sharp Button -->
                <div class="search-input-group">
                    <input type="text" name="q" class="search-text-field" placeholder="Search by IMPA Code (e.g. 330209) or Item Description (e.g. lifebuoy, torch, valve, rope)..." value="<?php echo htmlspecialchars($q); ?>">
                    <button type="submit" class="btn-sharp-search">
                        <i class="fas fa-search"></i> Search Catalog
                    </button>
                </div>

                <!-- Secondary Filter & Mode Strip -->
                <div class="filter-options-row">
                    <div class="filter-left-tools">
                        <span class="filter-label-text"><i class="fas fa-filter"></i> Category Filter:</span>
                        <select name="cat" class="filter-category-select" onchange="document.getElementById('impa-search-form').submit()">
                            <option value="">-- All IMPA Divisions (IMPA 00 - 80) --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat['category_code']); ?>" <?php echo ($cat_sel === $cat['category_code']) ? 'selected' : ''; ?>>
                                    IMPA <?php echo htmlspecialchars($cat['category_code']); ?> — <?php echo htmlspecialchars($cat['category_name']); ?> (<?php echo number_format($cat['cnt']); ?> items)
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <?php if (!empty($q) || !empty($cat_sel)): ?>
                            <a href="/view_impa.php" class="btn-sharp-reset">
                                <i class="fas fa-rotate-left"></i> Clear Filter
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="filter-right-stats">
                        Found <strong><?php echo number_format($total_items); ?></strong> Standard Marine Items
                    </div>
                </div>

            </form>
        </div>

        <!-- Classic Full-Width Data Table -->
        <div class="impa-table-wrapper">
            <table class="impa-sharp-table">
                <thead>
                    <tr>
                        <th style="width: 130px; text-align: center;">IMPA Code</th>
                        <th style="width: 240px;">Division / Category</th>
                        <th>Product Description & Technical Specification</th>
                        <th style="width: 80px; text-align: center;">Unit</th>
                        <th style="width: 140px; text-align: center;">Requisition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($items)): ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 50px 20px; color: #64748b;">
                                <i class="fas fa-box-open" style="font-size: 2.2rem; color: #cbd5e1; margin-bottom: 10px;"></i><br>
                                <strong>No marine store items matched your search query.</strong><br>
                                <span style="font-size: 0.82rem;">Try searching by numeric code prefix (e.g. 33, 15, 47) or generic item title.</span>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($items as $it): ?>
                            <tr>
                                <td class="td-code-classic" style="text-align: center;">
                                    <?php echo htmlspecialchars($it['impa_code']); ?>
                                </td>
                                <td>
                                    <div class="td-category-classic">
                                        <?php echo htmlspecialchars($it['category_name'] ?: 'IMPA ' . $it['category_code']); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-item-title"><?php echo htmlspecialchars($it['product_name']); ?></div>
                                    <?php if (!empty($it['specification'])): ?>
                                        <div class="td-item-spec"><?php echo htmlspecialchars($it['specification']); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="td-unit-classic">
                                    <?php echo htmlspecialchars($it['unit'] ?: 'PCS'); ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="/tender?impa=<?php echo urlencode($it['impa_code']); ?>&name=<?php echo urlencode($it['product_name']); ?>&unit=<?php echo urlencode($it['unit'] ?: 'PCS'); ?>" class="btn-sharp-action">
                                        <i class="fas fa-file-pen"></i> Order RFQ
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Sharp Classic Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="impa-pagination-sharp">
                    <div class="pagination-counter-text">
                        Showing <strong><?php echo min($total_items, $offset + 1); ?></strong> to <strong><?php echo min($total_items, $offset + $limit); ?></strong> of <strong><?php echo number_format($total_items); ?></strong> marine items
                    </div>

                    <div class="pagination-sharp-list">
                        <?php
                        $query_params = $_GET;
                        $query_params['page'] = max(1, $page - 1);
                        $prev_url = '?' . http_build_query($query_params);

                        $query_params['page'] = min($total_pages, $page + 1);
                        $next_url = '?' . http_build_query($query_params);
                        ?>

                        <a href="<?php echo $prev_url; ?>" class="btn-sharp-page <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            &laquo; Prev
                        </a>

                        <?php
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);
                        for ($p = $start_page; $p <= $end_page; $p++):
                            $query_params['page'] = $p;
                            $p_url = '?' . http_build_query($query_params);
                        ?>
                            <a href="<?php echo $p_url; ?>" class="btn-sharp-page <?php echo ($page === $p) ? 'active' : ''; ?>">
                                <?php echo $p; ?>
                            </a>
                        <?php endfor; ?>

                        <a href="<?php echo $next_url; ?>" class="btn-sharp-page <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            Next &raquo;
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
