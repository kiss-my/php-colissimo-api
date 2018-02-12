<?php


// $ export FRANCHISE=00620 SUBSCRIBER=017017 USER=SG00620LATOSTADORA PASSWORD=SG00620LATOSTADORA phpunit

use klareNNNs\colissimo\Entity\Address;
use klareNNNs\colissimo\Entity\Letter;
use klareNNNs\colissimo\Entity\LetterAddressee;
use klareNNNs\colissimo\Entity\LetterParcel;
use klareNNNs\colissimo\Entity\LetterSender;
use klareNNNs\colissimo\Entity\LetterService;
use klareNNNs\colissimo\Entity\OutputFormat;
use PHPUnit\Framework\TestCase;
use klareNNNs\colissimo\Client;
use klareNNNs\colissimo\Entity\AuthHeader;

class ClientTest extends TestCase
{
    const TEST_SOAP_CLIENT = 'https://ws.colissimo.fr/sls-ws/SlsServiceWS?wsdl';
    var $letter;
    var $auth;
    var $outputFormat;

    protected function setUp()
    {

        $contractNumber = 99999;
        $password = 'XXXX';
        $this->auth = new AuthHeader($contractNumber, $password);

        $x = 0;
        $y = 0;
        $outputPrintingType = 'ZPL_10x15_203dpi';
        $this->outputFormat = new OutputFormat($x, $y, $outputPrintingType);


        $companyName = '';
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


        $productCode = 'DOM';
        $depositDate = date('Y-m-d');
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

        $this->letter = new Letter($letterAddressee, $letterParcel, $letterSender, $letterService);

    }

    public function testCanConstructApiClient()
    {

        $soap = new SoapClient(self::TEST_SOAP_CLIENT, array('trace' => 1, "exceptions" => 1));
        $apiClient = new Client($soap, $this->auth, $this->outputFormat, $this->letter);

        $this->assertInstanceOf('\klareNNNs\colissimo\Client', $apiClient);
    }


    public function testCanConnectApiClient()
    {

        $soap = new SoapClient(self::TEST_SOAP_CLIENT, array('trace' => 1, "exceptions" => 0));
        $apiClient = new Client($soap, $this->auth, $this->outputFormat, $this->letter);

        $response = $apiClient->generateLabel();


        $this->assertInstanceOf('\klareNNNs\colissimo\Entity\Response', $response);
    }

}
