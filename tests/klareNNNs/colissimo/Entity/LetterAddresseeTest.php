<?php

use klareNNNs\colissimo\Entity\Address;
use klareNNNs\colissimo\Entity\LetterAddressee;
use PHPUnit\Framework\TestCase;

class LetterAddresseeTest extends TestCase
{

    public function testCanConstructLetterAddressee()
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

        $addresseeParcelRef = '89989';
        $codeBarForReference = 1;
        $serviceInfo = '';

        $letterAddressee = new LetterAddressee($addresseeParcelRef, $codeBarForReference, $serviceInfo, $address);

        $this->assertInstanceOf('\klareNNNs\colissimo\Entity\LetterAddressee', $letterAddressee);
        $this->assertEquals($addresseeParcelRef, $letterAddressee->addresseeParcelRef);
        $this->assertEquals($codeBarForReference, $letterAddressee->codeBarForReference);
        $this->assertEquals($serviceInfo, $letterAddressee->serviceInfo);
        $this->assertEquals($companyName, $letterAddressee->address->companyName);
        $this->assertEquals($lastName, $letterAddressee->address->lastName);
        $this->assertEquals($firstName, $letterAddressee->address->firstName);
        $this->assertEquals($line0, $letterAddressee->address->line0);
        $this->assertEquals($line1, $letterAddressee->address->line1);
        $this->assertEquals($line2, $letterAddressee->address->line2);
        $this->assertEquals($line3, $letterAddressee->address->line3);
        $this->assertEquals($countryCode, $letterAddressee->address->countryCode);
        $this->assertEquals($city, $letterAddressee->address->city);
        $this->assertEquals($zipCode, $letterAddressee->address->zipCode);
        $this->assertEquals($phoneNumber, $letterAddressee->address->phoneNumber);
        $this->assertEquals($mobileNumber, $letterAddressee->address->mobileNumber);
        $this->assertEquals($doorCode1, $letterAddressee->address->doorCode1);
        $this->assertEquals($doorCode2, $letterAddressee->address->doorCode2);
        $this->assertEquals($email, $letterAddressee->address->email);
        $this->assertEquals($language, $letterAddressee->address->language);
    }
}
