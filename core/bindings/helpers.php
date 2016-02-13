<?php

    if (!function_exists('asset')){

        function asset($url) {

            global $__CONFIG;

            return rtrim($__CONFIG['url'], '/') . '/' . ltrim($url, '/');

        }

    }

?>
