<?php

class Authentication {

    private $user = null;

    private $model = null;

    private $username = null;

    private $remember_token = null;

    private $password = null;

    public function __construct($config){

        $this->model            = $config['model'];
        $this->username         = $config['username'];
        $this->password         = $config['password'];
        $this->remember_token   = $config['remember_token'];

        $this->remember();

    }

    public function user(){

        return $this->user;

    }

    public function check(){

        return !is_null($this->user);

    }

    public function login($id, $remember = false){

        $this->user = call_user_func_array(array($this->model, 'find'), array($id));

        $_SESSION['auth'] = array(
            'login_id'      => $this->user->id,
            'login_hash'    => password_hash($this->user->id, PASSWORD_DEFAULT)
        );

        if ($remember){

            $remember_token = password_hash(time() . rand(0,9999999) . $this->user->id . password_hash(rand(0,9999999), PASSWORD_DEFAULT), PASSWORD_DEFAULT);

            setcookie('remember_token', $remember_token, time() + (86400 * 30), "/");

            $this->user->remember_token = $remember_token;
            $this->user->save();

        }

        return $this->user;

    }

    private function remember(){

        $remember_token = (isset($_COOKIE['remember_token']) && !is_null($_COOKIE['remember_token']))? $_COOKIE['remember_token'] : null;

        if (isset($_SESSION['auth']) && !is_null($_SESSION['auth']) && isset($_SESSION['auth']['login_id']) && isset($_SESSION['auth']['login_hash'])){

            if (password_verify($_SESSION['auth']['login_id'], $_SESSION['auth']['login_hash'])){

                return $this->login($_SESSION['auth']['login_id']);

            }

        } elseif (!is_null($remember_token)){

            $user = call_user_func_array(array($this->model, 'where'), array($this->remember_token, '=', $remember_token));
            $user = $user->first();

            if ($user){

                return $this->login($user->id);

            }

        }

        return false;

    }

    public function attempt($credentials, $remember = false){

        $valid = $this->validate($credentials);

        if ($valid){

            return $this->login($valid, $remember);

        }

        return false;

    }

    public function validate($credentials){

        $user = call_user_func_array(array($this->model, 'where'), array($this->username, '=', $credentials[0]));
        $user = $user->first();
        if ($user){

            if (password_verify($credentials[1], $user->{$this->password})){

                return $user->id;

            }

        }

        return false;

    }

    public function logout(){

        $_SESSION['auth'] = null;
        setcookie('remember_token', null, -1, "/");

        return true;

    }

}

$authWrapper = new Authentication($__CONFIG['app']['auth']);

class Auth {

    public static function __callStatic($name, $args){

        global $authWrapper;

        return call_user_func_array([$authWrapper, $name], $args);

    }

}

?>
