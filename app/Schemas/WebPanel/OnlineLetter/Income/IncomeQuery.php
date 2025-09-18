<?php

namespace App\Schemas\WebPanel\OnlineLetter\Income;

use App\Commons\Libs\Http\BaseSchema;

class IncomeQuery extends BaseSchema
{
    private $page;
    private $pageSize;
    private $param;
    private $status;
    private $startDate;
    private $endDate;

    public function hydrateQuery()
    {
        $param = $this->query['param'] ?? '';
        $page = $this->query['page'] ?? 1;
        $pageSize = $this->query['pageSize'] ?? 10;
        $status = !empty($this->query['status']) ? $this->query['status'] : [];
        $startDate = !empty(trim($this->query['startDate'] ?? '')) ? $this->query['startDate'] : null;
        $endDate = !empty(trim($this->query['endDate'] ?? '')) ? $this->query['endDate'] : null;

        $this->setParam($param)
            ->setPage($page)
            ->setPageSize($pageSize)
            ->setStatus($status)
            ->setStartDate($startDate)
            ->setEndDate($endDate);
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

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @return  self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }
}
