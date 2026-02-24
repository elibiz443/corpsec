<?php
  $pdo = $GLOBALS['pdo'];
  $title = 'Investigations • ' . setting('site_name', 'Corpsec');
  $description = 'Confidential investigation services: due diligence, surveillance, corporate investigations, brand protection, and verification.';
  $rows = db_all($pdo, 'SELECT * FROM services WHERE is_active = 1 AND category = ? ORDER BY sort_order, title', ['Investigation']);
?>
