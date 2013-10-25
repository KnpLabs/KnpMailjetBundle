<?php

namespace spec\Knp\Bundle\MailjetBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventCommandSpec extends ObjectBehavior
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    function let($container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\Bundle\MailjetBundle\Command\EventCommand');
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \Symfony\Component\Routing\RouterInterface                $router
     * @param \Symfony\Component\Console\Input\InputInterface           $input
     * @param \Symfony\Component\Console\Output\OutputInterface         $output
     */
    function it_generates_simple_endpoint($container, $router, $input, $output)
    {
        $input->isInteractive()->willReturn(false);
        $input->validate()->willReturn(true);
        $input->bind(Argument::any())->shouldBeCalled();

        $token     = null;
        $routeName = 'knp_mailjet_endpoint';
        $uri       = '/mailjet-callback';
        $domain    = 'knplabs.com';

        $router->generate($routeName, array('token' => $token))->shouldBeCalled()->willReturn($uri);
        $container->get('router')->shouldBeCalled()->willReturn($router);
        $container->getParameter('knp_mailjet.event.endpoint_route')->shouldBeCalled()->willReturn($routeName);
        $container->getParameter('knp_mailjet.event.endpoint_token')->shouldBeCalled()->willReturn($token);
        $input->getArgument('domain')->shouldBeCalled()->willReturn($domain);

        $output->writeln('http://' . $domain . $uri)->shouldBeCalled();

        $this->run($input, $output);
    }
}
