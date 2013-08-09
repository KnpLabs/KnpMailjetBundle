<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\TypofixEvent as BaseTypofixEvent;

class TypofixEvent extends EventAdapter
{
    public function __construct(BaseTypofixEvent $event)
    {
        parent::__construct($event);
    }
}