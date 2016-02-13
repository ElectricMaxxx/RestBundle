<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2016 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\RestBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * @author Maximilian Berghoff <maximilian.berghoff@gmx.de>
 */
class CmfRestExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        // if any mappings are defined, set the respective route enhancer
        if (!empty($config['dynamic'])) {
            $this->loadDynamicConfiguration($config['dynamic'], $container);
        }
    }


    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    public function getNamespace()
    {
        return 'http://cmf.symfony.com/schema/dic/rest';
    }

    /**
     * @param array            $config
     * @param ContainerBuilder $container
     */
    private function loadDynamicConfiguration($config, ContainerBuilder $container)
    {
        if (!empty($config['crud_controller_by_method'])) {
            $container->setParameter($this->getAlias() . '.crud_controller_by_method', $config['crud_controller_by_method']);
        }
    }
}
