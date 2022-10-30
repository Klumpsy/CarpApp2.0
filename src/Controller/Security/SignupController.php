<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    #[Route('/signup', name:'signup_page')]
    public function signup(): Response
    {
        return $this->render('Security/signup_from.html.twig');
    }
}