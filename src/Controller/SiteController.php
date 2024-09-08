<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SiteController extends AbstractController
{
    #[Route('/site', name: 'app_site')]
    public function index(): Response
    {
        $pageTitle        = 'Home';
        $softwareVersion  = sys()->software;
        $frameworkVersion = sys()->framework;

        return $this->render('site/index.html.twig', compact('pageTitle', 'softwareVersion', 'frameworkVersion'));
    }
}
