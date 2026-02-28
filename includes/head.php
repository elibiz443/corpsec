<?php
  $title = $title ?? setting('site_name', 'Corpsec');
  $description = $description ?? setting('meta_description', '');
  $canonical = $canonical ?? '';
  $csrf = csrf_token();
?>
<!doctype html>
<html lang="en" class="scroll-smooth [font-size:1rem] lg:[font-size:1.125rem] 2xl:[font-size:1.25rem]">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo e($title); ?></title>
  <meta name="description" content="<?php echo e($description); ?>">
  <?php if ($canonical) { ?><link rel="canonical" href="<?php echo e($canonical); ?>"><?php } ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="<?php echo ROOT_URL; ?>/assets/css/output.css" rel="stylesheet">
  <link rel="icon" href="<?php echo ROOT_URL; ?>/assets/images/favicon.webp">
</head>
<body class="bg-zinc-50 text-zinc-900 antialiased selection:bg-sky-500 selection:text-white max-w-full overflow-x-hidden font-['Inter',ui-sans-serif,system-ui]">
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-28 left-1/2 -translate-x-1/2 h-[54rem] w-[54rem] rounded-full bg-sky-500/10 blur-3xl"></div>
    <div class="absolute top-56 -left-44 h-[44rem] w-[44rem] rounded-full bg-indigo-500/10 blur-3xl"></div>
    <div class="absolute -bottom-52 right-0 h-[46rem] w-[46rem] rounded-full bg-orange-500/10 blur-3xl"></div>
  </div>
  <?php require __DIR__ . '/header.php'; ?>
  <?php require __DIR__ . '/flash.php'; ?>
