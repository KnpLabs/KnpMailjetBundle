<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\OpenEvent as BaseOpenEvent;

class OpenEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\OpenEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}