<?php

namespace Symfony\Cmf\Bundle\RestBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class TestController extends Controller
{
    public function indexAction()
    {
        return new Response('index', Response::HTTP_OK);
    }

    public function getAction()
    {
        return new Response('get', Response::HTTP_OK);
    }

    public function putAction()
    {
        return new Response('put', Response::HTTP_OK);
    }

    public function postAction()
    {
        return new Response('post', Response::HTTP_CREATED);
    }

    public function deleteAction()
    {
        return new Response('', Response::HTTP_NO_CONTENT);
    }

    public function patchAction()
    {
        return new Response('patch', Response::HTTP_OK);
    }
}
