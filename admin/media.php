<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Media';
$active = 'media';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/media');
  }

  $action = $_POST['action'] ?? '';

  if ($action === 'upload') {
    $alt = trim((string)($_POST['alt_text'] ?? ''));
    $uploaded = upload_image('file', ROOT_PATH . '/uploads');
    if (!$uploaded) {
      flash_set('error', 'Upload failed. Use PNG/JPG/WebP.');
      redirect_to(ROOT_URL . '/admin/media');
    }
    db_exec($pdo, 'INSERT INTO media (file_name, alt_text) VALUES (?, ?)', [$uploaded, $alt]);
    flash_set('success', 'File uploaded.');
    redirect_to(ROOT_URL . '/admin/media');
  }

  if ($action === 'update') {
    $id = (int)($_POST['id'] ?? 0);
    $alt = trim((string)($_POST['alt_text'] ?? ''));
    if ($id > 0) {
      db_exec($pdo, 'UPDATE media SET alt_text = ? WHERE id = ?', [$alt, $id]);
      flash_set('success', 'Alt text saved.');
    }
    redirect_to(ROOT_URL . '/admin/media');
  }

  if ($action === 'delete') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
      $row = db_one($pdo, 'SELECT file_name FROM media WHERE id = ? LIMIT 1', [$id]);
      if ($row) {
        $file = (string)$row['file_name'];
        $path = ROOT_PATH . '/uploads/' . $file;
        if (is_file($path)) @unlink($path);
      }
      db_exec($pdo, 'DELETE FROM media WHERE id = ?', [$id]);
      flash_set('success', 'Media deleted.');
    }
    redirect_to(ROOT_URL . '/admin/media');
  }

  redirect_to(ROOT_URL . '/admin/media');
}

$rows = db_all($pdo, 'SELECT * FROM media ORDER BY created_at DESC, id DESC LIMIT 200');

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs text-zinc-600 ring-1 ring-black/10">
          <span class="h-1.5 w-1.5 rounded-full bg-sky-300"></span>
          Media
        </div>
        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-3xl font-semibold tracking-tight md:text-4xl">Upload & manage assets</h1>
        <p class="mt-3 text-sm text-zinc-600">Upload transparent PNG/WebP assets for icons, team photos, covers, and more.</p>
      </div>
      <a href="<?php echo url(''); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-700 ring-1 ring-black/10 transition hover:bg-zinc-50">View website</a>
    </div>

    <form method="post" enctype="multipart/form-data" class="mt-8 grid gap-4">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="action" value="upload">
      <div class="grid gap-4 md:grid-cols-12">
        <div class="md:col-span-5">
          <label class="text-xs font-semibold text-zinc-600">Choose file</label>
          <input type="file" name="file" accept="image/png,image/jpeg,image/webp" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-2 text-sm text-zinc-900 ring-1 ring-black/10">
          <div class="mt-2 text-xs text-zinc-500">PNG/WebP recommended for transparent backgrounds.</div>
        </div>
        <div class="md:col-span-5">
          <label class="text-xs font-semibold text-zinc-600">Alt text (optional)</label>
          <input name="alt_text" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" placeholder="Example: Corpsec verified seal">
        </div>
        <div class="md:col-span-2 md:flex md:items-end">
          <button class="w-full rounded-full bg-emerald-300 px-6 py-3 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-emerald-200 active:translate-y-0">Upload</button>
        </div>
      </div>
    </form>
  </div>

  <div class="rounded-[2.5rem] bg-white p-7 ring-1 ring-black/10 md:p-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">Library</div>
        <div class="mt-1 text-xs text-zinc-500"><?php echo count($rows); ?> shown (latest 200)</div>
      </div>
      <div class="text-xs text-zinc-500">Path format: uploads/filename.png</div>
    </div>

    <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
      <?php foreach ($rows as $m) { ?>
        <?php $url = ROOT_URL . '/uploads/' . e($m['file_name']); ?>
        <div class="group overflow-hidden rounded-3xl bg-zinc-50 ring-1 ring-black/10">
          <div class="relative aspect-[16/10] bg-gradient-to-br from-white/5 to-white/0">
            <img src="<?php echo $url; ?>" alt="" class="absolute inset-0 h-full w-full object-contain p-6 opacity-95">
            <div class="absolute inset-x-0 bottom-0 flex items-center justify-between gap-2 bg-white/80 px-4 py-3 backdrop-blur">
              <div class="min-w-0">
                <div class="truncate text-xs font-semibold text-zinc-800"><?php echo e($m['file_name']); ?></div>
                <div class="mt-1 truncate text-xs text-zinc-500"><?php echo e($m['created_at']); ?></div>
              </div>
              <button type="button" data-copy="uploads/<?php echo e($m['file_name']); ?>" class="rounded-xl bg-white px-3 py-2 text-xs font-semibold text-zinc-700 ring-1 ring-black/10 transition hover:bg-zinc-50">Copy</button>
            </div>
          </div>
          <div class="p-5">
            <form method="post" id="update-<?php echo (int)$m['id']; ?>" class="grid gap-3">
              <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="id" value="<?php echo (int)$m['id']; ?>">
              <div>
                <label class="text-xs font-semibold text-zinc-500">Alt text</label>
                <input name="alt_text" value="<?php echo e($m['alt_text']); ?>" class="mt-2 w-full rounded-2xl bg-white/50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-300" placeholder="Describe the image">
              </div>
            </form>
            <div class="mt-3 flex items-center justify-between gap-2">
              <button form="update-<?php echo (int)$m['id']; ?>" class="rounded-full bg-white px-5 py-2.5 text-xs font-semibold text-zinc-950 transition hover:bg-white/90">Save</button>
              <form method="post">
                <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo (int)$m['id']; ?>">
                <button class="rounded-full bg-rose-300/15 px-5 py-2.5 text-xs font-semibold text-rose-700 ring-1 ring-rose-300/20 transition hover:bg-rose-300/20">Delete</button>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!$rows) { ?>
        <div class="rounded-3xl bg-zinc-50 p-8 text-sm text-zinc-500 ring-1 ring-black/10">No media yet. Upload your first asset above.</div>
      <?php } ?>
    </div>
  </div>
</div>

<script>
  const toast = (text) => {
    const el = document.createElement('div')
    el.className = 'fixed bottom-6 left-1/2 z-50 -translate-x-1/2 rounded-full bg-white px-5 py-2 text-sm font-semibold text-zinc-950 shadow-lg'
    el.textContent = text
    document.body.appendChild(el)
    setTimeout(() => el.remove(), 1500)
  }

  document.querySelectorAll('[data-copy]').forEach(b => {
    b.addEventListener('click', async () => {
      const v = b.getAttribute('data-copy') || ''
      try {
        await navigator.clipboard.writeText(v)
        toast('Copied')
      } catch (e) {
        const ta = document.createElement('textarea')
        ta.value = v
        document.body.appendChild(ta)
        ta.select()
        document.execCommand('copy')
        ta.remove()
        toast('Copied')
      }
    })
  })
</script>
<?php require __DIR__ . '/includes/foot.php'; ?>
