<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\BlockedEvent as BaseBlockedEvent;

class BlockedEvent extends EventAdapter
{
    /**
     * Override to provide specific class type-hint
     *
     * @param BaseBlockedEvent $event
     */
    public function setEvent(BaseBlockedEvent $event)
    {
        parent::setEvent($event);
    }
}