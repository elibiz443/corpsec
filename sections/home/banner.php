<section class="w-[90%] mx-auto pb-20 scroll-mt-[5.75rem]">
  <div class="mt-10 rounded-[2.75rem] bg-gradient-to-r from-sky-50 via-white to-orange-50 p-8 ring-1 ring-black/10 md:p-10">
    <div class="grid gap-8 md:grid-cols-12 md:items-center">
      <div class="md:col-span-7">
        <div class="text-sm font-semibold">Ready?</div>
        <h3 class="mt-3 font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl"><?php echo e(setting('cta_title', '')); ?></h3>
        <p class="mt-3 text-sm leading-relaxed text-zinc-600"><?php echo e(setting('cta_subtitle', '')); ?></p>
        <div class="mt-6 flex flex-wrap gap-3">
          <button type="button" data-open-request class="cursor-pointer inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Start request</button>
          <a href="<?php echo url('contact'); ?>" class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-6 py-3 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:-translate-y-0.5 hover:bg-indigo-100 active:translate-y-0">Contact</a>
        </div>
      </div>
      <div class="md:col-span-5">
        <div class="grid gap-3">
          <div class="rounded-3xl bg-sky-50 p-6 ring-1 ring-sky-200/60">
            <div class="flex items-center justify-between gap-3">
              <div>
                <div class="text-sm font-semibold">Confidential by default</div>
                <div class="mt-1 text-xs text-zinc-500">Your request stays private and controlled.</div>
              </div>
              <span class="grid h-11 w-11 place-items-center rounded-2xl bg-white ring-1 ring-black/10">
                <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="" class="h-7 w-7">
              </span>
            </div>
          </div>
          <div class="rounded-3xl bg-indigo-50 p-6 ring-1 ring-indigo-200/60">
            <div class="flex items-center justify-between gap-3">
              <div>
                <div class="text-sm font-semibold">Fast response</div>
                <div class="mt-1 text-xs text-zinc-500">We follow up quickly to confirm scope.</div>
              </div>
              <span class="inline-flex items-center rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700 ring-1 ring-orange-200/60">Active</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
