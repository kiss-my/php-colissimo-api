<?php

namespace klareNNNs\colissimo\Entity;

class Response
{
    var $label;
    var $cn23;
    var $parcelNumber;
    var $parcelNumberPartner;
    var $message;

    /**
     * @param $label
     * @param $cn23
     * @param $parcelNumber
     * @param $parcelNumberPartner
     * @param Messages $message
     */
    public function __construct($label, $cn23, $parcelNumber, $parcelNumberPartner, Messages $message)
    {
        $this->label = $label;
        $this->cn23 = $cn23;
        $this->parcelNumber = $parcelNumber;
        $this->parcelNumberPartner = $parcelNumberPartner;
        $this->message = $message;
    }
}
