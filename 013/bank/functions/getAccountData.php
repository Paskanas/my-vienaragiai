<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  foreach ($allAccounts as $key => $account) {
    if ($account['id'] == $_GET['id']) {
      $name = $account['name'];
      $surname = $account['surname'];
      $balance = $account['balance'];
    }
  }
}
