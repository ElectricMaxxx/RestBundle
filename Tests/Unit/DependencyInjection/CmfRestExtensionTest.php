<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2016 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\RestBundle\Tests\Unit\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Cmf\Bundle\RestBundle\DependencyInjection\CmfRestExtension;

class CmfRestExtensionTest extends AbstractExtensionTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensions()
    {
        return array(
            new CmfRestExtension(),
        );
    }

    public function testDefaults()
    {
        $this->load(array(
            'dynamic' => array(
                'enabled' => true,
                'crud_controller_by_method' => 'test.controller',
            ),
        ));

        $this->assertContainerBuilderHasParameter('cmf_rest.crud_controller_by_method', 'test.controller');
        $this->assertContainerBuilderHasService('cmf_rest.enhancer.crud_controller_by_method');
    }
}
