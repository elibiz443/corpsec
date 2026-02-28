<section class="mx-auto max-w-6xl px-5 pb-10 pt-14 md:pb-14 md:pt-20 scroll-mt-[5.75rem]">
  <div class="grid gap-8 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-6">
      <div class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700 ring-1 ring-sky-200/60">
        <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
        About Corpsec
      </div>
      <h1 class="mt-6 font-['Sora',ui-sans-serif,system-ui] text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl">A security partner built for sensitive work.</h1>
      <p class="mt-4 text-base leading-relaxed text-zinc-600">We provide confidential investigative services and disciplined guarding with a focus on integrity, client objectives, and evidence quality. Every engagement is scoped, documented, and delivered with professionalism.</p>
      <div class="mt-7 grid gap-3 sm:grid-cols-2">
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-sky-50 via-white to-white p-6 ring-1 ring-sky-200/40">
          <div class="text-xs font-semibold text-zinc-500">Mission</div>
          <div class="mt-2 text-sm text-zinc-800"><?php echo e(setting('mission', '')); ?></div>
        </div>
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-indigo-50 via-white to-white p-6 ring-1 ring-indigo-200/40">
          <div class="text-xs font-semibold text-zinc-500">Vision</div>
          <div class="mt-2 text-sm text-zinc-800"><?php echo e(setting('vision', '')); ?></div>
        </div>
      </div>
    </div>
    <div class="md:col-span-6">
      <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-white via-white to-orange-50/30 ring-1 ring-black/10">
        <div class="p-8 md:p-10">
          <div class="flex items-center gap-3">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-white ring-1 ring-black/10">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/icon-shield.svg" alt="" class="h-7 w-7 opacity-85">
            </div>
            <div>
              <div class="text-sm font-semibold">How we work</div>
              <div class="mt-1 text-xs text-zinc-500">A structured engagement model</div>
            </div>
          </div>
          <div class="mt-6 grid gap-3">
            <div data-reveal class="rounded-3xl bg-sky-50 p-6 ring-1 ring-sky-200/60">
              <div class="text-sm font-semibold">01. Intake</div>
              <div class="mt-2 text-sm text-zinc-600">We capture objectives, constraints, and urgency through a confidential request.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-indigo-50 p-6 ring-1 ring-indigo-200/60">
              <div class="text-sm font-semibold">02. Scope</div>
              <div class="mt-2 text-sm text-zinc-600">We define deliverables, reporting cadence, escalation paths, and timelines.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-orange-50 p-6 ring-1 ring-orange-200/60">
              <div class="text-sm font-semibold">03. Execute</div>
              <div class="mt-2 text-sm text-zinc-600">Field work and supervision with disciplined documentation and evidence handling.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-sky-50 p-6 ring-1 ring-sky-200/60">
              <div class="text-sm font-semibold">04. Report</div>
              <div class="mt-2 text-sm text-zinc-600">Clear findings and recommendations for operations, HR, legal, or security leadership.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
