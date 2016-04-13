<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('index', new Route('/', ['_controller' => 'Components\Controller\ExampleController::Magic']));

return $collection;