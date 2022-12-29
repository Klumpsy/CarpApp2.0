<?php

namespace App\Controller\CaughtFish;

use App\Entity\CaughtFish;
use App\Entity\User;
use App\Forms\CaughtFish\CaughtFishEditType;
use App\Service\CaughtFishService;
use App\Service\ImageService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CaughtFishEditController extends AbstractController
{
    #[Route('/caughtFish/{id}/edit', name:'caught_fish_page_edit')]
    #[IsGranted(User::ROLE_USER)]
    public function index(
        Request $request,
        CaughtFishService $caughtFishService,
        ImageService $imageService,
        $id = 0
    ): Response {

        $caughtFish = $caughtFishService->find($id) ?? new CaughtFish();
        $form = $this->createForm(CaughtFishEditType::class, $caughtFish);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $image =  $request->files->get('caught_fish_edit');
            $caughtFishDirectory = $this->getParameter('caught_fish_directory');

            if($image) {
                $caughtFish->setImage($imageService->imageFileNameSanitizer($image, 'image', $caughtFishDirectory));
            }

            $caughtFishService->saveCaughtFish($caughtFish);

            $this->addFlash('success', 'Jouw vangst met een gewicht van ' . $caughtFish->getWeight() . ' is aangemaakt');
            return $this->redirect($this->generateUrl('caught_fish_page'));
        }

        return $this->render('CaughtFish/caught_fish_edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}