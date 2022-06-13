<?php
$title = 'Main page';
require __DIR__ . '/top.php';
require __DIR__ . '/menu.php'
?>
<div class="mainPageBG">
  <h1 class="welcome">Sveiki!</h1>

  <ul class="mainPageLinks">
    <a class="mpLink" href="./pages/accountList">
      <li>
        Sąskaitų sąrašas
      </li>
    </a>
    <a class="mpLink" href="./newAccount">
      <li>
        Naujos sąskaitos sukūrimas
      </li>
    </a>
  </ul>

</div>
<?php
require __DIR__ . '/messages.php';
require __DIR__ . '/bottom.php';
