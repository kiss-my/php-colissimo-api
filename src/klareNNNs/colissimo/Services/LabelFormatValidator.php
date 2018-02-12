<?php

namespace klareNNNs\colissimo\Services;


class LabelFormatValidator
{
    const LABEL_FORMAT = array('ZPL_10x15_203dpi', 'ZPL_10x15_300dpi', 'DPL_10x15_203dpi', 'DPL_10x15_300dpi', 'PDF_10x15_300dpi', 'PDF_A4_300dpi');

    public function isValid(string $labelFormat)
    {
        return in_array($labelFormat,self::LABEL_FORMAT);
    }
}