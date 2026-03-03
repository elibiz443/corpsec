<section class="w-[90%] mx-auto pb-10 pt-14 md:pb-14 md:pt-20 scroll-mt-[5.75rem]">
  <div class="grid gap-10 lg:grid-cols-12">
    <div class="lg:col-span-7">
      <nav class="flex items-center gap-2 mb-6 text-[12px] font-bold uppercase tracking-[0.2em] text-zinc-400">
        <a href="<?php echo ROOT_URL; ?>" class="hover:text-sky-600 transition-colors">Home</a>
        <svg class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
        <a href="<?php echo ROOT_URL; ?>/services" class="hover:text-sky-600 transition-colors">Services</a>
        <svg class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
        <span class="text-zinc-600">Investigations Services</span>
      </nav>

      <div class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs xl:text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60">
        <span class="h-1.5 w-1.5 xl:h-2.5 xl:w-2.5 rounded-full bg-sky-500"></span>
        Investigations
      </div>

      <h1 class="mt-6 font-['Sora',ui-sans-serif,system-ui] text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl xl:text-6xl">Find the truth. Protect what matters.</h1>
      <p class="mt-4 text-base leading-relaxed text-zinc-600 text-md xl:text-lg">
        We run discreet investigations with disciplined documentation. From corporate misconduct and due diligence to surveillance and brand protection, our work stays confidential and evidence-led.
      </p>
      <div class="mt-7 flex flex-col gap-3 sm:flex-row">
        <button type="button" data-open-request class="inline-flex items-center justify-center rounded-full bg-sky-500 px-5 py-2.5 text-sm xl:text-md font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-600 active:translate-y-0">Request investigation</button>
        <a href="<?php echo url('services.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-5 py-2.5 text-sm xl:text-md font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">All services</a>
      </div>
      <div class="mt-10 grid grid-cols-2 gap-3">
        <div data-reveal class="rounded-2xl bg-sky-50 p-4 ring-1 ring-sky-200/60">
          <div class="text-sm xl:text-lg font-semibold">Confidential</div>
          <div class="mt-1 text-xs xl:text-md text-zinc-500">Controlled communications and case access.</div>
        </div>
        <div data-reveal class="rounded-2xl bg-indigo-50 p-4 ring-1 ring-indigo-200/60">
          <div class="text-sm xl:text-lg font-semibold">Evidence-led</div>
          <div class="mt-1 text-xs xl:text-md text-zinc-500">Timelines, logs, and structured reporting.</div>
        </div>
      </div>
    </div>
    <div class="lg:col-span-5">
      <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-white via-white to-sky-50/40 ring-1 ring-black/10 shadow-lg shadow-zinc-600">
        <div class="relative h-[22rem] xl:h-[32rem]">
          <img src="<?php echo ROOT_URL; ?>/assets/svg/cover-a.svg" alt="" class="absolute inset-0 h-full w-full object-cover opacity-90">
          <img src="<?php echo ROOT_URL; ?>/assets/images/investigation.webp" alt="" class="relative z-10 w-[80%] h-auto mx-auto pt-5">
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/75 via-zinc-950/20 to-transparent"></div>
          <div class="absolute z-20 bottom-0 p-7">
            <div class="rounded-2xl bg-white/85 p-5 ring-1 ring-black/10 backdrop-blur">
              <div class="text-sm xl:text-xl font-semibold">Typical deliverables</div>
              <ul class="mt-3 xl:mt-5 space-y-2 text-sm xl:text-lg text-zinc-600">
                <li class="flex items-start gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-sky-500"></span><span>Findings summary and recommendations</span></li>
                <li class="flex items-start gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-indigo-500"></span><span>Evidence log and incident timeline</span></li>
                <li class="flex items-start gap-2"><span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-orange-500"></span><span>Optional witness support and case file structure</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
