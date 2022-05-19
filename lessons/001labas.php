<h1>Labukas "\n" labas</h1>
<?php
echo 'labas ir tau' . '<br>';
$name = 'Kasparas';

echo $name . '<br>';
echo 10 + 12 . '<br>';
define('age', '29');
echo age . '<br>';
print_r('labas');
print_r('labas');
print 'labas';
echo '<br>';
echo $name, ' ', age;
$sujungimas = $name . ' ' . age;
echo '<br>';
echo $sujungimas;
echo '<br>';
$kitiMetai = 0;
$kitiMetai += '52';
echo $kitiMetai;
echo '<br>';
$a = 2;
echo $a;
echo '<br>';
$a = $a++ * $a++;
echo $a;
echo '<br>';
$b = 0;
echo $b + $a;
echo '<br>';
echo '5' + '1';
echo '<br>';
echo 5 . 222;
echo '<br>';
echo 5.2;
echo '<br>';
echo "Labas \n $kitiMetai \n nana";
echo 'vsio';
echo '<br>';
echo age;
echo '<br>';
$skaicius = 1;
echo gettype($skaicius);
echo '<br>';
$skaicius += 0.1;
echo gettype($skaicius);
echo '<br>';
echo $skaicius;
echo '<br>';
$skaicius -= 0.1;
echo gettype($skaicius);
echo '<br>';
echo $skaicius;
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

$pirmas = 'antras';
$antras = 'trecias';

if (isset($$antras)) {
  echo $$antras;
}

if (isset($$pirmas)) {
  echo $$pirmas;
}

echo '<br>';

print_r(true);
echo '<br>';
print_r(false);
echo '<br>';
var_dump(true);
echo '<br>';
var_dump(false);
echo '<br>';

// echo [false]; //warning, not work
print_r([false]);
echo '<br>';
var_dump([false]);
echo '<br>';

echo '<pre>';
print_r([1, 2, 3, 4, 5, 6]);
var_dump([1, 2, 3, 4, 5, 6]);
echo '</pre>';

print_r([1, 2, 3, 4, 5, 6]);

echo '<br>';
echo gettype(null);
echo '<br>';
echo gettype(0);
echo '<br>';
echo gettype('0');
echo '<br>';
echo '<br>';

$laikas = 10;
echo $laikas > 1 ? 'Taip' : 'Ne';
echo '<br>';

$laikas2 = $laikas - 10 > 1 ? 'Taip' : 'Ne';
echo $laikas2;
echo '<br>';

echo 5 < 5 ? '1' : (6 > 8 ? '2' : '3');
echo '<br>';

echo gettype(INF);

?>