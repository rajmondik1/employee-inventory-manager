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

    // /**
    //  * @return EquipmentHandover[] Returns an array of EquipmentHandover objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipmentHandover
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
