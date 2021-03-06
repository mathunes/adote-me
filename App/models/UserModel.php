<?php

use App\Core\Connection;

class UserModel extends Connection {

    public function create($user) {

        try {

            $sql = "INSERT INTO user(name, email, password) VALUES (?, ?, ?)";

            $conn = UserModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $user->getName());
            $stmt->bindValue(2, $user->getEmail());
            $stmt->bindValue(3, $user->getPassword());

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getById($id) {
        
        try {
            
            $sql = "SELECT * FROM user WHERE id = ?";

            $conn = UserModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conn = null;

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getByEmail($email) {
        
        try {
            
            $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";

            $conn = UserModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->execute();

            $conn = null;

            return  $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function isAdmin($id) {

        try {
            
            $sql = "SELECT * FROM user WHERE admin = true AND id = ? LIMIT 1";

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

    public function getAll() {

        try {
            
            $sql = "SELECT * FROM user";

            $conn = UserModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt->fetchAll();;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}