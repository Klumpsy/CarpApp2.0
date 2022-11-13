<?php

namespace App\Controller\Profile;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name:'profile')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('Profile/profile_main.html.twig');
    }
}