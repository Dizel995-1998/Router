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

    public function put($pattern, $controller)
    {
        parent::request("PUT", $pattern, $controller );
    }

    public function delete($pattern, $controller)
    {
        parent::request("DELETE", $pattern, $controller );
    }
}