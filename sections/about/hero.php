<section class="mx-auto max-w-6xl px-5 pb-10 pt-14 md:pb-14 md:pt-20">
  <div class="grid gap-8 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-6">
      <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs text-white/70 ring-1 ring-white/10">
        <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
        About Corpsec
      </div>
      <h1 class="mt-6 font-display text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl">A security partner built for sensitive work.</h1>
      <p class="mt-4 text-base leading-relaxed text-white/70">We provide confidential investigative services and disciplined guarding with a focus on integrity, client objectives, and evidence quality. Every engagement is scoped, documented, and delivered with professionalism.</p>
      <div class="mt-7 grid gap-3 sm:grid-cols-2">
        <div data-reveal class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
          <div class="text-xs font-semibold text-white/60">Mission</div>
          <div class="mt-2 text-sm text-white/85"><?php echo e(setting('mission', '')); ?></div>
        </div>
        <div data-reveal class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
          <div class="text-xs font-semibold text-white/60">Vision</div>
          <div class="mt-2 text-sm text-white/85"><?php echo e(setting('vision', '')); ?></div>
        </div>
      </div>
    </div>
    <div class="md:col-span-6">
      <div class="relative overflow-hidden rounded-[2.5rem] bg-white/5 ring-1 ring-white/10">
        <div class="p-8 md:p-10">
          <div class="flex items-center gap-3">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
              <img src="<?php echo ROOT_URL; ?>/assets/svg/icon-shield.svg" alt="" class="h-7 w-7 opacity-85">
            </div>
            <div>
              <div class="text-sm font-semibold">How we work</div>
              <div class="mt-1 text-xs text-white/60">A structured engagement model</div>
            </div>
          </div>
          <div class="mt-6 grid gap-3">
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">01. Intake</div>
              <div class="mt-2 text-sm text-white/70">We capture objectives, constraints, and urgency through a confidential request.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">02. Scope</div>
              <div class="mt-2 text-sm text-white/70">We define deliverables, reporting cadence, escalation paths, and timelines.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">03. Execute</div>
              <div class="mt-2 text-sm text-white/70">Field work and supervision with disciplined documentation and evidence handling.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">04. Report</div>
              <div class="mt-2 text-sm text-white/70">Clear findings and recommendations for operations, HR, legal, or security leadership.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
