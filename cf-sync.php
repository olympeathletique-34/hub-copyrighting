<?php
// CopyFunnel - Sync multi-appareils de l'état du dashboard
// Déposez ce fichier une seule fois dans le même dossier que cf-upload.php
// (ou utilisez le bouton "Déployer cf-sync.php" dans les Réglages globaux du dashboard)

$SECRET = '84371afd91e88147340792202012eb2b3ea6b4942bc6b06a';

$origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-CF-Secret');
header('Vary: Origin');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }
if (($_SERVER['HTTP_X_CF_SECRET'] ?? '') !== $SECRET) { http_response_code(403); echo json_encode(['error' => 'Unauthorized']); exit; }

$file = __DIR__ . '/cf-sync-data.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!file_exists($file)) { echo json_encode(['data' => null]); exit; }
    readfile($file);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = file_get_contents('php://input');
    $json = json_decode($body, true);
    if ($json === null || !isset($json['savedAt'])) { http_response_code(400); echo json_encode(['error' => 'Invalid payload']); exit; }
    $ok = file_put_contents($file, $body, LOCK_EX) !== false;
    echo json_encode(['success' => $ok, 'savedAt' => $json['savedAt']]);
    exit;
}

http_response_code(405);
echo json_encode(['error' => 'Method not allowed']);
