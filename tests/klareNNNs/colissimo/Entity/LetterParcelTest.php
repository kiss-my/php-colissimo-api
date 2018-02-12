<?php

use klareNNNs\colissimo\Entity\LetterParcel;
use PHPUnit\Framework\TestCase;

class LetterParcelTest extends TestCase
{
    public function testCanConstructLetterParcel()
    {
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

        $this->assertInstanceOf('\klareNNNs\colissimo\Entity\LetterParcel', $letterParcel);
        $this->assertEquals($insuranceValue, $letterParcel->insuranceValue);
        $this->assertEquals($weight, $letterParcel->weight);
        $this->assertEquals($nonMachinable, $letterParcel->nonMachinable);
        $this->assertEquals($COD, $letterParcel->COD);
        $this->assertEquals($CODAmount, $letterParcel->CODAmount);
        $this->assertEquals($returnReceipt, $letterParcel->returnReceipt);
        $this->assertEquals($instructions, $letterParcel->instructions);
        $this->assertEquals($pickupLocationId, $letterParcel->pickupLocationId);
        $this->assertEquals($ftd, $letterParcel->ftd);
    }
}
