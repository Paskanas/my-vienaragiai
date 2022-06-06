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
$message = validateSubtract($_GET['err'] ?? -1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../index.css">
  <title>Deduct funds</title>
</head>

<body>
  <?php require __DIR__ . '/../components/menu/menu.php' ?>
  <form class="newAccForm" action="http://localhost/my-vienaragiai/013/bank/pages/deductFunds.php?id=<?php echo $_GET['id'] ?>" method="post">
    <h2>Vardas: <?php echo $name ?></h2>
    <h2>Pavardė: <?php echo $surname ?></h2>
    <h2>Likutis: <?php echo $balance ?></h2>
    <input type="number" name='sum' placeholder="Suma">
    <button>Nuskaičiuoti</button>
    <?php echo $message ?>
  </form>
</body>

</html>