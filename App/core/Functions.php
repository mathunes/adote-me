<?php

namespace App\Core;

class Functions {

    public static function redirect($route = "") {

       header("Location:" . URL_BASE . "/". $route);
       
    }

    public static function isLogged() {

        return isset($_SESSION['userId']);
        
    }

}