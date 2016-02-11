<?php

namespace Symfony\Cmf\Bundle\RestBundle\Tests\WebTest;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@gmx.de>
 */
class RestCRUDTEst extends BaseTestCase
{
    public function setUp()
    {
        $this->db('PHPCR')->loadFixtures(array(
            'Symfony\Cmf\Bundle\RestBundle\Tests\Resources\DataFixtures\Phpcr\LoadRouteData',
        ));
        $this->client = $this->createClient();
    }

    public function testPUT()
    {
        $this->client->request(Request::METHOD_PUT, '/collection/put-1');
        $res = $this->client->getResponse();
        $this->assertEquals(Response::HTTP_OK, $res->getStatusCode());
        $this->assertEquals('put', $res->getContent());
    }

    public function testGET()
    {
        $this->client->request(Request::METHOD_GET, '/collection/get-1');
        $res = $this->client->getResponse();
        $this->assertEquals(Response::HTTP_OK, $res->getStatusCode());
        $this->assertEquals('get', $res->getContent());
    }

    public function testDELETE()
    {
        $this->client->request(Request::METHOD_DELETE, '/collection/delete-1');
        $res = $this->client->getResponse();
        $this->assertEquals(Response::HTTP_NO_CONTENT, $res->getStatusCode());
        $this->assertEquals('', $res->getContent());
    }

    public function testPOST()
    {
        $this->client->request(Request::METHOD_POST, '/collection/post-1');
        $res = $this->client->getResponse();
        $this->assertEquals(Response::HTTP_CREATED, $res->getStatusCode());
        $this->assertEquals('post', $res->getContent());
    }

    public function testPATCH()
    {
        $this->client->request(Request::METHOD_PATCH, '/collection/patch-1');
        $res = $this->client->getResponse();
        $this->assertEquals(Response::HTTP_OK, $res->getStatusCode());
        $this->assertEquals('patch', $res->getContent());
    }
}
