<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cycle;
use Doctrine\ORM\EntityRepository;

class CycleRepository extends EntityRepository
{
    /**
     * @return Cycle[]
     */
    public function findAllCyclesOrderedByCDPStartDate()
    {
        return $this->createQueryBuilder('cycle')
            ->orderBy('cycle.cdpDateStart', 'DESC')
            ->getQuery()
            ->execute();
    }

    /**
     * @return Cycle[]
     */
    public function findAllCyclesNotStartedOrderedByCDPStartDate()
    {
        return $this->createQueryBuilder('cycle')
            ->where('cycle.cdpDateStart > :currentDate')
            ->setParameter('currentDate', new \DateTime())
            ->orderBy('cycle.cdpDateStart', 'DESC')
            ->getQuery()
            ->execute();
    }
}