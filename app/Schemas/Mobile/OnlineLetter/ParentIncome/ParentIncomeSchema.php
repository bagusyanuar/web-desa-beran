<?php

namespace App\Schemas\Mobile\OnlineLetter\ParentIncome;

use App\Commons\Libs\Http\BaseSchema;

class ParentIncomeSchema extends BaseSchema
{
    private $name;
    private $nik;
    private $birthPlace;
    private $dateOfBirth;
    private $gender;
    private $citizenship;
    private $religion;
    private $marriage;
    private $job;
    private $address;
    private $parentName;
    private $parentNik;
    private $parentBirthPlace;
    private $parentDateOfBirth;
    private $parentGender;
    private $parentCitizenship;
    private $parentReligion;
    private $parentMarriage;
    private $parentJob;
    private $parentAddress;
    private $fatherIncomePerMonth;
    private $motherIncomePerMonth;
    private $applicantName;
    private $applicantPhone;

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'nik' => 'required|string',
            'birthPlace' => 'required|string',
            'dateOfBirth' => 'required|date',
            'gender' => 'required|in:male,female',
            'citizenship' => 'required|in:indonesia,foreign',
            'religion' => 'required|in:islam,kristen,katolik,hindu,budha,konghucu,other',
            'marriage' => 'required|in:married,not-married',
            'job' => 'string',
            'address' => 'required|string',
            'parentName' => 'required|string',
            'parentNik' => 'required|string',
            'parentBirthPlace' => 'required|string',
            'parentDateOfBirth' => 'required|date',
            'parentGender' => 'required|in:male,female',
            'parentCitizenship' => 'required|in:indonesia,foreign',
            'parentReligion' => 'required|in:islam,kristen,katolik,hindu,budha,konghucu,other',
            'parentMarriage' => 'required|in:married,not-married',
            'parentJob' => 'string',
            'parentAddress' => 'required|string',
            'fatherIncomePerMonth' => 'required|numeric',
            'motherIncomePerMonth' => 'required|numeric',
            'applicantName' => 'required|string',
            'applicantPhone' => 'required|string'
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'kolom nama lengkap wajib diisi.',
            'nik.required' => 'kolom nik wajib diisi',
            'birthPlace.required' => 'kolom tempat lahir wajib diisi',
            'dateOfBirth.required' => 'kolom tanggal lahir wajib diisi',
            'dateOfBirth.date' => 'format tanggal lahir tidak valid',
            'gender.required' => 'kolom jenis kelamin wajib diisi',
            'gender.in' => 'nilai jenis kelamin tidak valid',
            'citizenship.required' => 'kolom kewarganegaraan wajib diisi',
            'citizenship.in' => 'nilai kewarganegaraan tidak valid',
            'religion.required' => 'kolom agama wajib diisi',
            'religion.in' => 'nilai agama tidak valid',
            'marriage.required' => 'kolom status perkawinan wajib diisi',
            'marriage.in' => 'nilai status perkawinan tidak valid',
            'address.required' => 'kolom alamat wajib diisi',
            'parentName.required' => 'kolom nama lengkap wali / orang tua wajib diisi.',
            'parentNik.required' => 'kolom nik wali / orang tua wajib diisi',
            'parentBirthPlace.required' => 'kolom tempat lahir wali / orang tua wajib diisi',
            'parentDateOfBirth.required' => 'kolom tanggal lahir wali / orang tua wajib diisi',
            'parentDateOfBirth.date' => 'format tanggal lahir wali / orang tua tidak valid',
            'parentGender.required' => 'kolom jenis kelamin wali / orang tua wajib diisi',
            'parentGender.in' => 'nilai jenis kelamin wali / orang tua tidak valid',
            'parentCitizenship.required' => 'kolom kewarganegaraan wali / orang tua wajib diisi',
            'parentCitizenship.in' => 'nilai kewarganegaraan wali / orang tua tidak valid',
            'parentReligion.required' => 'kolom agama wali / orang tua wajib diisi',
            'parentReligion.in' => 'nilai agama wali / orang tua tidak valid',
            'parentMarriage.required' => 'kolom status perkawinan wali / orang tua wajib diisi',
            'parentMarriage.in' => 'nilai status perkawinan wali / orang tua tidak valid',
            'parentAddress.required' => 'kolom alamat wali / orang tua wajib diisi',
            'motherIncomePerMonth.required' => 'kolom penghasilan ibu per bulan wajib diisi',
            'fatherIncomePerMonth.required' => 'kolom penghasilan ayah per bulan wajib diisi',
            'applicantName.required' => 'kolom nama lengkap pemohon wajib diisi',
            'applicantPhone.required' => 'kolom nomor whatsapp pemohon wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $name = $this->body['name'];
        $nik = $this->body['nik'];
        $birthPlace = $this->body['birthPlace'];
        $dateOfBirth = $this->body['dateOfBirth'];
        $gender = $this->body['gender'];
        $citizenship = $this->body['citizenship'];
        $religion = $this->body['religion'];
        $marriage = $this->body['marriage'];
        $job = !empty(trim($this->body['job'] ?? '')) ? $this->body['job'] : null;
        $address = $this->body['address'];
        $parentName = $this->body['parentName'];
        $parentNik = $this->body['parentNik'];
        $parentBirthPlace = $this->body['parentBirthPlace'];
        $parentDateOfBirth = $this->body['parentDateOfBirth'];
        $parentGender = $this->body['parentGender'];
        $parentCitizenship = $this->body['parentCitizenship'];
        $parentReligion = $this->body['parentReligion'];
        $parentMarriage = $this->body['parentMarriage'];
        $parentJob = !empty(trim($this->body['parentJob'] ?? '')) ? $this->body['parentJob'] : null;
        $parentAddress = $this->body['parentAddress'];
        $fatherIncomePerMonth = $this->body['fatherIncomePerMonth'];
        $motherIncomePerMonth = $this->body['motherIncomePerMonth'];
        $applicantName = $this->body['applicantName'];
        $applicantPhone = $this->body['applicantPhone'];
        $this->setName($name)
            ->setNik($nik)
            ->setBirthPlace($birthPlace)
            ->setDateOfBirth($dateOfBirth)
            ->setGender($gender)
            ->setCitizenship($citizenship)
            ->setReligion($religion)
            ->setMarriage($marriage)
            ->setJob($job)
            ->setAddress($address)
            ->setParentName($parentName)
            ->setParentNik($parentNik)
            ->setParentBirthPlace($parentBirthPlace)
            ->setParentDateOfBirth($parentDateOfBirth)
            ->setParentGender($parentGender)
            ->setParentCitizenship($parentCitizenship)
            ->setParentReligion($parentReligion)
            ->setParentMarriage($parentMarriage)
            ->setParentJob($parentJob)
            ->setParentAddress($parentAddress)
            ->setFatherIncomePerMonth($fatherIncomePerMonth)
            ->setMotherIncomePerMonth($motherIncomePerMonth)
            ->setApplicantName($applicantName)
            ->setApplicantPhone($applicantPhone);
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

    /**
     * Get the value of nik
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * Set the value of nik
     *
     * @return  self
     */
    public function setNik($nik)
    {
        $this->nik = $nik;

        return $this;
    }

    /**
     * Get the value of birthPlace
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * Set the value of birthPlace
     *
     * @return  self
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Get the value of dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of dateOfBirth
     *
     * @return  self
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of citizenship
     */
    public function getCitizenship()
    {
        return $this->citizenship;
    }

    /**
     * Set the value of citizenship
     *
     * @return  self
     */
    public function setCitizenship($citizenship)
    {
        $this->citizenship = $citizenship;

        return $this;
    }

    /**
     * Get the value of religion
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set the value of religion
     *
     * @return  self
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get the value of marriage
     */
    public function getMarriage()
    {
        return $this->marriage;
    }

    /**
     * Set the value of marriage
     *
     * @return  self
     */
    public function setMarriage($marriage)
    {
        $this->marriage = $marriage;

        return $this;
    }

    /**
     * Get the value of job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set the value of job
     *
     * @return  self
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
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
     * Get the value of fatherIncomePerMonth
     */
    public function getFatherIncomePerMonth()
    {
        return $this->fatherIncomePerMonth;
    }

    /**
     * Set the value of fatherIncomePerMonth
     *
     * @return  self
     */
    public function setFatherIncomePerMonth($fatherIncomePerMonth)
    {
        $this->fatherIncomePerMonth = $fatherIncomePerMonth;

        return $this;
    }

    /**
     * Get the value of motherIncomePerMonth
     */
    public function getMotherIncomePerMonth()
    {
        return $this->motherIncomePerMonth;
    }

    /**
     * Set the value of motherIncomePerMonth
     *
     * @return  self
     */
    public function setMotherIncomePerMonth($motherIncomePerMonth)
    {
        $this->motherIncomePerMonth = $motherIncomePerMonth;

        return $this;
    }

    /**
     * Get the value of parentName
     */
    public function getParentName()
    {
        return $this->parentName;
    }

    /**
     * Set the value of parentName
     *
     * @return  self
     */
    public function setParentName($parentName)
    {
        $this->parentName = $parentName;

        return $this;
    }

    /**
     * Get the value of parentNik
     */
    public function getParentNik()
    {
        return $this->parentNik;
    }

    /**
     * Set the value of parentNik
     *
     * @return  self
     */
    public function setParentNik($parentNik)
    {
        $this->parentNik = $parentNik;

        return $this;
    }

    /**
     * Get the value of parentBirthPlace
     */
    public function getParentBirthPlace()
    {
        return $this->parentBirthPlace;
    }

    /**
     * Set the value of parentBirthPlace
     *
     * @return  self
     */
    public function setParentBirthPlace($parentBirthPlace)
    {
        $this->parentBirthPlace = $parentBirthPlace;

        return $this;
    }

    /**
     * Get the value of parentDateOfBirth
     */
    public function getParentDateOfBirth()
    {
        return $this->parentDateOfBirth;
    }

    /**
     * Set the value of parentDateOfBirth
     *
     * @return  self
     */
    public function setParentDateOfBirth($parentDateOfBirth)
    {
        $this->parentDateOfBirth = $parentDateOfBirth;

        return $this;
    }

    /**
     * Get the value of parentGender
     */
    public function getParentGender()
    {
        return $this->parentGender;
    }

    /**
     * Set the value of parentGender
     *
     * @return  self
     */
    public function setParentGender($parentGender)
    {
        $this->parentGender = $parentGender;

        return $this;
    }

    /**
     * Get the value of parentCitizenship
     */
    public function getParentCitizenship()
    {
        return $this->parentCitizenship;
    }

    /**
     * Set the value of parentCitizenship
     *
     * @return  self
     */
    public function setParentCitizenship($parentCitizenship)
    {
        $this->parentCitizenship = $parentCitizenship;

        return $this;
    }

    /**
     * Get the value of parentReligion
     */
    public function getParentReligion()
    {
        return $this->parentReligion;
    }

    /**
     * Set the value of parentReligion
     *
     * @return  self
     */
    public function setParentReligion($parentReligion)
    {
        $this->parentReligion = $parentReligion;

        return $this;
    }

    /**
     * Get the value of parentMarriage
     */
    public function getParentMarriage()
    {
        return $this->parentMarriage;
    }

    /**
     * Set the value of parentMarriage
     *
     * @return  self
     */
    public function setParentMarriage($parentMarriage)
    {
        $this->parentMarriage = $parentMarriage;

        return $this;
    }

    /**
     * Get the value of parentJob
     */
    public function getParentJob()
    {
        return $this->parentJob;
    }

    /**
     * Set the value of parentJob
     *
     * @return  self
     */
    public function setParentJob($parentJob)
    {
        $this->parentJob = $parentJob;

        return $this;
    }

    /**
     * Get the value of parentAddress
     */
    public function getParentAddress()
    {
        return $this->parentAddress;
    }

    /**
     * Set the value of parentAddress
     *
     * @return  self
     */
    public function setParentAddress($parentAddress)
    {
        $this->parentAddress = $parentAddress;

        return $this;
    }
}
