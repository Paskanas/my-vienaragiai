<?php
interface Planas extends PapildomasPlanas
{
  const TU = 'as';
  function goForIt(array $go): array;

  function gone(string $gone): string;
}
