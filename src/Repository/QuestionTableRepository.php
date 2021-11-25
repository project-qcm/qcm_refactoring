<?php

namespace App\Repository;

use App\Entity\QuestionTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestionTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionTable[]    findAll()
 * @method QuestionTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionTable::class);
    }

    public function findTest($id){
        return $this->createQueryBuilder('q')
            ->andWhere('q.idQestion = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    // /**
    //  * @return QuestionTable[] Returns an array of QuestionTable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestionTable
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
