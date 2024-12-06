<?php 

require 'config/env.php';
define('ROOT', __DIR__);
define('ENV', $env);

require 'config/autoloader.php';

$routes = require 'config/routes.php';

$route = (!empty($_GET['parameter'])) ? rtrim($_GET['parameter'], '/') : '/';
$split = array_filter(explode('/', $route));

$params = array();

if(count($split) > 2){
    $params = array_slice($split, 2);
}

$helpers = require 'config/helpers.php';

if(count($split) > 1){
    $route = $split[0].'/'.$split[1];
}

if(!isset($routes[$route])){
    exit;
}

$controllerAndAction    = explode('/', $routes[$route]);
$currentControllerName  = $controllerAndAction[0];
$currentActionName      = $controllerAndAction[1];

$controller = new $currentControllerName($helpers);
$controller->$currentActionName($params);
