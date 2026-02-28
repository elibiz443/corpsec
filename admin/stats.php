<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Stats';
$active = 'stats';

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/stats');
  }

  $action = $_POST['action'] ?? 'save';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete') {
    if ($id > 0) {
      db_exec($pdo, 'DELETE FROM stats WHERE id = ?', [$id]);
      flash_set('success', 'Stat deleted.');
    }
    redirect_to(ROOT_URL . '/admin/stats');
  }

  $label = trim((string)($_POST['label_text'] ?? ''));
  $value = trim((string)($_POST['value_text'] ?? ''));
  $sort = (int)($_POST['sort_order'] ?? 100);
  $isActive = isset($_POST['is_active']) ? 1 : 0;

  if ($label === '' || $value === '') {
    flash_set('error', 'Fill in label and value.');
    redirect_to(ROOT_URL . '/admin/stats' . ($id ? '?edit=' . $id : ''));
  }

  if ($id > 0) {
    db_exec($pdo, 'UPDATE stats SET label_text = ?, value_text = ?, sort_order = ?, is_active = ? WHERE id = ?', [$label, $value, $sort, $isActive, $id]);
    flash_set('success', 'Stat updated.');
    redirect_to(ROOT_URL . '/admin/stats?edit=' . $id);
  }

  db_exec($pdo, 'INSERT INTO stats (label_text, value_text, sort_order, is_active) VALUES (?, ?, ?, ?)', [$label, $value, $sort, $isActive]);
  flash_set('success', 'Stat created.');
  redirect_to(ROOT_URL . '/admin/stats');
}

$rows = db_all($pdo, 'SELECT * FROM stats ORDER BY sort_order, id');
$edit = $editId ? db_one($pdo, 'SELECT * FROM stats WHERE id = ? LIMIT 1', [$editId]) : null;

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
          Stats
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl"><?php echo $edit ? 'Edit stat' : 'Add stat'; ?></h1>
        <p class="mt-3 text-sm text-zinc-600">Shown on the homepage.</p>
      </div>
      <?php if ($edit) { ?>
        <a href="<?php echo url('admin/stats.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">New</a>
      <?php } ?>
    </div>

    <form method="post" class="mt-8 grid gap-5">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="id" value="<?php echo (int)($edit['id'] ?? 0); ?>">
      <input type="hidden" name="action" value="save">

      <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="text-xs font-semibold text-zinc-600">Label</label>
          <input name="label_text" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['label_text'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Value</label>
          <input name="value_text" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['value_text'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Sort order</label>
          <input name="sort_order" type="number" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['sort_order'] ?? 100); ?>">
        </div>
        <div class="flex items-end">
          <label class="inline-flex w-full items-center gap-3 rounded-2xl bg-white px-4 py-3 text-sm ring-1 ring-black/10">
            <input type="checkbox" name="is_active" value="1" class="h-4 w-4" <?php echo ((int)($edit['is_active'] ?? 1)) === 1 ? 'checked' : ''; ?>>
            Active on website
          </label>
        </div>
      </div>

      <div class="flex items-center justify-between gap-3">
        <div class="text-xs text-zinc-500">Saved to MySQL.</div>
        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-emerald-300 px-6 py-2.5 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-emerald-200 active:translate-y-0"><?php echo $edit ? 'Save changes' : 'Create'; ?></button>
      </div>
    </form>
  </div>

  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="text-sm font-semibold">All stats</div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-black/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white text-xs text-zinc-500">
          <tr>
            <th class="px-4 py-3">Label</th>
            <th class="px-4 py-3">Value</th>
            <th class="px-4 py-3">Active</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-white/30">
          <?php foreach ($rows as $s) { ?>
            <tr class="hover:bg-white">
              <td class="px-4 py-3">
                <a href="<?php echo url('admin/stats.php'); ?>?edit=<?php echo (int)$s['id']; ?>" class="text-zinc-800 transition hover:text-indigo-700"><?php echo e($s['label_text']); ?></a>
              </td>
              <td class="px-4 py-3 text-sm font-semibold"><?php echo e($s['value_text']); ?></td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo (int)$s['is_active'] === 1 ? 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20' : 'bg-zinc-50 text-zinc-500 ring-black/10'; ?>">
                  <?php echo (int)$s['is_active'] === 1 ? 'Yes' : 'No'; ?>
                </span>
              </td>
              <td class="px-4 py-3 text-right">
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$s['id']; ?>">
                  <button type="submit" class="rounded-xl bg-rose-300/15 px-3 py-2 text-xs font-semibold text-rose-700 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
                </form>
              </td>
            </tr>
          <?php } ?>
          <?php if (!$rows) { ?>
            <tr><td class="px-4 py-6 text-sm text-zinc-500" colspan="4">No stats yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
