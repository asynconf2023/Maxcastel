<?php

namespace App\Repository;

use App\Entity\Kilometrages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kilometrages>
 *
 * @method Kilometrages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kilometrages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kilometrages[]    findAll()
 * @method Kilometrages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KilometragesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kilometrages::class);
    }

//    /**
//     * @return Kilometrages[] Returns an array of Kilometrages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Kilometrages
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
