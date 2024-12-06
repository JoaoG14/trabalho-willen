<?php

$config = array(
    'dns'       => 'mysql:dbname=programacaoweb;host=127.0.0.1',
    'username'  => 'root',
    'password'  => null,
);

if(ENV == 'prod'){
    $config['dns'] = "mysql:dbname=;host=localhost";
    $config['username'] = '';
    $config['password'] = '';
}

return $config;

?>