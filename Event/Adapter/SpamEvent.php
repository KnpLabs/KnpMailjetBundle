<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\SpamEvent as BaseSpamEvent;

class SpamEvent extends EventAdapter
{
    /**
     * Override to provide specific class type-hint
     *
     * @param BaseSpamEvent $event
     */
    public function setEvent(BaseSpamEvent $event)
    {
        parent::setEvent($event);
    }
}