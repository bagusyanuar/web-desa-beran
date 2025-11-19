<?php

namespace App\Schemas\WebPanel\NeighborhoodUnit;

use App\Commons\Libs\Http\BaseSchema;

class NeighborhoodUnitSchema extends BaseSchema
{
    private $communityUnitId;
    private $code;
    private $leaderName;
    private $leaderContact;

    protected function rules()
    {
        return [
            'communityUnitId' => 'required|string',
            'code' => 'required|string',
            'leaderName' => 'required|string',
            'leaderContact' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'communityUnitId.required' => 'kolom rw wajib diisi',
            'code.required' => 'kolom nomor rw wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $communityUnitId = $this->body['communityUnitId'];
        $code = $this->body['code'];
        $leaderName = !empty(trim($this->body['leaderName'] ?? '')) ? $this->body['leaderName'] : null;
        $leaderContact = !empty(trim($this->body['leaderContact'] ?? '')) ? $this->body['leaderContact'] : null;
        $this
            ->setCommunityUnitId($communityUnitId)
            ->setCode($code)
            ->setLeaderName($leaderName)
            ->setLeaderContact($leaderContact);
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of leaderName
     */
    public function getLeaderName()
    {
        return $this->leaderName;
    }

    /**
     * Set the value of leaderName
     *
     * @return  self
     */
    public function setLeaderName($leaderName)
    {
        $this->leaderName = $leaderName;

        return $this;
    }

    /**
     * Get the value of leaderContact
     */
    public function getLeaderContact()
    {
        return $this->leaderContact;
    }

    /**
     * Set the value of leaderContact
     *
     * @return  self
     */
    public function setLeaderContact($leaderContact)
    {
        $this->leaderContact = $leaderContact;

        return $this;
    }


    /**
     * Get the value of communityUnitId
     */
    public function getCommunityUnitId()
    {
        return $this->communityUnitId;
    }

    /**
     * Set the value of communityUnitId
     *
     * @return  self
     */
    public function setCommunityUnitId($communityUnitId)
    {
        $this->communityUnitId = $communityUnitId;

        return $this;
    }
}
