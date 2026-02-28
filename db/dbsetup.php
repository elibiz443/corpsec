<?php
declare(strict_types=1);

function db_init(PDO $pdo): void {
  $pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS settings (
    key_name VARCHAR(190) NOT NULL PRIMARY KEY,
    value_text LONGTEXT NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS services (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(60) NOT NULL,
    title VARCHAR(190) NOT NULL,
    short_desc VARCHAR(255) NOT NULL,
    body LONGTEXT NOT NULL,
    icon VARCHAR(190) NOT NULL DEFAULT '',
    sort_order INT NOT NULL DEFAULT 100,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS team (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(190) NOT NULL,
    role_title VARCHAR(190) NOT NULL,
    bio LONGTEXT NOT NULL,
    photo VARCHAR(190) NOT NULL DEFAULT '',
    linkedin VARCHAR(255) NOT NULL DEFAULT '',
    sort_order INT NOT NULL DEFAULT 100,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS testimonials (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(190) NOT NULL,
    org_title VARCHAR(190) NOT NULL DEFAULT '',
    quote_text LONGTEXT NOT NULL,
    rating INT NOT NULL DEFAULT 5,
    sort_order INT NOT NULL DEFAULT 100,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS stats (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    label_text VARCHAR(190) NOT NULL,
    value_text VARCHAR(190) NOT NULL,
    sort_order INT NOT NULL DEFAULT 100,
    is_active TINYINT(1) NOT NULL DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS partners (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(190) NOT NULL,
    logo VARCHAR(190) NOT NULL DEFAULT '',
    website VARCHAR(255) NOT NULL DEFAULT '',
    sort_order INT NOT NULL DEFAULT 100,
    is_active TINYINT(1) NOT NULL DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt VARCHAR(300) NOT NULL,
    body LONGTEXT NOT NULL,
    cover VARCHAR(190) NOT NULL DEFAULT '',
    published_at DATETIME NULL,
    is_published TINYINT(1) NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  $pdo->exec("CREATE TABLE IF NOT EXISTS inquiries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(40) NOT NULL,
    name VARCHAR(190) NOT NULL,
    email VARCHAR(190) NOT NULL DEFAULT '',
    phone VARCHAR(80) NOT NULL DEFAULT '',
    subject VARCHAR(190) NOT NULL DEFAULT '',
    message_text LONGTEXT NOT NULL,
    meta_json LONGTEXT NOT NULL DEFAULT '',
    status VARCHAR(30) NOT NULL DEFAULT 'new',
    admin_notes LONGTEXT NOT NULL DEFAULT '',
    updated_at DATETIME NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

  try { $pdo->exec("ALTER TABLE inquiries ADD COLUMN status VARCHAR(30) NOT NULL DEFAULT 'new'"); } catch (Throwable $e) {}
  try { $pdo->exec("ALTER TABLE inquiries ADD COLUMN admin_notes LONGTEXT NOT NULL DEFAULT ''"); } catch (Throwable $e) {}
  try { $pdo->exec("ALTER TABLE inquiries ADD COLUMN updated_at DATETIME NULL"); } catch (Throwable $e) {}

  $pdo->exec("CREATE TABLE IF NOT EXISTS media (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(190) NOT NULL,
    alt_text VARCHAR(255) NOT NULL DEFAULT '',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
}

function db_seed(PDO $pdo): void {
  db_seed_admin($pdo);
  $installed = $pdo->prepare('SELECT value_text FROM settings WHERE key_name = ? LIMIT 1');
  $installed->execute(['installed']);
  if ($installed->fetch()) return;

  $set = $pdo->prepare('INSERT INTO settings (key_name, value_text) VALUES (?, ?)');
  $settings = [
    ['installed', '1'],
    ['site_name', 'Corpsec Investigation & Guarding Services'],
    ['tagline', 'Quiet strength. Clear proof.'],
    ['phone', '+254 726 058358'],
    ['email', 'info@corpsec.africa'],
    ['address', 'Nairobi, Kenya'],
    ['hero_kicker', 'Confidential • Evidence-led • Rapid response'],
    ['hero_title', 'Investigate. Protect. Secure.'],
    ['hero_subtitle', 'Premium investigations and guarding with disciplined reporting and fast deployment.'],
    ['mission', 'Delivering expert investigative and guarding solutions with integrity and professionalism.'],
    ['vision', 'To be the premier choice for confidential and effective investigative and guarding solutions.'],
    ['values', 'Integrity | Client-centric approach | Excellence'],
    ['cta_title', 'Need answers or protection?'],
    ['cta_subtitle', 'Start a confidential request. We reply quickly.'],
    ['meta_description', 'Confidential investigations and professional guarding services across Kenya.'],
    ['social_linkedin', ''],
    ['social_x', ''],
    ['social_facebook', ''],
    ['social_instagram', '']
  ];
  foreach ($settings as $s) {
    $set->execute([$s[0], $s[1]]);
  }

  $svc = $pdo->prepare('INSERT INTO services (category, title, short_desc, body, icon, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, 1)');
  $investigation = [
    ['Corporate Investigations', 'Discreet fact-finding for sensitive business matters.', 'We investigate misconduct, fraud indicators, conflict of interest, and policy breaches. Outputs include timelines, evidence logs, and actionable recommendations for management decisions.', 'assets/svg/icon-briefcase.svg', 10],
    ['Due Diligence', 'Know who you are hiring, partnering with, or acquiring.', 'Background checks, reputational screening, site verification, and reference validation. We deliver a clear risk view before you commit.', 'assets/svg/icon-check.svg', 20],
    ['IPR & Brand Protection', 'Protect trademarks, products, and revenue.', 'Market intelligence, counterfeit tracing, distribution mapping, evidence capture, and support for enforcement actions. We help you shut down leakage and counterfeit networks.', 'assets/svg/icon-shield.svg', 30],
    ['Surveillance & Field Intelligence', 'Observation with discipline and documentation.', 'Fixed and mobile surveillance, route analysis, pattern-of-life reporting, and incident reconstruction with strict chain-of-custody principles.', 'assets/svg/icon-eye.svg', 40],
    ['Bug Detection', 'Find and neutralize unauthorized listening devices.', 'Physical sweeps, workspace risk review, and preventive guidance. Ideal for executive offices, boardrooms, and sensitive projects.', 'assets/svg/icon-radar.svg', 50],
    ['Employee Background Verification', 'Reduce insider risk with thorough vetting.', 'Employment history checks, identity verification, address checks, and integrity screening aligned to role sensitivity.', 'assets/svg/icon-id.svg', 60],
    ['Investigation Support', 'Support for legal teams and internal committees.', 'Evidence handling, witness support, statement structure, documentation packs, and case file organization for professional outcomes.', 'assets/svg/icon-file.svg', 70]
  ];
  foreach ($investigation as $row) {
    $svc->execute(['Investigation', $row[0], $row[1], $row[2], $row[3], $row[4]]);
  }

  $guarding = [
    ['Static Guarding', 'Professional guards for sites and facilities.', 'Trained guards, post orders, shift discipline, incident logs, and escalation protocols. We prioritize deterrence, presence, and clear reporting.', 'assets/svg/icon-tower.svg', 10],
    ['Mobile Patrol', 'Visible patrols that reduce risk and improve response.', 'Scheduled and random patrol routes, checkpoint verification, and rapid incident escalation to your nominated contacts.', 'assets/svg/icon-car.svg', 20],
    ['VIP Escort & Close Protection', 'Discreet protection for executives and high-risk movements.', 'Advance planning, route assessment, venue checks, and close protection teams for travel, meetings, and events.', 'assets/svg/icon-user.svg', 30],
    ['Event Security', 'Orderly, controlled events with measured presence.', 'Access control, crowd management, perimeter design, VIP zones, and incident response plans for corporate and public events.', 'assets/svg/icon-ticket.svg', 40],
    ['Access Control', 'Control entry, verify identity, protect assets.', 'Visitor screening, gate procedures, ID validation, and structured escalation. Designed to prevent unauthorized access without disrupting operations.', 'assets/svg/icon-door.svg', 50],
    ['Emergency Response', 'Calm, fast action when it matters.', 'Response teams, incident containment, liaison support, and documentation. We help stabilize situations and restore normal operations.', 'assets/svg/icon-bolt.svg', 60]
  ];
  foreach ($guarding as $row) {
    $svc->execute(['Guarding', $row[0], $row[1], $row[2], $row[3], $row[4]]);
  }

  $team = $pdo->prepare('INSERT INTO team (name, role_title, bio, photo, linkedin, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, 1)');
  $teamRows = [
    ['Moses Ojelle', 'Founder & Lead Investigator', 'Moses leads field operations with a focus on confidential investigations, evidence handling, and client communication. He brings a disciplined approach to case structuring, reporting, and risk guidance for corporate and private clients.', '', '', 10],
    ['Peter Sitati', 'Operations & Guarding Coordinator', 'Peter oversees guarding deployments, post orders, and response readiness. He focuses on training discipline, on-site supervision, and clean reporting standards that keep clients informed and protected.', '', '', 20],
    ['Irene Oyugah', 'Client Liaison & Case Support', 'Irene supports intake, coordination, and documentation for active cases. She ensures every engagement stays structured, timely, and aligned to client objectives and confidentiality standards.', '', '', 30]
  ];
  foreach ($teamRows as $t) {
    $team->execute($t);
  }

  $stat = $pdo->prepare('INSERT INTO stats (label_text, value_text, sort_order, is_active) VALUES (?, ?, ?, 1)');
  $stats = [
    ['Closed cases', '375+', 10],
    ['Pending cases', '7', 20],
    ['Client satisfaction', '99%', 30],
    ['Response readiness', '24/7', 40]
  ];
  foreach ($stats as $s) {
    $stat->execute($s);
  }

  $tst = $pdo->prepare('INSERT INTO testimonials (name, org_title, quote_text, rating, sort_order, is_active) VALUES (?, ?, ?, ?, ?, 1)');
  $testimonials = [
    ['Operations Director', 'Manufacturing', 'Corpsec delivered clear findings fast. Their documentation and evidence handling were professional, and the recommendations helped us close the gaps without drama.', 5, 10],
    ['HR Lead', 'Services Company', 'Their background verification and discreet inquiries improved our hiring confidence immediately. Clean reports, quick turnaround, and strong confidentiality.', 5, 20],
    ['Estate Manager', 'Residential', 'Guarding was disciplined and reliable. The team is calm, firm, and always reports incidents with detail. We felt the difference within the first week.', 5, 30]
  ];
  foreach ($testimonials as $x) {
    $tst->execute($x);
  }

  $partner = $pdo->prepare('INSERT INTO partners (name, logo, website, sort_order, is_active) VALUES (?, ?, ?, ?, 1)');
  $partners = [
    ['Confidential Enterprises', 'assets/svg/partner-a.svg', '', 10],
    ['Prime Estates', 'assets/svg/partner-b.svg', '', 20],
    ['Frontier Logistics', 'assets/svg/partner-c.svg', '', 30],
    ['Keystone Hospitality', 'assets/svg/partner-d.svg', '', 40]
  ];
  foreach ($partners as $p) {
    $partner->execute($p);
  }

  $post = $pdo->prepare('INSERT INTO posts (title, slug, excerpt, body, cover, published_at, is_published) VALUES (?, ?, ?, ?, ?, ?, ?)');
  $posts = [
    [
      'How to reduce insider risk without slowing operations',
      'reduce-insider-risk-without-slowing-operations',
      'A practical approach to screening, access discipline, and investigation readiness that protects your business without adding friction.',
      '<h2>Insider risk is usually process risk</h2><p>Most cases start as small exceptions: shared badges, weak visitor control, incomplete onboarding, or poor asset tracking. A strong insider risk posture is built on simple, repeatable habits.</p><h3>What works</h3><ul><li>Role-based access and visitor policies</li><li>Background verification aligned to sensitivity</li><li>Clear incident escalation and documentation</li><li>Periodic audits for high-risk workflows</li></ul><p>When something goes wrong, disciplined documentation and evidence preservation keeps you in control.</p>',
      'assets/images/blog1.webp',
      date('Y-m-d H:i:s', strtotime('-8 days')),
      1
    ],
    [
      'Close protection basics for executives and VIP movements',
      'close-protection-basics-for-executives',
      'Route planning, venue checks, and low-profile practices that keep people safe and schedules on track.',
      '<h2>Protection is planning</h2><p>Close protection is not intimidation. It is advance preparation, calm presence, and disciplined movement controls.</p><h3>Core elements</h3><ul><li>Advance checks and route alternatives</li><li>Controlled pick-up and drop-off procedures</li><li>Communication protocols</li><li>Post-incident reporting</li></ul><p>Done well, it blends into the day while quietly reducing risk.</p>',
      'assets/images/blog2.webp',
      date('Y-m-d H:i:s', strtotime('-20 days')),
      1
    ],
    [
      'Brand protection: spotting counterfeit leakage early',
      'brand-protection-spotting-counterfeit-leakage-early',
      'Counterfeit networks thrive on silence. Here are practical early-warning signals and what to do next.',
      '<h2>Leakage leaves signals</h2><p>Price anomalies, unusual packaging, and distribution patterns often show up before customers complain. Market intelligence helps you locate the source faster.</p><h3>First moves</h3><ul><li>Map sellers and document evidence</li><li>Identify the supply chain path</li><li>Coordinate enforcement actions</li><li>Strengthen internal controls</li></ul><p>Consistent documentation is what turns suspicion into action.</p>',
      'assets/images/blog3.webp',
      date('Y-m-d H:i:s', strtotime('-35 days')),
      1
    ]
  ];
  foreach ($posts as $p) {
    $post->execute($p);
  }
}

function db_seed_admin(PDO $pdo): void {
  $username = 'supreme_admin';
  $password = 'secure123';

  $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
  $stmt->execute([$username]);
  if ($stmt->fetch()) return;

  $algo = defined('PASSWORD_ARGON2ID') ? PASSWORD_ARGON2ID : PASSWORD_BCRYPT;
  $hash = password_hash($password, $algo);
  if (!$hash) throw new RuntimeException('password_hash failed');

  $insert = $pdo->prepare('INSERT INTO users (username, password_hash) VALUES (?, ?)');
  $insert->execute([$username, $hash]);
}
