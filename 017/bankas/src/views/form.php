<?php

use Bankas\App;

$title = 'Form';
require __DIR__ . '/top.php';
?>

<h1>Alabama form</h1>

<fieldset>
  <legend>Enter</legend>
  <form action="" method="post">
    <input type="text" name="alabama">
    <button type="submit">Submit</button>
    <input type="hidden" name="csrf" value="<?= App::csrf() ?>">
  </form>
</fieldset>
<a href="http://vienaragiubankas.lt/">Nuoroda i pagrindini</a>

<?php
require __DIR__ . '/bottom.php';
