<?php

namespace NikParser;

class NikParser {
    private string $nik;
    private array $location;

    public function __construct($nik)
    {
        $this->nik = $nik;
        $this->location = $this->getLocation();

        $this->isValid();
    }
    
    private function getLocation() : array
    {
        $path = __DIR__ . '/wilayah.json';
        $json = file_get_contents($path);
        $wilayah = json_decode($json, true);
        return $wilayah;
    }

    private function isValid() : void
    {
        if (strlen($this->nik) < 16 || strlen($this->nik) > 16) {
            throw new \Exception("NIK must be 16 characters");
        }
    }

    /**
     * Province section
     */
    public function isValidProvince() :bool
    {
        $province = substr($this->nik, 0, 2);
        if (array_key_exists($province, $this->location['provinsi'])) {
            return true;
        }
        return false;
    }

    public function getProvinceID() :string 
    {
        $province = substr($this->nik, 0, 2);
        return $province;
    }

    public function getProvince() :string
    {
        if ($this->isValidProvince()) {
            return $this->location['provinsi'][$this->getProvinceID()];
        }
        return 'Provinsi tidak valid';
    }

    /**
     * City section
     */
    public function isValidCity() :bool
    {
        $city = substr($this->nik, 0, 4);
        if (array_key_exists($city, $this->location['kabkot'])) {
            return true;
        }
        return false;
    }

    public function getCityID() :string 
    {
        $city = substr($this->nik, 0, 4);
        return $city;
    }

    public function getCity() :string
    {
        if ($this->isValidCity()) {
            return $this->location['kabkot'][$this->getCityID()];
        }
        return 'Kota/Kabupaten tidak valid';
    }

    /**
     * District section
     */
    public function isValidDistrict() :bool
    {
        $district = substr($this->nik, 0, 6);
        if (array_key_exists($district, $this->location['kecamatan'])) {
            return true;
        }
        return false;
    }

    public function getDistrictID() :string 
    {
        $district = substr($this->nik, 0, 6);
        return $district;
    }

    public function getDistrict() :string
    {
        if ($this->isValidDistrict()) {
            return $this->location['kecamatan'][$this->getDistrictID()];
        }
        return 'Kecamatan tidak valid';
    }

    public function getZipCode() :string
    {
        if ($this->isValidDistrict()) {
            return substr($this->location['kecamatan'][$this->getDistrictID()], -5);
        }
        return 'Kode pos tidak valid';
    }

    /**
     * Birth section
     */
    public function isValidBirth() :bool
    {
        $birth = substr($this->nik, 6, 6);
        if ($birth > 0) {
            return true;
        }
        return false;
    }

    public function getBirth() :string
    {
        if ($this->isValidBirth()) {
            $birth = substr($this->nik, 6, 6);
            $year = substr($birth, 0, 2);
            $month = substr($birth, 2, 2);
            $day = substr($birth, 4, 2);
            return $day . '-' . $month . '-19' . $year;
        }
        return 'Tanggal lahir tidak valid';
    }

    /**
     * NIK section
     */
    public function getNIK() :string
    {
        return $this->nik;
    }

    public function getUniCode() :string
    {
        return substr($this->nik, 12, 4);
    }

    /**
     * Person section
     */
    public function getGender() : string
    {
        $gender = substr($this->nik, 6, 1);
        if ($gender % 2 == 0) {
            return 'Wanita';
        }
        return 'Pria';
        
    }

    public function getAge(): int
    {
        $birth = substr($this->nik, 6, 6);
        $year = substr($birth, 0, 2);
        $month = substr($birth, 2, 2);
        $day = substr($birth, 4, 2);
        $date = $day . '-' . $month . '-19' . $year;
        $date = date_create($date);
        $today = date_create(date('d-m-Y'));
        $diff = date_diff($date, $today);
        return $diff->y;
    }

    public function getAll() :Person
    {
        $person = new Person();
        $person->nik = $this->getNIK();
        $person->gender = $this->getGender();
        $person->province = $this->getProvince();
        $person->city = $this->getCity();
        $person->district = $this->getDistrict();
        $person->age = $this->getAge();
        $person->zipCode = $this->getZipCode();
        $person->birthDate = $this->getBirth();
        $person->uniqueCode = $this->getUniCode();
        $person->provinceID = $this->getProvinceID();
        $person->cityID = $this->getCityID();
        $person->districtID = $this->getDistrictID();

        return $person;
    }
}