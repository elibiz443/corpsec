<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Inquiries';
$active = 'inquiries';

$filter = trim((string)($_GET['type'] ?? ''));
$q = trim((string)($_GET['q'] ?? ''));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/inquiries');
  }

  $action = $_POST['action'] ?? '';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete' && $id > 0) {
    db_exec($pdo, 'DELETE FROM inquiries WHERE id = ?', [$id]);
    flash_set('success', 'Inquiry deleted.');
  }

  $back = ROOT_URL . '/admin/inquiries';
  if ($filter !== '') $back .= '?type=' . urlencode($filter);
  redirect_to($back);
}

$where = [];
$params = [];
if ($filter !== '') {
  $where[] = 'type = ?';
  $params[] = $filter;
}
if ($q !== '') {
  $where[] = '(name LIKE ? OR email LIKE ? OR phone LIKE ? OR subject LIKE ? OR message_text LIKE ?)';
  $like = '%' . $q . '%';
  $params[] = $like;
  $params[] = $like;
  $params[] = $like;
  $params[] = $like;
  $params[] = $like;
}

$sql = 'SELECT * FROM inquiries';
if ($where) $sql .= ' WHERE ' . implode(' AND ', $where);
$sql .= ' ORDER BY created_at DESC, id DESC LIMIT 300';

$rows = db_all($pdo, $sql, $params);

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs text-white/70 ring-1 ring-white/10">
          <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
          Inquiries
        </div>
        <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight md:text-4xl">Requests & messages</h1>
        <p class="mt-3 text-sm text-white/70">Submissions from the website consultation wizard and contact form.</p>
      </div>
      <div class="flex flex-wrap items-center gap-2">
        <a href="<?php echo url('admin/inquiries.php'); ?>" class="rounded-full px-4 py-2 text-sm font-semibold ring-1 transition <?php echo $filter === '' ? 'bg-white text-zinc-950 ring-white/20' : 'bg-white/5 text-white/80 ring-white/10 hover:bg-white/10'; ?>">All</a>
        <a href="<?php echo url('admin/inquiries.php'); ?>?type=request" class="rounded-full px-4 py-2 text-sm font-semibold ring-1 transition <?php echo $filter === 'request' ? 'bg-white text-zinc-950 ring-white/20' : 'bg-white/5 text-white/80 ring-white/10 hover:bg-white/10'; ?>">Requests</a>
        <a href="<?php echo url('admin/inquiries.php'); ?>?type=contact" class="rounded-full px-4 py-2 text-sm font-semibold ring-1 transition <?php echo $filter === 'contact' ? 'bg-white text-zinc-950 ring-white/20' : 'bg-white/5 text-white/80 ring-white/10 hover:bg-white/10'; ?>">Contacts</a>
      </div>
    </div>

    <form method="get" class="mt-7 flex flex-col gap-3 md:flex-row md:items-center">
      <?php if ($filter !== '') { ?>
        <input type="hidden" name="type" value="<?php echo e($filter); ?>">
      <?php } ?>
      <div class="flex-1">
        <input name="q" value="<?php echo e($q); ?>" placeholder="Search name, email, phone, subject" class="w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300">
      </div>
      <div class="flex items-center gap-2">
        <button class="inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">Search</button>
        <a href="<?php echo url('admin/inquiries.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-3 text-sm font-semibold text-white/80 ring-1 ring-white/10 transition hover:bg-white/10">Reset</a>
      </div>
    </form>
  </div>

  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">Inbox</div>
        <div class="mt-1 text-xs text-white/60"><?php echo count($rows); ?> shown (latest 300)</div>
      </div>
      <a href="<?php echo url('contact.php'); ?>" class="text-sm font-semibold text-brand-200 transition hover:text-white">Open contact page</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-white/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white/5 text-xs text-white/60">
          <tr>
            <th class="px-4 py-3">Type</th>
            <th class="px-4 py-3">From</th>
            <th class="px-4 py-3">Subject</th>
            <th class="px-4 py-3">When</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-zinc-950/30">
          <?php foreach ($rows as $r) { ?>
            <?php
              $meta = [];
              $mj = (string)($r['meta_json'] ?? '');
              if ($mj !== '') {
                $d = json_decode($mj, true);
                if (is_array($d)) $meta = $d;
              }
              $badge = (string)$r['type'] === 'request'
                ? 'bg-emerald-300/15 text-emerald-200 ring-emerald-300/20'
                : 'bg-brand-300/15 text-brand-200 ring-brand-300/20';
              $created = (string)($r['created_at'] ?? '');
            ?>
            <tr class="align-top hover:bg-white/5">
              <td class="px-4 py-4">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo $badge; ?>"><?php echo e($r['type']); ?></span>
              </td>
              <td class="px-4 py-4">
                <div class="font-semibold text-white/90"><?php echo e($r['name']); ?></div>
                <div class="mt-1 text-xs text-white/60"><?php echo e($r['email']); ?><?php echo $r['phone'] ? ' • ' . e($r['phone']) : ''; ?></div>
              </td>
              <td class="px-4 py-4">
                <button type="button" data-open-inquiry="<?php echo (int)$r['id']; ?>" class="text-left font-semibold text-white/85 transition hover:text-white"><?php echo e($r['subject'] ?: 'No subject'); ?></button>
                <div class="mt-2 line-clamp-2 text-xs text-white/60"><?php echo e(mb_strimwidth((string)$r['message_text'], 0, 160, '…')); ?></div>
              </td>
              <td class="px-4 py-4 text-xs text-white/60"><?php echo e($created); ?></td>
              <td class="px-4 py-4 text-right">
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$r['id']; ?>">
                  <button type="submit" class="rounded-xl bg-rose-300/15 px-3 py-2 text-xs font-semibold text-rose-200 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
                </form>
              </td>
            </tr>
            <tr class="hidden" data-inquiry="<?php echo (int)$r['id']; ?>">
              <td colspan="5" class="px-4 pb-6">
                <div class="grid gap-4 rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10 md:grid-cols-12">
                  <div class="md:col-span-5">
                    <div class="text-xs font-semibold text-white/60">Details</div>
                    <div class="mt-3 grid gap-2 text-sm">
                      <div class="flex items-start justify-between gap-3"><span class="text-white/60">Name</span><span class="text-right font-semibold text-white/90"><?php echo e($r['name']); ?></span></div>
                      <div class="flex items-start justify-between gap-3"><span class="text-white/60">Email</span><a class="text-right font-semibold text-brand-200 underline decoration-white/20 underline-offset-4 hover:text-white" href="mailto:<?php echo e($r['email']); ?>"><?php echo e($r['email']); ?></a></div>
                      <?php if ($r['phone']) { ?>
                        <div class="flex items-start justify-between gap-3"><span class="text-white/60">Phone</span><a class="text-right font-semibold text-brand-200 underline decoration-white/20 underline-offset-4 hover:text-white" href="tel:<?php echo e($r['phone']); ?>"><?php echo e($r['phone']); ?></a></div>
                      <?php } ?>
                      <div class="flex items-start justify-between gap-3"><span class="text-white/60">Created</span><span class="text-right text-white/80"><?php echo e($created); ?></span></div>
                      <?php if ($meta) { ?>
                        <div class="mt-2 rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                          <div class="text-xs font-semibold text-white/60">Meta</div>
                          <div class="mt-3 grid gap-2 text-xs text-white/70">
                            <?php foreach ($meta as $k => $v) { ?>
                              <div class="flex items-start justify-between gap-3">
                                <span class="text-white/50"><?php echo e($k); ?></span>
                                <span class="text-right"><?php echo e(is_scalar($v) ? (string)$v : json_encode($v)); ?></span>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="md:col-span-7">
                    <div class="flex items-center justify-between">
                      <div class="text-xs font-semibold text-white/60">Message</div>
                      <button type="button" data-close-inquiry="<?php echo (int)$r['id']; ?>" class="rounded-full bg-white/5 px-4 py-2 text-xs font-semibold text-white/70 ring-1 ring-white/10 transition hover:bg-white/10">Close</button>
                    </div>
                    <div class="mt-3 rounded-3xl bg-white/5 p-6 text-sm leading-relaxed text-white/80 ring-1 ring-white/10 whitespace-pre-line"><?php echo e($r['message_text']); ?></div>
                  </div>
                </div>
              </td>
            </tr>
          <?php } ?>
          <?php if (!$rows) { ?>
            <tr><td class="px-4 py-8 text-sm text-white/60" colspan="5">No inquiries found.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('[data-open-inquiry]').forEach(b => {
    b.addEventListener('click', () => {
      const id = b.getAttribute('data-open-inquiry')
      const row = document.querySelector(`[data-inquiry="${id}"]`)
      if (!row) return
      row.classList.toggle('hidden')
    })
  })
  document.querySelectorAll('[data-close-inquiry]').forEach(b => {
    b.addEventListener('click', () => {
      const id = b.getAttribute('data-close-inquiry')
      const row = document.querySelector(`[data-inquiry="${id}"]`)
      if (row) row.classList.add('hidden')
    })
  })
</script>
<?php require __DIR__ . '/includes/foot.php'; ?>
