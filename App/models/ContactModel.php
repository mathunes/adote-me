<?php

use App\Core\Connection;

class ContactModel extends Connection {

    public function create($contact) {

        try {

            $sql = "INSERT INTO contact(message, user_id) VALUES (?, ?)";

            $conn = ContactModel::getConnection();

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $contact->getMessage());
            $stmt->bindValue(2, $contact->getUserId());

            $stmt->execute();

            $conn = null;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

    public function getAll() {

        try {
            
            $sql = "SELECT * FROM contact, user WHERE user.id = contact.user_id";

            $conn = ContactModel::getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $conn = null;
            
            return $stmt->fetchAll();;

        } catch (PDOException $e) {

            die('query fail: ' . $e->getMessage());

        }

    }

}