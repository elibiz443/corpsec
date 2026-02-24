<section class="mx-auto max-w-6xl px-5 pb-30">
  <div class="grid gap-3 md:grid-cols-3">
    <?php foreach ($posts as $p) { ?>
      <a data-reveal href="<?php echo url('post.php'); ?>?slug=<?php echo e($p['slug']); ?>" class="group overflow-hidden rounded-3xl bg-white/5 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10">
        <div class="relative h-44 overflow-hidden">
          <img src="<?php echo url(e($p['cover'])); ?>" alt="" class="absolute inset-0 h-full w-full object-cover opacity-90">
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 via-zinc-950/10 to-transparent"></div>
        </div>
        <div class="p-6">
          <div class="text-sm font-semibold leading-snug"><?php echo e($p['title']); ?></div>
          <div class="mt-2 text-xs leading-relaxed text-white/60"><?php echo e($p['excerpt']); ?></div>
          <div class="mt-4 text-xs font-semibold text-white/70">Read</div>
        </div>
      </a>
    <?php } ?>
  </div>

  <?php if ($pages > 1) { ?>
    <div class="mt-10 flex items-center justify-center gap-2">
      <?php for ($i = 1; $i <= $pages; $i++) { ?>
        <a href="<?php echo url('blog.php'); ?>?page=<?php echo $i; ?>" class="inline-flex h-10 w-10 items-center justify-center rounded-xl ring-1 ring-white/10 transition <?php echo $i === $page ? 'bg-white text-zinc-950' : 'bg-white/5 text-white/80 hover:bg-white/10'; ?>"><?php echo $i; ?></a>
      <?php } ?>
    </div>
  <?php } ?>
</section>
