<?php

use Bankas\Controllers\AuthorizationController as Auth;

$title = 'Login';
require __DIR__ . '/top.php';
?>
<div class="loginBg">
  <form class="login" action="" method="post">
    <input class="loginInput" type="text" name="name" placeholder="Prisijungimo vardas">
    <input class="loginInput" type="password" name="password" placeholder="Slaptazodis">
    <input type="hidden" name="csrf" value="<?= Auth::csrf() ?>">
    <button class="loginBtn" type="submit">Prisijungti</button>
    <?php require __DIR__ . '/messages.php'; ?>
  </form>
</div>
<?php
require __DIR__ . '/bottom.php';
