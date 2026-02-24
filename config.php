<?php
$hostName = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '';
$hostName = preg_replace('/:\\d+$/', '', $hostName);

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
  (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
  (isset($_SERVER['SERVER_PORT']) && (int)$_SERVER['SERVER_PORT'] === 443);

$scheme = $isHttps ? 'https' : 'http';

if (!defined('ROOT_PATH')) {
  define('ROOT_PATH', str_replace('\\', '/', __DIR__));
}

if (!defined('ROOT_URL')) {
  $docRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
  $urlPath = str_replace($docRoot, '', ROOT_PATH);
  $urlPath = ltrim($urlPath, '/');
  define('ROOT_URL', $scheme . '://' . $hostName . ($urlPath ? '/' . $urlPath : ''));
}

$isLocal = in_array($hostName, ['localhost', '127.0.0.1'], true);

ini_set('display_errors', $isLocal ? '1' : '0');
ini_set('display_startup_errors', $isLocal ? '1' : '0');
error_reporting($isLocal ? E_ALL : 0);

if (session_status() !== PHP_SESSION_ACTIVE) {
  ini_set('session.use_strict_mode', '1');
  ini_set('session.use_only_cookies', '1');
  session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => $isHttps,
    'httponly' => true,
    'samesite' => 'Lax'
  ]);
  session_start();
}

$dbHost = getenv('CORPSEC_DB_HOST') ?: 'localhost';
$dbName = getenv('CORPSEC_DB_NAME') ?: 'corpsec_db';
$dbUser = getenv('CORPSEC_DB_USER') ?: 'root';
$dbPass = getenv('CORPSEC_DB_PASS') ?: '';

if (!defined('DB_HOST')) define('DB_HOST', $dbHost);
if (!defined('DB_NAME')) define('DB_NAME', $dbName);
if (!defined('DB_USER')) define('DB_USER', $dbUser);
if (!defined('DB_PASS')) define('DB_PASS', $dbPass);
