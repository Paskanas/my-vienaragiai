<?php
function getNewId()
{
  if (!file_exists(__DIR__ . '/../data/maxId.json')) {
    file_put_contents(__DIR__ . '/../data/maxId.json', json_encode(0));
  }
  $maxId = json_decode(file_get_contents(__DIR__ . '/../data/maxId.json'));
  $maxId++;
  file_put_contents(__DIR__ . '/../data/maxId.json', json_encode($maxId));
  return $maxId;
}
