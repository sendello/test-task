<?php
/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 12:40
 */

namespace AppBundle\Service;


use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class Pagiante
{
    protected $page;

    protected $limit;

    protected $request;

    public function __construct(RequestStack $request_stack, $paginationPageName, $paginationLimitName, $limit)
    {
        $this->request = $request_stack->getCurrentRequest();
        $this->setPage($this->request->query->get($paginationPageName, null));
        $this->setLimit($this->request->query->get($paginationLimitName, $limit));
    }

    /**
     * @param mixed $data
     * @return mixed
     */
    abstract public function paginate($data);

    protected function getOffset()
    {
        if ($this->page && $this->limit) {
            return ($this->page - 1) * $this->limit;
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        if (is_numeric($page)) {
            $this->page = abs($page);
        } else {
            $this->page = null;
        }
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        if (is_numeric($limit)) {
            $this->limit = abs($limit);
        } else {
            $this->limit = null;
        }
    }

}