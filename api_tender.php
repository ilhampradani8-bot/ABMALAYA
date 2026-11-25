<?php
/**
 * AB Malaya Sdn Bhd - Tender & Material RFQ API
 * Connects website tender submissions to AB Malaya ERP & IMPA Master Catalog
 */

error_reporting(0);
ini_set('display_errors', 0);
ob_start();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    ob_end_clean();
    echo json_encode(['status' => 'ok']);
    exit;
}

require_once __DIR__ . '/db_connect.php';

// Connect to Database (Uses dedicated frontend DB with fallback)
function getDbConnection() {
    return getFrontendDb();
}

$action = trim($_GET['action'] ?? ($_POST['action'] ?? ''));

// ── 1. Search IMPA Master Catalog ─────────────────────────────────────────────
if ($action === 'search_impa') {
    $q = trim($_GET['q'] ?? '');
    $results = [];

    $conn = getDbConnection();
    if ($conn && !$conn->connect_error && strlen($q) >= 2) {
        $param = '%' . $q . '%';
        $stmt = $conn->prepare("SELECT impa_code, product_name, category_name, unit, specification 
                                FROM impa_catalog_master 
                                WHERE impa_code LIKE ? OR product_name LIKE ? OR category_name LIKE ? 
                                LIMIT 25");
        if ($stmt) {
            $stmt->bind_param('sss', $param, $param, $param);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc()) {
                $results[] = [
                    'impa_code'     => $row['impa_code'],
                    'product_name'  => $row['product_name'],
                    'category_name' => $row['category_name'],
                    'unit'          => !empty($row['unit']) ? $row['unit'] : 'PCS',
                    'specification' => $row['specification'] ?? ''
                ];
            }
            $stmt->close();
        }
    }

    // Curated Fallback if query returns empty or DB unreachable
    if (empty($results) && strlen($q) >= 1) {
        $catalog_seed = [
            ['impa_code' => '110101', 'product_name' => 'Manila Rope 3-Strand 24mm', 'category_name' => 'Deck Stores', 'unit' => 'COIL', 'specification' => 'Grade 1 Natural Manila Fiber'],
            ['impa_code' => '110115', 'product_name' => 'Polypropylene Mooring Rope 8-Strand 40mm', 'category_name' => 'Deck Stores', 'unit' => 'COIL', 'specification' => 'High Tenacity Polypropylene'],
            ['impa_code' => '150101', 'product_name' => 'SOLAS Lifebuoy Ring 2.5kg with Reflective Tape', 'category_name' => 'Safety & Fire', 'unit' => 'PCS', 'specification' => 'SOLAS / MED / USCG Approved'],
            ['impa_code' => '150141', 'product_name' => 'Immersion Suit SOLAS Insulated', 'category_name' => 'Safety & Fire', 'unit' => 'SET', 'specification' => 'With Whistle, Light & Buddy Line'],
            ['impa_code' => '150201', 'product_name' => 'Dry Powder Fire Extinguisher 9kg Cartridge', 'category_name' => 'Safety & Fire', 'unit' => 'UNIT', 'specification' => 'ABC Multi-Purpose Marine Type'],
            ['impa_code' => '170101', 'product_name' => 'Wire Rope Galvanized 6x24 16mm', 'category_name' => 'Deck Machinery', 'unit' => 'MTR', 'specification' => 'Tensile Strength 1770 N/mm2'],
            ['impa_code' => '230101', 'product_name' => 'Heavy Duty Marine Chipping Hammer', 'category_name' => 'Hardware & Tools', 'unit' => 'PCS', 'specification' => 'Drop Forged Steel 500g'],
            ['impa_code' => '230205', 'product_name' => 'Pneumatic Descaling Needle Scaler', 'category_name' => 'Hardware & Tools', 'unit' => 'SET', 'specification' => '19 Needles 3mm, Working Pressure 6 Bar'],
            ['impa_code' => '450101', 'product_name' => 'Marine Engine Oil SAE 40 TBN 12', 'category_name' => 'Petroleum & Lube', 'unit' => 'DRUM', 'specification' => '208L Drum for 4-Stroke Marine Diesels'],
            ['impa_code' => '450210', 'product_name' => 'Hydraulic Oil ISO VG 46 Anti-Wear', 'category_name' => 'Petroleum & Lube', 'unit' => 'DRUM', 'specification' => 'Marine High Viscosity Index'],
            ['impa_code' => '470101', 'product_name' => 'Epoxy Mastic Surface Tolerant Primer', 'category_name' => 'Protective Coating', 'unit' => 'LTR', 'specification' => 'High Solids 80%, Anti-Corrosive'],
            ['impa_code' => '470215', 'product_name' => 'Self-Polishing Antifouling Marine Coating', 'category_name' => 'Protective Coating', 'unit' => 'LTR', 'specification' => 'Tin-Free Copolymer 36-Month Protection'],
            ['impa_code' => '610101', 'product_name' => 'High Pressure Spiral Wound Gasket SS316', 'category_name' => 'Engine Room Stores', 'unit' => 'PCS', 'specification' => 'ASME B16.20 Class 150/300 Graphite Filler'],
            ['impa_code' => '630105', 'product_name' => 'Bronze Marine Globe Valve PN16 Flanged', 'category_name' => 'Engine Spares & Valves', 'unit' => 'PCS', 'specification' => 'JIS F7301 50A / 2-inch'],
            ['impa_code' => '750101', 'product_name' => 'Refrigerant Gas R404A Non-Ozone Depleting', 'category_name' => 'Refrigeration & HVAC', 'unit' => 'CYL', 'specification' => '10.9kg Disposable Marine Cylinder'],
            ['impa_code' => '790101', 'product_name' => 'Marine Cable 3-Core 2.5mm Flame Retardant', 'category_name' => 'Electrical Equipment', 'unit' => 'MTR', 'specification' => 'IEC 60092 Class Marine Tinned Copper']
        ];
        $q_lower = strtolower($q);
        foreach ($catalog_seed as $item) {
            if (strpos(strtolower($item['impa_code']), $q_lower) !== false || 
                strpos(strtolower($item['product_name']), $q_lower) !== false || 
                strpos(strtolower($item['category_name']), $q_lower) !== false) {
                $results[] = $item;
            }
        }
    }

    ob_end_clean();
    echo json_encode(['status' => 'success', 'data' => $results]);
    exit;
}

// ── 2. Get Standard Product / IMPA Categories ─────────────────────────────────
if ($action === 'get_categories') {
    $categories = [
        ['code' => '00', 'name' => 'General Stores / Miscellaneous (IMPA 00)'],
        ['code' => '11', 'name' => 'Deck Stores, Mooring Ropes & Rigging (IMPA 11)'],
        ['code' => '13', 'name' => 'Electrical & Electronic Equipment (IMPA 13)'],
        ['code' => '15', 'name' => 'Safety, Fire Fighting & SOLAS Gear (IMPA 15)'],
        ['code' => '25', 'name' => 'Galley, Mess & Provision Stores (IMPA 25)'],
        ['code' => '30', 'name' => 'Medical & Offshore First Aid Supplies (IMPA 30)'],
        ['code' => '45', 'name' => 'Petroleum Products & Marine Lubricants (IMPA 45)'],
        ['code' => '47', 'name' => 'Protective Coating, Marine Paint & Epoxy (IMPA 47)'],
        ['code' => '49', 'name' => 'Hardware, Pneumatic Tools & Fasteners (IMPA 49)'],
        ['code' => '51', 'name' => 'Offshore Safety Clothing & PPE (IMPA 51)'],
        ['code' => '53', 'name' => 'Deck Machinery, Winches & Anchoring (IMPA 53)'],
        ['code' => '57', 'name' => 'Marine Navigation & Radar Spares (IMPA 57)'],
        ['code' => '60', 'name' => 'Engine Room Consumables, Seals & Filters (IMPA 60)'],
        ['code' => '63', 'name' => 'Marine Engine Spare Parts & Valves (IMPA 63)'],
        ['code' => '73', 'name' => 'Boiler, Heat Exchanger & Piping Parts (IMPA 73)'],
        ['code' => '75', 'name' => 'Refrigeration, Chiller & HVAC Parts (IMPA 75)'],
        ['code' => '80', 'name' => 'Marine Electrical Spares & Generators (IMPA 80)']
    ];
    ob_end_clean();
    echo json_encode(['status' => 'success', 'data' => $categories]);
    exit;
}

// ── 3. Submit Tender & Generate Official RFQ ──────────────────────────────────
if ($action === 'submit_rfq' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw_input = file_get_contents('php://input');
    $payload = json_decode($raw_input, true) ?: $_POST;

    // Mandatory Email Routing Validation
    $routing_email  = trim($payload['routing_email'] ?? '');
    $email          = trim($payload['email'] ?? '');

    if (empty($routing_email) || !filter_var($routing_email, FILTER_VALIDATE_EMAIL)) {
        ob_end_clean();
        echo json_encode([
            'status'  => 'error',
            'message' => 'Recipient email address (Send To / Routing Email) is strictly required and must be a valid email address.'
        ]);
        exit;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ob_end_clean();
        echo json_encode([
            'status'  => 'error',
            'message' => 'Your Client Reply-To email address is strictly required so commercial quotation replies can be routed back directly.'
        ]);
        exit;
    }

    // Sanitize parameters
    $company_name   = trim($payload['company'] ?? $payload['company_name'] ?? $payload['vessel_name'] ?? '');
    $contact_person = trim($payload['contact_person'] ?? $payload['master_name'] ?? $payload['name'] ?? '');
    $phone          = trim($payload['phone'] ?? '');
    $vessel_name    = trim($payload['vessel_name'] ?? $company_name);
    $requisition_no = trim($payload['requisition_no'] ?? '');
    $critical_type  = trim($payload['critical_type'] ?? 'Non-Critical Equipment');
    $department     = trim($payload['department'] ?? 'Deck Department');
    $issue_to       = is_array($payload['issue_to'] ?? null) ? implode(', ', $payload['issue_to']) : trim($payload['issue_to'] ?? 'Operation Department');
    $ordering_item  = trim($payload['ordering_item'] ?? $payload['project_title'] ?? 'LSA & FFA');
    $project_title  = $vessel_name ? "Requisition {$requisition_no} - {$vessel_name} ({$ordering_item})" : trim($payload['project_title'] ?? 'Procurement Requisition');
    $location       = trim($payload['location'] ?? 'Malaysia Port / Berth');
    $service        = trim($payload['service'] ?? 'marine-services');
    $closing_date   = trim($payload['closing_date'] ?? $payload['date'] ?? date('Y-m-d', strtotime('+14 days')));
    $incoterms      = trim($payload['incoterms'] ?? 'Delivered to Vessel / Berth');
    $description    = trim($payload['description'] ?? '');
    $items          = is_array($payload['items'] ?? null) ? $payload['items'] : [];

    // Fallback defaults for email / contact if submitting directly from vessel requisition
    if (empty($email)) {
        $email = 'fleet@abmalaya.com';
    }
    if (empty($contact_person)) {
        $contact_person = 'Vessel Master / Superintendent';
    }
    if (empty($company_name)) {
        $company_name = $vessel_name ?: 'Marine Fleet Client';
    }

    // Generate Official RFQ Reference Number if not provided
    if (empty($requisition_no)) {
        $rand_suffix = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
        $rfq_id = 'RFQ-ABM-2026-' . $rand_suffix;
        $requisition_no = 'REQ-' . date('Y') . '-' . $rand_suffix;
    } else {
        $rfq_id = 'RFQ-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $requisition_no);
    }
    $date_issued = date('Y-m-d H:i:s');

    // Prepare clean items array
    $processed_items = [];
    $item_index = 1;
    foreach ($items as $it) {
        $processed_items[] = [
            'item_no'       => $item_index++,
            'impa_code'     => trim($it['impa_code'] ?? '-'),
            'product_name'  => trim($it['product_name'] ?? $it['name'] ?? 'Marine Store Item'),
            'specification' => trim($it['specification'] ?? $it['spec'] ?? '-'),
            'purpose'       => trim($it['purpose'] ?? ''),
            'quantity'      => (float)($it['quantity'] ?? $it['qty'] ?? 1),
            'unit'          => strtoupper(trim($it['unit'] ?? 'PCS')),
            'target_date'   => trim($it['target_date'] ?? $closing_date),
            'photo_url'     => $it['photo_url'] ?? null,
            'photo_url_2'   => $it['photo_url_2'] ?? null
        ];
    }

    // Record payload
    $rfq_record = [
        'rfq_id'         => $rfq_id,
        'requisition_no' => $requisition_no,
        'vessel_name'    => $vessel_name,
        'critical_type'  => $critical_type,
        'department'     => $department,
        'issue_to'       => $issue_to,
        'ordering_item'  => $ordering_item,
        'date_issued'    => $date_issued,
        'company_name'   => $company_name,
        'contact_person' => $contact_person,
        'email'          => $email,
        'phone'          => $phone,
        'project_title'  => $project_title,
        'location'       => $location,
        'service'        => $service,
        'closing_date'   => $closing_date,
        'incoterms'      => $incoterms,
        'description'    => $description,
        'items_count'    => count($processed_items),
        'items'          => $processed_items,
        'status'         => 'Submitted & Queued for ERP Marine Procurement',
        'statutory'      => [
            'contractor' => 'AB Malaya Sdn Bhd',
            'cidb'       => 'CIDB Grade G7 Registered (No Limit Contract Value)',
            'mof'        => 'Ministry of Finance (MOF) Registered Contractor'
        ]
    ];

    // 1. Save to local storage file: /root/abmlaya/data/rfq/RFQ-ABM-2026-XXXX.json
    $rfq_dir = __DIR__ . '/data/rfq/';
    if (!is_dir($rfq_dir)) {
        @mkdir($rfq_dir, 0777, true);
    }
    $file_path = $rfq_dir . $rfq_id . '.json';
    @file_put_contents($file_path, json_encode($rfq_record, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    // 2. Synchronize with dedicated frontend DB (rfq_submissions) & ERP (quotations)
    $conn = getDbConnection();
    $erp_synced = false;
    if ($conn && !$conn->connect_error) {
        try {
            $payload_json = json_encode($rfq_record, JSON_UNESCAPED_SLASHES);
            $stmt_front = @$conn->prepare("INSERT INTO rfq_submissions (
                id, requisition_no, vessel_name, critical_type, department, issue_to, ordering_item,
                company_name, contact_person, email, phone, location, service, closing_date, incoterms,
                description, items_count, payload_json
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE payload_json = VALUES(payload_json)");

            if ($stmt_front) {
                $items_cnt = count($processed_items);
                $stmt_front->bind_param(
                    'ssssssssssssssssis',
                    $rfq_id, $requisition_no, $vessel_name, $critical_type, $department, $issue_to, $ordering_item,
                    $company_name, $contact_person, $email, $phone, $location, $service, $closing_date, $incoterms,
                    $description, $items_cnt, $payload_json
                );
                $stmt_front->execute();
                $stmt_front->close();
                $erp_synced = true;

                if (!empty($processed_items)) {
                    $stmt_fitems = @$conn->prepare("INSERT INTO rfq_items (
                        rfq_id, item_no, impa_code, product_name, specification, purpose, quantity, unit, target_date
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    if ($stmt_fitems) {
                        foreach ($processed_items as $pit) {
                            $stmt_fitems->bind_param(
                                'sissssiss',
                                $rfq_id, $pit['item_no'], $pit['impa_code'], $pit['product_name'],
                                $pit['specification'], $pit['purpose'], $pit['quantity'], $pit['unit'], $pit['target_date']
                            );
                            $stmt_fitems->execute();
                        }
                        $stmt_fitems->close();
                    }
                }
            }

            // Also sync to ERP quotations table if present
            $stmt = @$conn->prepare("INSERT INTO quotations (
                id, quotation_number, client_name, client_email, client_phone, 
                company_name, company_address, category_name, date_issued, valid_until, 
                subtotal, grand_total, notes, sent_source
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0.00, 0.00, ?, 'website_tender_portal')
            ON DUPLICATE KEY UPDATE notes = VALUES(notes)");

            if ($stmt) {
                $notes_json = json_encode(['rfq_data' => $rfq_record], JSON_UNESCAPED_SLASHES);
                $stmt->bind_param(
                    'sssssssssss',
                    $rfq_id,
                    $rfq_id,
                    $contact_person,
                    $email,
                    $phone,
                    $company_name,
                    $location,
                    $service,
                    $date_issued,
                    $closing_date,
                    $notes_json
                );
                $stmt->execute();
                $stmt->close();
                $erp_synced = true;
            }
        } catch (\Throwable $ex) {
            $erp_synced = false;
        }
    }

    // 3. Dispatch official email dossier via Standalone TenderMailer Engine
    require_once __DIR__ . '/includes/tender_mailer.php';
    $mail_status = TenderMailer::sendRequisition($routing_email, $email, $rfq_record);

    ob_end_clean();
    echo json_encode([
        'status'      => 'success',
        'rfq_id'      => $rfq_id,
        'erp_synced'  => $erp_synced,
        'mail_status' => $mail_status,
        'data'        => $rfq_record,
        'message'     => 'Official RFQ Dossier ' . $rfq_id . ' has been generated, registered in ERP, and dispatched to ' . $routing_email . '.'
    ]);
    exit;
}

// Default fallback
ob_end_clean();
echo json_encode([
    'status'  => 'error',
    'message' => 'Invalid action or endpoint.'
]);
