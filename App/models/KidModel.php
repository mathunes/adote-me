<?php

use App\Core\Connection;

class KidModel extends Connection {

    public function getById($id) {
        
        try {
            
            $sql = "SELECT * FROM user WHERE id = ?";

            $conn = UserModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conn = null;

            return  $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getAdopted() {
        
        try {
            
            $sql = "SELECT * FROM kid WHERE adopted = true";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getKidsAdopted() {
        
        try {
            
            $sql = "SELECT count(*) FROM kid WHERE adopted = true AND gender = 'MASCULINO'";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $count_m = $stmt->fetch();
            
            $sql = "SELECT count(*) FROM kid WHERE adopted = true AND gender = 'FEMININO'";

            $conn = KidModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $count_f = $stmt->fetch();

            $conn = null;
            
            return [$count_m, $count_f];

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}