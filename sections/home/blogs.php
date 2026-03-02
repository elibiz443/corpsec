<section class="w-[90%] mx-auto py-20 scroll-mt-[5.75rem]">
  <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-end">
    <div class="max-w-2xl">
      <div class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1.5 text-xs font-bold uppercase tracking-wider text-sky-700 ring-1 ring-sky-200/60">
        <span class="h-2 w-2 rounded-full bg-sky-500 shadow-[0_0_8px_rgba(14,165,233,0.5)]"></span>
        Insights
      </div>
      <h2 class="mt-4 font-['Sora',ui-sans-serif,system-ui] text-3xl font-bold tracking-tight text-zinc-900 md:text-4xl xl:text-5xl">Field notes & guidance.</h2>
      <p class="mt-4 text-base xl:text-lg leading-relaxed text-zinc-600">Short reads on investigations, guarding, and reducing operational risk.</p>
    </div>
    <a href="<?php echo url('insights'); ?>" class="group inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-bold text-indigo-700 ring-1 ring-indigo-200/60 shadow-sm transition-all hover:bg-indigo-50 hover:shadow-md active:translate-y-0">
      View all reports
      <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
      </svg>
    </a>
  </div>

  <div class="mt-10 grid gap-6 md:grid-cols-3">
    <?php foreach ($posts as $p) { ?>
      <a data-reveal href="<?php echo url('post.php'); ?>?slug=<?php echo e($p['slug']); ?>" class="group flex flex-col overflow-hidden rounded-xl bg-white ring-1 ring-black/[0.05] shadow-lg shadow-zinc-200/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:ring-orange-200/50">
        
        <div class="relative h-52 overflow-hidden">
          <img src="<?php echo ROOT_URL . '/' . e($p['cover']); ?>" alt="<?php echo e($p['title']); ?>" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-zinc-950/20 to-transparent"></div>
          
          <div class="absolute bottom-4 left-6">
            <span class="text-[10px] font-bold uppercase tracking-widest text-white/80">
              <?php echo date('M d, Y', strtotime($p['created_at'] ?? 'now')); ?>
            </span>
          </div>
        </div>

        <div class="flex flex-1 flex-col p-8">
          <h3 class="font-['Sora',ui-sans-serif,system-ui] text-lg xl:text-xl font-bold leading-tight text-zinc-900 group-hover:text-indigo-600 transition-colors">
            <?php echo e($p['title']); ?>
          </h3>
          <p class="mt-3 flex-1 text-sm xl:text-base leading-relaxed text-zinc-500 line-clamp-3">
            <?php echo e($p['excerpt']); ?>
          </p>
          
          <div class="mt-6 flex items-center justify-between border-t border-zinc-50 pt-6">
            <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-orange-600">
              Read Report
              <svg viewBox="0 0 24 24" class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14" /><path d="M13 6l6 6-6 6" />
              </svg>
            </span>
            <span class="rounded-full bg-zinc-100 px-3 py-1 text-[10px] font-bold text-zinc-500 group-hover:bg-orange-100 group-hover:text-orange-600 transition-colors">
              Operational
            </span>
          </div>
        </div>
      </a>
    <?php } ?>
  </div>
</section>