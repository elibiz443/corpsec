<div data-request-modal class="fixed inset-0 z-[99999] hidden">
  <div data-request-overlay class="absolute inset-0 bg-zinc-950/70 backdrop-blur"></div>
  <div class="absolute inset-0 grid place-items-center p-2 md:p-5">
    <div class="w-full max-w-3xl overflow-hidden rounded-lg md:rounded-[2.5rem] bg-zinc-950 ring-1 ring-white/10">
      <div class="flex items-center justify-between border-b border-white/10 bg-white/5 px-6 py-2 md:py-4">
        <div>
          <div class="text-xs md:text-sm font-semibold">Request a consultation</div>
          <div class="mt-0.5 text-[0.65rem] md:text-xs text-white/60">Confidential • Evidence-led • Rapid response</div>
        </div>
        <button type="button" data-request-close class="cursor-pointer rounded-full bg-white/5 px-4 py-2 text-xs md:text-sm font-semibold text-white/80 ring-1 ring-white/10 transition hover:bg-white/10">Close</button>
      </div>

      <div class="p-3 md:p-6">
        <div class="rounded-lg md:rounded-2xl bg-white/5 p-2 md:p-4 ring-1 ring-white/10">
          <div class="flex items-center justify-between">
            <div class="text-xs font-semibold text-white/70">Progress</div>
            <div class="text-xs text-white/60" data-step-label>Step 1 of 3</div>
          </div>
          <div class="mt-1 md:mt-3 h-2 w-full overflow-hidden rounded-full bg-white/5 ring-1 ring-white/10">
            <div data-progress class="h-full w-1/3 rounded-full bg-gradient-to-r from-brand-300 via-cyan-200 to-white"></div>
          </div>
        </div>

        <form action="<?php echo url('actions/request_submit.php'); ?>" method="post" class="mt-2 md:mt-6" data-wizard>
          <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">

          <div data-wizard-step>
            <h3 class="text-lg font-semibold tracking-tight">What do you need?</h3>
            <p class="mt-1 md:mt-2 text-sm text-white/70">Pick a focus area. Add details next.</p>

            <div class="mt-2 md:mt-5 grid items-stretch gap-2 md:gap-3 grid-cols-3">
  <label class="group cursor-pointer h-full">
    <input type="radio" name="focus" value="Investigation" class="sr-only peer" required>
    <div class="relative z-0 h-full rounded-md md:rounded-3xl bg-white/5 p-2 md:p-5 ring-1 ring-white/10 transition-all duration-300 ease-out hover:bg-white/10 will-change-transform flex flex-col
      peer-checked:ring-2 peer-checked:ring-brand-300 peer-checked:bg-white/10 peer-checked:shadow-[0_0_45px_rgba(107,191,255,.25)] peer-checked:-translate-y-0.5 peer-checked:scale-[1.01]
      peer-focus-visible:ring-2 peer-focus-visible:ring-brand-300
      before:content-[''] before:pointer-events-none before:absolute before:inset-[-14px] before:rounded-md md:before:rounded-3xl before:bg-brand-300/15 before:blur-2xl before:opacity-0 before:transition-opacity before:duration-300 before:-z-10 peer-checked:before:opacity-100">
      <div class="flex items-center justify-between">
        <div class="text-xs md:text-sm font-semibold">Investigation</div>
        <span class="h-2.5 w-2.5 rounded-full bg-brand-300 shadow-[0_0_35px_rgba(107,191,255,.55)]"></span>
      </div>
      <div class="mt-1 md:mt-2 text-[0.65rem] md:text-xs text-white/60">
        Due diligence, surveillance, verification, brand protection
      </div>
    </div>
  </label>

  <label class="group cursor-pointer h-full">
    <input type="radio" name="focus" value="Guarding" class="sr-only peer" required>
    <div class="relative z-0 h-full rounded-md md:rounded-3xl bg-white/5 p-2 md:p-5 ring-1 ring-white/10 transition-all duration-300 ease-out hover:bg-white/10 will-change-transform flex flex-col
      peer-checked:ring-2 peer-checked:ring-accent-500 peer-checked:bg-white/10 peer-checked:shadow-[0_0_45px_rgba(249,115,22,.22)] peer-checked:-translate-y-0.5 peer-checked:scale-[1.01]
      peer-focus-visible:ring-2 peer-focus-visible:ring-accent-500
      before:content-[''] before:pointer-events-none before:absolute before:inset-[-14px] before:rounded-md md:before:rounded-3xl before:bg-accent-500/15 before:blur-2xl before:opacity-0 before:transition-opacity before:duration-300 before:-z-10 peer-checked:before:opacity-100">
      <div class="flex items-center justify-between">
        <div class="text-xs md:text-sm font-semibold">Guarding</div>
        <span class="h-2.5 w-2.5 rounded-full bg-accent-500 shadow-[0_0_35px_rgba(249,115,22,.55)]"></span>
      </div>
      <div class="mt-1 md:mt-2 text-[0.65rem] md:text-xs text-white/60">
        Static guarding, patrol, access control, VIP escort
      </div>
    </div>
  </label>

  <label class="group cursor-pointer h-full">
    <input type="radio" name="focus" value="Both" class="sr-only peer" required>
    <div class="relative z-0 h-full rounded-md md:rounded-3xl bg-white/5 p-2 md:p-5 ring-1 ring-white/10 transition-all duration-300 ease-out hover:bg-white/10 will-change-transform flex flex-col
      peer-checked:ring-2 peer-checked:ring-white/60 peer-checked:bg-white/10 peer-checked:shadow-[0_0_45px_rgba(255,255,255,.18)] peer-checked:-translate-y-0.5 peer-checked:scale-[1.01]
      peer-focus-visible:ring-2 peer-focus-visible:ring-white/70
      before:content-[''] before:pointer-events-none before:absolute before:inset-[-14px] before:rounded-md md:before:rounded-3xl before:bg-white/10 before:blur-2xl before:opacity-0 before:transition-opacity before:duration-300 before:-z-10 peer-checked:before:opacity-100">
      <div class="flex items-center justify-between">
        <div class="text-xs md:text-sm font-semibold">Both</div>
        <span class="h-2.5 w-2.5 rounded-full bg-white shadow-[0_0_35px_rgba(255,255,255,.4)]"></span>
      </div>
      <div class="mt-1 md:mt-2 text-[0.65rem] md:text-xs text-white/60">
        Integrated engagement
      </div>
    </div>
  </label>
</div>

            <div class="mt-2 md:mt-5">
              <label class="text-xs font-semibold text-white/70">Preferred service</label>
              <select name="service_id" class="mt-1 md:mt-2 w-full rounded-lg md:rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" required>
                <option value="" class="bg-zinc-950">Select a service</option>
                <?php foreach ($servicesShort as $s) { ?>
                  <option value="<?php echo (int)$s['id']; ?>" class="bg-zinc-950"><?php echo e($s['category'] . ' • ' . $s['title']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div data-wizard-step class="hidden">
            <h3 class="text-sm md:text-lg font-semibold tracking-tight">Share the details</h3>
            <p class="hidden md:block mt-2 text-sm text-white/70">A few specifics help us respond.</p>
            <div class="md:mt-5 grid gap-2 md:gap-3 md:grid-cols-2">
              <div>
                <label class="text-xs font-semibold text-white/70">Location</label>
                <input name="location" required class="md:mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" placeholder="Town, estate, or site">
              </div>
              <div>
                <label class="text-xs font-semibold text-white/70">Timeline</label>
                <select name="timeline" required class="md:mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300">
                  <option value="" class="bg-zinc-950">Select</option>
                  <option class="bg-zinc-950" value="Immediate">Immediate</option>
                  <option class="bg-zinc-950" value="This week">This week</option>
                  <option class="bg-zinc-950" value="This month">This month</option>
                  <option class="bg-zinc-950" value="Planning">Planning</option>
                </select>
              </div>
            </div>
            <div class="mt-1.5 md:mt-3">
              <label class="text-xs font-semibold text-white/70">Brief description</label>
              <textarea name="message" required rows="4" class="mt-1 md:mt-2 w-full rounded-lg md:rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300 h-[3rem] md:h-[8rem] resize-y" placeholder="Key facts, objectives, constraints, and any immediate risks"
              ></textarea>
            </div>
          </div>

          <div data-wizard-step class="hidden">
            <h3 class="text-sm md:text-lg font-semibold tracking-tight">Your contact</h3>
            <p class="md:mt-2 text-xs md:text-sm text-white/70">We keep everything confidential.</p>
            <div class="mt-2 md:mt-5 grid gap-3 md:grid-cols-2">
              <div>
                <label class="text-xs font-semibold text-white/70">Full name</label>
                <input name="name" required class="md:mt-2 w-full rounded-lg md:rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" placeholder="Your name">
              </div>
              <div>
                <label class="text-xs font-semibold text-white/70">Phone</label>
                <input name="phone" required class="md:mt-2 w-full rounded-lg md:rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" placeholder="e.g., +254...">
              </div>
              <div class="md:col-span-2">
                <label class="text-xs font-semibold text-white/70">Email</label>
                <input type="email" name="email" class="md:mt-2 w-full rounded-lg md:rounded-2xl bg-zinc-950/40 px-4 py-1.5 md:py-3 text-xs md:text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" placeholder="you@company.com">
              </div>
            </div>
            <div class="mt-2 md:mt-5 flex items-center justify-between gap-3">
              <button type="button" data-wizard-back class="cursor-pointer inline-flex items-center justify-center rounded-full bg-white/5 px-3.5 md:px-5 py-1.5 md:py-2.5 text-xs md:text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">Back</button>
              <button type="submit" class="cursor-pointer inline-flex items-center justify-center rounded-full bg-emerald-300 px-4 md:px-6 py-1.5 md:py-2.5 text-xs md:text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-emerald-200 active:translate-y-0">Submit request</button>
            </div>
          </div>

          <div class="mt-2 md:mt-6 flex items-center justify-between gap-3" data-wizard-nav>
            <button type="button" data-wizard-back class="cursor-pointer inline-flex items-center justify-center rounded-full bg-white/5 px-3.5 md:px-5 py-1.5 md:py-2.5 text-xs md:text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:bg-white/10 active:translate-y-0">Back</button>
            <button type="button" data-wizard-next class="cursor-pointer inline-flex items-center justify-center rounded-full bg-brand-300 px-3.5 md:px-5 py-1.5 md:py-2.5 text-xs md:text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-brand-200 active:translate-y-0">Continue</button>
          </div>
        </form>

        <div class="mt-3 md:mt-6 rounded-lg md:rounded-2xl bg-zinc-950/40 p-2 md:p-4 text-[0.65rem] md:text-xs text-white/50 ring-1 ring-white/10">
          We reply quickly. Keep your brief short, we can expand on call.
        </div>
      </div>
    </div>
  </div>
</div>
