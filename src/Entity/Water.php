<?php

namespace App\Entity;

use App\Repository\WaterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WaterRepository::class)]
#[ORM\Table(name: 'water')]
class Water
{

    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(name: 'name', type: 'text', nullable: false)]
    private ?string $name = null;

    #[ORM\Column(name: 'country', type: 'text', nullable: true)]
    private string $country;

    #[ORM\Column(name: 'type', type: 'text', nullable: true)]
    private string $type;

    #[ORM\Column(name: 'size', type: 'integer', nullable: true)]
    private int $size;

    #[ORM\Column(name: 'boat', type: 'boolean', nullable: false)]
    private bool $boat = false;

    #[ORM\Column(name: 'baitBoat', type: 'boolean', nullable: false)]
    private bool $baitBoat = false;

    #[ORM\Column(name: 'nightFishing', type: 'boolean', nullable: false)]
    private bool $nightFishing = false;

    #[ORM\Column(name: 'hardWater', type: 'boolean', nullable: false)]
    private bool $hardWater = false;

    #[ORM\Column(name: 'crayFish', type: 'boolean', nullable: false)]
    private bool $crayfish = false;

    #[ORM\Column(name: 'smallFish', type: 'boolean', nullable: false)]
    private bool $smallFish = false;

    #[ORM\Column(name: 'bigFish', type: 'boolean', nullable: false)]
    private bool $bigFish = false;

    #[ORM\Column(name: 'accessibility', type: 'smallint', nullable: false)]
    private int $accessibility = 50;

    #[ORM\Column(name: 'notes', type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(name: 'image', type: 'string', length: 255, nullable: false)]
    private string $image;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return bool
     */
    public function isBoat(): bool
    {
        return $this->boat;
    }

    /**
     * @param bool $boat
     */
    public function setBoat(bool $boat): void
    {
        $this->boat = $boat;
    }

    /**
     * @return bool
     */
    public function isBaitBoat(): bool
    {
        return $this->baitBoat;
    }

    /**
     * @param bool $baitBoat
     */
    public function setBaitBoat(bool $baitBoat): void
    {
        $this->baitBoat = $baitBoat;
    }

    /**
     * @return bool
     */
    public function isNightFishing(): bool
    {
        return $this->nightFishing;
    }

    /**
     * @param bool $nightFishing
     */
    public function setNightFishing(bool $nightFishing): void
    {
        $this->nightFishing = $nightFishing;
    }

    /**
     * @return bool
     */
    public function isHardWater(): bool
    {
        return $this->hardWater;
    }

    /**
     * @param bool $hardWater
     */
    public function setHardWater(bool $hardWater): void
    {
        $this->hardWater = $hardWater;
    }

    /**
     * @return bool
     */
    public function isCrayfish(): bool
    {
        return $this->crayfish;
    }

    /**
     * @param bool $crayfish
     */
    public function setCrayfish(bool $crayfish): void
    {
        $this->crayfish = $crayfish;
    }

    /**
     * @return bool
     */
    public function isSmallFish(): bool
    {
        return $this->smallFish;
    }

    /**
     * @param bool $smallFish
     */
    public function setSmallFish(bool $smallFish): void
    {
        $this->smallFish = $smallFish;
    }

    /**
     * @return bool
     */
    public function isBigFish(): bool
    {
        return $this->bigFish;
    }

    /**
     * @param bool $bigFish
     */
    public function setBigFish(bool $bigFish): void
    {
        $this->bigFish = $bigFish;
    }

    /**
     * @return int
     */
    public function getAccessibility(): int
    {
        return $this->accessibility;
    }

    /**
     * @param int $accessibility
     */
    public function setAccessibility(int $accessibility): void
    {
        $this->accessibility = $accessibility;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

}