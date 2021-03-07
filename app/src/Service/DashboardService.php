<?php


namespace App\Service;


use App\Entity\Employee;
use App\Entity\Equipment;
use App\Entity\EquipmentHandover;
use Doctrine\ORM\EntityManagerInterface;

class DashboardService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return int
     */
    public function getEmployeeCount(): int
    {
        return $this->em->getRepository(Employee::class)->count([]);
    }

    /**
     * @return int
     */
    public function getEquipmentCount(): int
    {
        return $this->em->getRepository(Equipment::class)->count([]);

    }

    /**
     * @return int
     */
    public function getHandoverCount(): int
    {
        return $this->em->getRepository(EquipmentHandover::class)->count([]);
    }

    /**
     * @return double
     */
    public function getTotalPrice(): float
    {
        return $this->em->getRepository(Equipment::class)->countTotalPrice()[1];
    }
}