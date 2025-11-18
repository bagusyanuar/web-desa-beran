<?php

namespace App\Schemas\WebPanel\Village;

use App\Commons\Libs\Http\BaseSchema;

class VillageSchema extends BaseSchema
{
    private $name;
    private $leaderName;
    private $leaderContact;

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'leaderName' => 'required|string',
            'leaderContact' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'kolom nama dusun wajib diisi',
        ];
    }

    public function hydrateBody()
    {
        $name = $this->body['name'];
        $leaderName = !empty(trim($this->body['leaderName'] ?? '')) ? $this->body['leaderName'] : null;
        $leaderContact = !empty(trim($this->body['leaderContact'] ?? '')) ? $this->body['leaderContact'] : null;
        $this->setName($name)
            ->setLeaderName($leaderName)
            ->setLeaderContact($leaderContact);
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
