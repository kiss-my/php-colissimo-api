<?php

use klareNNNs\colissimo\Entity\Messages;
use klareNNNs\colissimo\Entity\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testCanConstructResponse()
    {
        $id = 30000;
        $type = 'ERROR';
        $messageContent = 'Invalid identifier/password';

        $message = new Messages($id, $type, $messageContent);
        $label = '';
        $cn23 = '';
        $parcelNumber = '6M12728291127';
        $parcelNumberPartner = '';

        $response = new Response($label, $cn23, $parcelNumber, $parcelNumberPartner, $message);

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\Response', $response);
        $this->assertEquals($label, $response->label);
        $this->assertEquals($cn23, $response->cn23);
        $this->assertEquals($parcelNumber, $response->parcelNumber);
        $this->assertEquals($parcelNumberPartner, $response->parcelNumberPartner);
    }
}
