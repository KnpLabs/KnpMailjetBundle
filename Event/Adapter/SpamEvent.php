<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\SpamEvent as BaseSpamEvent;

class SpamEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\SpamEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}