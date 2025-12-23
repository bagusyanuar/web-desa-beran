<?php

namespace App\Schemas\Mobile\OnlineLetter\Birth;

use App\Commons\Libs\Http\BaseSchema;

class BirthSchema extends BaseSchema
{
    private $applicantName;
    private $applicantPhone;
    private $infantName;
    private $infantBirthPlace;
    private $infantDateOfBirth;
    private $infantGender;
    private $infantBirthType;
    private $infantBirthOrder;
    private $motherName;
    private $motherNik;
    private $motherBirthPlace;
    private $motherDateOfBirth;
    private $motherCitizenShip;
    private $motherReligion;
    private $motherJob;
    private $motherAddress;
    private $fatherName;
    private $fatherNik;
    private $fatherBirthPlace;
    private $fatherDateOfBirth;
    private $fatherCitizenShip;
    private $fatherReligion;
    private $fatherJob;
    private $fatherAddress;

    protected function rules()
    {
        return [
            'infantName' => 'required|string',
            'infantBirthPlace' => 'required|string',
            'infantDateOfBirth' => 'required|date',
            'infantGender' => 'required|in:male,female',
            'infantBirthType' => 'required|in:single,twin',
            'infantBirthOrder' => 'required|numeric',
            'motherName' => 'required|string',
            'motherNik' => 'required|string',
            'motherBirthPlace' => 'required|string',
            'motherDateOfBirth' => 'required|date',
            'motherCitizenship' => 'required|in:indonesia,foreign',
            'motherReligion' => 'required|in:islam,kristen,katolik,hindu,budha,konghucu,other',
            'motherJob' => 'string',
            'motherAddress' => 'required|string',
            'fatherName' => 'required|string',
            'fatherNik' => 'required|string',
            'fatherBirthPlace' => 'required|string',
            'fatherDateOfBirth' => 'required|date',
            'fatherCitizenship' => 'required|in:indonesia,foreign',
            'fatherReligion' => 'required|in:islam,kristen,katolik,hindu,budha,konghucu,other',
            'fatherJob' => 'string',
            'fatherAddress' => 'required|string',
            'applicantName' => 'required|string',
            'applicantPhone' => 'required|string'
        ];
    }

    protected function messages()
    {
        return [
            'infantName.required' => 'kolom nama lengkap anak wajib diisi.',
            'infantBirthPlace.required' => 'kolom tempat lahir anak wajib diisi',
            'infantDateOfBirth.required' => 'kolom tanggal lahir anak wajib diisi',
            'infantDateOfBirth.date' => 'format tanggal lahir anak tidak valid',
            'infantGender.required' => 'kolom jenis kelamin anak wajib diisi',
            'infantGender.in' => 'nilai jenis kelamin anak tidak valid',
            'infantBirhtOrder.in' => 'kolom anak ke wajib diisi',
            'motherName.required' => 'kolom nama ibu wajib diisi',
            'motherNik.required' => 'kolom nik ibu wajib diisi',
            'motherBirthPlace.required' => 'kolom tempat lahir ibu wajib diisi',
            'motherDateOfBirth.required' => 'kolom tanggal lahir ibu wajib diisi',
            'motherCitizenship.required' => 'kolom kewarganegaraan ibu wajib diisi',
            'motherCitizenship.in' => 'nilai kewarganegaraan ibu tidak valid',
            'motherReligion.required' => 'kolom agama ibu wajib diisi',
            'motherReligion.in' => 'nilai agama ibu tidak valid',
            'motherAddress.required' => 'kolom alamat ibu wajib diisi',
            'fatherName.required' => 'kolom nama ayah wajib diisi',
            'fatherNik.required' => 'kolom nik ayah wajib diisi',
            'fatherBirthPlace.required' => 'kolom tempat lahir ayah wajib diisi',
            'fatherDateOfBirth.required' => 'kolom tanggal lahir ayah wajib diisi',
            'fatherCitizenship.required' => 'kolom kewarganegaraan ayah wajib diisi',
            'fatherCitizenship.in' => 'nilai kewarganegaraan ayah tidak valid',
            'fatherReligion.required' => 'kolom agama ayah wajib diisi',
            'fatherReligion.in' => 'nilai agama ayah tidak valid',
            'fatherAddress.required' => 'kolom alamat ayah wajib diisi',
            'applicantName.required' => 'kolom nama lengkap pemohon wajib diisi',
            'applicantPhone.required' => 'kolom nomor whatsapp pemohon wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $infantName = $this->body['infantName'];
        $infantBirthPlace = $this->body['infantBirthPlace'];
        $infantDateOfBirth = $this->body['infantDateOfBirth'];
        $infantGender = $this->body['infantGender'];
        $infantBirthType = $this->body['infantBirthType'];
        $infantBirthOrder = $this->body['infantBirthOrder'];
        $motherName = $this->body['motherName'];
        $motherNik = $this->body['motherNik'];
        $motherBirthPlace = $this->body['motherBirthPlace'];
        $motherDateOfBirth = $this->body['motherDateOfBirth'];
        $motherCitizenship = $this->body['motherCitizenship'];
        $motherReligion = $this->body['motherReligion'];
        $motherJob = !empty(trim($this->body['motherJob'] ?? '')) ? $this->body['motherJob'] : null;
        $motherAddress = $this->body['motherAddress'];
        $fatherName = $this->body['fatherName'];
        $fatherNik = $this->body['fatherNik'];
        $fatherBirthPlace = $this->body['fatherBirthPlace'];
        $fatherDateOfBirth = $this->body['fatherDateOfBirth'];
        $fatherCitizenship = $this->body['fatherCitizenship'];
        $fatherReligion = $this->body['fatherReligion'];
        $fatherJob = !empty(trim($this->body['fatherJob'] ?? '')) ? $this->body['fatherJob'] : null;
        $fatherAddress = $this->body['fatherAddress'];
        $applicantName = $this->body['applicantName'];
        $applicantPhone = $this->body['applicantPhone'];
        $this->setInfantName($infantName)
            ->setInfantBirthPlace($infantBirthPlace)
            ->setInfantDateOfBirth($infantDateOfBirth)
            ->setInfantGender($infantGender)
            ->setInfantBirthType($infantBirthType)
            ->setInfantBirthOrder($infantBirthOrder)
            ->setMotherName($motherName)
            ->setMotherNik($motherNik)
            ->setMotherBirthPlace($motherBirthPlace)
            ->setMotherDateOfBirth($motherDateOfBirth)
            ->setMotherCitizenShip($motherCitizenship)
            ->setMotherReligion($motherReligion)
            ->setMotherJob($motherJob)
            ->setMotherAddress($motherAddress)
            ->setFatherName($fatherName)
            ->setFatherNik($fatherNik)
            ->setFatherBirthPlace($fatherBirthPlace)
            ->setFatherDateOfBirth($fatherDateOfBirth)
            ->setFatherCitizenShip($fatherCitizenship)
            ->setFatherReligion($fatherReligion)
            ->setFatherJob($fatherJob)
            ->setFatherAddress($fatherAddress)
            ->setApplicantName($applicantName)
            ->setApplicantPhone($applicantPhone);
    }

    /**
     * Get the value of applicantName
     */
    public function getApplicantName()
    {
        return $this->applicantName;
    }

    /**
     * Set the value of applicantName
     *
     * @return  self
     */
    public function setApplicantName($applicantName)
    {
        $this->applicantName = $applicantName;

        return $this;
    }

    /**
     * Get the value of applicantPhone
     */
    public function getApplicantPhone()
    {
        return $this->applicantPhone;
    }

    /**
     * Set the value of applicantPhone
     *
     * @return  self
     */
    public function setApplicantPhone($applicantPhone)
    {
        $this->applicantPhone = $applicantPhone;

        return $this;
    }

    /**
     * Get the value of infantName
     */
    public function getInfantName()
    {
        return $this->infantName;
    }

    /**
     * Set the value of infantName
     *
     * @return  self
     */
    public function setInfantName($infantName)
    {
        $this->infantName = $infantName;

        return $this;
    }

    /**
     * Get the value of infantBirthPlace
     */
    public function getInfantBirthPlace()
    {
        return $this->infantBirthPlace;
    }

    /**
     * Set the value of infantBirthPlace
     *
     * @return  self
     */
    public function setInfantBirthPlace($infantBirthPlace)
    {
        $this->infantBirthPlace = $infantBirthPlace;

        return $this;
    }

    /**
     * Get the value of infantGender
     */
    public function getInfantGender()
    {
        return $this->infantGender;
    }

    /**
     * Set the value of infantGender
     *
     * @return  self
     */
    public function setInfantGender($infantGender)
    {
        $this->infantGender = $infantGender;

        return $this;
    }

    /**
     * Get the value of infantBirthType
     */
    public function getInfantBirthType()
    {
        return $this->infantBirthType;
    }

    /**
     * Set the value of infantBirthType
     *
     * @return  self
     */
    public function setInfantBirthType($infantBirthType)
    {
        $this->infantBirthType = $infantBirthType;

        return $this;
    }

    /**
     * Get the value of infantBirthOrder
     */
    public function getInfantBirthOrder()
    {
        return $this->infantBirthOrder;
    }

    /**
     * Set the value of infantBirthOrder
     *
     * @return  self
     */
    public function setInfantBirthOrder($infantBirthOrder)
    {
        $this->infantBirthOrder = $infantBirthOrder;

        return $this;
    }

    /**
     * Get the value of infantDateOfBirth
     */
    public function getInfantDateOfBirth()
    {
        return $this->infantDateOfBirth;
    }

    /**
     * Set the value of infantDateOfBirth
     *
     * @return  self
     */
    public function setInfantDateOfBirth($infantDateOfBirth)
    {
        $this->infantDateOfBirth = $infantDateOfBirth;

        return $this;
    }

    /**
     * Get the value of motherName
     */
    public function getMotherName()
    {
        return $this->motherName;
    }

    /**
     * Set the value of motherName
     *
     * @return  self
     */
    public function setMotherName($motherName)
    {
        $this->motherName = $motherName;

        return $this;
    }

    /**
     * Get the value of motherNik
     */
    public function getMotherNik()
    {
        return $this->motherNik;
    }

    /**
     * Set the value of motherNik
     *
     * @return  self
     */
    public function setMotherNik($motherNik)
    {
        $this->motherNik = $motherNik;

        return $this;
    }

    /**
     * Get the value of motherBirthPlace
     */
    public function getMotherBirthPlace()
    {
        return $this->motherBirthPlace;
    }

    /**
     * Set the value of motherBirthPlace
     *
     * @return  self
     */
    public function setMotherBirthPlace($motherBirthPlace)
    {
        $this->motherBirthPlace = $motherBirthPlace;

        return $this;
    }

    /**
     * Get the value of motherDateOfBirth
     */
    public function getMotherDateOfBirth()
    {
        return $this->motherDateOfBirth;
    }

    /**
     * Set the value of motherDateOfBirth
     *
     * @return  self
     */
    public function setMotherDateOfBirth($motherDateOfBirth)
    {
        $this->motherDateOfBirth = $motherDateOfBirth;

        return $this;
    }

    /**
     * Get the value of motherCitizenShip
     */
    public function getMotherCitizenShip()
    {
        return $this->motherCitizenShip;
    }

    /**
     * Set the value of motherCitizenShip
     *
     * @return  self
     */
    public function setMotherCitizenShip($motherCitizenShip)
    {
        $this->motherCitizenShip = $motherCitizenShip;

        return $this;
    }

    /**
     * Get the value of motherReligion
     */
    public function getMotherReligion()
    {
        return $this->motherReligion;
    }

    /**
     * Set the value of motherReligion
     *
     * @return  self
     */
    public function setMotherReligion($motherReligion)
    {
        $this->motherReligion = $motherReligion;

        return $this;
    }

    /**
     * Get the value of motherJob
     */
    public function getMotherJob()
    {
        return $this->motherJob;
    }

    /**
     * Set the value of motherJob
     *
     * @return  self
     */
    public function setMotherJob($motherJob)
    {
        $this->motherJob = $motherJob;

        return $this;
    }

    /**
     * Get the value of motherAddress
     */
    public function getMotherAddress()
    {
        return $this->motherAddress;
    }

    /**
     * Set the value of motherAddress
     *
     * @return  self
     */
    public function setMotherAddress($motherAddress)
    {
        $this->motherAddress = $motherAddress;

        return $this;
    }

    /**
     * Get the value of fatherName
     */
    public function getFatherName()
    {
        return $this->fatherName;
    }

    /**
     * Set the value of fatherName
     *
     * @return  self
     */
    public function setFatherName($fatherName)
    {
        $this->fatherName = $fatherName;

        return $this;
    }

    /**
     * Get the value of fatherNik
     */
    public function getFatherNik()
    {
        return $this->fatherNik;
    }

    /**
     * Set the value of fatherNik
     *
     * @return  self
     */
    public function setFatherNik($fatherNik)
    {
        $this->fatherNik = $fatherNik;

        return $this;
    }

    /**
     * Get the value of fatherBirthPlace
     */
    public function getFatherBirthPlace()
    {
        return $this->fatherBirthPlace;
    }

    /**
     * Set the value of fatherBirthPlace
     *
     * @return  self
     */
    public function setFatherBirthPlace($fatherBirthPlace)
    {
        $this->fatherBirthPlace = $fatherBirthPlace;

        return $this;
    }

    /**
     * Get the value of fatherDateOfBirth
     */
    public function getFatherDateOfBirth()
    {
        return $this->fatherDateOfBirth;
    }

    /**
     * Set the value of fatherDateOfBirth
     *
     * @return  self
     */
    public function setFatherDateOfBirth($fatherDateOfBirth)
    {
        $this->fatherDateOfBirth = $fatherDateOfBirth;

        return $this;
    }

    /**
     * Get the value of fatherCitizenShip
     */
    public function getFatherCitizenShip()
    {
        return $this->fatherCitizenShip;
    }

    /**
     * Set the value of fatherCitizenShip
     *
     * @return  self
     */
    public function setFatherCitizenShip($fatherCitizenShip)
    {
        $this->fatherCitizenShip = $fatherCitizenShip;

        return $this;
    }

    /**
     * Get the value of fatherReligion
     */
    public function getFatherReligion()
    {
        return $this->fatherReligion;
    }

    /**
     * Set the value of fatherReligion
     *
     * @return  self
     */
    public function setFatherReligion($fatherReligion)
    {
        $this->fatherReligion = $fatherReligion;

        return $this;
    }

    /**
     * Get the value of fatherJob
     */
    public function getFatherJob()
    {
        return $this->fatherJob;
    }

    /**
     * Set the value of fatherJob
     *
     * @return  self
     */
    public function setFatherJob($fatherJob)
    {
        $this->fatherJob = $fatherJob;

        return $this;
    }

    /**
     * Get the value of fatherAddress
     */
    public function getFatherAddress()
    {
        return $this->fatherAddress;
    }

    /**
     * Set the value of fatherAddress
     *
     * @return  self
     */
    public function setFatherAddress($fatherAddress)
    {
        $this->fatherAddress = $fatherAddress;

        return $this;
    }
}
