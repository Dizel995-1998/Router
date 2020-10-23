<?php

require_once 'Router.php';

$router = new Router("GET", "/hello/89");

$router->get("/hello/{id}", function ($id){
   echo 'path - /hello' . '<br/>';
   echo 'arguments - ' . $id;
});