<?php

namespace Symfony\Cmf\Bundle\RestBundle\Tests\Resources\DataFixtures\Phpcr;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\Document\Generic;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class LoadRouteData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        NodeHelper::createPath($manager->getPhpcrSession(), '/test');

        $root = $manager->find(null, '/test');
        $parent = new Generic();
        $parent->setParentDocument($root);
        $parent->setNodename('routing');
        $manager->persist($parent);

        $routeCollection = new Route();
        $routeCollection->setParentDocument($parent);
        $routeCollection->setMethods(array('POST', 'GET', 'PUT')); # Todo check if we can add a type and set defaults prePersist?
        $routeCollection->setName('collection');
        $manager->persist($routeCollection);

        $route = new Route();
        $route->setParentDocument($routeCollection);
        $route->setName('get-1');
        $route->setMethods(array(Request::METHOD_GET));
        $manager->persist($route);

        $route = new Route();
        $route->setParentDocument($routeCollection);
        $route->setName('post-1');
        $route->setMethods(array(Request::METHOD_POST));
        $manager->persist($route);

        $route = new Route();
        $route->setParentDocument($routeCollection);
        $route->setName('put-1');
        $route->setMethods(array(Request::METHOD_PUT));
        $manager->persist($route);

        $route = new Route();
        $route->setParentDocument($routeCollection);
        $route->setName('delete-1');
        $route->setMethods(array(Request::METHOD_DELETE));
        $manager->persist($route);

        $route = new Route();
        $route->setParentDocument($routeCollection);
        $route->setName('patch-1');
        $route->setMethods(array(Request::METHOD_PATCH));
        $manager->persist($route);

        $manager->flush();
    }
}
