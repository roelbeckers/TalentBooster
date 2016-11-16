<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Challenge;
use Doctrine\ORM\EntityRepository;

class ChallengeRepository extends EntityRepository
{
    /**
     * @return Challenge[]
     */
    public function findAllEnglishChallengeOrderById()
    {
        return $this->createQueryBuilder('challenge')
            ->where('challenge.isStandard = :isStandard')
            ->setParameter('isStandard', true)
            ->andWhere('challenge.language = :language')
            ->setParameter('language', '1')
            ->orderBy('challenge.name', 'ASC');
    }
}