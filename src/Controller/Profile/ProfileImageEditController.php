<?php

namespace App\Controller\Profile;

use App\Forms\Profile\ProfileImageType;
use App\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfileImageEditController extends AbstractController
{

    #[Route('/profile/avatar/edit', name:'profile_avatar_edit')]
    #[IsGranted('ROLE_USER')]
    public function index(
        Request $request,
        UserService $userService,
        SluggerInterface $slugger
    ): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(ProfileImageType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $image =  $request->files->get('profile_image');

            if($image) {
                $originalFileName = pathinfo($image['avatar']->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFileName);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image['avatar']->guessExtension();

                $user->setAvatar($newFilename);

                try {
                    $image['avatar']->move($this->getParameter('avatar_directory'), $newFilename);
                } catch (FileException $e) {
                    throw new UploadException('Er is iets verkeerd gegaan met het uploaden van jouw avatar');
                }
            }

            $userService->updateAvatarForUser($user);

            $this->addFlash('success', 'Je hebt een nieuwe avatar!');
            return $this->redirect($this->generateUrl('profile'));
        }

        $form->handleRequest($request);
        return $this->render('Profile/profile_avatar_edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}