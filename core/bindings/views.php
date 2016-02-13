<?php

    use Philo\Blade\Blade;

    $views = $__PATH . 'app/views';
    $cache = $__PATH . 'core/cache';

    $blade = new Blade($views, $cache);

    function view($view, $vars = array()){

        global $blade;

        return $blade->view()->make($view, $vars)->render();

    }

?>
