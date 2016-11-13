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
}