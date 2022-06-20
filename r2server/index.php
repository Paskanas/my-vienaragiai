<?php
//settings
define('DIR', __DIR__ . '/app/');
define('URL', 'http://localhost/my-vienaragiai/r2server/');
define('INSTALL', '/my-vienaragiai/r2server/');
require __DIR__ . '/JsonDb.php';

$db = new JsonDB('farm');
$uri = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
$uri = explode('/', $uri);

// echo $uri;
// print_r($uriArr);

//router

$method = $_SERVER['REQUEST_METHOD'];

if (count($uri) == 1 && $uri[0] == 'animals') {
  $out = $db->showAll('farm');
}


$out = json_encode($out);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

echo $out;

// if (count($uriArr) === 2) {
//   if ($uriArr[0] === 'kambarys') {
//     if ($uriArr[1] === '1') {
//       require __DIR__ . '/app/kambarys1.php';
//     } else if ($uriArr[1] === '2') {
//       require __DIR__ . '/app/kambarys2.php';
//     } else {
//       require __DIR__ . '/app/404.php';
//     }
//   } else if ($uriArr[0] == 'add-funds') {
//     $userId = (int) $uriArr[1];
//     require __DIR__ . '/app/addMoney.php';
//   } else {
//     require __DIR__ . '/app/404.php';
//   }
// } else {
//   require __DIR__ . '/app/404.php';
// }
