<?php
/**
 * This sample code comes with the shipping web service of La Poste Colissimo
 * The example builds a request, send it to the web service, then parse its response
 * and save the generated label to the specified location
 * @author La Poste Colissimo - solutions.colissimo@laposte.fr
 */
define("SERVER_NAME", 'https://ws.colissimo.fr'); //TODO : Change server name
define("LABEL_FOLDER", './labels/'); //TODO : Change OutPut Folder: this is where thelabel will be saved
//Build the input request : adapt parameters according to your parcel info and options
$requestParameter = array(
    'contractNumber' => '999999', //TODO : Change contractNumber
    'password' => 'PASSWORD', //TODO : Change password
    'outputFormat' => array(
        'outputPrintingType' => 'ZPL_10x15_203dpi'
    ),
    'letter' => array(
        'service' => array(
            'productCode' => 'DOM',
            'depositDate' => '2017-04-30' //TODO : Change depositDate(must be at least equal to current date)
        ),
        'parcel' => array(
            'weight' => '3',
        ),
        'sender' => array(
            'address' => array(
                'companyName' => 'companyName',
                'line2' => 'main address',
                'countryCode' => 'FR',
                'city' => 'Paris',
                'zipCode' => '75007'
            )
        ),
        'addressee' => array(
            'address' => array(
                'lastName' => 'lastName',
                'firstName' => 'firstName',
                'line2' => 'main address',
                'countryCode' => 'FR',
                'city' => 'Paris',
                'zipCode' => '75017'
            )
        )
    )
);
//+ Generate SOAPRequest
$xml = new SimpleXMLElement('<soapenv:Envelope
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" />');
$xml->addChild("soapenv:Header");
$children = $xml->addChild("soapenv:Body");
$children = $children->addChild("sls:generateLabel", null,
    'http://sls.ws.coliposte.fr');
$children = $children->addChild("generateLabelRequest", null, "");
array_to_xml($requestParameter, $children);
$requestSoap = $xml->asXML();
//- Generate SOAPRequest
//+ Call Web Service
$resp = new SoapClient (SERVER_NAME . '/sls-ws/SlsServiceWS?wsdl');
$response = $resp->__doRequest($requestSoap, SERVER_NAME . '/sls-ws/SlsServiceWS',
    'generateLabel', '2.0', 0);
//- Call Web Service
//+ Parse Web Service Response
$parseResponse = new MTOM_ResponseReader($response);
$resultat_tmp = $parseResponse->soapResponse;
$soap_result = $resultat_tmp["data"];
$error_code = explode("<id>", $soap_result);
$error_code = explode("</id>", $error_code[1]);
//- Parse Web Service Response
//+ Error handling and label saving
if ($error_code[0] == "0") {
//+ Write result to file <parcel number>.extension in defined folder (ex:./labels / 6A12091920617 . zpl)
$resultat_tmp = $parseResponse->soapResponse;
$soap_result = $resultat_tmp["data"];
$resultat_tmp = $parseResponse->attachments;
$label_content = $resultat_tmp[0];
$my_datas = $label_content["data"];
//Save the label
$my_extension_tmp = $requestParameter["outputFormat"]["outputPrintingType"];
$my_extension = strtolower(substr($my_extension_tmp, 0, 3));
$pieces = explode("<parcelNumber>", $soap_result);
$pieces = explode("</parcelNumber>", $pieces[1]);
$parcelNumber = $pieces[0]; //Extract the parcel number
$my_file_name = LABEL_FOLDER . $parcelNumber . "." . $my_extension;
$my_file = fopen($my_file_name, 'a');
if (fputs($my_file, $my_datas)) { //Save the label in defined folder
    fclose($my_file);
    echo "fichier " . $my_file_name . " ok <br>";
} else {
    echo "erreur ecriture etiquette <br>";
}
} else { //Display errors if exist
    $error_message = explode("<messageContent>", $soap_result);
    $error_message = explode("</messageContent>", $error_message[1]);
    echo 'error code : ' . $error_code[0] . "\n";
    echo 'error message : ' . $error_message[0] . "\n";
}

class MTOM_ResponseReader
{
    const CONTENT_TYPE = 'Content-Type: application/xop+xml;';
    const UUID = '/--uuid:/'; //This is the separator of each part of the response
    const CONTENT = 'Content-';
    public $attachments = array();
    public $soapResponse = array();
    public $uuid = null;

    public function __construct($response)
    {
        if (strpos($response, self::CONTENT_TYPE) !== false) {
            $this->parseResponse($response);
        } else {
            throw new Exception ('This response is not : ' . CONTENT_TYPE);
        }
    }

    private function parseResponse($response)
    {
        $content = array();
        $matches = array();
        preg_match_all(self::UUID, $response, $matches, PREG_OFFSET_CAPTURE);
        for ($i = 0; $i < count($matches [0]) - 1; $i++) {
            if ($i + 1 < count($matches [0])) {
                $content [$i] = substr($response, $matches [0] [$i] [1],
                    $matches [0] [$i + 1] [1] - $matches [0] [$i] [1]);
            } else {
                $content [$i] = substr($response, $matches [0] [$i] [1],
                    strlen($response));
            }
        }
        foreach ($content as $part) {
            if ($this->uuid == null) {
                $uuidStart = 0;
                $uuidEnd = 0;
                $uuidStart = strpos($part, self::UUID,
                        0) + strlen(self::UUID);
                $uuidEnd = strpos($part, "\r\n", $uuidStart);
                $this->uuid = substr($part, $uuidStart, $uuidEnd);
}
            $header = $this->extractHeader($part);
            if (count($header) > 0) {
                if (strpos($header['Content-Type'], 'type="text/xml"') !== false) {
                    $this->soapResponse['header'] = $header;
                    $this->soapResponse['data'] = trim(substr($part,
                        $header['offsetEnd']));
                } else {
                    $attachment['header'] = $header;
                    $attachment['data'] = trim(substr($part,
                        $header['offsetEnd']));
                    array_push($this->attachments, $attachment);
                }
            }
        }
    }

    /**
     * Exclude the header from the Web Service response
     * @param string $part
     * @return array $header
     */
    private function extractHeader($part)
    {
        $header = array();
        $headerLineStart = strpos($part, self::CONTENT, 0);
        $endLine = 0;
        while ($headerLineStart !== false) {
            $header['offsetStart'] = $headerLineStart;
            $endLine = strpos($part, "\r\n", $headerLineStart);
            $headerLine = explode(': ', substr($part, $headerLineStart,
                $endLine - $headerLineStart));
            $header[$headerLine[0]] = $headerLine[1];
            $headerLineStart = strpos($part, self::CONTENT, $endLine);
        }
        $header['offsetEnd'] = $endLine;
        return $header;
    }
}

/**
 * Convert array to Xml
 * @param unknown $soapRequest
 * @param unknown $soapRequestXml
 */
function array_to_xml($soapRequest, $soapRequestXml)
{
    foreach ($soapRequest as $key => $value) {
        if (is_array($value)) {
            if (!is_numeric($key)) {
                $subnode = $soapRequestXml->addChild("$key");
                array_to_xml($value, $subnode);
            } else {
                $subnode = $soapRequestXml->addChild("item$key");
                array_to_xml($value, $subnode);
            }
        } else {
            $soapRequestXml->addChild("$key", htmlspecialchars("$value"));
        }
    }
}

?>