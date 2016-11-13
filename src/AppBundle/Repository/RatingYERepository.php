<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FormRepository extends EntityRepository
{
    /**
     * @return RatingMY[]
     */
    public function findAllRatingMYOrderById()
    {
        return $this->createQueryBuilder('ratingMY')
            ->orderBy('ratingMY.id')
            ->getQuery()
            ->execute();
    }
}