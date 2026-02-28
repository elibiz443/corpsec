<section id="message" class="mx-auto max-w-6xl px-5 pb-30 scroll-mt-[5.75rem]">
  <div class="grid gap-6 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-5">
      <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl">Send a message</h2>
      <p class="mt-3 text-sm leading-relaxed text-zinc-600">Share what you can. If sensitive, keep it brief and request a call-back.</p>

      <div class="mt-6 grid gap-3">
        <div data-reveal class="rounded-3xl bg-sky-50 p-6 ring-1 ring-sky-200/60">
          <div class="text-sm font-semibold">Services</div>
          <div class="mt-2 text-sm text-zinc-600">Investigations, guarding, VIP escort, patrol, due diligence, surveillance.</div>
        </div>
        <div data-reveal class="rounded-3xl bg-indigo-50 p-6 ring-1 ring-indigo-200/60">
          <div class="text-sm font-semibold">Confidentiality</div>
          <div class="mt-2 text-sm text-zinc-600">Information is stored server-side for controlled follow-up.</div>
        </div>
        <img src="<?php echo ROOT_URL; ?>/assets/images/guard5.webp" alt="" class="relative z-10 w-full h-auto rounded-3xl ring-1 ring-black/10">
      </div>
    </div>

    <div class="md:col-span-7">
      <form method="post" action="<?php echo url('actions/contact_submit.php'); ?>" class="rounded-[2.5rem] bg-gradient-to-br from-white via-white to-orange-50/25 p-7 ring-1 ring-black/10 md:p-10">
        <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="text-xs font-semibold text-zinc-600">Full name</label>
            <input name="name" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Your name">
          </div>
          <div>
            <label class="text-xs font-semibold text-zinc-600">Phone</label>
            <input name="phone" class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="+254...">
          </div>
          <div class="md:col-span-2">
            <label class="text-xs font-semibold text-zinc-600">Email</label>
            <input type="email" name="email" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="you@company.com">
          </div>
          <div class="md:col-span-2">
            <label class="text-xs font-semibold text-zinc-600">Subject</label>
            <input name="subject" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="What can we help with?">
          </div>
          <div class="md:col-span-2">
            <label class="text-xs font-semibold text-zinc-600">Message</label>
            <textarea name="message" rows="6" required class="mt-2 w-full rounded-2xl bg-zinc-50 px-4 py-3 text-sm text-zinc-900 ring-1 ring-black/10 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Share details and preferred contact method"></textarea>
          </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-3">
          <div class="text-xs text-zinc-500">We will respond quickly.</div>
          <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Send message</button>
        </div>
      </form>
    </div>
  </div>
</section>
