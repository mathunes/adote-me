<?php

use App\Core\Controller;
use App\Core\Functions;

class Home extends Controller
{

    function __construct() {
        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        }

    }
    
    public function index() {
        //$artigoModel = $this->model("ArtigoModel");

        //$artigos = $artigoModel->read()->fetchAll(\PDO::FETCH_ASSOC);

        $data = ['artigos' => ''];

        $this->view('home/index', $data);
    }
}
