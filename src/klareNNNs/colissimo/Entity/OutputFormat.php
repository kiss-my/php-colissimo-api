<?php

namespace klareNNNs\colissimo\Entity;

class OutputFormat
{
    var $x;
    var $y;
    var $outputPrintingType; //ZPL_10x15_203dpi

    public function __construct($x, $y, $outputPrintingType)
    {
        $this->x = $x;
        $this->y = $y;
        $this->outputPrintingType = $outputPrintingType;
    }
}