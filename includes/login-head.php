<?php
  $title = $title ?? setting('site_name', 'Corpsec');
  $description = $description ?? setting('meta_description', '');
  $canonical = $canonical ?? '';
  $csrf = csrf_token();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo e($title); ?></title>
  <meta name="description" content="<?php echo e($description); ?>">
  <?php if ($canonical) { ?><link rel="canonical" href="<?php echo e($canonical); ?>"><?php } ?>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link href="<?php echo ROOT_URL; ?>/assets/css/output.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo ROOT_URL; ?>/assets/images/favicon.webp">
</head>
<body class="bg-zinc-950 text-zinc-100 antialiased selection:bg-brand-300 selection:text-zinc-950 max-w-full overflow-x-hidden">
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 h-[54rem] w-[54rem] rounded-full bg-brand-500/20 blur-3xl"></div>
    <div class="absolute top-64 -left-44 h-[42rem] w-[42rem] rounded-full bg-cyan-500/10 blur-3xl"></div>
    <div class="absolute -bottom-44 right-0 h-[46rem] w-[46rem] rounded-full bg-accent-500/10 blur-3xl"></div>
  </div>
  <?php require __DIR__ . '/flash.php'; ?>