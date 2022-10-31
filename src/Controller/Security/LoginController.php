<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name:'login_page')]
    public function login(
        AuthenticationUtils $authenticationUtils
    ): Response

    {
        return $this->render('Security/login_form.html.twig', [
            'login_error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }
}