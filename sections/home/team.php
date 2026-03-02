<section class="w-[90%] mx-auto py-14 scroll-mt-[5.75rem]">
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
    <div class="max-w-2xl">
      <h2 class="font-['Sora',ui-sans-serif,system-ui] text-3xl font-bold tracking-tight xl:text-4xl text-zinc-900">Leadership & support</h2>
      <p class="mt-3 text-base xl:text-lg leading-relaxed text-zinc-600">A strong team focused on discipline, confidentiality, and results. Every engagement stays structured.</p>
    </div>
    <a href="<?php echo ROOT_URL; ?>/about" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-orange-200 transition-all hover:bg-orange-600 hover:-translate-y-0.5 active:translate-y-0">
      See our team
      <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
      </svg>
    </a>
  </div>

  <div class="grid gap-6 md:grid-cols-12 md:gap-10">
    <div class="md:col-span-5 flex flex-col justify-center">
      <div class="relative">
        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-orange-200/40 to-sky-200/40 blur-2xl"></div>
        <img src="<?php echo ROOT_URL; ?>/assets/images/team.webp" alt="Team Leadership" class="relative z-10 w-full h-auto rounded-3xl shadow-2xl ring-1 ring-black/5 object-cover">
      </div>
    </div>

    <div class="md:col-span-7">
      <div class="rounded-[2.5rem] bg-gradient-to-tr from-orange-50 via-white to-sky-50 p-8 xl:p-12 ring-1 ring-black/5 shadow-2xl shadow-zinc-200">
        <div class="flex items-start justify-between gap-6">
          <div>
            <div class="text-2xl xl:text-3xl font-bold text-zinc-900">Mission & vision</div>
            <div class="mt-1 text-base xl:text-lg text-zinc-500">A premium standard, consistently applied.</div>
          </div>
          <img src="<?php echo url('assets/images/seal-verified.webp'); ?>" alt="Verified Seal" class="h-16 w-16 drop-shadow-md">
        </div>

        <div class="mt-10 grid gap-6">
          <div class="group rounded-3xl bg-white p-6 ring-1 ring-sky-100 shadow-md transition-all hover:shadow-lg hover:ring-sky-200">
            <div class="flex items-center gap-3">
              <span class="flex h-2 w-2 rounded-full bg-sky-500"></span>
              <div class="text-sm font-bold uppercase tracking-widest text-sky-600">Mission</div>
            </div>
            <div class="mt-3 text-base xl:text-lg leading-relaxed text-zinc-700 font-medium">
              <?php echo e(setting('mission', 'To provide unmatched security intelligence with absolute discretion.')); ?>
            </div>
          </div>

          <div class="group rounded-3xl bg-white p-6 ring-1 ring-indigo-100 shadow-md transition-all hover:shadow-lg hover:ring-indigo-200">
            <div class="flex items-center gap-3">
              <span class="flex h-2 w-2 rounded-full bg-indigo-500"></span>
              <div class="text-sm font-bold uppercase tracking-widest text-indigo-600">Vision</div>
            </div>
            <div class="mt-3 text-base xl:text-lg leading-relaxed text-zinc-700 font-medium">
              <?php echo e(setting('vision', 'Defining the future of private investigative and guarding standards globally.')); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
