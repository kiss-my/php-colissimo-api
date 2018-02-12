<?php

use klareNNNs\colissimo\Entity\LetterSender;
use klareNNNs\colissimo\Entity\Address;
use PHPUnit\Framework\TestCase;

class LetterSenderTest extends TestCase
{
    public function testCanConstructLetterSender()
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

        $senderParcelRef = '8112';

        $letterSender = new LetterSender($senderParcelRef, $address);

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\LetterSender', $letterSender);
        $this->assertEquals($senderParcelRef, $letterSender->senderParcelRef);
        $this->assertEquals($companyName, $letterSender->address->companyName);
        $this->assertEquals($lastName, $letterSender->address->lastName);
        $this->assertEquals($firstName, $letterSender->address->firstName);
        $this->assertEquals($line0, $letterSender->address->line0);
        $this->assertEquals($line1, $letterSender->address->line1);
        $this->assertEquals($line2, $letterSender->address->line2);
        $this->assertEquals($line3, $letterSender->address->line3);
        $this->assertEquals($countryCode, $letterSender->address->countryCode);
        $this->assertEquals($city, $letterSender->address->city);
        $this->assertEquals($zipCode, $letterSender->address->zipCode);
        $this->assertEquals($phoneNumber, $letterSender->address->phoneNumber);
        $this->assertEquals($mobileNumber, $letterSender->address->mobileNumber);
        $this->assertEquals($doorCode1, $letterSender->address->doorCode1);
        $this->assertEquals($doorCode2, $letterSender->address->doorCode2);
        $this->assertEquals($email, $letterSender->address->email);
        $this->assertEquals($language, $letterSender->address->language);
    }
}
