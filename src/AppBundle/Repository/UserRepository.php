<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Form;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @return User[]
     */
    public function findAllSupervisorsOrderedByFirstname()
    {
        return $this->createQueryBuilder('user')
            ->where('user.roles LIKE :roleSupervisor')
            ->setParameter('roleSupervisor', '%SUPERVISOR%')
            ->andWhere('user.roles NOT LIKE :roleSuperAdmin')
            ->setParameter('roleSuperAdmin', '%SUPER_ADMIN%')
            ->orderBy('user.firstname', 'ASC');
    }

    /**
     * @return User[]
     */
    public function findAllUsersOrderedByFirstname()
    {
        $qb = $this->createQueryBuilder('user')
            ->where('user.roles NOT LIKE :roleSuperAdmin')
            ->setParameter('roleSuperAdmin', '%SUPER_ADMIN%')
            ->orderBy('user.firstname', 'ASC');
            //->getQuery()
            //->execute();

        $query = $qb->getQuery();

        //var_dump($query->getDQL());die;

        return $query->execute();
    }

    /**
     * @return User[]
     */
    public function checkSupervisorAccessToCDP(User $currentUser, Form $cdp)
    {
        return $this->createQueryBuilder('user')
            ->where('user.id = :cdpUser')
            ->setParameter('cdpUser', $cdp->getUser())
            ->andWhere('user.supervisor = :currentUser')
            ->setParameter('currentUser', $currentUser)
            ->getQuery()
            ->execute();
    }
}