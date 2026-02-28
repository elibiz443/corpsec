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
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
          Logged in
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl">Control center</h1>
        <p class="mt-3 text-sm text-zinc-600">Edit content and manage inbound requests. The website pulls everything from MySQL.</p>
      </div>
      <div class="flex flex-wrap gap-2">
        <a href="<?php echo url('admin/settings.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">Settings</a>
        <a href="<?php echo url('admin/inquiries.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-900 ring-1 ring-black/10 transition hover:bg-zinc-50">Inquiries</a>
      </div>
    </div>

    <div class="mt-7 grid gap-3 md:grid-cols-4">
      <div class="rounded-3xl bg-zinc-50 p-6 ring-1 ring-black/10">
        <div class="text-xs font-semibold text-zinc-500">Requests</div>
        <div class="mt-3 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold"><?php echo (int)$counts['requests']; ?></div>
        <div class="mt-1 text-xs text-zinc-500">Consultations</div>
      </div>
      <div class="rounded-3xl bg-zinc-50 p-6 ring-1 ring-black/10">
        <div class="text-xs font-semibold text-zinc-500">Contacts</div>
        <div class="mt-3 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold"><?php echo (int)$counts['contacts']; ?></div>
        <div class="mt-1 text-xs text-zinc-500">Messages</div>
      </div>
      <div class="rounded-3xl bg-zinc-50 p-6 ring-1 ring-black/10">
        <div class="text-xs font-semibold text-zinc-500">Services</div>
        <div class="mt-3 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold"><?php echo (int)$counts['services']; ?></div>
        <div class="mt-1 text-xs text-zinc-500">Offerings</div>
      </div>
      <div class="rounded-3xl bg-zinc-50 p-6 ring-1 ring-black/10">
        <div class="text-xs font-semibold text-zinc-500">Posts</div>
        <div class="mt-3 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold"><?php echo (int)$counts['posts']; ?></div>
        <div class="mt-1 text-xs text-zinc-500">Insights</div>
      </div>
    </div>
  </div>

  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">Recent inquiries</div>
        <div class="mt-1 text-xs text-zinc-500">Latest inbound requests and messages</div>
      </div>
      <a href="<?php echo url('admin/inquiries.php'); ?>" class="text-sm font-semibold text-sky-700 transition hover:text-indigo-700">View all</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-black/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white text-xs text-zinc-500">
          <tr>
            <th class="px-4 py-3">Type</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Subject</th>
            <th class="px-4 py-3">When</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-white/30">
          <?php foreach ($recent as $r) { ?>
            <tr class="hover:bg-white">
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo $r['type'] === 'request' ? 'bg-sky-300/15 text-sky-700 ring-sky-300/20' : 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20'; ?>">
                  <?php echo e($r['type']); ?>
                </span>
              </td>
              <td class="px-4 py-3"><?php echo e($r['name']); ?></td>
              <td class="px-4 py-3">
                <a class="text-zinc-800 transition hover:text-indigo-700" href="<?php echo url('admin/inquiries.php'); ?>?view=<?php echo (int)$r['id']; ?>"><?php echo e($r['subject']); ?></a>
              </td>
              <td class="px-4 py-3 text-xs text-zinc-500"><?php echo e($r['created_at']); ?></td>
            </tr>
          <?php } ?>
          <?php if (!$recent) { ?>
            <tr><td class="px-4 py-6 text-sm text-zinc-500" colspan="4">No inquiries yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
