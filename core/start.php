<?php

    // Load the autload file for Composer dependancies.
    require($__PATH . 'vendor/autoload.php');

    // Load environment variables.
    (new Dotenv\Dotenv($__PATH))->load();

    // Load some helper functions.
    require($__PATH . 'vendor/illuminate/support/helpers.php');

    // Load config file.
    $__CONFIG = array();
    foreach (glob($__PATH . "app/config/*.php") as $filename){
        $array_name = explode('/', $filename);
        $array_name = str_replace('.php', '', end($array_name));
        $__CONFIG[$array_name] = require($filename);
    }

    // Load all bindings.
    foreach ($__CONFIG['app']['bindings'] as $binding){
        require($__PATH . $binding . '.php');
    }

?>
