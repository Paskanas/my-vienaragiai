<?php
require __DIR__ . '/Pinigine.php';

$pinigine = new Pinigine();

$pinigine->set_ideti(1);
$pinigine->set_ideti(3);
$pinigine->set_ideti(2);
echo $pinigine->get_skaiciuoti();
echo '<br>';
echo $pinigine->get_popieriniai();
echo '<br>';
echo $pinigine->get_metaliniai();
echo '<br>';
