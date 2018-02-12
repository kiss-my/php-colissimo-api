<?php

use PHPUnit\Framework\TestCase;
use klareNNNs\colissimo\Entity\AuthHeader;

class AuthHeaderTest extends TestCase
{
    public function testCanConstructAuthHeader()
    {
        $contractNumber = 'user';
        $password = 'owd';
        $auth = new AuthHeader($contractNumber, $password);

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\AuthHeader', $auth);
        $this->assertEquals($contractNumber, $auth->contractNumber);
        $this->assertEquals($password, $auth->password);
    }
}

