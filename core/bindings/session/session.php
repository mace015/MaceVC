<?php

    $sessionWrapper = new \CodeZero\Session\VanillaSession();

    class Session {

        public static function __callStatic($name, $args){

            global $sessionWrapper;

    		return call_user_func_array([$sessionWrapper, $name], $args);

    	}

    }

?>
