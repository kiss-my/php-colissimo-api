<?php

namespace klareNNNs\colissimo\Entity;

class Letter
{
    var $addresse;
    var $parcel;
    var $sender;
    var $service;

    public function __construct(LetterAddressee $addresse, LetterParcel $parcel, LetterSender $sender, LetterService $service)
    {
        $this->addresse = $addresse;
        $this->parcel = $parcel;
        $this->sender = $sender;
        $this->service = $service;
    }
}
