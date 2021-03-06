<?php
require __DIR__ . '/../functions/createIBAN.php';
require(__DIR__ . '/../functions/getNewId.php');
require __DIR__ . './../functions/validations/validateIdentity.php';
$title = 'New account';
require DIR . 'views/top.php';
$defaultBalance = 0;
$message = '';
$err = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!file_exists(__DIR__ . '/../data/accounts.json')) {
    file_put_contents(__DIR__ . '/../data/accounts.json', json_encode([]));
  }

  $acountsList = json_decode(file_get_contents(__DIR__ . '/../data/accounts.json'), true);

  $err = validateIdentityCode($acountsList, $_POST['identityCode'], $_POST['name'], $_POST['surname']);
  if ($err == 0) {
    file_put_contents(__DIR__ . '/../data/accounts.json', json_encode([...$acountsList, ['id' => getNewId(), ...$_POST, 'balance' => $defaultBalance]]));
    saveIban($_POST['bankAccount']);
    header('Location: http://manobankas.lt/pages/accountList/' . 0);
    die;
  } else {
    $message = getErrMessage($err);

    // header('Location: http://manobankas.lt/pages/newAccount/' . $err);
    // '?name=' . $_POST['name'] .
    // '&surname=' . $_POST['surname'] .
    // '&identityCode=' . $_POST['identityCode'] .
    // '&err=' . $err);
    // die;
  }
} else {
  if (($url[2] ?? -1) != -1) {
    $message = getErrMessage($url[2]);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../index.css">
  <title>New account</title>
</head>

<body>
  <?php require __DIR__ . '/../components/menu/menu.php' ?>
  <form class="newAccForm" action="" method="post">
    <input type="text" name='name' placeholder="Vardas" required value="<?php echo $_POST['name'] ?? '' ?>">
    <input type="text" name='surname' placeholder="Pavardė" required value="<?php echo $_POST['surname'] ?? '' ?>">
    <input type="text" name='bankAccount' required readonly value="<?php echo createIBAN() ?>">
    <input type="number" name='identityCode' placeholder="Asmens kodas" required value="<?php echo $_POST['identityCode'] ?? '' ?>">
    <button type="submit">Sukurti</button>
    <?php echo $message ?>
  </form>
</body>

</html>