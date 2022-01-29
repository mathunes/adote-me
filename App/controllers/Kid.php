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

            Functions::redirect("");

        }
    }
    
}
