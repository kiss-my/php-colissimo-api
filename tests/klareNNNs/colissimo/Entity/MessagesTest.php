<?php

use klareNNNs\colissimo\Entity\Messages;
use PHPUnit\Framework\TestCase;

class MessagesTest extends TestCase
{
    public function testCanConstructMessages()
    {

        $id = 404;
        $type = 'ERROR';
        $messageContent = 'First name is missing';

        $message = new Messages($id, $type, $messageContent);

        $this->assertInstanceOf('klareNNNs\colissimo\Entity\Messages', $message);
        $this->assertEquals($id, $message->id);
        $this->assertEquals($type, $message->type);
        $this->assertEquals($messageContent, $message->messageContent);
    }
}
