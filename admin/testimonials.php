<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Testimonials';
$active = 'testimonials';

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/testimonials');
  }

  $action = $_POST['action'] ?? 'save';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete') {
    if ($id > 0) {
      db_exec($pdo, 'DELETE FROM testimonials WHERE id = ?', [$id]);
      flash_set('success', 'Testimonial deleted.');
    }
    redirect_to(ROOT_URL . '/admin/testimonials');
  }

  $name = trim((string)($_POST['name'] ?? ''));
  $org = trim((string)($_POST['org_title'] ?? ''));
  $quote = trim((string)($_POST['quote_text'] ?? ''));
  $rating = max(1, min(5, (int)($_POST['rating'] ?? 5)));
  $sort = (int)($_POST['sort_order'] ?? 100);
  $isActive = isset($_POST['is_active']) ? 1 : 0;

  if ($name === '' || $quote === '') {
    flash_set('error', 'Fill in name and quote.');
    redirect_to(ROOT_URL . '/admin/testimonials' . ($id ? '?edit=' . $id : ''));
  }

  if ($id > 0) {
    db_exec($pdo, 'UPDATE testimonials SET name = ?, org_title = ?, quote_text = ?, rating = ?, sort_order = ?, is_active = ? WHERE id = ?', [$name, $org, $quote, $rating, $sort, $isActive, $id]);
    flash_set('success', 'Testimonial updated.');
    redirect_to(ROOT_URL . '/admin/testimonials?edit=' . $id);
  }

  db_exec($pdo, 'INSERT INTO testimonials (name, org_title, quote_text, rating, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?)', [$name, $org, $quote, $rating, $sort, $isActive]);
  flash_set('success', 'Testimonial created.');
  redirect_to(ROOT_URL . '/admin/testimonials');
}

$rows = db_all($pdo, 'SELECT * FROM testimonials ORDER BY sort_order, created_at DESC');
$edit = $editId ? db_one($pdo, 'SELECT * FROM testimonials WHERE id = ? LIMIT 1', [$editId]) : null;

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
          Testimonials
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl"><?php echo $edit ? 'Edit testimonial' : 'Add testimonial'; ?></h1>
        <p class="mt-3 text-sm text-zinc-600">Shown on the homepage.</p>
      </div>
      <?php if ($edit) { ?>
        <a href="<?php echo url('admin/testimonials.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">New</a>
      <?php } ?>
    </div>

    <form method="post" class="mt-8 grid gap-5">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="id" value="<?php echo (int)($edit['id'] ?? 0); ?>">
      <input type="hidden" name="action" value="save">

      <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="text-xs font-semibold text-zinc-600">Name</label>
          <input name="name" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['name'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Organization / title</label>
          <input name="org_title" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['org_title'] ?? ''); ?>">
        </div>
        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-zinc-600">Quote</label>
          <textarea name="quote_text" rows="4" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300"><?php echo e($edit['quote_text'] ?? ''); ?></textarea>
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Rating</label>
          <select name="rating" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300">
            <?php $r = (int)($edit['rating'] ?? 5); for ($i = 5; $i >= 1; $i--) { ?>
              <option class="bg-white" value="<?php echo $i; ?>" <?php echo $r === $i ? 'selected' : ''; ?>><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Sort order</label>
          <input name="sort_order" type="number" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['sort_order'] ?? 100); ?>">
        </div>
        <div class="md:col-span-2">
          <label class="inline-flex items-center gap-3 rounded-2xl bg-white px-4 py-3 text-sm ring-1 ring-black/10">
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
    <div class="text-sm font-semibold">All testimonials</div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-black/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white text-xs text-zinc-500">
          <tr>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Quote</th>
            <th class="px-4 py-3">Active</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-white/30">
          <?php foreach ($rows as $t) { ?>
            <tr class="hover:bg-white">
              <td class="px-4 py-3">
                <a href="<?php echo url('admin/testimonials.php'); ?>?edit=<?php echo (int)$t['id']; ?>" class="text-zinc-800 transition hover:text-indigo-700"><?php echo e($t['name']); ?></a>
                <div class="text-xs text-zinc-500"><?php echo e($t['org_title']); ?></div>
              </td>
              <td class="px-4 py-3 text-xs text-zinc-500"><?php echo e(mb_strimwidth($t['quote_text'], 0, 120, '…')); ?></td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo (int)$t['is_active'] === 1 ? 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20' : 'bg-zinc-50 text-zinc-500 ring-black/10'; ?>">
                  <?php echo (int)$t['is_active'] === 1 ? 'Yes' : 'No'; ?>
                </span>
              </td>
              <td class="px-4 py-3 text-right">
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$t['id']; ?>">
                  <button type="submit" class="rounded-xl bg-rose-300/15 px-3 py-2 text-xs font-semibold text-rose-700 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
                </form>
              </td>
            </tr>
          <?php } ?>
          <?php if (!$rows) { ?>
            <tr><td class="px-4 py-6 text-sm text-zinc-500" colspan="4">No testimonials yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
