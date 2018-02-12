<?php

namespace klareNNNs\colissimo\Services;

use klareNNNs\colissimo\Entity\Messages;
use klareNNNs\colissimo\Entity\Response;
use UnexpectedValueException;

class SoapResponseFactory
{
    public static function create($response)
    {

        $parseResponse = new MTOM_ResponseReader($response);

        $resultat_tmp = $parseResponse->soapResponse;
        $soap_result = $resultat_tmp["data"];
        $error_code = explode("<id>", $soap_result);
        $error_code = explode("</id>", $error_code[1]);

        if ($error_code[0] != "0") {
            $error_message = explode("<messageContent>", $soap_result);
            $error_message = explode("</messageContent>", $error_message[1]);
            throw new UnexpectedValueException('error message : ' . $error_message[0] . '\n error code : ' . $error_code[0]);
        }

        $resultat_tmp = $parseResponse->attachments;
        $label_content = $resultat_tmp[0];
        $my_data = $label_content["data"];

        $pieces = explode("<parcelNumber>", $soap_result);
        $pieces = explode("</parcelNumber>", $pieces[1]);
        $parcelNumber = $pieces[0]; //Extract the parcel number

        $pieces = explode("<parcelNumberPartner>", $soap_result);
        $pieces = explode("</parcelNumberPartner>", $pieces[1]);
        $parcelNumberPartner = $pieces[0]; //Extract the parcel number Partner

        $pieces = explode("<id>", $soap_result);
        $pieces = explode("</id>", $pieces[1]);
        $id = $pieces[0]; //Extract the parcel number Partner

        $pieces = explode("<type>", $soap_result);
        $pieces = explode("</type>", $pieces[1]);
        $type = $pieces[0]; //Extract the parcel number Partner

        $pieces = explode("<messageContent>", $soap_result);
        $pieces = explode("</messageContent>", $pieces[1]);
        $messageContent = $pieces[0]; //Extract the parcel number Partner

        $message = new Messages($id, $type, $messageContent);

        $respuesta = new Response($my_data, '', $parcelNumber, $parcelNumberPartner, $message);


        return $respuesta;
    }

}