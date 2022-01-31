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

            $sql = "SELECT kid.id FROM kid, adoption_process ap WHERE kid.id = ap.kid_id AND ap.id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $adoptionProcessId);

            $stmt->execute();

            $kidId = $stmt->fetchAll()[0]['id'];

            $sql = "UPDATE kid SET adopted = true WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId);

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function rejectAdoption($adoptionProcessId) {

        try {
            
            $sql = "UPDATE adoption_process SET status = 'NEGADO' WHERE id = ?";

            $conn = AdoptionProcessModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $adoptionProcessId);

            $stmt->execute();

            $sql = "SELECT kid.id FROM kid, adoption_process ap WHERE kid.id = ap.kid_id AND ap.id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $adoptionProcessId);

            $stmt->execute();

            $kidId = $stmt->fetchAll()[0]['id'];

            $sql = "UPDATE kid SET adopted = false WHERE id = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $kidId);

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}
