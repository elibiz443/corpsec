<section class="w-[90%] mx-auto py-14 scroll-mt-[5.75rem]">
  <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl xl:text-4xl">Core values</h2>
  <p class="mt-2 max-w-2xl text-sm xl:text-lg text-zinc-600">These values govern how we handle evidence, communications, and client trust.</p>
  <div class="mt-6 grid gap-3 md:grid-cols-3">
    <?php foreach (preg_split("/\r?\n/", setting('values', '')) as $v) { if (trim($v) === '') continue; ?>
      <div data-reveal class="relative z-10 rounded-3xl bg-gradient-to-br from-white via-white to-sky-50/50 p-6 ring-1 ring-black/10 shadow-lg shadow-zinc-400">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-sm xl:text-lg font-semibold"><?php echo e($v); ?></div>
            <div class="mt-2 text-xs xl:text-md leading-relaxed text-zinc-500">Applied consistently across investigations and guarding operations.</div>
          </div>
          <span class="grid h-10 w-10 xl:h-14 xl:w-14 aspect-square shrink-0 place-items-center rounded-full bg-sky-50 ring-1 ring-sky-200/60">
            <span class="h-2.5 w-2.5 xl:h-4 xl:w-4 rounded-full bg-sky-500 ring-2 ring-sky-200/60 shadow-md"></span>
          </span>
        </div>
      </div>
    <?php } ?>
    <img src="<?php echo ROOT_URL; ?>/assets/images/bond.webp" alt="" class="relative z-10 w-full h-auto rounded-3xl ring-1 ring-black/10 shadow-lg shadow-zinc-400">
    <img src="<?php echo ROOT_URL; ?>/assets/images/guard3.webp" alt="" class="relative z-10 w-full h-auto rounded-3xl ring-1 ring-black/10 shadow-lg shadow-zinc-400">
  </div>
</section>

<section class="w-[90%] mx-auto pb-32 scroll-mt-[5.75rem]">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl xl:text-4xl">Team</h2>
      <p class="mt-2 text-sm xl:text-lg text-zinc-600">Lean leadership, strong supervision, clean reporting.</p>
    </div>
  </div>

  <div class="mt-6 grid gap-3 md:grid-cols-3">
    <?php foreach ($team as $m) { ?>
      <div data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-indigo-50/40 p-7 ring-1 ring-black/10 shadow-lg shadow-zinc-400">
        <div class="flex items-center gap-3">
          <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#ec742c] ring-1 ring-[#ec742c]/50">
            <img src="<?php echo ROOT_URL; ?>/assets/svg/avatar.svg" alt="" class="h-8 w-8 opacity-85">
          </div>
          <div>
            <div class="text-sm xl:text-lg font-semibold"><?php echo e($m['name']); ?></div>
            <div class="mt-1 text-xs xl:text-sm text-zinc-500"><?php echo e($m['role_title']); ?></div>
          </div>
        </div>
        <p class="mt-5 text-sm xl:text-md leading-relaxed text-zinc-600"><?php echo e($m['bio']); ?></p>
      </div>
    <?php } ?>
  </div>
</section>
