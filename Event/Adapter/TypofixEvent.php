<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

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
