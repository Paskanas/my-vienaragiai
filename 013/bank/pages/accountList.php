<pre>
<?php
require __DIR__ . '/../functions/validations/validateDeleteAccount.php';
require __DIR__ . '/../functions/formatAccountListTable.php';
require __DIR__ . '/../functions/accountDeletion.php';
$err = 0;
$accountsData = [];
if (file_exists(__DIR__ . '/../data/accounts.json')) {
  $accountsData = json_decode(file_get_contents(__DIR__ . '/../data/accounts.json'), true);
  usort($accountsData, function ($item1, $item2) {
    return $item1['surname'] <=> $item2['surname'];
  });
  // account deletion
  accountDeletion($accountsData);
}
$accountList = formatAccountListTable($accountsData);
?>
</pre>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../index.css">
  <title>Account list</title>
</head>

<body>
  <?php require __DIR__ . '/../components/menu/menu.php' ?>
  <?php echo $accountList ?>
  <?php echo validateDeleteAccount(($_GET['err'] ?? -1)); ?>
  <?php echo ($_GET['success'] ?? -1) != -1 ? '<div>Įrašas su asmens kodu ' . $_GET['success'] . ', sėkmingai sukurtas.</div>' : '' ?>
</body>

</html>