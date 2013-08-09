<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\ClickEvent as BaseClickEvent;

class ClickEvent extends EventAdapter
{
    public function __construct(BaseClickEvent $event)
    {
        parent::__construct($event);
    }
}