<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserService
{
    public function __construct(
        protected EntityManagerInterface $entityManager,
        protected UserPasswordHasherInterface $passwordHasher,
    ){
    }

    public function saveUser(User $user, $unhashedPassword): void
    {
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
            $this->passwordHasher->hashPassword($user, $unhashedPassword)
        );

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function updateUser(User|UserInterface $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function updateAvatarForUser(User|UserInterface $user): void
    {

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}