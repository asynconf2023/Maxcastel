<?php

namespace App\Repository;

use App\Entity\CarburantsType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarburantsType>
 *
 * @method CarburantsType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarburantsType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarburantsType[]    findAll()
 * @method CarburantsType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarburantsTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarburantsType::class);
    }

//    /**
//     * @return CarburantsType[] Returns an array of CarburantsType objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarburantsType
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
