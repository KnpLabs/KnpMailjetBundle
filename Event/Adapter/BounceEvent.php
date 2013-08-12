<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\BounceEvent as BaseBounceEvent;

class BounceEvent extends EventAdapter
{
    /**
     * Override to provide specific class type-hint
     *
     * @param BaseBounceEvent $event
     */
    public function setEvent(BaseBounceEvent $event)
    {
        parent::setEvent($event);
    }

    /**
     * @return \Mailjet\Event\Events\BounceEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}