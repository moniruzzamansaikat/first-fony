<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'site_home')]
    public function home(): Response
    {
        $pageTitle        = 'Home';
        $softwareVersion  = sys()->software;
        $frameworkVersion = sys()->framework;

        return $this->render('site/home.html.twig', compact('pageTitle', 'softwareVersion', 'frameworkVersion'));
    }

    #[Route('/about', name: 'site_about')]
    public function about(): Response
    {
        $pageTitle        = 'About';
        $softwareVersion  = sys()->software;
        $frameworkVersion = sys()->framework;

        return $this->render('site/about.html.twig', compact('pageTitle', 'softwareVersion', 'frameworkVersion'));
    }
}
