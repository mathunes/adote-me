<?php

use App\Core\Controller;
use App\core\Functions;
use App\models\DoubtModel;

class Doubt extends Controller {

    function __construct() {

        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        }

    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $doubt = new \App\entities\Doubt();
            
            $doubt->setMessage($_POST['message']);
            $doubt->setUserId($_POST['userId']);

            $doubtModel = $this->model("DoubtModel");

            $doubtModel->create($doubt);
            
            Functions::redirect("HowToAdopt");
        
        } else {

            Functions::redirect("Home");

        }
    }
}
