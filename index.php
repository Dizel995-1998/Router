<?php

require_once 'Autoloader.php';

$router = new Router("GET", "/hello");

$router->get('/hello', function (){
   echo 'Hello World';
});