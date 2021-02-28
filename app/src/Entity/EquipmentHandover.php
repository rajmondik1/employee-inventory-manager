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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Employee|null
     */
    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    /**
     * @param Employee|null $employee
     * @return $this
     */
    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return Equipment|null
     */
    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    /**
     * @param Equipment|null $equipment
     * @return $this
     */
    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getHandoverDate(): ?\DateTimeInterface
    {
        return $this->handoverDate;
    }

    /**
     * @param \DateTimeInterface $handoverDate
     * @return $this
     */
    public function setHandoverDate(\DateTimeInterface $handoverDate): self
    {
        $this->handoverDate = $handoverDate;

        return $this;
    }

    /**
     * @return Employee|null
     */
    public function getHandoverUser(): ?Employee
    {
        return $this->handoverUser;
    }

    /**
     * @param Employee|null $handoverUser
     * @return $this
     */
    public function setHandoverUser(?Employee $handoverUser): self
    {
        $this->handoverUser = $handoverUser;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getTakeoverDate(): ?\DateTimeInterface
    {
        return $this->takeoverDate;
    }

    /**
     * @param \DateTimeInterface|null $takeoverDate
     * @return $this
     */
    public function setTakeoverDate(?\DateTimeInterface $takeoverDate): self
    {
        $this->takeoverDate = $takeoverDate;

        return $this;
    }

    /**
     * @return Employee|null
     */
    public function getTakeoverUser(): ?Employee
    {
        return $this->takeoverUser;
    }

    /**
     * @param Employee|null $takeoverUser
     * @return $this
     */
    public function setTakeoverUser(?Employee $takeoverUser): self
    {
        $this->takeoverUser = $takeoverUser;

        return $this;
    }
}
