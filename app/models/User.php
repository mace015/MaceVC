<?php namespace Models;

    class User extends \Illuminate\Database\Eloquent\Model {

        public $timestamps = false;

        protected $guarded = array('id');

    }

?>
