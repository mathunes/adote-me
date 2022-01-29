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

        $kids = $kidModel->getAdopted()->fetchAll(\PDO::FETCH_ASSOC);

        $count = $kidModel->getKidsAdopted();

        $data = ['kids' => $kids, 'kids_m_adopted' => $count[0]['count(*)'], 'kids_f_adopted'=> $count[1]['count(*)']];
        
        $this->view('successcases/index', $data);

    }
}
