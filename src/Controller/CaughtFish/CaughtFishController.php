<?php

namespace App\Controller\CaughtFish;

use App\Service\CaughtFishService;
use App\Service\WaterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CaughtFishController extends AbstractController
{
    #[Route('/caughtFish', name: 'caught_fish_page')]
    public function index(
        CaughtFishService $caughtFishService
    ): Response
    {

        $caughtFish = $caughtFishService->getAllCaughtFish();

        return $this->render('CaughtFish/caught_fish_index.html.twig', [
            'caught_fish' => $caughtFish
        ]);
    }
}
