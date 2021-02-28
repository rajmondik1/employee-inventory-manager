<?php


namespace App\Service;


use App\Entity\Employee;
use App\Entity\Equipment;
use App\Entity\EquipmentHandover;
use Doctrine\Common\Collections\Criteria;
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
    public function getEmployeeCount()
    {
        return $this->em->getRepository(Employee::class)->count([]);
    }

    /**
     * @return int
     */
    public function getEquipmentCount()
    {
        return $this->em->getRepository(Equipment::class)->count([]);

    }

    /**
     * @return int
     */
    public function getHandoverCount()
    {
        return $this->em->getRepository(EquipmentHandover::class)->count([]);
    }

    /**
     * @return double
     */
    public function getTotalPrice()
    {
        return $this->em->getRepository(Equipment::class)->countTotalPrice()[1];
    }
}