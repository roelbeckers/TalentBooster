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
            ->andWhere('user.enabled = true')
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

    /**
     * @return User[]
     */
    public function findAllUsersForSupervisor(User $currentUser)
    {
        return $this->createQueryBuilder('user')
            ->where('user.supervisor = :currentUser')
            ->setParameter('currentUser', $currentUser)
            ->andWhere('user.roles LIKE :userRole')
            ->setParameter('userRole', '%ROLE_USER%')
            ->andWhere('user.id != :currentUser')
            ->andWhere('user.enabled = true');
            //->orderBy('user.firstname', 'ASC');
            //->getQuery()
            //->execute();
    }

    /**
     * @return User[]
     */
    public function findAllUsersForHR()
    {
        return $this->createQueryBuilder('user')
            ->where('user.roles LIKE :roleUser')
            ->setParameter('roleUser', '%USER%')
            ->andWhere('user.roles NOT LIKE :roleSuperAdmin')
            ->setParameter('roleSuperAdmin', '%SUPER_ADMIN%')
            ->andWhere('user.enabled = true');
            //->orderBy('user.firstname', 'ASC');
            //->getQuery();
            //->execute();
    }
}