<?php

    use \Models\User;

    class UserController extends Controller {

        public function showUser(){

            $user = User::find(2);

            return view('test', compact('user'));

        }

    }

?>
