<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

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
