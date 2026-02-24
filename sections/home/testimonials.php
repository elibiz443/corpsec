<section class="w-[90%] mx-auto pb-14">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs font-semibold text-white/70 ring-1 ring-white/10">
        <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
        Testimonials
      </div>
      <h2 class="mt-4 font-display text-2xl font-semibold tracking-tight md:text-4xl">Professional output. Real confidence.</h2>
      <p class="mt-3 max-w-2xl text-sm leading-relaxed text-white/70">We build trust by being disciplined, discreet, and consistent.</p>
    </div>
  </div>

  <div class="mt-7 grid gap-3 md:grid-cols-3">
    <?php foreach ($testimonials as $t) { ?>
      <div data-reveal class="rounded-[2.25rem] bg-white/5 p-7 ring-1 ring-white/10">
        <div class="flex items-center justify-between gap-3">
          <div>
            <div class="text-sm font-semibold"><?php echo e($t['name']); ?></div>
            <div class="mt-1 text-xs text-white/60"><?php echo e($t['org_title']); ?></div>
          </div>
          <div class="flex items-center gap-1 text-amber-200">
            <?php for ($i=0; $i<5; $i++) { ?>
              <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M12 17.27l-5.18 3.05 1.64-5.81L3 9.24l6-.5L12 3l3 5.74 6 .5-5.46 5.27 1.64 5.81z"/></svg>
            <?php } ?>
          </div>
        </div>
        <p class="mt-5 text-sm leading-relaxed text-white/80">“<?php echo e($t['quote_text']); ?>”</p>
      </div>
    <?php } ?>
  </div>
</section>
