<?php

require_once 'AbstractRouter.php';

class Router extends AbstractRouter
{
    public function get($pattern, $controller)
    {
        parent::request("GET", $pattern, $controller );
    }

    public function post($pattern, $controller)
    {
        parent::request("POST", $pattern, $controller );
    }
}