<?php

namespace App\Schemas\WebPanel\Village;

use App\Commons\Libs\Http\BaseSchema;

class VillageQuery extends BaseSchema
{
    private $page;
    private $pageSize;
    private $param;

    public function hydrateQuery()
    {
        $param = $this->query['param'] ?? '';
        $page = $this->query['page'] ?? 1;
        $pageSize = $this->query['pageSize'] ?? 10;

        $this->setParam($param)
            ->setPage($page)
            ->setPageSize($pageSize);
    }

    /**
     * Get the value of param
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Set the value of param
     *
     * @return  self
     */
    public function setParam($param)
    {
        $this->param = $param;

        return $this;
    }

    /**
     * Get the value of page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the value of page
     *
     * @return  self
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get the value of pageSize
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * Set the value of pageSize
     *
     * @return  self
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;

        return $this;
    }
}
