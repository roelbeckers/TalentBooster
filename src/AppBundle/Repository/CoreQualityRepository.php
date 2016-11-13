<?php

namespace AppBundle\Repository;

use AppBundle\Entity\RatingYE;
use Doctrine\ORM\EntityRepository;

class RatingYERepository extends EntityRepository
{
    /**
     * @return RatingYE[]
     */
    public function findAllRatingYEOrderById()
    {
        return $this->createQueryBuilder('ratingYE')
            ->orderBy('ratingYE.id', 'ASC')
    }
}