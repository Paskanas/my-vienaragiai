<?php
define('INSTALL', '/my-vienaragiai/bankV2/');
// echo __DIR__ . '<br>';
define('DIR', __DIR__ . '/');
define('URL', 'http://manobankas.lt/');
$url = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
$url = explode('/', $url);
array_shift($url);
print_r($url);

if (count($url) > 1) {
  if ($url[0] === 'pages') {
    if ($url[1] === 'accountList') {
      if (isset($url[2])) {
        if ($url[2] === 'addFunds') {
          require __DIR__ . '/pages/addFunds.php';
        } else if ($url[2] === 'deductFunds') {
          require __DIR__ . '/pages/deductFunds.php';
        } else {
          require __DIR__ . '/pages/accountList.php';
        }
      } else {
        require __DIR__ . '/pages/accountList.php';
      }
    } else if ($url[1] === 'newAccount') {
      require __DIR__ . '/pages/newAccount.php';
    } else {
      require __DIR__ . '/components/mainPage/mainPage.php';
    }
  } else {
    require __DIR__ . '/components/mainPage/mainPage.php';
  }
} else {
  require __DIR__ . '/components/mainPage/mainPage.php';
}
require __DIR__ . '/views/bottom.php';
