<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2016 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\RestBundle\Admin\Extension;

use Sonata\AdminBundle\Admin\AdminExtension;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class RestMethodExtension extends AdminExtension
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('form.group_methods', array(
                'translation_domain' => 'CmfRestBundle',
            ))
            ->add(
                'methods',
                'choice',
                array(
                    'choices' => array(
                        Request::METHOD_POST,
                        Request::METHOD_GET,
                        Request::METHOD_DELETE,
                        Request::METHOD_PUT,
                        Request::METHOD_PATCH,
                    ),
                    'choices_as_values' => true,
                )
            )
            ->end()
        ;
    }
}
