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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return $this
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }

    /**
     * @param string $department
     * @return $this
     */
    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string $position
     * @return $this
     */
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

    /**
     * @param EquipmentHandover $equipmentHandover
     * @return $this
     */
    public function addEquipmentHandover(EquipmentHandover $equipmentHandover): self
    {
        if (!$this->equipmentHandovers->contains($equipmentHandover)) {
            $this->equipmentHandovers[] = $equipmentHandover;
            $equipmentHandover->setEmployee($this);
        }

        return $this;
    }

    /**
     * @param EquipmentHandover $equipmentHandover
     * @return $this
     */
    public function removeEquipmentHandover(EquipmentHandover $equipmentHandover): self
    {
        // set the owning side to null (unless already changed)
        if ($this->equipmentHandovers->removeElement($equipmentHandover) && $equipmentHandover->getEmployee() === $this) {
            $equipmentHandover->setEmployee(null);
        }

        return $this;
    }
}
