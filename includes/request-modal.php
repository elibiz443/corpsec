<div data-request-modal class="fixed inset-0 z-[99999] hidden">
  <div data-request-overlay class="absolute inset-0 bg-zinc-900/40 backdrop-blur-sm"></div>
  <div class="absolute inset-0 grid place-items-center p-2 md:p-5">
    <div class="w-full max-w-3xl overflow-hidden rounded-2xl md:rounded-4xl bg-white ring-1 ring-black/10 shadow-xl">
      <div class="flex items-center justify-between border-b border-black/10 bg-gradient-to-r from-sky-50 via-white to-orange-50 px-6 py-3">
        <div>
          <div class="text-sm font-semibold text-zinc-900">Request a consultation</div>
          <div class="mt-0.5 text-xs text-zinc-600">Confidential • Evidence-led • Rapid response</div>
        </div>
        <button type="button" data-request-close class="cursor-pointer rounded-full bg-white px-4 py-2 text-sm font-semibold text-zinc-700 ring-1 ring-black/10 transition hover:bg-sky-50">Close</button>
      </div>

      <div class="p-3 md:p-4">
        <div class="rounded-2xl bg-white p-3 ring-1 ring-black/10">
          <div class="flex items-center justify-between">
            <div class="text-xs font-semibold text-zinc-700">Progress</div>
            <div class="text-xs text-zinc-600" data-step-label>Step 1 of 3</div>
          </div>
          <div class="mt-2 h-2 w-full overflow-hidden rounded-full bg-zinc-100 ring-1 ring-black/10">
            <div data-progress class="h-full w-1/3 rounded-full bg-gradient-to-r from-sky-500 via-indigo-500 to-orange-500"></div>
          </div>
        </div>

        <form action="<?php echo url('actions/request_submit.php'); ?>" method="post" class="mt-3" data-wizard>
          <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">

          <div data-wizard-step>
            <h3 class="text-lg font-semibold tracking-tight text-zinc-900">What do you need?</h3>
            <p class="text-sm text-zinc-600">Pick a focus area. Add details next.</p>

            <div class="mt-2 grid items-stretch gap-2 md:gap-3 grid-cols-3">
              <label class="group cursor-pointer h-full">
                <input type="radio" name="focus" value="Investigation" class="sr-only peer" required>
                <div class="relative z-0 h-full rounded-xl md:rounded-3xl bg-white p-3 md:p-5 ring-1 ring-black/10 transition-all duration-300 ease-out hover:bg-sky-50 will-change-transform flex flex-col peer-checked:ring-2 peer-checked:ring-sky-500 peer-checked:bg-sky-50 peer-checked:shadow-lg peer-checked:-translate-y-0.5 peer-checked:scale-[1.01] peer-focus-visible:ring-2 peer-focus-visible:ring-sky-500 before:content-[''] before:pointer-events-none before:absolute before:inset-[-0.875rem] before:rounded-xl md:before:rounded-3xl before:bg-sky-500/15 before:blur-2xl before:opacity-0 before:transition-opacity before:duration-300 before:-z-10 peer-checked:before:opacity-100">
                  <div class="flex items-center justify-between">
                    <div class="text-sm font-semibold text-zinc-900">Investigation</div>
                    <span class="h-2.5 w-2.5 rounded-full bg-sky-500 ring-2 ring-sky-200/70 shadow-sm"></span>
                  </div>
                  <div class="mt-2 text-xs text-zinc-600">Due diligence, surveillance, verification, brand protection</div>
                </div>
              </label>

              <label class="group cursor-pointer h-full">
                <input type="radio" name="focus" value="Guarding" class="sr-only peer" required>
                <div class="relative z-0 h-full rounded-xl md:rounded-3xl bg-white p-3 md:p-5 ring-1 ring-black/10 transition-all duration-300 ease-out hover:bg-orange-50 will-change-transform flex flex-col peer-checked:ring-2 peer-checked:ring-orange-500 peer-checked:bg-orange-50 peer-checked:shadow-lg peer-checked:-translate-y-0.5 peer-checked:scale-[1.01] peer-focus-visible:ring-2 peer-focus-visible:ring-orange-500 before:content-[''] before:pointer-events-none before:absolute before:inset-[-0.875rem] before:rounded-xl md:before:rounded-3xl before:bg-orange-500/15 before:blur-2xl before:opacity-0 before:transition-opacity before:duration-300 before:-z-10 peer-checked:before:opacity-100">
                  <div class="flex items-center justify-between">
                    <div class="text-sm font-semibold text-zinc-900">Guarding</div>
                    <span class="h-2.5 w-2.5 rounded-full bg-orange-500 ring-2 ring-orange-200/70 shadow-sm"></span>
                  </div>
                  <div class="mt-2 text-xs text-zinc-600">Static guarding, patrol, access control, VIP escort</div>
                </div>
              </label>

              <label class="group cursor-pointer h-full">
                <input type="radio" name="focus" value="Both" class="sr-only peer" required>
                <div class="relative z-0 h-full rounded-xl md:rounded-3xl bg-white p-3 md:p-5 ring-1 ring-black/10 transition-all duration-300 ease-out hover:bg-indigo-50 will-change-transform flex flex-col peer-checked:ring-2 peer-checked:ring-indigo-500 peer-checked:bg-indigo-50 peer-checked:shadow-lg peer-checked:-translate-y-0.5 peer-checked:scale-[1.01] peer-focus-visible:ring-2 peer-focus-visible:ring-indigo-500 before:content-[''] before:pointer-events-none before:absolute before:inset-[-0.875rem] before:rounded-xl md:before:rounded-3xl before:bg-indigo-500/14 before:blur-2xl before:opacity-0 before:transition-opacity before:duration-300 before:-z-10 peer-checked:before:opacity-100">
                  <div class="flex items-center justify-between">
                    <div class="text-sm font-semibold text-zinc-900">Both</div>
                    <span class="h-2.5 w-2.5 rounded-full bg-indigo-500 ring-2 ring-indigo-200/70 shadow-sm"></span>
                  </div>
                  <div class="mt-2 text-xs text-zinc-600">Integrated engagement</div>
                </div>
              </label>
            </div>

            <div class="mt-3">
              <label class="text-xs font-semibold text-zinc-700">Preferred service</label>
              <select name="service_id" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500" required>
                <option value="">Select a service</option>
                <?php foreach ($servicesShort as $s) { ?>
                  <option value="<?php echo (int)$s['id']; ?>"><?php echo e($s['category'] . ' • ' . $s['title']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div data-wizard-step class="hidden">
            <h3 class="text-lg font-semibold tracking-tight text-zinc-900">Share the details</h3>
            <p class="text-sm text-zinc-600">A few specifics help us respond.</p>

            <div class="mt-2 grid gap-1 md:gap-3 grid-cols-2">
              <div>
                <label class="text-xs font-semibold text-zinc-700">Location</label>
                <input name="location" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Town, estate, or site">
              </div>
              <div>
                <label class="text-xs font-semibold text-zinc-700">Timeline</label>
                <select name="timeline" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500">
                  <option value="">Select</option>
                  <option value="Immediate">Immediate</option>
                  <option value="This week">This week</option>
                  <option value="This month">This month</option>
                  <option value="Planning">Planning</option>
                </select>
              </div>
            </div>

            <div class="mt-2">
              <label class="text-xs font-semibold text-zinc-700">Brief description</label>
              <textarea name="message" required rows="3" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-2 text-sm text-zinc-900 ring-1 ring-black/10 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-sky-500 resize-y" placeholder="Key facts, objectives, constraints, and any immediate risks"></textarea>
            </div>
          </div>

          <div data-wizard-step class="hidden">
            <h3 class="text-lg font-semibold tracking-tight text-zinc-900">Your contact</h3>
            <p class="text-sm text-zinc-600">We keep everything confidential.</p>

            <div class="mt-3 grid gap-1 md:gap-3 grid-cols-2">
              <div>
                <label class="text-xs font-semibold text-zinc-700">Full name</label>
                <input name="name" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Your name">
              </div>
              <div>
                <label class="text-xs font-semibold text-zinc-700">Phone</label>
                <input name="phone" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="e.g., +254...">
              </div>
              <div class="col-span-2">
                <label class="text-xs font-semibold text-zinc-700">Email</label>
                <input type="email" name="email" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="you@company.com">
              </div>
            </div>

            <div class="mt-2 flex items-center justify-between gap-3">
              <button type="button" data-wizard-back class="cursor-pointer inline-flex items-center justify-center rounded-full bg-zinc-100 px-5 py-2.5 text-sm font-semibold text-zinc-800 ring-1 ring-black/10 transition hover:-translate-y-0.5 hover:bg-zinc-200 active:translate-y-0">Back</button>
              <button type="submit" class="cursor-pointer inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Submit request</button>
            </div>
          </div>

          <div class="mt-3 flex items-center justify-between gap-3" data-wizard-nav>
            <button type="button" data-wizard-back class="cursor-pointer inline-flex items-center justify-center rounded-full bg-zinc-100 px-5 py-2.5 text-sm font-semibold text-zinc-800 ring-1 ring-black/10 transition hover:-translate-y-0.5 hover:bg-zinc-200 active:translate-y-0">Back</button>
            <button type="button" data-wizard-next class="cursor-pointer inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-600 active:translate-y-0">Continue</button>
          </div>
        </form>

        <div class="mt-3 rounded-2xl bg-zinc-50 p-2 text-center text-xs text-zinc-600 ring-1 ring-black/10">
          We reply quickly. Keep your brief short, we can expand on call.
        </div>
      </div>
    </div>
  </div>
</div>
