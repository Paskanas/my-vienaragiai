<?php

class Radio3 extends Radio1 implements Planas
{
  public function goGo(int $goGo): void
  {
    echo $goGo . ' ' . $goGo . ' ' . $goGo;
  }
}
