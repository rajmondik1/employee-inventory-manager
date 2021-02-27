<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity=EquipmentHandover::class, mappedBy="employee")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

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
            $equipmentHandover->setEmployee($this);
        }

        return $this;
    }

    public function removeEquipmentHandover(EquipmentHandover $equipmentHandover): self
    {
        if ($this->equipmentHandovers->removeElement($equipmentHandover)) {
            // set the owning side to null (unless already changed)
            if ($equipmentHandover->getEmployee() === $this) {
                $equipmentHandover->setEmployee(null);
            }
        }

        return $this;
    }
}
