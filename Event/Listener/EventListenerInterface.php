<?php

namespace Knp\Bundle\MailjetBundle\Event\Listener;

use Knp\Bundle\MailjetBundle\Event\Adapter\OpenEvent,
    Knp\Bundle\MailjetBundle\Event\Adapter\SpamEvent,
    Knp\Bundle\MailjetBundle\Event\Adapter\ClickEvent,
    Knp\Bundle\MailjetBundle\Event\Adapter\UnsubEvent,
    Knp\Bundle\MailjetBundle\Event\Adapter\BounceEvent,
    Knp\Bundle\MailjetBundle\Event\Adapter\BlockedEvent,
    Knp\Bundle\MailjetBundle\Event\Adapter\TypofixEvent;

interface EventListenerInterface
{
    public function onOpenEvent(OpenEvent $event);
    public function onSpamEvent(SpamEvent $event);
    public function onClickEvent(ClickEvent $event);
    public function onUnsubEvent(UnsubEvent $event);
    public function onBounceEvent(BounceEvent $event);
    public function onBlockedEvent(BlockedEvent $event);
    public function onTypofixEvent(TypofixEvent $event);
}
