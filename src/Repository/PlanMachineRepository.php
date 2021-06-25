<?php

namespace App\Repository;

use App\Entity\PlanMachine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanMachine|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanMachine|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanMachine[]    findAll()
 * @method PlanMachine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanMachineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanMachine::class);
    }

    // /**
    //  * @return PlanMachine[] Returns an array of PlanMachine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanMachine
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
