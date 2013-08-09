<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\SpamEvent as BaseSpamEvent;

class SpamEvent extends EventAdapter
{
    public function __construct(BaseSpamEvent $event)
    {
        parent::__construct($event);
    }
}