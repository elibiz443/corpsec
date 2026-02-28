<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Settings';
$active = 'settings';

$fields = [
  ['site_name', 'Site name', 'text'],
  ['tagline', 'Tagline', 'text'],
  ['phone', 'Phone', 'text'],
  ['email', 'Email', 'text'],
  ['address', 'Address', 'text'],
  ['meta_description', 'Meta description', 'textarea'],
  ['hero_kicker', 'Hero kicker', 'text'],
  ['hero_title', 'Hero title', 'textarea'],
  ['hero_subtitle', 'Hero subtitle', 'textarea'],
  ['mission', 'Mission', 'textarea'],
  ['vision', 'Vision', 'textarea'],
  ['values', 'Core values (one per line)', 'textarea'],
  ['cta_title', 'CTA title', 'text'],
  ['cta_subtitle', 'CTA subtitle', 'textarea'],
  ['social_linkedin', 'LinkedIn URL', 'text'],
  ['social_facebook', 'Facebook URL', 'text'],
  ['social_instagram', 'Instagram URL', 'text'],
  ['social_x', 'X URL', 'text']
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/settings');
  }

  foreach ($fields as $f) {
    $k = $f[0];
    $v = trim((string)($_POST[$k] ?? ''));
    db_exec($pdo, 'INSERT INTO settings (key_name, value_text) VALUES (?, ?) ON DUPLICATE KEY UPDATE value_text = VALUES(value_text)', [$k, $v]);
  }

  $GLOBALS['settings'] = site_settings($pdo);
  flash_set('success', 'Settings saved.');
  redirect_to(ROOT_URL . '/admin/settings');
}

require __DIR__ . '/includes/head.php';
?>
<div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
  <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
        <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
        Website settings
      </div>
      <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl">Global settings</h1>
      <p class="mt-3 text-sm text-zinc-600">Update the site identity, hero content, mission, and contact details.</p>
    </div>
    <a href="<?php echo url(''); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">View site</a>
  </div>

  <form method="post" class="mt-8 grid gap-6">
    <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
    <div class="grid gap-4 md:grid-cols-2">
      <?php foreach ($fields as $f) { $k = $f[0]; $label = $f[1]; $type = $f[2]; ?>
        <div class="<?php echo in_array($k, ['hero_title','hero_subtitle','mission','vision','values','cta_subtitle','meta_description'], true) ? 'md:col-span-2' : ''; ?>">
          <label class="text-xs font-semibold text-zinc-600"><?php echo e($label); ?></label>
          <?php if ($type === 'textarea') { ?>
            <textarea name="<?php echo e($k); ?>" rows="<?php echo in_array($k, ['values'], true) ? 5 : 3; ?>" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300"><?php echo e(setting($k, '')); ?></textarea>
          <?php } else { ?>
            <input name="<?php echo e($k); ?>" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e(setting($k, '')); ?>">
          <?php } ?>
        </div>
      <?php } ?>
    </div>

    <div class="flex items-center justify-between gap-3">
      <div class="text-xs text-zinc-500">Saved to MySQL and applied instantly on the website.</div>
      <button type="submit" class="inline-flex items-center justify-center rounded-full bg-emerald-300 px-6 py-2.5 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-emerald-200 active:translate-y-0">Save settings</button>
    </div>
  </form>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
