<?php

namespace klareNNNs\colissimo\Entity;


class LetterSender
{
    var $senderParcelRef;
    var $address;

    /**
     * @param $senderParcelRef
     * @param Address $address
     */
    public function __construct($senderParcelRef, Address $address)
    {
        $this->senderParcelRef = $senderParcelRef;
        $this->address = $address;
    }
}