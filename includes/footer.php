<?php
$pdo = $GLOBALS['pdo'];
$servicesShort = db_all($pdo, 'SELECT id, category, title FROM services WHERE is_active = 1 ORDER BY category, sort_order, title');
?>
<footer class="border-t border-white/10">
  <div class="w-[90%] mx-auto grid gap-10 py-14 md:grid-cols-12">
    <div class="md:col-span-5">
      <a href="<?php echo ROOT_URL; ?>/" class="inline-flex items-center p-2 rounded-xl bg-gradient-to-r from-white to-white/5 ring-1 ring-white/60 backdrop-blur shadow-lg shadow-zinc-900 hover:-translate-y-[4px] transition-all duration-500 ease-in-out">
        <img src="<?php echo url('assets/images/logo2.webp'); ?>" alt="" class="w-[14rem] h-auto">
      </a>
      <p class="mt-4 max-w-md text-sm leading-relaxed text-white/70">
        Discreet investigations and premium guarding. We protect people, assets, and reputations with integrity, structure, and evidence you can trust.
      </p>
      <div class="mt-6 flex flex-wrap gap-2">
        <a href="mailto:<?php echo e(setting('email')); ?>" class="inline-flex items-center rounded-full bg-white/5 px-4 py-2 text-sm font-semibold text-white/90 ring-1 ring-white/10 transition hover:bg-white/10">
          <?php echo e(setting('email')); ?>
        </a>
      </div>
    </div>

    <div class="md:col-span-3">
      <div class="text-sm font-semibold">Explore</div>
      <div class="mt-3 grid gap-2 text-sm text-white/70">
        <a class="transition hover:text-white" href="<?php echo url('about'); ?>">About</a>
        <a class="transition hover:text-white" href="<?php echo url('services'); ?>">Services</a>
        <a class="transition hover:text-white" href="<?php echo url('investigations'); ?>">Investigations</a>
        <a class="transition hover:text-white" href="<?php echo url('guarding'); ?>">Guarding</a>
        <a class="transition hover:text-white" href="<?php echo url('insights'); ?>">Insights</a>
        <a class="transition hover:text-white" href="<?php echo url('contact'); ?>">Contact</a>
      </div>
    </div>

    <div class="md:col-span-4">
      <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
        <div class="text-sm font-semibold"><?php echo e(setting('cta_title', 'Request a consultation')); ?></div>
        <p class="mt-2 text-sm leading-relaxed text-white/70"><?php echo e(setting('cta_subtitle', '')); ?></p>
        <button type="button" data-open-request class="cursor-pointer mt-5 inline-flex w-full items-center justify-center rounded-2xl bg-brand-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-brand-200 active:translate-y-0">
          Start request
        </button>
        <div class="mt-3 text-xs text-white/50">Confidential intake. Fast response.</div>
      </div>
    </div>
  </div>

  <div class="border-t border-white/10">
    <div class="mx-auto flex max-w-6xl flex-col gap-3 px-5 py-6 text-xs text-white/50 md:flex-row md:items-center md:justify-between">
      <div>© <?php echo date('Y'); ?> <?php echo e(setting('site_name', 'Corpsec')); ?>. All rights reserved.</div>
      <div class="flex gap-4">
        <a class="transition hover:text-white" href="">Privacy Policy</a>
        <a class="transition hover:text-white" href="">Terms Of Service</a>
      </div>
    </div>
  </div>
</footer>

<?php include ROOT_PATH . '/includes/request-modal.php'; ?>

<script src="<?php echo url('assets/js/app.js'); ?>"></script>
<script src="<?php echo url('assets/js/header.js'); ?>"></script>
</body>
</html>
