<section class="mx-auto max-w-6xl px-5 pb-14">
  <h2 class="font-display text-2xl font-semibold tracking-tight md:text-3xl">Core values</h2>
  <p class="mt-2 max-w-2xl text-sm text-white/70">These values govern how we handle evidence, communications, and client trust.</p>
  <div class="mt-6 grid gap-3 md:grid-cols-3">
    <?php foreach (preg_split("/\r?\n/", setting('values', '')) as $v) { if (trim($v) === '') continue; ?>
      <div data-reveal class="relative z-10 rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-sm font-semibold"><?php echo e($v); ?></div>
            <div class="mt-2 text-xs leading-relaxed text-white/60">Applied consistently across investigations and guarding operations.</div>
          </div>
          <span class="grid h-10 w-10 aspect-square shrink-0 place-items-center rounded-full bg-white/5 ring-1 ring-white/10">
            <span class="h-2.5 w-2.5 rounded-full bg-brand-300 shadow-[0_0_35px_rgba(107,191,255,.55)]"></span>
          </span>
        </div>
      </div>
    <?php } ?>
    <img src="<?php echo ROOT_URL; ?>/assets/images/bond.webp" alt="" class="relative z-10 w-full h-auto rounded-3xl ring-1 ring-white/10">
    <img src="<?php echo ROOT_URL; ?>/assets/images/guard3.webp" alt="" class="relative z-10 w-full h-auto rounded-3xl ring-1 ring-white/10">
  </div>
</section>

<section class="mx-auto max-w-6xl px-5 pb-30">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <h2 class="font-display text-2xl font-semibold tracking-tight md:text-3xl">Team</h2>
      <p class="mt-2 text-sm text-white/70">Lean leadership, strong supervision, clean reporting.</p>
    </div>
  </div>

  <div class="mt-6 grid gap-3 md:grid-cols-3">
    <?php foreach ($team as $m) { ?>
      <div data-reveal class="rounded-3xl bg-white/5 p-7 ring-1 ring-white/10">
        <div class="flex items-center gap-3">
          <div class="grid h-14 w-14 place-items-center rounded-2xl bg-white/5 ring-1 ring-white/10">
            <img src="<?php echo ROOT_URL; ?>/assets/svg/avatar.svg" alt="" class="h-8 w-8 opacity-85">
          </div>
          <div>
            <div class="text-sm font-semibold"><?php echo e($m['name']); ?></div>
            <div class="mt-1 text-xs text-white/60"><?php echo e($m['role_title']); ?></div>
          </div>
        </div>
        <p class="mt-5 text-sm leading-relaxed text-white/75"><?php echo e($m['bio']); ?></p>
      </div>
    <?php } ?>
  </div>
</section>
