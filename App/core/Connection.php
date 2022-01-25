<?php

namespace App\Core;

use \PDO;
use \PDOException;

class Connection {
    public static function getConnection() {
        
        $url = "mysql:host=" . HOST . ";dbname=" . DB;

        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try {

            return new PDO($url, USER, PASSWORD, $options);

        } catch (PDOException $e) {

            echo 'connection fail: ' . $e->getMessage();

        }
    }
}
