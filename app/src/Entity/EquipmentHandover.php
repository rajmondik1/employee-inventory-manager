<?php

namespace App\Entity;

use App\Repository\EquipmentHandoverRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentHandoverRepository::class)
 */
class EquipmentHandover
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class, inversedBy="equipmentHandovers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employee;

    /**
     * @ORM\ManyToOne(targetEntity=Equipment::class, inversedBy="equipmentHandovers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment;

    /**
     * @ORM\Column(type="date")
     */
    private $handoverDate;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $handoverUser;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $takeoverDate;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $takeoverUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getHandoverDate(): ?\DateTimeInterface
    {
        return $this->handoverDate;
    }

    public function setHandoverDate(\DateTimeInterface $handoverDate): self
    {
        $this->handoverDate = $handoverDate;

        return $this;
    }

    public function getHandoverUser(): ?Employee
    {
        return $this->handoverUser;
    }

    public function setHandoverUser(?Employee $handoverUser): self
    {
        $this->handoverUser = $handoverUser;

        return $this;
    }

    public function getTakeoverDate(): ?\DateTimeInterface
    {
        return $this->takeoverDate;
    }

    public function setTakeoverDate(?\DateTimeInterface $takeoverDate): self
    {
        $this->takeoverDate = $takeoverDate;

        return $this;
    }

    public function getTakeoverUser(): ?Employee
    {
        return $this->takeoverUser;
    }

    public function setTakeoverUser(?Employee $takeoverUser): self
    {
        $this->takeoverUser = $takeoverUser;

        return $this;
    }
}
