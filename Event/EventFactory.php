<?php

namespace Knp\Bundle\MailjetBundle\Event;

use Mailjet\Event\EventFactory as BaseEventFactory;

class EventFactory extends BaseEventFactory
{
    public function createEvent(array $data)
    {
        $event = parent::createEvent($data);

        return new EventAdapter($event);
    }
}