<section class="w-[90%] mx-auto py-30 scroll-mt-[5.75rem]">
  <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl xl:text-4xl">Guarding services</h2>
  <p class="mt-2 max-w-2xl text-sm xl:text-lg text-zinc-600">Select a service below or request a deployment plan.</p>
  <div class="mt-6 grid gap-3 md:grid-cols-2">
    <?php foreach ($rows as $s) { ?>
      <div id="s<?php echo (int)$s['id']; ?>" data-reveal class="rounded-3xl bg-gradient-to-br from-white via-white to-orange-50/40 p-7 ring-1 ring-orange-200/30 shadow-lg shadow-zinc-400">
        <div class="flex items-start justify-between gap-4">
          <div class="text-sm xl:text-lg">
            <div class="font-semibold"><?php echo e($s['title']); ?></div>
            <div class="mt-2 text-zinc-600"><?php echo e($s['short_desc']); ?></div>
          </div>
          <img src="<?php echo ROOT_URL . '/' . e($s['icon']); ?>" alt="" class="h-8 w-8 xl:h-10 xl:w-10 bg-[#ec742c] rounded-lg p-2 shadow-md shadow-zinc-500">
        </div>
        <div class="mt-4 text-sm xl:text-lg leading-relaxed text-zinc-600"><?php echo e($s['body']); ?></div>
        <button type="button" data-open-request class="cursor-pointer mt-5 inline-flex items-center justify-center rounded-full bg-orange-50 px-5 py-2.5 text-sm xl:text-lg font-semibold text-orange-700 ring-1 ring-orange-200/60 transition hover:-translate-y-0.5 hover:bg-orange-100 active:translate-y-0">Request this</button>
      </div>
    <?php } ?>
  </div>
</section>
