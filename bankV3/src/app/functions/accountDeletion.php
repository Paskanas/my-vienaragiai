<?php

use Bankas\Validations\Messages;

require __DIR__ . '/validations/validateDeleteAccount.php';

function accountDeletion($accountsData)
{
  foreach ($accountsData as $key => &$data) {
    if ($_POST['delete'] == $data['id']) {
      if ($data['balance'] === 0) {
        unset($accountsData[$key]);
        Messages::add(validateDeleteAccount(1, $accountsData), 'error');
        // $err = 1;
        break;
      } else {
        // $err = 2;
        Messages::add(validateDeleteAccount(2, $accountsData), 'error');
      }
    }
  }
  file_put_contents(__DIR__ . '/../../data/accounts.json', json_encode($accountsData));
}
