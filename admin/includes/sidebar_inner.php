<?php
$items = [
  ['Dashboard', url('admin/index.php'), 'dashboard'],
  ['Settings', url('admin/settings.php'), 'settings'],
  ['Services', url('admin/services.php'), 'services'],
  ['Team', url('admin/team.php'), 'team'],
  ['Testimonials', url('admin/testimonials.php'), 'testimonials'],
  ['Stats', url('admin/stats.php'), 'stats'],
  ['Partners', url('admin/partners.php'), 'partners'],
  ['Posts', url('admin/posts.php'), 'posts'],
  ['Media', url('admin/media.php'), 'media'],
  ['Inquiries', url('admin/inquiries.php'), 'inquiries']
];
?>
<div class="rounded-[2.5rem] bg-white p-4 ring-1 ring-black/10">
  <div class="px-3 py-2">
    <div class="text-sm font-semibold">Control panel</div>
    <div class="mt-1 text-xs text-zinc-500">Edit content that populates the website.</div>
  </div>
  <div class="mt-3 grid gap-2">
    <?php foreach ($items as $it) { ?>
      <a href="<?php echo e($it[1]); ?>" class="flex items-center justify-between rounded-2xl px-4 py-3 text-sm ring-1 ring-black/10 transition <?php echo $active === $it[2] ? 'bg-white text-zinc-950' : 'bg-zinc-50 text-zinc-700 hover:bg-zinc-50'; ?>">
        <span><?php echo e($it[0]); ?></span>
        <svg viewBox="0 0 24 24" class="h-4 w-4 opacity-70" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 18l6-6-6-6" />
        </svg>
      </a>
    <?php } ?>
  </div>
  <div class="mt-4 rounded-2xl bg-zinc-50 p-4 ring-1 ring-black/10">
    <div class="text-xs font-semibold text-zinc-500">Quick</div>
    <div class="mt-3 grid gap-2">
      <a href="<?php echo url(''); ?>" class="rounded-xl bg-white px-4 py-2 text-xs font-semibold text-zinc-700 ring-1 ring-black/10 transition hover:bg-zinc-50">View website</a>
      <button type="button" data-open-request class="rounded-xl bg-white px-4 py-2 text-left text-xs font-semibold text-zinc-700 ring-1 ring-black/10 transition hover:bg-zinc-50">Open request modal</button>
    </div>
  </div>
</div>
