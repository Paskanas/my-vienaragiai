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
    <a class="mpLink" href="./pages/newAccount">
      <li>
        Naujos sąskaitos sukūrimas
      </li>
    </a>
  </ul>
  <!-- <form class="loginForm" action="" method="post">
      <label for="">Vartotojo vardas</label>
      <input class="loginInput" type="text" placeholder="Įveskite vartotojo vardą">
      <label for="">Slaptažodis</label>
      <input class="loginInput" type="password" placeholder="Įveskite slaptažodį">
      <button type="submit">Prisijungti</button>
    </form> -->

</div>

<?php require __DIR__ . '/bottom.php';
