<?php

abstract class Radio1 implements Planas
{
  public function goForIt(array $go): array
  {
    return $go;
  }

  public function gone(string $gone): string
  {
    return $gone;
  }

  // public function goGo(int $goGo): void
  // {
  //   echo $goGo . ' ' . $goGo;
  // }

  abstract public function goGo(int $goGo): void;

  public function namas()
  {
    echo self::TU;
    return 'Labas';
  }
}
