<?php

namespace Knp\Bundle\MailjetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Mailjet\Event\EventFactoryInterface;

class EventController
{
    protected $eventFactory;
    protected $eventDispatcher;

    public function __construct(EventFactoryInterface $eventFactory, EventDispatcherInterface $eventDispatcher)
    {
        $this->eventFactory    = $eventFactory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handleEventAction(Request $request)
    {
        if ($this->validateRequest($request)) {
            $status = 200;

            $this->processRequest($request);
        } else {
            $status = 404;
        }

        return $this->prepareResponse($status);
    }

    protected function processRequest(Request $request)
    {
        $data = $this->extractData($request);
        $event = $this->eventFactory->createEvent($data);

        $this->eventDispatcher->dispatch($event->getType(), $event);
    }

    private function extractData(Request $request)
    {
        return json_decode($request->getContent(), true);
    }

    private function prepareResponse($status)
    {
        return new JsonResponse(array(), $status);
    }

    private function validateRequest(Request $request)
    {
        if (!$request->isMethod('POST')) {
            return false;
        }

        if (!'application/json' !== $request->getContentType()) {
            return false;
        }

        return true;
    }
}