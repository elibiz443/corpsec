<section class="w-[90%] mx-auto pb-14">
  <div class="grid gap-6 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-5">
      <h2 class="font-display text-2xl font-semibold tracking-tight md:text-3xl">Leadership & support</h2>
      <p class="mt-3 text-sm leading-relaxed text-white/70">A lean team focused on discipline, confidentiality, and results. Every engagement stays structured.</p>

      <img src="<?php echo ROOT_URL; ?>/assets/images/team.webp" alt="" class="relative z-10 w-[70%] h-auto mt-5 rounded-3xl shadow-lg shadow-zinc-900">
    </div>
    <div class="md:col-span-7">
      <div class="rounded-[2.5rem] bg-white/5 p-6 ring-1 ring-white/10 mt-5">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-sm font-semibold">Mission & vision</div>
            <div class="mt-1 text-xs text-white/60">A premium standard, consistently applied.</div>
          </div>
          <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="" class="h-12 w-12 opacity-90">
        </div>
        <div class="mt-5 grid gap-3">
          <div class="rounded-3xl bg-zinc-950/40 p-5 ring-1 ring-white/10">
            <div class="text-xs font-semibold text-white/60">Mission</div>
            <div class="mt-2 text-sm text-white/85"><?php echo e(setting('mission', '')); ?></div>
          </div>
          <div class="rounded-3xl bg-zinc-950/40 p-5 ring-1 ring-white/10">
            <div class="text-xs font-semibold text-white/60">Vision</div>
            <div class="mt-2 text-sm text-white/85"><?php echo e(setting('vision', '')); ?></div>
          </div>
        </div>
      </div>

      <a href="<?php echo ROOT_URL; ?>/about" class="mt-14 inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">Meet the team</a>
    </div>
  </div>
</section>
