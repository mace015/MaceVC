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

?>
