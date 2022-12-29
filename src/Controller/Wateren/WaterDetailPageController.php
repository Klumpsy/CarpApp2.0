<?php

namespace App\Controller\Wateren;

use App\Entity\User;
use App\Service\WaterService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WaterDetailPageController extends AbstractController
{
    #[Route('/wateren/{id}/details', name:'wateren_detail_page')]
    #[IsGranted(User::ROLE_USER)]
    public function index(
        WaterService $waterService,
        $id
    ): Response {

        $water = $waterService->find($id);

        return $this->render('Wateren/wateren_index.html.twig', [
            'water' => $water
        ]);
    }
}