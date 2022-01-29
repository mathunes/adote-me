<?php

use App\Core\Connection;

class DoubtModel extends Connection {

    public function create($doubt) {

        try {

            $sql = "INSERT INTO doubt(message, user_id) VALUES (?, ?)";

            $conn = DoubtModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $doubt->getMessage());
            $stmt->bindValue(2, $doubt->getUserId());

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}