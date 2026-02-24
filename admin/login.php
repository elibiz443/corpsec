<?php
require __DIR__ . '/../connector.php';
$pdo = $GLOBALS['pdo'];
if (isset($_SESSION['admin_id'])) {
  redirect_to(ROOT_URL . '/admin');
}

$pageTitle = 'Login';
$csrf = csrf_token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $token = $_POST['csrf'] ?? '';
  if (!csrf_check($token)) {
    flash_set('error', 'Session expired. Please try again.');
    redirect_to(ROOT_URL . '/admin/login');
  }

  $username = trim((string)($_POST['username'] ?? ''));
  $password = (string)($_POST['password'] ?? '');

  if ($username === '' || $password === '') {
    flash_set('error', 'Enter username and password.');
    redirect_to(ROOT_URL . '/admin/login');
  }

  $user = db_one($pdo, 'SELECT id, username, password_hash FROM users WHERE username = ? LIMIT 1', [$username]);
  if (!$user || !password_verify($password, $user['password_hash'])) {
    flash_set('error', 'Invalid credentials.');
    redirect_to(ROOT_URL . '/admin/login');
  }

  $_SESSION['admin_id'] = (int)$user['id'];
  flash_set('success', 'Welcome back.');
  redirect_to(ROOT_URL . '/admin');
}

$title = $pageTitle . ' • ' . setting('site_name', 'Corpsec');
$description = 'Admin login';
require __DIR__ . '/../includes/login-head.php';
?>
<main class="mx-auto max-w-6xl px-5 pb-14 pt-14 md:pt-20">
  <div class="mx-auto max-w-md">
    <div class="rounded-[2.5rem] bg-white/5 p-7 ring-1 ring-white/10 md:p-10">
      <div class="flex items-center gap-3">
        <span class="grid h-12 w-12 place-items-center overflow-hidden rounded-2xl bg-white/10 ring-1 ring-white/15">
          <img src="<?php echo url(''); ?>assets/images/logo.webp" alt="" class="h-8 w-8">
        </span>
        <div>
          <div class="text-sm font-semibold">Admin login</div>
          <div class="mt-1 text-xs text-white/60"><?php echo e(setting('site_name', 'Corpsec')); ?></div>
        </div>
      </div>

      <form method="post" class="mt-7 grid gap-4">
        <input type="hidden" name="csrf" value="<?php echo e($csrf); ?>">
        <div>
          <label class="text-xs font-semibold text-white/70">Username</label>
          <input name="username" required class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300" value="<?php echo e($_POST['username'] ?? ''); ?>">
        </div>
        <div>
          <label class="text-xs font-semibold text-white/70">Password</label>
          <input type="password" name="password" required class="mt-2 w-full rounded-2xl bg-zinc-950/40 px-4 py-3 text-sm text-white ring-1 ring-white/10 focus:outline-none focus:ring-2 focus:ring-brand-300">
        </div>
        <button type="submit" class="cursor-pointer mt-2 inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:-translate-y-0.5 hover:bg-white/90 active:translate-y-0">Sign in</button>
        <a href="<?php echo url(''); ?>" class="text-center text-xs text-white/60 transition hover:text-white">Back to website</a>
      </form>
    </div>

    <div class="mt-4 text-center text-xs text-white/40">Default username: supreme_admin</div>
  </div>
</main>
