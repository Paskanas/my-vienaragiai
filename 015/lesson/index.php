<?php

require __DIR__ . '/Bebras.php';

$bebras1 = new Bebras('Bebras1', ['Bebriukas1', 'Bebriukas2']);
$bebras2 = new Bebras();
// $bebras3 = $bebras1;         //nekuriamas naujas objektas, cia tas pats kaip bebras1, pakeisi cia pasikeis ir ten (reference)
$bebras4 = clone ($bebras1); //kuriamas naujas objektas

echo '<pre>';

// var_dump($bebras1);
// var_dump($bebras2);
// var_dump($bebras3);
// var_dump($bebras4);

$bebras1->get_name();
echo '<br>';
$bebras1->set_age(10);
echo 'get_age: ' . $bebras1->get_age();
echo '<br>';

echo '__get age:' . $bebras1->age;
echo '<br>';
echo '__get name:' . $bebras1->name;
echo '<br>';
echo '<br>';
$bebras1->name = 'KasPer1';
$bebras1->age = 10;
echo '__get age:' . $bebras1->age;
echo '<br>';
echo '__get name:' . $bebras1->name;
echo '<br>';

echo spl_object_id($bebras1);
