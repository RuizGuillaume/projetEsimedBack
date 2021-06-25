<?php

namespace App\Repository;

use App\Entity\GammeOperation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GammeOperation|null find($id, $lockMode = null, $lockVersion = null)
 * @method GammeOperation|null findOneBy(array $criteria, array $orderBy = null)
 * @method GammeOperation[]    findAll()
 * @method GammeOperation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GammeOperationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GammeOperation::class);
    }

    // /**
    //  * @return GammeOperation[] Returns an array of GammeOperation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GammeOperation
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
