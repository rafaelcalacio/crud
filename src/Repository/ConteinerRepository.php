<?php

namespace App\Repository;

use App\Entity\Conteiner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conteiner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conteiner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conteiner[]    findAll()
 * @method Conteiner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConteinerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conteiner::class);
    }

    // /**
    //  * @return Conteiner[] Returns an array of Conteiner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conteiner
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
