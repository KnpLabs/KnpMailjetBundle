<?php

namespace spec\Knp\Bundle\MailjetBundle\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventControllerSpec extends ObjectBehavior
{
    /**
     * @param \Mailjet\Event\EventFactoryInterface                        $eventFactory
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     */
    function let($eventFactory, $eventDispatcher)
    {
        $this->beConstructedWith($eventFactory, $eventDispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\Bundle\MailjetBundle\Controller\EventController');
    }

    /**
     * @param \Mailjet\Event\EventFactoryInterface                        $eventFactory
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     * @param \Symfony\Component\HttpFoundation\Request                   $request
     * @param \Knp\Bundle\MailjetBundle\Event\Adapter\OpenEvent           $event
     */
    function it_dispatches_event_on_successful_callback($eventFactory, $eventDispatcher, $request, $event)
    {
        $data = array('event' => 'open');
        $type = 'knp_mailjet.open';

        $request->isMethod('POST')->shouldBeCalled()->willReturn(true);
        $request->getContent()->shouldBeCalled()->willReturn(json_encode($data));

        $event->getType()->shouldBeCalled()->willReturn($type);

        $eventFactory->createEvent($data)->shouldBeCalled()->willReturn($event);
        $eventDispatcher->dispatch($type, $event)->shouldBeCalled();

        $response = $this->handleEventAction($request);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\JsonResponse');
        $response->getStatusCode()->shouldReturn(200);
    }
}