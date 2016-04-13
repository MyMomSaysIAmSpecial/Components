<?php
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

$container = new ContainerBuilder();

$container->register('framework', 'Symfony\Component\HttpKernel\HttpKernel')
    ->setArguments([
            new Reference('dispatcher'),
            new Reference('resolver'),
            new Reference('request_stack')
        ]
    );

$container->register('dispatcher', 'Symfony\Component\EventDispatcher\EventDispatcher')
    ->addMethodCall('addSubscriber', [new Reference('router_listener')]);

$container->register('resolver', 'Symfony\Component\HttpKernel\Controller\ControllerResolver');
$container->register('request_stack', 'Symfony\Component\HttpFoundation\RequestStack');

$container->register('router_listener', 'Symfony\Component\HttpKernel\EventListener\RouterListener')
    ->setArguments([new Reference('matcher'), new Reference('request_stack'), new Reference('context')]);

$container->register('context', 'Symfony\Component\Routing\RequestContext')
    ->addMethodCall('fromRequest', array(new Reference('request')));

$container->setDefinition('request_stack', new Definition('Symfony\Component\HttpFoundation\RequestStack'));
$container->setDefinition('request_factory', new Definition('Symfony\Component\HttpFoundation\Request'));
$container->setDefinition('request', new Definition('Symfony\Component\HttpFoundation\Request'))
    ->setFactory([new Reference('request_factory'), 'createFromGlobals']);

require_once 'routes.php';

$container->register('route_collection', 'Symfony\Component\Routing\RouteCollection');
$container->register('matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher')
    ->setArguments([$collection, new Reference('context')]);

$container->compile();