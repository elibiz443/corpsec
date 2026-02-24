<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
admin_require_login();
$admin = admin_user($pdo);

$pageTitle = 'Posts';
$active = 'posts';

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

$ensureUniqueSlug = function(PDO $pdo, string $slug, int $ignoreId): string {
  $base = $slug;
  $n = 2;
  while (true) {
    $row = db_one($pdo, 'SELECT id FROM posts WHERE slug = ? LIMIT 1', [$slug]);
    if (!$row || (int)$row['id'] === $ignoreId) return $slug;
    $slug = $base . '-' . $n;
    $n++;
  }
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $csrf = $_POST['csrf'] ?? '';
  if (!csrf_check($csrf)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/posts');
  }

  $action = $_POST['action'] ?? 'save';
  $id = (int)($_POST['id'] ?? 0);

  if ($action === 'delete') {
    if ($id > 0) {
      db_exec($pdo, 'DELETE FROM posts WHERE id = ?', [$id]);
      flash_set('success', 'Post deleted.');
    }
    redirect_to(ROOT_URL . '/admin/posts');
  }

  $title = trim((string)($_POST['title'] ?? ''));
  $slugIn = trim((string)($_POST['slug'] ?? ''));
  $slug = $slugIn !== '' ? slugify($slugIn) : slugify($title);
  $slug = $slug !== '' ? $ensureUniqueSlug($pdo, $slug, $id) : $ensureUniqueSlug($pdo, bin2hex(random_bytes(6)), $id);

  $excerpt = trim((string)($_POST['excerpt'] ?? ''));
  $body = trim((string)($_POST['body'] ?? ''));
  $cover = trim((string)($_POST['cover'] ?? ''));
  $isPublished = isset($_POST['is_published']) ? 1 : 0;

  $uploaded = upload_image('cover_upload', ROOT_PATH . '/uploads');
  if ($uploaded) {
    $cover = 'uploads/' . $uploaded;
    db_exec($pdo, 'INSERT INTO media (file_name, alt_text) VALUES (?, ?)', [$uploaded, $title]);
  }

  if ($title === '' || $excerpt === '' || $body === '') {
    flash_set('error', 'Fill in title, excerpt, and body.');
    redirect_to(ROOT_URL . '/admin/posts' . ($id ? '?edit=' . $id : ''));
  }

  $publishedAt = null;
  if ($isPublished) {
    $existing = $id ? db_one($pdo, 'SELECT published_at FROM posts WHERE id = ? LIMIT 1', [$id]) : null;
    $publishedAt = ($existing && $existing['published_at']) ? $existing['published_at'] : date('Y-m-d H:i:s');
  }

  if ($id > 0) {
    db_exec($pdo, 'UPDATE posts SET title = ?, slug = ?, excerpt = ?, body = ?, cover = ?, is_published = ?, published_at = ? WHERE id = ?', [$title, $slug, $excerpt, $body, $cover, $isPublished, $publishedAt, $id]);
    flash_set('success', 'Post updated.');
    redirect_to(ROOT_URL . '/admin/posts?edit=' . $id);
  }

  db_exec($pdo, 'INSERT INTO posts (title, slug, excerpt, body, cover, is_published, published_at) VALUES (?, ?, ?, ?, ?, ?, ?)', [$title, $slug, $excerpt, $body, $cover, $isPublished, $publishedAt]);
  flash_set('success', 'Post created.');
  redirect_to(ROOT_URL . '/admin/posts');
}

$rows = db_all($pdo, 'SELECT * FROM posts ORDER BY created_at DESC');
$edit = $editId ? db_one($pdo, 'SELECT * FROM posts WHERE id = ? LIMIT 1', [$editId]) : null;

require __DIR__ . '/includes/head.php';
?>
<div class="grid gap-6">
  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs text-white/70 ring-1 ring-white/10">
          <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
          Posts
        </div>
        <h1 class="mt-5 font-display text-3xl font-semibold tracking-tight md:text-4xl"><?php echo $edit ? 'Edit post' : 'Create post'; ?></h1>
        <p class="mt-3 text-sm text-white/70">Posts populate the Insights section and Blog page.</p>
      </div>
      <?php if ($edit) { ?>
        <a href="<?php echo url('admin/posts.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">New</a>
      <?php } ?>
    </div>

    <form method="post" enctype="multipart/form-data" class="mt-8 grid gap-5">
      <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
      <input type="hidden" name="id" value="<?php echo (int)($edit['id'] ?? 0); ?>">
      <input type="hidden" name="action" value="save">

      <div class="grid gap-4">
        <div>
          <label class="text-xs font-semibold text-white/70">Title</label>
          <input name="title" required class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['title'] ?? ''); ?>">
        </div>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-xs font-semibold text-white/70">Slug</label>
            <input name="slug" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['slug'] ?? ''); ?>" placeholder="auto-from-title">
          </div>
          <div>
            <label class="text-xs font-semibold text-white/70">Cover path</label>
            <input name="cover" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($edit['cover'] ?? 'assets/svg/cover-a.svg'); ?>">
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-xs font-semibold text-white/70">Upload cover</label>
            <input type="file" name="cover_upload" accept="image/png,image/jpeg,image/webp" class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-2 text-sm text-white ring-1 ring-white/10">
            <div class="mt-2 text-xs text-white/50">Prefer transparent backgrounds where possible.</div>
          </div>
          <div class="flex items-end">
            <label class="inline-flex w-full items-center gap-3 rounded-2xl bg-white/5 px-4 py-3 text-sm ring-1 ring-white/10">
              <input type="checkbox" name="is_published" value="1" class="h-4 w-4" <?php echo ((int)($edit['is_published'] ?? 0)) === 1 ? 'checked' : ''; ?>>
              Published
            </label>
          </div>
        </div>

        <div>
          <label class="text-xs font-semibold text-white/70">Excerpt</label>
          <textarea name="excerpt" rows="3" required class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300"><?php echo e($edit['excerpt'] ?? ''); ?></textarea>
        </div>

        <div>
          <label class="text-xs font-semibold text-white/70">Body (HTML allowed)</label>
          <textarea name="body" rows="12" required class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 font-mono text-xs text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" spellcheck="false"><?php echo e($edit['body'] ?? ''); ?></textarea>
          <div class="mt-3 rounded-3xl bg-zinc-950/40 p-5 ring-1 ring-white/10">
            <div class="text-xs font-semibold text-white/60">Preview</div>
            <div data-rich class="mt-4 text-sm"><?php echo $edit ? $edit['body'] : ''; ?></div>
          </div>
        </div>
      </div>

      <div class="flex items-center justify-between gap-3">
        <div class="text-xs text-white/50">Saved to MySQL.</div>
        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-emerald-300 px-6 py-2.5 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-emerald-200 active:translate-y-0"><?php echo $edit ? 'Save changes' : 'Create'; ?></button>
      </div>
    </form>
  </div>

  <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <div class="text-sm font-semibold">All posts</div>
        <div class="mt-1 text-xs text-white/60"><?php echo count($rows); ?> total</div>
      </div>
      <a href="<?php echo url('blog.php'); ?>" class="text-sm font-semibold text-brand-200 transition hover:text-white">View on site</a>
    </div>

    <div class="mt-6 overflow-hidden rounded-3xl ring-1 ring-white/10">
      <table class="w-full text-left text-sm">
        <thead class="bg-white/5 text-xs text-white/60">
          <tr>
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Slug</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/10 bg-zinc-950/30">
          <?php foreach ($rows as $p) { ?>
            <tr class="hover:bg-white/5">
              <td class="px-4 py-3">
                <a href="<?php echo url('admin/posts.php'); ?>?edit=<?php echo (int)$p['id']; ?>" class="text-white/85 transition hover:text-white"><?php echo e($p['title']); ?></a>
                <div class="text-xs text-white/50"><?php echo e($p['created_at']); ?></div>
              </td>
              <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?php echo (int)$p['is_published'] === 1 ? 'bg-emerald-300/15 text-emerald-200 ring-emerald-300/20' : 'bg-white/10 text-white/60 ring-white/15'; ?>">
                  <?php echo (int)$p['is_published'] === 1 ? 'Published' : 'Draft'; ?>
                </span>
              </td>
              <td class="px-4 py-3 text-xs text-white/60"><?php echo e($p['slug']); ?></td>
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
            <tr><td class="px-4 py-6 text-sm text-white/60" colspan="4">No posts yet.</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require __DIR__ . '/includes/foot.php'; ?>
