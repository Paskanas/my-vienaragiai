<?php
function accountDeletion($accountsData)
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($accountsData as $key => &$data) {
      if ($_POST['delete'] == $data['id']) {
        if ($data['balance'] === 0) {
          unset($accountsData[$key]);
          $err = 1;
          break;
        } else {
          $err = 2;
        }
      }
    }
    file_put_contents(__DIR__ . '/../data/accounts.json', json_encode($accountsData));
    header('Location: ' .  'http://manobankas.lt/pages/accountList' . '/' . $err);
    die;
  }
}
