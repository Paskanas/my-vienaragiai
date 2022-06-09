<?php
$allAccounts = [];
$name = '';
$surname = '';
$balance = 0;
$message = '';
if (file_exists(__DIR__ . '/../data/accounts.json')) {
  $allAccounts = json_decode(file_get_contents(__DIR__ . '/../data/accounts.json'), true);
}
require(__DIR__ . '/../functions/add.php');
require(__DIR__ . '/../functions/getAccountData.php');
if (($_GET['err'] ?? -1) == 2) {
  $message = '<div>Suma negali būti mažesnė ar lygi 0</div>';
}

$title = 'Add funds';
require DIR . 'views/top.php';
require __DIR__ . '/../components/menu/menu.php'
?>
<form class="newAccForm" action="http://manobankas.lt/pages/accountList/addFunds/<?= $url[3] ?>" method="post">
  <h3>Vardas: <?php echo '<span>' . $name . '</span>' ?></h3>
  <h3>Pavardė: <?php echo '<span>' . $surname . '</span>' ?></h3>
  <h3>Likutis: <?php echo '<span>' . $balance . '</span>' ?></h3>
  <input type="number" name='sum' placeholder="Suma">
  <button type="submit">Pridėti</button>
  <?php echo $message ?>
</form>
</body>

</html>