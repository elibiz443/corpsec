<section class="w-[90%] mx-auto py-32 scroll-mt-[5.75rem]">
  <div class="grid gap-3 lg:grid-cols-3">
    <?php foreach ($posts as $p) { ?>
      <a data-reveal href="<?php echo url('post.php'); ?>?slug=<?php echo e($p['slug']); ?>" class="group overflow-hidden rounded-3xl bg-gradient-to-br from-white via-white to-sky-50/40 ring-1 ring-black/10 transition hover:-translate-y-0.5 hover:bg-sky-50 shadow-xl shadow-zinc-600">
        <div class="relative h-44 overflow-hidden">
          <img src="<?php echo url(e($p['cover'])); ?>" alt="" class="absolute inset-0 h-full w-full object-cover opacity-90">
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 via-zinc-950/10 to-transparent"></div>
        </div>
        <div class="p-6">
          <div class="text-sm xl:text-lg font-semibold leading-snug"><?php echo e($p['title']); ?></div>
          <div class="mt-2 text-xs xl:text-sm leading-relaxed text-zinc-500"><?php echo e($p['excerpt']); ?></div>
          <div class="mt-4 text-xs xl:text-sm font-semibold text-zinc-600">Read</div>
        </div>
      </a>
    <?php } ?>
  </div>

  <?php if ($pages > 1) { ?>
    <div class="mt-10 flex items-center justify-center gap-2">
      <?php for ($i = 1; $i <= $pages; $i++) { ?>
        <a href="<?php echo url('blog.php'); ?>?page=<?php echo $i; ?>" class="inline-flex h-10 w-10 items-center justify-center rounded-xl ring-1 ring-black/10 transition <?php echo $i === $page ? 'bg-sky-500 text-white' : 'bg-sky-50 text-sky-700 hover:bg-sky-100 ring-sky-200/60'; ?>"><?php echo $i; ?></a>
      <?php } ?>
    </div>
  <?php } ?>
</section>
