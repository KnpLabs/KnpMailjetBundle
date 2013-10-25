<?php

namespace Knp\Bundle\MailjetBundle\Event\Listener;

use Knp\Bundle\MailjetBundle\Event\Adapter\BlockedEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\BounceEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\ClickEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\OpenEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\SpamEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\TypofixEvent;
use Knp\Bundle\MailjetBundle\Event\Adapter\UnsubEvent;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;
use Psr\Log\LoggerInterface;

/**
 * ******************** NB! ***************************** *
 * THIS CLASS IS JUST FOR DEMONSTRATION AND DEBUGGING     *
 * DO NOT EXTEND FROM THIS CLASS FOR YOUR IMPLEMENTATION  *
 * YOU SHOULD IMPLEMENT FROM EventListenerInterface       *
 * ******************** NB! ***************************** *
 */
class EventListener implements EventListenerInterface
{
    protected $logger;
    protected $logMessageTemplate = 'Caught Mailjet event: %s with following data: %s';

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onOpenEvent(OpenEvent $event)
    {
        $this->logEvent($event);
    }

    public function onSpamEvent(SpamEvent $event)
    {
        $this->logEvent($event);
    }

    public function onClickEvent(ClickEvent $event)
    {
        $this->logEvent($event);
    }

    public function onUnsubEvent(UnsubEvent $event)
    {
        $this->logEvent($event);
    }

    public function onBounceEvent(BounceEvent $event)
    {
        $this->logEvent($event);
    }

    public function onBlockedEvent(BlockedEvent $event)
    {
        $this->logEvent($event);
    }

    public function onTypofixEvent(TypofixEvent $event)
    {
        $this->logEvent($event);
    }

    protected function logEvent(EventAdapter $event)
    {
        $this->logger->debug(sprintf($this->logMessageTemplate, $event->getType(), json_encode($event->getData())));
    }
}
