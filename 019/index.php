<?php

require __DIR__ . '/PapildomasPlanas.php';
require __DIR__ . '/Planas.php';
require __DIR__ . '/Radio1.php';
require __DIR__ . '/Radio2.php';
require __DIR__ . '/Radio3.php';


// $r1 = new Radio1; err because of abstract class
$r1 = new Radio3;
print_r($r1->goForIt([1, 2, 3, 4, 5, 6, 7, 8, 9]));

$r2 = new Radio2;
echo '<br>';
echo $r2->goGo(1);
