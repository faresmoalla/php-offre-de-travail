<?php

namespace App\Repository;

use App\Entity\InvitationsParticipation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InvitationsParticipation>
 *
 * @method InvitationsParticipation|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvitationsParticipation|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvitationsParticipation[]    findAll()
 * @method InvitationsParticipation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvitationsParticipationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvitationsParticipation::class);
    }

    public function save(InvitationsParticipation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(InvitationsParticipation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return InvitationsParticipation[] Returns an array of InvitationsParticipation objects
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

//    public function findOneBySomeField($value): ?InvitationsParticipation
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
