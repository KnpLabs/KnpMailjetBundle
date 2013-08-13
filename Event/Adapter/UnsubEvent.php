<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\UnsubEvent as BaseUnsubEvent;

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