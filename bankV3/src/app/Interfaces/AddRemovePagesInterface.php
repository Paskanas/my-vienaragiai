<?php

namespace Bankas\Interfaces;

interface AddRemovePagesInterface
{
  static function index($id): void;
  static function post($id): void;
}
