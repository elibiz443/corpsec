<section class="w-[90%] mx-auto pb-14" data-carousel>
  <div class="flex items-end justify-between gap-4">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs font-semibold text-white/70 ring-1 ring-white/10">
        <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
        Case briefs
      </div>
      <h2 class="mt-4 font-display text-2xl font-semibold tracking-tight md:text-4xl">Clarity in the field.</h2>
      <p class="mt-3 max-w-2xl text-sm leading-relaxed text-white/70">Examples of how we structure work: defined scope, disciplined execution, documented outcomes.</p>
    </div>
    <div class="flex items-center gap-2">
      <button type="button" data-carousel-prev class="cursor-pointer inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white/5 ring-1 ring-white/10 transition hover:bg-white/10">
        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <button type="button" data-carousel-next class="cursor-pointer inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white/5 ring-1 ring-white/10 transition hover:bg-white/10">
        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
      </button>
    </div>
  </div>

  <div class="mt-7 overflow-hidden rounded-[2.5rem] bg-white/5 ring-1 ring-white/10">
    <div class="flex transition-transform duration-500" data-carousel-track>
      <?php foreach ($caseBriefs as $c) { ?>
        <div class="min-w-full p-7 md:p-10">
          <div class="grid gap-6 md:grid-cols-12 md:items-start">
            <div class="md:col-span-5">
              <div class="inline-flex items-center rounded-full bg-zinc-950/40 px-4 py-2 text-xs font-semibold text-white/70 ring-1 ring-white/10"><?php echo e($c['tag']); ?></div>
              <h3 class="mt-5 font-display text-2xl font-semibold tracking-tight md:text-3xl"><?php echo e($c['title']); ?></h3>
              <p class="mt-3 text-sm leading-relaxed text-white/70"><?php echo e($c['outcome']); ?></p>
              <div class="mt-6 flex flex-wrap gap-2">
                <button type="button" data-open-request class="cursor-pointer inline-flex items-center justify-center rounded-full bg-brand-300 px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-brand-200">Start similar request</button>
                <a href="<?php echo url('services'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">Browse services</a>
              </div>
            </div>
            <div class="md:col-span-7">
              <div class="grid gap-3 md:grid-cols-3">
                <?php foreach ($c['bullets'] as $b) { ?>
                  <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
                    <div class="flex items-start gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-14 w-14">
                        <path d="M320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576zM438 209.7C427.3 201.9 412.3 204.3 404.5 215L285.1 379.2L233 327.1C223.6 317.7 208.4 317.7 199.1 327.1C189.8 336.5 189.7 351.7 199.1 361L271.1 433C276.1 438 282.9 440.5 289.9 440C296.9 439.5 303.3 435.9 307.4 430.2L443.3 243.2C451.1 232.5 448.7 217.5 438 209.7z"/>
                      </svg>
                      <div class="text-sm font-semibold leading-snug text-white/90"><?php echo e($b); ?></div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="mt-4 flex justify-center gap-2" data-carousel-dots>
    <?php foreach ($caseBriefs as $i => $c) { ?>
      <button type="button" data-carousel-dot="<?php echo (int)$i; ?>" class="h-2.5 w-2.5 rounded-full bg-white/20 ring-1 ring-white/10 transition"></button>
    <?php } ?>
  </div>
</section>
