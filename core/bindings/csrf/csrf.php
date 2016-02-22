<?php

    use \Volnix\CSRF\CSRF as CSRF;

    // Function for generating a csrf token.
    if (!function_exists('csrf_name')){

        function csrf_name() {

            return CSRF::TOKEN_NAME;

        }

    }

    if (!function_exists('csrf_token')){

        function csrf_token() {

            return CSRF::getToken();

        }

    }

    if (!function_exists('csrf_input')){

        function csrf_input() {

            return CSRF::getHiddenInputString();

        }

    }

?>
