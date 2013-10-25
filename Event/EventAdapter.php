<?php

namespace Knp\Bundle\MailjetBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use Mailjet\Event\EventInterface;

/**
 * Adapter to bridge Mailjet API events with Symfony2 Event Dispatcher Component
 */
abstract class EventAdapter extends Event
{
    const EVENT_PREFIX = 'knp_mailjet';

    protected $event;

    public function __construct(EventInterface $event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function getType()
    {
        return sprintf('%s.%s', self::EVENT_PREFIX, $this->event->getType());
    }

    public function getData()
    {
        return $this->event->getData();
    }
}
