<section class="relative w-[95%] mx-auto py-20 mb-20 scroll-mt-[5.75rem] overflow-hidden rounded-[3rem] bg-slate-50">
  
  <div class="absolute -top-[10%] -right-[10%] w-[70%] h-[120%] bg-[#1c3f60]/10 -rotate-[35deg] rounded-[5rem] blur-3xl"></div>
  <div class="absolute top-[20%] -left-[5%] w-[50%] h-[80%] bg-orange-100/40 rotate-[15deg] rounded-[5rem] blur-2xl"></div>
  <div class="absolute top-1/2 right-0 w-full h-px bg-gradient-to-r from-transparent via-zinc-300 to-transparent opacity-50"></div>

  <div class="relative z-10 px-8 md:px-12">
    <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-end">
      <div class="max-w-3xl">
        <div class="inline-flex items-center gap-2 rounded-full bg-orange-100/80 backdrop-blur-md px-4 py-1.5 text-xs xl:text-sm font-bold text-orange-700 ring-1 ring-orange-200">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex h-2 w-2 rounded-full bg-orange-500"></span>
          </span>
          Testimonials
        </div>
        <h2 class="mt-6 font-['Sora',ui-sans-serif,system-ui] text-3xl font-bold tracking-tight md:text-5xl xl:text-6xl text-zinc-900 leading-[1.1]">
          Professional output.<br> 
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1c3f60] to-sky-600">Real confidence.</span>
        </h2>
        <p class="mt-5 max-w-xl text-base xl:text-xl leading-relaxed text-zinc-600">
          We build trust by being disciplined, discreet, and consistent. Our reputation is built on the success of our clients.
        </p>
      </div>
    </div>

    <div class="mt-12 grid gap-6 md:grid-cols-3">
      <?php foreach ($testimonials as $t) { ?>
        <div data-reveal class="group relative rounded-[2.5rem] bg-white/60 backdrop-blur-xl p-8 ring-1 ring-black/[0.05] shadow-xl shadow-zinc-200/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:bg-white">
          
          <div class="absolute top-6 right-8 text-zinc-100 group-hover:text-sky-50 transition-colors duration-500">
            <svg class="h-12 w-12 fill-current" viewBox="0 0 32 32"><path d="M10 8v8h6v12H6V8h4zm12 0v8h6v12h-10V8h4z"/></svg>
          </div>

          <div class="relative z-10">
            <div class="flex items-center gap-1 text-orange-400 mb-6">
              <?php for ($i=0; $i<5; $i++) { ?>
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M12 17.27l-5.18 3.05 1.64-5.81L3 9.24l6-.5L12 3l3 5.74 6 .5-5.46 5.27 1.64 5.81z"/></svg>
              <?php } ?>
            </div>
            
            <p class="text-base xl:text-lg italic leading-relaxed text-zinc-700 mb-8">
              “<?php echo e($t['quote_text']); ?>”
            </p>

            <div class="flex items-center gap-4 border-t border-zinc-100 pt-6">
              <div class="h-12 w-12 rounded-full bg-gradient-to-tr from-[#1c3f60] to-sky-500 flex items-center justify-center text-white font-bold text-sm">
                <?php echo e(substr($t['name'], 0, 1)); ?>
              </div>
              <div>
                <div class="text-sm xl:text-base font-bold text-zinc-900"><?php echo e($t['name']); ?></div>
                <div class="text-xs xl:text-sm font-medium text-sky-600"><?php echo e($t['org_title']); ?></div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
