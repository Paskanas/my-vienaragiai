<?php

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
  } else {
    http_response_code(403);
  }
}
