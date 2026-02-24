<section class="mx-auto max-w-6xl px-5 pb-10 pt-14 md:pb-14 md:pt-20">
  <div class="grid gap-8 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-7">
      <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs text-white/70 ring-1 ring-white/10">
        <span class="h-1.5 w-1.5 rounded-full bg-brand-300"></span>
        Contact
      </div>
      <h1 class="mt-6 font-display text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl">Let’s secure what matters.</h1>
      <p class="mt-4 text-base leading-relaxed text-white/70">Reach out for a confidential consultation. We respond fast and keep communications structured.</p>

      <div class="mt-7 grid gap-3 sm:grid-cols-2">
        <a href="tel:<?php echo e(setting('phone')); ?>" data-reveal class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10 transition hover:bg-white/10">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="text-xs font-semibold text-white/60">Phone</div>
              <div class="mt-2 text-sm font-semibold text-white/90"><?php echo e(setting('phone')); ?></div>
              <div class="mt-2 text-xs text-white/60">Call for urgent deployment or rapid advice.</div>
            </div>
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-white/80" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.6a2 2 0 0 1-.5 2.1L8.1 9.6a16 16 0 0 0 6.3 6.3l1.2-1.2a2 2 0 0 1 2.1-.5c.8.3 1.7.6 2.6.7A2 2 0 0 1 22 16.9z"/>
              </svg>
            </span>
          </div>
        </a>

        <a href="mailto:<?php echo e(setting('email')); ?>" data-reveal class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10 transition hover:bg-white/10">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="text-xs font-semibold text-white/60">Email</div>
              <div class="mt-2 text-sm font-semibold text-white/90"><?php echo e(setting('email')); ?></div>
              <div class="mt-2 text-xs text-white/60">Send details for a discreet assessment.</div>
            </div>
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-white/80" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16v16H4z"/>
                <path d="M22 6l-10 7L2 6"/>
              </svg>
            </span>
          </div>
        </a>

        <div data-reveal class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10 sm:col-span-2">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="text-xs font-semibold text-white/60">Location</div>
              <div class="mt-2 text-sm font-semibold text-white/90"><?php echo e(setting('address')); ?></div>
              <div class="mt-2 text-xs text-white/60">We support deployments across Kenya and the region.</div>
            </div>
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-white/80" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11z"/>
                <circle cx="12" cy="10" r="2.5"/>
              </svg>
            </span>
          </div>
        </div>
      </div>

      <div class="mt-7">
        <a href="#message" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">Send a message</a>
      </div>
    </div>

    <div class="md:col-span-5">
      <div class="relative overflow-hidden rounded-[2.5rem] bg-white/5 ring-1 ring-white/10">
        <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-brand-500/20 blur-3xl"></div>
        <div class="absolute -bottom-16 -left-16 h-64 w-64 rounded-full bg-accent-500/10 blur-3xl"></div>
        <div class="relative p-8">
          <div class="flex items-center gap-3">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
              <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="" class="h-9 w-9 opacity-90">
            </div>
            <div>
              <div class="text-sm font-semibold">Confidential intake</div>
              <div class="mt-1 text-xs text-white/60">Structured, discreet, and fast response</div>
            </div>
          </div>

          <div class="mt-6 grid gap-3">
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">Response readiness</div>
              <div class="mt-2 text-sm text-white/70">We respond quickly with a proposed plan and next steps.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">Documentation</div>
              <div class="mt-2 text-sm text-white/70">Engagement scope, evidence discipline, clean reporting.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-zinc-950/40 p-6 ring-1 ring-white/10">
              <div class="text-sm font-semibold">Professional conduct</div>
              <div class="mt-2 text-sm text-white/70">Calm presence. Clear escalation. Strong supervision.</div>
            </div>
          </div>

          <div class="mt-6 rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
            <div class="text-xs font-semibold text-white/60">Quick action</div>
            <div class="mt-2 text-sm text-white/80">For urgent deployments, call now.</div>
            <a href="tel:<?php echo e(setting('phone')); ?>" class="mt-4 inline-flex w-full items-center justify-center rounded-2xl bg-white px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-white/90"><?php echo e(setting('phone')); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
