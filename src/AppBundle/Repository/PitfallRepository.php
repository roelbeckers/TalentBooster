<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Pitfall;
use Doctrine\ORM\EntityRepository;

class PitfallRepository extends EntityRepository
{
    /**
     * @return Pitfall[]
     */
    public function findAllEnglishPitfallOrderByName()
    {
        return $this->createQueryBuilder('pitfall')
            ->where('pitfall.isStandard = :isStandard')
            ->setParameter('isStandard', true)
            ->andWhere('pitfall.language = :language')
            ->setParameter('language', '1')
            ->orderBy('pitfall.name', 'ASC');
    }
}