<?php

namespace App\Repository;

use App\Entity\ConteinerMovimentacoes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConteinerMovimentacoes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConteinerMovimentacoes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConteinerMovimentacoes[]    findAll()
 * @method ConteinerMovimentacoes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConteinerMovimentacoesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConteinerMovimentacoes::class);
    }

    // /**
    //  * @return ConteinerMovimentacoes[] Returns an array of ConteinerMovimentacoes objects
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
    public function findOneBySomeField($value): ?ConteinerMovimentacoes
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
