<pre>
<?php
require __DIR__ . '/MarsoPalydovas.php';

$palydovas1 = MarsoPalydovas::createObj();
$palydovas2 = MarsoPalydovas::createObj();
$palydovas3 = MarsoPalydovas::createObj();

var_dump($palydovas1);
echo '<br>';
var_dump($palydovas2);
echo '<br>';
var_dump($palydovas3);
echo '<br>';

echo $palydovas1->get_title();
echo '<br>';
echo $palydovas2->get_title();
echo '<br>';
echo $palydovas3->get_title();
echo '<br>';
