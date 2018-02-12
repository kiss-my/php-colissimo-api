<?php

use klareNNNs\colissimo\Entity\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testCanConstructAddress()
    {
        $companyName = 'Company Name';
        $lastName = 'Last Name';
        $firstName = 'Name';
        $line0 = '4 2o';
        $line1 = 'Entrance';
        $line2 = '13 rue Percebe';
        $line3 = 'Named place';
        $countryCode = 'FR';
        $city = 'Paris';
        $zipCode = '75001';
        $phoneNumber = '06 88 88 64 31';
        $mobileNumber = '';
        $doorCode1 = '';
        $doorCode2 = '';
        $email = 'test@test.fr';
        $language = 'FR';

        $address = new Address(
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
            $language);

        $this->assertInstanceOf('\klareNNNs\colissimo\Entity\Address', $address);
        $this->assertEquals($companyName, $address->companyName);
        $this->assertEquals($lastName, $address->lastName);
        $this->assertEquals($firstName, $address->firstName);
        $this->assertEquals($line0, $address->line0);
        $this->assertEquals($line1, $address->line1);
        $this->assertEquals($line2, $address->line2);
        $this->assertEquals($line3, $address->line3);
        $this->assertEquals($countryCode, $address->countryCode);
        $this->assertEquals($city, $address->city);
        $this->assertEquals($zipCode, $address->zipCode);
        $this->assertEquals($phoneNumber, $address->phoneNumber);
        $this->assertEquals($mobileNumber, $address->mobileNumber);
        $this->assertEquals($doorCode1, $address->doorCode1);
        $this->assertEquals($doorCode2, $address->doorCode2);
        $this->assertEquals($email, $address->email);
        $this->assertEquals($language, $address->language);
    }
}
