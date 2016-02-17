<?php

    // Application configuration.
    return array(

        'debug' => true,

        'url' => 'http://framework.dev:8000/',

        'name' => 'MaceVC',

        'middleware' => array(
            '\Middleware\GeneralMiddleware'
        ),

        'mail' => array(
            'type' => 'smtp',
            'smtp' => array(
                'host'          => getenv('SMTP_HOST'),
                'port'          => getenv('SMTP_PORT'),
                'encryption'    => getenv('SMTP_ENCRYPTION'),
                'username'      => getenv('SMTP_USERNAME'),
                'password'      => getenv('SMTP_PASSWORD')
            )
        ),

        'bindings' => array(
            'core/bindings/database/database',
            'core/bindings/errors/errors',
            'core/bindings/views/views',
            'core/bindings/helpers/helpers',
            'core/bindings/mail/mail',
            'core/bindings/router/router'
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
