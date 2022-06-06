<!-- <pre> -->
<?php
//settings
define('DIR', __DIR__ . '/app/');
define('URL', 'http://localhost/my-vienaragiai/014/lesson/in/');
define('INSTALL', '/my-vienaragiai/014/lesson/in/');

$uri = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
$uriArr = explode('/', $uri);

// echo $uri;
// print_r($uriArr);

//router

if (count($uriArr) === 2) {
  if ($uriArr[0] === 'kambarys') {
    if ($uriArr[1] === '1') {
      require __DIR__ . '/app/kambarys1.php';
    } else if ($uriArr[1] === '2') {
      require __DIR__ . '/app/kambarys2.php';
    } else {
      require __DIR__ . '/app/404.php';
    }
  } else if ($uriArr[0] == 'add-funds') {
    $userId = (int) $uriArr[1];
    require __DIR__ . '/app/addMoney.php';
  } else {
    require __DIR__ . '/app/404.php';
  }
} else {
  require __DIR__ . '/app/404.php';
}
