<?php

namespace Knp\Bundle\MailjetBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('knp_mailjet');

        $rootNode
            ->children()
                ->scalarNode('api_key')->defaultNull()->info('Mailjet API key')->end()
                ->scalarNode('secret_key')->defaultNull()->info('Mailjet API token')->end()
                ->scalarNode('event_listener_class')
                    ->defaultValue('Knp\Bundle\MailjetBundle\Event\Listener\EventListener')
                    ->info('Full class name of your implementation of EventListenerInterface, required to process Mailjet events')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
