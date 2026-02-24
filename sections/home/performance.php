<section class="w-[90%] mx-auto pb-14">
  <div class="grid gap-3 md:grid-cols-4">
    <?php foreach ($stats as $st) {
      $raw = trim((string)$st['value_text']);

      $isNum = false;
      $num = '';
      $suffix = '';

      if (preg_match('/^(\d+)(.*)$/', $raw, $m)) {
        $num = $m[1];
        $suffix = $m[2];
        $isNum = strlen($num) <= 9;
      }
    ?>
      <div data-reveal class="rounded-[2.25rem] bg-white/5 p-7 ring-1 ring-white/10">
        <div class="text-xs font-semibold text-white/60">
          <?php echo e($st['label_text']); ?>
        </div>

        <div class="mt-4 font-display text-4xl font-semibold tracking-tight text-white">
          <?php if ($isNum) { ?>
            <span data-count-to="<?php echo e($num); ?>"><?php echo e($num); ?></span><?php echo e($suffix); ?>
          <?php } else { ?>
            <?php echo e($raw); ?>
          <?php } ?>
        </div>

        <div class="mt-2 text-xs text-white/60">Measured performance</div>
      </div>
    <?php } ?>
  </div>
</section>
