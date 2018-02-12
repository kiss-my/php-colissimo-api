<?php
use klareNNNs\colissimo\Entity\OutputFormat;
use PHPUnit\Framework\TestCase;

class OutputFormatTest extends TestCase
{
    public function testCanConstructOutputFormat()
    {
        $x = 0;
        $y = 0;
        $outputPrintingType = 'ZPL_10x15_203dpi';
        $outputFormat = new OutputFormat($x, $y, $outputPrintingType);

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\OutputFormat', $outputFormat);
        $this->assertEquals($outputPrintingType, $outputFormat->outputPrintingType);
        $this->assertEquals($x, $outputFormat->x);
        $this->assertEquals($y, $outputFormat->y);
    }
}
