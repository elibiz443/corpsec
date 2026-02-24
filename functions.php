<?php
function e($v) {
  return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

function url($path = '') {
  $root = rtrim(ROOT_URL, '/');
  if ($path === '' || $path === '/') return $root . '/';
  return $root . '/' . ltrim($path, '/');
}

function redirect_to($path) {
  $to = preg_match('/^https?:\/\//i', $path) ? $path : url($path);
  header('Location: ' . $to);
  exit;
}

function flash_set($type, $text) {
  $_SESSION['flash'] = ['type' => $type, 'text' => $text];
}

function flash_get() {
  $f = $_SESSION['flash'] ?? null;
  unset($_SESSION['flash']);
  return $f;
}

function csrf_token() {
  if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['csrf'];
}

function csrf_check($token) {
  return isset($_SESSION['csrf']) && is_string($token) && hash_equals($_SESSION['csrf'], $token);
}

function db_all(PDO $pdo, $sql, $params = []) {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  return $stmt->fetchAll();
}

function db_one(PDO $pdo, $sql, $params = []) {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $r = $stmt->fetch();
  return $r ? $r : null;
}

function db_exec(PDO $pdo, $sql, $params = []) {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  return $stmt;
}

function site_settings(PDO $pdo) {
  $rows = db_all($pdo, 'SELECT key_name, value_text FROM settings');
  $out = [];
  foreach ($rows as $r) {
    $out[$r['key_name']] = $r['value_text'];
  }
  return $out;
}

function setting($key, $fallback = '') {
  $s = $GLOBALS['settings'] ?? [];
  if (isset($s[$key]) && $s[$key] !== '') return $s[$key];
  return $fallback;
}

function slugify($text) {
  $text = strtolower(trim($text));
  $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
  $text = preg_replace('/\s+/', '-', $text);
  $text = preg_replace('/-+/', '-', $text);
  return trim($text, '-');
}

function admin_require_login() {
  if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . url('admin/login'));
    exit;
  }
}

function admin_user(PDO $pdo) {
  if (!isset($_SESSION['admin_id'])) return null;
  return db_one($pdo, 'SELECT id, username, created_at FROM users WHERE id = ? LIMIT 1', [$_SESSION['admin_id']]);
}

function upload_image($field, $destDir) {
  if (!isset($_FILES[$field]) || !is_array($_FILES[$field])) return null;
  $f = $_FILES[$field];
  if (($f['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) return null;
  $tmp = $f['tmp_name'] ?? '';
  if (!is_uploaded_file($tmp)) return null;
  $info = getimagesize($tmp);
  if (!$info) return null;
  $mime = $info['mime'] ?? '';
  $ext = $mime === 'image/png' ? 'png' : ($mime === 'image/jpeg' ? 'jpg' : ($mime === 'image/webp' ? 'webp' : null));
  if (!$ext) return null;
  $name = bin2hex(random_bytes(16)) . '.' . $ext;
  $destDir = rtrim($destDir, '/');
  if (!is_dir($destDir)) mkdir($destDir, 0775, true);
  $dest = $destDir . '/' . $name;
  if (!move_uploaded_file($tmp, $dest)) return null;
  return $name;
}
