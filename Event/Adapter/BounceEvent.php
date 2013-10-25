<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

class BounceEvent extends EventAdapter
{
    /**
     * @return \Mailjet\Event\Events\BounceEvent
     */
    public function getEvent()
    {
        return parent::getEvent();
    }
}
