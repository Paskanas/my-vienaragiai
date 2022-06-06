<?php
$urlStart1 = '';
$urlStart2 = '';
$ulrArr = explode('/', $_SERVER['REQUEST_URI']);
if (in_array('pages', $ulrArr)) {
  $urlStart1 = '../';
  $urlStart2 = '';
} else {
  $urlStart1 = '';
  $urlStart2 = 'pages/';
}
?>
<header class="header">

  <a href="./<?php echo $urlStart1 ?>index.php">
    <img class="menuLogo" src="./<?php echo $urlStart1 ?>content/logo.png" alt="logo image">
  </a>
  <nav class="menu">
    <a class="menuLink" href="./<?php echo $urlStart1 ?>index.php">Pagrindinis</a>
    <a class="menuLink" href="./<?php echo $urlStart2 ?>accountList.php">Sąskaitų sąrašas</a>
    <a class="menuLink" href="./<?php echo $urlStart2 ?>newAccount.php">Naujos sąskaitos sukūrimas</a>
    <!-- 
    <a class="menuLink" href="./addFunds.php">Pridėti lėšas</a>
    <a class="menuLink" href="./deductFunds.php">Nuskaičiuoti lėšas</a>
    -->
  </nav>
</header>