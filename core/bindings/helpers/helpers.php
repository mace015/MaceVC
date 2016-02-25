<?php

    // Function for deciding wether the new value or old value should be used.
    if (!function_exists('newOld')){

        function newOld($new, $old) {

            if (isset($new) && $new != ''){

                return $new;

            } else if (isset($old) && $old != ''){

                return $old;

            } else {

                return '';

            }

        }

    }

    // Function to dump data, similar to dd(), but this function has no die();
    if (!function_exists('d')){

        function d($data){

            array_map(function ($x) {
                (new Illuminate\Support\Debug\Dumper)->dump($x);
            }, func_get_args());

        }

    }

?>
