<?php

$users = [
  ['id' => 1, 'name' => 'Mamutas', 'password' => md5('123456'), 'fullName' => 'Mamutas Laukinis'],
  ['id' => 2, 'name' => 'Kiskis', 'password' => md5('123456'), 'fullName' => 'Kiskis Piskis'],
  ['id' => 3, 'name' => 'Agurkas', 'password' => md5('123456'), 'fullName' => 'Agurkas Geltonasis']
];


if (!file_exists(__DIR__ . '/users.json')) {
  file_put_contents(__DIR__ . '/users.json', json_encode([]));
}

file_put_contents(__DIR__ . '/users.json', json_encode($users));
