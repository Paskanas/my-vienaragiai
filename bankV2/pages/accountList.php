<?php
require DIR . '/functions/validations/validateDeleteAccount.php';
require DIR . '/functions/formatAccountListTable.php';
require __DIR__ . '/../functions/accountDeletion.php';
$title = 'Account list';
require DIR . '/views/top.php';
$err = 0;
$accountsData = [];
if (file_exists(__DIR__ . '/../data/accounts.json')) {
  $accountsData = json_decode(file_get_contents(__DIR__ . '/../data/accounts.json'), true);
  usort($accountsData, function ($item1, $item2) {
    return $item1['surname'] <=> $item2['surname'];
  });
  // account deletion
  accountDeletion($accountsData);
}
$accountList = formatAccountListTable($accountsData);

require DIR . '/components/menu/menu.php';
echo $accountList;
echo validateDeleteAccount(($url[2] ?? -1), $accountsData);
