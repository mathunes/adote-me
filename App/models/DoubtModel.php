<?php

use App\Core\Connection;

class DoubtModel extends Connection {

    public function create($doubt) {

        try {

            $sql = "INSERT INTO doubt(message, user_id, whatsapp) VALUES (?, ?, ?)";

            $conn = DoubtModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $doubt->getMessage());
            $stmt->bindValue(2, $doubt->getUserId());
            $stmt->bindValue(3, $doubt->getWhatsapp());

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getAll() {

        try {
            
            $sql = "SELECT * FROM doubt, user WHERE user.id = doubt.user_id";

            $conn = DoubtModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt->fetchAll();;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}