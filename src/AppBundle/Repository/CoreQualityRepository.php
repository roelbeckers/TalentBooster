<?php

namespace AppBundle\Repository;

use AppBundle\Entity\CoreQuality;
use Doctrine\ORM\EntityRepository;

class CoreQualityRepository extends EntityRepository
{
    /**
     * @return CoreQuality[]
     */
    public function findAllEnglishCoreQualityOrderByName()
    {
        return $this->createQueryBuilder('coreQuality')
            ->where('coreQuality.isStandard = :isStandard')
            ->setParameter('isStandard', true)
            ->andWhere('coreQuality.language = :language')
            ->setParameter('language', '1')
            ->orderBy('coreQuality.name', 'ASC');
    }
}