<?php
// get_products_rest.php
// Server-side fallback that calls Supabase REST API using a service_role key.
error_reporting(E_ALL);
ini_set('display_errors', '0');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// Load secrets from env or secrets.php
if (file_exists(__DIR__ . '/secrets.php')) {
    require_once __DIR__ . '/secrets.php';
}

$restUrl = getenv('SUPABASE_REST_URL') ?: (defined('SUPABASE_REST_URL') ? SUPABASE_REST_URL : '');
$serviceKey = getenv('SUPABASE_SERVICE_ROLE_KEY') ?: (defined('SUPABASE_SERVICE_ROLE_KEY') ? SUPABASE_SERVICE_ROLE_KEY : '');

if (empty($restUrl) || empty($serviceKey)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Supabase REST configuration missing']);
    exit;
}

$url = rtrim($restUrl, '/') . '/product?select=*&order=created_at.desc';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . $serviceKey,
    'Authorization: Bearer ' . $serviceKey,
    'Accept: application/json'
]);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr = curl_error($ch);
curl_close($ch);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'cURL error: ' . $curlErr]);
    exit;
}

if ($httpcode >= 400) {
    http_response_code($httpcode);
    echo json_encode(['success' => false, 'error' => 'Supabase returned HTTP ' . $httpcode, 'body' => $response]);
    exit;
}

$data = json_decode($response, true);
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON from Supabase: ' . json_last_error_msg()]);
    exit;
}

echo json_encode(['success' => true, 'data' => $data]);
?>
