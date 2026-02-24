<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Dashboard';
$active = 'dashboard';

$counts = [
  'requests' => (int)(db_one($pdo, "SELECT COUNT(*) AS c FROM inquiries WHERE type = 'request'")['c'] ?? 0),
  'contacts' => (int)(db_one($pdo, "SELECT COUNT(*) AS c FROM inquiries WHERE type = 'contact'")['c'] ?? 0),
  'posts' => (int)(db_one($pdo, "SELECT COUNT(*) AS c FROM posts")['c'] ?? 0),
  'services' => (int)(db_one($pdo, "SELECT COUNT(*) AS c FROM services")['c'] ?? 0)
];

$recent = db_all($pdo, 'SELECT * FROM inquiries ORDER BY created_at DESC LIMIT 10');

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs text-white/70 ring-1 ring-white/10">
          <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
          Logged in
        </div>
        <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight md:text-4xl">Control center</h1>
        <p class="mt-3 text-sm text-white/70">Edit content and manage inbound requests. The website pulls everything from MySQL.</p>
      </div>
      <div class="flex flex-wrap gap-2">
        <a href="<?php echo url('admin/settings.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">Settings</a>
        <a href="<?php echo url('admin/inquiries.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">Inquiries</a>
      </div>
    </div>

    <div class="mt-7 grid gap-3 md:grid-cols-4">
      <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
        <div class="text-xs font-semibold text-white/60">Requests</div>
        <div class="mt-3 font-display text-3xl font-semibold"><?php echo (int)$counts['requests']; ?></div>
        <div class="mt-1 text-xs text-white/50">Consultations</div>
      </div>
      <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
        <div class="text-xs font-semibold text-white/60">Contacts</div>
        <div class="mt-3 font-display text-3xl font-semibold"><?php echo (int)$counts['contacts']; ?></div>
        <div class="mt-1 text-xs text-white/50">Messages</div>
      </div>
      <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
        <div class="text-xs font-semibold text-white/60">Services</div>
        <div class="mt-3 font-display text-3xl font-semibold"><?php echo (int)$counts['services']; ?></div>
        <div class="mt-1 text-xs text-white/50">Offerings</div>
      </div>
      <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
        <div class="text-xs font-semibold text-white/60">Posts</div>
        <div class="mt-3 font-display text-3xl font-semibold"><?php echo (int)$counts['posts']; ?></div>
        <div class="mt-1 text-xs text-white/50">Insights</div>
      </div>
    </div>
  </div>

  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">Recent inquiries</div>
        <div class="mt-1 text-xs text-white/60">Latest inbound requests and messages</div>
      </div>
      <a href="<?php echo url('admin/inquiries.php'); ?>" class="text-sm font-semibold text-brand-200 transition hover:text-white">View all</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-white/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white/5 text-xs text-white/60">
          <tr>
            <th class="px-4 py-3">Type</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Subject</th>
            <th class="px-4 py-3">When</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-zinc-950/30">
          <?php foreach ($recent as $r) { ?>
            <tr class="hover:bg-white/5">
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo $r['type'] === 'request' ? 'bg-brand-300/15 text-brand-200 ring-brand-300/20' : 'bg-emerald-300/15 text-emerald-200 ring-emerald-300/20'; ?>">
                  <?php echo e($r['type']); ?>
                </span>
              </td>
              <td class="px-4 py-3"><?php echo e($r['name']); ?></td>
              <td class="px-4 py-3">
                <a class="text-white/85 transition hover:text-white" href="<?php echo url('admin/inquiries.php'); ?>?view=<?php echo (int)$r['id']; ?>"><?php echo e($r['subject']); ?></a>
              </td>
              <td class="px-4 py-3 text-xs text-white/60"><?php echo e($r['created_at']); ?></td>
            </tr>
          <?php } ?>
          <?php if (!$recent) { ?>
            <tr><td class="px-4 py-6 text-sm text-white/60" colspan="4">No inquiries yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
