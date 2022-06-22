<?php
$title = 'Home';
require __DIR__ . '/top.php';
?>

<h1><?= $content ?></h1>
<ul>
  <?php foreach ($list as $listVal) : ?>
    <li><?= $listVal ?></li>
  <?php endforeach ?>
</ul>
<a href="http://vienaragiubankas.lt/form/">Nuoroda i forma</a>
<?php
require __DIR__ . '/bottom.php';
