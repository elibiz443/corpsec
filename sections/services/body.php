<section id="investigation" class="mx-auto max-w-6xl px-5 pb-14 scroll-mt-[5.75rem]">
  <div class="flex items-end justify-between gap-4">
    <div>
      <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl">Investigation services</h2>
      <p class="mt-2 text-sm text-zinc-600">Confidential, structured, and evidence-led.</p>
    </div>
    <a href="<?php echo url('investigations'); ?>" class="inline-flex items-center justify-center rounded-full bg-sky-50 px-5 py-2.5 text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60 transition hover:bg-sky-100">Explore</a>
  </div>
  <div class="mt-6 grid gap-3 md:grid-cols-2">
    <?php foreach ($investigation as $s) { ?>
      <div id="s<?php echo (int)$s['id']; ?>" data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-sky-50/50 p-7 ring-1 ring-sky-200/40">
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="text-sm font-semibold"><?php echo e($s['title']); ?></div>
            <div class="mt-2 text-sm text-zinc-600"><?php echo e($s['short_desc']); ?></div>
          </div>
          <img src="<?php echo ROOT_URL . '/' . e($s['icon']); ?>" alt="" class="h-8 w-8 opacity-85">
        </div>
        <div class="mt-4 text-sm leading-relaxed text-zinc-600"><?php echo e($s['body']); ?></div>
      </div>
    <?php } ?>
  </div>
</section>

<section id="guarding" class="mx-auto max-w-6xl px-5 pb-30 scroll-mt-[5.75rem]">
  <div class="flex items-end justify-between gap-4">
    <div>
      <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl">Guarding services</h2>
      <p class="mt-2 text-sm text-zinc-600">Visible deterrence, controlled access, calm response.</p>
    </div>
    <a href="<?php echo url('guarding'); ?>" class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-5 py-2.5 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">Explore</a>
  </div>
  <div class="mt-6 grid gap-3 md:grid-cols-2">
    <?php foreach ($guarding as $s) { ?>
      <div id="s<?php echo (int)$s['id']; ?>" data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-indigo-50/40 p-7 ring-1 ring-indigo-200/40">
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="text-sm font-semibold"><?php echo e($s['title']); ?></div>
            <div class="mt-2 text-sm text-zinc-600"><?php echo e($s['short_desc']); ?></div>
          </div>
          <img src="<?php echo ROOT_URL . '/' . e($s['icon']); ?>" alt="" class="h-8 w-8 opacity-85">
        </div>
        <div class="mt-4 text-sm leading-relaxed text-zinc-600"><?php echo e($s['body']); ?></div>
      </div>
    <?php } ?>
  </div>
</section>
