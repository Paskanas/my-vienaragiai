<?php

use Bankas\Controllers\AuthorizationController as Auth;

$title = 'Add funds';
require __DIR__ . '/top.php';
require __DIR__ . '/menu.php'
?>
<form class="newAccForm" method="post">
  <?php require __DIR__ . '/accountInformation.php'; ?>
  <input type="number" name='sum' placeholder="Suma">
  <button type="submit">Pridėti</button>
  <input type="hidden" name="csrf" value="<?= Auth::csrf() ?>">
</form>
<?php
require __DIR__ . '/messages.php';
require __DIR__ . '/bottom.php';
