<?php

namespace klareNNNs\colissimo\Entity;


class LetterAddressee
{
    var $addresseeParcelRef;
    var $codeBarForReference;
    var $serviceInfo;
    var $address;


    /**
     * @param $addresseeParcelRef
     * @param $codeBarForReference
     * @param $serviceInfo
     * @param Address $address
     */
    public function __construct($addresseeParcelRef, $codeBarForReference, $serviceInfo, Address $address)
    {
        $this->addresseeParcelRef = $addresseeParcelRef;
        $this->codeBarForReference = $codeBarForReference;
        $this->serviceInfo = $serviceInfo;
        $this->address = $address;
    }
}
