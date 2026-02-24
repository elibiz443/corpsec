<section id="investigation" class="mx-auto max-w-6xl px-5 pb-14">
  <div class="flex items-end justify-between gap-4">
    <div>
      <h2 class="font-display text-2xl font-semibold tracking-tight md:text-3xl">Investigation services</h2>
      <p class="mt-2 text-sm text-white/70">Confidential, structured, and evidence-led.</p>
    </div>
    <a href="<?php echo url('investigations'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">Explore</a>
  </div>
  <div class="mt-6 grid gap-3 md:grid-cols-2">
    <?php foreach ($investigation as $s) { ?>
      <div id="s<?php echo (int)$s['id']; ?>" data-reveal class="rounded-3xl bg-white/5 p-7 ring-1 ring-white/10">
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="text-sm font-semibold"><?php echo e($s['title']); ?></div>
            <div class="mt-2 text-sm text-white/70"><?php echo e($s['short_desc']); ?></div>
          </div>
          <img src="<?php echo ROOT_URL . '/' . e($s['icon']); ?>" alt="" class="h-8 w-8 opacity-85">
        </div>
        <div class="mt-4 text-sm leading-relaxed text-white/75"><?php echo e($s['body']); ?></div>
      </div>
    <?php } ?>
  </div>
</section>

<section id="guarding" class="mx-auto max-w-6xl px-5 pb-30">
  <div class="flex items-end justify-between gap-4">
    <div>
      <h2 class="font-display text-2xl font-semibold tracking-tight md:text-3xl">Guarding services</h2>
      <p class="mt-2 text-sm text-white/70">Visible deterrence, controlled access, calm response.</p>
    </div>
    <a href="<?php echo url('guarding'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">Explore</a>
  </div>
  <div class="mt-6 grid gap-3 md:grid-cols-2">
    <?php foreach ($guarding as $s) { ?>
      <div id="s<?php echo (int)$s['id']; ?>" data-reveal class="rounded-3xl bg-white/5 p-7 ring-1 ring-white/10">
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="text-sm font-semibold"><?php echo e($s['title']); ?></div>
            <div class="mt-2 text-sm text-white/70"><?php echo e($s['short_desc']); ?></div>
          </div>
          <img src="<?php echo ROOT_URL . '/' . e($s['icon']); ?>" alt="" class="h-8 w-8 opacity-85">
        </div>
        <div class="mt-4 text-sm leading-relaxed text-white/75"><?php echo e($s['body']); ?></div>
      </div>
    <?php } ?>
  </div>
</section>
