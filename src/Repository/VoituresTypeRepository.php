<?php

namespace App\Repository;

use App\Entity\VoituresType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VoituresType>
 *
 * @method VoituresType|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoituresType|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoituresType[]    findAll()
 * @method VoituresType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoituresTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoituresType::class);
    }

//    /**
//     * @return VoituresType[] Returns an array of VoituresType objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VoituresType
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
