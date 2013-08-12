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
                ->scalarNode('event_endpoint_route')
                    ->defaultValue('knp_mailjet_event_endpoint')
                    ->info('Route name of the event API endpoint')
                ->end()
                ->scalarNode('event_endpoint_token')
                    ->defaultNull()
                    ->info('Security token to validate endpoint request with')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
