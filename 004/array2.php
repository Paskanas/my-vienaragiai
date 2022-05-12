

<?php
$animals = [

  ['name' => 'Pilkis', 'type' => 'cat'],

  ['name' => 'Šarikas', 'type' => 'dog'],

  ['name' => 'Bobikas', 'type' => 'dog'],

  ['name' => 'Juodis', 'type' => 'cat'],

  ['name' => 'Pūkis', 'type' => 'dog']

];

foreach ($animals as $key => $value) {
  if ($value['type'] === 'cat') {
    echo $value['name'];
    echo '<br>';
  }
}

// foreach ($animals as $key => $value) {
//   if ($value['name'] === 'Pūkis') {
//     $animals[$key]['type'] = 'cat';
//     // echo '<br>';
//   }
// }

foreach ($animals as $key => &$value) {
  if ($value['name'] === 'Pūkis') {
    $value['type'] = 'cat';
    // echo '<br>';
  }
}
unset($value);

echo '<pre>';
print_r($animals);
echo '</pre>';


?>

