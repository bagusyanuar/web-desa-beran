<?php

namespace App\Schemas\WebPanel\CommunityUnit;

use App\Commons\Libs\Http\BaseSchema;

class CommunityUnitSchema extends BaseSchema
{
    private $villageId;
    private $code;
    private $leaderName;
    private $leaderContact;

    protected function rules()
    {
        return [
            'villageId' => 'required|string',
            'code' => 'required|string',
            'leaderName' => 'required|string',
            'leaderContact' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'villageId.required' => 'kolom dusun wajib diisi',
            'code.required' => 'kolom nomor rw wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $villageId = $this->body['villageId'];
        $code = $this->body['code'];
        $leaderName = !empty(trim($this->body['leaderName'] ?? '')) ? $this->body['leaderName'] : null;
        $leaderContact = !empty(trim($this->body['leaderContact'] ?? '')) ? $this->body['leaderContact'] : null;
        $this
            ->setVillageId($villageId)
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
     * Get the value of villageId
     */
    public function getVillageId()
    {
        return $this->villageId;
    }

    /**
     * Set the value of villageId
     *
     * @return  self
     */
    public function setVillageId($villageId)
    {
        $this->villageId = $villageId;

        return $this;
    }
}
