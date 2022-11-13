<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Water;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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
}