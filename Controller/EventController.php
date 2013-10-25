<?php

namespace Knp\Bundle\MailjetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Mailjet\Event\EventFactoryInterface;

class EventController
{
    protected $token;
    protected $eventFactory;
    protected $eventDispatcher;

    public function __construct(EventFactoryInterface $eventFactory, EventDispatcherInterface $eventDispatcher, $token = null)
    {
        $this->token           = $token;
        $this->eventFactory    = $eventFactory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handleEventAction(Request $request, $token = null)
    {
        if ($this->validateRequest($request, $token)) {
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

    private function validateRequest(Request $request, $token = null)
    {
        if (!$request->isMethod('POST')) {
            return false;
        }

        if ($this->token !== $token) {
            return false;
        }

        return true;
    }
}
