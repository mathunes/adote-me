<?php

namespace App\Core;

class Functions {

    public static function redirect($rota = "") {
        ?>
            <script>alert('oi')</script>
        <?php
       header("Location:" . URL_BASE . "/". $rota);
       
    }

    // public static function usuarioLogado() {

    //     return isset($_SESSION['userId']) && isset($_SESSION['userName']);
        
    // }

}