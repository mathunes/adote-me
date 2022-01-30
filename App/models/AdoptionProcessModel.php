<?php

use App\Core\Connection;

class AdoptionProcessModel extends Connection {

    public function aproveAdoption($adoptionProcessId) {

        try {
            
            $sql = "UPDATE adoption_process SET status = 'APROVADO' WHERE id = ?";

            $conn = AdoptionProcessModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $adoptionProcessId);

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}
