<?php

    Class User extends \Illuminate\Database\Eloquent\Model {

        public $timestamps = false;

        protected $guarded = array('id');

    }

?>
