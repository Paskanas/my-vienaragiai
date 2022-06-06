<?php
$id = $url[3];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  foreach ($allAccounts as $key => $account) {
    if ($account['id'] == $id) {
      $name = $account['name'];
      $surname = $account['surname'];
      $balance = $account['balance'];
    }
  }
}
