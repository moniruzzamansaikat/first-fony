<?php

use App\Kernel;

function sys()
{
  $system = new stdClass();
  $system->software = '1.0.0';
  $system->framework = Kernel::VERSION;

  return $system;
}
