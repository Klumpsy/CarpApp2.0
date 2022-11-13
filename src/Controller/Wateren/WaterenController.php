<?php

namespace App\Controller\Wateren;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WaterenController extends AbstractController
{
    #[Route('/wateren', name:'wateren_page')]
    public function index(
    ): Response

    {
        return $this->render('Wateren/wateren_index.html.twig', [

        ]);
    }
}