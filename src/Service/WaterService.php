<?php

namespace App\Service;

use App\Entity\Water;
use Doctrine\ORM\EntityManagerInterface;

class WaterService
{
    public function __construct(
        protected EntityManagerInterface $entityManager,
    ){
    }

    public function saveWater(Water $water): void
    {
        $this->entityManager->persist($water);
        $this->entityManager->flush();
    }

    public function find(string $id)
    {
        return $this->entityManager->find(Water::class, $id);
    }

    public function getAllFishingWater(): array
    {
        return $this->entityManager->getRepository(Water::class)->findAll();
    }
}