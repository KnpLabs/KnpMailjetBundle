<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

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
