<?php

//Account Object
class Account
{
    public $name;
    public $lastName;
    public $email;
    public $password;
    public $sex;
    public $address;

    public function _construct($name,$lastName,$email,$password,$sex,$addressLine1,$addressLine2,$postcode,$city,$country)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->sex = $sex;
        $this->address = new Address($addressLine1,$addressLine2,$postcode,$city,$country);
    }

}

class Address
{
    public $addressLine1;
    public $addressLine2;
    public $postcode;
    public $city;
    public $country;

    public function _construct($addressLine1, $addressLine2, $postcode,$city,$country)
    {
        $this->addressLine1 = $addressLine1;
        $this->addressLine2= $addressLine2;
        $this->postcode = $postcode;
        $this->city= $city;
        $this->country= $country;
    }
}