<?php

namespace klareNNNs\colissimo\Services;

use klareNNNs\colissimo\Entity\AuthHeader;
use klareNNNs\colissimo\Entity\Letter;
use klareNNNs\colissimo\Entity\OutputFormat;
use SimpleXMLElement;

class SoapRequestFactory
{
    public static function create(AuthHeader $authHeader, OutputFormat $outputFormat, Letter $letter): string
    {
        $request = array(
                    'contractNumber' => $authHeader->contractNumber,
                    'password' => $authHeader->password,
                    'outputFormat' => array(
                        'outputPrintingType' => $outputFormat->outputPrintingType,
                    ),
                    'letter' => array(
                        'service' => array(
                            'productCode' => $letter->service->productCode,
                            'depositDate' => $letter->service->depositDate
                        ),
                        'parcel' => array(
                            'weight' => $letter->parcel->weight,
                        ),
                        'sender' => array(
                            'address' => array(
                                'companyName' => $letter->sender->address->companyName,
                                'line2' => $letter->sender->address->line2,
                                'countryCode' => $letter->sender->address->countryCode,
                                'city' => $letter->sender->address->city,
                                'zipCode' => $letter->sender->address->zipCode,
                            )
                        ),
                        'addressee' => array(
                            'address' => array(
                                'lastName' => $letter->addresse->address->lastName,
                                'firstName' => $letter->addresse->address->firstName,
                                'line0' => $letter->addresse->address->line0,
                                'line1' => $letter->addresse->address->line1,
                                'line2' => $letter->addresse->address->line2,
                                'line3' => $letter->addresse->address->line3,
                                'countryCode' => $letter->addresse->address->countryCode,
                                'city' => $letter->addresse->address->city,
                                'zipCode' => $letter->addresse->address->zipCode,
                                'phoneNumber' => $letter->addresse->address->phoneNumber,
                                'mobileNumber' => $letter->addresse->address->mobileNumber,
                                'email' => $letter->addresse->address->email,
                                'language' => $letter->addresse->address->language,
                            )
                        )
                    )

        );



        $xml = new SimpleXMLElement('<soapenv:Envelope
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" />');
        $xml->addChild("soapenv:Header");
        $children = $xml->addChild("soapenv:Body");
        $children = $children->addChild("sls:generateLabel", null,
            'http://sls.ws.coliposte.fr');
        $children = $children->addChild("generateLabelRequest", null, "");
        self::array_to_xml($request, $children);
        return $xml->asXML();
    }


    private static function array_to_xml($soapRequest, $soapRequestXml)
    {
        foreach ($soapRequest as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $soapRequestXml->addChild("$key");
                    self::array_to_xml($value, $subnode);
                } else {
                    $subnode = $soapRequestXml->addChild("item$key");
                    self::array_to_xml($value, $subnode);
                }
            } else {
                $soapRequestXml->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}