<?php

namespace spec\Knp\Bundle\MailjetBundle\Event;

use PhpSpec\ObjectBehavior;

class EventFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\Bundle\MailjetBundle\Event\EventFactory');
    }

    function it_creates_event_adapters()
    {
        $eventAdapter = $this->createEvent(array('event' => 'open'));
        $eventAdapter->shouldHaveType('Knp\Bundle\MailjetBundle\Event\Adapter\OpenEvent');
        $eventAdapter->getType()->shouldReturn('knp_mailjet.open');
        $event = $eventAdapter->getEvent();
        $event->shouldHaveType('Mailjet\Event\Events\OpenEvent');
    }
}
