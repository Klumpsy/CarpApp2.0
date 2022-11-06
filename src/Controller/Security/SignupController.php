<?php

namespace App\Controller\Security;

use App\Entity\User;
use App\Forms\Security\RegistrationType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    #[Route('/signup', name:'signup_page')]
    public function signup(
        Request $request,
        UserService $userService
    ): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $userService->saveUser($user,  $form->get('password')->getData());

            $this->addFlash('success', 'Je bent geregistreerd, we hebben een mail verzonden zodat je met jouw account kunt inloggen ');

            return $this->redirect($this->generateUrl('login_page'));
        }

        return $this->render('Security/signup_from.html.twig', [
            'form' => $form->createView()
        ]);
    }
}