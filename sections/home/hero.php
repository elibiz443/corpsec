<section class="relative">
  <div class="w-[90%] mx-auto pb-12 pt-12 lg:pb-16">
    <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
      <div class="lg:col-span-7 lg:pt-16">
        <div class="flex flex-wrap items-center gap-2">
          <span class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs font-semibold text-white/70 ring-1 ring-white/10">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
            <?php echo e(setting('hero_kicker', '')); ?>
          </span>
          <span class="inline-flex items-center gap-2 rounded-full bg-emerald-300/10 px-3 py-1 text-xs font-semibold text-emerald-200 ring-1 ring-emerald-300/20">
            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
            Confidential intake
          </span>
          <span class="inline-flex items-center gap-2 rounded-full bg-white/0 px-3 py-1 text-xs font-semibold text-white/60 ring-1 ring-white/10">
            Rapid response
          </span>
        </div>

        <h1 class="mt-6 font-display font-semibold leading-[1.05] tracking-tight">
          <span class="text-3xl md:text-6xl">Confidential investigations.</span>
          <span class="text-2xl md:text-3xl mt-3 block bg-gradient-to-r from-brand-200 via-cyan-200 to-white bg-clip-text text-transparent">
            Elite guarding for modern risk.
          </span>
        </h1>

        <p class="mt-5 max-w-2xl text-base leading-relaxed text-white/70 md:text-lg">
          <?php echo e(setting('hero_subtitle', '')); ?>
        </p>

        <div class="mt-7 flex flex-wrap gap-2">
          <span class="inline-flex items-center rounded-full bg-zinc-950/40 px-4 py-2 text-sm font-semibold text-white/80 ring-1 ring-white/10">Due diligence</span>
          <span class="inline-flex items-center rounded-full bg-zinc-950/40 px-4 py-2 text-sm font-semibold text-white/80 ring-1 ring-white/10">Surveillance</span>
          <span class="inline-flex items-center rounded-full bg-zinc-950/40 px-4 py-2 text-sm font-semibold text-white/80 ring-1 ring-white/10">VIP escort</span>
          <span class="inline-flex items-center rounded-full bg-zinc-950/40 px-4 py-2 text-sm font-semibold text-white/80 ring-1 ring-white/10">Mobile patrol</span>
        </div>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
          <button type="button" data-open-request class="cursor-pointer inline-flex items-center justify-center rounded-full bg-brand-300 px-6 py-3 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-brand-200 active:translate-y-0">Start request</button>
          <a href="#explorer" class="inline-flex items-center justify-center rounded-full bg-white/5 px-6 py-3 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">Explore capabilities</a>
          <a href="<?php echo url('contact'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/0 px-6 py-3 text-sm font-semibold text-white/70 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/5 hover:text-white active:translate-y-0">Talk to a lead</a>
        </div>
      </div>

      <div class="lg:col-span-5">
        <div class="relative mx-auto max-w-lg">
          <div class="absolute -inset-6 rounded-[2.5rem] bg-white/5 blur-2xl"></div>
          <div class="relative overflow-hidden rounded-[2.5rem] bg-white/5 ring-1 ring-white/10">
            <div class="relative h-[30rem] md:h-[34rem]">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-a.svg" alt="" class="absolute -right-8 top-10 w-[22rem] rotate-6 opacity-80 ring-1 ring-white/10 md:w-[26rem]" data-parallax data-speed="0.22">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-b.svg" alt="" class="absolute -left-8 top-28 w-[20rem] -rotate-6 opacity-70 ring-1 ring-white/10 md:w-[24rem]" data-parallax data-speed="0.16" data-base="12">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-c.svg" alt="" class="absolute left-1/2 top-6 w-[18rem] -translate-x-1/2 rotate-3 opacity-60 ring-1 ring-white/10 md:w-[22rem]" data-parallax data-speed="0.18" data-base="-8">

              <div class="absolute inset-0 bg-gradient-to-b from-zinc-950/0 via-zinc-950/25 to-zinc-950/80"></div>

              <img src="<?php echo ROOT_URL; ?>/assets/images/guard.webp" alt="" class="relative z-10 w-[80%] h-auto mx-auto pt-5">

              <div class="absolute z-20 bottom-0 left-0 right-0 p-6">
                <div class="rounded-2xl bg-zinc-950/70 p-5 ring-1 ring-white/10 backdrop-blur">
                  <div class="flex items-center justify-between gap-3">
                    <div>
                      <div class="text-sm font-semibold">Operational readiness</div>
                      <div class="mt-1 text-xs text-white/60">Intake → deploy → document → resolve</div>
                    </div>
                    <span class="inline-flex gap-1 items-center rounded-full bg-emerald-300/15 px-3 py-1 text-xs font-semibold text-emerald-200 ring-1 ring-emerald-300/20">
                      <span class="relative flex h-1.5 w-1.5">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75 animate-ping"></span>
                        <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                      </span>
                      Active
                    </span>
                  </div>

                  <div class="mt-4 grid grid-cols-3 gap-2">
                    <div class="rounded-xl bg-white/5 p-3 ring-1 ring-white/10">
                      <div class="text-[11px] text-white/60">Focus</div>
                      <div class="mt-1 text-xs font-semibold">Risk</div>
                    </div>
                    <div class="rounded-xl bg-white/5 p-3 ring-1 ring-white/10">
                      <div class="text-[11px] text-white/60">Evidence</div>
                      <div class="mt-1 text-xs font-semibold">Logs</div>
                    </div>
                    <div class="rounded-xl bg-white/5 p-3 ring-1 ring-white/10">
                      <div class="text-[11px] text-white/60">Response</div>
                      <div class="mt-1 text-xs font-semibold">24/7</div>
                    </div>
                  </div>

                  <a href="<?php echo ROOT_URL; ?>/services" class="cursor-pointer mt-4 inline-flex w-full items-center justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-white/90 active:translate-y-0">
                    View Our Services
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
