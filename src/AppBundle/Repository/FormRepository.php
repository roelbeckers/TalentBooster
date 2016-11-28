<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cycle;
use AppBundle\Entity\Form;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class FormRepository extends EntityRepository
{
    /**
     * @return Form[]
     */
    public function findAllFormsForCurrentUser(User $currentUser)
    {
        return $this->createQueryBuilder('form')
            ->where('form.user = :currentUser')
            ->setParameter('currentUser', $currentUser)
            ->getQuery()
            ->execute();
    }

    /**
     * @return Form[]
     */
    public function findAllFormsOfEmployeesForSupervisor(User $currentUser)
    {
        $qb = $this->createQueryBuilder('form')
            ->where('u.supervisor = :currentUser')
            ->leftJoin('form.user', 'u')
            ->setParameter('currentUser', $currentUser);

        $query = $qb->getQuery();

        //var_dump($query->getDQL());die;

        return $query->execute();
    }

    /**
     * @return Form[]
     */
    public function findCDP(Form $formId)
    {
        return $this->createQueryBuilder('cdp')
            ->where('cdp.id = :formId')
            ->setParameter('formId', $formId)
            ->getQuery()
            ->execute();
    }

}