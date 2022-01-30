<?php

use App\Core\Controller;
use App\Core\Functions;

class AdmContacts extends Controller
{

    function __construct() {
        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        } else {

            $userModel = $this->model("UserModel");

            $isAdmin = $userModel->isAdmin($_SESSION['userId']);

            if (!$isAdmin) {

                Functions::redirect("Home");

            }

        }

    }
    
    public function index() {
        
        $contactModel = $this->model("ContactModel");

        $contactMessages = $contactModel->getAll();

        $data = ['contactMessages' => $contactMessages];

        $this->view('admcontacts/index', $data);

    }
}
