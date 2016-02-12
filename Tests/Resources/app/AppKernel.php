<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2016 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Cmf\Component\Testing\HttpKernel\TestKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends TestKernel
{
    public function configure()
    {
        $this->requireBundleSet('default');

        if ('phpcr' === $this->environment) {
            $this->requireBundleSets(array(
                'phpcr_odm',
            ));
        } elseif ('orm' === $this->environment) {
            $this->requireBundleSet('doctrine_orm');
        }

        $this->addBundles(array(
            new \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new \Symfony\Cmf\Bundle\RestBundle\CmfRestBundle(),
        ));
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->environment.'.php');
    }
}
