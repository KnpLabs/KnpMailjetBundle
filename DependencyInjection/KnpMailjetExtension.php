<?php

namespace Knp\Bundle\MailjetBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class KnpMailjetExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $container->setParameter('knp_mailjet.event.endpoint_route', $config['event_endpoint_route']);
        $container->setParameter('knp_mailjet.event.endpoint_token', $config['event_endpoint_token']);
        $loader->load('event.yml');

        if (null !== $config['api_key'] && null !== $config['secret_key']) {
            $container->setParameter('knp_mailjet.api_key',    $config['api_key']);
            $container->setParameter('knp_mailjet.secret_key', $config['secret_key']);

            $loader->load('api.yml');
        }
    }
}
