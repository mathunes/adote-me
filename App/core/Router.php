<?php

namespace App\core;

class Router {
    
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $url = $this->parseURL($url);

        if (isset($url[1])) {

            if (file_exists('../App/controllers/' . $url[1] . '.php')) {

                $this->controller = $url[1];
                unset($url[1]);

            }            

        }

        require_once '../App/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[2])) {

            if (method_exists($this->controller, $url[2])) {

                $this->method = $url[2];
                unset($url[2]);

            }

        }
            
        unset($url[0]);

        if ($url) {

            $this->params = array_values($url);

        } else {

            $this->params = [];

        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL($url) {
        
        $aux  = filter_var($url, FILTER_SANITIZE_URL);

        if (substr($aux, -1) === '/') {

            $aux = substr($aux, 0, -1);

        }

        return explode('/', $aux);
    }
}
