<?php

namespace App\Repository;

use App\Entity\PlanDeTravail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanDeTravail|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanDeTravail|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanDeTravail[]    findAll()
 * @method PlanDeTravail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanDeTravailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanDeTravail::class);
    }

    // /**
    //  * @return PlanDeTravail[] Returns an array of PlanDeTravail objects
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
    public function findOneBySomeField($value): ?PlanDeTravail
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
