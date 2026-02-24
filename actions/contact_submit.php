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
  redirect_to(ROOT_URL . '/contact');
}

$name = trim((string)($_POST['name'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$subject = trim((string)($_POST['subject'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $subject === '' || $message === '') {
  flash_set('error', 'Please complete all required fields.');
  redirect_to(ROOT_URL . '/contact#message');
}

$meta = [
  'page' => $_SERVER['HTTP_REFERER'] ?? '',
  'ip' => $_SERVER['REMOTE_ADDR'] ?? ''
];

db_exec($pdo, 'INSERT INTO inquiries (type, name, email, phone, subject, message_text, meta_json) VALUES (?, ?, ?, ?, ?, ?, ?)', [
  'contact',
  $name,
  $email,
  $phone,
  $subject,
  $message,
  json_encode($meta, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
]);

flash_set('success', 'Message sent. We will respond shortly.');
redirect_to(ROOT_URL . '/contact');
