<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\TypofixEvent as BaseTypofixEvent;

class TypofixEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\TypofixEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}