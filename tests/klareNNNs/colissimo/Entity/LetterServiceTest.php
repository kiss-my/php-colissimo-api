<?php

use klareNNNs\colissimo\Entity\LetterService;
use PHPUnit\Framework\TestCase;

class LetterServiceTest extends TestCase
{
    public function testCanConstructLetterService()
    {

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

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\LetterService', $letterService);
        $this->assertEquals($productCode, $letterService->productCode);
        $this->assertEquals($depositDate, $letterService->depositDate);
        $this->assertEquals($transportationAmount, $letterService->transportationAmount);
        $this->assertEquals($totalAmount, $letterService->totalAmount);
        $this->assertEquals($orderNumber, $letterService->orderNumber);
        $this->assertEquals($commercialName, $letterService->commercialName);
    }
}
