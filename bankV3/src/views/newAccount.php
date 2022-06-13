<?php

use Bankas\Controllers\AuthorizationController as Auth;

$title = 'New account';
require __DIR__ . '/top.php';
require __DIR__ . '/menu.php';
?>
<form class="newAccForm" action="" method="post">
  <input type="text" name='name' placeholder="Vardas" required value="<?= $name ?? '' ?>">
  <input type="text" name='surname' placeholder="Pavardė" required value="<?= $surname ?? '' ?>">
  <input type="text" name='bankAccount' required readonly value="<?= substr($bankAccount, 0, 4) . ' ' . substr($bankAccount, 4, 4) . ' ' . substr($bankAccount, 8, 4) . ' ' . substr($bankAccount, 12, 4) . ' ' . substr($bankAccount, 16, 4)  ?>">
  <input type="number" name='identityCode' placeholder="Asmens kodas" required value="<?= $identityCode ?? '' ?>">
  <input type="hidden" name="csrf" value="<?= Auth::csrf() ?>">
  <button type="submit">Sukurti</button>
</form>
<?php require __DIR__ . '/messages.php'; ?>
<?php require __DIR__ . '/bottom.php';
