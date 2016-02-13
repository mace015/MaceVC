<?php

    // Load the autload file for Composer dependancies.
    require($__PATH . 'vendor/autoload.php');

    // Load environment variables.
    (new Dotenv\Dotenv($__PATH))->load();

    // Load some helper functions.
    require($__PATH . 'vendor/illuminate/support/helpers.php');

    // Load config file.
    $__CONFIG = require($__PATH . 'app/config/app.php');

    // Load all bindings.
    foreach ($__CONFIG['bindings'] as $binding){
        require($__PATH . $binding . '.php');
    }

?>
