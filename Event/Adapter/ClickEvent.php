<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\ClickEvent as BaseClickEvent;

class ClickEvent extends EventAdapter
{
    /**
     * Override to provide specific class type-hint
     *
     * @param BaseClickEvent $event
     */
    public function setEvent(BaseClickEvent $event)
    {
        parent::setEvent($event);
    }
}