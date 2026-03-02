<?php
require __DIR__ . '/connector.php';

$pdo = $GLOBALS['pdo'];

$q = $_GET['q'] ?? '';
$q = trim((string)$q);
$q = preg_replace('/\s+/', ' ', $q);
if (mb_strlen($q) > 80) $q = mb_substr($q, 0, 80);

function search_snippet(string $text, string $q): string {
  $plain = trim(preg_replace('/\s+/', ' ', strip_tags($text)));
  if ($plain === '') return '';

  $terms = preg_split('/\s+/', trim($q)) ?: [];
  $terms = array_values(array_filter($terms, fn($t) => mb_strlen($t) >= 2));
  $terms = array_slice($terms, 0, 6);

  $lower = mb_strtolower($plain);
  $pos = null;

  foreach ($terms as $t) {
    $p = mb_stripos($plain, $t);
    if ($p !== false && ($pos === null || $p < $pos)) $pos = $p;
  }

  $start = 0;
  if ($pos !== null) {
    $start = max(0, $pos - 70);
  }

  $len = 200;
  $cut = mb_substr($plain, $start, $len);
  $prefix = $start > 0 ? '… ' : '';
  $suffix = (mb_strlen($plain) > ($start + $len)) ? ' …' : '';

  $markerOpen = '[[H]]';
  $markerClose = '[[/H]]';
  $marked = $cut;

  foreach ($terms as $t) {
    $re = '/' . preg_quote($t, '/') . '/iu';
    $marked = preg_replace($re, $markerOpen . '$0' . $markerClose, $marked);
  }

  $escaped = e($marked);
  $escaped = str_replace(
    [$markerOpen, $markerClose],
    [
      '<span class="rounded bg-sky-100 px-1 font-semibold text-sky-800">',
      '</span>'
    ],
    $escaped
  );

  return $prefix . $escaped . $suffix;
}

$title = 'Search • ' . setting('site_name', 'Corpsec');
$description = $q !== '' ? ('Search results for: ' . $q) : 'Search the site.';
require __DIR__ . '/includes/head.php';

$results = [];
$total = 0;

if ($q !== '' && mb_strlen($q) >= 2) {
  $like = '%' . str_replace(['%', '_'], ['\%', '\_'], $q) . '%';

  $services = db_all(
    $pdo,
    'SELECT id, category, title, short_desc, body FROM services
    WHERE is_active = 1 AND (title LIKE ? OR short_desc LIKE ? OR body LIKE ?)
    ORDER BY sort_order, title
    LIMIT 30',
    [$like, $like, $like]
  );

  foreach ($services as $s) {
    $cat = (string)($s['category'] ?? '');
    $id = (int)($s['id'] ?? 0);

    $href = url('services') . '#s' . $id;
    if ($cat === 'Investigation') $href = url('investigations') . '#s' . $id;
    if ($cat === 'Guarding') $href = url('guarding') . '#s' . $id;

    $results[] = [
      'type' => 'Service',
      'group' => $cat === 'Guarding' ? 'Guarding' : 'Investigation',
      'title' => (string)($s['title'] ?? ''),
      'href' => $href,
      'snippet' => search_snippet(($s['short_desc'] ?? '') . ' ' . ($s['body'] ?? ''), $q)
    ];
  }

  $posts = db_all(
    $pdo,
    'SELECT title, slug, excerpt, body, published_at FROM posts
    WHERE is_published = 1 AND (title LIKE ? OR excerpt LIKE ? OR body LIKE ?)
    ORDER BY published_at DESC
    LIMIT 30',
    [$like, $like, $like]
  );

  foreach ($posts as $p) {
    $results[] = [
      'type' => 'Insight',
      'group' => 'Insights',
      'title' => (string)($p['title'] ?? ''),
      'href' => url('post.php') . '?slug=' . e($p['slug'] ?? ''),
      'snippet' => search_snippet(($p['excerpt'] ?? '') . ' ' . ($p['body'] ?? ''), $q)
    ];
  }

  $total = count($results);
  $results = array_slice($results, 0, 40);
}
?>

<main class="min-h-screen">
  <section class="mx-auto max-w-6xl px-5 pb-10 pt-14 md:pb-14 md:pt-20 scroll-mt-[5.75rem]">
    <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-white via-white to-sky-50/40 ring-1 ring-black/10">
      <div class="p-7 md:p-10">
        <div class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-4 py-2 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-200/60">
          Search
        </div>

        <h1 class="mt-5 font-['Sora',ui-sans-serif,system-ui] text-4xl font-semibold leading-[1.08] tracking-tight md:text-5xl">
          Find what you need
        </h1>

        <p class="mt-3 max-w-2xl text-base leading-relaxed text-zinc-600">
          Search across services and insights.
        </p>

        <form action="<?php echo url('search.php'); ?>" method="GET" class="mt-6">
          <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <div class="relative flex-1">
              <label for="q" class="sr-only">Search</label>
              <input
                id="q"
                name="q"
                type="search"
                value="<?php echo e($q); ?>"
                placeholder="Search…"
                autocomplete="off"
                class="w-full rounded-2xl bg-white ring-1 ring-black/10 px-10 py-3 text-base text-zinc-900 placeholder:text-zinc-400 focus:outline-none focus:ring-2 focus:ring-sky-300"
              >
              <svg class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-zinc-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="M21 21l-4.35-4.35"></path>
              </svg>
            </div>

            <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-sky-600 px-6 py-3 text-base font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-700 active:translate-y-0">
              Search
            </button>
          </div>

          <?php if ($q !== '' && mb_strlen($q) < 2) { ?>
            <div class="mt-3 text-sm text-orange-700">
              Enter at least 2 characters to search.
            </div>
          <?php } ?>
        </form>

        <?php if ($q !== '' && mb_strlen($q) >= 2) { ?>
          <div class="mt-6 flex flex-wrap items-center gap-2">
            <div class="rounded-full bg-white px-4 py-2 text-sm text-zinc-700 ring-1 ring-black/10">
              <span class="font-semibold"><?php echo (int)$total; ?></span> results for
              <span class="font-semibold"><?php echo e($q); ?></span>
            </div>
            <a href="<?php echo url('services'); ?>" class="rounded-full bg-indigo-50 px-4 py-2 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">
              Browse services
            </a>
            <a href="<?php echo url('insights'); ?>" class="rounded-full bg-sky-50 px-4 py-2 text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60 transition hover:bg-sky-100">
              View insights
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-6xl px-5 pb-14 scroll-mt-[5.75rem]">
    <?php if ($q === '') { ?>
      <div class="rounded-[2.5rem] bg-white p-8 ring-1 ring-black/10 md:p-10">
        <div class="text-sm font-semibold">Popular links</div>
        <div class="mt-4 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
          <a href="<?php echo url('services'); ?>" class="rounded-2xl bg-sky-50 px-5 py-4 text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60 transition hover:bg-sky-100">Services</a>
          <a href="<?php echo url('investigations'); ?>" class="rounded-2xl bg-indigo-50 px-5 py-4 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">Investigations</a>
          <a href="<?php echo url('guarding'); ?>" class="rounded-2xl bg-orange-50 px-5 py-4 text-sm font-semibold text-orange-700 ring-1 ring-orange-200/60 transition hover:bg-orange-100">Guarding</a>
          <a href="<?php echo url('insights'); ?>" class="rounded-2xl bg-white px-5 py-4 text-sm font-semibold text-zinc-800 ring-1 ring-black/10 transition hover:bg-zinc-50">Insights</a>
          <a href="<?php echo url('about'); ?>" class="rounded-2xl bg-white px-5 py-4 text-sm font-semibold text-zinc-800 ring-1 ring-black/10 transition hover:bg-zinc-50">About</a>
          <a href="<?php echo url('contact'); ?>" class="rounded-2xl bg-white px-5 py-4 text-sm font-semibold text-zinc-800 ring-1 ring-black/10 transition hover:bg-zinc-50">Contact</a>
        </div>
      </div>
    <?php } else { ?>
      <?php if ($total === 0) { ?>
        <div class="rounded-[2.5rem] bg-white p-8 ring-1 ring-black/10 md:p-10">
          <h2 class="font-['Sora',ui-sans-serif,system-ui] text-2xl font-semibold tracking-tight md:text-3xl">
            No results found
          </h2>
          <p class="mt-3 text-base leading-relaxed text-zinc-600">
            Try different keywords or browse services and insights.
          </p>
          <div class="mt-6 flex flex-wrap gap-2">
            <a href="<?php echo url('services'); ?>" class="rounded-full bg-indigo-50 px-5 py-3 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200/60 transition hover:bg-indigo-100">Services</a>
            <a href="<?php echo url('insights'); ?>" class="rounded-full bg-sky-50 px-5 py-3 text-sm font-semibold text-sky-700 ring-1 ring-sky-200/60 transition hover:bg-sky-100">Insights</a>
            <button type="button" data-open-request class="cursor-pointer rounded-full bg-orange-500 px-5 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-orange-600 active:translate-y-0">Request consultation</button>
          </div>
        </div>
      <?php } else { ?>
        <div class="grid gap-3">
          <?php foreach ($results as $r) { ?>
            <div class="rounded-[2.5rem] bg-gradient-to-br from-white via-white to-zinc-50/40 p-7 ring-1 ring-black/10 md:p-8">
              <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                <div class="min-w-0">
                  <div class="flex flex-wrap items-center gap-2">
                    <?php if ($r['type'] === 'Insight') { ?>
                      <div class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-200/60">Insight</div>
                    <?php } else { ?>
                      <?php if (($r['group'] ?? '') === 'Guarding') { ?>
                        <div class="rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700 ring-1 ring-orange-200/60">Service</div>
                        <div class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-zinc-700 ring-1 ring-black/10">Guarding</div>
                      <?php } else { ?>
                        <div class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700 ring-1 ring-sky-200/60">Service</div>
                        <div class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-zinc-700 ring-1 ring-black/10">Investigation</div>
                      <?php } ?>
                    <?php } ?>
                  </div>

                  <div class="mt-4 text-xl font-semibold tracking-tight text-zinc-900 md:text-2xl">
                    <?php echo e($r['title']); ?>
                  </div>

                  <?php if (!empty($r['snippet'])) { ?>
                    <div class="mt-3 text-base leading-relaxed text-zinc-600">
                      <?php echo $r['snippet']; ?>
                    </div>
                  <?php } ?>
                </div>

                <div class="shrink-0">
                  <a href="<?php echo $r['href']; ?>" class="inline-flex items-center justify-center rounded-2xl bg-sky-600 px-5 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-700 active:translate-y-0">
                    Open
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    <?php } ?>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
