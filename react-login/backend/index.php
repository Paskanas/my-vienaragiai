<?php

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header('Access-Control-Allow-Origin: *');
  // header('Access-Control-Allow-Methods: OPTIONS, GET, POST, DELETE, PUT');
  header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
  die;
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, GET, POST, DELETE, PUT');
header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");

if ($_GET['url'] === 'home') {
  print_r(apache_request_headers());
  if ('lalala' == apache_request_headers()['Authorization']) {
    echo json_encode([
      'Vienaragiai',
      'Baronka-lt',
      'r1',
      'r2',
      'bankas',
      'james-bond'
    ]);
    die;
  } else {
    echo json_encode([]);
  }
}

if ($_GET['url'] === 'login') {
  echo json_encode(['msg' => 'OK']);
  http_response_code(403);
}
