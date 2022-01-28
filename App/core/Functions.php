<?php

namespace App\Core;

class Functions {

    public static function redirect($route = "") {

       header("Location:" . URL_BASE . "/". $route);
       
    }

    // public static function usuarioLogado() {

    //     return isset($_SESSION['userId']) && isset($_SESSION['userName']);
        
    // }

}