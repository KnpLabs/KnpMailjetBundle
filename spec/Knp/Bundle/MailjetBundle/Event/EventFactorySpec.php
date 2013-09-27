<?php

namespace spec\Knp\Bundle\MailjetBundle\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\Bundle\MailjetBundle\Event\EventFactory');
    }
}
