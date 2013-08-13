<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\ClickEvent as BaseClickEvent;

class ClickEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\ClickEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}