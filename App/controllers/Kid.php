<?php

use App\Core\Controller;
use App\Core\Functions;

class Kid extends Controller {

    function __construct() {
        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        }

    }
    
    public function search() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $kid = new \App\entities\Kid();
            
            $gender = $_POST['gender'];
            $maxAge = $_POST['maxAge'];

            $kidModel = $this->model("KidModel");

            $kids = $kidModel->search($gender, $maxAge);

            $data = ['kids' => $kids];
            
            $this->view('searchresult/index', $data);
        
        } else {

            Functions::redirect("/home");

        }
    }

    public function applyAdoption() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $kidId = $_POST['kidId'];
            $userId = $_POST['userId'];

            $kidModel = $this->model("KidModel");

            $kids = $kidModel->applyAdoption($kidId, $userId);
            
            $data = ['kids' => $kids];

            $this->view('myadoptions/index', $data);
        
        } else {

            Functions::redirect("/home");

        }

    }

    public function myAdoptions() {

        $kidModel = $this->model("KidModel");

        $kids = $kidModel->myAdoptions($_SESSION['userId']);
        
        $data = ['kids' => $kids];

        $this->view('myadoptions/index', $data);

    }

    public function cancelAdoption() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $kidId = $_POST['kidId'];
            $userId = $_POST['userId'];

            $kidModel = $this->model("KidModel");

            $kids = $kidModel->cancelAdoption($kidId, $userId);
            
            $data = ['kids' => $kids];

            $this->view('myadoptions/index', $data);
        
        } else {

            Functions::redirect("/home");

        }

    }

    public function getFamily() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $kidId = $_POST['kidId'];

            $kidModel = $this->model("KidModel");

            $brothers = $kidModel->getBrothersByKid($kidId);
            
            $data = ['brothers' => $brothers];

            $this->view('familyadoption/index', $data);
        
        } else {

            Functions::redirect("/home");

        }

    }

    public function applyAdoptionFamily() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $userId = $_POST['userId'];
            $brothers = $_POST['brothers'];
            
            $kidModel = $this->model("KidModel");

            foreach ($brothers as $brother) {
                $kids = $kidModel->applyAdoption($brother, $userId);
            }

            $kids = $kidModel->myAdoptions($userId);
        
            $data = ['kids' => $kids];

            $this->view('myadoptions/index', $data);
        
        } else {

            Functions::redirect("/home");

        }

    }

}
