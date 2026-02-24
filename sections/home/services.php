<section class="w-[90%] mx-auto pb-14" id="explorer">
  <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs font-semibold text-white/70 ring-1 ring-white/10">
        <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
        Capabilities
      </div>
      <h2 class="mt-4 font-display text-2xl font-semibold tracking-tight md:text-4xl">Two divisions. One playbook.</h2>
      <p class="mt-3 max-w-2xl text-sm leading-relaxed text-white/70">Investigations deliver clarity. Guarding delivers control. Both deliver documented outcomes.</p>
    </div>
    <div class="flex items-center">
      <a href="<?php echo url('services'); ?>" class="inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">All services</a>
    </div>
  </div>

  <div class="mt-8 grid gap-6 lg:grid-cols-12">
    <div class="lg:col-span-5">
      <img src="<?php echo ROOT_URL; ?>/assets/images/guard2.webp" alt="" class="relative z-10 w-[60%] h-auto mx-auto">
      <div class="relative z-20 rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10">
        <div class="text-sm font-semibold">How we work</div>
        <p class="mt-2 text-sm leading-relaxed text-white/70">Simple process. Strong discipline. No overcomplication.</p>
        <div class="mt-4 grid gap-3">
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-zinc-950/40 ring-1 ring-white/10">
              <span class="text-sm font-semibold">1</span>
            </div>
            <div>
              <div class="text-sm font-semibold">Confidential intake</div>
              <div class="mt-1 text-xs text-white/60">Scope, risks, and objectives clarified.</div>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-zinc-950/40 ring-1 ring-white/10">
              <span class="text-sm font-semibold">2</span>
            </div>
            <div>
              <div class="text-sm font-semibold">Field execution</div>
              <div class="mt-1 text-xs text-white/60">Deploy with discipline and chain-of-custody.</div>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-zinc-950/40 ring-1 ring-white/10">
              <span class="text-sm font-semibold">3</span>
            </div>
            <div>
              <div class="text-sm font-semibold">Reporting</div>
              <div class="mt-1 text-xs text-white/60">Clear logs, timelines, and recommendations.</div>
            </div>
          </div>
          <div class="flex items-start gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-zinc-950/40 ring-1 ring-white/10">
              <span class="text-sm font-semibold">4</span>
            </div>
            <div>
              <div class="text-sm font-semibold">Follow-through</div>
              <div class="mt-1 text-xs text-white/60">Escalation paths, improvements, continuity.</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="lg:col-span-7">
      <div class="grid gap-3">
        <div class="rounded-[2.5rem] bg-white/5 p-6 ring-1 ring-white/10" data-tabs>
          <div class="flex items-center justify-between gap-3">
            <div>
              <div class="text-sm font-semibold">Service console</div>
              <div class="mt-1 text-xs text-white/60">Switch lanes. See what we do. Start fast.</div>
            </div>
            <span class="inline-flex items-center rounded-full bg-emerald-300/10 px-3 py-1 text-xs font-semibold text-emerald-200 ring-1 ring-emerald-300/20">Available</span>
          </div>

          <div class="mt-5 flex rounded-2xl bg-zinc-950/40 p-1 ring-1 ring-white/10">
            <button type="button" data-tab="inv" class="cursor-pointer flex-1 rounded-xl px-4 py-2 text-sm font-semibold text-white transition">
              Investigations
            </button>
            <button type="button" data-tab="gua" class="cursor-pointer flex-1 rounded-xl px-4 py-2 text-sm font-semibold text-white/60 transition">
              Guarding
            </button>
          </div>

          <div class="mt-5" data-panel="inv">
            <div class="grid md:grid-cols-2 gap-2">
              <?php foreach (array_slice($servicesInvest, 0, 6) as $s) { ?>
                <a data-reveal href="<?php echo url('investigations.php'); ?>#s<?php echo (int)$s['id']; ?>" class="group rounded-2xl bg-zinc-950/40 px-4 py-3 ring-1 ring-white/10 transition hover:bg-white/10">
                  <div class="flex items-center justify-between gap-3">
                    <div class="text-sm font-semibold text-white/90"><?php echo e($s['title']); ?></div>
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-white/5 ring-1 ring-white/10">
                      <img src="<?php echo url($s['icon']); ?>" alt="" class="h-5 w-5 opacity-80">
                    </span>
                  </div>
                  <div class="mt-1 text-xs text-white/60"><?php echo e($s['short_desc']); ?></div>
                </a>
              <?php } ?>

              <a href="<?php echo url('investigations'); ?>" class="mt-10 inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">Explore investigations</a>
            </div>
          </div>

          <div class="mt-5 hidden" data-panel="gua">
            <div class="grid md:grid-cols-2 gap-2">
              <?php foreach (array_slice($servicesGuard, 0, 6) as $s) { ?>
                <a data-reveal href="<?php echo url('guarding.php'); ?>#s<?php echo (int)$s['id']; ?>" class="group rounded-2xl bg-zinc-950/40 px-4 py-3 ring-1 ring-white/10 transition hover:bg-white/10">
                  <div class="flex items-center justify-between gap-3">
                    <div class="text-sm font-semibold text-white/90"><?php echo e($s['title']); ?></div>
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-white/5 ring-1 ring-white/10">
                      <img src="<?php echo url($s['icon']); ?>" alt="" class="h-5 w-5 opacity-80">
                    </span>
                  </div>
                  <div class="mt-1 text-xs text-white/60"><?php echo e($s['short_desc']); ?></div>
                </a>
              <?php } ?>

              <a href="<?php echo url('guarding'); ?>" class="mt-10 inline-flex items-center justify-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">Explore guarding</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 