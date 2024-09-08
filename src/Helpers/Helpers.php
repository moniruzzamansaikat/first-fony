<?php

use App\Kernel;
use App\Service\ViewService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

function sys()
{
  $system = new stdClass();
  $system->software = '1.0.0';
  $system->framework = Kernel::VERSION;

  return $system;
}
