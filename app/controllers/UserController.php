<?php

    use \Models\User;

    Class UserController extends Illuminate\Routing\Controller {

        public function showUser(){

            $user = User::find(1);

            return view('test', compact('user'));

        }

    }

?>
