<?php

use App\Core\Controller;
use App\Core\Functions;

class HowToAdopt extends Controller
{

    function __construct() {
        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        }

    }
    
    public function index() {

        $this->view('howtoadopt/index');

    }
}
