<?php

use App\Core\Controller;

class Home extends Controller
{

    function __construct() {
        session_start();
    }
    
    public function index() {
        //$artigoModel = $this->model("ArtigoModel");

        //$artigos = $artigoModel->read()->fetchAll(\PDO::FETCH_ASSOC);

        $data = ['artigos' => ''];

        $this->view('home/index', $data);
    }
}
