<?php

namespace App\Repository;

use App\Entity\BucketList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BucketList>
 *
 * @method BucketList|null find($id, $lockMode = null, $lockVersion = null)
 * @method BucketList|null findOneBy(array $criteria, array $orderBy = null)
 * @method BucketList[]    findAll()
 * @method BucketList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BucketListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BucketList::class);
    }

    public function add(BucketList $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BucketList $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(): void
    {
        $this->getEntityManager()->flush();
    }


    // function findName($name):array {
    //     $dql = "SELECT b FROM App\Entity\BucketList b WHERE b.name LIKE :name";
    //     $em = $this->getEntityManager();
    //     $query = $em->createQuery($dql);
    //     $query->setParameter(":name", $name);
    //    
    
    function findName($name):array {
        $qb = $this->createQueryBuilder("a");
        $query = $qb -> andWhere("a.name LIKE :name")
            -> setParameter(":name", $name)
            -> getQuery();
            return $query->getResult();
    }

    function findDate($startDate, $endDate):array {
        $dql = "SELECT b FROM App\Entity\BucketList b WHERE b.date BETWEEN :startDate AND :endDate";
        $em = $this->getEntityManager();
        $query = $em->createQuery($dql);
        $query->setParameter(":startDate", $startDate);
        $query->setParameter(":endDate", $endDate);
        return $query->getResult();
    }

//    /**
//     * @return BucketList[] Returns an array of BucketList objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BucketList
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
