<?php

use Bankas\Validations\Messages;

foreach ($allAccounts as $key => &$account) {
  if ($account['id'] == $id) {
    if ($_POST['sum'] <= 0) {
      Messages::add('Suma negali būti mažesnė ar lygi 0', 'error');
    } else {
      $account['balance'] += $_POST['sum'];
    }
  }
}
file_put_contents(__DIR__ . '/../../data/accounts.json', json_encode($allAccounts));
