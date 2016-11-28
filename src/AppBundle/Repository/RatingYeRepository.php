<?php

namespace AppBundle\Repository;

use AppBundle\Entity\RatingYe;
use Doctrine\ORM\EntityRepository;

class RatingYeRepository extends EntityRepository
{
    /**
     * @return RatingYe[]
     */
    public function findAllRatingYeOrderById()
    {
        return $this->createQueryBuilder('ratingYe')
            ->orderBy('ratingYe.id', 'ASC');
    }
}