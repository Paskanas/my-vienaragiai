<?php
require __DIR__ . '/../app/functions/createIBAN.php';
require __DIR__ . '/../app/functions/getNewId.php';
require __DIR__ . './../app/functions/validations/validateIdentity.php';

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
$title = 'New account';
require __DIR__ . '/top.php';
require __DIR__ . '/menu.php';
echo createIBAN();
?>
<form class="newAccForm" action="" method="post">
  <input type="text" name='name' placeholder="Vardas" required value="<?= $_POST['name'] ?? '' ?>">
  <input type="text" name='surname' placeholder="Pavardė" required value="<?= $_POST['surname'] ?? '' ?>">
  <input type="text" name='bankAccount' required readonly value="<?= createIBAN() ?>">
  <input type="number" name='identityCode' placeholder="Asmens kodas" required value="<?= $_POST['identityCode'] ?? '' ?>">
  <button type="submit">Sukurti</button>
  <?php echo $message ?>
</form>

<?php require __DIR__ . '/bottom.php';
