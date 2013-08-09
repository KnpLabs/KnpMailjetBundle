<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\OpenEvent as BaseOpenEvent;

class OpenEvent extends EventAdapter
{
    public function __construct(BaseOpenEvent $event)
    {
        parent::__construct($event);
    }
}