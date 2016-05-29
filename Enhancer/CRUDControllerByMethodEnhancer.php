<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2016 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\RestBundle\Enhancer;

use Symfony\Cmf\Component\Routing\Enhancer\FieldPresenceEnhancer;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class CRUDControllerByMethodEnhancer extends FieldPresenceEnhancer
{
    /**
     * Methods which are supported by this enhancer.
     *
     * @var array
     */
    private $supportedMethods = [
        Request::METHOD_PUT => 'updateAction',
        Request::METHOD_DELETE => 'deleteAction',
        Request::METHOD_POST => 'updateAction',
        Request::METHOD_GET => 'indexAction',
        Request::METHOD_PATCH => 'updateAction',
    ];

    /**
     * {@inheritdoc}
     *
     * The controller service string is added by the parent. This method will simply add the action method
     * depending on the given method.
     */
    public function enhance(array $defaults, Request $request)
    {
        $defaults = parent::enhance($defaults, $request);

        if (isset($defaults[$this->target]) && in_array($request->getMethod(), $this->supportedMethods)) {
            $defaults[$this->target] .= $this->supportedMethods[$request->getMethod()];
        }

        return $defaults;
    }
}
