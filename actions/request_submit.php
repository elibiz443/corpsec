<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit;
}

$csrf = $_POST['csrf'] ?? '';
if (!csrf_check($csrf)) {
  flash_set('error', 'Session expired. Please try again.');
  redirect_to(ROOT_URL . '/');
}

$focus = trim((string)($_POST['focus'] ?? ''));
$serviceId = (int)($_POST['service_id'] ?? 0);
$location = trim((string)($_POST['location'] ?? ''));
$timeline = trim((string)($_POST['timeline'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$name = trim((string)($_POST['name'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));

if ($focus === '' || $serviceId <= 0 || $location === '' || $timeline === '' || $message === '' || $name === '' || $phone === '') {
  flash_set('error', 'Please complete all required fields.');
  redirect_to(ROOT_URL . '/');
}

$svc = db_one($pdo, 'SELECT title, category FROM services WHERE id = ? LIMIT 1', [$serviceId]);
$subject = $svc ? ($svc['category'] . ' • ' . $svc['title']) : 'Consultation request';

$meta = [
  'focus' => $focus,
  'service_id' => $serviceId,
  'location' => $location,
  'timeline' => $timeline,
  'page' => $_SERVER['HTTP_REFERER'] ?? ''
];

db_exec($pdo, 'INSERT INTO inquiries (type, name, email, phone, subject, message_text, meta_json) VALUES (?, ?, ?, ?, ?, ?, ?)', [
  'request',
  $name,
  $email,
  $phone,
  $subject,
  $message,
  json_encode($meta, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
]);

flash_set('success', 'Request received. We will contact you shortly.');
$ref = $_SERVER['HTTP_REFERER'] ?? '';
$host = $_SERVER['HTTP_HOST'] ?? '';
if ($ref && $host && strpos($ref, $host) !== false) {
  redirect_to($ref);
}
redirect_to(ROOT_URL . '/contact');
