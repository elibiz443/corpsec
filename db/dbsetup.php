<?php
declare(strict_types=1);

function db_init(PDO $pdo): void {
  $pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
      id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(190) NOT NULL UNIQUE,
      password_hash VARCHAR(255) NOT NULL,
      created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  ");
}

function db_seed_default_user(PDO $pdo): void {
  $username = 'supreme_admin';
  $password = 'secure123';

  $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
  $stmt->execute([$username]);

  if ($stmt->fetch()) return;

  $algo = defined('PASSWORD_ARGON2ID') ? PASSWORD_ARGON2ID : PASSWORD_BCRYPT;
  $hash = password_hash($password, $algo);

  if (!$hash) {
    throw new RuntimeException('password_hash failed');
  }

  $insert = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
  $insert->execute([$username, $hash]);
}
