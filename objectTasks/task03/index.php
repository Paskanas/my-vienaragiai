<?php
require __DIR__ . '/Kibiras.php';
$kibiras1 = new Kibiras2();
$kibiras2 = new Kibiras2();
$kibiras1->set_prideti1Akmeni();
echo 'Kibiras1: ' . $kibiras1->get_kiekPririnkauAkmenu();
echo '<br>';
$kibiras1->set_pridetiDaugAkmenu(10);
echo 'Kibiras1: ' . $kibiras1->get_kiekPririnkauAkmenu();
echo '<br>';

$kibiras2->set_prideti1Akmeni();
$kibiras2->set_prideti1Akmeni();
echo 'Kibiras2: ' . $kibiras2->get_kiekPririnkauAkmenu();
echo '<br>';

echo 'viso: ' . $kibiras1::get_visiAkmenys();
echo '<br>';
