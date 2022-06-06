<?php
require __DIR__ . '/Tenisininkas.php';


$tenisininkas1 = new Tenisininkas('Tomas');
$tenisininkas2 = new Tenisininkas('Darius');

$tenisininkai = Tenisininkas::zaidimoPradzia();
echo '<br>';
echo $tenisininkas1->arTuriKamuoliuka();
echo '<br>';
echo $tenisininkas2->arTuriKamuoliuka();
echo '<br>';

if ($tenisininkas2->arTuriKamuoliuka()) {
  $tenisininkas1->perduotiKamuoliuka();
} else {
  $tenisininkas2->perduotiKamuoliuka();
}

echo $tenisininkas1->arTuriKamuoliuka();
echo '<br>';
echo $tenisininkas2->arTuriKamuoliuka();
echo '<br>';
