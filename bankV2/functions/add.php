<pre>
<?php
$err = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($allAccounts as $key => &$account) {
    if ($account['id'] == $url[3]) {
      if ($_POST['sum'] <= 0) {
        $err = 2;
      } else {
        $account['balance'] += $_POST['sum'];
      }
    }
  }
  file_put_contents(DIR . '/data/accounts.json', json_encode($allAccounts));
  header('Location: http://manobankas.lt/pages/accountList/addFunds/' . $url[3] /*. '?err=' . $err*/);
  die;
}

?>
</pre>