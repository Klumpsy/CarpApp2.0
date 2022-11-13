<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Water;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WaterRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
    ){
        parent::__construct($registry, Water::class);
    }
}