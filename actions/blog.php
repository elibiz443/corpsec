<?php
  $pdo = $GLOBALS['pdo'];
  $title = 'Insights • ' . setting('site_name', 'Corpsec');
  $description = 'Security insights from Corpsec: investigations, guarding, risk readiness, and best practices.';
  $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
  $per = 9;
  $offset = ($page - 1) * $per;
  $totalRow = db_one($pdo, 'SELECT COUNT(*) AS c FROM posts WHERE is_published = 1');
  $total = (int)($totalRow['c'] ?? 0);
  $pages = max(1, (int)ceil($total / $per));
  $posts = db_all($pdo, 'SELECT * FROM posts WHERE is_published = 1 ORDER BY published_at DESC LIMIT ' . $per . ' OFFSET ' . $offset);
?>
