<?php

namespace klareNNNs\colissimo\Entity;


class LetterParcel
{
    var $insuranceValue;
    var $weight;
    var $nonMachinable;
    var $COD;
    var $CODAmount;
    var $returnReceipt;
    var $instructions;
    var $pickupLocationId;
    var $ftd;

    /**
     * LetterParcel constructor.
     * @param $insuranceValue
     * @param $weight
     * @param $nonMachinable
     * @param $COD
     * @param $CODAmount
     * @param $returnReceipt
     * @param $instructions
     * @param $pickupLocationId
     * @param $ftd
     */
    public function __construct(
        $insuranceValue,
        $weight,
        $nonMachinable,
        $COD,
        $CODAmount,
        $returnReceipt,
        $instructions,
        $pickupLocationId,
        $ftd
    ) {
        $this->insuranceValue = $insuranceValue;
        $this->weight = $weight;
        $this->nonMachinable = $nonMachinable;
        $this->COD = $COD;
        $this->CODAmount = $CODAmount;
        $this->returnReceipt = $returnReceipt;
        $this->instructions = $instructions;
        $this->pickupLocationId = $pickupLocationId;
        $this->ftd = $ftd;
    }
}