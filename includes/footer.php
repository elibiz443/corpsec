<?php
$pdo = $GLOBALS['pdo'];
$servicesShort = db_all($pdo, 'SELECT id, category, title FROM services WHERE is_active = 1 ORDER BY category, sort_order, title');
?>

<footer class="relative overflow-hidden border-t border-black/5 rounded-t-[3rem] bg-[#1c3f60]">
  <div class="absolute inset-0 z-0">
    <img src="<?php echo url('assets/images/footer-bg.webp'); ?>" alt="Monitored City" class="h-full w-full object-cover scale-105 opacity-40 grayscale blur-[2px]">
    <div class="absolute inset-0 bg-[#1c3f60]/60 backdrop-blur-[2px]"></div>
  </div>

  <div class="relative z-10 w-[92%] mx-auto grid gap-12 py-16 lg:grid-cols-12 lg:py-20 text-white">
    <div class="lg:col-span-5">
      <a href="<?php echo ROOT_URL; ?>/" class="group inline-flex items-center p-2 rounded-2xl bg-white/20 ring-1 ring-white/10 backdrop-blur-md shadow-2xl transition-all duration-500 hover:bg-white/20">
        <img src="<?php echo url('assets/images/logo2.webp'); ?>" alt="Corpsec Logo" class="w-[15rem] h-auto">
      </a>
      <p class="mt-6 max-w-md text-base leading-relaxed text-zinc-300">
        <?php echo e(setting('site_name', 'Corpsec')); ?> delivers discreet investigations and premium guarding. We protect people, assets, and reputations with integrity, structure, and evidence you can trust.
      </p>
      <div class="mt-8 flex flex-wrap gap-3">
        <a href="mailto:<?php echo e(setting('email')); ?>" class="group inline-flex items-center rounded-full bg-white/5 px-5 py-2.5 text-sm font-semibold text-white ring-1 ring-white/10 transition hover:bg-white/10">
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-2.5 h-4 w-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7 8.5L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <?php echo e(setting('email')); ?>
        </a>
      </div>
    </div>

    <div class="lg:col-span-3">
      <div class="font-['Sora',ui-sans-serif,system-ui] text-lg font-bold tracking-tight text-white mb-5">Explore</div>
      <div class="grid gap-3.5 text-base text-zinc-300 font-medium">
        <a class="transition hover:text-orange-400 hover:translate-x-1" href="<?php echo url('about'); ?>">About</a>
        <a class="transition hover:text-orange-400 hover:translate-x-1" href="<?php echo url('services'); ?>">Services</a>
        <a class="transition hover:text-orange-400 hover:translate-x-1" href="<?php echo url('investigations'); ?>">Investigations</a>
        <a class="transition hover:text-orange-400 hover:translate-x-1" href="<?php echo url('guarding'); ?>">Guarding</a>
        <a class="transition hover:text-orange-400 hover:translate-x-1" href="<?php echo url('insights'); ?>">Insights</a>
        <a class="transition hover:text-orange-400 hover:translate-x-1" href="<?php echo url('contact'); ?>">Contact</a>
      </div>
    </div>

    <div class="lg:col-span-4 flex flex-col justify-center">
      <div class="rounded-3xl border border-white/5 bg-white/10 p-7 ring-1 ring-white/10 shadow-2xl shadow-zinc-900 backdrop-blur-md">
        <div class="font-['Sora',ui-sans-serif,system-ui] text-xl font-bold tracking-tight text-white"><?php echo e(setting('cta_title', 'Request a consultation')); ?></div>
        <p class="mt-3 text-sm xl:text-base leading-relaxed text-zinc-300"><?php echo e(setting('cta_subtitle', 'Start a confidential intake process today.')); ?></p>
        
        <button type="button" data-open-request class="cursor-pointer mt-6 inline-flex w-full items-center justify-center rounded-full bg-orange-500 px-6 py-4 text-sm font-bold text-white hover:bg-orange-600 hover:-translate-y-1 active:translate-y-0 transition-all duration-500 ease-in-out">
          Start request
          <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </button>
        <div class="mt-4 text-center text-xs text-orange-200 font-medium">Confidential intake. Fast response.</div>
      </div>
    </div>
  </div>

  <div class="relative z-10 border-t border-white/5 bg-[#173551]">
    <div class="mx-auto flex flex-col gap-4 px-10 py-6 text-xs xl:text-sm font-medium text-zinc-400 md:flex-row md:items-center md:justify-between">
      <div>© <?php echo date('Y'); ?> <?php echo e(setting('site_name', 'Corpsec')); ?>. All rights reserved.</div>
      <div class="flex gap-6">
        <a class="transition hover:text-orange-400" href="<?php echo url('privacy'); ?>">Privacy Policy</a>
        <a class="transition hover:text-orange-400" href="<?php echo url('terms'); ?>">Terms Of Service</a>
      </div>
    </div>
  </div>
</footer>

<?php include ROOT_PATH . '/includes/request-modal.php'; ?>

<script src="<?php echo url('assets/js/app.js'); ?>"></script>
<script src="<?php echo url('assets/js/header.js'); ?>"></script>
<script src="<?php echo url('assets/js/search.js'); ?>"></script>
</body>
</html>
