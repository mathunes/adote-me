<?php

use App\Core\Controller;
use App\core\Functions;
use App\models\ContactModel;

class Contact extends Controller {

    function __construct() {

        session_start();

        if (!Functions::isLogged()) {

            Functions::redirect("");

        }

    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $contact = new \App\entities\Contact();
            
            $contact->setMessage($_POST['message']);
            $contact->setUserId($_POST['userId']);

            $contactModel = $this->model("ContactModel");

            $contactModel->create($contact);
            
            Functions::redirect("Home");
        
        } else {

            Functions::redirect("");

        }
    }
}
