<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Services';
$active = 'services';

$iconChoices = [
  'assets/svg/icon-eye.svg',
  'assets/svg/icon-shield.svg',
  'assets/svg/icon-briefcase.svg',
  'assets/svg/icon-check.svg',
  'assets/svg/icon-radar.svg',
  'assets/svg/icon-id.svg',
  'assets/svg/icon-file.svg',
  'assets/svg/icon-tower.svg',
  'assets/svg/icon-car.svg',
  'assets/svg/icon-user.svg',
  'assets/svg/icon-ticket.svg',
  'assets/svg/icon-door.svg',
  'assets/svg/icon-bolt.svg'
];

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/services');
  }

  $action = $_POST['action'] ?? 'save';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete') {
    if ($id > 0) {
      db_exec($pdo, 'DELETE FROM services WHERE id = ?', [$id]);
      flash_set('success', 'Service deleted.');
    }
    redirect_to(ROOT_URL . '/admin/services');
  }

  $category = trim((string)($_POST['category'] ?? ''));
  $title = trim((string)($_POST['title'] ?? ''));
  $short = trim((string)($_POST['short_desc'] ?? ''));
  $body = trim((string)($_POST['body'] ?? ''));
  $icon = trim((string)($_POST['icon'] ?? ''));
  $sort = (int)($_POST['sort_order'] ?? 100);
  $isActive = isset($_POST['is_active']) ? 1 : 0;

  $uploaded = upload_image('icon_upload', ROOT_PATH . '/uploads');
  if ($uploaded) {
    $icon = 'uploads/' . $uploaded;
    db_exec($pdo, 'INSERT INTO media (file_name, alt_text) VALUES (?, ?)', [$uploaded, $title]);
  }

  if ($category === '' || $title === '' || $short === '' || $body === '') {
    flash_set('error', 'Fill in category, title, short description, and body.');
    redirect_to(ROOT_URL . '/admin/services' . ($id ? '?edit=' . $id : ''));
  }

  if ($id > 0) {
    db_exec($pdo, 'UPDATE services SET category = ?, title = ?, short_desc = ?, body = ?, icon = ?, sort_order = ?, is_active = ? WHERE id = ?', [$category, $title, $short, $body, $icon, $sort, $isActive, $id]);
    flash_set('success', 'Service updated.');
    redirect_to(ROOT_URL . '/admin/services?edit=' . $id);
  }

  db_exec($pdo, 'INSERT INTO services (category, title, short_desc, body, icon, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)', [$category, $title, $short, $body, $icon, $sort, $isActive]);
  flash_set('success', 'Service created.');
  redirect_to(ROOT_URL . '/admin/services');
}

$services = db_all($pdo, 'SELECT * FROM services ORDER BY category, sort_order, title');
$edit = $editId ? db_one($pdo, 'SELECT * FROM services WHERE id = ? LIMIT 1', [$editId]) : null;

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
          Services
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl"><?php echo $edit ? 'Edit service' : 'Create service'; ?></h1>
        <p class="mt-3 text-sm text-zinc-600">Services populate the website sections automatically.</p>
      </div>
      <?php if ($edit) { ?>
        <a href="<?php echo url('admin/services.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">New service</a>
      <?php } ?>
    </div>

    <form method="post" enctype="multipart/form-data" class="mt-8 grid gap-5">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="id" value="<?php echo (int)($edit['id'] ?? 0); ?>">
      <input type="hidden" name="action" value="save">

      <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="text-xs font-semibold text-zinc-600">Category</label>
          <select name="category" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300">
            <?php $cat = $edit['category'] ?? 'Investigation'; ?>
            <option class="bg-white" value="Investigation" <?php echo $cat === 'Investigation' ? 'selected' : ''; ?>>Investigation</option>
            <option class="bg-white" value="Guarding" <?php echo $cat === 'Guarding' ? 'selected' : ''; ?>>Guarding</option>
          </select>
        </div>
        <div>
          <label class="text-xs font-semibold text-zinc-600">Sort order</label>
          <input name="sort_order" type="number" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['sort_order'] ?? 100); ?>">
        </div>
        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-zinc-600">Title</label>
          <input name="title" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['title'] ?? ''); ?>">
        </div>
        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-zinc-600">Short description</label>
          <input name="short_desc" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['short_desc'] ?? ''); ?>">
        </div>
        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-zinc-600">Body</label>
          <textarea name="body" rows="5" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300"><?php echo e($edit['body'] ?? ''); ?></textarea>
        </div>
        <div class="md:col-span-2">
          <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
            <div class="flex-1">
              <label class="text-xs font-semibold text-zinc-600">Icon path</label>
              <input name="icon" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" value="<?php echo e($edit['icon'] ?? 'assets/svg/icon-eye.svg'); ?>">
              <div class="mt-2 text-xs text-zinc-500">Use a built-in SVG or upload a PNG/WebP with transparent background.</div>
            </div>
            <div class="md:w-64">
              <label class="text-xs font-semibold text-zinc-600">Upload icon</label>
              <input type="file" name="icon_upload" accept="image/png,image/jpeg,image/webp" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-2 text-sm text-zinc-900 ring-1 ring-black/10">
            </div>
          </div>

          <div class="mt-4 grid gap-2 md:grid-cols-4">
            <?php foreach ($iconChoices as $ic) { ?>
              <button type="button" data-pick-icon="<?php echo e($ic); ?>" class="flex items-center gap-3 rounded-2xl bg-white px-4 py-3 text-left text-xs text-zinc-600 ring-1 ring-black/10 transition hover:bg-zinc-50">
                <img src="<?php echo ROOT_URL . '/' . e($ic); ?>" alt="" class="h-6 w-6 opacity-90">
                <?php echo e(basename($ic)); ?>
              </button>
            <?php } ?>
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
        <div class="text-sm font-semibold">All services</div>
        <div class="mt-1 text-xs text-zinc-500"><?php echo count($services); ?> total</div>
      </div>
      <a href="<?php echo url('services.php'); ?>" class="text-sm font-semibold text-sky-700 transition hover:text-indigo-700">View on site</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-black/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white text-xs text-zinc-500">
          <tr>
            <th class="px-4 py-3">Category</th>
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Active</th>
            <th class="px-4 py-3">Order</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-white/30">
          <?php foreach ($services as $s) { ?>
            <tr class="hover:bg-white">
              <td class="px-4 py-3 text-xs text-zinc-500"><?php echo e($s['category']); ?></td>
              <td class="px-4 py-3">
                <a href="<?php echo url('admin/services.php'); ?>?edit=<?php echo (int)$s['id']; ?>" class="text-zinc-800 transition hover:text-indigo-700"><?php echo e($s['title']); ?></a>
              </td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo (int)$s['is_active'] === 1 ? 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20' : 'bg-zinc-50 text-zinc-500 ring-black/10'; ?>">
                  <?php echo (int)$s['is_active'] === 1 ? 'Yes' : 'No'; ?>
                </span>
              </td>
              <td class="px-4 py-3 text-xs text-zinc-500"><?php echo (int)$s['sort_order']; ?></td>
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
          <?php if (!$services) { ?>
            <tr><td class="px-4 py-6 text-sm text-zinc-500" colspan="5">No services yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('[data-pick-icon]').forEach(b => {
    b.addEventListener('click', () => {
      const val = b.getAttribute('data-pick-icon')
      const input = document.querySelector('input[name="icon"]')
      if (input && val) input.value = val
    })
  })
</script>
<?php require __DIR__ . '/includes/foot.php'; ?>
