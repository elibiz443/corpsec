<section class="w-[90%] mx-auto pb-14 scroll-mt-[5.75rem]">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700 ring-1 ring-orange-200/60">
        <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
        Testimonials
      </div>
      <h2 class="mt-4 font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-4xl">Professional output. Real confidence.</h2>
      <p class="mt-3 max-w-2xl text-sm leading-relaxed text-zinc-600">We build trust by being disciplined, discreet, and consistent.</p>
    </div>
  </div>

  <div class="mt-7 grid gap-3 md:grid-cols-3">
    <?php foreach ($testimonials as $t) { ?>
      <div data-reveal class="rounded-[2.25rem] bg-gradient-to-br from-white via-white to-indigo-50/40 p-7 ring-1 ring-black/10">
        <div class="flex items-center justify-between gap-3">
          <div>
            <div class="text-sm font-semibold"><?php echo e($t['name']); ?></div>
            <div class="mt-1 text-xs text-zinc-500"><?php echo e($t['org_title']); ?></div>
          </div>
          <div class="flex items-center gap-1 text-orange-500">
            <?php for ($i=0; $i<5; $i++) { ?>
              <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M12 17.27l-5.18 3.05 1.64-5.81L3 9.24l6-.5L12 3l3 5.74 6 .5-5.46 5.27 1.64 5.81z"/></svg>
            <?php } ?>
          </div>
        </div>
        <p class="mt-5 text-sm leading-relaxed text-zinc-700">“<?php echo e($t['quote_text']); ?>”</p>
      </div>
    <?php } ?>
  </div>
</section>
