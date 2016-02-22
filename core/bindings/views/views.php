<?php

    use Philo\Blade\Blade;

    $views = $__PATH . 'app/views';
    $cache = $__PATH . 'core/cache';

    $blade = new Blade($views, $cache);

    // Function for returning a view instead of $blade->view()->make()->render().
    if (!function_exists('view')){

        function view($view, $vars = array()){

            global $blade;

            return $blade->view()->make($view, $vars)->render();

        }

    }

    // Function for generating full asset URL's.
    if (!function_exists('asset')){

        function asset($url) {

            global $__CONFIG;

            return rtrim($__CONFIG['app']['url'], '/') . '/' . ltrim($url, '/');

        }

    }

?>
