<h1>Uzduotis 1</h1>
<div style='line-break: anywhere'>
  <?php
  for ($i = 0; $i < 400; $i++) {
    if ($i % 50 === 0) {
      echo '<br>';
    }
    echo '*';
  }
  ?>
</div>
<h1>Uzduotis 2</h1>
<?php
$randNum = 0;
$numCounter = 0;
for ($i = 0; $i < 300; $i++) {
  $randNum = rand(0, 300);
  if ($randNum > 150) {
    $numCounter++;
  }
  if ($randNum > 275) {
    echo "<span style='color:red'>$randNum </span>";
  } else {
    echo "<span'>$randNum </span>";
  }
}
?>
<h1>Uzduotis 3</h1>
<?php
$numbersString = '';

for ($i2 = 1; $i2 < rand(3000, 4000); $i2++) {
  if ($i2 % 77 === 0) {
    if ($numbersString) {
      $numbersString = $numbersString . ', ' . $i2;
    } else
      $numbersString = $numbersString . $i2;
  }
}
echo $numbersString;
?>
<h1>Uzduotis 4</h1>
<div style="line-height: 7px;">
  <?php
  for ($i = 0; $i < 100; $i++) {
    for ($ii = 0; $ii < 100; $ii++) {
      echo '*';
    }
    echo '<br>';
  }
  ?>
</div>
<h1>Uzduotis 5</h1>
<div style="line-height: 7px;">
  <?php
  $krastinesIlgis = 101;
  for ($i = 0; $i < $krastinesIlgis; $i++) {
    for ($ii = 0; $ii < $krastinesIlgis; $ii++) {
      if ($i === $ii || $i === $krastinesIlgis - $ii - 1) {
        echo "<span style='color:red'>*</span>";
      } else {
        echo '<span>*</span>';
      }
    }
    echo '<br>';
  }
  ?>
</div>
<h1>Uzduotis 6</h1>
<?php
$moneta = '';
while ($moneta !== 'H') {
  if (rand(0, 1) === 0) {
    $moneta = 'H';
  } else {
    $moneta = 'S';
  }
  echo $moneta . '<br>';
}
echo '<br>';
$countH = 0;
while ($countH < 3) {
  if (rand(0, 1) === 0) {
    $moneta = 'H';
    $countH++;
  } else {
    $moneta = 'S';
  }
  echo $moneta . '<br>';
}
echo '<br>';
$countH = 0;
while ($countH < 3) {
  if (rand(0, 1) === 0) {
    $moneta = 'H';
    $countH++;
  } else {
    $moneta = 'S';
    $countH = 0;
  }
  echo $moneta . '<br>';
}
?>
<h1>Uzduotis 7</h1>
<?php
$petras = 0;
$kazys = 0;
while ($petras < 222 && $kazys < 222) {
  $num1 = rand(10, 20);
  $num2 = rand(5, 25);
  $petras += $num1;
  $kazys += $num2;
  echo "Petro taskai: $petras";
  echo '<br>';
  echo "Kazio taskai: $kazys";
  echo '<br>';
  echo 'Partiją laikėjo: ';
  if ($num1 > $num2) {
    echo "Petras";
  } elseif ($num1 < $num2) {
    echo "Kazys";
  } else {
    echo 'lygiosios';
  }
  echo '<br>';
}
echo '<br>';
if ($petras > $kazys) {
  echo 'Laimetojas Petras';
} elseif ($petras < $kazys) {
  echo 'Laimetojas Kazys';
} else {
  echo 'Lygiosios';
}
?>
<h1>Uzduotis 8</h1>
<div style="line-height: 15px; font-size: 30px;">
  <pre>
<?php
$counter = 1;
$rombSize = 21;
$delimeter = ' ';
$rgb = 0;
$color = '';
function stars(&$ii, $rombSize, $counter, $delimeter)
{
  if (($ii < ($rombSize - $counter) / 2 || $ii > ($rombSize - $counter) / 2)) {
    echo $delimeter;
  } else {
    for ($a = 0; $a < $counter; $a++) {
      $rgb = rand(0, 3);
      if ($rgb === 0) {
        $color = 'red';
      } elseif ($rgb === 1) {
        $color = 'green';
      } else {
        $color = 'blue';
      }
      echo "<span style='color:$color'>" . '*' . '</span>';
    }
    $ii += $counter;
  }
}
for ($i = 0; $i < $rombSize; $i++) {
  for ($ii = 0; $ii <= $rombSize; $ii++) {
    if ((($rombSize - 1) / 2 > $i)) {
      stars($ii, $rombSize, $counter, $delimeter);
    } else {
      stars($ii, $rombSize, $counter, $delimeter);
    }
  }
  echo '<br>';
  if ((($rombSize - 1) / 2 > $i)) {
    $counter += 2;
  } else {
    $counter -= 2;
  }
}
?>
</pre>
</div>
<h1>Uzduotis 9</h1>
<?php

?>
<h1>Uzduotis 10</h1>
<?php
$nailmm = 85;
$ikalta = 0;
$counter = 0;
for ($i = 0; $i < 5; $i++) {
  while ($ikalta <= $nailmm) {
    $ikalta += rand(5, 20);
    $counter++;
  }
  $ikalta = 0;
}
echo "Reikejo $counter kalimu";
echo '<br>';
$nailmm = 85;
$ikalta = 0;
$counter = 0;
for ($i = 0; $i < 5; $i++) {
  while ($ikalta <= $nailmm) {
    if (rand(0, 1) === 1) {
      $ikalta += rand(20, 30);
    }
    // echo $ikalta . '<br>';
    $counter++;
  }
  $ikalta = 0;
}
echo "Reikejo $counter kalimu";
echo '<br>';
?>
<h1>Uzduotis 11</h1>
<?php
$string = '';
$num = rand(1, 200);
for ($i = 0; $i < 50; $i++) {
  while (str_contains($string, $num)) {
    $num = rand(1, 200);
  }
  $string = $string . $num . ', ';
}
echo $string;
echo '<br>';
echo '<br>';
$string2 = '';
$randTill = 200;
$num2 = rand(1, $randTill);
$primeCounter = 0;
$pirminis = false;
$myArr = [];
$counter = 1;
for ($i = 0; $i < 35; $i++) {
  while (!$pirminis) {
    $primeCounter = 0;
    while (str_contains($string2, $num2)) {
      $counter++;
      $num2 = rand(1, $randTill);
    }
    // echo 'num2 ' . $num2 . '<br>';
    for ($ii = 1; $ii <= $num2; $ii++) {
      if ($num2 % $ii === 0) {
        $primeCounter++;
        // echo 'ii ' . $ii . '<br>';
        if ($primeCounter > 2) {
          // echo 'netiko' . '<br>';
          break;
        }
      }
    }
    // if (($num2 + 1) % 6 === 0 || ($num2 - 1) % 6 === 0) {
    //   $pirminis = true;
    // } else {
    //   $num2 = rand(1, $randTill);
    // }
    // echo "primeCounter++ $primeCounter" . '<br>';
    if ($primeCounter === 2) {
      // echo 'tiko' . '<br>';
      $pirminis = true;
    } else {
      // echo 'is naujo' . '<br>';
      $counter++;
      $num2 = rand(1, $randTill);
    }
  }
  $pirminis = false;
  array_push($myArr, $num2);
  $string2 = $string2 . $num2 . ', ';
}
echo $string2;
echo '<br>';
// print_r($myArr);
sort($myArr);
foreach ($myArr as $key => $value) {
  echo $value . ', ';
}

echo '<br>';
echo $counter . '<br>';

?>