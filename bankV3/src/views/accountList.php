<?php
require __DIR__ . '/../app/functions/formatAccountListTable.php';
$title = 'Account list';
require __DIR__ . '/top.php';
$err = 0;
$accountsData = [];
if (file_exists(__DIR__ . '/../data/accounts.json')) {
  $accountsData = json_decode(file_get_contents(__DIR__ . '/../data/accounts.json'), true);
  usort($accountsData, function ($item1, $item2) {
    return $item1['surname'] <=> $item2['surname'];
  });
}
$accountList = formatAccountListTable($accountsData);

require __DIR__ . '/menu.php';
echo $accountList;


require __DIR__ . '/bottom.php';
