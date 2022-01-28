<?php

use App\Core\Controller;
use App\core\Functions;
use App\models\UserModel;

class User extends Controller {

    function __construct() {

        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("Home");

        }

    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $passwordHash = password_hash($_POST['password'], PASSWORD_ARGON2I);

            $user = new \App\entities\User();
            
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($passwordHash);

            $userModel = $this->model("UserModel");

            $key = $userModel->create($user);
            
            $hashId = hash('sha512', $key);
            $userModel->createHashID($key, $hashId);

            Functions::redirect("");
        
        } else {

            Functions::redirect("");

        }
    }
}
