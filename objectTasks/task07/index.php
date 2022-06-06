<?php
require __DIR__ . '/Grybas.php';
require __DIR__ . '/Krepsys.php';

$krepsys = new Krepsys();
$grybai = [];
while ($krepsys->get_krepsys() < 500) {
  $grybai[] = new Grybas();
  $krepsys->put_krepsys($grybai[count($grybai) - 1]->get_grybasData()[2]);
}
//   $grybas1 = new Grybas();
// print_r($grybas1->get_grybasData());


echo $krepsys->get_krepsys();
echo '<br>';
echo '<pre>';
print_r($grybai);
