<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

class UnsubEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\UnsubEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}
