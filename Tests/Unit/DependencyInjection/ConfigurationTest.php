<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\RestBundle\Tests\Unit\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use Symfony\Cmf\Bundle\RestBundle\DependencyInjection\CmfRestExtension;
use Symfony\Cmf\Bundle\RestBundle\DependencyInjection\Configuration;

/**
 * This test will try to cover all configs.
 *
 * Means check if all available formats are equal.
 *
 * @author Maximilian Berghoff <Maximilian.Berghoff@gmx.de>
 */
class ConfigurationTest extends AbstractExtensionConfigurationTestCase
{
    protected function getContainerExtension()
    {
        return new CmfRestExtension();
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }

    public function testDefaultsForAllConfigFormats()
    {
        $expectedConfiguration = array(
            'dynamic' => array(
                'enabled' => true,
                'crud_controller_by_method' => 'test.controller',
            ),
        );

        $sources = array_map(function ($path) {
            return __DIR__.'/../../Resources/Fixtures/'.$path;
        }, array(
            'config/config.yml',
            'config/config.php',
            'config/config.xml',
        ));

        $this->assertProcessedConfigurationEquals($expectedConfiguration, $sources);
    }
}
