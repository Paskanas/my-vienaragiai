<?php
class Stikline
{
  private $turis;
  private $kiekis;

  function __construct($turis)
  {
    $this->turis = $turis;
  }

  function ipilti($kiekis)
  {
    if ($kiekis > $this->turis) {
      $kiekis = $this->turis;
    }
    $this->kiekis = $kiekis;
  }

  function ispilti()
  {
    $return = $this->kiekis;
    $this->kiekis = 0;
    return $return;
  }
  function get_turis()
  {
    return $this->turis;
  }
}
