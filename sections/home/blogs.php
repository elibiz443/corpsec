<section class="w-[90%] mx-auto pb-20 scroll-mt-[5.75rem]">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700 ring-1 ring-sky-200/60">
        <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
        Insights
      </div>
      <h2 class="mt-4 font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-4xl">Field notes & guidance.</h2>
      <p class="mt-3 max-w-2xl text-sm leading-relaxed text-zinc-600">Short reads on investigations, guarding, and reducing operational risk.</p>
    </div>
    <a href="<?php echo url('blog.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-5 py-2.5 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">View all</a>
  </div>

  <div class="mt-6 grid gap-3 md:grid-cols-3">
    <?php foreach ($posts as $p) { ?>
      <a data-reveal href="<?php echo url('post.php'); ?>?slug=<?php echo e($p['slug']); ?>" class="group overflow-hidden rounded-3xl bg-gradient-to-br from-white via-white to-orange-50/40 ring-1 ring-black/10 transition hover:-translate-y-0.5 hover:bg-orange-50">
        <div class="relative h-40 overflow-hidden">
          <img src="<?php echo ROOT_URL . '/' . e($p['cover']); ?>" alt="" class="absolute inset-0 h-full w-full object-cover opacity-85">
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 via-zinc-950/10 to-transparent"></div>
        </div>
        <div class="p-6">
          <div class="text-sm font-semibold leading-snug group-hover:text-indigo-700"><?php echo e($p['title']); ?></div>
          <div class="mt-2 text-xs leading-relaxed text-zinc-500"><?php echo e($p['excerpt']); ?></div>
          <div class="mt-4 inline-flex items-center gap-2 text-xs font-semibold text-zinc-600">
            Read
            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14" /><path d="M13 6l6 6-6 6" /></svg>
          </div>
        </div>
      </a>
    <?php } ?>
  </div>
</section>
