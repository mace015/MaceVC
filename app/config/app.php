<?php

    // Application configuration.
    return array(

        'debug' => true,

        'url' => 'http://framework.dev:8000/',

        'email' => 'test@macevc.com',

        'name' => 'MaceVC',

        'middleware' => array(
            '\Middleware\CsrfToken'
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
            'core/bindings/config/config',
            'core/bindings/helpers/helpers',
            'core/bindings/database/database',
            'core/bindings/errors/errors',
            'core/bindings/views/views',
            'core/bindings/mail/mail',
            'core/bindings/csrf/csrf',
            'core/bindings/session/session',
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
