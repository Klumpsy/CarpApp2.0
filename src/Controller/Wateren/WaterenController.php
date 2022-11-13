<?php

namespace App\Controller\Wateren;

use App\Service\WaterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WaterenController extends AbstractController
{
    #[Route('/wateren', name:'wateren_page')]
    public function index(
        WaterService $waterService
    ): Response {

        $wateren = $waterService->getAllFishingWater();

        return $this->render('Wateren/wateren_index.html.twig', [
            'wateren' => $wateren
        ]);
    }
}