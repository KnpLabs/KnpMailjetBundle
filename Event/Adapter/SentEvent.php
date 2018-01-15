<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

class SentEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\SentEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}
