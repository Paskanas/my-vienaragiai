<pre>
<?php


define('KEY', 1);
echo KEY;
echo '<br>';
echo __DIR__;

include __DIR__ . '\kitas\vienas.php';
include_once __DIR__ . '\kitas\vienas.php';
require __DIR__ . '\kitas\vienas.php';
require_once __DIR__ . '\kitas\vienas.php';
include __DIR__ . '\kitas\vienas.php';
echo 'index';

include __DIR__ . '/kitas2/du.php';

$data = require __DIR__ . '/data.php';

print_r($data);


?>
</pre>