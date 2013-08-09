<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\TypofixEvent as BaseTypofixEvent;

class TypofixEvent extends EventAdapter
{
    /**
     * Override to provide specific class type-hint
     *
     * @param BaseTypofixEvent $event
     */
    public function setEvent(BaseTypofixEvent $event)
    {
        parent::setEvent($event);
    }
}