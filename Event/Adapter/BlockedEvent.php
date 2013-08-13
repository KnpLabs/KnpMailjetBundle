<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\BlockedEvent as BaseBlockedEvent;

class BlockedEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\BlockedEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}