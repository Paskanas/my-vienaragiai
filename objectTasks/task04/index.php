<?php

require __DIR__ . '/KibirasNePo1.php';

$kibiras3 = new KibirasNePo1();
$kibiras3->set_prideti1Akmeni();
echo $kibiras3->get_kiekPririnkauAkmenu();
echo '<br>';
$kibiras3->set_pridetiDaugAkmenu(10);
echo $kibiras3->get_kiekPririnkauAkmenu();
echo '<br>';
