<?php

namespace App\Controller;

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SiteController extends AbstractController
{
    #[Route('/site', name: 'app_site')]
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            'ok' => ok(),
            'symfony_version' => Kernel::VERSION,
            'php_version' => PHP_VERSION,
            'controller_name' => 'SiteController',
        ]);
    }
}
