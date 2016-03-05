<?php

    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;

    $capsule->addConnection( $__CONFIG['app']['database'] );

    $capsule->getConnection()->enableQueryLog();

    $capsule->bootEloquent();

    class DB {

        public static function __callStatic($name, $args){

            global $capsule;

            return call_user_func_array([$capsule, $name], $args);

        }

    }

?>
