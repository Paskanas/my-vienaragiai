<?php
$allAccounts = [];
$name = '';
$surname = '';
$balance = 0;
$message = '';
if (file_exists(__DIR__ . '/../data/accounts.json')) {
  $allAccounts = json_decode(file_get_contents(__DIR__ . '/../data/accounts.json'), true);
}
require(__DIR__ . '/../functions/substract.php');
require(__DIR__ . '/../functions/getAccountData.php');
require __DIR__ . '/../functions/validations/validateSubstract.php';
$err = $url[4] ?? 0;
echo $err;
$message = validateSubtract($err);

$title = 'Add funds';
require __DIR__ . '/views/top.php';
require __DIR__ . '/../components/menu/menu.php'
?>
<form class="newAccForm" action="http://manobankas.lt/pages/accountList/deductFunds/<?= $url[3] ?>" method="post">
  <h2>Vardas: <?php echo $name ?></h2>
  <h2>Pavardė: <?php echo $surname ?></h2>
  <h2>Likutis: <?php echo $balance ?></h2>
  <input type="number" name='sum' placeholder="Suma">
  <button>Nuskaičiuoti</button>
  <?php echo $message ?>
</form>
</body>

</html>