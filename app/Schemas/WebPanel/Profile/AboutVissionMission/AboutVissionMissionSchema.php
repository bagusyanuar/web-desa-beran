<?php

namespace App\Schemas\WebPanel\Profile\AboutVissionMission;

use App\Commons\Libs\Http\BaseSchema;

class AboutVissionMissionSchema extends BaseSchema
{
    private $vission;
    private $mission;

    protected function rules()
    {
        return [
            'vission' => 'required',
            'mission' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'vission.required' => 'kolom visi wajib diisi',
            'mission.required' => 'kolom misi wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $vission = $this->body['vission'];
        $mission = $this->body['mission'];
        $this->setVission($vission)
            ->setMission($mission);
    }


    /**
     * Get the value of vission
     */
    public function getVission()
    {
        return $this->vission;
    }

    /**
     * Set the value of vission
     *
     * @return  self
     */
    public function setVission($vission)
    {
        $this->vission = $vission;

        return $this;
    }

    /**
     * Get the value of mission
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Set the value of mission
     *
     * @return  self
     */
    public function setMission($mission)
    {
        $this->mission = $mission;

        return $this;
    }
}
