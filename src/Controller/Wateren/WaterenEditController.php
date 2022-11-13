<?php

namespace App\Controller\Wateren;

use App\Entity\Water;
use App\Forms\Wateren\WaterenEditType;
use App\Service\ImageService;
use App\Service\WaterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WaterenEditController extends AbstractController
{
    #[Route('/wateren/{id}/edit', name:'wateren_page_edit')]
    public function index(
        Request $request,
        WaterService $waterService,
        ImageService $imageService,
        $id = 0
    ): Response {

        $water = $waterService->find($id) ?? new Water();
        $form = $this->createForm(WaterenEditType::class, $water);
        $form->handleRequest($request);

        if($form->isSubmitted()) {

            $image =  $request->files->get('wateren_edit');
            $waterImageDirectory = $this->getParameter('water_directory');

            if($image) {
               $water->setImage($imageService->imageFileNameSanitizer($image, 'image', $waterImageDirectory));
            }

            $waterService->saveWater($water);

            $this->addFlash('success', 'Een nieuw water met de naam ' . $water->getName() . ' is aangemaakt');
            return $this->redirect($this->generateUrl('wateren_page_edit', ['id' => $water->getId()]));
        }

        return $this->render('Wateren/wateren_edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}