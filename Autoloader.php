<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

spl_autoload_register(function ($class_name) {
    include 'Controllers/' . $class_name . '.php';
});

spl_autoload_register(function ($class_name) {
    include  $class_name . '.php';
});

ini_set('display_errors', 'on');