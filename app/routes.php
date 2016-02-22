<?php

    $router->get('/', array('as' => 'home', 'uses' => 'UserController@showUser'));

?>
