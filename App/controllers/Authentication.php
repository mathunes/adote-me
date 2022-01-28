<?php

use App\Core\Functions;
use App\Core\Controller;

class Authentication extends Controller {

    function __construct() {

        session_start();

    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $password = $_POST['password'];
                    
            $userModel = $this->model('UserModel');

            $user = $userModel->getByEmail($_POST['email']);

            if (!empty($user)) {

                $user_password = $user['password']; // achou o usuário usa hash do banco

                // if (password_verify($user_password, $password)) {
                if($user_password == $password) {

                    echo $password;

                    $_SESSION['userId'] = $user['id'];
                   
                    Functions::redirect("Home");

                } else {
                
                    echo $user_password;

                    $message = ["Usuário e/ou senha incorreta"];

                    $data = [
                        'messages' => $message
                    ];
                    
                    Functions::redirect("");
                    // $this->view('login/index', $data);

                }
                
            } else {

                $message = ["Usuário e/ou senha incorreta"];

                $data = [
                    'messages' => $message
                ];
                
                Functions::redirect("");
                // $this->view('login/index', $data);

            }
                    
        }  else {

            Functions::redirect();

        }

    }

    public function logout() {
        
        session_unset();
        session_destroy();
        Functions::redirect();

    }

}