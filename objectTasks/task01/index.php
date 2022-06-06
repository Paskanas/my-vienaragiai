<?php
require __DIR__ . '/Kibiras1.php';
$kibiras = new Kibiras1();
$kibiras->set_prideti1Akmeni();
echo $kibiras->get_kiekPririnkauAkmenu();
echo '<br>';
$kibiras->set_pridetiDaugAkmenu(10);
echo $kibiras->get_kiekPririnkauAkmenu();
echo '<br>';
