<section class="w-[90%] mx-auto pb-20">
  <div class="mt-10 rounded-[2.75rem] bg-gradient-to-r from-brand-500/15 via-white/5 to-accent-500/10 p-8 ring-1 ring-white/10 md:p-10">
    <div class="grid gap-8 md:grid-cols-12 md:items-center">
      <div class="md:col-span-7">
        <div class="text-sm font-semibold">Ready?</div>
        <h3 class="mt-3 font-display text-2xl font-semibold tracking-tight md:text-3xl"><?php echo e(setting('cta_title', '')); ?></h3>
        <p class="mt-3 text-sm leading-relaxed text-white/70"><?php echo e(setting('cta_subtitle', '')); ?></p>
        <div class="mt-6 flex flex-wrap gap-3">
          <button type="button" data-open-request class="cursor-pointer inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-white/90 active:translate-y-0">Start request</button>
          <a href="<?php echo url('contact'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-6 py-3 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">Contact</a>
        </div>
      </div>
      <div class="md:col-span-5">
        <div class="grid gap-3">
          <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
            <div class="flex items-center justify-between gap-3">
              <div>
                <div class="text-sm font-semibold">Confidential by default</div>
                <div class="mt-1 text-xs text-white/60">Your request stays private and controlled.</div>
              </div>
              <span class="grid h-11 w-11 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
                <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="" class="h-7 w-7">
              </span>
            </div>
          </div>
          <div class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
            <div class="flex items-center justify-between gap-3">
              <div>
                <div class="text-sm font-semibold">Fast response</div>
                <div class="mt-1 text-xs text-white/60">We follow up quickly to confirm scope.</div>
              </div>
              <span class="inline-flex items-center rounded-full bg-emerald-300/10 px-3 py-1 text-xs font-semibold text-emerald-200 ring-1 ring-emerald-300/20">Active</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
