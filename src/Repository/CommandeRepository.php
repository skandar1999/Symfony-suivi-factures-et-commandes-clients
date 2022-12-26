<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commande>
 *
 * @method Commande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commande[]    findAll()
 * @method Commande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    public function save(Commande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Commande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Commande[] Returns an array of Commande objects
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

//    public function findOneBySomeField($value): ?Commande
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

        public function findMostPopularProduits()
    {
            $sql = "SELECT p2.lib, COUNT(*) AS howMany
        FROM Produit p1 
        INNER JOIN Produit p2 ON p2.id=p1.id
            GROUP BY p2.lib
            ORDER BY howMany DESC"; 
        $statement = $this->_em->getConnection()->prepare($sql);
        $result = $statement->executeQuery()->fetchAllAssociative();
        return $result;
    } 
    

        public function findMostPopularDates()
            {
        $sql = "SELECT datc, codc_id
            FROM Commande 
            WHERE datc BETWEEN '2020-01-01 00:00:00' and '2022-12-31 00:00:00'";
        $statement = $this->_em->getConnection()->prepare($sql);
            $result = $statement->executeQuery()->fetchAllAssociative();
    return $result;
            }

}