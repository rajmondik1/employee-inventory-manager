<?php

namespace App\Repository;

use App\Entity\EquipmentHandover;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipmentHandover|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentHandover|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentHandover[]    findAll()
 * @method EquipmentHandover[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentHandoverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentHandover::class);
    }
}
