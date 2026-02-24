<?php
require __DIR__ . '/connector.php';
$pdo = $GLOBALS['pdo'];
$slug = $_GET['slug'] ?? '';
$slug = preg_replace('/[^a-zA-Z0-9\-]/', '', (string)$slug);
$post = $slug ? db_one($pdo, 'SELECT * FROM posts WHERE slug = ? AND is_published = 1 LIMIT 1', [$slug]) : null;
if (!$post) {
  http_response_code(404);
  $title = 'Not found • ' . setting('site_name', 'Corpsec');
  $description = 'Page not found.';
  require __DIR__ . '/includes/head.php';
  ?>
  <main class="mx-auto max-w-6xl px-5 pb-14 pt-14 md:pt-20">
    <div class="rounded-[2.5rem] bg-white/5 p-10 ring-1 ring-white/10">
      <h1 class="font-display text-3xl font-semibold tracking-tight">Not found</h1>
      <p class="mt-3 text-sm text-white/70">This post does not exist or is not published.</p>
      <a href="<?php echo url('blog.php'); ?>" class="mt-6 inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">Back to insights</a>
    </div>
  </main>
  <?php
  require __DIR__ . '/includes/footer.php';
  exit;
}

$title = $post['title'] . ' • ' . setting('site_name', 'Corpsec');
$description = $post['excerpt'] ?? '';
$recent = db_all($pdo, 'SELECT title, slug FROM posts WHERE is_published = 1 ORDER BY published_at DESC LIMIT 5');
require __DIR__ . '/includes/head.php';
?>
<main>
  <section class="mx-auto max-w-6xl px-5 pb-10 pt-14 md:pb-14 md:pt-20">
    <div class="grid gap-8 md:grid-cols-12 md:gap-10">
      <div class="md:col-span-8">
        <a href="<?php echo url('blog.php'); ?>" class="inline-flex items-center gap-2 text-sm text-white/70 transition hover:text-white">
          <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5" /><path d="M12 19l-7-7 7-7" /></svg>
          Insights
        </a>
        <h1 class="mt-6 font-display text-4xl font-semibold leading-[1.08] tracking-tight md:text-5xl"><?php echo e($post['title']); ?></h1>
        <p class="mt-4 text-base leading-relaxed text-white/70"><?php echo e($post['excerpt']); ?></p>
      </div>
      <div class="md:col-span-4">
        <div class="overflow-hidden rounded-[2.5rem] bg-white/5 ring-1 ring-white/10">
          <div class="relative h-40">
            <img src="<?php echo url(e($post['cover'])); ?>" alt="" class="absolute inset-0 h-full w-full object-cover opacity-90">
            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 via-zinc-950/10 to-transparent"></div>
          </div>
          <div class="p-6">
            <div class="text-xs font-semibold text-white/60">Need support?</div>
            <div class="mt-2 text-sm text-white/70">Request a consultation and we will respond quickly.</div>
            <button type="button" data-open-request class="cursor-pointer mt-4 inline-flex w-full items-center justify-center rounded-2xl bg-brand-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-brand-200 active:translate-y-0">Request consultation</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-6xl px-5 pb-14">
    <div class="grid gap-8 md:grid-cols-12 md:gap-10">
      <div class="md:col-span-8">
        <article data-rich class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
          <?php echo $post['body']; ?>
        </article>
      </div>
      <div class="md:col-span-4">
        <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10">
          <div class="text-sm font-semibold">Recent posts</div>
          <div class="mt-4 grid gap-2">
            <?php foreach ($recent as $r) { ?>
              <a class="rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white/80 ring-1 ring-white/10 transition hover:bg-white/10" href="<?php echo url('post.php'); ?>?slug=<?php echo e($r['slug']); ?>"><?php echo e($r['title']); ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
