<h1>Uzduotis</h1>

<?php
$rats = 0;
$cirkles = 0;
$rand = rand(3, 5);
$colorArr = ['red', 'gold', 'blue'];
$color = $colorArr[rand(0, 2)];
while ($rats < 20) {
  $rats += $rand;
  $cirkles++;
  echo "<div style='color: $color'>Rate $cirkles pagavo $rand!</div>" . '<br>';
  $rand = rand(3, 5);
  $color = $colorArr[rand(0, 2)];
}
echo '<br>';
echo '<h1 style=\'color:gold; margin:0;\'>';
echo 'Rezultatas: <br>';
echo '</h1>';
echo '<h1  style=\'color:green; margin:0;\'>';
echo "Pagautos žiurkės: $rats" . '<br>';
echo '</h1>';
echo '<h1 style=\'color:red; margin:0;\'>';
echo "Apibėgti ratai: $cirkles" . '<br>';
echo '</h1>';

?>