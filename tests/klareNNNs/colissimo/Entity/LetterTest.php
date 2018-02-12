<?php

use klareNNNs\colissimo\Entity\Address;
use klareNNNs\colissimo\Entity\Letter;
use klareNNNs\colissimo\Entity\LetterAddressee;
use klareNNNs\colissimo\Entity\LetterParcel;
use klareNNNs\colissimo\Entity\LetterSender;
use klareNNNs\colissimo\Entity\LetterService;
use PHPUnit\Framework\TestCase;

class LetterTest extends TestCase
{
    public function testCanConstructLetter()
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



        $insuranceValue = 0;
        $weight = 1;
        $nonMachinable = 0;
        $COD = 0;
        $CODAmount = 0;
        $returnReceipt = 0;
        $instructions = 'dejar al portero';
        $pickupLocationId = '';
        $ftd = 0;

        $letterParcel = new LetterParcel(
            $insuranceValue,
            $weight,
            $nonMachinable,
            $COD,
            $CODAmount,
            $returnReceipt,
            $instructions,
            $pickupLocationId,
            $ftd
        );


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


        $productCode = 'DOS';
        $depositDate = date('YY-m-d');
        $transportationAmount = 5.70;
        $totalAmount = 21.60;
        $orderNumber = 81;
        $commercialName = '';

        $letterService = new LetterService(
            $productCode,
            $depositDate,
            $transportationAmount,
            $totalAmount,
            $orderNumber,
            $commercialName
        );

        $letter = new Letter($letterAddressee, $letterParcel, $letterSender, $letterService);

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\Letter', $letter);
    }
}
