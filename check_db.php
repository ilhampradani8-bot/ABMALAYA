<?php
header('Content-Type: application/json');
$results = [];

$configs = [
    ['user' => 'abmalaya_erpuser', 'pass' => 'abmalaya2021', 'db' => 'abmalaya_frontend'],
    ['user' => 'abmalaya_erpuser', 'pass' => 'Abmalaya2021', 'db' => 'abmalaya_frontend'],
    ['user' => 'abmalaya_erpuser', 'pass' => 'abmalaya2021', 'db' => 'abmalaya_abmalaya_erp'],
    ['user' => 'abmalaya_erpuser', 'pass' => 'Abmalaya2021', 'db' => 'abmalaya_abmalaya_erp'],
];

foreach ($configs as $idx => $c) {
    try {
        $mysqli = @new mysqli('localhost', $c['user'], $c['pass'], $c['db']);
        if (!$mysqli->connect_error) {
            $results[] = [
                'status' => 'SUCCESS',
                'user' => $c['user'],
                'pass' => $c['pass'],
                'db' => $c['db'],
                'tables' => $mysqli->query("SHOW TABLES")->num_rows
            ];
            $mysqli->close();
        } else {
            $results[] = [
                'status' => 'FAIL',
                'error' => $mysqli->connect_error,
                'db' => $c['db']
            ];
        }
    } catch (\Throwable $e) {
        $results[] = ['status' => 'EXCEPTION', 'error' => $e->getMessage()];
    }
}

echo json_encode($results);
