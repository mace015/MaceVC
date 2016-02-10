<?php

    // Application configuration.
    return array(

        'debug' => true,

        'bindings' => array(
            'core/bindings/database',
            'core/bindings/errors',
            'core/bindings/views',
            'core/bindings/router'
        ),

        'database' => array(
            'driver'    => 'mysql',
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_DATABASE'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        )

    );

?>
