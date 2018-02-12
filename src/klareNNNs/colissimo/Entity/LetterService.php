<?php

namespace klareNNNs\colissimo\Entity;


class LetterService
{
    var $productCode;
    var $depositDate;
    var $transportationAmount;
    var $totalAmount;
    var $orderNumber;
    var $commercialName;

    /**
     * LetterService constructor.
     * @param $productCode
     * @param $depositDate
     * @param $transportationAmount
     * @param $totalAmount
     * @param $orderNumber
     * @param $commercialName
     */
    public function __construct(
        $productCode,
        $depositDate,
        $transportationAmount,
        $totalAmount,
        $orderNumber,
        $commercialName
    ) {
        $this->productCode = $productCode;
        $this->depositDate = $depositDate;
        $this->transportationAmount = $transportationAmount;
        $this->totalAmount = $totalAmount;
        $this->orderNumber = $orderNumber;
        $this->commercialName = $commercialName;
    }

}
