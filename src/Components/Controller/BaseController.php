<?php

namespace Components\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Response;

class BaseController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function render($content)
    {
        return new Response($content);
    }
}