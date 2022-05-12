<?php
$arrForSlice = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arrForSplice = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arrSplice = [];
$arrSlice = [];

echo 'print Slice: ';
print_r(array_slice($arrForSlice, 2, 3));
echo '<br>';
echo 'Orginal Slice: ';
print_r($arrForSlice);
echo '<br>';
echo '<br>';
echo 'print Splice: ';
print_r(array_splice($arrForSplice, 2, 3));
echo '<br>';
echo 'Orginal Slice: ';
print_r($arrForSplice);
echo '<br>';
echo '<br>';
$arraySplice = array_splice($arrForSplice, 2, 3);
$arraySlice = array_slice($arrForSlice, 2, 3);
echo 'new Slice: ';
print_r($arraySlice);
echo '<br>';
echo 'new Splice: ';
print_r($arraySplice);
echo '<br>';



$A = 5;
$C = &$A;
echo "A: $A";
echo '<br>';
echo "C: $C";
echo '<br>';
$A = 10;
echo "A: $A";
echo '<br>';
echo "C: $C";
echo '<br>';
$C = 11;
echo "A: $A";
echo '<br>';
echo "C: $C";
echo '<br>';
echo '<br>';

echo 'isset: ';
if (isset($C)) {
  echo 'Taip';
  echo '<br>';
} else {
  echo 'Ne';
  echo '<br>';
}
echo 'Unset:';
echo '<br>';
unset($C);
echo 'isset: ';
if (isset($C)) {
  echo 'Taip';
  echo '<br>';
} else {
  echo 'Ne';
  echo '<br>';
}
echo "C: $C";
echo '<br>';

$C = 3;
echo "A: $A";
echo '<br>';
echo "C: $C";
echo '<br>';
echo '<br>';


$color = ['red', 'blue', 'yellow'/*, 'green', 'gold'*/];

foreach ($color as $key => &$value) {
  // $value = 'red';
}

// unset($value);

print_r($color);
echo '<br>';
echo $value;
echo '<br>';
echo '<br>';

foreach ($color as $key => $value) {
  echo $key . '<br>';
  echo $value . '<br>';
  echo $color[count($color) - 1] . '<br>';

  echo '<br>';
  // $value = 'red';
}
print_r($color);
echo '<br>';
echo $value;
echo '<br>';

foreach ($color as $key => &$value) {
  // $value = 'red';
}
unset($value);
print_r($color);
echo '<br>';
echo $value;
echo '<br>';

foreach ($color as $key => $value) {
  $color[$key] .= '***';
}
print_r($color);
echo '<br>';


foreach ($color as $key => &$value) {
  $value .= '+++';
}
unset($value);
print_r($color);
echo '<br>';

unset($color[1]);
print_r($color);
echo '<br>';
$D;
var_dump($D);
