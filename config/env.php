<?php

$env = 'prod';

if(!empty($_SERVER['SERVER_NAME']) and $_SERVER['SERVER_NAME'] === 'localhost'){
    $env = 'dev';
}
elseif(!empty($_SERVER['SERVER_NAME']) and $_SERVER['SERVER_NAME'] == "meuprimeirosite.com.br"){
    $env = 'prod';
}

$error = E_ALL;

if($env == 'prod'){
    $error = false;
}

error_reporting($error);

?>