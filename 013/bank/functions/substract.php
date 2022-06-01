<pre>
<?php
$err = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($allAccounts as $key => &$account) {
    if ($account['id'] == $_GET['id']) {
      if ($_POST['sum'] <= 0) {
        $err = 2;
      } else if ($account['balance'] >= $_POST['sum']) {
        $account['balance'] -= $_POST['sum'];
        $err = 0;
      } else {
        $err = 1;
      }
    }
  }
  file_put_contents(__DIR__ . '/../data/accounts.json', json_encode($allAccounts));
  header('Location: http://localhost/my-vienaragiai/013/bank/pages/deductFunds.php?id=' . $_GET['id'] . '&err=' . $err);
  die;
}

?>
</pre>