<?php

namespace klareNNNs\colissimo;

use klareNNNs\colissimo\Entity\AuthHeader;
use klareNNNs\colissimo\Entity\Letter;
use klareNNNs\colissimo\Entity\OutputFormat;
use klareNNNs\colissimo\Services\SoapRequestFactory;
use klareNNNs\colissimo\Services\SoapResponseFactory;
use SimpleXMLElement;
use SoapClient;

class Client
{
    const TEST_SOAP_CLIENT = 'https://ws.colissimo.fr/';
    const TICKET_METHOD = 'generateLabel';
    private $client;
    private $authHeader;
    private $outputFormat;
    private $letter;

    public function __construct(
        SoapClient $soapClient,
        AuthHeader $authHeader,
        OutputFormat $outputFormat,
        Letter $letter
    ) {
        $this->client = $soapClient;
        $this->authHeader = $authHeader;
        $this->outputFormat = $outputFormat;
        $this->letter = $letter;
    }

    public function generateLabel()
    {
        $request = SoapRequestFactory::create($this->authHeader, $this->outputFormat, $this->letter);

        $responseSoap = $this->client->__doRequest($request, self::TEST_SOAP_CLIENT . 'sls-ws/SlsServiceWS',
            self::TICKET_METHOD, '2.0', 0);

        $response = SoapResponseFactory::create($responseSoap);

        return $response;
    }

}
