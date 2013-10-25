<?php

namespace spec\Knp\Bundle\MailjetBundle\Controller;

use PhpSpec\ObjectBehavior;

class EventControllerSpec extends ObjectBehavior
{
    private $token = 12345;

    /**
     * @param \Mailjet\Event\EventFactoryInterface                        $eventFactory
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     */
    function let($eventFactory, $eventDispatcher)
    {
        $this->beConstructedWith($eventFactory, $eventDispatcher, $this->token);
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
    function it_dispatches_event_on_successful_callback_and_proper_token($eventFactory, $eventDispatcher, $request, $event)
    {
        $data = array('event' => 'open');
        $type = 'knp_mailjet.open';

        $request->isMethod('POST')->shouldBeCalled()->willReturn(true);
        $request->getContent()->shouldBeCalled()->willReturn(json_encode($data));

        $event->getType()->shouldBeCalled()->willReturn($type);

        $eventFactory->createEvent($data)->shouldBeCalled()->willReturn($event);
        $eventDispatcher->dispatch($type, $event)->shouldBeCalled();

        $response = $this->handleEventAction($request, $this->token);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\JsonResponse');
        $response->getStatusCode()->shouldReturn(200);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    function it_does_not_dispatch_event_on_invalid_callback($request)
    {
        $request->isMethod('POST')->shouldBeCalled()->willReturn(false);
        $response = $this->handleEventAction($request, $this->token);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\JsonResponse');
        $response->getStatusCode()->shouldReturn(404);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    function it_does_not_dispatch_event_on_invalid_token($request)
    {
        $response = $this->handleEventAction($request, 54321);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\JsonResponse');
        $response->getStatusCode()->shouldReturn(404);
    }
}
