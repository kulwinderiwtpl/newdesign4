<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $routes): void {

        $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);

        $routes->connect('/contact-us', ['controller' => 'Contacts', 'action' => 'add']);

        $routes->connect('/members', ['controller' => 'Companies', 'action' => 'memberIndex']);

        $routes->fallbacks(DashedRoute::class);
    });

    $routes->prefix('admin', function (RouteBuilder $routes): void {
        $routes->fallbacks(DashedRoute::class);
    });
};