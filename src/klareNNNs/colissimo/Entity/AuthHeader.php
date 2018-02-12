<?php

namespace klareNNNs\colissimo\Entity;

class AuthHeader
{
    var $contractNumber;
    var $password;

    public function __construct($contractNumber, $password)
    {
        $this->contractNumber = $contractNumber;
        $this->password = $password;
    }

}
