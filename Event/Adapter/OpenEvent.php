<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\OpenEvent as BaseOpenEvent;

class OpenEvent extends EventAdapter
{
    /**
     * Override to provide specific class type-hint
     *
     * @param BaseOpenEvent $event
     */
    public function setEvent(BaseOpenEvent $event)
    {
        parent::setEvent($event);
    }
}