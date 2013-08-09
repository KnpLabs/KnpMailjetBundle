<?php

namespace Knp\Bundle\MailjetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Mailjet\Event\EventFactoryInterface;

class EventController
{
    protected $eventFactory;

    public function __construct(EventFactoryInterface $eventFactory)
    {
        $this->eventFactory = $eventFactory;
    }

    public function handleEventAction(Request $request)
    {
        
    }
}
