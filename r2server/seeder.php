<?php


require __DIR__ .'/JsonDb.php';

$db = new JsonDb('farm');

$animals = ['Sheep', 'Duck', 'Cow', 'Checken', 'Goat', 'Pig', 'Pink Pig', 'Horse', 'Lamb'];


foreach(range(1, 11) as $_) {
    $animal = ['animal' => $animals[rand(0, count($animals) - 1)], 'weight' => rand(100, 10000) / 100];
    $db->create($animal);
}