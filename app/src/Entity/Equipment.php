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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getWarrantyExpires(): ?\DateTimeInterface
    {
        return $this->warrantyExpires;
    }

    public function setWarrantyExpires(?\DateTimeInterface $warrantyExpires): self
    {
        $this->warrantyExpires = $warrantyExpires;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

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

    public function addEquipmentHandover(EquipmentHandover $equipmentHandover): self
    {
        if (!$this->equipmentHandovers->contains($equipmentHandover)) {
            $this->equipmentHandovers[] = $equipmentHandover;
            $equipmentHandover->setEquipment($this);
        }

        return $this;
    }

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
