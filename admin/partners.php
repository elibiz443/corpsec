<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Partners';
$active = 'partners';

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/partners');
  }

  $action = $_POST['action'] ?? 'save';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete') {
    if ($id > 0) {
      db_exec($pdo, 'DELETE FROM partners WHERE id = ?', [$id]);
      flash_set('success', 'Partner deleted.');
    }
    redirect_to(ROOT_URL . '/admin/partners');
  }

  $name = trim((string)($_POST['name'] ?? ''));
  $website = trim((string)($_POST['website'] ?? ''));
  $logo = trim((string)($_POST['logo'] ?? ''));
  $sort = (int)($_POST['sort_order'] ?? 100);
  $isActive = isset($_POST['is_active']) ? 1 : 0;

  $uploaded = upload_image('logo_upload', ROOT_PATH . '/uploads');
  if ($uploaded) {
    $logo = 'uploads/' . $uploaded;
    db_exec($pdo, 'INSERT INTO media (file_name, alt_text) VALUES (?, ?)', [$uploaded, $name]);
  }

  if ($name === '') {
    flash_set('error', 'Fill in name.');
    redirect_to(ROOT_URL . '/admin/partners' . ($id ? '?edit=' . $id : ''));
  }

  if ($id > 0) {
    db_exec($pdo, 'UPDATE partners SET name = ?, logo = ?, website = ?, sort_order = ?, is_active = ? WHERE id = ?', [$name, $logo, $website, $sort, $isActive, $id]);
    flash_set('success', 'Partner updated.');
    redirect_to(ROOT_URL . '/admin/partners?edit=' . $id);
  }

  db_exec($pdo, 'INSERT INTO partners (name, logo, website, sort_order, is_active) VALUES (?, ?, ?, ?, ?)', [$name, $logo, $website, $sort, $isActive]);
  flash_set('success', 'Partner created.');
  redirect_to(ROOT_URL . '/admin/partners');
}

$rows = db_all($pdo, 'SELECT * FROM partners ORDER BY sort_order, id');
$edit = $editId ? db_one($pdo, 'SELECT * FROM partners WHERE id = ? LIMIT 1', [$editId]) : null;

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs text-white/70 ring-1 ring-white/10">
          <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
          Partners
        </div>
        <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight md:text-4xl"><?php echo $edit ? 'Edit partner' : 'Add partner'; ?></h1>
        <p class="mt-3 text-sm text-white/70">Partner logos appear on the homepage.</p>
      </div>
      <?php if ($edit) { ?>
        <a href="<?php echo url('admin/partners.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">New</a>
      <?php } ?>
    </div>

    <form method="post" enctype="multipart/form-data" class="mt-8 grid gap-5">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="id" value="<?php echo (int)($edit['id'] ?? 0); ?>">
      <input type="hidden" name="action" value="save">

      <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="text-xs font-semibold text-white/70">Name</label>
          <input name="name" required class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['name'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-white/70">Website</label>
          <input name="website" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['website'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-white/70">Sort order</label>
          <input name="sort_order" type="number" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['sort_order'] ?? 100); ?>">
        </div>
        <div class="flex items-end">
          <label class="inline-flex w-full items-center gap-3 rounded-2xl bg-white/5 px-4 py-3 text-sm ring-1 ring-white/10">
            <input type="checkbox" name="is_active" value="1" class="h-4 w-4" <?php echo ((int)($edit['is_active'] ?? 1)) === 1 ? 'checked' : ''; ?>>
            Active on website
          </label>
        </div>
        <div class="md:col-span-2">
          <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
            <div class="flex-1">
              <label class="text-xs font-semibold text-white/70">Logo path</label>
              <input name="logo" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['logo'] ?? 'assets/svg/partner-a.svg'); ?>">
            </div>
            <div class="md:w-64">
              <label class="text-xs font-semibold text-white/70">Upload logo</label>
              <input type="file" name="logo_upload" accept="image/png,image/jpeg,image/webp,image/svg+xml" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-2 text-sm text-white ring-1 ring-white/10">
            </div>
          </div>
          <div class="mt-3 text-xs text-white/50">Prefer transparent backgrounds.</div>
        </div>
      </div>

      <div class="flex items-center justify-between gap-3">
        <div class="text-xs text-white/50">Saved to MySQL.</div>
        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-emerald-300 px-6 py-2.5 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-emerald-200 active:translate-y-0"><?php echo $edit ? 'Save changes' : 'Create'; ?></button>
      </div>
    </form>
  </div>

  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="text-sm font-semibold">All partners</div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-white/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white/5 text-xs text-white/60">
          <tr>
            <th class="px-4 py-3">Logo</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Active</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-zinc-950/30">
          <?php foreach ($rows as $p) { ?>
            <tr class="hover:bg-white/5">
              <td class="px-4 py-3">
                <?php if ($p['logo']) { ?>
                  <img src="<?php echo ROOT_URL . '/' . e($p['logo']); ?>" alt="" class="h-8 opacity-85">
                <?php } ?>
              </td>
              <td class="px-4 py-3">
                <a href="<?php echo url('admin/partners.php'); ?>?edit=<?php echo (int)$p['id']; ?>" class="text-white/85 transition hover:text-white"><?php echo e($p['name']); ?></a>
                <div class="text-xs text-white/50"><?php echo e($p['website']); ?></div>
              </td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo (int)$p['is_active'] === 1 ? 'bg-emerald-300/15 text-emerald-200 ring-emerald-300/20' : 'bg-white/10 text-white/60 ring-white/15'; ?>">
                  <?php echo (int)$p['is_active'] === 1 ? 'Yes' : 'No'; ?>
                </span>
              </td>
              <td class="px-4 py-3 text-right">
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$p['id']; ?>">
                  <button type="submit" class="rounded-xl bg-rose-300/15 px-3 py-2 text-xs font-semibold text-rose-200 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
                </form>
              </td>
            </tr>
          <?php } ?>
          <?php if (!$rows) { ?>
            <tr><td class="px-4 py-6 text-sm text-white/60" colspan="4">No partners yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
