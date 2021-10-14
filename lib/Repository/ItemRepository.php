<?php

namespace Mazarini\SymfoTabBundle\Repository;

use Mazarini\SymfoTabBundle\Entity\Item;
use Mazarini\SymfoTabBundle\Entity\Table;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function getTable(string $tableName): Table {
        if ($tableName === 'field') {
            $dataTable = new Table($this->getFields($tableName));
        } else {
            $dataTable = new Table($this->findBy(['tableName'=>$tableName]));
        }
        $dataTable->setTable($this->findOneBy(['tableName'=>'table','tableKey'=>$tableName]));
        $dataTable->setFields($this->getFields($tableName));
        return $dataTable;
    }

    public function getFields(string $tableName) : array {
        $query = $this->getEntityManager()->createQuery(
            'SELECT i
            FROM MazariniSymfoTabBundle:Item i
            WHERE i.tableName = \'field\'
            AND i.tableKey like :table
            ORDER BY i.tableOrder'
        )->setParameter('table', sprintf('%-16s',$tableName).'|%');
        return $query->getResult();
    }

    // /**
    //  * @return Item[] Returns an array of Item objects
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
    public function findOneBySomeField($value): ?Item
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
