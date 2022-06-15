<?php

use Bankas\Models\AccountModel;

$title = 'Account list';
require __DIR__ . '/top.php';
require __DIR__ . '/menu.php';
echo AccountModel::accountListModel($convertTo);
require __DIR__ . '/messages.php';
require __DIR__ . '/bottom.php';
