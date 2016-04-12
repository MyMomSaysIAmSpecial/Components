<?php
/**
 * @var $container \Symfony\Component\DependencyInjection\ContainerBuilder
 */
$container = require __DIR__ . '/../app/bootstrap.php';
$framework = $container->get('framework');
$request = $container->get('request');
$response = $framework->handle($request);
$response->send();
$framework->terminate($request, $response);