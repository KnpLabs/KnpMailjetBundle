<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\UnsubEvent as BaseUnsubEvent;

class UnsubEvent extends EventAdapter
{
    public function __construct(BaseUnsubEvent $event)
    {
        parent::__construct($event);
    }
}