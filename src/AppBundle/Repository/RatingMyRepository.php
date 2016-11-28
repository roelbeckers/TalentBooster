<?php

namespace AppBundle\Repository;

use AppBundle\Entity\RatingMy;
use Doctrine\ORM\EntityRepository;

class RatingMyRepository extends EntityRepository
{
    /**
     * @return RatingMy[]
     */
    public function findAllRatingMyOrderById()
    {
        return $this->createQueryBuilder('ratingMy')
            ->orderBy('ratingMy.id', 'ASC');
    }
}