<?php

require __DIR__ . '/Services/CacheService.php';

session_start();
$cache = new CacheService;
echo $cache->get();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['visual'] = 'CACHE';
  $output = $cache->get();
  if ($output === null) {
    $_SESSION['visual'] = 'LIVE';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://www.distance24.org/route.json?stops=' . $_POST['from'] . '|' . $_POST['to']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $_SESSION['output'] = curl_exec($ch); //siuncia, laukiam, gaunam
    curl_close($ch);
    $_SESSION['output'] = json_decode($_SESSION['output']);
    header('Content-type: text/javascript');
    header('Location: http://localhost/my-vienaragiai/024/');
    // echo $output->distance;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $dist = $_SESSION['output']->distance ?? '';
  $imageFrom = $_SESSION['output']->stops[0]->wikipedia->image ?? '';
  $imageTo = $_SESSION['output']->stops[1]->wikipedia->image ?? '';
  $visual = $_SESSION['visual'] ?? 'dar nera visualo';
  unset($_SESSION['output']);
?>
  <form action="" method="post">
    <input type="text" name="from" placeholder="from">
    <input type="text" name="to" placeholder="to">
    <button type="submit">Submit</button>
  </form>
  <div><?= $visual ?></div>
  <?php if ($imageFrom) : ?>
    <div>Atstumas: <?= $dist ?></div>
    <img src="<?= $imageFrom ?>" alt="City image">
    <img src="<?= $imageTo ?>" alt="City image">
<?php endif;
}
