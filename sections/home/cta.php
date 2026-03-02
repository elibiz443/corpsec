<section class="w-[90%] mx-auto pt-12 pb-32 scroll-mt-[5.75rem]">
  <div class="relative overflow-hidden rounded-[3rem] bg-orange-500 shadow-xl shadow-zinc-500">
    
    <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-orange-500/20 blur-[80px]"></div>
    <div class="absolute -left-20 -bottom-20 h-64 w-64 rounded-full bg-sky-500/10 blur-[80px]"></div>

    <div class="relative rounded-[3rem] bg-gradient-to-br from-white via-white to-sky-50/50 p-8 md:p-14">
      <div class="grid gap-12 md:grid-cols-12 md:items-center">
        
        <div class="md:col-span-7">
          <div class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-3 py-1 text-xs font-bold uppercase tracking-widest text-orange-700">
            <span class="flex h-1.5 w-1.5 rounded-full bg-orange-500"></span>
            Ready to engage?
          </div>
          
          <h3 class="mt-6 font-['Sora',ui-sans-serif,system-ui] text-3xl font-bold leading-[1.1] tracking-tight text-zinc-900 md:text-5xl">
            <?php echo e(setting('cta_title', 'Secure your objectives with intelligence.')); ?>
          </h3>
          
          <p class="mt-6 max-w-xl text-base leading-relaxed text-zinc-600 xl:text-lg">
            <?php echo e(setting('cta_subtitle', 'Start a confidential intake process today. Our leads will respond within the hour to establish scope and readiness.')); ?>
          </p>
          
          <div class="mt-10 flex flex-wrap gap-4">
            <button type="button" data-open-request class="cursor-pointer inline-flex items-center justify-center rounded-full bg-orange-500 px-8 py-4 text-sm font-bold text-white shadow-xl shadow-orange-200 transition-all hover:bg-orange-600 hover:-translate-y-1 active:translate-y-0">
              Start formal request
              <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </button>
            <a href="<?php echo url('contact'); ?>" class="inline-flex items-center justify-center rounded-full bg-[#353a9a] px-8 py-4 text-sm font-bold text-white transition-all hover:bg-zinc-800 hover:-translate-y-1 active:translate-y-0 shadow-lg shadow-zinc-200">
              Contact office
            </a>
          </div>
        </div>

        <div class="md:col-span-5">
          <div class="space-y-4">
            
            <div class="group relative rounded-3xl border border-white bg-white/40 p-6 shadow-lg shadow-zinc-300 backdrop-blur-md transition-all hover:border-sky-200 hover:bg-white">
              <div class="flex items-center justify-between gap-4">
                <div>
                  <div class="font-['Sora',ui-sans-serif,system-ui] text-base font-bold text-zinc-900">Confidential by default</div>
                  <div class="mt-1 text-sm text-zinc-500">Encrypted requests, controlled access.</div>
                </div>
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600 ring-1 ring-sky-100 group-hover:bg-sky-500 group-hover:text-white transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                </div>
              </div>
            </div>

            <div class="group relative rounded-3xl border border-white bg-white/40 p-6 shadow-lg shadow-zinc-300 backdrop-blur-md transition-all hover:border-orange-200 hover:bg-white">
              <div class="flex items-center justify-between gap-4">
                <div>
                  <div class="font-['Sora',ui-sans-serif,system-ui] text-base font-bold text-zinc-900">Rapid Response</div>
                  <div class="mt-1 text-sm text-zinc-500">Deploying field leads in < 60 mins.</div>
                </div>
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-orange-50 text-orange-600 ring-1 ring-orange-100 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
