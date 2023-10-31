<?php

namespace App\Repository;

use App\Entity\TauxEmpreint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TauxEmpreint>
 *
 * @method TauxEmpreint|null find($id, $lockMode = null, $lockVersion = null)
 * @method TauxEmpreint|null findOneBy(array $criteria, array $orderBy = null)
 * @method TauxEmpreint[]    findAll()
 * @method TauxEmpreint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TauxEmpreintRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TauxEmpreint::class);
    }

//    /**
//     * @return TauxEmpreint[] Returns an array of TauxEmpreint objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TauxEmpreint
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
