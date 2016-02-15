<?php

    use \Models\User;

    use Illuminate\Routing\Controller;

    class UserController extends Controller {

        public function showUser(){

            $user = User::find(1);

            return view('test', compact('user'));

        }

    }

?>
