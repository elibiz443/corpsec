<?php
  $pdo = $GLOBALS['pdo'];
  $title = 'Guarding • ' . setting('site_name', 'Corpsec');
  $description = 'Professional guarding services: static guarding, patrol, access control, event security, VIP escort, and response readiness.';
  $rows = db_all($pdo, 'SELECT * FROM services WHERE is_active = 1 AND category = ? ORDER BY sort_order, title', ['Guarding']);
?>
