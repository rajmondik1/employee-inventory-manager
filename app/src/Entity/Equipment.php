<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
{
    const EQUIPMENT_TYPE_LAPTOP = 'laptop';
    const EQUIPMENT_TYPE_PHONE = 'phone';
    const EQUIPMENT_TYPE_ACCESSORY = 'accessory';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brandName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifier;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $warrantyExpires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @ORM\OneToMany(targetEntity=EquipmentHandover::class, mappedBy="equipment")
     */
    private $equipmentHandovers;

    public function __construct()
    {
        $this->equipmentHandovers = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * @param string $brandName
     * @return $this
     */
    public function setBrandName(string $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return $this
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    /**
     * @param \DateTimeInterface $year
     * @return $this
     */
    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getWarrantyExpires(): ?\DateTimeInterface
    {
        return $this->warrantyExpires;
    }

    /**
     * @param \DateTimeInterface|null $warrantyExpires
     * @return $this
     */
    public function setWarrantyExpires(?\DateTimeInterface $warrantyExpires): self
    {
        $this->warrantyExpires = $warrantyExpires;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     * @return $this
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return Collection|EquipmentHandover[]
     */
    public function getEquipmentHandovers(): Collection
    {
        return $this->equipmentHandovers;
    }

    /**
     * @param EquipmentHandover $equipmentHandover
     * @return $this
     */
    public function addEquipmentHandover(EquipmentHandover $equipmentHandover): self
    {
        if (!$this->equipmentHandovers->contains($equipmentHandover)) {
            $this->equipmentHandovers[] = $equipmentHandover;
            $equipmentHandover->setEquipment($this);
        }

        return $this;
    }

    /**
     * @param EquipmentHandover $equipmentHandover
     * @return $this
     */
    public function removeEquipmentHandover(EquipmentHandover $equipmentHandover): self
    {
        if ($this->equipmentHandovers->removeElement($equipmentHandover)) {
            // set the owning side to null (unless already changed)
            if ($equipmentHandover->getEquipment() === $this) {
                $equipmentHandover->setEquipment(null);
            }
        }

        return $this;
    }
}
