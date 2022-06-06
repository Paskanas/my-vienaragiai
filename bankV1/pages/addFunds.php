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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../index.css">
  <title>Add funds</title>
</head>

<body>
  <?php require __DIR__ . '/../components/menu/menu.php' ?>
  <form class="newAccForm" action="http://localhost/my-vienaragiai/013/bank/pages/addFunds.php?id=<?php echo $_GET['id'] ?>" method="post">
    <h3>Vardas: <?php echo '<span>' . $name . '</span>' ?></h3>
    <h3>Pavardė: <?php echo '<span>' . $surname . '</span>' ?></h3>
    <h3>Likutis: <?php echo '<span>' . $balance . '</span>' ?></h3>
    <input type="number" name='sum' placeholder="Suma">
    <button type="submit">Pridėti</button>
    <?php echo $message ?>
  </form>
</body>

</html>