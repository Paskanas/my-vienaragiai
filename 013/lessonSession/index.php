<?php

$cats = ['Pilkis', 'Murkis'];

if (!file_exists(__DIR__ . '/cats.json')) {
  file_put_contents(__DIR__ . '/cats.json', json_encode([]));
}

file_put_contents(__DIR__ . '/cats.json', json_encode($cats));

$nowCats = json_decode(file_get_contents(__DIR__ . '/cats.json'));

print_r($nowCats);

$nowCats[] = 'Kupris';

file_put_contents(__DIR__ . '/cats.json', json_encode($nowCats));

$nowCats = json_decode(file_get_contents(__DIR__ . '/cats.json'));

$nowCats[0] = 'Plikis';
file_put_contents(__DIR__ . '/cats.json', json_encode($nowCats));
