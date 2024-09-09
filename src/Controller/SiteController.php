<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

class SiteController extends AbstractController
{
    #[Route('/', name: 'site_home')]
    public function home(): Response
    {
        $title        = 'Home';

        return $this->render('site/home.html.twig', compact('title'));
    }

    #[Route('/about', name: 'site_about')]
    public function about(): Response
    {
        $title            = 'About';
        $softwareVersion  = sys()->software;
        $frameworkVersion = sys()->framework;
        $phpVersion       = sys()->php_version;
        $timeZone         = sys()->timezone;

        return $this->render('site/about.html.twig', compact('title', 'softwareVersion', 'frameworkVersion', 'phpVersion', 'timeZone'));
    }

    #[Route('/login', name: 'site_login')]
    public function login(): Response
    {
        $title = 'Login';
        return $this->render('site/auth/login.html.twig', compact('title'));
    }

    #[Route('/register', name: 'site_register')]
    public function register(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
    ): Response {
        $title = 'Register';

        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('site_home');
        }

        return $this->render('site/auth/register.html.twig', [
            'title' => $title,
            'form' => $form->createView(),
        ]);
    }
}
