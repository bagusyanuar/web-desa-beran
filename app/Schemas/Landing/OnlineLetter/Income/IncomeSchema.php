<?php

namespace App\Schemas\Landing\OnlineLetter\Income;

use App\Commons\Libs\Http\BaseSchema;

class IncomeSchema extends BaseSchema
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
    private $purpose;
    private $incomePerMonth;
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
            'purpose' => 'required|string',
            'incomePerMonth' => 'required|string',
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
            'purpose.required' => 'kolom tujuan pengajuan wajib diisi',
            'incomePerMonth.required' => 'kolom penghasilan per bulan wajib diisi',
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
        $purpose = $this->body['purpose'];
        $incomePerMonth = $this->body['incomePerMonth'];
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
            ->setPurpose($purpose)
            ->setIncomePerMonth($incomePerMonth)
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
     * Get the value of purpose
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set the value of purpose
     *
     * @return  self
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get the value of incomePerMonth
     */
    public function getIncomePerMonth()
    {
        return $this->incomePerMonth;
    }

    /**
     * Set the value of incomePerMonth
     *
     * @return  self
     */
    public function setIncomePerMonth($incomePerMonth)
    {
        $this->incomePerMonth = $incomePerMonth;

        return $this;
    }
}
