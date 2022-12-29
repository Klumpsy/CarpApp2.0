<?php

namespace App\Repository;

use App\Entity\CaughtFish;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CaughtFishRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
    ){
        parent::__construct($registry, CaughtFish::class);
    }
}