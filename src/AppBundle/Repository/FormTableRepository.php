<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cycle;
use AppBundle\Entity\FormTable;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class FormTableRepository extends EntityRepository
{
    /**
     * @return FormTable[]
     */
    public function findFormsforCurrentUserInActiveCycle(User $currentUser, Cycle $currentCycle)
    {
        $qb = $this->createQueryBuilder('formTable')
            ->where('formTable.user = :currentUser')
            ->setParameter('currentUser', $currentUser)
            ->andWhere('formTable.cycle = :currentCycle')
            ->setParameter('currentCycle', $currentCycle);

        $query = $qb->getQuery();

        return $query->execute();
    }

    /**
     * @return FormTable[]
     */
    public function checkUserAccessToForms(User $currentUser, FormTable $formId)
    {
        return $this->createQueryBuilder('form')
            ->where('form.id = :formId')
            ->setParameter('formId', $formId)
            ->andWhere('form.user = :currentUser')
            ->setParameter('currentUser', $currentUser)
            ->getQuery()
            ->execute();
    }

    /**
     * @return Form[]
     */
    public function findAllFormsOfEmployeesForSupervisorInActiveCycle(array $usersOfSupervisor, Cycle $currentCycle)
    {
        return $this->createQueryBuilder('forms')
            ->where('forms.user IN (:usersOfSupervisor)')
            ->setParameter('usersOfSupervisor', $usersOfSupervisor)
            ->andWhere('forms.cycle = :currentCycle')
            ->setParameter('currentCycle', $currentCycle)
            ->getQuery()
            ->execute();

        /*$qb = $this->createQueryBuilder('form')
            ->where('u.supervisor = :currentUser')
            ->leftJoin('form.user', 'u')
            ->setParameter('currentUser', $currentUser);

        $query = $qb->getQuery();

        //var_dump($query->getDQL());die;

        return $query->execute();*/
    }
}