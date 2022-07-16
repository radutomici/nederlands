<?php

namespace App\Repository;

use App\Entity\IrregularVerb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IrregularVerb>
 *
 * @method IrregularVerb|null find($id, $lockMode = null, $lockVersion = null)
 * @method IrregularVerb|null findOneBy(array $criteria, array $orderBy = null)
 * @method IrregularVerb[]    findAll()
 * @method IrregularVerb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IrregularVerbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IrregularVerb::class);
    }

    public function add(IrregularVerb $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IrregularVerb $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IrregularVerb[] Returns an array of IrregularVerb objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IrregularVerb
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
