<?php
  $pdo = $GLOBALS['pdo'];
  $title = setting('site_name', 'Corpsec');
  $description = setting('meta_description', '');
  $servicesInvest = db_all($pdo, 'SELECT * FROM services WHERE is_active = 1 AND category = ? ORDER BY sort_order, title LIMIT 8', ['Investigation']);
  $servicesGuard = db_all($pdo, 'SELECT * FROM services WHERE is_active = 1 AND category = ? ORDER BY sort_order, title LIMIT 8', ['Guarding']);
  $stats = db_all($pdo, 'SELECT * FROM stats WHERE is_active = 1 ORDER BY sort_order');
  $testimonials = db_all($pdo, 'SELECT * FROM testimonials WHERE is_active = 1 ORDER BY sort_order LIMIT 8');
  $team = db_all($pdo, 'SELECT * FROM team WHERE is_active = 1 ORDER BY sort_order LIMIT 3');
  $posts = db_all($pdo, 'SELECT * FROM posts WHERE is_published = 1 ORDER BY published_at DESC LIMIT 3');
  $partners = db_all($pdo, 'SELECT * FROM partners WHERE is_active = 1 ORDER BY sort_order LIMIT 8');

  $caseBriefs = [
    [
      'title' => 'Counterfeit network mapping',
      'tag' => 'Brand protection',
      'bullets' => ['Market intel and suspect sourcing', 'Evidence capture and chain-of-custody', 'Partner coordination for enforcement'],
      'outcome' => 'Clarity on routes, actors, and next actions.'
    ],
    [
      'title' => 'Insider risk & leakage inquiry',
      'tag' => 'Corporate investigations',
      'bullets' => ['Discrete interviews and verification', 'Timeline building and log discipline', 'Report pack for management action'],
      'outcome' => 'Actionable findings with documented proof.'
    ],
    [
      'title' => 'High-profile event security',
      'tag' => 'Guarding deployment',
      'bullets' => ['Access control and perimeter design', 'VIP movement planning and escort', 'Incident response and reporting'],
      'outcome' => 'Smooth operations with visible deterrence.'
    ]
  ];
?>
