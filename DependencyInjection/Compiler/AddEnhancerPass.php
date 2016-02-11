<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\RestBundle\DependencyInjection\Compiler;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Changes the Router implementation.
 */
class AddEnhancerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('cmf_routing.dynamic_router')) {
            throw new InvalidConfigurationException('You have to enable the dynamic router in the routing bundle');
        }
        $dynamic = $container->getDefinition('cmf_routing.dynamic_router');

        // only replace the default router by overwriting the 'router' alias if config tells us to
        if ($container->has('cmf_rest.enhancer.crud_controller_by_method')) {
            $dynamic->addMethodCall('addRouteEnhancer', array(
                new Reference('cmf_rest.enhancer.crud_controller_by_method'), 60)
            );
        }
    }
}
