<?php
  $pdo = $GLOBALS['pdo'];
  $title = 'About • ' . setting('site_name', 'Corpsec');
  $description = 'Learn about Corpsec: mission, vision, values, and how we deliver confidential investigations and professional guarding.';
  $team = db_all($pdo, 'SELECT * FROM team WHERE is_active = 1 ORDER BY sort_order');
?>
