<section class="w-[90%] mx-auto pb-10 pt-14 md:pb-14 md:pt-20 scroll-mt-[5.75rem]">
  <div class="grid gap-10 lg:grid-cols-12">
    <div class="lg:col-span-7">
      <nav class="flex items-center gap-2 mb-4 text-[12px] font-bold uppercase tracking-[0.2em] text-zinc-400">
        <a href="<?php echo ROOT_URL; ?>" class="hover:text-sky-600 transition-colors">Home</a>
        <svg class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
        <span class="text-zinc-600">Guarding Services</span>
      </nav>

      <div class="inline-flex items-center gap-2 rounded-full bg-orange-50 px-3 py-1 text-xs xl:text-sm font-semibold text-orange-700 ring-1 ring-orange-200/60">
        <span class="h-1.5 w-1.5 xl:h-2.5 xl:w-2.5 rounded-full bg-orange-700"></span>
        Guarding
      </div>

      <h1 class="mt-4 font-['Sora',ui-sans-serif,system-ui] text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl xl:text-6xl">
        Disciplined presence. Calm response. Clean reporting.
      </h1>
      <p class="mt-4 text-base leading-relaxed text-zinc-600 text-md xl:text-lg">
        We deliver professional guarding teams supported by supervision, post orders, incident logging, and escalation discipline. Designed to protect without disruption.
      </p>
      <div class="mt-4 flex flex-col gap-3 sm:flex-row text-sm xl:text-lg">
        <button type="button" data-open-request class="inline-flex items-center justify-center rounded-full bg-orange-500 px-5 py-2.5 font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Request guarding</button>
        <a href="<?php echo url('services.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-5 py-2.5 font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">All services</a>
      </div>
      <div class="mt-6 grid grid-cols-2 gap-3">
        <div data-reveal class="rounded-2xl bg-orange-50 p-4 ring-1 ring-orange-200/60">
          <div class="text-sm xl:text-lg font-semibold">Deterrence</div>
          <div class="mt-1 text-xs xl:text-md text-zinc-500">Visible presence and controlled access.</div>
        </div>
        <div data-reveal class="rounded-2xl bg-indigo-50 p-4 ring-1 ring-indigo-200/60">
          <div class="text-sm xl:text-lg font-semibold">Documentation</div>
          <div class="mt-1 text-xs xl:text-md text-zinc-500">Shift logs, incidents, and escalation notes.</div>
        </div>
      </div>
    </div>
    <div class="lg:col-span-5">
      <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-white via-white to-orange-50/40 ring-1 ring-black/10 shadow-lg shadow-zinc-600">
        <div class="relative h-[26rem] xl:h-[34rem]">
          <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-b.svg" alt="" class="absolute inset-0 h-full w-full object-cover opacity-90">
          <img src="<?php echo ROOT_URL; ?>/assets/images/guard4.webp" alt="" class="relative z-10 w-[80%] h-auto mx-auto pt-5">
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/75 via-zinc-950/20 to-transparent"></div>
          <div class="absolute z-20 bottom-0 p-7">
            <div class="rounded-2xl bg-white/85 p-5 ring-1 ring-black/10 backdrop-blur">
              <div class="text-sm xl:text-lg font-semibold">Guarding essentials</div>
              <ul class="mt-3 xl:mt-8 space-y-2 text-sm xl:text-lg text-zinc-600">
                <li class="flex items-start gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-orange-500"></span><span>Post orders and supervision</span></li>
                <li class="flex items-start gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-orange-500"></span><span>Access control discipline</span></li>
                <li class="flex items-start gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-orange-500"></span><span>Incident documentation and escalation</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
