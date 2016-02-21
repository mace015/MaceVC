<?php

class Config {

    public static function get($names){

        global $__CONFIG;

        return self::read($__CONFIG, $names);

    }

    public static function read(Array $arr, $path) {

        $parts = explode(".", $path);

        $curr =& $arr;
        for ($i = 0, $l = count($parts); $i < $l; ++$i) {
            if (!isset($curr[$parts[$i]])) {
                return null;
            } elseif (($i < $l - 1) && !is_array($curr[$parts[$i]])) {
                return null;
            }
            $curr =& $curr[$parts[$i]];
        }

        return $curr;

    }

}

?>
