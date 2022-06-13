<header class="header">
  <?php

  use Bankas\Controllers\AuthorizationController as Auth; ?>
  <a href="<?= URL ?>">
    <img class="menuLogo" src="<?= URL ?>content/logo.png" alt="logo image">
  </a>
  <nav class="menu">
    <?php if (Auth::auth()) : ?>
      <a class="menuLink" href="<?= URL ?>">Pagrindinis</a>
      <a class="menuLink" href="<?= URL ?>pages/accountList">Sąskaitų sąrašas</a>
      <a class="menuLink" href="<?= URL ?>newAccount">Naujos sąskaitos sukūrimas</a>
    <?php else : ?>
      <a class="menuLink" href="<?= URL ?>login">Login</a>
    <?php endif;
    require __DIR__ . '/logout.php'; ?>
  </nav>
</header>