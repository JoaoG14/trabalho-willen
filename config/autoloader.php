<?php

$paths = array(
    'controllers',
    'controllers/admin',
    'controllers/site',
    'controllers/dashboard',
    'controllers/contacts',
    'controllers/users',
    'helpers',
    'models',
    'models/admin',
    'models/db',
    'models/login',
    'models/persons',
    'models/contacts',
);

spl_autoload_register(function($classname) use ($paths){

    $found = false;

    foreach($paths as $path){

        $file = $path . DIRECTORY_SEPARATOR . $classname . '.php';

        if(file_exists($file)){
            require $file;
            $found = true;
            break;
        }
    }

    if(!$found){
        exit('Classe '. $classname . 'não encontrada!');
    }
});
