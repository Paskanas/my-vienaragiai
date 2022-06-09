<?php
foreach ($allAccounts as $key => $account) {
  if ($account['id'] == $id) {
    $name = $account['name'];
    $surname = $account['surname'];
    $balance = $account['balance'];
  }
}
