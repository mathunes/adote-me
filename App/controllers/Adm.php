<?php

use App\Core\Controller;
use App\Core\Functions;

class Adm extends Controller
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
    
    public function doubt() {
        
        $doubtModel = $this->model("DoubtModel");

        $doubtMessages = $doubtModel->getAll();

        $data = ['doubtMessages' => $doubtMessages];

        $this->view('admdoubts/index', $data);

    }

    
    public function user() {
        
        $userModel = $this->model("UserModel");

        $users = $userModel->getAll();

        $data = ['users' => $users];

        $this->view('admusers/index', $data);

    }

    public function kid() {
        
        $kidModel = $this->model("KidModel");

        $kids = $kidModel->getAll();

        $data = ['kids' => $kids];
        
        $this->view('admkids/index', $data);

    }

    public function newKid() {

        $this->view('admnewkid/index');

    }

}
