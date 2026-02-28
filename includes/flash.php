<?php
$f = flash_get();
if (!$f) return;
$type = $f['type'] ?? 'info';
$text = $f['text'] ?? '';
$bg = $type === 'success' ? 'bg-emerald-300/15 text-emerald-700 ring-emerald-300/20' : ($type === 'error' ? 'bg-rose-300/15 text-rose-700 ring-rose-300/20' : 'bg-zinc-50 text-zinc-700 ring-black/10');
?>
<div class="relative z-z-[99999]">
  <div class="mx-auto max-w-6xl px-5 pt-4 my-4">
    <div class="rounded-2xl px-4 py-3 text-sm ring-1 <?php echo e($bg); ?>">
      <?php echo e($text); ?>
    </div>
  </div>
</div>
