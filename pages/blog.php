<?php
  require __DIR__ . '/../connector.php';
  require __DIR__ . '/../actions/blog.php';
  require __DIR__ . '/../includes/head.php';
?>

<main class="min-h-screen">
  <?php require __DIR__ . '/../sections/blog/hero.php'; ?>
  <?php require __DIR__ . '/../sections/blog/body.php'; ?>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
