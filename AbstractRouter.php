<?php


abstract class AbstractRouter
{
    protected $method;
    protected $path;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }

    private function preparePattern($pattern)
    {
        return "~^" . preg_replace("~{(.+?)}~", "(\d+?)", $pattern ) . "$~";
    }

    public function request($method, $pattern, $controller)
    {
        if ($this->method === $method)
        {
            $pattern = $this->preparePattern($pattern);
            if (preg_match($pattern, $this->path, $params))
            {
                call_user_func($controller, $params[1]);
            }
        }
    }
}