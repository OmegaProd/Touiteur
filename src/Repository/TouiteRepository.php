<?php

namespace App\Repository;

use App\Entity\Touite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Touite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Touite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Touite[]    findAll()
 * @method Touite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TouiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Touite::class);
    }

    // /**
    //  * @return Touite[] Returns an array of Touite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Touite
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
