<?php


abstract class AbstractRouter
{
    protected $method;
    protected $path;
    protected $controller;
    protected $action;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }

    private function preparePattern($pattern)
    {
        return "~^" . preg_replace("~{(.+?)}~", "(\d+?)", $pattern ) . "$~";
    }

    protected function getController($controller)
    {
        $controller_params = explode('@', $controller);
        $this->controller = $controller_params[0];
        $this->action = $controller_params[1];
        return new $this->controller();
    }

    public function request($method, $pattern, $controller)
    {
        if ($this->method === $method)
        {
            $pattern = $this->preparePattern($pattern);
            if (preg_match($pattern, $this->path, $params))
            {
                if (is_callable($controller))
                    call_user_func($controller, $params[1]);

                else if (is_string($controller))
                {
                    $controller = $this->getController($controller);
                    call_user_func(array($controller, $this->action), $params[1]);
                }
                else{
                    // тут выкинуть исключение
                }
            }
        }
    }
}