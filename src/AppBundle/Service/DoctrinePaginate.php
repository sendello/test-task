<?php

/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 11:42
 */
namespace AppBundle\Service;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DoctrinePaginate extends Pagiante
{

    /**
     * @param QueryBuilder $builder
     * @return mixed
     */
    public function paginate($builder)
    {
        if ($this->getLimit() && $this->getOffset() !== null) {
            $builder->setMaxResults($this->getLimit());
            $builder->setFirstResult($this->getOffset());
            return new Paginator($builder->getQuery());
        }
        return $builder->getQuery()->getResult();
    }

}