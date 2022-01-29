<?php

use App\Core\Controller;
use App\Core\Functions;

class SuccessCases extends Controller
{

    function __construct() {
        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        }

    }
    
    public function index() {

        $kidModel = $this->model("KidModel");

        $kids = $kidModel->getAdopted()->fetchAll(\PDO::FETCH_ASSOC);;

        $data = ['kids' => $kids];
        
        $this->view('successcases/index', $data);

    }
}
