<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Fire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fire>
 *
 * @method Fire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fire[]    findAll()
 * @method Fire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class FireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fire::class);
    }

    public function getAllForestNames(int $page, int $maxResults): array
    {
        $offset = ($page - 1) * $maxResults;

        return $this->createQueryBuilder('fires')
            ->select('distinct fires.forestName')
           ->getQuery()
           ->setMaxResults($maxResults)
           ->setFirstResult($offset)
           ->getSingleColumnResult();
    }
}
