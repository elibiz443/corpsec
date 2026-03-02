<section class="relative scroll-mt-[5.75rem]">
  <div class="w-[90%] mx-auto pb-12 pt-12 lg:pb-16">
    <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
      <div class="lg:col-span-7 lg:pt-16">
        <div class="flex flex-wrap items-center gap-2">
          <span class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs xl:text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60">
            <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
            <?php echo e(setting('hero_kicker', '')); ?>
          </span>

          <span class="inline-flex items-center gap-2 rounded-full bg-orange-50 px-3 py-1 text-xs xl:text-sm font-semibold text-orange-700 ring-1 ring-orange-200/60">
            <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
            Confidential intake
          </span>
        </div>

        <h1 class="mt-6 font-['Sora',ui-sans-serif,system-ui] font-semibold leading-[1.05] tracking-tight">
          <span class="text-3xl text-zinc-900 md:text-6xl xl:text-7xl">Confidential investigations.</span>
          <span class="mt-3 block bg-gradient-to-r from-sky-600 via-indigo-600 to-orange-600 bg-clip-text text-transparent text-2xl md:text-3xl xl:text-4xl">
            Elite guarding for modern risk.
          </span>
        </h1>

        <p class="mt-5 max-w-2xl text-base leading-relaxed text-zinc-600 md:text-lg xl:text-xl">
          <?php echo e(setting('hero_subtitle', '')); ?>
        </p>

        <div class="mt-7 flex flex-wrap gap-2 text-sm xl:text-md">
          <span class="inline-flex items-center rounded-full bg-sky-500/10 px-4 py-2 font-semibold text-sky-700 ring-1 ring-sky-200/60">Due diligence</span>
          <span class="inline-flex items-center rounded-full bg-indigo-500/10 px-4 py-2 font-semibold text-indigo-700 ring-1 ring-indigo-200/60">Surveillance</span>
          <span class="inline-flex items-center rounded-full bg-orange-500/10 px-4 py-2 font-semibold text-orange-700 ring-1 ring-orange-200/60">VIP escort</span>
          <span class="inline-flex items-center rounded-full bg-sky-500/10 px-4 py-2 font-semibold text-sky-700 ring-1 ring-sky-200/60">Mobile patrol</span>
        </div>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center text-sm xl:text-md">
          <button
            type="button"
            data-open-request
            class="cursor-pointer inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0"
          >
            Start request
          </button>

          <a
            href="#explorer"
            class="inline-flex items-center justify-center rounded-full bg-sky-50 px-6 py-3 font-semibold text-sky-700 ring-1 ring-sky-200/60 transition hover:-translate-y-0.5 hover:bg-sky-100 active:translate-y-0"
          >
            Explore capabilities
          </a>

          <a
            href="<?php echo url('contact'); ?>"
            class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-6 py-3 font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:-translate-y-0.5 hover:bg-indigo-100 active:translate-y-0"
          >
            Talk to a lead
          </a>
        </div>
      </div>

      <div class="lg:col-span-5">
        <div class="relative mx-auto max-w-lg">
          <div class="absolute -inset-6 rounded-[2.5rem] bg-gradient-to-br from-sky-500/15 via-indigo-500/10 to-orange-500/15 blur-2xl"></div>

          <div class="relative overflow-hidden rounded-[2.5rem] bg-white ring-1 ring-black/10">
            <div class="relative h-[30rem] md:h-[34rem]">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-a.svg" alt="" class="absolute -right-8 top-10 w-[22rem] rotate-6 opacity-80 ring-1 ring-sky-300/20 md:w-[26rem]" data-parallax data-speed="0.22">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-b.svg" alt="" class="absolute -left-8 top-28 w-[20rem] -rotate-6 opacity-70 ring-1 ring-indigo-300/20 md:w-[24rem]" data-parallax data-speed="0.16" data-base="12">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-c.svg" alt="" class="absolute left-1/2 top-6 w-[18rem] -translate-x-1/2 rotate-3 opacity-60 ring-1 ring-orange-300/20 md:w-[22rem]" data-parallax data-speed="0.18" data-base="-8">

              <div class="absolute inset-0 bg-gradient-to-b from-transparent via-indigo-200/25 to-white/95"></div>

              <img src="<?php echo ROOT_URL; ?>/assets/images/guard.webp" alt="" class="relative z-10 mx-auto h-auto w-[80%] pt-5">

              <div class="absolute bottom-0 left-0 right-0 z-20 p-6">
                <div class="rounded-2xl bg-white/85 p-5 ring-1 ring-black/10 backdrop-blur">
                  <div class="flex items-center justify-between gap-3">
                    <div>
                      <div class="text-sm xl:text-md font-semibold text-zinc-900">Operational readiness</div>
                      <div class="mt-1 text-xs xl:text-sm text-zinc-500">Intake → deploy → document → resolve</div>
                    </div>

                    <span class="inline-flex items-center gap-1 rounded-full bg-sky-50 px-3 py-1 text-xs xl:text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60">
                      <span class="relative flex h-1.5 w-1.5">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75 animate-ping"></span>
                        <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                      </span>
                      Active
                    </span>
                  </div>

                  <div class="mt-4 grid grid-cols-3 gap-2 text-xs xl:text-sm">
                    <div class="rounded-xl bg-sky-500/10 p-3 ring-1 ring-sky-200/60">
                      <div class="text-sky-700/70">Focus</div>
                      <div class="mt-1 font-semibold text-zinc-900">Risk</div>
                    </div>

                    <div class="rounded-xl bg-indigo-500/10 p-3 ring-1 ring-indigo-200/60">
                      <div class="text-indigo-700/70">Evidence</div>
                      <div class="mt-1 font-semibold text-zinc-900">Logs</div>
                    </div>

                    <div class="rounded-xl bg-orange-500/10 p-3 ring-1 ring-orange-200/60">
                      <div class="text-orange-700/70">Response</div>
                      <div class="mt-1 font-semibold text-zinc-900">24/7</div>
                    </div>
                  </div>

                  <a href="<?php echo ROOT_URL; ?>/services" class="cursor-pointer mt-4 inline-flex w-full items-center justify-center rounded-xl bg-indigo-500 px-4 py-2.5 text-sm xl:text-md font-semibold text-white transition hover:-translate-y-0.5 hover:bg-indigo-600 active:translate-y-0">
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
