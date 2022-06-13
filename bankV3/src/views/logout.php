<?php

use Bankas\Controllers\AuthorizationController as Auth;

if (Auth::auth() ?? false) : ?>
  <form method="post" action="<?= URL . 'logout' ?>">
    <span class="logoutText">Sveiki, <?= Auth::getAuthName() ?></span>
    <button name='logout' type="submit">Logout</button>
  </form>
<?php endif;
?>