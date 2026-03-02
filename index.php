<?php
  require __DIR__ . '/connector.php';
  require __DIR__ . '/actions/home.php';
  require __DIR__ . '/includes/head.php';
?>

<main id="top" class="min-h-screen">
  <?php require __DIR__ . '/sections/home/hero.php'; ?>
  <?php require __DIR__ . '/sections/home/performance.php'; ?>
  <?php require __DIR__ . '/sections/home/partners.php'; ?>
  <?php require __DIR__ . '/sections/home/services.php'; ?>
  <?php require __DIR__ . '/sections/home/case-briefs.php'; ?>
  <?php require __DIR__ . '/sections/home/team.php'; ?>
  <?php require __DIR__ . '/sections/home/testimonials.php'; ?>
  <?php require __DIR__ . '/sections/home/blogs.php'; ?>
  <?php require __DIR__ . '/sections/home/cta.php'; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
