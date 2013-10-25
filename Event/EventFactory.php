<?php

namespace Knp\Bundle\MailjetBundle\Event;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\EventFactory as BaseEventFactory;

class EventFactory extends BaseEventFactory
{
    private $adapterClassMap = array(
        EventData::EVENT_BLOCKED => '\Knp\Bundle\MailjetBundle\Event\Adapter\BlockedEvent',
        EventData::EVENT_BOUNCE  => '\Knp\Bundle\MailjetBundle\Event\Adapter\BounceEvent',
        EventData::EVENT_CLICK   => '\Knp\Bundle\MailjetBundle\Event\Adapter\ClickEvent',
        EventData::EVENT_OPEN    => '\Knp\Bundle\MailjetBundle\Event\Adapter\OpenEvent',
        EventData::EVENT_SPAM    => '\Knp\Bundle\MailjetBundle\Event\Adapter\SpamEvent',
        EventData::EVENT_TYPOFIX => '\Knp\Bundle\MailjetBundle\Event\Adapter\TypofixEvent',
        EventData::EVENT_UNSUB   => '\Knp\Bundle\MailjetBundle\Event\Adapter\UnsubEvent'
    );

    public function createEvent(array $data)
    {
        $event = parent::createEvent($data);

        $adapterClass = $this->adapterClassMap[$event->getType()];

        return new $adapterClass($event);
    }
}
