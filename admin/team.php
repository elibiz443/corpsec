<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Team';
$active = 'team';

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/team');
  }

  $action = $_POST['action'] ?? 'save';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete') {
    if ($id > 0) {
      db_exec($pdo, 'DELETE FROM team WHERE id = ?', [$id]);
      flash_set('success', 'Member deleted.');
    }
    redirect_to(ROOT_URL . '/admin/team');
  }

  $name = trim((string)($_POST['name'] ?? ''));
  $role = trim((string)($_POST['role_title'] ?? ''));
  $bio = trim((string)($_POST['bio'] ?? ''));
  $linkedin = trim((string)($_POST['linkedin'] ?? ''));
  $sort = (int)($_POST['sort_order'] ?? 100);
  $isActive = isset($_POST['is_active']) ? 1 : 0;
  $photo = trim((string)($_POST['photo'] ?? ''));

  $uploaded = upload_image('photo_upload', ROOT_PATH . '/uploads');
  if ($uploaded) {
    $photo = 'uploads/' . $uploaded;
    db_exec($pdo, 'INSERT INTO media (file_name, alt_text) VALUES (?, ?)', [$uploaded, $name]);
  }

  if ($name === '' || $role === '' || $bio === '') {
    flash_set('error', 'Fill in name, role, and bio.');
    redirect_to(ROOT_URL . '/admin/team' . ($id ? '?edit=' . $id : ''));
  }

  if ($id > 0) {
    db_exec($pdo, 'UPDATE team SET name = ?, role_title = ?, bio = ?, photo = ?, linkedin = ?, sort_order = ?, is_active = ? WHERE id = ?', [$name, $role, $bio, $photo, $linkedin, $sort, $isActive, $id]);
    flash_set('success', 'Member updated.');
    redirect_to(ROOT_URL . '/admin/team?edit=' . $id);
  }

  db_exec($pdo, 'INSERT INTO team (name, role_title, bio, photo, linkedin, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)', [$name, $role, $bio, $photo, $linkedin, $sort, $isActive]);
  flash_set('success', 'Member created.');
  redirect_to(ROOT_URL . '/admin/team');
}

$rows = db_all($pdo, 'SELECT * FROM team ORDER BY sort_order, name');
$edit = $editId ? db_one($pdo, 'SELECT * FROM team WHERE id = ? LIMIT 1', [$editId]) : null;

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
          Team
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl"><?php echo $edit ? 'Edit member' : 'Add member'; ?></h1>
        <p class="mt-3 text-sm text-zinc-600">Team cards appear on the homepage and About page.</p>
      </div>
      <?php if ($edit) { ?>
        <a href="<?php echo url('admin/team.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">New member</a>
      <?php } ?>
    </div>

    <form method="post" enctype="multipart/form-data" class="mt-8 grid gap-5">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="id" value="<?php echo (int)($edit['id'] ?? 0); ?>">
      <input type="hidden" name="action" value="save">

      <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="text-xs font-semibold text-zinc-600">Name</label>
          <input name="name" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['name'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Role title</label>
          <input name="role_title" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['role_title'] ?? ''); ?>">
        </div>
        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-zinc-600">Bio</label>
          <textarea name="bio" rows="5" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300"><?php echo e($edit['bio'] ?? ''); ?></textarea>
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">LinkedIn URL</label>
          <input name="linkedin" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['linkedin'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Sort order</label>
          <input name="sort_order" type="number" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['sort_order'] ?? 100); ?>">
        </div>
        <div class="md:col-span-2">
          <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
            <div class="flex-1">
              <label class="text-xs font-semibold text-zinc-600">Photo path</label>
              <input name="photo" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['photo'] ?? ''); ?>" placeholder="uploads/....png">
              <div class="mt-2 text-xs text-zinc-500">Use transparent PNG/WebP if possible.</div>
            </div>
            <div class="md:w-64">
              <label class="text-xs font-semibold text-zinc-600">Upload photo</label>
              <input type="file" name="photo_upload" accept="image/png,image/jpeg,image/webp" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-2 text-sm text-zinc-900 ring-1 ring-black/10">
            </div>
          </div>
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
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">All members</div>
        <div class="mt-1 text-xs text-zinc-500"><?php echo count($rows); ?> total</div>
      </div>
      <a href="<?php echo url('about.php'); ?>" class="text-sm font-semibold text-sky-700 transition hover:text-indigo-700">View on site</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-black/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white text-xs text-zinc-500">
          <tr>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Role</th>
            <th class="px-4 py-3">Active</th>
            <th class="px-4 py-3">Order</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-white/30">
          <?php foreach ($rows as $r) { ?>
            <tr class="hover:bg-white">
              <td class="px-4 py-3">
                <a href="<?php echo url('admin/team.php'); ?>?edit=<?php echo (int)$r['id']; ?>" class="text-zinc-800 transition hover:text-indigo-700"><?php echo e($r['name']); ?></a>
              </td>
              <td class="px-4 py-3 text-xs text-zinc-500"><?php echo e($r['role_title']); ?></td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo (int)$r['is_active'] === 1 ? 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20' : 'bg-zinc-50 text-zinc-500 ring-black/10'; ?>">
                  <?php echo (int)$r['is_active'] === 1 ? 'Yes' : 'No'; ?>
                </span>
              </td>
              <td class="px-4 py-3 text-xs text-zinc-500"><?php echo (int)$r['sort_order']; ?></td>
              <td class="px-4 py-3 text-right">
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$r['id']; ?>">
                  <button type="submit" class="rounded-xl bg-rose-300/15 px-3 py-2 text-xs font-semibold text-rose-700 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
                </form>
              </td>
            </tr>
          <?php } ?>
          <?php if (!$rows) { ?>
            <tr><td class="px-4 py-6 text-sm text-zinc-500" colspan="5">No team members yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
