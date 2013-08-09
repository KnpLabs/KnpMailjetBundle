<?php

namespace Knp\Bundle\MailjetBundle\Event\Adapter;

use Knp\Bundle\MailjetBundle\Event\EventAdapter;

use Mailjet\Event\Events\BounceEvent as BaseBounceEvent;

class BounceEvent extends EventAdapter
{
    public function __construct(BaseBounceEvent $event)
    {
        parent::__construct($event);
    }
}