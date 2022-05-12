<a href="https://docs.google.com/document/d/1mGBKRTIV8-xlwpuWL9cFO4sF41Up9tw5Ijx24aYVgXk/edit">Uzduociu nuoroda</a>
<h1> Uzduotis 1</h1>
<?php
$arr = [];
for ($i = 0; $i < 10; $i++) {

  for ($a = 0; $a < 5; $a++) {
    $arr[$i][$a] = rand(5, 25);
  }
}
print_r($arr);
echo '<br>';
foreach ($arr as $value) {
  echo implode(', ', $value) . '<br>';
}
?>
<h1> Uzduotis 2</h1>
<?php
echo 'a.';
echo '<br>';
$count10 = 0;
foreach ($arr as $inner) {
  foreach ($inner as $value) {
    if ($value > 10) {
      $count10++;
    }
  }
}
echo $count10;
echo '<br>';
echo 'b.';
echo '<br>';
$maxValue = 0;
foreach ($arr as $inner) {
  if ($maxValue < max($inner)) {
    $maxValue = max($inner);
  }
}
echo $maxValue;
echo '<br>';
echo 'c.';
echo '<br>';
$arrIndexSums = [];
foreach ($arr as $inner) {
  foreach ($inner as $key => $value) {
    if ($arrIndexSums) {
      if (!array_key_exists($key, $arrIndexSums)) {
        $arrIndexSums[] = 0;
      }
    } else {
      $arrIndexSums[] = 0;
    }
    $arrIndexSums[$key] += $value;
  }
}
echo implode(', ', $arrIndexSums);
echo '<br>';
echo 'd.';
echo '<br>';
foreach ($arr as &$inner) {
  $inner[] = rand(5, 25);
  $inner[] = rand(5, 25);
}
unset($inner);
echo '<pre>';
print_r($arr);
echo '</pre>';
echo '<br>';
echo 'e.';
echo '<br>';
$arrOfMax = [];
foreach ($arr as $key => $inner) {
  $arrOfMax[$key] = max($inner);
}

echo implode(', ', $arrOfMax)
?>
<h1> Uzduotis 3</h1>
<?php
$arr = [];
$letters = range('A', 'Z');
for ($i = 0; $i < 10; $i++) {
  for ($ii = 0; $ii < rand(2, 20); $ii++) {
    $arr[$i][$ii] = $letters[rand(0, 25)];
  }
}
foreach ($arr as &$inner) {
  sort($inner);
}
unset($inner);
echo '<pre>';
print_r($arr);
echo '</pre>';
?>
<h1> Uzduotis 4</h1>
<?php
sort($arr);
foreach ($arr as $key => $inner) {
  if (in_array('K', $inner)) {
    array_unshift($arr, $inner);
    unset($arr[$key]);
  }
}
unset($inner);
echo '<pre>';
print_r($arr);
echo '</pre>';
?>
<h1> Uzduotis 5</h1>
<?php
$arr = [];
for ($i = 0; $i < 30; $i++) {
  $arr[$i] = ['user_id' => rand(1, 1000000), 'place_in_row' => rand(0, 100)];
}
echo '<pre>';
print_r($arr);
echo '</pre>';

?>
<h1> Uzduotis 6</h1>
<?php
// foreach ($arr as $key1 => $inner1) {
//   // print_r($inner1);
//   echo ' raktas' . $key1;
//   foreach ($arr as $key2 => $inner2) {
//     if ($inner1['user_id'] < $inner2['user_id']) {
//       array_unshift($arr, $inner1);
//       unset($arr[$key1]);
//       break;
//     }
//   }
// }

// echo '<pre>';
// print_r($arr);
// echo '</pre>';

$ordered_arr = array_column($arr, 'user_id');
sort($ordered_arr);
echo '<pre>';
print_r($ordered_arr);
echo '</pre>';
$unordered_arr = $arr;
foreach ($ordered_arr as &$ordered_key) {
  foreach ($unordered_arr as $unordered_value) {
    // check if both unordered object id is equal to ordered key
    if ($unordered_value['user_id'] === $ordered_key) {
      // set the object as value, we can do it this way because
      // $ordered_key is by referance
      $ordered_key = $unordered_value;
      break;
    }
  }
}



echo '<pre>';
print_r($ordered_arr);
echo '</pre>';
// echo '<pre>';
// print_r($unordered_arr);
// echo '</pre>';


?>
<h1> Uzduotis 7</h1>
<?php

?>
<h1> Uzduotis 8</h1>
<?php

?>
<h1> Uzduotis 9</h1>
<?php

?>
<h1> Uzduotis 10</h1>
<?php

?>
<h1> Uzduotis 11</h1>
<?php

?>