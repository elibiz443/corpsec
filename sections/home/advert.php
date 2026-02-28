<section class="w-[90%] mx-auto pb-14 border-y border-black/10 mb-14 scroll-mt-[5.75rem]" id="advert">
  <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
    <div class="lg:col-span-5 mt-10">
      <div class="rounded-[2.5rem] bg-gradient-to-br from-white via-white to-sky-50/60 p-6 ring-1 ring-black/10">
        <div class="mt-5 rounded-3xl bg-gradient-to-br from-zinc-50 via-white to-indigo-50/40 p-5 ring-1 ring-black/10">
          <div class="flex items-center justify-between gap-3">
            <div class="text-sm font-semibold">Signal scan</div>
            <span class="inline-flex items-center gap-2 text-xs font-semibold text-zinc-500">
              <span class="h-2 w-2 rounded-full bg-sky-300 ring-2 ring-sky-200/70 shadow-sm"></span>
              Live
            </span>
          </div>

          <div class="mt-4 grid place-items-center">
            <svg viewBox="0 0 220 220" class="h-40 w-40">
              <defs>
                <radialGradient id="g" cx="50%" cy="50%" r="50%">
                  <stop offset="0%" stop-color="rgba(107,191,255,.35)" />
                  <stop offset="65%" stop-color="rgba(107,191,255,.08)" />
                  <stop offset="100%" stop-color="rgba(255,255,255,0)" />
                </radialGradient>
              </defs>
              <circle cx="110" cy="110" r="88" fill="none" stroke="rgba(0,0,0,.12)" stroke-width="2" />
              <circle cx="110" cy="110" r="60" fill="none" stroke="rgba(0,0,0,.10)" stroke-width="2" />
              <circle cx="110" cy="110" r="32" fill="none" stroke="rgba(0,0,0,.08)" stroke-width="2" />
              <circle cx="110" cy="110" r="90" fill="url(#g)" />
              <g class="origin-center" data-radar>
                <path d="M110 110 L110 18 A92 92 0 0 1 202 110 Z" fill="rgba(107,191,255,.12)" />
                <path d="M110 110 L110 18" stroke="rgba(107,191,255,.55)" stroke-width="2" />
              </g>
              <circle cx="156" cy="84" r="4" fill="rgba(249,115,22,.8)" />
              <circle cx="76" cy="148" r="4" fill="rgba(49,53,150,.8)" />
              <circle cx="132" cy="146" r="3" fill="rgba(0,175,234,.65)" />
            </svg>
          </div>

          <div class="mt-3 text-center text-xs text-zinc-500">Visualized. Documented. Controlled.</div>
        </div>
      </div>
    </div>

    <div class="lg:col-span-7">
      <div class="mt-10 grid gap-3 md:grid-cols-3">
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-sky-50 via-white to-white p-5 ring-1 ring-sky-200/40">
          <div class="text-xs font-semibold text-zinc-500">Standard</div>
          <div class="mt-2 text-sm font-semibold">Integrity-led</div>
          <div class="mt-1 text-xs leading-relaxed text-zinc-500">Clear scope, clean documentation, professional output.</div>
        </div>
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-indigo-50 via-white to-white p-5 ring-1 ring-indigo-200/40">
          <div class="text-xs font-semibold text-zinc-500">Discipline</div>
          <div class="mt-2 text-sm font-semibold">Evidence logs</div>
          <div class="mt-1 text-xs leading-relaxed text-zinc-500">Timelines, incident notes, and report packs you can trust.</div>
        </div>
        <div data-reveal class="rounded-3xl bg-gradient-to-br from-orange-50 via-white to-white p-5 ring-1 ring-orange-200/40">
          <div class="text-xs font-semibold text-zinc-500">Readiness</div>
          <div class="mt-2 text-sm font-semibold">Deploy fast</div>
          <div class="mt-1 text-xs leading-relaxed text-zinc-500">Guarding teams and field intelligence when it matters.</div>
        </div>
      </div>

      <div class="mt-10 rounded-[2.25rem] bg-white p-6 ring-1 ring-black/10">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
          <div>
            <div class="text-sm font-semibold">Trusted by teams that value discretion</div>
            <div class="mt-1 text-xs text-zinc-500">Partners, clients, and stakeholders who need results without noise.</div>
          </div>
          <div class="flex flex-wrap items-center gap-2">
            <?php
              $pills = [
                'bg-sky-50 text-sky-700 ring-sky-200/60',
                'bg-indigo-50 text-indigo-700 ring-indigo-200/60',
                'bg-orange-50 text-orange-700 ring-orange-200/60'
              ];
              $pi = 0;
            ?>
            <?php foreach ($partners as $p) {
              $pill = $pills[$pi % count($pills)];
              $pi++;
            ?>
              <span class="inline-flex items-center rounded-full px-4 py-2 text-xs font-semibold ring-1 <?php echo $pill; ?>"><?php echo e($p['name']); ?></span>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>