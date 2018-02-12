<?php

namespace klareNNNs\colissimo\Entity;

class Messages
{
    var $id;
    var $type;
    var $messageContent;

    /**
     * Messages constructor.
     * @param $id
     * @param $type
     * @param $messageContent
     */
    public function __construct($id, $type, $messageContent)
    {
        $this->id = $id;
        $this->type = $type;
        $this->messageContent = $messageContent;
    }


}
