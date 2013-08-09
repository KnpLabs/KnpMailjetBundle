<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\BlockedEvent as BaseBlockedEvent;

class BlockedEvent extends EventAdapter
{
    public function __construct(BaseBlockedEvent $event)
    {
        parent::__construct($event);
    }
}