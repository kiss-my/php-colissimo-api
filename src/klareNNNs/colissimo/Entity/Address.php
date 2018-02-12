<?php

namespace klareNNNs\colissimo\Entity;


class Address
{
    var $companyName;
    var $lastName;
    var $firstName;
    var $line0;
    var $line1;
    var $line2;
    var $line3;
    var $countryCode;
    var $city;
    var $zipCode;
    var $phoneNumber;
    var $mobileNumber;
    var $doorCode1;
    var $doorCode2;
    var $email;
    var $language;

    /**
     * LetterSenderAddress constructor.
     * @param $companyName
     * @param $lastName
     * @param $firstName
     * @param $line0
     * @param $line1
     * @param $line2
     * @param $line3
     * @param $countryCode
     * @param $city
     * @param $zipCode
     * @param $phoneNumber
     * @param $mobileNumber
     * @param $doorCode1
     * @param $doorCode2
     * @param $email
     * @param $language
     */
    public function __construct(
        $companyName,
        $lastName,
        $firstName,
        $line0,
        $line1,
        $line2,
        $line3,
        $countryCode,
        $city,
        $zipCode,
        $phoneNumber,
        $mobileNumber,
        $doorCode1,
        $doorCode2,
        $email,
        $language
    ) {
        $this->companyName = $companyName;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->line0 = $line0;
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->line3 = $line3;
        $this->countryCode = $countryCode;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->phoneNumber = $phoneNumber;
        $this->mobileNumber = $mobileNumber;
        $this->doorCode1 = $doorCode1;
        $this->doorCode2 = $doorCode2;
        $this->email = $email;
        $this->language = $language;
    }
}
