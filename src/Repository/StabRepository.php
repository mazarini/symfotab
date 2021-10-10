<?php

namespace App\Repository;

use App\Entity\Stab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stab|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stab|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stab[]    findAll()
 * @method Stab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stab::class);
    }

    // /**
    //  * @return Stab[] Returns an array of Stab objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stab
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
