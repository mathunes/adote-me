<?php

use App\Core\Connection;

class UserModel extends Connection {

    public function create(User $user) {

        try {

            $sql = "INSERT INTO user(name, email, senha) VALUES (?, ?, ?)";

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

}