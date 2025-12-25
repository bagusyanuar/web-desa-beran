<?php

namespace App\Schemas\Mobile\OnlineLetter\Death;

use App\Commons\Libs\Http\BaseSchema;

class DeathSchema extends BaseSchema
{
    private $name;
    private $nik;
    private $familyIdentifier;
    private $birthPlace;
    private $dateOfBirth;
    private $gender;
    private $citizenship;
    private $religion;
    private $marriage;
    private $job;
    private $address;
    private $deathPlace;
    private $district;
    private $city;
    private $province;
    private $dateOfDeath;
    private $causeOfDeath;
    private $decider;
    private $postMortemNotes;
    private $birthOrder;
    private $applicantName;
    private $applicantPhone;

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'nik' => 'required|string',
            'familyIdentifier' => 'required|string',
            'birthPlace' => 'required|string',
            'dateOfBirth' => 'required|date',
            'gender' => 'required|in:male,female',
            'citizenship' => 'required|in:indonesia,foreign',
            'religion' => 'required|in:islam,kristen,katolik,hindu,budha,konghucu,other',
            'marriage' => 'required|in:married,not-married',
            'job' => 'string',
            'address' => 'required|string',
            'deathPlace' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'dateOfDeath' => 'required|date_format:Y-m-d H:i',
            'causeOfDeath' => 'required|string',
            'postMortemNotes' => 'string',
            'birthOrder' => 'numeric',
            'applicantName' => 'required|string',
            'applicantPhone' => 'required|string'
        ];
    }
    protected function messages()
    {
        return [
            'name.required' => 'kolom nama lengkap wajib diisi.',
            'nik.required' => 'kolom nik wajib diisi',
            'familyIdentifier.required' => 'kolom no. kartu keluarga wajib diisi',
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
            'deathPlace.required' => 'kolom tempat kematian wajib diisi',
            'district.required' => 'kolom kecamatan wajib diisi',
            'city.required' => 'kolom kota wajib diisi',
            'province.required' => 'kolom provinsi wajib diisi',
            'dateOfDeath.required' => 'kolom tanggal kematian wajib diisi',
            'dateOfDeath.date_format' => 'format tanggal kematian tidak valid',
            'causeOfDeath.required' => 'kolom penyebab kematian wajib diisi',
            'applicantName.required' => 'kolom nama lengkap pemohon wajib diisi',
            'applicantPhone.required' => 'kolom nomor whatsapp pemohon wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $name = $this->body['name'];
        $nik = $this->body['nik'];
        $familyIdentifier = $this->body['familyIdentifier'];
        $birthPlace = $this->body['birthPlace'];
        $dateOfBirth = $this->body['dateOfBirth'];
        $gender = $this->body['gender'];
        $citizenship = $this->body['citizenship'];
        $religion = $this->body['religion'];
        $marriage = $this->body['marriage'];
        $job = !empty(trim($this->body['job'] ?? '')) ? $this->body['job'] : null;
        $address = $this->body['address'];
        $deathPlace = $this->body['deathPlace'];
        $district = $this->body['district'];
        $city = $this->body['city'];
        $province = $this->body['province'];
        $dateOfDeath = $this->body['dateOfDeath'];
        $causeOfDeath = $this->body['causeOfDeath'];
        $postMortemNotes = !empty(trim($this->body['postMortemNotes'] ?? '')) ? $this->body['postMortemNotes'] : null;;
        $birthOrder = !empty(trim($this->body['birthOrder'] ?? '')) ? $this->body['birthOrder'] : null;;
        $decider = !empty(trim($this->body['decider'] ?? '')) ? $this->body['decider'] : null;;
        $applicantName = $this->body['applicantName'];
        $applicantPhone = $this->body['applicantPhone'];
        $this->setName($name)
            ->setNik($nik)
            ->setFamilyIdentifier($familyIdentifier)
            ->setBirthPlace($birthPlace)
            ->setDateOfBirth($dateOfBirth)
            ->setGender($gender)
            ->setCitizenship($citizenship)
            ->setReligion($religion)
            ->setMarriage($marriage)
            ->setJob($job)
            ->setAddress($address)
            ->setDeathPlace($deathPlace)
            ->setDistrict($district)
            ->setCity($city)
            ->setProvince($province)
            ->setDateOfDeath($dateOfDeath)
            ->setCauseOfDeath($causeOfDeath)
            ->setPostMortemNotes($postMortemNotes)
            ->setBirthOrder($birthOrder)
            ->setDecider($decider)
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
     * Get the value of familyIdentifier
     */
    public function getFamilyIdentifier()
    {
        return $this->familyIdentifier;
    }

    /**
     * Set the value of familyIdentifier
     *
     * @return  self
     */
    public function setFamilyIdentifier($familyIdentifier)
    {
        $this->familyIdentifier = $familyIdentifier;

        return $this;
    }

    /**
     * Get the value of district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of dateOfDeath
     */
    public function getDateOfDeath()
    {
        return $this->dateOfDeath;
    }

    /**
     * Set the value of dateOfDeath
     *
     * @return  self
     */
    public function setDateOfDeath($dateOfDeath)
    {
        $this->dateOfDeath = $dateOfDeath;

        return $this;
    }

    /**
     * Get the value of causeOfDeath
     */
    public function getCauseOfDeath()
    {
        return $this->causeOfDeath;
    }

    /**
     * Set the value of causeOfDeath
     *
     * @return  self
     */
    public function setCauseOfDeath($causeOfDeath)
    {
        $this->causeOfDeath = $causeOfDeath;

        return $this;
    }

    /**
     * Get the value of decider
     */
    public function getDecider()
    {
        return $this->decider;
    }

    /**
     * Set the value of decider
     *
     * @return  self
     */
    public function setDecider($decider)
    {
        $this->decider = $decider;

        return $this;
    }

    /**
     * Get the value of postMortemNotes
     */
    public function getPostMortemNotes()
    {
        return $this->postMortemNotes;
    }

    /**
     * Set the value of postMortemNotes
     *
     * @return  self
     */
    public function setPostMortemNotes($postMortemNotes)
    {
        $this->postMortemNotes = $postMortemNotes;

        return $this;
    }

    /**
     * Get the value of birthOrder
     */
    public function getBirthOrder()
    {
        return $this->birthOrder;
    }

    /**
     * Set the value of birthOrder
     *
     * @return  self
     */
    public function setBirthOrder($birthOrder)
    {
        $this->birthOrder = $birthOrder;

        return $this;
    }

    /**
     * Get the value of deathPlace
     */
    public function getDeathPlace()
    {
        return $this->deathPlace;
    }

    /**
     * Set the value of deathPlace
     *
     * @return  self
     */
    public function setDeathPlace($deathPlace)
    {
        $this->deathPlace = $deathPlace;

        return $this;
    }
}
