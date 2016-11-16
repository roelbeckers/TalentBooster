<?php

namespace AppBundle\Repository;

use AppBundle\Entity\RatingMY;
use Doctrine\ORM\EntityRepository;

class RatingMYRepository extends EntityRepository
{
    /**
     * @return RatingMY[]
     */
    public function findAllRatingMYOrderById()
    {
        return $this->createQueryBuilder('ratingMY')
            ->orderBy('ratingMY.id', 'ASC');
    }
}