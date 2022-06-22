<?php

use Bankas\App;

if (App::auth()) : ?>
  <form method="post" action="<?= App::url('') ?>">
    <span><?= App::getAuthName() ?></span>
    <button name='logout' type="submit">Logout</button>
  </form>
<?php endif ?>