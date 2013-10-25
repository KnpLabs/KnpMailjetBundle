<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

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
