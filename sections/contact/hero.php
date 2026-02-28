<section class="mx-auto max-w-6xl px-5 pb-10 pt-14 md:pb-14 md:pt-20 scroll-mt-[5.75rem]">
  <div class="grid gap-8 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-7">
      <div class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-200/60">
        <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
        Contact
      </div>
      <h1 class="mt-6 font-['Sora',ui-sans-serif,system-ui] text-4xl font-semibold leading-[1.05] tracking-tight md:text-5xl">Let’s secure what matters.</h1>
      <p class="mt-4 text-base leading-relaxed text-zinc-600">Reach out for a confidential consultation. We respond fast and keep communications structured.</p>

      <div class="mt-7 grid gap-3 sm:grid-cols-2">
        <a href="tel:<?php echo e(setting('phone')); ?>" data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-sky-50/40 p-6 ring-1 ring-black/10 transition hover:bg-sky-50">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="text-xs font-semibold text-zinc-500">Phone</div>
              <div class="mt-2 text-sm font-semibold text-zinc-900"><?php echo e(setting('phone')); ?></div>
              <div class="mt-2 text-xs text-zinc-500">Call for urgent deployment or rapid advice.</div>
            </div>
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white ring-1 ring-black/10">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-zinc-700" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.6a2 2 0 0 1-.5 2.1L8.1 9.6a16 16 0 0 0 6.3 6.3l1.2-1.2a2 2 0 0 1 2.1-.5c.8.3 1.7.6 2.6.7A2 2 0 0 1 22 16.9z"/>
              </svg>
            </span>
          </div>
        </a>

        <a href="mailto:<?php echo e(setting('email')); ?>" data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-sky-50/40 p-6 ring-1 ring-black/10 transition hover:bg-sky-50">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="text-xs font-semibold text-zinc-500">Email</div>
              <div class="mt-2 text-sm font-semibold text-zinc-900"><?php echo e(setting('email')); ?></div>
              <div class="mt-2 text-xs text-zinc-500">Send details for a discreet assessment.</div>
            </div>
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white ring-1 ring-black/10">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-zinc-700" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16v16H4z"/>
                <path d="M22 6l-10 7L2 6"/>
              </svg>
            </span>
          </div>
        </a>

        <div data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-orange-50/30 p-6 ring-1 ring-black/10 sm:col-span-2">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="text-xs font-semibold text-zinc-500">Location</div>
              <div class="mt-2 text-sm font-semibold text-zinc-900"><?php echo e(setting('address')); ?></div>
              <div class="mt-2 text-xs text-zinc-500">We support deployments across Kenya and the region.</div>
            </div>
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white ring-1 ring-black/10">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-zinc-700" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11z"/>
                <circle cx="12" cy="10" r="2.5"/>
              </svg>
            </span>
          </div>
        </div>
      </div>

      <div class="mt-7">
        <a href="#message" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Send a message</a>
      </div>
    </div>

    <div class="md:col-span-5">
      <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-white via-white to-indigo-50/40 ring-1 ring-black/10">
        <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-sky-500/20 blur-3xl"></div>
        <div class="absolute -bottom-16 -left-16 h-64 w-64 rounded-full bg-orange-500/10 blur-3xl"></div>
        <div class="relative p-8">
          <div class="flex items-center gap-3">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-white ring-1 ring-black/10">
              <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="" class="h-9 w-9 opacity-90">
            </div>
            <div>
              <div class="text-sm font-semibold">Confidential intake</div>
              <div class="mt-1 text-xs text-zinc-500">Structured, discreet, and fast response</div>
            </div>
          </div>

          <div class="mt-6 grid gap-3">
            <div data-reveal class="rounded-3xl bg-sky-50 p-6 ring-1 ring-sky-200/60">
              <div class="text-sm font-semibold">Response readiness</div>
              <div class="mt-2 text-sm text-zinc-600">We respond quickly with a proposed plan and next steps.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-indigo-50 p-6 ring-1 ring-indigo-200/60">
              <div class="text-sm font-semibold">Documentation</div>
              <div class="mt-2 text-sm text-zinc-600">Engagement scope, evidence discipline, clean reporting.</div>
            </div>
            <div data-reveal class="rounded-3xl bg-orange-50 p-6 ring-1 ring-orange-200/60">
              <div class="text-sm font-semibold">Professional conduct</div>
              <div class="mt-2 text-sm text-zinc-600">Calm presence. Clear escalation. Strong supervision.</div>
            </div>
          </div>

          <div class="mt-6 rounded-3xl bg-white p-6 ring-1 ring-black/10">
            <div class="text-xs font-semibold text-zinc-500">Quick action</div>
            <div class="mt-2 text-sm text-zinc-700">For urgent deployments, call now.</div>
            <a href="tel:<?php echo e(setting('phone')); ?>" class="mt-4 inline-flex w-full items-center justify-center rounded-2xl bg-orange-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-orange-600"><?php echo e(setting('phone')); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
