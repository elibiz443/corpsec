<?php
$f = flash_get();
if (!$f) return;
$type = $f['type'] ?? 'info';
$text = $f['text'] ?? '';
$bg = $type === 'success' ? 'bg-emerald-300/15 text-emerald-200 ring-emerald-300/20' : ($type === 'error' ? 'bg-rose-300/15 text-rose-200 ring-rose-300/20' : 'bg-white/10 text-white/80 ring-white/15');
?>
<div class="relative z-z-[99999]">
  <div class="mx-auto max-w-6xl px-5 pt-4 my-4">
    <div class="rounded-2xl px-4 py-3 text-sm ring-1 <?php echo e($bg); ?>">
      <?php echo e($text); ?>
    </div>
  </div>
</div>
