<?php

namespace spec\Knp\Bundle\MailjetBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\Bundle\MailjetBundle\Command\EventCommand');
    }
}
