<section class="w-[90%] mx-auto pt-14 pb-10 md:pb-14 md:pt-20 scroll-mt-[5.75rem]">
  <div class="grid gap-8 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-6">
      <nav class="flex items-center gap-2 mb-6 text-[12px] font-bold uppercase tracking-[0.2em] text-zinc-400">
        <a href="<?php echo ROOT_URL; ?>" class="hover:text-sky-600 transition-colors">Home</a>
        <svg class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
        <span class="text-zinc-600">About Corpsec</span>
      </nav>

      <div class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs xl:text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60">
        <span class="h-1.5 w-1.5 xl:h-2.5 xl:w-2.5 rounded-full bg-sky-500"></span>
        About Corpsec
      </div>
      <h1 class="mt-8 font-['Sora',ui-sans-serif,system-ui] text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl xl:text-6xl">
        A security partner built for sensitive work.
      </h1>
      <p class="mt-6 text-base leading-relaxed text-zinc-600 text-lg xl:text-xl">
        We provide confidential investigative services and disciplined guarding with a focus on integrity, client objectives, and evidence quality. Every engagement is scoped, documented, and delivered with professionalism.
      </p>
      <div class="mt-8 grid gap-3 sm:grid-cols-2">
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-sky-50 via-white to-white p-6 ring-1 ring-sky-200/40">
          <div class="text-md xl:text-lg font-semibold text-zinc-500">Mission</div>
          <div class="mt-2 text-sm xl:text-md text-zinc-800"><?php echo e(setting('mission', '')); ?></div>
        </div>
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-indigo-50 via-white to-white p-6 ring-1 ring-indigo-200/40">
          <div class="text-md xl:text-lg font-semibold text-zinc-500">Vision</div>
          <div class="mt-2 text-sm xl:text-md text-zinc-800"><?php echo e(setting('vision', '')); ?></div>
        </div>
      </div>
    </div>
    <div class="md:col-span-6">
      <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-white via-white to-orange-50/30 ring-1 ring-black/10">
        <div class="p-8 md:p-10">
          <div class="flex items-center gap-3">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-[#353a9a] ring-1 ring-black/10">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/icon-shield.svg" alt="" class="h-7 w-7 opacity-85">
            </div>
            <div>
              <div class="text-sm xl:text-lg font-semibold">How we work</div>
              <div class="mt-1 text-xs xl:text-md text-zinc-500">A structured engagement model</div>
            </div>
          </div>
          <div class="mt-6 grid gap-4 text-sm xl:text-lg">
            <div data-reveal class="rounded-xl bg-sky-50 p-6 ring-1 ring-indigo-200/60 leading-none">
              <div class="font-semibold">01. Intake</div>
              <div class="mt-2 text-zinc-600">We capture objectives, constraints, and urgency through a confidential request.</div>
            </div>
            <div data-reveal class="rounded-xl bg-indigo-50 p-6 ring-1 ring-indigo-200/60 leading-none">
              <div class="font-semibold">02. Scope</div>
              <div class="mt-2 text-zinc-600">We define deliverables, reporting cadence, escalation paths, and timelines.</div>
            </div>
            <div data-reveal class="rounded-xl bg-orange-50 p-6 ring-1 ring-indigo-200/60 leading-none">
              <div class="font-semibold">03. Execute</div>
              <div class="mt-2 text-zinc-600">Field work and supervision with disciplined documentation and evidence handling.</div>
            </div>
            <div data-reveal class="rounded-xl bg-teal-50 p-6 ring-1 ring-indigo-200/60 leading-none">
              <div class="font-semibold">04. Report</div>
              <div class="mt-2 text-zinc-600">Clear findings and recommendations for operations, HR, legal, or security leadership.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
