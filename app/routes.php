<?php

    $router->get('/', array('middleware' => '\Middleware\ClosedMiddleware', 'uses' => 'UserController@showUser'));

?>
