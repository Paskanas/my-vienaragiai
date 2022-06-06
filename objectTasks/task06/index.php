<?php
require __DIR__ . '/Stikline.php';

$stikline1 = new Stikline(200);
$stikline2 = new Stikline(150);
$stikline3 = new Stikline(100);

$stikline1->ipilti(500);
echo 'stikline1: ' . $stikline1->ispilti();
echo '<br>';

$stikline1->ipilti(500);
$stikline2->ipilti($stikline1->ispilti());
echo 'stikline2: ' . $stikline2->ispilti();
echo '<br>';

$stikline1->ipilti(500);
$stikline2->ipilti($stikline1->ispilti());
$stikline3->ipilti($stikline2->ispilti());
echo 'stikline3: ' . $stikline3->ispilti();
echo '<br>';
