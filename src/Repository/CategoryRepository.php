<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findTraobjectByCategory(Category $category, State $state, int $limit): array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 'c', 's')
            ->innerJoin('t.category', 'c')
            ->innerJoin('t.state', 's')
            ->where($qb->expr()->eq('c.id', ':category'))
            ->andWhere($qb->expr()->eq('s.id', ':state'));

        return $qb
            ->setParameter(':category', $category->getId())
            ->setParameter(':state', $state->getId())
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }


    // /**
    //  * @return Category[] Returns an array of Category objects
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
    public function findOneBySomeField($value): ?Category
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
