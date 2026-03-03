<section class="relative w-[90%] mx-auto py-14 scroll-mt-[5.75rem] overflow-hidden">
  <div class="absolute -bottom-[1rem] md:top-0 -left-[18rem] md:left-0 lg:-left-[20rem] w-full h-1/3 md:h-full bg-[#ec742c]/80 rotate-[60deg] xl:rotate-[40deg]"></div>

  <div class="relative z-10 grid gap-3 md:grid-cols-4 px-6">
    <?php
      $cards = [
        ['bg' => 'bg-gradient-to-br from-sky-50 via-white to-white', 'ring' => 'ring-sky-200/60', 'value' => 'text-sky-800'],
        ['bg' => 'bg-gradient-to-br from-indigo-50 via-white to-white', 'ring' => 'ring-indigo-200/60', 'value' => 'text-indigo-800'],
        ['bg' => 'bg-gradient-to-br from-orange-50 via-white to-white', 'ring' => 'ring-orange-200/60', 'value' => 'text-orange-800'],
        ['bg' => 'bg-gradient-to-br from-sky-50 via-indigo-50 to-white', 'ring' => 'ring-black/10', 'value' => 'text-zinc-900']
      ];
      $i = 0;
    ?>
    <?php foreach ($stats as $st) {
      $card = $cards[$i % count($cards)];
      $i++;

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
      <div data-reveal class="rounded-[2.25rem] <?php echo $card['bg']; ?> p-7 ring-1 <?php echo $card['ring']; ?>">
        <div class="text-sm xl:text-lg font-semibold text-zinc-600">
          <?php echo e($st['label_text']); ?>
        </div>

        <div class="mt-4 font-['Sora',ui-sans-serif,system-ui] text-4xl xl:text-5xl font-semibold tracking-tight <?php echo $card['value']; ?>">
          <?php if ($isNum) { ?>
            <span data-count-to="<?php echo e($num); ?>"><?php echo e($num); ?></span><?php echo e($suffix); ?>
          <?php } else { ?>
            <?php echo e($raw); ?>
          <?php } ?>
        </div>

        <div class="mt-2 text-xs xl:text-sm text-zinc-500">Measured performance</div>
      </div>
    <?php } ?>
  </div>
</section>
