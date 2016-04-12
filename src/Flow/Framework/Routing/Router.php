<?php
/**
 * Created by PhpStorm.
 * User: host
 * Date: 12/04/16
 * Time: 23:16
 */

namespace Flow\Framework\Routing;


use Symfony\Component\Routing\Matcher\UrlMatcherInterface;

class Router implements UrlMatcherInterface
{
    public function match($path)
    {
        dump($path);
    }
}