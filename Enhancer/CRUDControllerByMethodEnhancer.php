<?php

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
        Request::METHOD_PUT,
        Request::METHOD_DELETE,
        Request::METHOD_POST,
        Request::METHOD_GET,
        Request::METHOD_PATCH,
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
            $defaults[$this->target] .= sprintf(':%sAction', strtolower($request->getMethod()));
        }

        return $defaults;
    }
}
