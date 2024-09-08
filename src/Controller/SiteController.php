<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'site_home')]
    public function home(): Response
    {
        $title        = 'Home';
        $softwareVersion  = sys()->software;
        $frameworkVersion = sys()->framework;
        $phpVersion       = sys()->php_version;
        $timeZone         = sys()->timezone;

        return $this->render('site/home.html.twig', compact('title', 'timeZone', 'softwareVersion', 'frameworkVersion', 'phpVersion'));
    }

    #[Route('/about', name: 'site_about')]
    public function about(): Response
    {
        $title = 'About';

        return $this->render('site/about.html.twig', compact('title'));
    }

    #[Route('/db', name: 'site_db')]
    public function db(EntityManagerInterface $entityManager)
    {
        // $user = $entityManager->getRepository(User::class)->find(1);
        // dd($user->getFirstname());

        $users = $entityManager->getRepository(User::class)->findAll();
        // dd($users);
    }

    #[Route('/users', name: 'site_users')]
    public function users(UserRepository $userRepository)
    {
        // $users = $userRepository->findAll();
        // dd($users);

        // $totalUsers = $userRepository->count();
        // dd($totalUsers);   
    }

    #[Route('/register', name: 'site_register')]
    public function register(): Response
    {
        $title = 'Register';

        return $this->render('site/auth/register.html.twig', compact('title'));
    }
}
