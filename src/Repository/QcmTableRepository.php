<?php

namespace App\Repository;

use App\Entity\QcmTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QcmTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method QcmTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method QcmTable[]    findAll()
 * @method QcmTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QcmTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QcmTable::class);
    }





}
