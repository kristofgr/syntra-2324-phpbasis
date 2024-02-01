<?php

class Person
{
    private $firstname = '';
    private $lastname = '';
    private $gender = 'm';
    private $zipcode = null;
    private $dob = 0;

    public function __construct($first, $last, $gender = 'm')
    {
        $this->setFirstname($first);
        $this->setLastname($last);
        $this->setGender($gender);
    }

    public function __destruct()
    {
    }

    public function setFirstname(string $str)
    {
        if (strlen(trim($str)) < 2) {
            return false;
        }
        $this->firstname = $str;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname(string $str)
    {
        $this->lastname = $str;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setGender(string $str)
    {
        if (in_array($str, ['m', 'f', 'x'])) {
            $this->gender = $str;
        }
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setZipcode(string $str)
    {
        $this->zipcode = $str;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setDob(int $t)
    {
        $this->dob = $t;
    }

    public function getDob(): int
    {
        return $this->dob;
    }

    public function getAge(): int
    {
        return (int)(Date('Y', time() - $this->dob)) - 1970;
    }
}
