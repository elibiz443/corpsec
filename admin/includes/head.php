<?php
$pdo = $GLOBALS['pdo'];
$admin = $admin ?? admin_user($pdo);
$pageTitle = $pageTitle ?? 'Admin';
$active = $active ?? '';
$csrf = csrf_token();
?>
<!doctype html>
<html lang="en" class="scroll-smooth [font-size:1rem] lg:[font-size:1.125rem] 2xl:[font-size:1.25rem]">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo e($pageTitle); ?> • Admin</title>

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">

  
  <link href="<?php echo ROOT_URL; ?>/assets/css/output.css" rel="stylesheet">
  <link rel="icon" href="<?php echo ROOT_URL; ?>/assets/images/favicon.webp">
</head>
<body class="bg-white text-zinc-900 antialiased font-['Inter',ui-sans-serif,system-ui]">
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 h-[54rem] w-[54rem] rounded-full bg-sky-500/15 blur-3xl"></div>
    <div class="absolute top-64 -left-44 h-[42rem] w-[42rem] rounded-full bg-cyan-500/10 blur-3xl"></div>
    <div class="absolute -bottom-44 right-0 h-[46rem] w-[46rem] rounded-full bg-orange-500/10 blur-3xl"></div>
  </div>

  <div class="relative">
    <header class="sticky top-0 z-50 border-b border-black/10 bg-white/80 backdrop-blur">
      <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4">
        <div class="flex items-center gap-3">
          <button type="button" data-admin-menu class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white ring-1 ring-black/10 transition hover:bg-zinc-50 lg:hidden">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
              <path d="M4 7h16M4 12h16M4 17h16" />
            </svg>
          </button>
          <a href="<?php echo url(''); ?>" class="inline-flex items-center gap-3">
            <span class="grid h-9 w-9 place-items-center overflow-hidden rounded-xl bg-zinc-50 ring-1 ring-black/10">
              <img src="<?php echo url('assets/images/logo.webp'); ?>" alt="" class="h-7 w-7">
            </span>
            <span class="hidden text-sm font-semibold tracking-wide text-zinc-900 sm:block">
              Corpsec Investigation
            </span>
          </a>
          <span class="hidden text-xs text-zinc-400 sm:inline">Admin</span>
        </div>

        <div class="flex items-center gap-3">
          <?php if ($admin) { ?>
            <div class="hidden items-center gap-3 rounded-full bg-white px-4 py-2 text-sm text-zinc-600 ring-1 ring-black/10 md:flex">
              <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
              <?php echo e($admin['username']); ?>
            </div>
            <a href="<?php echo url('admin/logout.php'); ?>" class="inline-flex items-center justify-center rounded-full bg-white px-4 py-2 text-sm font-semibold text-zinc-950 transition hover:bg-white/90">Logout</a>
          <?php } ?>
        </div>
      </div>
    </header>

    <div class="mx-auto grid max-w-7xl gap-6 px-5 py-6 lg:grid-cols-12">
      <aside data-admin-panel class="hidden lg:col-span-3 lg:block">
        <?php require __DIR__ . '/sidebar.php'; ?>
      </aside>

      <div class="lg:col-span-9">
        <?php require __DIR__ . '/../../includes/flash.php'; ?>
