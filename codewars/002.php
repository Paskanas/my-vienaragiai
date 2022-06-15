<?php

$namas = ['laikas', 'kurmis'];
extract($namas);


$req_url = 'https://api.exchangerate.host/latest';
$response_json = file_get_contents($req_url);
if (false !== $response_json) {
  try {
    $response = json_decode($response_json);
    if ($response->success === true) {
      var_dump($response);
    }
  } catch (Exception $e) {
    // Handle JSON parse error...
  }
}

$response2 = json_decode($response_json, 1);

echo '<pre>';
print_r($response2);
echo '<br>';
echo '<br>';
echo '<br>';


$req_url = 'https://api.exchangerate.host/symbols';
$response_json = file_get_contents($req_url);
if (false !== $response_json) {
  try {
    $response = json_decode($response_json);
    if ($response->success === true) {
      print_r($response);
    }
  } catch (Exception $e) {
    // Handle JSON parse error...
  }
}


echo '<br>';
echo '<br>';
echo '<br>';


$req_url = 'https://api.exchangerate.host/convert?from=EUR&to=VES&amount=100';
$response_json = file_get_contents($req_url);
if (false !== $response_json) {
  try {
    $response = json_decode($response_json);
    if ($response->success === true) {
      print_r($response);
    }
  } catch (Exception $e) {
    // Handle JSON parse error...
  }
}
