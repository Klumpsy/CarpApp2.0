<?php

namespace App\Entity;

use App\Repository\CaughtFishRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaughtFishRepository::class)]
#[ORM\Table(name: 'caught_fish')]
class CaughtFish
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Water::class, inversedBy: 'caughtFish')]
    private ?string $water = null;

    #[ORM\Column(name: 'weight', type: 'text', nullable: true)]
    private ?string $weight = null;

    #[ORM\Column(name: 'image', type: 'string', length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getWater(): ?string
    {
        return $this->water;
    }

    /**
     * @param string|null $water
     */
    public function setWater(?string $water): void
    {
        $this->water = $water;
    }

    /**
     * @return string|null
     */
    public function getWeight(): ?string
    {
        return $this->weight;
    }

    /**
     * @param string|null $weight
     */
    public function setWeight(?string $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}