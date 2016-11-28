<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cycle;
use AppBundle\Entity\Form;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class FormCdpRepository extends EntityRepository
{
    /**
     * @return Form[]
     */
    public function findCdpforCurrentUserInActiveCycle(User $currentUser, Cycle $cycle)
    {
        $qb = $this->createQueryBuilder('formCdp')
            ->where('formCdp.user = :currentUser')
            ->setParameter('currentUser', $currentUser)
            ->andWhere('formCdp.cycle = :currentCycle')
            ->setParameter('currentCycle', $cycle)
            ->leftJoin('formCdp.id', 'my')
            ->addSelect('my');

        $query = $qb->getQuery();

        var_dump($query->getDQL());

        var_dump($query->execute());
    }
}