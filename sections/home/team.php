<section class="w-[90%] mx-auto pb-14 scroll-mt-[5.75rem]">
  <div class="grid gap-6 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-5">
      <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl">Leadership & support</h2>
      <p class="mt-3 text-sm leading-relaxed text-zinc-600">A lean team focused on discipline, confidentiality, and results. Every engagement stays structured.</p>

      <img src="<?php echo ROOT_URL; ?>/assets/images/team.webp" alt="" class="relative z-10 w-[70%] h-auto mt-5 rounded-3xl shadow-lg ring-1 ring-black/10">
    </div>
    <div class="md:col-span-7">
      <div class="rounded-[2.5rem] bg-gradient-to-br from-white via-white to-orange-50/40 p-6 ring-1 ring-black/10 mt-5">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-sm font-semibold">Mission & vision</div>
            <div class="mt-1 text-xs text-zinc-500">A premium standard, consistently applied.</div>
          </div>
          <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="" class="h-12 w-12 opacity-90">
        </div>
        <div class="mt-5 grid gap-3">
          <div class="rounded-3xl bg-sky-50 p-5 ring-1 ring-sky-200/60">
            <div class="text-xs font-semibold text-zinc-500">Mission</div>
            <div class="mt-2 text-sm text-zinc-800"><?php echo e(setting('mission', '')); ?></div>
          </div>
          <div class="rounded-3xl bg-indigo-50 p-5 ring-1 ring-indigo-200/60">
            <div class="text-xs font-semibold text-zinc-500">Vision</div>
            <div class="mt-2 text-sm text-zinc-800"><?php echo e(setting('vision', '')); ?></div>
          </div>
        </div>
      </div>

      <a href="<?php echo ROOT_URL; ?>/about" class="mt-14 inline-flex items-center justify-center rounded-full bg-orange-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Meet the team</a>
    </div>
  </div>
</section>
