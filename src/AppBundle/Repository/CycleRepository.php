<?php

namespace AppBundle\Repository;

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
            ->orderBy('user.firstname', 'ASC');
    }

    /**
     * @return User[]
     */
    public function findAllUsersOrderedByFirstname()
    {
        return $this->createQueryBuilder('user')
            ->orderBy('user.firstname', 'ASC')
            ->getQuery()
            ->execute();
    }
}
