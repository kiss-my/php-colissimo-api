<?php

use klareNNNs\colissimo\Services\LabelFormatValidator;
use PHPUnit\Framework\TestCase;

class LabelFormatValidatorTest extends TestCase
{
    public function testIsValid()
    {
        $labelFormat = 'ZPL_10x15_203dpi';

        $this->assertTrue((new LabelFormatValidator())->isValid($labelFormat));
    }

    public function testIsNotValid()
    {
        $labelFormat = 'ZPL_10x24_203dpi';

        $this->assertTrue(!(new LabelFormatValidator())->isValid($labelFormat));
    }
}