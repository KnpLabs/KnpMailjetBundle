<?php

namespace spec\Knp\Bundle\MailjetBundle\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Mailjet\Event\EventFactoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EventControllerSpec extends ObjectBehavior
{
    function let(EventFactoryInterface $eventFactory, EventDispatcherInterface $eventDispatcher)
    {
        $this->beConstructedWith($eventFactory, $eventDispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\Bundle\MailjetBundle\Controller\EventController');
    }
}