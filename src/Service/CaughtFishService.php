<?php

namespace App\Service;

use App\Entity\CaughtFish;
use Doctrine\ORM\EntityManagerInterface;

class CaughtFishService
{
    public function __construct(
        protected EntityManagerInterface $entityManager,
    ){
    }

    public function saveCaughtFish(CaughtFish $caughtFish): void
    {
        $this->entityManager->persist($caughtFish);
        $this->entityManager->flush();
    }

    public function find(string $id)
    {
        return $this->entityManager->find(CaughtFish::class, $id);
    }

    public function getAllCaughtFish(): array
    {
        return $this->entityManager->getRepository(CaughtFish::class)->findAll();
    }

}