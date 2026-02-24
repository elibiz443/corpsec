<section class="mx-auto max-w-6xl px-5 pb-30">
  <h2 class="font-display text-2xl font-semibold tracking-tight md:text-3xl">Investigation services</h2>
  <p class="mt-2 max-w-2xl text-sm text-white/70">Select a service below or request a custom scope.</p>
  <div class="mt-6 grid gap-3 md:grid-cols-2">
    <?php foreach ($rows as $s) { ?>
      <div id="s<?php echo (int)$s['id']; ?>" data-reveal class="rounded-3xl bg-white/5 p-7 ring-1 ring-white/10">
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="text-sm font-semibold"><?php echo e($s['title']); ?></div>
            <div class="mt-2 text-sm text-white/70"><?php echo e($s['short_desc']); ?></div>
          </div>
          <img src="<?php echo ROOT_URL . '/' . e($s['icon']); ?>" alt="" class="h-8 w-8 opacity-85">
        </div>
        <div class="mt-4 text-sm leading-relaxed text-white/75"><?php echo e($s['body']); ?></div>
        <button type="button" data-open-request class="cursor-pointer mt-5 inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-white/90 active:translate-y-0">Request this</button>
      </div>
    <?php } ?>
  </div>
</section>
