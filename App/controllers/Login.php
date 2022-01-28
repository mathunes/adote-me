<?php

use App\Core\Controller;

class Login extends Controller {
    
    function __construct() {

        session_start();
        
    }

    public function index() {

        $this->view('login/index');

    }
    
}
