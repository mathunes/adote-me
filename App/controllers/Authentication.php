<?php

use App\Core\Functions;
use App\Core\Controller;

class Authentication extends Controller {

    function __construct() {

        session_start();

    }

    public function login() {

        $this->view('login');

    }

}