<section class="w-[90%] mx-auto pb-14 scroll-mt-[5.75rem]" id="explorer">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs xl:text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60">
        <span class="h-1.5 w-1.5 xl:h-2.5 xl:w-2.5 rounded-full bg-orange-500"></span>
        Capabilities
      </div>
      <h2 class="mt-4 font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-4xl xl:text-5xl">Two divisions. One playbook.</h2>
      <p class="mt-3 max-w-2xl text-sm  xl:text-md leading-relaxed text-zinc-600">Investigations deliver clarity. Guarding delivers control. Both deliver documented outcomes.</p>
    </div>
    <div class="flex items-center">
      <a href="<?php echo url('services'); ?>" class="inline-flex items-center justify-center rounded-full bg-indigo-50 px-5 py-2.5 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:-translate-y-0.5 hover:bg-indigo-100 active:translate-y-0">All services</a>
    </div>
  </div>

  <div class="mt-8 grid gap-6 lg:grid-cols-12">
    <div class="lg:col-span-5">
      <img src="<?php echo ROOT_URL; ?>/assets/images/guard2.webp" alt="" class="relative z-10 w-[60%] h-auto mx-auto">
      <div class="relative z-20 rounded-[2.5rem] bg-gradient-to-br from-white via-white to-sky-50/60 p-7 ring-1 ring-black/10 shadow-xl shadow-zinc-400">
        <div class="text-sm xl:text-md font-semibold">How we work</div>
        <p class="mt-2 text-sm xl:text-md leading-relaxed text-zinc-600">Simple process. Strong discipline. No overcomplication.</p>
        <div class="mt-4 grid gap-3 text-sm xl:text-md">
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-sky-50 ring-1 ring-sky-200/60">
              <span class="font-semibold">1</span>
            </div>
            <div>
              <div class="font-semibold">Confidential intake</div>
              <div class="mt-1 text-zinc-500">Scope, risks, and objectives clarified.</div>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-indigo-50 ring-1 ring-indigo-200/60">
              <span class="font-semibold">2</span>
            </div>
            <div>
              <div class="font-semibold">Field execution</div>
              <div class="mt-1 text-zinc-500">Deploy with discipline and chain-of-custody.</div>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-orange-50 ring-1 ring-orange-200/60">
              <span class="font-semibold">3</span>
            </div>
            <div>
              <div class="font-semibold">Reporting</div>
              <div class="mt-1 text-zinc-500">Clear logs, timelines, and recommendations.</div>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-sky-50 ring-1 ring-sky-200/60">
              <span class="font-semibold">4</span>
            </div>
            <div>
              <div class="font-semibold">Follow-through</div>
              <div class="mt-1 text-zinc-500">Escalation paths, improvements, continuity.</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="lg:col-span-7">
      <div class="grid gap-3">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-white via-white to-indigo-50/50 p-6 ring-1 ring-black/10 shadow-xl shadow-zinc-400" data-tabs>
          <div class="flex items-center justify-between gap-3">
            <div>
              <div class="text-sm xl:text-md font-semibold">Service console</div>
              <div class="mt-1 text-xs xl:text-sm text-zinc-500">Switch lanes. See what we do. Start fast.</div>
            </div>
            <span class="inline-flex items-center rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700 ring-1 ring-orange-200/60">Available</span>
          </div>

          <div class="mt-5 flex rounded-2xl bg-zinc-100 p-1 ring-1 ring-black/10 text-sm xl:text-md">
            <button type="button" data-tab="inv" class="cursor-pointer flex-1 rounded-xl px-4 py-2 font-semibold text-zinc-600 hover:text-zinc-900 transition">
              Investigations
            </button>
            <button type="button" data-tab="gua" class="cursor-pointer flex-1 rounded-xl px-4 py-2 font-semibold text-zinc-600 hover:text-zinc-900 transition">
              Guarding
            </button>
          </div>

          <div class="mt-5" data-panel="inv">
            <div class="grid md:grid-cols-2 gap-2">
              <?php foreach (array_slice($servicesInvest, 0, 6) as $s) { ?>
                <a data-reveal href="<?php echo url('investigations'); ?>#s<?php echo (int)$s['id']; ?>" class="group rounded-2xl bg-white px-4 py-3 ring-1 ring-black/10 transition hover:bg-sky-50">
                  <div class="flex items-center justify-between gap-3">
                    <div class="text-sm xl:text-md font-semibold text-zinc-900"><?php echo e($s['title']); ?></div>
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#4149a3] ring-1 ring-black/10">
                      <img src="<?php echo url($s['icon']); ?>" alt="" class="h-5 w-5 opacity-80">
                    </span>
                  </div>
                  <div class="mt-1 text-xs xl:text-sm text-zinc-500"><?php echo e($s['short_desc']); ?></div>
                </a>
              <?php } ?>

              <a href="<?php echo url('investigations'); ?>" class="mt-10 inline-flex items-center justify-center rounded-full bg-sky-50 px-5 py-2.5 text-sm xl:text-md font-semibold text-sky-700 ring-1 ring-sky-200/60 transition hover:bg-sky-100">Explore investigations</a>
            </div>
          </div>

          <div class="mt-5 hidden" data-panel="gua">
            <div class="grid md:grid-cols-2 gap-2">
              <?php foreach (array_slice($servicesGuard, 0, 6) as $s) { ?>
                <a data-reveal href="<?php echo url('guarding'); ?>#s<?php echo (int)$s['id']; ?>" class="group rounded-2xl bg-white px-4 py-3 ring-1 ring-black/10 transition hover:bg-sky-50">
                  <div class="flex items-center justify-between gap-3">
                    <div class="text-sm xl:text-md font-semibold text-zinc-900"><?php echo e($s['title']); ?></div>
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#ec742c] ring-1 ring-black/10">
                      <img src="<?php echo url($s['icon']); ?>" alt="" class="h-5 w-5 opacity-80">
                    </span>
                  </div>
                  <div class="mt-1 text-xs xl:text-sm text-zinc-500"><?php echo e($s['short_desc']); ?></div>
                </a>
              <?php } ?>

              <a href="<?php echo url('guarding'); ?>" class="mt-10 inline-flex items-center justify-center rounded-full bg-indigo-50 px-5 py-2.5 text-sm xl:text-md font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">Explore guarding</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
