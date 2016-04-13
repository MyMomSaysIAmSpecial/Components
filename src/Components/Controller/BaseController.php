<?php

namespace Components\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Response;

class BaseController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function render($path, $data = [])
    {
//        return $this->container->get('templating')->renderResponse($path, $data);

        dump($this->container);

        return new Response('');
    }
}