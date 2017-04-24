<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cycle;
use Doctrine\ORM\EntityRepository;

class CycleRepository extends EntityRepository
{
    /**
     * @return Cycle[]
     */
    public function findActiveCycle()
    {
        $qb = $this->createQueryBuilder('cycle')
            ->where('cycle.cdpDateStart < :currentDate')
            //->orWhere('cycle.cdpDateStart < :currentDate AND cycle.cdpDateEnd > :currentDate')
            //->orWhere('cycle.myDateStart < :currentDate AND cycle.myDateEnd > :currentDate')
            //->orWhere('cycle.yeDateStart < :currentDate AND cycle.yeDateEnd > :currentDate')
            ->setParameter('currentDate', new \DateTime())
            ->orderBy('cycle.cdpDateStart', 'DESC');

        $query = $qb->getQuery();

        //var_dump($query->getDQL());die;

        return $query->execute();
    }

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