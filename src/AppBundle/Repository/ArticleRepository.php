<?php

/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 12:19
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function getFindAllQuery()
    {
        $qb = $this->createQueryBuilder('article');
        return $qb;
    }
}