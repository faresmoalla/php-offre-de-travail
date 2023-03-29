<?php

namespace App\Repository;

use App\Entity\OffresDeTravail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OffresDeTravail>
 *
 * @method OffresDeTravail|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffresDeTravail|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffresDeTravail[]    findAll()
 * @method OffresDeTravail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffresDeTravailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffresDeTravail::class);
    }

    public function save(OffresDeTravail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OffresDeTravail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     *
     * Requête QueryBuilder
     */
    public function listOffreParEntreprises(){
        return $this->createQueryBuilder('c')
            ->orderBy('c.salaire_offre_de_travail','ASC')
            ->getQuery()
            ->getResult()

            ;

    }



//    /**
//     * @return OffresDeTravail[] Returns an array of OffresDeTravail objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OffresDeTravail
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
