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

  if ($action === 'update' && $id > 0) {
    $status = trim((string)($_POST['status'] ?? 'new'));
    $notes = trim((string)($_POST['admin_notes'] ?? ''));
    $allowed = ['new', 'in_progress', 'resolved'];
    if (!in_array($status, $allowed, true)) $status = 'new';
    db_exec($pdo, 'UPDATE inquiries SET status = ?, admin_notes = ?, updated_at = NOW() WHERE id = ?', [$status, $notes, $id]);
    flash_set('success', 'Inquiry updated.');
  }

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
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
          Inquiries
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl">Requests & messages</h1>
        <p class="mt-3 text-sm text-zinc-600">Submissions from the website consultation wizard and contact form.</p>
      </div>
      <div class="flex flex-wrap items-center gap-2">
        <a href="<?php echo url('admin/inquiries.php'); ?>" class="rounded-full px-4 py-2 text-sm font-semibold ring-1 transition <?php echo $filter === '' ? 'bg-white text-zinc-950 ring-white/20' : 'bg-white text-zinc-700 ring-black/10 hover:bg-zinc-50'; ?>">All</a>
        <a href="<?php echo url('admin/inquiries.php'); ?>?type=request" class="rounded-full px-4 py-2 text-sm font-semibold ring-1 transition <?php echo $filter === 'request' ? 'bg-white text-zinc-950 ring-white/20' : 'bg-white text-zinc-700 ring-black/10 hover:bg-zinc-50'; ?>">Requests</a>
        <a href="<?php echo url('admin/inquiries.php'); ?>?type=contact" class="rounded-full px-4 py-2 text-sm font-semibold ring-1 transition <?php echo $filter === 'contact' ? 'bg-white text-zinc-950 ring-white/20' : 'bg-white text-zinc-700 ring-black/10 hover:bg-zinc-50'; ?>">Contacts</a>
      </div>
    </div>

    <form method="get" class="mt-7 flex flex-col gap-3 md:flex-row md:items-center">
      <?php if ($filter !== '') { ?>
        <input type="hidden" name="type" value="<?php echo e($filter); ?>">
      <?php } ?>
      <div class="flex-1">
        <input name="q" value="<?php echo e($q); ?>" placeholder="Search name, email, phone, subject" class="w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300">
      </div>
      <div class="flex items-center gap-2">
        <button class="inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">Search</button>
        <a href="<?php echo url('admin/inquiries.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-semibold text-zinc-700 ring-1 ring-black/10 transition hover:bg-zinc-50">Reset</a>
      </div>
    </form>
  </div>

  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">Inbox</div>
        <div class="mt-1 text-xs text-zinc-500"><?php echo count($rows); ?> shown (latest 300)</div>
      </div>
      <a href="<?php echo url('contact.php'); ?>" class="text-sm font-semibold text-sky-700 transition hover:text-indigo-700">Open contact page</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-black/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white text-xs text-zinc-500">
          <tr>
            <th class="px-4 py-3">Type</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">From</th>
            <th class="px-4 py-3">Subject</th>
            <th class="px-4 py-3">When</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-white/30">
          <?php foreach ($rows as $r) { ?>
            <?php
              $meta = [];
              $mj = (string)($r['meta_json'] ?? '');
              if ($mj !== '') {
                $d = json_decode($mj, true);
                if (is_array($d)) $meta = $d;
              }
              $badge = (string)$r['type'] === 'request'
                ? 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20'
                : 'bg-sky-300/15 text-sky-700 ring-sky-300/20';
              $created = (string)($r['created_at'] ?? '');
            ?>
            <tr class="align-top hover:bg-white">
              <td class="px-4 py-4">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo $badge; ?>"><?php echo e($r['type']); ?></span>
              </td>
              <td class="px-4 py-4">
                <?php
                  $status = (string)($r['status'] ?? 'new');
                  $statusBadge = $status === 'resolved'
                    ? 'bg-emerald-500/10 text-emerald-700 ring-emerald-200/60'
                    : ($status === 'in_progress'
                      ? 'bg-amber-500/10 text-amber-800 ring-amber-200/60'
                      : 'bg-sky-500/10 text-sky-700 ring-sky-200/60');
                  $statusLabel = $status === 'in_progress' ? 'In progress' : ucfirst($status);
                ?>
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo $statusBadge; ?>"><?php echo e($statusLabel); ?></span>
              </td>
              <td class="px-4 py-4">
                <div class="font-semibold text-zinc-900"><?php echo e($r['name']); ?></div>
                <div class="mt-1 text-xs text-zinc-500"><?php echo e($r['email']); ?><?php echo $r['phone'] ? ' • ' . e($r['phone']) : ''; ?></div>
              </td>
              <td class="px-4 py-4">
                <button type="button" data-open-inquiry="<?php echo (int)$r['id']; ?>" class="text-left font-semibold text-zinc-800 transition hover:text-indigo-700"><?php echo e($r['subject'] ?: 'No subject'); ?></button>
                <div class="mt-2 line-clamp-2 text-xs text-zinc-500"><?php echo e(mb_strimwidth((string)$r['message_text'], 0, 160, '…')); ?></div>
              </td>
              <td class="px-4 py-4 text-xs text-zinc-500"><?php echo e($created); ?></td>
              <td class="px-4 py-4 text-right">
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$r['id']; ?>">
                  <button type="submit" class="rounded-xl bg-rose-300/15 px-3 py-2 text-xs font-semibold text-rose-700 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
                </form>
              </td>
            </tr>
            <tr class="hidden" data-inquiry="<?php echo (int)$r['id']; ?>">
              <td colspan="6" class="px-4 pb-6">
                <div class="grid gap-4 rounded-3xl bg-zinc-50 p-6 ring-1 ring-black/10 md:grid-cols-12">
                  <div class="md:col-span-5">
                    <div class="text-xs font-semibold text-zinc-500">Details</div>
                    <div class="mt-3 grid gap-2 text-sm">
                      <div class="flex items-start justify-between gap-3"><span class="text-zinc-500">Name</span><span class="text-right font-semibold text-zinc-900"><?php echo e($r['name']); ?></span></div>
                      <div class="flex items-start justify-between gap-3"><span class="text-zinc-500">Email</span><a class="text-right font-semibold text-sky-700 underline decoration-sky-200 underline-offset-4 hover:text-indigo-700" href="mailto:<?php echo e($r['email']); ?>"><?php echo e($r['email']); ?></a></div>
                      <?php if ($r['phone']) { ?>
                        <div class="flex items-start justify-between gap-3"><span class="text-zinc-500">Phone</span><a class="text-right font-semibold text-sky-700 underline decoration-sky-200 underline-offset-4 hover:text-indigo-700" href="tel:<?php echo e($r['phone']); ?>"><?php echo e($r['phone']); ?></a></div>
                      <?php } ?>
                      <div class="flex items-start justify-between gap-3"><span class="text-zinc-500">Created</span><span class="text-right text-zinc-700"><?php echo e($created); ?></span></div>
                      <form method="post" class="mt-3 grid gap-3 rounded-2xl bg-white p-4 ring-1 ring-black/10">
                        <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo (int)$r['id']; ?>">
                        <div>
                          <label class="text-xs font-semibold text-zinc-500">Status</label>
                          <?php $cur = (string)($r['status'] ?? 'new'); ?>
                          <select name="status" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <option value="new" <?php echo $cur === 'new' ? 'selected' : ''; ?>>New</option>
                            <option value="in_progress" <?php echo $cur === 'in_progress' ? 'selected' : ''; ?>>In progress</option>
                            <option value="resolved" <?php echo $cur === 'resolved' ? 'selected' : ''; ?>>Resolved</option>
                          </select>
                        </div>
                        <div>
                          <label class="text-xs font-semibold text-zinc-500">Internal notes</label>
                          <textarea name="admin_notes" rows="4" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="Add internal notes (not visible on the website)"><?php echo e((string)($r['admin_notes'] ?? '')); ?></textarea>
                        </div>
                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-sky-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-600 active:translate-y-0">Save</button>
                      </form>
                      <?php if ($meta) { ?>
                        <div class="mt-2 rounded-2xl bg-white p-4 ring-1 ring-black/10">
                          <div class="text-xs font-semibold text-zinc-500">Meta</div>
                          <div class="mt-3 grid gap-2 text-xs text-zinc-600">
                            <?php foreach ($meta as $k => $v) { ?>
                              <div class="flex items-start justify-between gap-3">
                                <span class="text-zinc-500"><?php echo e($k); ?></span>
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
                      <div class="text-xs font-semibold text-zinc-500">Message</div>
                      <button type="button" data-close-inquiry="<?php echo (int)$r['id']; ?>" class="rounded-full bg-white px-4 py-2 text-xs font-semibold text-zinc-600 ring-1 ring-black/10 transition hover:bg-zinc-50">Close</button>
                    </div>
                    <div class="mt-3 rounded-3xl bg-white p-6 text-sm leading-relaxed text-zinc-700 ring-1 ring-black/10 whitespace-pre-line"><?php echo e($r['message_text']); ?></div>
                  </div>
                </div>
              </td>
            </tr>
          <?php } ?>
          <?php if (!$rows) { ?>
            <tr><td class="px-4 py-8 text-sm text-zinc-500" colspan="6">No inquiries found.</td></tr>
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
